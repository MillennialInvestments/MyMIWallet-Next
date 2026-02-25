<?php

declare(strict_types=1);

namespace App\Commands\Ollama;

use Config\Ollama;

class Embed extends BaseOllamaCommand
{
    protected $name = 'ollama:embed';
    protected $description = 'Generates embedding vector for input text.';
    protected $options = ['--model' => 'Model', '--input' => 'Text input', '--base-url' => 'URL', '--timeout' => 'Timeout', '--json' => 'JSON output'];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $cfg = config(Ollama::class);
        $model = $this->optString($flags, 'model', $cfg->defaultEmbedModel);
        $input = $this->optString($flags, 'input', '');
        if ($input === '') {
            return $this->emitPayload(['error' => 'Missing --input'], $flags, self::EXIT_ERROR);
        }

        $runUuid = $this->runUuid();
        try {
            $res = $this->client()->embed(['model' => $model, 'input' => $input], $this->resolveBaseUrl($flags), $this->resolveTimeout($flags));
            $vector = $res['embeddings'][0] ?? [];
            $this->writeRun('embed', $model, $runUuid, ['input' => $input], 'ok');

            return $this->emitPayload(['run_uuid' => $runUuid, 'vector_dim' => is_array($vector) ? count($vector) : 0, 'vector_preview' => array_slice((array) $vector, 0, 8)], $flags, EXIT_SUCCESS);
        } catch (\Throwable $e) {
            $this->writeRun('embed', $model, $runUuid, ['input' => $input], 'error', 0, null, null, $e->getMessage());
            log_message('error', 'ollama:embed failed {run_uuid}: {error}', ['run_uuid' => $runUuid, 'error' => $e->getMessage()]);

            return $this->emitPayload(['run_uuid' => $runUuid, 'error' => $e->getMessage()], $flags, self::EXIT_ERROR);
        }
    }
}
