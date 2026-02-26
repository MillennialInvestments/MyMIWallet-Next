<?php

declare(strict_types=1);

namespace App\Commands\API;

use App\Commands\SafeBaseCommand;
use App\Services\ApiGovernanceService;
use CodeIgniter\CLI\CLI;

class ApiRateLimitCheck extends SafeBaseCommand
{
    protected $group = 'API';
    protected $name = 'api:rate-limit-check';
    protected $description = 'Fail when external/API-like endpoints have no rate-limit enforcement metadata.';

    public function run(array $params)
    {
        $scan = (new ApiGovernanceService())->scan();
        $missing = [];
        foreach ($scan['routes'] as $r) {
            if (($r['is_api'] ?? 0) === 1 && ! $r['has_rate_limit']) {
                $missing[] = $r;
            }
        }
        if ($missing !== []) {
            foreach ($missing as $r) {
                CLI::error($r['http_methods'] . ' ' . $r['uri'] . ' missing rate-limit policy/filter.');
            }
            return EXIT_ERROR;
        }
        CLI::write('Rate-limit coverage check passed.', 'green');
        return EXIT_SUCCESS;
    }
}
