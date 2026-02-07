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
    public array $default = [
        'DSN'          => '',
        'hostname'     => 'localhost',
        'username'     => '',
        'password'     => '',
        'database'     => '',
        'DBDriver'     => 'MySQLi',

        // Performance / behavior
        'cacheOn'      => true,
        'cacheDir'     => WRITEPATH . 'database_cache/',
        'DBPrefix'     => '',
        'pConnect'     => false,
        'DBDebug'      => true,

        // Charset / collation
        'charset'      => 'utf8mb4',
        'DBCollat'     => 'utf8mb4_unicode_ci',

        // Safety / compatibility
        'swapPre'      => '',
        'encrypt'      => false,
        'compress'     => false,
        'strictOn'     => true,
        'failover'     => [],
        'port'         => 3306,
        'numberNative' => true,
        'timeout'      => 20,
    ];

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

        // Inject env values (runtime-safe)
        $this->default['hostname'] = env('database.default.hostname', 'localhost');
        $this->default['username'] = env('database.default.username', '');
        $this->default['password'] = env('database.default.password', '');
        $this->default['database'] = env('database.default.database', '');
        $this->default['port']     = (int) env('database.default.port', 3306);

        // HARD GUARD: never allow protocol-based DB hosts
        if (str_contains($this->default['hostname'], '://')) {
            throw new \RuntimeException(
                'Invalid DB hostname detected (protocol not allowed): ' . $this->default['hostname']
            );
        }

        // Force test DB when appropriate
        if (ENVIRONMENT === 'testing') {
            $this->defaultGroup = 'tests';
        }
    }
}
