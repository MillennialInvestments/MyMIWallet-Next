<?php

declare(strict_types=1);

namespace App\Commands\Auth;

use App\Commands\SafeBaseCommand;
use App\Services\AuthBaselineService;
use CodeIgniter\CLI\CLI;

class BaselineRestore extends SafeBaseCommand
{
    protected $group = 'auth';
    protected $name = 'auth:baseline:restore';
    protected $description = 'Restore auth-critical files from auth baseline artifacts.';
    protected $options = [
        '--dry-run' => 'Preview restore actions without writing files.',
        '--from' => 'History timestamp source (YYYYMMDD-HHMMSS).',
        '--file' => 'Restore only a single auth-critical file path.',
    ];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);

        $service = service('authBaseline');
        if (! $service instanceof AuthBaselineService) {
            $service = new AuthBaselineService();
        }

        $result = $service->restore([
            'from' => $flags['from'] ?? '',
            'file' => $flags['file'] ?? '',
            'dry_run' => isset($flags['dry-run']),
        ]);

        if (isset($result['error'])) {
            CLI::error((string) $result['error']);
            return EXIT_ERROR;
        }

        CLI::write('Restore source: ' . ($result['source'] ?? 'n/a'));
        CLI::write('Dry-run: ' . (($result['dry_run'] ?? false) ? 'YES' : 'NO'));
        CLI::write('Restored files: ' . count($result['restored'] ?? []));
        foreach (($result['restored'] ?? []) as $file) {
            CLI::write('- ' . $file, 'green');
        }

        if (! empty($result['skipped'])) {
            CLI::write('Skipped files: ' . count($result['skipped']), 'yellow');
            foreach ($result['skipped'] as $file) {
                CLI::write('- ' . $file, 'yellow');
            }
        }

        return EXIT_SUCCESS;
    }

    protected function isDestructive(): bool
    {
        return true;
    }
}
