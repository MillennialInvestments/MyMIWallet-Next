<?php

declare(strict_types=1);

namespace App\Commands\API;

use App\Commands\SafeBaseCommand;
use App\Services\ApiGovernanceService;
use CodeIgniter\CLI\CLI;

class ApiVersioningCheck extends SafeBaseCommand
{
    protected $group = 'API';
    protected $name = 'api:versioning-check';
    protected $description = 'Detect API endpoints missing /API/vN namespace and emit remediation.';

    public function run(array $params)
    {
        $scan = (new ApiGovernanceService())->scan();
        $missing = array_values(array_filter($scan['routes'], static fn(array $r): bool => ($r['is_api'] ?? 0) === 1 && $r['version'] === 'none'));
        @mkdir(ROOTPATH . 'docs/APIs', 0775, true);
        $lines = [
            '# API Versioning Check',
            '- Timestamp: ' . $scan['metadata']['timestamp'],
            '- Run UUID: ' . $scan['metadata']['run_uuid'],
            '',
            '## Missing Version Namespace',
        ];
        foreach ($missing as $r) {
            $lines[] = '- ' . $r['http_methods'] . ' `' . $r['uri'] . '` -> migrate to `/API/v1/...` and keep deprecated alias.';
        }
        file_put_contents(ROOTPATH . 'docs/APIs/deprecations.md', implode(PHP_EOL, $lines) . PHP_EOL);

        if ($missing !== []) {
            foreach ($missing as $r) {
                CLI::error($r['http_methods'] . ' ' . $r['uri'] . ' has no API version namespace.');
            }
            return EXIT_ERROR;
        }
        CLI::write('All API endpoints are versioned.', 'green');
        return EXIT_SUCCESS;
    }
}
