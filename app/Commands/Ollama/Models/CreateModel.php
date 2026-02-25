<?php

declare(strict_types=1);

namespace App\Commands\Ollama\Models;

use App\Commands\Ollama\BaseOllamaCommand;

class CreateModel extends BaseOllamaCommand
{
    protected $name = 'ollama:models:create';
    protected $description = 'Creates a model from Modelfile.';
    protected $options = ['--json' => 'JSON output', '--base-url' => 'Override URL', '--timeout' => 'Timeout', '--dry-run' => 'Dry run where supported'];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);

        return $this->emitPayload([
            'status' => 'warning',
            'message' => 'ollama:models:create is scaffolded and ready for extension.',
        ], $flags, self::EXIT_WARNING);
    }
}
