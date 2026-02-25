<?php

declare(strict_types=1);

namespace App\Commands\Ollama\Models;

use App\Commands\Ollama\BaseOllamaCommand;

class RmModel extends BaseOllamaCommand
{
    protected $name = 'ollama:models:rm';
    protected $description = 'Removes a local model.';
    protected $usage = 'ollama:models:rm <model>';
    protected $options = ['--force' => 'Required to execute', '--dry-run' => 'Dry run', '--base-url' => 'Override URL', '--timeout' => 'Timeout', '--json' => 'JSON output'];

    protected function isDestructive(): bool
    {
        return true;
    }

    public function run(array $params)
    {
        [$args, $flags] = $this->parseParams($params);
        $model = $args[0] ?? '';
        if ($model === '') {
            return $this->emitPayload(['error' => 'Model is required.'], $flags, self::EXIT_ERROR);
        }
        if (! $this->optBool($flags, 'force', false) && ! $this->optBool($flags, 'dry-run', false)) {
            return $this->emitPayload(['error' => 'Use --force=1 to remove model.'], $flags, self::EXIT_WARNING);
        }
        if ($this->optBool($flags, 'dry-run', false)) {
            return $this->emitPayload(['status' => 'dry-run', 'model' => $model], $flags, EXIT_SUCCESS);
        }

        try {
            $res = $this->client()->rm($model, $this->resolveBaseUrl($flags), $this->resolveTimeout($flags));
            return $this->emitPayload(['status' => 'ok', 'response' => $res], $flags, EXIT_SUCCESS);
        } catch (\Throwable $e) {
            return $this->emitPayload(['error' => $e->getMessage()], $flags, self::EXIT_ERROR);
        }
    }
}
