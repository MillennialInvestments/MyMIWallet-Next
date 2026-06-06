<?php

namespace App\Commands\Marketing;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class SocialTbiExport extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:social:tbi-export';
    protected $description = 'Stub-safe TBI Marketing social export command.';

    public function run(array $params)
    {
        $enabled = filter_var(env('MYMI_MARKETING_EXPORT_ENABLED', false), FILTER_VALIDATE_BOOLEAN);

        if (! $enabled) {
            CLI::write(json_encode(['status' => 'skipped', 'reason' => 'MYMI_MARKETING_EXPORT_ENABLED is false'], JSON_PRETTY_PRINT), 'yellow');
            return EXIT_SUCCESS;
        }

        CLI::write(json_encode(['status' => 'skipped', 'reason' => 'TBI Marketing client not configured yet'], JSON_PRETTY_PRINT), 'yellow');
        return EXIT_SUCCESS;
    }
}
