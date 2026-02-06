<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Debug extends BaseConfig
{
    /**
     * Disable Kint in CLI, CI, and production.
     */
    public bool $enableKint = false;

    /**
     * Never auto-load debug helpers in CLI.
     */
    public bool $showToolbar = false;

    /**
     * Safety: never load dev-only helpers implicitly.
     */
    public array $toolbarCollectors = [];
}
