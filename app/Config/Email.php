<?php namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    public string $fromEmail  = 'no-reply@mymiwallet.com';
    public string $fromName   = 'MyMI Wallet';
    public string $recipients = '';

    public string $protocol   = 'smtp';
    public string $SMTPHost   = 'smtp.dreamhost.com'; // or your assigned host
    public string $SMTPUser   = 'support@mymiwallet.com';  // leave blank; we’ll set via .env at runtime
    public string $SMTPPass   = 'Dawg@239223.dawg';  // leave blank; we’ll set via .env at runtime
    public int    $SMTPPort   = 587;
    public string $SMTPCrypto = 'tls';

    public string $mailType   = 'html';
    public string $charset    = 'utf-8';
    public bool   $wordWrap   = true;
    public string $newline    = "\r\n";
    public string $CRLF       = "\r\n";

    public function __construct()
    {
        parent::__construct();

        // Pull from .env at runtime
        $this->fromEmail = env('email.fromEmail', $this->fromEmail);
        $this->fromName  = env('email.fromName',  $this->fromName);
        $this->SMTPHost  = env('email.smtpHost',  $this->SMTPHost);
        $this->SMTPUser  = env('email.smtpUser',  $this->SMTPUser);
        $this->SMTPPass  = env('email.smtpPass',  $this->SMTPPass);
        $this->SMTPPort  = (int) env('email.smtpPort', $this->SMTPPort);
        $this->SMTPCrypto= env('email.smtpCrypto', $this->SMTPCrypto);
    }
}
