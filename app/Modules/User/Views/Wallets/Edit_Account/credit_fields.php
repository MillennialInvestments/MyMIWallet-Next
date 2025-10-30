<?php /* /users/views/edit/credit_accounts.php */
date_default_timezone_set('America/Chicago');
$date = date("F jS, Y");
$hostTime = date("g:i A");
$time = date("g:i A");

// Set Form Config
$formGroup = $siteSettings->formContainer;
$formLabel = $siteSettings->formLabel;
$formConCol = $siteSettings->formControlColumn;
$formControl = $siteSettings->formControl;
$formSelect = $siteSettings->formSelect;
$formControl = $siteSettings->formSelectpicker;
$formText = $siteSettings->formText;
$formCustomText = $siteSettings->formCustomText;
?>
<h4 class="card-title">Edit Credit Account Information</h4>
<p class="card-description">Please update the information below</p>
<hr>

<?= form_hidden('beta', (string) $accountBeta) ?>
<?= form_hidden('form_mode', 'Edit') ?>
<?= form_hidden('user_id', (string) $accountUserID) ?>
<?= form_hidden('user_email', $accountUserEmail) ?>
<?= form_hidden('username', $accountUsername) ?>
<?= form_hidden('wallet_id', (string) $accountWalletID) ?>
<?= form_hidden('account_id', (string) $accountID) ?>
<?= form_hidden('wallet_type', 'Credit') ?>
<?= form_hidden('account_type', 'Credit') ?>

<div class="form-group">
    <label for="credit_status">Credit Card Status</label>
    <select name="credit_status" id="credit_status" class="form-control">
        <option value="Active" <?= $accountCreditStatus == 'Active' ? 'selected' : '' ?>>Active</option>
        <option value="Closed" <?= $accountCreditStatus == 'Closed' ? 'selected' : '' ?>>Closed</option>
    </select>
</div>

<div class="form-group">
    <label for="bank_name">Name of Bank</label>
    <input type="text" class="form-control" name="bank_name" id="bank_name" value="<?= $accountBank ?>" placeholder="Ex: Capital One Bank">
</div>

<div class="form-group">
    <label for="nickname">Nickname for Account</label>
    <input type="text" class="form-control" name="nickname" id="nickname" value="<?= $accountNickname ?>" placeholder="Ex: Main Credit Card">
</div>

<div class="form-group">
    <label for="account_number">Credit Card Number</label>
    <input type="text" class="form-control" name="account_number" id="account_number" value="<?= $accountNumber ?>" placeholder="Ex: 4000123412341234">
</div>
<?php log_message('debug', 'Wallets\Edit_Account\credit_fields L53 - $accountDueDate: ' . $accountDueDate); ?>
<div class="form-group">
    <label for="due_date">Due Date</label>
    <input type="date" name="due_date" id="due_date" class="form-control" value="<?= !empty($accountDueDate) ? $accountDueDate : '' ?>">
</div>

<div class="form-group">
    <label for="payment_due">Payment Due</label>
    <input type="text" class="form-control" name="payment_due" id="payment_due" value="<?= $accountPaymentDue ?>" placeholder="Ex: 5000.00">
</div>

<div class="form-group">
    <label for="interest_rate">Interest Rate (%)</label>
    <input type="text" class="form-control" name="interest_rate" id="interest_rate" value="<?= $accountInterestRate ?>" placeholder="Ex: 18% (Global Average)">
</div>

<div class="form-group">
    <label for="credit_limit">Total Credit Limit</label>
    <input type="text" class="form-control" name="credit_limit" id="credit_limit" value="<?= $accountCreditLimit ?>" placeholder="Ex: 5000.00">
</div>

<div class="form-group">
    <label for="current_balance">Current Balance</label>
    <input type="text" class="form-control" name="current_balance" id="current_balance" value="<?= $accountCurrentBalance ?>" placeholder="Ex: 1500.00">
</div>

<div class="form-group">
    <label for="available_balance">Available Balance</label>
    <input type="text" class="form-control" name="available_balance" id="available_balance" disabled value="<?= $accountAvailableBalance ?>" placeholder="Will be calculated">
</div>

<div class="form-group pt-3">
    <button type="submit" class="btn btn-primary">Save Changes</button>
    <a href="<?= site_url('/Wallets') ?>" class="btn btn-secondary">Cancel</a>
</div>

<script <?= $nonce['script'] ?? '' ?>>
document.getElementById('current_balance').addEventListener('input', calculateBalance);
document.getElementById('credit_limit').addEventListener('input', calculateBalance);

function calculateBalance() {
    var credit_limit = parseFloat(document.getElementById('credit_limit').value) || 0;
    var current_balance = parseFloat(document.getElementById('current_balance').value) || 0;
    var available_balance = credit_limit - current_balance;
    document.getElementById('available_balance').value = available_balance.toFixed(2);
}

// Call this function on page load to calculate the initial available balance
calculateBalance();
</script>
