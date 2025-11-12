<?php
$auth = service('authentication');

$isLoggedIn = !empty($auth->check());
$homeUrl = site_url('/');
$featuresUrl = site_url('#features');
$supportUrl = site_url('Support');
$dashboardUrl = site_url('/Dashboard');
$loginUrl = site_url('/login');

$brandImage = base_url('assets/images/MyMI-Wallet-Logo-White.png');
$brandAlt = 'MyMI Wallet - Investment Accounting/Analytical Software & Crypto Asset Marketplace/Exchange';
?>

<!-- <nav class="intro-navbar navbar navbar-expand-lg navbar-dark bg-dark intro-navbar"> -->
<nav class="intro-navbar navbar navbar-expand-lg intro-navbar fixed-top">
  <div class="container container-fluid w-80 px-5">
    <a class="navbar-brand d-flex align-items-center" href="<?= $homeUrl ?>">
      <img class="logo-img logo-dark img-fluid"
           src="<?= esc($brandImage) ?>" srcset="<?= esc($brandImage) ?>"
           alt="<?= esc($brandAlt) ?>">
    </a>

    <!-- <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse"
            data-bs-target="#publicNavbarNav"
            aria-controls="publicNavbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> -->

    <div class="navbar-collapse intro-nav" id="publicNavbarNav" style="display:block">
      <ul class="navbar-nav w-100 w-lg-auto mt-1 ps-4 ps-lg-0 align-items-lg-center gap-lg-2">
        <li class="nav-item intro-nav-item">
          <a href="<?= $homeUrl ?>" class="link-to nav-link intro-nav-link">Home</a>
        </li>
        <li class="nav-item intro-nav-item">
          <a href="<?= $featuresUrl ?>" class="link-to nav-link intro-nav-link">Features</a>
        </li>

        <!-- <li class="nav-item intro-nav-item dropdown">
          <a class="nav-link intro-nav-link dropdown-toggle"
             href="#" id="resourcesDropdownPublic"
             role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Resources
          </a>
          <ul class="dropdown-menu public-sitenav-dropdown" aria-labelledby="resourcesDropdownPublic">
            <li><a class="dropdown-item" href="<?= site_url('Blog') ?>">Blog</a></li>
            <li><a class="dropdown-item" href="<?= site_url('How-It-Works') ?>">How It Works</a></li>
            <li><a class="dropdown-item" href="<?= site_url('Knowledgebase') ?>">Knowledgebase</a></li>
          </ul>
        </li> -->

        <!-- spacer that only grows on lg+ to push the last item right -->
        <li class="d-none d-lg-block flex-lg-grow-1"></li>

        <li class="nav-item intro-nav-item py-1 ps-lg-1 ms-lg-0">
          <?php if ($isLoggedIn): ?>
            <a href="<?= $dashboardUrl ?>" class="btn btn-primary"><span>ACCOUNT</span></a>
          <?php else: ?>
            <a href="<?= $loginUrl ?>" class="btn btn-primary"><span>LOGIN</span></a>
          <?php endif; ?>
        </li>
      </ul>
    </div>
  </div>
</nav>
