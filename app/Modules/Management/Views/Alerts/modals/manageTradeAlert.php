<?php
// app/Modules/Management/Views/Alerts/modals/manageTradeAlert.php

log_message('info', 'Alerts/modals/manageTradeAlert - $alert: ' . print_r($alert, true));
log_message('info', 'Alerts/modals/manageTradeAlert - $alertHistory: ' . print_r($alertHistory, true));

$latestHistory = $alertHistory[0] ?? [];
$tradeDetails = $alert['details'] ?? ($latestHistory['details'] ?? '');
$alertId = $alert['id'] ?? '';
$csrfName = csrf_token();
$csrfHash = csrf_hash();
?>

<div class="modal-header">
    <h5 class="modal-title">Manage Trade Alert Marketing Content</h5>
    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
</div>

<div class="modal-body">
    <input type="hidden" id="tradeId" value="<?= esc($alertId) ?>">
    <input type="hidden" name="<?= esc($csrfName) ?>" value="<?= esc($csrfHash) ?>" id="csrfToken">

    <div class="mb-3 d-flex justify-content-between">
        <div>
            <button type="button" id="generateContentBtn" class="btn btn-success"><i class="ni ni-spark"></i> Generate</button>
            <button type="button" id="saveContentBtn" class="btn btn-primary">💾 Save</button>
            <?php if (!empty($latestHistory) && ($latestHistory['send_alert'] ?? 0) == 0): ?>
                <button type="button" id="sendAlertBtn" class="btn btn-warning">📢 Send Alert</button>
            <?php endif; ?>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <tbody>
                <?php
                $fields = [
                    'social_twitter'     => 'Twitter',
                    'social_facebook'    => 'Facebook',
                    'social_linkedin'    => 'LinkedIn',
                    'social_discord'     => 'Discord',
                    'email_content'      => 'Email Content',
                    'blog_content'       => 'Blog Content',
                    'voiceover_script'   => 'Voiceover Script',
                    'hashtags'           => 'Hashtags'
                ];
                foreach ($fields as $field => $label):
                    $value = $latestHistory[$field] ?? 'N/A';
                ?>
                <tr>
                    <th><?= $label ?></th>
                    <td>
                        <div class="d-flex justify-content-between align-items-start" data-field="<?= $field ?>">
                            <div class="flex-grow-1 pe-2" id="<?= $field ?>_display"><?= nl2br(esc($value)) ?></div>
                            <textarea class="form-control d-none" id="<?= $field ?>_input"></textarea>
                            <div class="btn-group">
                                <button class="btn btn-sm copy-btn" data-bs-target="<?= $field ?>_display"><i class="icon ni ni-copy"></i></button>
                                <button class="btn btn-sm edit-btn" data-field="<?= $field ?>"><i class="icon ni ni-edit"></i></button>
                                <button class="btn btn-sm btn-success d-none save-btn" data-field="<?= $field ?>">✅</button>
                                <button class="btn btn-sm btn-danger d-none cancel-btn" data-field="<?= $field ?>">❌</button>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
$(document).ready(function () {
    const csrfTokenName = '<?= esc($csrfName) ?>';

    $('#generateContentBtn').on('click', function () {
        const tradeId = $('#tradeId').val().trim();
        const csrfToken = $('#csrfToken').val();
        if (!tradeId) return alert("Trade ID is required.");

        $.ajax({
            url: '<?= site_url("API/Alerts/manageTradeAlert") ?>',
            type: 'GET',
            data: { trade_id: tradeId, [csrfTokenName]: csrfToken },
            dataType: 'json',
            success: function (res) {
                if (res.status === 'success') {
                    const content = res;
                    $('#social_twitter_display').text(content.social_media.twitter || '');
                    $('#social_facebook_display').text(content.social_media.facebook || '');
                    $('#social_linkedin_display').text(content.social_media.linkedin || '');
                    $('#social_discord_display').text(content.social_media.discord || '');
                    $('#email_content_display').text(content.email_content || '');
                    $('#blog_content_display').text(content.blog_content || '');
                    $('#voiceover_script_display').text(content.voiceover_script || '');
                    $('#hashtags_display').text(content.hashtags || '');

                    if (content.csrfHash) {
                        $('#csrfToken').val(content.csrfHash);
                    }

                    alert('✅ Content generated!');
                } else {
                    alert('❌ ' + (res.message || 'Unknown error.'));
                }
            },
            error: function (xhr) {
                console.error('❌ AJAX Error:', xhr.responseText);
                alert('Failed to generate content.');
            }
        });
    });

    $('#saveContentBtn').on('click', function () {
        const tradeId = $('#tradeId').val().trim();
        if (!tradeId) return alert("Trade ID is required.");

        const formData = {
            trade_id: tradeId,
            [csrfTokenName]: $('#csrfToken').val()
        };

        $('.form-control').each(function () {
            if (this.id.endsWith('_input')) {
                const field = this.id.replace('_input', '');
                formData[field] = $(this).val().trim();
            }
        });

        $.ajax({
            url: '<?= site_url("API/Alerts/storeMarketingContent") ?>',
            method: 'POST',
            dataType: 'json',
            data: formData,
            success: function (res) {
                if (res.status === 'success') {
                    alert(res.message || '✅ Content saved!');
                    $('#csrfToken').val(res.csrfHash || '');
                } else {
                    alert('❌ ' + (res.message || 'Error saving content.'));
                }
            },
            error: function (xhr) {
                console.error('❌ Save Error:', xhr.responseText);
                alert('Failed to save content.');
            }
        });
    });

    $('#sendAlertBtn').on('click', function () {
        const tradeId = $('#tradeId').val().trim();
        const csrfToken = $('#csrfToken').val();

        $.ajax({
            url: '<?= site_url("API/Alerts/sendAlert") ?>',
            method: 'POST',
            dataType: 'json',
            data: { trade_id: tradeId, send_alert: 1, [csrfTokenName]: csrfToken },
            success: function (res) {
                if (res.status === 'success') {
                    alert('📢 Alert sent successfully!');
                    $('#sendAlertBtn').hide();
                } else {
                    alert('❌ ' + (res.message || 'Failed to send alert.'));
                }
            },
            error: function (xhr) {
                console.error('❌ Send Error:', xhr.responseText);
                alert('Failed to send alert.');
            }
        });
    });

    // Field Editing
    $(document).on('click', '.edit-btn', function () {
        const field = $(this).data('field');
        const display = $(`#${field}_display`);
        const input = $(`#${field}_input`);
        const saveBtn = $(`.save-btn[data-field="${field}"]`);
        const cancelBtn = $(`.cancel-btn[data-field="${field}"]`);

        input.val(display.text().trim());
        display.hide();
        input.removeClass('d-none').focus();
        $(this).hide();
        saveBtn.removeClass('d-none');
        cancelBtn.removeClass('d-none');
    });

    $(document).on('click', '.cancel-btn', function () {
        const field = $(this).data('field');
        $(`#${field}_display`).show();
        $(`#${field}_input`).addClass('d-none');
        $(`.edit-btn[data-field="${field}"]`).show();
        $(`.save-btn[data-field="${field}"]`).addClass('d-none');
        $(`.cancel-btn[data-field="${field}"]`).addClass('d-none');
    });

    $(document).on('click', '.copy-btn', function () {
        const targetId = $(this).data('target');
        const content = $(`#${targetId}`).text().trim();

        navigator.clipboard.writeText(content).then(() => {
            alert('✅ Copied to clipboard!');
        }).catch(err => {
            console.error('❌ Copy failed:', err);
            alert('❌ Failed to copy.');
        });
    });
});
</script>
