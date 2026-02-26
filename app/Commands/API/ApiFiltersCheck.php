<?php

declare(strict_types=1);

namespace App\Commands\API;

use App\Commands\SafeBaseCommand;
use App\Services\ApiGovernanceService;
use CodeIgniter\CLI\CLI;

class ApiFiltersCheck extends SafeBaseCommand
{
    protected $group = 'API';
    protected $name = 'api:filters-check';
    protected $description = 'Fail on CRITICAL uncovered endpoints by filter governance.';

    public function run(array $params)
    {
        $scan = (new ApiGovernanceService())->scan();
        $critical = array_values(array_filter($scan['routes'], static fn(array $r): bool => $r['severity'] === 'CRITICAL'));
        if ($critical !== []) {
            foreach ($critical as $c) {
                CLI::error($c['http_methods'] . ' ' . $c['uri'] . ' => ' . implode('; ', $c['findings']));
            }
            return EXIT_ERROR;
        }
        CLI::write('No CRITICAL filter coverage gaps detected.', 'green');
        return EXIT_SUCCESS;
    }
}
