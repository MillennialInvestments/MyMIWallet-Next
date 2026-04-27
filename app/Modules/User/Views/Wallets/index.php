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
  'All'         => 'financial',
  'Bank'        => 'financial',
  'Banking'     => 'financial',
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

$setupStatus = $setupStatus ?? [];
$setupPrefs = $setupPrefs ?? [];
$showSetupBanner = ! empty($setupStatus)
  && ! ($setupStatus['overall_complete'] ?? false)
  && ! ($setupPrefs['dismiss_all'] ?? false)
  && ! ($setupPrefs['dismiss_wallets'] ?? false)
  && ($setupStatus['missing']['wallets'] ?? false);
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

  <?php if ($showSetupBanner): ?>
  <div class="alert alert-info d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4" data-setup-banner="wallets">
    <div>
      <strong>Continue setup</strong>
      <div class="small text-muted">Add at least one wallet to connect your accounts.</div>
    </div>
    <button class="btn btn-primary dynamicModalLoader" data-formtype="Setup" data-endpoint="continueSetup" data-accountid="wallets">Continue setup</button>
  </div>
  <?php endif; ?>

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
    <?= view('UserModule\Views\Wallets\types\wallets_block', [
          'walletCategory' => $walletCategory,
          'siteSettings'   => $siteSettings,
          'cuID'           => $cuID,
          'dom'            => $walletCategory, // DOM-safe prefix for IDs
    ]) ?>
  </div>
</div>

<!-- Delete Wallet Modal -->
<div class="modal fade" id="deleteWalletModal" tabindex="-1" aria-labelledby="deleteWalletModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="deleteWalletModalLabel">Delete This Wallet?</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <p class="mb-0">
                    Are you sure you want to delete <strong id="walletName">this wallet</strong>?
                </p>
                <p class="small text-muted mt-2 mb-0">
                    This will remove the wallet from your active account list.
                </p>
            </div>

            <div class="modal-footer">
                <a id="confirmDeleteButton" class="btn btn-success" href="#">Yes</a>
                <button class="btn btn-danger" data-bs-dismiss="modal" type="button">No</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal JavaScript Handler -->
<script>
    function openDeleteModal(event) {
        event.preventDefault();

        const element = event.currentTarget;

        const accountType = element.getAttribute('data-type') || '';
        const walletName  = element.getAttribute('data-name') || 'Unknown Wallet';

        /*
         * data-wallet-id = parent bf_users_wallet.id when known.
         * data-account-id = child/subsidiary table id when known.
         * data-id remains a backward-compatible fallback.
         */
        const walletId  = element.getAttribute('data-wallet-id') || element.getAttribute('data-id') || '';
        const accountId = element.getAttribute('data-account-id') || '';

        console.log('delete accountType:', accountType);
        console.log('delete walletId:', walletId);
        console.log('delete accountId:', accountId);
        console.log('delete walletName:', walletName);

        if (!walletId || !accountType) {
            console.error('Missing walletId or accountType. Cannot proceed with delete modal.');
            return;
        }

        const confirmDeleteButton = document.getElementById('confirmDeleteButton');

        if (confirmDeleteButton) {
            let deleteUrl = `<?= site_url('Wallets/Delete') ?>/${encodeURIComponent(accountType)}/${encodeURIComponent(walletId)}`;

            if (accountId) {
                deleteUrl += `?account_id=${encodeURIComponent(accountId)}`;
            }

            confirmDeleteButton.setAttribute('href', deleteUrl);
        }

        const walletNameElement = document.getElementById('walletName');

        if (walletNameElement) {
            walletNameElement.textContent = walletName;
        }

        const deleteWalletModalElement = document.getElementById('deleteWalletModal');

        if (deleteWalletModalElement && window.bootstrap && bootstrap.Modal) {
            const deleteWalletModal = new bootstrap.Modal(deleteWalletModalElement, {});
            deleteWalletModal.show();
        } else {
            console.error('Delete Wallet Modal element or Bootstrap 5 runtime not found.');
        }
    }
</script>