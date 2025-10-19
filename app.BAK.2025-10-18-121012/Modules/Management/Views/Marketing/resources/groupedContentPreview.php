<!-- app/Modules/Management/Views/Marketing/resources/groupedContentPreview.php -->
<div class="container my-5">
    <h3 class="mb-4">📝 Grouped Content Drafts</h3>

    <div class="mb-5">
        <h4>📩 Email Newsletter Draft</h4>
        <pre style="background:#f9f9f9; padding:1rem; border-radius:5px; white-space:pre-wrap;"><?= esc($emailContent) ?></pre>
    </div>

    <div>
        <h4>🧾 Blog Article Draft</h4>
        <div class="bg-light p-4 rounded shadow-sm">
            <?= $blogContent ?>
        </div>
    </div>
</div>
