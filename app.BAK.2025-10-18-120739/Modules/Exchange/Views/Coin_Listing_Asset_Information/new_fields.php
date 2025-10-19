<?php /* /users/views/user_fields.php */
$this->load->library('MyMIUser');
date_default_timezone_set('America/Chicago');
$date                   		= date("F jS, Y");
$hostTime               		= date("g:i A");
$time                   		= date("g:i A", strtotime($hostTime) - 60 * 60 * 5);
$currentMethod          		= $this->router->fetch_method();

$errorClass             		= empty($errorClass) ? ' error' : $errorClass;
$controlClass           		= empty($controlClass) ? 'span4' : $controlClass;
$registerClass          		= $currentMethod == 'register' ? ' required' : '';
$editSettings           		= $currentMethod == 'edit';
// Set Form Config
$formGroup						= $this->config->item('form_container');
$formLabel						= $this->config->item('form_label');
$formConCol						= $this->config->item('form_control_column');
$formControl					= $this->config->item('form_control');
$formSelect						= $this->config->item('form_select');
$formControl				= $this->config->item('form_selectpicker');
$formText						= $this->config->item('form_text');
$formCustomText					= $this->config->item('form_custom_text');
$redirectURL            		= $this->uri->uri_string();
$getAppCount 					= $this->exchange_model->get_open_listing_app_count($cuID);
$appID                          = $this->uri->segment(4);
if (!empty($appID)) {
    $getAppInfo					= $this->exchange_model->get_open_listing_app($cuID, $appID);
    foreach ($getAppInfo->result_array() as $appInfo) {
        $blockchain				= $appInfo['blockchain'];
        $blockchain_name		= $appInfo['blockchain_name'];
        $coin_name				= $appInfo['coin_name'];
        $symbol					= $appInfo['symbol'];
        $coin_quantity			= $appInfo['coin_quantity'];
        $purpose 				= $appInfo['purpose'];
        $description			= $appInfo['description'];
    }
} else {
    $appID                      = ''; 
    $blockchain					= '';
    $blockchain_name			= 'Select-A-Blockchain';
    $coin_name					= '';
    $symbol						= '';
    $coin_quantity				= '';
    $purpose 					= 'Select Token Type';
    $description				= '';
}
$getBlockchains					= $this->exchange_model->get_blockchains();
?>
<style <?= $nonce['style'] ?? '' ?>>
.table th, .table td {
    font-size: 0.6rem;
    font-weight: bold;
}
</style>
<h4 class="nk-block-subtitle fw-bold">New Asset Information</h4>
<p class="card-description"> Please fill out information below</p>		
<hr>
<input type="hidden" class="form-control" name="application_id" id="application_id" value="<?php echo set_value('application_id', isset($user) ? $user->application_id : $appID); ?>" hidden>		
<input type="hidden" class="form-control" name="stage" id="stage" value="<?php echo set_value('stage', isset($user) ? $user->stage : 'Asset'); ?>">		
<div class="<?php echo $formGroup; ?>">    
	<label for="blockchain" class="<?php echo $formLabel; ?>">Blockchain</label>
	<div class="<?php echo $formConCol; ?>">
		<?php
            echo '
			<select class="' . $formControl . '" name="blockchain" id="blockchain" data-live-search="true" required="required">			
				<option value="' . $blockchain . '">' . $blockchain_name . '</option>
				';
                foreach ($getBlockchains->result_array() as $blockchainInfo) {
                    $blockchain_values = array(
                        $blockchainInfo['id'] => $blockchainInfo['name'],
                    );
                    foreach ($blockchain_values as $value => $display_text) {
                        $selected = ($value == $this->input->post('blockchain')) ? ' selected="selected"' : "";
    
                        echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
                    }
                }
            echo '</select>';
        ?>		  
	</div>
</div>
<div class="<?php echo $formGroup; ?>">    
	<label class="<?php echo $formLabel; ?>" for="default-01">Asset Name</label>    
	<div class="<?php echo $formConCol; ?>">        
		<input type="text" class="<?php echo $formControl; ?>" name="coin_name" id="coin_name" placeholder="Enter Asset Name" value="<?php echo set_value('coin_name', isset($user) ? $user->coin_name : $coin_name); ?>">	
	</div>
</div>
<div class="<?php echo $formGroup; ?>">    
	<label class="<?php echo $formLabel; ?>" for="default-01">Symbol (Ticker)</label>    
	<div class="<?php echo $formConCol; ?>">        
		<input type="text" class="<?php echo $formControl; ?>" name="symbol" id="symbol" placeholder="Enter Asset Name" value="<?php echo set_value('symbol', isset($user) ? $user->symbol : $symbol); ?>">	
	</div>
</div>
<div class="<?php echo $formGroup; ?>">    
	<label class="<?php echo $formLabel; ?>" for="default-01">Coin Quantity</label>    
	<div class="<?php echo $formConCol; ?>">        
		<input type="integer" class="<?php echo $formControl; ?>" name="coin_quantity" id="coin_quantity" placeholder="Enter Quantity of Coins" value="<?php echo set_value('coin_quantity', isset($user) ? $user->coin_quantity : $coin_quantity); ?>">	
	</div>
</div>
<div class="<?php echo $formGroup; ?>">    
	<label for="purpose" class="<?php echo $formLabel; ?>">Type of Token</label>
	<div class="<?php echo $formConCol; ?>">
		<?php
            echo '
			<select class="' . $formControl . '" name="purpose" id="purpose" data-live-search="true" required="required">				
				<option value="' . $purpose . '">' . $purpose . '</option>		
				';
                $purpose_values = array(
                    'Asset Token'						=> 'Asset Token',
                    'Currency Token'					=> 'Currency Token',
                    'Equity Token'						=> 'Equity Token',
                    'NFT Token'							=> 'NFT Token',
                    'Reward Token'						=> 'Reward Token',
                    'Utility Token'						=> 'Utility Token',
                );
                foreach ($purpose_values as $value => $display_text) {
                    $selected = ($value == $this->input->post('purpose')) ? ' selected="selected"' : "";

                    echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
                }
            echo '</select>';
        ?>		  
	</div>
</div>
<div class="<?php echo $formGroup; ?>">    
	<label class="<?php echo $formLabel; ?>" for="default-01">Description of Asset</label>    
	<div class="<?php echo $formConCol; ?>">        
		<textarea type="text" class="<?php echo $formControl; ?>" name="description" id="description" placeholder="Description of Asset (Max: 1024 Characters)" value="<?php echo set_value('description', isset($user) ? $user->description : $description); ?>"></textarea>	
	</div>
</div>
<div class="form-group row">
	<label for="current_price" class="<?php echo $formLabel; ?>">Additional Documentation</label>
	<div class="col-12 col-sm-9 pt-2">      								
		<input type="file" name="assetfile" id="assetfile" size="20" />
	</div>
</div> 
<div class="form-group row">
	<label for="current_price" class="<?php echo $formLabel; ?>">Asset Logo</label>
	<div class="col-12 col-sm-9 pt-2">      								
		<input type="file" name="logofile" id="logofile" size="20" />
	</div>
</div> 
<div class="<?php echo $formGroup; ?> pt-3">
	<div class="col-md-4"></div>
	<div class="col-12 col-md-8">
		<div class="row">
			<div class="col-6 px-1">                   
			</div>
			<div class="col-6 px-1">                   
				<input class="btn btn-primary btn-block" type="submit" name="register" id="appNextOne" value="Submit!" />
			</div>
		</div>
	</div>
</div>
