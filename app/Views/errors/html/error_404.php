<?php
require __DIR__ . '/_error_lifecycle_bootstrap.php';

mymi_bootstrap_error_lifecycle(404, 'error_404', 'Page not found.');

$statusCode = 404;
$title = lang('Errors.pageNotFound');
$headline = 'Page Not Found';
$safeMessage = 'The page you requested could not be found.';
$debugMessage = $message ?? null;

require __DIR__ . '/_launch_error_template.php';
