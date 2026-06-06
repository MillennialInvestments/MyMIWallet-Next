<?php

namespace App\Commands\Marketing;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class SocialTbiExport extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:social:tbi-export';
    protected $description = 'Export queued social jobs to TBI Marketing when explicitly enabled.';

    public function run(array $params)
    {
        $service = new \App\Services\TbiMarketingExportService();
        $result = $service->batchSend(10);

        CLI::write(json_encode($result, JSON_PRETTY_PRINT));
        return EXIT_SUCCESS;
    }
}
