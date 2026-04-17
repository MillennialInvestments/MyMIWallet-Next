<?php
$authMessage = session()->getFlashdata('auth_message');
if (! is_array($authMessage)) {
    $authMessage = [];
}
$legacyMessage = session()->getFlashdata('message');
$legacyError = session()->getFlashdata('error');
$legacyWarning = session()->getFlashdata('warning');
$legacyInfo = session()->getFlashdata('info');
$legacySuccess = session()->getFlashdata('success');
$legacyErrors = session()->getFlashdata('errors');
$validation = session('validation');

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

<?php if (is_string($legacyError) && $legacyError !== '') : ?>
    <div class="alert alert-danger" role="alert"><?= esc($legacyError) ?></div>
<?php endif; ?>
<?php if (is_string($legacyWarning) && $legacyWarning !== '') : ?>
    <div class="alert alert-warning" role="alert"><?= esc($legacyWarning) ?></div>
<?php endif; ?>
<?php if (is_string($legacyInfo) && $legacyInfo !== '') : ?>
    <div class="alert alert-info" role="alert"><?= esc($legacyInfo) ?></div>
<?php endif; ?>
<?php if (is_string($legacySuccess) && $legacySuccess !== '') : ?>
    <div class="alert alert-success" role="alert"><?= esc($legacySuccess) ?></div>
<?php endif; ?>
<?php if (is_string($legacyMessage) && $legacyMessage !== '') : ?>
    <div class="alert alert-info" role="alert"><?= esc($legacyMessage) ?></div>
<?php endif; ?>

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

<?php if ($errors !== []) : ?>
    <div class="alert alert-danger" role="alert">
        <div class="fw-bold mb-1">Please review the form errors:</div>
        <ul class="mb-0 ps-3">
            <?php foreach ($errors as $error) : ?>
                <li><?= esc((string) $error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<?php if (is_array($legacyErrors) && $legacyErrors !== []) : ?>
    <div class="alert alert-danger" role="alert">
        <div class="fw-bold mb-1">Please review the form errors:</div>
        <ul class="mb-0 ps-3">
            <?php foreach ($legacyErrors as $error) : ?>
                <li><?= esc((string) $error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<?php if ($validation && method_exists($validation, 'listErrors')) : ?>
    <div class="alert alert-danger" role="alert">
        <?= $validation->listErrors() ?>
    </div>
<?php endif; ?>
