<?php

namespace App\Commands\Investments;

use App\Commands\SafeBaseCommand;
use App\Libraries\EconomicDataService;
use CodeIgniter\CLI\CLI;

class EconomyUpdateAll extends SafeBaseCommand
{
    protected $group = 'investments';
    protected $name = 'investments:economy:updateall';
    protected $description = 'Fetch and store economic indicators from FRED into local tables.';

    public function run(array $params)
    {
        $service = new EconomicDataService();
        $summary = $service->updateAllIndicators();

        CLI::write('Economic indicators update complete.');
        CLI::write('Updated series: ' . (string) ($summary['updated'] ?? 0), 'green');

        $errors = $summary['errors'] ?? [];
        if ($errors !== []) {
            CLI::write('Failed series: ' . implode(', ', $errors), 'yellow');
        }

        return EXIT_SUCCESS;
    }
}
