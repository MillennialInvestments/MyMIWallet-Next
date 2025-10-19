<ul class="list-unstyled mb-0 small">
<?php if (!empty($investments)): foreach (array_slice($investments,0,5) as $i): ?>
  <li class="d-flex justify-content-between">
    <span><?= esc($i['project_name'] ?? ('Project #'.($i['project_id'] ?? ''))); ?></span>
    <span>$<?= number_format((float)($i['investment_amount'] ?? 0),2) ?></span>
  </li>
<?php endforeach; else: ?>
  <li class="text-muted">No recent investments.</li>
<?php endif; ?>
</ul>
