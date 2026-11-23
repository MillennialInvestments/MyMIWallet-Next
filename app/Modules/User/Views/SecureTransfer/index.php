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
            <div class="row g-2 align-items-center">
                <div class="col-auto">
                    <button type="button" class="btn btn-primary" id="mst1-connect" data-mst1-pending="1">Connect wallet</button>
                </div>
                <div class="col-auto small text-soft">or, without a browser wallet,</div>
                <div class="col">
                    <div class="input-group">
                        <input type="text" class="form-control font-monospace" id="mst1-manual-wallet" placeholder="Enter your Solana wallet address" autocomplete="off" spellcheck="false" aria-label="Solana wallet address">
                        <button type="button" class="btn btn-outline-primary" id="mst1-manual-use">Use this wallet</button>
                    </div>
                </div>
            </div>
            <div class="small mt-2">Linked wallet: <span id="mst1-wallet" class="font-monospace">none yet</span></div>
            <div id="mst1-device" class="small mt-2 text-soft">Loading encryption…</div>
            <div id="mst1-manual-sign" class="border rounded p-3 mt-3 d-none">
                <p class="small mb-2"><strong>Sign this statement in your wallet app</strong> (Solflare, Phantom or any Solana wallet with "Sign message"), then paste the signature below. Signing is free and sends nothing. We check the signature here before using it, so a typed address alone can never link a wallet you don't own.</p>
                <pre id="mst1-manual-statement" class="small bg-light p-2 mb-2" style="white-space: pre-wrap;"></pre>
                <button type="button" class="btn btn-sm btn-outline-secondary mb-2" id="mst1-manual-copy">Copy statement</button>
                <textarea class="form-control font-monospace" id="mst1-manual-sig" rows="2" placeholder="Paste the signature (base58, base64 or hex)" spellcheck="false"></textarea>
                <div id="mst1-manual-error" class="small mt-2"></div>
                <div class="mt-2 d-flex gap-2">
                    <button type="button" class="btn btn-sm btn-primary" id="mst1-manual-ok">Submit signature</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary" id="mst1-manual-cancel">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-bordered mb-3">
        <div class="card-inner">
            <h5>2. Send a file</h5>
            <div class="form-group mb-3">
                <label class="form-label" for="mst1-to">Recipient wallet addresses</label>
                <div class="form-note mb-1">One Solana address per line. Each recipient must have opened this page once.</div>
                <textarea class="form-control font-monospace" id="mst1-to" rows="3" autocomplete="off" spellcheck="false" placeholder="e.g. 7xKX...q9Fh"></textarea>
            </div>
            <div class="row g-3 align-items-end">
                <div class="col-sm-8">
                    <label class="form-label d-block" for="mst1-file">File</label>
                    <input type="file" id="mst1-file" class="d-none" hidden>
                    <div class="d-flex align-items-center gap-2">
                        <label for="mst1-file" class="btn btn-outline-primary mb-0">Choose file</label>
                        <span id="mst1-file-name" class="small text-soft text-truncate">No file chosen</span>
                    </div>
                </div>
                <div class="col-sm-4">
                    <label class="form-label" for="mst1-days">Available for (days)</label>
                    <input class="form-control" type="number" id="mst1-days" min="1" value="7">
                </div>
            </div>
            <button type="button" class="btn btn-primary mt-3" id="mst1-send" disabled>Encrypt and send</button>
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
<script<?= script_nonce_attr() ?>>
window.addEventListener('error', function (e) {
  var d = document.getElementById('mst1-device');
  if (d && e && e.message) { d.textContent = 'Page error: ' + e.message + (e.filename ? ' (' + e.filename.split('/').pop().split('?')[0] + ':' + e.lineno + ')' : ''); d.className = 'small mt-2 text-danger'; }
});
</script>
<script<?= script_nonce_attr() ?> src="<?= base_url('assets/vendor/tweetnacl/nacl-fast.min.js') ?>?v=<?= is_file(FCPATH . 'assets/vendor/tweetnacl/nacl-fast.min.js') ? filemtime(FCPATH . 'assets/vendor/tweetnacl/nacl-fast.min.js') : '1' ?>"></script>
<script<?= script_nonce_attr() ?> src="<?= base_url('assets/js/secure-transfer/mst1.js') ?>?v=<?= is_file(FCPATH . 'assets/js/secure-transfer/mst1.js') ? filemtime(FCPATH . 'assets/js/secure-transfer/mst1.js') : '1' ?>"></script>
<script<?= script_nonce_attr() ?> src="<?= base_url('assets/js/secure-transfer/secure-transfer-ui.js') ?>?v=<?= is_file(FCPATH . 'assets/js/secure-transfer/secure-transfer-ui.js') ? filemtime(FCPATH . 'assets/js/secure-transfer/secure-transfer-ui.js') : '1' ?>"></script>
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
