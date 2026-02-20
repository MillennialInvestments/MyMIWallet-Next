<?php

declare(strict_types=1);

namespace App\Commands\Ops;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class NetworkMatrix extends SafeBaseCommand
{
    protected $group       = 'Ops';
    protected $name        = 'ops:network:matrix';
    protected $description = 'Test outbound connectivity matrix (TCP/SSL) with latency and banner.';
    protected $usage       = 'ops:network:matrix [--imap-host=imap.dreamhost.com] [--smtp-host=smtp.dreamhost.com]';

    public function run(array $params)
    {
        $imapHost = $this->opt($params, 'imap-host', env('MYMI_ALERTS_IMAP_HOST') ?: 'imap.dreamhost.com');
        $smtpHost = $this->opt($params, 'smtp-host', 'smtp.dreamhost.com');

        $tests = [
            ['label' => 'IMAP SSL', 'proto' => 'ssl', 'host' => $imapHost, 'port' => 993],
            ['label' => 'IMAP TCP', 'proto' => 'tcp', 'host' => $imapHost, 'port' => 143],
            ['label' => 'SMTP SSL', 'proto' => 'ssl', 'host' => $smtpHost, 'port' => 465],
            ['label' => 'SMTP TCP', 'proto' => 'tcp', 'host' => $smtpHost, 'port' => 587],
            ['label' => 'HTTPS',    'proto' => 'tcp', 'host' => 'www.google.com', 'port' => 443],
        ];

        CLI::write('Network matrix (best-effort):', 'yellow');

        foreach ($tests as $t) {
            $this->probe($t['label'], $t['proto'], $t['host'], (int) $t['port']);
        }

        CLI::write("\nTip: If SSL connects but IMAP dies, it’s protocol flags or auth (not firewall).", 'yellow');
        return EXIT_SUCCESS;
    }

    private function probe(string $label, string $proto, string $host, int $port): void
    {
        $start = microtime(true);
        $banner = '';
        $ok = false;
        $err = '';

        if ($proto === 'ssl') {
            $ctx = stream_context_create(['ssl' => ['verify_peer' => false, 'verify_peer_name' => false]]);
            $fp = @stream_socket_client("ssl://{$host}:{$port}", $errno, $errstr, 8, STREAM_CLIENT_CONNECT, $ctx);
            if ($fp) {
                stream_set_timeout($fp, 3);
                $banner = (string) (@fgets($fp, 256) ?: '');
                fclose($fp);
                $ok = true;
            } else {
                $err = "{$errstr} ({$errno})";
            }
        } else {
            $fp = @fsockopen($host, $port, $errno, $errstr, 8);
            if ($fp) {
                stream_set_timeout($fp, 3);
                $banner = (string) (@fgets($fp, 256) ?: '');
                fclose($fp);
                $ok = true;
            } else {
                $err = "{$errstr} ({$errno})";
            }
        }

        $ms = (int) round((microtime(true) - $start) * 1000);

        $line = sprintf("[%s] %s://%s:%d %dms", $ok ? 'OK' : 'FAIL', $proto, $host, $port, $ms);
        if ($ok && trim($banner) !== '') {
            $line .= ' | ' . trim($banner);
        }
        if (!$ok) {
            $line .= ' | ' . $err;
            CLI::write($line, 'red');
        } else {
            CLI::write($line, 'green');
        }
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
