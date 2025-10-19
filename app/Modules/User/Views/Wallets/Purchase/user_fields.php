<?php /* /users/views/user_fields.php */
// $client                                         = new \GuzzleHttp\Client(); 
$errorClass    			 	                    = empty($errorClass) ? ' error' : $errorClass;
$controlClass  		 		                    = empty($controlClass) ? 'span4' : $controlClass;
// Set Form Config
$formGroup				                    	= $siteSettings->formContainer;
$formLabel					                    = $siteSettings->formLabel;
$formConCol					                    = $siteSettings->formControlColumn;
$formControl				                    = $siteSettings->formControl;
$formSelect					                    = $siteSettings->formSelect;
$formControl			                        = $siteSettings->formSelectpicker;
$formText					                    = $siteSettings->formText;
$formCustomText				                    = $siteSettings->formCustomText;
$MyMIGoldValue				                    = $siteSettings->MyMIGCoinValue;
$wallet_cost				                    = $siteSettings->walletCost;
if ($featureType === 'Purchase-Wallet') {
    if ($walletType === 'Fiat') {
        $feature_title                          = 'Purchase Premium Wallet';
        $feature_type                           = 'Premium Wallet';
        echo '<input type="hidden" class="form-control" name="wallet_type" id="wallet_type" value="' . set_value('wallet_type', isset($user) ? $user->wallet_type : $walletType) . '">';
    } elseif ($walletType === 'Digital') {
        $feature_title                          = 'Purchase Premium Wallet';
        $feature_type                           = 'Premium Wallet';
        echo '<input type="hidden" class="form-control" name="wallet_type" id="wallet_type" value="' . set_value('wallet_type', isset($user) ? $user->wallet_type : $walletType) . '">';
    }
    echo '<input type="hidden" class="form-control" name="feature_type" id="feature_type" value="' . set_value('feature_type', isset($user) ? $user->feature_type : $feature_type) . '">';
} elseif ($featureType === 'Purchase') {
    $feature_title                              = 'Purchase MyMI Gold';
}
$expenses					                    = $transPercent + $transFee;
$total_fees					                    = $expenses;
$fee_coins					                    = round(($total_fees / $MyMIGoldValue), 8);
$MyMIGCoinSum                                   = floatval($MyMIGCoinSum);
$walletCost					                    = floatval($wallet_cost + $expenses);
//~ echo $walletCoins;
$remainingCoins				                    = $MyMIGCoinSum - $walletCost;

