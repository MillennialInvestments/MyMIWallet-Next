<?php

namespace App\Libraries;

use App\Models\AlertsModel;

class TradeAlertMailboxFetcher
{
    private AlertsModel $alertsModel;

    public function __construct(?AlertsModel $alertsModel = null)
    {
        $this->alertsModel = $alertsModel ?? new AlertsModel();
    }

    /**
     * @param array<string, mixed> $options
     * @return array<string, mixed>
     */
    public function fetch(array $options = []): array
    {
        $start = microtime(true);
        $summary = [
            'emails_scanned' => 0,
            'new_stored' => 0,
            'duplicates_skipped' => 0,
            'moved_to_target' => 0,
            'move_failures' => 0,
            'db_failures' => 0,
            'errors' => [],
            'runtime_ms' => 0,
        ];

        if (! function_exists('imap_open')) {
            $summary['errors'][] = 'IMAP extension is not available.';
            $summary['runtime_ms'] = (int) ((microtime(true) - $start) * 1000);

            return $summary;
        }

        $folder = $this->cleanFolderName((string) ($options['folder'] ?? 'INBOX'));
        $targetFolder = $this->cleanFolderName((string) ($options['target_folder'] ?? 'Processed'));
        $limit = max(1, (int) ($options['limit'] ?? 200));
        $dryRun = (bool) ($options['dry_run'] ?? false);
        $verbose = (bool) ($options['verbose'] ?? false);
        $since = (string) ($options['since'] ?? '1 day ago');

        $config = $this->resolveImapConfig($folder);
        $imap = null;
        $criteria = $this->buildSinceCriteria($since);
        $canMoveToTarget = ! $dryRun;

        try {
            $imap = @imap_open($config['mailbox'], $config['user'], $config['pass']);
            if (! $imap) {
                throw new \RuntimeException('Failed to open IMAP mailbox: ' . $this->lastImapError());
            }

            if (! $dryRun) {
                $canMoveToTarget = $this->ensureTargetFolder($imap, $config['root'], $targetFolder, $summary, $verbose);
            }

            $emailNumbers = imap_search($imap, $criteria, SE_UID) ?: [];
            rsort($emailNumbers);
            $emailNumbers = array_slice($emailNumbers, 0, $limit);
            $summary['emails_scanned'] = count($emailNumbers);

            foreach ($emailNumbers as $uid) {
                $record = $this->buildRecordFromUid($imap, (int) $uid, $config['user']);
                if ($record === null) {
                    $summary['db_failures']++;
                    continue;
                }

                $identifier = (string) ($record['email_identifier'] ?? '');
                if ($identifier !== '' && $this->alertsModel->findScraperByIdentifier($identifier) !== null) {
                    $summary['duplicates_skipped']++;
                    if ($verbose) {
                        log_message('info', 'alerts:fetch-raw-emails duplicate skipped: {id}', ['id' => $identifier]);
                    }
                    continue;
                }

                if ($dryRun) {
                    $summary['new_stored']++;
                    continue;
                }

                $inserted = $this->alertsModel->insertRawScraperEmail($record);
                if (! $inserted) {
                    $summary['db_failures']++;
                    $summary['errors'][] = 'Insert failed for uid ' . (int) $uid;
                    continue;
                }

                $summary['new_stored']++;

                if (! $canMoveToTarget) {
                    if ($verbose) {
                        log_message('warning', 'alerts:fetch-raw-emails skipping mailbox move for uid {uid}; target folder unavailable.', ['uid' => (int) $uid]);
                    }
                    continue;
                }

                $moved = @imap_mail_move($imap, (string) $uid, $targetFolder, CP_UID);
                if (! $moved) {
                    $summary['move_failures']++;
                    $summary['errors'][] = 'Move failed for uid ' . (int) $uid . ': ' . $this->lastImapError();
                    continue;
                }

                $summary['moved_to_target']++;
            }

            if (! $dryRun && $summary['moved_to_target'] > 0) {
                @imap_expunge($imap);
            }
        } catch (\Throwable $e) {
            $summary['errors'][] = $e->getMessage();
        } finally {
            if (is_resource($imap) || $imap instanceof \IMAP\Connection) {
                @imap_close($imap);
            }
            $summary['runtime_ms'] = (int) ((microtime(true) - $start) * 1000);
        }

        return $summary;
    }

