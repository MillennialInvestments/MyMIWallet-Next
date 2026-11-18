<!-- app/Modules/User/Views/Wallets/Purchase/Memberships/Premium.php -->
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
                        <p>Subscribe to the Premium Membership for only $<?= $membership_fee; ?> for 30 days of access and enjoy our service.</p>
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
                <h3>Premium Membership Bundle Details</h3>
                <p>Unlock the full potential of your investments with our Premium Membership Bundle. Enjoy comprehensive tools and features for professional and business investment management.</p>
                <ul class="list list-sm list-checked">
                    <?php foreach($getFeatures as $features) : ?>
                        <?php if ($features['feature_level'] < 5) : ?>
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
                <p>Our Premium Membership Bundle is designed for professionals and businesses needing comprehensive tools and features. With access to all our services, you'll have everything you need to manage your investments at the highest level.</p>
                <h3>Key Features</h3>
                <p>The Premium Membership Bundle provides access to all our tools and features, ensuring you have the resources to manage your investments professionally and efficiently.</p>
                <span><a href="<?php echo site_url('Wallets/Purchase/Memberships'); ?>" class="btn btn-primary"><em class="icon ni ni-arrow-left"></em> Back to Memberships</a></span>
                <span><a href="<?php echo site_url('Dashboard'); ?>" class="btn btn-success">Continue Free <em class="icon ni ni-arrow-right"></em></a></span>
            </div>
        </div><!-- .col -->
    </div><!-- .row -->
</div>

<?= view('UserModule\Views\Wallets\Purchase\Memberships\checkout', ['checkoutPlan' => 'premium']) ?>
<script <?= $nonce['script'] ?? '' ?>>
  fbq('track', 'ViewContent', {
    content_name: 'Premium Memberships',
    content_category: 'Memberships',
  });
</script>