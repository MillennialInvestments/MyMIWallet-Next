<?php
$modalTitle = '🎬 Video Script Preview';
?>

<div class="modal-header">
    <h4 class="modal-title" id="videoPreviewModalLabel"><?= esc($modalTitle); ?></h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="modal-body">
    <div class="nk-block">
        <div class="nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h5 class="nk-block-title"><?= esc($title); ?></h5>
                    <div class="nk-block-des text-soft">
                        <p class="small">Below is the formatted video script generated from your marketing summary.</p>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="nk-block mt-3">
            <div class="card card-bordered px-2 pb-3">
                <div class="card-inner">
                    <h6 class="title text-primary mb-2">Video Script</h6>
                    <pre style="white-space: pre-wrap; font-size: 14px;"><?= esc($videoScript); ?></pre>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal-footer d-flex justify-content-between">
    <a href="<?= site_url('/Management') ?>" class="btn btn-outline-danger btn-sm">
        <em class="icon ni ni-cross"></em>
        <span>Back to Dashboard</span>
    </a>
    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
        <em class="icon ni ni-cross"></em>
        <span>Close</span>
    </button>
</div>
