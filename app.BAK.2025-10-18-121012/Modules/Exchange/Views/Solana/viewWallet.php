<?php
// Normalize wallet data
$dw           = (isset($cuSolanaDW) && is_array($cuSolanaDW)) ? $cuSolanaDW : [];
$status       = (int)   ($dw['status']        ?? 0);
$auto_staking = (int)   ($dw['auto_staking']  ?? 0);
$notifications= (int)   ($dw['notifications'] ?? 0);
$nickname     = (string)($dw['nickname']      ?? '');
$wallet_id    = (string)($dw['id']            ?? '');

// Prefer Base58 address (from controller/session/model). Fall back to any legacy fields.
$address      = (string)($dw['address']
                 ?? session('solana_public_key')
                 ?? '');

// For backward compatibility: if something downstream still expects `public_token`,
// feed it the Base58 address; DO NOT expose hex to the UI anymore.
$public_token = $address;
?>
<div class="modal-header">
  <h3 class="modal-title" id="useCoinModalLabel">View Your Solana Wallet</h3>
  <button class="close" type="button" aria-label="Close" data-dismiss="modal">
    <span aria-hidden="true">×</span>
  </button>
</div>

<div class="modal-body">
  <div class="nk-block nk-block-lg">
    <div class="nk-block pb-0">
      <div class="nk-block-head-content">
        <h4 class="nk-block-title title">Manage Wallet Settings</h4>
        <div class="nk-block-des">
          <p>You can style your settings form as needed.</p>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-inner">
        <form action="<?= site_url('Exchange/Solana/Edit-Wallet') ?>" class="form-horizontal gy-3" id="edit_solana_wallet" method="post">
          <?= csrf_field() ?>

          <input type="hidden" name="wallet_id" value="<?= esc($wallet_id) ?>">
          <!-- Keep legacy name but store Base58 address to avoid breaking old endpoints -->
          <input type="hidden" name="public_token" value="<?= esc($public_token) ?>">
          <!-- New explicit field if your controller prefers 'address' -->
          <input type="hidden" name="address" value="<?= esc($address) ?>">

          <div class="g-3 align-center row">
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-label" for="status-enable">Wallet Status</label>
                <span class="form-note">Enable or disable the wallet.</span>
              </div>
            </div>
            <div class="col-lg-8">
              <ul class="g-3 align-center custom-control-group flex-wrap">
                <li>
                  <div class="custom-control custom-radio">
                    <input value="1" name="wallet_status" type="radio" class="custom-control-input" id="status-enable" <?= $status ? 'checked' : '' ?>>
                    <label class="custom-control-label" for="status-enable">Enable</label>
                  </div>
                </li>
                <li>
                  <div class="custom-control custom-radio">
                    <input value="0" name="wallet_status" type="radio" class="custom-control-input" id="status-disable" <?= !$status ? 'checked' : '' ?>>
                    <label class="custom-control-label" for="status-disable">Disable</label>
                  </div>
                </li>
              </ul>
            </div>
          </div>

          <div class="g-3 align-center row">
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-label" for="auto-staking-enable">Auto-Staking</label>
                <span class="form-note">Enable or disable auto-staking.</span>
              </div>
            </div>
            <div class="col-lg-8">
              <ul class="g-3 align-center custom-control-group flex-wrap">
                <li>
                  <div class="custom-control custom-radio">
                    <input value="1" name="auto_staking" type="radio" class="custom-control-input" id="auto-staking-enable" <?= $auto_staking ? 'checked' : '' ?>>
                    <label class="custom-control-label" for="auto-staking-enable">Enable</label>
                  </div>
                </li>
                <li>
                  <div class="custom-control custom-radio">
                    <input value="0" name="auto_staking" type="radio" class="custom-control-input" id="auto-staking-disable" <?= !$auto_staking ? 'checked' : '' ?>>
                    <label class="custom-control-label" for="auto-staking-disable">Disable</label>
                  </div>
                </li>
              </ul>
            </div>
          </div>

          <div class="g-3 align-center row">
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-label" for="wallet-notifications-enable">Wallet Notifications</label>
                <span class="form-note">Enable or disable wallet notifications.</span>
              </div>
            </div>
            <div class="col-lg-8">
              <ul class="g-3 align-center custom-control-group flex-wrap">
                <li>
                  <div class="custom-control custom-radio">
                    <input value="1" name="wallet_notifications" type="radio" class="custom-control-input" id="wallet-notifications-enable" <?= $notifications ? 'checked' : '' ?>>
                    <label class="custom-control-label" for="wallet-notifications-enable">Enable</label>
                  </div>
                </li>
                <li>
                  <div class="custom-control custom-radio">
                    <input value="0" name="wallet_notifications" type="radio" class="custom-control-input" id="wallet-notifications-disable" <?= !$notifications ? 'checked' : '' ?>>
                    <label class="custom-control-label" for="wallet-notifications-disable">Disable</label>
                  </div>
                </li>
              </ul>
            </div>
          </div>

          <div class="g-3 align-center row">
            <div class="col-lg-4">
              <div class="form-group">
                <label class="form-label" for="wallet-name">Wallet Name</label>
              </div>
            </div>
            <div class="col-lg-8">
              <div class="form-group">
                <div class="form-control-wrap">
                  <input name="wallet_name" id="wallet-name" class="form-control" value="<?= esc($nickname) ?>">
                </div>
              </div>
            </div>
          </div>

          <div class="g-3 align-center row">
            <div class="col-lg-4">
              <div class="form-group">
                <?php $address = (string) ($address ?? ($cuSolanaDW['address'] ?? '')); ?>
                <label class="form-label" for="wallet-address">
                  Wallet Address
                  <?php if ($address): ?>
                    <a href="#" onclick="copyAddressToClipboard('<?= esc($address) ?>')">
                      <em class="icon ni ni-copy"></em>
                    </a>
                  <?php endif; ?>
                </label>
              </div>
            </div>
            <div class="col-lg-8">
              <div class="form-group">
                <div class="form-control-wrap">
                  <input value="<?= esc($address ?: '—') ?>" class="form-control" id="wallet-address" disabled>
                </div>
              </div>
            </div>
          </div>


          <div class="g-3 row">
            <div class="col-lg-8 offset-lg-5">
              <div class="form-group mt-2">
                <a href="<?= site_url('Exchange/Solana/Wallet/Delete/' . rawurlencode($wallet_id)) ?>"
                   class="btn btn-lg btn-danger text-white"
                   data-wallet-id="<?= esc($wallet_id) ?>"
                   id="disconnectSolanaWalletBtn">Disconnect</a>
                <button class="btn btn-lg btn-primary" type="submit" id="updateSolanaWalletBtn">Save</button>
              </div>
            </div>
          </div>
        </form>

        <?php if (function_exists('validation_errors') && validation_errors()): ?>
          <div class="alert alert-error fade in"><?= validation_errors() ?></div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
