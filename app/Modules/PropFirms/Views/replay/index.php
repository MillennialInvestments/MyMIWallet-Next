<section class="container py-4" id="prop-replay-app" data-account-id="<?= (int) ($account['id'] ?? 0) ?>" data-symbol="<?= esc((string) ($symbol ?? 'ES')) ?>">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h1 class="h3 mb-1">Replay Timeline: <?= esc((string) ($symbol ?? 'ES')) ?></h1>
            <p class="text-muted mb-0">Account <?= esc((string) ($account['account_ref'] ?? '')) ?> diagnostics and journal workflow.</p>
        </div>
        <button class="btn btn-primary" id="save-review-btn">Save Review</button>
    </div>

    <div class="row g-3">
        <div class="col-lg-8">
            <div class="card mb-3">
                <div class="card-header"><strong>Chronological Replay Events</strong></div>
                <div class="table-responsive" style="max-height: 360px; overflow:auto;">
                    <table class="table table-sm mb-0" id="replay-events-table">
                        <thead><tr><th>#</th><th>At</th><th>Type</th><th>Label</th></tr></thead>
                        <tbody>
                        <?php foreach (($timeline['markers'] ?? []) as $marker): ?>
                            <tr>
                                <td><?= (int) ($marker['sequence_no'] ?? 0) ?></td>
                                <td><?= esc((string) ($marker['at'] ?? '')) ?></td>
                                <td><?= esc((string) ($marker['type'] ?? 'event')) ?></td>
                                <td><?= esc((string) ($marker['label'] ?? '')) ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header"><strong>Recent Review Journal Entries</strong></div>
                <div class="table-responsive">
                    <table class="table table-sm mb-0">
                        <thead><tr><th>Date</th><th>Symbol</th><th>Emotion</th><th>Mistake</th><th>Score</th></tr></thead>
                        <tbody>
                        <?php foreach (($recentReviews ?? []) as $review): ?>
                            <tr>
                                <td><?= esc((string) ($review['trade_date'] ?? '')) ?></td>
                                <td><?= esc((string) ($review['symbol'] ?? '')) ?></td>
                                <td><?= esc((string) ($review['emotion_tag'] ?? '')) ?></td>
                                <td><?= esc((string) ($review['mistake_tag'] ?? '')) ?></td>
                                <td><?= (int) ($review['review_score'] ?? 0) ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card mb-3">
                <div class="card-header"><strong>Replay Diagnostics</strong></div>
                <div class="card-body">
                    <?php foreach (($diagnostics['findings'] ?? []) as $finding): ?>
                        <div class="border rounded p-2 mb-2">
                            <div><strong><?= esc((string) ($finding['code'] ?? 'finding')) ?></strong> <span class="badge bg-secondary"><?= esc((string) ($finding['severity'] ?? 'info')) ?></span></div>
                            <div class="small text-muted"><?= esc((string) ($finding['message'] ?? '')) ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="card">
                <div class="card-header"><strong>Thresholds</strong></div>
                <div class="card-body">
                    <?php $thresholds = $timeline['thresholds'] ?? []; ?>
                    <div class="small">Current Equity: <strong><?= esc(number_format((float) ($thresholds['current_equity'] ?? 0), 2)) ?></strong></div>
                    <div class="small">Remaining Drawdown: <strong><?= esc(number_format((float) ($thresholds['remaining_drawdown'] ?? 0), 2)) ?></strong></div>
                    <div class="small">Remaining DLL: <strong><?= esc(number_format((float) ($thresholds['remaining_dll'] ?? 0), 2)) ?></strong></div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="<?= base_url('modules/propfirms/assets/js/prop-replay.js') ?>" defer></script>
