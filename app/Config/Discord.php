<?php namespace Config;

use CodeIgniter\Config\BaseConfig;

class Discord extends BaseConfig
{
    /**
     * Default timezone for quiet hours / pacing in MyMIDiscord.
     */
    public string $timezone = 'America/Chicago';

    /**
     * Quiet hours window (hh:mm, 24h) used by MyMIDiscord::isQuietHours().
     */
    public string $quietHoursStart = '22:00';
    public string $quietHoursEnd   = '06:30';

    /**
     * Fallback webhook when no channel-specific webhook is configured.
     */
    public string $defaultWebhook = '';
    public string $newsWebhook    = '';
    public string $alertsWebhook  = '';

    /**
     * Global minimum seconds between posts per channel if not overridden
     * by bf_discord_channels.min_interval_sec.
     */
    public int $minSecondsBetweenPosts = 90;

    /**
     * Internal endpoint + token for recording Discord onboarding progress.
     */
    public string $onboardingCompleteEndpoint = 'https://www.mymiwallet.com/API/Discord/completeOnboardingStep';
    public ?string $internalApiToken = null;

    /**
     * Discord interaction verification public key (used if/when you add slash commands).
     */
    public string $publicKey = '';
    public string $applicationId = '';

    /**
     * Channel webhooks are the primary delivery path. Keys must match bf_discord_channels.channel_key.
     *
     * Channel intent guide:
     *  - 'alerts'       → #trade-alerts (paid tiers)
     *  - 'alerts.free'  → #trade-alerts-free
     *  - 'alerts.tier1' → #trade-alerts-tier1 (Basic)
     *  - 'alerts.tier2' → #trade-alerts-tier2 (Premium)
     *  - 'alerts.tier3' → #trade-alerts-tier3 (Gold)
     *  - 'marketing'    → #marketing-news
     *  - 'earnings'     → #earnings-watch
     *  - 'ops'          → #ops-status
     *  - 'support'      → #support (optional)
     *  - 'staging'      → #staging-sandbox
     */
    public array $channelWebhooks = [
        'alerts'           => '',
        'alerts.free'      => '',
        'alerts.tier1'     => '',
        'alerts.tier2'     => '',
        'alerts.tier3'     => '',
        'alerts.liquidity' => '',
        'alerts.momentum'  => '',
        'alerts.ai'        => '',
        'alerts.ema'       => '',
        'alerts.news'      => '',
        'marketing'        => '',
        'marketing.news'   => '',
        'earnings'         => '',
        'ops'              => '',
        'support'          => '',
        'staging'          => '',
        'custom_messages' => '',
                'ticker_lookup'    => '',
        'aiops_chat'       => '',
        'ollama_chat'      => '',
        'admin_spark'      => '',
    ];

    /**
     * Channel IDs for Bot API fallback (never primary path). Keys mirror $channelWebhooks.
     */
    public array $channelIds = [
        'alerts'           => '',
        'alerts.free'      => '',
        'alerts.tier1'     => '',
        'alerts.tier2'     => '',
        'alerts.tier3'     => '',
        'alerts.liquidity' => '',
        'alerts.momentum'  => '',
        'alerts.ai'        => '',
        'alerts.ema'       => '',
        'alerts.news'      => '',
        'marketing'        => '',
        'marketing.news'   => '',
        'earnings'         => '',
        'ops'              => '',
        'support'          => '',
        'staging'          => '',
        'custom_messages' => '',
                'ticker_lookup'    => '',
        'aiops_chat'       => '',
        'ollama_chat'      => '',
        'admin_spark'      => '',
    ];

