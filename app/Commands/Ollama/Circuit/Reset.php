<?php

declare(strict_types=1);

namespace App\Commands\Ollama\Circuit;

use App\Commands\Ollama\BaseOllamaCommand;

class Reset extends BaseOllamaCommand
{
    protected $name = 'ollama:circuit:reset';
    protected $description = 'Resets circuit breaker state.';
    protected $options = ['--json' => 'JSON output', '--base-url' => 'Override URL', '--timeout' => 'Timeout', '--dry-run' => 'Dry run where supported'];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);

        return $this->emitPayload([
            'status' => 'warning',
            'message' => 'ollama:circuit:reset is scaffolded and ready for extension.',
        ], $flags, self::EXIT_WARNING);
    }
}
