<?php

declare(strict_types=1);

namespace App\Commands\DreamHost;

use App\Commands\SafeBaseCommand;;
use CodeIgniter\CLI\CLI;

class SSLTest extends SafeBaseCommand
{
    protected $group       = 'DreamHost Diagnostics';
    protected $name        = 'dreamhost:ssl-test';
    protected $description = 'Test raw SSL connection to a host/port.';

    public function run(array $params)
    {
        $host = $params[0] ?? 'imap.dreamhost.com';
        $port = (int)($params[1] ?? 993);

        CLI::write("Testing SSL connection to {$host}:{$port}", 'yellow');

        $context = stream_context_create([
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
            ],
        ]);

        $socket = @stream_socket_client(
            "ssl://{$host}:{$port}",
            $errno,
            $errstr,
            10,
            STREAM_CLIENT_CONNECT,
            $context
        );

        if (!$socket) {
            CLI::error("Connection failed: {$errstr} ({$errno})");
            return;
        }

        CLI::write("SSL Connection Successful!", 'green');
        fclose($socket);
    }
}
