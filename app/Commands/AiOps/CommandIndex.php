<?php

declare(strict_types=1);

namespace App\Commands\AiOps;

use App\Commands\SafeBaseCommand;
use App\Services\AiOps\CommandHookService;
use App\Services\Spark\CommandInventoryService;
use CodeIgniter\CLI\CLI;

class CommandIndex extends SafeBaseCommand
{
    protected $group       = 'AI-Ops';
    protected $name        = 'aiops:command-index';
    protected $description = 'Scan and classify Spark commands for AIOps governance.';
    protected $usage       = 'aiops:command-index [--json] [--notify] [--db]';
    protected $options     = [
        '--json' => 'Emit JSON output to stdout',
        '--notify' => 'Send summary notification via Discord or email',
        '--db' => 'Store index snapshot in aiops_command_index table',
    ];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $jsonMode = isset($flags['json']);
        $notify = isset($flags['notify']) || isset($flags['notify=discord']);
        $storeDb = isset($flags['db']);

        $scanner = new CommandInventoryService();
        $commands = $scanner->scan(ROOTPATH . 'app/Commands');

        $index = [];
        foreach ($commands as $command) {
            $meta = $command['metadata'];
            $classification = $this->classify($command);
            $issues = [];

            if (! $command['uses_safe_base']) {
                $issues[] = 'Does not extend SafeBaseCommand.';
            }

            if (! $command['psr4']['ok']) {
                $issues[] = 'PSR-4 mismatch.';
            }

            if ($meta['name'] === null || $meta['group'] === null || $meta['description'] === null) {
                $issues[] = 'Missing $name, $group, or $description.';
            }

            foreach ($command['violations'] as $violation) {
                $issues[] = $violation;
            }

            $index[] = [
                'command' => $meta['name'] ?? $command['class'],
                'class' => $command['class'],
                'group' => $meta['group'],
                'description' => $meta['description'],
                'classification' => $classification,
                'requires_approval' => $command['is_destructive'],
                'supports_dry_run' => $command['has_dry_run'],
                'issues' => $issues,
            ];
        }

        $summary = $this->summarize($index);
        $payload = [
            'generated_at' => date('c'),
            'summary' => $summary,
            'commands' => $index,
        ];

        $this->writeIndexFiles($payload);
        $this->renderSummary($summary);

        if ($jsonMode) {
            CLI::write(json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
        }

        if ($storeDb) {
            $this->storeIndex($payload);
        }

        if ($notify) {
            $hook = new CommandHookService();
            $hook->notify('AIOps Command Index', $this->buildSummaryMessage($summary), $payload);
        }

        return EXIT_SUCCESS;
    }

    protected function isDestructive(): bool
    {
        return false;
    }

    private function classify(array $command): string
    {
        if ($command['is_destructive']) {
            return $command['has_approve'] ? 'requires-approval' : 'destructive';
        }

        return $command['has_dry_run'] ? 'safe' : 'read-only';
    }

    /**
     * @param array<int, array<string, mixed>> $index
     */
    private function summarize(array $index): array
    {
        $counts = [
            'safe' => 0,
            'read-only' => 0,
            'requires-approval' => 0,
            'destructive' => 0,
        ];

        $issues = 0;
        foreach ($index as $entry) {
            $counts[$entry['classification']]++;
            if ($entry['issues'] !== []) {
                $issues++;
            }
        }

        return [
            'total' => count($index),
            'issues' => $issues,
            'classifications' => $counts,
        ];
    }

    private function writeIndexFiles(array $payload): void
    {
        $directory = ROOTPATH . 'docs/aiops';
        if (! is_dir($directory)) {
            @mkdir($directory, 0775, true);
        }

        $jsonPath = $directory . '/command-index.json';
        file_put_contents($jsonPath, json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        $csvPath = $directory . '/command-index.csv';
        $handle = fopen($csvPath, 'w');
        if ($handle === false) {
            return;
        }

        fputcsv($handle, ['command', 'class', 'group', 'description', 'classification', 'requires_approval', 'supports_dry_run', 'issues']);
        foreach ($payload['commands'] as $entry) {
            fputcsv($handle, [
                $entry['command'],
                $entry['class'],
                $entry['group'],
                $entry['description'],
                $entry['classification'],
                $entry['requires_approval'] ? 'yes' : 'no',
                $entry['supports_dry_run'] ? 'yes' : 'no',
                implode('; ', $entry['issues']),
            ]);
        }

        fclose($handle);
    }

    private function storeIndex(array $payload): void
    {
        $db = db_connect();
        $table = 'aiops_command_index';

        $db->query(
            'CREATE TABLE IF NOT EXISTS ' . $table . ' (' .
            'id INT AUTO_INCREMENT PRIMARY KEY,' .
            'snapshot_id VARCHAR(32) NOT NULL,' .
            'command_name VARCHAR(190) NOT NULL,' .
            'class VARCHAR(255) NOT NULL,' .
            'command_group VARCHAR(190) NULL,' .
            'description TEXT NULL,' .
            'classification VARCHAR(64) NOT NULL,' .
            'requires_approval TINYINT(1) NOT NULL,' .
            'supports_dry_run TINYINT(1) NOT NULL,' .
            'issues TEXT NULL,' .
            'created_at DATETIME NOT NULL' .
            ')'
        );

        $snapshotId = date('YmdHis');
        $rows = [];
        foreach ($payload['commands'] as $entry) {
            $rows[] = [
                'snapshot_id' => $snapshotId,
                'command_name' => $entry['command'],
                'class' => $entry['class'],
                'command_group' => $entry['group'],
                'description' => $entry['description'],
                'classification' => $entry['classification'],
                'requires_approval' => $entry['requires_approval'] ? 1 : 0,
                'supports_dry_run' => $entry['supports_dry_run'] ? 1 : 0,
                'issues' => $entry['issues'] === [] ? null : json_encode($entry['issues']),
                'created_at' => date('Y-m-d H:i:s'),
            ];
        }

        if ($rows !== []) {
            $db->table($table)->insertBatch($rows);
        }
    }

    private function renderSummary(array $summary): void
    {
        CLI::write('AIOps Command Index', 'yellow');
        CLI::write(sprintf(
            'Total: %d | Issues: %d | Safe: %d | Read-only: %d | Requires approval: %d | Destructive: %d',
            $summary['total'],
            $summary['issues'],
            $summary['classifications']['safe'],
            $summary['classifications']['read-only'],
            $summary['classifications']['requires-approval'],
            $summary['classifications']['destructive']
        ));
    }

    private function buildSummaryMessage(array $summary): string
    {
        return sprintf(
            'Command index generated. Total: %d. Issues: %d. Requires approval: %d.',
            $summary['total'],
            $summary['issues'],
            $summary['classifications']['requires-approval']
        );
    }
}
