<?php

declare(strict_types=1);

namespace App\Commands\DreamHost;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class ImapFlagSweep extends SafeBaseCommand
{
    protected $group       = 'DreamHost Diagnostics';
    protected $name        = 'dreamhost:imap-flag-sweep';
    protected $description = 'Try multiple IMAP connection flag variants and report which one connects.';
    protected $usage       = 'dreamhost:imap-flag-sweep [--host=imap.dreamhost.com] [--port=993] [--mailbox=INBOX]';

    public function run(array $params)
    {
        if (!function_exists('imap_open')) {
            CLI::error('IMAP extension not available.');
            return EXIT_ERROR;
        }

        $host = $this->opt($params, 'host', getenv('MYMI_ALERTS_IMAP_HOST') ?: 'imap.dreamhost.com');
        $port = (int) $this->opt($params, 'port', getenv('MYMI_ALERTS_IMAP_PORT') ?: '993');
        $mailbox = $this->opt($params, 'mailbox', getenv('MYMI_ALERTS_IMAP_MAILBOX') ?: 'INBOX');

        $user = getenv('MYMI_ALERTS_IMAP_USER') ?: '';
        $pass = getenv('MYMI_ALERTS_IMAP_PASS') ?: '';
        if ($user === '' || $pass === '') {
            CLI::error('Missing MYMI_ALERTS_IMAP_USER or MYMI_ALERTS_IMAP_PASS.');
            return EXIT_ERROR;
        }

        $flagsList = [
            '/imap/ssl',
            '/imap/ssl/novalidate-cert',
            '/imap/tls',
            '/imap/tls/novalidate-cert',
            '/imap/ssl/novalidate-cert/readonly',
            '/imap/tls/novalidate-cert/readonly',
        ];

        CLI::write("Sweeping IMAP flags against {$host}:{$port} mailbox {$mailbox}", 'yellow');

        $any = false;

        foreach ($flagsList as $flags) {
            $conn = sprintf('{%s:%d%s}%s', $host, $port, $flags, $mailbox);

            imap_errors();
            imap_last_error();

            $imap = @imap_open($conn, $user, $pass);
            if ($imap) {
                CLI::write("[OK] {$conn}", 'green');
                @imap_close($imap);
                $any = true;
                // Keep going to list all that work
                continue;
            }

            $last = imap_last_error() ?: 'Unknown';
            CLI::write("[FAIL] {$conn} :: {$last}", 'red');
        }

        if (!$any) {
            CLI::error("\nNo flag variants succeeded. This points to firewall/egress, creds, or server-side block.");
            return EXIT_ERROR;
        }

        CLI::write("\n✔ Sweep complete.", 'green');
        return EXIT_SUCCESS;
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
