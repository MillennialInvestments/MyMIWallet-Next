<?php

namespace App\Services;

use App\Models\MarketingModel;
use App\Services\Marketing\OcrService;
use Config\Database;
use Config\Marketing;
use Config\NewsEmailServer;

class MarketingNewsScrapeService
{
    /** @var array<string,mixed> */
    private array $activeImapConfig = [];
    public function __construct(
        private ?MarketingModel $marketingModel = null,
        private ?OcrService $ocrService = null,
        private ?Marketing $marketingConfig = null,
        private ?NewsEmailServer $newsEmailConfig = null,
    ) {
        $this->marketingModel ??= new MarketingModel();
        $this->ocrService ??= new OcrService();
        $this->marketingConfig ??= config('Marketing');
        $this->newsEmailConfig ??= config('NewsEmailServer');
    }

    public function fetchEmails(array $options = []): array
    {
        if (! function_exists('imap_open')) {
            return ['status' => 'error', 'connection_ok' => false, 'error' => 'imap_open not available'];
        }

        try {
            $imap = $this->resolveImapConfig($options);
        } catch (\RuntimeException $e) {
            return ['status' => 'error', 'connection_ok' => false, 'error' => $e->getMessage()];
        }
        $this->activeImapConfig = $imap;
        $mailbox = trim((string) ($imap['username'] ?? ''));
        $folders = $this->resolveFolders($options);
        $limit = max(1, (int) ($options['limit'] ?? 25));
        $force = ! empty($options['force']);
        $searchCriteria = trim((string) ($options['search_criteria'] ?? 'ALL'));
        $subjectFilter = trim((string) ($options['subject'] ?? $imap['subject_filter'] ?? 'Press Release'));
        $debugMode = array_key_exists('debug', $options)
            ? (bool) $options['debug']
            : (bool) ($this->marketingConfig->logging['debug_mode'] ?? false);
        $debugSubjectLimit = max(1, (int) ($options['debug_subject_limit'] ?? $this->marketingConfig->newsScrape['debug_list_limit'] ?? 10));

        $report = [
            'status' => 'success',
            'source' => 'mailbox',
            'mailbox' => $mailbox,
            'imap_host' => (string) ($imap['host'] ?? ''),
            'imap_port' => (int) ($imap['port'] ?? 993),
            'encryption' => (string) ($imap['encryption'] ?? 'ssl'),
            'username' => (string) ($imap['username'] ?? ''),
            'folder' => (string) ($imap['folder'] ?? 'INBOX'),
            'source_map' => (array) ($imap['source_map'] ?? []),
            'folders' => $folders,
            'search_criteria' => $searchCriteria,
            'subject_filter' => $subjectFilter,
            'connection_ok' => false,
            'config_resolved' => ! empty($imap['host']) && ! empty($imap['username']),
            'password_present' => ! empty($imap['password']),
            'folder_exists' => false,
            'matched_subject_count' => 0,
            'parsed_count' => 0,
            'stored' => 0,
            'duplicate_skipped' => 0,
            'parse_failed' => 0,
            'rejected_count' => 0,
            'rejections' => [],
            'items' => [],
            'folder_stats' => [],
            'debug' => [
                'mode' => $debugMode,
                'candidate_subjects' => [],
            ],
        ];
        log_message('info', sprintf(
            '[marketing:news:scrape] IMAP resolved host=%s port=%d encryption=%s username=%s folder=%s password_present=%s',
            (string) $report['imap_host'],
            (int) $report['imap_port'],
            (string) $report['encryption'],
            (string) $report['username'],
            (string) $report['folder'],
            $report['password_present'] ? 'true' : 'false'
        ));

        if (! $report['password_present']) {
            return [
                'status' => 'error',
                'message' => 'Missing IMAP password for tradealerts@mymiwallet.com',
                'config_resolved' => true,
                'password_present' => false,
            ] + $report;
        }

        $conn = $this->connectToFolder((string) $folders[0]);
        if (! $conn['ok']) {
            $report['status'] = 'error';
            $report['error'] = $conn['error'];
            $report['imap_last_error'] = $conn['imap_last_error'] ?? null;
            return $report;
        }

        $report['connection_ok'] = true;
        $rootImap = $conn['imap'];
        $availableFolders = $this->listFolders($rootImap);
        $report['available_folders'] = $availableFolders;
        imap_close($rootImap);

        foreach ($folders as $folder) {
            $folderResult = $this->scanFolder($folder, $limit, $force, $searchCriteria, $subjectFilter, $debugMode, $debugSubjectLimit, $availableFolders);
            $report['folder_stats'][] = $folderResult;
            $report['folder_exists'] = $report['folder_exists'] || ($folderResult['folder_exists'] ?? false);
            $report['matched_subject_count'] += (int) ($folderResult['matched_subject_count'] ?? 0);
            $report['parsed_count'] += (int) ($folderResult['parsed_count'] ?? 0);
            $report['stored'] += (int) ($folderResult['stored'] ?? 0);
            $report['duplicate_skipped'] += (int) ($folderResult['duplicate_skipped'] ?? 0);
            $report['parse_failed'] += (int) ($folderResult['parse_failed'] ?? 0);
            $report['rejected_count'] += (int) ($folderResult['rejected_count'] ?? 0);
            $report['items'] = array_merge($report['items'], $folderResult['items'] ?? []);
            $report['rejections'] = array_merge($report['rejections'], $folderResult['rejections'] ?? []);
            $report['debug']['candidate_subjects'][$folder] = $folderResult['candidate_subjects'] ?? [];
        }

        if ($report['stored'] === 0 && $report['rejections'] === []) {
            $report['rejections'][] = [
                'reason' => 'no_messages_stored',
                'detail' => 'No message matched configured sender/subject rules, parsing failed, or duplicates were skipped.',
            ];
        }

        $report['insert_verification'] = [
            'inserted_count' => (int) $report['stored'],
            'duplicate_skipped_count' => (int) $report['duplicate_skipped'],
            'rejected_count' => (int) $report['rejected_count'],
        ];

        return $report;
    }

