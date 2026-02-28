<?php
require __DIR__ . '/_error_lifecycle_bootstrap.php';

mymi_bootstrap_error_lifecycle(504, 'error_504', 'Gateway timeout.');

$statusCode = 504;
$title = 'Gateway Timeout';
$headline = 'Request Timed Out';
$safeMessage = 'The service took too long to respond. Please try again in a moment.';
$debugMessage = $message ?? null;

require __DIR__ . '/_launch_error_template.php';
