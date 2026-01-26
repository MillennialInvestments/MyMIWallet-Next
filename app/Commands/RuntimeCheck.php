<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class RuntimeCheck extends BaseCommand
{
    protected $group       = 'runtime';
    protected $name        = 'runtime:check';
    protected $description = 'Validate nginx + PHP runtime compatibility (DreamHost-safe).';

    public function run(array $params)
    {
        CLI::write('MyMI Wallet – Runtime Check', 'yellow');
        CLI::newLine();

        // PHP version
        CLI::write('PHP Version: ' . PHP_VERSION, 'green');

        // Forbidden backend markers
        $forbidden = [
            'php-cgi',
            'php82',
            'php-pm',
            '9071',
            '9000',
            'php-fpm',
        ];

        $nginxRoot = getenv('HOME') . '/nginx';
        $hits = [];

        if (is_dir($nginxRoot)) {
            $iterator = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($nginxRoot)
            );

            foreach ($iterator as $file) {
                if (!$file->isFile()) {
                    continue;
                }

                $contents = @file_get_contents($file->getPathname()) ?: '';

                foreach ($forbidden as $term) {
                    if (stripos($contents, $term) !== false) {
                        $hits[] = "{$term} found in {$file->getPathname()}";
                    }
                }
            }
        }

        if ($hits) {
            CLI::newLine();
            CLI::error('❌ Forbidden FastCGI references detected:');
            foreach ($hits as $hit) {
                CLI::write(" - {$hit}", 'red');
            }
            CLI::newLine();
            CLI::error('Runtime check FAILED.');
            return;
        }

        if (!file_exists('/dh/cgi-system/php74.cgi')) {
            CLI::error('❌ DreamHost PHP CGI socket missing: /dh/cgi-system/php74.cgi');
            return;
        }

        CLI::newLine();
        CLI::write('✅ FastCGI backend verified: /dh/cgi-system/php74.cgi', 'green');
        CLI::write('✅ Runtime check PASSED', 'green');
    }
}