    public function mailboxDiagnostics(array $options = []): array
    {
        try {
            $imap = $this->resolveImapConfig($options);
        } catch (\RuntimeException $e) {
            return ['status' => 'error', 'connection_ok' => false, 'error' => $e->getMessage()];
        }
        $this->activeImapConfig = $imap;
        $folders = $this->resolveFolders($options);
        $searchCriteria = trim((string) ($options['search_criteria'] ?? 'ALL'));
        $subjectFilter = trim((string) ($options['subject'] ?? $imap['subject_filter'] ?? 'Press Release'));
        $subjectLimit = max(1, (int) ($options['subject_limit'] ?? 10));

        $diag = [
            'connection' => [
                'host' => $imap['host'] ?? '',
                'port' => (int) ($imap['port'] ?? 993),
                'encryption' => $imap['encryption'] ?? 'ssl',
                'username' => $imap['username'] ?? '',
                'folder' => $imap['folder'] ?? 'INBOX',
                'search_criteria' => $searchCriteria,
                'subject_filter' => $subjectFilter,
                'password_present' => ! empty($imap['password']),
                'source_map' => (array) ($imap['source_map'] ?? []),
            ],
            'folders_configured' => $folders,
            'connection_ok' => false,
            'config_resolved' => ! empty($imap['host']) && ! empty($imap['username']),
            'folders_found' => [],
            'per_folder' => [],
        ];
        log_message('info', sprintf(
            '[marketing:news:debug] IMAP resolved host=%s port=%d encryption=%s username=%s folder=%s password_present=%s',
            (string) $diag['connection']['host'],
            (int) $diag['connection']['port'],
            (string) $diag['connection']['encryption'],
            (string) $diag['connection']['username'],
            (string) $diag['connection']['folder'],
            $diag['connection']['password_present'] ? 'true' : 'false'
        ));

        if (! $diag['connection']['password_present']) {
            $diag['status'] = 'error';
            $diag['message'] = 'Missing IMAP password for tradealerts@mymiwallet.com';
            return $diag;
        }

        $conn = $this->connectToFolder((string) ($imap['folder'] ?? 'INBOX'));
        if (! $conn['ok']) {
            $diag['error'] = $conn['error'];
            $diag['imap_last_error'] = $conn['imap_last_error'] ?? null;
            return $diag;
        }

        $diag['connection_ok'] = true;
        $rootImap = $conn['imap'];
        $found = $this->listFolders($rootImap);
        $diag['folders_found'] = $found;
        imap_close($rootImap);

        foreach ($folders as $folder) {
            $diag['per_folder'][$folder] = $this->scanFolderForDiagnostics($folder, $searchCriteria, $subjectFilter, $subjectLimit, $found);
        }

        return $diag;
    }

