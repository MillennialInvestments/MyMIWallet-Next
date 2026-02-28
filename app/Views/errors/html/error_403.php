<?php
require __DIR__ . '/_error_lifecycle_bootstrap.php';

mymi_bootstrap_error_lifecycle(403, 'error_403', 'Access denied.');

$statusCode = 403;
$title = 'Access Denied';
$headline = 'Access Denied';
$safeMessage = 'You do not have permission to access this page.';
$debugMessage = $message ?? null;

require __DIR__ . '/_launch_error_template.php';
