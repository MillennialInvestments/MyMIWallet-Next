<?php

namespace App\Commands\AIOps;

use App\Commands\SafeBaseCommand;
use App\Commands\Support\ArtifactHelper;
use App\Services\ChatGovernanceIndexer;
use CodeIgniter\CLI\CLI;

class ChatGovernanceIndex extends SafeBaseCommand
{
    protected $group       = 'AIOps - Commands';
    protected $name        = 'aiops:chat-gov-index';
    protected $description = 'Index ChatGPT governance steps from archived chats and sync CSV/DB outputs.';
    protected $usage       = 'aiops:chat-governance-index [--write-files=1|0] [--db-sync=1|0] [--metrics=1|0] [--path=path] [--limit=number]';
    protected $options     = [
        '--write-files' => 'Write CSV/JSON outputs (default: config).',
        '--db-sync' => 'Sync results into MySQL tables (default: config).',
        '--metrics' => 'Write JSON metrics output (default: config).',
        '--path' => 'Override base path (default: docs/chatgpt/chats).',
        '--limit' => 'Limit number of files scanned.',
    ];

    protected $aiOpsRunnable = true;

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);

        $config = config('AiOps');
        if (! $config->enableChatGovernanceIndexing) {
            CLI::write('Chat governance indexing is disabled in config.', 'yellow');
            return EXIT_SUCCESS;
        }

        $writeFiles = $this->resolveBooleanOption($params, 'write-files', $config->enableChatGovernanceWriteFiles);
        $dbSync = $this->resolveBooleanOption($params, 'db-sync', $config->enableChatGovernanceDbSync);
        $metricsEnabled = $this->resolveBooleanOption($params, 'metrics', $config->enableChatGovernanceMetrics);
        $basePath = ArtifactHelper::parseOptionValue($params, 'path') ?: ROOTPATH . 'docs/chatgpt/chats';
        $limitValue = ArtifactHelper::parseOptionValue($params, 'limit');
        $limit = $limitValue !== null ? max(1, (int) $limitValue) : null;

        $indexer = new ChatGovernanceIndexer();
        $results = $indexer->index($basePath, $limit);

        $records = $results['records'] ?? [];
        $metrics = $results['metrics'] ?? [];
        $summary = $results['summary'] ?? [
            'total_chats' => count($records),
            'complete' => 0,
            'in_progress' => 0,
            'blocked' => 0,
        ];

        $csvPath = ROOTPATH . 'docs/chatgpt/aiops/chat_step_tracker.csv';
        $metricsPath = ROOTPATH . 'docs/chatgpt/aiops/chat_metrics.json';

        $csvWritten = true;
        if ($writeFiles) {
            $csvWritten = $indexer->writeCsv($records, $csvPath);
        }

        $metricsWritten = true;
        if ($metricsEnabled) {
            $metricsWritten = $indexer->writeMetrics($metrics, $metricsPath);
        }

        $dbSynced = true;
        if ($dbSync) {
            $dbSynced = $indexer->syncDatabase($records);
        }

        CLI::write('Chat governance index complete.', 'green');
        CLI::write('Scanned: ' . ($summary['total_chats'] ?? 0));
        CLI::write('Complete: ' . ($summary['complete'] ?? 0));
        CLI::write('In progress: ' . ($summary['in_progress'] ?? 0));
        CLI::write('Blocked: ' . ($summary['blocked'] ?? 0));

        if ($writeFiles) {
            CLI::write('CSV: ' . $csvPath);
            if (! $csvWritten) {
                CLI::error('Failed to write CSV output.');
            }
        } else {
            CLI::write('CSV writing disabled.');
        }

        if ($metricsEnabled) {
            CLI::write('Metrics JSON: ' . $metricsPath);
            if (! $metricsWritten) {
                CLI::error('Failed to write metrics output.');
            }
        } else {
            CLI::write('Metrics writing disabled.');
        }

        if ($dbSync) {
            CLI::write('Database sync: ' . ($dbSynced ? 'success' : 'failed'));
        } else {
            CLI::write('Database sync disabled.');
        }

        if (! $csvWritten || ! $metricsWritten || ! $dbSynced) {
            return EXIT_ERROR;
        }

        return EXIT_SUCCESS;
    }

    private function resolveBooleanOption(array $params, string $option, bool $default): bool
    {
        $value = ArtifactHelper::parseOptionValue($params, $option);
        if ($value === null || $value === '') {
            return $default;
        }

        return filter_var($value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) ?? $default;
    }
}
