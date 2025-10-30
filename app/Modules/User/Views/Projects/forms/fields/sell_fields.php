<?php 
$date                           = date("F jS, Y");
$hostTime                       = date("g:i A");
$time                           = date("g:i A");
// Set Form Config
$formGroup				        = $siteSettings->formContainer;
$formLabel				        = $siteSettings->formLabel;
$formConCol				        = $siteSettings->formControlColumn;
$formControl			        = $siteSettings->formControl;
$formSelect				        = $siteSettings->formSelect;
$formSelectPicker		        = $siteSettings->formSelectpicker;
$formText				        = $siteSettings->formText;
$formCustomText			        = $siteSettings->formCustomText;
if ($uri->getTotalSegments() >= (4) && $uri->getSegment(1) === 'Dashboard') {
    $formMode                   = $uri->getSegment(4);
} else {
    $formMode                   = $uri->getSegment(2); 
}
log_message('info', '$uri: ' . $uri);
log_message('info', '$formMode: ' . $formMode);
if ($formMode === 'Add') {
    $accountID                  = '';
} elseif ($formMode === 'Edit') {
    $accountID                  = $uri->getSegment(3);
}
?>
<input id="beta" name="beta" value="<?php echo set_value('beta', $cuUserType === 'Beta' ? 'Yes' : 'No'); ?>" type="hidden">
<input id="form_mode" name="form_mode" value="<?php echo $formMode; ?>" class="form-control" type="hidden">
<input id="user_id" name="user_id" value="<?php echo $cuID; ?>" class="form-control" type="hidden">
<input id="user_email" name="user_email" value="<?php echo $cuEmail; ?>" class="form-control" type="hidden">
<input id="username" name="username" value="<?php echo $cuUsername; ?>" class="form-control" type="hidden">
<input id="project_id" name="project_id" value="<?php echo $projectID ?? ''; ?>" class="form-control" type="hidden">

<div class="form-group">
    <label for="sell_amount">Sell Amount ($)</label>
    <input type="number" id="sell_amount" name="sell_amount" class="<?= $formControl; ?>" step="0.01" placeholder="Enter amount to sell" required>
</div>

<div class="form-group">
    <label for="sell_date">Sell Date</label>
    <input type="date" id="sell_date" name="sell_date" class="<?= $formControl; ?>" required>
</div>

<div class="form-group">
    <label for="remarks">Remarks</label>
    <textarea id="remarks" name="remarks" class="<?= $formControl; ?>" placeholder="Any additional remarks about the sale"></textarea>
</div>
