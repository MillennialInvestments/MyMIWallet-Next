<?php
$setupStatus = $setupStatus ?? [];
$setupPrefs = $setupPrefs ?? [];
$setupContext = strtolower((string) ($setupContext ?? 'dashboard'));

$missing = $setupStatus['missing'] ?? [];
$progressPct = (int) ($setupStatus['progress_pct'] ?? 0);
$nextSteps = $setupStatus['next_steps'] ?? [];

$labels = [
    'budget'      => 'Budget & cash flow',
    'wallets'     => 'Wallets & accounts',
    'profile'     => 'Profile basics',
    'investments' => 'Investments & watchlist',
];

$contextTitles = [
    'budget'    => 'Finish your budget setup',
    'wallets'   => 'Finish your wallets setup',
    'dashboard' => 'Continue your MyMI Wallet setup',
];

$contextTitle = $contextTitles[$setupContext] ?? $contextTitles['dashboard'];

$contextNextSteps = array_values(array_filter($nextSteps, static fn ($step) => ($step['context'] ?? '') === $setupContext));
$primaryStep = $contextNextSteps[0] ?? $nextSteps[0] ?? null;
$secondarySteps = array_values(array_filter($nextSteps, static fn ($step) => $step !== $primaryStep));

$contextMissing = $setupContext === 'dashboard'
    ? $missing
    : array_intersect_key($missing, [$setupContext => true]);
?>

<div class="modal-header">
    <h5 class="modal-title"><?= esc($contextTitle) ?></h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

<div class="modal-body">
    <div class="mb-3">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <span class="fw-semibold">Setup progress</span>
            <span class="text-muted small"><?= esc($progressPct) ?>%</span>
        </div>
        <div class="progress">
            <div class="progress-bar bg-success" role="progressbar" style="width: <?= esc($progressPct) ?>%" aria-valuenow="<?= esc($progressPct) ?>" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>

    <div class="mb-3">
        <h6 class="text-muted">What's missing</h6>
        <ul class="list-group">
            <?php foreach ($contextMissing as $key => $isMissing): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span><?= esc($labels[$key] ?? ucfirst((string) $key)) ?></span>
                    <?php if ($isMissing): ?>
                        <span class="badge bg-warning text-dark">Pending</span>
                    <?php else: ?>
                        <span class="badge bg-success">Done</span>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="mb-3">
        <h6 class="text-muted">Quick links</h6>
        <?php if ($primaryStep): ?>
            <a class="btn btn-primary mb-2" href="<?= esc($primaryStep['url'] ?? '#') ?>">
                <?= esc($primaryStep['label'] ?? 'Next step') ?>
            </a>
        <?php endif; ?>
        <?php if (! empty($secondarySteps)): ?>
            <div class="d-flex flex-wrap gap-2">
                <?php foreach ($secondarySteps as $step): ?>
                    <a class="btn btn-outline-secondary btn-sm" href="<?= esc($step['url'] ?? '#') ?>">
                        <?= esc($step['label'] ?? 'View step') ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
    <button type="button" class="btn btn-outline-secondary" data-setup-dismiss="page" data-setup-context="<?= esc($setupContext) ?>">Don't show on this page</button>
    <button type="button" class="btn btn-warning" data-setup-dismiss="all">I'm done setting up</button>
</div>

<script <?= $nonce['script'] ?? '' ?>>
$(document).on('click', '[data-setup-dismiss]', function () {
    const scope = $(this).data('setup-dismiss');
    const context = $(this).data('setup-context');
    const payloadScope = scope === 'page' ? context : scope;

    let csrfName = $('meta[name="csrf-name"]').attr('content');
    let csrfHash = $('meta[name="csrf-hash"]').attr('content');

    $.ajax({
        url: "<?= site_url('Dashboard/setup/dismiss') ?>",
        type: "POST",
        dataType: "json",
        data: {
            scope: payloadScope,
            dismiss: 1,
            [csrfName]: csrfHash
        },
        success: function (response) {
            if (response.csrfName && response.csrfHash) {
                $('meta[name="csrf-name"]').attr('content', response.csrfName);
                $('meta[name="csrf-hash"]').attr('content', response.csrfHash);
            }

            if (response.status !== 'success') {
                console.warn('Setup dismiss failed', response);
                return;
            }

            if (payloadScope === 'all') {
                document.querySelectorAll('[data-setup-banner]').forEach((el) => el.remove());
            } else {
                const banner = document.querySelector(`[data-setup-banner="${payloadScope}"]`);
                if (banner) {
                    banner.remove();
                }
            }

            $('#transactionModal').modal('hide');
        },
        error: function (xhr) {
            console.error('Setup dismiss error', xhr.responseText);
        }
    });
});
</script>
