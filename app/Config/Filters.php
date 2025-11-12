<?php

namespace Config;

use CodeIgniter\Config\Filters as BaseFilters;
use CodeIgniter\Filters\Cors;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\ForceHTTPS;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\PageCache;
use CodeIgniter\Filters\PerformanceMetrics;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseFilters
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array<string, class-string|list<class-string>>
     *
     * [filter_name => classname]
     * or [filter_name => [classname1, classname2, ...]]
     */
    public array $aliases = [
        'cronKey'       => \App\Filters\CronKeyFilter::class,
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'cors'          => Cors::class,
        'forcehttps'    => ForceHTTPS::class,
        'pagecache'     => PageCache::class,
        'performance'   => PerformanceMetrics::class,

        // Myth:Auth filters
        'login'      => \Myth\Auth\Filters\LoginFilter::class,
        'role'       => \Myth\Auth\Filters\RoleFilter::class,
        'permission' => \Myth\Auth\Filters\PermissionFilter::class,

    ];

    /**
     * List of special required filters.
     *
     * The filters listed here are special. They are applied before and after
     * other kinds of filters, and always applied even if a route does not exist.
     *
     * Filters set by default provide framework functionality. If removed,
     * those functions will no longer work.
     *
     * @see https://codeigniter.com/user_guide/incoming/filters.html#provided-filters
     *
     * @var array{before: list<string>, after: list<string>}
     */
    public array $required = [
        'before' => [
            'forcehttps', // Force Global Secure Requests
            'pagecache',  // Web Page Caching
        ],
        'after' => [
            'pagecache',   // Web Page Caching
            'performance', // Performance Metrics
            'toolbar',     // Debug Toolbar
        ],
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array{
     *     before: array<string, array{except: list<string>|string}>|list<string>,
     *     after: array<string, array{except: list<string>|string}>|list<string>
     * }
     */
    public array $globals = [
        'before' => [
            // 'csrf' => [
            //     'authcheck' => [
            //         'except' => [
            //             'login',
            //             'register',
            //             'forgot',
            //             'reset',
            //             'forgot-password',
            //             'reset-password',
            //             'Auth/forgot-password',
            //             'Auth/reset-password',
            //             'activate-account',
            //             'activate-account/*',
            //             'Auth/activate-account',
            //             'Auth/activate-account/*',
            //             '/Apex/*',
            //             '/API/*',
            //             '/API/Management/*',
            //             '/APIs/*',
            //             'About-Us',
            //             'Blog',
            //             '/Blog/*',
            //             'Corporate-Earnings',
            //             '/Corporate-Earnings/*',
            //             'Economic-Calendar',
            //             '/Economic-Calendar/*',
            //             'Getting-Started',
            //             '/Getting-Started/*',
            //             '/How-It-Works',
            //             '/How-It-Works/*',
            //             '/Memberships',
            //             '/Memberships/*',
            //             '/Preview/*',
            //             '/Privacy-Policy',
            //             '/Terms-Of-Service',
            //             '/TBI',
            //             '/TBI/*',
            //             '/Tim',
            //             '/Tim/*',
            //             '/Discord',
            //             '/Discord/*',
            //             '/Facebook',
            //             '/Facebook/*',
            //             '/ITT',
            //             '/ITT/*',
            //             '/Monetized-Creators',
            //             '/Monetized-Creators/*',
            //             '/Alicia',
            //             '/Alicia/*',
            //             '/AnneAlicia',
            //             '/AnneAlicia/*',
            //             '/Deon',
            //             '/Deon/*',
            //             '/Dubose',
            //             '/Dubose/*',
            //             '/Jasmine',
            //             '/Jasmine/*',
            //             '/Jailin',
            //             '/Jailin/*',
            //             '/Jeremy',
            //             '/Jeremy/*',
            //             '/Kristie',
            //             '/Kristie/*',
            //             '/Ken',
            //             '/Ken/*',
            //             '/Manee',
            //             '/Manee/*',
            //             '/MattCardon',
            //             '/MattCardon/*',
            //             '/MattHill',
            //             '/MattHill/*',
            //             '/Michael',
            //             '/Michael/*',
            //             '/LinkedIn',
            //             '/LinkedIn/*',
            //             '/Support',
            //             '/Support/*',
            //             '/Twitter',
            //             '/Twitter/*',
            //             '/X',
            //             '/X/*',
            //             '/YouTube',
            //             '/YouTube/*',
            //             '/',
            //         ],
            //     ],
            //     'except' => [
            //         'register',
            //         'Discord/register',
            //         'Facebook/register',
            //         'Monetized-Content/register',
            //         'ITT/register',
            //         'Solana/register',
            //         'TBI/register',
            //         'Manee/register',
            //         'Twitter/register',
            //         'X/register',
            //         'Budget/Account-Manager',
            //         'Management/Marketing/fetchMissingLogos',
            //         'Investments/Account-Manager',
            //         'Projects/Add',
            //         'API/Alerts/*',
            //         'API/Management/*',
            //         'API/Webhooks/*',
            //         'Management/Users',
            //         'Management/Users/*',
            //         // 'Exchange/Solana/fetchFrontendData',
            //         'activate-account',
            //         'activate-account/*',
            //         'Auth/activate-account',
            //         'Auth/activate-account/*',
            //         'index.php/Exchange/Solana/fetchFrontendData',
            //         'Exchange/Solana/fetchFrontendData',
            //         'index.php/Exchange/Solana/provisionDefaultWallet',
            //         'Exchange/Solana/provisionDefaultWallet',
            //     ],
            // ],            
            'login' => [
                'before' => [
                    'Account',
                    'Account/*',
                    'Alerts',
                    'Alerts/*',
                    'API',
                    'API/*',
                    'Budget',
                    'Budget/*',
                    'Dashboard',
                    'Dashboard/*',
                    'Exchange',
                    'Exchange/*',
                    'Investments',
                    'Investments/*',
                    'Management',
                    'Management/*',
                    'My-Investments',
                    'My-Trades',
                    'My-Referrals',
                    'My-Referrals/*',
                    'MyMI-Gold',
                    'MyMI-Gold/*',
                    'MyMI-Wallet',
                    'MyMI-Wallet/*',
                    'Referrals',
                    'Referrals/*',
                    'Trade-Tracker',
                    'Trade-Tracker/*',
                    'Wallets',
                    'Wallets/*',
                ],
            ],
            // 'honeypot',
            // 'csrf',
            // 'invalidchars',
        ],
        'after' => [
            // 'honeypot',
            // 'secureheaders',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'POST' => ['foo', 'bar']
     *
     * If you use this, you should disable auto-routing because auto-routing
     * permits any HTTP method to access a controller. Accessing the controller
     * with a method you don't expect could bypass the filter.
     *
     * @var array<string, list<string>>
     */
    public array $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array<string, array<string, list<string>>>
     */
    public array $filters = [];
}
