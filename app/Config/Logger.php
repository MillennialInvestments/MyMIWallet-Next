<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Log\Handlers\FileHandler;
use App\Log\Handlers\MyMIDBLoggerHandler;
use App\Log\Handlers\DatabaseLoggerHandler;
use App\Log\Handlers\UnifiedLoggerHandler;

class Logger extends BaseConfig
{
    public int|string|array $threshold = 4;

    public string $dateFormat = 'Y-m-d H:i:s';

    public array $handlers = [

        FileHandler::class => [
            'class' => FileHandler::class,
            'handles' => ['debug','info','notice','warning','error','critical','alert','emergency'],
            'path' => WRITEPATH . 'logs/',
            'fileExtension' => 'php',
            'filePermissions' => 0664,
        ],

        MyMIDBLoggerHandler::class => [
            'class' => MyMIDBLoggerHandler::class,
            'handles' => ['warning','error','critical','alert','emergency'],
        ],

        DatabaseLoggerHandler::class => [
            'class' => DatabaseLoggerHandler::class,
            'handles' => [],
        ],

        UnifiedLoggerHandler::class => [
            'class' => UnifiedLoggerHandler::class,
            'handles' => [],
        ],
    ];
}