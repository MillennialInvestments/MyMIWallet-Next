<?php

declare(strict_types=1);

namespace App\Commands\DreamHost;

use App\Commands\SafeBaseCommand;;
use CodeIgniter\CLI\CLI;

class EnvDebug extends SafeBaseCommand
{
    protected $group       = 'DreamHost Diagnostics';
    protected $name        = 'dreamhost:env';
    protected $description = 'Display relevant DreamHost environment variables.';

    public function run(array $params)
    {
        $vars = [
            'MYMI_ALERTS_IMAP_HOST',
            'MYMI_ALERTS_IMAP_PORT',
            'MYMI_ALERTS_IMAP_USER',
            'MYMI_ALERTS_IMAP_MAILBOX',
        ];

        foreach ($vars as $var) {
            CLI::write($var . ' = ' . (env($var) ?: 'NOT SET'));
        }
    }
}
