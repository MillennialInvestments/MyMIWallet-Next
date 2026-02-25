<?php

declare(strict_types=1);

namespace App\Commands\Ollama\Policy;

use App\Commands\Ollama\BaseOllamaCommand;

class Export extends BaseOllamaCommand
{
    protected $name = 'ollama:policy:export';
    protected $description = 'Exports active policy to docs.';
    protected $options = ['--json' => 'JSON output', '--base-url' => 'Override URL', '--timeout' => 'Timeout', '--dry-run' => 'Dry run where supported'];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);

        return $this->emitPayload([
            'status' => 'warning',
            'message' => 'ollama:policy:export is scaffolded and ready for extension.',
        ], $flags, self::EXIT_WARNING);
    }
}
