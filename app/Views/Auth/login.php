<?= $this->extend('App\Views\Auth\layout') ?>
<!-- <?php //$this->extend($config->viewLayout) ?> -->
<?= $this->section('main') ?>

<div class="container container-xl">
	<div class="row pt-4 g-4 align-items-start">
		<!-- Left Column: Login Card & Recovery Actions -->
		<div class="col-lg-5 col-xl-5">
			<div class="card border-0 shadow-sm rounded-4 overflow-hidden">
				<div class="card-header bg-white border-bottom pt-4 px-4 pb-3">
					<h2 class="h4 fw-bold text-dark mb-1"><?=lang('Auth.loginTitle')?></h2>
					<p class="text-muted small mb-0">Sign in to manage your budget, wallets, and investments.</p>
				</div>
				<div class="card-body p-4">
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

					<form id="login-form" data-auth-form="login" action="<?= site_url('login') ?>" method="post" accept-charset="utf-8" novalidate>
						<?= csrf_field() ?>
						<input type="text" name="company_website" value="" class="d-none" tabindex="-1" autocomplete="off" aria-hidden="true">
						<input type="hidden" name="redirect_url" value="<?= session('redirect_url') ?>">

						<?php if ($config->validFields === ['email']): ?>
						<div class="form-group mb-3">
							<label for="login" class="form-label fw-semibold text-dark small"><?=lang('Auth.email')?></label>
							<input type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
								   name="login" value="<?= esc(old('login')) ?>" placeholder="<?=lang('Auth.email')?>">
							<div class="invalid-feedback">
								<?= session('errors.login') ?>
							</div>
						</div>
						<?php else: ?>
						<div class="form-group mb-3">
							<label for="login" class="form-label fw-semibold text-dark small"><?=lang('Auth.emailOrUsername')?></label>
							<input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
								   name="login" value="<?= esc(old('login')) ?>" placeholder="<?=lang('Auth.emailOrUsername')?>">
							<div class="invalid-feedback">
								<?= session('errors.login') ?>
							</div>
						</div>
						<?php endif; ?>

						<div class="form-group mb-3">
							<div class="d-flex justify-content-between align-items-center mb-1">
								<label for="password" class="form-label fw-semibold text-dark small mb-0"><?=lang('Auth.password')?></label>
								<?php if ($config->activeResetter): ?>
									<a href="<?= url_to('forgot') ?>" class="small text-primary text-decoration-none"><?=lang('Auth.forgotYourPassword')?></a>
								<?php endif; ?>
							</div>
							<input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.password')?>">
							<div class="invalid-feedback">
								<?= session('errors.password') ?>
							</div>
						</div>

						<?php if ($config->allowRemembering): ?>
						<div class="form-check mb-3">
							<input type="checkbox" name="remember" class="form-check-input" id="rememberMeCheck" <?php if (old('remember')) : ?> checked <?php endif ?>>
							<label class="form-check-label small text-muted" for="rememberMeCheck">
								<?=lang('Auth.rememberMe')?>
							</label>
						</div>
						<?php endif; ?>

						<button type="submit" class="btn btn-primary w-100 py-2 text-white fw-bold mb-3"><?=lang('Auth.loginAction')?></button>
					    <script<?= script_nonce_attr() ?>>
                        document.addEventListener('DOMContentLoaded', function () {
                            var form = document.getElementById('login-form');
                            if (!form) return;

                            form.addEventListener('submit', function (event) {
                                console.log('[LOGIN_NATIVE_SUBMIT_CAPTURE]', {
                                    action: form.getAttribute('action'),
                                    resolvedAction: form.action,
                                    method: form.getAttribute('method'),
                                    activeElement: document.activeElement ? document.activeElement.outerHTML : null
                                }, true);
                            }, true);
                        });
                        </script>
                    </form>

					<div class="pt-3 border-top text-center small text-muted">
						<?php if ($config->allowRegistration) : ?>
							<p class="mb-2">Don't have an account yet? <a href="<?= site_url('register') ?>" class="fw-bold text-primary text-decoration-none"><?=lang('Auth.needAnAccount')?></a></p>
						<?php endif; ?>
						<div class="d-flex justify-content-center gap-3 flex-wrap">
							<a href="<?= site_url('/activate') ?>" class="text-secondary text-decoration-none">Activate Account</a>
							<span>•</span>
							<a href="<?= site_url('Support/Account') ?>" class="text-secondary text-decoration-none">Account Support</a>
							<span>•</span>
							<a class="text-secondary text-decoration-none" data-bs-toggle="collapse" href="#resend-activation" role="button" aria-expanded="<?= $showResendActivation ? 'true' : 'false' ?>" aria-controls="resend-activation">
								Resend activation email
							</a>
						</div>
					</div>

					<div class="collapse <?= $showResendActivation ? 'show' : '' ?> mt-3" id="resend-activation">
						<div class="card card-bordered bg-light">
							<div class="card-body p-3">
								<h6 class="small fw-bold text-dark mb-2">Resend Activation Token</h6>
								<form action="<?= site_url('auth/resend-activation') ?>" method="post">
									<?= csrf_field() ?>
									<div class="form-group mb-2">
										<input type="email" class="form-control form-control-sm" id="resend-email" name="email" value="<?= esc(old('login')) ?>" placeholder="Enter registered email address" required>
									</div>
									<button type="submit" class="btn btn-outline-primary btn-sm w-100">Send New Activation Link</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Right Column: Internal Promotions & Ecosystem Spotlight -->
		<div class="col-lg-7 col-xl-7">
			<div class="card border-0 shadow-sm rounded-4 p-4 p-md-5" style="background: linear-gradient(135deg, #061540 0%, #0d2157 60%, #08163b 100%); color: #ffffff;">
				<div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill mb-3" style="background: rgba(56, 207, 194, 0.15); border: 1px solid rgba(56, 207, 194, 0.35); width: fit-content;">
					<em class="icon ni ni-spark text-teal" style="color: #38cfc2;"></em>
					<span class="small fw-bold text-uppercase" style="color: #38cfc2; letter-spacing: 0.08em; font-size: 0.75rem;">Platform Spotlight</span>
				</div>

				<h3 class="h3 fw-bold text-white mb-2">What’s Unlocking in Your Wallet</h3>
				<p class="text-white-50 small mb-4">
					Stay informed on recent feature releases, ecosystem upgrades, and performance tools available inside your MyMI member dashboard.
				</p>

				<div class="row g-3">
					<!-- Promo 1: MyMI Gold -->
					<div class="col-md-6">
						<div class="p-3 rounded-3 h-100" style="background: rgba(255, 255, 255, 0.06); border: 1px solid rgba(255, 255, 255, 0.1);">
							<div class="d-flex align-items-center gap-2 mb-2">
								<span class="badge d-inline-flex align-items-center gap-1 px-2 py-1" style="background: #f4bd0e; color: #1f2b3a;"><em class="icon ni ni-coins"></em> Ecosystem</span>
								<span class="small text-white-50">Token Utility</span>
							</div>
							<h5 class="h6 text-white fw-bold mb-1">MyMI Gold Rewards &amp; Upgrades</h5>
							<p class="small text-white-50 mb-3">Use MyMI Gold (MyMIG) to unlock membership tiers, access reduced swap rates, and participate in platform rewards.</p>
							<a href="<?= site_url('How-It-Works/MyMI-Gold') ?>" class="small fw-bold text-decoration-none" style="color: #38cfc2;">Explore Gold utility →</a>
						</div>
					</div>

					<!-- Promo 2: Solana Web3 Swap -->
					<div class="col-md-6">
						<div class="p-3 rounded-3 h-100" style="background: rgba(255, 255, 255, 0.06); border: 1px solid rgba(255, 255, 255, 0.1);">
							<div class="d-flex align-items-center gap-2 mb-2">
								<span class="badge d-inline-flex align-items-center gap-1 px-2 py-1" style="background: #20c997; color: #ffffff;"><em class="icon ni ni-swap"></em> Web3</span>
								<span class="small text-white-50">Instant Swap</span>
							</div>
							<h5 class="h6 text-white fw-bold mb-1">Solana Pay &amp; Asset Exchange</h5>
							<p class="small text-white-50 mb-3">Swap digital tokens in sub-seconds with micro-cent network fees and verifiable on-chain receipts.</p>
							<a href="<?= site_url('How-It-Works/Manage-Finances') ?>" class="small fw-bold text-decoration-none" style="color: #38cfc2;">See wallet features →</a>
						</div>
					</div>

					<!-- Promo 3: AI-Driven Forecasting -->
					<div class="col-md-6">
						<div class="p-3 rounded-3 h-100" style="background: rgba(255, 255, 255, 0.06); border: 1px solid rgba(255, 255, 255, 0.1);">
							<div class="d-flex align-items-center gap-2 mb-2">
								<span class="badge d-inline-flex align-items-center gap-1 px-2 py-1" style="background: #366bfa; color: #ffffff;"><em class="icon ni ni-growth"></em> Intelligence</span>
								<span class="small text-white-50">Predictive</span>
							</div>
							<h5 class="h6 text-white fw-bold mb-1">90-Day Cash-Flow Forecasting</h5>
							<p class="small text-white-50 mb-3">Stress-test your budget against real-life changes before allocating capital to new investments.</p>
							<a href="<?= site_url('How-It-Works/Setting-Financial-Goals') ?>" class="small fw-bold text-decoration-none" style="color: #38cfc2;">Learn forecasting →</a>
						</div>
					</div>

					<!-- Promo 4: Investor Community -->
					<div class="col-md-6">
						<div class="p-3 rounded-3 h-100" style="background: rgba(255, 255, 255, 0.06); border: 1px solid rgba(255, 255, 255, 0.1);">
							<div class="d-flex align-items-center gap-2 mb-2">
								<span class="badge d-inline-flex align-items-center gap-1 px-2 py-1" style="background: #816bff; color: #ffffff;"><em class="icon ni ni-chat-circle"></em> Community</span>
								<span class="small text-white-50">Discord</span>
							</div>
							<h5 class="h6 text-white fw-bold mb-1">Live Market News &amp; Discord Alpha</h5>
							<p class="small text-white-50 mb-3">Join fellow members discussing corporate earnings, macro trends, and daily trade ideas.</p>
							<a href="<?= site_url('Support/Discord') ?>" class="small fw-bold text-decoration-none" style="color: #38cfc2;">Connect with community →</a>
						</div>
					</div>
				</div>

				<div class="mt-4 pt-3 border-top border-light border-opacity-10 d-flex justify-content-between align-items-center flex-wrap gap-2">
					<span class="small text-white-50">Need a comprehensive walkthrough?</span>
					<a href="<?= site_url('How-It-Works') ?>" class="btn btn-sm btn-outline-light px-3">
						<span>View How It Works</span> <em class="icon ni ni-arrow-right ms-1"></em>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

<?= $this->endSection() ?>
