<?php

use App\Services\AutoloadAuditService;
use CodeIgniter\Boot;
use Config\Paths;

// Force development environment if .env requests it
if (getenv('CI_ENVIRONMENT') === 'development') {
    $_SERVER['CI_ENVIRONMENT'] = 'development';
    defined('ENVIRONMENT') || define('ENVIRONMENT', 'development');
    defined('CI_DEBUG')    || define('CI_DEBUG', true);
}

/*
 *---------------------------------------------------------------
 * CHECK PHP VERSION
 *---------------------------------------------------------------
 */

$minPhpVersion = '8.2'; // If you update this, don't forget to update `spark`.
if (version_compare(PHP_VERSION, $minPhpVersion, '<')) {
    $message = sprintf(
        'Your PHP version must be %s or higher to run CodeIgniter. Current version: %s',
        $minPhpVersion,
        PHP_VERSION,
    );

    header('HTTP/1.1 503 Service Unavailable.', true, 503);
    echo $message;

    exit(1);
}

ini_set('memory_limit', '768M');

/*
 *---------------------------------------------------------------
 * SET THE CURRENT DIRECTORY
 *---------------------------------------------------------------
 */

// Path to the front controller (this file)
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);

// Ensure the current directory is pointing to the front controller's directory
if (getcwd() . DIRECTORY_SEPARATOR !== FCPATH) {
    chdir(FCPATH);
}

// Guard against accidentally routing static assets through CI.
$uriPath = ltrim((string) parse_url($_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH), '/');
if ($uriPath !== '' && (str_starts_with($uriPath, 'assets/') || str_ends_with($uriPath, '.map') || str_ends_with($uriPath, '.xml'))) {
    header('HTTP/1.1 404 Not Found', true, 404);
    exit(1);
}

/*
 *---------------------------------------------------------------
 * BOOTSTRAP THE APPLICATION
 *---------------------------------------------------------------
 * This process sets up the path constants, loads and registers
 * our autoloader, along with Composer's, loads our constants
 * and fires up an environment-specific bootstrapping.
 */

// LOAD OUR PATHS CONFIG FILE
// This is the line that might need to be changed, depending on your folder structure.
require FCPATH . '../app/Config/Paths.php';
// ^^^ Change this line if you move your application folder

$paths = new Paths();

// LOAD THE FRAMEWORK BOOTSTRAP FILE
require $paths->systemDirectory . '/Boot.php';

if ((getenv('CI_ENVIRONMENT') ?: 'production') !== 'production') {
    AutoloadAuditService::audit();
}

exit(Boot::bootWeb($paths));
