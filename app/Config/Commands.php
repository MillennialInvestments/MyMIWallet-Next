<?php

declare(strict_types=1);

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Commands extends BaseConfig
{
    /**
     * @var array<string, class-string>
     */
    public $commands = [
        'auth:baseline:capture' => \App\Commands\Auth\BaselineCapture::class,
        'auth:baseline:diff' => \App\Commands\Auth\BaselineDiff::class,
        'auth:baseline:restore' => \App\Commands\Auth\BaselineRestore::class,
        'auth:surface:scan' => \App\Commands\Auth\SurfaceScan::class,
        'auth:smoke' => \App\Commands\Auth\Smoke::class,
        'docs:inventory-forms' => \App\Commands\Docs\Generate\FormInventory::class,
    ];
}
