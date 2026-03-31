<?php

declare(strict_types=1);

namespace App\Commands\Platform;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class RunReport extends SafeBaseCommand
{
    protected $group = 'platform';
    protected $name = 'platform:run:report';
    protected $description = 'Print latest platform run report summary.';

    public function run(array $params)
    {
        $file = ROOTPATH . 'docs/_platform/latest_run.json';
        if (! is_file($file)) {
            CLI::error('No latest run report found at docs/_platform/latest_run.json');
            return;
        }

        $data = json_decode((string) file_get_contents($file), true);
        if (! is_array($data)) {
            CLI::error('Unable to parse latest report JSON.');
            return;
        }

        CLI::write('platform:run report summary', 'yellow');
        CLI::write('Timestamp: ' . ($data['timestamp'] ?? 'n/a'));
        CLI::write('Branch: ' . ($data['git_branch'] ?? 'n/a'));
        CLI::write('Failed commands: ' . (string) (($data['summary']['failed_commands_count'] ?? 0)));
        CLI::write('Skipped commands: ' . (string) (($data['summary']['skipped_commands_count'] ?? 0)));
    }
}
