<?php

namespace App\Commands\Security;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class GenerateCI4Key extends BaseCommand
{
    protected $group       = 'security';
    protected $name        = 'keys:generate-ci4';
    protected $description = 'Generate and rotate CodeIgniter 4 encryption.key';
    protected $usage       = 'keys:generate-ci4 [bits]';
    protected $arguments   = [
        'bits' => 'Key size in bits (32, 64, 128, 256). Default: 256',
    ];

    public function run(array $params)
    {
        $bits = (int)($params[0] ?? 256);

        if (!in_array($bits, [32, 64, 128, 256], true)) {
            CLI::error('Invalid key size. Allowed values: 32, 64, 128, 256');
            return;
        }

        $bytes = (int)($bits / 8);
        $key   = base64_encode(random_bytes($bytes));
        $env   = ROOTPATH . '.env';

        if (!is_file($env)) {
            CLI::error('.env file not found.');
            return;
        }

        $contents = file_get_contents($env);

        if (preg_match('/^encryption\.key\s*=.*$/m', $contents)) {
            $contents = preg_replace(
                '/^encryption\.key\s*=.*$/m',
                "encryption.key = {$key}",
                $contents
            );
        } else {
            $contents .= PHP_EOL . "encryption.key = {$key}" . PHP_EOL;
        }

        file_put_contents($env, $contents);

        CLI::newLine();
        CLI::write("CI4 encryption.key updated ({$bits}-bit)", 'green');
        CLI::newLine();
        CLI::write('⚠️  Existing encrypted data may become unreadable.', 'yellow');
        CLI::write('Restart queues, sessions, and workers after rotation.', 'yellow');
        CLI::newLine();
    }
}
