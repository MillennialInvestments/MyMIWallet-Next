<?php 
// app/Modules/Management/Views/Marketing/Campaigns/View.php
log_message('info', 'Marketing/Campaigns/View L2 - $dripCampaign Array: ' . (print_r($dripCampaign, true))); 
log_message('info', 'Marketing/Campaigns/View L2 - $dripCampaignSteps Array: ' . (print_r($dripCampaignStep, true))); 
if ($pageType === 'Campaign') {
    $campaign = $dripCampaign['result'][0] ?? null;
    $campaignContent = $generatedContent ?? null;
    $tableName = 'Campaign Overview';
} elseif ($pageType === 'Step') {
    $campaign = $dripCampaignStep['result'][0] ?? null;
    $campaignContent = $generatedStepContent ?? null;
    $mainCampaign = $dripCampaign['result'][0] ?? null; 
    $tableName = 'Stage Overview';
}
$csrfName = csrf_token(); 
$csrfHash = csrf_hash();

?>

<div class="card card-bordered h-100" id="campaign-details-view">
    <div class="card-inner-group">
        <div class="card-inner card-inner-md">
            <div class="card-title-group">
                <div class="card-title">
                    <h6 class="title">Campaign Details:<br><?= esc($campaign['name']) ?></h6>
                </div>
                <div class="card-tools me-n1">
                    <div class="row">
                        <?php if ($pageType === 'Campaign') : ?>
                        <span class="col">
                            <div class="form-group">
                                <input type="hidden" id="type" value="<?= $pageType ?>">
                                <input type="hidden" id="campaignId" value="<?= esc($campaign['id']) ?>">
                                <input type="hidden" name="<?= esc($csrfName) ?>" value="<?= esc($csrfHash) ?>" id="csrfToken">
                                <button type="button" id="generateCampaignContentBtn" class="btn btn-success">
                                    <i class="ni ni-spark"></i> Generate
                                </button>
                            </div>
                        </span>
                        <?php else: ?>
                        <span class="col">
                            <div class="form-group">
                                <input type="hidden" id="type" value="<?= $pageType ?>">
                                <input type="hidden" id="campaignId" value="<?= esc($campaign['id']) ?>">
                                <input type="hidden" name="<?= esc($csrfName) ?>" value="<?= esc($csrfHash) ?>" id="csrfToken">
                                <button type="button" id="generateCampaignStepContentBtn" class="btn btn-success">
                                    <i class="ni ni-spark"></i> Generate
                                </button>
                            </div>
                        </span>
                        <?php endif; ?>
                        <span class="col">
                            <a class="btn btn-primary text-white" href="<?= site_url('Management/Marketing/Campaigns/Edit/' . $campaign['id']) ?>">
                                <i class="icon ni ni-edit"></i> Edit
                            </a>
                        </span>
                        <span class="col">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger pt-3 full-width" data-bs-toggle="dropdown">
                                    <em class="icon ni ni-more-h"></em>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <ul class="link-list-opt no-bdr">
                                        <li><a href="#"><em class="icon ni ni-setting"></em><span>Settings</span></a></li>
                                        <li><a href="#"><em class="icon ni ni-notify"></em><span>Notifications</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-inner">
            <div class="nk-block">
                <div class="row">
                    <div class="col-12 mb-3">
                        <h5 class="text-primary"><?= $tableName; ?></h5>
                        <table class="table table-striped table-bordered">
                            <tbody>
                                <tr><th>Stage Name</th><td><?= esc($campaign['name']) ?></td></tr>
                                <tr><th>Description</th><td><?= esc($campaign['description']) ?></td></tr>
                                <?php if (!empty($mainCampaign)): ?>
                                <tr><th>Campaign Name</th><td><?= esc($mainCampaign['name']) ?></td></tr>
                                <?php endif; ?>
                                <tr><th>Created By</th><td><?= esc($campaign['created_by']) ?></td></tr>
                                <tr><th>Date Created</th><td><?= esc($campaign['created_at']) ?></td></tr>
                                <tr><th>Audience Tags</th><td><?= esc($campaign['audience_tags']) ?></td></tr>
                                <tr><th>Priority</th><td><?= esc($campaign['priority']) ?></td></tr>
                                <tr>
                                    <th>Promotional Links</th>
                                    <td>
                                        <div id="promo-links-list">
                                            <?php if (!empty($campaignContent['promotional_links'])): ?>
                                                <?php foreach ($campaignContent['promotional_links'] as $link): ?>
                                                    <div class="mb-1">
                                                        <a href="<?= esc($link) ?>" target="_blank"><?= esc($link) ?></a>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <div class="mb-1 text-muted">Links Not Available</div>
                                            <?php endif; ?>
                                        </div>

                                        <!-- Plus Icon to Trigger Input -->
                                        <div class="mt-2">
                                            <button class="btn text-small" id="add-link-trigger">
                                                <em class="icon ni ni-plus"></em>
                                                <span>Add Link</span>
                                            </button>
                                        </div>

                                        <!-- Hidden Input Row for New Link -->
                                        <div id="new-link-input-row" class="d-none mt-2">
                                            <div class="input-group">
                                                <input type="url" class="form-control" id="new-promo-link" placeholder="https://example.com">
                                                <button class="btn btn-success" id="confirm-add-link" title="Add Link">✅</button>
                                                <button class="btn btn-danger" id="cancel-add-link" title="Cancel">❌</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <hr>
                    <div class="col-12">
                        <h5 class="text-primary">Content for Scheduling</h5>
                        <table class="table table-striped table-bordered">
                            <tbody>
                                <tr>
                                    <th>Voice Script Message</th>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-start" data-field="voice_script">
                                            <div class="flex-grow-1 pe-2" id="voice_script_display"><?= nl2br(esc($campaignContent['voice_script'] ?? 'N/A')) ?></div>
                                            <textarea class="form-control d-none" id="voice_script_input"></textarea>
                                            <div class="btn-group">
                                                <button class="btn btn-sm copy-btn" data-bs-target="voice_script_display"><i class="icon ni ni-copy"></i></button>
                                                <button class="btn btn-sm edit-btn" data-field="voice_script"><i class="icon ni ni-edit"></i></button>
                                                <button class="btn btn-sm btn-success d-none save-btn" data-field="voice_script">✅</button>
                                                <button class="btn btn-sm btn-danger d-none cancel-btn" data-field="voice_script">❌</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Facebook Message</th>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-start" data-field="facebook_message">
                                            <div class="flex-grow-1 pe-2" id="facebook_message_display"><?= nl2br(esc($campaignContent['facebook_message'] ?? 'N/A')) ?></div>
                                            <textarea class="form-control d-none" id="facebook_message_input"></textarea>
                                            <div class="btn-group">
                                                <button class="btn btn-sm copy-btn" data-bs-target="facebook_message_display"><i class="icon ni ni-copy"></i></button>
                                                <button class="btn btn-sm edit-btn" data-field="facebook_message"><i class="icon ni ni-edit"></i></button>
                                                <button class="btn btn-sm btn-success d-none save-btn" data-field="facebook_message">✅</button>
                                                <button class="btn btn-sm btn-danger d-none cancel-btn" data-field="facebook_message">❌</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>LinkedIn Message</th>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-start" data-field="linkedin_message">
                                            <div class="flex-grow-1 pe-2" id="linkedin_message_display"><?= nl2br(esc($campaignContent['linkedin_message'] ?? 'N/A')) ?></div>
                                            <textarea class="form-control d-none" id="linkedin_message_input"></textarea>
                                            <div class="btn-group">
                                                <button class="btn btn-sm copy-btn" data-bs-target="linkedin_message_display"><i class="icon ni ni-copy"></i></button>
                                                <button class="btn btn-sm edit-btn" data-field="linkedin_message"><i class="icon ni ni-edit"></i></button>
                                                <button class="btn btn-sm btn-success d-none save-btn" data-field="linkedin_message">✅</button>
                                                <button class="btn btn-sm btn-danger d-none cancel-btn" data-field="linkedin_message">❌</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Discord Message</th>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-start" data-field="discord_message">
                                            <div class="flex-grow-1 pe-2" id="discord_message_display"><?= nl2br(esc($campaignContent['discord_message'] ?? 'N/A')) ?></div>
                                            <textarea class="form-control d-none" id="discord_message_input"></textarea>
                                            <div class="btn-group">
                                                <button class="btn btn-sm copy-btn" data-bs-target="discord_message_display"><i class="icon ni ni-copy"></i></button>
                                                <button class="btn btn-sm edit-btn" data-field="discord_message"><i class="icon ni ni-edit"></i></button>
                                                <button class="btn btn-sm btn-success d-none save-btn" data-field="discord_message">✅</button>
                                                <button class="btn btn-sm btn-danger d-none cancel-btn" data-field="discord_message">❌</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>StockTwits Message</th>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-start" data-field="stocktwits_message">
                                            <div class="flex-grow-1 pe-2" id="stocktwits_message_display"><?= nl2br(esc($campaignContent['stocktwits_message'] ?? 'N/A')) ?></div>
                                            <textarea class="form-control d-none" id="stocktwits_message_input"></textarea>
                                            <div class="btn-group">
                                                <button class="btn btn-sm copy-btn" data-bs-target="stocktwits_message_display"><i class="icon ni ni-copy"></i></button>
                                                <button class="btn btn-sm edit-btn" data-field="stocktwits_message"><i class="icon ni ni-edit"></i></button>
                                                <button class="btn btn-sm btn-success d-none save-btn" data-field="stocktwits_message">✅</button>
                                                <button class="btn btn-sm btn-danger d-none cancel-btn" data-field="stocktwits_message">❌</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>TikTok Message</th>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-start" data-field="tiktok_message">
                                            <div class="flex-grow-1 pe-2" id="tiktok_message_display"><?= nl2br(esc($campaignContent['tiktok_message'] ?? 'N/A')) ?></div>
                                            <textarea class="form-control d-none" id="tiktok_message_input"></textarea>
                                            <div class="btn-group">
                                                <button class="btn btn-sm copy-btn" data-bs-target="tiktok_message_display"><i class="icon ni ni-copy"></i></button>
                                                <button class="btn btn-sm edit-btn" data-field="tiktok_message"><i class="icon ni ni-edit"></i></button>
                                                <button class="btn btn-sm btn-success d-none save-btn" data-field="tiktok_message">✅</button>
                                                <button class="btn btn-sm btn-danger d-none cancel-btn" data-field="tiktok_message">❌</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>YouTube Message</th>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-start" data-field="youtube_message">
                                            <div class="flex-grow-1 pe-2" id="youtube_message_display"><?= nl2br(esc($campaignContent['youtube_message'] ?? 'N/A')) ?></div>
                                            <textarea class="form-control d-none" id="youtube_message_input"></textarea>
                                            <div class="btn-group">
                                                <button class="btn btn-sm copy-btn" data-bs-target="youtube_message_display"><i class="icon ni ni-copy"></i></button>
                                                <button class="btn btn-sm edit-btn" data-field="youtube_message"><i class="icon ni ni-edit"></i></button>
                                                <button class="btn btn-sm btn-success d-none save-btn" data-field="youtube_message">✅</button>
                                                <button class="btn btn-sm btn-danger d-none cancel-btn" data-field="youtube_message">❌</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Email Message</th>
                                    <td>
                                        <?php
                                            $messageId = $campaignContent['message_id'] ?? null;
                                            $titleSlug = isset($campaign['name']) ? url_title($campaign['name'], '-', true) : 'email';

                                            if ($messageId) {
                                                $viewEmailUrl = site_url("Management/Marketing/View-Email/{$titleSlug}/{$messageId}");
                                                echo '<a class="btn btn-outline-primary btn-sm" href="' . $viewEmailUrl . '" target="_blank">📄 View Email</a>';
                                            } else {
                                                echo '<span class="text-muted">Message not available</span>';
                                            }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Hashtags</th>
                                    <td>
                                        <div class="d-flex justify-content-between align-items-start" data-field="hashtags">
                                            <div class="flex-grow-1 pe-2" id="hashtags_display"><?= esc($campaignContent['hashtags'] ?? 'N/A') ?></div>
                                            <textarea class="form-control d-none" id="hashtags_input"></textarea>
                                            <div class="btn-group">
                                                <button class="btn btn-sm copy-btn" data-bs-target="hashtags_display"><i class="icon ni ni-copy"></i></button>
                                                <button class="btn btn-sm edit-btn" data-field="hashtags"><i class="icon ni ni-edit"></i></button>
                                                <button class="btn btn-sm btn-success d-none save-btn" data-field="hashtags">✅</button>
                                                <button class="btn btn-sm btn-danger d-none cancel-btn" data-field="hashtags">❌</button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
