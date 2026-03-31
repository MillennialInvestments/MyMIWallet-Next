<?php

declare(strict_types=1);

namespace App\Commands\Platform;

use App\Commands\SafeBaseCommand;
use App\Libraries\Platform\ControlPlaneRegistry;
use App\Libraries\Platform\EdgeSnapshotReader;
use App\Libraries\Platform\PlatformReportWriter;
use CodeIgniter\CLI\CLI;

class ControlCollect extends SafeBaseCommand
{
    protected $group = 'platform';
    protected $name = 'platform:control:collect';
    protected $description = 'Collect edge snapshots from registered platform manifests.';

    public function run(array $params)
    {
        $registry = new ControlPlaneRegistry();
        $reader = new EdgeSnapshotReader();
        $writer = new PlatformReportWriter();

        $manifests = $registry->loadManifests();
        $records = [];

        foreach ($manifests as $manifest) {
            $platform = (string) ($manifest['platform_key'] ?? 'unknown');
            $artifactPath = (string) ($manifest['artifact_export_path'] ?? '');

            $status = $artifactPath !== '' ? $reader->readStatus($artifactPath) : [];
            $metrics = $artifactPath !== '' ? $reader->readMetrics($artifactPath) : [];

            $stale = $status === [];
            $records[] = [
                'platform' => $platform,
                'artifact_path' => $artifactPath,
                'stale' => $stale,
                'status' => $status,
                'metrics' => $metrics,
            ];
        }

        $report = [
            'timestamp' => gmdate(DATE_ATOM),
            'hostname' => php_uname('n'),
            'repo' => basename(ROOTPATH),
            'git_branch' => trim((string) @shell_exec('git rev-parse --abbrev-ref HEAD 2>/dev/null')) ?: 'unknown',
            'summary' => [
                'platforms_total' => count($records),
                'stale_platforms' => count(array_filter($records, static fn ($r) => ! empty($r['stale']))),
            ],
            'records' => $records,
        ];

        $paths = $writer->writeControlPlaneReport($report);
        CLI::write('Control plane collect report written: ' . $paths['json'], 'green');
    }
}