    public function parseAlertEmail(array $email): ?array
    {
        $subject = trim((string) ($email['subject'] ?? $email['email_subject'] ?? $email['title'] ?? ''));
        $rawBody = (string) ($email['body'] ?? $email['content'] ?? $email['email_body'] ?? '');
        $sender = trim((string) ($email['from'] ?? $email['email_sender'] ?? ''));
        $messageId = trim((string) ($email['message_id'] ?? $email['email_identifier'] ?? md5($subject . $sender)));

        $cleanBody = $this->cleanFooterNoise($rawBody);
        $headlineSource = $subject !== '' ? $subject : (strtok($cleanBody, "\n") ?: '');
        if ($headlineSource === '') {
            return null;
        }

        $headline = $this->parseHeadlineLine($headlineSource);
        $alertType = $this->detectAlertType($headlineSource . ' ' . $cleanBody);

        return [
            'source_type' => 'email_alert',
            'source_provider' => $headline['provider'] ?? 'Unknown',
            'alert_type' => $alertType,
            'sender_email' => $sender,
            'source_message_id' => $messageId,
            'title' => $headline['title'] ?: $headlineSource,
            'content' => trim($cleanBody),
            'email_subject' => $subject,
            'email_sender' => $sender,
            'email_date' => (string) ($email['date'] ?? ''),
            'email_identifier' => trim((string) (($email['folder'] ?? 'INBOX') . ':' . ($email['uid'] ?? $messageId))),
            'metadata' => json_encode(['source' => 'email', 'category' => 'press_release']),
            'ticker' => $headline['ticker'] ?? null,
            'company_name' => $headline['company_name'] ?? null,
            'status' => 'pending',
            'date_scraped' => date('Y-m-d H:i:s'),
            'date_published' => $this->extractPublishDate($email),
        ];
    }

    public function parseHeadlineLine(string $line): array
    {
        $line = trim(preg_replace('/\s+/', ' ', strip_tags($line)) ?? '');
        $provider = 'Unknown';
        $title = $line;

        if (preg_match('/^([A-Za-z0-9\-\.\s]+):\s*(.+)$/', $line, $m)) {
            $prefix = mb_strtolower(trim($m[1]));
            $provider = (string) ($this->marketingConfig->newsScrape['provider_prefixes'][$prefix] ?? trim($m[1]));
            $title = trim($m[2]);
        }

        $ticker = null;
        if (preg_match('/\(([A-Z]{1,6})\)/', $title, $m)) {
            $ticker = $m[1];
        } elseif (preg_match('/\b([A-Z]{2,5})\b/', $title, $m)) {
            $ticker = $m[1];
        }

        $company = preg_split('/\b(reports|announces|completes|launches|wins|secures|files)\b/i', $title)[0] ?? '';
        $company = trim($company, " -:\t\n\r\0\x0B");

        return [
            'provider' => $provider,
            'title' => $title,
            'ticker' => $ticker,
            'company_name' => $company !== '' ? $company : null,
        ];
    }

