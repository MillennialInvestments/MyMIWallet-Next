<?php

declare(strict_types=1);

namespace App\Commands\Ollama;

class Logs extends BaseOllamaCommand
{
    protected $name = 'ollama:logs';
    protected $description = 'Backward-compatible alias of ollama:logs:tail.';
    protected $options = ['--tail' => 'Lines', '--file' => 'File', '--json' => 'JSON output'];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $tail = max(1, $this->optInt($flags, 'tail', 200));
        $file = $this->optString($flags, 'file', WRITEPATH . 'logs/log-' . date('Y-m-d') . '.php');

        if (! is_file($file)) {
            return $this->emitPayload([
                'status' => 'warning',
                'file' => $file,
                'lines' => [],
                'message' => 'Log file not found.',
            ], $flags, self::EXIT_WARNING);
        }

        $all = file($file, FILE_IGNORE_NEW_LINES) ?: [];
        $lines = array_slice($all, -1 * $tail);
        $matches = array_values(array_filter($lines, static fn ($line) => stripos($line, 'ollama') !== false));

        return $this->emitPayload(['status' => 'ok', 'file' => $file, 'lines' => $matches], $flags, EXIT_SUCCESS);
    }
}