    /**
     * @return array<string, string>
     */
    private function resolveImapConfig(string $folder): array
    {
        $host = (string) env('alerts.imap.host', 'imap.dreamhost.com');
        $port = (int) env('alerts.imap.port', 993);
        $flags = (string) env('alerts.imap.flags', '/imap/ssl');
        if ($flags !== '' && $flags[0] !== '/') {
            $flags = '/' . $flags;
        }

        $root = '{' . $host . ':' . $port . $flags . '}';
        $mailbox = env('alerts.imap.mailbox');
        $mailbox = $mailbox ? (string) $mailbox : $root . $folder;
        $user = (string) env('alerts.imap.user', env('MYMI_ALERT_EMAIL', 'tradealerts@mymiwallet.com'));
        $pass = (string) env('alerts.imap.pass', '');

        return [
            'root' => $root,
            'mailbox' => $mailbox,
            'user' => $user,
            'pass' => $pass,
        ];
    }

    private function ensureTargetFolder($imap, string $root, string $targetFolder, array &$summary, bool $verbose): bool
    {
        $mailboxes = @imap_getmailboxes($imap, $root, '*') ?: [];
        foreach ($mailboxes as $mailbox) {
            $name = str_replace($root, '', (string) ($mailbox->name ?? ''));
            if (strcasecmp($name, $targetFolder) === 0) {
                return true;
            }
        }

        $created = @imap_createmailbox($imap, imap_utf7_encode($root . $targetFolder));
        if ($created) {
            if ($verbose) {
                log_message('info', 'alerts:fetch-raw-emails created missing target folder "{folder}".', ['folder' => $targetFolder]);
            }
            return true;
        }

        if (! $created) {
            $summary['errors'][] = 'Could not create target folder "' . $targetFolder . '". Inserts completed, but move/expunge was disabled for this run. IMAP error: ' . $this->lastImapError();
            if ($verbose) {
                log_message('warning', 'alerts:fetch-raw-emails target folder creation failed; move/expunge disabled.');
            }
        }

        return false;
    }

