<?php
$cuRole                 = $cuRole ?? '';
$cuKYC                  = $cuKYC ?? '';
$siteSettings           = $siteSettings ?? (object) [];

// Config Settings with safe defaults
$beta                   = $siteSettings->beta ?? null;
$stage                  = $siteSettings->stage ?? null;
$alertOperations        = $siteSettings->alertOperations ?? 0;
$assetOperations        = $siteSettings->assetOperations ?? 0;
$bettingOperations      = $siteSettings->bettingOperations ?? 0;
$creditOperations       = $siteSettings->creditOperations ?? 0;
$debtOperations         = $siteSettings->debtOperations ?? 0;
$educateOperations      = $siteSettings->educateOperations ?? 0;
$exchangeOperations     = $siteSettings->exchangeOperations ?? 0;
$investmentOperations   = $siteSettings->investmentOperations ?? 0;
$marketplaceOperations  = $siteSettings->marketplaceOperations ?? 0;
$newsOperations         = $siteSettings->newsOperations ?? 0;
$partnerOperations      = $siteSettings->partnerOperations ?? 0;
$projectOperations      = $siteSettings->projectOperations ?? 0;
$referralOperations     = $siteSettings->referralOperations ?? 0;
$retirementOperations   = $siteSettings->retirementOperations ?? 0;

$communityTabs          = $siteSettings->communityTabs ?? 0;
$exchangeTab            = $siteSettings->exchangeTab ?? 0;
$marketMovers           = date('F-jS-Y');
$userType               = 'Premium';

$userAccount            = $userAccount ?? [];
$MyMIWalletSummary      = [];
$walletSum              = $userAccount['assetNetValue'] ?? 0;
$walletAmount           = $walletSum;
$walletGains            = $userAccount['walletGains'] ?? '';

$userGoldData           = $userGoldData ?? (object) [];
$MyMIGCoinSum           = $userGoldData->coinSum ?? '0';

$cuDisplayName          = $cuDisplayName ?? '';
$cuEmail                = $cuEmail ?? '';
$initials               = !empty($cuDisplayName) ? substr($cuDisplayName, 0, 2) : 'Me';

$balance                = $balance ?? ['amount' => 0, 'currency' => 'USD', 'asOf' => null];

$agent                  = service('request')->getUserAgent();
?>
<?php if ($agent->isMobile()): ?>
    <div id="sidebarMenu" class="nk-sidebar nk-sidebar-fixed is-dark pt-xl-4 collapse sidebar-offcanvas">
<?php else: ?>
    <div class="nk-sidebar nk-sidebar-fixed is-dark" id="collapseSidebar">
