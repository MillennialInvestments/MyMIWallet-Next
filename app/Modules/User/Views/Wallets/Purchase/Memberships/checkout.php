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
// Monthly billing is offered only when its switch is on, PayPal can tell us about payments
// (webhook id set), the member has not asked for a single payment, and is not already subscribed.
$mmMonthly  = $mmReady && $mmPlanId !== '' && $mmAuto === null
    && feature_enabled('FEATURE_MEMBERSHIP_SUBSCRIPTIONS')
    && \App\Services\Payments\PayPalSubscriptionClient::webhookConfigured()
    && (string) service('request')->getGet('billing') !== 'once';
$mmCurrentText = $mmCurrent === null ? '' : 'Your ' . $mmCurrent['label'] . ' membership is active until ' . date('F j, Y', (int) strtotime($mmCurrent['expires_at'])) . '.'
    . ($mmAuto !== null ? ' It renews automatically each month.' : ' Buying the same plan again adds 30 days.');
if (! $mmReady) {
    $mmNotice = '<div class="alert alert-info mb-0">Online purchases are not open yet.</div>';
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
