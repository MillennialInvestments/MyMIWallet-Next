<?php $viewFileData = $viewFileData ?? []; ?>
<div class="nk-block">
    <div class="row gy-gs">
        <div class="col-12 col-xxl-4">
            <?= view('ManagementModule\\Views\\Marketing\\Blogger\\_campaign_form', $viewFileData) ?>
        </div>
        <div class="col-12 col-xxl-8">
            <?= view('ManagementModule\\Views\\Marketing\\Blogger\\_calendar', $viewFileData) ?>
            <div id="mymiblogger-cards"></div>
        </div>
        <div class="col-12">
            <?= view('ManagementModule\\Views\\Marketing\\Blogger\\_content_modal', $viewFileData) ?>
            <?= view('ManagementModule\\Views\\Marketing\\Blogger\\_preview_modal', $viewFileData) ?>
        </div>
    </div>
</div>
<link rel="stylesheet" href="<?= base_url('assets/mymiblogger/mymiblogger.css') ?>">
<script src="<?= base_url('assets/mymiblogger/mymiblogger.js') ?>" <?= $nonce['script'] ?? '' ?>></script>