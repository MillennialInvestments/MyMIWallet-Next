<?php

namespace App\Services\AIOps;

class GovernanceScorer
{
    public function score(string $text): array
    {
        $t = strtolower($text);

        $gov = 0;
        $govSignals = [
            'auth' => 25,
            'security' => 30,
            'encryption' => 20,
            'payment' => 35,
            'wallet' => 25,
            'trading' => 25,
            'database' => 25,
            'migration' => 20,
            'routes' => 15,
            'config' => 15,
            'logger' => 10,
            'cron' => 10,
        ];

        foreach ($govSignals as $k => $pts) {
            if (str_contains($t, $k)) $gov += $pts;
        }

        $risk = 0;
        $riskSignals = [
            'drop ' => 50,
            'delete ' => 30,
            'truncate ' => 40,
            'rm -rf' => 80,
            'chmod 777' => 35,
            'sudo ' => 60,
            'eval(' => 40,
            'shell_exec' => 25,
            'exec(' => 20,
            'webhook' => 15,
        ];

        foreach ($riskSignals as $k => $pts) {
            if (str_contains($t, $k)) $risk += $pts;
        }

        $gov  = min(100, $gov);
        $risk = min(100, $risk);

        $riskLevel = $this->riskLevelFromScore($risk);
        $requiresManual = ($gov >= 60) || ($risk >= 50);

        return [
            'gov_score' => $gov,
            'risk_score' => $risk,
            'risk_level' => $riskLevel,
            'requires_manual_review' => $requiresManual,
        ];
    }

    private function riskLevelFromScore(int $risk): string
    {
        if ($risk >= 70) return 'HIGH';
        if ($risk >= 35) return 'MEDIUM';
        return 'LOW';
    }
}