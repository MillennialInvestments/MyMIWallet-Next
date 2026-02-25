<?php

declare(strict_types=1);

namespace App\Commands\Ollama\Queue;

use App\Commands\Ollama\BaseOllamaCommand;
use App\Models\OllamaQueueModel;

class Push extends BaseOllamaCommand
{
    protected $name = 'ollama:queue:push';
    protected $description = 'Queues an Ollama job in DB.';
    protected $options = ['--type' => 'generate|chat|embed', '--model' => 'Model name', '--payload-file' => 'JSON payload file', '--priority' => 'Priority', '--json' => 'JSON'];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $type = $this->optString($flags, 'type', 'generate');
        $model = $this->optString($flags, 'model', '');
        $payloadFile = $this->optString($flags, 'payload-file', '');
        $payload = [];
        if ($payloadFile !== '' && is_file($payloadFile)) {
            $payload = json_decode((string) file_get_contents($payloadFile), true) ?: [];
        }
        $payload['model'] = $model;

        $jobId = (new OllamaQueueModel())->insert([
            'type' => $type,
            'priority' => $this->optInt($flags, 'priority', 5),
            'payload_json' => json_encode($payload, JSON_UNESCAPED_SLASHES),
            'status' => 'queued',
            'attempts' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ], true);

        return $this->emitPayload(['status' => 'queued', 'job_id' => $jobId], $flags, EXIT_SUCCESS);
    }
}