<?php endif; ?>
	<div class="nk-sidebar-element nk-sidebar-head w-90 m-auto d-flex justify-content-center">
		<div class="nk-sidebar-brand w-80 ml-xl-0 pt-3">
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
                <img class="logo-light logo-img responsive-logo w-90 h-90 d-lg-block" src="' . base_url('assets/images/Company/MyMI-Wallet-White.png') . '" srcset="' . base_url('assets/images/Company/MyMI-Wallet-White.png') . '" alt="logo"/>
			    <img class="logo-dark logo-img responsive-logo w-80 my-2 d-lg-block" src="' . base_url('assets/images/Company/MyMI-Wallet-White.png') . '" srcset="' . base_url('assets/images/Company/MyMI-Wallet-White.png') . '" alt="logo" />
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
                            <h6 class="overline-title-alt">Current Balance</h6>
                            <div class="user-balance" title="As of <?= esc(date('g:i A', strtotime($balance['asOf'] ?? 'now'))); ?>">
                                <?= '$' . number_format((float) ($balance['amount'] ?? 0), 2); ?>
                                <small class="currency currency-usd"><?= esc($balance['currency'] ?? 'USD'); ?></small>
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
								
                                                                  <div class="user-avatar"><span><?= esc(strtoupper($initials)); ?></span></div>
                                                                  <div class="user-info"><span class="lead-text"><?= esc($cuDisplayName); ?></span><span class="sub-text"><?= esc($cuEmail); ?></span></div>
							</div>
						</div>
					</a>
					<div class="nk-profile-content" data-content="sidebarProfile">
						<div class="user-account-info between-center">
							<div class="user-account-main">
                                <h6 class="overline-title-alt">Current Balance</h6>
                                <div class="user-balance" title="As of <?= esc(date('g:i A', strtotime($balance['asOf'] ?? 'now'))); ?>">
                                    <?= '$' . number_format((float) ($balance['amount'] ?? 0), 2); ?>
                                    <small class="currency currency-usd"><?= esc($balance['currency'] ?? 'USD'); ?></small>
                                </div>
								<div class="user-balance-alt">
									<?php
                                    //~ echo $walletGains . ' <span class="currency currency-usd">USD</span> (' . $walletPercentChange . ')';
                                      ?>
                                      <?= esc($MyMIGCoinSum); ?> <span class="currency currency-usd">MyMI GOLD</span> <a class="currency currency-usd" href="<?= site_url('/Purchase/MyMIGold'); ?>">Purchase</a>
                                      <?php ?>
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
						<li class="nk-menu-heading"><h6 class="overline-title">MyMI Gold</h6></li>

                        <li class="nk-menu-item has-sub">
                            <a href="#" class="nk-menu-link nk-menu-toggle">
                                <span class="nk-menu-icon"><em class="icon ni ni-coin"></em></span>
                                <span class="nk-menu-text text-yellow">Purchase Now!</span>
                            </a>
                            <ul class="nk-menu-sub" style="display:none !important;">
                                <li class="nk-menu-item">
                                    <button class="nk-menu-link btn dynamicModalLoader" data-formtype="Purchase" data-endpoint="purchasePaypal" title="">
                                        <span class="nk-menu-text">Purchase</span>
                                    </button>
                                </li>
                                <?php if($siteSettings->monthlyMemberships === 1): ?>
                                <li class="nk-menu-item">
                                    <a href="<?php echo site_url('Wallets/Purchase/Memberships'); ?>" class="nk-menu-link" title="">
                                        <span class="nk-menu-text">Memberships</span>
                                    </a>
                                </li>
                                <?php endif; ?>
                                <!-- <?php // log_message('debug', 'dashboard\layouts\sidebar L173 - $pendingGoals: ' . (print_r($pendingGoals, true); ?>
                                <?php // if (isset($userNextGoal) && is_array($userNextGoal) && !empty($userNextGoal)): ?>
                                    <li class="nk-menu-item next-goal">
                                        <p class="nk-menu-text">Next Goal: <?= esc($userNextGoal['goal_name'] ?? 'No goal set') ?></p>
                                        <p class="nk-menu-text">Due Date: <?= esc($userNextGoal['due_date'] ?? 'No due date') ?></p>
                                    </li>
                                <?php //else: ?>
                                    <li class="nk-menu-item">
                                        <p>No upcoming goals</p>
                                    </li>
                                <?php //endif; ?> -->
                                <?php if($siteSettings->dailyGoals === 1): ?>
                                <li class="nk-menu-item">
                                    <a href="<?php echo site_url('MyMI-Gold/Goals/Daily'); ?>" class="nk-menu-link" title="">
                                        <span class="nk-menu-text">Daily <small>(<?php echo number_format($userNextGoal['gold_reward'] ?? 0,0) ?? '0'; ?> MyMIGold Left)</small></span>
                                    </a>
                                </li>
                                <?php endif; ?>
                                <?php if($siteSettings->weeklyGoals === 1): ?>
                                <li class="nk-menu-item">
                                    <a href="<?php echo site_url('MyMI-Gold/Goals/Weekly'); ?>" class="nk-menu-link" title="">
                                        <span class="nk-menu-text">Weekly - 0 Free Left</span>
                                    </a>
                                </li>
                                <?php endif; ?>
                                <?php if($siteSettings->monthlyGoals === 1): ?>
                                <li class="nk-menu-item">
                                    <a href="<?php echo site_url('MyMIGold/Goals/Monthly'); ?>" class="nk-menu-link" title="">
                                        <span class="nk-menu-text">Monthly - 0 Free Left</span>
                                    </a>
                                </li>
                                <?php endif; ?>
                            </ul><!-- .nk-menu-sub -->
                        </li>    
						<li class="nk-menu-heading"><h6 class="overline-title">Account</h6></li>
						<!-- <li class="nk-menu-item">
							<a href="<?php //echo site_url('/Dashboard'); ?>" class="nk-menu-link">
								<span class="nk-menu-icon"><em class="icon ni ni-home"></em></span><span class="nk-menu-text">Dashboard</span>
							</a>
						</li> -->
                        <li class="nk-menu-item has-sub">
                            <a href="#" class="nk-menu-link nk-menu-toggle">
                                <span class="nk-menu-icon"><em class="icon ni ni-coin"></em></span>
                                <span class="nk-menu-text text-yellow">My Account</span>
                            </a>
                            <ul class="nk-menu-sub" style="display:none !important;">
                                <li class="nk-menu-item">
                                    <a class="nk-menu-link" href="<?php echo site_url('/Account'); ?>">
                                        <span class="nk-menu-text">Account</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a class="nk-menu-link" href="<?php echo site_url('/Account/Billing'); ?>">
                                        <span class="nk-menu-text">Billing</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a class="nk-menu-link" href="<?php echo site_url('/Account/Connected-Accounts'); ?>">
                                        <span class="nk-menu-text">Connected Accounts</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a class="nk-menu-link" href="<?php echo site_url('/Account/Notifications'); ?>">
                                        <span class="nk-menu-text">Notification</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a class="nk-menu-link" href="<?php echo site_url('/Account/Security'); ?>">
                                        <span class="nk-menu-text">Security</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a class="nk-menu-link" href="<?php echo site_url('/Account/Social-Media'); ?>">
                                        <span class="nk-menu-text">Social Media</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a class="nk-menu-link" href="<?php echo site_url('/logout'); ?>">
                                        <span class="nk-menu-text">Sign Out</span>
                                    </a>
                                </li>
                            </ul><!-- .nk-menu-sub -->
                        </li>
  
                        <?php
                        if ($alertOperations === 1) {
                        ?>
                        <li class="nk-menu-item">
							<a href="<?php echo site_url('/Alerts'); ?>" class="nk-menu-link">
								<span class="nk-menu-icon"><em class="icon ni ni-bell"></em></span><span class="nk-menu-text">My Alerts</span>
							</a>
						</li> 
                        <?php 
                        }
                        ?>
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
                        if ($debtOperations === 1 && $creditOperations === 1) {
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
                        if ($marketplaceOperations === 1) :
                        ?>
                        <li class="nk-menu-item">
							<a href="<?php echo site_url('/Exchange/Solana'); ?>" class="nk-menu-link">
								<span class="nk-menu-icon"><em class="icon ni ni-coin"></em></span><span class="nk-menu-text">MyMI Exchange</span>
							</a>
						</li> 
                        <!-- <li class="nk-menu-item has-sub">
                            <a href="#" class="nk-menu-link nk-menu-toggle">
                                <span class="nk-menu-icon"><em class="icon ni ni-coin"></em></span>
                                <span class="nk-menu-text text-yellow">MyMI Exchange</span>
                            </a>
                            <ul class="nk-menu-sub" style="display:none !important;">
                                <li class="nk-menu-item">
                                    <a href="<?php echo site_url('/Exchange/Solana'); ?>" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-layers"></em></span><span class="nk-menu-text">Exchange</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item divider my-1"></li>
                                <?php if (!empty($cuSolanaDW['id'])) : ?>
                                    <li class="nk-menu-item">
                                        <a href="#" class="nk-menu-link dynamicModalLoader" data-formtype="Solana" data-endpoint="connectWalletModal">
                                            <span class="nk-menu-icon"><em class="icon ni ni-wallet-alt"></em></span><span class="nk-menu-text">My Wallet</span>
                                        </a>
                                    </li>
                                    <?php if ($siteSettings->createSolanaStatus === 1) : ?>
                                        <li class="nk-menu-item">
                                            <a href="<?php echo site_url('/Exchange/Solana/Assets'); ?>" class="nk-menu-link">
                                                <span class="nk-menu-icon"><em class="icon ni ni-layers"></em></span><span class="nk-menu-text">Assets</span>
                                            </a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="<?php echo site_url('/Exchange/Solana/Create'); ?>" class="nk-menu-link">
                                                <span class="nk-menu-icon"><em class="icon ni ni-wallet-alt"></em></span><span class="nk-menu-text">Create</span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if ($cuRole <= 2) : ?>
                                        <li class="nk-menu-item">
                                            <a href="<?php echo site_url('/Management/Marketing/Promote/Solana'); ?>" class="nk-menu-link">
                                                <span class="nk-menu-icon"><em class="icon ni ni-live"></em></span><span class="nk-menu-text">Promote</span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if ($siteSettings->swapSolanaStatus === 1) : ?>
                                        <li class="nk-menu-item">
                                            <a href="#" class="nk-menu-link dynamicModalLoader" data-formtype="Solana" data-endpoint="coinSwap">
                                                <span class="nk-menu-icon"><em class="icon ni ni-swap"></em></span><span class="nk-menu-text">Swap</span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php else : ?>
                                    <li class="nk-menu-item">
                                        <a href="#" class="nk-menu-link" data-bs-toggle="modal" data-bs-target="#connectWalletModal">
                                            <span class="nk-menu-icon"><em class="icon ni ni-wallet-alt"></em></span><span class="nk-menu-text">Connect Wallet</span>
                                        </a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="#" class="nk-menu-link importSolanaWallet">
                                            <span class="nk-menu-icon"><em class="icon ni ni-wallet-alt"></em></span><span class="nk-menu-text">Import Wallet</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul><!-- .nk-menu-sub --
                        </li> -->
                        <?php endif; ?>          
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
                        $activeThisRightHere = 0; 
                        if ($activeThisRightHere === 1) {
                            if ($marketplaceOperations === 1) {
                            ?>
                            <?php if ($siteSettings->solanaExchange === 1) : ?>
                        <li class="nk-menu-item has-sub">
                            <a href="#" class="nk-menu-link nk-menu-toggle">
                                <span class="nk-menu-icon"><em class="icon ni ni-coin"></em></span>
                                <span class="nk-menu-text text-yellow">MyMI Solana</span>
                            </a>
                            <ul class="nk-menu-sub" style="display:none !important;">
                                <li class="nk-menu-item">
                                    <a href="<?php echo site_url('/Exchange/Solana'); ?>" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-layers"></em></span><span class="nk-menu-text">Exchange</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item divider my-1"></li>
                                <?php if (!empty($cuSolanaDW['id'])) : ?>
                                    <li class="nk-menu-item">
                                        <a href="#" class="nk-menu-link dynamicModalLoader" data-formtype="Solana" data-endpoint="connectWalletModal">
                                            <span class="nk-menu-icon"><em class="icon ni ni-wallet-alt"></em></span><span class="nk-menu-text">My Wallet</span>
                                        </a>
                                    </li>
                                    <?php if ($siteSettings->createSolanaStatus === 1) : ?>
                                        <li class="nk-menu-item">
                                            <a href="<?php echo site_url('/Exchange/Solana/Assets'); ?>" class="nk-menu-link">
                                                <span class="nk-menu-icon"><em class="icon ni ni-layers"></em></span><span class="nk-menu-text">Assets</span>
                                            </a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="<?php echo site_url('/Exchange/Solana/Create'); ?>" class="nk-menu-link">
                                                <span class="nk-menu-icon"><em class="icon ni ni-wallet-alt"></em></span><span class="nk-menu-text">Create</span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if ($cuRole <= 2) : ?>
                                        <li class="nk-menu-item">
                                            <a href="<?php echo site_url('/Management/Marketing/Promote/Solana'); ?>" class="nk-menu-link">
                                                <span class="nk-menu-icon"><em class="icon ni ni-live"></em></span><span class="nk-menu-text">Promote</span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if ($siteSettings->swapSolanaStatus === 1) : ?>
                                        <li class="nk-menu-item">
                                            <a href="#" class="nk-menu-link dynamicModalLoader" data-formtype="Solana" data-endpoint="coinSwap">
                                                <span class="nk-menu-icon"><em class="icon ni ni-swap"></em></span><span class="nk-menu-text">Swap</span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                <?php else : ?>
                                    <li class="nk-menu-item">
                                        <a href="#" class="nk-menu-link" data-bs-toggle="modal" data-bs-target="#connectWalletModal">
                                            <span class="nk-menu-icon"><em class="icon ni ni-wallet-alt"></em></span><span class="nk-menu-text">Connect Wallet</span>
                                        </a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="#" class="nk-menu-link importSolanaWallet">
                                            <span class="nk-menu-icon"><em class="icon ni ni-wallet-alt"></em></span><span class="nk-menu-text">Import Wallet</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul><!-- .nk-menu-sub -->
                        </li>

                            <?php endif; ?>
                        <?php 
                            }
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
                        if ($projectOperations === 1) {
                        ?>
						<li class="nk-menu-item">
							<a href="<?php echo site_url('/Projects'); ?>" class="nk-menu-link">
								<span class="nk-menu-icon"><i class="icon ni ni-network"></i></span><span class="nk-menu-text">My Projects</span>
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
                            <a href="#" class="nk-menu-link nk-menu-toggle" data-bs-toggle="toggle" data-bs-target="#sidebarSupportMenu">
                                <span class="nk-menu-icon"><em class="icon ni ni-tile-thumb"></em></span>
                                <span class="nk-menu-text">My Sports</span>
                            </a>
                            <ul class="nk-menu-sub" id="sidebarSupportMenu">
                                <li class="nk-menu-item">
                                    <a href="<?php echo site_url('/MyMISports/NBA'); ?>" class="nk-menu-link">
                                        <span class="nk-menu-text">NBA Stats</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="<?php echo site_url('/MyMISports/NFL'); ?>" class="nk-menu-link">
                                        <span class="nk-menu-text">NFL Stats</span>
                                    </a>
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
                                <span class="nk-menu-icon"><em class="icon ni ni-growth"></em></span>
                                <span class="nk-menu-text">My Assets</span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="<?php echo site_url('/Marketplace'); ?>" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-coins"></em></span>
                                <span class="nk-menu-text">MyMI Marketplace</span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="<?php echo site_url('/Exchange'); ?>" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-coins"></em></span>
                                <span class="nk-menu-text">MyMI Exchange</span>
                            </a>
                        </li>

                        <?php if ($siteSettings->solanaExchange === 1) : ?>
                            <li class="nk-menu-item has-sub">
                                <a href="#" class="nk-menu-link nk-menu-toggle">
                                    <span class="nk-menu-icon"><em class="icon ni ni-coin"></em></span>
                                    <span class="nk-menu-text text-yellow">MyMI Solana</span>
                                </a>
                                <ul class="nk-menu-sub">
                                    <li class="nk-menu-item">
                                        <a href="<?php echo site_url('/Exchange/Solana'); ?>" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-layers"></em></span>
                                            <span class="nk-menu-text">Exchange</span>
                                        </a>
                                    </li>
                                    <li class="nk-menu-item divider my-1"></li>
                                    <?php if (!empty($cuSolanaDW)) : ?>
                                        <li class="nk-menu-item">
                                            <a href="#" class="nk-menu-link dynamicModalLoader" data-formtype="Solana" data-endpoint="connectWalletModal">
                                                <span class="nk-menu-icon"><em class="icon ni ni-wallet-alt"></em></span>
                                                <span class="nk-menu-text">My Wallet</span>
                                            </a>
                                        </li>
                                        <?php if ($siteSettings->createSolanaStatus === 1) : ?>
                                            <li class="nk-menu-item">
                                                <a href="<?php echo site_url('/Exchange/Solana/Assets'); ?>" class="nk-menu-link">
                                                    <span class="nk-menu-icon"><em class="icon ni ni-layers"></em></span>
                                                    <span class="nk-menu-text">Assets</span>
                                                </a>
                                            </li>
                                            <li class="nk-menu-item">
                                                <a href="<?php echo site_url('/Exchange/Solana/Create'); ?>" class="nk-menu-link">
                                                    <span class="nk-menu-icon"><em class="icon ni ni-wallet-alt"></em></span>
                                                    <span class="nk-menu-text">Create</span>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                        <?php if ($siteSettings->swapSolanaStatus === 1) : ?>
                                            <li class="nk-menu-item">
                                                <a href="#" class="nk-menu-link dynamicModalLoader" data-formtype="Solana" data-endpoint="coinSwap">
                                                    <span class="nk-menu-icon"><em class="icon ni ni-swap"></em></span>
                                                    <span class="nk-menu-text">Swap</span>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                    <?php else : ?>
                                        <li class="nk-menu-item">
                                            <a href="#" class="nk-menu-link" data-bs-toggle="modal" data-bs-target="#connectWalletModal">
                                                <span class="nk-menu-icon"><em class="icon ni ni-wallet-alt"></em></span>
                                                <span class="nk-menu-text">Connect Wallet</span>
                                            </a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="#" class="nk-menu-link importSolanaWallet">
                                                <span class="nk-menu-icon"><em class="icon ni ni-wallet-alt"></em></span>
                                                <span class="nk-menu-text">Import Wallet</span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                </ul><!-- .nk-menu-sub -->
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
  
                <?php 
                } 
                if ($siteSettings->debug === 1) {
                    log_message('info', 'sidebar L341 - $cuRole: ' .  $cuRole);
                }
                if ($cuRole <= 2) {
                // if ($cuID === 2) {
                    ?>
                <div class="nk-sidebar-menu">
                    <ul class="nk-menu">
                        <li class="nk-menu-heading"><h6 class="overline-title">Marketplace &amp; Exchange</h6></li>
                        <li class="nk-menu-item">
                            <a href="<?php echo site_url('/Assets'); ?>" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-growth"></em></span>
                                <span class="nk-menu-text">My Assets</span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="<?php echo site_url('/Marketplace'); ?>" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-coins"></em></span>
                                <span class="nk-menu-text">MyMI Marketplace</span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="<?php echo site_url('/Exchange'); ?>" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-coins"></em></span>
                                <span class="nk-menu-text">MyMI Exchange</span>
                            </a>
                        </li>

                        <?php if ($siteSettings->solanaExchange === 1) : ?>
                            <li class="nk-menu-item has-sub">
                                <a href="#" class="nk-menu-link nk-menu-toggle">
                                    <span class="nk-menu-icon"><em class="icon ni ni-coin"></em></span>
                                    <span class="nk-menu-text text-yellow">MyMI Solana</span>
                                </a>
                                <ul class="nk-menu-sub">
                                    <li class="nk-menu-item">
                                        <a href="<?php echo site_url('/Exchange/Solana'); ?>" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-layers"></em></span>
                                            <span class="nk-menu-text">Exchange</span>
                                        </a>
                                    </li>
                                    <li class="nk-menu-item divider my-1"></li>
                                    <?php if (!empty($cuSolanaDW)) : ?>
                                        <li class="nk-menu-item">
                                            <a href="#" class="nk-menu-link dynamicModalLoader" data-formtype="Solana" data-endpoint="connectWalletModal">
                                                <span class="nk-menu-icon"><em class="icon ni ni-wallet-alt"></em></span>
                                                <span class="nk-menu-text">My Wallet</span>
                                            </a>
                                        </li>
                                        <?php if ($siteSettings->createSolanaStatus === 1) : ?>
                                            <li class="nk-menu-item">
                                                <a href="<?php echo site_url('/Exchange/Solana/Assets'); ?>" class="nk-menu-link">
                                                    <span class="nk-menu-icon"><em class="icon ni ni-layers"></em></span>
                                                    <span class="nk-menu-text">Assets</span>
                                                </a>
                                            </li>
                                            <li class="nk-menu-item">
                                                <a href="<?php echo site_url('/Exchange/Solana/Create'); ?>" class="nk-menu-link">
                                                    <span class="nk-menu-icon"><em class="icon ni ni-wallet-alt"></em></span>
                                                    <span class="nk-menu-text">Create</span>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                        <?php if ($siteSettings->swapSolanaStatus === 1) : ?>
                                            <li class="nk-menu-item">
                                                <a href="#" class="nk-menu-link dynamicModalLoader" data-formtype="Solana" data-endpoint="coinSwap">
                                                    <span class="nk-menu-icon"><em class="icon ni ni-swap"></em></span>
                                                    <span class="nk-menu-text">Swap</span>
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                    <?php else : ?>
                                        <li class="nk-menu-item">
                                            <a href="#" class="nk-menu-link" data-bs-toggle="modal" data-bs-target="#connectWalletModal">
                                                <span class="nk-menu-icon"><em class="icon ni ni-wallet-alt"></em></span>
                                                <span class="nk-menu-text">Connect Wallet</span>
                                            </a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="#" class="nk-menu-link importSolanaWallet">
                                                <span class="nk-menu-icon"><em class="icon ni ni-wallet-alt"></em></span>
                                                <span class="nk-menu-text">Import Wallet</span>
                                            </a>
                                        </li>
                                    <?php endif; ?>
                                </ul><!-- .nk-menu-sub -->
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>

  
				<div class="nk-sidebar-menu">
					<ul class="nk-menu">   

						<li class="nk-menu-heading"><h6 class="overline-title">Management</h6></li>
						<li class="nk-menu-item">
							<a class="nk-menu-link" href="<?php echo site_url('/Management/Admin'); ?>">
							<span class="nk-menu-icon"><em class="icon ni ni-home"></em></span><span class="nk-menu-text">Dashboard</span>
							</a>
						</li>  
						<!-- <li class="nk-menu-item">
							<a class="nk-menu-link postAnnouncementBtn" data-bs-toggle="modal" data-bs-target="#transactionModal">
							<span class="nk-menu-icon"><em class="icon ni ni-notice"></em></span><span class="nk-menu-text">Announcements</span>
							</a>
						</li>  -->
						<li class="nk-menu-item">
							<a class="nk-menu-link" href="<?php echo site_url('/Management/Alerts'); ?>">
							<span class="nk-menu-icon"><em class="icon ni ni-bell"></em></span><span class="nk-menu-text">Alerts</span>
							</a>
						</li> 
						<li class="nk-menu-item">
							<a class="nk-menu-link" href="<?php echo site_url('/Management/API'); ?>">
							<span class="nk-menu-icon"><em class="icon ni ni-signal"></em></span><span class="nk-menu-text">APIs</span>
							</a>
						</li> 
						<li class="nk-menu-item">
							<a class="nk-menu-link" href="<?php echo site_url('/Management/Assets'); ?>">
							<span class="nk-menu-icon"><em class="icon ni ni-coin"></em></span><span class="nk-menu-text">Assets</span>
							</a>
						</li> 
						<li class="nk-menu-item">
							<a class="nk-menu-link" href="<?php echo site_url('/Management/Budgeting'); ?>">
							<span class="nk-menu-icon"><em class="icon ni ni-card-view"></em></span><span class="nk-menu-text">Budgeting</span>
							</a>
						</li> 
						<li class="nk-menu-item">
							<a class="nk-menu-link" href="<?php echo site_url('/Management/Budgets'); ?>">
							<span class="nk-menu-icon"><em class="icon ni ni-pie"></em></span><span class="nk-menu-text">Budgets</span>
							</a>
						</li> 
						<!-- <li class="nk-menu-item">
							<a class="nk-menu-link" href="<?php echo site_url('/Management/Content-Creator'); ?>">
							<span class="nk-menu-icon"><em class="icon ni ni-property-add"></em></span><span class="nk-menu-text">Content Creator</span>
							</a>
						</li>     -->
						<li class="nk-menu-item">
							<a href="<?php echo site_url('Management/Exchange'); ?>" class="nk-menu-link">
							<span class="nk-menu-icon"><em class="icon ni ni-coins"></em></span><span class="nk-menu-text">Exchange</span>
							</a>
						</li>
                        <!-- <li class="nk-menu-item">
							<a href="<?php //echo site_url('Management/Investment'); ?>" class="nk-menu-link">
							<span class="nk-menu-icon"><em class="icon ni ni-sign-usd"></em></span><span class="nk-menu-text">Investments</span>
							</a>
						</li>
						<li class="nk-menu-item">
							<a class="nk-menu-link" href="<?php echo site_url('/Management/Marketing'); ?>">
							<span class="nk-menu-icon"><em class="icon ni ni-target"></em></span><span class="nk-menu-text">Marketing</span>
							</a>
						</li>   -->

                        <li class="nk-menu-item has-sub">
                            <a href="#" class="nk-menu-link nk-menu-toggle">
                                <span class="nk-menu-icon"><em class="icon ni ni-live"></em></span>
                                <span class="nk-menu-text text-yellow">Marketing</span>
                            </a>
                            <ul class="nk-menu-sub" style="display:none !important;">
                                <li class="nk-menu-item">
                                    <a class="nk-menu-link" href="<?php echo site_url('/Management/Marketing'); ?>">
                                        <span class="nk-menu-text">Dashboard</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a class="nk-menu-link" href="<?php echo site_url('/Management/Marketing/Campaigns'); ?>">
                                        <span class="nk-menu-text">Campaigns</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a class="nk-menu-link" href="<?php echo site_url('/Management/Marketing/Ideas'); ?>">
                                        <span class="nk-menu-text">Ideas</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a class="nk-menu-link" href="<?php echo site_url('/Management/Marketing/Schedule'); ?>">
                                        <span class="nk-menu-text">Schedule</span>
                                    </a>
                                </li>
                                
						        <li class="nk-menu-heading"><h6 class="overline-title">MyMI Exchange</h6></li>
                                <li class="nk-menu-item">
                                    <a class="nk-menu-link" href="<?php echo site_url('/Management/Marketing/Promote/Solana'); ?>">
                                        <span class="nk-menu-text">Promote</span>
                                    </a>
                                </li>
						        <li class="nk-menu-heading"><h6 class="overline-title">Content Generator</h6></li>
                                <li class="nk-menu-item">
                                    <a class="nk-menu-link" href="<?php echo site_url('/Management/Marketing/Content/Generator'); ?>">
                                        <span class="nk-menu-text">Content Generator</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a class="nk-menu-link" href="<?php echo site_url('/Management/Marketing/Content/Listing'); ?>">
                                        <span class="nk-menu-text">Content Listing</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a class="nk-menu-link" href="<?php echo site_url('/Management/Marketing/Blog-Creator'); ?>">
                                        <span class="nk-menu-text">Blog Creator</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a class="nk-menu-link" href="<?php echo site_url('/Management/Marketing/Post-Creator'); ?>">
                                        <span class="nk-menu-text">Post Creator</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a class="nk-menu-link" href="<?php echo site_url('/Management/Marketing/Video-Creator'); ?>">
                                        <span class="nk-menu-text">Video Creator</span>
                                    </a>
                                </li>
                            </ul><!-- .nk-menu-sub -->
                        </li>   
						<li class="nk-menu-item">
							<a class="nk-menu-link" href="<?php echo site_url('/Management/Partners'); ?>">
							<span class="nk-menu-icon"><em class="icon ni ni-network"></em></span><span class="nk-menu-text">Partners</span>
							</a>
						</li>  
						<li class="nk-menu-item">
							<a class="nk-menu-link" href="<?php echo site_url('/Management/Projects'); ?>">
							<span class="nk-menu-icon"><em class="icon ni ni-list"></em></span><span class="nk-menu-text">Projects</span>
							</a>
						</li>  
						<li class="nk-menu-item">
							<a class="nk-menu-link" href="<?php echo site_url('/Management/Security'); ?>">
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
				<?php if ($communityTabs === 1) { ?>
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