<!-- app/Modules/Management/Views/Marketing/resources/standaloneDailyLogForm.php -->
<form class="form-horizontal" id="dailyLogForm" enctype="multipart/form-data" method="POST" action="<?= site_url('Management/Marketing/submitDailyLog') ?>">
    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">


    <!-- Title/Subject Field -->
    <div class="form-group row">
        <div class="col-12">
            <input class="form-control" type="text" name="subject" id="subject" placeholder="Enter Log Title" required>
        </div>
    </div>

    <!-- URL Field -->
    <div class="form-group row">
        <div class="col-12">
            <input class="form-control" type="url" name="url" id="url" placeholder="Reference External URL (Optional)">
        </div>
    </div>

    <!-- Content Field -->
    <div class="form-group row">
        <div class="col-12">
            <textarea class="form-control" name="log_content" id="log_content" placeholder="Enter the main content of your log" rows="10" required></textarea>
        </div>
    </div>

    <!-- Tags Field -->
    <div class="form-group row">
        <div class="col-6">
            <input class="form-control" type="text" name="tags" id="tags" placeholder="Add Tags (comma-separated)">
        </div>
        
        <!-- Content Type Dropdown -->
        <div class="col-6">
            <select class="form-control" name="content_type" id="content_type">
                <option value="daily_log">Daily Log</option>
                <option value="trade_alert">Trade Alert</option>
                <option value="market_update">Market Update</option>
                <option value="promotion">Promotion</option>
            </select>
        </div>
    </div>

    <!-- Subcontent Updates -->
    <div class="form-group row" id="subcontent-container">
        <div class="col-12">
            <button type="button" id="add-subcontent" class="btn btn-secondary btn-sm">Add Subcontent Update</button>
        </div>
    </div>

    <!-- Media Assets Upload -->
    <div class="form-group row">
        <div class="col-12">
            <input class="form-control" type="file" name="media_assets[]" id="media_assets" multiple="multiple" accept="image/*,video/*">
            <small class="form-text text-muted">Upload images or videos for additional context.</small>
        </div>
    </div>

    <!-- Author Information and Date/Time -->
    <div class="form-group row">
        <div class="col-6">
            <input class="form-control" type="text" name="author_information" id="author_information" placeholder="Enter Author Name" required>
        </div>
        <div class="col-6">
            <input class="form-control" type="datetime-local" name="date_time" id="date_time" required>
        </div>
    </div>

    <!-- Submit Button -->
    <div class="form-group row">
        <div class="col-12 text-right">
            <input class="btn btn-success btn-md" id="submitDailyLog" value="Submit Daily Log" type="submit">
        </div>
    </div>
</form>

<script <?= $nonce['script'] ?? '' ?>>
    document.getElementById('add-subcontent').addEventListener('click', function () {
        const subcontentContainer = document.getElementById('subcontent-container');
        const subcontentInput = document.createElement('textarea');
        subcontentInput.setAttribute('name', 'subcontent[]');
        subcontentInput.setAttribute('class', 'form-control my-2');
        subcontentInput.setAttribute('placeholder', 'Add subcontent update');
        subcontentContainer.appendChild(subcontentInput);
    });

    document.getElementById('dailyLogForm').addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(this);

        fetch('<?= site_url("Management/Marketing/submitDailyLog") ?>', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                window.location.href = '<?= site_url("Management/Marketing") ?>';
            } else {
                alert(data.message || 'Failed to submit daily log.');
            }
        })
        .catch(error => console.error('Error:', error));
    });
</script>
