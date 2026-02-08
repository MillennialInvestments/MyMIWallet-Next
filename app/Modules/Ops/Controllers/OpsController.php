<?php

declare(strict_types=1);

namespace App\Modules\Ops\Controllers;

use App\Controllers\Api\InternalApiController;
use App\Services\Ops\SparkRunnerService;

class OpsController extends InternalApiController
{
    public function healthcheck()
    {
        $runner = new SparkRunnerService();
        $result = $runner->run('app:healthcheck');

        return $this->jsonOk($result, ['endpoint' => 'ops.healthcheck']);
    }

    public function appUpdate()
    {
        $runner = new SparkRunnerService();
        $dryRun = (int) ($this->request->getGetPost('dry_run') ?? 1);
        $approve = (int) ($this->request->getGetPost('approve') ?? 0);

        $result = $runner->run('ops:app:update', [], ['json' => 1, 'dry_run' => $dryRun, 'approve' => $approve]);
        if ($result['output'] === '') {
            $result = $runner->run('ops:app:update', [], ['dry_run' => $dryRun, 'approve' => $approve]);
        }

        return $this->jsonOk($result, ['endpoint' => 'ops.app.update']);
    }

    public function commands()
    {
        $commands = [
            'app:healthcheck',
            'ops:app:update',
            'aiops:audit',
            'aiops:status',
            'aiops:watch',
            'logs:summarize',
            'contentengine:smoke',
            'chat:audit',
        ];

        $auditDoc = ROOTPATH . 'docs/aiops/triage/spark-command-audit.md';
        $hint = is_file($auditDoc) ? 'spark-command-audit.md available' : 'curated fallback list';

        return $this->jsonOk(['commands' => $commands, 'hint' => $hint], ['endpoint' => 'ops.commands']);
    }
}
