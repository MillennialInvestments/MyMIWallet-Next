<?php

declare(strict_types=1);

namespace App\Commands\Ollama;

use App\Services\LLM\OllamaCircuitBreaker;

class CircuitReset extends BaseOllamaCommand
{
    protected $name = 'ollama:circuit:reset';
    protected $description = 'Resets Ollama circuit breaker.';

    public function run(array $params)
    {
        $breaker = new OllamaCircuitBreaker();
        $breaker->reset();

        return $this->emitPayload(['status' => 'reset'], [], EXIT_SUCCESS);
    }
}