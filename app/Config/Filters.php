<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseConfig
{
    public function __construct()
    {
        parent::__construct();

        if (ENVIRONMENT === 'development') {
            if (! in_array('toolbar', $this->globals['after'], true)) {
                $this->globals['after'][] = 'toolbar';
            }

            return;
        }

        $this->globals['after'] = array_values(array_filter(
            $this->globals['after'],
            static fn (string $filter): bool => $filter !== 'toolbar'
        ));
    }

    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array<string, class-string|list<class-string>> [filter_name => classname]
     *                                                     or [filter_name => [classname1, classname2, ...]]
     */
    public array $aliases = [
        // PATCH: session security filters
        'responsecache' => \CodeIgniter\Filters\ResponseCache::class,
        'sessionTracker'  => \App\Filters\SessionTrackerFilter::class,
        'sessionRevoked'  => \App\Filters\SessionRevokedFilter::class,
        // PATCH: register RBAC permission filter
        'permission'     => \App\Filters\PermissionFilter::class,
        'role' => \App\Filters\PermissionFilter::class,
        // PATCH: API token authentication filter
        'apiToken'       => \App\Filters\ApiTokenAuthFilter::class,
        'internalToken' => \App\Filters\InternalTokenFilter::class,
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
        'maintenance'   => \App\Filters\MaintenanceModeFilter::class,
        'login'         => \App\Filters\LoginFilter::class,
        'authcheck'     => \App\Filters\AuthCheckFilter::class,
        'csrf'          => \App\Filters\CsrfDebugFilter::class,
        'auth'          => \App\Filters\AuthFilter::class,  
        'cronKey'       => \App\Filters\CronKeyFilter::class,   
        'noStore'       => \App\Filters\NoStoreFilter::class,
        'no-cache'      => \App\Filters\NoCacheFilter::class,
        // 'csp'           => \App\Filters\CspFilter::class,
        
        'cspoff'        => \App\Filters\CspOff::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        // 'secureheaders' => SecureHeaders::class,
        // Safe no-op filter to satisfy routes that reference "except"
        'except'        => \App\Filters\ExceptFilter::class,
        'requestLifecycle' => \App\Filters\RequestLifecycleLogger::class,
        'botBlocker'    => \App\Filters\BotBlocker::class,
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array<string, array<string, array<string, string>>>|array<string, list<string>>
     */
    public array $globals = [
        'before' => [
            'maintenance' => [
                'except' => [
                    'Maintenance',
                    'Support',
                    'Support/*',
                    'API/*',
                    'api/*',
                    'Management/*',
                    'Ops/*',
                    'chat/*',
                ],
            ],
            // PATCH: request observability
            'botBlocker',
            'requestLifecycle',
            'observability',
            'ratelimit',
            'sessionRevoked',
            'csrf' => [
                'except' => [
                    'API/*',
                    'api/*',
                    'debugbar*',
                    '_debugbar*',
                    'test-403',
                    'test-404',
                    'test-500',
                    'test-504',
                ],
            ],
            // 'csrf' => [
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
            'authcheck' => [
                'except' => [
                    'login',
                    'register',
                    'register/*',
                    '*/register',
                    '*/register/*',
                    'register/success',
                    'forgot',
                    'reset',
                    'forgot-password',
                    'reset-password',
                    'activate',
                    'activate/*',
                    'health',
                    'healthz',
                    'system/healthz',
                    'system/diag',
                    'status',
                    'landing',
                    'landing/*',
                    'api/health',
                    'API/Health',
                    'API/health',
                    'Auth/forgot-password',
                    'Auth/reset-password',
                    'activate-account',
                    'activate-account/*',
                    'resend-activation',
                    'resend-activate-account',
                    'Auth/activate-account',
                    'Auth/activate-account/*',
                    'auth/provider/*',
                    'auth/provider/*/callback',
                    'Auth/provider/*',
                    'Auth/provider/*/callback',
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
                    'pricing',
                    '/Memberships',
                    '/Memberships/*',
                    '/Preview/*',
                    '/Privacy-Policy',
                    '/Terms-Of-Service',
                    'Blog',
                    'Blog/*',
                    'blog',
                    'blog/*',
                    'News',
                    'News/*',
                    'news',
                    'news/*',
                    'Support',
                    'Support/*',
                    'help/account',
                    'help/account/*',
                    '/help/account',
                    '/help/account/*',
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
                    'debugbar*',
                    '_debugbar*',
                ],
            ],

        ],
        'after' => [
            // 'csp' => ['except' => ['API/*', 'assets/*']],
            'cspoff',
            'sessionTracker',
            'requestLifecycle',
            'observability',
            'jsonException',
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
    public array $filters = [

        'login' => [
            'before' => [
                'Dashboard',
                'Dashboard/*',
                'Account',
                'Account/*',
                'Budget',
                'Budget/*',
                'Investments',
                'Investments/*',
                'Wallets',
                'Wallets/*',
            ],
        ],

        'no-cache' => [
            'after' => [
                'login',
                'logout',
                'auth/*',
                'Auth/*',
                'forgot',
                'forgot-password',
                'reset-password',
                'activate',
                'activate-account',
                'activate-account/*',
                'resend-activation',
                'resend-activate-account',
            ],
        ],
        'cronKey' => [
            'before' => [
                'API/Alerts/fetchEmailAlerts',
                'API/Alerts/distributeAlerts',
                'API/Alerts/sendDiscordAlerts',
                'API/Alerts/processBrokerEmails',
                'API/Alerts/processAllEmails',
                'API/Alerts/fetchEmailsOnly',
                'API/Alerts/sendDiscordAlertsBySymbol',
                'API/Alerts/sendDiscordAlertsBySymbol/*',
            ],
        ],
        'csrf' => [
            'before' => [
                'login',
                'logout',
                'register',
                'register/*',
                '*/register',
                '*/register/*',
                'forgot',
                'forgot-password',
                'reset-password',
                'activate',
                'activate-account',
                'activate-account/*',
                'resend-activation',
                'resend-activate-account',
                'Auth/*',
                'get2FAQRCode',
                'verify2FACode',
            ],
            'except' => [
                'API/*',
                'api/*',
                'debugbar*',
                '_debugbar*',
            ],
        ],
    ];
}
