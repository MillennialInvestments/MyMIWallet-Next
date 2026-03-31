<?php

declare(strict_types=1);

namespace App\Services\Spark;

use DateTimeImmutable;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use RuntimeException;

class AiopsDocsExecutionService
{
    private string $docsDir;
    private string $stateFile;
    private string $inventoryFile;
    private string $logFile;
    private string $finalReportFile;
    private string $patchesDir;

    public function __construct()
    {
        $this->docsDir = rtrim(ROOTPATH, '/\\') . '/docs/_aiops';
        $this->stateFile = $this->docsDir . '/_execution_state.json';
        $this->inventoryFile = $this->docsDir . '/_inventory.json';
        $this->logFile = $this->docsDir . '/_execution_log.md';
        $this->finalReportFile = $this->docsDir . '/_final_report.md';
        $this->patchesDir = $this->docsDir . '/patches';
    }

    /**
     * @param array{resume?:bool,file?:string,dry_run?:bool,force?:bool} $options
     * @return array<string,mixed>
     */
    public function run(array $options = []): array
    {
        $resume = (bool) ($options['resume'] ?? false);
        $dryRun = (bool) ($options['dry_run'] ?? false);
        $force = (bool) ($options['force'] ?? false);
        $singleFile = isset($options['file']) ? (string) $options['file'] : null;

        $this->ensureDirectories();

        $inventory = $this->buildInventory();
        $state = $resume ? $this->loadOrInitializeState($inventory['files']) : $this->initializeState($inventory['files']);

        $results = [];
        $errors = [];
        $applied = 0;

        foreach ($inventory['files'] as $filePath) {
            if ($singleFile !== null && basename($filePath) !== $singleFile && $filePath !== $singleFile) {
                continue;
            }

            if (! $force && in_array($filePath, $state['processed_files'], true)) {
                continue;
            }

            $state['status'] = 'in_progress';
            $state['current_file'] = $filePath;
            $state['last_updated'] = $this->now();
            $this->writeJson($this->stateFile, $state);

            try {
                $parsed = $this->parseDocument($filePath);
                $classification = $this->classifyInstructions($parsed['required_changes']);
                $applyResult = $this->applyPatches($filePath, $parsed, $classification, $dryRun);

                if ($applyResult['applied_count'] > 0) {
                    $applied += $applyResult['applied_count'];
                }

                $results[] = [
                    'file' => $filePath,
                    'status' => 'complete',
                    'parsed' => $parsed,
                    'classification' => $classification,
                    'modified_files' => $applyResult['modified_files'],
                    'applied_count' => $applyResult['applied_count'],
                    'dry_run' => $dryRun,
                ];

                $this->appendExecutionLog($filePath, $classification, $applyResult['modified_files'], '✅ Complete', $dryRun, $parsed);

                if (! in_array($filePath, $state['processed_files'], true)) {
                    $state['processed_files'][] = $filePath;
                }
            } catch (\Throwable $e) {
                $error = [
                    'file' => $filePath,
                    'issue' => $e->getMessage(),
                    'action_required' => true,
                ];
                $errors[] = $error;
                $state['errors'][] = $error;

                $this->appendExecutionLog($filePath, [], [], '❌ Error: ' . $e->getMessage(), $dryRun, []);
            }

            $state['last_updated'] = $this->now();
            $this->writeJson($this->stateFile, $state);
        }

        $state['total_files'] = count($inventory['files']);
        $state['current_file'] = null;
        $state['status'] = count($errors) > 0 ? 'complete_with_errors' : 'complete';
        $state['last_updated'] = $this->now();
        $this->writeJson($this->stateFile, $state);

        $this->writeFinalReport($inventory['files'], $results, $errors, $dryRun);

        return [
            'ok' => count($errors) === 0,
            'files_seen' => count($inventory['files']),
            'files_processed' => count($results),
            'errors' => $errors,
            'applied_count' => $applied,
            'dry_run' => $dryRun,
            'state_file' => $this->stateFile,
            'inventory_file' => $this->inventoryFile,
            'log_file' => $this->logFile,
            'final_report_file' => $this->finalReportFile,
        ];
    }

