<?php

namespace App\Services\Observability;

use Config\Database;
use App\Models\ErrorPatternModel;
use App\Models\ErrorLearningRunModel;

class ErrorPatternLearnerService
{
    public function run(int $limit = 50): array
    {
        $runUuid = bin2hex(random_bytes(16));
        $provider = strtolower((string) env('OBS_LEARNER_PROVIDER', 'off'));

        $runModel = new ErrorLearningRunModel();
        $patternModel = new ErrorPatternModel();
        $db = Database::connect();

        $now = date('Y-m-d H:i:s');

        $runModel->insert([
            'run_uuid' => $runUuid,
            'provider' => $provider,
            'started_at' => $now,
            'processed' => 0, 'created' => 0, 'updated' => 0, 'skipped' => 0, 'errors' => 0,
        ]);
        $runId = (int) $runModel->getInsertID();

        // Take newest consolidated items (you already have fingerprint/category/error_type)
        // If you add a "pattern_id" later to consolidated table, we can exclude already-learned.
        $consolidated = $db->query("
            SELECT id, fingerprint, category, error_type, message_sample, occurrence_count, last_seen, created_at
            FROM bf_error_consolidated_logs
            ORDER BY last_seen DESC
            LIMIT {$limit}
        ")->getResultArray();

        $stats = ['run_uuid' => $runUuid, 'provider' => $provider, 'processed' => 0, 'created' => 0, 'updated' => 0, 'skipped' => 0, 'errors' => 0];

        foreach ($consolidated as $row) {
            $stats['processed']++;

            $fingerprint = (string)($row['fingerprint'] ?? '');
            if ($fingerprint === '') {
                $stats['skipped']++;
                continue;
            }

            $payload = [
                'fingerprint' => $fingerprint,
                'category' => $row['category'] ?? null,
                'error_type' => $row['error_type'] ?? null,
                'example_message' => $row['message_sample'] ?? null,
                'occurrence_count' => (int)($row['occurrence_count'] ?? 0),
                'first_seen' => $row['created_at'] ?? null,
                'last_seen' => $row['last_seen'] ?? null,
            ];

            // Deterministic baseline classification
            $baseline = $this->baselineInference((string)($row['message_sample'] ?? ''), (string)($row['category'] ?? ''), (string)($row['error_type'] ?? ''));

            $data = array_merge($payload, $baseline);

            // AI enrichment (optional)
            if ($provider !== 'off') {
                try {
                    $ai = $this->aiEnrich($provider, $row);
                    if (is_array($ai) && $ai !== []) {
                        $data = array_merge($data, $ai);
                    }
                } catch (\Throwable $e) {
                    $stats['errors']++;
                    $data['summary'] = ($data['summary'] ?? '') . ' | AI enrichment failed: ' . $e->getMessage();
                }
            }

            $existing = $patternModel->where('fingerprint', $fingerprint)->first();
            $patternId = $patternModel->upsertByFingerprint($fingerprint, $data);

            if ($existing) $stats['updated']++;
            else $stats['created']++;
        }

        $runModel->update($runId, [
            'finished_at' => date('Y-m-d H:i:s'),
            'processed' => $stats['processed'],
            'created' => $stats['created'],
            'updated' => $stats['updated'],
            'skipped' => $stats['skipped'],
            'errors' => $stats['errors'],
        ]);

        return $stats;
    }

    private function baselineInference(string $msg, string $category, string $type): array
    {
        $m = strtolower($msg);

        $severity = 'MEDIUM';
        if (str_contains($m, 'fatal') || str_contains($m, 'uncaught') || str_contains($m, 'allowed memory size')) $severity = 'CRITICAL';
        else if (str_contains($m, 'error') || str_contains($m, 'exception')) $severity = 'HIGH';
        else if (str_contains($m, 'warning') || str_contains($m, 'deprecated')) $severity = 'LOW';

        $title = $type !== '' ? $type : 'Error Pattern';
        if ($category !== '') $title = $category . ' - ' . $title;

        $root = null;
        $fix = null;

        if (str_contains($m, 'deprecated') && str_contains($m, 'dynamic property')) {
            $root = 'PHP 8.2+ deprecated dynamic property creation (missing typed property declaration).';
            $fix = 'Declare the property explicitly in the class (e.g., public string $appOverridesFolder) or migrate config usage to supported keys.';
        }

        return [
            'severity' => $severity,
            'title' => $title,
            'likely_root_cause' => $root,
            'suggested_fix' => $fix,
            'tags' => json_encode(array_values(array_filter([
                $category ?: null,
                $type ?: null,
                str_contains($m, 'deprecated') ? 'php82' : null,
                str_contains($m, 'database') ? 'db' : null,
            ]))),
        ];
    }

    private function aiEnrich(string $provider, array $row): array
    {
        // You likely already have an Ollama subsystem. This keeps it light:
        // We only send minimal structured data (no huge traces).
        $prompt = $this->buildPrompt($row);

        if ($provider === 'ollama') {
            return $this->ollamaGenerate($prompt);
        }

        if ($provider === 'openai') {
            return $this->openaiGenerate($prompt);
        }

        return [];
    }

    private function buildPrompt(array $row): string
    {
        $fingerprint = (string)($row['fingerprint'] ?? '');
        $category = (string)($row['category'] ?? '');
        $type = (string)($row['error_type'] ?? '');
        $msg = (string)($row['message_sample'] ?? '');

        return "You are an expert CI4/PHP observability assistant.\n".
            "Given this consolidated error signature, output strict JSON with keys:\n".
            "severity (LOW|MEDIUM|HIGH|CRITICAL), title, summary, likely_root_cause, suggested_fix,\n".
            "controllers (array), services (array), tags (array).\n\n".
            "fingerprint: {$fingerprint}\ncategory: {$category}\nerror_type: {$type}\nmessage_sample: {$msg}\n";
    }

    private function ollamaGenerate(string $prompt): array
    {
        $url = rtrim((string) env('OBS_OLLAMA_URL', 'http://127.0.0.1:11434'), '/');
        $model = (string) env('OBS_OLLAMA_MODEL', 'llama3.1');

        $payload = json_encode([
            'model' => $model,
            'prompt' => $prompt,
            'stream' => false,
        ]);

        $ch = curl_init($url . '/api/generate');
        curl_setopt_array($ch, [
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
            CURLOPT_POSTFIELDS => $payload,
            CURLOPT_TIMEOUT => 20,
        ]);

        $resp = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);

        if (!$resp) {
            throw new \RuntimeException('Ollama request failed: ' . $err);
        }

        $decoded = json_decode($resp, true);
        $text = (string)($decoded['response'] ?? '');

        return $this->extractJson($text);
    }

    private function openaiGenerate(string $prompt): array
    {
        // Stub: wire to your existing OpenAI client if/when you enable it.
        // Keeping placeholder to avoid breaking. Return [] for now.
        return [];
    }

    private function extractJson(string $text): array
    {
        // Attempt to locate JSON block
        $start = strpos($text, '{');
        $end = strrpos($text, '}');
        if ($start === false || $end === false || $end <= $start) return [];

        $json = substr($text, $start, $end - $start + 1);
        $arr = json_decode($json, true);
        if (!is_array($arr)) return [];

        // normalize fields
        foreach (['controllers','services','tags'] as $k) {
            if (isset($arr[$k]) && is_array($arr[$k])) $arr[$k] = json_encode($arr[$k]);
        }
        return $arr;
    }
}