<?php
/**
 * ManagementModule\Views\Wallets\Reconcile.php
 *
 * Variables:
 * - $counts  : array
 * - $created : array
 * - $updated : array
 * - $issues  : array
 */
?>
<div class="container my-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="h4">Wallet Reconciliation</h2>
    <button class="btn btn-primary" id="rerun">Re-run</button>
  </div>

  <div class="row g-3">
    <div class="col-md-3">
      <div class="card shadow-sm">
        <div class="card-body">
          <div class="text-muted small mb-1">Total wallets</div>
          <div class="h4 mb-0"><?= esc($counts['wallets'] ?? 0) ?></div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card shadow-sm">
        <div class="card-body">
          <div class="text-muted small mb-1">Subsidiary rows created</div>
          <div class="h4 mb-0"><?= esc($counts['created'] ?? 0) ?></div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card shadow-sm">
        <div class="card-body">
          <div class="text-muted small mb-1">Rows updated</div>
          <div class="h4 mb-0"><?= esc($counts['updated'] ?? 0) ?></div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card shadow-sm">
        <div class="card-body">
          <div class="text-muted small mb-1">Issues to review</div>
          <div class="h4 mb-0"><?= esc($counts['issues'] ?? 0) ?></div>
        </div>
      </div>
    </div>
  </div>

  <?php if (!empty($created)): ?>
  <div class="card shadow-sm mt-4">
    <div class="card-header bg-light">Created subsidiary rows</div>
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-sm table-striped mb-0">
          <thead>
            <tr>
              <th>Table</th><th>Sub ID</th><th>Wallet ID</th><th>User ID</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($created as $c): ?>
            <tr>
              <td><?= esc($c['table']) ?></td>
              <td><?= esc($c['sub_id']) ?></td>
              <td><?= esc($c['wallet_id']) ?></td>
              <td><?= esc($c['user_id']) ?></td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <?php endif; ?>

  <?php if (!empty($updated)): ?>
  <div class="card shadow-sm mt-4">
    <div class="card-header bg-light">Updated subsidiary rows</div>
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-sm table-striped mb-0">
          <thead>
            <tr>
              <th>Table</th><th>Sub ID</th><th>Wallet ID</th><th>User ID</th><th>Change</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($updated as $u): ?>
            <tr>
              <td><?= esc($u['table']) ?></td>
              <td><?= esc($u['sub_id']) ?></td>
              <td><?= esc($u['wallet_id']) ?></td>
              <td><?= esc($u['user_id']) ?></td>
              <td><?= esc($u['change'] ?? '') ?></td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <?php endif; ?>

  <div class="card shadow-sm mt-4">
    <div class="card-header bg-light">Issues (missing / incomplete data)</div>
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-sm table-striped mb-0">
          <thead>
            <tr>
              <th>User</th><th>Wallet</th><th>Table</th><th>Sub ID</th><th>Missing</th><th>Actions</th>
            </tr>
          </thead>
          <tbody>
          <?php if (empty($issues)): ?>
            <tr><td colspan="6" class="text-center text-muted py-3">No issues 🎉</td></tr>
          <?php else: foreach ($issues as $i): ?>
            <tr>
              <td>#<?= esc($i['user_id']) ?></td>
              <td>#<?= esc($i['wallet_id']) ?></td>
              <td><?= esc($i['table'] ?? '-') ?></td>
              <td><?= esc($i['sub_id'] ?? '-') ?></td>
              <td><code><?= esc(implode(', ', $i['missing'] ?? [])) ?></code></td>
              <td class="d-flex gap-2">
                <?php if (!empty($i['edit_url'])): ?>
                  <a class="btn btn-outline-primary btn-sm" target="_blank" href="<?= esc($i['edit_url']) ?>">Open Edit Modal</a>
                <?php endif; ?>
                <button
                    class="btn btn-outline-secondary btn-sm email-user"
                    data-user="<?= esc($i['user_id']) ?>"
                    data-wallet="<?= esc($i['wallet_id']) ?>"
                >Email User</button>
              </td>
            </tr>
          <?php endforeach; endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
document.getElementById('rerun')?.addEventListener('click', async () => {
  try {
    const res = await fetch('<?= site_url('Management/Wallets/Reconcile') ?>', { headers: {'X-Requested-With': 'XMLHttpRequest'} });
    const json = await res.json();
    if (res.ok) location.reload();
    else alert(json.message || 'Re-run failed');
  } catch(e) { alert('Re-run failed'); }
});

document.querySelectorAll('.email-user').forEach(btn => {
  btn.addEventListener('click', async () => {
    const user = btn.dataset.user;
    const wallet = btn.dataset.wallet;
    if (!confirm('Send email to user #' + user + ' about wallet #' + wallet + '?')) return;
    try {
      const res = await fetch('<?= site_url('Management/Wallets/EmailUserAboutIssue') ?>/' + user + '/' + wallet, {
        method: 'POST',
        headers: {'X-Requested-With': 'XMLHttpRequest', 'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'message=' + encodeURIComponent('Please update your wallet details using the link in this email.')
      });
      const j = await res.json();
      if (res.ok) alert('Email sent. Link: ' + (j.edit_url || ''));
      else alert(j.message || 'Failed to send email');
    } catch(e) {
      alert('Failed to send email');
    }
  });
});
</script>