    /**
     * Discord Bot token & guild ID (used for Bot API fallback and future member/role sync features).
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
        'free'    => ['discord_role_id' => 'ROLE_ID_FREE'],
        'basic'   => ['discord_role_id' => 'ROLE_ID_BASIC'],
        'pro'     => ['discord_role_id' => 'ROLE_ID_PRO'],
        'premium' => ['discord_role_id' => 'ROLE_ID_PREMIUM'],
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

        // Base env pulls (only env(), never hardcoded)
        $this->timezone           = (string) env('DISCORD_TIMEZONE', $this->timezone);
        $this->quietHoursStart    = (string) env('DISCORD_QUIET_HOURS_START', $this->quietHoursStart);
        $this->quietHoursEnd      = (string) env('DISCORD_QUIET_HOURS_END', $this->quietHoursEnd);
        $this->defaultWebhook     = (string) env('DISCORD_DEFAULT_WEBHOOK', $this->defaultWebhook);
        $this->newsWebhook       = (string) env('DISCORD_WEBHOOK_NEWS', $this->newsWebhook);
        $this->alertsWebhook     = (string) env('DISCORD_WEBHOOK_ALERTS', $this->alertsWebhook);
        $this->publicKey          = (string) env('DISCORD_INTERACTIONS_PUBLIC_KEY', (string) env('DISCORD_PUBLIC_KEY', ''));
        $this->applicationId      = (string) env('DISCORD_APPLICATION_ID', '');
        // Primary token is DISCORD_MYMI_AI_BOT_TOKEN; DISCORD_BOT_TOKEN is retained as explicit legacy fallback.
        $this->botToken           = (string) env('DISCORD_MYMI_AI_BOT_TOKEN', (string) env('DISCORD_BOT_TOKEN', ''));
        $this->guildId            = (string) env('DISCORD_GUILD_ID', '');
        $this->useBotApiFallback  = filter_var(env('DISCORD_USE_BOT_API_FALLBACK', $this->useBotApiFallback), FILTER_VALIDATE_BOOLEAN);
        $this->storeWebhookMsgId  = filter_var(env('DISCORD_STORE_WEBHOOK_MSG_ID', $this->storeWebhookMsgId), FILTER_VALIDATE_BOOLEAN);
        $this->alertsStrict       = filter_var(env('DISCORD_ALERTS_STRICT', $this->alertsStrict), FILTER_VALIDATE_BOOLEAN);
        $this->alertsDryRun       = filter_var(env('DISCORD_ALERTS_DRY_RUN', $this->alertsDryRun), FILTER_VALIDATE_BOOLEAN);
        $this->internalApiToken   = env('DISCORD_INTERNAL_API_TOKEN') ?: null;


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
         * Configure in .env:
         *   DISCORD_ALERTS_WEBHOOK="https://discord.com/api/webhooks/..."
         *   DISCORD_ALERTS_FREE_WEBHOOK="..."
         *   DISCORD_ALERTS_TIER1_WEBHOOK="..."
         *   DISCORD_ALERTS_TIER2_WEBHOOK="..."
         *   DISCORD_ALERTS_TIER3_WEBHOOK="..."
         *   DISCORD_MARKETING_WEBHOOK="..."
         *   DISCORD_EARNINGS_WEBHOOK="..."
         *   DISCORD_OPS_WEBHOOK="..."
         *   DISCORD_SUPPORT_WEBHOOK="..."
         *   DISCORD_STAGING_WEBHOOK="..."
         */
        $this->channelWebhooks['alerts']           = (string) env('DISCORD_ALERTS_WEBHOOK', $this->channelWebhooks['alerts']);
        $this->channelWebhooks['alerts.free']      = (string) env('DISCORD_ALERTS_FREE_WEBHOOK', $this->channelWebhooks['alerts.free']);
        $this->channelWebhooks['alerts.tier1']     = (string) env('DISCORD_ALERTS_TIER1_WEBHOOK', $this->channelWebhooks['alerts.tier1']);
        $this->channelWebhooks['alerts.tier2']     = (string) env('DISCORD_ALERTS_TIER2_WEBHOOK', $this->channelWebhooks['alerts.tier2']);
        $this->channelWebhooks['alerts.tier3']     = (string) env('DISCORD_ALERTS_TIER3_WEBHOOK', $this->channelWebhooks['alerts.tier3']);
        $this->channelWebhooks['alerts.liquidity'] = (string) env('DISCORD_ALERTS_LIQUIDITY_SCANS_WEBHOOK', $this->channelWebhooks['alerts.liquidity']);
        $this->channelWebhooks['alerts.momentum']  = (string) env('DISCORD_ALERTS_MOMENTUM_WEBHOOK', $this->channelWebhooks['alerts.momentum']);
        $this->channelWebhooks['alerts.ai']        = (string) env('DISCORD_ALERTS_AI_WEBHOOK', $this->channelWebhooks['alerts.ai']);
        $this->channelWebhooks['alerts.ema']       = (string) env('DISCORD_ALERTS_EMA_WEBHOOK', $this->channelWebhooks['alerts.ema']);
        $this->channelWebhooks['alerts.news']      = (string) env('DISCORD_ALERTS_NEWS_WEBHOOK', $this->channelWebhooks['alerts.news']);
        $this->channelWebhooks['marketing']        = (string) env('DISCORD_MARKETING_WEBHOOK', $this->channelWebhooks['marketing']);
        $this->channelWebhooks['marketing.news']   = (string) env('DISCORD_MARKETING_NEWS_WEBHOOK', $this->channelWebhooks['marketing.news']);
        $this->channelWebhooks['earnings']         = (string) env('DISCORD_EARNINGS_WEBHOOK', $this->channelWebhooks['earnings']);
        $this->channelWebhooks['ops']              = (string) env('DISCORD_OPS_WEBHOOK', $this->channelWebhooks['ops']);
        $this->channelWebhooks['support']          = (string) env('DISCORD_SUPPORT_WEBHOOK', $this->channelWebhooks['support']);
        $this->channelWebhooks['staging']          = (string) env('DISCORD_STAGING_WEBHOOK', $this->channelWebhooks['staging']);
        $this->channelWebhooks['custom_messages'] = (string) env('DISCORD_CUSTOM_MESSAGES_WEBHOOK', $this->channelWebhooks['custom_messages']);
                $this->channelWebhooks['ticker_lookup']    = (string) env('DISCORD_TICKER_LOOKUP_WEBHOOK', $this->channelWebhooks['ticker_lookup']);
        $this->channelWebhooks['aiops_chat']       = (string) env('DISCORD_AIOPS_CHAT_WEBHOOK', $this->channelWebhooks['aiops_chat']);
        $this->channelWebhooks['ollama_chat']      = (string) env('DISCORD_OLLAMA_CHAT_WEBHOOK', $this->channelWebhooks['ollama_chat']);
        $this->channelWebhooks['admin_spark']      = (string) env('DISCORD_ADMIN_SPARK_WEBHOOK', $this->channelWebhooks['admin_spark']);

