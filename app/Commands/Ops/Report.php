<?php

declare(strict_types=1);

namespace App\Commands\Ops;

use App\Services\Ops\EmailOpsService;
use App\Services\Ops\LogOpsService;
use App\Services\Ops\VpsHealthService;

class Report extends BaseOpsCommand
{
    protected $name = 'ops:report';
    protected $description = 'Single-pane operational summary for AIOps/dashboard/PR pipelines.';

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $health = (new VpsHealthService())->healthSnapshot();
        $logs = (new LogOpsService())->summarize((new LogOpsService())->scan(80));
        $email = (new EmailOpsService())->healthcheck();

        $score = 100;
        foreach (($health['cache_writable'] ?? []) as $ok) {
            if ($ok === false) { $score -= 10; }
        }
        if (($logs['severity']['error'] ?? 0) > 0) { $score -= 20; }
        if (($email['smtp_connectivity'] ?? false) === false) { $score -= 20; }

        $summary = [
            'health_score' => max(0, $score),
            'resource_pressure' => ['load_average' => $health['load_average'] ?? []],
            'error_trends' => $logs['severity'] ?? [],
            'email_status' => ['smtp_connectivity' => $email['smtp_connectivity'] ?? false],
            'recommended_actions' => [
                'Run ops:self-heal --dry-run before any production changes.',
                'Run logs:summarize after deploys and track top recurring errors.',
                'Review dreamhost:dns:verify weekly for SPF/DKIM/DMARC drift.',
            ],
            'github_pr_hook' => 'Consume docs/_aiops/reports/report-YYYY-MM-DD.json in CI to generate PR notes.',
        ];

        return $this->respond(['command'=>$this->name,'timestamp'=>gmdate('c'),'summary'=>$summary,'exit_code'=>EXIT_SUCCESS], 'reports', isset($flags['dry-run']), isset($flags['json']));
    }
}
