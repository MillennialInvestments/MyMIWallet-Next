<?php

namespace Config;

use App\Log\Handlers\DatabaseLoggerHandler;
use App\Log\Handlers\UnifiedLoggerHandler;
use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Log\Handlers\FileHandler;

class Logger extends BaseConfig
{
    public int|string|array $threshold = (ENVIRONMENT === 'production') ? 4 : 9;

    public string $dateFormat = 'Y-m-d H:i:s';

    public array $handlers = [
        FileHandler::class => [
            'class' => FileHandler::class,
            'levels' => ['critical', 'error', 'warning', 'info', 'debug'],
            'handles' => ['critical', 'error', 'warning', 'info', 'debug'],
            'path' => WRITEPATH . 'logs/',
            'fileExtension' => 'php',
            'filePermissions' => 0664,
        ],
        DatabaseLoggerHandler::class => [
            'class' => DatabaseLoggerHandler::class,
            'levels' => ['critical', 'error', 'warning'],
            'handles' => ['critical', 'error', 'warning'],
            'fallbackPath' => WRITEPATH . 'logs/',
        ],
        UnifiedLoggerHandler::class => [
            'class' => UnifiedLoggerHandler::class,
            'levels' => ['critical', 'error', 'warning', 'info', 'debug'],
            'handles' => ['critical', 'error', 'warning', 'info', 'debug'],
        ],
    ];
}
