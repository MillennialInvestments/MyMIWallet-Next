<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use SplFileObject;

class GapTrackerSync extends BaseCommand
{
    protected $group       = 'ops';
    protected $name        = 'gap:sync';
    protected $description = 'Enrich docs/gap_tracker/gap_tracker.csv and produce next-work report';

    protected array $headers = [
        'Module',
        'Gap ID',
        'Requirement',
        'Doc Source',
        'Code Evidence',
        'Status',
        'Priority',
        'Estimated Effort',
        'Dependencies',
        'Owner',
        'Target Version',
        'Notes',
    ];

    protected array $priorityOrder = ['P0', 'P1', 'P2', 'P3'];
    protected array $effortOrder   = ['S', 'M', 'L'];

    public function run(array $params)
    {
        $limit         = (int) (CLI::getOption('limit') ?? 25);
        $priorityScope = CLI::getOption('priority');
        $dryRun        = CLI::getOption('dry-run') !== null;

        $csvPath = 'docs/gap_tracker/gap_tracker.csv';

        if (! file_exists($csvPath)) {
            CLI::error('Unable to locate gap tracker at ' . $csvPath);
            return;
        }

        $rows           = $this->readCsv($csvPath);
        $originalRows   = $rows;
        $processedCount = 0;
        $fillStats      = array_fill_keys($this->headers, 0);

        foreach ($rows as $index => $row) {
            if ($processedCount >= $limit) {
                break;
            }

            if ($priorityScope !== null && $priorityScope !== '' && isset($row['Priority']) && $row['Priority'] !== '' && strtoupper($row['Priority']) !== strtoupper($priorityScope)) {
                continue;
            }

            $rows[$index] = $this->enrichRow($row, $fillStats);
            $processedCount++;
        }

        if (! $dryRun) {
            $this->writeCsv($csvPath, $rows);
            CLI::write('Updated CSV saved to ' . $csvPath, 'green');
        } else {
            CLI::write('Dry-run enabled: CSV not written', 'yellow');
        }

        $reportPath = $this->writeReport($rows, $originalRows, $fillStats, $processedCount, $dryRun);

        if ($reportPath !== null) {
            CLI::write('Report generated at ' . $reportPath, 'green');
        }
    }

    protected function enrichRow(array $row, array &$fillStats): array
    {
        $module      = trim((string) ($row['Module'] ?? ''));
        $gapId       = trim((string) ($row['Gap ID'] ?? ''));
        $requirement = trim((string) ($row['Requirement'] ?? ''));
        $priority    = strtoupper(trim((string) ($row['Priority'] ?? '')));
        $effort      = strtoupper(trim((string) ($row['Estimated Effort'] ?? '')));

        if ($this->isEmpty($row['Code Evidence'] ?? '')) {
            $row['Code Evidence'] = $this->findCodeEvidence($gapId, $module, $requirement) ?? 'NaN';
            $this->trackFill($fillStats, 'Code Evidence', $row['Code Evidence']);
        }

        if ($this->isEmpty($row['Doc Source'] ?? '')) {
            $row['Doc Source'] = $this->findDocSource($gapId, $requirement) ?? 'docs/TODO.md';
            $this->trackFill($fillStats, 'Doc Source', $row['Doc Source']);
            if ($row['Doc Source'] === 'docs/TODO.md') {
                $row['Notes'] = $this->appendNote($row['Notes'] ?? '', 'Needs documentation link for traceability.');
            }
        }

        if ($this->isEmpty($row['Status'] ?? '')) {
            $row['Status'] = $this->inferStatus($row['Code Evidence'] ?? '');
            $this->trackFill($fillStats, 'Status', $row['Status']);
        }

        if ($this->isEmpty($priority)) {
            $row['Priority'] = $this->inferPriority($requirement, $module);
            $this->trackFill($fillStats, 'Priority', $row['Priority']);
        }

        if ($this->isEmpty($effort)) {
            $row['Estimated Effort'] = $this->inferEffort($requirement);
            $this->trackFill($fillStats, 'Estimated Effort', $row['Estimated Effort']);
        }

        if ($this->isEmpty($row['Dependencies'] ?? '')) {
            $row['Dependencies'] = $this->inferDependencies($requirement);
            $this->trackFill($fillStats, 'Dependencies', $row['Dependencies']);
        }

        if ($this->isEmpty($row['Owner'] ?? '')) {
            $row['Owner'] = $this->inferOwner($module);
            $this->trackFill($fillStats, 'Owner', $row['Owner']);
        }

        if ($this->isEmpty($row['Target Version'] ?? '')) {
            $row['Target Version'] = 'vNext';
            $this->trackFill($fillStats, 'Target Version', $row['Target Version']);
        }

        if ($this->isEmpty($row['Notes'] ?? '')) {
            $row['Notes'] = $this->buildNotes($module, $gapId, $requirement, $row['Doc Source'], $row['Code Evidence']);
            $this->trackFill($fillStats, 'Notes', $row['Notes']);
        }

        return $row;
    }

