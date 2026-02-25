<?php

declare(strict_types=1);

namespace App\Commands\Ollama\Sessions;

use App\Commands\Ollama\BaseOllamaCommand;

class ShowSession extends BaseOllamaCommand
{
    protected $name = 'ollama:sessions:show';
    protected $description = 'Shows one session transcript.';
    protected $options = ['--json' => 'JSON output', '--base-url' => 'Override URL', '--timeout' => 'Timeout', '--dry-run' => 'Dry run where supported'];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);

        return $this->emitPayload([
            'status' => 'warning',
            'message' => 'ollama:sessions:show is scaffolded and ready for extension.',
        ], $flags, self::EXIT_WARNING);
    }
}
