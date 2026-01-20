<?php namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    public string $fromEmail  = 'support@mymiwallet.com';
    public string $fromName   = 'MyMI Wallet Support';
    public string $replyToEmail = 'support@mymiwallet.com';
    public string $replyToName = 'MyMI Wallet Support';
    public string $recipients = '';

    public string $protocol   = 'smtp';
    public string $SMTPHost   = 'smtp.dreamhost.com';
    public string $SMTPUser   = '';
    public string $SMTPPass   = '';
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

        $this->fromEmail = env('mail.from.email', env('email.fromEmail', $this->fromEmail));
        $this->fromName  = env('mail.from.name', env('email.fromName', $this->fromName));
        $this->replyToEmail = env('mail.reply_to.email', env('email.replyToEmail', $this->replyToEmail));
        $this->replyToName = env('mail.reply_to.name', env('email.replyToName', $this->replyToName));
        $this->protocol  = env('mail.protocol', env('email.protocol', $this->protocol));

        $this->SMTPHost   = env('mail.smtp.host', env('email.SMTPHost', env('email.smtpHost', $this->SMTPHost)));
        $this->SMTPUser   = env('mail.smtp.user', env('email.SMTPUser', env('email.smtpUser', $this->SMTPUser)));
        $this->SMTPPass   = env('mail.smtp.pass', env('email.SMTPPass', env('email.smtpPass', $this->SMTPPass)));
        $this->SMTPPort   = (int) env('mail.smtp.port', env('email.SMTPPort', env('email.smtpPort', $this->SMTPPort)));
        $this->SMTPCrypto = env('mail.smtp.crypto', env('email.SMTPCrypto', env('email.smtpCrypto', $this->SMTPCrypto)));
    }
}
