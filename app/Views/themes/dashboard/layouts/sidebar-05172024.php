<?php
// Config Settings
$beta                               = $siteSettings->beta;
$stage                              = $siteSettings->stage;
$assetOperations                    = $siteSettings->assetOperations;
$bettingOperations                  = $siteSettings->bettingOperations;
$debtOperations                     = $siteSettings->debtOperations;
$educateOperations                  = $siteSettings->educateOperations;
$exchangeOperations                 = $siteSettings->exchangeOperations;
$investmentOperations               = $siteSettings->investmentOperations;
$marketplaceOperations              = $siteSettings->marketplaceOperations;
$newsOperations                     = $siteSettings->newsOperations;
$partnerOperations                  = $siteSettings->partnerOperations;
$referralOperations                 = $siteSettings->referralOperations;
$retirementOperations               = $siteSettings->retirementOperations;

$communityTabs						= $siteSettings->communityTabs;
$exchangeTab						= $siteSettings->exchangeTab;
$marketMovers						= date("F-jS-Y");
$userType							= 'Premium';
// log_message('info', 'themes\dashboard\layouts\sidebar - L23 $userbudget: ' . print_r($userBudget,true));
// log_message('info', 'themes\dashboard\layouts\sidebar - L21 $myMIWalletSummary: ' . print_r($myMIWalletSummary,true));
$MyMIWalletSummary                  = [];
$walletSum                          = $userAccount['assetNetValue'] ?? 0;
$userBudget                         = $userBudget ?? '';
$totalAccountBalance                = $userBudget['totalAccountBalance'];
$totalAccountBalanceFMT             = $userBudget['totalAccountBalanceFMT'];
if (!empty($userAccount->assetNetValue)) {
    $walletAmount                   = $walletSum;
} else {
    $walletAmount					= $walletSum;
}
$walletGains						= $userAccount->walletGains ?? '';
$MyMIGCoinSum			            = $userGoldData->coinSum ?? '0';
if (!empty($cuDisplayName)) {
    $initials						= $cuDisplayName[0] . $cuDisplayName[1];
} else {
    $initials						= 'Me';
}

$agent = service('request')->getUserAgent();

if ($agent->isMobile()) {
    echo '<div id="sidebarMenu" class="nk-sidebar nk-sidebar-fixed is-dark pt-xl-4 collapse sidebar-offcanvas">';
} else {
    echo '<div class="nk-sidebar nk-sidebar-fixed is-dark" id="collapseSidebar">';
}
// echo '<div class="nk-sidebar nk-sidebar-fixed is-dark pt-4 collapse sidebar-offcanvas" id="collapseSidebar">';
?>
	<div class="nk-sidebar-element nk-sidebar-head w-90 m-auto d-flex justify-content-center">
		<div class="nk-sidebar-brand ml-xl-0 pt-xl-0">
			<a href="<?php echo site_url('/Dashboard'); ?>" class="logo-link nk-sidebar-logo pt-xl-1 pr-xl-2">
                <?php
                // if ($this->agent->is_mobile()) {
                //     echo '
				// 	<img class="logo-light logo-img responsive-logo" src="' . base_url('assets/images/Millennial-Investments-179x54.png') . '" srcset="' . base_url('assets/images/Millennial-Investments-179x54.png') . '" alt="logo" />
				// 	<img class="logo-dark logo-img responsive-logo" style="" src="' . base_url('assets/images/Millennial-Investments-179x54.png') . '" alt="logo" />
				// 	';
                // } else {
                //     echo '
				// 	<img class="logo-light logo-img responsive-logo w-60 my-2 d-lg-block" src="' . base_url('assets/images/Millennial-Investments.png') . '" srcset="' . base_url('assets/images/Millennial-Investments.png') . '" alt="logo" />
				// 	<img class="logo-dark logo-img responsive-logo w-60 my-2 d-lg-block" src="' . base_url('assets/images/Millennial-Investments.png') . '" srcset="' . base_url('assets/images/Millennial-Investments-213x70.png') . '" alt="logo" />
				// 	';
                // }
                echo '
                <img class="logo-light logo-img responsive-logo w-90 h-90 d-lg-block" src="' . base_url('assets/images/Millennial-Investments.png') . '" srcset="' . base_url('assets/images/Millennial-Investments.png') . '" alt="logo"/>
			    <img class="logo-dark logo-img responsive-logo w-80 my-2 d-lg-block" src="' . base_url('assets/images/Millennial-Investments.png') . '" srcset="' . base_url('assets/images/Millennial-Investments-213x70.png') . '" alt="logo" />
                ';
                ?>
			</a> 
		</div>  
        <div class="nk-menu-trigger mr-n2">
            <a type="button" class="user-card-wrap pt-1 pb-3 py-xl-2" data-bs-toggle="collapse" href="#collapseSidebar" role="button" aria-expanded="false" aria-controls="collapseSidebar">
                <em class="icon ni ni-arrow-left" id="close-sidebar-nav-arrow" style="font-size:23px;"></em>
            </a>
        </div>
	</div>
	<div class="nk-sidebar-element py-1">
        <div class="nk-sidebar-body scrollable-sidebar" data-simplebar> <!-- Added scrollable-sidebar class here -->
            <div class="nk-sidebar-content">
				<div class="nk-sidebar-widget pt-1 d-none d-md-block">
					<div class="user-account-info between-center">
						<div class="user-account-main">
							<h6 class="overline-title-alt">Available Balance</h6>
							<div class="user-balance">
								<?php echo $totalAccountBalanceFMT; ?> 
								<small class="currency currency-usd">USD</small>
							</div>
							<div class="user-balance-alt">
								<?php
                                //~ echo $walletGains . ' <span class="currency currency-usd">USD</span> (' . $walletPercentChange . ')';
                                // echo $walletGains . ' <span class="currency currency-usd">USD</span>';
                                echo $MyMIGCoinSum . ' <span class="currency currency-usd">MyMI Gold</span> <a class="currency currency-usd" href="' . site_url('/Wallets/Purchase/MyMIGold') . '">Purchase</a>';
                                ?>
							</div>

						</div>
