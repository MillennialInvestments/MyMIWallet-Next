<div class="card shadow-sm">
    <div class="card-header bg-info text-white">
        <h5>📊 Advisor Momentum Summary</h5>
    </div>
    <div class="card-body">
        <p><strong>Risk Profile:</strong> <?= esc($advisorSummary['risk_level']) ?></p>
        <p><strong>Monthly Outlook:</strong> <?= esc($advisorSummary['advisor_note']) ?></p>

        <h6 class="mt-3">🔥 Top Picks</h6>
        <ul class="list-group">
            <?php foreach ($advisorPicks as $pick): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span><strong><?= esc($pick['ticker']) ?></strong> - <?= esc($pick['category']) ?> (<?= esc($pick['score']) ?> pts)</span>
                    <span class="badge bg-success">💰 $<?= esc($pick['entry_price']) ?></span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
