<!-- app/Modules/Management/Views/Marketing/resources/standaloneShortLongPostForm.php -->
<form class="form-horizontal" id="manualContentForm" method="POST" enctype="multipart/form-data" action="<?= site_url('Management/Marketing/submitManualContent'); ?>">
    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
    <div class="form-group row">
        <div class="col-12">
            <textarea class="form-control" name="short_form" id="short_form" rows="3" placeholder="Short form message for X/StockTwits" required></textarea>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-12">
            <textarea class="form-control" name="long_form" id="long_form" rows="6" placeholder="Long form message for Discord, Facebook, Email & LinkedIn" required></textarea>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-12 text-right">
            <input class="btn btn-success btn-md" id="submitManualContent" value="Post Content" type="submit">
        </div>
    </div>
</form>
<script>
    document.getElementById('manualContentForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const form = document.getElementById('manualContentForm');
        let formData = new FormData(form);
        fetch('<?= site_url('Management/Marketing/submitManualContent'); ?>', {
            method: 'POST',
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                window.location.href = '<?= site_url('Management/Marketing'); ?>';
            } else {
                alert(data.message || 'Failed to post content.');
            }
        })
        .catch(err => {
            console.error('Fetch error:', err);
            alert('An error occurred while posting.');
        });
    });