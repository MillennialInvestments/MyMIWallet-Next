<?php

namespace App\Commands;

use CodeIgniter\CLI\CLI;

class MarketingNewsImapTest extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:news:imap-test';
    protected $description = 'Smoke test for marketing/news IMAP connectivity.';

    public function run(array $params)
    {
        if (! function_exists('imap_open')) {
            CLI::write((string) json_encode(['status' => 'error', 'error' => 'imap_open not available'], JSON_PRETTY_PRINT));
            return;
        }

        $mailbox = CLI::getOption('mailbox');
        $folder = (string) (CLI::getOption('folder') ?: 'INBOX');
        $config = config('NewsEmailServer');
        $resolved = $config->resolve(is_string($mailbox) ? $mailbox : null);
        $connection = $config->buildConnectionString($resolved, $folder);

        $imap = @imap_open($connection, (string) $resolved['username'], (string) $resolved['password']);
        if ($imap === false) {
            CLI::write((string) json_encode([
                'status' => 'error',
                'success' => false,
                'config_resolved' => ! empty($resolved['host']) && ! empty($resolved['username']),
                'password_present' => ! empty($resolved['password']),
                'resolved' => [
                    'host' => $resolved['host'] ?? null,
                    'port' => $resolved['port'] ?? null,
                    'encryption' => $resolved['encryption'] ?? null,
                    'username' => $resolved['username'] ?? null,
                    'folder' => $folder,
                ],
                'imap_last_error' => imap_last_error(),
            ], JSON_PRETTY_PRINT));
            return;
        }

        $base = sprintf('{%s:%d/imap}', $resolved['host'], (int) $resolved['port']);
        $boxes = imap_getmailboxes($imap, $base, '*') ?: [];
        $folders = [];
        foreach (array_slice($boxes, 0, 5) as $box) {
            $folders[] = str_replace($base, '', imap_utf7_decode((string) $box->name));
        }
        imap_close($imap);

        CLI::write((string) json_encode([
            'status' => 'success',
            'success' => true,
            'config_resolved' => true,
            'password_present' => ! empty($resolved['password']),
            'resolved' => [
                'host' => $resolved['host'] ?? null,
                'port' => $resolved['port'] ?? null,
                'encryption' => $resolved['encryption'] ?? null,
                'username' => $resolved['username'] ?? null,
                'folder' => $folder,
            ],
            'folders' => $folders,
        ], JSON_PRETTY_PRINT));
    }
}
