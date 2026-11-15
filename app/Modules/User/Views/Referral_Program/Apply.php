<?php
/**
 * GT-FORM-ROUTES-001: referral program application, rewritten from CodeIgniter 3
 * ($this->db, $this->load->view, Template::block). Posts to Referral-Program/Apply.
 * The server sets user id, referrer code and status; the form only carries
 * contact and payout details.
 */
$v = static fn (string $key, string $fallback = '') => esc((string) old($key, $fallback), 'attr');
$fields = [
    ['first_name', 'First Name', 'text', $cuFirstName ?? '', true],
    ['last_name', 'Last Name', 'text', $cuLastName ?? '', true],
    ['email', 'Email', 'email', $cuEmail ?? '', true],
    ['phone', 'Phone', 'tel', $cuPhone ?? '', false],
    ['address', 'Address', 'text', $cuAddress ?? '', false],
    ['city', 'City', 'text', $cuCity ?? '', false],
    ['state', 'State', 'text', $cuState ?? '', false],
    ['country', 'Country', 'text', $cuCountry ?? '', false],
    ['zipcode', 'Zip Code', 'text', $cuZipCode ?? '', false],
];
?>
<div class="nk-block">
    <div class="nk-block-head-xs">
        <h1 class="nk-block-title title">Referral Program Application</h1>
        <a href="<?= site_url('Dashboard') ?>">Return to Dashboard</a>
    </div>
    <?php if (session('error')): ?><div class="alert alert-danger mt-3"><?= esc(session('error')) ?></div><?php endif; ?>
    <div class="row mt-3">
        <div class="col-12 col-md-7 pe-md-5 border-end mb-4">
            <h5>How the program works</h5>
            <p>Share your referral link<?= ! empty($referrerCode) ? ' (code <strong>' . esc($referrerCode) . '</strong>)' : '' ?>. When someone you refer signs up for a paid membership, you earn a referral commission.</p>
            <p>Our team reviews every application within 24 to 48 hours. Commissions start once your application is approved.</p>
            <p>Please read the <a href="<?= site_url('Referral-Program/Agreement') ?>">Marketing Affiliate Program Agreement</a> before you apply.</p>
        </div>
        <div class="col-12 col-md-5 px-md-4">
            <form id="referral-program-application-form" method="post" action="<?= esc(site_url('Referral-Program/Apply'), 'attr') ?>" autocomplete="on">
                <?= csrf_field() ?>
                <h4 class="card-title">Account Information</h4>
                <?php foreach ($fields as [$name, $label, $type, $default, $required]): ?>
                    <div class="form-group mb-2">
                        <label for="<?= $name ?>" class="form-label"><?= esc($label) ?></label>
                        <input type="<?= $type ?>" class="form-control" name="<?= $name ?>" id="<?= $name ?>" value="<?= $v($name, (string) $default) ?>"<?= $required ? ' required' : '' ?>>
                    </div>
                <?php endforeach; ?>
                <h4 class="card-title mt-3">Payout Information</h4>
                <div class="form-group mb-2">
                    <label for="paypal" class="form-label">PayPal Email</label>
                    <input type="email" class="form-control" name="paypal" id="paypal" value="<?= $v('paypal') ?>">
                </div>
                <div class="form-group mb-2">
                    <label for="wallet_id" class="form-label">Wallet Address</label>
                    <input type="text" class="form-control" name="wallet_id" id="wallet_id" value="<?= $v('wallet_id', (string) ($cuWalletID ?? '')) ?>">
                </div>
                <div class="form-group mb-2">
                    <label for="other_payment" class="form-label">Other Payout Method</label>
                    <input type="text" class="form-control" name="other_payment" id="other_payment" value="<?= $v('other_payment') ?>">
                </div>
                <button class="btn btn-primary mt-2" type="submit">Submit Application</button>
            </form>
        </div>
    </div>
</div>
