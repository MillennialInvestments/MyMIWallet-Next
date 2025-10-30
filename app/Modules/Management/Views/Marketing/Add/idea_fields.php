<?php /* Management/Marketing/Add/campaign_fields.php */
$pageURIA = ($uri->getTotalSegments() >= 1) ? $uri->getSegment(1) : null;

// Set form group and control classes from config
$formGroup = $siteSettings->formContainer;
$formControl = $siteSettings->formControl;
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
<!-- Display success message if present -->
<?php if(session()->has('success')): ?>
    <div class="alert alert-success"><?= session('success') ?></div>
<?php endif; ?>


<input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">


<!-- Title -->
<div class="form-group row mb-2">
    <label class="col-6 form-label" for="title">Idea Title</label>
    <div class="col-6">
        <input type="text" class="form-control" name="title" id="title" placeholder="Enter Idea Title" required>
    </div>
</div>

<!-- Description -->
<div class="form-group row mb-2">
    <label class="col-12 form-label" for="description">Description</label>
    <div class="col-12">
        <textarea class="form-control" id="description" name="description" placeholder="Enter Idea Description" rows="5" required></textarea>
    </div>
</div>

<!-- Assigned To -->
<div class="form-group row mb-2">
    <label for="assigned_to" class="col-6 form-label">Assigned To</label>
    <div class="col-6">
        <select name="assigned_to" class="form-control" id="assigned_to" required>
            <option value="N/A">-- Select Team Member --</option>
            <!-- Populate dynamically -->
            <?php foreach ($managementTeam as $team): ?>
                <option value="<?= $team['id']; ?>"><?= $team['position']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>

<!-- Priority -->
<div class="form-group row mb-2">
    <label class="col-6 form-label" for="priority">Priority</label>
    <div class="col-6">
        <select name="priority" class="form-control" id="priority" required>
            <option value="low">Low</option>
            <option value="medium" selected>Medium</option>
            <option value="high">High</option>
        </select>
    </div>
</div>

<!-- Platforms -->
<div class="form-group row mb-2">
    <label class="col-12 form-label" for="platforms">Platforms</label>
    <div class="col-12 d-flex flex-wrap">
        <!-- Platforms list -->
        <div class="form-check me-3">
            <input class="form-check-input" type="checkbox" name="platforms[]" value="Facebook" id="facebook">
            <label class="form-check-label" for="facebook">Facebook</label>
        </div>
        <div class="form-check me-3">
            <input class="form-check-input" type="checkbox" name="platforms[]" value="LinkedIn" id="linkedin">
            <label class="form-check-label" for="linkedin">LinkedIn</label>
        </div>
        <div class="form-check me-3">
            <input class="form-check-input" type="checkbox" name="platforms[]" value="Instagram" id="instagram">
            <label class="form-check-label" for="instagram">Instagram</label>
        </div>
        <div class="form-check me-3">
            <input class="form-check-input" type="checkbox" name="platforms[]" value="Twitter" id="twitter">
            <label class="form-check-label" for="twitter">Twitter</label>
        </div>
        <div class="form-check me-3">
            <input class="form-check-input" type="checkbox" name="platforms[]" value="TikTok" id="tiktok">
            <label class="form-check-label" for="tiktok">TikTok</label>
        </div>
        <div class="form-check me-3">
            <input class="form-check-input" type="checkbox" name="platforms[]" value="YouTube" id="youtube">
            <label class="form-check-label" for="youtube">YouTube</label>
        </div>
        <div class="form-check me-3">
            <input class="form-check-input" type="checkbox" name="platforms[]" value="Pinterest" id="pinterest">
            <label class="form-check-label" for="pinterest">Pinterest</label>
        </div>
        <!-- Add more platforms as needed -->
    </div>
</div>


<!-- Image Upload -->
<div class="form-group row mb-2">
    <label class="col-12 form-label" for="imageUpload">Upload Images</label>
    <div class="col-12">
        <input type="file" class="form-control" name="imageFiles[]" id="imageUpload" multiple>
    </div>
</div>

<!-- Additional Information -->
<div class="form-group row mb-2">
    <label class="col-12 form-label" for="additional_info">Additional Information</label>
    <div class="col-12">
        <textarea class="form-control" id="additional_info" name="additional_info" placeholder="Enter any additional information" rows="3"></textarea>
    </div>
</div>

<!-- Submit Button -->
<input type="submit" class="btn btn-primary mt-3" value="Submit">

<script <?= $nonce['script'] ?? '' ?>>
    document.getElementById('addLinkButton').addEventListener('click', function() {
        const container = document.getElementById('promotionalLinksContainer');
        const newInput = document.createElement('input');
        newInput.type = 'url';
        newInput.className = 'form-control mt-2';
        newInput.name = 'promotionalLinks[]';
        newInput.placeholder = 'Enter promotional link';
        container.appendChild(newInput);
    });
</script>
