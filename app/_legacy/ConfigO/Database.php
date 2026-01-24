<?php

namespace Config;

use CodeIgniter\Database\Config;

/**
 * Database Configuration
 */
class Database extends Config
{
    /**
     * The directory that holds the Migrations
     * and Seeds directories.
     */
    public string $filesPath = APPPATH . 'Database' . DIRECTORY_SEPARATOR;

    /**
     * Lets you choose which connection group to
     * use if no other is specified.
     */
    public string $defaultGroup = 'default';

    /**
     * The default database connection.
     */
    public array $default = [
        'DSN'          => '',
        'hostname'     => 'mysql.mymiwallet.com',
        'username'     => 'mymiteam',
        'password'     => 'Dawg@073120.dawg',
        'database'     => 'mymiwallet',
        'DBDriver'     => 'MySQLi',
        'cacheOn'      => true,  // Enables query caching
        'cacheDir'     => WRITEPATH . 'database_cache/',
        'DBPrefix'     => '',
        'pConnect'     => false,
        'DBDebug'      => true,
        'charset'      => 'utf8mb4',
        'DBCollat'     => 'utf8mb4_unicode_ci',
        'swapPre'      => '',
        'encrypt'      => true,
        'compress'     => true,
        'strictOn'     => true,
        'failover'     => [],
        'port'         => 3306,
        'numberNative' => true,
        'timeout'      => 20,
    ];

    /**
     * This database connection is used when
     * running PHPUnit database tests.
     */
    public array $tests = [
        'DSN'         => '',
        'hostname'    => 'mysql.thegighop.com',
        'username'    => 'timoteo2392',
        'password'    => 'Dawg@239223',
        'database'    => 'thegighop',
        'DBDriver'    => 'SQLite3',
        'DBPrefix'    => 'bf_',  // Needed to ensure we're working correctly with prefixes live. DO NOT REMOVE FOR CI DEVS
        'pConnect'    => false,
        'DBDebug'     => true,
        'charset'     => 'utf8',
        'DBCollat'    => 'utf8_general_ci',
        'swapPre'     => '',
        'encrypt'     => true,
        'compress'    => true,
        'strictOn'    => true,
        'failover'    => [],
        'port'        => 3306,
        'foreignKeys' => true,
        'busyTimeout' => 1000,
    ];

    public function __construct()
    {
        parent::__construct();

        // Ensure that we always set the database group to 'tests' if
        // we are currently running an automated test suite, so that
        // we don't overwrite live data on accident.
        if (ENVIRONMENT === 'testing') {
            $this->defaultGroup = 'tests';
        }
    }
}
