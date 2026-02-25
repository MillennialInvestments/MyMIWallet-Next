<?php

declare(strict_types=1);

namespace App\Commands\Ollama\Queue;

use App\Commands\Ollama\BaseOllamaCommand;
use App\Models\OllamaQueueModel;

class Stats extends BaseOllamaCommand
{
    protected $name = 'ollama:queue:stats';
    protected $description = 'Queue depth and status counts.';
    protected $options = ['--json' => 'JSON output'];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);

        $queue = new OllamaQueueModel();
        $payload = [
            'queued' => $queue->where('status', 'queued')->countAllResults(false),
            'done' => $queue->where('status', 'done')->countAllResults(false),
            'failed' => $queue->where('status', 'failed')->countAllResults(false),
        ];

        return $this->emitPayload($payload, $flags, EXIT_SUCCESS);
    }
}
