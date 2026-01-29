<?php

declare(strict_types=1);

namespace Config;

use CodeIgniter\Config\BaseConfig;

class AiOps extends BaseConfig
{
    public bool $safe_mode = true;

    public function __construct()
    {
        $env = env('AIOPS_SAFE_MODE');
        if ($env !== null && $env !== '') {
            $this->safe_mode = filter_var($env, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) ?? true;
        }
    }
}
