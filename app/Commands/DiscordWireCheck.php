<?php namespace App\Commands;

use App\Libraries\MyMIDiscord;
use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use Config\Discord as DiscordConfig;

class DiscordWireCheck extends SafeBaseCommand
{
    protected string $group       = 'Discord';
    protected string $name        = 'discord:wire-check';
    protected $description = 'Validate Discord env vars, tables, and queue health for MyMIDiscord.';
    protected $usage       = 'php spark discord:wire-check';
    protected $options     = [
        '--dry-run' => 'Preview actions without querying the database',
    ];

    public function run(array $params)
    {
        log_message('info', '[spark:discord:wire-check] Started', ['params' => $params]);
        [$args, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);

        $cfg = config('Discord');
        $discord = new MyMIDiscord(); // hydrate env + config

        CLI::write('=== Discord Wire Check ===', 'yellow');
        $missing = $this->printEnvStatus($cfg);
        if ($dryRun) {
            CLI::write('-- Database checks skipped (dry-run) --', 'yellow');
        } else {
            $this->printTableStatus();
            $this->printQueueSnapshot();
        }

        log_message('info', 'discord:wire-check complete', [
            'missing_env' => $missing,
        ]);

        log_message('info', '[spark:discord:wire-check] Completed', [
            'missing_env' => $missing,
            'dry_run' => $dryRun,
        ]);

        return EXIT_SUCCESS;
    }

    protected function printEnvStatus(DiscordConfig $cfg): array
    {
        $required = [
            'DISCORD_BOT_TOKEN'                  => $cfg->botToken,
            'DISCORD_GUILD_ID'                   => $cfg->guildId,
            'DISCORD_TIMEZONE'                   => $cfg->timezone,
            'DISCORD_MIN_SECONDS_BETWEEN_POSTS'  => $cfg->minSecondsBetweenPosts,
            'DISCORD_QUIET_HOURS_START'          => $cfg->quietHoursStart,
            'DISCORD_QUIET_HOURS_END'            => $cfg->quietHoursEnd,
        ];

        CLI::write('-- Core env/config --', 'green');
        $missing = [];
        foreach ($required as $key => $value) {
            $status = ($value === null || $value === '' || $value === 0) ? 'MISSING' : 'ok';
            if ($status === 'MISSING') {
                $missing[] = $key;
            }
            CLI::write(sprintf('  %-35s : %s', $key, $status));
        }

        CLI::write('-- Feature flags --', 'green');
        CLI::write('  DISCORD_USE_BOT_API_FALLBACK : ' . ($cfg->useBotApiFallback ? 'true' : 'false'));
        CLI::write('  DISCORD_STORE_WEBHOOK_MSG_ID : ' . ($cfg->storeWebhookMsgId ? 'true' : 'false'));
        CLI::write('  DISCORD_ALERTS_STRICT        : ' . ($cfg->alertsStrict ? 'true' : 'false'));
        CLI::write('  DISCORD_ALERTS_DRY_RUN       : ' . ($cfg->alertsDryRun ? 'true' : 'false'));
        CLI::newLine();

        return $missing;
    }

    protected function printTableStatus(): void
    {
        CLI::write('-- Table presence --', 'green');
        $tables = [
            'bf_discord_channels',
            'bf_discord_templates',
            'bf_discord_subscriptions',
            'bf_discord_queue',
            'bf_discord_message_history',
            'bf_discord_policies',
            'bf_discord_events_log',
            'bf_discord_logs',
        ];

        try {
            $db = db_connect();
            foreach ($tables as $table) {
                $exists = $db->tableExists($table);
                CLI::write(sprintf('  %-28s : %s', $table, $exists ? 'ok' : 'missing'), $exists ? 'light_green' : 'red');
            }
        } catch (\Throwable $e) {
            CLI::write('  (unable to connect to database: ' . $e->getMessage() . ')', 'red');
        }
        CLI::newLine();
    }

    protected function printQueueSnapshot(): void
    {
        CLI::write('-- Queue snapshot --', 'green');
        try {
            $db = db_connect();
            $queued = $db->table('bf_discord_queue')->where('status', 'queued')->countAllResults();
            $dead   = $db->table('bf_discord_queue')->where('status', 'dead')->countAllResults();
            $next   = $db->table('bf_discord_queue')
                ->select('MIN(available_at) AS next_available, MIN(scheduled_at) AS next_scheduled')
                ->where('status', 'queued')
                ->get()
                ->getRowArray();
            CLI::write('  queued count : ' . $queued);
            CLI::write('  dead count   : ' . $dead);
            if ($next) {
                CLI::write('  next scheduled : ' . ($next['next_scheduled'] ?? '(none)'));
                CLI::write('  next available : ' . ($next['next_available'] ?? '(none)'));
            }
        } catch (\Throwable $e) {
            CLI::write('  (unable to query queue: ' . $e->getMessage() . ')', 'red');
        }
        CLI::newLine();
    }

    protected function isDestructive(): bool
    {
        return false;
    }
}
