<?php

declare(strict_types=1);

namespace App\Commands\Ollama;

use App\Commands\Ollama\BaseOllamaCommand;

class Stream extends BaseOllamaCommand
{
    protected $name = 'ollama:stream';
    protected $description = 'Streams tokens to console and transcript output.';
    protected $options = ['--json' => 'JSON output', '--base-url' => 'Override URL', '--timeout' => 'Timeout', '--dry-run' => 'Dry run where supported'];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);

        return $this->emitPayload([
            'status' => 'warning',
            'message' => 'ollama:stream is scaffolded and ready for extension.',
        ], $flags, self::EXIT_WARNING);
    }
}
