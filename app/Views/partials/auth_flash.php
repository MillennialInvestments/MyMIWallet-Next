<?php
$authMessage = session()->getFlashdata('auth_message');
if (! is_array($authMessage)) {
    $authMessage = [];
}

$type  = $authMessage['type'] ?? null;
$title = $authMessage['title'] ?? null;
$text  = $authMessage['text'] ?? null;
?>

<?php if ($type && $text) : ?>
    <div class="alert alert-<?= esc($type) ?>" role="alert">
        <?php if ($title) : ?>
            <div class="fw-bold mb-1"><?= esc($title) ?></div>
        <?php endif; ?>
        <div><?= esc($text) ?></div>
    </div>
<?php endif; ?>
