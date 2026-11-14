<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>
<div class="container">
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <div class="card">
                <h2 class="card-header">Two-factor verification</h2>
                <div class="card-body">
                    <?php if (! empty($error)) : ?>
                        <div class="alert alert-danger"><?= esc($error) ?></div>
                    <?php endif; ?>
                    <p>Enter the 6-digit code from your authenticator app, or one of your backup codes.</p>
                    <form action="<?= site_url('Auth/Two-Factor/verify') ?>" method="post" autocomplete="off">
                        <?= csrf_field() ?>
                        <div class="form-group mb-3">
                            <label for="code">Code</label>
                            <input type="text" class="form-control" id="code" name="code" inputmode="numeric"
                                   autocomplete="one-time-code" maxlength="8" required autofocus>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Verify</button>
                    </form>
                    <p class="mt-3"><a href="<?= site_url('logout') ?>">Sign out</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
