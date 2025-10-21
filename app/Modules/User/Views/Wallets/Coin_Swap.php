<?php
$beta                           = $siteSettings->beta; 
$MyMIGoldValue				    = $siteSettings->MyMIGCoinValue;
$MyMIGCoinAvailable			    = $siteSettings->MyMIGCoinAvailable;
$gasFee                         = $siteSettings->gasFee;
$transFee                       = $siteSettings->transFee;
$transPercent                   = $siteSettings->transPercent;
$controlClass                   = empty($controlClass) ? 'span6' : $controlClass;
if ($uri->getSegment(3) === 'Memberships') {
    $featureType                    = $uri->getSegment(3); 
    $walletType			            = $uri->getSegment(3);
} else {
    $featureType                    = $uri->getSegment(2); 
    $walletType			            = $uri->getSegment(3);
}
    
$featureRedirectURL             = $_SERVER['HTTP_REFERER'] ?? 'Dashboard';
$client_id                      = $beta === 1 ? 'AffPMSjviq6Zkkpvn79YQnawbzP6bnG7J71vfbMu5eYp9qUe7OnoaKtEksenCvMkV3EU6D0M_927_PX_' : 'AeNL90i_VizF7CId1oC3Buc7YlyPHJIO9BF3t0j1FwW7_RRLsTKfPyeFu30S_VRu6WydKw7ETUmtFp2n';

// $this->mymilogger
//      ->user($cuID) //Set UserID, who created this  Action
//      ->beta($beta) //Set whether in Beta or nto
//      ->type($featureTypeText) //Entry type like, Post, Page, Entry
//      ->controller($this->router->fetch_class())
//      ->method($this->router->fetch_method())
//      ->url($this->uri->uri_string())
//      ->full_url(current_url())
//      ->comment($walletType) //Token identify Action
//      ->log(); //Add Database Entry
$fieldData = array(
    'beta'                      => $beta,
    'MyMIGCoinAvailable'        => $MyMIGCoinAvailable,
    'gasFee'                    => $gasFee,
    'transFee'                  => $transFee,
    'transPercent'              => $transPercent,
    'controlClass'              => $controlClass,
    'featureType'	            => $featureType,
    'featureRedirectURL'	    => $featureRedirectURL,
    'walletType'	            => $walletType,
    'cuUserType'                => $cuUserType,
);
?>

<!-- User/views/Wallets/Purchase Form -->
<div class="modal-body">
    <form class="form-horizontal" id="purchase_order_form">
        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

        <fieldset>
            <?php
            echo view('Wallets/Purchase/paypal_fields', $fieldData);
            ?>
        </fieldset>
        <fieldset>
            <!-- Start of User Meta -->
            <?php //$this->load->view('users/user_meta', array('frontend_only' => true);?>
            <!-- End of User Meta -->
        </fieldset>
    <?php echo form_close(); ?>	
    <?php if (validation_errors()) : ?>
        <div class="alert alert-error fade in">
            <?php echo validation_errors(); ?>
        </div>
    <?php endif; ?>
