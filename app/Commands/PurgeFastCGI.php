<?php

namespace App\Commands;

use CodeIgniter\CLI\CLI;

class PurgeFastCGI extends SafeBaseCommand
{
    protected $group       = 'maintenance';
    protected $name        = 'spark:purge-fastcgi';
    protected $description = 'Detect and neutralize legacy FastCGI/php-pm socket references safely.';
    protected $usage       = 'spark:purge-fastcgi [--approve]';
    protected $options     = [
        '--approve' => 'Acknowledge and rename files that reference FastCGI/php-pm sockets',
    ];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $apply = isset($flags['approve']);

        if (isset($flags['apply'])) {
            CLI::error('Use --approve instead of --apply.');
            return EXIT_ERROR;
        }

        CLI::write('Scanning for php-pm / fastcgi / controller.sock references…', 'yellow');

        $home = rtrim(getenv('HOME') ?: $_SERVER['HOME'] ?? '', '/');

        $scanRoots = [
            $home . '/nginx',
            $home . '/mymiwallet',
        ];

        $needles = [
            'php-pm',
            'controller.sock',
            'fastcgi_pass',
            '.ppm/run',
        ];

        $hits = [];

        foreach ($scanRoots as $root) {
            if (!is_dir($root)) continue;

            $it = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($root, \FilesystemIterator::SKIP_DOTS)
            );

            foreach ($it as $file) {
                if (!$file->isFile()) continue;

                $path = $file->getPathname();
                if (str_contains($path, '/vendor/') || str_contains($path, '/writable/')) {
                    continue;
                }

                $content = @file_get_contents($path);
                if (!$content) continue;

                foreach ($needles as $needle) {
                    if (str_contains($content, $needle)) {
                        $hits[] = $path;
                        if ($apply) {
                            @rename($path, $path . '.disabled');
                        }
                        break;
                    }
                }
            }
        }

        if (!$hits) {
            CLI::write('No FastCGI/php-pm references found.', 'green');
            return;
        }

        foreach ($hits as $h) {
            CLI::write("⚠ {$h}", 'light_red');
        }

        CLI::newLine();
        CLI::write($apply ? 'Disabled hit files (*.disabled).' : 'Re-run with --approve to disable.', 'yellow');
        CLI::write('After disabling, restart stack via DreamHost panel (no sudo).', 'yellow');
    }

    protected function isDestructive(): bool
    {
        return false;
    }
}
