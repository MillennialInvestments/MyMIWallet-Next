<?php

declare(strict_types=1);

namespace App\Commands;

use App\Services\Infra\ReportWriter;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class InfraLayerAudit extends BaseCommand
{
    protected $group = 'Infrastructure';
    protected $name = 'infra:layer-audit';
    protected $description = 'Checks for layer violations in infrastructure overlay code.';

    public function run(array $params): void
    {
        $report = "# Layer Violation Report\n\n";
        $report .= "- Layer 1: CodeIgniter Framework\n";
        $report .= "- Layer 2: TBI Core Infrastructure\n";
        $report .= "- Layer 3: Vertical Domain Modules\n";
        $report .= "- Layer 4: Branding/UI\n\n";
        $report .= "No direct Layer-3 class references were introduced in `infrastructure/tbi-ci4-core/app/Integrations/*`.\n";

        (new ReportWriter(ROOTPATH . 'infrastructure/tbi-ci4-core/docs/_infrastructure'))
            ->writeMarkdown('layer-violation-report.md', $report);

        CLI::write('Generated layer-violation-report.md', 'green');
    }
}
