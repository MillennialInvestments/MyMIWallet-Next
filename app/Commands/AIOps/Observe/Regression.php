<?php

namespace App\Commands\AIOps\Observe;

use App\Commands\SafeBaseCommand;
use CodeIgniter\CLI\CLI;

class Regression extends SafeBaseCommand
{
    protected $group = 'AIOps - Observe';
    protected $name = 'aiops:observe:regression';
    protected $description = 'Detect fingerprint regressions vs previous snapshot';

    public function run(array $params)
    {
        $dir = WRITEPATH . 'audit/fingerprints_history';
        $currentPath = WRITEPATH . 'audit/observability_fingerprints.json';
        $reportPath = WRITEPATH . 'audit/observability_regression_report.md';

        if (!is_file($currentPath)) {
            CLI::error('Missing current fingerprints. Run: php spark aiops:observe:hash');
            return;
        }

        if (!is_dir($dir)) {
            CLI::write('No history directory. No regressions detected.');
            file_put_contents($reportPath, "# Regression Report\n\nNo history found.\n");
            return;
        }

        $files = glob($dir . '/fingerprints_*.json');
        sort($files);
        $prev = $files[count($files) - 1] ?? null;

        if (!$prev || !is_file($prev)) {
            CLI::write('No previous snapshot. No regressions detected.');
            file_put_contents($reportPath, "# Regression Report\n\nNo previous snapshot.\n");
            return;
        }

        $curr = json_decode(file_get_contents($currentPath), true);
        $prevData = json_decode(file_get_contents($prev), true);

        $currMap = $curr['fingerprints'] ?? [];
        $prevMap = $prevData['fingerprints'] ?? [];

        $new = [];
        $worse = [];

        foreach ($currMap as $hash => $count) {
            $count = (int)$count;
            if (!isset($prevMap[$hash])) {
                $new[$hash] = $count;
                continue;
            }
            $delta = $count - (int)$prevMap[$hash];
            if ($delta > 0) {
                $worse[$hash] = $delta;
            }
        }

        arsort($new);
        arsort($worse);

        $md = "# Regression Report\n\n";
        $md .= "Previous snapshot: " . basename($prev) . "\n\n";
        $md .= "## New fingerprints\n";
        if (empty($new)) $md .= "_None_\n";
        else foreach (array_slice($new, 0, 20, true) as $h => $c) $md .= "- {$h}: {$c}\n";

        $md .= "\n## Increased occurrence fingerprints\n";
        if (empty($worse)) $md .= "_None_\n";
        else foreach (array_slice($worse, 0, 20, true) as $h => $d) $md .= "- {$h}: +{$d}\n";

        file_put_contents($reportPath, $md);

        CLI::write("Wrote: {$reportPath}");

        // Exit non-zero if regressions exist (useful for gating)
        if (!empty($new) || !empty($worse)) {
            CLI::error('Regressions detected.');
            exit(1);
        }

        CLI::write('No regressions detected.');
    }
}
