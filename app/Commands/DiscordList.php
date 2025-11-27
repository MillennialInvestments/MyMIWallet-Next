<?php namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use App\Libraries\MyMIDiscord;

class DiscordList extends BaseCommand
{
    protected $group       = 'Discord';
    protected $name        = 'discord:list';
    protected $description = 'List all Discord channels, categories, and roles.';

    public function run(array $params)
    {
   
        $discord = new \App\Libraries\MyMIDiscord();
        $guildId = getenv('DISCORD_GUILD_ID');
        $token   = getenv('DISCORD_BOT_TOKEN');

        CLI::write('DISCORD_BOT_TOKEN: ' . ($token ?: '(empty)'), 'yellow');
        CLI::write('DISCORD_GUILD_ID: ' . ($guildId ?: '(empty)'), 'yellow');

        if (!$guildId || !$token) {
            CLI::error("Missing DISCORD_GUILD_ID or DISCORD_BOT_TOKEN in .env");
            return;
        }

        $channels = $discord->apiGet("guilds/{$guildId}/channels");
        $roles    = $discord->apiGet("guilds/{$guildId}/roles");

        if ($channels === null) {
            CLI::error("Failed to fetch channels. Check writable/logs for MyMIDiscord::apiGet errors.");
            return;
        }

        if ($roles === null) {
            CLI::error("Failed to fetch roles. Check writable/logs for MyMIDiscord::apiGet errors.");
            return;
        }

        if (!$guildId || !$token) {
            CLI::error("Missing DISCORD_GUILD_ID or DISCORD_BOT_TOKEN in .env");
            return;
        }

        // Fetch channel list
        $channels = $discord->apiGet("/guilds/{$guildId}/channels");
        $roles    = $discord->apiGet("/guilds/{$guildId}/roles");

        CLI::write("=== DISCORD SERVER STRUCTURE ===", 'yellow');

        CLI::write("\n-- Categories & Channels --", 'green');
        foreach ($channels as $c) {
            if ($c['type'] === 4) { // category
                CLI::write("[CATEGORY] {$c['name']} ({$c['id']})", 'yellow');
                foreach ($channels as $sub) {
                    if (($sub['parent_id'] ?? null) === $c['id']) {
                        CLI::write("  - {$sub['name']}  ({$sub['type']})");
                    }
                }
            }
        }

        CLI::write("\n-- Uncategorized Channels --", 'green');
        foreach ($channels as $c) {
            if ($c['parent_id'] === null && $c['type'] !== 4) {
                CLI::write("  * {$c['name']} ({$c['type']})");
            }
        }

        CLI::write("\n-- Roles --", 'cyan');
        foreach ($roles as $r) {
            CLI::write("{$r['name']}  ({$r['id']})");
        }

        CLI::write("\nDone.\n", 'green');
    }
}
