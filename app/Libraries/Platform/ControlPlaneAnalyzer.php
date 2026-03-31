<?php

declare(strict_types=1);

namespace App\Libraries\Platform;

class ControlPlaneAnalyzer
{
    public function analyze(array $records): array
    {
        $queue = [];

        foreach ($records as $record) {
            $platform = (string) ($record['platform'] ?? 'unknown');
            $status = (array) ($record['status'] ?? []);
            $metrics = (array) ($record['metrics'] ?? []);

            $counts = (array) ($status['counts'] ?? []);
            $critical = (int) ($counts['critical_errors'] ?? 0);
            $newErrors = (int) ($counts['new_errors'] ?? 0);
            $routesBroken = (int) ($counts['routes_broken'] ?? 0);

            $freshnessPenalty = $this->freshnessPenalty((string) ($status['generated_at'] ?? ''));
            $score = min(100, ($critical * 35) + ($routesBroken * 15) + min(30, $newErrors) + $freshnessPenalty);

            $action = 'no-action';
            if ($critical >= 2 || $score >= 85) {
                $action = 'repair';
            } elseif ($routesBroken > 0) {
                $action = 'light-scan';
            } elseif (((array) ($status['health'] ?? []))['auth'] ?? 'ok' !== 'ok') {
                $action = 'auth-audit';
            } elseif ($score >= 45) {
                $action = 'deep-scan';
            }

            $queue[] = [
                'platform' => $platform,
                'score' => $score,
                'action' => $action,
                'generated_at' => $status['generated_at'] ?? null,
                'metrics' => [
                    'critical_errors' => $critical,
                    'new_errors' => $newErrors,
                    'routes_broken' => $routesBroken,
                    'memory_peak_mb' => $metrics['memory_peak_mb'] ?? null,
                ],
            ];
        }

        usort($queue, static fn ($a, $b) => ($b['score'] <=> $a['score']));

        return $queue;
    }

    private function freshnessPenalty(string $generatedAt): int
    {
        if ($generatedAt === '') {
            return 20;
        }

        $ts = strtotime($generatedAt);
        if ($ts === false) {
            return 20;
        }

        $ageMinutes = (int) floor((time() - $ts) / 60);

        if ($ageMinutes <= 20) {
            return 0;
        }

        if ($ageMinutes <= 120) {
            return 10;
        }

        return 20;
    }
}
