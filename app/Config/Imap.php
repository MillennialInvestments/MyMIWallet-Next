<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Imap extends BaseConfig
{
    public string $path;
    public string $username;
    public string $password;
    public string $mailbox;
    public int $timeout = 30;

    public function __construct()
    {
        parent::__construct();

        $this->path     = (string) env('IMAP_PATH', '');
        $this->username = (string) env('IMAP_USER', '');
        $this->password = (string) env('IMAP_PASS', '');
        $this->mailbox  = (string) env('IMAP_MAILBOX', 'INBOX');
    }

    public function isConfigured(): bool
    {
        return ! empty($this->path)
            && ! empty($this->username)
            && ! empty($this->password);
    }
}
