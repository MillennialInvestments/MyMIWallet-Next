<?php

namespace App\Commands\Spark;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class InfraServerAudit extends SafeBaseCommand
{
    protected $group = 'Infrastructure';
    protected $name = 'infra:server-audit';
    protected $description = 'Audit server and classify reusable infrastructure components';

    public function run(array $params)
    {
        CLI::write("🔍 Scanning application...", 'yellow');

        $results = [
            'reusable' => [],
            'business_specific' => [],
            'needs_refactor' => [],
        ];

        $modulesPath = APPPATH . 'Modules';

        foreach (scandir($modulesPath) as $module) {
            if ($module === '.' || $module === '..') continue;

            if (str_contains(strtolower($module), 'investment') ||
                str_contains(strtolower($module), 'alert') ||
                str_contains(strtolower($module), 'marketing')
            ) {
                $results['business_specific'][] = $module;
            } else {
                $results['reusable'][] = $module;
            }
        }

        $outputPath = WRITEPATH . 'infra-audit.json';
        file_put_contents($outputPath, json_encode($results, JSON_PRETTY_PRINT));

        CLI::write("✅ Audit complete.");
        CLI::write("📁 Output: " . $outputPath, 'green');
    }
}
