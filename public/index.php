<?php

/**
 * MyMI Wallet Front Controller
 * Hardened + DreamHost-Compatible + CI4 Safe
 */

// ---------------------------------------------------------------------
// Basic PHP Hardening
// ---------------------------------------------------------------------

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
ini_set('memory_limit', '768M');

if (! headers_sent()) {
    header('X-MyMI-FrontController: 1');
}

// ---------------------------------------------------------------------
// PHP Version Enforcement
// ---------------------------------------------------------------------

$minPhpVersion = '8.2';

if (version_compare(PHP_VERSION, $minPhpVersion, '<')) {
    header('HTTP/1.1 503 Service Unavailable', true, 503);
    echo "PHP {$minPhpVersion}+ required. Current: " . PHP_VERSION;
    exit(1);
}

// ---------------------------------------------------------------------
// Path Setup
// ---------------------------------------------------------------------

define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);

if (getcwd() . DIRECTORY_SEPARATOR !== FCPATH) {
    chdir(FCPATH);
}

require FCPATH . '../vendor/autoload.php';

// ---------------------------------------------------------------------
// Environment Detection
// ---------------------------------------------------------------------

$environment =
    $_ENV['CI_ENVIRONMENT']
    ?? $_SERVER['CI_ENVIRONMENT']
    ?? getenv('CI_ENVIRONMENT')
    ?: 'production';

$_SERVER['CI_ENVIRONMENT'] = $environment;
defined('ENVIRONMENT') || define('ENVIRONMENT', $environment);

if (ENVIRONMENT === 'development') {
    defined('CI_DEBUG') || define('CI_DEBUG', true);
}

// ---------------------------------------------------------------------
// EARLY URI HARDENING
// (Allow CI internal framework routes like debugbar)
// ---------------------------------------------------------------------

$requestUri = $_SERVER['REQUEST_URI'] ?? '';
$uriPath = ltrim((string) parse_url($requestUri, PHP_URL_PATH), '/');
$decoded = rawurldecode('/' . $uriPath);

// Allow internal CI framework requests
$frameworkBypass =
    isset($_GET['debugbar']) ||
    str_contains($requestUri, 'writable/debugbar');

// Only apply hardening if not internal framework request
if (! $frameworkBypass) {

    // Block unresolved CI placeholders
    if (
        str_contains($decoded, '(:segment)') ||
        str_contains($decoded, '(:num)') ||
        str_contains($decoded, '(:any)')
    ) {
        header('HTTP/1.1 404 Not Found', true, 404);
        exit(1);
    }

    // Block unwanted direct asset access
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
}

// ---------------------------------------------------------------------
// BOOTSTRAP CODEIGNITER
// ---------------------------------------------------------------------

try {

    require FCPATH . '../app/Config/Paths.php';
    $paths = new \Config\Paths();

    require $paths->systemDirectory . '/Boot.php';

    $exitCode = \CodeIgniter\Boot::bootWeb($paths);

} catch (\CodeIgniter\Exceptions\PageNotFoundException $e) {

    error_log('404: ' . $requestUri);
    throw $e;

} catch (\Throwable $e) {

    error_log('EMERGENCY BOOT FAILURE: ' . $e->getMessage());

    if (class_exists(\App\Libraries\EmergencyLogger::class)) {
        \App\Libraries\EmergencyLogger::write(
            'BOOT FAILURE: ' . $e->getMessage(),
            ['trace' => $e->getTraceAsString()]
        );
    }

    http_response_code(500);
    echo 'System temporarily unavailable.';
    exit(1);
}

// ---------------------------------------------------------------------
// POST-BOOT DEVELOPMENT AUDIT
// ---------------------------------------------------------------------

if (ENVIRONMENT !== 'production') {
    try {
        if (class_exists(\App\Services\AutoloadAuditService::class)) {
            \App\Services\AutoloadAuditService::audit();
        }
    } catch (\Throwable $e) {
        error_log('AutoloadAuditService failed: ' . $e->getMessage());
    }
}

exit($exitCode);
