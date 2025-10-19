<div class="nk-block">
    <div class="card card-bordered">
        <div class="card-header">
            <h5 class="card-title">💼 Budget Forecast + Advisor</h5>
        </div>
        <div class="card-inner">
            <p><strong>Risk Level:</strong> <span class="badge bg-info"><?= esc($risk['risk_level']) ?></span></p>
            <p><strong>Disposable Income:</strong> $<?= esc(number_format($forecast['disposable_monthly'], 2)) ?></p>
            <p><strong>Advisor Notes:</strong><br><?= esc($advisor['summary']) ?></p>
            <?php if ($advisor['flag_opportunity']): ?>
                <div class="alert alert-success mt-3">
                    ✅ Advisor Opportunity Flagged – Review suggested trade alerts!
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
