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
    public bool $debugHUD        = true;
    public bool $maintenanceMode = false;
    public string $maintenanceMessage = 'We are performing scheduled maintenance.';
    public string $maintenanceETA = '';
    public bool $enableKint      = false;

    /**
     * Subfolder name used for App-level view/config overrides.
     * Must always be a string for CI4 view path resolution under PHP 8.1+.
     */
    public string $appOverridesFolder = '';

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        // -------------------------------------------------
        // Environment-based defaults
        // -------------------------------------------------
        if (defined('CI_ENVIRONMENT') && CI_ENVIRONMENT === 'development') {
            $this->debugHUD        = true;
            $this->enableKint      = true;
            $this->maintenanceMode = false;
        }


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

        // Keep as string to avoid trim(null) fatals in CI4 view resolution.
        $appOverridesFolder = env('app.appOverridesFolder', $this->appOverridesFolder);
        $this->appOverridesFolder = is_string($appOverridesFolder)
            ? trim($appOverridesFolder, "/\\")
            : '';

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

        $this->maintenanceMessage = (string) env('app.maintenanceMessage', $this->maintenanceMessage);
        $this->maintenanceETA = (string) env('app.maintenanceETA', $this->maintenanceETA);

        $this->enableKint = filter_var(
            env('app.enableKint', true),
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
