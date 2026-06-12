<?php

namespace App\Commands\Marketing;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class SkipOptionalDiscordPending extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:distribution:skip-optional-discord-pending';
    protected $description = 'Dry-run/apply skip for optional discord/community_news pending marketing targets when Discord marketing channels are unconfigured.';
    protected $usage = 'php spark marketing:distribution:skip-optional-discord-pending [--approve] [--limit=500]';
    protected $options = [
        '--approve' => 'Apply the skip update. Without this flag, the command is dry-run only.',
        '--limit' => 'Maximum number of pending optional rows to inspect/update.',
    ];

    public function run(array $params)
    {
        $options = CLI::getOptions();
        $approve = array_key_exists('approve', $options) || in_array('--approve', $params, true);
        $limit = max(1, (int) (CLI::getOption('limit') ?? 500));
        $result = service('marketingDistributionService')->skipOptionalDiscordCommunityPending($approve, $limit);

        CLI::write(json_encode($result, JSON_PRETTY_PRINT));
        CLI::write($approve ? 'Applied optional Discord pending skip.' : 'Dry-run only. Re-run with --approve to apply.');
    }
}
