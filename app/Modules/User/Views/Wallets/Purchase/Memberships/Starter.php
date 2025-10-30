<?php
$mainPage = $uri->getSegment(1); 
$beta = $siteSettings->beta; 
// $beta = 1; 
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
$client_id = $cuUserType === 'Beta' ? 'AewHMlPPPhVyrOAAxPGHzBsgnftW3K9iztFySQt9bWx5PpH5YdNqcMGPu8IyXe6O96rJBcaYgxz-DohH' : 'AXZPKPakARMCxGCjA7mtB0u2eVMNqhzo78X4kuiY0uiKTVNo13daa-xzXrVPExd98m_PQdYT3ZlVPaiR';
?>
<div class="nk-block">
    <div class="row g-gs">
        <div class="col-12 mt-0">
            <?php echo view('UserModule\Views\Wallets\Purchase\Memberships\Advertisements\CustomizeYourMembership'); ?>
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
                        <h6 class="card-subtitle"></h6>
                        <p>Subscribe to the <?= ucfirst($membership_type) ?> Membership for only $<?= $membership_fee; ?>/month and enjoy our service.</p>
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
                <h3>Starter Membership Bundle Details</h3>
                <p>Get started on your investment journey with our Starter Membership Bundle. Enjoy essential features to help you manage your investments and finances effectively.</p>
                <ul class="list list-sm list-checked">
                    <?php foreach($getFeatures as $features) : ?>
                        <?php if ($features['feature_level'] < 2) : ?>
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
                <p>Our Starter Membership Bundle is designed for individuals who are just beginning their investment journey. With essential tools and resources, you'll have everything you need to get started.</p>
                <h3>Key Features</h3>
                <p>The Starter Membership Bundle provides access to crucial tools and resources to help you manage your investments and stay informed with the latest financial news.</p>
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
                    <?php if ($uri->getSegment(4) === 'Starter') : ?>
                        <?php 
                        // Check the condition for NEWYEARS discount
                        $planId = 'P-2VR82118M3603741WMZFA76Y'; // Default plan ID
                        if ($uri->getTotalSegments() >= 5 && $uri->getSegment(5) === 'NEWYEARS') {
                            $planId = 'P-4V967923RY034781WM5O52AA'; // NEWYEARS discount plan ID
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
    content_name: 'Starter Memberships',
    content_category: 'Memberships',
  });
</script>