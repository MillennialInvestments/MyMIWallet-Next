<div class="card card-bordered">
  <div class="card-inner">
    <div class="card-title-group align-start mb-3">
      <div class="card-title">
        <h5 class="title">Robinhood Crypto API — Signing Test</h5>
        <p class="text-muted">Generate an Ed25519 key pair, build the message, and sign it.</p>
      </div>
    </div>

    <div class="row g-3">
      <div class="col-md-6">
        <button id="btnGenKeys" class="btn btn-primary">Generate Key Pair (seed + public)</button>
        <div class="mt-2">
          <label class="form-label">Private Key (Base64 seed, keep secret)</label>
          <textarea id="privateKey" class="form-control" rows="2" placeholder="base64 seed (32 bytes)"></textarea>
          <label class="form-label mt-2">Public Key (Base64)</label>
          <textarea id="publicKey" class="form-control" rows="2" placeholder="base64 public"></textarea>
        </div>
      </div>

      <div class="col-md-6">
        <label class="form-label">API Key (x-api-key)</label>
        <input id="apiKey" class="form-control" placeholder="rh-api-xxxxxxxx-....">

        <label class="form-label mt-2">Path (include trailing slash)</label>
        <input id="path" class="form-control" value="/api/v1/crypto/trading/orders/">

        <label class="form-label mt-2">HTTP Method</label>
        <select id="method" class="form-select">
          <option>POST</option>
          <option>GET</option>
          <option>DELETE</option>
          <option>PUT</option>
        </select>

        <label class="form-label mt-2">Timestamp (UNIX seconds)</label>
        <div class="d-flex">
          <input id="timestamp" class="form-control me-2" placeholder="<?= time() ?>">
          <button id="btnNow" class="btn btn-outline-secondary">Now</button>
        </div>

        <label class="form-label mt-2">Body (minified JSON string; leave blank for GET)</label>
        <textarea id="body" class="form-control" rows="4">
{"client_order_id":"131de903-5a9c-4260-abc1-28d562a5dcf0","side":"buy","type":"market","symbol":"BTC-USD","market_order_config":{"asset_quantity":"0.1"}}
        </textarea>
      </div>
    </div>

    <hr class="my-4"/>

    <div class="d-flex gap-2">
      <button id="btnSign" class="btn btn-success">Sign & Build Headers</button>
      <button id="btnClear" class="btn btn-light">Clear Output</button>
    </div>

    <div class="mt-3">
      <label class="form-label">Message (api_key + timestamp + path + method + body)</label>
      <pre id="message" class="form-control" style="height:120px; overflow:auto;"></pre>

      <label class="form-label mt-2">x-signature (Base64)</label>
      <input id="signature" class="form-control">

      <label class="form-label mt-2">Headers</label>
      <pre id="headers" class="form-control" style="height:120px; overflow:auto;"></pre>
    </div>
  </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
(function() {
  const r = (p) => "<?= site_url('API/Alerts/') ?>" + p;

  const el = (id) => document.getElementById(id);
  const privateKey = el('privateKey');
  const publicKey  = el('publicKey');
  const apiKey     = el('apiKey');
  const path       = el('path');
  const method     = el('method');
  const timestamp  = el('timestamp');
  const body       = el('body');
  const messageOut = el('message');
  const signature  = el('signature');
  const headersOut = el('headers');

  el('btnGenKeys').addEventListener('click', async () => {
    try {
      const res = await fetch(r('gen-keys'), { method: 'POST' });
      const js  = await res.json();
      if (js.status === 'success') {
        privateKey.value = js.data.private_key_b64;
        publicKey.value  = js.data.public_key_b64;
      } else {
        alert('Key gen failed: ' + (js.message || 'Unknown error'));
      }
    } catch (e) {
      alert('Key gen error: ' + e.message);
    }
  });

  el('btnNow').addEventListener('click', () => {
    timestamp.value = Math.floor(Date.now()/1000).toString();
  });

  el('btnSign').addEventListener('click', async () => {
    const payload = {
      api_key: apiKey.value.trim(),
      path: path.value.trim(),
      method: method.value.trim().toUpperCase(),
      timestamp: timestamp.value.trim() || Math.floor(Date.now()/1000).toString(),
      body: (method.value.trim().toUpperCase() === 'GET') ? "" : body.value.trim(),
      private_key_b64: privateKey.value.trim()
    };
    try {
      const res = await fetch(r('sign'), {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify(payload),
      });
      const js = await res.json();
      if (js.status === 'success') {
        messageOut.textContent = js.data.message;
        signature.value = js.data.signature;
        headersOut.textContent = JSON.stringify(js.data.headers, null, 2);
      } else {
        alert('Sign failed: ' + (js.message || 'Unknown error'));
      }
    } catch (e) {
      alert('Sign error: ' + e.message);
    }
  });

  el('btnClear').addEventListener('click', () => {
    messageOut.textContent = '';
    signature.value = '';
    headersOut.textContent = '';
  });
})();
</script>
