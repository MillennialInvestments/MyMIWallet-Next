<?php /* /users/views/user_fields.php */
$date                           = date("F jS, Y");
$hostTime                       = date("g:i A");
$time                           = date("g:i A", strtotime($hostTime) - 60 * 60 * 5);
$currentMethod                  = $this->router->fetch_method();

$errorClass                     = empty($errorClass) ? ' error' : $errorClass;
$controlClass                   = empty($controlClass) ? 'span4' : $controlClass;
$registerClass                  = $currentMethod == 'register' ? ' required' : '';
$editSettings                   = $currentMethod == 'edit';
// print_r($this->session->allSessionData['userAccount']); 
if ($configMode === 'Add') {
    $integrationTitle           = 'Integrate ' . $accountType . ' Account';
    $formTitle                  = $accountType . ' - Account Information';
    if ($accountType === 'Income') {
        $designatedDate             = 'Date of Month Received';
    } elseif ($accountType === 'Expense') {
        $designatedDate             = 'Date of Month Due';
    }
} elseif ($configMode === 'Edit') {
    $integrationTitle           = 'Integrate ' . $accountName . ' - ' . $accountType . ' Account';
    $formTitle                  = $accountName . ' - Account Information';
}
// Set Form Config
$formGroup				        = $this->config->item('form_container');
$formLabel				        = $this->config->item('form_label');
$formConCol				        = $this->config->item('form_control_column');
$formControl			        = $this->config->item('form_control');
$formSelect				        = $this->config->item('form_select');
$formSelectPicker		        = $this->config->item('form_selectpicker');
$formText				        = $this->config->item('form_text');
$formCustomText			        = $this->config->item('form_custom_text');
?>        
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
<input type="hidden" class="form-control" name="config_mode" id="config_mode" value="<?php echo set_value('config_mode', isset($user) ? $user->config_mode : $configMode); ?>">	
<input type="hidden" class="form-control" name="form_mode" id="form_mode" value="<?php echo set_value('form_mode', isset($user) ? $user->form_mode : $formMode); ?>">	
<input type="hidden" class="form-control" name="user_id" id="user_id" value="<?php echo set_value('user_id', isset($user) ? $user->user_id : $cuID); ?>">	
<input type="hidden" class="form-control" name="user_email" id="user_email" value="<?php echo set_value('user_email', isset($user) ? $user->user_email : $cuEmail); ?>">	
<input type="hidden" class="form-control" name="username" id="username" value="<?php echo set_value('username', isset($user) ? $user->username : $cuUsername); ?>">	
<input type="hidden" class="form-control" name="account_id" id="account_id" value="<?php echo set_value('account_id', isset($user) ? $user->type : $accountID); ?>">
<input type="hidden" class="form-control" name="account_type" id="account_type" value="<?php echo set_value('account_type', isset($user) ? $user->type : $accountType); ?>">
<div class="<?php echo $formGroup; ?> mb-2">    
	<label for="assigned_to" class="col-6 form-label">Assigned To</label>
	<div class="col-6">

        <select name="assigned_to" class="<?php echo $formControl; ?>" id="assigned_to" required="required" style="height: 40px; padding: 10px;">
            <option value="N/A">-- Select Team Member --</option>
            <?php
                foreach ($managementTeam->result_array() as $team) {
                    $team_values = array(
                        $team['id']      => $team['first_name'] . ' ' . $team['last_name'],
                    );
                }
                foreach ($team_values as $value => $display_text) {
                    $selected = ($value == $this->input->post('assigned_to')) ? ' selected="selected"' : "";

                    echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
                }
            ?>
        </select>
	</div>
</div>
<div class="<?php echo $formGroup; ?> mb-2">    
	<label class="col-6 form-label" for="default-01">Blog Name</label>    
	<div class="col-6">       
		<input type="text" class="<?php echo $formControl; ?>" name="blog_title" id="blog_title" placeholder="Enter Blog Title" value="<?php echo set_value('blog_title', isset($user) ? $user->blog_title : ''); ?>" required="required" rows="10">	
	</div>
</div>
<!-- Campaign Description -->
<div class="<?php echo $formGroup; ?> mb-2">
    <label class="col-12 form-label" for="campaign_description">Blog Content</label>
    <div class="col-12">
        <textarea class="form-control summernote" id="blogContent" name="blog_content" rows="10"></textarea>
    </div>
</div>
<hr>
