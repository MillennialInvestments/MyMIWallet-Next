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
<input id="account_id" name="account_id" value="<?php echo $accountID ?? ''; ?>" class="form-control" type="hidden">
<input id="account_type" name="account_type" value="<?php echo $accountType ?? ''; ?>" class="form-control" type="hidden">
<div class="form-group">
    <label for="name">Project Name</label>
    <input type="text" id="name" name="name" class="<?= $formControl; ?>" placeholder="Enter project name" required>
</div>

<div class="form-group">
    <label for="description">Description</label>
    <textarea id="description" name="description" class="<?= $formControl; ?>" placeholder="Provide a brief project description"></textarea>
</div>

<div class="form-group">
    <label for="target_amount">Target Amount ($)</label>
    <input type="number" id="target_amount" name="target_amount" class="<?= $formControl; ?>" step="0.01" placeholder="Enter target amount" required>
</div>

<div class="form-group">
    <label for="minimum_investment">Minimum Investment ($)</label>
    <input type="number" id="minimum_investment" name="minimum_investment" class="<?= $formControl; ?>" step="0.01" placeholder="Enter minimum investment amount" required>
</div>

<div class="form-group">
    <label for="maximum_investment">Maximum Investment ($)</label>
    <input type="number" id="maximum_investment" name="maximum_investment" class="<?= $formControl; ?>" step="0.01" placeholder="Enter maximum investment amount">
</div>

<div class="form-group">
    <label for="project_stage">Project Stage</label>
    <select id="project_stage" name="project_stage" class="<?= $formControl; ?>" required>
        <option value="planning">Planning</option>
        <option value="fundraising">Fundraising</option>
        <option value="development">Development</option>
        <option value="complete">Complete</option>
    </select>
</div>

<div class="form-group">
    <label for="completion_date">Completion Date</label>
    <input type="date" id="completion_date" name="completion_date" class="<?= $formControl; ?>">
</div>

<div class="form-group">
    <label for="remarks">Remarks</label>
    <textarea id="remarks" name="remarks" class="<?= $formControl; ?>" placeholder="Any additional remarks about the project"></textarea>
</div>

<div class="form-group">
    <label for="promotional_links">Additional Links:</label>
    <textarea id="promotional_links" name="promotional_links" class="<?= $formControl; ?>" placeholder="Any additional promotional_links about the project"></textarea>
</div>
<hr>
