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

        $username = CLI::getOption('username');
        $mailbox = CLI::getOption('mailbox');
        if ((! is_string($username) || trim($username) === '') && is_string($mailbox) && str_contains($mailbox, '@')) {
            $username = $mailbox;
        }
        $folder = (string) (CLI::getOption('folder') ?: 'INBOX');
        $config = config('NewsEmailServer');
        try {
            $resolved = $config->resolve(is_string($username) ? $username : null);
        } catch (\RuntimeException $e) {
            CLI::write((string) json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], JSON_PRETTY_PRINT));
            return;
        }
        if (strtolower(trim((string) ($resolved['username'] ?? ''))) === 'inbox') {
            CLI::write((string) json_encode([
                'status' => 'error',
                'message' => 'Invalid IMAP username resolution: username resolved to INBOX',
                'resolved' => $resolved,
            ], JSON_PRETTY_PRINT));
            return;
        }

        if (trim((string) ($resolved['password'] ?? '')) === '') {
            CLI::write((string) json_encode([
                'status' => 'error',
                'message' => 'Missing IMAP password for tradealerts@mymiwallet.com',
                'config_resolved' => true,
                'password_present' => false,
                'resolved' => [
                    'host' => $resolved['host'] ?? null,
                    'port' => $resolved['port'] ?? null,
                    'encryption' => $resolved['encryption'] ?? null,
                    'username' => $resolved['username'] ?? null,
                    'folder' => $folder,
                ],
                'source_map' => $resolved['source_map'] ?? [],
            ], JSON_PRETTY_PRINT));
            return;
        }
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
                'source_map' => $resolved['source_map'] ?? [],
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
            'source_map' => $resolved['source_map'] ?? [],
            'connection_ok' => true,
            'folders' => $folders,
        ], JSON_PRETTY_PRINT));
    }
}
