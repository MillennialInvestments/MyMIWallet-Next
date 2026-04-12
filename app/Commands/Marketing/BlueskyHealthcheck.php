<?php

namespace App\Commands\Marketing;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class BlueskyHealthcheck extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:bluesky:healthcheck';
    protected $description = 'Run Bluesky connectivity/auth healthcheck for marketing distribution.';

    public function run(array $params)
    {
        $result = service('blueskyDistributionService')->healthcheck();
        CLI::write(json_encode($result, JSON_PRETTY_PRINT));
    }
}
