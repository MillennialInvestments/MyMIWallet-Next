
<!-- app/Modules/User/Views/Dashboard/index/transaction-modal.php -->
<?php
// Safely access segments
$totalSegments = $uri->getTotalSegments();

$pageURIA   = $totalSegments >= 1 ? $uri->getSegment(1) : null;
$pageURIB   = $totalSegments >= 2 ? $uri->getSegment(2) : null;
$pageURIC   = $totalSegments >= 3 ? $uri->getSegment(3) : null;
$pageURID   = $totalSegments >= 4 ? $uri->getSegment(4) : null;
$pageURIE   = $totalSegments >= 5 ? $uri->getSegment(5) : null;
$client_id  = $cuUserType === 'Beta' ? 'AeFttKQS_djpAmMEFvPSinKaluT_XqJ_zE00kD8QIxIr5F76wg18Yliy7XsYl7jlsCcFbwwx9Zpp2Nnn' : 'AeNL90i_VizF7CId1oC3Buc7YlyPHJIO9BF3t0j1FwW7_RRLsTKfPyeFu30S_VRu6WydKw7ETUmtFp2n';

?>
<div class="modal fade" id="transactionModal" tabindex="-1" aria-labelledby="trackDepositsModal" aria-hidden="true">
    <div class="modal-dialog modal-xl" id="transModalDialog">
        <div class="modal-content" id="loading-content">
            <?php echo view('Dashboard\index\modal-loading-page'); ?>
        </div>
        <div class="modal-content" id="transactionContainer">
        </div>
    </div>
</div>
<?php 
   //echo view('UserModule/Wallets/Add/wallet-transaction-modal');
// if ($pageURIA === 'Wallets' || $pageURIA === 'Wallet-Selection') {
//    echo view('UserModule/Wallets/Add/wallet-transaction-modal');
// }
?>

<script <?= $nonce['script'] ?? '' ?>>
$(document).ready(function() {
    $('.dynamicModalLoader').click(function() {
        const formtype = $(this).data('formtype');
        let endpoint = $(this).data('endpoint');
        endpoint = endpoint ? '/' + endpoint : '';
        let accountid = $(this).data('accountid');
        accountid = accountid ? '/' + accountid : '';
        let category = $(this).data('category');
        category = category ? '/' + category : ''; 
        let platform = $(this).data('platform');
        platform = platform ? '/' + platform : ''; 
        const url = `<?= site_url('Dashboard/Transaction-Modal/')?>${formtype}${endpoint}${accountid}${category}${platform}`;
        
        console.log('URL:', url); // Debugging URL

        $('#transactionModal').modal('show');
        $('#loading-content').show();
        $('#transactionContainer').hide();

        // Initialize PayPal only if the container exists in the loaded content
        $.ajax({
            type: 'GET',
            url: url,
            headers: {
                'X-CSRF-TOKEN': '<?= csrf_hash(); ?>'
            },
            success: function(response) {
                $('#transactionContainer').html(response).show();
                $('#loading-content').hide();
                if ($('#transactionContainer').find('#paypal-button-container').length > 0) {
                    if (typeof paypal === 'undefined') {
                        var script = document.createElement('script');
                        script.src = `https://www.paypal.com/sdk/js?client-id=<?= $client_id; ?>&currency=USD&debug=true`; 
                        script.onload = initializePayPalButton;
                        document.head.appendChild(script);
                    } else {
                        initializePayPalButton();
                    }
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('AJAX error:', textStatus, errorThrown);
                $('#loading-content').hide();
                $('#transactionContainer').html('<p>Error loading content.</p>').show();
            }
        });
    });

    $("#transactionModal").on('hidden.bs.modal', function () {
        $('#transactionContainer').empty();
        $('#loading-content').show();
    });
});

function initializePayPalButton() {
    paypal.Buttons({
        createOrder: function(data, actions) {
            var transCost = parseFloat(document.getElementById("transCost").innerText.replace(/,/g, '')) || 0;
            if (transCost <= 0) {
                console.error("Invalid transaction amount");
                return Promise.reject("Invalid transaction amount");
            }
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: transCost.toFixed(2) // Ensure two decimal places
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                console.log('Transaction completed by:', details.payer.name.given_name);
                var formData = new FormData();
                formData.append('transaction_id', details.id);
                formData.append('total_cost', details.purchase_units[0].amount.value);

                fetch('<?= site_url("/Wallets/MyMIGPayPalCallback") ?>', {
                    method: 'POST',
                    body: formData,
                    credentials: 'same-origin'
                }).then(function(response) {
                    if (!response.ok) {
                        console.error("Callback failed with status:", response.status);
                        return Promise.reject("Failed to process transaction.");
                    }
                    return response.text();
                }).then(function() {
                    window.location.href = '<?= site_url("/Wallets/Purchase/Complete/MyMIGold") ?>';
                }).catch(function(error) {
                    console.error("Error during callback processing:", error);
                });
            }).catch(function(error) {
                console.error("Error capturing order:", error);
            });
        },
        onError: function(err) {
            console.error("PayPal SDK error:", err);
        }
    }).render('#paypal-button-container');
}

</script>

<script <?= $nonce['script'] ?? '' ?>>
document.addEventListener("DOMContentLoaded", function() {
    var goldCoinsField = document.getElementById("gold_coins");
    
    if (goldCoinsField) {
        goldCoinsField.addEventListener("input", function() {
            var goldCoins = parseFloat(this.value) || 0;
            var transPercent = parseFloat(document.getElementById("trans_percent").value) || 0;
            var transFee = parseFloat(document.getElementById("trans_fee").value) || 0;
            var MyMIGCoinAvailable = parseFloat(document.getElementById("available_coins").value) || 0;
            var MyMIGoldValue = 1;

            // Function to format numbers with commas
            function formatNumber(num, decimals = 2) {
                return num.toFixed(decimals).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
            }

            // Calculate the preliminary USD cost
            var prelimCostUSD = goldCoins * MyMIGoldValue;
            document.getElementById("prelimCost").innerText = formatNumber(prelimCostUSD);

            // Calculate transaction fees and total cost
            var transactionFees = (goldCoins * transPercent) + transFee;
            var totalCostUSD = prelimCostUSD + transactionFees;

            document.getElementById("trans_cost").value = transactionFees.toFixed(8);
            document.getElementById("transCost").innerText = formatNumber(totalCostUSD);

            // Subtract transaction fees from total available coins to get remaining coins
            var remainingCoins = MyMIGCoinAvailable - transactionFees - goldCoins;
            document.querySelector(".remaining-coins-label").innerText = formatNumber(remainingCoins, 8) + ' Gold';

            // Update the Transaction Fees display
            document.querySelector(".transaction-fees-label").innerText = formatNumber(transactionFees, 2) + ' Gold';

            // Calculate the total amount of coins the user will receive
            var totalCoinsReceived = goldCoins - transactionFees;
            document.querySelector(".transaction-subtotal-label").innerText = formatNumber(totalCoinsReceived, 8) + ' Gold';
        });
    }
});
</script>
