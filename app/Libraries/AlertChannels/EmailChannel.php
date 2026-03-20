<?php
namespace App\Libraries\AlertChannels;

use App\Libraries\AlertChannelInterface;

class EmailChannel implements AlertChannelInterface
{
    public function __construct(private $mailer = null)
    {
        $this->mailer = $mailer ?? service('mailService');
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
            $config = config('MyMI');
            $result = $this->mailer->send(
                $alert['recipient'] ?? $config->alertEmail,
                'MyMI Trade Alert: ' . ($alert['symbol'] ?? 'Update'),
                $alert['summary'] ?? '',
                ['module' => 'alerts', 'queue' => true]
            );

            return (bool) ($result['ok'] ?? false);
        } catch (\Throwable $e) {
            log_message('error', 'EmailChannel failed: ' . $e->getMessage());
            return false;
        }
    }
}
