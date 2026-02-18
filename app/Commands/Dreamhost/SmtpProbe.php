<?php

declare(strict_types=1);

namespace App\Commands\DreamHost;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class SmtpProbe extends SafeBaseCommand
{
    protected $group       = 'DreamHost Diagnostics';
    protected $name        = 'dreamhost:smtp-probe';
    protected $description = 'Probe SMTP endpoints (465 SSL, 587 STARTTLS) and print handshake banner.';
    protected $usage       = 'dreamhost:smtp-probe [--host=smtp.dreamhost.com]';

    public function run(array $params)
    {
        $host = $this->opt($params, 'host', 'smtp.dreamhost.com');

        $this->probeSsl($host, 465);
        $this->probeTcp($host, 587);

        CLI::write("\nNote: 587 is STARTTLS; this probe verifies TCP banner only.", 'yellow');
        return EXIT_SUCCESS;
    }

    private function probeSsl(string $host, int $port): void
    {
        CLI::write("\nSSL Probe: {$host}:{$port}", 'yellow');

        $ctx = stream_context_create([
            'ssl' => ['verify_peer' => false, 'verify_peer_name' => false],
        ]);

        $fp = @stream_socket_client("ssl://{$host}:{$port}", $errno, $errstr, 10, STREAM_CLIENT_CONNECT, $ctx);
        if (!$fp) {
            CLI::error("FAILED: {$errstr} ({$errno})");
            return;
        }

        stream_set_timeout($fp, 5);
        $banner = @fgets($fp, 512) ?: '';
        CLI::write("OK. Banner: " . trim($banner), 'green');
        fclose($fp);
    }

    private function probeTcp(string $host, int $port): void
    {
        CLI::write("\nTCP Probe: {$host}:{$port}", 'yellow');

        $fp = @fsockopen($host, $port, $errno, $errstr, 10);
        if (!$fp) {
            CLI::error("FAILED: {$errstr} ({$errno})");
            return;
        }

        stream_set_timeout($fp, 5);
        $banner = @fgets($fp, 512) ?: '';
        CLI::write("OK. Banner: " . trim($banner), 'green');
        fclose($fp);
    }

    private function opt(array $params, string $key, string $default): string
    {
        $needle = '--' . $key;
        foreach ($params as $i => $p) {
            if (!is_string($p)) continue;
            if ($p === $needle && isset($params[$i + 1])) return (string) $params[$i + 1];
            $prefix = $needle . '=';
            if (str_starts_with($p, $prefix)) return (string) substr($p, strlen($prefix));
        }
        return $default;
    }
}
