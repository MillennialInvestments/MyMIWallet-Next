<form action="<?= site_url('marketing/postToFacebook') ?>" method="post">
    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

    <label for="page_id">Page ID:</label>
    <input type="text" name="page_id" id="page_id" required>
    
    <label for="message">Message:</label>
    <textarea name="message" id="message" required></textarea>
    
    <button type="submit">Post to Facebook Page</button>
</form>

<form action="<?= site_url('marketing/postToGroup') ?>" method="post">
    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

    <label for="group_id">Group ID:</label>
    <input type="text" name="group_id" id="group_id" required>
    
    <label for="message">Message:</label>
    <textarea name="message" id="message" required></textarea>
    
    <button type="submit">Post to Facebook Group</button>
</form>
