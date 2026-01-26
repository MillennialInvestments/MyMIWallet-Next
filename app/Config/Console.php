<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Console extends BaseConfig
{
    public array $commands = [
        \App\Commands\AppUpdate::class,
    ];

    public bool $showHelp = true;
}
