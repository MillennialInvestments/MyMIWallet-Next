<?php

declare(strict_types=1);

namespace App\Services\Marketing\Distribution\Adapters;

use App\Libraries\MyMIDiscord;
use App\Services\Marketing\Distribution\DestinationSendResult;
use Config\MarketingDistribution;

final class DiscordDestinationAdapter implements DestinationAdapterInterface
{
    public function __construct(private MyMIDiscord $discordService, private MarketingDistribution $distributionConfig)
    {
    }

    public function send(array $target, array $payload): DestinationSendResult
    {
        $channelKey = (string) ($target['destination'] ?? $payload['discord_channel_key'] ?? $this->distributionConfig->discord['fallback_channel']);
        $message = $this->normalizeMessage((string) ($payload['message'] ?? $payload['summary'] ?? ''));
        if ($message === '') {
            return new DestinationSendResult(false, null, false, 'payload_empty', null, 'Discord payload empty after normalization');
        }

        $webhook = trim((string) ($payload['webhook_url'] ?? ''));
        if ($webhook !== '' && !$this->isValidWebhookUrl($webhook)) {
            return new DestinationSendResult(false, null, false, 'config_invalid_webhook', null, 'Invalid Discord webhook URL format');
        }

        $result = $this->discordService->sendToChannel($channelKey, [
            'content' => $message,
            'allowed_mentions' => $payload['allowed_mentions'] ?? ['parse' => []],
            'webhook_url' => $webhook !== '' ? $webhook : null,
        ], null);

        $status = isset($result['http_status']) ? (int) $result['http_status'] : null;
        if (($result['success'] ?? false) === true) {
            return new DestinationSendResult(true, $status, false, null, $result['external_message_id'] ?? null, 'discord_sent', date('Y-m-d H:i:s'), null, $result['response_headers'] ?? [], $result['response_body'] ?? null);
        }

        [$retryable, $failureClass] = $this->classifyFailure($status, (string) ($result['error_message'] ?? 'discord_failed'));
        $nextRetry = $retryable ? $this->resolveNextRetryAt($status, $result['response_headers'] ?? []) : null;

        return new DestinationSendResult(
            false,
            $status,
            $retryable,
            $failureClass,
            null,
            mb_substr((string) ($result['error_message'] ?? 'discord_failed'), 0, 500),
            null,
            $nextRetry,
            $result['response_headers'] ?? [],
            $result['response_body'] ?? null,
        );
    }

    private function normalizeMessage(string $content): string
    {
        $content = str_replace(["\r\n", "\r"], "\n", $content);
        $content = mb_convert_encoding($content, 'UTF-8', 'UTF-8');
        $content = trim($content);
        $maxLength = (int) ($this->distributionConfig->discord['max_length'] ?? 1800);

        return mb_strlen($content) > $maxLength
            ? mb_substr($content, 0, max(0, $maxLength - 1)) . '…'
            : $content;
    }

    private function isValidWebhookUrl(string $url): bool
    {
        return (bool) preg_match('#^https://(canary\.)?discord\.com/api/webhooks/\d+/[A-Za-z0-9._\-]+#', $url);
    }

    /** @return array{0:bool,1:string} */
    private function classifyFailure(?int $status, string $message): array
    {
        if (in_array($status, [400, 401, 403, 404], true)) {
            return [false, $status === 403 ? 'discord_permission_denied' : 'discord_permanent_http'];
        }

        if ($status === 429) {
            return [true, 'discord_rate_limited'];
        }

        if ($status === null || in_array($status, [408, 409, 425], true) || ($status >= 500 && $status <= 599)) {
            return [true, 'discord_retryable_http'];
        }

        if (str_contains(strtolower($message), 'timed out')) {
            return [true, 'discord_network_timeout'];
        }

        return [false, 'discord_unknown_failure'];
    }

    /** @param array<string,mixed> $headers */
    private function resolveNextRetryAt(?int $status, array $headers): string
    {
        $delay = 300;
        if ($status === 429) {
            $retryAfter = $headers['Retry-After'][0] ?? $headers['retry-after'][0] ?? null;
            if (is_scalar($retryAfter) && is_numeric((string) $retryAfter)) {
                $delay = max(1, (int) ceil((float) $retryAfter));
            }
        }

        return date('Y-m-d H:i:s', time() + $delay);
    }
}
