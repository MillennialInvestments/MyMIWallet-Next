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
        width: 10%; 
    }
</style>
<div class="bg-light border-bottom py-3">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <ul class="breadcrumb mb-1">
                    <li class="breadcrumb-item"><a href="<?= site_url('/'); ?>">Home</a></li>
                    <li class="breadcrumb-item"><a href="<?= site_url('Memberships'); ?>">Memberships</a></li>
                    <?php if (!empty($uri->getSegment(2))): ?>
                    <li class="breadcrumb-item text-primary active" aria-current="page"><?= esc(ucfirst($uri->getSegment(2))); ?></li>
                    <?php else: ?>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Pricing &amp; Plans</li>
                    <?php endif; ?>
                </ul>
                <h2 class="mb-0">MyMI Memberships</h2>
            </div>
            <div class="col-md-4 text-md-end mt-2 mt-md-0">
                <a href="<?= site_url('Dashboard'); ?>" class="btn btn-outline-primary btn-sm">
                    <em class="icon ni ni-dashboard"></em> Investor Dashboard
                </a>
            </div>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="content">
                <?php 
                if (!empty($uri->getSegment(2))) {
                    if ($uri->getSegment(2) === 'Starter') {     
                        $fieldData['membership_fee'] = $siteSettings->memberStarterFee;       
                        echo view('UserModule\Views\Wallets\Purchase\Memberships\Starter', $fieldData);
                    } elseif ($uri->getSegment(2) === 'Basic') {
                        $fieldData['membership_fee'] = $siteSettings->memberBasicFee;       
                        echo view('UserModule\Views\Wallets\Purchase\Memberships\Basic', $fieldData);
                    } elseif ($uri->getSegment(2) === 'Pro') {
                        $fieldData['membership_fee'] = $siteSettings->memberProFee;       
                        echo view('UserModule\Views\Wallets\Purchase\Memberships\Pro', $fieldData);
                    } elseif ($uri->getSegment(2) === 'Premium') {
                        $fieldData['membership_fee'] = $siteSettings->memberPremiumFee;       
                        echo view('UserModule\Views\Wallets\Purchase\Memberships\Premium', $fieldData);
                    } elseif ($uri->getSegment(2) === 'Customize') {
                        $fieldData['membership_fee'] = $siteSettings->memberPremiumFee;       
                        echo view('UserModule\Views\Wallets\Purchase\Memberships\Customize', $fieldData);
                    } elseif ($uri->getSegment(2) === 'NEWYEARS') {
                        $fieldData['promoCode'] = $promoCode ?? $uri->getSegment(2); 
                        $fieldData['membershipStarterFee'] = $siteSettings->memberStarterFee;  
                        $fieldData['membershipBasicFee'] = $siteSettings->memberBasicFee;  
                        $fieldData['membershipProFee'] = $siteSettings->memberProFee;  
                        $fieldData['membershipPremiumFee'] = $siteSettings->memberPremiumFee;  
                        $fieldData['membershipStarterFeePromo'] = $siteSettings->memberStarterFee - 7;  
                        $fieldData['membershipBasicFeePromo'] = $siteSettings->memberBasicFee - 20;  
                        $fieldData['membershipProFeePromo'] = $siteSettings->memberProFee - 35;  
                        $fieldData['membershipPremiumFeePromo'] = $siteSettings->memberPremiumFee - 70;  
                        echo view('UserModule\Views\Wallets\Purchase\Memberships\Promotions', $fieldData);
                    }
                } else {
                    $fieldData['membershipStarterFee'] = $siteSettings->memberStarterFee;  
                    $fieldData['membershipBasicFee'] = $siteSettings->memberBasicFee;  
                    $fieldData['membershipProFee'] = $siteSettings->memberProFee;  
                    $fieldData['membershipPremiumFee'] = $siteSettings->memberPremiumFee;  
                    echo view('UserModule\Views\Wallets\Purchase\Memberships', $fieldData);
                }
                ?>
            </div>
        </div>
    </div>
</div>