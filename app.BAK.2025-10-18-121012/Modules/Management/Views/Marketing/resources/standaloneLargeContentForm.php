<!-- app/Modules/Management/Views/Marketing/resources/standaloneLargeContentForm.php -->
<form class="form-horizontal" id="largeContentForm" enctype="multipart/form-data" method="POST" action="<?= site_url('API/Marketing/submitLargeContent') ?>">

    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

    <!-- Title/Subject Field -->
    <div class="form-group row">
        <div class="col-12">
            <input class="form-control" type="text" name="subject" id="subject" placeholder="Enter Title" required>
        </div>
    </div>

    <!-- URL Field -->
    <div class="form-group row">
        <div class="col-12">
            <input class="form-control" type="url" name="url" id="url" placeholder="Enter Web Page URL" required>
        </div>
    </div>

    <!-- Content Field -->
    <div class="form-group row">
        <div class="col-12">
            <textarea class="form-control" name="large_content" id="large_content" placeholder="Paste the entire web page content here" rows="10" required></textarea>
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
                <option value="blog">Blog Post</option>
                <option value="social_media">Social Media Post</option>
                <option value="email">Email</option>
                <option value="marketing_campaign">Marketing Campaign</option>
                <option value="web_page">Web Page</option>
            </select>
        </div>
    </div>

    <!-- Media Assets Upload -->
    <div class="form-group row">
        <div class="col-12">
            <input class="form-control" type="file" name="media_assets[]" id="media_assets" multiple="multiple" accept="image/*,video/*">
            <small class="form-text text-muted">Upload images or videos to include in TikTok or YouTube content.</small>
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
            <input class="btn btn-success btn-md" id="submitLargeContent" value="Generate Marketing Content" type="submit">
        </div>
    </div>
</form>

<script <?= $nonce['script'] ?? '' ?>>
document.getElementById('largeContentForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const form = document.getElementById('largeContentForm');
    let formData = new FormData(form);

    fetch('<?= site_url('Management/Marketing/submitLargeContent'); ?>', {
        method: 'POST',
        body: formData
    })
    .then(async response => {
        const contentType = response.headers.get("content-type") || "";
        if (!response.ok) {
            const error = await response.text();
            console.error("Raw response error:", error);
            throw new Error("Server error. HTTP " + response.status);
        }
        if (!contentType.includes("application/json")) {
            throw new Error("Expected JSON but got: " + contentType);
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            window.location.href = '<?= site_url('Management/Marketing'); ?>';
        } else {
            alert(data.message || 'Failed to generate marketing content.');
        }
    })
    .catch(error => {
        console.error('Fetch failed:', error.message);
        alert('An error occurred while generating content. Check console for details.');
    });
});
</script>

