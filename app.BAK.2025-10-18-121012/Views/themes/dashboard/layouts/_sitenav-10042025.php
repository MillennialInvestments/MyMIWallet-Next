<?php
// Ensure variables like $cuNameInitials, $cuDisplayName, and $cuEmail are passed from the controller.
?>

<style <?= $nonce['style'] ?? '' ?>>
.fs-sm {
    font-size: 0.9rem;
}
.header-animated {
    background-color: #fff;
}
form.d-flex.align-items-center input.form-control {
    max-width: 240px;
    font-size: 0.9rem;
}

form.d-flex.align-items-center button.btn {
    white-space: nowrap;
}

</style>

<!-- NAVBAR -->
<div class="nk-header nk-header-fixed nk-header-fluid is-light">
    <div class="container-fluid">
        <div class="nk-header-wrap">
            <div class="nk-menu-trigger pl-3 d-xl-none ms-n1">
                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-bs-target="sidebarMenu">
                    <em class="icon ni ni-menu"></em>
                </a>
            </div>

            <div class="nk-header-brand d-xl-none w-20">
                <a href="<?php echo site_url('/Dashboard'); ?>" class="logo-link">
                    <img class="logo-light logo-img" src="<?php echo base_url('assets/images/MyMI-Wallet.png'); ?>" srcset="<?php echo base_url('assets/images/MyMI-Wallet.png'); ?> 2x" alt="logo">
                    <img class="logo-dark logo-img" src="<?php echo base_url('assets/images/MyMI-Wallet.png'); ?>" srcset="<?php echo base_url('assets/images/MyMI-Wallet.png'); ?> 2x" alt="logo-dark">
                </a>
            </div><!-- .nk-header-brand -->

            <!-- Generic Banner (Placeholder for the promotional banner) -->
            <div class="nk-header-promo d-none d-md-block ms-3 ms-xl-0 ml-5 pl-5 flex-grow-1">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <p>Welcome to MyMI Wallet – The Future of Finance!</p>
                    </div>
                </div>
            </div><!-- .nk-header-promo -->

            <div class="nk-header-tools ml-xl-5 pl-xl-5 pr-2">
                <ul class="nk-quick-nav">
                    <!-- "Need Support?" Button -->
                    <li class="nav-item me-3">
                        <a href="<?php echo site_url('/Support'); ?>" class="btn btn-md btn-primary text-white">
                            Need Support?
                        </a>
                    </li>
                    <li class="nav-item">
                        <form
                            class="d-flex position-relative align-items-center w-100"
                            method="get"
                            action="<?= site_url('Search'); ?>"
                            data-global-search-form
                        >
                            <em class="icon ni ni-search me-2 d-none d-md-block"></em>
                            <input
                                class="form-control flex-grow-1 border form-focus-none"
                                type="search"
                                name="query"
                                placeholder="Search tickers…"
                                aria-label="Search"
                                autocomplete="off"
                                data-global-search-input
                            >
                            <button type="submit" class="btn btn-primary btn-sm ms-2">Search</button>
                            <div
                                class="list-group position-absolute w-100 mt-1 shadow-sm d-none"
                                data-global-search-suggest
                                style="z-index: 1050; max-height: 60vh; overflow:auto"
                            ></div>
                        </form>
                    </li>

                    <!-- User Dropdown -->
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle me-n1" data-bs-toggle="dropdown">
                            <div class="user-toggle">
                                <div class="user-avatar sm">
                                    <em class="icon ni ni-user-alt"></em>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end">
                            <div class="dropdown-inner user-card-wrap bg-lighter">
                                <div class="user-card">
                                    <div class="user-avatar">
                                        <span><?= $cuNameInitials ?? 'U' ?></span>
                                    </div>
                                    <div class="user-info">
                                        <span class="lead-text"><?= $cuDisplayName ?? 'User' ?></span>
                                        <span class="sub-text"><?= $cuEmail ?? '' ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><a href="<?php echo site_url('/Profile/' . ($cuUsername ?? 0)); ?>"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                    <li><a href="<?php echo site_url('/Account'); ?>"><em class="icon ni ni-setting-alt"></em><span>Account Settings</span></a></li>
                                    <li><a href="<?php echo site_url('/Account/Activity'); ?>"><em class="icon ni ni-activity-alt"></em><span>Login Activity</span></a></li>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo site_url('/Account/Activity'); ?>"><em class="icon ni ni-help"></em><span>Contact Support</span></a></li>
                                </ul>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><a href="<?php echo site_url('/logout'); ?>"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </li>

                    <!-- Notifications Dropdown -->
                    <li class="dropdown notification-dropdown">
                        <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="icon-status icon-status-info"><em class="icon ni ni-bell"></em></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-end">
                            <div class="dropdown-head">
                                <span class="sub-title nk-dropdown-title">Notifications</span>
                                <a href="#">Mark All as Read</a>
                            </div>
                            <div class="dropdown-body">
                                <div class="nk-notification">
                                    <div class="nk-notification-item dropdown-inner">
                                        <div class="nk-notification-icon">
                                            <em class="icon icon-circle bg-warning-dim ni ni-curve-down-right"></em>
                                        </div>
                                        <div class="nk-notification-content">
                                            <div class="nk-notification-text">You have requested to <span>Withdraw</span></div>
                                            <div class="nk-notification-time">2 hrs ago</div>
                                        </div>
                                    </div>
                                    <!-- Additional Notification Items -->
                                </div>
                            </div>
                            <div class="dropdown-foot center">
                                <a href="#">View All</a>
                            </div>
                        </div>
                    </li>

                    <!-- Language Dropdown -->
                    <li class="dropdown language-dropdown d-none d-sm-block me-n1">
                        <a href="#" class="dropdown-toggle nk-quick-nav-icon" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="quick-icon border border-light">
                                <img class="icon" src="<?php echo base_url('assets/images/flags/english-sq.png'); ?>" alt="">
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-s1">
                            <ul class="language-list">
                                <li><a href="#" class="language-item">
                                    <img src="<?php echo base_url('assets/images/flags/english.png'); ?>" alt="" class="language-flag">
                                    <span class="language-name">English</span>
                                </a></li>
                                <li><a href="#" class="language-item">
                                    <img src="<?php echo base_url('assets/images/flags/spanish.png'); ?>" alt="" class="language-flag">
                                    <span class="language-name">Español</span>
                                </a></li>
                                <li><a href="#" class="language-item">
                                    <img src="<?php echo base_url('assets/images/flags/french.png'); ?>" alt="" class="language-flag">
                                    <span class="language-name">Français</span>
                                </a></li>
                                <li><a href="#" class="language-item">
                                    <img src="<?php echo base_url('assets/images/flags/turkey.png'); ?>" alt="" class="language-flag">
                                    <span class="language-name">Türkçe</span>
                                </a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div><!-- .nk-header-wrap -->
    </div><!-- .container-fluid -->
</div>
