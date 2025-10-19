<?php
$csrfName = csrf_token();
$csrfHash = csrf_hash();
?>

<div class="modal-header">
    <h5 class="modal-title"><?= esc($post['title'] ?? 'Generated Post') ?></h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

<div class="modal-body">
    <?php if (!empty($keywords)) : ?>
        <div class="mb-3">
            <?php foreach ($keywords as $keyword): ?>
                <span class="badge bg-primary text-light me-1">#<?= esc(ucfirst($keyword)) ?></span>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <p class="small text-muted"><?= esc($formatted_summary ?? 'No summary available.') ?></p>

    <?php if (!empty($post['created_at'])) : ?>
        <p class="text-muted small">Created on <?= date('F j, Y g:i A', strtotime($post['created_at'])) ?></p>
    <?php endif; ?>

    <div class="d-flex justify-content-between align-items-center my-3">
        <button type="button" class="btn btn-success" id="generatePostMediaContentBtn">
            ⚡ Generate Content
        </button>
        <button type="button" class="btn btn-primary" id="savePostMediaBtn">
            💾 Save
        </button>
    </div>

    <?php if (!empty($post['cta'])) : ?>
        <div class="alert alert-primary">
            <strong>📢 Call to Action:</strong><br>
            <?= esc($post['cta']) ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($voiceover_url)) : ?>
        <div class="mt-3">
            <strong>🎧 Voiceover Preview:</strong>
            <audio controls src="<?= esc($voiceover_url) ?>" class="w-100 mt-1"></audio>
        </div>
    <?php endif; ?>

    <form id="postMediaForm" class="mt-4">
        <input type="hidden" id="csrfToken" name="<?= esc($csrfName) ?>" value="<?= esc($csrfHash) ?>">
        <input type="hidden" id="postId" value="<?= esc($post['id']) ?>">

        <div class="row">
            <?php
            $fields = [
                'voice_script' => 'Voice Script',
                'facebook_message' => 'Facebook',
                'linkedin_message' => 'LinkedIn',
                'discord_message' => 'Discord',
                'stocktwits_message' => 'StockTwits',
                'tiktok_message' => 'TikTok',
                'youtube_message' => 'YouTube',
                'email_message' => 'Email',
                'hashtags' => 'Hashtags',
            ];
            foreach ($fields as $field => $label): ?>
                <div class="col-12 mb-3">
                    <label for="<?= $field ?>" class="form-label"><?= $label ?> Message</label>
                    <textarea class="form-control" id="<?= $field ?>" name="<?= $field ?>" rows="2"><?= esc($post[$field] ?? '') ?></textarea>
                </div>
            <?php endforeach; ?>
        </div>
    </form>
</div>

<script <?= $nonce['script'] ?? '' ?>>

$('#generatePostMediaContentBtn').on('click', function () {
    const postId = $('#postId').val().trim();
    const csrfToken = $('#csrfToken').val();
    const csrfName = '<?= esc($csrfName) ?>';

    if (!postId) {
        alert("❗ Post ID is missing.");
        return;
    }

    const payload = {
        post_id: postId,
        type: 'Post'
    };
    payload[csrfName] = csrfToken;

    $.ajax({
        url: '<?= site_url("API/Marketing/generatePostMediaContent") ?>',
        method: 'POST',
        data: payload,
        dataType: 'json',
        success: function (response) {
            console.log('✅ AJAX Success - Response:', response); // 🔍 ADDED DEBUG LOG
            const content = response.generated_content || {};

            $('#voice_script').val(content.voice_script || '');
            $('#facebook_message').val(content.facebook_message || '');
            $('#linkedin_message').val(content.linkedin_message || '');
            $('#discord_message').val(content.discord_message || '');
            $('#stocktwits_message').val(content.stocktwits_message || '');
            $('#tiktok_message').val(content.tiktok_message || '');
            $('#youtube_message').val(content.youtube_message || '');
            $('#email_message').val(content.email_message || '');
            $('#hashtags').val(content.hashtags || '');

            if (response.csrfHash) {
                $('#csrfToken').val(response.csrfHash);
            }

            // alert("✅ Post content generated.");
        },
        error: function (xhr) {
            console.error('❌ AJAX error:', xhr.responseText);
            alert('❌ Failed to generate content.');
        }
    });
});

$('#savePostMediaBtn').on('click', function () {
    const csrfToken = $('#csrfToken').val();
    const csrfName = '<?= esc($csrfName) ?>';
    const payload = {
        post_id: $('#postId').val(),
        voice_script: $('#voice_script').val(),
        facebook_message: $('#facebook_message').val(),
        linkedin_message: $('#linkedin_message').val(),
        discord_message: $('#discord_message').val(),
        stocktwits_message: $('#stocktwits_message').val(),
        tiktok_message: $('#tiktok_message').val(),
        youtube_message: $('#youtube_message').val(),
        email_message: $('#email_message').val(),
        hashtags: $('#hashtags').val()
    };

    payload[csrfName] = csrfToken;

    $.ajax({
        url: '<?= site_url("API/Marketing/savePostMedia") ?>',
        method: 'POST',
        data: payload,
        dataType: 'json',
        success: function (response) {
            if (response.status === 'success') {
                alert('✅ Saved successfully!');
                $('#globalModal').modal('hide');
            } else {
                alert('❌ Save failed: ' + (response.message || 'Unknown error.'));
            }

            if (response.csrfHash) {
                $('#csrfToken').val(response.csrfHash);
            }
        },
        error: function (xhr) {
            console.error('❌ Save error:', xhr.responseText);
            alert('❌ AJAX error during save.');
        }
    });
});

</script>
