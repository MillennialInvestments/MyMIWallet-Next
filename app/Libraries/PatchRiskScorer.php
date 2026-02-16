<?php

namespace App\Libraries;

class PatchRiskScorer
{
    public function score(string $diffPath): array
    {
        if (!file_exists($diffPath)) {
            return ['ok' => false, 'error' => 'diff_not_found'];
        }

        $diff = file_get_contents($diffPath);

        $linesChanged = substr_count($diff, "\n+")
                      + substr_count($diff, "\n-");

        preg_match_all('/\+\+\+ b\/(.+)/', $diff, $matches);
        $files = $matches[1] ?? [];

        $risk = [
            'structural' => 0,
            'dependency' => 0,
            'security'   => 0,
            'rollback'   => 0,
            'confidence' => 100,
        ];

        // Structural risk
        if ($linesChanged > 300) $risk['structural'] += 30;
        if (count($files) > 5)   $risk['structural'] += 25;

        // Dependency risk
        foreach ($files as $file) {
            if (str_contains($file, 'Config/')) {
                $risk['dependency'] += 40;
            }
            if (str_contains($file, 'Services')) {
                $risk['dependency'] += 20;
            }
        }

        // Security risk
        if (preg_match('/(Auth|Filters|Security|Database)/i', $diff)) {
            $risk['security'] += 35;
        }

        // Rollback risk
        if (preg_match('/\-\s*public function/i', $diff)) {
            $risk['rollback'] += 40;
        }

        $totalRisk = array_sum([
            $risk['structural'],
            $risk['dependency'],
            $risk['security'],
            $risk['rollback'],
        ]);

        $risk['confidence'] = max(0, 100 - $totalRisk);

        return [
            'ok' => true,
            'lines_changed' => $linesChanged,
            'files_affected' => count($files),
            'risk_breakdown' => $risk,
            'total_risk' => $totalRisk,
        ];
    }
}
