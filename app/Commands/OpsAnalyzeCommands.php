<?php

namespace App\Commands;

use App\Services\OpsCommandService;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class OpsAnalyzeCommands extends BaseCommand
{
    protected $group       = 'ops';
    protected $name        = 'ops:analyze-commands';
    protected $description = 'Analyze parsed ops inbox items and generate AI plans';

    protected OpsCommandService $service;

    public function __construct()
    {
        parent::__construct();
        $this->service = new OpsCommandService();
    }

    public function run(array $params)
    {
        $items = $this->service->listInbox(['status' => ['Parsed']]);

        if (empty($items)) {
            CLI::write('No Parsed inbox items found.');
            return;
        }

        $apiKey   = trim((string) getenv('OPENAI_API_KEY'));
        $model    = trim((string) getenv('OPENAI_MODEL')) ?: 'gpt-4o-mini';
        $endpoint = 'https://api.openai.com/v1/chat/completions';

        if ($apiKey === '' || str_contains($apiKey, 'REPLACE_ME')) {
            foreach ($items as $item) {
                $this->service->markStatus((int) $item['id'], 'Blocked', ['reason' => 'OPENAI_API_KEY missing']);
                CLI::write(json_encode(['id' => $item['id'], 'status' => 'Blocked', 'reason' => 'OPENAI_API_KEY missing']));
            }
            return;
        }

        $client = service('curlrequest');

        foreach ($items as $item) {
            $id     = (int) $item['id'];
            $prompt = $this->buildPrompt($item);

            try {
                $response = $client->post($endpoint, [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $apiKey,
                        'Content-Type'  => 'application/json',
                    ],
                    'json' => [
                        'model'       => $model,
                        'temperature' => 0.2,
                        'messages'    => $prompt,
                    ],
                    'timeout' => 30,
                ]);

                $statusCode = $response->getStatusCode();

                if ($statusCode >= 400) {
                    $this->service->markStatus($id, 'Failed', ['reason' => 'HTTP ' . $statusCode]);
                    CLI::error("Analysis failed for ID {$id}: HTTP {$statusCode}");
                    continue;
                }

                $body = json_decode((string) $response->getBody(), true);
                $content = $body['choices'][0]['message']['content'] ?? '';

                [$summary, $plan] = $this->extractPlan($content);

                $this->service->upsertAnalysis($id, [
                    'summary' => $summary,
                    'plan'    => $plan,
                ]);

                $this->service->markStatus($id, 'Ready');

                CLI::write(json_encode(['id' => $id, 'status' => 'Ready', 'summary' => $summary]));
            } catch (\Throwable $e) {
                $this->service->markStatus($id, 'Failed', ['reason' => $e->getMessage()]);
                log_message('error', 'OpsAnalyzeCommands: analysis failed: ' . $e->getMessage());
                CLI::error("Analysis failed for ID {$id}: {$e->getMessage()}");
            }
        }
    }

    protected function buildPrompt(array $item): array
    {
        $safeBody   = substr((string) ($item['raw_body'] ?? ''), 0, 4000);
        $parsedJson = $item['parsed_json'] ?? [];

        return [
            [
                'role'    => 'system',
                'content' => 'You are an operations planner. Never include secrets. Return concise plans as JSON.',
            ],
            [
                'role'    => 'user',
                'content' => json_encode([
                    'subject'      => $item['subject'] ?? '',
                    'from'         => $item['from_email'] ?? '',
                    'parsed'       => $parsedJson,
                    'raw_excerpt'  => $safeBody,
                    'constraints'  => ['no deploy without approval', 'phone-safe'],
                ]),
            ],
        ];
    }

    protected function extractPlan(string $content): array
    {
        $summary = trim($content);
        $plan    = [];

        $decoded = json_decode($content, true);

        if (is_array($decoded)) {
            $plan = $decoded;
            $summary = $decoded['summary'] ?? ($decoded['title'] ?? 'Plan available');
        }

        return [$summary, $plan];
    }
}
