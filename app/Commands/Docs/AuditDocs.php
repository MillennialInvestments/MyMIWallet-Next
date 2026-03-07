<?php

declare(strict_types=1);

namespace App\Commands\Docs;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class AuditDocs extends SafeBaseCommand
{
    protected $group = 'Docs';
    protected $name = 'docs:audit';
    protected $description = 'Audit CI4 codebase vs /docs documentation';

    public function run(array $params)
    {

        CLI::write('Running documentation audit...', 'yellow');

        $docsInventory = ROOTPATH . 'docs/_inventory.md';

        if (!file_exists($docsInventory)) {
            CLI::error('docs/_inventory.md missing. Run docs:inventory first.');
            return;
        }

        $docsContent = file_get_contents($docsInventory);

        $controllers = $this->scanControllers();
        $missing = [];

        foreach ($controllers as $controller) {

            if (!str_contains($docsContent, $controller)) {
                $missing[] = $controller;
            }
        }

        $report = "# Documentation Audit\n\n";
        $report .= "Generated: " . date('Y-m-d H:i:s') . "\n\n";

        $report .= "## Undocumented Controllers\n\n";

        foreach ($missing as $controller) {
            $report .= "- {$controller}\n";
        }

        file_put_contents(ROOTPATH . 'docs/_audit_report.md', $report);

        CLI::write('Audit report generated: docs/_audit_report.md', 'green');

        log_message('info', 'Docs audit completed. Missing controllers: {count}', [
            'count' => count($missing)
        ]);
    }

    private function scanControllers(): array
    {

        $path = APPPATH . 'Controllers';

        $files = glob($path . '/*.php');

        $controllers = [];

        foreach ($files as $file) {

            $controllers[] = basename($file);
        }

        return $controllers;
    }
}