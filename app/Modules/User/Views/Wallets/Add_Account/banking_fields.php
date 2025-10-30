<?php /* /users/views/user_fields.php */
date_default_timezone_set('America/Chicago');
$date                           = date("F jS, Y");
$hostTime                       = date("g:i A");
$time                           = date("g:i A");
// Set Form Config
$formGroup				        = $siteSettings->formContainer;
$formLabel				        = $siteSettings->formLabel;
$formConCol				        = $siteSettings->formControlColumn;
$formControl			        = $siteSettings->formControl;
$formSelect				        = $siteSettings->formSelect;
$formControl		            = $siteSettings->formSelectpicker;
$formText				        = $siteSettings->formText;
$formCustomText			        = $siteSettings->formCustomText;
$form_mode                      = 'Add';
?>
<?php
// Set up Validation for whether or not we accept Third-Party Accounts
?>		                
<h4 class="card-title">Add Account Information</h4>
<p class="card-description">Please fill out the information below</p>
<hr>

<input id="beta" name="beta" value="<?php echo set_value('beta', $cuUserType === 'Beta' ? 'Yes' : 'No'); ?>" type="hidden">
<input id="form_mode" name="form_mode" value="<?php echo $form_mode; ?>" class="form-control" type="hidden">
<input id="redirectURL" name="redirectURL" value="<?php echo set_value('beta', $redirectURL); ?>" type="hidden">
<input id="user_id" name="user_id" value="<?php echo $cuID; ?>" class="form-control" type="hidden">
<input id="user_email" name="user_email" value="<?php echo $cuEmail; ?>" class="form-control" type="hidden">
<input id="username" name="username" value="<?php echo $cuUsername; ?>" class="form-control" type="hidden">
<input id="wallet_id" name="wallet_id" value="<?php echo $walletID ?? ''; ?>" class="form-control" type="hidden">
<input id="wallet_type" name="wallet_type" value="<?php echo $walletType; ?>" class="form-control" type="hidden">
<input id="purchase_type" name="purchase_type" value="<?php echo $purchaseType; ?>" class="form-control" type="hidden">

<div class="form-group">
    <label for="bank_name" class="col-12">Name of Bank</label>
    <div class="col-12">
        <input type="text" class="form-control" name="bank_name" id="bank_name" placeholder="Ex: Capital One Bank" value="<?= set_value('bank_name', '') ?>">
    </div>
</div>

<div class="form-group">
    <label for="account_type" class="col-12">Account Type</label>
    <div class="col-12">
        <?= form_dropdown('account_type', ['N/A' => 'Select-An-Option', 'Checking' => 'Checking', 'Saving' => 'Saving'], set_value('account_type', ''), ['class' => 'form-control', 'id' => 'account_type', 'required' => 'required']) ?>
    </div>
</div>

<div class="form-group">
    <label for="bank_account_owner" class="col-12">Is your name on the account?</label>
    <div class="col-12">
        <?= form_dropdown('bank_account_owner', ['N/A' => 'Select-An-Option', 'Yes' => 'Yes', 'No' => 'No'], set_value('bank_account_owner', ''), ['class' => 'form-control', 'id' => 'bank_account_owner', 'required' => 'required']) ?>
    </div>
</div>

<div class="form-group">
    <label for="routing_number" class="col-12">Routing Number</label>
    <div class="col-12">
        <input type="text" class="form-control" name="routing_number" id="routing_number" placeholder="Last 4 -OR- Full Routing # (Ex: 0123456789)" value="<?= set_value('routing_number', '') ?>">
    </div>
</div>

<div class="form-group">
    <label for="account_number" class="col-12">Account Number</label>
    <div class="col-12">
        <input type="text" class="form-control" name="account_number" id="account_number" placeholder="Last 4 -OR- 16-Digits (Ex: 012345678910)" value="<?= set_value('account_number', '') ?>">
    </div>
</div>

<div class="form-group">
    <label for="nickname" class="col-12">Create Nickname for Account</label>
    <div class="col-12">
        <input type="text" class="form-control" name="nickname" id="nickname" placeholder="Ex: Main Banking Account" value="<?= set_value('nickname', '') ?>">
    </div>
</div>

<div class="form-group">
    <label for="balance" class="col-12">Current Account Balance</label>
    <div class="col-12">
        <input type="text" class="form-control calculation" name="balance" id="balance" placeholder="Ex: 1500.00" value="<?= set_value('balance', '') ?>">
    </div>
</div>

<div class="form-group pt-3">
    <div class="col-md-4"></div>
    <div class="col-12 col-md-8">
        <div class="row">
            <div class="col-6 px-1">
                <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Cancel</button>
            </div>
            <div class="col-6 px-1">
                <button type="submit" class="btn btn-primary btn-block" id="addNewWalletSubmit">Submit</button>
            </div>
        </div>
    </div>
</div>
<hr>
<!--
<p style="font-size:0.65rem;">
By proceeding, you acknowledge and agree that your transaction is governed by the Terms of Service, the Terms of Service Addendum for Card Payments and the Privacy Policy. All transactions are final.	
</p>
<p style="font-size:0.65rem;">
Your card-issuing bank may charge a foreign transaction fee or another type of fee. Any fees charged by your bank are separate from and in addition to the card processing fee charged by Bittrex. By proceeding, you also acknowledge that you are solely responsible for paying any fees charged by your bank.
</p>
-->

