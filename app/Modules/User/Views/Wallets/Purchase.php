<!-- app/Modules/User/Views/Wallets/Purchase.php -->
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
$membership_type                = $uri->getSegment(4);
// $promoCode                      = isset($promoCode) ? $uri->getSegment(5) : ''; 
log_message('debug', 'Wallets\Purchase L22 - $membership_type: ' . $membership_type . ' | $promoCode (if exists): ' . $promoCode); 
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
    'membership_type'           => $membership_type,
    'promoCode'                 => $promoCode ?? '',
);
?>

<?php if ($featureType === 'Memberships') : ?>
    <?php 
    if (!empty($uri->getSegment(4))) {
        if ($uri->getSegment(4) === 'Starter') {     
            $fieldData['membership_fee'] = $siteSettings->memberStarterFee;       
            echo view('Wallets/Purchase/Memberships/Starter', $fieldData);
        } elseif ($uri->getSegment(4) === 'Basic') {
            $fieldData['membership_fee'] = $siteSettings->memberBasicFee;       
            echo view('Wallets/Purchase/Memberships/Basic', $fieldData);
        } elseif ($uri->getSegment(4) === 'Pro') {
            $fieldData['membership_fee'] = $siteSettings->memberProFee;       
            echo view('Wallets/Purchase/Memberships/Pro', $fieldData);
        } elseif ($uri->getSegment(4) === 'Premium') {
            $fieldData['membership_fee'] = $siteSettings->memberPremiumFee;       
            echo view('Wallets/Purchase/Memberships/Premium', $fieldData);
        } elseif ($uri->getSegment(4) === 'NEWYEARS') {
            $fieldData['membershipStarterFee'] = $siteSettings->memberStarterFee;  
            $fieldData['membershipBasicFee'] = $siteSettings->memberBasicFee;  
            $fieldData['membershipProFee'] = $siteSettings->memberProFee;  
            $fieldData['membershipPremiumFee'] = $siteSettings->memberPremiumFee;  
            $fieldData['membershipStarterFeePromo'] = $siteSettings->memberStarterFee - 7;  
            $fieldData['membershipBasicFeePromo'] = $siteSettings->memberBasicFee - 20;  
            $fieldData['membershipProFeePromo'] = $siteSettings->memberProFee - 35;  
            $fieldData['membershipPremiumFeePromo'] = $siteSettings->memberPremiumFee - 70;  
            echo view('Wallets/Purchase/Memberships/Promotions', $fieldData);
        }
    } else {
        $fieldData['membershipStarterFee'] = $siteSettings->memberStarterFee;  
        $fieldData['membershipBasicFee'] = $siteSettings->memberBasicFee;  
        $fieldData['membershipProFee'] = $siteSettings->memberProFee;  
        $fieldData['membershipPremiumFee'] = $siteSettings->memberPremiumFee;  
        echo view('Wallets/Purchase/Memberships', $fieldData);
    }
    ?>
<?php else : ?>
<!-- User/views/Wallets/Purchase Form -->
<div class="modal-body">
    <form class="form-horizontal" id="purchase_order_form">
        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

        <?php if(!$promoCode) : ?>
        <fieldset>
            <div class="form-group">
                <label for="promo_code_input">Promo Code</label>
                <input type="text" id="promo_code_input" class="form-control" placeholder="Enter Promo Code" value="<?= $promoCode ?? '' ?>">
            </div>
        </fieldset>
        <?php else : ?>
        <fieldset>
            <div class="form-group">
                <label for="promo_code_input">Promo Code</label>
                <input type="text" id="promo_code_input" class="form-control" placeholder="Enter Promo Code">
            </div>
        </fieldset>
        <?php endif; ?>
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
<?php endif; ?>
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
