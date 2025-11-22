<?php
namespace App\Libraries\AlertChannels;

use App\Libraries\AlertChannelInterface;
use CodeIgniter\Email\Email;

class EmailChannel implements AlertChannelInterface
{
    public function __construct(private ?Email $mailer = null)
    {
        $this->mailer = $mailer ?? service('email');
    }

    public function getName(): string
    {
        return 'email';
    }

    public function deliver(array $alert): bool
    {
        if (! $this->mailer) {
            return false;
        }

        try {
            $this->mailer->clear();
            $this->mailer->setTo($alert['recipient'] ?? 'alerts@mymiwallet.com');
            $this->mailer->setSubject('MyMI Trade Alert: ' . ($alert['symbol'] ?? 'Update'));
            $this->mailer->setMessage($alert['summary'] ?? '');
            return $this->mailer->send();
        } catch (\Throwable $e) {
            log_message('error', 'EmailChannel failed: ' . $e->getMessage());
            return false;
        }
    }
}