<div class="nk-block">
    <form action="<?= isset($blog) ? site_url('/Management/Marketing/Blogs/Update/' . $blog->id) : site_url('/Management/Marketing/Blogs/Create') ?>" 
          method="POST">
        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" class="form-control" value="<?= isset($blog) ? esc($blog->title) : '' ?>" required>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea id="content" name="content" class="form-control summernote"><?= isset($blog) ? esc($blog->content) : '' ?></textarea>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select id="status" name="status" class="form-control">
                <option value="draft" <?= isset($blog) && $blog->status === 'draft' ? 'selected' : '' ?>>Draft</option>
                <option value="published" <?= isset($blog) && $blog->status === 'published' ? 'selected' : '' ?>>Published</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success"><?= isset($blog) ? 'Update Blog' : 'Create Blog' ?></button>
        <a href="<?= site_url('/Management/Marketing/Blogs') ?>" class="btn btn-secondary">Cancel</a>
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
