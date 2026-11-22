<?php
/**
 * MyMI Secure Transfer page. All encryption happens in this browser
 * (assets/js/secure-transfer/*.js); the server receives ciphertext only.
 */
helper('csp');
$st = $secureTransfer ?? [];
$config = [
    'domain' => (string) ($st['domain'] ?? 'mymiwallet.com'),
    'maxBytes' => (int) ($st['maxBytes'] ?? 0),
    'maxDays' => (int) ($st['maxDays'] ?? 30),
    'maxRecipients' => (int) ($st['maxRecipients'] ?? 10),
    'base' => rtrim(site_url('SecureTransfer'), '/'),
];
?>
<div class="nk-block" id="mst1-app" data-config="<?= esc(json_encode($config), 'attr') ?>">
    <div class="nk-block-head">
        <h3 class="nk-block-title">Secure File Transfer</h3>
        <p class="text-soft">Send a file to another wallet. It is encrypted on this device before it leaves, and only the recipient's device can open it. MyMI stores the locked file but cannot read it.</p>
    </div>

    <div class="card card-bordered mb-3">
        <div class="card-inner">
            <h5>1. Connect your wallet</h5>
            <p class="small text-soft">Your wallet signs a short statement that links it to a transfer key kept on this device. Signing costs nothing and sends no transaction.</p>
            <div class="d-flex flex-wrap gap-2 align-items-center">
                <button type="button" class="btn btn-primary" id="mst1-connect" data-mst1-pending="1">Connect wallet</button>
                <span id="mst1-wallet" class="text-monospace small"></span>
            </div>
            <div id="mst1-device" class="small mt-2 text-soft">Loading encryption…</div>
        </div>
    </div>

    <div class="card card-bordered mb-3">
        <div class="card-inner">
            <h5>2. Send a file</h5>
            <div class="row g-2">
                <div class="col-md-6">
                    <label class="form-label" for="mst1-to">Recipient wallet addresses (one per line)</label>
                    <textarea class="form-control text-monospace" id="mst1-to" rows="3" autocomplete="off"></textarea>
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="mst1-file">File</label>
                    <input class="form-control" type="file" id="mst1-file">
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="mst1-days">Available for (days)</label>
                    <input class="form-control" type="number" id="mst1-days" min="1" value="7">
                </div>
            </div>
            <button type="button" class="btn btn-success mt-3" id="mst1-send" disabled>Encrypt and send</button>
            <div id="mst1-send-status" class="small mt-2" role="status"></div>
        </div>
    </div>

    <div class="card card-bordered mb-3">
        <div class="card-inner">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">3. Files for you</h5>
                <button type="button" class="btn btn-sm btn-outline-primary" id="mst1-refresh">Refresh</button>
            </div>
            <div class="table-responsive mt-2">
                <table class="table table-sm">
                    <thead><tr><th>From</th><th>Size</th><th>Expires</th><th></th></tr></thead>
                    <tbody id="mst1-inbox"><tr><td colspan="4" class="text-soft">Connect your wallet to see files.</td></tr></tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card card-bordered">
        <div class="card-inner">
            <h5>Files you sent</h5>
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead><tr><th>To</th><th>Size</th><th>Expires</th><th></th></tr></thead>
                    <tbody id="mst1-outbox"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script<?= script_nonce_attr() ?> src="<?= base_url('assets/vendor/tweetnacl/nacl-fast.min.js') ?>"></script>
<script<?= script_nonce_attr() ?> src="<?= base_url('assets/js/secure-transfer/mst1.js') ?>"></script>
<script<?= script_nonce_attr() ?> src="<?= base_url('assets/js/secure-transfer/secure-transfer-ui.js') ?>"></script>
<script<?= script_nonce_attr() ?>>
window.addEventListener('load', function () {
  var b = document.getElementById('mst1-connect');
  var d = document.getElementById('mst1-device');
  if (b && d && b.hasAttribute('data-mst1-pending')) {
    d.textContent = 'The encryption scripts did not load from <?= esc(base_url('assets/js/secure-transfer/'), 'js') ?>. Reload the page; if it keeps happening, report it to support.';
    d.className = 'small mt-2 text-danger';
  }
});
</script>
