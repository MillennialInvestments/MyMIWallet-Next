<div class="card card-bordered bg-light">
    <div class="card-inner">
        <div class="d-flex justify-between align-center mb-2">
            <h6 class="title">🧠 Advisor Pick</h6>
            <?php if (!empty($advisorPick['generated_on'])): ?>
                <span class="badge bg-secondary text-white">📅 <?= date('M d, Y h:i A', strtotime($advisorPick['generated_on'])) ?></span>
            <?php endif; ?>
        </div>

        <?php if (!empty($advisorPick)): ?>
            <h5 class="mb-1"><strong><?= $advisorPick['ticker'] ?></strong></h5>
            <p class="mb-2"><?= $advisorPick['summary'] ?? 'No commentary.' ?></p>
            
            <div class="d-flex flex-wrap gap-2">
                <span class="badge badge-success">Momentum: <?= number_format($advisorPick['score'], 2) ?></span>
                <?php if (!empty($advisorPick['sentiment'])): ?>
                    <span class="badge badge-info"><?= $advisorPick['sentiment'] ?></span>
                <?php endif; ?>
                <?php if (!empty($advisorPick['chart_url'])): ?>
                    <a href="<?= $advisorPick['chart_url'] ?>" target="_blank" class="badge bg-dark text-white">📈 Chart</a>
                <?php endif; ?>
            </div>
        <?php else: ?>
            <p>No recommendation available.</p>
        <?php endif; ?>
    </div>
</div>
<div class="mt-3 d-flex flex-wrap gap-2">
    <a href="<?= current_url() ?>?regenerate=1" class="btn btn-sm btn-warning">
        🔁 Regenerate Voiceover
    </a>

    <?php if (!empty($advisorGeneratedOn)): ?>
        <span class="badge bg-secondary text-white">Forecasted on: <?= date('M d, Y h:i A', strtotime($advisorGeneratedOn)) ?></span>
    <?php endif; ?>
</div>
