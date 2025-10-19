<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Theme extends BaseConfig
{
    // Folder names under app/Views/themes/*
    public string $public    = 'public';
    public string $dashboard = 'dashboard';

    // Global asset base (adjust to your setup / CDN)
    public string $assetBase = '/assets';

    // Default theme (fallback)
    public string $default = 'public';
}