$client_id                                      = $cuUserType === 'Beta' ? 'AffPMSjviq6Zkkpvn79YQnawbzP6bnG7J71vfbMu5eYp9qUe7OnoaKtEksenCvMkV3EU6D0M_927_PX_' : 'AeNL90i_VizF7CId1oC3Buc7YlyPHJIO9BF3t0j1FwW7_RRLsTKfPyeFu30S_VRu6WydKw7ETUmtFp2n';
?>                              
<h4 class="card-title"><?php echo $feature_title; ?></h4>
<p class="card-description"> Please fill out information below</p>			
<hr>
<input type="hidden" id="beta" name="beta" value="<?php echo set_value('beta', isset($user) ? $user->beta : $beta); ?>" />   
<input type="hidden" class="form-control" name="user_id" id="user_id" value="<?php echo set_value('user_id', isset($user) ? $user->user_id : $cuID); ?>">	
<input type="hidden" class="form-control" name="user_email" id="user_email" value="<?php echo set_value('user_email', isset($user) ? $user->user_email : $cuEmail); ?>">
<input type="hidden" class="form-control" name="wallet_id" id="wallet_id" value="<?php echo set_value('wallet_id', isset($user) ? $user->wallet_id : $cuWalletID); ?>">
<input type="hidden" class="form-control" name="feature_cost" id="feature_cost" value="<?php echo set_value('feature_cost', isset($user) ? $user->feature_cost : $walletCost); ?>">
<input type="hidden" class="form-control" name="available_coins" id="available_coins" value="<?php echo set_value('available_coins', isset($user) ? $user->available_coins : $MyMIGCoinAvailable); ?>">
<input type="hidden" class="form-control" name="initial_value" id="initial_value" value="<?php echo set_value('initial_value', isset($user) ? $user->initial_value : $MyMIGoldValue); ?>">	
<input type="hidden" class="form-control" name="coin_value" id="coin_value" value="<?php echo set_value('coin_value', isset($user) ? $user->coin_value : $MyMIGoldValue); ?>">		
<input type="hidden" class="form-control" name="gas_fee" id="gas_fee" value="<?php echo set_value('gas_fee', isset($user) ? $user->gas_fee : $gasFee); ?>">	
<input type="hidden" class="form-control" name="trans_percent" id="trans_percent" value="<?php echo set_value('trans_percent', isset($user) ? $user->trans_percent : $transPercent); ?>">	
<input type="hidden" class="form-control" name="trans_fee" id="trans_fee" value="<?php echo set_value('trans_fee', isset($user) ? $user->trans_fee : $transFee); ?>">	
<input type="hidden" class="form-control" name="trans_cost" id="trans_cost" value="<?php echo set_value('trans_cost', isset($user) ? $user->trans_cost : ''); ?>">	
<input type="hidden" class="form-control" name="redirect_url" id="redirect_url" value="<?php echo set_value('redirect_url', isset($user) ? $user->redirect_url : $redirect_url); ?>">	
<?php 
if ($siteSettings->beta === 1) {
    $betaCardNumber     = '4032034114488086';
    $betaExpiryDate     = '07/2025';
    $betaSecurityCode   = '279';
    $apiClientID        = 'AffPMSjviq6Zkkpvn79YQnawbzP6bnG7J71vfbMu5eYp9qUe7OnoaKtEksenCvMkV3EU6D0M_927_PX_';
    $apiClientSecret    = 'EHuPVTP72XJ8OM7a7AirbtOn6H5awEshqrJuczUdTtNSrVcxYDta9p_Kir9Q11biT6_SlS7_fAAeqo6f'
?>
    <div class="col-md-4"></div>
    <div class="col-md-4">   
        <p class="card-text blog-text text-center">
            <strong>BETA CREDIT CARD INFORMATION</strong><br>
            <strong>USE THIS CREDIT CARD FOR BETA USE ONLY</strong>
        </p>   
        <table class="table table-borderless">
            <tbody>
                <tr>
                    <td>Credit Card Number</td>
                    <td class="text-right"><?= $betaCardNumber; ?></td>
                </tr>
                <tr>
                    <td>Expiration Date</td>
                    <td class="text-right"><?= $betaExpiryDate; ?></td>
                </tr>
                <tr>
                    <td>Security Code</td>
                    <td class="text-right"><?= $betaSecurityCode; ?></td>
                </tr>
            </tbody>
        </table>
        <hr>
    </div>   
    <div class="col-md-2"></div>
<?php } ?>
<div class="<?php echo $formGroup; ?> mb-2">    
	<label class="col-6 form-label" for="default-01">Available MyMI Gold</label>    
	<div class="col-6">       
		<label class="form-label mt-3"><?php echo number_format($MyMIGCoinAvailable, 2); ?> Gold</label>	      	   
		<input type="hidden" name="initial_balance" id="initial_balance" placeholder="Enter Wallet Amount" value="<?php echo set_value('initial_balance', isset($user) ? $user->initial_balance : $MyMIGCoinSum); ?>">	
	</div>
</div>
<div class="<?php echo $formGroup; ?> mb-2">    
	<label class="col-6 form-label" for="default-01">Number of MyMI Gold?</label>    
	<div class="col-3">           	   
		<input type="number" class="<?php echo $formControl; ?>" name="gold_coins" id="gold_coins" placeholder="Enter Amount of MyMIG to Purchase" value="<?php echo set_value('gold_coins', isset($user) ? $user->gold_coins : ''); ?>">	
	</div>
</div>
<div class="<?php echo $formGroup; ?> mb-2">    
	<label class="col-6 form-label" for="default-01">MyMI Gold Cost</label>    
	<div class="col-6"> 
		<label class="form-label mt-3">$<?php echo number_format($MyMIGoldValue, 2); ?> USD</label>	   
	</div>
</div>
<div class="<?php echo $formGroup; ?> mb-2">    
    <label class="col-6 form-label" for="default-01">Curent (USD)</label>    
    <div class="col-6"> 
        <label class="form-label mt-3">$<span id="prelimCost">0.00</span> USD</label>	   
    </div>
</div>
<div class="<?php echo $formGroup; ?> mb-2">    
	<label class="col-6 form-label" for="default-01">Transaction Fees</label>    
	<div class="col-6"> 
        <label class="form-label mt-3 transaction-fees-label">0 Gold</label>	   
	</div>
