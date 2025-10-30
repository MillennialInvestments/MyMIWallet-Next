<?php namespace Config;

use CodeIgniter\Config\BaseConfig;

class Discord extends BaseConfig
{
    public string $timezone = 'America/Chicago';
    public string $defaultWebhook = '';
    public int    $minSecondsBetweenPosts = 90;
    public string $quietHoursStart = '22:00';
    public string $quietHoursEnd   = '06:30';

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
    }
}