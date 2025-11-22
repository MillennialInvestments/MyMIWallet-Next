<?php
namespace App\Libraries\AlertChannels;

use App\Libraries\AlertChannelInterface;

class DiscordChannel implements AlertChannelInterface
{
    public function __construct(private $client = null)
    {
        $this->client = $client;
    }

    public function getName(): string
    {
        return 'discord';
    }

    public function deliver(array $alert): bool
    {
        if (empty($alert['summary'])) {
            return false;
        }

        try {
            if ($this->client && method_exists($this->client, 'sendAlert')) {
                $this->client->sendAlert($alert);
            } else {
                log_message('info', 'DiscordChannel deliver placeholder: ' . ($alert['summary'] ?? '')); 
            }
            return true;
        } catch (\Throwable $e) {
            log_message('error', 'DiscordChannel failed: ' . $e->getMessage());
            return false;
        }
    }
}