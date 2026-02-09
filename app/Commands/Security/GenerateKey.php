<?php

namespace App\Commands\Security;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class GenerateKey extends SafeBaseCommand
{
    protected $group       = 'security';
    protected $name        = 'keys:generate';
    protected $description = 'Generate a cryptographically secure encryption key.';
    protected $usage       = 'keys:generate [bits]';
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

        CLI::newLine();
        CLI::write("Generated {$bits}-bit key:", 'yellow');
        CLI::newLine();
        CLI::write($key, 'green');
        CLI::newLine(2);
        CLI::write('Usage examples:', 'cyan');
        CLI::write("ENV_KEY={$key}");
        CLI::write("JWT_SECRET={$key}");
        CLI::write("CUSTOM_ENCRYPTION_KEY={$key}");
        CLI::newLine();
    }
}
