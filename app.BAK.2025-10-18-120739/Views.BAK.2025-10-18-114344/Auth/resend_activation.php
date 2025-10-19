<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<div class="container">
	<div class="row">
		<div class="col-sm-6 offset-sm-3">

			<div class="card">
				<h2 class="card-header">Resend Account Activation Code</h2>
				<div class="card-body">

					<?= view('app/Views/Auth/_message_block'); ?>

					<form action="<?= site_url('/resend-activation') ?>" method="post">
						<?= csrf_field() ?>
						<input type="hidden" name="email" value="<?= esc($email) ?>">

						<div class="form-group">
							<label for="email"><?=lang('Auth.email')?></label>
							<input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>"
								   name="email" placeholder="<?=lang('Auth.email')?>">
							<div class="invalid-feedback">
								<?= session('errors.email') ?>
							</div>
						</div>

						<br>

						<button type="submit" class="btn btn-primary btn-block">Send Code</button>
					</form>

					<hr>

<?php if ($config->allowRegistration) : ?>
					<p><a href="<?= url_to('register') ?>"><?=lang('Auth.needAnAccount')?></a></p>
<?php endif; ?>
					<p><a href="<?= url_to('login') ?>"><?=lang('Auth.alreadyRegistered')?></a></p>
<?php if ($config->activeResetter): ?>
					<p><a href="<?= url_to('forgot') ?>"><?=lang('Auth.forgotYourPassword')?></a></p>
<?php endif; ?>
				</div>
			</div>

		</div>
	</div>
</div>

<?= $this->endSection() ?>
