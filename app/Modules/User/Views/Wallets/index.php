<?php
/**
 * Wallets landing page.
 * Show exactly ONE category per request (default "Checking"/financial).
 * This keeps /Wallets as light as /Wallets/Checking.
 *
 * Expects: $siteSettings, $uri, $cuID
 */

$segment = $uri->getSegment(2) ?: 'Checking';
$wasEmpty  = ($uri->getSegment(2) === null || $uri->getSegment(2) === ''); // add this

$map = [
  ''            => 'financial',
  'Checking'    => 'financial',
  'Credit'      => 'credit',
  'Crypto'      => 'crypto',
  'Debt'        => 'debt',
  'Investments' => 'investment',
];

$walletCategory = $map[$segment] ?? 'financial';

$tabs = [
  ['label'=>'Checking',   'cat'=>'financial',  'href'=>site_url('Wallets/Checking')],
  ['label'=>'Credit',     'cat'=>'credit',     'href'=>site_url('Wallets/Credit')],
  ['label'=>'Crypto',     'cat'=>'crypto',     'href'=>site_url('Wallets/Crypto')],
  ['label'=>'Debt',       'cat'=>'debt',       'href'=>site_url('Wallets/Debt')],
  ['label'=>'Investments','cat'=>'investment', 'href'=>site_url('Wallets/Investments')],
];

// helper
function cat_title($c){
  return [
    'financial'=>'Checking / Bank',
    'credit'=>'Credit',
    'crypto'=>'Crypto',
    'debt'=>'Debt',
    'investment'=>'Investments',
  ][$c] ?? ucfirst($c);
}
?>

<div class="nk-block">
  <div class="nk-block-head">
    <div class="nk-block-between g-2">
      <div class="nk-block-head-content">
        <h4 class="nk-block-title">Wallets</h4>
        <div class="nk-block-des">
          <p class="text-muted mb-0">
            Manage your <?= esc(cat_title($walletCategory)) ?> wallets & integrations.
          </p>
        </div>
      </div>
      <div class="nk-block-head-content"></div>
    </div>
  </div>

  <!-- Category tabs -->
  <ul class="nav nav-tabs mt-2 mb-3">
    <?php foreach ($tabs as $t):
      $active = ($t['cat'] === $walletCategory) ? 'active' : ''; ?>
      <li class="nav-item">
        <a class="nav-link <?= $active ?>" href="<?= esc($t['href']) ?>">
          <?= esc($t['label']) ?>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>

  <!-- Single-category body (NO render-all) -->
  <div id="walletSection-<?= esc($walletCategory) ?>">
    <div class="d-flex align-items-center justify-content-between mb-2">
      <h5 class="mb-0"><?= esc(cat_title($walletCategory)) ?></h5>
    </div>
    <?= view('Wallets/types/wallets_block', [
          'walletCategory' => $walletCategory,
          'siteSettings'   => $siteSettings,
          'cuID'           => $cuID,
          'dom'            => $walletCategory, // DOM-safe prefix for IDs
    ]) ?>
  </div>
</div>

<!-- Delete Modal (shared legacy fallback) -->
<div class="modal fade" id="deleteWalletModal" tabindex="-1" aria-labelledby="deleteWalletModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="deleteWalletModalLabel">Delete This Wallet?</h3>
        <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete <strong id="walletName">this wallet</strong>?</p>
      </div>
      <div class="modal-footer">
        <a class="btn btn-success" href="#" id="confirmDeleteButton">Yes</a>
        <button class="btn btn-danger" data-bs-dismiss="modal" type="button">No</button>
      </div>
    </div>
  </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
  // Backward-compatible delete modal hook (legacy route)
  function openDeleteModal(event) {
    event.preventDefault();
    const el = event.currentTarget;
    const walletId   = el.getAttribute('data-id');
    const walletName = el.getAttribute('data-name') || 'Unknown Wallet';
    const accountType= el.getAttribute('data-type') || 'Wallet';
    const btn = document.getElementById('confirmDeleteButton');
    if (btn && walletId) {
      btn.setAttribute('href', `/index.php/Wallets/Delete/${accountType}/${walletId}`);
    }
    const nameEl = document.getElementById('walletName');
    if (nameEl) nameEl.textContent = walletName;
    new bootstrap.Modal(document.getElementById('deleteWalletModal')).show();
  }
</script>
