<?php
use Config\Services;
$auth = service('authentication');
$session = service('session');
$request = service('request');
$currentUserID = $session->get('user_id') ?? '';
$currentUserRoleID = $session->get('user_role_id') ?? '';
$currentUserEmail = $session->get('user_email') ?? '';
$marketMovers = date("F-jS-Y");

// Assuming 'beta' is a configuration item in App config
$beta = $beta ?? '';

$btnURL = ($beta === 0) ? site_url('/Free/register') : site_url('/Beta/register');
$btnText = empty($currentUserID) ? 'Register Now' : 'Dashboard';
$dashboardURL = site_url('/Dashboard');
$loginURL = site_url('/login');
if (empty($cuID)) {
    if ($beta === 0) {
        $btnURL = site_url('/Free/register');
    } elseif ($beta === 1) {
        $btnURL = site_url('/Beta/register');
    }
    $btnText = 'Register Now';
} else {
    $btnURL = site_url('/Dashboard');
    $btnText = 'Dashboard';
}
?>

<style <?= $nonce['style'] ?? '' ?>>
.navbar {
    background-color: #10006b !important;
    opacity: 1;
    transition: background-color 200ms linear;
}
.intro-navbar.scrolled {
  /* background-color: #fff !important; */
  transition: background-color 200ms linear;
}
.intro-action .btn {
    line-height: .75rem; 
}

.logo-light,
.logo-dark {
    max-width: 100%;
    height: auto;
    object-fit: contain; /* New addition */
}

/* Responsive logo */
#main_logo,
#mobile_logo {
    width: 20vw; /* Adjust based on your needs */
    max-height: 50px; /* You can adjust this value */
    object-fit: contain; /* New addition */
}

/* For mobile screens */
@media (max-width: 767.98px) {
    #main_logo,
    #mobile_logo {
        width: 40vw; /* Adjust based on your needs */
        margin: 0 auto !important; /* Add !important to override any other styles */
        object-fit: contain; /* New addition */
    }

    /* Explicitly set padding and margin for mobile logo */
    #mobile_logo {
        padding: 0 !important;
        margin-left: 0 !important;
        margin-right: auto !important;
    }
}

.navbar-toggler-icon {
    background-color: white;
}
.nav-item:last-child {
    margin-right: 20px;  /* Add right margin to the last nav-item */
}
</style>

<?php if ($request->getUserAgent()->isMobile()): ?>
    <!-- Mobile Navbar -->
    <div class="intro-navbar navbar navbar-expand-lg" style="background-color: #10006b !important; opacity: 1;">
        <div class="container container-xl">
            <div class="intro-wrap row pt-0 d-flex justify-content-between align-items-center w-100">
                <!-- Logo -->
                <div class="intro-logo d-none d-md-block d-flex col-auto pt-3 pt-lg-0 pl-4 px-lg-5 justify-content-start">
                    <a href="<?php echo site_url('/'); ?>" class="logo-link w-100 mt-md-1">
                        <img class="logo-img logo-dark img-fluid w-100 d-none d-md-block ml-0" id="main_logo" src="<?php echo base_url('assets/images/MyMI-Wallet-Logo-White.png'); ?>" srcset="<?php echo base_url('assets/images/MyMI-Wallet-Logo-White.png'); ?>" alt="MyMI Wallet - Investment Accounting/Analytical Software & Crypto Asset Marketplace/Exchange">
                    </a>
                </div>
                
                <!-- Navbar Toggler and Login Button for Mobile -->
                <div class="d-flex col-auto align-items-center justify-content-end px-0">
                    <button class="navbar-toggler mx-0 px-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <img class="logo-img logo-dark img-fluid" id="mobile_logo" src="<?php echo base_url('assets/images/MyMI-Wallet.png'); ?>" srcset="<?php echo base_url('assets/images/MyMI-Wallet.png'); ?>" alt="MyMI Wallet - Investment Accounting/Analytical Software & Crypto Asset Marketplace/Exchange">
                        <span class="text-white">MENU</span>
                        <!-- <span class="text-white"><em class="icon ni ni-menu"></em></span> -->
                    </button>
                </div>
                <!-- Spacer to push elements to the sides -->
                <div class="flex-grow-1 d-none d-md-block"></div>
                
                <div class="col-auto">
                    <!-- Login Button specifically for mobile view -->
                    <?php 
                        if (!empty($auth->check())) {
                            echo '
                                <a href="' . site_url('/Dashboard') . '" class="btn btn-primary d-md-none">
                                    <span>ACCOUNT</span>
                                </a>
                            ';
                        } else {
                            echo '
                                <a href="' . site_url('/login') . '" class="btn btn-primary d-md-none">
                                    <span>LOGIN</span>
                                </a>
                            ';
                        }
                    ?>
                </div>
            </div>

            <!-- Navbar Items -->
            <div class="collapse navbar-collapse intro-nav align-items-right" id="navbarNav">
                <ul class="navbar-nav mt-1 pl-4 pl-lg-0">
                    <li class="nav-item intro-nav-item">
                        <a href="<?php echo site_url(''); ?>" class="link-to nav-link intro-nav-link">Home <?= $currentUserID; ?></a>
                    </li>
                    <li class="nav-item intro-nav-item">
                        <a href="<?php echo site_url(''); ?>#features" class="link-to nav-link intro-nav-link">Features</a>
                    </li>
                    <li class="intro-nav-item nav-item dropdown">
                        <a class="intro-nav-link nav-link dropdown-toggle" href="#" id="resourcesDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Resources
                        </a>
                        <div class="dropdown-menu public-sitenav-dropdown" id="public-sitenav-dropdown" aria-labelledby="resourcesDropdown">
                            <a class="dropdown-item" href="<?php echo site_url('/Blog'); ?>">Blog</a>
                            <a class="dropdown-item" href="<?php echo site_url('/How-It-Works'); ?>">How It Works</a>
                            <a class="dropdown-item" href="<?php echo site_url('/Knowledgebase'); ?>">Knowledgebase</a>
                        </div>
                    </li>
                    <li class="nav-item intro-nav-item d-lg-inline-flex">
                        <a href="<?php echo site_url('Support'); ?>" class="nav-link intro-nav-link">Support</a>
                    </li>
                    <li class="nav-item intro-nav-item py-1 pl-lg-1">
                        <?php 
                        if (!empty($auth->check())) {
                            echo '
                                <a href="' . site_url('/Dashboard') . '" class="btn btn-primary">
                                    <span>ACCOUNT</span>
                                </a>
                            ';
                        } else {
                            echo '
                                <a href="' . site_url('/login') . '" class="btn btn-primary">
                                    <span>LOGIN</span>
                                </a>
                            ';
                        }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
