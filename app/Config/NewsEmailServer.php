<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class NewsEmailServer extends BaseConfig
{
    public string $host = 'imap.dreamhost.com';
    public int $port = 993;
    public string $encryption = 'ssl';
    public string $username = 'news@mymiwallet.com';
    public string $password = '';
    public string $mailbox = 'news@mymiwallet.com';
    public string $default_folder = 'INBOX';
    public string $search_criteria = 'ALL';

    /** @var array<string,array{username:string,password_env:string}> */
    public array $mailboxes = [
        'news@mymiwallet.com' => [
            'username' => 'news@mymiwallet.com',
            'password_env' => 'MYMI_NEWS_IMAP_PASSWORD',
        ],
        'alerts@mymiwallet.com' => [
            'username' => 'alerts@mymiwallet.com',
            'password_env' => 'MYMI_ALERTS_IMAP_PASSWORD',
        ],
        'tradealerts@mymiwallet.com' => [
            'username' => 'tradealerts@mymiwallet.com',
            'password_env' => 'MYMI_TRADEALERTS_IMAP_PASSWORD',
        ],
    ];

    public function resolve(?string $mailboxOverride = null): array
    {
        $mailbox = strtolower(trim((string) ($mailboxOverride ?: env('MARKETING_NEWS_IMAP_MAILBOX', env('MARKETING_IMAP_MAILBOX', $this->mailbox)))));
        if ($mailbox === '') {
            $mailbox = $this->mailbox;
        }

        $mailboxConfig = $this->mailboxes[$mailbox] ?? [
            'username' => $mailbox,
            'password_env' => '',
        ];

        $username = (string) env('MARKETING_NEWS_IMAP_USERNAME', env('MARKETING_IMAP_USERNAME', $mailboxConfig['username'] ?: $this->username));
        $passwordFromMailboxEnv = $mailboxConfig['password_env'] !== '' ? (string) env($mailboxConfig['password_env'], '') : '';
        $password = (string) env('MARKETING_NEWS_IMAP_PASSWORD', env('MARKETING_IMAP_PASSWORD', $passwordFromMailboxEnv !== '' ? $passwordFromMailboxEnv : $this->password));

        return [
            'host' => (string) env('MARKETING_NEWS_IMAP_HOST', env('MARKETING_IMAP_HOST', env('MYMI_ALERTS_IMAP_HOST', $this->host))),
            'port' => (int) env('MARKETING_NEWS_IMAP_PORT', env('MARKETING_IMAP_PORT', $this->port)),
            'encryption' => strtolower((string) env('MARKETING_NEWS_IMAP_ENCRYPTION', env('MARKETING_IMAP_ENCRYPTION', $this->encryption))),
            'username' => $username,
            'password' => $password,
            'mailbox' => $mailbox,
            'default_folder' => (string) env('MARKETING_NEWS_IMAP_DEFAULT_FOLDER', env('MARKETING_IMAP_DEFAULT_FOLDER', $this->default_folder)),
            'search_criteria' => (string) env('MARKETING_NEWS_IMAP_SEARCH', env('MARKETING_IMAP_SEARCH', $this->search_criteria)),
        ];
    }

    public function buildConnectionString(array $config, ?string $folder = null): string
    {
        $host = (string) ($config['host'] ?? $this->host);
        $port = (int) ($config['port'] ?? $this->port);
        $encryption = strtolower((string) ($config['encryption'] ?? $this->encryption));
        $folder = trim((string) ($folder ?: ($config['default_folder'] ?? $this->default_folder)));
        if ($folder === '') {
            $folder = 'INBOX';
        }

        return sprintf('{%s:%d/imap/%s}%s', $host, $port, $encryption, $folder);
    }
}
