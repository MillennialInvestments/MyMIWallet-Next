<?php
namespace Config;

use CodeIgniter\Config\BaseConfig;

class Bootstrap extends BaseConfig
{
    public function bootstrap()
    {
        // If the gateway service provider class exists, register it.
        if (class_exists(\Tbi\Gateway\GatewayServiceProvider::class)) {
            $this->registerProviders([\Tbi\Gateway\GatewayServiceProvider::class]);
        }
    }
}
