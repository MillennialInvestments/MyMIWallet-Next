<?php

declare(strict_types=1);

namespace App\Commands\Ops\PHP;

use App\Commands\Ops\BaseOpsCommand;
use App\Services\Ops\VpsHealthService;

class FpmHealth extends BaseOpsCommand
{
    protected $name = 'ops:php:fpm:health';
    protected $description = 'PHP-FPM runtime integrity checks.';

    public function run(array $params)
    {
        [, $flags] = $this->parseParams($params);
        $summary = (new VpsHealthService())->phpFpmHealth();
        return $this->respond(['command'=>$this->name,'timestamp'=>gmdate('c'),'summary'=>$summary,'exit_code'=>EXIT_SUCCESS], 'commands/ops-php-fpm-health', isset($flags['dry-run']), isset($flags['json']));
    }
}
