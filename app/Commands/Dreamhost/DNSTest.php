<?php

declare(strict_types=1);

namespace App\Commands\DreamHost;

use App\Commands\SafeBaseCommand;;
use CodeIgniter\CLI\CLI;

class DnsTest extends SafeBaseCommand
{
    protected $group       = 'DreamHost Diagnostics';
    protected $name        = 'dreamhost:dns-test';
    protected $description = 'Resolve DNS for a given host.';

    public function run(array $params)
    {
        $host = $params[0] ?? 'imap.dreamhost.com';

        CLI::write("Resolving DNS for {$host}", 'yellow');

        $ip = gethostbyname($host);

        if ($ip === $host) {
            CLI::error('DNS resolution failed.');
            return;
        }

        CLI::write("Resolved IP: {$ip}", 'green');
    }
}
