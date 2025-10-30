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
<nav class="navbar navbar-expand-lg navbar-dark bg-dark nk-header nk-header-fixed nk-header-fluid">
    <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="<?= site_url('Dashboard'); ?>">
            <img
                class="logo-light logo-img"
                src="<?= base_url('assets/images/MyMI-Wallet.png'); ?>"
                srcset="<?= base_url('assets/images/MyMI-Wallet.png'); ?> 2x"
                alt="MyMI Wallet"
            >
        </a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#dashboardNavbarNav"
                aria-controls="dashboardNavbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="dashboardNavbarNav">
            <div class="navbar-nav me-lg-4 align-items-lg-center">
                <span class="navbar-text text-white-50 d-none d-lg-inline">
                    Welcome to MyMI Wallet – The Future of Finance!
                </span>
            </div>

            <ul class="navbar-nav ms-lg-auto align-items-lg-center gap-lg-3 w-100 w-lg-auto">
                <li class="nav-item my-2 my-lg-0">
                    <a href="<?= site_url('/Support'); ?>" class="btn btn-md btn-primary text-white">
                        Need Support?
                    </a>
                </li>
                <li class="nav-item flex-grow-1 flex-lg-grow-0 w-100 w-lg-auto">
                    <form
                        class="d-flex position-relative align-items-center"
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
                <li class="nav-item dropdown user-dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center"
                       href="#"
                       id="dashboardUserDropdown"
                       role="button"
                       data-bs-toggle="dropdown"
                       aria-expanded="false">
                        <div class="user-avatar sm me-2">
                            <em class="icon ni ni-user-alt"></em>
                        </div>
                        <span class="d-none d-lg-inline"><?= esc($cuDisplayName ?? 'User'); ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end p-3 text-body" aria-labelledby="dashboardUserDropdown">
                        <div class="d-flex align-items-center pb-3 border-bottom mb-3">
                            <div class="user-avatar me-3">
                                <span><?= esc($cuNameInitials ?? 'U'); ?></span>
                            </div>
                            <div>
                                <div class="fw-semibold"><?= esc($cuDisplayName ?? 'User'); ?></div>
                                <div class="small text-muted"><?= esc($cuEmail ?? ''); ?></div>
                            </div>
                        </div>
                        <ul class="list-unstyled mb-0">
                            <li>
                                <a class="dropdown-item d-flex align-items-center gap-2" href="<?= site_url('/Profile/' . ($cuUsername ?? 0)); ?>">
                                    <em class="icon ni ni-user-alt"></em><span>View Profile</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center gap-2" href="<?= site_url('/Account'); ?>">
                                    <em class="icon ni ni-setting-alt"></em><span>Account Settings</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center gap-2" href="<?= site_url('/Account/Activity'); ?>">
                                    <em class="icon ni ni-activity-alt"></em><span>Login Activity</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center gap-2" href="<?= site_url('/Account/Activity'); ?>">
                                    <em class="icon ni ni-help"></em><span>Contact Support</span>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center gap-2" href="<?= site_url('/logout'); ?>">
                                    <em class="icon ni ni-signout"></em><span>Sign out</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item dropdown notification-dropdown">
                    <a class="nav-link dropdown-toggle nk-quick-nav-icon"
                       href="#"
                       id="dashboardNotificationsDropdown"
                       role="button"
                       data-bs-toggle="dropdown"
                       aria-expanded="false">
                        <div class="icon-status icon-status-info"><em class="icon ni ni-bell"></em></div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-xl" aria-labelledby="dashboardNotificationsDropdown">
                        <div class="dropdown-head d-flex justify-content-between align-items-center px-3 py-2">
                            <span class="sub-title nk-dropdown-title">Notifications</span>
                            <a class="small" href="#">Mark All as Read</a>
                        </div>
                        <div class="dropdown-body px-3 py-2">
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
                            </div>
                        </div>
                        <div class="dropdown-foot center px-3 py-2">
                            <a href="#">View All</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown language-dropdown d-none d-sm-block">
                    <a class="nav-link dropdown-toggle nk-quick-nav-icon"
                       href="#"
                       id="dashboardLanguageDropdown"
                       role="button"
                       data-bs-toggle="dropdown"
                       aria-expanded="false">
                        <div class="quick-icon border border-light">
                            <img class="icon" src="<?= base_url('assets/images/flags/english-sq.png'); ?>" alt="English">
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-s1"
                        aria-labelledby="dashboardLanguageDropdown">
                        <li><a class="language-item dropdown-item" href="#">
                            <img src="<?= base_url('assets/images/flags/english.png'); ?>" alt="English" class="language-flag">
                            <span class="language-name">English</span>
                        </a></li>
                        <li><a class="language-item dropdown-item" href="#">
                            <img src="<?= base_url('assets/images/flags/spanish.png'); ?>" alt="Español" class="language-flag">
                            <span class="language-name">Español</span>
                        </a></li>
                        <li><a class="language-item dropdown-item" href="#">
                            <img src="<?= base_url('assets/images/flags/french.png'); ?>" alt="Français" class="language-flag">
                            <span class="language-name">Français</span>
                        </a></li>
                        <li><a class="language-item dropdown-item" href="#">
                            <img src="<?= base_url('assets/images/flags/turkey.png'); ?>" alt="Türkçe" class="language-flag">
                            <span class="language-name">Türkçe</span>
                        </a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>