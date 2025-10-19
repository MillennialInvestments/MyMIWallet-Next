<?php
$month										= date("m");
$day										= date("d");
$year										= date("Y");
$time										= date("h:i:s A");
$unix_time									= time();
$currentMethod 								= $this->router->method;
$errorClass     							= empty($errorClass) ? ' error' : $errorClass;
$registerClass  							= $currentMethod == 'register' ? ' required' : '';
$editSettings   							= $currentMethod == 'edit';
$defaultLanguage							= isset($user->language) ? $user->language : strtolower(settings_item('language'));
$defaultTimezone 							= isset($user->timezone) ? $user->timezone : strtoupper(settings_item('site.default_user_timezone'));
// Input Field Settings
$controlGroup 								= 'control-group form-row py-1';
$controlLabel 								= 'control-label col-sm-4 col-md-4 col-lg-4 pt-2';
$controlClass 								= 'controls col-sm-8 col-md-8 col-lg-8 pl-3';
$controlInput   							= 'form-control full-width';
$fundSum									= $_SESSION['allSessionData']['userAccount']['walletFunds'];
$trading_account							= $_SESSION['allSessionData']['userAccount']['cuWalletID'];
?>                
<input type="hidden" id="redirectURL" name="redirectURL" value="<?php echo set_value('redirectURL', isset($user) ? $user->redirectURL : $this->uri->uri_string()); ?>" /> 
<input type="hidden" id="unix_timestamp" name="unix_timestamp" value="<?php echo set_value('unix_timestamp', isset($user) ? $user->unix_timestamp : $unix_time); ?>" />
<input type="hidden" id="trade_type" name="trade_type" value="<?php echo set_value('trade_type', isset($user) ? $user->trade_type : 'Buy'); ?>" /> 
<input type="hidden" id="month" name="month" value="<?php echo set_value('month', isset($user) ? $user->month : $month); ?>" /> 
<input type="hidden" id="day" name="day" value="<?php echo set_value('day', isset($user) ? $user->day : $day); ?>" /> 
<input type="hidden" id="year" name="year" value="<?php echo set_value('year', isset($user) ? $user->year : $year); ?>" /> 
<input type="hidden" id="time" name="time" value="<?php echo set_value('time', isset($user) ? $user->time : $time); ?>" />     
<?php
if ($cuUserType === 'Beta') {
    ?>
<input type="hidden" id="beta" name="beta" value="<?php echo set_value('beta', isset($user) ? $user->beta : 'Yes'); ?>" /> 
<?php
} else {
        ?>             
<input type="hidden" id="beta" name="beta" value="<?php echo set_value('beta', isset($user) ? $user->beta : 'No'); ?>" /> 
<?php
    }
?>
<input type="hidden" id="user_id" name="user_id" value="<?php echo set_value('user_id', isset($user) ? $user->user_id : $cuID); ?>" /> 
<input type="hidden" id="user_email" name="user_email" value="<?php echo set_value('user_email', isset($user) ? $user->user_email : $cuEmail); ?>" />  
<input type="hidden" id="trading_account" name="trading_account" value="<?php echo set_value('trading_account', isset($user) ? $user->trading_account : $trading_account); ?>" />  
<div class="<?php e($controlGroup); ?> <?php echo form_error('wallet_id') ? $errorClass : ''; ?>">
    <label class="<?php e($controlLabel); ?> mb-1" for="zipcode">
		Wallet ID <a data-bs-toggle="tooltip" data-placement="bottom" title="Tooltip on bottom"><i class="icon-question"></i></a>
    </label>
    <label class="controls col-sm-8 col-md-8 col-lg-8 pl-0 pt-2 mb-1 no-font-weight">
		<?php
        if ($cuWalletID !== null) {
            echo '<small style="font-size: 70%">' . $cuWalletID . '</small>'; ?>
		<input type="hidden" id="wallet_id" name="wallet_id" value="<?php echo set_value('wallet_id', isset($user) ? $user->wallet_id : $cuWalletID); ?>" />	
		<?php
        } else {
            ?>
			<a class="btn btn-primary btn-sm text-white" data-bs-toggle="modal" data-bs-target="#coinModal"><em class="icon ni ni-wallet-saving"></em><span>Generate Wallet</span></a>
		<?php
        }
        ?>
    </label>