    public function cleanFooterNoise(string $body): string
    {
        $clean = html_entity_decode(strip_tags($body));
        $clean = preg_replace('/\r\n|\r/', "\n", $clean) ?? $clean;
        $lines = array_values(array_filter(array_map(static fn ($line) => trim($line), explode("\n", $clean))));
        $noise = (array) ($this->marketingConfig->newsScrape['footer_noise_tokens'] ?? []);

        $kept = [];
        foreach ($lines as $line) {
            $lineLower = strtolower($line);
            $isNoise = false;
            foreach ($noise as $token) {
                if ($token !== '' && str_contains($lineLower, strtolower((string) $token))) {
                    $isNoise = true;
                    break;
                }
            }
            if (! $isNoise) {
                $kept[] = $line;
            }
        }

        return trim(implode("\n", $kept));
    }

    public function ingestOcrImage(string $path): ?array
    {
        $text = trim($this->ocrService->extractText($path));
        if ($text === '') {
            return null;
        }

        $headlineLine = strtok($text, "\n") ?: $text;
        $headline = $this->parseHeadlineLine($headlineLine);

        return [
            'source_type' => 'screenshot_alert',
            'source_provider' => $headline['provider'] ?? 'OCR',
            'alert_type' => $this->detectAlertType($text),
            'sender_email' => null,
            'source_message_id' => 'ocr:' . md5($path . $text),
            'title' => $headline['title'] ?: $headlineLine,
            'content' => $text,
            'ticker' => $headline['ticker'] ?? null,
            'company_name' => $headline['company_name'] ?? null,
            'status' => 'pending',
            'date_scraped' => date('Y-m-d H:i:s'),
            'date_published' => null,
        ];
    }

    public function ingestRawTextFile(string $path): ?array
    {
        if (! is_file($path)) {
            return null;
        }

        $text = trim((string) file_get_contents($path));
        if ($text === '') {
            return null;
        }

        $headlineLine = strtok($text, "\n") ?: $text;
        $headline = $this->parseHeadlineLine($headlineLine);

        return [
            'source_type' => 'email_alert',
            'source_provider' => $headline['provider'] ?? 'raw_text',
            'alert_type' => $this->detectAlertType($text),
            'sender_email' => null,
            'source_message_id' => 'file:' . md5($path . $text),
            'title' => $headline['title'] ?: $headlineLine,
            'content' => $text,
            'ticker' => $headline['ticker'] ?? null,
            'company_name' => $headline['company_name'] ?? null,
            'status' => 'pending',
            'date_scraped' => date('Y-m-d H:i:s'),
            'date_published' => null,
        ];
    }

    public function storeTempRecord(array $payload): int
    {
        $db = Database::connect();
        $table = (string) ($this->marketingConfig->tempScraper['table'] ?? 'bf_marketing_temp_scraper');
        $normalizedTitle = mb_strtolower(trim((string) ($payload['title'] ?? '')));
        $normalizedBody = mb_strtolower(trim((string) ($payload['content'] ?? '')));
        $contentHash = hash('sha256', $normalizedTitle . '|' . $normalizedBody);
        $force = ! empty($payload['force']);
        $dedupe = (bool) ($this->marketingConfig->tempScraper['dedupe_on_content_hash'] ?? true);
        $emailIdentifier = trim((string) ($payload['email_identifier'] ?? ''));
        $sourceMessageId = trim((string) ($payload['source_message_id'] ?? ''));

        if (! $force && $emailIdentifier !== '' && $db->table($table)->where('email_identifier', $emailIdentifier)->countAllResults() > 0) {
            return 0;
        }
        if (! $force && $sourceMessageId !== '' && $db->table($table)->where('source_message_id', $sourceMessageId)->countAllResults() > 0) {
            return 0;
        }

        if (! $force && $dedupe && $db->table($table)->where('content_hash', $contentHash)->countAllResults() > 0) {
            return 0;
        }

        $row = [
            'status' => $payload['status'] ?? (string) ($this->marketingConfig->tempScraper['default_status'] ?? 'pending'),
            'title' => $payload['title'] ?? null,
            'content' => $payload['content'] ?? null,
            'summary' => null,
            'source_type' => $payload['source_type'] ?? 'email_alert',
            'source_provider' => $payload['source_provider'] ?? null,
            'alert_type' => $payload['alert_type'] ?? null,
            'sender_email' => $payload['sender_email'] ?? null,
            'source_message_id' => $payload['source_message_id'] ?? null,
            'email_subject' => $payload['email_subject'] ?? ($payload['title'] ?? null),
            'email_sender' => $payload['email_sender'] ?? ($payload['sender_email'] ?? null),
            'email_date' => $payload['email_date'] ?? null,
            'email_identifier' => $payload['email_identifier'] ?? ($payload['source_message_id'] ?? null),
            'metadata' => $payload['metadata'] ?? null,
            'ticker' => $payload['ticker'] ?? null,
            'company_name' => $payload['company_name'] ?? null,
            'content_hash' => $contentHash,
            'date_scraped' => $payload['date_scraped'] ?? date('Y-m-d H:i:s'),
            'date_published' => $payload['date_published'] ?? null,
            'processed_at' => null,
            'created_on' => date('Y-m-d H:i:s'),
            'modified_on' => date('Y-m-d H:i:s'),
            'processed' => 0,
        ];

        $db->table($table)->insert($row);

        return (int) $db->insertID();
    }

