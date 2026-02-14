<?php

namespace Config;

use CodeIgniter\Commands\Commands as BaseCommands;

class Commands extends BaseCommands
{
    public $commands = [
        'generate:vapid_keys' => \App\Commands\GenerateVapidKeys::class,
        'alerts:fetch' => App\Commands\FetchAlertsCommand::class,
        'seo:generate-sitemap' => \App\Commands\GenerateSitemap::class,
    ];

    // Other configurations...
}
