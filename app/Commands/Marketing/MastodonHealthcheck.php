<?php

namespace App\Commands\Marketing;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class MastodonHealthcheck extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:mastodon:healthcheck';
    protected $description = 'Run Mastodon connectivity/auth healthcheck for marketing distribution.';

    public function run(array $params)
    {
        $result = service('mastodonDistributionService')->healthcheck();
        CLI::write(json_encode($result, JSON_PRETTY_PRINT));
    }
}
