<?= $this->extend('themes/dashboard/layouts/index') ?>

<?= $this->section('content') ?>
<div class="nk-block">
    <div class="row g-gs">
        <div class="col-lg-4">
            <div class="card card-bordered">
                <div class="card-inner">
                    <h6 class="subtitle">KPI 1</h6>
                    <div class="amount"><?= esc($kpiOne ?? '--') ?></div>
                    <div class="text-soft small"><?= esc($kpiOneLabel ?? 'Primary KPI') ?></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-bordered">
                <div class="card-inner">
                    <h6 class="subtitle">KPI 2</h6>
                    <div class="amount"><?= esc($kpiTwo ?? '--') ?></div>
                    <div class="text-soft small"><?= esc($kpiTwoLabel ?? 'Secondary KPI') ?></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-bordered">
                <div class="card-inner">
                    <h6 class="subtitle">KPI 3</h6>
                    <div class="amount"><?= esc($kpiThree ?? '--') ?></div>
                    <div class="text-soft small"><?= esc($kpiThreeLabel ?? 'Tertiary KPI') ?></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="nk-block">
    <div class="row g-gs">
        <div class="col-lg-8">
            <div class="card card-bordered h-100">
                <div class="card-inner">
                    <h6 class="subtitle">Main Row</h6>
                    <div class="text-soft"><?= esc($mainRowSummary ?? 'Primary dashboard content goes here.') ?></div>
                    <?= $mainRowContent ?? '' ?>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card card-bordered h-100">
                <div class="card-inner">
                    <h6 class="subtitle">Sidebar Summary</h6>
                    <div class="text-soft"><?= esc($sidebarSummary ?? 'Secondary summary content.') ?></div>
                    <?= $sidebarContent ?? '' ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="nk-block">
    <div class="row g-gs">
        <div class="col-lg-6">
            <div class="card card-bordered h-100">
                <div class="card-inner">
                    <h6 class="subtitle">Secondary Row</h6>
                    <div class="text-soft"><?= esc($secondaryRowSummary ?? 'Additional widgets or tables.') ?></div>
                    <?= $secondaryRowContent ?? '' ?>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card card-bordered h-100">
                <div class="card-inner">
                    <h6 class="subtitle">Secondary Row</h6>
                    <div class="text-soft"><?= esc($secondaryRowAltSummary ?? 'Add companion content here.') ?></div>
                    <?= $secondaryRowAltContent ?? '' ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="globalDashboardModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center text-soft">Loading…</div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<?php $cspNonce = $cspNonce ?? (service('renderer')->getData('cspNonce') ?? ''); ?>
<script nonce="<?= esc($cspNonce) ?>">
    window.dashboardTemplateReady = true;
</script>
<?= $this->endSection() ?>
