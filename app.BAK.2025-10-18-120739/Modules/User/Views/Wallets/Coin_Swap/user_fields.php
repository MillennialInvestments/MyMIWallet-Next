<?php
?>
<h4 class="card-title"><?= $feature_title; ?></h4>
<p class="card-description">Please fill out information below</p>
<hr>
<input id="beta" name="beta" type="hidden" value="<?= set_value('beta', $beta); ?>">
<input id="user_id" name="user_id" type="hidden" value="<?= set_value('user_id', $cuID); ?>">
<input id="user_email" name="user_email" type="hidden" value="<?= set_value('user_email', $cuEmail); ?>">
<input id="wallet_id" name="wallet_id" type="hidden" value="<?= set_value('wallet_id', $cuWalletID); ?>">
<input id="feature_cost" name="feature_cost" type="hidden" value="<?= set_value('feature_cost', $walletCost); ?>">
<input id="available_coins" name="available_coins" type="hidden" value="<?= set_value('available_coins', $MyMIGCoinAvailable); ?>">
<input id="initial_value" name="initial_value" type="hidden" value="<?= set_value('initial_value', $MyMIGoldValue); ?>">
<input id="coin_value" name="coin_value" type="hidden" value="<?= set_value('coin_value', $MyMIGoldValue); ?>">
<input id="gas_fee" name="gas_fee" type="hidden" value="<?= set_value('gas_fee', $gasFee); ?>">
<input id="trans_percent" name="trans_percent" type="hidden" value="<?= set_value('trans_percent', $transPercent); ?>">
<input id="trans_fee" name="trans_fee" type="hidden" value="<?= set_value('trans_fee', $transFee); ?>">
<input id="trans_cost" name="trans_cost" type="hidden" value="">
<input id="redirect_url" name="redirect_url" type="hidden" value="<?= set_value('redirect_url', $featureRedirectURL); ?>">

<div class="<?= $formGroup; ?> mb-2">
    <label class="col-6 <?= $formLabel; ?>" for="default-01">Available MyMI Gold</label>
    <div class="col-4">
        <label class="form-label mt-3"><?= number_format($MyMIGCoinAvailable, 2); ?> Gold</label>
        <input id="initial_balance" name="initial_balance" type="hidden" value="<?= set_value('initial_balance', $MyMIGCoinSum); ?>" placeholder="Enter Wallet Amount">
    </div>
</div>

<div class="<?= $formGroup; ?> mb-2">
    <label class="col-6 <?= $formLabel; ?>" for="default-01">Number of MyMI Gold?</label>
    <div class="col-6">
        <input id="gold_coins" name="gold_coins" type="number" value="<?= set_value('gold_coins', ''); ?>" class="<?= $formControl; ?>" placeholder="Enter Amount of MyMIG to Purchase">
    </div>
</div>

<div class="<?= $formGroup; ?> mb-2">
    <label class="col-6 <?= $formLabel; ?>" for="default-01">MyMI Gold Cost</label>
    <div class="col-6">
        <label class="form-label mt-3">$<?= number_format($MyMIGoldValue, 2); ?> USD</label>
    </div>
</div>

<div class="<?= $formGroup; ?> mb-2">
    <label class="col-6 <?= $formLabel; ?>" for="default-01">Curent (USD)</label>
    <div class="col-6">
        <label class="form-label mt-3">$<span id="prelimCost">0.00</span> USD</label>
    </div>
</div>

<div class="<?= $formGroup; ?> mb-2">
    <label class="col-6 <?= $formLabel; ?>" for="default-01">Transaction Fees</label>
    <div class="col-6">
        <label class="form-label mt-3 transaction-fees-label">0 Gold</label>
    </div>
</div>

<div class="<?= $formGroup; ?> mb-2">
    <label class="col-6 <?= $formLabel; ?>" for="default-01">Subtotal Cost</label>
    <div class="col-6">
        <label class="form-label mt-3">$<span id="transCost">0.00</span> USD</label>
    </div>
</div>

<div class="<?= $formGroup; ?> mb-2">
    <label class="col-6 <?= $formLabel; ?>" for="default-01">Total Amount of MyMIG</label>
    <div class="col-6">
        <label class="form-label mt-3 transaction-subtotal-label">0.00 Gold</label>
    </div>
</div>

<div class="<?= $formGroup; ?> mb-2">
    <label class="col-6 <?= $formLabel; ?>" for="default-01">Remaining MyMI Gold</label>
    <div class="col-6">
        <label class="form-label mt-3 remaining-coins-label"><?= number_format($MyMIGCoinAvailable, 0); ?> Gold</label>
        <input id="remaining_balance" name="remaining_balance" type="hidden" value="<?= set_value('remaining_balance', $remainingCoins); ?>" placeholder="Enter Wallet Amount">
    </div>
</div>

<?php if ($beta === 1): ?>
    <hr>
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <p class="text-center blog-text card-text"><strong>BETA CREDIT CARD INFORMATION</strong><br><strong>USE THIS CREDIT CARD FOR BETA USE ONLY</strong></p>
        <table class="table table-borderless">
            <tbody>
                <tr><td>Credit Card Number</td><td class="text-right">4032034114488086</td></tr>
                <tr><td>Expiration Date</td><td class="text-right">07/2025</td></tr>
                <tr><td>Security Code</td><td class="text-right">279</td></tr>
            </tbody>
        </table>
        <hr>
    </div>
    <div class="col-md-2"></div>
<?php endif; ?>

<?php if (1): ?>
    <hr>
    <div class="<?= $formGroup; ?> mb-2">
        <div class="text-center col-12">
            <label class="<?= $formLabel; ?>" for="default-01">Checkout with Crypto?</label>
        </div>
    </div>
    <div class="<?= $formGroup; ?> mb-2">
        <div class="col-6 text-center">
            <div class="mx-2">
                <button class="btn btn-block btn-primary crypto-btn" id="BTCPaymentButton" type="button"><span>Pay with</span> <em class="ml-0 icon ni ni-sign-btc-alt"></em> <span class="ml-0">BTC</span></button>
                <button class="btn btn-block btn-primary crypto-btn" id="ETHPaymentButton" type="button"><span>Pay with</span> <em class="ml-0 icon ni ni-sign-eth-alt"></em> <span class="ml-0">ETH</span></button>
            </div>
        </div>
        <div class="col-6 text-center">
            <div class="mx-2">
                <button class="btn btn-block btn-primary crypto-btn" id="SOLPaymentButton" type="button"><span>Pay with</span> <em class="ml-0 icon ni ni-coin"></em> <span class="ml-0">SOL</span></button>
                <button class="btn btn-block btn-primary crypto-btn" id="DGBPaymentButton" type="button"><span>Pay with</span> <em class="ml-0 icon ni ni-sign-dash-alt"></em> <span class="ml-0">DGB</span></button>
            </div>
        </div>
    </div>
<?php endif; ?>

<hr>
<div class="<?= $formGroup; ?> mb-2">
    <div class="text-center col-12">
        <label class="<?= $formLabel; ?>" for="default-01">Checkout with Fiat?</label>
        <div id="paypal-button-container"></div>
    </div>
</div>