    /**
     * @return array<string, mixed>|null
     */
    private function buildRecordFromUid($imap, int $uid, string $sourceEmail): ?array
    {
        $overviewRows = imap_fetch_overview($imap, (string) $uid, FT_UID);
        if (! is_array($overviewRows) || $overviewRows === []) {
            return null;
        }

        $overview = $overviewRows[0];
        $headerText = imap_fetchheader($imap, (string) $uid, FT_UID) ?: '';
        $subject = $this->decodeMimeHeader((string) ($overview->subject ?? ''));
        $sender = $this->extractSender($headerText, $overview);
        $emailDate = $this->normalizeDate((string) ($overview->date ?? ''));
        $rawBody = imap_body($imap, (string) $uid, FT_UID) ?: '';
        $rawMessage = $headerText . "\r\n" . $rawBody;
        $body = $this->toUtf8((string) $rawMessage);
        $messageId = trim((string) ($overview->message_id ?? ''));
        $identifier = $messageId !== ''
            ? $messageId
            : hash('sha256', $subject . '|' . $emailDate . '|' . $sender . '|' . $body);
        $messageHash = hash('sha256', $body);

        $metadata = [
            'imap_uid' => $uid,
            'folder' => 'INBOX',
            'message_id' => $messageId,
            'raw_payload' => 'email_body stores full RFC822 payload (header + body) from IMAP',
            'fallback_identifier' => $messageId === '' ? 'sha256(subject|date|from|body)' : null,
            'overview' => [
                'size' => $overview->size ?? null,
                'seen' => $overview->seen ?? null,
            ],
        ];

        return [
            'email_subject' => $subject,
            'email_body' => $body,
            'email_date' => $emailDate,
            'email_sender' => $sender,
            'email_identifier' => $identifier,
            'source_email' => $sourceEmail,
            'source' => 'imap',
            'account_type' => 'tradealerts',
            'message_hash' => $messageHash,
            'status' => 'In Review',
            'email_type' => 'broker_alert',
            'metadata' => json_encode($metadata, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE),
            'created_on' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
    }

    private function extractBody($imap, int $uid): string
    {
        $structure = @imap_fetchstructure($imap, (string) $uid, FT_UID);
        if (! is_object($structure)) {
            $raw = imap_body($imap, (string) $uid, FT_UID) ?: '';
            return $this->toUtf8((string) $raw);
        }

        $parts = $this->flattenParts($structure);
        $plainPart = $this->findBestPartNumber($parts, 'PLAIN');
        $htmlPart = $this->findBestPartNumber($parts, 'HTML');

        if ($plainPart !== null) {
            $body = imap_fetchbody($imap, (string) $uid, $plainPart, FT_UID);
            return $this->decodePartBody((string) $body, $parts[$plainPart]['encoding']);
        }

        if ($htmlPart !== null) {
            $body = imap_fetchbody($imap, (string) $uid, $htmlPart, FT_UID);
            return $this->decodePartBody((string) $body, $parts[$htmlPart]['encoding']);
        }

        $raw = imap_body($imap, (string) $uid, FT_UID) ?: '';
        return $this->toUtf8((string) $raw);
    }

    /**
     * @param array<string, array<string, mixed>> $parts
     */
    private function findBestPartNumber(array $parts, string $subtype): ?string
    {
        foreach ($parts as $partNumber => $part) {
            if (strtoupper((string) ($part['subtype'] ?? '')) === $subtype) {
                return $partNumber;
            }
        }

        return null;
    }

    /**
     * @return array<string, array<string, mixed>>
     */
    private function flattenParts(object $structure, string $prefix = ''): array
    {
        $parts = [];
        if (! isset($structure->parts) || ! is_array($structure->parts)) {
            $parts[$prefix === '' ? '1' : $prefix] = [
                'encoding' => (int) ($structure->encoding ?? 0),
                'subtype' => (string) ($structure->subtype ?? ''),
            ];
            return $parts;
        }

        foreach ($structure->parts as $index => $part) {
            $partNumber = $prefix === '' ? (string) ($index + 1) : $prefix . '.' . ($index + 1);
            if (isset($part->parts) && is_array($part->parts)) {
                $parts += $this->flattenParts($part, $partNumber);
                continue;
            }

            $parts[$partNumber] = [
                'encoding' => (int) ($part->encoding ?? 0),
                'subtype' => (string) ($part->subtype ?? ''),
            ];
        }

        return $parts;
    }

    private function decodePartBody(string $body, int $encoding): string
    {
        switch ($encoding) {
            case 3:
                $decoded = base64_decode($body, true);
                $body = $decoded !== false ? $decoded : $body;
                break;
            case 4:
                $body = quoted_printable_decode($body);
                break;
            default:
                break;
        }

        return $this->toUtf8($body);
    }

    private function decodeMimeHeader(string $value): string
    {
        $decoded = @imap_mime_header_decode($value);
        if (! is_array($decoded) || $decoded === []) {
            return $this->toUtf8($value);
        }

        $text = '';
        foreach ($decoded as $part) {
            $text .= $part->text ?? '';
        }

        return $this->toUtf8($text);
    }

    private function extractSender(string $headerText, object $overview): string
    {
        $from = (string) ($overview->from ?? '');
        if ($from !== '') {
            return $this->toUtf8($from);
        }

        if (preg_match('/^From:\s*(.+)$/mi', $headerText, $matches) === 1) {
            return $this->toUtf8(trim($matches[1]));
        }

        return '';
    }

    private function normalizeDate(string $value): string
    {
        $timestamp = strtotime($value);
        if ($timestamp === false) {
            return date('Y-m-d H:i:s');
        }

        return date('Y-m-d H:i:s', $timestamp);
    }

    private function toUtf8(string $value): string
    {
        if ($value === '') {
            return '';
        }

        if (mb_check_encoding($value, 'UTF-8')) {
            return $value;
        }

        $converted = @mb_convert_encoding($value, 'UTF-8', 'UTF-8,ISO-8859-1,Windows-1252');
        if (is_string($converted) && $converted !== '') {
            return $converted;
        }

        return utf8_encode($value);
    }

    private function buildSinceCriteria(string $since): string
    {
        $since = trim($since);
        if ($since === '') {
            return 'ALL';
        }

        $timestamp = strtotime($since);
        if ($timestamp === false) {
            return 'ALL';
        }

        return 'SINCE "' . date('d-M-Y', $timestamp) . '"';
    }

    private function cleanFolderName(string $folder): string
    {
        $folder = trim($folder);
        if ($folder === '') {
            return 'INBOX';
        }

        return str_replace(['{', '}'], '', $folder);
    }

    private function lastImapError(): string
    {
        $error = imap_last_error();
        if (is_string($error) && $error !== '') {
            return $error;
        }

        return 'unknown IMAP error';
    }
}
