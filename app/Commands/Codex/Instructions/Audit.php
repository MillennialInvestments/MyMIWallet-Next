<?php

namespace App\Commands\Codex\Instructions;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class Audit extends BaseCommand
{
    protected $group       = 'Codex';
    protected $name        = 'codex:instruct:audit';
    protected $description = 'Batch review repository files via OpenAI API';

    public function run(array $params)
    {
        $path = ROOTPATH . 'repo_filtered.txt';

        if (!file_exists($path)) {
            CLI::error('repo_filtered.txt not found');
            return;
        }

        $files = file($path, FILE_IGNORE_NEW_LINES);

        foreach ($files as $file) {
            CLI::write("Reviewing: {$file}");

            $content = file_get_contents($file);

            $payload = [
                'model' => 'gpt-4o',
                'messages' => [
                    ['role' => 'system', 'content' => 'You are a senior CI4 performance engineer.'],
                    ['role' => 'user', 'content' => 'Review this file for performance, optimization, and security. Respond only with actionable improvements.'],
                    ['role' => 'user', 'content' => $content],
                ],
            ];

            $response = $this->callOpenAI($payload);

            file_put_contents(
                WRITEPATH . 'codex_review_output.md',
                "\n\n# {$file}\n\n" . $response,
                FILE_APPEND
            );
        }

        CLI::write('Review complete.');
    }

    private function callOpenAI(array $payload): string
    {
        $ch = curl_init('https://api.openai.com/v1/chat/completions');

        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Authorization: Bearer ' . getenv('OPENAI_API_KEY')
            ],
            CURLOPT_POSTFIELDS => json_encode($payload)
        ]);

        $result = curl_exec($ch);
        curl_close($ch);

        $decoded = json_decode($result, true);

        return $decoded['choices'][0]['message']['content'] ?? 'No response';
    }
}
