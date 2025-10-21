<?php
$mainPage = $uri->getSegment(1); 
$beta = $siteSettings->beta; 

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
$client_id = $cuUserType === 'Beta' ? 'AffPMSjviq6Zkkpvn79YQnawbzP6bnG7J71vfbMu5eYp9qUe7OnoaKtEksenCvMkV3EU6D0M_927_PX_' : 'AeNL90i_VizF7CId1oC3Buc7YlyPHJIO9BF3t0j1FwW7_RRLsTKfPyeFu30S_VRu6WydKw7ETUmtFp2n';
?>
<div class="nk-block">
    <div class="row g-gs">
        <div class="col-12 mt-0">
            <?php echo view('Wallets/Purchase/Memberships/Advertisements/CustomizeYourMembership'); ?>
        </div>
    </div>
    <div class="row g-gs flex-lg-row-reverse pt-5">
        <div class="col-lg-5">
            <div class="card card-bordered">
                <div class="card-inner">
                    <div class="card-head">
                        <h4 class="card-title">Subscribe to <?= ucfirst($membership_type) ?> Membership</h4>
                    </div>
                    <?php if ($beta === 1) : ?>
                    <div class="card-body">
                        <div class="col-12 bg-warning">   
                            <p class="card-text blog-text text-center">
                                <strong>BETA CREDIT CARD INFORMATION</strong><br>
                                <strong>USE THIS CREDIT CARD FOR BETA USE ONLY</strong>
                            </p>   
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td>Credit Card Number</td>
                                        <td class="text-right"><strong><?= $siteSettings->betaCardNumber; ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Expiration Date</td>
                                        <td class="text-right"><strong><?= $siteSettings->betaExpiryDate; ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Security Code</td>
                                        <td class="text-right"><strong><?= $siteSettings->betaSecurityCode; ?></strong></td>
                                    </tr>
                                </tbody>
                            </table>
                            <hr>
                        </div>   
                    </div>
                    <?php endif; ?>
                    <div class="card-body">
                        <p>Subscribe to the Pro Membership for only $<?= $membership_fee; ?>/month and enjoy our service.</p>
                        <?php if(!empty($promoCode)) : ?>
                        <fieldset>
                            <div class="form-group mb-3">
                                <label for="promo_code_input">Promo Code</label>
                                <input type="text" id="promo_code_input" class="form-control" placeholder="Enter Promo Code" value="<?= $promoCode ?? '' ?>">
                            </div>
                        </fieldset>
                        <?php else : ?>
                        <fieldset>
                            <div class="form-group mb-3">
                                <label for="promo_code_input">Promo Code</label>
                                <input type="text" id="promo_code_input" class="form-control" placeholder="Enter Promo Code">
                            </div>
                        </fieldset>
                        <?php endif; ?>
                        <div id="paypal-button-container"></div>
                    </div>
                </div>
            </div>
        </div><!-- .col -->
        <div class="col-lg-7">
            <div class="product-details entry me-xxl-3">
                <h3>Pro Membership Bundle Details</h3>
                <p>Maximize your investment potential with our Pro Membership Bundle. Gain access to advanced tools and features for comprehensive investment management.</p>
                <ul class="list list-sm list-checked">
                    <?php foreach($getFeatures as $features) : ?>
                        <?php if ($features['feature_level'] < 4) : ?>
                            <li>
                                <?php
                                echo $features['feature_name']; 
                                if ($features['feature_cost'] > 0) {
                                    echo ' ($' . $features['feature_cost'] . ' Value)'; 
                                } else {
                                    echo ' (FREE)'; 
                                }
                                ?>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
                <p>Our Pro Membership Bundle is ideal for advanced users who need extensive tools and features. With access to exclusive groups and annual tax preparation, you'll have everything you need to manage your investments comprehensively.</p>
                <h3>Key Features</h3>
                <p>The Pro Membership Bundle provides access to advanced tools, exclusive group access, and annual tax preparation, ensuring you have the resources to manage your investments effectively.</p>
                <span><a href="<?php echo site_url('Wallets/Purchase/Memberships'); ?>" class="btn btn-primary"><em class="icon ni ni-arrow-left"></em> Back to Memberships</a></span>
                <span><a href="<?php echo site_url('Dashboard'); ?>" class="btn btn-success">Continue Free <em class="icon ni ni-arrow-right"></em></a></span>
            </div>
        </div><!-- .col -->
    </div><!-- .row -->
</div>
<script src="https://www.paypal.com/sdk/js?client-id=<?= $client_id ?>&vault=true&intent=subscription&currency=USD"></script>

<script <?= $nonce['script'] ?? '' ?>>
    // Ensure the DOM is fully loaded
    document.addEventListener('DOMContentLoaded', (event) => {
        // Check if the PayPal SDK is loaded
        if (typeof paypal !== 'undefined') {
            // Initialize the PayPal buttons
            paypal.Buttons({
                // Set up the style of the PayPal button
                // style: {
                //     shape: 'rect',
                //     color: 'gold',
                //     layout: 'vertical',
                //     label: 'subscribe'
                // },
                // Set up the subscription plan details
                createSubscription: function (data, actions) {
                    <?php if ($uri->getSegment(4) === 'Pro') : ?>
                        <?php 
                        // Check the condition for NEWYEARS discount
                        $planId = 'P-2DS96023VD631600WMZFK3YQ'; // Default plan ID
                        if ($uri->getTotalSegments() >= 5 && $uri->getSegment(5) === 'NEWYEARS') {
                            $planId = 'P-3EL22129BC612813XM5O5V5I'; // NEWYEARS discount plan ID
                        }
                        ?>
                        return actions.subscription.create({
                            'plan_id': '<?php echo $planId; ?>' // Use the determined plan ID
                        });
                    <?php endif; ?>
                },
                // Handle approval of the subscription
                onApprove: function (data, actions) {
                    alert('You have successfully created subscription ' + data.subscriptionID);
                    // Optional: Redirect to another page or handle post-subscription logic here
                },
                // Handle errors during the subscription process
                onError: function (err) {
                    console.error('PayPal Subscription Error:', err);
                    alert('An error occurred during the subscription process. Please try again.');
                }
            }).render('#paypal-button-container'); // Replace with the ID of your PayPal button container
        } else {
            console.error('PayPal SDK could not be loaded.');
        }
    });

</script>
<script <?= $nonce['script'] ?? '' ?>>
  fbq('track', 'ViewContent', {
    content_name: 'Pro Memberships',
    content_category: 'Memberships',
  });
</script>