<!--
						<a href="#" class="btn btn-icon" style="width: 1rem;"><i class="icon-chart"></i></a>
-->
					</div>
					<?php
                    /*
                    <div class="user-account-actions">
                        <ul class="g-3">
                            <li>
                                <a href="<?php echo site_url('/Add-Wallet-Deposit'); ?>" class="btn btn-lg btn-primary"><span>Add Deposit</span></a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('/Add-Wallet-Withdraw'); ?>" class="btn btn-lg btn-warning"><span>Add Withdraw</span></a>
                            </li>
                        </ul>
                    </div>
                    */
                    ?>
				</div>
				<?php // Mobile Sidebar?>
				<div class="nk-sidebar-widget nk-sidebar-widget-full d-block d-md-none pt-1">
                    <a class="nk-profile-toggle toggle-expand" data-bs-target="sidebarProfile" href="#">
						<div class="user-card-wrap pt-1 pb-3 py-xl-2">
							<div class="user-card">
								
								<div class="user-avatar"><span><?php echo strtoupper($initials); ?></span></div>
								<div class="user-info"><span class="lead-text"><?php echo $cuDisplayName; ?></span><span class="sub-text"><?php echo $cuEmail; ?></span></div>
							</div>
						</div>
					</a>
					<div class="nk-profile-content" data-content="sidebarProfile">
						<div class="user-account-info between-center">
							<div class="user-account-main">
								<h6 class="overline-title-alt">Available Balance</h6>
								<div class="user-balance">
									<?php echo $totalAccountBalanceFMT; ?>
									<small class="currency currency-usd">USD</small>
								</div>
								<div class="user-balance-alt">
									<?php
                                    //~ echo $walletGains . ' <span class="currency currency-usd">USD</span> (' . $walletPercentChange . ')';
                                    echo $MyMIGCoinSum . ' <span class="currency currency-usd">MyMI GOLD</span> <a class="currency currency-usd" href="' . site_url('/Purchase/MyMIGold') . '">Purchase</a>';
                                    ?>
								</div>

							</div>
<!--
							<a href="#" class="btn btn-icon" style="width: 1rem;"><i class="icon-chart"></i></a>
