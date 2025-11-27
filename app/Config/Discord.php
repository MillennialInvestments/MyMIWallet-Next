<?php namespace Config;

use CodeIgniter\Config\BaseConfig;

class Discord extends BaseConfig
{
    /**
     * Default timezone for quiet hours / pacing in MyMIDiscord.
     */
    public string $timezone = 'America/Chicago';

    /**
     * Fallback webhook when no channel-specific webhook is configured.
     */
    public string $defaultWebhook = '';

    /**
     * Global minimum seconds between posts per channel if not overridden
     * by bf_discord_channels.min_interval_sec.
     */
    public int $minSecondsBetweenPosts = 90;

    /**
     * Quiet hours window (hh:mm, 24h) used by MyMIDiscord::isQuietHours().
     */
    public string $quietHoursStart = '22:00';
    public string $quietHoursEnd   = '06:30';

    /**
     * Discord interaction verification public key (used if/when you add slash commands).
     */
    public string $publicKey = '';

    /**
     * Optional per-channel webhooks/IDs to avoid hardcoding URLs in controllers.
     * Keys should match bf_discord_channels.channel_key when present.
     *
     * Recommended mapping:
     *  - 'alerts'    → #trade-alerts
     *  - 'marketing' → #marketing-news
     *  - 'earnings'  → #earnings-watch
     *  - 'ops'       → #ops-status
     *  - 'support'   → #support (if you wire it)
     *  - 'staging'   → #staging-sandbox
     *
     * Tiered alert channels are optional premium splits.
     */
    public array $channelWebhooks = [
        'alerts'       => '',
        'marketing'    => '',
        'earnings'     => '',
        'ops'          => '',
        'support'      => '',
        'staging'      => '',
        'alerts.free'  => '',
        'alerts.tier1' => '',
        'alerts.tier2' => '',
        'alerts.tier3' => '',
    ];

    /**
     * Optional per-channel Discord channel IDs (used when falling back
     * to the Bot API instead of webhooks).
     */
    public array $channelIds = [
        'alerts'    => '',
        'marketing' => '',
        'earnings'  => '',
        'ops'       => '',
        'support'   => '',
        'staging'   => '',
    ];

    /**
     * Discord Bot token & guild ID (used for Bot API fallback and
     * future member/role sync features).
     */
    public string $botToken = '';
    public string $guildId  = '';

    /**
     * Map CI4 membership plans to Discord role IDs for nightly syncs.
     *
     * Example (fill in when ready):
     *  [
     *      'free'    => 'ROLE_ID_FOR_FREE',
     *      'basic'   => 'ROLE_ID_FOR_BASIC',
     *      'premium' => 'ROLE_ID_FOR_PREMIUM',
     *      'gold'    => 'ROLE_ID_FOR_GOLD',
     *  ]
     */
    public array $rolePlanMap = [
        // 'free'    => '',
        // 'basic'   => '',
        // 'premium' => '',
        // 'gold'    => '',
    ];

    /**
     * Behavior flags:
     *  - useBotApiFallback: if no webhook_url for channel, try Bot API + channel_id.
     *  - storeWebhookMsgId: request ?wait=true and store Discord message IDs for edits/deletes.
     *  - alertsStrict:      if true, require either webhook_url OR channel_id for all sends.
     *  - alertsDryRun:      if true, log payloads instead of actually sending to Discord.
     */
    public bool $useBotApiFallback = true;
    public bool $storeWebhookMsgId = true;
    public bool $alertsStrict      = false;
    public bool $alertsDryRun      = false;

