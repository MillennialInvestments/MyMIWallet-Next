<div class="nk-block">
    <form action="<?= site_url('/Management/Marketing/SaveContentEdit/' . $content['id']) ?>" method="POST">
        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

        <div class="form-group">
            <label for="content">Edit Content</label>
            <textarea id="content" name="content" class="form-control summernote"><?= esc($content['content']) ?></textarea>
        </div>
        <button type="submit" class="btn btn-success">Save Changes</button>
        <a href="<?= site_url('/Management/Marketing/ContentReview') ?>" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<!-- Include Summernote.js -->
<link href="https://cdn.jsdelivr.net/npm/summernote/dist/summernote-bs4.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote/dist/summernote-bs4.min.js"></script>
<script <?= $nonce['script'] ?? '' ?>>
    $(document).ready(function () {
        $('.summernote').summernote({
            height: 300
        });
    });
</script>
