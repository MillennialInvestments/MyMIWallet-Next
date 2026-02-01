<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\ChatArchiveModel;
use App\Models\ChatStepModel;

class ChatGovernanceIndexer
{
    /**
     * @return array<string, mixed>
     */
    public function index(string $basePath, ?int $limit = null): array
    {
        $basePath = rtrim($basePath, '/');
        $files = $this->collectFiles($basePath, $limit);
        $records = [];

        $metrics = $this->initializeMetrics();

        foreach ($files as $file) {
            $content = file_get_contents($file);
            if ($content === false) {
                $content = '';
            }

            $record = $this->buildRecord($file, $basePath, $content);
            $records[] = $record;
            $metrics = $this->accumulateMetrics($metrics, $record);
        }

        $metrics['timestamp'] = gmdate('c');

        return [
            'records' => $records,
            'metrics' => $metrics,
            'summary' => $metrics['totals'],
        ];
    }

    /**
     * @param array<int, array<string, mixed>> $records
     */
    public function writeCsv(array $records, string $path): bool
    {
        $dir = dirname($path);
        if (! $this->ensureDir($dir)) {
            return false;
        }

        $tempPath = $path . '.tmp';
        $handle = fopen($tempPath, 'wb');
        if ($handle === false) {
            return false;
        }

        $headers = [
            'chat_file',
            'project',
            'step_1a',
            'step_2a',
            'step_2b',
            'step_3',
            'step_4',
            'step_5',
            'step_6',
            'step_7',
            'overall_status',
            'next_required_step',
            'last_updated',
        ];
        fputcsv($handle, $headers);

        foreach ($records as $record) {
            $steps = $record['steps'] ?? [];
            $row = [
                $record['chat_file'] ?? '',
                $record['project'] ?? '',
                $steps['step_1a']['status'] ?? 'unknown',
                $steps['step_2a']['status'] ?? 'unknown',
                $steps['step_2b']['status'] ?? 'unknown',
                $steps['step_3']['status'] ?? 'unknown',
                $steps['step_4']['status'] ?? 'unknown',
                $steps['step_5']['status'] ?? 'unknown',
                $steps['step_6']['status'] ?? 'unknown',
                $steps['step_7']['status'] ?? 'unknown',
                $record['overall_status'] ?? 'unknown',
                $record['next_required_step'] ?? '',
                $record['last_updated'] ?? '',
            ];
            fputcsv($handle, $row);
        }

        fclose($handle);

        return $this->moveTempFile($tempPath, $path);
    }

    /**
     * @param array<string, mixed> $metrics
     */
    public function writeMetrics(array $metrics, string $path): bool
    {
        $dir = dirname($path);
        if (! $this->ensureDir($dir)) {
            return false;
        }

        $tempPath = $path . '.tmp';
        $payload = json_encode($metrics, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        if ($payload === false) {
            return false;
        }

        if (file_put_contents($tempPath, $payload . PHP_EOL) === false) {
            return false;
        }

        return $this->moveTempFile($tempPath, $path);
    }

    /**
     * @param array<int, array<string, mixed>> $records
     */
    public function syncDatabase(array $records): bool
    {
        $archiveModel = new ChatArchiveModel();
        $stepModel = new ChatStepModel();
        $now = date('Y-m-d H:i:s');

        foreach ($records as $record) {
            $archiveId = $archiveModel->upsertArchive($record);
            $steps = $record['steps'] ?? [];

            foreach ($steps as $stepName => $step) {
                $stepModel->upsertStep($archiveId, [
                    'step' => $stepName,
                    'status' => $step['status'] ?? 'unknown',
                    'detected_at' => $now,
                    'notes' => $step['notes'] ?? null,
                ]);
            }
        }

        return true;
    }

    /**
     * @return array<int, string>
     */
    private function collectFiles(string $basePath, ?int $limit): array
    {
        if (! is_dir($basePath)) {
            return [];
        }

        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($basePath, \RecursiveDirectoryIterator::SKIP_DOTS)
        );

        $files = [];
        foreach ($iterator as $fileInfo) {
            if (! $fileInfo->isFile()) {
                continue;
            }

            if (strtolower($fileInfo->getExtension()) !== 'md') {
                continue;
            }

            $files[] = $fileInfo->getPathname();
            if ($limit !== null && count($files) >= $limit) {
                break;
            }
        }

        sort($files);

        return $files;
    }

    /**
     * @return array<string, mixed>
     */
    private function buildRecord(string $file, string $basePath, string $content): array
    {
        $relativeFile = $this->relativePath($file);
        $relativeToBase = $this->relativeToBase($file, $basePath);
        $project = $this->extractProject($relativeToBase);
        $chatDate = $this->extractChatDate($file);
        $title = $this->extractTitle($file);
        $lastUpdated = $this->formatTimestamp(@filemtime($file));

        $steps = $this->detectSteps($content);
        $statusInfo = $this->computeOverallStatus($steps);

        return [
            'chat_file' => $relativeFile,
            'project' => $project,
            'chat_date' => $chatDate,
            'title' => $title,
            'steps' => $steps,
            'overall_status' => $statusInfo['overall_status'],
            'next_required_step' => $statusInfo['next_required_step'],
            'blocked_reason' => $statusInfo['blocked_reason'],
            'last_updated' => $lastUpdated,
        ];
    }

