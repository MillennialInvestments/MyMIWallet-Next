<?php

declare(strict_types=1);

namespace App\Commands\Ollama;

class Ping extends BaseOllamaCommand
{
    protected $name = 'ollama:ping';
    protected $description = 'Low-level ping with retries.';
    protected $options = ['--retries' => 'Retry count', '--sleep-ms' => 'Sleep between retries', '--base-url' => 'Override URL', '--timeout' => 'Timeout', '--json' => 'JSON output'];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);

        $retries = max(1, $this->optInt($flags, 'retries', 3));
        $sleepMs = max(0, $this->optInt($flags, 'sleep-ms', 250));

        for ($i = 1; $i <= $retries; $i++) {
            $health = $this->client()->health($this->resolveBaseUrl($flags), $this->resolveTimeout($flags));
            if (($health['status'] ?? 'down') === 'ok') {
                $health['attempt'] = $i;
                return $this->emitPayload($health, $flags, EXIT_SUCCESS);
            }
            usleep($sleepMs * 1000);
        }

        return $this->emitPayload(['status' => 'down', 'retries' => $retries], $flags, self::EXIT_ERROR);
    }
}
