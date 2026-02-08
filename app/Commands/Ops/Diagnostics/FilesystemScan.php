<?php

declare(strict_types=1);

namespace App\Commands\Ops\Diagnostics;

use App\Commands\Ops\BaseOpsCommand;
use App\Services\Ops\VpsHealthService;

class FilesystemScan extends BaseOpsCommand
{
    protected $name = 'ops:filesystem:scan';
    protected $description = 'Detect permission/ownership and path health failures.';
    protected $usage = 'ops:filesystem:scan [minutes] [--json] [--dry-run]';

    public function run(array $params)
    {
        [$args, $flags] = $this->parseParams($params);
        $minutes = isset($args[0]) ? max(1, (int) $args[0]) : 60;
        $summary = (new VpsHealthService())->filesystemScan($minutes);
        $summary['window_minutes'] = $minutes;

        return $this->respond(['command'=>$this->name,'timestamp'=>gmdate('c'),'summary'=>$summary,'exit_code'=>EXIT_SUCCESS], 'commands/ops-filesystem-scan', isset($flags['dry-run']), isset($flags['json']));
    }
}