    /**
     * @return array<string, array{status: string, notes: string|null, required: bool}>
     */
    private function detectSteps(string $content): array
    {
        $steps = [];

        $steps['step_1a'] = [
            'status' => 'complete',
            'notes' => 'Archive present.',
            'required' => true,
        ];

        $step2aEvidence = $this->hasPattern($content, '/\b(step\s*2a|aiops verification|verification\s*&\s*planning)\b/i');
        $steps['step_2a'] = [
            'status' => $step2aEvidence ? 'complete' : 'missing',
            'notes' => $step2aEvidence ? 'Verification detected.' : null,
            'required' => true,
        ];

        $step2bEvidence = $this->hasPattern($content, '/\b(step\s*2b|aiops execution)\b/i');
        $step2bApproval = $this->hasPattern($content, '/\bAIOPS EXECUTION REQUEST\b/i');
        $step2bComplete = $step2bEvidence && $step2bApproval;
        $steps['step_2b'] = [
            'status' => $step2bComplete ? 'complete' : 'missing',
            'notes' => $step2bComplete ? 'Execution approval detected.' : null,
            'required' => $step2bEvidence || $step2bApproval,
        ];

        $step3Evidence = $this->hasPattern($content, '/\b(step\s*3|codex handoff request|codex execution)\b/i');
        $step3Implied = $this->hasPattern($content, '/\b(files changed|files modified|changed files|updated files|patch|diff)\b/i');
        $steps['step_3'] = [
            'status' => $step3Evidence ? 'complete' : 'missing',
            'notes' => $step3Evidence ? 'Codex handoff detected.' : null,
            'required' => $step3Evidence || $step3Implied,
        ];

        $migrationsNotNeeded = $this->hasPattern($content, '/migrations needed:\s*no/i');
        $databaseImpact = $this->hasPattern($content, '/database impact/i');
        $dbArtifacts = $this->hasPattern($content, '/\b(table|tables|migration|migrations)\b/i');
        $step4Complete = $databaseImpact && $dbArtifacts;

        $step4Status = 'missing';
        $step4Notes = null;
        if ($migrationsNotNeeded) {
            $step4Status = 'not_required';
            $step4Notes = 'Migrations explicitly not required.';
        } elseif ($step4Complete) {
            $step4Status = 'complete';
            $step4Notes = 'Database impact detected.';
        }

        $steps['step_4'] = [
            'status' => $step4Status,
            'notes' => $step4Notes,
            'required' => ($databaseImpact || $dbArtifacts) && ! $migrationsNotNeeded,
        ];

        $step5Evidence = $this->hasPattern($content, '/\b(manual requirements|human-required)\b/i');
        $steps['step_5'] = [
            'status' => $step5Evidence ? 'complete' : 'missing',
            'notes' => $step5Evidence ? 'Manual requirements section detected.' : null,
            'required' => $step5Evidence,
        ];

        $validationEvidence = $this->hasPattern($content, '/validation status/i');
        $validationPassed = $validationEvidence && $this->hasPattern($content, '/\bpassed\b/i');
        $validationFailed = $validationEvidence && $this->hasPattern($content, '/\bfailed\b/i');
        $step6Status = 'missing';
        $step6Notes = null;
        if ($validationFailed) {
            $step6Status = 'failed';
            $step6Notes = 'Validation reported failed.';
        } elseif ($validationPassed) {
            $step6Status = 'complete';
            $step6Notes = 'Validation reported passed.';
        } elseif ($validationEvidence) {
            $step6Status = 'unknown';
            $step6Notes = 'Validation status noted without pass/fail.';
        }

        $steps['step_6'] = [
            'status' => $step6Status,
            'notes' => $step6Notes,
            'required' => true,
        ];

        $step7Evidence = $this->hasPattern($content, '/\b(rollback|recovery|rollback triggered)\b/i');
        $steps['step_7'] = [
            'status' => $step7Evidence ? 'complete' : 'missing',
            'notes' => $step7Evidence ? 'Rollback or recovery referenced.' : null,
            'required' => $step7Evidence,
        ];

        return $steps;
    }

