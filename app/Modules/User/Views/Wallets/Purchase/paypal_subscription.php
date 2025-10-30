<?php
$client_id = $cuUserType === 'Beta' ? 'AffPMSjviq6Zkkpvn79YQnawbzP6bnG7J71vfbMu5eYp9qUe7OnoaKtEksenCvMkV3EU6D0M_927_PX_' : 'AeNL90i_VizF7CId1oC3Buc7YlyPHJIO9BF3t0j1FwW7_RRLsTKfPyeFu30S_VRu6WydKw7ETUmtFp2n';
?>
<div id="paypal-button-container"></div>
<script src="https://www.paypal.com/sdk/js?client-id=<?= $client_id ?>&vault=true&intent=subscription"></script>

<script <?= $nonce['script'] ?? '' ?>>
    paypal.Buttons({
    createSubscription: function(data, actions) {
        return actions.subscription.create({
            plan_id: 'INSERT_PLAN_ID' //Replace INSERT_PLAN_ID with your actual PayPal subscription plan ID.
        });
    },
    onApprove: function(data, actions) {
        window.location.href = '<?= site_url("/path/to/success") ?>';
    }
}).render('#paypal-button-container');
</script>