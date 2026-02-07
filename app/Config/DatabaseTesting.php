<?php

namespace Config;

use CodeIgniter\Database\Config;

class DatabaseTesting extends Config
{
    public string $defaultGroup = 'testing';

    public array $testing = [
        'DSN'      => '',
        'hostname' => 'localhost',
        'username' => 'root',
        'password' => '',
        'database' => 'ci4_testing',
        'DBDriver' => 'SQLite3',
        'databaseFile' => ':memory:',
        'DBPrefix' => '',
        'pConnect' => false,
        'DBDebug'  => false,
        'charset'  => 'utf8',
        'DBCollat' => 'utf8_general_ci',
        'swapPre'  => '',
        'encrypt'  => false,
        'compress' => false,
        'strictOn' => false,
        'failover' => [],
        'port'     => 0,
    ];
}
