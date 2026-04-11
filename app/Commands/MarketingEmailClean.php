<?php

namespace App\Commands;

use CodeIgniter\CLI\CLI;
use Config\Database;
use Config\NewsEmailServer;

class MarketingEmailClean extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:email:clean';
    protected $description = 'Moves already-ingested emails from IMAP source folder into a processed folder.';

    public function run(array $params)
    {
        if (! function_exists('imap_open')) {
            CLI::write((string) json_encode(['status' => 'error', 'error' => 'imap_open not available'], JSON_PRETTY_PRINT));
            return;
        }

        $mailbox = trim((string) (CLI::getOption('mailbox') ?: CLI::getOption('username') ?: 'tradealerts@mymiwallet.com'));
        $sourceFolder = trim((string) (CLI::getOption('source-folder') ?: CLI::getOption('folder') ?: 'INBOX'));
        $targetFolder = trim((string) (CLI::getOption('target-folder') ?: 'INBOX.Processed'));
        $limit = max(1, (int) (CLI::getOption('limit') ?: 100));
        $dryRun = CLI::getOption('dry-run') !== null;

        $cfg = config('NewsEmailServer');
        if (! $cfg instanceof NewsEmailServer) {
            $cfg = new NewsEmailServer();
        }

        try {
            $imap = $cfg->resolve($mailbox);
        } catch (\Throwable $e) {
            CLI::write((string) json_encode(['status' => 'error', 'error' => $e->getMessage()], JSON_PRETTY_PRINT));
            return;
        }

        $path = $cfg->buildConnectionString($imap, $sourceFolder);
        $conn = @imap_open($path, (string) $imap['username'], (string) $imap['password']);
        if (! $conn) {
            CLI::write((string) json_encode(['status' => 'error', 'error' => imap_last_error() ?: 'imap_open failed'], JSON_PRETTY_PRINT));
            return;
        }

        $uids = imap_search($conn, 'ALL', SE_UID) ?: [];
        rsort($uids);

        $db = Database::connect();
        $summary = [
            'status' => 'success',
            'mailbox' => $mailbox,
            'source_folder' => $sourceFolder,
            'target_folder' => $targetFolder,
            'scanned' => 0,
            'eligible' => 0,
            'moved' => 0,
            'skipped' => 0,
            'dry_run' => $dryRun,
            'already_tracked_duplicates' => 0,
            'unresolved' => 0,
        ];

        $moveUids = [];
        foreach (array_slice($uids, 0, $limit) as $uid) {
            $summary['scanned']++;
            $overviewRows = imap_fetch_overview($conn, (string) $uid, FT_UID) ?: [];
            if ($overviewRows === []) {
                $summary['skipped']++;
                continue;
            }

            $overview = $overviewRows[0];
            $messageId = trim((string) ($overview->message_id ?? ''));
            $emailIdentifier = trim($mailbox . ':' . $sourceFolder . ':' . (int) $uid);

            $record = $this->findEligibleRecord($db, $mailbox, (int) $uid, $messageId, $emailIdentifier);
            if ($record === null) {
                $summary['unresolved']++;
                $summary['skipped']++;
                continue;
            }

            $summary['eligible']++;
            $summary['already_tracked_duplicates']++;
            if ($dryRun) {
                continue;
            }

            if (@imap_mail_move($conn, (string) $uid, $targetFolder, CP_UID)) {
                $moveUids[] = (int) $uid;
                $summary['moved']++;
                $this->markMoved($db, $record['table'], (int) $record['id']);
            } else {
                $summary['skipped']++;
            }
        }

        if (! $dryRun && $moveUids !== []) {
            @imap_expunge($conn);
        }

        if (is_resource($conn) || $conn instanceof \IMAP\Connection) {
            @imap_close($conn);
        }

        $summary['skipped'] = max($summary['skipped'], $summary['scanned'] - $summary['eligible']);
        CLI::write((string) json_encode($summary, JSON_PRETTY_PRINT));
    }

    private function findEligibleRecord($db, string $mailbox, int $uid, string $messageId, string $emailIdentifier): ?array
    {
        foreach (['bf_marketing_temp_scraper', 'bf_investment_scraper'] as $table) {
            if (! $db->tableExists($table)) {
                continue;
            }

            $columns = array_map(static fn ($f) => (string) $f->name, $db->getFieldData($table));
            $has = static fn (string $field): bool => in_array($field, $columns, true);
            $select = ['id'];
            foreach (['status', 'route_category', 'email_identifier', 'source_mailbox', 'imap_uid', 'message_id', 'moved_to_processed_at', 'metadata'] as $field) {
                if ($has($field)) {
                    $select[] = $field;
                }
            }

            $builder = $db->table($table)->select(implode(',', $select));
            $builder->groupStart();
            $matched = false;
            if ($has('email_identifier') && $emailIdentifier !== '') {
                $builder->where('email_identifier', $emailIdentifier);
                $matched = true;
            }
            if ($has('source_mailbox') && $has('imap_uid')) {
                if ($matched) {
                    $builder->orGroupStart()->where('source_mailbox', $mailbox)->where('imap_uid', $uid)->groupEnd();
                } else {
                    $builder->where('source_mailbox', $mailbox)->where('imap_uid', $uid);
                    $matched = true;
                }
            }
            if ($messageId !== '' && $has('source_mailbox') && $has('message_id')) {
                if ($matched) {
                    $builder->orGroupStart()->where('source_mailbox', $mailbox)->where('message_id', $messageId)->groupEnd();
                } else {
                    $builder->where('source_mailbox', $mailbox)->where('message_id', $messageId);
                    $matched = true;
                }
            }
            if (! $matched) {
                continue;
            }
            $builder->groupEnd();

            $row = $builder->orderBy('id', 'DESC')->get()->getRowArray();
            if (! is_array($row)) {
                continue;
            }

            $status = strtolower(trim((string) ($row['status'] ?? '')));
            $routeCategory = strtolower(trim((string) ($row['route_category'] ?? '')));
            if ($routeCategory === '' && ! empty($row['metadata'])) {
                $meta = json_decode((string) $row['metadata'], true);
                $routeCategory = strtolower(trim((string) (($meta['route_category'] ?? $meta['category'] ?? ''))));
            }

            if ($routeCategory === '' || in_array($status, ['failed', 'error', 'incomplete'], true) || ! empty($row['moved_to_processed_at'])) {
                return null;
            }

            return ['table' => $table, 'id' => (int) $row['id']];
        }

        return null;
    }

    private function markMoved($db, string $table, int $id): void
    {
        if (! $db->tableExists($table) || $id <= 0) {
            return;
        }

        $payload = ['moved_to_processed_at' => date('Y-m-d H:i:s')];
        if ($db->fieldExists('processed_at', $table)) {
            $payload['processed_at'] = date('Y-m-d H:i:s');
        }
        $db->table($table)->where('id', $id)->update($payload);
    }
}