    public function __construct()
    {
        parent::__construct();

        // Base env pulls
        $this->defaultWebhook    = (string) env('DISCORD_DEFAULT_WEBHOOK', $this->defaultWebhook);
        $this->botToken          = (string) env('DISCORD_BOT_TOKEN', '');
        $this->guildId           = (string) env('DISCORD_GUILD_ID', '');
        $this->publicKey         = (string) env('DISCORD_PUBLIC_KEY', '');
        $this->useBotApiFallback = filter_var(env('DISCORD_USE_BOT_API_FALLBACK', $this->useBotApiFallback), FILTER_VALIDATE_BOOLEAN);
        $this->storeWebhookMsgId = filter_var(env('DISCORD_STORE_WEBHOOK_MSG_ID', $this->storeWebhookMsgId), FILTER_VALIDATE_BOOLEAN);
        $this->alertsStrict      = filter_var(env('DISCORD_ALERTS_STRICT', $this->alertsStrict), FILTER_VALIDATE_BOOLEAN);
        $this->alertsDryRun      = filter_var(env('DISCORD_ALERTS_DRY_RUN', $this->alertsDryRun), FILTER_VALIDATE_BOOLEAN);

        // Optional: override timezone/quiet hours via env
        $this->timezone        = (string) env('DISCORD_TIMEZONE', $this->timezone);
        $this->quietHoursStart = (string) env('DISCORD_QUIET_HOURS_START', $this->quietHoursStart);
        $this->quietHoursEnd   = (string) env('DISCORD_QUIET_HOURS_END', $this->quietHoursEnd);

        // JSON-based role map, if configured
        $rolePlanEnv = env('DISCORD_ROLE_PLAN_MAP');
        if (is_string($rolePlanEnv) && $rolePlanEnv !== '') {
            $decoded = json_decode($rolePlanEnv, true);
            if (is_array($decoded)) {
                $this->rolePlanMap = $decoded;
            }
        }

        /**
         * Channel-specific webhook fallbacks (used when DB channels omit webhooks).
         *
         * Set these in .env as:
         *   DISCORD_ALERTS_WEBHOOK="https://discord.com/api/webhooks/..."
         *   DISCORD_MARKETING_WEBHOOK="https://discord.com/api/webhooks/..."
         *   DISCORD_EARNINGS_WEBHOOK="https://discord.com/api/webhooks/..."
         *   DISCORD_OPS_WEBHOOK="https://discord.com/api/webhooks/..."
         *   DISCORD_SUPPORT_WEBHOOK="https://discord.com/api/webhooks/..."
         *   DISCORD_STAGING_WEBHOOK="https://discord.com/api/webhooks/..."
         *   DISCORD_ALERTS_FREE_WEBHOOK="..."
         *   DISCORD_ALERTS_TIER1_WEBHOOK="..."
         *   DISCORD_ALERTS_TIER2_WEBHOOK="..."
         *   DISCORD_ALERTS_TIER3_WEBHOOK="..."
         */
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

        /**
         * Channel IDs used for Bot API fallback.
         *
         * Set these in .env as:
         *   DISCORD_ALERTS_CHANNEL_ID="123..."
         *   DISCORD_MARKETING_CHANNEL_ID="123..."
         *   DISCORD_EARNINGS_CHANNEL_ID="123..."
         *   DISCORD_OPS_CHANNEL_ID="123..."
         *   DISCORD_SUPPORT_CHANNEL_ID="123..."
         *   DISCORD_STAGING_CHANNEL_ID="123..."
         */
        $this->channelIds['alerts']    = (string) env('DISCORD_ALERTS_CHANNEL_ID', $this->channelIds['alerts']);
        $this->channelIds['marketing'] = (string) env('DISCORD_MARKETING_CHANNEL_ID', $this->channelIds['marketing']);
        $this->channelIds['earnings']  = (string) env('DISCORD_EARNINGS_CHANNEL_ID', $this->channelIds['earnings']);
        $this->channelIds['ops']       = (string) env('DISCORD_OPS_CHANNEL_ID', $this->channelIds['ops']);
        $this->channelIds['support']   = (string) env('DISCORD_SUPPORT_CHANNEL_ID', $this->channelIds['support']);
        $this->channelIds['staging']   = (string) env('DISCORD_STAGING_CHANNEL_ID', $this->channelIds['staging']);
    }
}
