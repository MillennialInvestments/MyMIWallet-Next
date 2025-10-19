<div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg" data-bs-toggle-body="true" data-content="userAside" data-bs-toggle-screen="lg" data-bs-toggle-overlay="true">
    <div class="card-inner-group" data-simplebar>
        <div class="card-inner">
            <div class="user-card">
                <div class="user-avatar bg-primary">
                    <span><?php //echo $cuFirstName ?? 'N' . $cuLastName[0] ?? '/A'; ?></span>
                </div>
                <div class="user-info">
                    <span class="lead-text"><?php echo $cuDisplayName; ?></span>
                    <span class="sub-text"><?php echo $cuEmail; ?></span>
                </div>
                <div class="user-action">
                    <div class="dropdown">
                        <a class="btn btn-icon btn-trigger me-n2" data-bs-toggle="dropdown" href="#"><em class="icon ni ni-more-v"></em></a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <ul class="link-list-opt no-bdr">
                                <li><a href="#"><em class="icon ni ni-camera-fill"></em><span>Change Photo</span></a></li>
                                <li><a href="#"><em class="icon ni ni-edit-fill"></em><span>Update Profile</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><!-- .user-card -->
        </div><!-- .card-inner -->
        <div class="card-inner">
            <div class="user-account-info py-0">
                <h6 class="overline-title-alt">MyMI Gold Balance</h6>
                <div class="user-balance"><?php echo $MyMIGCoinSum ?? 0; ?> <span class="currency currency-usd">MyMI Gold</span></div>
                <div class="user-balance-sub"><a class="currency currency-usd" href="<?php echo site_url('/Wallets/Purchase/MyMIGold'); ?>">Purchase Now</a></div>
            </div>
        </div><!-- .card-inner -->
        <div class="card-inner p-0">
            <ul class="link-list-menu">
                <li><a href="<?php echo site_url('/Account'); ?>"><em class="icon ni ni-user-fill-c"></em><span>Personal Infomation</span></a></li>
                <li><a href="<?php echo site_url('/Account/Activity'); ?>"><em class="icon ni ni-activity-round-fill"></em><span>Account Activity</span></a></li>
                <li><a href="<?php echo site_url('/Account/Connected-Accounts'); ?>"><em class="icon ni ni-activity-round-fill"></em><span>Connected Accounts</span></a></li>
                <li><a href="<?php echo site_url('/Account/Notifications'); ?>"><em class="icon ni ni-bell-fill"></em><span>Notifications</span></a></li>
                <li><a href="<?php echo site_url('/Account/Security'); ?>"><em class="icon ni ni-lock-alt-fill"></em><span>Security Settings</span></a></li>
                <li><a href="<?php echo site_url('/Account/Social-Media'); ?>"><em class="icon ni ni-grid-add-fill-c"></em><span>Connected with Social</span></a></li>
            </ul>
        </div><!-- .card-inner -->
    </div><!-- .card-inner-group -->
</div><!-- card-aside -->