<?php

namespace App\Commands;

use App\Libraries\AiOps\AiOpsManager;
use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;

class GapTrackerSync extends BaseCommand
{
    protected $group       = 'GapTracker';
    protected $name        = 'gap:sync';
    protected $description = 'Enrich gap tracker CSV and produce a report.';
    protected $usage       = 'php spark gap:sync [--limit=25] [--priority=P1] [--dry-run] [--report-only]';

    protected ?AiOpsManager $manager = null;

    public function run(array $params)
    {
        $this->manager ??= new AiOpsManager();

        $limit      = (int) (CLI::getOption('limit') ?? 25);
        $priority   = CLI::getOption('priority');
        $dryRun     = CLI::getOption('dry-run') !== null;
        $reportOnly = CLI::getOption('report-only') !== null;

        $gate = $this->manager->canRun('selfhost_gap_sync', 'gap_sync');
        if (! $gate['allowed']) {
            CLI::error('Gap sync blocked: ' . $gate['reason']);
            return;
        }

        $runId     = $this->manager->startRun('gap_sync', 'selfhost_gap_sync', ['limit' => $limit, 'priority' => $priority, 'dryRun' => $dryRun, 'reportOnly' => $reportOnly]);
        $startedAt = microtime(true);

        try {
            $csvPath    = ROOTPATH . 'docs/gap_tracker/gap_tracker.csv';
            $reportDir  = ROOTPATH . 'docs/gap_tracker/reports/';
            $rows       = $this->readCsv($csvPath);
            $headers    = array_shift($rows);
            foreach ($rows as $i => $r) {
                $rows[$i] = $this->normalizeRowKeys($r);
            }

            $processed  = 0;
            $fillCounts = array_fill_keys(array_unique(array_merge($headers, ['ID','Title','Effort'])), 0);
            $blockers   = [];

            foreach ($rows as &$row) {
                if ($priority && ! empty($row['Priority']) && $row['Priority'] !== $priority) {
                    continue;
                }
                if ($processed >= $limit) {
                    break;
                }
                $processed++;

                $this->enrichRow($row, $fillCounts);
                if ($this->isBlocked($row)) {
                    $blockers[] = $row;
                }
            }
            unset($row);

            $nextWork = $this->calculateNextWork($rows);
            $reportPath = $this->writeReport($reportDir, $fillCounts, $nextWork, $blockers);

            if (! $dryRun && ! $reportOnly) {
                $this->writeCsv($csvPath, $headers, $rows);
            }

            $runtime = (int) round(microtime(true) - $startedAt);
            $message = 'Gap sync completed: ' . $processed . ' rows processed.';
            $this->manager->finishRun($runId, 'SUCCESS', $message, ['report' => $reportPath], $runtime, $processed, 0, 0);
            CLI::write($message . ' Report: ' . $reportPath, 'green');
        } catch (\Throwable $e) {
            $runtime = (int) round(microtime(true) - $startedAt);
            $this->manager->finishRun($runId, 'ERROR', $e->getMessage(), ['trace' => $e->getTraceAsString()], $runtime, 0, 0, 1);
            CLI::error('Gap sync failed: ' . $e->getMessage());
        }
    }

    protected function readCsv(string $path): array
    {
        if (! is_file($path)) {
            throw new \RuntimeException('CSV not found at ' . $path);
        }
        $rows = [];
        if (($handle = fopen($path, 'r')) !== false) {
            $header = null;
            while (($data = fgetcsv($handle)) !== false) {
                if ($header === null) {
                    $header = $data;
                    $rows[] = $header;
                    continue;
                }
                $rows[] = array_combine($header, $data);
            }
            fclose($handle);
        }
        return $rows;
    }

    protected function writeCsv(string $path, array $headers, array $rows): void
    {
        $handle = fopen($path, 'w');
        fputcsv($handle, $headers);
        foreach ($rows as $row) {
            fputcsv($handle, array_map(fn ($h) => $row[$h] ?? '', $headers));
        }
        fclose($handle);
    }

    protected function enrichRow(array &$row, array &$fillCounts): void
    {
        $defaults = [
            'Status'         => 'Open',
            'Priority'       => 'P2',
            'Effort'         => 'M',
            'Doc Source'     => 'docs/gap_tracker/README.md',
            'Code Evidence'  => '',
            'Dependencies'   => 'N/A',
            'Notes'          => 'Auto-filled by gap:sync',
            'Owner'          => 'Unassigned',
            'Target Version' => 'backlog',
        ];

        foreach ($defaults as $key => $value) {
            if (array_key_exists($key, $row) && trim((string) $row[$key]) === '') {
                $row[$key] = $key === 'Code Evidence' ? ($this->findEvidence($row['Title'] ?? '') ?? '') : $value;
                $fillCounts[$key] = ($fillCounts[$key] ?? 0) + 1;
            }
        }

        // If still no evidence, leave empty for blocker tracking
        if (empty($row['Code Evidence'])) {
            $row['Code Evidence'] = $this->findEvidence($row['Title'] ?? '') ?? '';
            if (! empty($row['Code Evidence'])) {
                $fillCounts['Code Evidence'] = ($fillCounts['Code Evidence'] ?? 0) + 1;
            }
        }
    }

