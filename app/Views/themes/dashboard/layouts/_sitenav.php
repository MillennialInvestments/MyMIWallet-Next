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
            <!-- <img
                class="logo-light logo-img"
                src="<?= base_url('assets/images/MyMI-Wallet-Logo-White.png'); ?>"
                srcset="<?= base_url('assets/images/MyMI-Wallet-Logo-White.png'); ?> 2x"
                alt="MyMI Wallet"
            > -->
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
                <span class="navbar-text text-white d-none d-lg-inline">
                    Welcome <?= esc($cuDisplayName ?? 'User'); ?>
                </span>
            </div>

            <ul class="navbar-nav me-lg-4 align-items-lg-center gap-lg-3 w-100 w-lg-auto">
                <li class="nav-item flex-grow-1 flex-lg-grow-0 w-100 w-lg-auto pt-1">
                    <form
                        class="d-flex position-relative align-items-center text-white mb-0"
                        method="get"
                        action="<?= site_url('Search'); ?>"
                        data-global-search-form
                    >
                        <em class="icon ni ni-search me-2 d-none d-md-block"></em>
                        <input
                            class="form-control flex-grow-1 border form-focus-none mb-0"
                            type="search"
                            name="query"
                            placeholder="Tickers ($NVDA) | Users (@MyMIWallet)..."
                            aria-label="Search"
                            autocomplete="off"
                            data-global-search-input
                        >
                        <button type="submit" class="btn btn-primary btn-sm ms-2 mt-0">Search</button>
                        <div
                            class="list-group position-absolute w-100 mt-1 shadow-sm d-none"
                            data-global-search-suggest
                            style="z-index: 1050; max-height: 60vh; overflow:auto"
                        ></div>
                    </form>
                </li>
                <li class="nav-item my-2 my-lg-0">
                    <a href="<?= site_url('/Support'); ?>" class="btn btn-md btn-primary text-white">
                        Support?
                    </a>
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
                                <form action="<?= site_url('logout') ?>" method="post" class="m-0">
                                    <?= csrf_field() ?>
                                    <button type="submit" class="dropdown-item d-flex align-items-center gap-2">
                                        <em class="icon ni ni-signout"></em><span>Sign out</span>
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item dropdown notification-dropdown">
                    <a class="nav-link dropdown-toggle nk-quick-nav-icon position-relative d-flex align-items-center"
                       href="#"
                       id="dashboardNotificationsDropdown"
                       role="button"
                       data-bs-toggle="dropdown"
                       data-bs-auto-close="outside"
                       aria-expanded="false"
                       aria-label="View notifications">
                        <div class="icon-status icon-status-info"><em class="icon ni ni-bell"></em></div>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="mymiNotificationBadge" style="font-size: 0.65rem;">
                            1
                            <span class="visually-hidden">unread notifications</span>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-xl shadow-lg border-0 py-0" aria-labelledby="dashboardNotificationsDropdown" id="mymiNotificationMenu">
                        <div class="dropdown-head d-flex justify-content-between align-items-center px-3 py-2 bg-light rounded-top border-bottom">
                            <span class="sub-title nk-dropdown-title fw-bold">Notifications</span>
                            <button type="button" class="btn btn-link btn-sm text-decoration-none p-0 small" id="mymiMarkAllRead">Mark All as Read</button>
                        </div>
                        <div class="dropdown-body px-3 py-2" id="mymiNotificationBody" style="max-height: 320px; overflow-y: auto;">
                            <div class="nk-notification" id="mymiNotificationList">
                                <div class="nk-notification-item dropdown-inner unread-notice py-2 border-bottom">
                                    <div class="nk-notification-icon me-2">
                                        <em class="icon icon-circle bg-primary-dim ni ni-bell-fill"></em>
                                    </div>
                                    <div class="nk-notification-content flex-grow-1">
                                        <div class="nk-notification-text small text-dark">Welcome to your updated <strong>MyMI Wallet</strong> dashboard.</div>
                                        <div class="nk-notification-time small text-muted">Just now</div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center py-4 text-muted d-none" id="mymiNotificationEmpty">
                                <em class="icon ni ni-check-circle fs-3 text-success d-block mb-1"></em>
                                <span class="small">All caught up! No unread notifications.</span>
                            </div>
                        </div>
                        <div class="dropdown-foot text-center px-3 py-2 bg-light rounded-bottom border-top">
                            <a href="<?= site_url('/Account/Notifications'); ?>" class="small text-primary fw-semibold text-decoration-none">Manage Notification Settings</a>
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

<script <?= $nonce['script'] ?? '' ?>>
document.addEventListener('DOMContentLoaded', function () {
    var markBtn = document.getElementById('mymiMarkAllRead');
    var badge = document.getElementById('mymiNotificationBadge');
    var list = document.getElementById('mymiNotificationList');
    var empty = document.getElementById('mymiNotificationEmpty');

    if (markBtn) {
        markBtn.addEventListener('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            if (badge) {
                badge.classList.add('d-none');
            }
            if (list) {
                list.classList.add('d-none');
            }
            if (empty) {
                empty.classList.remove('d-none');
            }
            markBtn.disabled = true;
            markBtn.textContent = 'All read';
        });
    }
});
</script>