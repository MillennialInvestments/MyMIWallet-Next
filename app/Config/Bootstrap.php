<?php
namespace Config;

use CodeIgniter\Config\BaseConfig;

class Bootstrap extends BaseConfig
{
    public function bootstrap()
    {
        if (class_exists(\Tbi\Gateway\GatewayServiceProvider::class)) {
            $this->registerProviders([\Tbi\Gateway\GatewayServiceProvider::class]);
        }
    }
}
