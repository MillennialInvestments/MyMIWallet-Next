<?php

declare(strict_types=1);

namespace App\Services\Ops;

use CodeIgniter\HTTP\CURLRequest;
use Config\Services;
use Throwable;

class SnapshotWriter
{
    /**
     * @return array{path: string|null, wrote: bool, warnings: list<string>}
     */
    public function write(string $path, array $payload, bool $dryRun): array
    {
        $warnings = [];

        if ($dryRun) {
            return [
                'path' => $path,
                'wrote' => false,
                'warnings' => ['Dry-run: snapshot not written.'],
            ];
        }

        $dir = dirname($path);
        if (! is_dir($dir) && ! @mkdir($dir, 0755, true)) {
            $warnings[] = sprintf('Unable to create snapshot directory: %s', $dir);
            return [
                'path' => $path,
                'wrote' => false,
                'warnings' => $warnings,
            ];
        }

        $encoded = json_encode($payload, JSON_PRETTY_PRINT);
        if ($encoded === false) {
            $warnings[] = 'Snapshot JSON encoding failed.';
            return [
                'path' => $path,
                'wrote' => false,
                'warnings' => $warnings,
            ];
        }

        $wrote = file_put_contents($path, $encoded) !== false;
        if (! $wrote) {
            $warnings[] = 'Snapshot write failed.';
        }

        return [
            'path' => $path,
            'wrote' => $wrote,
            'warnings' => $warnings,
        ];
    }

    /**
     * @return list<string>
     */
    public function dispatch(array $summary, bool $dryRun): array
    {
        $warnings = [];
        if ($dryRun) {
            return ['Dry-run: webhook dispatch skipped.'];
        }

        $discord = env('OPS_APP_UPDATE_DISCORD_WEBHOOK') ?: '';
        $webhook = env('OPS_APP_UPDATE_WEBHOOK_URL') ?: '';

        if ($discord) {
            $warnings = array_merge($warnings, $this->postDiscord($discord, $summary));
        }

        if ($webhook) {
            $warnings = array_merge($warnings, $this->postWebhook($webhook, $summary));
        }

        return $warnings;
    }

    /**
     * @return list<string>
     */
    private function postDiscord(string $url, array $summary): array
    {
        $payload = [
            'content' => sprintf(
                'ops:app:update summary — %s passed, %s warnings, %s failures.',
                $summary['passed'] ?? 0,
                $summary['warnings'] ?? 0,
                $summary['failures'] ?? 0
            ),
        ];

        return $this->post($url, $payload);
    }

    /**
     * @return list<string>
     */
    private function postWebhook(string $url, array $summary): array
    {
        return $this->post($url, $summary);
    }

    /**
     * @return list<string>
     */
    private function post(string $url, array $payload): array
    {
        try {
            $client = $this->client();
            $client->post($url, [
                'json' => $payload,
                'timeout' => 3,
                'http_errors' => false,
            ]);
            return [];
        } catch (Throwable $e) {
            return ['Webhook dispatch failed: ' . $e->getMessage()];
        }
    }

    private function client(): CURLRequest
    {
        return Services::curlrequest([
            'timeout' => 3,
            'connect_timeout' => 2,
        ]);
    }
}
