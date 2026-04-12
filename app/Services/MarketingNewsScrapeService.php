<?php

namespace App\Services;

use App\Models\AlertsModel;
use App\Models\MarketingModel;
use App\Services\EmailSubjectRoutingService;
use App\Services\Marketing\OcrService;
use Config\Database;
use Config\Marketing;
use Config\NewsEmailServer;

class MarketingNewsScrapeService
{
    /** @var array<string,mixed> */
    private array $activeImapConfig = [];
    /** @var array<string,array<string,string>> */
    private array $tableColumnsCache = [];
    public function __construct(
        private ?MarketingModel $marketingModel = null,
        private ?OcrService $ocrService = null,
        private ?Marketing $marketingConfig = null,
        private ?NewsEmailServer $newsEmailConfig = null,
        private ?AlertsModel $alertsModel = null,
        private ?EmailSubjectRoutingService $subjectRoutingService = null,
    ) {
        $this->marketingModel ??= new MarketingModel();
        $this->ocrService ??= new OcrService();
        $this->marketingConfig ??= config('Marketing');
        $this->newsEmailConfig ??= config('NewsEmailServer');
        $this->alertsModel ??= new AlertsModel();
        $this->subjectRoutingService ??= new EmailSubjectRoutingService($this->marketingConfig);
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
        $scanDepth = max($limit, (int) ($options['scan_depth'] ?? 500));
        $force = ! empty($options['force']);
        $searchCriteria = trim((string) ($options['search_criteria'] ?? 'ALL'));
        $cliSubjectFilter = trim((string) ($options['subject'] ?? ''));
        $defaultFilters = $this->marketingConfig->marketingNewsDefaultFilters ?? [];
        $subjectFilter = $cliSubjectFilter;
        $subjectFilterDisplay = $cliSubjectFilter !== '' ? $cliSubjectFilter : implode(', ', array_values(array_filter(array_map('trim', (array) $defaultFilters))));
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
            'subject_filter' => $subjectFilterDisplay,
            'routing_mode' => 'subject_rules',
            'routing_rules' => $this->marketingConfig->getEmailSubjectRouting(),
            'connection_ok' => false,
            'config_resolved' => ! empty($imap['host']) && ! empty($imap['username']),
            'password_present' => ! empty($imap['password']),
            'folder_exists' => false,
            'matched_subject_count' => 0,
            'parsed_count' => 0,
            'stored' => 0,
            'duplicate_skipped' => 0,
            'messages_scanned' => 0,
            'route_matched' => 0,
            'new_records_stored' => 0,
            'invalid_skipped' => 0,
            'moved_to_processed' => 0,
            'remaining_candidates' => 0,
            'parse_failed' => 0,
            'rejected_count' => 0,
            'rejections' => [],
            'items' => [],
            'folder_stats' => [],
            'debug' => [
                'mode' => $debugMode,
                'candidate_subjects' => [],
            ],
            'routing_summary' => [
                'marketing_news_matched' => 0,
                'investment_alerts_matched' => 0,
                'marketing_news_stored' => 0,
                'investment_alerts_stored' => 0,
                'rejected_count' => 0,
                'route_counts' => [],
                'keyword_counts' => [],
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
            $folderResult = $this->scanFolder($folder, $limit, $scanDepth, $force, $searchCriteria, $subjectFilter, $debugMode, $debugSubjectLimit, $availableFolders);
            $report['folder_stats'][] = $folderResult;
            $report['folder_exists'] = $report['folder_exists'] || ($folderResult['folder_exists'] ?? false);
            $report['matched_subject_count'] += (int) ($folderResult['matched_subject_count'] ?? 0);
            $report['parsed_count'] += (int) ($folderResult['parsed_count'] ?? 0);
            $report['stored'] += (int) ($folderResult['stored'] ?? 0);
            $report['duplicate_skipped'] += (int) ($folderResult['duplicate_skipped'] ?? 0);
            $report['messages_scanned'] += (int) ($folderResult['messages_scanned'] ?? 0);
            $report['route_matched'] += (int) ($folderResult['route_matched'] ?? 0);
            $report['new_records_stored'] += (int) ($folderResult['new_records_stored'] ?? 0);
            $report['invalid_skipped'] += (int) ($folderResult['invalid_skipped'] ?? 0);
            $report['moved_to_processed'] += (int) ($folderResult['moved_to_processed'] ?? 0);
            $report['remaining_candidates'] += (int) ($folderResult['remaining_candidates'] ?? 0);
            $report['parse_failed'] += (int) ($folderResult['parse_failed'] ?? 0);
            $report['rejected_count'] += (int) ($folderResult['rejected_count'] ?? 0);
            $report['routing_summary']['marketing_news_stored'] += (int) ($folderResult['marketing_news_stored'] ?? 0);
            $report['routing_summary']['investment_alerts_stored'] += (int) ($folderResult['investment_alerts_stored'] ?? 0);
            $report['routing_summary']['marketing_news_matched'] += (int) ($folderResult['marketing_news_matched'] ?? 0);
            $report['routing_summary']['investment_alerts_matched'] += (int) ($folderResult['investment_alerts_matched'] ?? 0);
            $report['routing_summary']['rejected_count'] += (int) ($folderResult['rejected_count'] ?? 0);
            foreach ((array) ($folderResult['route_counts'] ?? []) as $route => $count) {
                $report['routing_summary']['route_counts'][$route] = (int) (($report['routing_summary']['route_counts'][$route] ?? 0) + (int) $count);
            }
            foreach ((array) ($folderResult['keyword_counts'] ?? []) as $keyword => $count) {
                $report['routing_summary']['keyword_counts'][$keyword] = (int) (($report['routing_summary']['keyword_counts'][$keyword] ?? 0) + (int) $count);
            }
            $report['items'] = array_merge($report['items'], $folderResult['items'] ?? []);
            $report['rejections'] = array_merge($report['rejections'], $folderResult['rejections'] ?? []);
            $report['debug']['candidate_subjects'][$folder] = $folderResult['candidate_subjects'] ?? [];
        }

        $report['backfill'] = $this->repairMisroutedEmailRoutes($force);

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
        $cliSubjectFilter = trim((string) ($options['subject'] ?? ''));
        $defaultFilters = $this->marketingConfig->marketingNewsDefaultFilters ?? [];
        $subjectFilter = $cliSubjectFilter;
        $subjectFilterDisplay = $cliSubjectFilter !== '' ? $cliSubjectFilter : implode(', ', array_values(array_filter(array_map('trim', (array) $defaultFilters))));
        $subjectLimit = max(1, (int) ($options['subject_limit'] ?? 10));

        $diag = [
            'connection' => [
                'host' => $imap['host'] ?? '',
                'port' => (int) ($imap['port'] ?? 993),
                'encryption' => $imap['encryption'] ?? 'ssl',
                'username' => $imap['username'] ?? '',
                'folder' => $imap['folder'] ?? 'INBOX',
                'search_criteria' => $searchCriteria,
                'subject_filter' => $subjectFilterDisplay,
                'routing_mode' => 'subject_rules',
                'routing_rules' => $this->marketingConfig->getEmailSubjectRouting(),
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
            'metadata' => json_encode(['source' => 'email', 'category' => 'marketing_news']),
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

    public function storeTempRecord(array $payload): array
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

        $routeCategory = trim((string) ($payload['route_category'] ?? 'marketing_news'));
        $type = trim((string) ($payload['type'] ?? ''));

        if ($type === '') {
            if ($routeCategory !== '') {
                $type = $routeCategory;
            } elseif (! empty($payload['category'])) {
                $type = trim((string) $payload['category']);
            } else {
                $type = 'marketing_news';
            }
        }

        $status = trim((string) ($payload['status'] ?? ''));
        if ($status === '' || mb_strtolower($status) === 'processed') {
            $status = (string) ($this->marketingConfig->tempScraper['default_status'] ?? 'pending');
        }

        $metadata = $payload['metadata'] ?? json_encode([
            'source' => 'email',
            'category' => 'marketing_news',
            'type' => $type,
            'route_category' => $routeCategory !== '' ? $routeCategory : 'marketing_news',
            'matched_keyword' => $payload['matched_keyword'] ?? null,
            'source_mailbox' => $payload['source_mailbox'] ?? ($this->activeImapConfig['username'] ?? null),
            'source_folder' => $payload['source_folder'] ?? null,
            'imap_uid' => isset($payload['imap_uid']) ? (int) $payload['imap_uid'] : null,
            'message_id' => $payload['message_id'] ?? null,
            'email_identifier' => $payload['email_identifier'] ?? null,
            'ingested_at' => $payload['ingested_at'] ?? date('Y-m-d H:i:s'),
        ], JSON_UNESCAPED_SLASHES);

        $row = [
            'status' => $status,
            'title' => $payload['title'] ?? null,
            'content' => $payload['content'] ?? null,
            'summary' => null,
            'source' => $payload['source'] ?? 'email',
            'type' => $type,
            'category' => $payload['category'] ?? 'marketing_news',
            'subcategory' => $payload['subcategory'] ?? ($payload['matched_keyword'] ?? null),
            'source_type' => $payload['source_type'] ?? 'email_alert',
            'source_provider' => $payload['source_provider'] ?? null,
            'alert_type' => $payload['alert_type'] ?? null,
            'sender_email' => $payload['sender_email'] ?? null,
            'source_message_id' => $payload['source_message_id'] ?? null,
            'email_subject' => $payload['email_subject'] ?? ($payload['title'] ?? null),
            'email_sender' => $payload['email_sender'] ?? ($payload['sender_email'] ?? null),
            'email_date' => $payload['email_date'] ?? null,
            'email_identifier' => $emailIdentifier !== '' ? $emailIdentifier : ($payload['source_message_id'] ?? null),
            'metadata' => $metadata,
            'source_mailbox' => $payload['source_mailbox'] ?? null,
            'source_folder' => $payload['source_folder'] ?? null,
            'imap_uid' => $payload['imap_uid'] ?? null,
            'message_id' => $payload['message_id'] ?? null,
            'route_category' => $routeCategory !== '' ? $routeCategory : 'marketing_news',
            'ingested_at' => $payload['ingested_at'] ?? date('Y-m-d H:i:s'),
            'moved_to_processed_at' => null,
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

        $safeRow = $this->filterTableColumns($table, $row);

        // Match existing by email_identifier
        if ($emailIdentifier !== '') {
            $existing = $db->table($table)
                ->select('id')
                ->where('email_identifier', $emailIdentifier)
                ->get()
                ->getRowArray();

            if (! empty($existing['id'])) {
                $existingId = (int) $existing['id'];

                if (! $force) {
                    return [
                        'id' => $existingId,
                        'action' => 'duplicate',
                        'matched_on' => 'email_identifier',
                    ];
                }

                $safeRow['modified_on'] = date('Y-m-d H:i:s');
                $safeRow['processed'] = 0;
                $safeRow['processed_at'] = null;
                $safeRow['status'] = 'pending';

                $db->table($table)
                    ->where('id', $existingId)
                    ->update($safeRow);

                return [
                    'id' => $existingId,
                    'action' => 'updated',
                    'matched_on' => 'email_identifier',
                ];
            }
        }

        // Match existing by source_message_id
        if ($sourceMessageId !== '') {
            $existing = $db->table($table)
                ->select('id')
                ->where('source_message_id', $sourceMessageId)
                ->get()
                ->getRowArray();

            if (! empty($existing['id'])) {
                $existingId = (int) $existing['id'];

                if (! $force) {
                    return [
                        'id' => $existingId,
                        'action' => 'duplicate',
                        'matched_on' => 'source_message_id',
                    ];
                }

                $safeRow['modified_on'] = date('Y-m-d H:i:s');
                $safeRow['processed'] = 0;
                $safeRow['processed_at'] = null;
                $safeRow['status'] = 'pending';

                $db->table($table)
                    ->where('id', $existingId)
                    ->update($safeRow);

                return [
                    'id' => $existingId,
                    'action' => 'updated',
                    'matched_on' => 'source_message_id',
                ];
            }
        }

        // Match existing by content_hash when dedupe is enabled
        if ($dedupe) {
            $existing = $db->table($table)
                ->select('id')
                ->where('content_hash', $contentHash)
                ->get()
                ->getRowArray();

            if (! empty($existing['id'])) {
                $existingId = (int) $existing['id'];

                if (! $force) {
                    return [
                        'id' => $existingId,
                        'action' => 'duplicate',
                        'matched_on' => 'content_hash',
                    ];
                }

                $safeRow['modified_on'] = date('Y-m-d H:i:s');
                $safeRow['processed'] = 0;
                $safeRow['processed_at'] = null;
                $safeRow['status'] = 'pending';

                $db->table($table)
                    ->where('id', $existingId)
                    ->update($safeRow);

                return [
                    'id' => $existingId,
                    'action' => 'updated',
                    'matched_on' => 'content_hash',
                ];
            }
        }

        $db->table($table)->insert($safeRow);

        return [
            'id' => (int) $db->insertID(),
            'action' => 'inserted',
            'matched_on' => null,
        ];
    }

    private function scanFolder(string $folder, int $limit, int $scanDepth, bool $force, string $searchCriteria, string $subjectFilter, bool $debugMode, int $debugSubjectLimit, array $availableFolders): array
    {
        $result = [
            'folder' => $folder,
            'folder_exists' => in_array($folder, $availableFolders, true),
            'folder_message_count' => 0,
            'matched_subject_count' => 0,
            'parsed_count' => 0,
            'stored' => 0,
            'duplicate_skipped' => 0,
            'messages_scanned' => 0,
            'route_matched' => 0,
            'new_records_stored' => 0,
            'invalid_skipped' => 0,
            'moved_to_processed' => 0,
            'remaining_candidates' => 0,
            'parse_failed' => 0,
            'rejected_count' => 0,
            'candidate_subjects' => [],
            'rejections' => [],
            'items' => [],
            'marketing_news_stored' => 0,
            'investment_alerts_stored' => 0,
            'marketing_news_matched' => 0,
            'investment_alerts_matched' => 0,
            'route_counts' => [],
            'keyword_counts' => [],
            'refreshed_existing' => 0,
            'in_run_duplicate_skipped' => 0,
            'inserted_count' => 0,
            'updated_count' => 0,
            'duplicate_count' => 0,
        ];

        $conn = $this->connectToFolder($folder);
        if (! $conn['ok']) {
            $result['rejections'][] = [
                'folder' => $folder,
                'reason' => 'folder_connect_failed',
                'detail' => $conn['error'],
            ];
            $result['rejected_count']++;
            return $result;
        }

        $imap = $conn['imap'];
        $check = imap_check($imap);
        $result['folder_message_count'] = (int) ($check->Nmsgs ?? 0);

        $emailNumbers = imap_search($imap, $searchCriteria) ?: [];
        rsort($emailNumbers);

        $candidates = array_slice($emailNumbers, 0, max(1, $scanDepth));
        $mailbox = trim((string) ($this->activeImapConfig['username'] ?? ''));

        $seenIdentifiers = [];
        $seenStoredIds = [];
        $seenMessageKeys = [];

        foreach ($candidates as $emailNumber) {
            if ((int) $result['new_records_stored'] >= $limit) {
                break;
            }

            $result['messages_scanned']++;

            $overviewList = imap_fetch_overview($imap, (string) $emailNumber, 0) ?: [];
            if ($overviewList === []) {
                continue;
            }

            $overview = $overviewList[0];
            $subject = isset($overview->subject) ? $this->decodeImapText((string) $overview->subject) : '';
            $from = isset($overview->from) ? $this->decodeImapText((string) $overview->from) : '';
            $emailAddress = $this->extractEmail($from);

            $result['candidate_subjects'][] = [
                'subject' => $subject,
                'from' => $emailAddress,
                'matches' => false,
            ];
            if (count($result['candidate_subjects']) > $debugSubjectLimit) {
                array_shift($result['candidate_subjects']);
            }

            $route = $this->resolveSubjectRoute($subject);
            $routeKey = (string) ($route['category'] ?? 'unroutable');
            $result['route_counts'][$routeKey] = (int) (($result['route_counts'][$routeKey] ?? 0) + 1);

            if (! empty($route['keyword'])) {
                $result['keyword_counts'][$route['keyword']] = (int) (($result['keyword_counts'][$route['keyword']] ?? 0) + (int) 1);
            }

            if (($route['category'] ?? null) === 'investment_alerts') {
                $result['investment_alerts_matched']++;
            } elseif (($route['category'] ?? null) === 'marketing_news') {
                $result['marketing_news_matched']++;
            }

            $reason = $this->determineRejectionReason($emailAddress, $subject, $route['category'], $subjectFilter);
            if ($reason !== null) {
                $result['invalid_skipped']++;
                $result['rejected_count']++;
                $result['rejections'][] = [
                    'folder' => $folder,
                    'subject' => $subject,
                    'from' => $emailAddress,
                    'reason' => $reason,
                    'route' => $route,
                ];
                continue;
            }

            $result['route_matched']++;
            $result['matched_subject_count']++;

            $lastIdx = count($result['candidate_subjects']) - 1;
            if ($lastIdx >= 0) {
                $result['candidate_subjects'][$lastIdx]['matches'] = true;
            }

            if ($debugMode) {
                continue;
            }

            $imapUid = (int) imap_uid($imap, (int) $emailNumber);
            $messageId = trim((string) ($overview->message_id ?? ''));

            $identity = $this->resolveEmailIdentity($mailbox, $folder, $imapUid, $messageId);
            $identityKey = $identity['email_identifier'] !== ''
                ? $identity['email_identifier']
                : ($identity['message_id'] !== '' ? $identity['message_id'] : ($folder . ':' . $emailNumber));

            if (isset($seenIdentifiers[$identityKey])) {
                $result['duplicate_skipped']++;
                $result['duplicate_count']++;
                $result['in_run_duplicate_skipped']++;
                continue;
            }
            $seenIdentifiers[$identityKey] = true;

            if (! $force && $this->isDuplicateForRoute((string) ($route['category'] ?? ''), $identity)) {
                $result['duplicate_skipped']++;
                $result['duplicate_count']++;
                continue;
            }

            $body = $this->fetchEmailBody($imap, (int) $emailNumber);

            $messageKey = hash('sha256', implode('|', [
                $folder,
                mb_strtolower(trim($subject)),
                mb_strtolower(trim($emailAddress)),
                $messageId !== '' ? $messageId : '',
                mb_substr(mb_strtolower(trim($body)), 0, 500),
            ]));

            if (isset($seenMessageKeys[$messageKey])) {
                $result['duplicate_skipped']++;
                $result['duplicate_count']++;
                $result['in_run_duplicate_skipped']++;
                continue;
            }
            $seenMessageKeys[$messageKey] = true;

            $parsed = $this->parseAlertEmail([
                'subject' => $subject,
                'body' => $body,
                'from' => $emailAddress,
                'message_id' => $messageId !== '' ? $messageId : md5($subject . $emailAddress),
                'date' => (string) ($overview->date ?? ''),
                'uid' => $imapUid,
                'folder' => $folder,
            ]);

            if ($parsed === null) {
                $result['parse_failed']++;
                $result['invalid_skipped']++;
                $result['rejected_count']++;
                $result['rejections'][] = [
                    'folder' => $folder,
                    'subject' => $subject,
                    'from' => $emailAddress,
                    'reason' => 'parse_failed',
                ];
                continue;
            }

            $result['parsed_count']++;

            $parsed['route_category'] = $route['category'];
            $parsed['matched_keyword'] = $route['keyword'];
            $parsed['source_mailbox'] = $mailbox;
            $parsed['source_folder'] = $folder;
            $parsed['imap_uid'] = $imapUid;
            $parsed['message_id'] = $messageId !== '' ? $messageId : null;
            $parsed['email_identifier'] = $identity['email_identifier'];
            $parsed['ingested_at'] = date('Y-m-d H:i:s');

            if (($route['category'] ?? null) === 'investment_alerts') {
                $investmentId = $this->storeInvestmentRecord($parsed + ['force' => $force]);
                $storeResult = [
                    'id' => (int) $investmentId,
                    'action' => $investmentId > 0 ? 'inserted' : 'duplicate',
                    'matched_on' => $investmentId > 0 ? null : 'investment_duplicate',
                ];
            } else {
                $storeResult = $this->storeTempRecord($parsed + ['force' => $force]);
            }

            $storedId = (int) ($storeResult['id'] ?? 0);
            $action = (string) ($storeResult['action'] ?? 'duplicate');
            $matchedOn = $storeResult['matched_on'] ?? null;

            if ($storedId <= 0) {
                $result['duplicate_skipped']++;
                $result['duplicate_count']++;
                continue;
            }

            if (isset($seenStoredIds[$storedId])) {
                $result['duplicate_skipped']++;
                $result['duplicate_count']++;
                $result['in_run_duplicate_skipped']++;
                continue;
            }
            $seenStoredIds[$storedId] = true;

            if ($action === 'duplicate') {
                $result['duplicate_skipped']++;
                $result['duplicate_count']++;
                continue;
            }

            if ($action === 'updated') {
                $result['refreshed_existing']++;
                $result['updated_count']++;

                $result['items'][] = [
                    'id' => $storedId,
                    'title' => $parsed['title'] ?? '',
                    'folder' => $folder,
                    'route' => $route,
                    'email_identifier' => $identity['email_identifier'],
                    'action' => 'updated',
                    'matched_on' => $matchedOn,
                ];
                continue;
            }

            $result['stored']++;
            $result['new_records_stored']++;
            $result['inserted_count']++;

            if (($route['category'] ?? null) === 'investment_alerts') {
                $result['investment_alerts_stored']++;
            } elseif (($route['category'] ?? null) === 'marketing_news') {
                $result['marketing_news_stored']++;
            }

            $result['items'][] = [
                'id' => $storedId,
                'title' => $parsed['title'] ?? '',
                'folder' => $folder,
                'route' => $route,
                'email_identifier' => $identity['email_identifier'],
                'action' => 'inserted',
                'matched_on' => $matchedOn,
            ];
        }

        $result['remaining_candidates'] = max(0, count($candidates) - (int) $result['messages_scanned']);

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

    private function subjectAccepted(string $subject, ?string $routeCategory = null, string $subjectFilter = ''): bool
    {
        if (trim($subjectFilter) !== '') {
            return stripos($subject, $subjectFilter) !== false;
        }

        return $routeCategory !== null;
    }

    private function determineRejectionReason(string $email, string $subject, ?string $routeCategory = null, string $subjectFilter = ''): ?string
    {
        if (! $this->senderAllowed($email)) {
            return 'sender_not_allowed';
        }

        if (! $this->subjectAccepted($subject, $routeCategory, $subjectFilter)) {
            return 'subject_not_routable';
        }

        return null;
    }

    /**
     * @return array{category:?string,keyword:?string}
     */
    private function resolveSubjectRoute(string $subject): array
    {
        return $this->subjectRoutingService->resolveEmailRoute($subject);
    }

    private function storeInvestmentRecord(array $payload): int
    {
        $identifier = trim((string) ($payload['email_identifier'] ?? ''));
        $sourceMailbox = trim((string) ($payload['source_mailbox'] ?? $this->activeImapConfig['username'] ?? 'tradealerts@mymiwallet.com'));
        $sourceFolder = trim((string) ($payload['source_folder'] ?? 'INBOX'));
        $imapUid = (int) ($payload['imap_uid'] ?? 0);
        $messageId = trim((string) ($payload['message_id'] ?? $payload['source_message_id'] ?? ''));
        $messageHash = hash('sha256', mb_strtolower(trim((string) ($payload['email_subject'] ?? $payload['title'] ?? ''))) . '|' . mb_strtolower(trim((string) ($payload['content'] ?? ''))));

        if ($identifier !== '' && $this->alertsModel->isEmailProcessed($identifier)) {
            return 0;
        }
        if ($this->alertsModel->findScraperByMessageHash($sourceMailbox . ':' . $sourceFolder, $messageHash) !== null) {
            return 0;
        }

        $rawBody = (string) ($payload['raw_body'] ?? $payload['content'] ?? '');
        $cleanBody = $this->cleanFooterNoise($rawBody);
        $metadata = [
            'source' => 'email',
            'category' => 'investment_alert',
            'route_category' => $payload['route_category'] ?? 'investment_alerts',
            'matched_keyword' => $payload['matched_keyword'] ?? null,
            'source_mailbox' => $sourceMailbox,
            'source_folder' => $sourceFolder,
            'imap_uid' => $imapUid > 0 ? $imapUid : null,
            'message_id' => $messageId !== '' ? $messageId : null,
            'email_identifier' => $identifier !== '' ? $identifier : null,
            'ingested_at' => $payload['ingested_at'] ?? date('Y-m-d H:i:s'),
        ];

        $data = [
            'title' => $payload['title'] ?? $payload['email_subject'] ?? null,
            'subject' => $payload['email_subject'] ?? $payload['title'] ?? null,
            'email_sender' => $payload['email_sender'] ?? $payload['sender_email'] ?? null,
            'email_date' => $payload['email_date'] ?? date('Y-m-d H:i:s'),
            'raw_email_body' => $rawBody,
            'email_body' => $cleanBody,
            'content' => $cleanBody,
            'email_identifier' => $identifier !== '' ? $identifier : ($sourceMailbox . ':' . ($payload['source_message_id'] ?? md5($messageHash))),
            'source' => $sourceMailbox . ':' . $sourceFolder,
            'account_type' => 'email',
            'email_type' => 'investment_alert',
            'message_hash' => $messageHash,
            'metadata' => json_encode($metadata, JSON_UNESCAPED_SLASHES),
            'source_mailbox' => $sourceMailbox,
            'source_folder' => $sourceFolder,
            'imap_uid' => $imapUid > 0 ? $imapUid : null,
            'message_id' => $messageId !== '' ? $messageId : null,
            'route_category' => $payload['route_category'] ?? 'investment_alerts',
            'ingested_at' => $payload['ingested_at'] ?? date('Y-m-d H:i:s'),
            'moved_to_processed_at' => null,
            'status' => 'New',
            'created_on' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        return $this->alertsModel->insertInvestmentAlertEmail($data);
    }

    private function repairMisroutedEmailRoutes(bool $force): array
    {
        $db = Database::connect();
        if (! $db->tableExists('bf_marketing_temp_scraper') || ! $db->tableExists('bf_investment_scraper')) {
            return ['marketing_to_investment_migrated' => 0, 'investment_to_marketing_migrated' => 0, 'already_correct' => 0, 'skipped' => 0];
        }

        $tempRows = $this->fetchRepairRows('bf_marketing_temp_scraper', 500, static function ($builder): void {
            $builder->groupStart()
                ->where('status', 'pending')
                ->orWhere('status', 'rejected')
                ->orWhere('status', 'new')
                ->groupEnd();
        });

        $marketingToInvestmentMigrated = 0;
        $investmentToMarketingMigrated = 0;
        $alreadyCorrect = 0;
        $skipped = 0;
        foreach ($tempRows as $row) {
            $normalized = $this->normalizeRepairRow($row, 'bf_marketing_temp_scraper');
            $subject = $normalized['subject'];
            $route = $this->resolveSubjectRoute($subject);
            if (($route['category'] ?? null) !== 'investment_alerts') {
                if (($route['category'] ?? null) === 'marketing_news') {
                    $alreadyCorrect++;
                }
                continue;
            }

            $id = $this->storeInvestmentRecord([
                'title' => $normalized['title'] !== '' ? $normalized['title'] : $subject,
                'email_subject' => $subject,
                'email_sender' => $normalized['sender'],
                'email_date' => $normalized['email_date'],
                'email_identifier' => $normalized['email_identifier'],
                'source_message_id' => $normalized['source_message_id'],
                'content' => $normalized['content'],
                'raw_body' => $normalized['content'],
                'route_category' => $route['category'],
                'matched_keyword' => $route['keyword'],
                'force' => $force,
            ]);

            if ($id > 0 || ! empty($row['email_identifier'])) {
                $db->table('bf_marketing_temp_scraper')
                    ->where('id', (int) $row['id'])
                    ->update([
                        'status' => 'routed_to_investment',
                        'processed' => 1,
                        'processed_at' => date('Y-m-d H:i:s'),
                        'modified_on' => date('Y-m-d H:i:s'),
                        'metadata' => json_encode([
                            'source' => 'email',
                            'category' => 'investment_alert',
                            'route_category' => 'investment_alerts',
                            'matched_keyword' => $route['keyword'],
                            'migrated_to_investment' => true,
                        ], JSON_UNESCAPED_SLASHES),
                    ]);
                $marketingToInvestmentMigrated++;
            } else {
                $skipped++;
            }
        }

        $investmentRows = $this->fetchRepairRows('bf_investment_scraper', 500);

        foreach ($investmentRows as $row) {
            $normalized = $this->normalizeRepairRow($row, 'bf_investment_scraper');
            $subject = $normalized['subject'];
            $route = $this->resolveSubjectRoute($subject);
            if (($route['category'] ?? null) !== 'marketing_news') {
                if (($route['category'] ?? null) === 'investment_alerts') {
                    $alreadyCorrect++;
                }
                continue;
            }

            $payload = [
                'title' => $normalized['title'] !== '' ? $normalized['title'] : $subject,
                'content' => $normalized['content'],
                'email_subject' => $subject,
                'email_sender' => $normalized['sender'],
                'email_date' => $normalized['email_date'],
                'email_identifier' => $normalized['email_identifier'],
                'source_message_id' => $normalized['source_message_id'],
                'source' => 'email',
                'category' => 'marketing_news',
                'route_category' => 'marketing_news',
                'matched_keyword' => $route['keyword'] ?? null,
                'status' => 'pending',
                'force' => $force,
            ];

            $storedId = $this->storeTempRecord($payload);
            if ($storedId > 0) {
                $db->table('bf_investment_scraper')
                    ->where('id', (int) ($row['id'] ?? 0))
                    ->update($this->filterTableColumns('bf_investment_scraper', [
                        'status' => 'Reclassified-Marketing',
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]));
                $investmentToMarketingMigrated++;
            } else {
                $skipped++;
            }
        }

        return [
            'marketing_to_investment_migrated' => $marketingToInvestmentMigrated,
            'investment_to_marketing_migrated' => $investmentToMarketingMigrated,
            'already_correct' => $alreadyCorrect,
            'skipped' => $skipped,
        ];
    }

    /**
     * @param callable|null $queryMutator
     * @return array<int,array<string,mixed>>
     */
    private function fetchRepairRows(string $table, int $limit, ?callable $queryMutator = null): array
    {
        $db = Database::connect();
        if (! $db->tableExists($table)) {
            return [];
        }

        $preferredColumns = ['id', 'title', 'subject', 'email_subject', 'content', 'email_body', 'raw_email_body', 'email_sender', 'sender_email', 'email_date', 'email_identifier', 'source_message_id', 'metadata', 'source', 'status'];
        $select = $this->buildExistingColumnSelect($table, $preferredColumns);
        if ($select === []) {
            return [];
        }

        $builder = $db->table($table)->select(implode(', ', $select), false);
        if ($queryMutator !== null) {
            $queryMutator($builder);
        }
        $builder->orderBy('id', 'DESC')->limit($limit);

        return $builder->get()->getResultArray();
    }

    /**
     * @param array<string,mixed> $row
     * @return array{title:string,subject:string,content:string,sender:?string,email_date:?string,email_identifier:?string,source_message_id:?string,source:string}
     */
    private function normalizeRepairRow(array $row, string $table): array
    {
        $subject = trim((string) ($row['email_subject'] ?? $row['subject'] ?? $row['title'] ?? ''));
        $identifier = trim((string) ($row['email_identifier'] ?? ''));

        return [
            'title' => trim((string) ($row['title'] ?? $subject)),
            'subject' => $subject,
            'content' => trim((string) ($row['content'] ?? $row['email_body'] ?? $row['raw_email_body'] ?? '')),
            'sender' => $row['email_sender'] ?? $row['sender_email'] ?? null,
            'email_date' => $row['email_date'] ?? null,
            'email_identifier' => $identifier !== '' ? $identifier : null,
            'source_message_id' => trim((string) ($row['source_message_id'] ?? '')) !== ''
                ? (string) $row['source_message_id']
                : ($identifier !== '' ? $identifier : ($table . ':' . ((string) ($row['id'] ?? '')))),
            'source' => (string) ($row['source'] ?? 'email'),
        ];
    }

    /**
     * @param array<int,string> $preferredColumns
     * @return array<int,string>
     */
    private function buildExistingColumnSelect(string $table, array $preferredColumns): array
    {
        $db = Database::connect();
        if (! $db->tableExists($table)) {
            return [];
        }

        $fields = [];
        foreach ($db->getFieldData($table) as $field) {
            $name = (string) $field->name;
            $fields[strtolower($name)] = $name;
        }

        $select = [];
        foreach ($preferredColumns as $column) {
            $lookup = strtolower($column);
            if (isset($fields[$lookup])) {
                $select[] = $fields[$lookup];
            }
        }

        return $select;
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

    /**
     * @return array{email_identifier:string,mailbox:string,folder:string,imap_uid:int,message_id:string}
     */
    private function resolveEmailIdentity(string $mailbox, string $folder, int $imapUid, string $messageId): array
    {
        $mailbox = trim($mailbox);
        $folder = trim($folder) !== '' ? trim($folder) : 'INBOX';
        $messageId = trim($messageId);
        $identifier = $imapUid > 0
            ? trim($mailbox . ':' . $folder . ':' . $imapUid)
            : ($messageId !== '' ? trim($mailbox . ':' . $folder . ':' . $messageId) : trim($mailbox . ':' . $folder . ':fallback'));

        return [
            'email_identifier' => $identifier,
            'mailbox' => $mailbox,
            'folder' => $folder,
            'imap_uid' => $imapUid,
            'message_id' => $messageId,
        ];
    }

    /**
     * @param array{email_identifier:string,mailbox:string,folder:string,imap_uid:int,message_id:string} $identity
     */
    private function isDuplicateForRoute(string $routeCategory, array $identity): bool
    {
        $table = $routeCategory === 'investment_alerts' ? 'bf_investment_scraper' : 'bf_marketing_temp_scraper';
        $db = Database::connect();
        if (! $db->tableExists($table)) {
            return false;
        }

        return $this->matchByEmailIdentifier($table, $identity['email_identifier'])
            || $this->matchByMailboxUid($table, $identity['mailbox'], $identity['imap_uid'])
            || $this->matchByMailboxMessageId($table, $identity['mailbox'], $identity['message_id']);
    }

    private function matchByEmailIdentifier(string $table, string $emailIdentifier): bool
    {
        if ($emailIdentifier === '') {
            return false;
        }

        $column = $this->tableColumn($table, 'email_identifier');
        if ($column === null) {
            return false;
        }

        return Database::connect()->table($table)->where($column, $emailIdentifier)->countAllResults() > 0;
    }

    private function matchByMailboxUid(string $table, string $mailbox, int $imapUid): bool
    {
        if ($mailbox === '' || $imapUid <= 0) {
            return false;
        }

        $mailboxColumn = $this->tableColumn($table, 'source_mailbox');
        $uidColumn = $this->tableColumn($table, 'imap_uid');
        if ($mailboxColumn !== null && $uidColumn !== null) {
            return Database::connect()->table($table)
                ->where($mailboxColumn, $mailbox)
                ->where($uidColumn, $imapUid)
                ->countAllResults() > 0;
        }

        return false;
    }

    private function matchByMailboxMessageId(string $table, string $mailbox, string $messageId): bool
    {
        if ($mailbox === '' || $messageId === '') {
            return false;
        }

        $mailboxColumn = $this->tableColumn($table, 'source_mailbox');
        $messageColumn = $this->tableColumn($table, 'message_id') ?? $this->tableColumn($table, 'source_message_id');
        if ($mailboxColumn !== null && $messageColumn !== null) {
            return Database::connect()->table($table)
                ->where($mailboxColumn, $mailbox)
                ->where($messageColumn, $messageId)
                ->countAllResults() > 0;
        }

        return false;
    }

    private function tableColumn(string $table, string $column): ?string
    {
        $key = strtolower($table);
        if (! isset($this->tableColumnsCache[$key])) {
            $fields = [];
            foreach (Database::connect()->getFieldData($table) as $field) {
                $fields[strtolower((string) $field->name)] = (string) $field->name;
            }
            $this->tableColumnsCache[$key] = $fields;
        }

        return $this->tableColumnsCache[$key][strtolower($column)] ?? null;
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

    /**
     * @param array<string,mixed> $row
     * @return array<string,mixed>
     */
    private function filterTableColumns(string $table, array $row): array
    {
        $db = Database::connect();
        if (! $db->tableExists($table)) {
            return $row;
        }

        $fields = [];
        foreach ($db->getFieldData($table) as $field) {
            $fields[strtolower((string) $field->name)] = (string) $field->name;
        }

        $safe = [];
        foreach ($row as $key => $value) {
            $normalized = strtolower((string) $key);
            if (isset($fields[$normalized])) {
                $safe[$fields[$normalized]] = $value;
            }
        }

        return $safe;
    }
}
