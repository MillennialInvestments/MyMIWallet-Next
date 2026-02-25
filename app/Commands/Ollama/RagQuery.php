<?php

declare(strict_types=1);

namespace App\Commands\Ollama;

use App\Commands\Ollama\BaseOllamaCommand;

class RagQuery extends BaseOllamaCommand
{
    protected $name = 'ollama:rag:query';
    protected $description = 'Retrieves top-k chunks and optional answer.';
    protected $options = ['--json' => 'JSON output', '--base-url' => 'Override URL', '--timeout' => 'Timeout', '--dry-run' => 'Dry run where supported'];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);

        return $this->emitPayload([
            'status' => 'warning',
            'message' => 'ollama:rag:query is scaffolded and ready for extension.',
        ], $flags, self::EXIT_WARNING);
    }
}
