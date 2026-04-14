<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class MarketingDistribution extends BaseConfig
{
    /** @var array<string,bool> */
    public array $enabledDestinations = [
        'blog' => true,
        'in_app' => true,
        'email' => true,
        'discord' => true,
        'bluesky' => false,
        'mastodon' => false,
        'linkedin' => false,
        'webhook' => false,
    ];

    /** @var array<string,list<string>> */
    public array $routingRulesBySourceType = [
        'default' => ['blog', 'in_app', 'email', 'discord', 'bluesky', 'mastodon', 'linkedin', 'webhook'],
        'notification' => ['in_app', 'email', 'discord', 'webhook'],
        'headline' => ['blog', 'discord', 'bluesky', 'mastodon'],
        'campaign' => ['blog', 'email', 'discord', 'bluesky', 'mastodon', 'linkedin', 'webhook'],
    ];

    /** @var list<string> */
    public array $internalEmailRecipients = [
        'ops@mymiwallet.com',
    ];

    /** @var array<string,mixed> */
    public array $bluesky = [
        'enabled' => false,
        'identifier' => '',
        'app_password' => '',
        'pds_endpoint' => 'https://bsky.social',
    ];

    /** @var array<string,mixed> */
    public array $mastodon = [
        'enabled' => false,
        'base_url' => '',
        'access_token' => '',
    ];

    /** @var array<string,mixed> */
    public array $linkedin = [
        'enabled' => false,
        'client_id' => '',
        'client_secret' => '',
        'organization_urn' => '',
        'access_token' => '',
        'phase' => 'phase_ii',
        'todo' => 'LinkedIn Organization posting requires app review, member authorization, and production scopes before enabling.',
    ];

    /** @var array<string,mixed> */
    public array $webhook = [
        'enabled' => false,
        'endpoint_url' => '',
        'timeout_seconds' => 10,
        'retry_limit' => 3,
        'headers' => [],
    ];

    /** @var array<string,mixed> */
    public array $discord = [
        'enabled' => true,
        'stream_enabled' => true,
        'fallback_channel' => 'community_news',
        'allow_everyone_for_announcement_only' => true,
        'default_mentions_disabled' => true,
        'max_length' => 1800,
        'truncate_suffix' => '…',
        'mention_policy' => [
            'routine_parse' => [],
            'announcement_parse' => ['everyone'],
        ],
        'channels' => [
            'community_news' => '',
            'announcements' => '',
            'mymi_news' => '',
            'crypto_news' => '',
            'financial_news' => '',
            'stock_news' => '',
            'custom_messages' => '',
            'ticker_lookup' => '',
            'aiops_chat' => '',
            'ollama_chat' => '',
            'admin_spark' => '',
        ],
        'category_channel_map' => [
            'community_news' => ['community_news'],
            'announcements' => ['announcements'],
            'mymi_news' => ['mymi_news'],
            'crypto_news' => ['crypto_news'],
            'financial_news' => ['financial_news'],
            'stock_news' => ['stock_news'],
            'custom_messages' => ['custom_messages'],
            'customer_support' => ['custom_messages'],
            'ticker_lookup' => ['ticker_lookup'],
            'aiops_chat' => ['aiops_chat'],
            'ollama_chat' => ['ollama_chat'],
            'admin_spark' => ['admin_spark'],
        ],
    ];

    public int $maxRetries = 3;
    public bool $autoCreateTargetsOnApprove = true;
    /** @var list<string> */
    public array $failureInjectionDestinations = [];

    public function __construct()
    {
        parent::__construct();

        foreach (array_keys($this->enabledDestinations) as $destination) {
            $this->enabledDestinations[$destination] = (bool) env('MARKETING_DISTRIBUTION_' . strtoupper($destination) . '_ENABLED', $this->enabledDestinations[$destination]);
        }

        $this->bluesky['enabled'] = (bool) env('MARKETING_BLUESKY_ENABLED', $this->bluesky['enabled']);
        $this->bluesky['identifier'] = (string) env('MARKETING_BLUESKY_IDENTIFIER', $this->bluesky['identifier']);
        $this->bluesky['app_password'] = (string) env('MARKETING_BLUESKY_APP_PASSWORD', $this->bluesky['app_password']);
        $this->bluesky['pds_endpoint'] = rtrim((string) env('MARKETING_BLUESKY_PDS_ENDPOINT', $this->bluesky['pds_endpoint']), '/');

        $this->mastodon['enabled'] = (bool) env('MARKETING_MASTODON_ENABLED', $this->mastodon['enabled']);
        $this->mastodon['base_url'] = rtrim((string) env('MARKETING_MASTODON_BASE_URL', $this->mastodon['base_url']), '/');
        $this->mastodon['access_token'] = (string) env('MARKETING_MASTODON_ACCESS_TOKEN', $this->mastodon['access_token']);

        $this->linkedin['enabled'] = (bool) env('MARKETING_LINKEDIN_ENABLED', $this->linkedin['enabled']);
        $this->linkedin['client_id'] = (string) env('MARKETING_LINKEDIN_CLIENT_ID', $this->linkedin['client_id']);
        $this->linkedin['client_secret'] = (string) env('MARKETING_LINKEDIN_CLIENT_SECRET', $this->linkedin['client_secret']);
        $this->linkedin['organization_urn'] = (string) env('MARKETING_LINKEDIN_ORGANIZATION_URN', $this->linkedin['organization_urn']);
        $this->linkedin['access_token'] = (string) env('MARKETING_LINKEDIN_ACCESS_TOKEN', $this->linkedin['access_token']);

        $this->webhook['enabled'] = (bool) env('MARKETING_WEBHOOK_ENABLED', $this->webhook['enabled']);
        $this->webhook['endpoint_url'] = (string) env('MARKETING_WEBHOOK_ENDPOINT_URL', $this->webhook['endpoint_url']);
        $this->webhook['timeout_seconds'] = max(1, (int) env('MARKETING_WEBHOOK_TIMEOUT_SECONDS', (int) $this->webhook['timeout_seconds']));
        $this->webhook['retry_limit'] = max(0, (int) env('MARKETING_WEBHOOK_RETRY_LIMIT', (int) $this->webhook['retry_limit']));

        $this->discord['enabled'] = (bool) env('MARKETING_DISCORD_ENABLED', $this->discord['enabled']);
        $this->discord['stream_enabled'] = (bool) env('MARKETING_DISCORD_STREAM_ENABLED', $this->discord['stream_enabled']);
        $this->discord['fallback_channel'] = (string) env('MARKETING_DISCORD_FALLBACK_CHANNEL', $this->discord['fallback_channel']);
        $this->discord['allow_everyone_for_announcement_only'] = (bool) env(
            'MARKETING_DISCORD_ALLOW_EVERYONE_FOR_ANNOUNCEMENT_ONLY',
            $this->discord['allow_everyone_for_announcement_only']
        );
        $this->discord['default_mentions_disabled'] = (bool) env(
            'MARKETING_DISCORD_DEFAULT_MENTIONS_DISABLED',
            $this->discord['default_mentions_disabled']
        );
        $this->discord['max_length'] = max(280, (int) env('MARKETING_DISCORD_MAX_LENGTH', (int) $this->discord['max_length']));
        $this->discord['truncate_suffix'] = (string) env('MARKETING_DISCORD_TRUNCATE_SUFFIX', $this->discord['truncate_suffix']);

        foreach (array_keys($this->discord['channels']) as $channelKey) {
            $envKey = 'MARKETING_DISCORD_CHANNEL_ID_' . strtoupper($channelKey);
            $this->discord['channels'][$channelKey] = (string) env($envKey, (string) $this->discord['channels'][$channelKey]);
        }

        $headers = trim((string) env('MARKETING_WEBHOOK_HEADERS_JSON', ''));
        if ($headers !== '') {
            $decoded = json_decode($headers, true);
            if (is_array($decoded)) {
                $this->webhook['headers'] = $decoded;
            }
        }

        $internalRecipients = trim((string) env('MARKETING_INTERNAL_EMAIL_RECIPIENTS', ''));
        if ($internalRecipients !== '') {
            $this->internalEmailRecipients = array_values(array_filter(array_map('trim', explode(',', $internalRecipients))));
        }

        $this->maxRetries = max(0, (int) env('MARKETING_DISTRIBUTION_MAX_RETRIES', $this->maxRetries));
        $this->autoCreateTargetsOnApprove = (bool) env('MARKETING_DISTRIBUTION_AUTO_CREATE_TARGETS_ON_APPROVE', $this->autoCreateTargetsOnApprove);

        $failureInjection = trim((string) env('MARKETING_DISTRIBUTION_FAILURE_INJECTION_DESTINATIONS', ''));
        if ($failureInjection !== '') {
            $this->failureInjectionDestinations = array_values(array_unique(array_filter(array_map(
                static fn(string $value): string => strtolower(trim($value)),
                explode(',', $failureInjection)
            ))));
        }
    }
}
