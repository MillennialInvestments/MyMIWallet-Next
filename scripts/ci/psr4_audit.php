<?php

declare(strict_types=1);

$root = dirname(__DIR__, 2);

define('APPPATH', $root . '/app/');

require $root . '/app/Services/Psr4AuditService.php';

$service = new \App\Services\Psr4AuditService();
$results = $service->audit();
$summary = $results['summary'] ?? [];
$violations = (int) ($summary['real_violations'] ?? $summary['violations'] ?? 0);
$legacyGlobals = (int) ($summary['legacy_globals'] ?? 0);

if ($violations > 0) {
    fwrite(STDERR, "❌ PSR-4 violations detected: {$violations}\n");
    exit(1);
}

if ($legacyGlobals > 0) {
    fwrite(STDERR, "⚠️ Legacy global classes detected: {$legacyGlobals}\n");
}

echo "✅ PSR-4 compliance verified.\n";
