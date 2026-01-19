<?php
$flashError  = session('error');
$flashErrors = (array) (session('errors') ?? []);
$authMessage = session()->getFlashdata('auth_message');

// Avoid showing the same message twice when both keys contain the same string.
if (is_string($flashError)) {
    $flashErrors = array_values(array_filter($flashErrors, static function ($msg) use ($flashError) {
        return $msg !== $flashError;
    }));
}
?>

<?php if (session()->has('message')) : ?>
	<div class="alert alert-success">
		<?= session('message') ?>
	</div>
<?php endif ?>

<?php if (is_array($authMessage) && ! empty($authMessage['text'])) : ?>
	<?php $alertType = $authMessage['type'] ?? 'success'; ?>
	<div class="alert alert-<?= esc($alertType) ?>">
		<?= esc($authMessage['text']) ?>
	</div>
<?php endif ?>

<?php if (! empty($flashError)) : ?>
	<div class="alert alert-danger">
		<?= $flashError ?>
	</div>
<?php endif ?>

<?php if (! empty($flashErrors)) : ?>
	<ul class="alert alert-danger">
	<?php foreach ($flashErrors as $error) : ?>
		<li><?= $error ?></li>
	<?php endforeach ?>
	</ul>
<?php endif ?>