</div>    
<input type="hidden" id="market_pair" name="market_pair" value="<?php echo set_value('market_pair', isset($user) ? $user->market_pair : $market_pair); ?>" /> 
<input type="hidden" id="market" name="market" value="<?php echo set_value('market', isset($user) ? $user->market : $market); ?>" /> 
<input type="hidden" id="initial_value" name="initial_value" value="<?php echo set_value('initial_value', isset($user) ? $user->initial_value : $current_value); ?>" />     
<input type="hidden" id="available_coins" name="available_coins" value="<?php echo set_value('available_coins', isset($user) ? $user->available_coins : $coins_available); ?>" /> 
<input class="<?php e($controlInput); ?>" onChange="calculateBuy(); return false;" onClick="clearBuyContent();" type="hidden" id="current_coin_value" name="current_coin_value" value="<?php echo set_value('current_coin_value', isset($user) ? $user->current_coin_value : $current_coin_value); ?>" />
<div class="<?php e($controlGroup); ?> <?php echo form_error('total_coins') ? $errorClass : ''; ?>">
    <label class="control-label col-sm-4 col-md-4 col-lg-4 pt-4 mb-1" for="total">Coin Value</label>
    <label class="<?php e($controlClass); ?> pt-2 mb-1 no-font-weight">
		<input class="<?php e($controlInput); ?>" onClick="clearBuyContent();" type="type" id="buy_coin_value" name="buy_coin_value" placeholder="Enter Coin Price" value="<?php echo set_value('buy_coin_value', isset($user) ? $user->buy_coin_value : ''); ?>" />
    </label>
</div> 
<div class="<?php e($controlGroup); ?> <?php echo form_error('buy_amount') ? $errorClass : ''; ?>">
    <label class="control-label col-sm-4 col-md-4 col-lg-4 pt-4 mb-1" for="buy_amount">Total (<?= $market_pair; ?>)</label>
    <div class="<?php e($controlClass); ?> pt-2 mb-1">
		<input class="<?php e($controlInput); ?>" type="text" id="buy_amount" name="buy_amount" onChange="calculateBuy(); return false;" placeholder="Enter <?= $market_pair; ?> Amount" value="<?php echo set_value('buy_amount', isset($user) ? $user->buy_amount : ''); ?>" />
    </div>
</div>                     
<input class="<?php e($controlInput); ?>" onChange="calculateBuy(); return false;" onClick="clearBuyContent();" type="hidden" id="minimum_purchase" name="minimum_purchase" value="<?php echo set_value('minimum_purchase', isset($user) ? $user->minimum_purchase : $minimum_purchase); ?>" /> 
<div class="<?php e($controlGroup); ?> <?php echo form_error('total_coins') ? $errorClass : ''; ?>">
    <label class="<?php e($controlLabel); ?> mb-1" for="buy_total">Total Coins</label>
    <label class="<?php e($controlClass); ?> pt-2 mb-1 no-font-weight">
		<p class="mb-0" id="buy_total_coins" onChange="calculateBuy(); return false;" onClick="clearBuyContent();"></p>
		<input type="hidden" id="buy_total" name="buy_total" onChange="calculateBuy(); return false;" onClick="clearBuyContent();" value="<?php echo set_value("buy_total", isset($user) ? $user->buy_total : ''); ?>" />
    </label>
