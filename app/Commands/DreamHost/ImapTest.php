<?php

declare(strict_types=1);

namespace App\Commands\DreamHost;

use App\Commands\SafeBaseCommand;;
use CodeIgniter\CLI\CLI;

class ImapTest extends SafeBaseCommand
{
    protected $group       = 'DreamHost Diagnostics';
    protected $name        = 'dreamhost:imap-test';
    protected $description = 'Test IMAP SSL connectivity to DreamHost mailbox.';

    public function run(array $params)
    {
        if (!function_exists('imap_open')) {
            CLI::error('IMAP extension not installed.');
            return;
        }

        $host = getenv('MYMI_ALERTS_IMAP_HOST') ?: 'imap.dreamhost.com';
        $port = (int)(getenv('MYMI_ALERTS_IMAP_PORT') ?: 993);
        $user = getenv('MYMI_ALERTS_IMAP_USER');
        $pass = getenv('MYMI_ALERTS_IMAP_PASS');
        $mailbox = getenv('MYMI_ALERTS_IMAP_MAILBOX') ?: 'INBOX';

        $connection = sprintf(
            '{%s:%d/imap/ssl/novalidate-cert}%s',
            $host,
            $port,
            $mailbox
        );

        CLI::write("Testing IMAP: {$connection}", 'yellow');

        $imap = @imap_open($connection, $user, $pass);

        if (!$imap) {
            CLI::error('Connection failed.');
            CLI::write('Last Error: ' . imap_last_error(), 'red');
            CLI::write('All Errors: ' . json_encode(imap_errors()), 'red');
            return;
        }

        CLI::write('IMAP Connected Successfully!', 'green');
        imap_close($imap);
    }
}
