<?php

declare(strict_types=1);

namespace App\Commands\Ops;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class VPSSnapshot extends SafeBaseCommand
{
    protected $group       = 'Ops';
    protected $name        = 'ops:vps:snapshot';
    protected $description = 'Collect system/runtime snapshot (no-sudo, best-effort) and write docs/_aiops snapshot.';

    public function run(array $params)
    {
        $ts = date('Ymd_His');
        $outDir = ROOTPATH . 'docs/_aiops/snapshots';
        if (!is_dir($outDir)) {
            @mkdir($outDir, 0775, true);
        }

        $path = $outDir . "/vps_snapshot_{$ts}.md";

        $data = [];
        $data[] = '# VPS Snapshot';
        $data[] = '';
        $data[] = '- Timestamp: ' . date('c');
        $data[] = '- Hostname: ' . php_uname('n');
        $data[] = '- OS: ' . php_uname();
        $data[] = '- PHP: ' . PHP_VERSION;
        $data[] = '';

        $data[] = '## Disk';
        $data[] = '- free (bytes): ' . @disk_free_space(ROOTPATH);
        $data[] = '- total (bytes): ' . @disk_total_space(ROOTPATH);
        $data[] = '';

        $data[] = '## Memory (best-effort)';
        $data[] = '```\n' . $this->cmd('free -m 2>/dev/null') . "\n```";
        $data[] = '';

        $data[] = '## Uptime (best-effort)';
        $data[] = '```\n' . $this->cmd('uptime 2>/dev/null') . "\n```";
        $data[] = '';

        $data[] = '## PHP Extensions';
        $data[] = '```\n' . implode("\n", get_loaded_extensions()) . "\n```";
        $data[] = '';

        $data[] = '## OpenSSL (best-effort)';
        $data[] = '```\n' . $this->cmd('openssl version -a 2>/dev/null') . "\n```";
        $data[] = '';

        $data[] = '## DNS (imap.dreamhost.com)';
        $data[] = '- ' . gethostbyname('imap.dreamhost.com');
        $data[] = '';

        $data[] = '## Network Matrix (recommend running ops:network:matrix)';
        $data[] = '';

        $ok = @file_put_contents($path, implode("\n", $data));
        if ($ok === false) {
            CLI::error('Failed writing snapshot to: ' . $path);
            return EXIT_ERROR;
        }

        CLI::write('✔ Snapshot written: ' . $path, 'green');
        return EXIT_SUCCESS;
    }

    private function cmd(string $cmd): string
    {
        // No sudo. Best-effort. If disabled, returns empty string.
        if (stripos((string) ini_get('disable_functions'), 'shell_exec') !== false) {
            return '[shell_exec disabled]';
        }
        $out = @shell_exec($cmd);
        return trim((string) $out);
    }
}
