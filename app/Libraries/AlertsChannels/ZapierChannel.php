<?php
namespace App\Libraries\AlertChannels;

use App\Libraries\AlertChannelInterface;
use CodeIgniter\HTTP\CURLRequest;

class ZapierChannel implements AlertChannelInterface
{
    public function __construct(private ?CURLRequest $client = null, private ?string $webhookUrl = null)
    {
        $this->client = $client ?? service('curlrequest');
        $this->webhookUrl = $webhookUrl ?? getenv('ZAPIER_ALERT_WEBHOOK');
    }

    public function getName(): string
    {
        return 'zapier';
    }

    public function deliver(array $alert): bool
    {
        if (! $this->client || empty($this->webhookUrl)) {
            return false;
        }

        try {
            $response = $this->client->post($this->webhookUrl, [
                'json' => $alert,
                'timeout' => 5,
            ]);
            return $response->getStatusCode() >= 200 && $response->getStatusCode() < 300;
        } catch (\Throwable $e) {
            log_message('error', 'ZapierChannel failed: ' . $e->getMessage());
            return false;
        }
    }
}