    protected function readCsv(string $path): array
    {
        $file = new SplFileObject($path);
        $file->setFlags(SplFileObject::READ_CSV | SplFileObject::SKIP_EMPTY);
        $rows    = [];
        $headers = [];

        foreach ($file as $index => $data) {
            if ($data === [null] || $data === false) {
                continue;
            }

            if ($index === 0) {
                $headers = $data;
                continue;
            }

            $row = [];
            foreach ($headers as $idx => $header) {
                $row[$header] = $data[$idx] ?? '';
            }

            $rows[] = $row;
        }

        return $rows;
    }

    protected function writeCsv(string $path, array $rows): void
    {
        $dir = dirname($path);

        if (! is_dir($dir) && ! mkdir($dir, 0775, true) && ! is_dir($dir)) {
            CLI::error('Unable to create directory for CSV: ' . $dir);
            return;
        }

        $handle = fopen($path, 'w');

        if ($handle === false) {
            CLI::error('Unable to write CSV to ' . $path);
            return;
        }

        fputcsv($handle, $this->headers);

        foreach ($rows as $row) {
            $line = [];
            foreach ($this->headers as $header) {
                $line[] = $row[$header] ?? '';
            }
            fputcsv($handle, $line);
        }

        fclose($handle);
    }

    protected function inferStatus(string $codeEvidence): string
    {
        if ($this->isEmpty($codeEvidence) || $codeEvidence === 'NaN') {
            return 'Gap';
        }

        return 'In Progress';
    }

    protected function inferPriority(string $requirement, string $module): string
    {
        $requirementLower = strtolower($requirement);
        $moduleLower      = strtolower($module);

        if (str_contains($requirementLower, 'critical') || str_contains($requirementLower, 'sqli') || str_contains($requirementLower, 'xss') || str_contains($requirementLower, 'csrf') || str_contains($requirementLower, 'auth') || str_contains($requirementLower, 'rate limit')) {
            return 'P0';
        }

        if (str_contains($moduleLower, 'security') || str_contains($moduleLower, 'auth') || str_contains($moduleLower, 'payments') || str_contains($moduleLower, 'devops') || str_contains($moduleLower, 'alerts') || str_contains($moduleLower, 'predictions')) {
            return 'P1';
        }

        if (str_contains($requirementLower, 'marketing') || str_contains($moduleLower, 'marketing') || str_contains($requirementLower, 'content')) {
            return 'P2';
        }

        return 'P2';
    }

    protected function inferEffort(string $requirement): string
    {
        $requirementLower = strtolower($requirement);

        if (str_contains($requirementLower, 'migration') || str_contains($requirementLower, 'new module') || str_contains($requirementLower, 'dashboard') || str_contains($requirementLower, 'queue') || str_contains($requirementLower, 'integration')) {
            return 'M';
        }

        if (str_contains($requirementLower, 'add route') || str_contains($requirementLower, 'small fix') || str_contains($requirementLower, 'add setting')) {
            return 'S';
        }

        return 'M';
    }

    protected function inferDependencies(string $requirement): string
    {
        $requirementLower = strtolower($requirement);

        if (str_contains($requirementLower, 'route')) {
            return 'app/Config/Routes.php';
        }

        if (str_contains($requirementLower, 'migration')) {
            return 'app/Database/Migrations';
        }

        if (str_contains($requirementLower, 'dashboard')) {
            return 'App/Modules/Management';
        }

        if (str_contains($requirementLower, 'redis') || str_contains($requirementLower, 'cache') || str_contains($requirementLower, 'queue')) {
            return 'Cache/Redis';
        }

        return 'None';
    }

    protected function inferOwner(string $module): string
    {
        $moduleLower = strtolower($module);

        if (str_contains($moduleLower, 'automation')) {
            return 'MyMIAutomation';
        }

        return 'Teddy';
    }