<?php elseif ($request->getUserAgent()->isBrowser()): ?>
    <!-- Desktop Navbar -->
    <div class="intro-navbar navbar navbar-expand-lg" style="background-color: #10006b !important; opacity: 1;">
        <div class="container container-xl">
            <div class="intro-wrap row pt-0 d-flex justify-content-between align-items-center w-100">
                <!-- Logo -->
                <div class="intro-logo d-none d-md-block d-flex col-auto pt-3 pt-lg-0 pl-4 px-lg-5 justify-content-start">
                    <a href="<?php echo site_url('/'); ?>" class="logo-link w-100 mt-md-1">
                        <img class="logo-img logo-dark img-fluid w-100 d-none d-md-block ml-0" id="main_logo" src="<?php echo base_url('assets/images/MyMI-Wallet-Logo-White.png'); ?>" srcset="<?php echo base_url('assets/images/MyMI-Wallet-Logo-White.png'); ?>" alt="MyMI Wallet - Investment Accounting/Analytical Software & Crypto Asset Marketplace/Exchange">
                    </a>
                </div>
                
                <!-- Navbar Toggler and Login Button for Mobile -->
                <div class="d-flex col-auto align-items-center justify-content-end">
                    <button class="navbar-toggler mr-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <img class="logo-img logo-dark img-fluid" id="mobile_logo" src="<?php echo base_url('assets/images/MyMI-Wallet.png'); ?>" srcset="<?php echo base_url('assets/images/MyMI-Wallet.png'); ?>" alt="MyMI Wallet - Investment Accounting/Analytical Software & Crypto Asset Marketplace/Exchange">
                        <span class="text-white">MENU</span>
                        <!-- <span class="text-white"><em class="icon ni ni-menu"></em></span> -->
                    </button>
                </div>
                <!-- Spacer to push elements to the sides -->
                <div class="flex-grow-1 d-none d-md-block"></div>
                
                <div class="col-auto">
                    <!-- Login Button specifically for mobile view -->
                    <?php 
                        if (!empty($auth->check())) {
                            echo '
                                <a href="' . site_url('/Dashboard') . '" class="btn btn-primary d-md-none">
                                    <span>ACCOUNT</span>
                                </a>
                            ';
                        } else {
                            echo '
                                <a href="' . site_url('/login') . '" class="btn btn-primary d-md-none">
                                    <span>LOGIN</span>
                                </a>
                            ';
                        }
                    ?>
                </div>
            </div>

            <!-- Navbar Items -->
            <div class="collapse navbar-collapse intro-nav align-items-right" id="navbarNav">
                <ul class="navbar-nav mt-1 pl-4 pl-lg-0">
                    <li class="nav-item intro-nav-item">
                        <a href="<?php echo site_url(''); ?>" class="link-to nav-link intro-nav-link">Home <?= $currentUserID; ?></a>
                    </li>
                    <li class="nav-item intro-nav-item">
                        <a href="<?php echo site_url(''); ?>#features" class="link-to nav-link intro-nav-link">Features</a>
                    </li>
                    <li class="intro-nav-item nav-item dropdown">
                        <a class="intro-nav-link nav-link dropdown-toggle" href="#" id="resourcesDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Resources
                        </a>
                        <div class="dropdown-menu public-sitenav-dropdown" id="public-sitenav-dropdown" aria-labelledby="resourcesDropdown">
                            <a class="dropdown-item" href="<?php echo site_url('/Blog'); ?>">Blog</a>
                            <a class="dropdown-item" href="<?php echo site_url('/How-It-Works'); ?>">How It Works</a>
                            <a class="dropdown-item" href="<?php echo site_url('/Knowledgebase'); ?>">Knowledgebase</a>
                        </div>
                    </li>
                    <li class="nav-item intro-nav-item d-lg-inline-flex">
                        <a href="<?php echo site_url('Support'); ?>" class="nav-link intro-nav-link">Support</a>
                    </li>
                    <li class="nav-item intro-nav-item py-1 pl-lg-1">
                        <?php 
                        if (!empty($auth->check())) {
                            echo '
                                <a href="' . site_url('/Dashboard') . '" class="btn btn-primary">
                                    <span>ACCOUNT</span>
                                </a>
                            ';
                        } else {
                            echo '
                                <a href="' . site_url('/login') . '" class="btn btn-primary">
                                    <span>LOGIN</span>
                                </a>
                            ';
                        }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
<?php endif; ?>
