<?php namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Discord as DiscordConfig;

class DiscordList extends BaseCommand
{
    protected $group       = 'Discord';
    protected $name        = 'discord:list';
    protected $description = 'List configured Discord channels/webhooks/IDs from config and database.';

    public function run(array $params)
    {
        /** @var DiscordConfig $cfg */
        $cfg = config('Discord');

        CLI::write("=== MyMI Discord Wiring Overview ===\n", 'yellow');

        // 1. Show core env/config state (masked)
        $this->printEnvSummary($cfg);

        // 2. Show config-based channelWebhooks
        $this->printConfigWebhooks($cfg);

        // 3. Show config-based channelIds (for Bot API fallback)
        $this->printConfigChannelIds($cfg);

        // 4. Show bf_discord_channels rows from DB
        $this->printDbChannels();
    }

    protected function printEnvSummary(DiscordConfig $cfg): void
    {
        $botToken = $cfg->botToken ?: env('DISCORD_BOT_TOKEN');
        $guildId  = $cfg->guildId  ?: env('DISCORD_GUILD_ID');

        $maskedToken = $botToken
            ? substr($botToken, 0, 8) . '...' . substr($botToken, -6)
            : '(empty)';

        CLI::write("-- Core Environment --", 'green');
        CLI::write("Timezone        : {$cfg->timezone}");
        CLI::write("Quiet Hours     : {$cfg->quietHoursStart} - {$cfg->quietHoursEnd}");
        CLI::write("Default Webhook : " . ($cfg->defaultWebhook ? '[configured]' : '(none)'));
        CLI::write("Bot Token       : {$maskedToken}");
        CLI::write("Guild ID        : " . ($guildId ?: '(empty)'));
        CLI::write("Use Bot Fallback: " . ($cfg->useBotApiFallback ? 'true' : 'false'));
        CLI::write("Store Msg IDs   : " . ($cfg->storeWebhookMsgId ? 'true' : 'false'));
        CLI::write("Alerts Strict   : " . ($cfg->alertsStrict ? 'true' : 'false'));
        CLI::write("Alerts Dry Run  : " . ($cfg->alertsDryRun ? 'true' : 'false'));
        CLI::newLine();
    }

    protected function printConfigWebhooks(DiscordConfig $cfg): void
    {
        CLI::write("-- Configured channelWebhooks (Config\\Discord) --", 'green');

        if (empty($cfg->channelWebhooks)) {
            CLI::write("  (none)", 'red');
            CLI::newLine();
            return;
        }

        foreach ($cfg->channelWebhooks as $key => $url) {
            $status = $url ? '[configured]' : '(empty)';
            CLI::write(sprintf("  %-14s : %s", $key, $status));
        }
        CLI::newLine();
    }

    protected function printConfigChannelIds(DiscordConfig $cfg): void
    {
        CLI::write("-- Configured channelIds (Config\\Discord) --", 'green');

        if (empty($cfg->channelIds)) {
            CLI::write("  (none)", 'red');
            CLI::newLine();
            return;
        }

        foreach ($cfg->channelIds as $key => $id) {
            $status = $id ? $id : '(empty)';
            CLI::write(sprintf("  %-10s : %s", $key, $status));
        }
        CLI::newLine();
    }

    protected function printDbChannels(): void
    {
        CLI::write("-- bf_discord_channels (database) --", 'green');

        try {
            $db   = db_connect();
            $rows = $db->table('bf_discord_channels')
                ->orderBy('channel_key', 'ASC')
                ->get()
                ->getResultArray();
        } catch (\Throwable $e) {
            CLI::write("  Error reading bf_discord_channels: " . $e->getMessage(), 'red');
            CLI::newLine();
            return;
        }

        if (!$rows) {
            CLI::write("  (no rows found)", 'yellow');
            CLI::newLine();
            return;
        }

        foreach ($rows as $row) {
            $key      = $row['channel_key'] ?? '(no key)';
            $enabled  = !empty($row['is_enabled']) ? 'yes' : 'no';
            $webhook  = !empty($row['webhook_url']) ? '[set]' : '(none)';
            $chanId   = !empty($row['channel_id']) ? $row['channel_id'] : '(none)';
            $interval = $row['min_interval_sec'] ?? null;

            CLI::write("  {$key}", 'yellow');
            CLI::write("    enabled       : {$enabled}");
            CLI::write("    webhook_url   : {$webhook}");
            CLI::write("    channel_id    : {$chanId}");
            if ($interval !== null) {
                CLI::write("    min_interval  : {$interval} sec");
            }
            CLI::write('');
        }

        CLI::newLine();
    }
}
