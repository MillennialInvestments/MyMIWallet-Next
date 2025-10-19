<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<div class="container">
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <div class="card">
                <h2 class="card-header">Activate Your Account</h2>
                <div class="card-body">

                    <?= view('Auth/_message_block'); ?>

                    <form action="<?= site_url('/activate-account') ?>" method="post">
                        <?= csrf_field() ?>
                        <input type="hidden" name="email" value="<?= esc($email) ?>">
                        <input type="hidden" name="activation_code" value="<?= esc($activationCode) ?>">

                        <div class="form-group">
                            <label for="email"><?= lang('Auth.email') ?></label>
                            <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>"
                                   name="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.email') ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="activation_code">Activation Code</label>
                            <input type="text" class="form-control <?php if (session('errors.activation_code')) : ?>is-invalid<?php endif ?>"
                                   name="activation_code" placeholder="Enter Activation Code Here" 
                                   value="<?= old('activation_code', service('request')->getGet('token')) ?>">
                            <div class="invalid-feedback">
                                <?= session('errors.activation_code') ?>
                            </div>
                        </div>

                        <br>
                        <button type="submit" class="btn btn-primary btn-block">Activate</button>
                    </form>

                    <hr>

                    <p><a href="<?= site_url('/resend-activation') ?>">Resend Activation Code?</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
