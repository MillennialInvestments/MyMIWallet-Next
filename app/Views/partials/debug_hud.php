<?php
/** @var \Config\App $appConfig */
$appConfig = config('App');
$enabled = ($appConfig->debugHUD ?? false) && ENVIRONMENT !== 'production';

if (! $enabled) {
    return;
}

$request = service('request');
$router  = service('router');
$session = service('session');
$safeCache = service('safeCache');

$sessionUserId = $session ? $session->get('user_id') : null;
$userId = $sessionUserId ?? null;

$adminGate = true;
if (function_exists('can') && is_numeric($userId)) {
    $adminGate = can('admin.*', (int) $userId);
}

if (! $adminGate) {
    return;
}

$requestId = $request ? ($request->getHeaderLine('X-Request-Id') ?: (string) $request->getServer('HTTP_X_REQUEST_ID')) : '';
$sessionId = $session ? $session->getId() : (function_exists('session_id') ? session_id() : '');
$controller = $router ? sprintf('%s::%s', $router->controllerName(), $router->methodName()) : 'unknown';
$route = $request ? (string) $request->getUri() : '';
$memoryMb = number_format(memory_get_usage(true) / 1048576, 2);
$trace = $safeCache && method_exists($safeCache, 'getTrace') ? $safeCache->getTrace() : [];
?>
<div style="position:fixed;bottom:0;right:0;z-index:9999;max-width:420px;background:#0b1320;color:#f8fafc;border:1px solid #1f2a44;border-radius:8px 8px 0 0;padding:12px;font-family:system-ui, sans-serif;font-size:12px;box-shadow:0 8px 24px rgba(0,0,0,0.35);">
    <div style="font-weight:600;margin-bottom:6px;">Debug HUD</div>
    <div style="display:grid;grid-template-columns:120px 1fr;gap:4px 8px;">
        <div>User ID</div><div><?= esc($userId ?? 'guest') ?></div>
        <div>Session ID</div><div><?= esc($sessionId ?: 'n/a') ?></div>
        <div>Request ID</div><div><?= esc($requestId ?: 'n/a') ?></div>
        <div>Route</div><div><?= esc($route) ?></div>
        <div>Controller</div><div><?= esc($controller) ?></div>
        <div>Memory</div><div><?= esc($memoryMb) ?> MB</div>
    </div>
    <div style="margin-top:8px;font-weight:600;">Cache Trace (last <?= esc((string) count($trace)) ?>)</div>
    <div style="max-height:180px;overflow:auto;border-top:1px solid #1f2a44;margin-top:4px;padding-top:6px;">
        <?php if (empty($trace)) : ?>
            <div style="opacity:0.7;">No cache operations recorded.</div>
        <?php else : ?>
            <ul style="margin:0;padding-left:16px;">
                <?php foreach ($trace as $entry) : ?>
                    <li>
                        <strong><?= esc($entry['op'] ?? 'op') ?></strong>
                        <?= esc($entry['key'] ?? '') ?>
                        <?php if (array_key_exists('hit', $entry)) : ?>
                            <em style="opacity:0.8;">(hit: <?= esc($entry['hit'] === null ? 'n/a' : ($entry['hit'] ? 'yes' : 'no')) ?>)</em>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</div>
