<p>AI Ops Alert: <?= esc($subsystem ?? '') ?> reached <?= esc($pct ?? 0) ?>% of its monthly cap.</p>
<ul>
    <li>Cap (USD): <?= esc($cap ?? 0) ?></li>
    <li>Used (USD): <?= esc($used ?? 0) ?></li>
    <li>Threshold reached: <?= esc($pct ?? 0) ?>%</li>
</ul>
<p>Suggested actions:</p>
<ul>
    <?php if (! empty($actions) && is_array($actions)) : ?>
        <?php foreach ($actions as $action) : ?>
            <li><?= esc($action) ?></li>
        <?php endforeach; ?>
    <?php endif; ?>
</ul>
