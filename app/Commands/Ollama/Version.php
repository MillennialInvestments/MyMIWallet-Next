<?php

declare(strict_types=1);

namespace App\Commands\Ollama;

class Version extends BaseOllamaCommand
{
    protected $name = 'ollama:version';
    protected $description = 'Reports Ollama version info from health endpoint.';
    protected $options = ['--base-url' => 'Override base URL', '--timeout' => 'Timeout seconds', '--json' => 'JSON output'];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);

        try {
            $response = $this->client()->showModel('llama3.2:latest', $this->resolveBaseUrl($flags), $this->resolveTimeout($flags));
            $payload = ['status' => 'ok', 'server_version' => $response['modelfile'] ?? 'unknown'];
            return $this->emitPayload($payload, $flags, EXIT_SUCCESS);
        } catch (\Throwable $e) {
            return $this->emitPayload(['status' => 'error', 'last_error' => $e->getMessage()], $flags, self::EXIT_ERROR);
        }
    }
}
