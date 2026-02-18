<?php

declare(strict_types=1);

namespace App\Commands\Ops;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class PHPExtensionsAudit extends SafeBaseCommand
{
    protected $group       = 'Ops';
    protected $name        = 'ops:php:extensions';
    protected $description = 'Audit required PHP extensions and key INI values (IMAP/SSL-friendly).';

    public function run(array $params)
    {
        $required = [
            'openssl', 'curl', 'mbstring', 'intl', 'json', 'pdo', 'mysqli',
            'imap', 'redis', 'sodium',
        ];

        CLI::write('PHP Version: ' . PHP_VERSION, 'yellow');
        CLI::write('Loaded extensions:', 'yellow');

        $missing = [];
        foreach ($required as $ext) {
            $ok = extension_loaded($ext);
            CLI::write(sprintf(" - %-10s %s", $ext, $ok ? 'OK' : 'MISSING'), $ok ? 'green' : 'red');
            if (!$ok) $missing[] = $ext;
        }

        CLI::write("\nINI diagnostics:", 'yellow');
        $iniKeys = [
            'openssl.cafile',
            'openssl.capath',
            'default_socket_timeout',
            'disable_functions',
        ];
        foreach ($iniKeys as $k) {
            $v = ini_get($k);
            CLI::write($k . ' = ' . (is_string($v) ? $v : '(null)'));
        }

        if ($missing) {
            CLI::error("\nMissing extensions: " . implode(', ', $missing));
            return EXIT_ERROR;
        }

        CLI::write("\n✔ Extension set looks healthy.", 'green');
        return EXIT_SUCCESS;
    }
}