    private function ensureDirectories(): void
    {
        if (! is_dir($this->docsDir)) {
            throw new RuntimeException('docs/_aiops directory not found.');
        }

        if (! is_dir($this->patchesDir) && ! mkdir($this->patchesDir, 0775, true) && ! is_dir($this->patchesDir)) {
            throw new RuntimeException('Unable to create patches directory.');
        }
    }

    /** @return array{files: array<int,string>} */
    private function buildInventory(): array
    {
        $relative = [];
        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($this->docsDir, RecursiveDirectoryIterator::SKIP_DOTS)
        );

        foreach ($iterator as $fileInfo) {
            $file = (string) $fileInfo->getPathname();
            if (strtolower((string) $fileInfo->getExtension()) !== 'md') {
                continue;
            }
            if (str_contains($file, '/patches/')) {
                continue;
            }
            if (basename($file) === '_execution_log.md' || basename($file) === '_final_report.md') {
                continue;
            }
            $relative[] = ltrim(str_replace(rtrim(ROOTPATH, '/\\') . '/', '', $file), '/');
        }

        sort($relative);

        $payload = ['files' => array_values($relative)];
        $this->writeJson($this->inventoryFile, $payload);

        return $payload;
    }

    /** @param array<int,string> $files */
    private function initializeState(array $files): array
    {
        $state = [
            'total_files' => count($files),
            'processed_files' => [],
            'current_file' => null,
            'status' => 'pending',
            'last_updated' => null,
            'errors' => [],
        ];

        $this->writeJson($this->stateFile, $state);

        return $state;
    }

    /** @param array<int,string> $files */
    private function loadOrInitializeState(array $files): array
    {
        if (! is_file($this->stateFile)) {
            return $this->initializeState($files);
        }

        $raw = (string) file_get_contents($this->stateFile);
        $decoded = json_decode($raw, true);
        if (! is_array($decoded)) {
            return $this->initializeState($files);
        }

        $decoded['total_files'] = count($files);
        $decoded['processed_files'] = $decoded['processed_files'] ?? [];
        $decoded['errors'] = $decoded['errors'] ?? [];

        return $decoded;
    }

    /** @return array<string,mixed> */
    private function parseDocument(string $relativePath): array
    {
        $full = rtrim(ROOTPATH, '/\\') . '/' . $relativePath;
        if (! is_file($full)) {
            throw new RuntimeException('Document not found: ' . $relativePath);
        }

        $content = (string) file_get_contents($full);

        return [
            'purpose' => $this->extractSection($content, ['purpose', 'goal', 'mission']),
            'affected_components' => $this->extractSection($content, ['affected components', 'target areas', 'scope']),
            'required_changes' => $this->extractSection($content, ['required changes', 'changes applied', 'tasks', 'active task stack']),
            'config_updates' => $this->extractSection($content, ['config', 'configuration updates']),
            'database_changes' => $this->extractSection($content, ['database changes', 'migration', 'schema']),
            'code_snippets' => $this->extractCodeBlocks($content),
        ];
    }

    /** @param array<int,string> $requiredChanges */
    private function classifyInstructions(array $requiredChanges): array
    {
        $joined = strtolower(implode("\n", $requiredChanges));
        $result = [];
        if (preg_match_all('/##\s*action\s*(?:\n|\r\n)(.*?)(?=\n##|\z)/is', implode("\n", $requiredChanges), $matches)) {
            foreach (($matches[1] ?? []) as $block) {
                $result[] = ['type' => 'Explicit', 'action' => trim((string) $block)];
            }
        }

        foreach (['fix', 'patch', 'add route', 'create command', 'implement', 'normalize', 'repair', 'guard against', 'ensure', 'replace'] as $verb) {
            if (str_contains($joined, $verb)) {
                $result[] = ['type' => 'Inferred', 'action' => 'Candidate action inferred from docs keyword: ' . $verb];
            }
        }

        return $result;
    }

    /**
     * @param array<string,mixed> $parsed
     * @param array<int,array{type:string,action:string}> $classification
     * @return array{modified_files:array<int,string>,applied_count:int}
     */
    private function applyPatches(string $docPath, array $parsed, array $classification, bool $dryRun): array
    {
        $modified = [];
        $appliedCount = 0;

        $instructions = $parsed['code_snippets'];
        if (! is_array($instructions) || $instructions === []) {
            return ['modified_files' => [], 'applied_count' => 0];
        }

        foreach ($instructions as $block) {
            if (! preg_match('/^FILE:\s*([^\n]+)\n/s', $block, $m)) {
                continue;
            }

            $target = trim($m[1]);
            $body = trim((string) preg_replace('/^FILE:\s*([^\n]+)\n/s', '', $block));
            if ($target === '' || $body === '') {
                continue;
            }

            $targetPath = rtrim(ROOTPATH, '/\\') . '/' . ltrim($target, '/');
            if (! str_starts_with(realpath(dirname($targetPath)) ?: dirname($targetPath), rtrim(ROOTPATH, '/\\'))) {
                continue;
            }

            $backupRoot = rtrim(ROOTPATH, '/\\') . '/writable/backups/' . date('Ymd-His');
            if (! $dryRun) {
                if (! is_dir(dirname($targetPath))) {
                    mkdir(dirname($targetPath), 0775, true);
                }

                if (is_file($targetPath)) {
                    if (! is_dir($backupRoot)) {
                        mkdir($backupRoot, 0775, true);
                    }
                    $backupPath = $backupRoot . '/' . ltrim($target, '/');
                    if (! is_dir(dirname($backupPath))) {
                        mkdir(dirname($backupPath), 0775, true);
                    }
                    copy($targetPath, $backupPath);
                }

                file_put_contents($targetPath, $body . "\n");
                $appliedCount++;
            }

            $modified[] = ltrim($target, '/');
            $this->writePatchRecord($docPath, $target, $body, $dryRun, $classification);
        }

        return ['modified_files' => array_values(array_unique($modified)), 'applied_count' => $appliedCount];
    }

    /** @return array<int,string> */
    private function extractSection(string $content, array $needles): array
    {
        $lines = preg_split('/\R/', $content) ?: [];
        $capture = false;
        $collected = [];

        foreach ($lines as $line) {
            $trimmed = trim($line);
            if (str_starts_with($trimmed, '#')) {
                $header = strtolower(trim($trimmed, "# \t"));
                $capture = false;
                foreach ($needles as $needle) {
                    if (str_contains($header, strtolower($needle))) {
                        $capture = true;
                        break;
                    }
                }
                continue;
            }

            if ($capture && $trimmed !== '') {
                $collected[] = $trimmed;
            }
        }

        return $collected;
    }

    /** @return array<int,string> */
    private function extractCodeBlocks(string $content): array
    {
        preg_match_all('/```(?:[a-zA-Z0-9_-]+)?\n(.*?)```/s', $content, $matches);
        if (! isset($matches[1]) || ! is_array($matches[1])) {
            return [];
        }

        return array_map(static fn (string $v): string => trim($v), $matches[1]);
    }

    /**
     * @param array<int,array{type:string,action:string}> $classification
     * @param array<int,string> $files
     */
    private function appendExecutionLog(string $docPath, array $classification, array $files, string $status, bool $dryRun, array $parsed): void
    {
        $explicit = array_values(array_filter($classification, static fn(array $line): bool => ($line['type'] ?? '') === 'Explicit'));
        $inferred = array_values(array_filter($classification, static fn(array $line): bool => ($line['type'] ?? '') === 'Inferred'));

        $content = "\n## Processed: " . basename($docPath) . "\n\n";
        $content .= '- explicit actions found: ' . count($explicit) . "\n";
        $content .= '- inferred actions found: ' . count($inferred) . "\n";
        $content .= '- actions skipped: ' . (($classification === []) ? 1 : 0) . "\n";
        $content .= '- files modified: ' . count($files) . "\n";

        if ($dryRun) {
            $content .= "- Dry-run mode active (no filesystem writes applied).\n";
        }

        if ($classification === []) {
            $content .= "- reasons no changes were made: no explicit or inferred action extracted from required changes section.\n";
        }

        if (($parsed['required_changes'] ?? []) === []) {
            $content .= "- reasons no changes were made: required changes section not present in document.\n";
        }

        $content .= "\n### Status\n" . $status . "\n";

        file_put_contents($this->logFile, $content, FILE_APPEND);
    }

    /** @param array<int,array<string,mixed>> $results @param array<int,array<string,mixed>> $errors @param array<int,string> $files */
    private function writeFinalReport(array $files, array $results, array $errors, bool $dryRun): void
    {
        $explicit = 0;
        $inferred = 0;
        $modified = 0;

        foreach ($results as $result) {
            foreach (($result['classification'] ?? []) as $action) {
                if (($action['type'] ?? '') === 'Explicit') {
                    $explicit++;
                }
                if (($action['type'] ?? '') === 'Inferred') {
                    $inferred++;
                }
            }
            $modified += count($result['modified_files'] ?? []);
        }

        $lines = [];
        $lines[] = '# AIOps Docs Execution Final Report';
        $lines[] = '';
        $lines[] = '- Generated: ' . $this->now();
        $lines[] = '- Dry-run: ' . ($dryRun ? 'yes' : 'no');
        $lines[] = '- Total inventory files: ' . count($files);
        $lines[] = '- Files processed: ' . count($results);
        $lines[] = '- Explicit actions found: ' . $explicit;
        $lines[] = '- Inferred actions found: ' . $inferred;
        $lines[] = '- Files modified: ' . $modified;
        $lines[] = '- Errors: ' . count($errors);
        $lines[] = '';
        $lines[] = '## Processed Files';

        foreach ($results as $result) {
            $lines[] = '- ' . $result['file'] . ' (' . $result['status'] . ')';
        }

        if ($errors !== []) {
            $lines[] = '';
            $lines[] = '## Errors';
            foreach ($errors as $error) {
                $lines[] = '- ' . ($error['file'] ?? 'unknown') . ': ' . ($error['issue'] ?? 'unknown');
            }
        }

        $lines[] = '';
        $lines[] = '## Artifacts';
        $lines[] = '- State: docs/_aiops/_execution_state.json';
        $lines[] = '- Inventory: docs/_aiops/_inventory.json';
        $lines[] = '- Log: docs/_aiops/_execution_log.md';
        $lines[] = '- Patches: docs/_aiops/patches/';

        file_put_contents($this->finalReportFile, implode("\n", $lines) . "\n");
    }

    /** @param array<string,mixed> $payload */
    private function writeJson(string $path, array $payload): void
    {
        file_put_contents($path, json_encode($payload, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . "\n");
    }

    /** @param array<int,array{type:string,action:string}> $classification */
    private function writePatchRecord(string $docPath, string $targetFile, string $afterCode, bool $dryRun, array $classification): void
    {
        $name = pathinfo(basename($docPath), PATHINFO_FILENAME);
        $path = $this->patchesDir . '/' . $name . '.patch.md';

        $lines = [];
        $lines[] = '# Patch Record: ' . basename($docPath);
        $lines[] = '';
        $lines[] = '## Target File';
        $lines[] = '- ' . $targetFile;
        $lines[] = '';
        $lines[] = '## Classification';
        if ($classification === []) {
            $lines[] = '- None';
        } else {
            foreach ($classification as $entry) {
                $lines[] = '- ' . $entry['type'] . ': ' . $entry['action'];
            }
        }

        $lines[] = '';
        $lines[] = '## Before';
        $lines[] = '- See backup in writable/backups/{timestamp} when not in dry-run mode.';
        $lines[] = '';
        $lines[] = '## After';
        $lines[] = '```';
        $lines[] = $afterCode;
        $lines[] = '```';
        $lines[] = '';
        $lines[] = '## Rollback';
        $lines[] = '- Restore the backed-up file from writable/backups/{timestamp}. ';
        $lines[] = '- Dry-run mode: ' . ($dryRun ? 'enabled' : 'disabled');

        file_put_contents($path, implode("\n", $lines) . "\n");
    }

    private function now(): string
    {
        return (new DateTimeImmutable('now'))->format(DATE_ATOM);
    }
}
