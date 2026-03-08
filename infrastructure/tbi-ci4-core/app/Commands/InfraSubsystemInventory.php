<?php

declare(strict_types=1);

namespace App\Commands;

use App\Services\Infra\ReportWriter;
use App\Services\Infra\SubsystemCatalog;
use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class InfraSubsystemInventory extends SafeBaseCommand
{
    protected $group = 'Infrastructure';
    protected $name = 'infra:subsystem-inventory';
    protected $description = 'Build subsystem inventory JSON/Markdown for overlay portability audits.';

    public function run(array $params): void
    {
        $catalog = (new SubsystemCatalog())->all();
        $writer = new ReportWriter(ROOTPATH . 'infrastructure/tbi-ci4-core/docs/_infrastructure');

        $writer->writeJson('subsystem-inventory.json', [
            'generated_at' => date(DATE_ATOM),
            'total_subsystems' => count($catalog),
            'subsystems' => array_values($catalog),
        ]);

        $lines = [
            '# Subsystem Inventory',
            '',
            '| Name | Path | Portable | Toggleable | Hard-coded |',
            '|---|---|---|---|---|',
        ];

        foreach ($catalog as $item) {
            $lines[] = sprintf(
                '| %s | `%s` | %s | %s | %s |',
                $item['name'],
                $item['path'],
                $item['portable'] ? 'yes' : 'no',
                $item['toggleable'] ? 'yes' : 'no',
                $item['hard_coded'] ? 'yes' : 'no'
            );
        }

        $writer->writeMarkdown('subsystem-inventory.md', implode(PHP_EOL, $lines) . PHP_EOL);
        CLI::write('Generated subsystem inventory reports.', 'green');
    }
}
