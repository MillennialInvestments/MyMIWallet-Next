<?php

namespace App\Commands\AIOps;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use App\Libraries\AuditState;
use App\Libraries\OpenAIClient;
use App\Libraries\SeverityParser;

class ContinueAudit extends SafeBaseCommand
{
    protected $group = 'AIOps - Audit';
    protected $name = 'aiops:continue';
    protected $description = 'Operational audit (server + runtime focus)';

    public function run(array $params)
    {
        $state = new AuditState();
        $data  = $state->get();

        $files = file(ROOTPATH . 'repo_filtered.txt', FILE_IGNORE_NEW_LINES);

        $batch = (int)($params[0] ?? 3);

        $client = new OpenAIClient();
        $parser = new SeverityParser();

        $processed = 0;

        while ($processed < $batch && $data['current_index'] < $data['total_files']) {

            $file = $files[$data['current_index']];
            CLI::write("AiOps Auditing: {$file}");

            $content = file_get_contents($file);

            $prompt = "
You are an infrastructure reliability engineer auditing a production CI4 financial platform.

Focus on:
- Runtime risks
- Logging gaps
- Error visibility
- Memory leaks
- Blocking IO
- Missing rate limiting
- Missing retries
- Queue opportunities
- Server log correlation
- Observability gaps

Respond with:
- Operational Risk
- Severity
- Monitoring Recommendation
- Mitigation Strategy

File:
{$content}
";

            $payload = [
                'model' => env('OPENAI_MODEL') ?: 'gpt-4o',
                'messages' => [
                    ['role' => 'user', 'content' => $prompt]
                ]
            ];

            $resp = $client->chat($payload);

            $text = $resp['ok']
                ? ($resp['data']['choices'][0]['message']['content'] ?? '')
                : 'ERROR: ' . ($resp['error'] ?? 'unknown');

            file_put_contents(
                WRITEPATH . 'audit/aiops_report.md',
                "\n\n# {$file}\n\n{$text}",
                FILE_APPEND
            );

            $data['current_index']++;
            $state->save($data);

            $processed++;
        }

        CLI::write("AiOps batch complete.");
    }
}
