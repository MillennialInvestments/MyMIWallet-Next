<?php
$mainPage = $uri->getSegment(1); 

// Check for 'Memberships' page
if ($mainPage === 'Memberships') {
    $membership_type = ($uri->getTotalSegments() >= 2) ? $uri->getSegment(2) : null; // Check if there are at least 2 segments
} elseif ($mainPage === 'Wallets') {
    $membership_type = ($uri->getTotalSegments() >= 4) ? $uri->getSegment(4) : null; // Check if there are at least 4 segments
} else {
    $membership_type = null; // Default if no matching conditions
}
if ($siteSettings->beta === 1) { 
    $cuUserType = 'Beta'; 
} else {
    $cuUserType = 'Investor'; 
}
$membership_fee = 0; 
$client_id = $cuUserType === 'Beta' ? 'AffPMSjviq6Zkkpvn79YQnawbzP6bnG7J71vfbMu5eYp9qUe7OnoaKtEksenCvMkV3EU6D0M_927_PX_' : 'AeNL90i_VizF7CId1oC3Buc7YlyPHJIO9BF3t0j1FwW7_RRLsTKfPyeFu30S_VRu6WydKw7ETUmtFp2n';
?>
<?php if ($uri->getTotalSegments() >= 4 && $uri->getSegment(4) === 'Customize' ) : ?>
<?php else : ?>
<div class="modal-header">
    <h3 class="modal-title" id="useCoinModalLabel">Customize Your MyMI Membership!</h3>
    <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button> -->
</div> 
<?php endif; ?>
<div class="modal-body">
    <div class="nk-block">
        <div class="row d-none d-md-block g-gs">
            <div class="col-12 mt-0">
                <?php echo view('Wallets/Purchase/Memberships/Advertisements/CustomizeYourMembership'); ?>
            </div>
        </div>
        <div class="row g-gs flex-lg-row-reverse">
            <div class="col-lg-12 mt-0">
                <div class="card">
                    <div class="card-inner">
                        <div class="nk-block-head">
                            <h4 class="nk-block-title">Choose Your Features</h4>
                        </div>
                        <div class="nk-block-des text-soft">
                            <p>Select the features you want to include in your membership and proceed to payment.</p>
                        </div>
                    </div>
                    <div class="card-inner">
                        <form id="membershipForm">
                            <div class="row g-gs">
                                <?php 
                                // log_message('debug', 'Wallets\Purchase\Memberships\Customize L29 - $getFeatures: ' . (print_r($getFeatures, true)));
                                foreach ($getFeatures as $features) {
                                    $featurePrice = $features['feature_cost']; 
                                    if ($featurePrice === '0.00') {
                                        $feature = [
                                            'name' => $features['feature_name'],
                                            'price' => '<strong>FREE</strong>', 
                                            'description' => $features['feature_description'],
                                            'viewFile' => $features['identifier']
                                        ];
                                    } elseif ($featurePrice === 'QUOTE') {
                                        $feature = [
                                            'name' => $features['feature_name'],
                                            'price' => '<a href="">Request Quote</a>', 
                                            'description' => $features['feature_description'],
                                            'viewFile' => $features['identifier']
                                        ];
                                    } else {
                                        $feature = [
                                            'name' => $features['feature_name'],
                                            'price' => '$' . number_format($features['feature_cost'], 2), 
                                            'description' => $features['feature_description'],
                                            'viewFile' => $features['identifier']
                                        ];
                                    } 
                                    // log_message('debug', 'Wallets\Purchase\Memberships\Customize L51 - $features Array: ' . (print_r($features, true)));
                                    ?>
                                    <div class="col-12 col-md-6 mt-0">
                                        <div class="card card-bordered">
                                            <div class="card-inner">
                                                <div class="form-group">
                                                    <label>
                                                        <input type="checkbox" class="feature-checkbox" data-price="<?= $featurePrice ?>" name="features[]" value="<?= $feature['viewFile'] ?>">
                                                        <h6 class="title py-2"><?= $feature['name'] ?><span> | <?= $feature['price'] ?></span></h6>
                                                        <p class="text-muted large"><?= $feature['description'] ?></p>
                                                        <a class="btn btn-primary text-white dynamicModalLoader" data-formtype="ProductDetails" data-endpoint="<?= $feature['viewFile'] ?>" data-accountid="<?= $featurePrice ?>">Learn More!</a> 
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php 
                                }
                                ?>
                            </div>

                            <div class="row g-gs mt-4">
                                <div class="col-12">
                                    <h5>Total Cost: $<span id="totalCost">0.00</span></h5>
                                </div>
                            </div>

                            <div class="row g-gs mt-2">
                                <div class="col-12">
                                    <div id="paypal-subscription-container"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- .col -->
        </div><!-- .row -->
    </div>
</div>

<script src="https://www.paypal.com/sdk/js?client-id=<?= $client_id ?>&vault=true&currency=USD"></script>
<script <?= $nonce['script'] ?? '' ?>>
document.addEventListener('DOMContentLoaded', function() {
    console.log("Document is ready...");

    const featureCheckboxes = document.querySelectorAll('.feature-checkbox');
    const totalCostElement = document.getElementById('totalCost');

    if (!featureCheckboxes.length) {
        console.error("No feature checkboxes found.");
        return;
    }
    if (!totalCostElement) {
        console.error("Total cost element not found.");
        return;
    }

    console.log("Feature checkboxes found:", featureCheckboxes);
    console.log("Total cost element found:", totalCostElement);

    function calculateTotalCost() {
        let totalCost = 0;
        featureCheckboxes.forEach(function(checkbox) {
            if (checkbox.checked) {
                totalCost += parseFloat(checkbox.dataset.price);
            }
        });
        totalCostElement.innerText = totalCost.toFixed(2);
    }

    featureCheckboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            console.log("Checkbox changed: ", checkbox);
            calculateTotalCost();
        });
    });

    paypal.Buttons({
        createOrder: function(data, actions) {
            const totalCost = parseFloat(totalCostElement.innerText);
            if (isNaN(totalCost) || totalCost <= 0) {
                console.error("Invalid total cost for PayPal order:", totalCost);
                return actions.reject();
            }
            console.log("Creating PayPal order with total cost:", totalCost);
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: totalCost.toFixed(2)
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                console.log("Payment approved, details:", details);
                const formData = new FormData(document.getElementById('membershipForm'));
                formData.append('transaction_id', details.id);
                formData.append('total_cost', details.purchase_units[0].amount.value);

                fetch('<?=site_url("/Memberships/PurchaseCallback")?>', {
                    method: 'POST',
                    body: formData,
                    credentials: 'same-origin'
                }).then(function(response) {
                    if (response.ok) {
                        window.location.href = '<?=site_url("/Memberships/PurchaseComplete")?>';
                    } else {
                        alert('Payment failed, please try again.');
                    }
                });
            });
        }
    }).render('#paypal-subscription-container');
});
</script>
<script <?= $nonce['script'] ?? '' ?>>
  fbq('track', 'ViewContent', {
    content_name: 'Customize Memberships',
    content_category: 'Memberships',
  });
</script>
