<?php

namespace App\Commands\Marketing;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class SocialExportApproved extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:social:export-approved';
    protected $description = 'Queue export jobs for approved social generated posts.';

    public function run(array $params)
    {
        $service = new \App\Services\SocialExportService();
        $result = $service->queueApprovedDrafts(25, 'zapier');
        CLI::write(json_encode($result, JSON_PRETTY_PRINT));
        return ($result['status'] ?? '') === 'success' ? EXIT_SUCCESS : EXIT_ERROR;
    }
}
