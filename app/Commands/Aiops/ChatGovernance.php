<?php

namespace App\Commands\AiOps;

use App\Commands\SafeBaseCommand;
use App\Services\ChatGovernanceIndexer;
use CodeIgniter\CLI\CLI;

/**
 * AIOps — Chat Governance Index
 *
 * Scans archived ChatGPT markdown files and produces:
 * - CSV tracking
 * - JSON metrics
 * - Optional MySQL persistence
 *
 * READ-ONLY with respect to docs.
 */
class ChatGovernanceIndex extends SafeBaseCommand
{
    protected $group = 'aiops';
    protected $name = 'aiops:chat-governance-index';
    protected $description = 'Index ChatGPT governance steps from archived chats.';
    protected $usage = 'aiops:chat-governance-index [--write-files=1|0] [--db-sync=1|0] [--metrics=1|0] [--path=path] [--limit=n]';

    protected $options = [
        '--write-files' => 'Write CSV outputs',
        '--db-sync'     => 'Sync results to MySQL',
        '--metrics'     => 'Write metrics JSON',
        '--path'        => 'Override archive base path',
        '--limit'       => 'Limit number of chats scanned',
    ];

    protected $aiOpsRunnable = true;

    public function run(array $params)
    {
        $config = config('AiOps');

        if (! $config->enableChatGovernanceIndexing) {
            CLI::write('Chat governance indexing disabled by config.', 'yellow');
            return EXIT_SUCCESS;
        }

        [$args, $flags] = $this->parseParams($params);

        $writeFiles = $this->boolOpt($params, 'write-files', $config->enableChatGovernanceWriteFiles);
        $dbSync     = $this->boolOpt($params, 'db-sync', $config->enableChatGovernanceDbSync);
        $metrics    = $this->boolOpt($params, 'metrics', $config->enableChatGovernanceMetrics);

        $basePath = $this->opt($params, 'path') ?: ROOTPATH . 'docs/chatgpt/chats';
        $limit    = (int) ($this->opt($params, 'limit') ?? 0) ?: null;

        $indexer = new ChatGovernanceIndexer();
        $result  = $indexer->index($basePath, $limit);

        if ($writeFiles) {
            $indexer->writeCsv(
                $result['records'],
                ROOTPATH . 'docs/chatgpt/aiops/chat_step_tracker.csv'
            );
        }

        if ($metrics) {
            $indexer->writeMetrics(
                $result['metrics'],
                ROOTPATH . 'docs/chatgpt/aiops/chat_metrics.json'
            );
        }

        if ($dbSync) {
            $indexer->syncDatabase($result['records']);
        }

        CLI::write('Chat governance indexing complete.', 'green');
        CLI::write('Chats scanned: ' . ($result['summary']['total_chats'] ?? 0));
        CLI::write('Complete: ' . ($result['summary']['complete'] ?? 0));
        CLI::write('Blocked: ' . ($result['summary']['blocked'] ?? 0));

        return EXIT_SUCCESS;
    }

    private function opt(array $params, string $key): ?string
    {
        foreach ($params as $param) {
            if (str_starts_with($param, "--{$key}=")) {
                return substr($param, strlen($key) + 3);
            }
        }
        return null;
    }

    private function boolOpt(array $params, string $key, bool $default): bool
    {
        $val = $this->opt($params, $key);
        if ($val === null) {
            return $default;
        }
        return filter_var($val, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) ?? $default;
    }
}
