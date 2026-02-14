<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array<string, class-string|list<class-string>> [filter_name => classname]
     *                                                     or [filter_name => [classname1, classname2, ...]]
     */
    public array $aliases = [
        // PATCH: session security filters
        'sessionTracker'  => \App\Filters\SessionTrackerFilter::class,
        'sessionRevoked'  => \App\Filters\SessionRevokedFilter::class,
        // PATCH: register RBAC permission filter
        'permission'     => \App\Filters\PermissionFilter::class,
        // PATCH: API token authentication filter
        'apiToken'       => \App\Filters\ApiTokenAuthFilter::class,
        // PATCH: feature flag route filter
        'feature'        => \App\Filters\FeatureFlagFilter::class,
        // PATCH: anti-abuse filters
        'ratelimit'     => \App\Filters\RateLimitFilter::class,
        'captcha'       => \App\Filters\CaptchaFilter::class,
        'emailVerified' => \App\Filters\EmailVerifiedFilter::class,
        'idempotency'  => \App\Filters\IdempotencyFilter::class,
        // PATCH: observability filters
        'observability' => \App\Filters\ObservabilityFilter::class,
        'jsonException' => \App\Filters\JsonExceptionFilter::class,
        'login'         => \App\Filters\LoginFilter::class,
        'authcheck'     => \App\Filters\AuthCheckFilter::class,
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array<string, array<string, array<string, string>>>|array<string, list<string>>
     */
    public array $globals = [
        'before' => [
            // PATCH: request observability
            'observability',
            'sessionRevoked',
            'csrf' => [
                'except' => [
                    'register',
                    'Discord/register',
                    'Facebook/register',
                    'Monetized-Content/register',
                    'ITT/register',
                    'Solana/register',
                    'TBI/register',
                    'Manee/register',
                    'Twitter/register',
                    'X/register',
                    'Budget/Account-Manager',
                    'Management/Marketing/fetchMissingLogos',
                    'Investments/Account-Manager',
                    'Projects/Add',
                    'API/Alerts/*',
                    'API/Management/*',
                    'API/Webhooks/*',
                    'Management/Users',
                    'Management/Users/*',
                    // 'Exchange/Solana/fetchFrontendData',
                    'activate-account',
                    'activate-account/*',
                    'Auth/activate-account',
                    'Auth/activate-account/*',
                    'index.php/Exchange/Solana/fetchFrontendData',
                    'Exchange/Solana/fetchFrontendData',
                    'index.php/Exchange/Solana/provisionDefaultWallet',
                    'Exchange/Solana/provisionDefaultWallet',
                ],
            ],
            'authcheck' => [
                'except' => [
                    'login',
                    'register',
                    'forgot',
                    'reset',
                    'forgot-password',
                    'reset-password',
                    'Auth/forgot-password',
                    'Auth/reset-password',
                    'activate-account',
                    'activate-account/*',
                    'Auth/activate-account',
                    'Auth/activate-account/*',
                    '/Apex/*',
                    '/API/*',
                    '/API/Management/*',
                    '/APIs/*',
                    'About-Us',
                    'Blog',
                    '/Blog/*',
                    'Corporate-Earnings',
                    '/Corporate-Earnings/*',
                    'Economic-Calendar',
                    '/Economic-Calendar/*',
                    'Getting-Started',
                    '/Getting-Started/*',
                    '/How-It-Works',
                    '/How-It-Works/*',
                    '/Memberships',
                    '/Memberships/*',
                    '/Preview/*',
                    '/Privacy-Policy',
                    '/Terms-Of-Service',
                    '/TBI',
                    '/TBI/*',
                    '/Tim',
                    '/Tim/*',
                    '/Discord',
                    '/Discord/*',
                    '/Facebook',
                    '/Facebook/*',
                    '/ITT',
                    '/ITT/*',
                    '/Monetized-Creators',
                    '/Monetized-Creators/*',
                    '/Alicia',
                    '/Alicia/*',
                    '/AnneAlicia',
                    '/AnneAlicia/*',
                    '/Deon',
                    '/Deon/*',
                    '/Dubose',
                    '/Dubose/*',
                    '/Jasmine',
                    '/Jasmine/*',
                    '/Jailin',
                    '/Jailin/*',
                    '/Jeremy',
                    '/Jeremy/*',
                    '/Kristie',
                    '/Kristie/*',
                    '/Ken',
                    '/Ken/*',
                    '/Manee',
                    '/Manee/*',
                    '/MattCardon',
                    '/MattCardon/*',
                    '/MattHill',
                    '/MattHill/*',
                    '/Michael',
                    '/Michael/*',
                    '/LinkedIn',
                    '/LinkedIn/*',
                    '/Support',
                    '/Support/*',
                    '/Twitter',
                    '/Twitter/*',
                    '/X',
                    '/X/*',
                    '/YouTube',
                    '/YouTube/*',
                    '/',
                ],
            ],

        ],
        'after' => [
            'sessionTracker',
            'observability',
            'jsonException',
            'toolbar',
            // 'honeypot',
            // 'secureheaders',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['foo', 'bar']
     *
     * If you use this, you should disable auto-routing because auto-routing
     * permits any HTTP method to access a controller. Accessing the controller
     * with a method you don't expect could bypass the filter.
     */
    public array $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     */
    public array $filters = [];
}
