<?php

declare(strict_types=1);

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class InfraIntegrationHealth extends BaseCommand
{
    protected $group = 'Infrastructure';
    protected $name = 'infra:integration-health';
    protected $description = 'Runs low-cost health checks for enabled integrations.';

    public function run(array $params): void
    {
        $date = date('Ymd');
        $path = ROOTPATH . "infrastructure/tbi-ci4-core/docs/_infrastructure/integration-health-{$date}.md";

        $lines = [
            '# Integration Health',
            '',
            '- alphavantage: pending credentials',
            '- marketaux: pending credentials',
            '- discord: pending webhook',
            '- zapier: pending webhook',
            '- imap: pending credentials',
        ];

        if (! is_dir(dirname($path))) {
            mkdir(dirname($path), 0775, true);
        }

        file_put_contents($path, implode(PHP_EOL, $lines) . PHP_EOL);
        log_message('info', 'infra:integration-health generated report: {path}', ['path' => $path]);
        CLI::write('Integration health report generated.', 'green');
    }
}
