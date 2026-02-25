<?php

declare(strict_types=1);

namespace App\Commands\Ollama;

class Health extends BaseOllamaCommand
{
    protected $name = 'ollama:health';
    protected $description = 'Checks endpoint reachability and readiness.';
    protected $options = ['--base-url' => 'Override base URL', '--timeout' => 'Timeout seconds', '--json' => 'JSON output'];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);

        $health = $this->client()->health($this->resolveBaseUrl($flags), $this->resolveTimeout($flags));
        $exit = $health['status'] === 'ok' ? EXIT_SUCCESS : self::EXIT_ERROR;

        return $this->emitPayload($health, $flags, $exit);
    }
}