        /**
         * Channel IDs used for Bot API fallback (optional).
         * Set in .env as DISCORD_*_CHANNEL_ID variables.
         */
        $this->channelIds['alerts']           = (string) env('DISCORD_ALERTS_CHANNEL_ID', $this->channelIds['alerts']);
        $this->channelIds['alerts.free']      = (string) env('DISCORD_ALERTS_FREE_CHANNEL_ID', $this->channelIds['alerts.free']);
        $this->channelIds['alerts.tier1']     = (string) env('DISCORD_ALERTS_TIER1_CHANNEL_ID', $this->channelIds['alerts.tier1']);
        $this->channelIds['alerts.tier2']     = (string) env('DISCORD_ALERTS_TIER2_CHANNEL_ID', $this->channelIds['alerts.tier2']);
        $this->channelIds['alerts.tier3']     = (string) env('DISCORD_ALERTS_TIER3_CHANNEL_ID', $this->channelIds['alerts.tier3']);
        $this->channelIds['alerts.liquidity'] = (string) env('DISCORD_ALERTS_LIQUIDITY_SCANS_CHANNEL_ID', $this->channelIds['alerts.liquidity']);
        $this->channelIds['alerts.momentum']  = (string) env('DISCORD_ALERTS_MOMENTUM_CHANNEL_ID', $this->channelIds['alerts.momentum']);
        $this->channelIds['alerts.ai']        = (string) env('DISCORD_ALERTS_AI_CHANNEL_ID', $this->channelIds['alerts.ai']);
        $this->channelIds['alerts.ema']       = (string) env('DISCORD_ALERTS_EMA_CHANNEL_ID', $this->channelIds['alerts.ema']);
        $this->channelIds['alerts.news']      = (string) env('DISCORD_ALERTS_NEWS_CHANNEL_ID', $this->channelIds['alerts.news']);
        $this->channelIds['marketing']        = (string) env('DISCORD_MARKETING_CHANNEL_ID', $this->channelIds['marketing']);
        $this->channelIds['marketing.news']   = (string) env('DISCORD_MARKETING_NEWS_CHANNEL_ID', $this->channelIds['marketing.news']);
        $this->channelIds['earnings']         = (string) env('DISCORD_EARNINGS_CHANNEL_ID', $this->channelIds['earnings']);
        $this->channelIds['ops']              = (string) env('DISCORD_OPS_CHANNEL_ID', $this->channelIds['ops']);
        $this->channelIds['support']          = (string) env('DISCORD_SUPPORT_CHANNEL_ID', $this->channelIds['support']);
        $this->channelIds['staging']          = (string) env('DISCORD_STAGING_CHANNEL_ID', $this->channelIds['staging']);
        $this->channelIds['custom_messages'] = (string) env('DISCORD_CHANNEL_ID_CUSTOM_MESSAGES', (string) env('DISCORD_CUSTOM_MESSAGES_CHANNEL_ID', $this->channelIds['custom_messages']));
                $this->channelIds['ticker_lookup']    = (string) env('DISCORD_CHANNEL_ID_TICKER_LOOKUP', (string) env('DISCORD_TICKER_LOOKUP_CHANNEL_ID', $this->channelIds['ticker_lookup']));
        $this->channelIds['aiops_chat']       = (string) env('DISCORD_CHANNEL_ID_AIOPS_CHAT', (string) env('DISCORD_AIOPS_CHAT_CHANNEL_ID', $this->channelIds['aiops_chat']));
        $this->channelIds['ollama_chat']      = (string) env('DISCORD_CHANNEL_ID_OLLAMA_CHAT', (string) env('DISCORD_OLLAMA_CHAT_CHANNEL_ID', $this->channelIds['ollama_chat']));
        $this->channelIds['admin_spark']      = (string) env('DISCORD_CHANNEL_ID_ADMIN_SPARK', (string) env('DISCORD_ADMIN_SPARK_CHANNEL_ID', $this->channelIds['admin_spark']));

    }
}
