
<form action="<?= site_url('marketing/sendNotification') ?>" method="post">
    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
 
    <label for="title">Title:</label>
    <input type="text" name="title" id="title" required>
    
    <label for="message">Message:</label>
    <textarea name="message" id="message"></textarea>
    
    <label for="short_message">Short Message (Max 160 characters):</label>
    <textarea name="short_message" id="short_message" maxlength="160"></textarea>
    
    <label for="type">Notification Type:</label>
    <select name="type[]" id="type" multiple required>
        <option value="in-app">In-App</option>
        <option value="email">Email</option>
    </select>
    
    <label for="targetGroup">Target Group:</label>
    <input type="text" name="targetGroup" id="targetGroup">
    
    <label for="socialMedia">Social Media:</label>
    <select name="socialMedia[]" id="socialMedia" multiple>
        <option value="facebook">Facebook</option>
        <option value="twitter">Twitter</option>
        <option value="linkedin">LinkedIn</option>
        <option value="discord">Discord</option>
    </select>
    
    <button type="submit">Send Notification</button>
</form>
<script <?= $nonce['script'] ?? '' ?>>
    $(document).ready(function() {
        $('#message').summernote({
            height: 300
        });
    });
</script>