    protected function findDocSource(string $gapId, string $requirement): ?string
    {
        $keywords = $this->keywordsFromRequirement($requirement);
        $pattern  = $gapId !== '' ? preg_quote($gapId, '/') : null;

        if ($pattern !== null) {
            $match = $this->firstRipgrepMatch($pattern, 'docs');
            if ($match !== null) {
                return $match;
            }
        }

        if (! empty($keywords)) {
            $pattern = implode('|', array_map(static fn ($word) => preg_quote($word, '/'), $keywords));
            $match   = $this->firstRipgrepMatch($pattern, 'docs');
            if ($match !== null) {
                return $match;
            }
        }

        return null;
    }

    protected function findCodeEvidence(string $gapId, string $module, string $requirement): ?string
    {
        $keywords = array_merge($this->keywordsFromRequirement($requirement), $this->keywordsFromRequirement($module));
        $pattern  = $gapId !== '' ? preg_quote($gapId, '/') : null;

        if ($pattern !== null) {
            $match = $this->firstRipgrepMatch($pattern, 'app');
            if ($match !== null) {
                return $match;
            }
        }

        if (! empty($keywords)) {
            $pattern = implode('|', array_map(static fn ($word) => preg_quote($word, '/'), $keywords));
            $match   = $this->firstRipgrepMatch($pattern, 'app');
            if ($match !== null) {
                return $match;
            }
        }

        $routesMatch = $this->firstRipgrepMatch('Routes.php', 'app/Config/Routes.php');

        return $routesMatch ?? null;
    }

    protected function keywordsFromRequirement(string $text): array
    {
        $words = preg_split('/\W+/', strtolower($text), -1, PREG_SPLIT_NO_EMPTY);
        $words = array_filter($words, static fn ($word) => strlen($word) > 4);

        return array_slice(array_values(array_unique($words)), 0, 5);
    }

    protected function firstRipgrepMatch(string $pattern, string $path): ?string
    {
        $command = sprintf('rg -n -m 1 --no-heading %s %s', escapeshellarg($pattern), escapeshellarg($path));
        $output  = [];
        $code    = 0;

        @exec($command, $output, $code);

        if ($code !== 0 || empty($output)) {
            return null;
        }

        $line = $output[0];
        $parts = explode(':', $line, 3);

        if (count($parts) < 2) {
            return null;
        }

        $file = $parts[0];
        $lineNumber = $parts[1];

        return $file . ':L' . $lineNumber;
    }

    protected function buildNotes(string $module, string $gapId, string $requirement, string $docSource, string $codeEvidence): string
    {
        $hints = [];

        if (! $this->isEmpty($docSource) && $docSource !== 'docs/TODO.md') {
            $hints[] = 'Review doc source: ' . $docSource;
        }

        if (! $this->isEmpty($codeEvidence) && $codeEvidence !== 'NaN') {
            $hints[] = 'Cross-check code evidence: ' . $codeEvidence;
        }

        $hints[] = 'Plan acceptance test for: ' . ($gapId ?: $requirement);
        $hints[] = 'Touch likely files: app/Config/Routes.php, controllers/models under module: ' . ($module ?: 'general');
        $hints[] = 'Mark Done when routes + tests verify behavior matches docs.';

        return implode("\n- ", array_map(static fn ($hint) => $hint, $hints));
    }

    protected function appendNote(string $existing, string $note): string
    {
        $existing = trim($existing);

        if ($existing === '') {
            return '- ' . $note;
        }

        return $existing . "\n- " . $note;
    }

    protected function trackFill(array &$stats, string $column, string $value): void
    {
        if ($this->isEmpty($value)) {
            return;
        }

        if (isset($stats[$column])) {
            $stats[$column]++;
        }
    }

    protected function isEmpty(?string $value): bool
    {
        return $value === null || trim($value) === '';
    }

    protected function writeReport(array $rows, array $originalRows, array $fillStats, int $processedCount, bool $dryRun): ?string
    {
        $reportDir = 'docs/gap_tracker/reports';

        if (! is_dir($reportDir) && ! mkdir($reportDir, 0775, true) && ! is_dir($reportDir)) {
            CLI::error('Unable to create report directory: ' . $reportDir);
            return null;
        }

        $date       = date('Y-m-d');
        $reportPath = $reportDir . '/gap_sync_' . $date . '.md';
        $stillMissingDocs  = $this->collectMissing($rows, 'Doc Source');
        $stillMissingCode  = $this->collectMissing($rows, 'Code Evidence');
        $nextFive          = $this->selectNextWork($rows, 5);
        $topTen            = $this->selectNextWork($rows, 10);

        $report = [];
        $report[] = '# Gap Tracker Sync';
        $report[] = '- Run date: ' . $date;
        $report[] = '- Dry run: ' . ($dryRun ? 'yes' : 'no');
        $report[] = '- Rows processed: ' . $processedCount;
        $report[] = '';
        $report[] = '## Column fills this run';
        foreach ($fillStats as $column => $count) {
            $report[] = '- ' . $column . ': ' . $count;
        }
        $report[] = '';
        $report[] = '## Remaining gaps for Doc Source';
        $report[] = $this->formatMissingList($stillMissingDocs);
        $report[] = '';
        $report[] = '## Remaining gaps for Code Evidence';
        $report[] = $this->formatMissingList($stillMissingCode);
        $report[] = '';
        $report[] = '## Top 10 recommended next gaps';
        $report[] = $this->formatNextWork($topTen);
        $report[] = '';
        $report[] = '## Next 5 with PR scaffolding';
        $report[] = $this->formatNextWorkWithGuidance($nextFive);

        file_put_contents($reportPath, implode("\n", $report));

        return $reportPath;
    }

