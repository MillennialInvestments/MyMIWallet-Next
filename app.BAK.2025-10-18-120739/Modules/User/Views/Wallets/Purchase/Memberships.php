<!-- app/Modules/User/Views/Wallets/Purchase/Memberships.php -->
<style <?= $nonce['style'] ?? '' ?>>
    #customizeMembershipBanner {
        background-image: url('<?php echo base_url('assets/images/MyMI-Walllet-Background.jpeg'); ?>');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 100%;
        width: 100%;
    }

    .gold-image {
        filter: sepia(1) saturate(5) hue-rotate(10deg) brightness(1.2);
    }
</style>
<div class="nk-block">
    <div class="row">
        <div class="d-md-block col-md-12 col-xl-12 my-sm-3">            
            <div class="nk-block nk-block-lg">
                <div class="nk-block-head">
                    <div class="nk-block-between g-3">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">MyMI Membership Bundles</h3>
                            <div class="nk-block-des text-soft">
                                <p>Choose your pricing plan and start enjoying our service.</p>
                            </div>
                        </div>
                    </div>
                </div><!-- .nk-block-head -->
                <div class="row g-gs">
                    <?php if ($siteSettings->customizableMemberships === 1) : ?>
                    <div class="col-12">
                        <div class="card card-bordered pricing text-center">
                            <div class="pricing-body" id="customizeMembershipBanner">
                                <div class="pricing-media">
                                    <img class="gold-image" src="<?php echo base_url('assets/images/icons/plan-s1.svg'); ?>" alt="">
                                </div>
                                <div class="pricing-title text-white mx-auto">
                                    <h5 class="title">Customize Your Membership!</h5>
                                    <span class="sub-text">Build The Investment Account That Fits You and SAVE!</span>
                                </div>
                                <div class="pricing-action">
                                    <a href="<?php echo site_url('Wallets/Purchase/Memberships/Customize'); ?>" class="btn btn-primary">Customize Your Plan</a>
                                    <!-- <a href="#" class="btn btn-primary dynamicModalLoader" data-formtype="Memberships" data-endpoint="customizeMembership">Customize Your Plan</a> -->
                                </div>
                            </div>
                        </div><!-- .pricing -->
                    </div><!-- .col -->
                    <?php endif; ?>
                    <div class="col-md-6 col-xxl-3">
                        <div class="card card-bordered pricing text-center">
                            <div class="pricing-body">
                                <div class="pricing-media">
                                    <img src="<?php echo base_url('assets/images/icons/plan-s1.svg'); ?>" alt="">
                                </div>
                                <div class="pricing-title mx-auto">
                                    <h5 class="title">Starter</h5>
                                    <span class="sub-text">Ideal for individuals starting their investment journey at MyMI Wallet.</span>
                                </div>
                                <div class="pricing-amount">
                                    <div class="amount">$<?= $membershipStarterFee; ?> <span>/ Mth</span></div>
                                    <span class="bill">Billed Monthly</span>
                                </div>
                                <ul class="d-block d-md-none pricing-features">
                                    <li><span class="w-80">Personal Budgeting Tool</span> <span>Free</span></li>
                                    <li><span class="w-80">Manual Trade Tracker</span> <span>Free</span></li>
                                    <li><span class="w-80">Crypto Asset Creator</span> <span>Free</span></li>
                                </ul>
                                <div class="pricing-action">
                                    <a href="<?php echo site_url('Wallets/Purchase/Memberships/Starter'); ?>" class="btn btn-primary">Select Plan</a>
                                </div>
                            </div>
                        </div><!-- .pricing -->
                    </div><!-- .col -->
                    <div class="col-md-6 col-xxl-3">
                        <div class="card card-bordered pricing recommend text-center">
                            <span class="pricing-badge badge bg-primary">Recommend</span>
                            <div class="pricing-body">
                                <div class="pricing-media">
                                    <img src="<?php echo base_url('assets/images/icons/plan-s2.svg'); ?>" alt="">
                                </div>
                                <div class="pricing-title mx-auto">
                                    <h5 class="title">Basic</h5>
                                    <span class="sub-text">Perfect for users who need a bit more automation and integration.</span>
                                </div>
                                <div class="pricing-amount">
                                    <div class="amount">$<?= $membershipBasicFee; ?> <span>/ Mth</span></div>
                                    <span class="bill">Billed Monthly</span>
                                </div>
                                <ul class="d-block d-md-none pricing-features">
                                    <li><span class="w-80">Personal Budgeting Tool</span> <span>Free</span></li>
                                    <li><span class="w-80">Manual Trade Tracker</span> <span>Free</span></li>
                                    <li><span class="w-80">Crypto Asset Creator</span> <span>Free</span></li>
                                    <li><span class="w-80">MyMI Account Integration</span> <span>Included</span></li>
                                    <li><span class="w-80">MyMI Financial News</span> <span>Included</span></li>
                                    <li><span class="w-80">MyMI Real-Time Data</span> <span>Included</span></li>
                                    <li><span class="w-80">MyMI Trade Alerts</span> <span>Included</span></li>
                                </ul>
                                <div class="pricing-action">
                                    <a href="<?php echo site_url('Wallets/Purchase/Memberships/Basic'); ?>" class="btn btn-primary">Select Plan</a>
                                </div>
                            </div>
                        </div><!-- .pricing -->
                    </div><!-- .col -->
                    <div class="col-md-6 col-xxl-3">
                        <div class="card card-bordered pricing text-center">
                            <div class="pricing-body">
                                <div class="pricing-media">
                                    <img src="<?php echo base_url('assets/images/icons/plan-s3.svg'); ?>" alt="">
                                </div>
                                <div class="pricing-title mx-auto">
                                    <h5 class="title">Pro</h5>
                                    <span class="sub-text">Great for advanced users who need extensive tools and features.</span>
                                </div>
                                <div class="pricing-amount">
                                    <div class="amount">$<?= $membershipProFee; ?> <span>/ Mth</span></div>
                                    <span class="bill">Billed Monthly</span>
                                </div>
                                <ul class="d-block d-md-none pricing-features">
                                    <li><span class="w-80">Personal Budgeting Tool</span> <span>Free</span></li>
                                    <li><span class="w-80">Manual Trade Tracker</span> <span>Free</span></li>
                                    <li><span class="w-80">Crypto Asset Creator</span> <span>Free</span></li>
                                    <li><span class="w-80">MyMI Account Integration</span> <span>Included</span></li>
                                    <li><span class="w-80">MyMI Exclusive Access</span> <span>Included</span></li>
                                    <li><span class="w-80">MyMI Financial News</span> <span>Included</span></li>
                                    <li><span class="w-80">MyMI Real-Time Data</span> <span>Included</span></li>
                                    <li><span class="w-80">MyMI Trade Alerts</span> <span>Included</span></li>
                                </ul>
                                <div class="pricing-action">
                                    <a href="<?php echo site_url('Wallets/Purchase/Memberships/Pro'); ?>" class="btn btn-primary">Select Plan</a>
                                </div>
                            </div>
                        </div><!-- .pricing -->
                    </div><!-- .col -->
                    <div class="col-md-6 col-xxl-3">
                        <div class="card card-bordered pricing text-center">
                            <div class="pricing-body">
                                <div class="pricing-media">
                                    <img src="<?php echo base_url('assets/images/icons/plan-s1.svg'); ?>" alt="">
                                </div>
                                <div class="pricing-title mx-auto">
                                    <h5 class="title">Premium</h5>
                                    <span class="sub-text">For professionals and businesses needing comprehensive tools.</span>
                                </div>
                                <div class="pricing-amount">
                                    <div class="amount">$<?= $membershipPremiumFee; ?> <span>/ Mth</span></div>
                                    <span class="bill">Billed Monthly</span>
                                </div>
                                <ul class="d-block d-md-none pricing-features">
                                    <li><span class="w-80">Personal Budgeting Tool</span> <span>Free</span></li>
                                    <li><span class="w-80">Manual Trade Tracker</span> <span>Free</span></li>
                                    <li><span class="w-80">Crypto Asset Creator</span> <span>Free</span></li>
                                    <!-- <li><span class="w-80">Crypto Asset Creator</span> <span>Free</span></li>
                                    <li><span class="w-80">Crypto Exchange</span> <span>Included</span></li>
                                    <li><span class="w-80">Crypto Staking</span> <span>Included</span></li> -->
                                    <li><span class="w-80">MyMI Account Integration</span> <span>Included</span></li>
                                    <li><span class="w-80">MyMI Exclusive Access</span> <span>Included</span></li>
                                    <li><span class="w-80">MyMI Financial News</span> <span>Included</span></li>
                                    <li><span class="w-80">MyMI Real-Time Data</span> <span>Included</span></li>
                                    <li><span class="w-80">MyMI Trade Alerts</span> <span>Included</span></li>
                                    <li><span class="w-80">Annual Tax Preparation</span> <span>Included</span></li>
                                    <li><span class="w-80">Retirement Planner Tool</span> <span>Included</span></li>
                                    <li><span class="w-80"><strong></strong></span> <span></span></li>
                                    <li><span class="w-80"><strong>Additional Access &amp; Services:</strong></span> <span></span></li>
                                    <li><span class="w-80">Wealth Management</span> <span>Included</span></li>
                                    <li><span class="w-80">Investment Community Services & Tools</span> <span>Included</span></li>
                                    <li><span class="w-80">Community Real-Time Notification Services</span> <span>Included</span></li>
                                </ul>
                                <div class="pricing-action">
                                    <a href="<?php echo site_url('Wallets/Purchase/Memberships/Premium'); ?>" class="btn btn-primary">Select Plan</a>
                                </div>
                            </div>
                        </div><!-- .pricing -->
                    </div><!-- .col -->
                </div>
                <div class="row g-gs d-none d-md-block">
                    <div class="col-12">
                        <table class="table table-bordered text-center">
                            <thead style="font-size:1.75rem">
                                <tr>
                                    <th class="text-left w-40">Features</th>
                                    <th class="w-15">Starter</th>
                                    <th class="w-15">Basic</th>
                                    <th class="w-15">Pro</th>
                                    <th class="w-15">Premium</th>
                                </tr>
                            </thead>
                            <tbody style="font-size:1rem">
                                <?php foreach ($getFeatures as $features) : ?>
                                <tr>
                                    <td class="text-left" data-bs-toggle="tooltip" title="<?= $features['feature_description'] ?>">
                                        <a class="fw-bold" href="#features-breakdown"><?= $features['feature_name'] ?></a>
                                    </td>
                                    <?php if ($features['feature_level'] < 1) : ?>
                                    <td><em class="icon ni ni-check fw-bold text-blue"></em></td>
                                    <td><em class="icon ni ni-check fw-bold text-blue"></em></td>
                                    <td><em class="icon ni ni-check fw-bold text-blue"></em></td>
                                    <td><em class="icon ni ni-check fw-bold text-blue"></em></td>
                                    <?php elseif ($features['feature_level'] < 2) : ?>
                                    <td></td>
                                    <td><em class="icon ni ni-check fw-bold text-blue"></em></td>
                                    <td><em class="icon ni ni-check fw-bold text-blue"></em></td>
                                    <td><em class="icon ni ni-check fw-bold text-blue"></em></td>
                                    <?php elseif ($features['feature_level'] < 3) : ?>
                                    <td></td>
                                    <td></td>
                                    <td><em class="icon ni ni-check fw-bold text-blue"></em></td>
                                    <td><em class="icon ni ni-check fw-bold text-blue"></em></td>
                                    <?php else : ?>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><em class="icon ni ni-check fw-bold text-blue"></em></td>
                                    <?php endif; ?>
                                </tr>
                                <?php endforeach; ?>
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td></td>
                                    <td><a href="<?php echo site_url('Wallets/Purchase/Memberships/Starter'); ?>" class="btn btn-primary">Select Plan</a></td>
                                    <td><a href="<?php echo site_url('Wallets/Purchase/Memberships/Basic'); ?>" class="btn btn-primary">Select Plan</a></td>
                                    <td><a href="<?php echo site_url('Wallets/Purchase/Memberships/Pro'); ?>" class="btn btn-primary">Select Plan</a></td>
                                    <td><a href="<?php echo site_url('Wallets/Purchase/Memberships/Premium'); ?>" class="btn btn-primary">Select Plan</a></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div id="features-breakdown" class="nk-block d-none d-md-block">
                    <div class="row g-gs">
                        <div class="col-12">
                            <div class="card card-bordered">
                                <div class="card-inner pb-0">
                                    <div class="nk-block-head">
                                        <h4 class="nk-block-title">Features Breakdown</h4>
                                    </div>
                                    <div class="nk-block-des text-soft">
                                        <p>Learn more about what each feature offers to enhance your financial management experience.</p>
                                    </div>
                                </div>
                                <div class="card-inner pt-3">
                                    <div class="row g-gs">
                                        <?php foreach ($getFeatures as $features) : ?>
                                        <?php 
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
                                        ?>
                                        <div class="col-12 col-md-6">
                                            <h5><?= $features['feature_name'] ?></h5>
                                            <p><?= $features['feature_description'] ?></p>                                            
                                            <a class="btn btn-primary text-white dynamicModalLoader" data-formtype="ProductDetails" data-endpoint="<?= $feature['viewFile'] ?>" data-accountid="<?= $featurePrice ?>">Learn More!</a> 
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .nk-block -->
        </div>
    </div>
</div>
