<?php

declare(strict_types=1);

namespace App\Libraries\ContentEngine;

use App\Models\ContentPostModel;
use App\Config\ContentEngine as ContentEngineConfig;
use CodeIgniter\HTTP\CURLRequest;

class DistributionService
{
    protected ContentEngineConfig $config;
    protected ContentPostModel $postModel;
    protected CURLRequest $client;

    public function __construct(?ContentEngineConfig $config = null)
    {
        $this->config = $config ?? config(ContentEngineConfig::class);
        $this->postModel = model(ContentPostModel::class);
        $this->client = service('curlrequest');
    }

    public function send(int $postId): array
    {
        $post = $this->postModel->find($postId);
        if (! $post) {
            return ['status' => 'error', 'message' => 'Post not found'];
        }

        if (! $this->config->distributionEnabled) {
            return ['status' => 'skipped', 'message' => 'Distribution disabled'];
        }

        $payload = json_decode($post['payload_json'] ?? '{}', true);
        $destinationCount = 0;
        $errors = [];

        if ($this->config->zapierWebhookUrl) {
            try {
                $response = $this->client->post($this->config->zapierWebhookUrl, ['json' => $payload]);
                $destinationCount++;
                if ($response->getStatusCode() >= 300) {
                    $errors[] = 'Zapier status ' . $response->getStatusCode();
                }
            } catch (\Throwable $e) {
                $errors[] = 'Zapier error: ' . $e->getMessage();
            }
        }

        if ($this->config->discordEnabled) {
            $destinationCount++;
            log_message('info', 'ContentEngine Discord dispatch placeholder for post ' . $postId);
        }

        if ($destinationCount === 0) {
            return ['status' => 'skipped', 'message' => 'No distribution targets configured'];
        }

        if ($errors === []) {
            $this->postModel->update($postId, [
                'status' => 'sent',
                'last_error' => null,
            ]);

            return ['status' => 'sent'];
        }

        $this->postModel->update($postId, ['status' => 'failed', 'last_error' => implode('; ', $errors)]);
        return ['status' => 'failed', 'message' => implode('; ', $errors)];
    }
}