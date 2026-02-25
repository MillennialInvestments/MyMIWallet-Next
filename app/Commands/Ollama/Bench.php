<?php

declare(strict_types=1);

namespace App\Commands\Ollama;

use App\Commands\Ollama\BaseOllamaCommand;

class Bench extends BaseOllamaCommand
{
    protected $name = 'ollama:bench';
    protected $description = 'Benchmarks latency and throughput for prompt set.';
    protected $options = ['--json' => 'JSON output', '--base-url' => 'Override URL', '--timeout' => 'Timeout', '--dry-run' => 'Dry run where supported'];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);

        return $this->emitPayload([
            'status' => 'warning',
            'message' => 'ollama:bench is scaffolded and ready for extension.',
        ], $flags, self::EXIT_WARNING);
    }
}
