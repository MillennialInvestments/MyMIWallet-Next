<?php

declare(strict_types=1);

namespace App\Commands\Ops\Logs;

use App\Commands\Ops\BaseOpsCommand;
use App\Services\Ops\AiOpsArtifactService;
use App\Services\Ops\LogOpsService;

class Watch extends BaseOpsCommand
{
    protected $name = 'logs:watch';
    protected $description = 'Poll logs in finite cycles with restart-safe cursor state.';
    protected $usage = 'logs:watch [intervalSeconds] [cycles] [--json] [--dry-run]';

    public function run(array $params)
    {
        [$args, $flags] = $this->parseParams($params);
        $interval = isset($args[0]) ? max(30, (int) $args[0]) : 60;
        $cycles = isset($args[1]) ? max(1, (int) $args[1]) : 1;
        $svc = new LogOpsService();
        $artifact = new AiOpsArtifactService();
        $events = [];

        for ($i = 0; $i < $cycles; $i++) {
            $scan = $svc->scan(50);
            $sum = $svc->summarize($scan);
            $events[] = ['cycle' => $i + 1, 'summary' => $sum, 'ts' => gmdate('c')];
            if ($i < $cycles - 1) {
                sleep($interval);
            }
        }

        $artifact->writeJson('logs/watch-cursor.json', ['updated_at' => gmdate('c'), 'cycles' => $cycles], isset($flags['dry-run']));

        return $this->respond(['command'=>$this->name,'timestamp'=>gmdate('c'),'summary'=>['interval'=>$interval,'cycles'=>$cycles,'events'=>$events],'exit_code'=>EXIT_SUCCESS], 'logs/watch', isset($flags['dry-run']), isset($flags['json']));
    }
}
