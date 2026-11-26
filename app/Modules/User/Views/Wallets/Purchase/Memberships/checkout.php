<?php
/**
 * Membership checkout button: a one-time PayPal payment for 30 days of access,
 * or, when FEATURE_MEMBERSHIP_SUBSCRIPTIONS is on and the plan has a PayPal
 * billing plan id, a monthly subscription that renews until cancelled.
 *
 * Renders into #paypal-button-container, which each plan page already has.
 * The price is the server's (Config\MembershipPlans); the payment is verified
 * with PayPal and the plan is activated by Memberships/PurchaseCallback.
 *
 * @var string $checkoutPlan starter|basic|pro|premium
 */
helper(['feature', 'cuID', 'csp']);
$mmPlan     = config('MembershipPlans')->find((string) ($checkoutPlan ?? ''));
$mmOpen     = function_exists('feature_enabled') && feature_enabled('FEATURE_MEMBERSHIP_PURCHASES');
$mmClientId = (string) env('PAYPAL_REST_CLIENT_ID', '');
$mmSecretOk = (string) env('PAYPAL_REST_SECRET', '') !== '';
$mmUserId   = function_exists('getCuID') ? (int) (getCuID() ?? 0) : 0;
$mmReady    = $mmPlan !== null && $mmOpen && $mmClientId !== '' && $mmSecretOk;
$mmNotice   = '';
$mmCurrent  = $mmUserId > 0 ? (new \App\Services\Payments\MembershipLifecycleService())->current($mmUserId) : null;
$mmPlanId   = $mmPlan === null ? '' : \App\Services\Payments\PayPalSubscriptionClient::planId($mmPlan['slug']);
$mmAuto     = $mmUserId > 0 ? (new \App\Services\Payments\MembershipSubscriptionService())->activeFor($mmUserId) : null;
$host       = (string) (service('request')->getUri()->getHost() ?? $_SERVER['HTTP_HOST'] ?? '');
$isStagingContext = str_contains($host, 'staging') || str_contains($host, 'localhost') || str_contains($host, '127.0.0.1')
    || (config('SiteSettings')->beta ?? 0) === 1
    || ENVIRONMENT !== 'production'
    || ((int) (session('cuRole') ?? 4) <= 2);
// Monthly billing is offered only when its switch is on, PayPal can tell us about payments
// (webhook id set), the member has not asked for a single payment, and is not already subscribed.
$mmMonthly  = $mmReady && $mmPlanId !== '' && $mmAuto === null
    && feature_enabled('FEATURE_MEMBERSHIP_SUBSCRIPTIONS')
    && \App\Services\Payments\PayPalSubscriptionClient::webhookConfigured()
    && (string) service('request')->getGet('billing') !== 'once';
$mmCurrentText = $mmCurrent === null ? '' : 'Your ' . $mmCurrent['label'] . ' membership is active until ' . date('F j, Y', (int) strtotime($mmCurrent['expires_at'])) . '.'
    . ($mmAuto !== null ? ' It renews automatically each month.' : ' Buying the same plan again adds 30 days.');
