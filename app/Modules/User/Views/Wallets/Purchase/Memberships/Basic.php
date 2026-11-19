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
                        <p>Subscribe to the Basic Membership for only $<?= $membership_fee; ?> for 30 days of access and enjoy our services.</p>
                        <div id="paypal-button-container"></div>
                    </div>
                </div>
            </div>
        </div><!-- .col -->
        <div class="col-lg-7">
            <div class="product-details entry me-xxl-3">
                <h3>Basic Membership Bundle Details</h3>
                <p>Enhance your investment journey with our Basic Membership Bundle. Get more automation and integration features to help you manage your investments and finances more efficiently.</p>
                <ul class="list list-sm list-checked">
                    <?php foreach($getFeatures as $features) : ?>
                        <?php if ($features['feature_level'] < 3) : ?>
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
                <p>Our Basic Membership Bundle is perfect for users who need more automation and integration. With essential tools and real-time data, you'll have everything you need to enhance your investment management.</p>
                
                <h3>Key Features</h3>
                <ul class="list list-sm list-checked">
                    <li class="pb-2"><strong>Crypto Exchange (FREE):</strong> Effortlessly buy and sell cryptocurrencies within the MyMI Wallet ecosystem. This feature allows you to trade popular digital assets without needing an external platform, saving you time and keeping all your assets in one place.</li>

                    <li class="pb-2"><strong>Crypto Staking (FREE):</strong> Earn rewards on your cryptocurrency holdings by participating in staking options. By staking, you can grow your assets while contributing to the network's security, making this a valuable tool for long-term investors.</li>

                    <li class="pb-2"><strong>Manual Trade Tracker (FREE):</strong> Keep detailed records of your trades, whether they involve stocks, crypto, or other assets. This feature enables you to manually input your trades, monitor performance, and make informed investment decisions based on historical data.</li>

                    <li class="pb-2"><strong>Personal Budgeting Tool (FREE):</strong> Take control of your finances with easy-to-use budgeting tools. Set spending limits, track expenses, and allocate funds toward your investment goals, all within the same platform.</li>

                    <li class="pb-2"><strong>Automated Account Integration <span class="text-primary">($20.00 VALUE)</span>:</strong> Sync your external financial accounts with MyMI Wallet. This integration automates the process of importing your transactions and balances, making it easier to manage all your assets from a single dashboard.</li>

                    <li class="pb-2"><strong>MyMI Trade Alerts <span class="text-primary">($20.00 VALUE)</span>:</strong> Receive real-time trade alerts based on market trends and your predefined preferences. Whether you're monitoring crypto, stocks, or forex markets, these alerts ensure that you stay ahead of potential investment opportunities.</li>

                    <li class="pb-2"><strong>MyMI Trade Tracker <span class="text-primary">($50.00 VALUE)</span>:</strong> Automatically track your trades and investment performance with detailed analytics. This tool simplifies trade tracking by pulling in real-time data and updating your portfolio performance instantly, allowing you to evaluate and optimize your strategies on the fly.</li>
                </ul>

                <p>Each feature in the Basic Membership Bundle is designed to simplify your financial management and empower you to make better investment decisions. With automation, real-time data, and powerful tracking tools, you will have everything you need to stay ahead in the market.</p>

                <span><a href="<?php echo site_url('Wallets/Purchase/Memberships'); ?>" class="btn btn-primary"><em class="icon ni ni-arrow-left"></em> Back to Memberships</a></span>
                <span><a href="<?php echo site_url('Dashboard'); ?>" class="btn btn-success">Continue Free <em class="icon ni ni-arrow-right"></em></a></span>
            </div>
        </div><!-- .col -->
    </div><!-- .row -->
</div>
<?= view('UserModule\Views\Wallets\Purchase\Memberships\checkout', ['checkoutPlan' => 'basic']) ?>
<script <?= $nonce['script'] ?? '' ?>>
  fbq('track', 'ViewContent', {
    content_name: 'Basic Memberships',
    content_category: 'Memberships',
  });
</script>