document.addEventListener('DOMContentLoaded', function () {
  const form          = document.querySelector('#edit_solana_wallet');
  const saveBtn       = document.querySelector('#updateSolanaWalletBtn');
  const disconnectBtn = document.querySelector('#disconnectSolanaWalletBtn');

  if (saveBtn && form) {
    saveBtn.addEventListener('click', function (e) {
      e.preventDefault();
      const formData = new FormData(form);
      fetch("<?= site_url('Exchange/Solana/Edit-Wallet') ?>", {
        method: "POST",
        body: formData,
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
      })
      .then(r => r.json())
      .then(data => {
        if (data && (data.success || data.status === 'success')) {
          alert("Wallet updated successfully!");
        } else {
          alert((data && (data.message || data.error)) || "Failed to update the wallet.");
        }
      })
      .catch(err => {
        console.error("Error:", err);
        alert("An error occurred while updating the wallet.");
      });
    });
  }

  if (disconnectBtn) {
    disconnectBtn.addEventListener('click', function (e) {
      e.preventDefault();
      const walletID = this.getAttribute('data-wallet-id') || '';
      if (!walletID) {
        alert("No wallet ID found.");
        return;
      }
      if (confirm("Are you sure you want to disconnect your wallet?")) {
        window.location.href = "<?= site_url('Exchange/Solana/Wallet/Delete/') ?>" + encodeURIComponent(walletID);
      }
    });
  }
});
</script>
