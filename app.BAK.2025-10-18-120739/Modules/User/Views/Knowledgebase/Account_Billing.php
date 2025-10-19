<?php 
$MyMIGold_Value = $siteSettings->MyMIGCoinValue;
$MyMIGold_TierOne = $siteSettings->mymiTierOne;
$MyMIGold_TierOneCost = $MyMIGold_Value * $MyMIGold_TierOne;
$MyMIGold_TierTwo = $siteSettings->mymiTierTwo;
$MyMIGold_TierTwoCost = $MyMIGold_Value * $MyMIGold_TierTwo;
$MyMIGold_TierThree = $siteSettings->mymiTierThree;
$MyMIGold_TierThreeCost = $MyMIGold_Value * $MyMIGold_TierThree;
$MyMIGold_TierFour = $siteSettings->mymiTierFour;
$MyMIGold_TierFourCost = $MyMIGold_Value * $MyMIGold_TierFour;
$MyMIGold_TierFive = $siteSettings->mymiTierFive;
$MyMIGold_TierFiveCost = $MyMIGold_Value * $MyMIGold_TierFive;
$subViewData = [
    'siteSettings' => $siteSettings,
    'socialMedia' => $socialMedia,
]; 
?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="content">
                <div class="intro-section-title">
                    <span class="overline-title intro-section-subtitle">Account / Billing</span>
                    <h3 class="intro-heading-lead">Account / Billing</h3>
                    <div class="intro-section-desc">
                        <p class="lead"></p>
                    </div>
                </div>

                <div class="row py-4" id="overview">
                    <div class="col-xl-12">
                        <div class="intro-section-title">
                            <h5 class="intro-heading-lead">Overview</h5>
                            <div class="intro-section-desc">
                                <p class="lead fs-14px">
                                    This article will introduce you to our Account & Billing Policy.<br>
                                    This article will cover a majority of what our Trade Tracker is designed to do by default, but we provide links to more in-depth information regarding certain functionality and tools.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row py-4" id="account-information">
                    <div class="col-xl-12">
                        <div class="intro-section-title">
                            <h3 class="intro-heading-lead">Account Information</h3>
                            <div class="intro-section-desc">
                                <p class="lead"></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row py-4" id="managing-account-information">
                    <div class="col-xl-12">
                        <div class="intro-section-title">
                            <h5 class="intro-heading-lead">Managing Your Account Information</h5>
                            <div class="intro-section-desc">
                                <p class="lead fs-14px">
                                    For the most part, you can easily edit your personal account information via your <a href="<?php echo site_url('Investor-Profile'); ?>">Investor Profile</a>. For any additional information that may be required such as <a href="#">KYC Verification Documentation</a>, Required Company Documentation for our Partner Program will be requested on a per-account basis. All requests for information will be provided with notification via email (<a href="mailto:support@mymiwallet.com">support@mymiwallet.com</a>) and completed within the MyMI Wallet Dashboard. Any documentation requested from any other communication could be potential for fraud and spam. Please disregard if this were ever to be the case.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <?php echo view('Knowledgebase\includes\Partnerships\subheader', $subViewData); ?>
                <?php echo view('Knowledgebase\includes\Partnerships\full_content', $subViewData); ?>
                <?php echo view('Knowledgebase\includes\Partnerships\more_details', $subViewData); ?>

                <div class="row py-4" id="kyc-verification">
                    <div class="col-xl-12">
                        <div class="intro-section-title">
                            <h3 class="intro-heading-lead">KYC Verification</h3>
                            <div class="intro-section-desc">
                                <p class="lead"></p>
                            </div>
                        </div>
                    </div>
                </div>

                <?php echo view('Knowledgebase\includes\KYC_Verification\getting_started', $subViewData); ?>
                <?php echo view('Knowledgebase\includes\KYC_Verification\more_details', $subViewData); ?>

                <div class="row py-4" id="billing-and-payment">
                    <div class="col-xl-12">
                        <div class="intro-section-title">
                            <h3 class="intro-heading-lead">Billing & Payment</h3>
                            <div class="intro-section-desc">
                                <p class="lead"></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row py-4" id="partnership-integration">
                    <div class="col-xl-12">
                        <div class="intro-section-title">
                            <h3 class="intro-heading-lead">MyMI Referral Program</h3>
                            <div class="intro-section-desc">
                                <p class="lead"></p>
                            </div>
                        </div>
                    </div>
                </div>

                <?php echo view('Knowledgebase\includes\Referral_Program\getting_started', $subViewData); ?>
                <?php echo view('Knowledgebase\includes\Referral_Program\more_details', $subViewData); ?>


                <!-- <div class="row py-4" id="introduction-to-mymi-gold">
                    <div class="col-xl-12">
                        <div class="intro-section-title">
                            <h5 class="intro-heading-lead">May We Introduce You To MyMI Gold?</h5>
                            <div class="intro-section-desc">
                                <p class="lead fs-14px">
                                    To provide our Investors and Partnerships with a seamless way to make purchases and even sell assets on our Marketplace and Exchange, we developed an In-App Coin to process those transactions. <a href="#">MyMI Gold</a> was designed to be our In-App Cryptocurrency that Investors and Partners would utilize to purchase Premium Feature Add-Ons to add to their membership packages. We wanted to take the opportunity to allow our members to develop customizable membership packages to only access the resources they need to conduct their investment accounting & analytical studies.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row py-4" id="how-is-mymi-gold-valued">
                    <div class="col-xl-12">
                        <div class="intro-section-title">
                            <h5 class="intro-heading-lead">How is MyMI Gold Valued?</h5>
                            <div class="intro-section-desc">
                                <p class="lead fs-14px">
                                    MyMI Gold was developed as our Platform's Stablecoin Comparison, so the value of MyMI Gold is determined by a 1:1 Ratio to the Dollar ($USD). MyMI Gold is currently sold in packages designed to ensure all members could access the tools they require.<br>
                                    MyMI Gold can be purchased in the following package amounts:
                                    <dl class="row">
                                        <dt class="col-sm-3">$<?php echo $MyMIGold_TierOneCost; ?></dt>
                                        <dd class="col-sm-9"><?php echo $MyMIGold_TierOne; ?> MyMI Gold</dd>
                                    </dl>
                                    <dl class="row">
                                        <dt class="col-sm-3">$<?php echo $MyMIGold_TierTwoCost; ?></dt>
                                        <dd class="col-sm-9"><?php echo $MyMIGold_TierTwo; ?> MyMI Gold</dd>
                                    </dl>
                                    <dl class="row">
                                        <dt class="col-sm-3">$<?php echo $MyMIGold_TierThreeCost; ?></dt>
                                        <dd class="col-sm-9"><?php echo $MyMIGold_TierThree; ?> MyMI Gold</dd>
                                    </dl>
                                    <dl class="row">
                                        <dt class="col-sm-3">$<?php echo $MyMIGold_TierFourCost; ?></dt>
                                        <dd class="col-sm-9"><?php echo $MyMIGold_TierFour; ?> MyMI Gold</dd>
                                    </dl>
                                    <dl class="row">
                                        <dt class="col-sm-3">$<?php echo $MyMIGold_TierFiveCost; ?></dt>
                                        <dd class="col-sm-9"><?php echo $MyMIGold_TierFive; ?> MyMI Gold</dd>
                                    </dl>
                                </p>
                            </div>
                        </div>
                    </div>
                </div> -->

                <div class="row py-4" id="billing-and-payment-schedule">
                    <div class="col-xl-12">
                        <div class="intro-section-title">
                            <h5 class="intro-heading-lead">Billing & Payment Schedule</h5>
                            <div class="intro-section-desc">
                                <p class="lead fs-14px">
                                    Premium Features are purchased on a <strong>Month-to-Month Basis</strong> (a recurring cost) and what our members are required to pay every month is determined by the Premium Features activated on their account, along with the Total Number of each Premium Feature(s) the member has purchased.<br>
                                    Invoicing for all Premium Features is conducted on the <strong>14th of every month</strong> and automatic payments are set up to obtain funds to cover the cost of those Premium Features on the <strong>15th of every month</strong>. The allocation of funds will first check the <strong>MyMI Gold Balance</strong> of a member's account first and retrieve the required amount of funds in MyMI Gold first. If the user doesn't have enough to cover the cost of their Monthly Recurring Premium Feature Costs, the member will be notified to purchase additional MyMI Gold to cover that expense.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row py-4" id="payment-history">
                    <div class="col-xl-12">
                        <div class="intro-section-title">
                            <h5 class="intro-heading-lead">Payment History</h5>
                            <div class="intro-section-desc">
                                <p class="lead fs-14px">
                                    You can review your Payment History by visiting your <a href="<?php echo site_url('Investor-Profile'); ?>">Investor Profile</a> and selecting the <a href="<?php echo site_url('Investor-Profile'); ?>">Billing / Payment</a> tab to view and manage your billing and payment history.<br>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><a href="<?php echo site_url('Knowledgebase/Types-Of-Accounts'); ?>">View Billing & Payment History</a></li>
                                    </ul>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php //echo view('Knowledgebase\includes\Customer_Support\header', $subViewData); ?>
                <?php //echo view('Knowledgebase\includes\Customer_Support\contact_support', $subViewData); ?>
            </div>
        </div>
    </div>
</div>