if (! $mmReady) {
    $mmNotice = $isStagingContext
        ? '<div class="alert alert-warning mb-2"><em class="icon ni ni-alert-circle"></em> <strong>PayPal Integration Notice:</strong> Live checkout is not active. Use the <strong>Staging Smoke Test Suite</strong> below to inspect configuration, probe PayPal REST API, or simulate sandbox approval.</div>'
        : '<div class="alert alert-info mb-0">Online purchases are not open yet.</div>';
} elseif ($mmUserId <= 0) {
    $mmNotice = '<div class="alert alert-light mb-0">Please <a href="' . esc(site_url('login'), 'attr') . '">sign in</a> or <a href="' . esc(site_url('register'), 'attr') . '">create a free account</a> to buy this membership.</div>';
}
?>
<?php if ($mmAuto !== null): ?>
<script<?= script_nonce_attr() ?>>
document.addEventListener('DOMContentLoaded', function () {
    var box = document.getElementById('paypal-button-container');
    if (!box) { return; }
    var wrap = document.createElement('div');
    wrap.className = 'alert alert-light';
    var text = document.createElement('p');
    text.className = 'mb-2';
    text.textContent = 'Your membership renews automatically each month through PayPal.';
    var btn = document.createElement('button');
    btn.type = 'button';
    btn.className = 'btn btn-outline-danger btn-sm';
    btn.textContent = 'Turn off auto-renew';
    wrap.appendChild(text);
    wrap.appendChild(btn);
    box.parentNode.insertBefore(wrap, box);
    btn.addEventListener('click', function () {
        btn.disabled = true;
        var form = new FormData();
        form.append(<?= json_encode(csrf_token()) ?>, <?= json_encode(csrf_hash()) ?>);
        fetch(<?= json_encode(site_url('Memberships/CancelSubscription')) ?>, {
            method: 'POST', body: form, credentials: 'same-origin', headers: { 'X-Requested-With': 'XMLHttpRequest' }
        }).then(function (response) {
            return response.json().catch(function () { return {}; }).then(function (json) {
                text.textContent = json.message || (response.ok ? 'Auto-renew is off.' : 'We could not cancel right now. Please try again.');
                if (response.ok) { btn.remove(); } else { btn.disabled = false; }
            });
        }).catch(function () {
            text.textContent = 'We could not reach the server. Please try again.';
            btn.disabled = false;
        });
    });
});
</script>
<?php endif; ?>
<?php if ($mmNotice !== ''): ?>
<script<?= script_nonce_attr() ?>>
document.addEventListener('DOMContentLoaded', function () {
    var c = document.getElementById('paypal-button-container');
    if (c) { c.innerHTML = <?= json_encode($mmNotice, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>; }
});
</script>
<?php else: ?>
<script src="https://www.paypal.com/sdk/js?client-id=<?= esc(rawurlencode($mmClientId), 'attr') ?>&amp;currency=USD&amp;<?= $mmMonthly ? 'vault=true&amp;intent=subscription' : 'intent=capture' ?>"></script>
<script<?= script_nonce_attr() ?>>
document.addEventListener('DOMContentLoaded', function () {
    var box = document.getElementById('paypal-button-container');
    if (!box) { return; }
    var plan = <?= json_encode($mmPlan['slug']) ?>;
    var price = <?= json_encode(number_format($mmPlan['price'], 2, '.', '')) ?>;
    var label = <?= json_encode($mmPlan['label'] . ' Membership, ' . $mmPlan['days'] . ' days') ?>;
    var note = document.createElement('p');
    note.className = 'small text-muted';
    var monthly = <?= $mmMonthly ? 'true' : 'false' ?>;
    note.textContent = monthly
        ? '$' + price + ' billed every month until you cancel. You can turn off auto-renew at any time on this page or in your PayPal account.'
        : 'One payment of $' + price + ' for <?= (int) $mmPlan['days'] ?> days of access. It does not renew automatically.';
    box.parentNode.insertBefore(note, box);
    if (monthly) {
        var once = document.createElement('a');
        once.className = 'small d-block mb-2';
        once.href = '?billing=once';
        once.textContent = 'Prefer a single payment for <?= (int) $mmPlan['days'] ?> days with no renewal?';
        box.parentNode.insertBefore(once, box);
    }
    var current = <?= json_encode($mmCurrentText, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>;
    if (current) {
        var have = document.createElement('div');
        have.className = 'alert alert-success';
        have.textContent = current;
        box.parentNode.insertBefore(have, note);
    }

    function show(kind, text) {
        box.innerHTML = '';
        var d = document.createElement('div');
        d.className = 'alert alert-' + kind + ' mb-0';
        d.textContent = text;
        box.appendChild(d);
        if (kind === 'success') {
            var a = document.createElement('a');
            a.className = 'btn btn-success mt-2';
            a.href = <?= json_encode(site_url('Dashboard')) ?>;
            a.textContent = 'Go to my dashboard';
            box.appendChild(a);
        }
    }

    if (typeof paypal === 'undefined') {
        show('warning', 'The payment button could not load. Please refresh the page or try again later.');
        return;
    }

    function report(response, json, receipt) {
        if (response.status === 200) {
            show('success', json.message || 'Thanks! Your membership is active.');
        } else if (response.status === 202) {
            show('info', json.message || 'Thanks! Your payment was received and will be confirmed shortly.');
        } else {
            show('warning', 'We received your payment but could not confirm it automatically. Please contact support with your PayPal receipt (' + receipt + ').');
        }
    }

    if (monthly) {
        paypal.Buttons({
            style: { label: 'subscribe' },
            createSubscription: function (data, actions) {
                return actions.subscription.create({
                    plan_id: <?= json_encode($mmPlanId) ?>,
                    custom_id: <?= json_encode(\App\Services\Payments\MembershipSubscriptionService::customId($mmUserId, $mmPlan['slug'])) ?>
                });
            },
            onApprove: function (data) {
                var form = new FormData();
                form.append(<?= json_encode(csrf_token()) ?>, <?= json_encode(csrf_hash()) ?>);
                form.append('plan', plan);
                form.append('subscription_id', data.subscriptionID);
                return fetch(<?= json_encode(site_url('Memberships/SubscribeCallback')) ?>, {
                    method: 'POST', body: form, credentials: 'same-origin', headers: { 'X-Requested-With': 'XMLHttpRequest' }
                }).then(function (response) {
                    return response.json().catch(function () { return {}; }).then(function (json) { report(response, json, data.subscriptionID); });
                }).catch(function () {
                    show('warning', 'Your subscription was approved but we could not reach the server. Please contact support with your PayPal subscription id (' + data.subscriptionID + ').');
                });
            },
            onError: function () {
                show('warning', 'The subscription did not go through. You have not been charged. Please try again.');
            }
        }).render('#paypal-button-container');
        return;
    }

    paypal.Buttons({
        createOrder: function (data, actions) {
            return actions.order.create({
                purchase_units: [{ description: label, custom_id: 'membership:' + plan, amount: { currency_code: 'USD', value: price } }]
            });
        },
        onApprove: function (data, actions) {
            return actions.order.capture().then(function (details) {
                var form = new FormData();
                form.append(<?= json_encode(csrf_token()) ?>, <?= json_encode(csrf_hash()) ?>);
                form.append('plan', plan);
                form.append('transaction_id', details.id);
                form.append('total_cost', price);
                return fetch(<?= json_encode(site_url('Memberships/PurchaseCallback')) ?>, {
                    method: 'POST',
                    body: form,
                    credentials: 'same-origin',
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                }).then(function (response) {
                    return response.json().catch(function () { return {}; }).then(function (json) {
                        report(response, json, details.id);
                    });
                }).catch(function () {
                    show('warning', 'We received your payment but could not reach the server. Please contact support with your PayPal receipt (' + details.id + ').');
                });
            });
        },
        onError: function () {
            show('warning', 'The payment did not go through. You have not been charged. Please try again.');
        }
    }).render('#paypal-button-container');
});
</script>
<?php endif; ?>

<?php if ($isStagingContext): ?>
<div class="card card-bordered mt-4 bg-light border-warning shadow-sm" id="paypal-smoke-test-card">
    <div class="card-inner">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <span class="badge bg-warning text-dark"><em class="icon ni ni-shield-check"></em> STAGING PAYPAL SMOKE TEST SUITE</span>
            <span class="badge bg-outline-secondary"><?= esc(strtoupper((string) ($checkoutPlan ?? 'PLAN'))) ?></span>
        </div>
        <p class="small text-muted mb-3">
            Diagnostic tool for staging and sandbox certification. Inspect configuration, probe PayPal OAuth REST handshake, and simulate sandbox fulfillment without touching live funds.
        </p>
        <div class="d-flex flex-wrap gap-2 mb-3">
            <button type="button" class="btn btn-sm btn-outline-primary" id="btn-smoke-audit">
                <em class="icon ni ni-file-text"></em> Audit Config &amp; Tables
            </button>
            <button type="button" class="btn btn-sm btn-outline-info" id="btn-smoke-probe">
                <em class="icon ni ni-activity-round"></em> Probe PayPal OAuth API
            </button>
            <button type="button" class="btn btn-sm btn-outline-success" id="btn-smoke-simulate">
                <em class="icon ni ni-play-circle"></em> Simulate Sandbox Purchase &amp; Callback
            </button>
        </div>
        <div id="paypal-smoke-results" class="small p-3 bg-white rounded border d-none" style="max-height: 280px; overflow-y: auto; font-family: monospace;"></div>
    </div>
</div>

<script<?= script_nonce_attr() ?>>
document.addEventListener('DOMContentLoaded', function () {
    var out = document.getElementById('paypal-smoke-results');
    var btnAudit = document.getElementById('btn-smoke-audit');
    var btnProbe = document.getElementById('btn-smoke-probe');
    var btnSimulate = document.getElementById('btn-smoke-simulate');

    function log(title, data, isError) {
        if (!out) return;
        out.classList.remove('d-none');
        var time = new Date().toLocaleTimeString();
        var color = isError ? 'text-danger' : 'text-success';
        var html = '<div class="border-bottom pb-2 mb-2">'
            + '<div class="fw-bold ' + color + '">[' + time + '] ' + title + '</div>'
            + '<pre class="mb-0 text-dark" style="white-space: pre-wrap; word-break: break-all;">'
            + JSON.stringify(data, null, 2)
            + '</pre></div>';
        out.innerHTML = html + out.innerHTML;
    }

    if (btnAudit) {
        btnAudit.addEventListener('click', function () {
            btnAudit.disabled = true;
            btnAudit.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Auditing...';
            var form = new FormData();
            form.append(<?= json_encode(csrf_token()) ?>, <?= json_encode(csrf_hash()) ?>);

            fetch(<?= json_encode(site_url('API/Admin/PayPalSmokeTest/audit')) ?>, {
                method: 'POST', body: form, credentials: 'same-origin', headers: { 'X-Requested-With': 'XMLHttpRequest' }
            }).then(function (res) {
                return res.json().then(function (data) {
                    log('Audit Configuration Report', data, !data.ok);
                });
            }).catch(function (err) {
                log('Audit Request Failed', { error: err.message }, true);
            }).finally(function () {
                btnAudit.disabled = false;
                btnAudit.innerHTML = '<em class="icon ni ni-file-text"></em> Audit Config &amp; Tables';
            });
        });
    }

    if (btnProbe) {
        btnProbe.addEventListener('click', function () {
            btnProbe.disabled = true;
            btnProbe.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Probing PayPal...';
            var form = new FormData();
            form.append(<?= json_encode(csrf_token()) ?>, <?= json_encode(csrf_hash()) ?>);

            fetch(<?= json_encode(site_url('API/Admin/PayPalSmokeTest/probe')) ?>, {
                method: 'POST', body: form, credentials: 'same-origin', headers: { 'X-Requested-With': 'XMLHttpRequest' }
            }).then(function (res) {
                return res.json().then(function (data) {
                    log('PayPal OAuth Handshake Probe (Status: ' + res.status + ')', data, !res.ok);
                });
            }).catch(function (err) {
                log('Probe Request Failed', { error: err.message }, true);
            }).finally(function () {
                btnProbe.disabled = false;
                btnProbe.innerHTML = '<em class="icon ni ni-activity-round"></em> Probe PayPal OAuth API';
            });
        });
    }

    if (btnSimulate) {
        btnSimulate.addEventListener('click', function () {
            if (!confirm('Simulate a verified Sandbox purchase for the <?= esc($checkoutPlan) ?> plan? This will insert a test claim and activate the plan.')) {
                return;
            }
            btnSimulate.disabled = true;
            btnSimulate.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Simulating...';
            var form = new FormData();
            form.append(<?= json_encode(csrf_token()) ?>, <?= json_encode(csrf_hash()) ?>);
            form.append('plan', <?= json_encode($checkoutPlan ?? 'starter') ?>);

            fetch(<?= json_encode(site_url('API/Admin/PayPalSmokeTest/simulate')) ?>, {
                method: 'POST', body: form, credentials: 'same-origin', headers: { 'X-Requested-With': 'XMLHttpRequest' }
            }).then(function (res) {
                return res.json().then(function (data) {
                    log('Sandbox Purchase Simulation', data, !res.ok);
                    if (res.ok && data.expires_at) {
                        alert('Simulation Success: Plan ' + data.plan + ' activated until ' + data.expires_at);
                        location.reload();
                    }
                });
            }).catch(function (err) {
                log('Simulation Request Failed', { error: err.message }, true);
            }).finally(function () {
                btnSimulate.disabled = false;
                btnSimulate.innerHTML = '<em class="icon ni ni-play-circle"></em> Simulate Sandbox Purchase &amp; Callback';
            });
        });
    }
});
</script>
<?php endif; ?>
