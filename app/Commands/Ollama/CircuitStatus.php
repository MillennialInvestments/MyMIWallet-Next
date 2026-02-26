<?php

declare(strict_types=1);

namespace App\Commands\Ollama;

use App\Services\LLM\OllamaCircuitBreaker;

class CircuitStatus extends BaseOllamaCommand
{
    protected $name = 'ollama:circuit:status';
    protected $description = 'Shows Ollama circuit breaker state.';

    public function run(array $params)
    {
        $breaker = new OllamaCircuitBreaker();
        $status = $breaker->status();

        return $this->emitPayload($status, [], EXIT_SUCCESS);
    }
}