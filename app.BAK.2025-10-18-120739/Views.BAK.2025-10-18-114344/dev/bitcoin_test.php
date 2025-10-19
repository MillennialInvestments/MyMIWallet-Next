<?= $this->extend('themes/dashboard/layouts/index'); ?>

<?= $this->section('content'); ?>
<div class="container py-4">
  <div class="row">
    <div class="col-lg-8">
      <h3 class="mb-3">BitcoinJS Smoke Test</h3>

      <div class="card mb-3">
        <div class="card-body">
          <p class="mb-2">
            Adapter status:
            <span id="adapterStatus" class="badge bg-secondary">Checking…</span>
          </p>
          <button class="btn btn-outline-primary btn-sm" onclick="checkAdapter()">Re-check Adapter</button>
        </div>
      </div>

      <div class="card">
        <div class="card-body">
          <label class="form-label">Testnet WIF (for demo only)</label>
          <input id="wif" type="text" class="form-control mb-2" placeholder="Enter a TESTNET WIF (do not use real keys)">
          <div class="d-flex gap-2">
            <button class="btn btn-primary" onclick="testDerive()">Derive P2WPKH</button>
            <button class="btn btn-outline-secondary" onclick="fillExample()">Fill Example WIF</button>
          </div>
          <pre id="out" class="mt-3 p-2 bg-light border rounded small" style="min-height:120px;"></pre>
        </div>
      </div>
    </div>
  </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
function checkAdapter() {
  const ok = (window.MyMIBitcoin && typeof window.MyMIBitcoin.validateAddress === 'function');
  const el = document.getElementById('adapterStatus');
  el.textContent = ok ? 'OK' : 'NOT LOADED';
  el.className = 'badge ' + (ok ? 'bg-success' : 'bg-danger');
}

function testDerive() {
  const wif = document.getElementById('wif').value.trim();
  const out = document.getElementById('out');
  try {
    if (!window.MyMIBitcoin) throw new Error('Adapter not loaded');
    const info = window.MyMIBitcoin.deriveP2WPKHAddressFromWIF(wif, 'testnet');
    out.textContent = JSON.stringify(info, null, 2);
  } catch (e) {
    out.textContent = 'Error: ' + (e && e.message ? e.message : e);
  }
}

function fillExample() {
  // This is a harmless placeholder string; replace with any known TESTNET WIF for your manual test.
  document.getElementById('wif').value = '';
}

document.addEventListener('DOMContentLoaded', checkAdapter);
</script>
<?= $this->endSection(); ?>
