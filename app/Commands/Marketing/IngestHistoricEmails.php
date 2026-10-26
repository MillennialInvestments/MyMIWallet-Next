<?php

declare(strict_types=1);

namespace App\Commands\Marketing;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Database;

class IngestHistoricEmails extends SafeBaseCommand
{
    protected $group       = 'Marketing';
    protected $name        = 'marketing:ingest-historic';
    protected $description = 'Ingests segments of historic emails from DreamHost IMAP into bf_marketing_temp_scraper for backtesting and reference.';
    protected $usage       = 'marketing:ingest-historic [--limit=250] [--batches=1] [--mailbox=all|tradealerts|news] [--reset-cursor]';
    protected $options     = [
        '--limit'        => 'Number of emails to fetch per batch segment (default: 250)',
        '--batches'      => 'Number of consecutive batch segments to run (default: 1)',
        '--mailbox'      => 'Target mailbox: all, tradealerts, or news (default: all)',
        '--reset-cursor' => 'Reset checkpoint cursor to start from the beginning',
    ];

    public function run(array $params)
    {
        [$args, $flags] = $this->parseParams($params);

        $limit = isset($flags['limit']) ? max(5, (int) $flags['limit']) : 250;
        $batches = isset($flags['batches']) ? max(1, (int) $flags['batches']) : 1;
        $target = strtolower((string) ($flags['mailbox'] ?? 'all'));
        $resetCursor = isset($flags['reset-cursor']);

        CLI::write("\n=========================================================================", 'yellow');
        CLI::write("   MyMI Historic Email Archive Ingestion · Segmented Processing Engine   ", 'white');
        CLI::write("=========================================================================", 'yellow');
        CLI::write(sprintf("Configuration: %d batch(es) of %d emails | Target Mailbox: %s\n", $batches, $limit, $target));

        $db = Database::connect();
        $scriptPath = ROOTPATH . 'scripts/ingest_historic_emails.py';
        $cursorFile = WRITEPATH . 'aiops/historic_email_cursor.json';

        $mailboxes = [];
        if ($target === 'all' || $target === 'tradealerts' || $target === 'trade_alerts') {
            $mailboxes[] = [
                'user' => (string) env('alerts.imap.user', env('MYMI_ALERTS_IMAP_USER', env('IMAP_USER', 'tradealerts@mymiwallet.com'))),
                'pass' => (string) env('MYMI_ALERTS_IMAP_PASS', env('IMAP_PASS', env('IMAP_pass', 'MyMI2024!'))),
                'name' => 'Trade Alerts (Thinkorswim)',
            ];
        }
        if ($target === 'all' || $target === 'news') {
            $mailboxes[] = [
                'user' => (string) env('MARKETING_NEWS_IMAP_USER', 'news@mymiwallet.com'),
                'pass' => (string) env('MARKETING_NEWS_IMAP_PASS', env('IMAP_PASS', env('IMAP_pass', 'MyMI2024!'))),
                'name' => 'Market & Crypto News',
            ];
        }

        $grandTotalScanned = 0;
        $grandTotalInserted = 0;
        $grandTotalDuplicates = 0;

        foreach ($mailboxes as $mb) {
            CLI::write(">>> Processing Mailbox: {$mb['name']} ({$mb['user']})", 'cyan');

            for ($b = 1; $b <= $batches; $b++) {
                CLI::write(sprintf(" - Running batch %d of %d (limit: %d)...", $b, $batches, $limit), 'white');

                $cmd = sprintf(
                    'python3 %s --host=%s --port=993 --user=%s --password=%s --limit=%d --cursor=%s %s',
                    escapeshellarg($scriptPath),
                    escapeshellarg((string) env('alerts.imap.host', 'imap.dreamhost.com')),
                    escapeshellarg($mb['user']),
                    escapeshellarg($mb['pass']),
                    $limit,
                    escapeshellarg($cursorFile),
                    ($resetCursor && $b === 1) ? '--reset-cursor' : ''
                );

                $output = [];
                $exitCode = 0;
                exec($cmd . ' 2>&1', $output, $exitCode);

                $rawJson = implode("\n", $output);
                $res = json_decode($rawJson, true);

                if (! is_array($res) || ! empty($res['errors'])) {
                    CLI::write("   ! Notice / Error in batch: " . ($res['errors'][0] ?? substr($rawJson, 0, 200)), 'red');
                    if (is_array($res) && ! empty($res['errors'])) {
                        continue;
                    }
                }

                $scanned = (int) ($res['scanned'] ?? 0);
                $cursorSeq = (int) ($res['cursor_seq'] ?? 0);
                $totalMb = (int) ($res['total_mailbox'] ?? 0);
                $messages = $res['messages'] ?? [];

                $batchInserted = 0;
                $batchDuplicates = 0;

                // Native CodeIgniter database insertion with duplicate check
                if (! empty($messages) && $db->tableExists('bf_marketing_temp_scraper')) {
                    $table = $db->table('bf_marketing_temp_scraper');
                    $fields = array_flip($db->getFieldNames('bf_marketing_temp_scraper'));

                    foreach ($messages as $msg) {
                        $ident = (string) ($msg['email_identifier'] ?? '');
                        if ($ident === '') {
                            continue;
                        }

                        $exists = $table->where('email_identifier', $ident)->countAllResults();
                        if ($exists > 0) {
                            $batchDuplicates++;
                            continue;
                        }

                        $clean = array_intersect_key($msg, $fields);
                        $table->insert($clean);
                        $batchInserted++;
                    }
                }

                $grandTotalScanned += $scanned;
                $grandTotalInserted += $batchInserted;
                $grandTotalDuplicates += $batchDuplicates;

                CLI::write(sprintf(
                    "   Batch %d Result: Scanned: %d | Newly Archived: %d | Duplicates: %d | Cursor: %d / %d",
                    $b,
                    $scanned,
                    $batchInserted,
                    $batchDuplicates,
                    $cursorSeq,
                    $totalMb
                ), 'green');

                if ($scanned === 0) {
                    CLI::write("   Mailbox caught up to end of messages. Moving to next mailbox.\n", 'yellow');
                    break;
                }

                if ($b < $batches) {
                    usleep(500000); // 0.5s pause between batches
                }
            }
            CLI::write("");
        }

        CLI::write("=========================================================================", 'yellow');
        CLI::write(sprintf(
            "Session Summary: Scanned %d | Newly Archived %d | Duplicates Skipped %d",
            $grandTotalScanned,
            $grandTotalInserted,
            $grandTotalDuplicates
        ), 'green');
        CLI::write("Checkpoints saved to: writable/aiops/historic_email_cursor.json", 'cyan');
        CLI::write("=========================================================================\n", 'yellow');
    }
}
