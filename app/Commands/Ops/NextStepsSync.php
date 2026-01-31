<?php

namespace App\Commands\Ops;

use App\Commands\SafeBaseCommand;
use App\Commands\Support\ArtifactHelper;
use CodeIgniter\CLI\CLI;

class NextStepsSync extends SafeBaseCommand
{
    protected $group       = 'ops';
    protected $name        = 'ops:next-steps:sync';
    protected $description = 'Diff latest snapshots and queue net-new issues.';
    protected $usage       = 'ops:next-steps:sync [--emit=docs|raw|both] [--out=path] [--dry-run] [--approve]';
    protected $options     = [
        '--emit' => 'Output mode: docs, raw, or both (default: both).',
        '--out' => 'Override artifact directory (must be inside docs/aiops/artifacts or writable/aiops/artifacts).',
        '--dry-run' => 'Generate a report without mutating state.',
        '--approve' => 'Acknowledge execution (required for mutating commands).',
    ];

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $dryRun = $this->resolveDryRun($flags);
        $emit = ArtifactHelper::parseOptionValue($params, 'emit') ?: 'both';
        $outOverride = ArtifactHelper::parseOptionValue($params, 'out');

        $resolved = ArtifactHelper::resolveArtifactDirs($this->name, $outOverride);
        if (isset($resolved['error'])) {
            CLI::error($resolved['error']);
            return EXIT_ERROR;
        }

        $writeDocs = in_array($emit, ['docs', 'both'], true);
        $writeRaw = in_array($emit, ['raw', 'both'], true);
        if (! $writeDocs && ! $writeRaw) {
            $writeDocs = true;
            $writeRaw = true;
        }

        $snapshotDir = ROOTPATH . 'docs/next/snapshots';
        $snapshots = glob($snapshotDir . '/issues-*.json') ?: [];
        rsort($snapshots);

        $latest = $snapshots[0] ?? null;
        $previous = $snapshots[1] ?? null;

        $latestIssues = $this->loadIssues($latest);
        $previousIssues = $this->loadIssues($previous);

        $latestIds = array_column($latestIssues, 'id');
        $previousIds = array_column($previousIssues, 'id');

        $newIds = array_values(array_diff($latestIds, $previousIds));
        $newIssues = array_values(array_filter($latestIssues, static function (array $issue) use ($newIds) {
            return in_array($issue['id'] ?? null, $newIds, true);
        }));

        $report = [
            'command' => $this->name,
            'timestamp' => $resolved['timestamp'],
            'dry_run' => $dryRun,
            'emit' => $emit,
            'latest_snapshot' => $latest,
            'previous_snapshot' => $previous,
            'new_issue_count' => count($newIssues),
            'new_issues' => $newIssues,
        ];

        $summaryLines = [
            '# Next Steps Sync',
            '',
            '- Timestamp: ' . $resolved['timestamp'],
            '- Dry run: ' . ($dryRun ? 'yes' : 'no'),
            '- Latest snapshot: ' . ($latest ?: 'none'),
            '- Previous snapshot: ' . ($previous ?: 'none'),
            '- New issues: ' . count($newIssues),
            '',
            '## New Issues',
        ];

        if (empty($newIssues)) {
            $summaryLines[] = '- none';
        } else {
            foreach ($newIssues as $issue) {
                $summaryLines[] = '- ' . ($issue['id'] ?? 'unknown') . ': ' . ($issue['title'] ?? 'untitled');
            }
        }

        $summary = implode(PHP_EOL, $summaryLines) . PHP_EOL;

        if (! ArtifactHelper::writeArtifacts($resolved['docsDir'], $resolved['rawDir'], $summary, $report, $writeDocs, $writeRaw)) {
            return EXIT_ERROR;
        }

        CLI::write('Next steps sync artifacts written.', 'green');
        CLI::write('Docs: ' . $resolved['docsDir']);
        CLI::write('Raw: ' . $resolved['rawDir']);

        return EXIT_SUCCESS;
    }

    private function loadIssues(?string $path): array
    {
        if (! $path || ! is_file($path)) {
            return [];
        }

        $raw = file_get_contents($path);
        if (! $raw) {
            return [];
        }

        $decoded = json_decode($raw, true);
        if (! is_array($decoded)) {
            return [];
        }

        return $decoded;
    }
}
