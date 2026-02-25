<?php

declare(strict_types=1);

namespace App\Commands\Ollama\Models;

use App\Commands\Ollama\BaseOllamaCommand;

class ShowModel extends BaseOllamaCommand
{
    protected $name = 'ollama:models:show';
    protected $description = 'Shows metadata for one model.';
    protected $usage = 'ollama:models:show <model>';
    protected $options = ['--base-url' => 'Override URL', '--timeout' => 'Timeout', '--json' => 'JSON output'];

    public function run(array $params)
    {
        [$args, $flags] = $this->parseParams($params);
        $model = $args[0] ?? '';
        if ($model === '') {
            return $this->emitPayload(['error' => 'Model is required.'], $flags, self::EXIT_ERROR);
        }

        try {
            $res = $this->client()->showModel($model, $this->resolveBaseUrl($flags), $this->resolveTimeout($flags));
            return $this->emitPayload(['model' => $model, 'metadata' => $res], $flags, EXIT_SUCCESS);
        } catch (\Throwable $e) {
            return $this->emitPayload(['error' => $e->getMessage()], $flags, self::EXIT_ERROR);
        }
    }
}
