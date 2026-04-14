<?php

declare(strict_types=1);

namespace App\Services\Discord;

use Config\DiscordOps;
use Config\Services;

class DiscordOpsRelayService
{
    public function __construct(private ?DiscordOps $config = null)
    {
        $this->config ??= config('DiscordOps');
    }

    /** @return array{success:bool,content:string,meta:array<string,mixed>} */
    public function relayAiopsPrompt(string $prompt, array $context = []): array
    {
        return $this->relayPrompt(
            $prompt,
            [
                ['base' => $this->config->aiopsPrimaryBaseUrl, 'token' => $this->config->aiopsInternalToken],
                ['base' => $this->config->aiopsFallbackBaseUrl, 'token' => $this->config->aiopsInternalToken],
                ['base' => $this->config->aiopsSecondaryBaseUrl, 'token' => $this->config->aiopsInternalToken],
            ],
            '/api/chat',
            $context
        );
    }

    /** @return array{success:bool,content:string,meta:array<string,mixed>} */
    public function relayOllamaPrompt(string $prompt, array $context = []): array
    {
        return $this->relayPrompt(
            $prompt,
            [
                ['base' => $this->config->ollamaPrimaryBaseUrl, 'token' => $this->config->ollamaInternalToken],
                ['base' => $this->config->ollamaFallbackBaseUrl, 'token' => $this->config->ollamaInternalToken],
                ['base' => $this->config->ollamaSecondaryBaseUrl, 'token' => $this->config->ollamaInternalToken],
            ],
            '/api/chat',
            $context
        );
    }

    /** @param list<array{base:string,token:string}> $targets */
    private function relayPrompt(string $prompt, array $targets, string $endpoint, array $context): array
    {
        $client = Services::curlrequest(['timeout' => $this->config->relayTimeoutSeconds]);
        $attempts = [];

        foreach ($targets as $target) {
            $base = trim((string) ($target['base'] ?? ''));
            if ($base === '') {
                continue;
            }

            $url = rtrim($base, '/') . $endpoint;
            $headers = ['Accept' => 'application/json'];
            if (($target['token'] ?? '') !== '') {
                $headers['X-Internal-Token'] = (string) $target['token'];
            }

            try {
                $response = $client->post($url, [
                    'headers' => $headers,
                    'json' => [
                        'prompt' => $prompt,
                        'source' => 'discord',
                        'context' => $context,
                    ],
                ]);

                $status = $response->getStatusCode();
                $body = (string) $response->getBody();
                $attempts[] = ['url' => $url, 'status' => $status];

                if ($status >= 200 && $status < 300) {
                    $decoded = json_decode($body, true);
                    $reply = (string) ($decoded['reply'] ?? $decoded['response'] ?? $decoded['message'] ?? $body);
                    return [
                        'success' => true,
                        'content' => $this->truncateReply($reply),
                        'meta' => ['url' => $url, 'status' => $status, 'attempts' => $attempts],
                    ];
                }
            } catch (\Throwable $e) {
                $attempts[] = ['url' => $url, 'error' => $e->getMessage()];
            }
        }

        return [
            'success' => false,
            'content' => 'Relay unavailable. The service did not respond in time.',
            'meta' => ['attempts' => $attempts],
        ];
    }

    public function truncateReply(string $content): string
    {
        $content = trim($content);
        if (mb_strlen($content) <= $this->config->maxDiscordReplyLength) {
            return $content;
        }

        return rtrim(mb_substr($content, 0, $this->config->maxDiscordReplyLength - 1)) . '…';
    }
}
