<?php
require __DIR__ . '/_error_lifecycle_bootstrap.php';

mymi_bootstrap_error_lifecycle(500, 'error_500', 'Internal server error.');

$statusCode = 500;
$title = 'Server Error';
$headline = 'Something Went Wrong';
$safeMessage = 'We hit an unexpected error and are looking into it.';
$debugMessage = $message ?? null;

require __DIR__ . '/_launch_error_template.php';
