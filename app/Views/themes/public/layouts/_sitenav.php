<?php
$isLoggedIn = false;
try {
    if (function_exists('auth')) {
        $isLoggedIn = auth()->loggedIn();
    } else {
        $isLoggedIn = (bool) (session('logged_in') ?? session('user_id'));
    }
} catch (\Throwable $e) {
    $isLoggedIn = (bool) (session('logged_in') ?? session('user_id'));
}
$authUser = null;
$authUserId = null;

$homeUrl = site_url('/');
$featuresUrl = site_url('#features');
$supportUrl = site_url('Support');
$dashboardUrl = site_url('/Dashboard');
$loginUrl = site_url('login');

$brandImage = base_url('assets/images/MyMI-Wallet-Logo-White.png');
$brandAlt = 'MyMI Wallet - Investment Accounting/Analytical Software & Crypto Asset Marketplace/Exchange';
?>

<nav class="intro-navbar navbar navbar-expand-lg navbar-dark fixed-top">
  <div class="container-fluid px-3 px-md-5">
    <a class="navbar-brand d-flex align-items-center" href="<?= $homeUrl ?>">
      <img class="logo-img logo-light img-fluid" style="max-height: 40px;"
           src="<?= esc($brandImage) ?>" srcset="<?= esc($brandImage) ?>"
           alt="<?= esc($brandAlt) ?>">
    </a>

    <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse"
            data-bs-target="#publicNavbarNav"
            aria-controls="publicNavbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse intro-nav" id="publicNavbarNav">
      <ul class="navbar-nav w-100 w-lg-auto mt-2 mt-lg-0 align-items-lg-center gap-lg-2">
        <li class="nav-item intro-nav-item">
          <a href="<?= $homeUrl ?>" class="link-to nav-link intro-nav-link">Home</a>
        </li>
        <li class="nav-item intro-nav-item">
          <a href="<?= $featuresUrl ?>" class="link-to nav-link intro-nav-link">Features</a>
        </li>
        <li class="nav-item intro-nav-item">
          <a href="<?= site_url('How-It-Works'); ?>" class="link-to nav-link intro-nav-link">How It Works</a>
        </li>

        <!-- spacer that only grows on lg+ to push the last item right -->
        <li class="d-none d-lg-block flex-lg-grow-1"></li>

        <li class="nav-item intro-nav-item py-2 py-lg-0 ps-lg-1 ms-lg-0">
          <?php if ($isLoggedIn): ?>
            <a href="<?= $dashboardUrl ?>" class="btn btn-primary text-white me-2"><span>ACCOUNT</span></a>
            <form action="<?= site_url('logout') ?>" method="post" class="d-inline"><?= csrf_field() ?><button type="submit" class="btn btn-outline-light" aria-label="Sign out"><span><em class="icon ni ni-signout"></em></span></button></form>
          <?php else: ?>
            <a href="<?= esc($loginUrl, 'attr') ?>" class="btn btn-primary text-white"><span>LOGIN</span></a>
          <?php endif; ?>
        </li>
      </ul>
    </div>
  </div>
</nav>
