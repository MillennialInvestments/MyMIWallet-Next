<?php

declare(strict_types=1);

namespace App\Commands\AIOps;

use App\Commands\SafeBaseCommand;
use App\Services\Spark\AiopsDocsExecutionService;
use CodeIgniter\CLI\CLI;

class ExecuteDocs extends SafeBaseCommand
{
    protected $group = 'AIOps - All Control';
    protected $name = 'aiops:execute-docs';
    protected $description = 'Process docs/_aiops markdown files and execute actionable patches in a stateful loop.';
    protected $usage = 'aiops:execute-docs [--resume] [--file=filename.md] [--dry-run] [--force]';
    protected $options = [
        '--resume' => 'Continue using docs/_aiops/_execution_state.json.',
        '--file' => 'Process only a specific file (name or relative path).',
        '--dry-run' => 'Analyze and generate reports without applying code writes.',
        '--force' => 'Re-process files even when already in processed_files.',
    ];

    public function run(array $params)
    {
        [$args, $flags] = $this->parseParams($params);
        unset($args);

        $options = [
            'resume' => isset($flags['resume']),
            'dry_run' => isset($flags['dry-run']),
            'force' => isset($flags['force']),
            'file' => isset($flags['file']) ? (string) $flags['file'] : null,
        ];

        $service = new AiopsDocsExecutionService();
        $result = $service->run($options);

        CLI::write('AIOps docs execution complete.', 'green');
        CLI::write('files_seen: ' . ($result['files_seen'] ?? 0));
        CLI::write('files_processed: ' . ($result['files_processed'] ?? 0));
        CLI::write('applied_count: ' . ($result['applied_count'] ?? 0));
        CLI::write('dry_run: ' . (($result['dry_run'] ?? false) ? 'yes' : 'no'));
        CLI::write('state: ' . ($result['state_file'] ?? 'n/a'));
        CLI::write('inventory: ' . ($result['inventory_file'] ?? 'n/a'));
        CLI::write('log: ' . ($result['log_file'] ?? 'n/a'));
        CLI::write('final_report: ' . ($result['final_report_file'] ?? 'n/a'));

        if (! ($result['ok'] ?? false)) {
            CLI::error('Completed with errors. See docs/_aiops/_execution_state.json and _execution_log.md');
            return EXIT_ERROR;
        }

        return EXIT_SUCCESS;
    }

    protected function isDestructive(): bool
    {
        return false;
    }
}
