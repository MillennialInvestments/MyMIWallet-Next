<?php

namespace App\Commands;

use CodeIgniter\CLI\CLI;

class RestartSafe extends SafeBaseCommand
{
    protected $group       = 'maintenance';
    protected $name        = 'spark:restart-safe';
    protected $description = 'Flush caches/sessions safely and guide a no-sudo restart flow on DreamHost.';
    protected $usage       = 'spark:restart-safe [--hard] [--dry-run] [--approve]';
    protected $options     = [
        '--hard' => 'Also purge session files (file handler only)',
        '--dry-run' => 'Preview actions without purging',
        '--approve' => 'Acknowledge and apply cache/session purges',
    ];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);
        $hard = isset($flags['hard']);

        CLI::write('Restart-safe: flushing CI4 caches…', 'yellow');

        $paths = [
            WRITEPATH . 'cache',
            WRITEPATH . 'debugbar',
        ];

        foreach ($paths as $p) {
            if ($dryRun) {
                CLI::write("Dry-run: would purge {$p}", 'yellow');
                continue;
            }
            $this->purgeDir($p);
            CLI::write("Purged: {$p}", 'green');
        }

        if ($hard) {
            CLI::write('Hard mode: purging sessions (file handler only)…', 'yellow');
            if ($dryRun) {
                CLI::write('Dry-run: would purge writable/session', 'yellow');
            } else {
                $this->purgeDir(WRITEPATH . 'session');
                CLI::write('Purged: writable/session', 'green');
            }
        }

        // attempt opcache reset if enabled + allowed
        if (function_exists('opcache_reset')) {
            if ($dryRun) {
                CLI::write('Dry-run: would attempt opcache reset.', 'yellow');
            } else {
                @opcache_reset();
                CLI::write('Opcache reset attempted.', 'green');
            }
        } else {
            CLI::write('Opcache reset not available in CLI.', 'light_yellow');
        }

        CLI::newLine();
        CLI::write('Next step (DreamHost, no sudo):', 'yellow');
        CLI::write('- In DreamHost panel: restart Web Server / PHP service for this domain.', 'white');
        CLI::write('- Then run: php spark spark:diagnose-503', 'white');
    }

    private function purgeDir(string $dir): void
    {
        if (!is_dir($dir)) return;

        $it = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($dir, \FilesystemIterator::SKIP_DOTS),
            \RecursiveIteratorIterator::CHILD_FIRST
        );

        foreach ($it as $file) {
            $path = $file->getPathname();
            if ($file->isDir()) {
                @rmdir($path);
            } else {
                @unlink($path);
            }
        }
    }

    protected function isDestructive(): bool
    {
        return true;
    }
}