// $('#generateCampaignContentBtn').on('click', function () {
//     const campaignId = $('#campaignId').val().trim();
//     const type = $('#type').val().trim();
//     const csrfTokenName = '<?= esc($csrfName) ?>';
//     const csrfHash = $('#csrfToken').val();

//     if (!campaignId) {
//         alert("❗ Campaign ID is missing.");
//         return;
//     }

//     const formData = {};
//     formData['campaign_id'] = campaignId;
//     formData['type'] = type;
//     formData[csrfTokenName] = csrfHash;

//     $.ajax({
//         url: '<?= site_url("API/Marketing/generateCampaignContent") ?>',
//         method: 'POST',
//         data: formData,
//         dataType: 'json',
//         success: function (response) {
//             if (response.status === 'success') {
//                 const content = response.generated_content || {};
//                 $('#voice_script_display').text(content.voice_script || '');
//                 $('#facebook_message_display').text(content.facebook_message || '');
//                 $('#linkedin_message_display').text(content.linkedin_message || '');
//                 $('#discord_message_display').text(content.discord_message || '');
//                 $('#stocktwits_message_display').text(content.stocktwits_message || '');
//                 $('#tiktok_message_display').text(content.tiktok_message || '');
//                 $('#youtube_message_display').text(content.youtube_message || '');
//                 $('#email_message_display').text(content.email_message || '');
//                 $('#hashtags_display').text(content.hashtags || '');

