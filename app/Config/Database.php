<?php

namespace Config;

use CodeIgniter\Database\Config;

/**
 * Database Configuration
 *
 * IMPORTANT RULES (DO NOT BREAK):
 * - NO env() calls in property declarations
 * - ALL dynamic values injected in constructor
 * - NO protocols (https://) in DB hostname
 * - Config must be PHP-constant safe
 */
class Database extends Config
{
    /**
     * The directory that holds the Migrations
     * and Seeds directories.
     */
    public string $filesPath = APPPATH . 'Database' . DIRECTORY_SEPARATOR;

    /**
     * Default connection group.
     */
    public string $defaultGroup = 'default';

    /**
     * Default database connection (STATIC ONLY).
     * Dynamic env values are injected in __construct().
     */
    public array $default = [];

    /**
     * Test database connection.
     */
    public array $tests = [
        'DSN'         => 'sqlite::memory:',
        'hostname'    => '',
        'username'    => '',
        'password'    => '',
        'database'    => ':memory:',
        'DBDriver'    => 'SQLite3',
        'DBPrefix'    => 'bf_',
        'pConnect'    => false,
        'DBDebug'     => true,
        'charset'     => 'utf8',
        'DBCollat'    => 'utf8_general_ci',
        'swapPre'     => '',
        'encrypt'     => false,
        'compress'    => false,
        'strictOn'    => false,
        'failover'    => [],
        'port'        => 0,
        'foreignKeys' => true,
        'busyTimeout' => 1000,
    ];

    /**
     * Inject env-based configuration safely.
     */
    public function __construct()
    {
        parent::__construct();

        $this->default = [
            'DSN'      => '',
            'hostname' => env('database.default.hostname', 'localhost'),
            'username' => env('database.default.username', 'root'),
            'password' => env('database.default.password', ''),
            'database' => env('database.default.database', ''),
            'DBDriver' => env('database.default.DBDriver', 'MySQLi'),
            'DBPrefix' => '',
            'pConnect' => false,
            'DBDebug'  => ENVIRONMENT !== 'production',
            'charset'  => 'utf8mb4',
            'DBCollat' => 'utf8mb4_general_ci',
            'swapPre'  => '',
            'encrypt'  => false,
            'compress' => false,
            'strictOn' => false,
            'failover' => [],
            'port'     => env('database.default.port', 3306),
        ];
    }

}
