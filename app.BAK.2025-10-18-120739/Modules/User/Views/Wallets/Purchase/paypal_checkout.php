<?php 
if ($siteSettings->beta === 1) {
    $betaCardNumber     = '4032034114488086';
    $betaExpiryDate     = '07/2025';
    $betaSecurityCode   = '279';
    $apiClientID        = 'AffPMSjviq6Zkkpvn79YQnawbzP6bnG7J71vfbMu5eYp9qUe7OnoaKtEksenCvMkV3EU6D0M_927_PX_';
    $apiClientSecret    = 'EHuPVTP72XJ8OM7a7AirbtOn6H5awEshqrJuczUdTtNSrVcxYDta9p_Kir9Q11biT6_SlS7_fAAeqo6f'
?>
    <div class="col-md-4"></div>
    <div class="col-md-4">   
        <p class="card-text blog-text text-center">
            <strong>BETA CREDIT CARD INFORMATION</strong><br>
            <strong>USE THIS CREDIT CARD FOR BETA USE ONLY</strong>
        </p>   
        <table class="table table-borderless">
            <tbody>
                <tr>
                    <td>Credit Card Number</td>
                    <td class="text-right"><?= $betaCardNumber; ?></td>
                </tr>
                <tr>
                    <td>Expiration Date</td>
                    <td class="text-right"><?= $betaExpiryDate; ?></td>
                </tr>
                <tr>
                    <td>Security Code</td>
                    <td class="text-right"><?= $betaSecurityCode; ?></td>
                </tr>
            </tbody>
        </table>
        <hr>
    </div>   
    <div class="col-md-2"></div>
<?php } ?>

<script src="https://www.paypal.com/sdk/js?client-id=<?= $client_id ?>"></script>

<div class="col-md-4"></div>
<div class="col-md-4">
    <div id="paypal-button-container"></div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
    paypal.Buttons({
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '<?= $total_cost ?>'
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                window.location.href = '/MyMI-Gold/Purchase-Complete/<?= $orderID ?>';
            });
        }
    }).render('#paypal-button-container'); 
</script>
