<?php
// app/Config/Views.php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Views extends BaseConfig
{
    /**
     * Additional folders that contain view files.
     * Paths should point to folders that contain .php view files directly.
     */
    public array $paths = [
        APPPATH . 'Views',
        APPPATH . 'Modules/APIs/Views',
        APPPATH . 'Modules/Advertise/Views',
        APPPATH . 'Modules/Blog/Views',
        APPPATH . 'Modules/Docs/Views',
        APPPATH . 'Modules/Exchange/Views',
        APPPATH . 'Modules/Management/Views',
        APPPATH . 'Modules/Marketing_New/Views',
        APPPATH . 'Modules/ScriptStudio/Views',
        APPPATH . 'Modules/Search/Views',
        APPPATH . 'Modules/Support/Views',
        APPPATH . 'Modules/Template/Views',
        APPPATH . 'Modules/User/Views',
    ];

    /** The default renderer: leave as 'CodeIgniter\View\View' */
    public string $renderer = 'CodeIgniter\\View\\View';

    /** Leave these defaults unless you have a reason to change them */
    public bool $cache        = false;
    public string $cachePath  = WRITEPATH . 'cache/';
    public array $helpers     = [];
    public array $plugins     = [];
}
