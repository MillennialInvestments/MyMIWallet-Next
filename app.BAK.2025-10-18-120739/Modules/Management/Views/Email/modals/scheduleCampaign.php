<!-- Management/Email/modals/scheduleCampaign.php -->
<form method="post" action="<?= site_url('Management/Email/scheduleCampaign/'.$campaign['id']) ?>">
    <?= csrf_field() ?>
    <div class="form-group mb-3">
        <label>Choose Schedule Date/Time:</label>
        <input type="datetime-local" name="scheduled_at" class="form-control" required>
    </div>
    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary">📅 Schedule Campaign</button>
    </div>
</form>
