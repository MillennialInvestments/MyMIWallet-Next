<?php

namespace App\Commands\AiOps;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use App\Libraries\OpenAIClient;

class ObserveSuggest extends SafeBaseCommand
{
    protected $group = 'AiOps';
    protected $name = 'aiops:observe:suggest';
    protected $description = 'Generate fix suggestions for recurring errors';

    public function run(array $params)
    {
        $settings = config('SiteSettings');

        if (!$settings->aiOpsEnabled || !$settings->aiops_llm_enabled) {
            CLI::error('AI Ops LLM disabled in SiteSettings.');
            return;
        }

        $statePath = WRITEPATH . 'audit/observability_state.json';

        if (!file_exists($statePath)) {
            CLI::error('Run observe:scan first.');
            return;
        }

        $data = json_decode(file_get_contents($statePath), true);

        $topErrors = array_slice($data['errors'] ?? [], 0, 5);

        $prompt = "Analyze these recurring production errors and suggest precise CI4 code patches:\n\n";

        foreach ($topErrors as $error => $count) {
            $prompt .= "{$count} occurrences: {$error}\n";
        }

        $client = new OpenAIClient();
        $response = $client->chat([
            'model' => getenv('OPENAI_MODEL') ?: 'gpt-4o',
            'messages' => [['role' => 'user', 'content' => $prompt]]
        ]);

        $suggestions = $response['ok']
            ? ($response['data']['choices'][0]['message']['content'] ?? '')
            : 'ERROR: ' . ($response['error'] ?? 'unknown');

        file_put_contents(
            WRITEPATH . 'audit/observability_suggestions.md',
            $suggestions
        );

        CLI::write('Suggestions generated.');
    }
}
