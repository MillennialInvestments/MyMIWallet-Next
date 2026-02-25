<?php

declare(strict_types=1);

namespace App\Commands\Ollama\Models;

use App\Commands\Ollama\BaseOllamaCommand;

class ListModels extends BaseOllamaCommand
{
    protected $name = 'ollama:models:list';
    protected $description = 'Lists installed Ollama models.';
    protected $options = ['--base-url' => 'Override URL', '--timeout' => 'Timeout', '--json' => 'JSON output'];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);

        try {
            $res = $this->client()->listModels($this->resolveBaseUrl($flags), $this->resolveTimeout($flags));
            return $this->emitPayload(['models' => $res['models'] ?? []], $flags, EXIT_SUCCESS);
        } catch (\Throwable $e) {
            return $this->emitPayload(['error' => $e->getMessage(), 'models' => []], $flags, self::EXIT_ERROR);
        }
    }
}
