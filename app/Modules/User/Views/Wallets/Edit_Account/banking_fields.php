<?php /* /users/views/edit/bank_accounts.php */
date_default_timezone_set('America/Chicago');
$date = $siteSettings->date;
$hostTime = $siteSettings->hostTime;;
$time = $siteSettings->time;;

// Form Config
$formGroup = $siteSettings->formContainer;
$formLabel = $siteSettings->formLabel;
$formConCol = $siteSettings->formControlColumn;
$formControl = $siteSettings->formControl;
$formSelect = $siteSettings->formSelect;
$formControl = $siteSettings->formSelectpicker;
$formText = $siteSettings->formText;
$formCustomText = $siteSettings->formCustomText;

?>
<h4 class="card-title">Edit Bank Account</h4>
<p class="card-description">Please update the information below</p>
<hr>

<?= form_hidden('beta', (string) $accountBeta) ?>
<?= form_hidden('form_mode', 'Edit') ?>
<?= form_hidden('user_id', (string) $accountUserID) ?>
<?= form_hidden('user_email', $accountUserEmail) ?>
<?= form_hidden('username', $accountUsername) ?>
<?= form_hidden('wallet_id', (string) $accountWalletID) ?>
<?= form_hidden('account_id', (string) $accountID) ?>
<?= form_hidden('wallet_type', 'Bank') ?>

<div class="form-group">
    <label for="bank_name">Name of Bank</label>
    <input type="text" class="form-control" name="bank_name" id="bank_name" value="<?= $accountBank ?>" placeholder="Ex: Capital One Bank">
</div>

<div class="form-group">
    <label for="account_type">Account Type</label>
    <select name="account_type" id="account_type" class="form-control">
        <option value="Checking" <?= $accountType == 'Checking' ? 'selected' : '' ?>>Checking</option>
        <option value="Saving" <?= $accountType == 'Saving' ? 'selected' : '' ?>>Saving</option>
    </select>
</div>

<div class="form-group">
    <label for="bank_account_owner">Is your name on the account?</label>
    <select name="bank_account_owner" id="bank_account_owner" class="form-control">
        <option value="Yes" <?= $accountOwner == 'Yes' ? 'selected' : '' ?>>Yes</option>
        <option value="No" <?= $accountOwner == 'No' ? 'selected' : '' ?>>No</option>
    </select>
</div>

<div class="form-group">
    <label for="routing_number">Routing Number</label>
    <input type="text" class="form-control" name="routing_number" id="routing_number" value="<?= $accountRouting ?>" placeholder="Ex: 012345678">
</div>

<div class="form-group">
    <label for="account_number">Account Number</label>
    <input type="text" class="form-control" name="account_number" id="account_number" value="<?= $accountNumber ?>" placeholder="Ex: 0123456789101112">
</div>

<div class="form-group">
    <label for="nickname">Create Nickname for Account</label>
    <input type="text" class="form-control" name="nickname" id="nickname" value="<?= $accountNickname ?>" placeholder="Ex: Main Banking Account">
</div>

<div class="form-group">
    <label for="balance">Current Account Balance</label>
    <input type="text" class="form-control" name="balance" id="balance" value="<?= $accountBalance ?>" placeholder="Ex: 1500.00">
</div>

<div class="form-group pt-3">
    <button type="submit" class="btn btn-primary">Save Changes</button>
    <a href="<?= site_url('/Wallets') ?>" class="btn btn-secondary">Cancel</a>
</div>
