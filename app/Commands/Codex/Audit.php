<?php

namespace App\Commands\Codex;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class Audit extends BaseCommand
{
    protected $group       = 'Codex';
    protected $name        = 'codex:audit';
    protected $description = 'Full repository audit via OpenAI';

    public function run(array $params)
    {
        $fileList = ROOTPATH . 'repo_filtered.txt';

        if (!file_exists($fileList)) {
            CLI::error('repo_filtered.txt not found. Run php spark codex:index first.');
            return;
        }

        $files = file($fileList, FILE_IGNORE_NEW_LINES);

        foreach ($files as $file) {

            CLI::write("Auditing: {$file}");

            $content = file_get_contents($file);

            $response = $this->callOpenAI($content);

            file_put_contents(
                WRITEPATH . 'codex_audit_report.md',
                "\n\n# {$file}\n\n{$response}",
                FILE_APPEND
            );
        }

        CLI::write('REPOSITORY AUDIT COMPLETE');
    }

    private function callOpenAI(string $fileContent): string
    {
        $prompt = "
You are auditing a production CI4 application.

Your goals:
1. Detect inefficient queries.
2. Recommend database indexing.
3. Identify N+1 problems.
4. Detect unnecessary service instantiations.
5. Analyze autoload usage.
6. Review caching strategy.
7. Suggest Redis integration if beneficial.
8. Optimize page load performance.
9. Detect heavy synchronous operations.
10. Recommend queue/offloading opportunities.
11. Improve memory usage.
12. Reduce file includes.
13. Suggest PHP opcache improvements.
14. Analyze middleware/filters overhead.
15. Confirm proper dependency injection patterns.
16. Ensure production-ready logging configuration.
17. Detect security risks (XSS, CSRF, SQLi).
18. Recommend CI4 best practices.
19. Confirm model validation correctness.
20. Confirm controller return type consistency.

Respond with:
- Issues
- Severity
- Suggested Fix
- Performance Impact Estimate

File:
" . $fileContent;

        $payload = [
            'model' => 'gpt-4o',
            'messages' => [
                ['role' => 'user', 'content' => $prompt]
            ]
        ];

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
