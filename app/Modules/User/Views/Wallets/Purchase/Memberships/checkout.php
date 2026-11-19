<?php
/**
 * Membership checkout button (one-time PayPal payment for 30 days of access).
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
$mmCurrentText = $mmCurrent === null ? '' : 'Your ' . $mmCurrent['label'] . ' membership is active until ' . date('F j, Y', (int) strtotime($mmCurrent['expires_at'])) . '. Buying the same plan again adds 30 days.';
if (! $mmReady) {
    $mmNotice = '<div class="alert alert-info mb-0">Online purchases are not open yet.</div>';
} elseif ($mmUserId <= 0) {
    $mmNotice = '<div class="alert alert-light mb-0">Please <a href="' . esc(site_url('login'), 'attr') . '">sign in</a> or <a href="' . esc(site_url('register'), 'attr') . '">create a free account</a> to buy this membership.</div>';
}
?>
<?php if ($mmNotice !== ''): ?>
<script<?= script_nonce_attr() ?>>
document.addEventListener('DOMContentLoaded', function () {
    var c = document.getElementById('paypal-button-container');
    if (c) { c.innerHTML = <?= json_encode($mmNotice, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>; }
});
</script>
<?php else: ?>
<script src="https://www.paypal.com/sdk/js?client-id=<?= esc(rawurlencode($mmClientId), 'attr') ?>&amp;currency=USD&amp;intent=capture"></script>
<script<?= script_nonce_attr() ?>>
document.addEventListener('DOMContentLoaded', function () {
    var box = document.getElementById('paypal-button-container');
    if (!box) { return; }
    var plan = <?= json_encode($mmPlan['slug']) ?>;
    var price = <?= json_encode(number_format($mmPlan['price'], 2, '.', '')) ?>;
    var label = <?= json_encode($mmPlan['label'] . ' Membership, ' . $mmPlan['days'] . ' days') ?>;
    var note = document.createElement('p');
    note.className = 'small text-muted';
    note.textContent = 'One payment of $' + price + ' for <?= (int) $mmPlan['days'] ?> days of access. It does not renew automatically.';
    box.parentNode.insertBefore(note, box);
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
                        if (response.status === 200) {
                            show('success', json.message || 'Thanks! Your membership is active.');
                        } else if (response.status === 202) {
                            show('info', json.message || 'Thanks! Your payment was received and will be confirmed shortly.');
                        } else {
                            show('warning', 'We received your payment but could not confirm it automatically. Please contact support with your PayPal receipt (' + details.id + ').');
                        }
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
