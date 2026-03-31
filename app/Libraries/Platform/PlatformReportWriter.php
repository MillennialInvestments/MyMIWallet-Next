<?php

declare(strict_types=1);

namespace App\Libraries\Platform;

class PlatformReportWriter
{
    public function writeRunReport(array $report, int $retain = 20): array
    {
        $base = ROOTPATH . 'docs/_platform';
        if (! is_dir($base)) {
            mkdir($base, 0775, true);
        }

        $historyDir = $base . '/history';
        if (! is_dir($historyDir)) {
            mkdir($historyDir, 0775, true);
        }

        $stamp = gmdate('Ymd_His');
        $jsonName = sprintf('run_%s.json', $stamp);
        $mdName = sprintf('run_%s.md', $stamp);

        $jsonPath = $historyDir . '/' . $jsonName;
        $mdPath = $historyDir . '/' . $mdName;

        file_put_contents($jsonPath, json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);
        file_put_contents($mdPath, $this->toMarkdown($report));

        file_put_contents($base . '/latest_run.json', json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);
        file_put_contents($base . '/latest_run.md', $this->toMarkdown($report));

        $this->retainLatest($historyDir, 'run_*.json', $retain);
        $this->retainLatest($historyDir, 'run_*.md', $retain);

        return [
            'latest_json' => 'docs/_platform/latest_run.json',
            'latest_md' => 'docs/_platform/latest_run.md',
            'history_json' => 'docs/_platform/history/' . $jsonName,
            'history_md' => 'docs/_platform/history/' . $mdName,
        ];
    }

    public function writeControlPlaneReport(array $report): array
    {
        $base = ROOTPATH . 'docs/_platform';
        if (! is_dir($base)) {
            mkdir($base, 0775, true);
        }

        file_put_contents($base . '/control_plane_report.json', json_encode($report, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . PHP_EOL);
        file_put_contents($base . '/control_plane_report.md', $this->toMarkdown($report));

        return [
            'json' => 'docs/_platform/control_plane_report.json',
            'md' => 'docs/_platform/control_plane_report.md',
        ];
    }

    private function toMarkdown(array $report): string
    {
        $lines = [
            '# Platform Report',
            '',
            '- Generated: ' . ($report['timestamp'] ?? gmdate(DATE_ATOM)),
            '- Hostname: ' . ($report['hostname'] ?? 'unknown'),
            '- Repo: ' . ($report['repo'] ?? 'unknown'),
            '- Branch: ' . ($report['git_branch'] ?? 'unknown'),
            '',
        ];

        if (isset($report['summary']) && is_array($report['summary'])) {
            $lines[] = '## Summary';
            $lines[] = '';
            foreach ($report['summary'] as $k => $v) {
                $lines[] = '- ' . $k . ': ' . (is_scalar($v) ? (string) $v : json_encode($v));
            }
            $lines[] = '';
        }

        if (isset($report['stage_results']) && is_array($report['stage_results'])) {
            $lines[] = '## Stages';
            $lines[] = '';
            foreach ($report['stage_results'] as $stage) {
                $name = (string) ($stage['stage'] ?? 'unknown');
                $lines[] = '### ' . $name;
                $lines[] = '';
                $lines[] = '- Duration: ' . ($stage['duration_seconds'] ?? 0) . 's';
                $lines[] = '- Success: ' . ((bool) ($stage['success'] ?? false) ? 'yes' : 'no');
                if (! empty($stage['results']) && is_array($stage['results'])) {
                    $lines[] = '- Commands:';
                    foreach ($stage['results'] as $result) {
                        $status = ! empty($result['skipped']) ? 'SKIP' : ((! empty($result['success'])) ? 'OK' : 'FAIL');
                        $lines[] = '  - [' . $status . '] ' . ($result['command'] ?? 'unknown');
                    }
                }
                $lines[] = '';
            }
        }

        if (! empty($report['suggested_next_actions'])) {
            $lines[] = '## Suggested Next Actions';
            $lines[] = '';
            foreach ((array) $report['suggested_next_actions'] as $action) {
                $lines[] = '- ' . $action;
            }
            $lines[] = '';
        }

        return implode(PHP_EOL, $lines) . PHP_EOL;
    }

    private function retainLatest(string $dir, string $pattern, int $retain): void
    {
        $files = glob($dir . '/' . $pattern) ?: [];
        rsort($files);

        $extra = array_slice($files, $retain);
        foreach ($extra as $file) {
            @unlink($file);
        }
    }
}
