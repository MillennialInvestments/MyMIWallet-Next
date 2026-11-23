/*
 * MyMI Secure Transfer page logic. Uses an injected Solana wallet (Phantom,
 * Solflare or any wallet exposing connect() and signMessage()). The device
 * transfer key is kept in this browser's localStorage for this site; it never
 * leaves the device. Clearing site data removes it, so the page offers a backup.
 */
(function () {
  'use strict';
  var root = document.getElementById('mst1-app');
  if (!root) return;
  if (!window.MST1 || !window.nacl || !window.crypto || !window.crypto.subtle) {
    var warn = document.getElementById('mst1-device');
    if (warn) {
      warn.textContent = !window.crypto || !window.crypto.subtle
        ? 'This browser cannot encrypt files here. Open the page over HTTPS in a current browser.'
        : 'The encryption scripts did not load. Reload the page; if it keeps happening, report it to support.';
      warn.className = 'small mt-2 text-danger';
    }
    var pending = document.getElementById('mst1-connect');
    if (pending) pending.removeAttribute('data-mst1-pending');
    return;
  }
  var cfg = JSON.parse(root.getAttribute('data-config') || '{}');
  var enc = new TextEncoder();
  var state = { wallet: null, provider: null, device: null };

  function $(id) { return document.getElementById(id); }
  function text(el, msg, cls) { el.textContent = msg; el.className = 'small mt-2 ' + (cls || ''); }
  function short(w) { return w.length > 12 ? w.slice(0, 4) + '…' + w.slice(-4) : w; }
  function size(n) { return n > 1048576 ? (n / 1048576).toFixed(1) + ' MB' : Math.ceil(n / 1024) + ' KB'; }
  function when(ts) { return new Date(ts * 1000).toLocaleString(); }

  function csrfHeaders() {
    var h = {};
    var name = document.querySelector('meta[name="csrf-header"]');
    var token = document.querySelector('meta[name="csrf-token"]') || document.querySelector('meta[name="csrf_token_value"]');
    if (token) h[name ? name.content : 'X-CSRF-TOKEN'] = token.content;
    h['X-Requested-With'] = 'XMLHttpRequest';
    return h;
  }

  async function api(path, opts) {
    opts = opts || {};
    var headers = Object.assign(csrfHeaders(), opts.headers || {});
    var res = await fetch(cfg.base + path, { method: opts.method || 'GET', headers: headers, body: opts.body, credentials: 'same-origin' });
    var newHash = res.headers.get('X-CSRF-Token-Hash');
    var meta = document.querySelector('meta[name="csrf-token"]');
    if (newHash && meta) meta.content = newHash;
    if (opts.raw) {
      if (!res.ok) throw new Error('download_failed_' + res.status);
      return new Uint8Array(await res.arrayBuffer());
    }
    var data = await res.json().catch(function () { return { ok: false, error: 'bad_response_' + res.status }; });
    if (!data.ok) throw new Error(data.error || 'request_failed');
    return data;
  }

  function postJson(path, body) {
    return api(path, { method: 'POST', body: JSON.stringify(body), headers: { 'Content-Type': 'application/json' } });
  }

  function provider() {
    return (window.phantom && window.phantom.solana) || window.solflare || window.solana || null;
  }

  async function signText(message) {
    var out = await state.provider.signMessage(enc.encode(message), 'utf8');
    var sig = out && out.signature ? out.signature : out;
    return MST1.b64(new Uint8Array(sig));
  }

  function storageKey(wallet) { return 'mst1.device.' + wallet; }

  function loadDevice(wallet) {
    try {
      var raw = JSON.parse(localStorage.getItem(storageKey(wallet)) || 'null');
      if (raw && raw.secretKey) {
        var kp = nacl.box.keyPair.fromSecretKey(MST1.unb64(raw.secretKey));
        return kp;
      }
    } catch (e) { /* fall through to a new key */ }
    return null;
  }

  function saveDevice(wallet, kp) {
    localStorage.setItem(storageKey(wallet), JSON.stringify({ v: 1, secretKey: MST1.b64(kp.secretKey) }));
  }

  async function connect() {
    var p = provider();
    var status = $('mst1-device');
    if (!p) { text(status, 'No Solana wallet found in this browser. Install Phantom or Solflare, or enter your wallet address instead.', 'text-danger'); return; }
    text(status, 'Waiting for your wallet. If nothing opens, click the wallet icon in your browser toolbar and unlock it.');
    var resp = await p.connect();
    var pk = (resp && resp.publicKey) || p.publicKey;
    await link(p, pk.toBase58 ? pk.toBase58() : String(pk));
  }

  /* Decode a pasted Ed25519 signature: base58 (most wallets), base64 or hex. */
  function decodeSignature(raw) {
    var v = String(raw || '').replace(/\s+/g, '');
    var out = null;
    if (/^[0-9a-fA-F]{128}$/.test(v)) {
      out = new Uint8Array(64);
      for (var i = 0; i < 64; i++) out[i] = parseInt(v.substr(i * 2, 2), 16);
      return out;
    }
    try { out = MST1.base58Decode(v); } catch (e) { out = null; }
    if (out && out.length === 64) return out;
    try { out = MST1.unb64(v); } catch (e) { out = null; }
    return out && out.length === 64 ? out : null;
  }

  /* A wallet with no browser extension: the user signs each statement in their own wallet app and pastes the signature. */
  function manualProvider(wallet) {
    return {
      manual: true,
      signMessage: function (bytes) {
        var message = new TextDecoder().decode(bytes);
        var panel = $('mst1-manual-sign');
        $('mst1-manual-statement').textContent = message;
        $('mst1-manual-sig').value = '';
        text($('mst1-manual-error'), '');
        panel.classList.remove('d-none');
        panel.scrollIntoView({ behavior: 'smooth', block: 'center' });
        return new Promise(function (resolve, reject) {
          function done() { $('mst1-manual-ok').onclick = null; $('mst1-manual-cancel').onclick = null; panel.classList.add('d-none'); }
          $('mst1-manual-ok').onclick = function () {
            var sig = decodeSignature($('mst1-manual-sig').value);
            if (!sig) { text($('mst1-manual-error'), 'That does not look like a signature. Paste the whole signature your wallet gave you.', 'text-danger'); return; }
            if (!MST1.verifyWalletSignature(wallet, message, MST1.b64(sig))) {
              text($('mst1-manual-error'), 'The signature does not match this statement and wallet ' + short(wallet) + '. Sign the exact text above with that wallet.', 'text-danger');
              return;
            }
            done(); resolve({ signature: sig });
          };
          $('mst1-manual-cancel').onclick = function () { done(); reject(new Error('Signing cancelled.')); };
        });
      }
    };
  }

  async function connectManual() {
    var wallet = $('mst1-manual-wallet').value.trim();
    var pk = null;
    try { pk = MST1.base58Decode(wallet); } catch (e) { pk = null; }
    if (!pk || pk.length !== 32) { text($('mst1-device'), 'Enter a valid Solana wallet address.', 'text-danger'); return; }
    text($('mst1-device'), 'Sign the statement below with wallet ' + short(wallet) + ' to prove it is yours.');
    await link(manualProvider(wallet), wallet);
  }

  async function link(p, wallet) {
    var status = $('mst1-device');
    state.provider = p;
    state.wallet = wallet;
    $('mst1-wallet').textContent = state.wallet;

    var kp = loadDevice(state.wallet);
    var mine = await api('/keys');
    var pub = kp ? MST1.b64(kp.publicKey) : null;
    var bound = pub && mine.keys.some(function (k) { return k.wallet === state.wallet && k.transfer_key === pub; });
    if (!bound) {
      kp = kp || nacl.box.keyPair();
      pub = MST1.b64(kp.publicKey);
      if (!p.manual) text(status, 'Approve the link statement in your wallet…');
      // Keep the key on this device before the server lists it, so a lost reply never strands files.
      saveDevice(state.wallet, kp);
      var c = await postJson('/challenge', { wallet: state.wallet });
      var statement = MST1.bindingMessage(c.domain, state.wallet, pub, c.nonce, c.issued_at);
      var signature = await signText(statement);
      await postJson('/keys', { wallet: state.wallet, transfer_key: pub, nonce: c.nonce, issued_at: c.issued_at, signature: signature });
    }
    state.device = kp;
    text(status, 'This device can send and open files for ' + short(state.wallet) + '. Keep a backup of this browser profile: clearing site data removes the key, and files sent to it can no longer be opened.', 'text-success');
    $('mst1-send').disabled = false;
    refresh();
  }

  /* Fetch each recipient's device keys and check every binding signature here, not on the server's word. */
  async function recipientKeys(wallets) {
    var out = [];
    for (var i = 0; i < wallets.length; i++) {
      var r = await api('/recipient/' + encodeURIComponent(wallets[i]));
      var good = r.keys.filter(function (k) { return MST1.verifyWalletSignature(wallets[i], k.statement, k.signature) && k.statement.indexOf('transfer_key: ' + k.transfer_key + '\n') > 0 && k.statement.indexOf('domain: ' + cfg.domain + '\n') > 0; });
      if (!good.length) throw new Error('No verified device key for ' + short(wallets[i]) + '. They need to open this page once first.');
      // Wrap the file key for every verified device of this wallet, so each one can open it.
      good.forEach(function (k) { out.push({ wallet: wallets[i], transfer_key: k.transfer_key }); });
    }
    return out;
  }

  async function send() {
    var status = $('mst1-send-status');
    try {
      var file = $('mst1-file').files[0];
      var wallets = $('mst1-to').value.split(/\s+/).map(function (s) { return s.trim(); }).filter(Boolean);
      wallets = wallets.filter(function (w, i) { return wallets.indexOf(w) === i; });
      var days = Math.max(1, Math.min(cfg.maxDays, parseInt($('mst1-days').value, 10) || 7));
      if (!file) throw new Error('Choose a file.');
      if (!wallets.length) throw new Error('Add at least one recipient wallet.');
      if (wallets.length > cfg.maxRecipients) throw new Error('At most ' + cfg.maxRecipients + ' recipients.');
      if (file.size > cfg.maxBytes) throw new Error('The file is larger than ' + size(cfg.maxBytes) + '.');
      text(status, 'Checking recipients…');
      var recipients = await recipientKeys(wallets);
      text(status, 'Encrypting on this device…');
      var plain = new Uint8Array(await file.arrayBuffer());
      var now = Math.floor(Date.now() / 1000);
      var sealed = await MST1.seal(plain, file.name, file.type || 'application/octet-stream', state.wallet,
        MST1.b64(state.device.publicKey), recipients, now + days * 86400, now);
      plain.fill(0);
      text(status, state.provider.manual ? 'Sign the transfer statement shown above…' : 'Approve the transfer in your wallet…');
      var signature = await signText(await MST1.manifestMessage(sealed.manifest));
      var form = new FormData();
      form.append('manifest', JSON.stringify(sealed.manifest));
      form.append('signature', signature);
      form.append('ciphertext', new Blob([sealed.ciphertext], { type: 'application/octet-stream' }), 'payload.mst1');
      text(status, 'Uploading the encrypted file…');
      await api('/send', { method: 'POST', body: form });
      text(status, 'Sent. Only the recipients\' devices can open it.', 'text-success');
      $('mst1-file').value = ''; $('mst1-file-name').textContent = 'No file chosen';
      refresh();
    } catch (e) {
      text(status, String(e.message || e), 'text-danger');
    }
  }

  async function openTransfer(id, wallet, button) {
    button.disabled = true;
    try {
      var t = await api('/transfer/' + id + '?wallet=' + encodeURIComponent(wallet));
      if (!MST1.verifyWalletSignature(t.manifest.sender_wallet, await MST1.manifestMessage(t.manifest), t.signature)) {
        throw new Error('The sender signature does not match. The file was not opened.');
      }
      var blob = await api('/blob/' + id + '?wallet=' + encodeURIComponent(wallet), { raw: true });
      var res = await MST1.open(blob, t.manifest, wallet, state.device);
      var url = URL.createObjectURL(new Blob([res.plain], { type: 'application/octet-stream' }));
      var a = document.createElement('a');
      a.href = url;
      a.download = String(res.meta.name || 'file').replace(/[\\/:*?"<>|]/g, '_');
      document.body.appendChild(a);
      a.click();
      a.remove();
      setTimeout(function () { URL.revokeObjectURL(url); }, 10000);
      button.textContent = 'Opened';
    } catch (e) {
      button.disabled = false;
      button.textContent = 'Retry';
      alertRow(button, String(e.message || e));
    }
  }

  function alertRow(el, msg) {
    var td = el.closest('td');
    var p = document.createElement('div');
    p.className = 'small text-danger';
    p.textContent = msg;
    td.appendChild(p);
  }

  function row(cells, action) {
    var tr = document.createElement('tr');
    cells.forEach(function (c) { var td = document.createElement('td'); td.textContent = c; tr.appendChild(td); });
    var td = document.createElement('td');
    if (action) td.appendChild(action);
    tr.appendChild(td);
    return tr;
  }

  function button(label, cls, fn) {
    var b = document.createElement('button');
    b.type = 'button';
    b.className = 'btn btn-sm ' + cls;
    b.textContent = label;
    b.addEventListener('click', function () { fn(b); });
    return b;
  }

  async function refresh() {
    if (!state.wallet) return;
    var inbox = await api('/inbox');
    var body = $('mst1-inbox');
    body.textContent = '';
    if (!inbox.transfers.length) body.appendChild(row(['No files yet.', '', '']));
    inbox.transfers.forEach(function (t) {
      var canOpen = t.wallet === state.wallet;
      body.appendChild(row([short(t.sender_wallet), size(t.ciphertext_bytes), when(t.expires_at)],
        canOpen ? button(t.downloaded_at ? 'Open again' : 'Open', 'btn-primary', function (b) { openTransfer(t.transfer_id, t.wallet, b); })
          : document.createTextNode('Connect ' + short(t.wallet) + ' to open')));
    });
    var outbox = await api('/outbox');
    var ob = $('mst1-outbox');
    ob.textContent = '';
    outbox.transfers.forEach(function (t) {
      var action = t.revoked_at ? document.createTextNode('Withdrawn') : button('Withdraw', 'btn-outline-danger', async function (b) {
        b.disabled = true;
        try { await postJson('/revoke', { transfer_id: t.transfer_id }); refresh(); } catch (e) { b.disabled = false; alertRow(b, String(e.message || e)); }
      });
      ob.appendChild(row([(t.recipients || []).map(short).join(', '), size(t.ciphertext_bytes), when(t.expires_at)], action));
    });
  }

  var connectBtn = $('mst1-connect');
  connectBtn.addEventListener('click', function () {
    connectBtn.disabled = true;
    connect().catch(function (e) {
      var msg = String((e && e.message) || e);
      if (e && (e.code === 4001 || /reject/i.test(msg))) msg = 'You cancelled the request in your wallet. Click Connect wallet to try again.';
      text($('mst1-device'), msg, 'text-danger');
    }).then(function () { connectBtn.disabled = false; });
  });
  function runManual() {
    var b = $('mst1-manual-use');
    b.disabled = true;
    connectManual().catch(function (e) { text($('mst1-device'), String((e && e.message) || e), 'text-danger'); }).then(function () { b.disabled = false; });
  }
  $('mst1-manual-use').addEventListener('click', runManual);
  $('mst1-manual-wallet').addEventListener('keydown', function (e) { if (e.key === 'Enter') { e.preventDefault(); runManual(); } });
  $('mst1-manual-copy').addEventListener('click', function () {
    var t = $('mst1-manual-statement').textContent;
    if (navigator.clipboard) navigator.clipboard.writeText(t).then(function () { $('mst1-manual-copy').textContent = 'Copied'; setTimeout(function () { $('mst1-manual-copy').textContent = 'Copy statement'; }, 1500); });
  });
  connectBtn.removeAttribute('data-mst1-pending');
  text($('mst1-device'), '');
  $('mst1-send').addEventListener('click', send);
  $('mst1-file').addEventListener('change', function () {
    var f = this.files && this.files[0];
    $('mst1-file-name').textContent = f ? f.name + ' (' + size(f.size) + ')' : 'No file chosen';
  });
  $('mst1-refresh').addEventListener('click', function () { refresh().catch(function () {}); });
})();
