<?php

declare(strict_types=1);

namespace App\Commands\TbiChat;

use App\Libraries\TbiChat\TbiChatUsage;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

/**
 * php spark tbichat:usage [--date YYYYMMDD] [--days N] [--save] [--json]
 *
 * MyMI's AI chat usage, read back from TBI AIOps (TbiChatUsage). Read-only
 * on TBI; --save also keeps each day as JSON under
 * WRITEPATH/tbi-chat/usage-YYYYMMDD.json (mode 0600) for billing.
 */
class Usage extends BaseCommand
{
    protected $group = 'TbiChat';
    protected $name = 'tbichat:usage';
    protected $description = 'Show MyMI AI chat usage per member, read from TBI AIOps.';
    protected $usage = 'tbichat:usage [--date YYYYMMDD] [--days N] [--save] [--json]';
    protected $options = [
        '--date' => 'UTC day, YYYYMMDD (default today)',
        '--days' => 'Also the N-1 days before it (1-45, default 1)',
        '--save' => 'Keep each day as JSON in writable/tbi-chat/',
        '--json' => 'Print JSON instead of a table',
    ];

    public function run(array $params)
    {
        $now = time();
        $date = (string) (CLI::getOption('date') ?? gmdate('Ymd', $now));
        $days = max(1, min(45, (int) (CLI::getOption('days') ?? 1)));
        $start = \DateTimeImmutable::createFromFormat('!Ymd', $date, new \DateTimeZone('UTC'));
        if ($start === false || $start->format('Ymd') !== $date) {
            CLI::error('STOP: --date must be YYYYMMDD.');

            return EXIT_USER_INPUT;
        }
        $usage = TbiChatUsage::fromEnv();
        $all = [];
        $failed = false;
        for ($i = 0; $i < $days; $i++) {
            $ymd = $start->modify('-' . $i . ' day')->format('Ymd');
            $report = $usage->day($ymd, $now);
            $all[$ymd] = $report;
            if (($report['ok'] ?? false) !== true) {
                $failed = true;

                continue;
            }
            if (CLI::getOption('save') !== null) {
                $this->save($ymd, $report);
            }
        }

        if (CLI::getOption('json') !== null) {
            CLI::write((string) json_encode($all, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

            return $failed ? EXIT_ERROR : EXIT_SUCCESS;
        }
        foreach ($all as $ymd => $r) {
            if (($r['ok'] ?? false) !== true) {
                CLI::write("{$ymd}  STOP: " . (string) ($r['reason'] ?? 'unknown') . (isset($r['status']) ? ' (HTTP ' . (int) $r['status'] . ')' : ''), 'red');

                continue;
            }
            $anon = $r['anonymous'] ?? [];
            CLI::write(sprintf(
                '%s  messages %d (failed %d)  members %d  anonymous visitors %d / messages %d',
                $ymd,
                (int) ($r['messages'] ?? 0),
                (int) ($r['failed'] ?? 0),
                count($r['members'] ?? []),
                (int) ($anon['visitors'] ?? 0),
                (int) ($anon['messages'] ?? 0),
            ), 'green');
            $rows = [];
            foreach ($r['members'] ?? [] as $m) {
                $rows[] = [(string) $m['user'], (string) $m['tier'], (int) $m['messages'], (int) $m['failed'], (int) $m['tokens_in'], (int) $m['tokens_out']];
            }
            if ($rows !== []) {
                CLI::table($rows, ['user', 'tier', 'messages', 'failed', 'tokens in', 'tokens out']);
            }
        }

        return $failed ? EXIT_ERROR : EXIT_SUCCESS;
    }

    private function save(string $ymd, array $report): void
    {
        $dir = rtrim(WRITEPATH, '/') . '/tbi-chat';
        if (! is_dir($dir) && ! @mkdir($dir, 0700, true) && ! is_dir($dir)) {
            CLI::error("STOP: cannot create {$dir}");

            return;
        }
        $file = $dir . '/usage-' . $ymd . '.json';
        $tmp = $file . '.' . bin2hex(random_bytes(4));
        $old = umask(0077);
        $ok = @file_put_contents($tmp, (string) json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)) !== false && @rename($tmp, $file);
        umask($old);
        if (! $ok) {
            @unlink($tmp);
            CLI::error("STOP: cannot write {$file}");
        }
    }
}
