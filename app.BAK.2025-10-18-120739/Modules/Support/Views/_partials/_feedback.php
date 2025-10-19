<form action="<?= site_url('Support/Feedback') ?>" method="post">
    <?= csrf_field() ?>
    <input type="hidden" name="slug" value="<?= esc($article['slug'] ?? '') ?>">
    <p>Was this helpful?</p>
    <button type="submit" name="helpful" value="yes">Yes</button>
    <button type="submit" name="helpful" value="no">No</button>
    <div>
        <textarea name="note" placeholder="Additional comments"></textarea>
    </div>
</form>