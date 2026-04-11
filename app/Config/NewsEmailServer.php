<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class NewsEmailServer extends BaseConfig
{
    public string $host = 'imap.dreamhost.com';
    public int $port = 993;
    public string $encryption = 'ssl';
    public string $username = 'tradealerts@mymiwallet.com';
    public string $password = '';
    public string $folder = 'INBOX';
    public string $subject_filter = 'Press Release';

    public function resolve(?string $mailboxOverride = null): array
    {
        $usernameOverride = trim((string) ($mailboxOverride ?? ''));
        $sources = [];

        $host = $this->resolveByPrefixes(['HOST'], (string) $this->host, $sources, 'host');
        $port = (int) $this->resolveByPrefixes(['PORT'], (string) $this->port, $sources, 'port');
        $encryption = strtolower($this->resolveByPrefixes(['ENCRYPTION'], (string) $this->encryption, $sources, 'encryption'));
        $username = $usernameOverride !== ''
            ? $usernameOverride
            : $this->resolveByPrefixes(['USER', 'USERNAME'], (string) $this->username, $sources, 'username');
        if ($usernameOverride !== '') {
            $sources['username'] = 'runtime_override';
        }
        $password = $this->resolveByPrefixes(['PASS', 'PASSWORD'], (string) $this->password, $sources, 'password');
        $folder = $this->resolveByPrefixes(['MAILBOX', 'FOLDER'], (string) $this->folder, $sources, 'folder');
        $subjectFilter = $this->resolveByPrefixes(['SUBJECT_FILTER'], (string) $this->subject_filter, $sources, 'subject_filter');

        if (strtolower(trim($username)) === 'inbox') {
            throw new \RuntimeException('Invalid IMAP username resolution: username resolved to INBOX');
        }

        return [
            'host' => trim($host),
            'port' => $port,
            'encryption' => $encryption !== '' ? $encryption : 'ssl',
            'username' => trim($username),
            'password' => $password,
            'folder' => trim($folder) !== '' ? trim($folder) : 'INBOX',
            'subject_filter' => trim($subjectFilter) !== '' ? trim($subjectFilter) : 'Press Release',
            'source_map' => $sources,
        ];
    }

    public function buildConnectionString(array $config, ?string $folder = null): string
    {
        $host = (string) ($config['host'] ?? $this->host);
        $port = (int) ($config['port'] ?? $this->port);
        $encryption = strtolower((string) ($config['encryption'] ?? $this->encryption));
        $folder = trim((string) ($folder ?: ($config['folder'] ?? $this->folder)));

        return sprintf(
            '{%s:%d/imap/%s/novalidate-cert}%s',
            $host,
            (int) $port,
            $encryption !== '' ? $encryption : 'ssl',
            $folder !== '' ? $folder : 'INBOX'
        );
    }

    public function toArray(?string $usernameOverride = null): array
    {
        return $this->resolve($usernameOverride);
    }

    private function resolveByPrefixes(array $suffixes, string $default, array &$sources, string $field): string
    {
        $prefixes = ['MARKETING_NEWS_IMAP_', 'MYMI_ALERTS_IMAP_', 'IMAP_'];
        foreach ($prefixes as $prefix) {
            foreach ($suffixes as $suffix) {
                $key = $prefix . $suffix;
                $value = env($key);
                if ($value !== null && trim((string) $value) !== '') {
                    $sources[$field] = $key;
                    return (string) $value;
                }
            }
        }

        if ($field === 'subject_filter') {
            $legacy = env('MARKETING_NEWS_SUBJECT_FILTER');
            if ($legacy !== null && trim((string) $legacy) !== '') {
                $sources[$field] = 'MARKETING_NEWS_SUBJECT_FILTER';
                return (string) $legacy;
            }
        }

        $sources[$field] = 'default';
        return $default;
    }
}
