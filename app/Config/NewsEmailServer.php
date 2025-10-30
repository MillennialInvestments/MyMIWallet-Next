<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class NewsEmailServer extends BaseConfig
{
    public string $host       = 'imap.example.com';   // Replace with your IMAP server host
    public int $port          = 993;                  // Replace with the port number for IMAP (typically 993 for SSL)
    public string $encryption = 'ssl';                // Replace with the encryption type (e.g., 'ssl', 'tls')
    public string $username   = 'your-email@example.com'; // Replace with your email address
    public string $password   = 'your-email-password'; // Replace with your email password

    public string $fromEmail  = 'support@mymiwallet.com';
    public string $fromName   = 'MyMI Wallet - Customer Support';
    public string $recipients = '';  // This can be left empty or filled in based on your requirements
}
