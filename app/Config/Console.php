<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Console extends BaseConfig
{
    public array $commands = [
        \App\Commands\AppUpdate::class,
        \App\Commands\Ops\CommandsAudit::class,
        \App\Commands\Ops\CommandsAutofix::class,
        \App\Commands\Ops\CommandsInventory::class,
        \App\Commands\Ops\CommandsLint::class,
        \App\Commands\Ops\NextSteps::class,
        \App\Commands\Ops\NextStepsSync::class,
        \App\Commands\Ops\SparkReset::class,
        \App\Commands\OpsWork::class,
        \App\Commands\Runtime\SparkDoctor::class,
        \App\Commands\Runtime\SparkDoctorRuntime::class,
        \App\Commands\Runtime\Diagnose502::class,
        \App\Commands\Runtime\Triage::class,
        \App\Commands\Runtime\CacheBoot::class,
        \App\Commands\Config\Drift::class,
        \App\Commands\Diagnose503::class,
        \App\Commands\PurgeFastCGI::class,
        \App\Commands\RestartSafe::class,
        \App\Commands\TrafficSpikeGuard::class,
        \App\Commands\Database\Drift::class,
        \App\Commands\Security\SecretsAudit::class,
        \App\Commands\Marketing\AutomationAudit::class,
        \App\Commands\Growth\RetentionWatch::class,
        \App\Commands\Ux\JourneyAudit::class,
        \App\Commands\Revenue\CostForecast::class,
    ];

    public bool $showHelp = true;
}
