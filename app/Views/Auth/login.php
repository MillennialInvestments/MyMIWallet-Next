<?= $this->extend('App\Views\Auth\layout') ?>
<!-- <?php //$this->extend($config->viewLayout) ?> -->
<?= $this->section('main') ?>

<div class="container">
	<div class="row pt-4 mt-4">
		<div class="col-sm-6 offset-sm-3 pt-5 mt-5">

			<div class="card">
				<h2 class="card-header"><?=lang('Auth.loginTitle')?></h2>
				<div class="card-body">
					<?php $showResendActivation = (bool) session()->getFlashdata('auth_show_resend'); ?>

					<?= view('App\Views\Auth\_message_block') ?>
					<?php $forcedAlert = session('forced_alert'); ?>
					<?php if (is_array($forcedAlert)) : ?>
						<div class="alert alert-<?= esc($forcedAlert['type'] ?? 'danger') ?> mb-3" role="alert">
							<h5 class="mb-1"><?= esc($forcedAlert['title'] ?? 'There was a problem') ?></h5>
							<p class="mb-2"><?= esc($forcedAlert['message'] ?? 'An unexpected issue occurred.') ?></p>

							<?php if (!empty($forcedAlert['error_code'])) : ?>
								<div class="small mb-2">
									<strong>Error Code:</strong> <?= esc($forcedAlert['error_code']) ?>
									<?php if (!empty($forcedAlert['request_id'])) : ?>
										| <strong>Request ID:</strong> <?= esc($forcedAlert['request_id']) ?>
									<?php endif; ?>
								</div>
							<?php endif; ?>

							<a
								href="<?= esc($forcedAlert['support_url'] ?? site_url('Support')) ?>"
								target="_blank"
								rel="noopener"
								class="btn btn-outline-dark btn-sm"
							>
								Open Support Ticket
							</a>

							<?php if (ENVIRONMENT !== 'production' && !empty($forcedAlert['debug_message'])) : ?>
								<div class="mt-2 small text-break">
									<strong>PHP:</strong> <?= esc($forcedAlert['debug_message']) ?>
								</div>
							<?php endif; ?>
						</div>
					<?php endif; ?>

					<?php if (session()->getFlashdata('auth_ticket_id')): ?>
						<div class="alert alert-warning" role="alert">
							We hit a system error while signing you in. Ticket #<?= esc((string) session()->getFlashdata('auth_ticket_id')) ?> was created and support was notified.
							If this keeps happening, contact support@mymiwallet.com.
						</div>
					<?php endif; ?>

					 <form action="<?= site_url('login') ?>" method="post" accept-charset="utf-8" novalidate>
						<?= csrf_field() ?>
						<input type="hidden" name="redirect_url" value="<?= session('redirect_url') ?>">

						<?php if ($config->validFields === ['email']): ?>
						<div class="form-group">
							<label for="login"><?=lang('Auth.email')?></label>
							<input type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
								   name="login" value="<?= esc(old('login')) ?>" placeholder="<?=lang('Auth.email')?>">
							<div class="invalid-feedback">
								<?= session('errors.login') ?>
							</div>
						</div>
						<?php else: ?>
						<div class="form-group">
							<label for="login"><?=lang('Auth.emailOrUsername')?></label>
							<input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
								   name="login" value="<?= esc(old('login')) ?>" placeholder="<?=lang('Auth.emailOrUsername')?>">
							<div class="invalid-feedback">
								<?= session('errors.login') ?>
							</div>
						</div>
						<?php endif; ?>

						<div class="form-group">
							<label for="password"><?=lang('Auth.password')?></label>
							<input type="password" name="password" class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.password')?>">
							<div class="invalid-feedback">
								<?= session('errors.password') ?>
							</div>
						</div>

<?php if ($config->allowRemembering): ?>
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
								<?=lang('Auth.rememberMe')?>
							</label>
						</div>
<?php endif; ?>

						<br>

						<button type="submit" class="btn btn-primary btn-block"><?=lang('Auth.loginAction')?></button>
					</form>

					<hr>

<?php if ($config->allowRegistration) : ?>
					<p><a href="<?= site_url('register') ?>"><?=lang('Auth.needAnAccount')?></a></p>
<?php endif; ?>
                    <p><a href="<?= site_url('/activate') ?>">Activate Account?</a></p>
<?php if ($config->activeResetter): ?>
					<p><a href="<?= url_to('forgot') ?>"><?=lang('Auth.forgotYourPassword')?></a></p>
<?php endif; ?>
					<p><a href="<?= site_url('Support/Account') ?>">Need help?</a></p>

					<p>
						<a class="text-decoration-none" data-bs-toggle="collapse" href="#resend-activation" role="button" aria-expanded="<?= $showResendActivation ? 'true' : 'false' ?>" aria-controls="resend-activation">
							Resend activation email
						</a>
					</p>

					<div class="collapse <?= $showResendActivation ? 'show' : '' ?>" id="resend-activation">
						<div class="card card-bordered">
							<div class="card-body">
								<form action="<?= site_url('auth/resend-activation') ?>" method="post">
									<?= csrf_field() ?>
									<div class="form-group">
										<label for="resend-email">Email</label>
										<input type="email" class="form-control" id="resend-email" name="email" value="<?= esc(old('login')) ?>" placeholder="Email address" required>
									</div>
									<br>
									<button type="submit" class="btn btn-outline-primary btn-block">Resend Activation Email</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>

<?= $this->endSection() ?>
