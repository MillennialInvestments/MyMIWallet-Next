<?php

declare(strict_types=1);

namespace App\Commands\Ollama\Queue;

use App\Commands\Ollama\BaseOllamaCommand;

class Retry extends BaseOllamaCommand
{
    protected $name = 'ollama:queue:retry';
    protected $description = 'Retries failed jobs from queue.';
    protected $options = ['--json' => 'JSON output', '--base-url' => 'Override URL', '--timeout' => 'Timeout', '--dry-run' => 'Dry run where supported'];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);

        return $this->emitPayload([
            'status' => 'warning',
            'message' => 'ollama:queue:retry is scaffolded and ready for extension.',
        ], $flags, self::EXIT_WARNING);
    }
}
