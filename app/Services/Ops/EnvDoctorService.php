<?php

declare(strict_types=1);

namespace App\Services\Ops;

use App\Services\Env\EnvInspector;

class EnvDoctorService
{
    private EnvInspector $inspector;

    public function __construct(?EnvInspector $inspector = null)
    {
        $this->inspector = $inspector ?? new EnvInspector();
    }

    /**
     * @return array{report:array,markdown:string,paths:array}
     */
    public function run(bool $pack = false): array
    {
        $report = $this->inspector->inspect();
        $markdown = $this->inspector->formatMarkdown($report);
        $paths = $this->inspector->persistReport($report, $markdown, $pack);

        return [
            'report' => $report,
            'markdown' => $markdown,
            'paths' => $paths,
        ];
    }

    /**
     * @return array{report:array,path:string,modified_at:string}|null
     */
    public function loadLatestReport(): ?array
    {
        return $this->inspector->loadLatestReport();
    }

    public function summarizeReport(array $report): array
    {
        $summary = $report['summary'] ?? [];
        $counts = $summary['counts'] ?? ['ok' => 0, 'warning' => 0, 'critical' => 0];

        return [
            'status' => $summary['status'] ?? ($report['status'] ?? 'unknown'),
            'score' => $summary['score'] ?? 0,
            'generated_at' => $report['generated_at'] ?? null,
            'counts' => $counts,
            'top_findings' => $this->topFindings($report, 3),
        ];
    }

    public function latestSummary(): ?array
    {
        $latest = $this->loadLatestReport();
        if (! $latest) {
            return null;
        }

        $report = $latest['report'] ?? [];
        $summary = $this->summarizeReport($report);
        $summary['report_path'] = $latest['path'] ?? null;
        $summary['modified_at'] = $latest['modified_at'] ?? null;

        return $summary;
    }

    private function topFindings(array $report, int $limit = 3): array
    {
        $findings = $report['findings'] ?? [];
        if (! is_array($findings) || $findings === []) {
            return [];
        }

        usort($findings, static function (array $a, array $b): int {
            $rank = ['critical' => 0, 'warning' => 1, 'ok' => 2];
            return ($rank[$a['status'] ?? 'ok'] ?? 3) <=> ($rank[$b['status'] ?? 'ok'] ?? 3);
        });

        $top = array_slice($findings, 0, $limit);
        return array_map(static function (array $finding): array {
            return [
                'status' => $finding['status'] ?? 'warning',
                'key' => $finding['key'] ?? 'unknown',
                'message' => $finding['message'] ?? '',
            ];
        }, $top);
    }
}