-->
						</div>
					</div>
				</div>
				<div class="nk-sidebar-menu">
					<ul class="nk-menu">
						<li class="nk-menu-heading"><h6 class="overline-title">Account</h6></li>
						<!-- <li class="nk-menu-item">
							<a href="<?php //echo site_url('/Dashboard'); ?>" class="nk-menu-link">
								<span class="nk-menu-icon"><em class="icon ni ni-home"></em></span><span class="nk-menu-text">Dashboard</span>
							</a>
						</li> -->
                        <li class="nk-menu-item">
							<a href="<?php echo site_url('/Account'); ?>" class="nk-menu-link">
								<span class="nk-menu-icon"><em class="icon ni ni-account-setting"></em></span><span class="nk-menu-text">Account / Billing</span>
							</a>
						</li>
                        <?php
                        if ($assetOperations === 1) {
                        ?>
                        <li class="nk-menu-item">
							<a href="<?php echo site_url('/Assets'); ?>" class="nk-menu-link">
								<span class="nk-menu-icon"><em class="icon ni ni-growth"></em></span><span class="nk-menu-text">My Assets</span>
							</a>
						</li> 
                        <?php 
                        }
                        ?>
                        <li class="nk-menu-item">
							<a href="<?php echo site_url('/Budget'); ?>" class="nk-menu-link">
								<span class="nk-menu-icon"><em class="icon ni ni-pie"></em></span><span class="nk-menu-text">My Budget</span>
							</a>
						</li> 
                        <?php 
                        if ($debtOperations === 1) {
                        ?>
                        <li class="nk-menu-item">
							<a href="<?php echo site_url('/Wallets/Debt'); ?>" class="nk-menu-link">
								<span class="nk-menu-icon"><em class="icon ni ni-activity-round"></em></span><span class="nk-menu-text">My Credit</span>
							</a>
						</li> 
                        <?php 
                        }
                        ?>                        
                        <?php
                        if ($investmentOperations === 1) {
                        ?>
						<li class="nk-menu-item">
							<a href="<?php echo site_url('/Investments'); ?>" class="nk-menu-link">
								<span class="nk-menu-icon"><i class="icon ni ni-growth"></i></span><span class="nk-menu-text">My Investments</span>
							</a>
						</li>
                        <?php 
                        }
                        ?>
                        <?php 
                        if ($educateOperations === 1) {
                        ?>
                        <li class="nk-menu-item">
							<a href="<?php echo site_url('/Knowledgebase'); ?>" class="nk-menu-link">
								<span class="nk-menu-icon"><em class="icon ni ni-book-read"></em></span><span class="nk-menu-text">My Learning</span>
							</a>
						</li> 
                        <?php 
                        }
                        ?>
                        <?php 
                        if ($marketplaceOperations === 1) {
                        ?>
                        <li class="nk-menu-item">
							<a href="<?php echo site_url('/My-Marketplace'); ?>" class="nk-menu-link">
								<span class="nk-menu-icon"><em class="icon ni ni-activity-round"></em></span><span class="nk-menu-text">My Marketplace</span>
							</a>
						</li> 
                        <?php 
                        }
                        ?>
                        <?php 
                        if ($newsOperations === 1) {
                        ?>
                        <li class="nk-menu-item">
							<a href="<?php echo site_url('/Knowledgebase'); ?>" class="nk-menu-link">
								<span class="nk-menu-icon"><em class="icon ni ni-activity-round"></em></span><span class="nk-menu-text">My News</span>
							</a>
						</li> 
                        <?php 
                        }
                        ?>
                        <?php
                        if ($partnerOperations === 1) {
                        ?>
						<li class="nk-menu-item">
							<a href="<?php echo site_url('/My-Retirement'); ?>" class="nk-menu-link">
								<span class="nk-menu-icon"><i class="icon ni ni-share-alt"></i></span><span class="nk-menu-text">My Partnerships</span>
							</a>
						</li>
                        <?php 
                        }
                        ?>
                        <?php
                        if ($retirementOperations === 1) {
                        ?>
						<li class="nk-menu-item">
							<a href="<?php echo site_url('/My-Retirement'); ?>" class="nk-menu-link">
								<span class="nk-menu-icon"><i class="icon ni ni-share-alt"></i></span><span class="nk-menu-text">My Retirement</span>
							</a>
						</li>
                        <?php 
                        }
                        ?>
                        <?php
                        if ($referralOperations === 1) {
                        ?>
						<li class="nk-menu-item">
							<a href="<?php echo site_url('/My-Referrals'); ?>" class="nk-menu-link">
								<span class="nk-menu-icon"><i class="icon ni ni-share-alt"></i></span><span class="nk-menu-text">My Referrals</span>
							</a>
						</li>
                        <?php 
                        }
                        ?>
                        <?php
                        if ($bettingOperations === 1) {
                        ?>
						<li class="nk-menu-item">
							<a href="<?php echo site_url('/MyMISports'); ?>" class="nk-menu-link">
								<span class="nk-menu-icon"><i class="icon ni ni-share-alt"></i></span><span class="nk-menu-text">My Sports</span>
							</a>
						</li>
                        <li class="nk-menu-item has-sub">
                            <a href="#" class="nk-menu-link nk-menu-toggle" data-bs-toggle="toggle" data-bs-target="#sidebarSupportMenu" data-bs-original-title="" title="">
                                <span class="nk-menu-icon"><em class="icon ni ni-tile-thumb"></em></span>
                                <span class="nk-menu-text">My Sports</span>
                            </a>
                            <ul class="nk-menu-sub" id="sidebarSupportMenu">
                                <li class="nk-menu-item">
                                    <a href="<?php echo site_url('/MyMISports/NBA'); ?>" class="nk-menu-link" data-bs-original-title="" title=""><span class="nk-menu-text">NBA Stats</span></a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="<?php echo site_url('/MyMISports/NFL'); ?>" class="nk-menu-link" data-bs-original-title="" title=""><span class="nk-menu-text">NFL Stats</span></a>
                                </li>
                            </ul><!-- .nk-menu-sub -->
                        </li>
                        <?php 
                        }
                        ?>
                        <li class="nk-menu-item">
							<a href="<?php echo site_url('/Wallets'); ?>" class="nk-menu-link">
								<span class="nk-menu-icon"><em class="icon ni ni-wallet"></em></span><span class="nk-menu-text">My Wallets</span>
							</a>
						</li> 
                        <li class="nk-menu-item">
							<a href="<?php echo site_url('/Support'); ?>" class="nk-menu-link">
								<span class="nk-menu-icon"><em class="icon ni ni-tile-thumb"></em></span><span class="nk-menu-text">Support</span>
							</a>
						</li> 
                        <li class="nk-menu-item has-sub">
                            <a href="#" class="nk-menu-link nk-menu-toggle">
                                <span class="nk-menu-icon"><em class="icon ni ni-coin"></em></span>
                                <span class="nk-menu-text text-yellow">Get MyMIGold</span>
                            </a>
                            <ul class="nk-menu-sub custom-dropdown d-none">
                                <li class="nk-menu-item">
                                    <button class="nk-menu-link btn dynamicModalLoader" data-formtype="Purchase" data-endpoint="purchasePaypal" title=""><span class="nk-menu-text">Purchase</span></button>
                                </li>
                                <?php if($siteSettings->monthlyMemberships === 1): ?>
                                <li class="nk-menu-item">
                                    <a href="<?php echo site_url('Wallets/Purchase/Memberships'); ?>" class="nk-menu-link" title=""><span class="nk-menu-text">Memberships</span></a>
                                </li>
                                <?php endif; ?>
                                <?php if($siteSettings->dailyGoals === 1): ?>
                                <li class="nk-menu-item">
                                    <a href="<?php echo site_url('MyMI-Gold/Goals/Daily'); ?>" class="nk-menu-link" title=""><span class="nk-menu-text">Daily - 0 Free Left</span></a>
                                </li>
                                <?php endif; ?>
                                <?php if($siteSettings->weeklyGoals === 1): ?>
                                <li class="nk-menu-item">
                                    <a href="<?php echo site_url('MyMI-Gold/Goals/Weekly'); ?>" class="nk-menu-link" title=""><span class="nk-menu-text">Weekly - 0 Free Left</span></a>
                                </li>
                                <?php endif; ?>
                                <?php if($siteSettings->monthlyGoals === 1): ?>
                                <li class="nk-menu-item">
                                    <a href="<?php echo site_url('MyMIGold/Goals/Monthly'); ?>" class="nk-menu-link" title=""><span class="nk-menu-text">Monthly - 0 Free Left</span></a>
                                </li>
                                <?php endif; ?>
                            </ul><!-- .nk-menu-sub -->
                        </li>

                        <!-- <li class="nk-menu-item has-sub">
                            <a href="#" class="nk-menu-link nk-menu-toggle" data-bs-toggle="toggle" data-bs-target="#sidebarSupportMenu" data-bs-original-title="" title="">
                                <span class="nk-menu-icon"><em class="icon ni ni-tile-thumb"></em></span>
                                <span class="nk-menu-text">Support</span>
                            </a>
                            <ul class="nk-menu-sub" id="sidebarSupportMenu">
                                <li class="nk-menu-item">
                                    <a href="<?php echo site_url('/Support'); ?>" class="nk-menu-link" data-bs-original-title="" title=""><span class="nk-menu-text">Contact Support</span></a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="<?php echo site_url('/Knowledgebase'); ?>" class="nk-menu-link" data-bs-original-title="" title=""><span class="nk-menu-text">Knowledge Base</span></a>
                                </li>
                            </ul><!-- .nk-menu-sub --
                        </li> -->
					</ul>
				</div>
				<?php if ($exchangeTab === '1') { ?> 		
				<div class="nk-sidebar-menu">
					<ul class="nk-menu">
						<li class="nk-menu-heading"><h6 class="overline-title">Marketplace &amp; Exchange</h6></li>
						<li class="nk-menu-item">
							<a href="<?php echo site_url('/Assets'); ?>" class="nk-menu-link">
								<span class="nk-menu-icon"><em class="icon ni ni-growth"></em></span><span class="nk-menu-text">My Assets</span>
							</a>
						</li>
						<li class="nk-menu-item">
							<a href="<?php echo site_url('/Marketplace'); ?>" class="nk-menu-link">
								<span class="nk-menu-icon"><em class="icon ni ni-coins"></em></i></span><span class="nk-menu-text">MyMI Marketplace</span>
							</a>
						</li> 									 
						<li class="nk-menu-item">
							<a href="<?php echo site_url('/Exchange'); ?>" class="nk-menu-link">
								<span class="nk-menu-icon"><em class="icon ni ni-coins"></em></i></span><span class="nk-menu-text">MyMI Exchange</span>
							</a>
						</li> 
					</ul>
				</div>
                <?php 
                } 
                log_message('info', 'sidebar L341 - $cuRole: ' .  $cuRole);
                // if ($cuRole === 3) {
                if ($cuRole === 1 || 2) {
                    ?>
				<div class="nk-sidebar-menu">
					<ul class="nk-menu">
						<li class="nk-menu-heading"><h6 class="overline-title">Management</h6></li>
						<li class="nk-menu-item">
							<a class="nk-menu-link" href="<?php echo site_url('/Management'); ?>">
							<span class="nk-menu-icon"><em class="icon ni ni-home"></em></span><span class="nk-menu-text">Dashboard</span>
							</a>
						</li>  
						<li class="nk-menu-item">
							<a class="nk-menu-link postAnnouncementBtn" data-bs-toggle="modal" data-bs-target="#transactionModal">
							<span class="nk-menu-icon"><em class="icon ni ni-notice"></em></span><span class="nk-menu-text">Announcements</span>
							</a>
						</li> 
						<li class="nk-menu-item">
							<a class="nk-menu-link" href="<?php echo site_url('/Management/Alerts'); ?>">
							<span class="nk-menu-icon"><em class="icon ni ni-bell"></em></span><span class="nk-menu-text">Alerts</span>
							</a>
						</li> 
						<li class="nk-menu-item">
							<a class="nk-menu-link" href="<?php echo site_url('/Management/Assets'); ?>">
							<span class="nk-menu-icon"><em class="icon ni ni-coin"></em></span><span class="nk-menu-text">Assets</span>
							</a>
						</li> 
						<li class="nk-menu-item">
							<a class="nk-menu-link" href="<?php echo site_url('/Content-Creator'); ?>">
							<span class="nk-menu-icon"><em class="icon ni ni-property-add"></em></span><span class="nk-menu-text">Content Creator</span>
							</a>
						</li>    
						<li class="nk-menu-item">
							<a href="<?php echo site_url('Management/Exchange'); ?>" class="nk-menu-link">
							<span class="nk-menu-icon"><em class="icon ni ni-coins"></em></span><span class="nk-menu-text">Exchange</span>
							</a>
						</li>
                        <!-- <li class="nk-menu-item">
							<a href="<?php //echo site_url('Management/Investment'); ?>" class="nk-menu-link">
							<span class="nk-menu-icon"><em class="icon ni ni-sign-usd"></em></span><span class="nk-menu-text">Investments</span>
							</a>
						</li> -->
						<li class="nk-menu-item">
							<a class="nk-menu-link" href="<?php echo site_url('/Management/Marketing'); ?>">
							<span class="nk-menu-icon"><em class="icon ni ni-target"></em></span><span class="nk-menu-text">Marketing</span>
							</a>
						</li>  
						<li class="nk-menu-item">
							<a class="nk-menu-link" href="<?php echo site_url('/Management/Partners'); ?>">
							<span class="nk-menu-icon"><em class="icon ni ni-network"></em></span><span class="nk-menu-text">Partners</span>
							</a>
						</li>  
						<li class="nk-menu-item">
							<a class="nk-menu-link" href="<?php echo site_url('/Management/Services'); ?>">
							<span class="nk-menu-icon"><em class="icon ni ni-security"></em></span><span class="nk-menu-text">Security</span>
							</a>
						</li>   
						<li class="nk-menu-item">
							<a class="nk-menu-link" href="<?php echo site_url('/Management/Services'); ?>">
							<span class="nk-menu-icon"><em class="icon ni ni-server"></em></span><span class="nk-menu-text">Services</span>
							</a>
						</li>    
						<li class="nk-menu-item">
							<a class="nk-menu-link" href="<?php echo site_url('/Management/Users'); ?>">
							<span class="nk-menu-icon"><em class="icon ni ni-users"></em></span><span class="nk-menu-text">Users</span>
							</a>
						</li>    
                        <li class="nk-menu-item">
							<a href="<?php echo site_url('/Management/Wallets'); ?>" class="nk-menu-link">
								<span class="nk-menu-icon"><em class="icon ni ni-wallet"></em></span><span class="nk-menu-text">Wallets</span>
							</a>
						</li>      
					</ul>
				</div>
				<div class="nk-sidebar-menu">
					<ul class="nk-menu">
						<li class="nk-menu-heading"><h6 class="overline-title">Inactive Features</h6></li>
                        <?php
                        if ($cuKYC === 'Yes') {
                            ?>    
						<li class="nk-menu-item">
							<a href="<?php echo site_url('/Exchange'); ?>" class="nk-menu-link">
								<span class="nk-menu-icon"><em class="icon ni ni-coins"></em></i></span><span class="nk-menu-text">MyMI Exchange</span>
							</a>
						</li>
						<?php
                        } elseif ($cuKYC === 'No') {
                            ?>    
						<li class="nk-menu-item">
							<a href="<?php echo site_url('/Exchange/Personal-Information/' . $cuID); ?>" class="nk-menu-link">
								<span class="nk-menu-icon"><em class="icon ni ni-coins"></em></i></span><span class="nk-menu-text">MyMI Exchange</span>
							</a>
						</li>
						<?php
                        } ?>
					</ul>
				</div>
				<?php
                }
                ?>
				<?php
                if ($communityTabs === 1) {
                    ?>
				<div class="nk-sidebar-menu pt-0">
					<ul class="nk-menu">
						<li class="nk-menu-heading"><h6 class="overline-title">Community</h6></li>
						<li class="nk-menu-item" style="font-size:0.8rem">
							<a href="<?php echo site_url('/Announcements'); ?>" class="nk-menu-link">
							<span class="nk-menu-icon"><em class="icon ni ni-chat-fill"></em></span><span class="nk-menu-text">Announcements</span>
							</a>
						</li>
						<li class="nk-menu-item" style="font-size:0.8rem">
							<a href="https://discord.gg/BsDUjDHqrz" class="nk-menu-link">
							<span class="nk-menu-icon mbr-iconfont socicon-discord socicon"></span><span class="nk-menu-text">Discord</span>
							</a>
						</li>
						<li class="nk-menu-item" style="font-size:0.8rem">
							<a href="https://www.youtube.com/channel/UCtWWy71LQpea_tHkb7fIL7A" class="nk-menu-link">
								<span class="nk-menu-icon mbr-iconfont socicon-youtube socicon"></span><span class="nk-menu-text">Youtube</span>
							</a>
						</li>
						<li class="nk-menu-item" style="font-size:0.8rem">
							<a href="https://www.facebook.com/MyMillennialInvestments/" class="nk-menu-link">
								<span class="nk-menu-icon mbr-iconfont socicon-facebook socicon"></span><span class="nk-menu-text">Facebook</span>
							</a>
						</li>
						<li class="nk-menu-item" style="font-size:0.8rem">
							<a href="https://twitter.com/MyMillennialPro" class="nk-menu-link">
								<span class="nk-menu-icon mbr-iconfont socicon-twitter socicon"></span><span class="nk-menu-text">Twitter</span>
							</a>
						</li>
					</ul>
				</div>
				<?php
                }
                ?>
				<div class="nk-sidebar-footer">
					<ul class="nk-menu nk-menu-footer">
						<li class="nk-menu-item">
							<a href="<?php echo site_url('Support'); ?>" class="nk-menu-link">
								<span class="nk-menu-icon"><i class="icon ni ni-help-alt"></i></span><span class="nk-menu-text">Support</span>
							</a>
						</li>
						 
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>