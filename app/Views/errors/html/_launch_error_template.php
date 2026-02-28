<?php
/** @var int $statusCode */
/** @var string $title */
/** @var string $headline */
/** @var string $safeMessage */
/** @var string|null $debugMessage */

$redirectUrl = site_url('/Support');
$cspNonceRaw = $cspNonce ?? (service('renderer')->getData('cspNonce') ?? '');
$cspNonce = is_scalar($cspNonceRaw) ? (string) $cspNonceRaw : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="noindex,nofollow">
    <title><?= esc($title) ?></title>
    <style nonce="<?= esc($cspNonce) ?>">
        body { font-family: Arial, sans-serif; background: #f8fafc; color: #1f2937; margin: 0; }
        .container { max-width: 760px; margin: 6rem auto; background: #fff; border: 1px solid #e5e7eb; border-radius: 12px; padding: 2rem; text-align: center; }
        h1 { margin: 0; font-size: 2.5rem; }
        p { line-height: 1.55; }
        .code { color: #64748b; font-weight: 700; }
        .support { margin-top: 1.5rem; padding: 1rem; background: #f1f5f9; border-radius: 10px; text-align: left; }
        .btn { display: inline-block; margin-top: 1rem; color: #fff; background: #0f766e; text-decoration: none; padding: 0.6rem 1rem; border-radius: 8px; }
        .hint { margin-top: 1rem; color: #64748b; font-size: 0.95rem; }
        .debug { margin-top: 1rem; color: #991b1b; font-size: 0.9rem; }
    </style>
</head>
<body>
<div class="container">
    <div class="code"><?= esc((string) $statusCode) ?></div>
    <h1><?= esc($headline) ?></h1>
    <p><?= esc($safeMessage) ?></p>

    <?php if (ENVIRONMENT !== 'production' && ! empty($debugMessage)) : ?>
        <p class="debug">Debug: <?= esc($debugMessage) ?></p>
    <?php endif; ?>

    <div class="support">
        <strong>Need help now?</strong>
        <p>If this keeps happening, contact Support and include the time and what you were doing right before this page appeared.</p>
        <a class="btn" href="<?= esc($redirectUrl) ?>">Open Support</a>
        <p class="hint">You will be redirected to Support automatically in 5 seconds.</p>
    </div>
</div>
<script nonce="<?= esc($cspNonce) ?>">
window.setTimeout(function () {
    window.location.assign(<?= json_encode($redirectUrl, JSON_UNESCAPED_SLASHES) ?>);
}, 5000);
</script>
</body>
</html>