    private function scanFolder(string $folder, int $limit, bool $force, string $searchCriteria, string $subjectFilter, bool $debugMode, int $debugSubjectLimit, array $availableFolders): array
    {
        $result = [
            'folder' => $folder,
            'folder_exists' => in_array($folder, $availableFolders, true),
            'folder_message_count' => 0,
            'matched_subject_count' => 0,
            'parsed_count' => 0,
            'stored' => 0,
            'duplicate_skipped' => 0,
            'parse_failed' => 0,
            'rejected_count' => 0,
            'candidate_subjects' => [],
            'rejections' => [],
            'items' => [],
        ];

        $conn = $this->connectToFolder($folder);
        if (! $conn['ok']) {
            $result['rejections'][] = ['folder' => $folder, 'reason' => 'folder_connect_failed', 'detail' => $conn['error']];
            $result['rejected_count']++;
            return $result;
        }

        $imap = $conn['imap'];
        $check = imap_check($imap);
        $result['folder_message_count'] = (int) ($check->Nmsgs ?? 0);

        $emailNumbers = imap_search($imap, $searchCriteria) ?: [];
        rsort($emailNumbers);

        foreach (array_slice($emailNumbers, 0, $limit) as $emailNumber) {
            $overviewList = imap_fetch_overview($imap, (string) $emailNumber, 0) ?: [];
            if ($overviewList === []) {
                continue;
            }

            $overview = $overviewList[0];
            $subject = isset($overview->subject) ? $this->decodeImapText((string) $overview->subject) : '';
            $from = isset($overview->from) ? $this->decodeImapText((string) $overview->from) : '';
            $emailAddress = $this->extractEmail($from);

            $result['candidate_subjects'][] = ['subject' => $subject, 'from' => $emailAddress, 'matches' => false];
            if (count($result['candidate_subjects']) > $debugSubjectLimit) {
                array_shift($result['candidate_subjects']);
            }

            $reason = $this->determineRejectionReason($emailAddress, $subject, $subjectFilter);
            if ($reason !== null) {
                $result['rejected_count']++;
                $result['rejections'][] = ['folder' => $folder, 'subject' => $subject, 'from' => $emailAddress, 'reason' => $reason];
                continue;
            }

            $result['matched_subject_count']++;
            $lastIdx = count($result['candidate_subjects']) - 1;
            if ($lastIdx >= 0) {
                $result['candidate_subjects'][$lastIdx]['matches'] = true;
            }

            if ($debugMode) {
                continue;
            }

            $body = $this->fetchEmailBody($imap, (int) $emailNumber);
            $parsed = $this->parseAlertEmail([
                'subject' => $subject,
                'body' => $body,
                'from' => $emailAddress,
                'message_id' => (string) ($overview->message_id ?? md5($subject . $emailAddress)),
                'date' => (string) ($overview->date ?? ''),
                'uid' => (int) imap_uid($imap, (int) $emailNumber),
                'folder' => $folder,
            ]);

            if ($parsed === null) {
                $result['parse_failed']++;
                $result['rejected_count']++;
                $result['rejections'][] = ['folder' => $folder, 'subject' => $subject, 'from' => $emailAddress, 'reason' => 'parse_failed'];
                continue;
            }

            $result['parsed_count']++;
            $id = $this->storeTempRecord($parsed + ['force' => $force]);
            if ($id > 0) {
                $result['stored']++;
                $result['items'][] = ['id' => $id, 'title' => $parsed['title'] ?? '', 'folder' => $folder];
            } else {
                $result['duplicate_skipped']++;
                $result['rejected_count']++;
                $result['rejections'][] = ['folder' => $folder, 'subject' => $subject, 'from' => $emailAddress, 'reason' => 'duplicate_skipped'];
            }
        }

        imap_close($imap);
        return $result;
    }

