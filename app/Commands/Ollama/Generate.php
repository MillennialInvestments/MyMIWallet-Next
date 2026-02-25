<?php

declare(strict_types=1);

namespace App\Commands\Ollama;

use Config\Ollama;

class Generate extends BaseOllamaCommand
{
    protected $name = 'ollama:generate';
    protected $description = 'Runs single prompt generate against Ollama.';
    protected $options = ['--model' => 'Model name', '--prompt' => 'Prompt text', '--stream' => 'Stream mode', '--temperature' => 'Temperature', '--top-p' => 'Top-p', '--max-tokens' => 'Max tokens', '--base-url' => 'Override URL', '--timeout' => 'Timeout', '--json' => 'JSON output'];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $cfg = config(Ollama::class);
        $model = trim((string) $this->option('model', $this->optString($flags, 'model', $cfg->defaultChatModel)));
        $prompt = trim((string) $this->option('prompt', $this->optString($flags, 'prompt', '')));
        if ($prompt === '') {
            return $this->emitPayload(['error' => 'Missing --prompt'], $flags, self::EXIT_ERROR);
        }

        $runUuid = $this->runUuid();
        $start = microtime(true);
        try {
            $payload = [
                'model' => $model,
                'prompt' => $prompt,
                'stream' => in_array(strtolower((string) $this->option('stream', $this->optString($flags, 'stream', '0'))), ['1', 'true', 'yes', 'on'], true),
                'options' => [
                    'temperature' => (float) $this->option('temperature', $this->optString($flags, 'temperature', '0.2')),
                    'top_p' => (float) $this->option('top-p', $this->optString($flags, 'top-p', '0.9')),
                    'num_predict' => (int) $this->option('max-tokens', (string) $this->optInt($flags, 'max-tokens', $cfg->maxTokens)),
                ],
            ];
            $res = $this->client()->generate($payload, $this->resolveBaseUrl($flags), $this->resolveTimeout($flags));
            $latency = (int) ((microtime(true) - $start) * 1000);
            $this->writeRun('generate', $model, $runUuid, $payload, 'ok', $latency);

            return $this->emitPayload(['run_uuid' => $runUuid, 'model' => $model, 'latency_ms' => $latency, 'text' => $res['response'] ?? null, 'raw' => $res], $flags, EXIT_SUCCESS);
        } catch (\Throwable $e) {
            $this->writeRun('generate', $model, $runUuid, ['prompt' => $prompt], 'error', 0, null, null, $e->getMessage());
            log_message('error', 'ollama:generate failed {run_uuid}: {error}', ['run_uuid' => $runUuid, 'error' => $e->getMessage()]);

            return $this->emitPayload(['run_uuid' => $runUuid, 'error' => $e->getMessage()], $flags, self::EXIT_ERROR);
        }
    }
}