//                 if (response.csrfHash) {
//                     $('#csrfToken').val(response.csrfHash);
//                 }

//                 alert("🎉 Campaign content generated successfully!");
//             } else {
//                 alert("⚠️ Error: " + (response.message || "Unknown error."));
//             }
//         },
//         error: function (xhr) {
//             console.error("❌ AJAX error:", xhr.responseText);
//             alert("Failed to generate campaign content.");
//         }
//     });
// });
// $('#generateCampaignStepContentBtn').on('click', function () {
//     const stepId = $('#campaignId').val().trim(); // same input, different variable name
//     const pageType = $('#type').val().trim(); // same input, different variable name
//     const csrfTokenName = '<?= esc($csrfName) ?>';
//     const csrfHash = $('#csrfToken').val();

//     if (!stepId) {
//         alert("❗ Step ID is missing.");
//         return;
//     }

//     const formData = {};
//     formData['campaign_id'] = stepId;
//     formData['type'] = pageType;
//     formData[csrfTokenName] = csrfHash;

//     $.ajax({
//         url: '<?= site_url("API/Marketing/generateCampaignStepContent") ?>',
//         method: 'POST',
//         data: formData,
//         dataType: 'json',
//         success: function (response) {
//             if (response.status === 'success') {
//                 const content = response.generated_content || {};
//                 $('#voice_script_display').text(content.voice_script || '');
//                 $('#facebook_message_display').text(content.facebook_message || '');
//                 $('#linkedin_message_display').text(content.linkedin_message || '');
//                 $('#discord_message_display').text(content.discord_message || '');
//                 $('#stocktwits_message_display').text(content.stocktwits_message || '');
//                 $('#tiktok_message_display').text(content.tiktok_message || '');
//                 $('#youtube_message_display').text(content.youtube_message || '');
//                 $('#email_message_display').text(content.email_message || '');
//                 $('#hashtags_display').text(content.hashtags || '');

