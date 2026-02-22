<?php

namespace Config;

use App\Log\Handlers\DatabaseLoggerHandler;
use App\Log\Handlers\UnifiedLoggerHandler;
use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Log\Handlers\FileHandler;

class Logger extends BaseConfig
{
    public int|string|array $threshold = (ENVIRONMENT === 'production') ? 9 : 9;

    public string $dateFormat = 'Y-m-d H:i:s';

    public array $handlers = [
        FileHandler::class => [
            'class' => FileHandler::class,
            'handles' => ['debug', 'info', 'warning', 'error', 'critical'], // lightweight only
            'path' => WRITEPATH . 'logs/',
            'fileExtension' => 'php',
            'filePermissions' => 0664,
        ],

        DatabaseLoggerHandler::class => [
            'class' => DatabaseLoggerHandler::class,
            'handles' => ['critical', 'error', 'warning'], // production alerts
            'fallbackPath' => WRITEPATH . 'logs/',
        ],

        UnifiedLoggerHandler::class => [
            'class' => UnifiedLoggerHandler::class,
            'handles' => [], // disable until audited
        ],

    ];
}
