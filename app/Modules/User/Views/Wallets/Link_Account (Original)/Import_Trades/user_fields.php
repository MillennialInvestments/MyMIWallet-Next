<?php /* /users/views/user_fields.php */
date_default_timezone_set('America/Chicago');
$date                           = date("F jS, Y");
$hostTime                       = date("g:i A");
$time                       = date("g:i A");




$registerClass                  = $currentMethod == 'register' ? ' required' : '';
$editSettings                   = $currentMethod == 'edit';
// Current User Information
$cuID 						    = $_SESSION['allSessionData']['userAccount']['cuID'];
$cuEmail					    = $_SESSION['allSessionData']['userAccount']['cuEmail'];
$cuUsername					    = $_SESSION['allSessionData']['userAccount']['cuUsername'];
$cuUserType					    = $_SESSION['allSessionData']['userAccount']['cuUserType'];
$walletID					    = $_SESSION['allSessionData']['userAccount']['walletID'];

// Set Form Config
$formGroup				= $siteSettings->formContainer;
$formLabel				= $siteSettings->formLabel;
$formConCol				= $siteSettings->formControlColumn;
$formControl			= $siteSettings->formControl;
$formSelect				= $siteSettings->formSelect;
$formControl		= $siteSettings->formSelectpicker;
$formText				= $siteSettings->formText;
$formCustomText			= $siteSettings->formCustomText;

?>                              
<!-- <h4 class="card-title">Import Account Trades</h4> -->
<p class="card-description"> Please fill out information below</p>			
<hr>
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
<input type="hidden" class="form-control" name="user_id" id="user_id" value="<?php echo set_value('user_id', isset($user) ? $user->user_id : $cuID); ?>">	
<input type="hidden" class="form-control" name="user_email" id="user_email" value="<?php echo set_value('user_email', isset($user) ? $user->user_email : $cuEmail); ?>">	
<input type="hidden" class="form-control" name="username" id="username" value="<?php echo set_value('username', isset($user) ? $user->username : $cuUsername); ?>">	
<input type="hidden" class="form-control" name="wallet_id" id="wallet_id" value="<?php echo set_value('wallet_id', isset($user) ? $user->wallet_id : $walletID); ?>">	
<div class="form-group row">
	<label for="current_price" class="<?php echo $formLabel; ?>">CSV Import File</label>
	<div class="col-12 col-sm-9 pt-2">      								
		<input type="file" name="logofile" id="logofile" size="20" />
	</div>
</div> 
