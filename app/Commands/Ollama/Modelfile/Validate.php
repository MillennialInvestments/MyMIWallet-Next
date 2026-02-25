<?php

declare(strict_types=1);

namespace App\Commands\Ollama\Modelfile;

use App\Commands\Ollama\BaseOllamaCommand;

class Validate extends BaseOllamaCommand
{
    protected $name = 'ollama:modelfile:validate';
    protected $description = 'Validates Ollama Modelfile.';
    protected $options = ['--json' => 'JSON output', '--base-url' => 'Override URL', '--timeout' => 'Timeout', '--dry-run' => 'Dry run where supported'];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);

        return $this->emitPayload([
            'status' => 'warning',
            'message' => 'ollama:modelfile:validate is scaffolded and ready for extension.',
        ], $flags, self::EXIT_WARNING);
    }
}
