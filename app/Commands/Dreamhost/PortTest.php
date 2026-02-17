<?php

declare(strict_types=1);

namespace App\Commands\DreamHost;

use App\Commands\SafeBaseCommand;;
use CodeIgniter\CLI\CLI;

class PortTest extends SafeBaseCommand
{
    protected $group       = 'DreamHost Diagnostics';
    protected $name        = 'dreamhost:port-test';
    protected $description = 'Test raw TCP connection to host:port.';

    public function run(array $params)
    {
        $host = $params[0] ?? 'imap.dreamhost.com';
        $port = (int)($params[1] ?? 993);

        CLI::write("Testing TCP connection to {$host}:{$port}", 'yellow');

        $fp = @fsockopen($host, $port, $errno, $errstr, 10);

        if (!$fp) {
            CLI::error("Connection failed: {$errstr} ({$errno})");
            return;
        }

        CLI::write("TCP Connection Successful!", 'green');
        fclose($fp);
    }
}
