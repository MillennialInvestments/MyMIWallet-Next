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

<!-- Campaign Name -->
<div class="<?= $formGroup; ?> mb-2">
    <label class="col-6 form-label" for="campaignName">Campaign Name</label>
    <div class="col-6">
        <input type="text" class="<?= $formControl; ?>" name="campaign_name" id="campaign_name" placeholder="Enter Campaign Name" required>
    </div>
</div>

<!-- Assigned To -->
<div class="<?= $formGroup; ?> mb-2">
    <label for="assigned_to" class="col-6 form-label">Assigned To</label>
    <div class="col-6">
        <select name="assigned_to" class="<?= $formControl; ?>" id="assigned_to" required>
            <option value="N/A">-- Select Team Member --</option>
            <?php
            foreach ($managementTeam as $team) {
                $team_values = [
                    $team['position'] => $team['position']
                ];
                foreach ($team_values as $value => $display_text) {
                    $selected = ($value == old('assigned_to')) ? ' selected="selected"' : "";
                    echo '<option value="' . $value . '"' . $selected . '>' . $display_text . '</option>';
                }
            }
            ?>
        </select>
    </div>
</div>

<!-- Promotional Links -->
<div class="<?= $formGroup; ?> mb-2" id="promotionalLinksContainer">
    <label class="col-6 form-label" for="promotionalLink">Promotional Link</label>
    <div class="col-6">
        <input type="url" class="<?= $formControl; ?>" id="promotionalLink" name="promotionalLinks[]" placeholder="Enter promotional link">
    </div>
</div>
<button type="button" id="addLinkButton" class="btn btn-secondary mt-2">Add Another Link</button>
<!-- Escalated? -->
<div class="<?= $formGroup; ?> mb-2">
    <label for="escalated" class="col-6 form-label">Escalated</label>
    <div class="col-6">
        <select name="escalated" class="<?= $formControl; ?>" id="escalated" required>
            <option value="N/A">-- Yes or No? --</option>
            <?php
                $escalated_values = [
                    '1' => 'Yes', 
                    '0' => 'No'
                ];
                foreach ($escalated_values as $value => $display_text) {
                    $selected = ($value == old('escalated')) ? ' selected="selected"' : "";
                    echo '<option value="' . $value . '"' . $selected . '>' . $display_text . '</option>';
                }
            ?>
        </select>
    </div>
</div>
<!-- Overall Campaign Description -->
<div class="<?= $formGroup; ?> mb-2">
    <label class="col-12 form-label" for="overall_campaign_description">Overall Campaign Description</label>
    <div class="col-12">
        <textarea class="<?= $formControl; ?>" id="overall_campaign_description" name="overall_campaign_description" placeholder="Enter a comprehensive campaign description for potential blog posts" rows="6"></textarea>
    </div>
</div>

<!-- Voice Script -->
<div class="<?= $formGroup; ?> mb-2">
    <label class="col-12 form-label" for="voice_script">Voice Script</label>
    <div class="col-12">
        <textarea class="<?= $formControl; ?>" id="voice_script" name="voice_script" placeholder="Enter the voice script for spoken content" rows="5"></textarea>
    </div>
</div>

<!-- Platform-specific Promotional Messages -->
<?php
$platforms = ['Facebook', 'LinkedIn', 'Discord', 'StockTwits', 'TikTok', 'YouTube', 'Email'];
foreach ($platforms as $platform) {
    $platformId = strtolower($platform) . 'Message';
    ?>
    <div class="<?= $formGroup; ?> mb-2">
        <label class="col-12 form-label" for="<?= $platformId; ?>"><?= $platform; ?> Promotional Message</label>
        <div class="col-12">
            <textarea class="<?= $formControl; ?>" id="<?= $platformId; ?>" name="<?= $platformId; ?>" placeholder="Enter <?= $platform; ?> Promotional Message" rows="5"></textarea>
        </div>
    </div>
    <?php
}
?>

<!-- Additional Information -->
<div class="<?= $formGroup; ?> mb-2">
    <label class="col-12 form-label" for="additionalInfo">Additional Information</label>
    <div class="col-12">
        <textarea class="<?= $formControl; ?>" id="additionalInfo" name="additionalInfo" rows="5" placeholder="Enter any additional information"></textarea>
    </div>
</div>

<!-- Hashtags -->
<div class="<?= $formGroup; ?> mb-2">
    <label class="col-12 form-label" for="hashtags">Hashtags</label>
    <div class="col-12">
        <textarea class="<?= $formControl; ?>" id="hashtags" name="hashtags" rows="5" placeholder="Enter any additional information"></textarea>
    </div>
</div>

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
