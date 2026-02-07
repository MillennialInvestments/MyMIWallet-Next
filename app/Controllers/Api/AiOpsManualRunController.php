<?php

declare(strict_types=1);

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;

class AiOpsManualRunController extends BaseController
{
    use ResponseTrait;

    public function run(): ResponseInterface
    {
        $runId = gmdate('YmdHis') . '-' . bin2hex(random_bytes(3));
        $logDir = WRITEPATH . 'triage/aiops';
        if (! is_dir($logDir)) {
            mkdir($logDir, 0775, true);
        }

        $logPath = $logDir . '/manual-run-' . $runId . '.log';
        $cmd = sprintf(
            'nohup php spark aiops:manual-run --limit-tasks=1 --limit-errors=3 --create-pr=1 --notify=1 > %s 2>&1 & echo $!',
            escapeshellarg($logPath)
        );
        $pid = trim((string) shell_exec($cmd));

        return $this->respond([
            'status' => 'queued',
            'message' => 'AIOPS manual run started.',
            'run_id' => $runId,
            'pid' => $pid,
            'log_path' => str_replace(ROOTPATH, '', $logPath),
        ]);
    }
}
