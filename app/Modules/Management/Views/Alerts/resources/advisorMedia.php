<?php
$advisorUserId     = $advisorUserId ?? $cuID ?? null;
$advisorSummaryTxt = $advisorSummary ?? '';
$advisorScriptTxt  = $advisorScript ?? '';
$advisorAudioUrl   = $advisorAudio ?? '';
$capcutUrl         = $advisorCapcutUrl ?? '';
$zipUrl            = $advisorZipUrl ?? '';
?>
<div class="card card-bordered h-100">
    <div class="card-inner">
        <div class="card-title-group align-start mb-3">
            <div class="card-title">
                <h6 class="title">Advisor Voiceover Media</h6>
                <p>Latest daily forecast, summary, and preview audio.</p>
            </div>
            <div class="card-tools mt-n1 me-n1">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown">
                        <em class="icon ni ni-more-h"></em>
                    </a>
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                        <ul class="link-list-opt no-bdr" id="advisorDownloadLinks">
                            <?php if ($capcutUrl || $zipUrl): ?>
                                <?php if ($capcutUrl): ?>
                                    <li><a href="<?= esc($capcutUrl); ?>" target="_blank"><span>Download CapCut Template</span></a></li>
                                <?php endif; ?>
                                <?php if ($zipUrl): ?>
                                    <li><a href="<?= esc($zipUrl); ?>" target="_blank"><span>Download Media Bundle (ZIP)</span></a></li>
                                <?php endif; ?>
                            <?php else: ?>
                                <li><span class="text-muted">No media files yet.</span></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!-- .card-title-group -->

        <div class="nk-order-ovwg">
            <div class="row g-4 align-start">
                <div class="col-md-7">
                    <div class="nk-order-ovwg-data">
                        <h6>📋 Advisor Summary</h6>
                        <p id="advisorSummary" class="text-muted"><?= ! empty($advisorSummaryTxt) ? esc($advisorSummaryTxt) : '⚠️ Summary not generated yet.'; ?></p>

                        <h6>📝 Script Preview</h6>
                        <pre id="advisorScript" style="white-space: pre-wrap; font-size: 0.85rem;" class="text-muted"><?= ! empty($advisorScriptTxt) ? esc($advisorScriptTxt) : 'No script preview available.'; ?></pre>

                        <div class="mt-3">
                            <button class="btn btn-warning" id="generateAdvisorMediaBtn" data-userid="<?= $advisorUserId ?>">
                                🎙️ Refresh Advisor Pack
                            </button>
                            <div class="mt-2" id="advisorMediaStatus"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="nk-order-ovwg-data">
                        <h6>🔊 Voiceover Audio</h6>
                        <div id="advisorAudioPlayer">
                            <?php if (! empty($advisorAudioUrl)): ?>
                                <audio controls style="width:100%;" src="<?= esc($advisorAudioUrl); ?>"></audio>
                                <div class="mt-2">
                                    <a href="<?= esc($advisorAudioUrl); ?>" class="btn btn-sm btn-success" target="_blank">Download MP3</a>
                                    <?php if (! empty($capcutUrl)): ?>
                                        <a href="<?= esc($capcutUrl); ?>" class="btn btn-sm btn-info" target="_blank">CapCut Template</a>
                                    <?php endif; ?>
                                    <?php if (! empty($zipUrl)): ?>
                                        <a href="<?= esc($zipUrl); ?>" class="btn btn-sm btn-primary" target="_blank">Media Bundle</a>
                                    <?php endif; ?>
                                </div>
                            <?php else: ?>
                                <p class="text-danger">No audio available yet.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .nk-order-ovwg -->
    </div><!-- .card-inner -->
</div><!-- .card -->

<script <?= $nonce['script'] ?? '' ?>>
document.addEventListener('DOMContentLoaded', function () {
    $('#generateAdvisorMediaBtn').on('click', function () {
        const userId = $(this).data('userid');
        const status = $('#advisorMediaStatus');
        const summary = $('#advisorSummary');
        const script = $('#advisorScript');
        const audioBlock = $('#advisorAudioPlayer');
        const dropdown = $('#advisorDownloadLinks');

        status.html('<em>Generating voiceover + media package...</em>');
        $(this).prop('disabled', true).text('⏳ Generating...');

        $.ajax({
            url: '<?= site_url("Management/Alerts/Generate-Advisor-Package") ?>',
            method: 'POST',
            data: {
                user_id: userId,
                '<?= csrf_token() ?>': '<?= csrf_hash() ?>'
            },
            success: function (res) {
                if (res.status === 'success') {
                    const media = res.media || {};

                    if (media.summary) {
                        summary.html(media.summary);
                    }
                    if (media.script) {
                        script.text(media.script);
                    }

                    if (media.voiceover_url) {
                        audioBlock.html(`
                            <audio controls style="width:100%;" src="${media.voiceover_url}"></audio>
                            <div class="mt-2">
                                <a href="${media.voiceover_url}" class="btn btn-sm btn-success" target="_blank">Download MP3</a>
                            </div>
                        `);
                    }

                    if (media.capcut_url || media.zip_url) {
                        dropdown.html(`
                            ${media.capcut_url ? `<li><a href="${media.capcut_url}" target="_blank"><span>Download CapCut Template</span></a></li>` : ''}
                            ${media.zip_url ? `<li><a href="${media.zip_url}" target="_blank"><span>Download Media Bundle (ZIP)</span></a></li>` : ''}
                        `);
                    }

                    status.html(`<span class="text-success">✅ Media package ready.</span>`);
                } else {
                    status.html(`<span class="text-danger">❌ Failed to generate advisor media.</span>`);
                }

                $('#generateAdvisorMediaBtn').prop('disabled', false).text('🎙️ Refresh Advisor Pack');
            },
            error: function (xhr) {
                status.html(`<span class="text-danger">❌ Error: ${xhr.responseText}</span>`);
                $('#generateAdvisorMediaBtn').prop('disabled', false).text('🎙️ Refresh Advisor Pack');
            }
        });
    });
});
</script>
