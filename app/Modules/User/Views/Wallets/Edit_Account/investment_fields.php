<?php
// Set Form Config
$formGroup				        = $siteSettings->formContainer;
$formLabel				        = $siteSettings->formLabel;
$formConCol				        = $siteSettings->formControlColumn;
$formControl			        = $siteSettings->formControl;
$formSelect				        = $siteSettings->formSelect;
$formControl		            = $siteSettings->formSelectpicker;
$formText				        = $siteSettings->formText;
$formCustomText			        = $siteSettings->formCustomText;


// Define options for the broker select input dynamically
$brokerOptions = [
    'N/A'                   => 'Select-An-Option',
    'Ally Invest'    		=> 'Ally Invest',
    'Charles Schwab'    	=> 'Charles Schwab',
    'E-Trade'    			=> 'E-Trade',
    'Fidelity'   			=> 'Fidelity',
    'Interactive Brokers'   => 'Interactive Brokers',
    'Merrill Edge'   	 	=> 'Merrill Edge',
    'Robinhood'    			=> 'Robinhood',
    'TD Ameritrade'    		=> 'TD Ameritrade',
    'TradeStation'    		=> 'TradeStation',
    'Vanguard'              => 'Vanguard',
    'Webull'   		 		=> 'Webull',
    'Zacks Trade'    		=> 'Zacks Trade',
];
?>

<h4 class="card-title">Edit Investment Account Information</h4>
<p class="card-description"> Please update the information below</p>
<hr>

<?= form_hidden('form_mode', 'Edit') ?>
<?= form_hidden('user_id', $cuID) ?>
<?= form_hidden('user_email', $cuEmail) ?>
<?= form_hidden('username', $cuUsername) ?>
<?= form_hidden('wallet_id', (string) $accountWalletID) ?>
<?= form_hidden('account_id', (string) $accountID) ?>
<?= form_hidden('wallet_type', 'Investment') ?>

<div class="<?= $formGroup; ?>">
    <label for="broker" class="<?= $formLabel; ?>">Broker/Exchange</label>
    <div class="<?= $formConCol; ?>">
        <select name="broker" id="broker" class="<?= $formSelect; ?>">
            <?php foreach ($brokerOptions as $key => $value): ?>
                <option value="<?= $key; ?>" <?= isset($accountBroker) && $accountBroker == $key ? 'selected' : ''; ?>><?= $value; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>

<div class="<?= $formGroup; ?>">
    <label for="nickname" class="<?= $formLabel; ?>">Wallet Nickname (Optional)</label>
    <div class="<?= $formConCol; ?>">
        <input type="text" name="nickname" id="nickname" class="<?= $formControl; ?>" placeholder="Enter Account Nickname" value="<?= isset($accountNickname) ? $accountNickname : ''; ?>">
    </div>
</div>

<div class="<?= $formGroup; ?>">
    <label for="amount" class="<?= $formLabel; ?>">Current Net Worth</label>
    <div class="<?= $formConCol; ?>">
        <input type="text" name="amount" id="amount" class="<?= $formControl; ?>" placeholder="Enter Current Value of Wallet" value="<?= isset($accountNetWorth) ? $accountNetWorth : ''; ?>">
    </div>
</div>

<div class="<?= $formGroup; ?> pt-3">
    <div class="col-md-4"></div>
    <div class="col-12 col-md-8">
        <div class="row">
            <div class="col-6 px-1">
                <a class="btn btn-secondary btn-block" href="<?= site_url('/wallets') ?>">Cancel</a>
            </div>
            <div class="col-6 px-1">
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </div>
        </div>
    </div>
</div>


<script <?= $nonce['script'] ?? '' ?>>
    function updateOptExpDate() {
        if (document.getElementById('funded').checked) {
            $('#amount').collapse('toggle');
        }
    }
</script>