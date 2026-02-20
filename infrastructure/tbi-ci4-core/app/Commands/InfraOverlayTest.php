<?php

declare(strict_types=1);

namespace App\Commands;

use App\Services\Infra\ReportWriter;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class InfraOverlayTest extends BaseCommand
{
    protected $group = 'Infrastructure';
    protected $name = 'infra:overlay-test';
    protected $description = 'Performs static overlay-readiness checks for fresh CI4 installs.';

    public function run(array $params): void
    {
        $checks = [
            'app/Config/Features.php',
            'app/Config/Integrations.php',
            'app/Config/Infrastructure.php',
            'app/Services/IntegrationRegistry.php',
            'app/Commands/InfraSubsystemInventory.php',
        ];

        $missing = [];
        foreach ($checks as $file) {
            $path = ROOTPATH . 'infrastructure/tbi-ci4-core/' . $file;
            if (! is_file($path)) {
                $missing[] = $file;
            }
        }

        $writer = new ReportWriter(ROOTPATH . 'infrastructure/tbi-ci4-core/docs/_infrastructure');
        if ($missing !== []) {
            $writer->writeMarkdown('overlay-failure-report.md', "# Overlay Failure Report\n\nMissing files:\n- " . implode("\n- ", $missing) . "\n");
            CLI::error('Overlay static validation failed. See overlay-failure-report.md');
            return;
        }

        $writer->writeMarkdown('overlay-failure-report.md', "# Overlay Failure Report\n\nNo blocking static failures detected.\n");
        CLI::write('Overlay static validation passed.', 'green');
    }
}
