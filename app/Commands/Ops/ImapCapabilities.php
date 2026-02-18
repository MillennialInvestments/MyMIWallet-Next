<?php

declare(strict_types=1);

namespace App\Commands\DreamHost;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use RuntimeException;

class ImapCapabilities extends SafeBaseCommand
{
    protected $group       = 'DreamHost Diagnostics';
    protected $name        = 'dreamhost:imap-capabilities';
    protected $description = 'Probe IMAP greeting/capabilities/mailboxes and print detailed errors.';
    protected $usage       = 'dreamhost:imap-capabilities [--host=imap.dreamhost.com] [--port=993] [--mailbox=INBOX] [--flags=/imap/ssl/novalidate-cert]';

    public function run(array $params)
    {
        if (!function_exists('imap_open')) {
            CLI::error('IMAP extension not available (imap_open missing).');
            return EXIT_ERROR;
        }

        $host    = $this->opt($params, 'host', getenv('MYMI_ALERTS_IMAP_HOST') ?: 'imap.dreamhost.com');
        $port    = (int) $this->opt($params, 'port', getenv('MYMI_ALERTS_IMAP_PORT') ?: '993');
        $mailbox = $this->opt($params, 'mailbox', getenv('MYMI_ALERTS_IMAP_MAILBOX') ?: 'INBOX');
        $flags   = $this->opt($params, 'flags', '/imap/ssl/novalidate-cert');

        $user = getenv('MYMI_ALERTS_IMAP_USER') ?: '';
        $pass = getenv('MYMI_ALERTS_IMAP_PASS') ?: '';

        if ($user === '' || $pass === '') {
            CLI::error('Missing MYMI_ALERTS_IMAP_USER or MYMI_ALERTS_IMAP_PASS.');
            return EXIT_ERROR;
        }

        $conn = sprintf('{%s:%d%s}%s', $host, $port, $flags, $mailbox);

        CLI::write('IMAP connection string:', 'yellow');
        CLI::write($conn);

        // clear any prior error state
        imap_errors();
        imap_last_error();

        $imap = @imap_open($conn, $user, $pass);

        if (!$imap) {
            $this->printImapErrors('imap_open failed');
            return EXIT_ERROR;
        }

        try {
            CLI::write("\n✔ Connected. Probing server...", 'green');

            $check = @imap_check($imap);
            if ($check && isset($check->Date)) {
                CLI::write('Server Date: ' . $check->Date);
            }
            if ($check && isset($check->Nmsgs)) {
                CLI::write('Messages in mailbox: ' . $check->Nmsgs);
            }

            $caps = @imap_capabilities($imap);
            if (is_array($caps)) {
                CLI::write("\nCapabilities:");
                foreach ($caps as $cap) {
                    CLI::write(' - ' . $cap);
                }
            }

            $list = @imap_getmailboxes($imap, sprintf('{%s:%d%s}', $host, $port, $flags), '*');
            if (is_array($list)) {
                CLI::write("\nMailboxes:");
                foreach ($list as $mb) {
                    $name = is_object($mb) && isset($mb->name) ? (string) $mb->name : '(unknown)';
                    CLI::write(' - ' . $name);
                }
            } else {
                CLI::write("\nMailbox list unavailable (imap_getmailboxes returned null).", 'yellow');
                $this->printImapErrors('imap_getmailboxes warning');
            }

            $this->printImapErrors('post-probe');
            return EXIT_SUCCESS;
        } finally {
            @imap_close($imap);
        }
    }

    private function printImapErrors(string $context): void
    {
        $last = imap_last_error();
        $all  = imap_errors();

        if ($last || $all) {
            CLI::write("\nIMAP errors ({$context}):", 'red');
            if ($last) {
                CLI::write('Last: ' . $last, 'red');
            }
            if (is_array($all) && $all !== []) {
                CLI::write('All: ' . json_encode($all), 'red');
            }
        }
    }

    private function opt(array $params, string $key, string $default): string
    {
        $needle = '--' . $key;
        foreach ($params as $i => $p) {
            if (!is_string($p)) continue;
            if ($p === $needle && isset($params[$i + 1])) {
                return (string) $params[$i + 1];
            }
            $prefix = $needle . '=';
            if (str_starts_with($p, $prefix)) {
                return (string) substr($p, strlen($prefix));
            }
        }
        return $default;
    }
}
