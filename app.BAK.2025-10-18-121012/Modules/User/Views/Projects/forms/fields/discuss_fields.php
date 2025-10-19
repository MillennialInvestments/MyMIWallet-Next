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
    <label for="discussion_topic">Discussion Topic</label>
    <input type="text" id="discussion_topic" name="discussion_topic" class="<?= $formControl; ?>" placeholder="Enter discussion topic" required>
</div>

<div class="form-group">
    <label for="message">Message</label>
    <textarea id="message" name="message" class="<?= $formControl; ?>" placeholder="Write your message" required></textarea>
</div>