    protected function findEvidence(string $term): ?string
    {
        $term = trim($term);
        if ($term === '') {
            return null;
        }

        // Keep paths tight for performance
        $paths = [
            ROOTPATH . 'app/Modules',
            ROOTPATH . 'app/Config/Routes.php',
            ROOTPATH . 'docs',
        ];
        $escapedPaths = array_map('escapeshellarg', $paths);

        // Prefer rg if installed (fast)
        $rgPath = trim((string) @shell_exec('command -v rg 2>/dev/null'));
        if ($rgPath !== '') {
            $cmd = escapeshellcmd($rgPath) . ' -n --max-count 1 ' . escapeshellarg($term) . ' ' . implode(' ', $escapedPaths) . ' 2>/dev/null';
            @exec($cmd, $out, $code);
            if ($code === 0 && !empty($out)) {
                return $out[0];
            }
            return null;
        }

        // Fallback to grep (available on most systems)
        // -R recursive, -n line numbers, -I skip binary, -m 1 first match
        $cmd = 'grep -RIn -I -m 1 ' . escapeshellarg($term) . ' ' . implode(' ', $escapedPaths) . ' 2>/dev/null';
        @exec($cmd, $out, $code);
        if ($code === 0 && !empty($out)) {
            return $out[0];
        }

        return null;
    }


    protected function isBlocked(array $row): bool
    {
        return (empty($row['Doc Source']) || empty($row['Code Evidence'])) && (($row['Status'] ?? '') !== 'Closed');
    }

    protected function calculateNextWork(array $rows): array
    {
        $eligible = array_filter($rows, static function ($row) {
            return in_array($row['Status'] ?? 'Open', ['Open', 'In Progress'], true);
        });

        usort($eligible, function ($a, $b) {
            $priorityOrder = ['P0' => 0, 'P1' => 1, 'P2' => 2, 'P3' => 3];
            $effortOrder   = ['S' => 0, 'M' => 1, 'L' => 2, 'XL' => 3];

            $priorityDiff = ($priorityOrder[$a['Priority'] ?? 'P3'] ?? 3) <=> ($priorityOrder[$b['Priority'] ?? 'P3'] ?? 3);
            if ($priorityDiff !== 0) {
                return $priorityDiff;
            }
            $effortDiff = ($effortOrder[$a['Effort'] ?? 'XL'] ?? 3) <=> ($effortOrder[$b['Effort'] ?? 'XL'] ?? 3);
            if ($effortDiff !== 0) {
                return $effortDiff;
            }
            $targetDiff = strcmp($a['Target Version'] ?? 'z', $b['Target Version'] ?? 'z');
            if ($targetDiff !== 0) {
                return $targetDiff;
            }
            return strcmp($a['ID'] ?? '', $b['ID'] ?? '');
        });

        return array_slice($eligible, 0, 10);
    }

    protected function writeReport(string $dir, array $fillCounts, array $nextWork, array $blockers): string
    {
        if (! is_dir($dir)) {
            mkdir($dir, 0775, true);
        }
        $date = date('Y-m-d');
        $path = $dir . 'gap_sync_' . $date . '.md';
        $report = [
            '# Gap Sync Report (' . $date . ')',
            '',
            '## Fill Counts',
        ];
        foreach ($fillCounts as $col => $count) {
            $report[] = "- {$col}: {$count}";
        }

        $report[] = '';
        $report[] = '## Next Work (Top 10)';
        if (empty($nextWork)) {
            $report[] = '- No eligible items.';
        } else {
            foreach ($nextWork as $row) {
                $report[] = sprintf('- [%s] %s (Priority %s, Effort %s, Target %s)', $row['ID'] ?? '?', $row['Title'] ?? 'Untitled', $row['Priority'] ?? 'N/A', $row['Effort'] ?? 'N/A', $row['Target Version'] ?? 'N/A');
            }
        }

        $report[] = '';
        $report[] = '## Blockers (missing docs/code)';
        if (empty($blockers)) {
            $report[] = '- None';
        } else {
            foreach ($blockers as $row) {
                $report[] = sprintf('- [%s] %s — missing evidence', $row['ID'] ?? '?', $row['Title'] ?? 'Untitled');
            }
        }

        file_put_contents($path, implode(PHP_EOL, $report));

        return $path;
    }

    protected function normalizeRowKeys(array $row): array
    {
        // Map CSV headers → internal keys used by this command
        $map = [
            'Gap ID'            => 'ID',
            'Requirement'       => 'Title',
            'Estimated Effort'  => 'Effort',
            // keep others as-is
        ];

        foreach ($map as $from => $to) {
            if (array_key_exists($from, $row) && !array_key_exists($to, $row)) {
                $row[$to] = $row[$from];
            }
        }

        return $row;
    }

}
