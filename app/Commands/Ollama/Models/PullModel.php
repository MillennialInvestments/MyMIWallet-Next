<?php

declare(strict_types=1);

namespace App\Commands\Ollama\Models;

use App\Commands\Ollama\BaseOllamaCommand;

class PullModel extends BaseOllamaCommand
{
    protected $name = 'ollama:models:pull';
    protected $description = 'Pulls a model with optional progress stream flag.';
    protected $usage = 'ollama:models:pull <model>';
    protected $options = ['--progress' => 'Enable streaming progress', '--base-url' => 'Override URL', '--timeout' => 'Timeout', '--json' => 'JSON output', '--dry-run' => 'Dry run'];

    public function run(array $params)
    {
        [$args, $flags] = $this->parseParams($params);
        $model = $args[0] ?? '';
        if ($model === '') {
            return $this->emitPayload(['error' => 'Model is required.'], $flags, self::EXIT_ERROR);
        }
        if ($this->optBool($flags, 'dry-run', false)) {
            return $this->emitPayload(['status' => 'dry-run', 'model' => $model], $flags, EXIT_SUCCESS);
        }

        try {
            $res = $this->client()->pull($model, $this->optBool($flags, 'progress', false), $this->resolveBaseUrl($flags), $this->resolveTimeout($flags));
            return $this->emitPayload(['status' => 'ok', 'model' => $model, 'response' => $res], $flags, EXIT_SUCCESS);
        } catch (\Throwable $e) {
            return $this->emitPayload(['error' => $e->getMessage()], $flags, self::EXIT_ERROR);
        }
    }
}
