<ul class="list-unstyled mb-0 small">
<?php if (!empty($distributions)): foreach (array_slice($distributions,0,5) as $d): ?>
  <li class="d-flex justify-content-between">
    <span><?= esc($d['project_name'] ?? ('Project #'.($d['project_id'] ?? ''))); ?></span>
    <span>$<?= number_format((float)($d['amount'] ?? 0),2) ?></span>
  </li>
<?php endforeach; else: ?>
  <li class="text-muted">No recent distributions.</li>
<?php endif; ?>
</ul>
