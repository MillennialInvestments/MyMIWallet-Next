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
                <a id="confirmDeleteButton" class="btn btn-success" href="#" data-delete-url="#">Yes</a>
                <button class="btn btn-danger" data-bs-dismiss="modal" type="button">No</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal JavaScript Handler -->
<script <?= $nonce['script'] ?? '' ?>>
function openDeleteModal(event) {
    event.preventDefault();

    const trigger = event.currentTarget;

    const accountType = trigger.getAttribute('data-type') || 'Bank';
    const walletId    = trigger.getAttribute('data-wallet-id') || trigger.getAttribute('data-id') || '';
    const accountId   = trigger.getAttribute('data-account-id') || '';
    const walletName  = trigger.getAttribute('data-name') || 'Wallet';

    const confirmDeleteButton = document.getElementById('confirmDeleteButton');
    const walletNameElement   = document.getElementById('walletName');

    if (walletNameElement) {
        walletNameElement.textContent = walletName;
    }

    if (!walletId || !confirmDeleteButton) {
        console.error('Delete modal missing wallet ID or confirm button.', {
            accountType,
            walletId,
            accountId,
            walletName
        });
        return;
    }

    const deleteUrl = "<?= site_url('Wallets/Delete') ?>/"
        + encodeURIComponent(accountType)
        + "/"
        + encodeURIComponent(walletId)
        + (accountId ? "?account_id=" + encodeURIComponent(accountId) : "");

    confirmDeleteButton.setAttribute('href', deleteUrl);
    confirmDeleteButton.setAttribute('data-delete-url', deleteUrl);

    console.log('Wallet delete prepared:', {
        accountType,
        walletId,
        accountId,
        walletName,
        deleteUrl
    });

    const modalElement = document.getElementById('deleteWalletModal');

    if (!modalElement) {
        console.error('Delete Wallet Modal element not found.');
        return;
    }

    if (window.bootstrap && bootstrap.Modal) {
        const existingModal = bootstrap.Modal.getInstance(modalElement);
        const deleteWalletModal = existingModal || new bootstrap.Modal(modalElement, {});
        deleteWalletModal.show();
        return;
    }

    console.error('Bootstrap 5 modal runtime not detected.');

    if (confirm('Are you sure you want to delete this wallet?')) {
        window.location.href = deleteUrl;
    }
}

document.addEventListener('DOMContentLoaded', function () {
    const confirmDeleteButton = document.getElementById('confirmDeleteButton');

    if (!confirmDeleteButton) {
        return;
    }

    confirmDeleteButton.addEventListener('click', function (event) {
        event.preventDefault();

        const deleteUrl = confirmDeleteButton.getAttribute('data-delete-url')
            || confirmDeleteButton.getAttribute('href');

        if (!deleteUrl || deleteUrl === '#') {
            alert('Delete URL is missing.');
            return;
        }

        const originalText = confirmDeleteButton.textContent;

        confirmDeleteButton.classList.add('disabled');
        confirmDeleteButton.setAttribute('aria-disabled', 'true');
        confirmDeleteButton.textContent = 'Deleting...';

        fetch(deleteUrl, {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
                <?php if (function_exists('csrf_header') && function_exists('csrf_hash')): ?>
                , '<?= csrf_header() ?>': '<?= csrf_hash() ?>'
                <?php endif; ?>
            }
        })
        .then(function (response) {
            return response.json().then(function (json) {
                return {
                    ok: response.ok,
                    status: response.status,
                    json: json
                };
            });
        })
        .then(function (result) {
            if (!result.ok || !result.json || result.json.status === 'error') {
                console.error('Wallet delete failed:', result);
                alert((result.json && result.json.message) ? result.json.message : 'Wallet delete failed.');

                confirmDeleteButton.classList.remove('disabled');
                confirmDeleteButton.removeAttribute('aria-disabled');
                confirmDeleteButton.textContent = originalText || 'Yes';
                return;
            }

            window.location.reload();
        })
        .catch(function (error) {
            console.error('Wallet delete request failed:', error);
            alert('Unable to delete wallet right now.');

            confirmDeleteButton.classList.remove('disabled');
            confirmDeleteButton.removeAttribute('aria-disabled');
            confirmDeleteButton.textContent = originalText || 'Yes';
        });
    });
});
</script>
