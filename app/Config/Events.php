<?php

namespace Config;

use App\Libraries\DevHotReload;
use App\Libraries\SystemEventBootstrap;
use CodeIgniter\Events\Events;

/*
|--------------------------------------------------------------------------
| Application Events
|--------------------------------------------------------------------------
| IMPORTANT:
| This file must be CONFIG CACHE SAFE.
| Do not execute runtime logic while CI is building config cache.
|--------------------------------------------------------------------------
*/

// 🚨 HARD STOP during config cache generation
if (defined('CI_BUILDING_CONFIG_CACHE')) {
    return;
}

Events::on('pre_system', static function (): void {
    SystemEventBootstrap::preSystem();
});

if (ENVIRONMENT === 'development') {
    Events::on('pre_system', static function (): void {
        DevHotReload::register();
    });
}
