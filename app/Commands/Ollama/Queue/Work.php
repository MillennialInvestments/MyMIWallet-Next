<?php

declare(strict_types=1);

namespace App\Commands\Ollama\Queue;

use App\Commands\Ollama\BaseOllamaCommand;
use App\Models\OllamaQueueModel;

class Work extends BaseOllamaCommand
{
    protected $name = 'ollama:queue:work';
    protected $description = 'Consumes queued Ollama jobs.';
    protected $options = ['--once' => 'Process one item', '--max' => 'Max jobs', '--base-url' => 'URL', '--timeout' => 'Timeout', '--json' => 'JSON'];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $limit = max(1, $this->optInt($flags, 'max', $this->optBool($flags, 'once', false) ? 1 : 25));

        $queue = new OllamaQueueModel();
        $jobs = $queue->where('status', 'queued')->orderBy('priority', 'DESC')->orderBy('created_at', 'ASC')->findAll($limit);
        $processed = [];

        foreach ($jobs as $job) {
            $payload = json_decode((string) ($job['payload_json'] ?? '{}'), true) ?: [];
            try {
                $type = (string) ($job['type'] ?? 'generate');
                if ($type === 'embed') {
                    $this->client()->embed($payload, $this->resolveBaseUrl($flags), $this->resolveTimeout($flags));
                } elseif ($type === 'chat') {
                    $this->client()->chat($payload, $this->resolveBaseUrl($flags), $this->resolveTimeout($flags));
                } else {
                    $this->client()->generate($payload, $this->resolveBaseUrl($flags), $this->resolveTimeout($flags));
                }
                $queue->update($job['job_id'], ['status' => 'done', 'attempts' => ((int) $job['attempts']) + 1, 'updated_at' => date('Y-m-d H:i:s')]);
                $processed[] = ['job_id' => $job['job_id'], 'status' => 'done'];
            } catch (\Throwable $e) {
                $queue->update($job['job_id'], ['status' => 'failed', 'attempts' => ((int) $job['attempts']) + 1, 'last_error' => $e->getMessage(), 'updated_at' => date('Y-m-d H:i:s')]);
                $processed[] = ['job_id' => $job['job_id'], 'status' => 'failed'];
            }
        }

        return $this->emitPayload(['processed' => $processed], $flags, EXIT_SUCCESS);
    }
}
