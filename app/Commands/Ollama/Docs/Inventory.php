<?php

declare(strict_types=1);

namespace App\Commands\Ollama\Docs;

use App\Commands\Ollama\BaseOllamaCommand;

class Inventory extends BaseOllamaCommand
{
    protected $name = 'ollama:docs:inventory';
    protected $description = 'Builds docs embedding/metadata manifest.';
    protected $options = ['--json' => 'JSON output', '--base-url' => 'Override URL', '--timeout' => 'Timeout', '--dry-run' => 'Dry run where supported'];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);

        return $this->emitPayload([
            'status' => 'warning',
            'message' => 'ollama:docs:inventory is scaffolded and ready for extension.',
        ], $flags, self::EXIT_WARNING);
    }
}
