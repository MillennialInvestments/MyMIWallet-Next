<?php
// $referralCode = null;

// // Ensure $uri is set before accessing it
// if (isset($uri)) {
//     if ($uri->getTotalSegments() >= 3 && $uri->getSegment(1) === 'MyMI') {
//         // Use segment 3 if 'MyMI' is the first segment and there are at least 3 segments
//         $referralCode = $uri->getSegment(3);
//     } elseif ($uri->getTotalSegments() >= 1 && $uri->getSegment(1) !== 'MyMI') {
//         // Use segment 1 if 'MyMI' is not the first segment
//         $referralCode = $uri->getSegment(1);
//     } else { 
//         $referralCode = null; 
//     }
// }
?>

<div class="card">
    <img class="mb-3" src="<?php echo base_url('assets/images/MyMI-Wallet-Logo-Black.png'); ?>" srcset="<?php echo base_url('assets/images/MyMI-Wallet-Logo-Black.png'); ?>" alt="MyMI Wallet - Investment Accounting/Analytical Software & Crypto Asset Marketplace/Exchange">
    <h1 class="mbr-section-title mbr-bold mb-1 pb-3 mbr-fonts-style card-title display-7 text-center">Create Your Free Account!</h1>	
    <div class="card-body">
        <?php helper('form'); ?>
        <?= view('App\Views\Auth\_message_block') ?>

        <form class="form-horizontal" id="user_register_form" action="<?= url_to('register') ?>" method="POST">
            <?= csrf_field() ?>
            <input type="hidden" name="referralCode" value="<?= isset($referralCode) ? $referralCode : set_value('referralCode'); ?>">

            <!-- <form class="form-horizontal" autocomplete="off" id="user_register_form"> -->
            <!-- Account Type -->
                    <?php $registrationAttribution = is_array($registrationAttribution ?? null) ? $registrationAttribution : []; ?>
                    <input type="hidden" id="referral" name="referral" value="<?= esc($referralCode ?? ($registrationAttribution['referral_slug'] ?? '')) ?>">
                    <input type="hidden" id="referral_link" name="referral_link" value="<?= esc($referralLink ?? 'Default') ?>">
                    <input type="hidden" id="source_channel" name="source_channel" value="<?= esc($registrationAttribution['source_channel'] ?? ($referralPlatform ?? 'direct')) ?>">
                    <input type="hidden" id="campaign_code" name="campaign_code" value="<?= esc($registrationAttribution['campaign_code'] ?? '') ?>">
            <div class="form-group">
                <label for="account_type">Account Type </label>
                <select class="form-control" id="account_type" name="account_type" required>                 
                <?php
                    $account_type_values = [
                        'Personal' => 'Personal',
                        'Business' => 'Business',
                    ];
                    foreach ($account_type_values as $value => $display_text) {
                        $selected = (old('account_type') == $value) ? ' selected="selected"' : "";

                        echo '<option value="'.$value.'"'.$selected.'>'.$display_text.'</option>';
                    }
                ?>
                </select>
            </div>

            <!-- Email Field -->
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= esc(set_value('email')) ?>" required>
            </div>

            <!-- Username Field -->
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?= esc(set_value('username')) ?>" required>
            </div>

            <!-- Password Fields -->
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="" required>
            </div>

            <div class="form-group">
                <label for="pass_confirm">Confirm Password</label>
                <input type="password" class="form-control" id="pass_confirm" name="pass_confirm" value="" required>
            </div>
            
            <div class="form-group">
                <label for="pass_confirm">Referral Code</label>
                <input type="text" class="form-control" id="referral" name="referral" value="<?= isset($referralCode) ? $referralCode : set_value('referral'); ?>">
            </div>

            <!-- Other Fields as Needed -->

            <!-- Submit Button -->
            <button type="submit" class="btn btn-block btn-primary">Register</button>
            
            <div class="control-group form-row pt-3">
                <div class="controls col-12 pl-0 ms-0">
                    <div class="accordion-item">            
                        <a href="#" class="accordion-head border-bottom collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-item-2-2">           
                            <strong>Service Disclosure</strong>                   
                            <span class="accordion-icon"></span>            
                        </a>            
                        <div class="accordion-body collapse" id="accordion-item-2-2" data-bs-parent="#accordion-2" >              
                            <div class="accordion-inner">           
                                <small class="text-muted">
                                We are committed to complying with all U.S. regulations that help prevent, detect and remediate unlawful behavior by customers and virtual currency developers when using Millennial Investment's MyMI Wallet trading platform or any of the company’s other services. 
                                MyMI Wallet is also not a regulated exchange under U.S. securities laws. 
                                </small>           
                            </div>            
                        </div>    
                        <div class="accordian-footer py-2 pl-4">
                            <small>By registering an account, you are agreeing to our <br><a href="<?php echo site_url('/Legal/Terms-And-Conditions'); ?>">Terms &amp; Conditions</a> and <a href="<?php echo site_url('/Legal/Privacy-Policy'); ?>">Privacy Policy</a> at MyMI Wallet, LLC.</small>
                        </div>    
                    </div> 
                </div>
            </div>
        <?= form_close(); ?>
    </div>
</div>