//                 if (response.csrfHash) {
//                     $('#csrfToken').val(response.csrfHash);
//                 }

//                 alert("🎉 Step content generated successfully!");
//             } else {
//                 alert("⚠️ Error: " + (response.message || "Unknown error."));
//             }
//         },
//         error: function (xhr) {
//             console.error("❌ AJAX error:", xhr.responseText);
//             alert("Failed to generate step content.");
//         }
//     });
// });
$('#generateCampaignContentBtn').on('click', function () {
    const campaignId = $('#campaignId').val().trim();
    generatePlatformMessages('Campaign', campaignId, '<?= site_url("API/Marketing/generateCampaignContent") ?>', '','true');
});
$('#generateCampaignStepContentBtn').on('click', function () {
    const stepId = $('#campaignId').val().trim();
    generatePlatformMessages('Step', stepId, '<?= site_url("API/Marketing/generateCampaignStepContent") ?>', '', 'true');
});

</script>

<script <?= $nonce['script'] ?? '' ?>>
$(document).on('click', '.copy-btn', function () {
    const targetId = $(this).data('target');
    const content = $('#' + targetId).text().trim();

    navigator.clipboard.writeText(content).then(() => {
        alert('✅ Copied to clipboard!');
    }).catch(err => {
        console.error('❌ Copy failed:', err);
        alert('❌ Failed to copy text.');
    });
});
</script>
<script <?= $nonce['script'] ?? '' ?>>
$(document).ready(function () {
    // Show input row
    $('#add-link-trigger').on('click', function () {
        $('#new-link-input-row').removeClass('d-none');
        $('#new-promo-link').val('').focus();
    });

    // Cancel add link
    $('#cancel-add-link').on('click', function () {
        $('#new-promo-link').val('');
        $('#new-link-input-row').addClass('d-none');
    });

    // Confirm add link (appends to list + AJAX)
    $('#confirm-add-link').on('click', function () {
        const newLink = $('#new-promo-link').val().trim();
        const campaignId = $('#campaignId').val();
        const csrfTokenName = '<?= esc($csrfName) ?>';
        const csrfToken = $('#csrfToken').val();

        if (newLink.length === 0 || !newLink.startsWith('http')) {
            alert('Please enter a valid link starting with http or https.');
            return;
        }

        $.ajax({
            url: '<?= site_url("API/Marketing/updateCampaignLinks") ?>',
            method: 'POST',
            data: {
                campaign_id: campaignId,
                new_link: newLink,
                [csrfTokenName]: csrfToken
            },
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    const anchor = $('<a></a>').attr('href', newLink).attr('target', '_blank').text(newLink);
                    $('#promo-links-list').append($('<div class="mb-1"></div>').append(anchor));

                    $('#new-promo-link').val('');
                    $('#new-link-input-row').addClass('d-none');

                    if (response.csrfHash) {
                        $('#csrfToken').val(response.csrfHash);
                    }

                    alert('✅ Link added successfully!');
                } else {
                    alert('❌ Failed to add link: ' + (response.message || 'Unknown error'));
                }
            },
            error: function (xhr) {
                console.error('❌ AJAX Error:', xhr.responseText);
                alert('Failed to add promotional link.');
            }
        });
    });

});
</script>
<script <?= $nonce['script'] ?? '' ?>>
$(document).on('click', '.edit-btn', function () {
    const field = $(this).data('field');
    const displayEl = $(`#${field}_display`);
    const inputEl = $(`#${field}_input`);
    const saveBtn = $(`.save-btn[data-field="${field}"]`);
    const cancelBtn = $(`.cancel-btn[data-field="${field}"]`);

    inputEl.val(displayEl.text().trim());
    displayEl.hide();
    inputEl.removeClass('d-none').focus();
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

$(document).on('click', '.save-btn', function () {
    const field = $(this).data('field');
    const newText = $(`#${field}_input`).val().trim();
    const campaignId = $('#campaignId').val();
    const csrfTokenName = '<?= esc($csrfName) ?>';
    const csrfToken = $('#csrfToken').val();

    $.ajax({
        url: '<?= site_url("API/Marketing/updateCampaignMessageField") ?>',
        method: 'POST',
        data: {
            campaign_id: campaignId,
            field: field,
            new_value: newText,
            [csrfTokenName]: csrfToken
        },
        dataType: 'json',
        success: function (response) {
            if (response.status === 'success') {
                $(`#${field}_display`).text(newText).show();
                $(`#${field}_input`).addClass('d-none');
                $(`.edit-btn[data-field="${field}"]`).show();
                $(`.save-btn[data-field="${field}"]`).addClass('d-none');
                $(`.cancel-btn[data-field="${field}"]`).addClass('d-none');

                if (response.csrfHash) {
                    $('#csrfToken').val(response.csrfHash);
                }

                alert('✅ Message updated!');
            } else {
                alert('❌ Error updating message: ' + (response.message || 'Unknown error'));
            }
        },
        error: function (xhr) {
            console.error('❌ AJAX Error:', xhr.responseText);
            alert('Failed to update message.');
        }
    });
});
</script>
