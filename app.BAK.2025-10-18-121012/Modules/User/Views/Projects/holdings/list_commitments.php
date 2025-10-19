<ul class="list-unstyled mb-0 small">
<?php if (!empty($commitments)): foreach (array_slice($commitments,0,5) as $c): ?>
  <li class="d-flex justify-content-between">
    <span><?= esc($c['project_name'] ?? ('Project #'.($c['project_id'] ?? ''); ?></span>
    <span>$<?= number_format((float)($c['amount'] ?? 0),2) ?></span>
  </li>
<?php endforeach; else: ?>
  <li class="text-muted">No recent commitments.</li>
<?php endif; ?>
</ul>
