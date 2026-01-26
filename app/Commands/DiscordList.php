<?php namespace App\Commands;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Discord as DiscordConfig;

class DiscordList extends SafeBaseCommand
{
    protected string $group       = 'Discord';
    protected string $name        = 'discord:list';
    protected $description = 'List configured Discord channels/webhooks/IDs from config and database.';
    protected $options     = [
        '--dry-run' => 'Preview actions without querying the database',
    ];

    public function run(array $params)
    {
        log_message('info', '[spark:discord:list] Started', ['params' => $params]);
        [$args, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);

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
        if ($dryRun) {
            CLI::write('-- Database checks skipped (dry-run) --', 'yellow');
        } else {
            $this->printDbChannels();

        // 5. Show core subscriptions for scanners and system channels
            $this->printDbSubscriptions();
        }

        log_message('info', '[spark:discord:list] Completed', ['dry_run' => $dryRun]);
        return EXIT_SUCCESS;
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

        ksort($cfg->channelWebhooks);
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

        ksort($cfg->channelIds);
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

        $grouped = [];
        foreach ($rows as $row) {
            $key    = $row['channel_key'] ?? '(no key)';
            $prefix = strstr($key, '.', true) ?: $key;
            $grouped[$prefix][] = $row;
        }

        foreach ($grouped as $prefix => $channels) {
            CLI::write("  [{$prefix}]", 'yellow');
            foreach ($channels as $row) {
                $key      = $row['channel_key'] ?? '(no key)';
                $enabled  = !empty($row['is_enabled']) ? 'yes' : 'no';
                $webhook  = !empty($row['webhook_url']) ? '[set]' : '(none)';
                $chanId   = !empty($row['channel_id']) ? $row['channel_id'] : '(none)';
                $interval = $row['min_interval_sec'] ?? null;

                CLI::write("    {$key}");
                CLI::write("      enabled       : {$enabled}");
                CLI::write("      webhook_url   : {$webhook}");
                CLI::write("      channel_id    : {$chanId}");
                if ($interval !== null) {
                    CLI::write("      min_interval  : {$interval} sec");
                }
                CLI::write('');
            }
        }

        CLI::newLine();
    }

    protected function printDbSubscriptions(): void
    {
        CLI::write("-- bf_discord_subscriptions (scanner/system) --", 'green');

        try {
            $db   = db_connect();
            $rows = $db->table('bf_discord_subscriptions s')
                ->select('s.*, c.channel_id, c.webhook_url')
                ->join('bf_discord_channels c', 'c.channel_key = s.channel_key', 'left')
                ->orderBy('s.event_key', 'ASC')
                ->get()
                ->getResultArray();
        } catch (\Throwable $e) {
            CLI::write("  Error reading bf_discord_subscriptions: " . $e->getMessage(), 'red');
            CLI::newLine();
            return;
        }

        if (!$rows) {
            CLI::write("  (no rows found)", 'yellow');
            CLI::newLine();
            return;
        }

        $filtered = array_filter($rows, static function (array $row): bool {
            $event = $row['event_key'] ?? '';
            return str_starts_with($event, 'scanner.')
                || str_starts_with($event, 'earnings')
                || str_starts_with($event, 'marketing')
                || str_starts_with($event, 'ops')
                || str_starts_with($event, 'support')
                || str_starts_with($event, 'alerts');
        });

        foreach ($filtered as $row) {
            CLI::write(sprintf(
                "  %-20s → %-18s (template: %s)",
                $row['event_key'],
                $row['channel_key'],
                $row['template_key']
            ));
        }

        CLI::newLine();
    }

    protected function isDestructive(): bool
    {
        return false;
    }
}
