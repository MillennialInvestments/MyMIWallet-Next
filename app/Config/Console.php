<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Console extends BaseConfig
{
    public array $commands = [
        \App\Commands\AppUpdate::class,
        \App\Commands\Ops\CommandsAudit::class,
        \App\Commands\Ops\CommandsAutofix::class,
    ];

    public bool $showHelp = true;
}
