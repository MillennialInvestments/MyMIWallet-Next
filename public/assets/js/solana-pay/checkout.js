/* MyMI crypto checkout page (Solana Pay, and USDC on Ethereum/Base, XRP, BTC).
 * Asks the server for a checkout, shows the QR / wallet link and polls until
 * the payment is confirmed on chain. Never touches keys. */
(function () {
  'use strict';
  var app = document.getElementById('solpay-app');
  var form = document.getElementById('solpay-form');
  if (!app || !form) return;
  var cfg = JSON.parse(app.getAttribute('data-config') || '{}');
  var $ = function (id) { return document.getElementById(id); };
  var purpose = $('solpay-purpose');
  var chain = $('solpay-chain');
  var timer = null;

  var messages = {
    not_available: 'That is not available right now.',
    amount_required: 'Enter an amount.',
    amount_out_of_range: 'That amount is outside the allowed range.',
    unknown_plan: 'Pick a plan.',
    below_minimum: 'That is below the minimum investment.',
    not_eligible: 'Your investor profile is not yet eligible for this project.',
    recipient_usdc_account_missing: 'Checkout is not set up yet. Please try later.',
    checkout_expired: 'This checkout expired. Start a new one.',
    fee_not_paid: 'Payment received without the processing fee. Support will review it.',
    sign_in_required: 'Please sign in again.',
    too_many_open_checkouts: 'You have several unpaid checkouts open. Pay or wait for one to expire, then try again.',
    wallet_not_yours: 'Pick one of your own wallets.',
    chain_not_available: 'That network is not available right now.',
    price_unavailable: 'We could not get a reliable price right now. Try again in a minute.',
    network_unavailable: 'That network cannot be reached right now. Try again in a minute.',
    busy_try_again: 'Checkout is busy. Try again in a minute.'
  };

  function headers() {
    var h = { 'Content-Type': 'application/json', 'X-Requested-With': 'XMLHttpRequest' };
    var name = document.querySelector('meta[name="csrf-header"]');
    var token = document.querySelector('meta[name="csrf-token"]') || document.querySelector('meta[name="csrf_token_value"]');
    if (token) h[name ? name.content : 'X-CSRF-TOKEN'] = token.content;
    return h;
  }

  function isSolana() { return !chain || chain.value === 'solana'; }

  function showFields() {
    document.querySelectorAll('.solpay-field').forEach(function (el) {
      el.classList.toggle('d-none', el.getAttribute('data-for') !== purpose.value);
    });
    document.querySelectorAll('.solpay-chain-note').forEach(function (el) {
      el.classList.toggle('d-none', el.getAttribute('data-for') !== (isSolana() ? 'solana' : 'crypto'));
    });
  }

  function baseFor(data) { return data && data.chain && data.chain !== 'solana' ? cfg.cryptoBase : cfg.base; }

  function fail(code) {
    var box = $('solpay-error');
    box.textContent = messages[code] || 'Something went wrong (' + code + ').';
    box.classList.remove('d-none');
  }

  // Remember the open checkout so a reload resumes it. The server also
  // confirms checkouts on its own (solanapay:reconcile), so this is only
  // for showing the result; the order is delivered either way.
  var SAVE_KEY = 'mymi.solpay.open';
  function save(data) {
    try { localStorage.setItem(SAVE_KEY, JSON.stringify({ at: Date.now(), d: data })); } catch (e) { /* storage off */ }
  }
  function forget() {
    try { localStorage.removeItem(SAVE_KEY); } catch (e) { /* storage off */ }
  }
  function saved() {
    try {
      var v = JSON.parse(localStorage.getItem(SAVE_KEY) || 'null');
      if (v && v.d && v.d.reference && Date.now() - v.at < 20 * 60 * 1000) return v.d;
    } catch (e) { /* storage off */ }
    forget();
    return null;
  }

  var current = null;

  function show(data) {
    current = data;
    var crypto = data.chain && data.chain !== 'solana';
    $('solpay-qr').src = data.qr;
    var link = crypto ? data.uri : data.url;
    var open = $('solpay-open');
    // Only a real wallet link (scheme:...); an XRPL address?dt= text is for the QR only.
    if (link && /^[a-z][a-z0-9+.-]*:/i.test(link)) {
      open.href = link;
      open.classList.remove('d-none');
    } else {
      open.removeAttribute('href');
      open.classList.add('d-none');
    }
    if (crypto) {
      $('solpay-amount').textContent = data.amount;
      $('solpay-asset').textContent = data.asset;
      $('solpay-fee').textContent = '';
      var line = '$' + data.usd + ' price' + (data.fee_usd !== '0.00' ? ' + $' + data.fee_usd + ' MyMI processing fee' : '') + ' = $' + data.total_usd;
      if (data.asset !== 'USDC') line += ' at $' + data.rate + ' per ' + data.asset;
      $('solpay-breakdown').textContent = line + '. Send the exact amount shown.';
      $('solpay-address').textContent = data.recipient;
      $('solpay-dest').classList.remove('d-none');
      $('solpay-tag').textContent = data.dest_tag === null || data.dest_tag === undefined ? '' : String(data.dest_tag);
      $('solpay-tag-box').classList.toggle('d-none', data.dest_tag === null || data.dest_tag === undefined);
      $('solpay-evm').classList.toggle('d-none', !(data.chain_id && window.ethereum));
    } else {
      $('solpay-amount').textContent = data.usd;
      $('solpay-asset').textContent = 'USDC';
      $('solpay-fee').textContent = data.fee_sol && data.fee_sol !== '0' ? ' + ' + data.fee_sol + ' SOL fee' : '';
      $('solpay-breakdown').textContent = '';
      $('solpay-dest').classList.add('d-none');
      $('solpay-evm').classList.add('d-none');
    }
    $('solpay-pay').classList.remove('d-none');
    clearInterval(timer);
    timer = setInterval(function () { poll(data); }, crypto ? 8000 : 4000);
    poll(data);
  }

  function hex64(v) { return v.replace(/^0x/, '').padStart(64, '0'); }

  // USDC transfer(recipient, amount) from the browser wallet (MetaMask and others) on the checkout's chain.
  async function payEvm() {
    var d = current;
    var status = $('solpay-status');
    if (!d || !d.chain_id || !window.ethereum) return;
    try {
      var accounts = await window.ethereum.request({ method: 'eth_requestAccounts' });
      try {
        await window.ethereum.request({ method: 'wallet_switchEthereumChain', params: [{ chainId: '0x' + Number(d.chain_id).toString(16) }] });
      } catch (e) {
        status.textContent = 'Switch your wallet to the right network (chain ' + d.chain_id + ') and try again.';
        return;
      }
      var data = '0xa9059cbb' + hex64(d.recipient.toLowerCase()) + hex64(BigInt(d.amount_raw).toString(16));
      await window.ethereum.request({ method: 'eth_sendTransaction', params: [{ from: accounts[0], to: d.contract, data: data }] });
      status.textContent = 'Sent. Waiting for confirmations…';
    } catch (e) {
      status.textContent = 'The wallet did not send the payment.';
    }
  }

  async function poll(data) {
    var reference = data.reference;
    try {
      var res = await fetch(baseFor(data) + '/Status/' + encodeURIComponent(reference), { credentials: 'same-origin', headers: { 'X-Requested-With': 'XMLHttpRequest' } });
      var data = await res.json();
      var status = $('solpay-status');
      if (data.status === 'pending') { status.textContent = data.message || 'Waiting for payment…'; return; }
      if (data.status === 'confirmed') { status.textContent = data.message || 'Payment confirmed; finishing your order…'; return; }
      clearInterval(timer);
      forget();
      if (data.ok) {
        status.className = 'small text-success';
        status.textContent = data.message || 'Payment confirmed.';
      } else {
        status.className = 'small text-danger';
        status.textContent = messages[data.error] || data.message || 'Payment not confirmed.';
      }
    } catch (e) { /* keep polling */ }
  }

  purpose.addEventListener('change', showFields);
  if (chain) chain.addEventListener('change', showFields);
  $('solpay-evm').addEventListener('click', payEvm);
  var p = cfg.preset || {};
  function hasOption(select, value) {
    return !!select && Array.prototype.some.call(select.options, function (o) { return o.value === value; });
  }
  if (p.chain && hasOption(chain, p.chain)) chain.value = p.chain;
  if (p.purpose && hasOption(purpose, p.purpose)) purpose.value = p.purpose;
  if (p.plan) $('solpay-plan').value = p.plan;
  if (p.project) $('solpay-project').value = p.project;
  if (p.lot) $('solpay-lot').value = p.lot;
  if (p.gold_cents && /^\d+$/.test(p.gold_cents)) $('solpay-gold-cents').value = p.gold_cents;
  showFields();
  var open = saved();
  if (open) show(open);

  form.addEventListener('submit', async function (ev) {
    ev.preventDefault();
    $('solpay-error').classList.add('d-none');
    var body = { purpose: purpose.value };
    if (!isSolana()) body.chain = chain.value;
    form.querySelectorAll('.solpay-field[data-for="' + purpose.value + '"] input, .solpay-field[data-for="' + purpose.value + '"] select').forEach(function (el) {
      body[el.name] = el.value;
    });
    $('solpay-go').disabled = true;
    try {
      var res = await fetch((isSolana() ? cfg.base : cfg.cryptoBase) + '/Checkout', { method: 'POST', credentials: 'same-origin', headers: headers(), body: JSON.stringify(body) });
      var newHash = res.headers.get('X-CSRF-Token-Hash');
      var meta = document.querySelector('meta[name="csrf-token"]');
      if (newHash && meta) meta.content = newHash;
      var data = await res.json().catch(function () { return { ok: false, error: 'bad_response_' + res.status }; });
      if (!data.ok) { fail(data.error); return; }
      if (!isSolana()) data.chain = chain.value;
      save(data);
      show(data);
    } catch (e) {
      fail('network');
    } finally {
      $('solpay-go').disabled = false;
    }
  });
})();