    /**
     * @param array<string, array{status: string, notes: string|null, required: bool}> $steps
     * @return array<string, string|null>
     */
    private function computeOverallStatus(array $steps): array
    {
        $requiredOrder = ['step_2a', 'step_2b', 'step_3', 'step_4', 'step_5', 'step_6', 'step_7'];
        $missingRequired = [];

        if (($steps['step_6']['status'] ?? 'missing') === 'failed') {
            return [
                'overall_status' => 'blocked',
                'next_required_step' => 'step_6',
                'blocked_reason' => 'failed_6',
            ];
        }

        foreach ($requiredOrder as $stepName) {
            $step = $steps[$stepName] ?? null;
            if (! $step) {
                continue;
            }

            if (! $step['required']) {
                continue;
            }

            if (in_array($step['status'], ['missing', 'unknown'], true)) {
                $missingRequired[] = $stepName;
            }
        }

        if (! empty($missingRequired)) {
            $firstMissing = $missingRequired[0];
            return [
                'overall_status' => 'blocked',
                'next_required_step' => $firstMissing,
                'blocked_reason' => 'missing_' . $firstMissing,
            ];
        }

        $optionalMissing = false;
        foreach ($steps as $stepName => $step) {
            if ($step['required']) {
                continue;
            }

            if (in_array($step['status'], ['missing', 'unknown'], true)) {
                $optionalMissing = true;
                break;
            }
        }

        if ($optionalMissing) {
            return [
                'overall_status' => 'in_progress',
                'next_required_step' => null,
                'blocked_reason' => '',
            ];
        }

        return [
            'overall_status' => 'complete',
            'next_required_step' => null,
            'blocked_reason' => '',
        ];
    }

    /**
     * @return array<string, mixed>
     */
    private function initializeMetrics(): array
    {
        $steps = [];
        foreach (['step_1a', 'step_2a', 'step_2b', 'step_3', 'step_4', 'step_5', 'step_6', 'step_7'] as $step) {
            $steps[$step] = [
                'complete' => 0,
                'missing' => 0,
                'blocked' => 0,
                'not_required' => 0,
                'failed' => 0,
                'unknown' => 0,
            ];
        }

        return [
            'totals' => [
                'total_chats' => 0,
                'complete' => 0,
                'in_progress' => 0,
                'blocked' => 0,
            ],
            'steps' => $steps,
            'blocked_reasons' => [],
            'timestamp' => null,
        ];
    }

    /**
     * @param array<string, mixed> $metrics
     * @param array<string, mixed> $record
     * @return array<string, mixed>
     */
    private function accumulateMetrics(array $metrics, array $record): array
    {
        $metrics['totals']['total_chats']++;
        $overall = $record['overall_status'] ?? 'unknown';
        if (isset($metrics['totals'][$overall])) {
            $metrics['totals'][$overall]++;
        }

        $steps = $record['steps'] ?? [];
        foreach ($steps as $stepName => $step) {
            $status = $step['status'] ?? 'unknown';
            if (! isset($metrics['steps'][$stepName][$status])) {
                $metrics['steps'][$stepName][$status] = 0;
            }
            $metrics['steps'][$stepName][$status]++;
        }

        if ($overall === 'blocked') {
            $reason = $record['blocked_reason'] ?? 'unknown';
            if ($reason === '') {
                $reason = 'unknown';
            }
            if (! isset($metrics['blocked_reasons'][$reason])) {
                $metrics['blocked_reasons'][$reason] = 0;
            }
            $metrics['blocked_reasons'][$reason]++;
        }

        return $metrics;
    }

    private function ensureDir(string $dir): bool
    {
        if (is_dir($dir)) {
            return true;
        }

        return mkdir($dir, 0755, true);
    }

    private function moveTempFile(string $tempPath, string $finalPath): bool
    {
        if (file_exists($finalPath)) {
            @unlink($finalPath);
        }

        return rename($tempPath, $finalPath);
    }

    private function hasPattern(string $content, string $pattern): bool
    {
        return preg_match($pattern, $content) === 1;
    }

    private function relativePath(string $path): string
    {
        $root = rtrim(str_replace('\\', '/', ROOTPATH), '/');
        $normalized = str_replace('\\', '/', $path);
        if (str_starts_with($normalized, $root)) {
            return ltrim(substr($normalized, strlen($root)), '/');
        }

        return $normalized;
    }

    private function relativeToBase(string $path, string $basePath): string
    {
        $normalizedBase = rtrim(str_replace('\\', '/', $basePath), '/');
        $normalized = str_replace('\\', '/', $path);
        if (str_starts_with($normalized, $normalizedBase)) {
            return ltrim(substr($normalized, strlen($normalizedBase)), '/');
        }

        return $normalized;
    }

    private function extractProject(string $relativePath): string
    {
        $parts = array_values(array_filter(explode('/', $relativePath)));
        if (count($parts) > 1) {
            return (string) $parts[0];
        }

        return 'default';
    }

    private function extractChatDate(string $file): ?string
    {
        $fileName = basename($file);
        if (preg_match('/(\d{4})[-_](\d{2})[-_](\d{2})/', $fileName, $matches) === 1) {
            return sprintf('%s-%s-%s', $matches[1], $matches[2], $matches[3]);
        }

        return null;
    }

    private function extractTitle(string $file): string
    {
        $base = pathinfo($file, PATHINFO_FILENAME);
        $base = preg_replace('/^\d{4}[-_]\d{2}[-_]\d{2}[-_]?/', '', $base);
        $base = $base === null ? '' : $base;
        return trim($base, '-_ ') ?: pathinfo($file, PATHINFO_FILENAME);
    }

    private function formatTimestamp($timestamp): ?string
    {
        if (! is_int($timestamp)) {
            return null;
        }

        return gmdate('Y-m-d H:i:s', $timestamp);
    }
}
