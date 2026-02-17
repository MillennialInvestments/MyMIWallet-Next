<?php

namespace App\Commands\AiOps\DB;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class SlowScan extends SafeBaseCommand
{
    protected $group = 'AIOps - DB';
    protected $name = 'aiops:db:slow_scan';
    protected $description = 'Scan logs for slow query markers (best-effort)';

    public function run(array $params)
    {
        $log = WRITEPATH . 'logs/log-' . date('Y-m-d') . '.php';
        $out = WRITEPATH . 'audit/db_slow_scan.md';
        @mkdir(dirname($out), 0775, true);

        if (!is_file($log)) {
            CLI::write("No CI log found today: {$log}");
            file_put_contents($out, "# DB Slow Scan\n\nNo log file found.\n");
            return;
        }

        $lines = file($log, FILE_IGNORE_NEW_LINES);
        $hits = [];

        foreach ($lines as $line) {
            if (stripos($line, 'SLOW QUERY') !== false || stripos($line, 'query took') !== false) {
                $hits[] = $line;
            }
        }

        $md = "# DB Slow Scan\n\n";
        $md .= "- Log: {$log}\n\n";

        if (empty($hits)) {
            $md .= "✅ No slow query markers found.\n";
        } else {
            $md .= "## Hits\n\n";
            foreach (array_slice($hits, 0, 200) as $h) $md .= "- {$h}\n";
        }

        file_put_contents($out, $md);
        CLI::write("Wrote: {$out}");
    }
}
