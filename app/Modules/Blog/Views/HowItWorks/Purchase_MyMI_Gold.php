<?php
// Directly use the variables passed from the controller.
// Variables passed from the controller.
$cuID = $cuID ?? 0;
$beta = $beta ?? 0;
$date = $date ?? 0;
$hostTime = $hostTime ?? 0;
$time = $time ?? 0;
$investmentOperations = $investmentOperations ?? 0;
$pageURIA = $pageURIA ?? '';
$pageURIB = $pageURIB ?? '';
$page_title = str_replace("-", " ", $pageURIB);

// Package Prices
$package_prices = [5, 10, 15, 25, 50, 75, 100];

$testData = [
    // 'getCoinValue' => $getCoinValue,
];
?>
<style <?= $nonce['style'] ?? '' ?>>
	@media (max-width: 375px) {
	#header01-m {padding-top: 15px !important;}	
	}
	@media (min-width: 767px) {
	#header01-m {padding-top: 1rem !important;}
	}
	.breadcrumb{background-color: transparent !important;}
	.blog-text{font-size:1.25rem;} 
</style>
<section class="cid-s0KKUOB7cY mt-5 full-width" id="header01-m">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-11 col-md-7 grid-margin stretch-card px-5">
                <div class="card">
                    <div class="card-body px-5 pt-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo site_url('/How-To-Guides'); ?>">How It Works</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $page_title; ?></li>
                            </ol>
                        </nav>
                        <h1 class="card-title display-5">Purchase MyMI Gold</h1>
                        <hr>
                        <p class="card-text blog-text">
                            MyMI Gold can be purchased directly through your MyMI Wallet.<br>Follow these simple steps to get started.
                        </p>

                        <h3 class="card-title display-7 pt-4">Select Your MyMI Gold Package</h3>
                        <p class="card-text blog-text">
                            Choose from various packages according to your needs. Each package comes with a specific amount of MyMI Gold.
                        </p>
                        <ul class="card-list">
                            <?php foreach ($package_prices as $price): ?>
                                <li><?php echo "$" . $price . " Package"; ?></li>
                            <?php endforeach; ?>
                        </ul>

                        <h3 class="card-title display-7 pt-4">Complete Purchase via PayPal</h3>
                        <p class="card-text blog-text">
                            Once you've selected a package, click on 'Purchase Now' to proceed with the payment through PayPal.
                        </p>

                        <h3 class="card-title display-7 pt-4">Receive MyMI Gold in Your Wallet</h3>
                        <p class="card-text blog-text">
                            After the purchase is confirmed and the payment is received, the corresponding amount of MyMI Gold will be transferred to your default MyMI Wallet.
                        </p>

                        <h3 class="card-title display-7 pt-4">Use MyMI Gold for Premium Features</h3>
                        <p class="card-text blog-text">
                            MyMI Gold can be utilized within the MyMI Wallet app to access various Premium Features.
                        </p>

                        <h3 class="card-title display-7 pt-4">Monthly Subscriptions</h3>
                        <p class="card-text blog-text">
                            For monthly subscriptions, PayPal will set up a recurring charge. On the due date, MyMI Gold will be purchased and transferred to cover the cost of the subscription.
                        </p>

                        <h6 class="card-title display-7 pt-4">Need Additional Assistance</h6>
                        <p class="card-text blog-text">
                            Contact us via email at <a href="mailto:support@mymiwallet.com">support@mymiwallet.com</a> for any queries or assistance.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>