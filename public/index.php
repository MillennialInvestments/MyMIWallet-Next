<?php

/**
 * CI4 Logger - Settings
 * Audited: 2026-02-18
 * Purpose: Applies front-controller level error display/reporting and early request hardening.
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Load environment from .env
if (! headers_sent()) {
    header('X-MyMI-FrontController: 1');
}

use App\Services\AutoloadAuditService;
use CodeIgniter\Boot;
use Config\Paths;
use Dotenv\Dotenv;

/*
|--------------------------------------------------------------------------
| PHP VERSION CHECK
|--------------------------------------------------------------------------
*/
$minPhpVersion = '8.2';

if (version_compare(PHP_VERSION, $minPhpVersion, '<')) {
    header('HTTP/1.1 503 Service Unavailable.', true, 503);
    echo "PHP {$minPhpVersion}+ required. Current: " . PHP_VERSION;
    exit(1);
}

ini_set('memory_limit', '768M');

define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);

if (getcwd() . DIRECTORY_SEPARATOR !== FCPATH) {
    chdir(FCPATH);
}

require FCPATH . '../vendor/autoload.php';

// $dotenv = Dotenv::createImmutable(dirname(__DIR__));
// $dotenv->safeLoad();

/*
|--------------------------------------------------------------------------
| ENVIRONMENT
|--------------------------------------------------------------------------
*/
$environment = $_ENV['CI_ENVIRONMENT'] ?? $_SERVER['CI_ENVIRONMENT'] ?? getenv('CI_ENVIRONMENT') ?: 'production';
$_SERVER['CI_ENVIRONMENT'] = $environment;
defined('ENVIRONMENT') || define('ENVIRONMENT', $environment);

if (ENVIRONMENT === 'development') {
    defined('CI_DEBUG') || define('CI_DEBUG', true);
}


/*
|--------------------------------------------------------------------------
| EARLY URI HARDENING (Defense in depth)
|--------------------------------------------------------------------------
*/
$uriPath = ltrim((string) parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH), '/');
$decoded = rawurldecode('/' . $uriPath);

if (
    str_contains($decoded, '(:segment)') ||
    str_contains($decoded, '(:num)') ||
    str_contains($decoded, '(:any)')
) {
    header('HTTP/1.1 404 Not Found', true, 404);
    exit(1);
}

if (
    $uriPath !== '' &&
    (
        str_starts_with($uriPath, 'assets/') ||
        str_ends_with($uriPath, '.map') ||
        str_ends_with($uriPath, '.xml')
    )
) {
    header('HTTP/1.1 404 Not Found', true, 404);
    exit(1);
}

/*
|--------------------------------------------------------------------------
| BOOTSTRAP CI
|--------------------------------------------------------------------------
*/
try {
    require FCPATH . '../app/Config/Paths.php';
    $paths = new Paths();

    require $paths->systemDirectory . '/Boot.php';

    $exitCode = Boot::bootWeb($paths);
} catch (\CodeIgniter\Exceptions\PageNotFoundException $e) {
    $requestUri = $_SERVER['REQUEST_URI'] ?? '/';
    error_log('404: ' . $requestUri);
    throw $e;
} catch (\Throwable $e) {
    error_log('EMERGENCY BOOT FAILURE: ' . $e->getMessage());
    \App\Libraries\EmergencyLogger::write('BOOT FAILURE: ' . $e->getMessage(), [
        'trace' => $e->getTraceAsString(),
    ]);
    http_response_code(500);
    echo 'System temporarily unavailable.';
    exit(1);
}

/*
|--------------------------------------------------------------------------
| POST-BOOT DEV AUDIT
|--------------------------------------------------------------------------
*/
if ((getenv('CI_ENVIRONMENT') ?: 'production') !== 'production') {
    try {
        AutoloadAuditService::audit();
    } catch (\Throwable $e) {
        error_log('AutoloadAuditService failed: ' . $e->getMessage());
    }
}

exit($exitCode);
