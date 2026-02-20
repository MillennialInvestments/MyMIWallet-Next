<?php

declare(strict_types=1);

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Infrastructure extends BaseConfig
{
    public bool $enabled = false;
    public bool $overlayStrictMode = false;
    public bool $allowMissingRedis = true;
    public bool $allowMissingDbTables = true;
    public string $baselinePath = ROOTPATH . 'infrastructure/tbi-ci4-core';
    public string $reportPath = ROOTPATH . 'infrastructure/tbi-ci4-core/docs/_infrastructure';
}
