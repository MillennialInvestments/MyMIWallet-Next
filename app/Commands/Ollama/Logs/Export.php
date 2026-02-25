<?php

declare(strict_types=1);

namespace App\Commands\Ollama\Logs;

use App\Commands\Ollama\BaseOllamaCommand;
use App\Models\OllamaRunModel;

class Export extends BaseOllamaCommand
{
    protected $name = 'ollama:logs:export';
    protected $description = 'Export Ollama run/error evidence to docs/_aiops/ollama/logs/*.md.';
    protected $options = [
        '--limit' => 'Rows to export',
        '--path' => 'Output directory',
        '--json' => 'JSON output',
    ];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $limit = max(1, $this->optInt($flags, 'limit', 100));
        $path = rtrim($this->optString($flags, 'path', ROOTPATH . 'docs/_aiops/ollama/logs'), '/');

        if (! is_dir($path)) {
            mkdir($path, 0775, true);
        }

        $source = 'db';
        try {
            $rows = (new OllamaRunModel())
                ->orderBy('id', 'DESC')
                ->findAll($limit);
        } catch (\Throwable $e) {
            $source = 'file';
            $logFile = WRITEPATH . 'logs/log-' . date('Y-m-d') . '.php';
            $lines = is_file($logFile) ? (file($logFile, FILE_IGNORE_NEW_LINES) ?: []) : [];
            $matches = array_values(array_filter($lines, static fn ($line) => stripos($line, 'ollama') !== false));
            $rows = array_map(static fn ($line) => ['run_uuid' => '-', 'type' => 'log', 'model' => '-', 'status' => 'line', 'latency_ms' => '-', 'error' => $line], array_slice($matches, -1 * $limit));
        }

        $file = $path . '/ollama-runs-' . date('Ymd-His') . '.md';
        $md = "# Ollama Runs Export\n\nGenerated: " . date('c') . "\n\n";

        foreach ($rows as $row) {
            $md .= "## Run {$row['run_uuid']}\n";
            $md .= "- type: `{$row['type']}`\n";
            $md .= "- model: `" . ($row['model'] ?? '') . "`\n";
            $md .= "- status: `{$row['status']}`\n";
            $md .= "- latency_ms: `" . ($row['latency_ms'] ?? '') . "`\n";
            if (! empty($row['error'])) {
                $md .= "- error: `" . str_replace('`', '\\`', (string) $row['error']) . "`\n";
            }
            $md .= "\n";
        }

        file_put_contents($file, $md);

        return $this->emitPayload([
            'status' => 'ok',
            'source' => $source,
            'exported_rows' => count($rows),
            'file' => $file,
        ], $flags, EXIT_SUCCESS);
    }
}
