<?php
$flashError  = session('error');
$flashErrors = (array) (session('errors') ?? []);

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