    private function scanFolderForDiagnostics(string $folder, string $searchCriteria, string $subjectFilter, int $subjectLimit, array $availableFolders): array
    {
        $stats = [
            'folder_exists' => in_array($folder, $availableFolders, true),
            'total_messages' => 0,
            'unseen_messages' => 0,
            'subject_samples' => [],
            'sender_matches' => 0,
            'subject_matches' => 0,
            'full_matches' => 0,
            'search_criteria' => $searchCriteria,
        ];

        $conn = $this->connectToFolder($folder);
        if (! $conn['ok']) {
            $stats['error'] = $conn['error'];
            return $stats;
        }

        $imap = $conn['imap'];
        $check = imap_check($imap);
        $stats['total_messages'] = (int) ($check->Nmsgs ?? 0);
        $stats['unseen_messages'] = count(imap_search($imap, 'UNSEEN') ?: []);

        $numbers = imap_search($imap, $searchCriteria) ?: [];
        rsort($numbers);

        foreach (array_slice($numbers, 0, $subjectLimit) as $emailNumber) {
            $overviewList = imap_fetch_overview($imap, (string) $emailNumber, 0) ?: [];
            if ($overviewList === []) {
                continue;
            }
            $overview = $overviewList[0];
            $subject = isset($overview->subject) ? $this->decodeImapText((string) $overview->subject) : '';
            $from = isset($overview->from) ? $this->decodeImapText((string) $overview->from) : '';
            $email = $this->extractEmail($from);

            $senderMatch = $this->senderAllowed($email);
            $subjectMatch = $this->subjectAccepted($subject, $subjectFilter);
            $stats['sender_matches'] += $senderMatch ? 1 : 0;
            $stats['subject_matches'] += $subjectMatch ? 1 : 0;
            $stats['full_matches'] += ($senderMatch && $subjectMatch) ? 1 : 0;

            $stats['subject_samples'][] = [
                'subject' => $subject,
                'from' => $email,
                'sender_match' => $senderMatch,
                'subject_match' => $subjectMatch,
                'matches_configured_filters' => $senderMatch && $subjectMatch,
            ];
        }

        imap_close($imap);
        return $stats;
    }

    private function resolveFolders(array $options): array
    {
        if (! empty($options['folders']) && is_array($options['folders'])) {
            return array_values(array_filter(array_map('trim', $options['folders'])));
        }

        if (! empty($options['folder'])) {
            return [trim((string) $options['folder'])];
        }

        if (! empty($options['mailbox_folder'])) {
            return [trim((string) $options['mailbox_folder'])];
        }

        $resolvedFolder = trim((string) ($this->activeImapConfig['folder'] ?? 'INBOX'));
        return [$resolvedFolder !== '' ? $resolvedFolder : 'INBOX'];
    }

    private function connectToFolder(string $folder): array
    {
        $imap = $this->resolveImapConfig([]);
        $folder = trim($folder) !== '' ? trim($folder) : (string) ($imap['folder'] ?? 'INBOX');
        $path = $this->newsEmailConfig->buildConnectionString($imap, $folder);
        $conn = @imap_open($path, (string) $imap['username'], (string) $imap['password']);
        if ($conn === false) {
            return ['ok' => false, 'error' => imap_last_error() ?: 'imap_open failed', 'imap_last_error' => imap_last_error()];
        }

        return ['ok' => true, 'imap' => $conn, 'path' => $path];
    }

