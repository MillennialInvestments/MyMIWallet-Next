<?php

namespace App\Commands\Marketing;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class SocialMetricsRefresh extends SafeBaseCommand
{
    protected $group = 'Marketing';
    protected $name = 'marketing:social:metrics-refresh';
    protected $description = 'Refresh social funnel metrics.';

    public function run(array $params)
    {
        $date = $params[0] ?? null;
        $service = new \App\Services\SocialTrackingService();
        $result = $service->refreshMetrics($date);
        CLI::write(json_encode($result, JSON_PRETTY_PRINT));
        return EXIT_SUCCESS;
    }
}