</div>
<script <?= $nonce['script'] ?? '' ?>>
document.getElementById("gold_coins").addEventListener("input", function() {
    var goldCoins = parseFloat(this.value) || 0;
    var transPercent = parseFloat(document.getElementById("trans_percent").value) || 0;
    var transFee = parseFloat(document.getElementById("trans_fee").value) || 0;
    var MyMIGCoinAvailable = parseFloat(document.getElementById("available_coins").value) || 0;
    var MyMIGoldValue = <?php echo $MyMIGoldValue; ?>;

    // Function to format numbers with commas and limit decimal places
    function formatNumber(num, decimals = 2) {
        let formattedNumber = num.toFixed(decimals).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
        // Remove trailing zeros after two consecutive zeros in the decimal part
        return formattedNumber.replace(/(\.\d*?)0{2,}\d*$/, function(match, group1) {
            return group1.replace(/0+$/, '');  // Remove the extra zeros
        });
    }

    // Calculate the preliminary USD cost
    var prelimCostUSD = goldCoins * MyMIGoldValue;
    document.getElementById("prelimCost").innerText = formatNumber(prelimCostUSD);

    // Calculate transaction fees and total cost
    var transactionFees = (goldCoins * transPercent) + transFee;
    var totalCostUSD = prelimCostUSD + transactionFees;

    document.getElementById("trans_cost").value = formatNumber(transactionFees, 8);
    document.getElementById("transCost").innerText = formatNumber(totalCostUSD);

    // Subtract transaction fees from total available coins to get remaining coins
    var remainingCoins = MyMIGCoinAvailable - transactionFees - goldCoins;
    document.querySelector(".remaining-coins-label").innerText = formatNumber(remainingCoins, 8) + ' Gold';

    // Update the Transaction Fees display
    document.querySelector(".transaction-fees-label").innerText = formatNumber(transactionFees, 2) + ' Gold';

    // Calculate the total amount of coins the user will receive
    var totalCoinsReceived = goldCoins - transactionFees;
    document.querySelector(".transaction-subtotal-label").innerText = formatNumber(totalCoinsReceived, 0) + ' Gold';
});
</script>
<script src="https://www.paypal.com/sdk/js?client-id=<?= $client_id ?>&currency=USD"></script>  
<script <?= $nonce['script'] ?? '' ?>>
paypal.Buttons({
    createOrder: function(data, actions) {
        var transCost = parseFloat(document.getElementById("transCost").innerText.replace(/,/g, '')) || 0;
        return actions.order.create({
            purchase_units: [{
                amount: {
                    value: transCost.toFixed(2)
                }
            }]
        });
    },
    onApprove: function(data, actions) {
        return actions.order.capture().then(function(details) {
            // Prepare the form data to send to the callback route
            var formData = new FormData();
            formData.append('transaction_id', details.id);
            formData.append('total_cost', details.purchase_units[0].amount.value);
            
            fetch('<?=site_url("/Wallets/MyMIGPayPalCallback")?>', {
                method: 'POST',
                body: formData,
                credentials: 'same-origin'
            }).then(function() {
                window.location.href = '<?=site_url("/Wallets/Purchase/MyMIGold/Complete")?>';
            });
        });
    }
}).render('#paypal-button-container');
</script>
<script <?= $nonce['script'] ?? '' ?>>
document.addEventListener('DOMContentLoaded', function() {
    const paymentButtons = document.querySelectorAll('.crypto-group');
    const transactionContainer = document.getElementById('transactionContainer');

    paymentButtons.forEach(button => {
        button.addEventListener('click', function() {
        const cryptoType = this.textContent.trim().split(' ')[2]; // Extracts 'BTC', 'ETH', 'SOL', 'DGB'
        fetchCryptoPrice(cryptoType);
        });
    });

    function fetchCryptoPrice(cryptoType) {
        fetchPriceFromCoinGecko(cryptoType)
        .then(price => updateModalContent(cryptoType, price))
        .catch(() => {
            console.error('CoinGecko failed, trying CryptoCompare next.');
            fetchPriceFromCryptoCompare(cryptoType)
                .then(price => updateModalContent(cryptoType, price))
                .catch(() => {
                    console.error('CryptoCompare failed, trying CoinAPI next.');
                    fetchPriceFromCoinAPI(cryptoType)
                        .then(price => updateModalContent(cryptoType, price))
                        .catch(error => console.error('All APIs failed:', error));
                });
        });
    }

    function fetchPriceFromCoinGecko(cryptoType) {
        return fetch(`https://api.coingecko.com/api/v3/simple/price?ids=${cryptoType.toLowerCase()}&vs_currencies=usd`)
            .then(response => response.json())
            .then(data => data[cryptoType.toLowerCase()].usd);
    }

    function fetchPriceFromCryptoCompare(cryptoType) {
        return fetch(`https://min-api.cryptocompare.com/data/price?fsym=${cryptoType}&tsyms=USD`)
            .then(response => response.json())
            .then(data => data.USD);
    }

    function fetchPriceFromCoinAPI(cryptoType) {
        const apiKey = 'YOUR_API_KEY_HERE'; // You need to replace this with your actual API key from CoinAPI
        return fetch(`https://rest.coinapi.io/v1/exchangerate/${cryptoType}/USD`, {
            headers: { 'X-CoinAPI-Key': apiKey }
        })
            .then(response => response.json())
            .then(data => data.rate);
    }

    function updateModalContent(cryptoType, price) {
        transactionContainer.innerHTML = `
        <h4 class="card-title">Checkout with ${cryptoType}</h4>
        <p class="card-description">Please complete your payment using ${cryptoType}.</p>
        <div class="${formGroup} mb-2">
            <label class="col-6 form-label">Wallet Address:</label>
            <div class="col-6">
            <span class="form-control">${'Your_Wallet_Address_for_' + cryptoType}</span>
            </div>
        </div>
        <div class="${formGroup} mb-2">
            <label class="col-6 form-label">Amount:</label>
            <div class="col-6">
            <span class="form-control">${price} ${cryptoType}</span>
            </div>
        </div>
        <button class="btn btn-success mt-3">Complete Payment</button>
        `;
    }
});

</script>