    protected function collectMissing(array $rows, string $column): array
    {
        $missing = [];

        foreach ($rows as $row) {
            if (! isset($row[$column])) {
                continue;
            }

            if ($this->isEmpty($row[$column]) || $row[$column] === 'NaN') {
                $missing[] = $row['Gap ID'] ?? '[unknown gap]';
            }
        }

        return $missing;
    }

    protected function formatMissingList(array $gaps): string
    {
        if (empty($gaps)) {
            return '- None';
        }

        return implode("\n", array_map(static fn ($gap) => '- ' . $gap, $gaps));
    }

    protected function selectNextWork(array $rows, int $limit = 5): array
    {
        $candidates = array_filter($rows, function ($row) {
            $status = strtolower($row['Status'] ?? '');

            if (! in_array($status, ['gap', 'in progress'], true)) {
                return false;
            }

            $dependencies = trim((string) ($row['Dependencies'] ?? ''));

            return $dependencies === '' || strtolower($dependencies) === 'none';
        });

        usort($candidates, function ($a, $b) {
            $priorityComparison = $this->comparePriority($a['Priority'] ?? '', $b['Priority'] ?? '');
            if ($priorityComparison !== 0) {
                return $priorityComparison;
            }

            return $this->compareEffort($a['Estimated Effort'] ?? '', $b['Estimated Effort'] ?? '');
        });

        return array_slice($candidates, 0, $limit);
    }

    protected function comparePriority(string $a, string $b): int
    {
        $aIndex = array_search(strtoupper($a), $this->priorityOrder, true);
        $bIndex = array_search(strtoupper($b), $this->priorityOrder, true);

        $aIndex = $aIndex === false ? PHP_INT_MAX : $aIndex;
        $bIndex = $bIndex === false ? PHP_INT_MAX : $bIndex;

        return $aIndex <=> $bIndex;
    }

    protected function compareEffort(string $a, string $b): int
    {
        $aIndex = array_search(strtoupper($a), $this->effortOrder, true);
        $bIndex = array_search(strtoupper($b), $this->effortOrder, true);

        $aIndex = $aIndex === false ? PHP_INT_MAX : $aIndex;
        $bIndex = $bIndex === false ? PHP_INT_MAX : $bIndex;

        return $aIndex <=> $bIndex;
    }

    protected function formatNextWork(array $rows): string
    {
        if (empty($rows)) {
            return '- None available';
        }

        $lines = [];

        foreach ($rows as $row) {
            $lines[] = sprintf('- [%s] %s (Priority: %s, Effort: %s)', $row['Gap ID'] ?? 'N/A', $row['Requirement'] ?? 'N/A', $row['Priority'] ?? 'N/A', $row['Estimated Effort'] ?? 'N/A');
        }

        return implode("\n", $lines);
    }

    protected function formatNextWorkWithGuidance(array $rows): string
    {
        if (empty($rows)) {
            return '- None available';
        }

        $lines = [];

        foreach ($rows as $row) {
            $gapId       = $row['Gap ID'] ?? 'N/A';
            $requirement = $row['Requirement'] ?? '';
            $docSource   = $row['Doc Source'] ?? 'docs/TODO.md';
            $code        = $row['Code Evidence'] ?? 'NaN';
            $title       = $gapId . ' - ' . mb_substr($requirement, 0, 60);

            $lines[] = sprintf('- **%s**', $gapId);
            $lines[] = '  - Suggested PR title: ' . $title;
            $lines[] = '  - Likely files: ' . implode(', ', array_filter([$docSource, $code !== 'NaN' ? $code : null, 'app/Config/Routes.php']));
            $lines[] = '  - Acceptance criteria: route/controller present, doc updated, tests or manual verification notes recorded.';
        }

        return implode("\n", $lines);
    }
}
