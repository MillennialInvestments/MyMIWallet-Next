<?php
$authMessage = session()->getFlashdata('auth_message');
if (! is_array($authMessage)) {
    $authMessage = [];
}

$type  = $authMessage['type'] ?? null;
$title = $authMessage['title'] ?? null;
$text  = $authMessage['message'] ?? ($authMessage['text'] ?? null);
$errorCode = $authMessage['error_code'] ?? null;
$supportUrl = $authMessage['support_url'] ?? null;
$requestId = $authMessage['request_id'] ?? null;
$debugMessage = $authMessage['debug_message'] ?? null;
$errors = session('errors');
if (! is_array($errors)) {
    $errors = [];
}
?>

<?php if ($type && $text) : ?>
    <div class="alert alert-<?= esc($type) ?>" role="alert">
        <?php if ($title) : ?>
            <div class="fw-bold mb-1"><?= esc($title) ?></div>
        <?php endif; ?>
        <div><?= esc($text) ?></div>
        <?php if ($errors !== []) : ?>
            <ul class="mt-2 mb-0 ps-3">
                <?php foreach ($errors as $error) : ?>
                    <li><?= esc((string) $error) ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>

        <?php if ($errorCode || $requestId) : ?>
            <div class="mt-2 d-flex flex-wrap gap-2">
                <?php if ($errorCode) : ?>
                    <span class="badge text-bg-dark">Code: <?= esc((string) $errorCode) ?></span>
                <?php endif; ?>
                <?php if ($requestId) : ?>
                    <span class="badge text-bg-secondary">Request ID: <?= esc((string) $requestId) ?></span>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if ($debugMessage && ENVIRONMENT !== 'production') : ?>
            <div class="mt-2"><small class="text-muted">Debug: <?= esc((string) $debugMessage) ?></small></div>
        <?php endif; ?>

        <?php if ($supportUrl) : ?>
            <div class="mt-3">
                <a href="<?= esc((string) $supportUrl) ?>" class="btn btn-outline-light btn-sm" target="_blank" rel="noopener">Need help? Open a support ticket</a>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>