</div>                           
<input type="hidden" onChange="calculateBuy(); return false;" onClick="clearBuyContent();" id="buy_gas_fee" name="buy_gas_fee" value="<?php echo set_value('buy_gas_fee', isset($user) ? $user->buy_gas_fee : $gas_fee); ?>" /> 
<input type="hidden" onChange="calculateBuy(); return false;" onClick="clearBuyContent();" id="buy_user_gas_fee" name="buy_user_gas_fee" value="<?php echo set_value('buy_user_gas_fee', isset($user) ? $user->buy_user_gas_fee : ''); ?>" /> 
<input class="<?php e($controlInput); ?>" onChange="calculateBuy(); return false;" onClick="clearBuyContent();" type="hidden" id="buy_trans_percent" name="buy_trans_percent" value="<?php echo set_value('buy_trans_percent', isset($user) ? $user->buy_trans_percent : $trans_percent); ?>" /> 
<input class="<?php e($controlInput); ?>" onChange="calculateBuy(); return false;" onClick="clearBuyContent();" type="hidden" id="buy_user_trans_percent" name="buy_user_trans_percent" value="<?php echo set_value('buy_user_trans_percent', isset($user) ? $user->buy_user_trans_percent : ''); ?>" /> 
<input class="<?php e($controlInput); ?>" onChange="calculateBuy(); return false;" onClick="clearBuyContent();" type="hidden" id="buy_trans_fee" name="buy_trans_fee" value="<?php echo set_value('buy_trans_fee', isset($user) ? $user->buy_trans_fee : $trans_fee); ?>" />
<input class="<?php e($controlInput); ?>" onChange="calculateBuy(); return false;" onClick="clearBuyContent();" type="hidden" id="buy_user_trans_fee" name="buy_user_trans_fee" value="<?php echo set_value('buy_user_trans_fee', isset($user) ? $user->buy_user_trans_fee : ''); ?>" /> 
<div class="<?php e($controlGroup); ?> <?php echo form_error('fees') ? $errorClass : ''; ?>">
    <label class="<?php e($controlLabel); ?> mb-1" for="zipcode">Fees</label>
    <label class="<?php e($controlClass); ?> pt-2 mb-1 no-font-weight"> 
		<p class="mb-0" id="buy_fees_display" onChange="calculateBuy(); return false;" onClick="clearBuyContent();"></p>
		<input type="hidden" onChange="calculateBuy(); return false;" onClick="clearBuyContent();" id="buy_fees" name="buy_fees" value="<?php echo set_value('buy_fees', isset($user) ? $user->buy_fees : ''); ?>" />  
    </label>
</div>                                        
<div class="<?php e($controlGroup); ?> <?php echo form_error('buy_total_cost') ? $errorClass : ''; ?>">
    <label class="<?php e($controlLabel); ?> mb-1" for="zipcode">Subtotal</label>
    <label class="<?php e($controlClass); ?> pt-2 mb-1 no-font-weight"> 
		<p class="mb-0" id="buy_total_cost_display" onChange="calculateBuy(); return false;" onClick="clearBuyContent();"></p>
		<input type="hidden" id="buy_total_cost" name="buy_total_cost" onChange="calculateBuy(); return false;" onClick="clearBuyContent();" value="<?php echo set_value('buy_total_cost', isset($user) ? $user->buy_total_cost : ''); ?>" />
    </label>
</div>    
<div class="control-group" style="border:none;">
	<div class="controls ml-3">
		<input class="btn btn-primary" type="submit" name="register" id="buySubmit" value="Buy" />
		<button class="btn btn-secondary" type="button" name="clear_values" id="clear_values" onclick="clearBuyContent();">Clear</button>
	</div>
</div>   
<script <?= $nonce['script'] ?? '' ?>>
function changeBuyCoinValueLimit() {
	document.getElementById('buy_coin_value').value	= "";
}
function changeBuyCoinValueMarket() {
	document.getElementById('buy_coin_value').value	= <?php echo $current_coin_value; ?>
}
</script>
<script <?= $nonce['script'] ?? '' ?>>
function validateWithdrawAmount() {
  var x, text;
  var maximum	= <?php echo $fundSum; ?>;
  var alertText = "Amount must be $" + maximum + ".00 or less!";
  // Get the value of the input field with id="numb"
  x = document.getElementById("buy_amount").value;

  // If x is Not a Number or less than one or greater than 10
  if (isNaN(x) || x > <?php echo $fundSum; ?>) {
    alert(alertText);
    document.getElementById("buy_amount").value = maximum;
  }
  
}
</script>
