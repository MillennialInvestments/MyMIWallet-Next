<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class App extends BaseConfig
{
    /**
     * --------------------------------------------------------------------------
     * Base Site URL
     * --------------------------------------------------------------------------
     */
    public string $baseURL = 'https://www.mymiwallet.com/';

    /**
     * Allowed Hostnames
     *
     * @var list<string>
     */
    public array $allowedHostnames = [];

    /**
     * Index File
     */
    public string $indexPage = '';

    /**
     * URI Protocol
     */
    public string $uriProtocol = 'REQUEST_URI';

    /**
     * Allowed URL Characters
     */
    public string $permittedURIChars = 'a-z 0-9~%.:_\-\(\)';

    /**
     * Locale Settings
     */
    public string $defaultLocale = 'en';
    public bool   $negotiateLocale = false;
    public array  $supportedLocales = ['en'];

    /**
     * Timezone / Charset
     */
    public string $appTimezone = 'UTC';
    public string $charset     = 'UTF-8';

    /**
     * Configuration / Autoloader Optimization
     */
    public bool $cacheConfig        = false;
    public bool $optimizeAutoloader = false;

    /**
     * Force HTTPS
     */
    public bool $forceGlobalSecureRequests = true;

    /**
     * Reverse Proxy IPs
     *
     * @var array<string, string>
     */
    public array $proxyIPs = [];

    /**
     * Content Security Policy
     */
    public bool $CSPEnabled = false;

    /**
     * Cookies
     */
    public string $cookiePrefix   = '';
    public string $cookieDomain   = '.mymiwallet.com';
    public string $cookiePath     = '/';
    public bool   $cookieSecure   = true;
    public bool   $cookieHTTPOnly = true;
    public string $cookieSameSite = 'Lax';

    /**
     * Debug / Maintenance
     */
    public bool $debugHUD        = false;
    public bool $maintenanceMode = false;
    public bool $enableKint      = false;
    public string $appOverridesFolder = '';

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();

        // CI guard helper (safe include)
        if (! function_exists('is_ci')) {
            require APPPATH . 'Helpers/ci_guard_helper.php';
        }

        // Base URL override
        $baseURL = env('app.baseURL');
        if (! empty($baseURL)) {
            $this->baseURL = rtrim($baseURL, '/') . '/';
        }

        // Index page
        $this->indexPage = (string) env('app.indexPage', $this->indexPage);

        // Feature flags
        $this->debugHUD = filter_var(
            env('app.debugHUD', $this->debugHUD),
            FILTER_VALIDATE_BOOLEAN
        );

        $this->forceGlobalSecureRequests = filter_var(
            env('app.forceGlobalSecureRequests', $this->forceGlobalSecureRequests),
            FILTER_VALIDATE_BOOLEAN
        );

        $this->CSPEnabled = filter_var(
            env('app.CSPEnabled', $this->CSPEnabled),
            FILTER_VALIDATE_BOOLEAN
        );

        $this->maintenanceMode = filter_var(
            env('app.maintenanceMode', $this->maintenanceMode),
            FILTER_VALIDATE_BOOLEAN
        );

        $this->enableKint = filter_var(
            env('app.enableKint', $this->enableKint),
            FILTER_VALIDATE_BOOLEAN
        );

        // Cookie security (allow override)
        $this->cookieSecure = filter_var(
            env('app.cookieSecure', $this->cookieSecure),
            FILTER_VALIDATE_BOOLEAN
        );

        // CI / automation safety
        if (is_ci()) {
            $this->cacheConfig        = false;
            $this->optimizeAutoloader = false;
        }
    }
}
