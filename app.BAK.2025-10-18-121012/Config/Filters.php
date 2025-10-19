<?php

namespace Config;

use CodeIgniter\Config\Filters as BaseFilters;

class Filters extends BaseFilters
{
    public array $aliases = [
        // Core
        'csrf'         => \CodeIgniter\Filters\CSRF::class,
        'toolbar'      => \CodeIgniter\Filters\DebugToolbar::class,
        'honeypot'     => \CodeIgniter\Filters\Honeypot::class,
        'invalidchars' => \CodeIgniter\Filters\InvalidChars::class,
        'secureheaders'=> \CodeIgniter\Filters\SecureHeaders::class,
        'forcehttps'   => \CodeIgniter\Filters\ForceHTTPS::class,
        'pagecache'    => \CodeIgniter\Filters\PageCache::class,
        'performance'  => \CodeIgniter\Filters\PerformanceMetrics::class,
        'cors'         => \CodeIgniter\Filters\Cors::class,

        // 🔐 Myth/Auth
        'login'        => \Myth\Auth\Filters\LoginFilter::class,
        'role'         => \Myth\Auth\Filters\RoleFilter::class,
        'permission'   => \Myth\Auth\Filters\PermissionFilter::class,
        'session'      => \Myth\Auth\Filters\SessionFilter::class,
    ];

    // Required filters (run even if no route matches)
    public array $required = [
        'before' => [
            // keep these only if you actually want them globally
            // comment out ones you don't need
            'forcehttps',
            'pagecache',
        ],
        'after' => [
            'pagecache',
            'performance',
            'toolbar',
        ],
    ];

    public array $globals = [
        'before' => [
            // 'honeypot',
            // 'csrf',
            // 'invalidchars',
            // 'cors',
        ],
        'after' => [
            // 'secureheaders',
        ],
    ];

    public array $methods = [];

    public array $filters = [];
}
