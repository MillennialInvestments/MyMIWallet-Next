<?php

namespace App\Commands;

use App\Services\OpsCommandService;
use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class OpsAnalyzeCommands extends SafeBaseCommand
{
    protected $group       = 'ops';
    protected $name        = 'ops:analyze-commands';
    protected $description = 'Analyze parsed ops inbox items and generate AI plans';
    protected $options     = [
        '--dry-run' => 'Preview actions without updating inbox items',
        '--approve' => 'Acknowledge and update inbox items',
    ];

    protected OpsCommandService $service;

    protected function svc(): OpsCommandService
    {
        // Lazy init so command discovery doesn't instantiate heavy services
        static $svc = null;

        if ($svc === null) {
            $svc = new OpsCommandService();
        }

        return $svc;
    }

    public function run(array $params)
    {
        log_message('info', '[spark:ops:analyze-commands] Started', ['params' => $params]);
        [$args, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);

        if ($dryRun) {
            CLI::write('Dry-run enabled. No inbox items will be updated.', 'yellow');
            log_message('info', '[spark:ops:analyze-commands] Completed', ['dry_run' => true]);
            return EXIT_SUCCESS;
        }

        $items = $this->svc()->listInbox(['status' => ['Parsed']]);

        if (empty($items)) {
            CLI::write('No Parsed inbox items found.');
            log_message('info', '[spark:ops:analyze-commands] Completed', ['items' => 0]);
            return EXIT_SUCCESS;
        }

        $apiKey   = trim((string) getenv('OPENAI_API_KEY'));
        $model    = trim((string) getenv('OPENAI_MODEL')) ?: 'gpt-4o-mini';
        $endpoint = 'https://api.openai.com/v1/chat/completions';

        if ($apiKey === '' || str_contains($apiKey, 'REPLACE_ME')) {
            foreach ($items as $item) {
                $this->svc()->markStatus((int) $item['id'], 'Blocked', ['reason' => 'OPENAI_API_KEY missing']);
                CLI::write(json_encode(['id' => $item['id'], 'status' => 'Blocked', 'reason' => 'OPENAI_API_KEY missing']));
            }
            log_message('error', '[spark:ops:analyze-commands] Failed', ['reason' => 'OPENAI_API_KEY missing']);
            return EXIT_ERROR;
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
                    $this->svc()->markStatus($id, 'Failed', ['reason' => 'HTTP ' . $statusCode]);
                    CLI::error("Analysis failed for ID {$id}: HTTP {$statusCode}");
                    log_message('error', '[spark:ops:analyze-commands] Failed', ['reason' => 'HTTP ' . $statusCode, 'id' => $id]);
                    continue;
                }

                $body = json_decode((string) $response->getBody(), true);
                $content = $body['choices'][0]['message']['content'] ?? '';

                [$summary, $plan] = $this->extractPlan($content);

                $this->svc()->upsertAnalysis($id, [
                    'summary' => $summary,
                    'plan'    => $plan,
                ]);

                $this->svc()->markStatus($id, 'Ready');

                CLI::write(json_encode(['id' => $id, 'status' => 'Ready', 'summary' => $summary]));
            } catch (\Throwable $e) {
                $this->svc()->markStatus($id, 'Failed', ['reason' => $e->getMessage()]);
                log_message('error', '[spark:ops:analyze-commands] Failed', ['reason' => $e->getMessage(), 'id' => $id]);
                CLI::error("Analysis failed for ID {$id}: {$e->getMessage()}");
            }
        }

        log_message('info', '[spark:ops:analyze-commands] Completed', ['items' => count($items)]);
        return EXIT_SUCCESS;
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

    protected function isDestructive(): bool
    {
        return true;
    }
}
