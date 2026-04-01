<?php

declare(strict_types=1);

namespace App\Commands\Alerts;

use App\Commands\SafeBaseCommand;
use App\Libraries\TradeAlertMailboxFetcher;
use CodeIgniter\CLI\CLI;

class FetchRawEmails extends SafeBaseCommand
{
    protected $group = 'Alerts';
    protected $name = 'alerts:fetch-raw-emails';
    protected $description = 'Fetch raw trade alert emails into bf_investment_scraper and move inserted messages to Processed.';
    protected $usage = 'alerts:fetch-raw-emails [--limit=200] [--folder=INBOX] [--target-folder=Processed] [--since="1 day ago"] [--approve] [--dry-run] [--verbose]';
    protected $options = [
        '--limit' => 'Max messages to scan (default: 200).',
        '--folder' => 'IMAP source folder (default: INBOX).',
        '--target-folder' => 'IMAP destination folder after successful insert (default: Processed).',
        '--since' => 'Date expression (e.g. "1 day ago" or "2026-03-20").',
        '--approve' => 'Required for non-dry-run mode because mailbox moves are destructive.',
        '--dry-run' => 'Scan only. Do not insert or move.',
        '--verbose' => 'Verbose progress logging.',
    ];
    protected $defaultDryRun = false;

    public function run(array $params)
    {
        [$args, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);
        $verbose = isset($flags['verbose']);

        $limit = max(1, (int) ($flags['limit'] ?? 200));
        $folder = trim((string) ($flags['folder'] ?? 'INBOX'));
        $targetFolder = trim((string) ($flags['target-folder'] ?? env('alerts.imap.processed_folder', 'Processed')));
        $since = trim((string) ($flags['since'] ?? '1 day ago'));

        $fetcher = new TradeAlertMailboxFetcher();
        $summary = $fetcher->fetch([
            'limit' => $limit,
            'folder' => $folder,
            'target_folder' => $targetFolder,
            'since' => $since,
            'dry_run' => $dryRun,
            'verbose' => $verbose,
        ]);

        CLI::write('Raw email fetch summary', 'yellow');
        CLI::write('emails scanned: ' . (int) ($summary['emails_scanned'] ?? 0));
        CLI::write('new stored: ' . (int) ($summary['new_stored'] ?? 0));
        CLI::write('duplicates skipped: ' . (int) ($summary['duplicates_skipped'] ?? 0));
        CLI::write('moved to ' . $targetFolder . ': ' . (int) ($summary['moved_to_target'] ?? 0));
        CLI::write('move failures: ' . (int) ($summary['move_failures'] ?? 0));
        CLI::write('db failures: ' . (int) ($summary['db_failures'] ?? 0));
        CLI::write('runtime ms: ' . (int) ($summary['runtime_ms'] ?? 0));

        $errors = $summary['errors'] ?? [];
        if (is_array($errors) && $errors !== []) {
            foreach ($errors as $error) {
                CLI::write('error: ' . (string) $error, 'red');
            }

            return EXIT_ERROR;
        }

        return EXIT_SUCCESS;
    }

    protected function isDestructive(): bool
    {
        return true;
    }
}
