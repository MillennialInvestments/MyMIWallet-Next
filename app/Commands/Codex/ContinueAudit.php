<?php

namespace App\Commands\Codex;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;
use App\Libraries\{AuditState, CostTracker, OpenAIClient, SeverityParser};

class ContinueAudit extends SafeBaseCommand
{
    protected $group = 'Codex';
    protected $name = 'codex:continue';
    protected $description = 'Continue audit in batches (default 5 files) with OpenAI + severity tracking';

    public function run(array $params)
    {
        $state = new AuditState();
        $data  = $state->get();

        $fileListPath = ROOTPATH . 'repo_filtered.txt';
        if (!file_exists($fileListPath)) {
            CLI::error('repo_filtered.txt not found. Run: php spark codex:index');
            return;
        }

        $files = file($fileListPath, FILE_IGNORE_NEW_LINES);
        $total = count($files);

        if ($total === 0) {
            CLI::error('repo_filtered.txt is empty.');
            return;
        }

        // Ensure state has totals
        if (empty($data['total_files'])) {
            $data['total_files'] = $total;
        }

        $batch = (int)($params[0] ?? (config('Codex')->batchSize ?? 5));
        if ($batch < 1) $batch = 1;

        if (($data['current_index'] ?? 0) >= $data['total_files']) {
            CLI::write('REPOSITORY AUDIT COMPLETE');
            $data['status'] = 'complete';
            $state->save($data);
            return;
        }

        $data['status'] = 'in_progress';
        $state->save($data);

        $client  = new OpenAIClient();
        $parser  = new SeverityParser();

        $model = env('OPENAI_MODEL') ?: (config('Codex')->model ?? 'gpt-4o');
        $maxBytes = (int)(config('Codex')->maxFileBytes ?? 350000);

        $reportMd   = WRITEPATH . (config('Codex')->reportPath ?? 'audit/report.md');
        $reportJson = WRITEPATH . (config('Codex')->jsonlPath ?? 'audit/report.jsonl');

        $processed = 0;

        while ($processed < $batch && ($data['current_index'] < $data['total_files'])) {
            $file = $files[$data['current_index']] ?? null;
            if (!$file || !is_file($file)) {
                $data['current_index']++;
                $state->save($data);
                continue;
            }

            CLI::write("Auditing: {$file}");

            $content = file_get_contents($file);
            if ($content === false) $content = '';

            // Hard cap (avoid giant files)
            if (strlen($content) > $maxBytes) {
                $content = substr($content, 0, $maxBytes) . "\n\n/* TRUNCATED: file exceeded max bytes */\n";
            }

            $prompt = $this->buildPrompt($file, $content);

            $payload = [
                'model' => $model,
                'max_tokens' => config('Codex')->maxTokens,
                'messages' => [
                    ['role' => 'user', 'content' => $prompt],
                ],
            ];

            // Rate limiting (0.5 second pause)
            usleep(500000);

            $resp = $client->chat($payload);

            if (!$resp['ok']) {
                $err = $resp['error'] ?? 'unknown_error';

                // Record failure but keep moving
                $out = "ERROR: {$err}";
                $severity = 'UNKNOWN';

                $this->appendReports($reportMd, $reportJson, $file, $severity, $out, $err);

                $data['last_file'] = $file;
                $data['completed'][] = $file;
                $data['current_index']++;

                $state->save($data);

                CLI::error("OpenAI error: {$err}");
                $processed++;
                continue;
            }

            $text = $resp['data']['choices'][0]['message']['content'] ?? '';

            // Token usage logging
            $usage = $resp['data']['usage'] ?? [];
            $tracker = new CostTracker();
            $tracker->log($usage, $model);

            $severity = $parser->classify($text);

            // Update counters
            if (!isset($data['high_issues'])) $data['high_issues'] = 0;
            if (!isset($data['medium_issues'])) $data['medium_issues'] = 0;
            if (!isset($data['low_issues'])) $data['low_issues'] = 0;
            if (!isset($data['unknown_issues'])) $data['unknown_issues'] = 0;

            if ($severity === 'HIGH') $data['high_issues']++;
            elseif ($severity === 'MEDIUM') $data['medium_issues']++;
            elseif ($severity === 'LOW') $data['low_issues']++;
            else $data['unknown_issues']++;

            $this->appendReports($reportMd, $reportJson, $file, $severity, $text, null);

            $data['last_file'] = $file;
            $data['completed'][] = $file;
            $data['current_index']++;

            $state->save($data);

            $processed++;
            CLI::write("Severity: {$severity}");
            CLI::write('Progress: ' . $data['current_index'] . '/' . $data['total_files']);
        }

        if ($data['current_index'] >= $data['total_files']) {
            CLI::write('REPOSITORY AUDIT COMPLETE');
            $data['status'] = 'complete';
            $state->save($data);
        }
    }

    private function buildPrompt(string $filePath, string $fileContent): string
    {
        return
"You are auditing a production CI4 application.

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

When complete with this file respond with:
- Issues
- Severity (Low/Medium/High)
- Suggested Code Fix
- Performance Impact Estimate

File path: {$filePath}

FILE CONTENT START
{$fileContent}
FILE CONTENT END
";
    }

    private function appendReports(string $mdPath, string $jsonlPath, string $file, string $severity, string $text, ?string $error): void
    {
        @is_dir(dirname($mdPath)) || @mkdir(dirname($mdPath), 0775, true);
        @is_dir(dirname($jsonlPath)) || @mkdir(dirname($jsonlPath), 0775, true);

        $md = "\n\n# {$file}\n\n**Severity:** {$severity}\n\n{$text}\n";
        file_put_contents($mdPath, $md, FILE_APPEND | LOCK_EX);

        $row = [
            'ts' => date('c'),
            'file' => $file,
            'severity' => $severity,
            'error' => $error,
            'content' => $text,
        ];
        file_put_contents($jsonlPath, json_encode($row) . "\n", FILE_APPEND | LOCK_EX);
    }
}
