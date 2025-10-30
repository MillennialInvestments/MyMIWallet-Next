<!-- /app/Modules/Management/Views/Marketing/Drip/add_step.php -->
<div class="container mt-4">
    <h2>Add Step to Campaign ID #<?= esc($campaign_id) ?></h2>
    <form method="post">
        <div class="mb-3">
            <label for="step_number" class="form-label">Step Number</label>
            <input type="number" name="step_number" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Step Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="subject" class="form-label">Email Subject</label>
            <input type="text" name="subject" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="view_file" class="form-label">View File Path</label>
            <input type="text" name="view_file" class="form-control" placeholder="emails/drips/new-user-onboarding/step_1_welcome" required>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="delay_days" class="form-label">Delay (Days)</label>
                <input type="number" name="delay_days" class="form-control" value="0">
            </div>
            <div class="col-md-6 mb-3">
                <label for="delay_hours" class="form-label">Delay (Hours)</label>
                <input type="number" name="delay_hours" class="form-control" value="0">
            </div>
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" name="is_active" value="1" checked>
            <label class="form-check-label">Active</label>
        </div>

        <button type="submit" class="btn btn-success">Add Step</button>
        <a href="<?= site_url("Management/Drip-Campaigns/{$campaign_id}/Steps") ?>" class="btn btn-secondary">Cancel</a>
    </form>
</div>