</div>
<div class="<?php echo $formGroup; ?> mb-2">    
	<label class="col-6 form-label" for="default-01">Subtotal Cost</label>    
	<div class="col-6"> 
		<label class="form-label mt-3">$<span id="transCost">0.00</span> USD</label>	   
	</div>
</div>
<div class="<?php echo $formGroup; ?> mb-2">    
    <label class="col-6 form-label" for="default-01">Total Amount of MyMIG</label>    
    <div class="col-6"> 
        <label class="form-label mt-3 transaction-subtotal-label">0.00 Gold</label>	   
    </div>
</div>
<div class="<?php echo $formGroup; ?> mb-2">    
	<label class="col-6 form-label" for="default-01">Remaining MyMI Gold</label>    
	<div class="col-6">       
        <label class="form-label mt-3 remaining-coins-label"><?php echo number_format($MyMIGCoinAvailable,8); ?> Gold</label>   
		<input type="hidden" name="remaining_balance" id="remaining_balance" placeholder="Enter Wallet Amount" value="<?php echo set_value('remaining_balance', isset($user) ? $user->remaining_balance : $remainingCoins); ?>">			
	</div>
</div> 
<div class="<?php echo $formGroup; ?> mb-2">    
	<label class="col-6 form-label" for="default-01">Checkout?</label>    
	<div class="col-3">        
        <div id="paypal-button-container"></div>
    </div>
</div>

<script src="https://www.paypal.com/sdk/js?client-id=<?= $client_id ?>&currency=USD"></script>  
<script <?= $nonce['script'] ?? '' ?>>
document.getElementById("gold_coins").addEventListener("input", function() {
    var goldCoins = parseFloat(this.value) || 0;
    var transPercent = parseFloat(document.getElementById("trans_percent").value) || 0;
    var transFee = parseFloat(document.getElementById("trans_fee").value) || 0;
    var MyMIGCoinAvailable = parseFloat(document.getElementById("available_coins").value) || 0;
    var MyMIGoldValue = <?php echo $MyMIGoldValue; ?>;

    // Function to format numbers with commas
    function formatNumber(num, decimals = 2) {
        return num.toFixed(decimals).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
    }

    // Calculate the preliminary USD cost
    var prelimCostUSD = goldCoins * MyMIGoldValue;
    document.getElementById("prelimCost").innerText = formatNumber(prelimCostUSD);

    // Calculate transaction fees and total cost
    var transactionFees = (goldCoins * transPercent) + transFee;
    var totalCostUSD = prelimCostUSD + transactionFees;

    document.getElementById("trans_cost").value = formatNumber(transactionFees, 8);
    document.getElementById("transCost").innerText = formatNumber(totalCostUSD);

    // Subtract transaction fees from total available coins to get remaining coins
    var remainingCoins = MyMIGCoinAvailable - transactionFees - goldCoins;
    document.querySelector(".remaining-coins-label").innerText = formatNumber(remainingCoins, 8) + ' Gold';

    // Update the Transaction Fees display
    document.querySelector(".transaction-fees-label").innerText = formatNumber(transactionFees, 2) + ' Gold';

    // Calculate the total amount of coins the user will receive
    var totalCoinsReceived = goldCoins - transactionFees;
    document.querySelector(".transaction-subtotal-label").innerText = formatNumber(totalCoinsReceived, 8) + ' Gold';
});

paypal.Buttons({
    createOrder: function(data, actions) {
        var transCost = parseFloat(document.getElementById("transCost").innerText.replace(/,/g, '')) || 0;
        return actions.order.create({
            purchase_units: [{
                amount: {
                    value: transCost.toFixed(2)
                }
            }]
        });
    },
    onApprove: function(data, actions) {
        return actions.order.capture().then(function(details) {
            // Prepare the form data to send to the callback route
            var formData = new FormData();
            formData.append('transaction_id', details.id);
            formData.append('total_cost', details.purchase_units[0].amount.value);
            
            fetch('<?=site_url("/Wallets/MyMIGPayPalCallback")?>', {
                method: 'POST',
                body: formData,
                credentials: 'same-origin'
            }).then(function() {
                window.location.href = '<?=site_url("/Wallets/Purchase/MyMIGold/Complete")?>';
            });
        });
    }
}).render('#paypal-button-container');
</script>