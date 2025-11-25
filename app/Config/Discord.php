<?php namespace Config;

use CodeIgniter\Config\BaseConfig;

class Discord extends BaseConfig
{
    public string $timezone = 'America/Chicago';
    public string $defaultWebhook = '';
    public int    $minSecondsBetweenPosts = 90;
    public string $quietHoursStart = '22:00';
    public string $quietHoursEnd   = '06:30';

    /**
     * Optional per-channel webhooks/IDs to avoid hardcoding URLs in controllers.
     * Keys should match bf_discord_channels.channel_key when present.
     */
    public array $channelWebhooks = [
        'alerts'      => '',
        'marketing'   => '',
        'earnings'    => '',
        'ops'         => '',
        'support'     => '',
        'staging'     => '',
        'alerts.free' => '',
        'alerts.tier1'=> '',
        'alerts.tier2'=> '',
        'alerts.tier3'=> '',
    ];

    public array $channelIds = [
        'alerts'    => '',
        'marketing' => '',
        'earnings'  => '',
        'ops'       => '',
        'support'   => '',
        'staging'   => '',
    ];

    public string $botToken    = '';
    public string $guildId     = '';

    public bool $useBotApiFallback = true;    // if no webhook, send via Bot API when channel_id exists
    public bool $storeWebhookMsgId = true;    // request ?wait=true and capture message_id for edits/deletes
    public bool $alertsStrict       = false;
    public bool $alertsDryRun       = false;

    public function __construct()
    {
        parent::__construct();

        // existing env pulls...
        $this->defaultWebhook    = (string) env('DISCORD_DEFAULT_WEBHOOK', $this->defaultWebhook);
        $this->botToken          = (string) env('DISCORD_BOT_TOKEN', '');
        $this->guildId           = (string) env('DISCORD_GUILD_ID', '');
        $this->useBotApiFallback = filter_var(env('DISCORD_USE_BOT_API_FALLBACK', $this->useBotApiFallback), FILTER_VALIDATE_BOOLEAN);
        $this->storeWebhookMsgId = filter_var(env('DISCORD_STORE_WEBHOOK_MSG_ID', $this->storeWebhookMsgId), FILTER_VALIDATE_BOOLEAN);
        $this->alertsStrict       = filter_var(env('DISCORD_ALERTS_STRICT', $this->alertsStrict), FILTER_VALIDATE_BOOLEAN);
        $this->alertsDryRun       = filter_var(env('DISCORD_ALERTS_DRY_RUN', $this->alertsDryRun), FILTER_VALIDATE_BOOLEAN);

        // Channel-specific webhook fallbacks (used when DB channels omit webhooks)
        $this->channelWebhooks['alerts']       = (string) env('DISCORD_ALERTS_WEBHOOK', $this->channelWebhooks['alerts']);
        $this->channelWebhooks['marketing']    = (string) env('DISCORD_MARKETING_WEBHOOK', $this->channelWebhooks['marketing']);
        $this->channelWebhooks['earnings']     = (string) env('DISCORD_EARNINGS_WEBHOOK', $this->channelWebhooks['earnings']);
        $this->channelWebhooks['ops']          = (string) env('DISCORD_OPS_WEBHOOK', $this->channelWebhooks['ops']);
        $this->channelWebhooks['support']      = (string) env('DISCORD_SUPPORT_WEBHOOK', $this->channelWebhooks['support']);
        $this->channelWebhooks['staging']      = (string) env('DISCORD_STAGING_WEBHOOK', $this->channelWebhooks['staging']);
        $this->channelWebhooks['alerts.free']  = (string) env('DISCORD_ALERTS_FREE_WEBHOOK', $this->channelWebhooks['alerts.free']);
        $this->channelWebhooks['alerts.tier1'] = (string) env('DISCORD_ALERTS_TIER1_WEBHOOK', $this->channelWebhooks['alerts.tier1']);
        $this->channelWebhooks['alerts.tier2'] = (string) env('DISCORD_ALERTS_TIER2_WEBHOOK', $this->channelWebhooks['alerts.tier2']);
        $this->channelWebhooks['alerts.tier3'] = (string) env('DISCORD_ALERTS_TIER3_WEBHOOK', $this->channelWebhooks['alerts.tier3']);

        $this->channelIds['alerts']    = (string) env('DISCORD_ALERTS_CHANNEL_ID', $this->channelIds['alerts']);
        $this->channelIds['marketing'] = (string) env('DISCORD_MARKETING_CHANNEL_ID', $this->channelIds['marketing']);
        $this->channelIds['earnings']  = (string) env('DISCORD_EARNINGS_CHANNEL_ID', $this->channelIds['earnings']);
        $this->channelIds['ops']       = (string) env('DISCORD_OPS_CHANNEL_ID', $this->channelIds['ops']);
        $this->channelIds['support']   = (string) env('DISCORD_SUPPORT_CHANNEL_ID', $this->channelIds['support']);
        $this->channelIds['staging']   = (string) env('DISCORD_STAGING_CHANNEL_ID', $this->channelIds['staging']);
    }
}