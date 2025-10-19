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
<div class="bg-light mt-3 pt-3 pt-xl-3 pb-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= site_url('/'); ?>">Home</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">MyMI Memberships</li>
                </ul>
                <h1>MyMI Memberships</h1>
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
                        echo view('Wallets\Purchase\Memberships\Starter', $fieldData);
                    } elseif ($uri->getSegment(2) === 'Basic') {
                        $fieldData['membership_fee'] = $siteSettings->memberBasicFee;       
                        echo view('Wallets\Purchase\Memberships\Basic', $fieldData);
                    } elseif ($uri->getSegment(2) === 'Pro') {
                        $fieldData['membership_fee'] = $siteSettings->memberProFee;       
                        echo view('Wallets\Purchase\Memberships\Pro', $fieldData);
                    } elseif ($uri->getSegment(2) === 'Premium') {
                        $fieldData['membership_fee'] = $siteSettings->memberPremiumFee;       
                        echo view('Wallets\Purchase\Memberships\Premium', $fieldData);
                    } elseif ($uri->getSegment(2) === 'Customize') {
                        $fieldData['membership_fee'] = $siteSettings->memberPremiumFee;       
                        echo view('Wallets\Purchase\Memberships\Customize', $fieldData);
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
                        echo view('Wallets\Purchase\Memberships\Promotions', $fieldData);
                    }
                } else {
                    $fieldData['membershipStarterFee'] = $siteSettings->memberStarterFee;  
                    $fieldData['membershipBasicFee'] = $siteSettings->memberBasicFee;  
                    $fieldData['membershipProFee'] = $siteSettings->memberProFee;  
                    $fieldData['membershipPremiumFee'] = $siteSettings->memberPremiumFee;  
                    echo view('Wallets\Purchase\Memberships', $fieldData);
                }
                ?>
            </div>
        </div>
    </div>
</div>