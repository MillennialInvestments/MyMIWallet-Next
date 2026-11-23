/* MyMI Solana Pay checkout page. Asks the server for a checkout, shows the
 * QR / wallet link and polls until the payment is confirmed on Solana. */
(function () {
  'use strict';
  var app = document.getElementById('solpay-app');
  var form = document.getElementById('solpay-form');
  if (!app || !form) return;
  var cfg = JSON.parse(app.getAttribute('data-config') || '{}');
  var $ = function (id) { return document.getElementById(id); };
  var purpose = $('solpay-purpose');
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
    sign_in_required: 'Please sign in again.'
  };

  function headers() {
    var h = { 'Content-Type': 'application/json', 'X-Requested-With': 'XMLHttpRequest' };
    var name = document.querySelector('meta[name="csrf-header"]');
    var token = document.querySelector('meta[name="csrf-token"]') || document.querySelector('meta[name="csrf_token_value"]');
    if (token) h[name ? name.content : 'X-CSRF-TOKEN'] = token.content;
    return h;
  }

  function showFields() {
    document.querySelectorAll('.solpay-field').forEach(function (el) {
      el.classList.toggle('d-none', el.getAttribute('data-for') !== purpose.value);
    });
  }

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

  function show(data) {
    $('solpay-qr').src = data.qr;
    $('solpay-open').href = data.url;
    $('solpay-amount').textContent = data.usd;
    $('solpay-fee').textContent = data.fee_sol && data.fee_sol !== '0' ? ' + ' + data.fee_sol + ' SOL fee' : '';
    $('solpay-pay').classList.remove('d-none');
    clearInterval(timer);
    timer = setInterval(function () { poll(data.reference); }, 4000);
    poll(data.reference);
  }

  async function poll(reference) {
    try {
      var res = await fetch(cfg.base + '/Status/' + encodeURIComponent(reference), { credentials: 'same-origin', headers: { 'X-Requested-With': 'XMLHttpRequest' } });
      var data = await res.json();
      var status = $('solpay-status');
      if (data.status === 'pending') { status.textContent = 'Waiting for payment…'; return; }
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
  var p = cfg.preset || {};
  if (p.purpose && purpose.querySelector('option[value="' + p.purpose + '"]')) purpose.value = p.purpose;
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
    form.querySelectorAll('.solpay-field[data-for="' + purpose.value + '"] input, .solpay-field[data-for="' + purpose.value + '"] select').forEach(function (el) {
      body[el.name] = el.value;
    });
    $('solpay-go').disabled = true;
    try {
      var res = await fetch(cfg.base + '/Checkout', { method: 'POST', credentials: 'same-origin', headers: headers(), body: JSON.stringify(body) });
      var newHash = res.headers.get('X-CSRF-Token-Hash');
      var meta = document.querySelector('meta[name="csrf-token"]');
      if (newHash && meta) meta.content = newHash;
      var data = await res.json().catch(function () { return { ok: false, error: 'bad_response_' + res.status }; });
      if (!data.ok) { fail(data.error); return; }
      save(data);
      show(data);
    } catch (e) {
      fail('network');
    } finally {
      $('solpay-go').disabled = false;
    }
  });
})();
