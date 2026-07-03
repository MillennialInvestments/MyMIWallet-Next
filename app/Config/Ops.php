<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Ops extends BaseConfig
{
    /**
     * Set to 'dreamhost' on vps33344.
     * Other values: 'generic'
     */
    public string $platform = 'dreamhost';

    /**
     * Home-scoped nginx prefix when you run user nginx (no sudo).
     */
    public string $homeNginxPrefix = '/home/mymiteam/nginx';

    /**
     * Where your site root lives.
     */
    public string $siteRoot = '/apps/TBI/www/mymiwallet/releases/20260628-132012';

    /**
     * Local ports you proxy to (your nginx 9001/9002 pattern).
     */
    public array $localHttpPorts = [9001, 9002];

    /**
     * Known DreamHost per-user socket candidates.
     */
    public array $dreamhostSocketCandidates = [
        '%HOME%/.php.sock',
        '%HOME%/.php82.sock',
        '%HOME%/.local/phpcgi/run/php-cgi-82.sock',
        '%HOME%/.local/phpcgi/run/php-cgi.sock',
        '%HOME%/.local/phpcgi/run/*.sock',
    ];
}