    private function listFolders($imap): array
    {
        $cfg = $this->resolveImapConfig([]);
        $base = sprintf('{%s:%d/imap}', $cfg['host'], (int) $cfg['port']);
        $boxes = imap_getmailboxes($imap, $base, '*') ?: [];
        $folders = [];
        foreach ($boxes as $box) {
            $folders[] = str_replace($base, '', imap_utf7_decode((string) $box->name));
        }
        sort($folders);

        return $folders;
    }

    private function fetchEmailBody($imap, int $emailNumber): string
    {
        $body = imap_fetchbody($imap, $emailNumber, '1.2');
        if (! is_string($body) || trim($body) === '') {
            $body = imap_fetchbody($imap, $emailNumber, '1');
        }
        if (! is_string($body) || trim($body) === '') {
            $body = imap_body($imap, $emailNumber);
        }

        return is_string($body) ? trim($body) : '';
    }

    private function decodeImapText(string $text): string
    {
        $decoded = @iconv_mime_decode($text, 0, 'UTF-8');
        if (is_string($decoded) && $decoded !== '') {
            return $decoded;
        }

        return imap_utf8($text);
    }

    private function extractEmail(string $from): string
    {
        if (preg_match('/<([^>]+)>/', $from, $m)) {
            return strtolower(trim($m[1]));
        }

        return strtolower(trim($from));
    }

    private function senderAllowed(string $email): bool
    {
        $allowed = array_map('mb_strtolower', (array) ($this->marketingConfig->newsScrape['allowed_senders'] ?? []));
        if ($allowed === []) {
            return true;
        }

        return in_array(mb_strtolower($email), $allowed, true);
    }

    private function subjectAccepted(string $subject, string $subjectFilter = ''): bool
    {
        if (trim($subjectFilter) !== '') {
            return stripos($subject, $subjectFilter) !== false;
        }

        $patterns = (array) ($this->marketingConfig->newsScrape['accepted_subject_patterns'] ?? []);
        if ($patterns === []) {
            return true;
        }

        foreach ($patterns as $pattern) {
            if (@preg_match((string) $pattern, $subject) === 1) {
                return true;
            }
        }

        return false;
    }

    private function determineRejectionReason(string $email, string $subject, string $subjectFilter = ''): ?string
    {
        if (! $this->senderAllowed($email)) {
            return 'sender_not_allowed';
        }

        if (! $this->subjectAccepted($subject, $subjectFilter)) {
            return 'subject_not_matched';
        }

        return null;
    }

    private function resolveImapConfig(array $options): array
    {
        if ($options === [] && $this->activeImapConfig !== []) {
            return $this->activeImapConfig;
        }

        $username = isset($options['username']) ? trim((string) $options['username']) : '';
        $mailboxLegacy = isset($options['mailbox']) ? trim((string) $options['mailbox']) : '';
        if ($username === '' && str_contains($mailboxLegacy, '@')) {
            $username = $mailboxLegacy;
        }
        $resolved = $this->newsEmailConfig->resolve($username !== '' ? $username : null);

        if (! empty($options['folder'])) {
            $resolved['folder'] = trim((string) $options['folder']);
        }

        if (empty($resolved['password']) && ! empty($this->marketingConfig->imap['password'])) {
            $resolved['password'] = (string) $this->marketingConfig->imap['password'];
        }

        return $resolved;
    }

    private function detectAlertType(string $text): string
    {
        $text = mb_strtolower($text);
        if (str_contains($text, 'press release alert')) {
            return 'press_release';
        }
        if (str_contains($text, 'news alert')) {
            return 'news';
        }
        if (str_contains($text, 'earnings')) {
            return 'earnings';
        }

        return 'general';
    }

    private function extractPublishDate(array $email): ?string
    {
        $rawDate = (string) ($email['date'] ?? $email['email_date'] ?? '');
        if ($rawDate === '') {
            return null;
        }

        $ts = strtotime($rawDate);
        if ($ts === false) {
            return null;
        }

        return date('Y-m-d H:i:s', $ts);
    }
}
