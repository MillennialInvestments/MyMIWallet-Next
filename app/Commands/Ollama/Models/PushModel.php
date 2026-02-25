<?php

declare(strict_types=1);

namespace App\Commands\Ollama\Models;

use App\Commands\Ollama\BaseOllamaCommand;

class PushModel extends BaseOllamaCommand
{
    protected $name = 'ollama:models:push';
    protected $description = 'Pushes a model to registry.';
    protected $options = ['--json' => 'JSON output', '--base-url' => 'Override URL', '--timeout' => 'Timeout', '--dry-run' => 'Dry run where supported'];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);

        return $this->emitPayload([
            'status' => 'warning',
            'message' => 'ollama:models:push is scaffolded and ready for extension.',
        ], $flags, self::EXIT_WARNING);
    }
}
