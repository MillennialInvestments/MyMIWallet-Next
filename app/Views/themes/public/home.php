<?php
$currentUserID     = $current_user->id ?? '';
$currentUserRoleID = $current_user->role_id ?? '';
$cuID              = $cuID ?? 0;
$beta              = $beta ?? 0;
$btnURL            = empty($cuID) ? ($beta === 0 ? site_url('/Free/register') : site_url('/Beta/register')) : site_url('/Dashboard');
$btnText           = empty($cuID) ? 'Register Now' : 'Dashboard';
// get SocialMedia config and any $socialMedia passed in, without triggering notices
$socialMedia = $socialMedia ?? config('SocialMedia') ?? (object)[];

// normalize to arrays and merge with defaults
$cfgArr = is_object($socialMedia) ? get_object_vars($socialMedia) : (array) $socialMedia;
$defaults = [
  'discord'              => 'https://discord.gg/mymiwallet',
  'facebook_page'        => 'https://www.facebook.com/MyMIWalletNews',
  'facebook_group'       => 'https://www.facebook.com/InvestorsTalk',
  'linkedin'             => 'https://www.linkedin.com/MyMIWallet',
  'tiktok'               => 'https://www.tiktok.com/@MyMIWallet',
  'tradingview'          => 'https://www.tradingview.com/u/MyMIWallet/',
  'twitter'              => 'https://twitter.com/MyMIWalletNews',
  'youtube'              => 'https://www.youtube.com/@MyMIWallet',
  'promotional_yt_video' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
];
$sm = array_merge($defaults, $cfgArr);

// Social media platforms array with titles, descriptions, and links
$socialPlatforms = [
    'Discord' => [
        'button' => 'Join Our ',
        'url' => $sm['discord'],
        'description' => 'Connect with a thriving community of like-minded investors and financial enthusiasts. Engage in real-time discussions, join dedicated channels for financial tips, and get direct support.',
        'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="3rem" height="3rem" fill="currentColor" class="bi bi-discord ad-font-lg" viewBox="0 0 16 16">
                    <path d="M13.545 2.907a13.227 13.227 0 0 0-3.257-1.011.05.05 0 0 0-.052.025c-.141.25-.297.577-.406.833a12.19 12.19 0 0 0-3.658 0 8.258 8.258 0 0 0-.412-.833.051.051 0 0 0-.052-.025c-1.125.194-2.22.534-3.257 1.011a.041.041 0 0 0-.021.018C.356 6.024-.213 9.047.066 12.032c.001.014.01.028.021.037a13.276 13.276 0 0 0 3.995 2.02.05.05 0 0 0 .056-.019c.308-.42.582-.863.818-1.329a.05.05 0 0 0-.01-.059.051.051 0 0 0-.018-.011 8.875 8.875 0 0 1-1.248-.595.05.05 0 0 1-.02-.066.051.051 0 0 1 .015-.019c.084-.063.168-.129.248-.195a.05.05 0 0 1 .051-.007c2.619 1.196 5.454 1.196 8.041 0a.052.052 0 0 1 .053.007c.08.066.164.132.248.195a.051.051 0 0 1-.004.085 8.254 8.254 0 0 1-1.249.594.05.05 0 0 0-.03.03.052.052 0 0 0 .003.041c.24.465.515.909.817 1.329a.05.05 0 0 0 .056.019 13.235 13.235 0 0 0 4.001-2.02.049.049 0 0 0 .021-.037c.334-3.451-.559-6.449-2.366-9.106a.034.034 0 0 0-.02-.019Zm-8.198 7.307c-.789 0-1.438-.724-1.438-1.612 0-.889.637-1.613 1.438-1.613.807 0 1.45.73 1.438 1.613 0 .888-.637 1.612-1.438 1.612Zm5.316 0c-.788 0-1.438-.724-1.438-1.612 0-.889.637-1.613 1.438-1.613.807 0 1.451.73 1.438 1.613 0 .888-.631 1.612-1.438 1.612Z"/>
                </svg>'
    ],
    'Facebook Page' => [
        'button' => 'Like Our ',
        'url' => $sm['facebook_page'],
        'description' => 'Stay up-to-date with the latest MyMI Wallet news and feature updates. Follow our official announcements, market trends, and promotional events.',
        'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="3rem" height="3rem" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                </svg>'
    ],
    'Investors Talk FB Group' => [
        'button' => 'Join The ',
        'url' => $sm['facebook_group'],
        'description' => 'Meet and exchange ideas with other investors in our exclusive Facebook Group. Perfect for discussions around personal finance and investment strategies.',
        'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="3rem" height="3rem" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
            </svg>'
    ],
    'LinkedIn' => [
        'button' => 'Connect On LinkedIn',
        'url' => $sm['linkedin'],
        'description' => 'Gain professional insights into fintech and investment management with MyMI Wallet on LinkedIn. Connect with industry leaders and explore in-depth articles and updates.',
        'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="3rem" height="3rem" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
            </svg>'
    ],
    'TikTok' => [
        'button' => 'Follow On TikTok',
        'url' => $sm['tiktok'],
        'description' => 'Discover bite-sized finance tips, investment insights, and platform features on TikTok. Ideal for anyone looking to learn finance in a fun and accessible way!',
        'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="3rem" height="3rem" fill="currentColor" class="bi bi-tiktok" viewBox="0 0 16 16">
                <path d="M9.117 0h1.631a.253.253 0 01.251.25v.647c0 .668.276 1.303.765 1.766a2.572 2.572 0 001.728.71c.14 0 .248.112.248.25v1.317a.253.253 0 01-.267.249 5.797 5.797 0 01-3.114-.815v5.592a3.454 3.454 0 11-2.505-3.33v1.537a1.917 1.917 0 101.185 1.77V0zM8.36 3.958a5.773 5.773 0 01-1.147-.553v6.837a1.92 1.92 0 00-1.35-2.167V7.34a3.451 3.451 0 012.497 3.323V3.958z"/>
            </svg>'
    ],
    'TradingView' => [
        'button' => 'Follow On TradingView',
        'url' => $sm['tradingview'],
        'description' => 'Follow us on TradingView to access technical analysis and trading insights. Perfect for new and seasoned investors looking to deepen market knowledge.',
        'svg' => '<div style="height: 48px; display: flex; align-items: center; justify-content: center;">
                <img src="' . base_url('assets/images/Company-Logos/TradingView-white-short-logo.png') . '" class="bi bi-facebook" style="height: 100%; object-fit: cover;"/>
            </div>'
    ],
    'Twitter' => [
        'button' => 'Follow On ',
        'url' => 'https://www.twitter.com/MyMIWalletNews',
        'description' => 'Get real-time updates, market insights, and quick tips on Twitter. Join us for timely, relevant information as it unfolds.',
        'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="3rem" height="3rem" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
            </svg>'
    ],
    'YouTube' => [
        'button' => 'Subscribe On ',
        'url' => 'https://www.youtube.com/@MyMIWallet',
        'description' => 'Watch tutorials, expert interviews, and investment guides on YouTube. Our videos cover everything from platform tutorials to advanced financial strategies.',
        'svg' => '<svg xmlns="http://www.w3.org/2000/svg" width="3rem" height="3rem" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
                <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z"/>
            </svg>'
    ]
];
// $reporting             = $reporting ?? [
//     'totalActiveUsers' => 25000,
//     'totalWalletsCreated' => 18500,
//     'totalTradesTracked' => 1250000,
//     'totalActivePartners' => 350
// ];
// $totalActiveUsers = $reporting['totalActiveUsers'];
        // log_message('info', 'Home.php L16 - $reporting Array: ' . (print_r($reporting['totalActiveUsers'], true)));
?>

<style <?= $nonce['style'] ?? '' ?>>
.hero-section {
    background: url(<?= base_url('assets/images/MyMI-Walllet-Background.jpeg'); ?>) no-repeat center center fixed;
    background-size: cover;
}
.social-icon-link {
    display: inline-block;
    color: white;
    transition: color 0.3s ease, transform 0.3s ease;
}

.social-icon-link:hover {
    color: var(--bs-primary); /* Your Bootstrap primary color */
    transform: scale(1.2); /* Stepping forward effect */
}

.social-icon-link svg path {
    fill: currentColor; /* Follows parent color */
    transition: fill 0.3s ease;
}


</style>

<!-- Hero Section -->
<section class="hero-section pt-0 full-width">
    <div class="container-fluid p-5">
        <div class="row align-items-center">
            <div class="col-lg-2"></div>
            <div class="col-lg-4" data-aos="fade-right" data-aos-duration="1000">
                <div class="hero-content text-white p-4">
                    <span class="badge bg-warning text-dark mb-3 animate-pulse">Introducing</span>
                    <h1 class="display-4 fw-bold mb-3">Welcome to MyMI Wallet</h1>
                    <h2 class="h3 mb-4">Your All-In-One Financial Dashboard</h2>
                    <h3 class="lead mb-4">
                        From budgeting and goal setting to investing and crypto, MyMI Wallet gives you the tools to manage and grow your financial life. 
                    </h3>
                    <div class="video-container position-relative rounded-4 overflow-hidden shadow-lg">
                        <div class="ratio ratio-16x9">
                            <iframe src="<?= $socialMedia->promotional_yt_video ?>" title="MyMI Wallet Overview" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="d-flex flex-wrap gap-2 mt-4">
                        <a href="<?= $btnURL ?>" class="btn btn-warning btn-lg">
                            <?= $btnText ?> <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
                <div class="hero-content text-white mt-5 p-4">
                    <h1 class="display-4 fw-bold mb-3 text-center">Join The Community!<br><hr></h1>
                    <div class="d-flex flex-wrap gap-3 mt-2 mb-4 align-items-center justify-content-center">
                        <?php foreach ($socialPlatforms as $platform => $details): ?>
                            <a href="<?= $details['url'] ?>" target="_blank" 
                            class="social-icon-link" title="<?= $platform ?>">
                                <?= $details['svg'] ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-5 pl-lg-5 d-block-lg" data-aos="fade-left" data-aos-duration="1000">  
                <div class="intro-banner-wrap">
                    <div class="intro-banner-inner">
                        <div class="intro-banner-desc pt-5">
                            <div class="card rounded p-3">
                                <div class="card-body">
                                    <?php echo view('App\Views\Auth\register_form'); ?>
                                </div>
                            </div>
                            <div id="features"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wave-divider">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#ffffff" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,149.3C960,160,1056,160,1152,138.7C1248,117,1344,75,1392,53.3L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
    </div>
</section>

<!-- Features Preview -->
<section class="py-5 bg-light full-width" id="journey">
    <div class="container-fluid">
        <div class="row justify-content-center text-center">
            <div class="col-lg-10" data-aos="fade-up">
                <span class="badge bg-primary text-white mb-3">All-In-One Platform</span>
                <h2 class="display-5 fw-bold mb-3">Why Choose MyMI Wallet?</h2>
                <p class="lead mb-5">We simplify your financial life by bringing everything into one place — budgeting, investing, crypto, goal tracking, and more.</p>
            </div>
        </div>
        <div class="row text-center g-4">
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                <div class="feature-card p-4 h-100 shadow-sm bg-white rounded-4">
                    <i class="fas fa-piggy-bank fa-2x text-primary mb-3"></i>
                    <h5>Personal Budgeting</h5>
                    <p>Create, manage, and forecast your monthly budget with real-time visibility.</p>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
                <div class="feature-card p-4 h-100 shadow-sm bg-white rounded-4">
                    <i class="fas fa-bullseye fa-2x text-success mb-3"></i>
                    <h5>Financial Goals</h5>
                    <p>Set SMART financial goals and track progress with powerful visual dashboards.</p>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
                <div class="feature-card p-4 h-100 shadow-sm bg-white rounded-4">
                    <i class="fas fa-chart-line fa-2x text-danger mb-3"></i>
                    <h5>Investing & Trade Alerts</h5>
                    <p>Get real-time insights and manage your investment portfolio with confidence.</p>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="400">
                <div class="feature-card p-4 h-100 shadow-sm bg-white rounded-4">
                    <i class="fas fa-coins fa-2x text-warning mb-3"></i>
                    <h5>Crypto Wallet & MyMI Gold</h5>
                    <p>Earn, save, and spend with crypto & in-app rewards using MyMI Gold tokens.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="features-section py-5 mb-5 bg-white full-width">
    <div class="container-fluid">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-8" data-aos="fade-up">
                <span class="badge bg-primary text-white mb-3">Our Services & Tools</span>
                <h2 class="display-5 fw-bold mb-3">Your All-in-One Investment Toolkit</h2>
                <p class="lead">
                    MyMI Wallet equips investors with powerful, user-friendly tools to enhance financial decision-making. Whether you're a novice or a seasoned investor, we offer solutions tailored to optimize your financial strategies.
                </p>
            </div>
        </div>

        <div class="row justify-content-center g-4">
            <div class="col-xl-8">
                <div class="row intro-feature-list">
                    <!-- Personal Financial Budgeting -->
                    <div class="col-md-10 col-lg-4">
                        <div class="intro-feature-item">
                            <div class="intro-feature-media">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" id="GrowthReport">
                                    <path fill="#4285f4" d="M255.328,511.507H68.479a30.689,30.689,0,0,1-30.786-30.59V30.59A30.678,30.678,0,0,1,68.479,0H403.837a30.678,30.678,0,0,1,30.786,30.59V409.929Z" class="color79a1b5 svgShape"></path>
                                    <path fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="6" d="M89.79,135.1a29.1,29.1,0,1,0,58.205,0c0-7.919-5.933-14.487-12.864-19.339a39.808,39.808,0,0,0-16.283-6.309C104.423,106.993,89.791,96.277,89.791,82.2a29.1,29.1,0,1,1,58.2,0" class="colorStrokeffffff svgStroke"></path>
                                    <line x1="118.891" x2="118.891" y1="53.083" y2="34.55" fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="6" class="colorStrokeffffff svgStroke"></line>
                                    <line x1="118.891" x2="118.891" y1="182.748" y2="164.215" fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="6" class="colorStrokeffffff svgStroke"></line>
                                    <line x1="203.363" x2="382.519" y1="82.368" y2="82.368" fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="6" class="colorStrokeffffff svgStroke"></line>
                                    <line x1="203.363" x2="334.719" y1="134.93" y2="134.93" fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="6" class="colorStrokeffffff svgStroke"></line>
                                    <path fill="#34a853" d="M308.409,285.629c12.422,18.106,23.514,35.7,32.528,51.607L361,387.429,349.857,493.714l-11.847,7.768c-25.08,10.671-62.026,13.2-110.295,7.685-161.207-18.4.209-223.538.209-223.538L239.286,271.5l64.5,6.214Z" class="color964c36 svgShape"></path>
                                    <path fill="#fbbc05" d="M321.365,355.123l0,128.972c.779,7.229,6.9,13.25,18.343,18.13,14.03,5.987,34.86,9.775,58.127,9.775s44.1-3.788,58.126-9.775c11.438-4.88,17.689-10.9,18.34-18.13l0-128.972Z" class="colorffcd0c svgShape"></path>
                                    <ellipse cx="397.834" cy="355.123" fill="#fac019" rx="76.469" ry="27.905" class="colorfaa719 svgShape"></ellipse>
                                    <path fill="#fac019" d="M321.37,442.707c0,6.924,6.9,13.249,18.342,18.117,14.03,5.987,34.86,9.775,58.127,9.775s44.1-3.788,58.126-9.775c11.438-4.868,18.342-11.193,18.342-18.117V398.921c0,6.924-6.9,13.25-18.342,18.118-14.03,5.987-34.86,9.774-58.126,9.774s-44.1-3.787-58.127-9.774c-11.438-4.868-18.342-11.194-18.342-18.118Z" class="colorfaa719 svgShape"></path>
                                    <path fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="6" d="M245.023,418.442a21.6,21.6,0,1,0,43.19,0c0-5.876-4.4-10.75-9.545-14.35a29.541,29.541,0,0,0-12.083-4.682c-10.7-1.825-21.561-9.776-21.561-20.218a21.594,21.594,0,1,1,43.187,0" class="colorStrokeffffff svgStroke"></path>
                                    <line x1="266.617" x2="266.617" y1="357.583" y2="343.83" fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="6" class="colorStrokeffffff svgStroke"></line>
                                    <line x1="266.617" x2="266.617" y1="453.799" y2="440.046" fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="6" class="colorStrokeffffff svgStroke"></line>
                                    <path fill="#ea4335" d="M331.478,222.877l-23.063,62.752H227.921l-27.006-62.752s17.235-10.833,59.366,4.445a90.406,90.406,0,0,0,34.338,5.657C318.96,232.015,331.478,222.877,331.478,222.877Z" class="colorc36245 svgShape"></path>
                                </svg>
                            </div>
                            <div class="intro-feature-info">
                                <h4 class="title">Personal Financial Budgeting</h4>
                                <p>
                                    Take control of your finances with our Personal Budgeting tool. From expense tracking and budget creation to setting financial goals, it’s a comprehensive solution to help you manage your money effectively and achieve lasting financial success.
                                </p>
                                <a class="btn btn-primary btn-sm" href="<?php echo site_url('/How-It-Works/Personal-Budgeting'); ?>">Explore More</a>
                            </div>
                        </div>
                    </div>

                    <!-- Investment Portfolio Management -->
                    <div class="col-md-10 col-lg-4">
                        <div class="intro-feature-item">
                            <div class="intro-feature-media">
                                <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 64 64" viewBox="0 0 64 64" id="Barchart">
                                    <path fill="#2b643a" d="M18.41,17.81h-6c-0.54,0-0.97,0.43-0.97,0.97v32.15c0,0.54,0.43,0.97,0.97,0.97h6
                                            c0.54,0,0.97-0.43,0.97-0.97V18.78C19.38,18.24,18.95,17.81,18.41,17.81z M17.44,49.96h-4.06V19.75h4.06V49.96z" class="color2b2f64 svgShape"></path>
                                    <rect width="4.06" height="30.21" x="13.38" y="19.75" fill="#fbbc05" class="colorfedc7d svgShape"></rect>
                                    <path fill="#2b643a" d="M29.47,26h-6c-0.54,0-0.97,0.43-0.97,0.97v23.96c0,0.54,0.43,0.97,0.97,0.97h6c0.54,0,0.97-0.43,0.97-0.97
                                            V26.97C30.44,26.43,30.01,26,29.47,26z M28.5,49.96h-4.06V27.94h4.06V49.96z" class="color2b2f64 svgShape"></path>
                                    <rect width="4.06" height="22.02" x="24.44" y="27.94" fill="#34a853" class="color54bfa0 svgShape"></rect>
                                    <path fill="#2b643a" d="M40.53,34.19h-6.01c-0.53,0-0.97,0.44-0.97,0.97v15.77c0,0.54,0.44,0.97,0.97,0.97h6.01
                                            c0.54,0,0.97-0.43,0.97-0.97V35.16C41.5,34.63,41.07,34.19,40.53,34.19z M39.561,49.96h-4.07V36.13h4.07V49.96z" class="color2b2f64 svgShape"></path>
                                    <rect width="4.07" height="13.83" x="35.49" y="36.13" fill="#4285f4" class="color4fbee6 svgShape"></rect>
                                    <path fill="#2b643a" d="M51.59,42.38h-6.01c-0.53,0-0.97,0.44-0.97,0.97v7.58c0,0.54,0.44,0.97,0.97,0.97h6.01
                                            c0.54,0,0.97-0.43,0.97-0.97v-7.58C52.561,42.82,52.13,42.38,51.59,42.38z M50.621,49.96h-4.07v-5.64h4.07V49.96z" class="color2b2f64 svgShape"></path>
                                    <rect width="4.07" height="5.64" x="46.55" y="44.32" fill="#ea4335" class="colorf26e62 svgShape"></rect>
                                    <path fill="#2b643a" d="M63.51,58.51l-5.85-3.71c-0.3-0.19-0.67-0.2-0.98-0.03c-0.31,0.17-0.51,0.5-0.51,0.85v2.74H5.69V7.76h2.73
                                            c0.36,0,0.68-0.2,0.85-0.51c0.17-0.31,0.16-0.69-0.03-0.98l-3.7-5.85c-0.36-0.56-1.29-0.56-1.64,0L0.19,6.27
                                            C0,6.56-0.01,6.94,0.16,7.25c0.17,0.31,0.5,0.51,0.85,0.51h2.74v51.57c0,0.53,0.43,0.97,0.97,0.97h51.45v2.73
                                            c0,0.36,0.2,0.68,0.51,0.85c0.14,0.08,0.3,0.12,0.46,0.12c0.18,0,0.36-0.05,0.52-0.15l5.85-3.7c0.28-0.18,0.45-0.49,0.45-0.82
                                            C63.96,58.99,63.791,58.68,63.51,58.51z M2.78,5.81l1.94-3.06l1.94,3.06H2.78z M58.11,61.27v-3.89l3.06,1.95L58.11,61.27z" class="color2b2f64 svgShape"></path>
                                    <polygon fill="#ea4335" points="6.66 5.81 2.78 5.81 4.72 2.75" class="colorf26e62 svgShape"></polygon>
                                    <polygon fill="#fbbc05" points="61.17 59.33 58.11 61.27 58.11 57.38" class="colorfedc7d svgShape"></polygon>
                                </svg>
                            </div>
                            <div class="intro-feature-info">
                                <h4 class="title">Investment Portfolio Management</h4>
                                <p>
                                    The Investment Portfolio Management feature gives you powerful tools to track, analyze, and optimize your investments. With real-time market updates, custom alerts, and detailed analytics, you can make better financial decisions.
                                </p>
                                <a class="btn btn-primary btn-sm" href="<?php echo site_url('/How-It-Works/Investment-Portfolio-Management'); ?>">Learn More</a>
                            </div>
                        </div>
                    </div>

                    <!-- Daily Financial News -->
                    <div class="col-md-10 col-lg-4">
                        <div class="intro-feature-item">
                            <div class="intro-feature-media">
                            <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" id="StocksNews" x="0" y="0" enable-background="new 0 0 64 64" version="1.1" viewBox="0 0 64 64">
                                <path d="M63.86,11.98L54.38,1.92h-0.01c-0.03-0.04-0.08-0.07-0.13-0.09c-0.01-0.01-0.02-0.02-0.03-0.02
                                        c-0.06-0.03-0.12-0.04-0.19-0.04h-46c-0.27,0-0.49,0.22-0.49,0.49v6.7H0.49C0.22,8.96,0,9.18,0,9.46v48.5
                                        c0,2.35,1.91,4.26,4.26,4.26h59.24c0.27,0,0.49-0.22,0.49-0.49V12.31C64,12.19,63.95,12.07,63.86,11.98z M54.52,3.51l8.09,8.58
                                        h-8.09V3.51z M4.26,61.24c-1.81,0-3.28-1.47-3.28-3.28V9.95h6.55v48.01C7.53,59.77,6.07,61.24,4.26,61.24z M63.02,61.24H6.95
                                        c0.95-0.78,1.57-1.95,1.57-3.28V2.76h45.02v9.82c0,0.27,0.22,0.49,0.49,0.49h8.99V61.24z" fill="#000000" class="color000000 svgShape"></path>
                                <polygon fill="#4e5550" points="62.61 12.09 54.52 12.09 54.52 3.51" class="color554e55 svgShape"></polygon>
                                <path fill="#4285f4" d="M7.53,9.95v48.01c0,1.81-1.47,3.28-3.27,3.28c-1.81,0-3.28-1.47-3.28-3.28V9.95H7.53z" class="colorbfbbbe svgShape"></path>
                                <path fill="#cacbcc" d="M54.03,13.07c-0.28,0-0.49-0.23-0.49-0.49V2.76H8.52v55.2c0,1.33-0.62,2.5-1.57,3.28h56.06V13.07H54.03z
                                        M48.49,20.23c-1.81,0-3.28-1.45-3.28-3.24s1.47-3.25,3.28-3.25c1.82,0,3.29,1.46,3.29,3.25c0,0.27-0.22,0.49-0.49,0.49
                                        c-0.27,0-0.49-0.23-0.49-0.49c0-1.25-1.03-2.26-2.3-2.26c-1.27,0-2.29,1.01-2.29,2.26c0,1.24,1.02,2.25,2.29,2.25
                                        c1.82,0,3.29,1.46,3.29,3.25s-1.47,3.25-3.29,3.25c-1.81,0-3.28-1.46-3.28-3.25c0-0.28,0.22-0.49,0.49-0.49
                                        c0.27,0,0.49,0.22,0.49,0.49c0,1.25,1.02,2.26,2.29,2.26c1.27,0,2.3-1.01,2.3-2.26S49.76,20.23,48.49,20.23z M24.5,14.23
                                        c0-0.27,0.22-0.49,0.49-0.49h4.36c0.28,0,0.49,0.23,0.49,0.49c0,0.28-0.22,0.49-0.49,0.49h-3.87v4.52h3.87
                                        c0.28,0,0.49,0.23,0.49,0.49c0,0.28-0.22,0.49-0.49,0.49h-3.87v4.53h3.87c0.28,0,0.49,0.22,0.49,0.49c0,0.27-0.22,0.49-0.49,0.49
                                        h-4.36c-0.28,0-0.49-0.23-0.49-0.49V14.23z M16.11,14.23c0-0.23,0.16-0.42,0.38-0.47c0.22-0.06,0.45,0.05,0.55,0.26l4.43,9.1v-8.88
                                        c0-0.27,0.22-0.49,0.49-0.49c0.28,0,0.49,0.23,0.49,0.49v11.02c0,0.23-0.16,0.42-0.38,0.47c-0.04,0.01-0.07,0.02-0.11,0.02
                                        c-0.19,0-0.36-0.11-0.44-0.28l-4.43-9.1v8.88c0,0.27-0.22,0.49-0.49,0.49c-0.27,0-0.49-0.23-0.49-0.49V14.23z M15.75,39.59
                                        l6.62-4.43c0.17-0.12,0.39-0.12,0.56,0l3.79,2.64l5.88-5.88h-2.1c-0.28,0-0.49-0.22-0.49-0.49s0.22-0.49,0.49-0.49h3.3
                                        c0.06,0,0.12,0.01,0.18,0.04c0.12,0.05,0.22,0.15,0.27,0.27c0.03,0.06,0.04,0.12,0.04,0.19v3.33c0,0.27-0.22,0.49-0.49,0.49
                                        s-0.49-0.23-0.49-0.49v-2.14l-6.17,6.16c-0.17,0.17-0.43,0.2-0.62,0.06l-3.86-2.68L16.3,40.4c-0.08,0.06-0.18,0.09-0.28,0.09
                                        c-0.16,0-0.32-0.08-0.4-0.23C15.46,40.04,15.53,39.73,15.75,39.59z M34.43,39.38c0.28,0,0.49,0.22,0.49,0.49v13.68
                                        c0,0.28-0.22,0.49-0.49,0.49h-2.68c-0.28,0-0.49-0.22-0.49-0.49V39.87c0-0.28,0.22-0.49,0.49-0.49H34.43z M29.37,45.96v7.59
                                        c0,0.28-0.22,0.49-0.49,0.49h-2.69c-0.27,0-0.49-0.22-0.49-0.49v-7.59c0-0.28,0.23-0.49,0.49-0.49h2.69
                                        C29.15,45.46,29.37,45.68,29.37,45.96z M23.76,41.95v11.6c0,0.28-0.22,0.49-0.49,0.49h-2.68c-0.28,0-0.49-0.22-0.49-0.49v-11.6
                                        c0-0.28,0.22-0.49,0.49-0.49h2.68C23.54,41.46,23.76,41.67,23.76,41.95z M14.53,44.6c0-0.28,0.23-0.49,0.49-0.49h2.69
                                        c0.27,0,0.49,0.22,0.49,0.49v8.95c0,0.28-0.23,0.49-0.49,0.49h-2.69c-0.27,0-0.49-0.22-0.49-0.49V44.6z M35.93,56.74H13.2
                                        c-0.28,0-0.49-0.22-0.49-0.49s0.22-0.49,0.49-0.49h22.72c0.27,0,0.49,0.22,0.49,0.49S36.19,56.74,35.93,56.74z M40.17,25.74
                                        c-0.25,0-0.42-0.15-0.48-0.37l-2.31-8.77l-2.24,8.77c-0.06,0.22-0.26,0.37-0.48,0.37c-0.23-0.01-0.42-0.17-0.48-0.38l-2.56-11.01
                                        c-0.06-0.27,0.1-0.53,0.36-0.59c0.27-0.07,0.53,0.1,0.59,0.36l2.11,9.05l2.22-8.66c0.06-0.22,0.25-0.36,0.47-0.36
                                        c0.23,0,0.42,0.15,0.48,0.36l2.27,8.65l2.02-9.04c0.06-0.26,0.32-0.43,0.58-0.37c0.27,0.06,0.43,0.32,0.37,0.59l-2.45,11.02
                                        C40.6,25.58,40.4,25.73,40.17,25.74z M58.76,53.99h-16.7c-0.27,0-0.49-0.22-0.49-0.49c0-0.27,0.23-0.49,0.49-0.49h16.7
                                        c0.28,0,0.49,0.23,0.49,0.49C59.25,53.77,59.04,53.99,58.76,53.99z M58.76,48.66h-16.7c-0.27,0-0.49-0.22-0.49-0.49
                                        c0-0.27,0.23-0.49,0.49-0.49h16.7c0.28,0,0.49,0.23,0.49,0.49C59.25,48.45,59.04,48.66,58.76,48.66z M58.76,43.34h-16.7
                                        c-0.27,0-0.49-0.22-0.49-0.49c0-0.27,0.23-0.49,0.49-0.49h16.7c0.28,0,0.49,0.23,0.49,0.49C59.25,43.12,59.04,43.34,58.76,43.34z
                                        M58.76,38.01h-16.7c-0.27,0-0.49-0.22-0.49-0.49c0-0.27,0.23-0.49,0.49-0.49h16.7c0.28,0,0.49,0.23,0.49,0.49
                                        C59.25,37.79,59.04,38.01,58.76,38.01z" class="colorcccacb svgShape"></path>
                                <path d="M22.46 14.23v11.02c0 .23-.16.42-.38.47-.04.01-.07.02-.11.02-.19 0-.36-.11-.44-.28l-4.43-9.1v8.88c0 .27-.22.49-.49.49-.27 0-.49-.23-.49-.49V14.23c0-.23.16-.42.38-.47.22-.06.45.05.55.26l4.43 9.1v-8.88c0-.27.22-.49.49-.49C22.24 13.74 22.46 13.97 22.46 14.23zM25.48 20.23v4.53h3.87c.28 0 .49.22.49.49 0 .27-.22.49-.49.49h-4.36c-.28 0-.49-.23-.49-.49V14.23c0-.27.22-.49.49-.49h4.36c.28 0 .49.23.49.49 0 .28-.22.49-.49.49h-3.87v4.52h3.87c.28 0 .49.23.49.49 0 .28-.22.49-.49.49H25.48zM43.1 14.34l-2.45 11.02c-.05.22-.25.37-.47.38-.25 0-.42-.15-.48-.37l-2.31-8.77-2.24 8.77c-.06.22-.26.37-.48.37-.23-.01-.42-.17-.48-.38l-2.56-11.01c-.06-.27.1-.53.36-.59.27-.07.53.1.59.36l2.11 9.05 2.22-8.66c.06-.22.25-.36.47-.36.23 0 .42.15.48.36l2.27 8.65 2.02-9.04c.06-.26.32-.43.58-.37C42.99 13.81 43.16 14.08 43.1 14.34zM51.78 22.49c0 1.79-1.47 3.25-3.29 3.25-1.81 0-3.28-1.46-3.28-3.25 0-.28.22-.49.49-.49.27 0 .49.22.49.49 0 1.25 1.02 2.26 2.29 2.26 1.27 0 2.3-1.01 2.3-2.26s-1.03-2.26-2.3-2.26c-1.81 0-3.28-1.45-3.28-3.24s1.47-3.25 3.28-3.25c1.82 0 3.29 1.46 3.29 3.25 0 .27-.22.49-.49.49-.27 0-.49-.23-.49-.49 0-1.25-1.03-2.26-2.3-2.26-1.27 0-2.29 1.01-2.29 2.26 0 1.24 1.02 2.25 2.29 2.25C50.31 19.24 51.78 20.7 51.78 22.49zM36.42 56.25c0 .28-.23.49-.49.49H13.2c-.28 0-.49-.22-.49-.49s.22-.49.49-.49h22.72C36.19 55.75 36.42 55.97 36.42 56.25zM17.71 44.11h-2.69c-.27 0-.49.22-.49.49v8.95c0 .28.23.49.49.49h2.69c.27 0 .49-.22.49-.49V44.6C18.21 44.32 17.98 44.11 17.71 44.11zM17.22 53.06h-1.7v-7.97h1.7V53.06z" fill="#000000" class="color000000 svgShape"></path>
                                <rect width="1.7" height="7.97" x="15.52" y="45.09" fill="#ea4335" class="colorfc4452 svgShape"></rect>
                                <path d="M23.27,41.46h-2.68c-0.28,0-0.49,0.22-0.49,0.49v11.6c0,0.28,0.22,0.49,0.49,0.49h2.68c0.28,0,0.49-0.22,0.49-0.49v-11.6
                                        C23.76,41.67,23.54,41.46,23.27,41.46z M22.77,53.06h-1.69V42.44h1.69V53.06z" fill="#000000" class="color000000 svgShape"></path>
                                <rect width="1.69" height="10.61" x="21.08" y="42.44" fill="#fbbc05" class="colorfed402 svgShape"></rect>
                                <path d="M28.88,45.46h-2.69c-0.27,0-0.49,0.22-0.49,0.49v7.59c0,0.28,0.23,0.49,0.49,0.49h2.69c0.28,0,0.49-0.22,0.49-0.49v-7.59
                                        C29.37,45.68,29.15,45.46,28.88,45.46z M28.39,53.06h-1.7v-6.61h1.7V53.06z" fill="#000000" class="color000000 svgShape"></path>
                                <rect width="1.7" height="6.61" x="26.68" y="46.45" fill="#34a853" class="color09a76d svgShape"></rect>
                                <path d="M34.43,39.38h-2.68c-0.28,0-0.49,0.22-0.49,0.49v13.68c0,0.28,0.22,0.49,0.49,0.49h2.68c0.28,0,0.49-0.22,0.49-0.49V39.87
                                        C34.92,39.6,34.71,39.38,34.43,39.38z M33.94,53.06h-1.69V40.36h1.69V53.06z" fill="#000000" class="color000000 svgShape"></path>
                                <rect width="1.69" height="12.69" x="32.25" y="40.36" fill="#ea4335" class="colorfc4452 svgShape"></rect>
                                <path d="M34.28 31.42v3.33c0 .27-.22.49-.49.49s-.49-.23-.49-.49v-2.14l-6.17 6.16c-.17.17-.43.2-.62.06l-3.86-2.68L16.3 40.4c-.08.06-.18.09-.28.09-.16 0-.32-.08-.4-.23-.16-.23-.09-.53.14-.68l6.62-4.43c.17-.12.39-.12.56 0l3.79 2.64 5.88-5.88h-2.1c-.28 0-.49-.22-.49-.49s.22-.49.49-.49h3.3c.06 0 .12.01.18.04.12.05.22.15.27.27C34.27 31.3 34.28 31.36 34.28 31.42zM59.25 37.52c0 .28-.22.49-.49.49h-16.7c-.27 0-.49-.22-.49-.49 0-.27.23-.49.49-.49h16.7C59.04 37.03 59.25 37.25 59.25 37.52zM59.25 42.85c0 .28-.22.49-.49.49h-16.7c-.27 0-.49-.22-.49-.49 0-.27.23-.49.49-.49h16.7C59.04 42.35 59.25 42.58 59.25 42.85zM59.25 48.17c0 .28-.22.49-.49.49h-16.7c-.27 0-.49-.22-.49-.49 0-.27.23-.49.49-.49h16.7C59.04 47.68 59.25 47.91 59.25 48.17zM59.25 53.5c0 .28-.22.49-.49.49h-16.7c-.27 0-.49-.22-.49-.49 0-.27.23-.49.49-.49h16.7C59.04 53.01 59.25 53.23 59.25 53.5z" fill="#000000" class="color000000 svgShape"></path>
                                </svg>
                            </div>
                            <div class="intro-feature-info">
                                <h4 class="title">Daily Financial News</h4>
                                <p>
                                    Stay ahead in the financial markets with our Daily Financial News service. Get timely updates on the latest market trends, economic insights, and impactful news that will help you make smarter investment decisions every day.
                                </p>
                                <a class="btn btn-primary btn-sm" href="<?php echo site_url('/How-It-Works/Daily-Financial-News'); ?>">Subscribe Now</a>
                            </div>
                        </div>
                    </div>

                    <!-- Investor Profile Management -->
                    <div class="col-md-10 col-lg-4">
                        <div class="intro-feature-item">
                            <div class="intro-feature-media">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" id="FinancialAdvisor">
                                    <path fill="#34a853" d="M43 58v3H32a1 1 0 0 1-1-1v-3a1 1 0 0 0 1 1Z" class="color009986 svgShape"></path>
                                    <path fill="#ea4335" d="M36 55h-5v2a1 1 0 0 0 1 1h11v-3Z" class="color00b39d svgShape"></path>
                                    <path fill="#4285f4" d="M59 44v9H23v-9a12 12 0 0 1 6.63-10.73 11.772 11.772 0 0 1 5.17-1.26L34 36l6 1h2l6-1-.8-3.99a11.962 11.962 0 0 1 9.4 4.79 11.112 11.112 0 0 1 1.29 2.2 11.324 11.324 0 0 1 1.09 4.58A2.954 2.954 0 0 1 59 44Z" class="color3d9ae2 svgShape"></path>
                                    <path fill="#00cc37" d="M35.59 53a5.26 5.26 0 0 0-.59-1 5.01 5.01 0 0 0-4-2v4a1 1 0 0 0 1 1h4a5.106 5.106 0 0 0-.41-2Z" class="color00ccb3 svgShape"></path>
                                    <path fill="#ffdc77" d="M45 28v4l-4 5-4-5v-4h8z" class="colorffc477 svgShape"></path>
                                    <path fill="#34a853" d="M61 57v3a1 1 0 0 1-1 1H49v-3h11a1 1 0 0 0 1-1Z" class="color009986 svgShape"></path>
                                    <path fill="#ea4335" d="M61 55v2a1 1 0 0 1-1 1H49v-3h11a1 1 0 0 0 1-1Z" class="color00b39d svgShape"></path>
                                    <path fill="#34a853" d="M59 50.41A4.979 4.979 0 0 0 56 55h4a1 1 0 0 0 1-1v-4a5.106 5.106 0 0 0-2 .41zM60 39h-4a4.982 4.982 0 0 0 5 5v-4a1 1 0 0 0-1-1z" class="color009986 svgShape"></path>
                                    <path fill="#00cc37" d="M58.98 43.58A5.023 5.023 0 0 1 56 39H36a5 5 0 0 1-5 5v6a5.01 5.01 0 0 1 4 2 5.26 5.26 0 0 1 .59 1 5.106 5.106 0 0 1 .41 2h20a4.979 4.979 0 0 1 5-5v-6a5.036 5.036 0 0 1-2.02-.42Z" class="color00ccb3 svgShape"></path>
                                    <path fill="#ffd355" d="M45 28v3.16a9.944 9.944 0 0 1-8 0V28Z" class="colorffb655 svgShape"></path>
                                    <path fill="#e6e7e8" d="M43 55v6h6v-6h-6z" class="colore6e7e8 svgShape"></path>
                                    <path fill="#1e60ce" d="M47.2 32.01 48 36l-6 1h-1l4-5h2a1.34 1.34 0 0 1 .2.01Z" class="color1e81ce svgShape"></path>
                                    <path fill="#fbbc05" d="M46 43a3.992 3.992 0 0 0-2.12 7.38A3.872 3.872 0 0 0 46 51a4 4 0 0 0 0-8Z" class="colorffd422 svgShape"></path>
                                    <path fill="#1e60ce" d="m37 32 4 5h-1l-6-1 .8-3.99A1.34 1.34 0 0 1 35 32Z" class="color1e81ce svgShape"></path>
                                    <path fill="#34a853" d="M32 39h4a5 5 0 0 1-5 5v-4a1 1 0 0 1 1-1Z" class="color009986 svgShape"></path>
                                    <rect width="16" height="6" x="19" y="55" fill="#ffcb33" rx="1" class="colorffa733 svgShape"></rect>
                                    <rect width="16" height="6" x="19" y="49" fill="#eeb100" rx="1" class="coloree8700 svgShape"></rect>
                                    <rect width="16" height="6" x="3" y="55" fill="#eeb100" rx="1" class="coloree8700 svgShape"></rect>
                                    <rect width="16" height="6" x="3" y="49" fill="#ffcb33" rx="1" class="colorffa733 svgShape"></rect>
                                    <rect width="16" height="6" x="3" y="43" fill="#eeb100" rx="1" class="coloree8700 svgShape"></rect>
                                    <circle cx="12" cy="30" r="9" fill="#fbbc05" class="colorffd422 svgShape"></circle>
                                    <path fill="#ffd355" d="M52 16a2 2 0 1 1-1 3.73v-3.46a2 2 0 0 1 1-.27Z" class="colorffb655 svgShape"></path>
                                    <path fill="#ffdc77" d="M51 19.73V20a10 10 0 0 1-20 0v-3s5-5 9-6c0 0 1 3 3 4a3.7 3.7 0 0 1 3-2 6.889 6.889 0 0 0 5 4Z" class="colorffc477 svgShape"></path>
                                    <path fill="#565c58" d="M51 16.27V17a6.889 6.889 0 0 1-5-4 3.7 3.7 0 0 0-3 2c-2-1-3-4-3-4-4 1-9 6-9 6v-4a10 10 0 0 1 20 0Z" class="color57565c svgShape"></path>
                                    <path fill="#ffd355" d="M31 17v2.73a2 2 0 1 1 0-3.46Z" class="colorffb655 svgShape"></path>
                                    <path d="M35 17h2v2h-2zM45 17h2v2h-2zM45 22h-2a2 2 0 0 1-4 0h-2a4 4 0 0 0 8 0zM13 33h-2a1 1 0 0 1-1-1H8a3 3 0 0 0 3 3v1h2v-1a3 3 0 0 0 0-6h-2a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1h2a3 3 0 0 0-3-3v-1h-2v1a3 3 0 0 0 0 6h2a1 1 0 0 1 0 2z" fill="#000000" class="color000000 svgShape"></path>
                                    <path d="M12 40A10 10 0 1 0 2 30a10.011 10.011 0 0 0 10 10Zm0-18a8 8 0 1 1-8 8 8.009 8.009 0 0 1 8-8Z" fill="#000000" class="color000000 svgShape"></path>
                                    <path d="M60 38h-1.5a12.241 12.241 0 0 0-1.1-1.8 13.05 13.05 0 0 0-10.134-5.188A2.593 2.593 0 0 0 47 31h-1v-1.214a11.009 11.009 0 0 0 5.95-8.793c.017 0 .033.007.05.007a3 3 0 0 0 0-6v-2a11 11 0 0 0-22 0v2a3 3 0 0 0 0 6c.017 0 .033-.006.05-.007A11.009 11.009 0 0 0 36 29.786V31h-1a2.542 2.542 0 0 0-.264.011 12.687 12.687 0 0 0-5.553 1.364A13.156 13.156 0 0 0 24.6 36.2 12.9 12.9 0 0 0 22 44v4h-2v-4a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v4a1.978 1.978 0 0 0 .278 1A1.978 1.978 0 0 0 2 50v4a1.978 1.978 0 0 0 .278 1A1.978 1.978 0 0 0 2 56v4a2 2 0 0 0 2 2h14a1.978 1.978 0 0 0 1-.278A1.978 1.978 0 0 0 20 62h40a2 2 0 0 0 2-2V40a2 2 0 0 0-2-2Zm0 11.09A6.008 6.008 0 0 0 55.09 54H36v-4a2 2 0 0 0-2-2h-2v-3.09A6.008 6.008 0 0 0 36.91 40h18.18A6.008 6.008 0 0 0 60 44.91ZM60 57H50v-1h10Zm-24-1h6v1h-6Zm8 0h4v4h-4ZM32 42.858V40h2.858A4 4 0 0 1 32 42.858Zm28 0A4 4 0 0 1 57.142 40H60ZM55.8 37.4c.144.191.269.4.4.6H42a1.021 1.021 0 0 0 .165-.014l6-1a1 1 0 0 0 .815-1.186l-.541-2.7a11.061 11.061 0 0 1 7.361 4.3ZM46.379 33l.437 2.184-3.556.592L45.481 33ZM53 18a1 1 0 0 1-1 1v-2a1 1 0 0 1 1 1ZM41 4a9.01 9.01 0 0 1 9 9v2.605a5.589 5.589 0 0 1-3.051-2.921A1 1 0 0 0 46 12a4.269 4.269 0 0 0-3.249 1.611 8.007 8.007 0 0 1-1.8-2.928 1 1 0 0 0-1.191-.653c-2.769.692-5.88 3.077-7.757 4.7V13A9.01 9.01 0 0 1 41 4ZM29 18a1 1 0 0 1 1-1v2a1 1 0 0 1-1-1Zm3 2v-2.575c.995-.946 4.42-4.066 7.423-5.2a7.742 7.742 0 0 0 3.13 3.666 1.009 1.009 0 0 0 1.339-.442 3.044 3.044 0 0 1 1.522-1.349A8.088 8.088 0 0 0 50 17.733V20a9 9 0 0 1-18 0Zm9 11a10.966 10.966 0 0 0 3-.426v1.075L41 35.4l-3-3.75v-1.076A10.966 10.966 0 0 0 41 31Zm-4.481 2 2.221 2.776-3.556-.592.437-2.184ZM24 44a10.919 10.919 0 0 1 2.2-6.6 11.152 11.152 0 0 1 3.881-3.239 10.738 10.738 0 0 1 3.481-1.061l-.542 2.7a1 1 0 0 0 .815 1.182l6 1A1.021 1.021 0 0 0 40 38h-8a2 2 0 0 0-2 2v8h-6Zm-2 6v2h2v-2h2v2h2v-2h2v2h2v-2h2v4H20v-4ZM4 54v-4h2v2h2v-2h2v2h2v-2h2v2h2v-2h2v4Zm0-10h2v2h2v-2h2v2h2v-2h2v2h2v-2h2v4H4v-4Zm0 16v-4h2v2h2v-2h2v2h2v-2h2v2h2v-2h2v4Zm29 0H20v-4h2v2h2v-2h2v2h2v-2h2v2h2v-2h2v4Zm3-1h6v1h-6Zm24 1H50v-1h10Zm-2.858-6A4 4 0 0 1 60 51.142V54Z" fill="#000000" class="color000000 svgShape"></path>
                                    <path d="M46 42a5 5 0 1 0 5 5 5.006 5.006 0 0 0-5-5Zm0 8a3 3 0 1 1 3-3 3 3 0 0 1-3 3Z" fill="#000000" class="color000000 svgShape"></path>
                                </svg>
                            </div>
                            <div class="intro-feature-info">
                                <h4 class="title">Investor Profile Management</h4>
                                <p>
                                    Keep your investment profile up-to-date with ease. Our Investor Profile Management tool allows you to view personalized insights, adjust your preferences, manage portfolios, and ensure the security of your account all in one place.
                                </p>
                                <a class="btn btn-primary btn-sm" href="<?php echo site_url('/How-It-Works/Investor-Profile'); ?>">Manage Profile</a>
                            </div>
                        </div>
                    </div>

                    <!-- Advanced Investment Dashboard -->
                    <div class="col-md-10 col-lg-4">
                        <div class="intro-feature-item">
                            <div class="intro-feature-media">                              
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 56 56" id="Investment">
                                    <path fill="#34a853" d="M52 51H4a1 1 0 0 0 0 2h48a1 1 0 0 0 0-2zm-30-2h12c.55 0 1-.45 1-1V36c0-.55-.45-1-1-1H22c-.55 0-1 .45-1 1v12c0 .55.45 1 1 1zM6 49h12c.55 0 1-.45 1-1v-8c0-.55-.45-1-1-1H6c-.55 0-1 .45-1 1v8c0 .55.45 1 1 1z" class="color3b4652 svgShape"></path>
                                    <path fill="#4285f4" d="M38 49h12c.55 0 1-.45 1-1V28c0-.55-.45-1-1-1H38c-.55 0-1 .45-1 1v20c0 .55.45 1 1 1z" class="color2b79c2 svgShape"></path>
                                    <path fill="#34a853" d="M6 37c.15 0 .303-.034.447-.105L32.43 23.903l-1.325 2.65a1 1 0 1 0 1.79.894l3-6A1.001 1.001 0 0 0 35 20h-7a1 1 0 0 0 0 2h3.763L5.553 35.105A1 1 0 0 0 6 37z" class="color3b4652 svgShape"></path>
                                    <path fill="#4285f4" d="M43.58 3c-5.19 0-9.41 4.22-9.41 9.42 0 5.19 4.22 9.41 9.41 9.41S53 17.61 53 12.42C53 7.22 48.77 3 43.58 3zm-.02 8.417c1.795 0 3.22 1.424 3.22 3.174a3.191 3.191 0 0 1-2.197 3.049v.634a1 1 0 0 1-2 0v-.641c-1.281-.422-2.196-1.599-2.196-2.998a1 1 0 0 1 2 0c0 .648.526 1.175 1.174 1.175.692 0 1.219-.527 1.219-1.175 0-.692-.527-1.218-1.175-1.218-1.795 0-3.218-1.425-3.218-3.175a3.19 3.19 0 0 1 2.196-3.048v-.635a1 1 0 0 1 2 0V7.2c1.28.422 2.197 1.598 2.197 2.997a1 1 0 0 1-2 0c0-.648-.527-1.175-1.175-1.175-.692 0-1.218.527-1.218 1.175 0 .692.526 1.219 1.174 1.219z" class="color2b79c2 svgShape"></path>
                                </svg>
                            </div>
                            <div class="intro-feature-info">
                                <h4 class="title">Advanced Investment Dashboard</h4>
                                <p>
                                    The Investment Dashboard gives you a real-time view of your portfolio’s performance. Access personalized insights, track your trade history, and make data-driven decisions to optimize your financial strategies.
                                </p>
                                <a class="btn btn-primary btn-sm" href="<?php echo site_url('/How-It-Works/Investment-Dashboard'); ?>">View Dashboard</a>
                            </div>
                        </div>
                    </div>

                    <!-- Automated Financial Insights -->
                    <div class="col-md-10 col-lg-4">
                        <div class="intro-feature-item">
                            <div class="intro-feature-media">
                                <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 67 67" viewBox="0 0 67 67" id="Financialgrowthanalysis">
                                    <polygon fill="#fbbc05" points="65.4 14.6 52.3 14.6 52.3 1.5" class="colorbcd6ef svgShape"></polygon>
                                    <polygon fill="#fbbc05" points="65.4 14.6 52.3 14.6 52.3 1.5" class="colorbcd6ef svgShape"></polygon>
                                    <path fill="#34a853" d="M59.2,28.8c-0.6-0.5-1.5-0.9-2.7-1.2h0v-3c0.8,0.1,1.6,0.4,2.3,0.9l1-1.5c-1-0.7-2.1-1.1-3.3-1.2v-0.8h-1
                                                v0.8c-1,0.1-1.9,0.4-2.5,1c-0.6,0.6-1,1.3-1,2.3c0,0.9,0.3,1.6,0.8,2.1c0.6,0.5,1.4,0.8,2.6,1.1v3.1c-0.9-0.2-1.9-0.6-2.8-1.4
                                                l-1.2,1.4c1.2,1,2.5,1.6,3.9,1.7v1.2h1v-1.1c1.1-0.1,1.9-0.4,2.6-1c0.7-0.6,1-1.3,1-2.3C60.1,30,59.8,29.3,59.2,28.8z M55.5,27.4
                                                c-0.6-0.2-1-0.4-1.2-0.6C54.1,26.6,54,26.3,54,26c0-0.4,0.1-0.7,0.4-0.9c0.3-0.2,0.6-0.4,1.1-0.4V27.4z M57.7,32
                                                c-0.3,0.2-0.7,0.4-1.2,0.4v-2.9c0.6,0.2,1.1,0.4,1.3,0.6c0.2,0.2,0.4,0.5,0.4,0.9C58.1,31.5,58,31.8,57.7,32z" class="color0fcaad svgShape"></path>
                                    <rect width="45.6" height="44.7" x="1.1" y="21.3" fill="#ffffff" class="colorffffff svgShape"></rect>
                                    <polygon fill="#fbbc05" points="42 42.2 42 61.5 36.9 61.5 36.9 46.2 40.6 42.2" class="colorbcd6ef svgShape"></polygon>
                                    <polygon fill="#4285f4" points="32.2 51.2 34.6 48.6 34.6 61.5 29.5 61.5 29.5 49.1" class="color1fa6f8 svgShape"></polygon>
                                    <polygon fill="#fbbc05" points="24.7 45.3 27.3 47.3 27.3 61.5 22.1 61.5 22.1 47" class="colorbcd6ef svgShape"></polygon>
                                    <polygon fill="#34a853" points="14.8 52.2 19.9 48.6 19.9 61.5 14.8 61.5" class="color0fcaad svgShape"></polygon>
                                    <polygon fill="#4285f4" points="7.4 57.4 12.6 53.8 12.6 61.5 7.4 61.5" class="color1fa6f8 svgShape"></polygon>
                                    <rect width="9.9" height="3.9" x="5.6" y="24.4" fill="#ea4335" class="colorff9889 svgShape"></rect>
                                    <rect width="25.9" height="3.9" x="17.3" y="24.4" fill="#fbbc05" class="colorbcd6ef svgShape"></rect>
                                    <rect width="37.6" height="1.6" x="5.6" y="29.8" fill="#fbbc05" class="colorbcd6ef svgShape"></rect>
                                    <rect width="37.6" height="1.6" x="5.6" y="32.6" fill="#fbbc05" class="colorbcd6ef svgShape"></rect>
                                    <rect width="45.6" height="5.3" x="1.6" y="15.5" fill="#4285f4" class="color1fa6f8 svgShape"></rect>
                                    <path fill="#225931" d="M65.9,14.4L52.5,1H20v14H1.6c-0.3,0-0.5,0.2-0.5,0.5c0,10.2,0,40,0,50c0,0.3,0.2,0.5,0.5,0.5
                                                    c47.3-0.2,46.1,0.5,46.1-0.5v-3.8h18.2V14.4z M52.7,2.6l11.6,11.6H52.7V2.6z M2.1,16c8.3,0,34.6,0,44.6,0v4.3
                                                    c-9.7,0-36.3,0-44.6,0V16z M46.7,65H2.1V21.3c8.3,0,34.6,0,44.6,0C46.7,29.3,46.7,59.9,46.7,65z M47.7,60.7c0-8.1,0-39.1,0-45.2
                                                    c0-0.3-0.2-0.5-0.5-0.5H21V2h30.9v12.6c0,0.2,0.2,0.4,0.4,0.4h12.6v45.7H47.7z" class="color222f59 svgShape"></path>
                                    <path fill="#225931" d="M38.4,37l0.1,1.2l2-0.2L32,47l-7.3-5.8C20.4,44.3,6.6,54,6.4,54.1l0.7,1c5.3-3.7,12.3-8.6,17.6-12.3
                                                    l7.4,5.9l9.3-10l0.1,2l1.2,0l-0.1-4.2L38.4,37z" class="color222f59 svgShape"></path>
                                    <path fill="#ffffff" d="M6.8 18.1c0 .6-.5 1.1-1.1 1.1-.6 0-1.1-.5-1.1-1.1 0-.6.5-1.1 1.1-1.1C6.4 17 6.8 17.5 6.8 18.1zM10.9 18.1c0 .6-.5 1.1-1.1 1.1-.6 0-1.1-.5-1.1-1.1 0-.6.5-1.1 1.1-1.1C10.4 17 10.9 17.5 10.9 18.1zM15 18.1c0 .6-.5 1.1-1.1 1.1-.6 0-1.1-.5-1.1-1.1 0-.6.5-1.1 1.1-1.1C14.5 17 15 17.5 15 18.1z" class="colorffffff svgShape"></path>
                                    <rect width="21.3" height="1" x="22.9" y="17.6" fill="#ffffff" class="colorffffff svgShape"></rect>
                                    <g fill="#000000" class="color000000 svgShape">
                                        <rect width="11.1" height="1" x="50.3" y="56.3" fill="#fbbc05" class="colorbcd6ef svgShape"></rect>
                                    </g>
                                    <g fill="#000000" class="color000000 svgShape">
                                        <rect width="11.1" height="1" x="50.3" y="52.2" fill="#fbbc05" class="colorbcd6ef svgShape"></rect>
                                    </g>
                                    <g fill="#000000" class="color000000 svgShape">
                                        <rect width="11.1" height="1" x="50.3" y="48.1" fill="#fbbc05" class="colorbcd6ef svgShape"></rect>
                                    </g>
                                    <g fill="#000000" class="color000000 svgShape">
                                        <rect width="11.1" height="1" x="50.3" y="44" fill="#fbbc05" class="colorbcd6ef svgShape"></rect>
                                    </g>
                                    <g fill="#000000" class="color000000 svgShape">
                                        <rect width="11.1" height="1" x="50.3" y="39.9" fill="#fbbc05" class="colorbcd6ef svgShape"></rect>
                                    </g>
                                    <g fill="#000000" class="color000000 svgShape">
                                        <rect width="22.7" height="1" x="24.5" y="5.5" fill="#fbbc05" class="colorbcd6ef svgShape"></rect>
                                    </g>
                                    <g fill="#000000" class="color000000 svgShape">
                                        <rect width="22.7" height="1" x="24.5" y="10.3" fill="#fbbc05" class="colorbcd6ef svgShape"></rect>
                                    </g>
                                </svg>
                            </div>
                            <div class="intro-feature-info">
                                <h4 class="title">Automated Financial Insights</h4>
                                <p>
                                    Our AI-driven insights provide personalized recommendations based on your portfolio’s performance. Leverage these insights to fine-tune your investment strategies and maximize your financial growth.
                                </p>
                                <a class="btn btn-primary btn-sm" href="<?php echo site_url('/How-It-Works/Automated-Financial-Insights'); ?>">Learn More</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row mt-5 justify-content-center text-center">
            <div class="col-lg-8" data-aos="fade-up">
                <p class="lead">Ready to make smarter decisions with MyMI Wallet’s financial tools?</p>
                <div class="d-flex flex-wrap justify-content-center gap-3 mt-4">
                    <a href="<?= site_url('/Dashboard'); ?>" class="btn btn-primary btn-lg">Access Dashboard</a>
                    <a href="<?= site_url('/How-It-Works'); ?>" class="btn btn-outline-primary btn-lg">Learn More</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Final CTA -->
<section class="py-5 bg-light text-center full-width">
    <div class="container">

        <h2 class="display-5 fw-bold mb-4">Your Financial Freedom Starts Today</h2>
        <p class="lead mb-4">Get access to all tools and resources for free. Upgrade anytime for more power.</p>
        <a href="<?= $btnURL ?>" class="btn btn-primary btn-lg px-5 py-3"><?= $btnText ?></a>
        <p class="mt-3"><small>No credit card required. Cancel anytime.</small></p>
    </div>
</section>
<!-- Comprehensive Guide Section with Links -->
<div class="intro-section intro-feature bg-white">
    <div class="container container-xl">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-xl-7">
                <div class="intro-section-title text-center">
                    <span class="overline-title">Your Comprehensive Guide</span>
                    <h2 class="intro-heading-lead title">How It Works</h2>
                    <div class="intro-section-desc">
                        <p>
                            MyMI Wallet’s all-in-one platform gives you control over your investments, budgeting, and financial future. Explore our easy-to-follow guides to get started.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="row justify-content-center intro-feature-list">

                    <!-- How It Works: Registering an Account -->
                    <div class="col-sm-6 col-lg-4">
                        <a class="intro-feature-item" href="<?php echo site_url('/How-It-Works/Registering-An-Account'); ?>">
                            <div class="intro-feature-media">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" id="Investor">
                                    <circle cx="32" cy="32" r="32" fill="#34a853" class="color65c981 svgShape"></circle>
                                    <path fill="#6d9be8" d="M43,38.87c-1.19-4-7.14-3.57-9.71-4.72s-2.17-5-2.49-5.7H24.5c-.33.67.08,4.54-2.49,5.7s-8.52.71-9.71,4.72a19.44,19.44,0,0,0-.8,5.35,95.15,95.15,0,0,0,16,1.62,102.5,102.5,0,0,0,16.33-1.62,19.45,19.45,0,0,0-.8-5.35Z" class="color6dc5e8 svgShape"></path>
                                    <path fill="#ffffff" d="M29.26,45.8a44,44,0,0,0,2.8-12.71H23.19A43.89,43.89,0,0,0,26,45.81l1.45,0,1.81,0Z" class="colorffffff svgShape"></path>
                                    <path fill="#d8a19c" d="M29,33.76H26.29l-.2.66,3.09,0Z" class="colord8b59c svgShape"></path>
                                    <path fill="#ea4335" d="M29.12,45.81l.06-.85-.65-8.56h-1.7L26.08,45l.06.86,1.31,0,1.67,0Z" class="colorf75267 svgShape"></path>
                                    <path fill="#b2352b" d="M26.84,36.43l1.7,0,0,.48" class="colorb22b39 svgShape"></path>
                                    <path fill="#ea4335" d="M25.62,34h4l-.23,1.37-.91,1H26.84l-1-1Z" class="colorf75267 svgShape"></path>
                                    <path fill="#e5e5e5" d="M26.29 33.76l-2.74-1.49s-.36.51-1.26 1.72l3 2.13a.32.32 0 0 0 .5-.2l.2-1.09zM28.87 33.76l2.74-1.49s.36.51 1.26 1.72l-3 2.13a.32.32 0 0 1-.5-.2l-.2-1.09z" class="colore5e5e5 svgShape"></path>
                                    <path fill="#4285f4" d="M35 38.66l-4.09 7.07c-.74 0-1.48.07-2.22.08L31.46 35.5 32.13 33l1.8 1.4h0l1 3.1L33.45 38zM21.23 34.43l-.95 3.06 1.43.51-1.58.66 4.1 7.09c.73 0 1.48.06 2.22.07L23 33z" class="color4395b5 svgShape"></path>
                                    <path fill="#d8c99e" d="M34.58 26.75c-.67-.12-1-1.22-.81-2.46s.95-2.14 1.62-2 1 1.22.81 2.46-.95 2.14-1.62 2zM19.06 24.73c-.22-1.24.14-2.34.81-2.46s1.4.78 1.62 2-.14 2.34-.81 2.46-1.4-.78-1.62-2z" class="colord8b79e svgShape"></path>
                                    <path fill="#f2e1b1" d="M34.46,16.94H20.8S17,32.54,27.63,34c10.66-1.51,6.83-17.1,6.83-17.1Z" class="colorf2cfb1 svgShape"></path>
                                    <path fill="#2d4f36" d="M20.13,22.8a10.48,10.48,0,0,0,.71-2.85s.52,1.06.73.13a7.23,7.23,0,0,1,2.14-2.8c.22,0-1,2-.91,2.95a32,32,0,0,1,3.49-1.49,12.55,12.55,0,0,1,8.51.08l.32,3.72S36.9,20.8,36,17a7.54,7.54,0,0,0-8.12-5.76c-3.65.41-6.48,1.86-7.48,4S19.22,19.42,20.13,22.8Z" class="color2d434f svgShape"></path>
                                    <path fill="#f7d163" d="M49.55,52.33a4.77,4.77,0,0,0-4.11-.1,4.58,4.58,0,0,1-1.42.32A13.68,13.68,0,0,1,40,52.23a8,8,0,0,1-.82-.3c-.29-.13-1.18-.24-3.8.67-2.23.76-1.76-1.18-1.08-2.78a9,9,0,0,0,.73-4c-.12-3,.36-8.35,4.89-11.61v-.94s-2.14-2.1-2.3-3.24c-.12-.89.27-1.52,1.65-1.5a4.44,4.44,0,0,1,2.24.67l1.34.82h.64s2.5-1.28,3.34-1.13S48.4,30,46.26,33.3v.88l0,0a13.23,13.23,0,0,1,4.8,11.53,9,9,0,0,0,.56,3.82l.65,1.72S53.62,53.61,49.55,52.33Z" class="colorf7cc63 svgShape"></path>
                                    <polygon fill="#fbbc05" points="46.26 33.3 46.26 34.18 46.04 34.18 45.63 33.3 46.26 33.3" class="colord89832 svgShape"></polygon>
                                    <polygon fill="#fbbc05" points="40.49 34.21 39.88 34.21 39.88 33.3 40.08 33.3 40.49 34.21" class="colord89832 svgShape"></polygon>
                                    <polygon fill="#fbbc05" points="45.69 34.18 45 34.19 44.59 33.3 45.28 33.3 45.69 34.18" class="colord89832 svgShape"></polygon>
                                    <polygon fill="#fbbc05" points="44.65 34.19 43.96 34.19 43.55 33.3 44.24 33.3 44.65 34.19" class="colord89832 svgShape"></polygon>
                                    <polygon fill="#fbbc05" points="43.61 34.19 42.92 34.2 42.51 33.3 43.2 33.3 43.61 34.19" class="colord89832 svgShape"></polygon>
                                    <polygon fill="#fbbc05" points="42.57 34.2 41.88 34.2 41.47 33.3 42.16 33.3 42.57 34.2" class="colord89832 svgShape"></polygon>
                                    <polygon fill="#fbbc05" points="41.53 34.2 40.84 34.2 40.43 33.3 41.12 33.3 41.53 34.2" class="colord89832 svgShape"></polygon>
                                    <polygon fill="#a53329" points="40.84 34.2 40.49 34.21 40.08 33.3 40.43 33.3 40.84 34.2" class="colora57329 svgShape"></polygon>
                                    <polygon fill="#a53329" points="41.88 34.2 41.53 34.2 41.12 33.3 41.47 33.3 41.88 34.2" class="colora57329 svgShape"></polygon>
                                    <polygon fill="#a53329" points="42.92 34.2 42.57 34.2 42.16 33.3 42.51 33.3 42.92 34.2" class="colora57329 svgShape"></polygon>
                                    <polygon fill="#a53329" points="43.96 34.19 43.61 34.19 43.2 33.3 43.55 33.3 43.96 34.19" class="colora57329 svgShape"></polygon>
                                    <polygon fill="#a53329" points="45 34.19 44.65 34.19 44.24 33.3 44.59 33.3 45 34.19" class="colora57329 svgShape"></polygon>
                                    <polygon fill="#a53329" points="46.04 34.18 45.69 34.18 45.28 33.3 45.63 33.3 46.04 34.18" class="colora57329 svgShape"></polygon>
                                    <path fill="#ffffff" d="M46.07,44.67a1.85,1.85,0,0,1-.67,1.49,3.34,3.34,0,0,1-1.88.68V48h-.8V46.86a6.5,6.5,0,0,1-2.5-.5V44.81a6.75,6.75,0,0,0,1.23.44,6.56,6.56,0,0,0,1.28.23V43.67l-.39-.15a4.37,4.37,0,0,1-1.64-1,1.91,1.91,0,0,1-.48-1.32,1.73,1.73,0,0,1,.66-1.39,3.37,3.37,0,0,1,1.85-.66v-.89h.8v.87a6.64,6.64,0,0,1,2.42.54L45.38,41a6.33,6.33,0,0,0-1.87-.46V42.3a9,9,0,0,1,1.62.76,2.22,2.22,0,0,1,.71.71A1.76,1.76,0,0,1,46.07,44.67ZM42,41.2a.55.55,0,0,0,.18.42,2.12,2.12,0,0,0,.58.34V40.6Q42,40.71,42,41.2Zm2.35,3.55a.53.53,0,0,0-.2-.42,2.62,2.62,0,0,0-.6-.35v1.46Q44.31,45.31,44.31,44.75Z" class="colorffffff svgShape"></path>
                                </svg>
                            </div>
                            <div class="intro-feature-info">
                                <h4 class="title">Registering an Account</h4>
                                <p>
                                    Follow this guide to quickly create your MyMI Wallet account. Gain full access to the tools you need to manage your financial journey and make informed investment decisions.
                                </p>
                            </div>
                        </a>
                    </div>

                    <!-- How It Works: Personal Budgeting -->
                    <div class="col-sm-6 col-lg-4">
                        <a class="intro-feature-item" href="<?php echo site_url('/How-It-Works/Personal-Budgeting'); ?>">
                            <div class="intro-feature-media">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" id="GrowthReport">
                                    <path fill="#4285f4" d="M255.328,511.507H68.479a30.689,30.689,0,0,1-30.786-30.59V30.59A30.678,30.678,0,0,1,68.479,0H403.837a30.678,30.678,0,0,1,30.786,30.59V409.929Z" class="color79a1b5 svgShape"></path>
                                    <path fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="6" d="M89.79,135.1a29.1,29.1,0,1,0,58.205,0c0-7.919-5.933-14.487-12.864-19.339a39.808,39.808,0,0,0-16.283-6.309C104.423,106.993,89.791,96.277,89.791,82.2a29.1,29.1,0,1,1,58.2,0" class="colorStrokeffffff svgStroke"></path>
                                    <line x1="118.891" x2="118.891" y1="53.083" y2="34.55" fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="6" class="colorStrokeffffff svgStroke"></line>
                                    <line x1="118.891" x2="118.891" y1="182.748" y2="164.215" fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="6" class="colorStrokeffffff svgStroke"></line>
                                    <line x1="203.363" x2="382.519" y1="82.368" y2="82.368" fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="6" class="colorStrokeffffff svgStroke"></line>
                                    <line x1="203.363" x2="334.719" y1="134.93" y2="134.93" fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="6" class="colorStrokeffffff svgStroke"></line>
                                    <path fill="#34a853" d="M308.409,285.629c12.422,18.106,23.514,35.7,32.528,51.607L361,387.429,349.857,493.714l-11.847,7.768c-25.08,10.671-62.026,13.2-110.295,7.685-161.207-18.4.209-223.538.209-223.538L239.286,271.5l64.5,6.214Z" class="color964c36 svgShape"></path>
                                    <path fill="#fbbc05" d="M321.365,355.123l0,128.972c.779,7.229,6.9,13.25,18.343,18.13,14.03,5.987,34.86,9.775,58.127,9.775s44.1-3.788,58.126-9.775c11.438-4.88,17.689-10.9,18.34-18.13l0-128.972Z" class="colorffcd0c svgShape"></path>
                                    <ellipse cx="397.834" cy="355.123" fill="#fac019" rx="76.469" ry="27.905" class="colorfaa719 svgShape"></ellipse>
                                    <path fill="#fac019" d="M321.37,442.707c0,6.924,6.9,13.249,18.342,18.117,14.03,5.987,34.86,9.775,58.127,9.775s44.1-3.788,58.126-9.775c11.438-4.868,18.342-11.193,18.342-18.117V398.921c0,6.924-6.9,13.25-18.342,18.118-14.03,5.987-34.86,9.774-58.126,9.774s-44.1-3.787-58.127-9.774c-11.438-4.868-18.342-11.194-18.342-18.118Z" class="colorfaa719 svgShape"></path>
                                    <path fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="6" d="M245.023,418.442a21.6,21.6,0,1,0,43.19,0c0-5.876-4.4-10.75-9.545-14.35a29.541,29.541,0,0,0-12.083-4.682c-10.7-1.825-21.561-9.776-21.561-20.218a21.594,21.594,0,1,1,43.187,0" class="colorStrokeffffff svgStroke"></path>
                                    <line x1="266.617" x2="266.617" y1="357.583" y2="343.83" fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="6" class="colorStrokeffffff svgStroke"></line>
                                    <line x1="266.617" x2="266.617" y1="453.799" y2="440.046" fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="6" class="colorStrokeffffff svgStroke"></line>
                                    <path fill="#ea4335" d="M331.478,222.877l-23.063,62.752H227.921l-27.006-62.752s17.235-10.833,59.366,4.445a90.406,90.406,0,0,0,34.338,5.657C318.96,232.015,331.478,222.877,331.478,222.877Z" class="colorc36245 svgShape"></path>
                                </svg>
                            </div>
                            <div class="intro-feature-info">
                                <h4 class="title">Personal Budgeting</h4>
                                <p>
                                    Track income, manage expenses, and set financial goals with our easy-to-use budgeting tool. Take full control of your personal finances with MyMI Wallet.
                                </p>
                            </div>
                        </a>
                    </div>

                    <!-- How It Works: Investment Dashboard -->
                    <div class="col-sm-6 col-lg-4">
                        <a class="intro-feature-item" href="<?php echo site_url('/How-It-Works/Investment-Dashboard'); ?>">
                            <div class="intro-feature-media">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 56 56" id="Investment">
                                    <path fill="#34a853" d="M52 51H4a1 1 0 0 0 0 2h48a1 1 0 0 0 0-2zm-30-2h12c.55 0 1-.45 1-1V36c0-.55-.45-1-1-1H22c-.55 0-1 .45-1 1v12c0 .55.45 1 1 1zM6 49h12c.55 0 1-.45 1-1v-8c0-.55-.45-1-1-1H6c-.55 0-1 .45-1 1v8c0 .55.45 1 1 1z" class="color3b4652 svgShape"></path>
                                    <path fill="#4285f4" d="M38 49h12c.55 0 1-.45 1-1V28c0-.55-.45-1-1-1H38c-.55 0-1 .45-1 1v20c0 .55.45 1 1 1z" class="color2b79c2 svgShape"></path>
                                    <path fill="#34a853" d="M6 37c.15 0 .303-.034.447-.105L32.43 23.903l-1.325 2.65a1 1 0 1 0 1.79.894l3-6A1.001 1.001 0 0 0 35 20h-7a1 1 0 0 0 0 2h3.763L5.553 35.105A1 1 0 0 0 6 37z" class="color3b4652 svgShape"></path>
                                    <path fill="#4285f4" d="M43.58 3c-5.19 0-9.41 4.22-9.41 9.42 0 5.19 4.22 9.41 9.41 9.41S53 17.61 53 12.42C53 7.22 48.77 3 43.58 3zm-.02 8.417c1.795 0 3.22 1.424 3.22 3.174a3.191 3.191 0 0 1-2.197 3.049v.634a1 1 0 0 1-2 0v-.641c-1.281-.422-2.196-1.599-2.196-2.998a1 1 0 0 1 2 0c0 .648.526 1.175 1.174 1.175.692 0 1.219-.527 1.219-1.175 0-.692-.527-1.218-1.175-1.218-1.795 0-3.218-1.425-3.218-3.175a3.19 3.19 0 0 1 2.196-3.048v-.635a1 1 0 0 1 2 0V7.2c1.28.422 2.197 1.598 2.197 2.997a1 1 0 0 1-2 0c0-.648-.527-1.175-1.175-1.175-.692 0-1.218.527-1.218 1.175 0 .692.526 1.219 1.174 1.219z" class="color2b79c2 svgShape"></path>
                                </svg>
                            </div>
                            <div class="intro-feature-info">
                                <h4 class="title">Investment Dashboard</h4>
                                <p>
                                    Access a complete overview of your portfolio with our Investment Dashboard. Get real-time updates, performance metrics, and track your progress to make smarter financial decisions.
                                </p>
                            </div>
                        </a>
                    </div>

                    <!-- How It Works: Setting Financial Goals -->
                    <div class="col-sm-6 col-lg-4">
                        <a class="intro-feature-item" href="<?php echo site_url('/How-It-Works/Setting-Financial-Goals'); ?>">
                            <div class="intro-feature-media">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" id="Business">
                                    <g transform="translate(-183 -1175.362)" fill="#000000" class="color000000 svgShape">
                                        <path fill="#4ac36a" fill-rule="evenodd" d="M190 1229.362v-10l11.958-11.937 2.921 3 7.942-8 1.947 2L227 1192.36v37.002z" class="color8bc34a svgShape"></path>
                                        <path fill="none" stroke="#374f3d" d="M187.5 1182.362v50m47.5-2.5h-50" class="colorStroke37474f svgStroke"></path>
                                        <path fill="none" stroke="#26382b" d="m189.34 1219.362 13-12 3 3 8-8 2 2 12.005-12.346" class="colorStroke263238 svgStroke"></path>
                                        <path fill="none" stroke="#26382b" d="M224 1191.862h3.5v3.5m-36 25v7m3-10v10m3-13v13m3-16v16m3-16v16m3-15v15m3-18v18m3-21v21m3-20v20m3-23v23m3-26v26m3-29v29" class="colorStroke263238 svgStroke"></path>
                                        <g transform="translate(183 185)" fill="#000000" class="color000000 svgShape">
                                        <path fill="#ffbe00" d="M53.5 1035.362h2v5h-2z" color="#000" overflow="visible" style="isolation:auto;mix-blend-mode:normal" class="colorff9800 svgShape"></path>
                                        <path fill="none" stroke="#ffbf07" stroke-linecap="round" stroke-linejoin="round" d="M52 1030.862h-2a3.492 3.492 0 0 1-3.5-3.5v-.729m0-.179v-2.592h3.321" color="#000" overflow="visible" style="isolation:auto;mix-blend-mode:normal" transform="matrix(-1 0 0 1 109 2)" class="colorStrokeffc107 svgStroke"></path>
                                        <path fill="none" stroke="#ffbf07" stroke-linecap="round" stroke-linejoin="round" d="M52 1032.862h-2a3.492 3.492 0 0 1-3.5-3.5v-.73m0-.178v-2.592h3.321" color="#000" overflow="visible" style="isolation:auto;mix-blend-mode:normal" class="colorStrokeffc107 svgStroke"></path>
                                        <rect width="11" height="11" x="49" y="1025.362" fill="#fbbc05" color="#000" overflow="visible" rx="4.889" ry="4.889" style="isolation:auto;mix-blend-mode:normal" class="colorffc107 svgShape"></rect>
                                        <rect width="11" height="8" x="49" y="1023.362" fill="#fbbc05" color="#000" overflow="visible" rx="0" ry="0" style="isolation:auto;mix-blend-mode:normal" class="colorffc107 svgShape"></rect>
                                        <path fill="#ffbe00" d="m54 1036.362-.89-.301-.752.561.012-.939-.767-.542.897-.279.279-.897.542.767.94-.012-.563.753z" color="#000" overflow="visible" style="isolation:auto;mix-blend-mode:normal" transform="rotate(8.722 5946.841 1188.277)scale(1.85876)" class="colorff9800 svgShape"></path>
                                        <rect width="5" height="1" x="52" y="1040.362" fill="#fbbc05" color="#000" overflow="visible" rx=".5" ry=".5" style="isolation:auto;mix-blend-mode:normal" class="colorffc107 svgShape"></rect>
                                        <rect width="5" height="1" x="52" y="1040.862" fill="#fbbc05" color="#000" overflow="visible" rx="0" ry="0" style="isolation:auto;mix-blend-mode:normal" class="colorffc107 svgShape"></rect>
                                        <rect width="9" height="4" x="50" y="1041.362" fill="#416d4d" color="#000" overflow="visible" rx="1" ry="1" style="isolation:auto;mix-blend-mode:normal" class="color6d4c41 svgShape"></rect>
                                        <path fill="#416d4d" d="M50 1043.362h9v2h-9z" color="#000" overflow="visible" style="isolation:auto;mix-blend-mode:normal" class="color6d4c41 svgShape"></path>
                                        <path fill="#f5b600" d="M52 1043.362h5v1h-5z" color="#000" overflow="visible" style="isolation:auto;mix-blend-mode:normal" class="colorf57c00 svgShape"></path>
                                        </g>
                                        <path fill="#4caf66" d="M190 1185.362h2v2h-2z" color="#000" overflow="visible" style="isolation:auto;mix-blend-mode:normal" class="color4caf50 svgShape"></path>
                                        <path fill="#ea4335" d="M190 1189.362h2v2h-2z" color="#000" overflow="visible" style="isolation:auto;mix-blend-mode:normal" class="colorf44336 svgShape"></path>
                                        <path fill="#e9eaed" d="M193 1185.362h4v2h-4zM193 1189.362h4v2h-4z" color="#000" overflow="visible" style="isolation:auto;mix-blend-mode:normal" class="colore9eded svgShape"></path>
                                        <path fill="#b0b8c5" d="M199 1185.362h11v2h-11zM199 1189.362h11v2h-11z" color="#000" overflow="visible" style="isolation:auto;mix-blend-mode:normal" class="colorb0bec5 svgShape"></path>
                                        <path fill="none" stroke="#416d4d" stroke-linecap="round" stroke-linejoin="round" d="m229.081 1207.857 1.414-1.414m-1.414 0 1.414 1.414" class="colorStroke6d4c41 svgStroke"></path>
                                        <path fill="none" stroke="#34a853" stroke-linecap="round" stroke-linejoin="round" d="m244.575 1205.488.919-.53m-2.375.14-.53-.919m1.598 2.758.53.919m-1.987-1.309-.918.53" class="colorStroke47a146 svgStroke"></path>
                                        <path fill="none" stroke="#f44536" stroke-linecap="round" stroke-linejoin="round" d="m231.626 1223.366.868-.5m-2.238.13-.494-.855m1.505 2.595.493.854m-1.876-1.224-.854.493" class="colorStrokef44336 svgStroke"></path>
                                        <path fill="none" stroke="#0248bd" stroke-linecap="round" stroke-linejoin="round" d="m244.08 1227.857 1.415-1.414m-1.414 0 1.414 1.414" class="colorStroke0277bd svgStroke"></path>
                                        <circle cx="233.5" cy="1203.862" r="1" fill="none" stroke="#4285f4" stroke-linecap="round" stroke-linejoin="round" color="#000" overflow="visible" style="isolation:auto;mix-blend-mode:normal" class="colorStroke2196f3 svgStroke"></circle>
                                        <circle cx="242.5" cy="1222.862" r=".5" fill="#ea4335" color="#000" overflow="visible" style="isolation:auto;mix-blend-mode:normal" class="colorf44336 svgShape"></circle>
                                        <circle cx="229.5" cy="1226.862" r=".5" fill="#4caf66" color="#000" overflow="visible" style="isolation:auto;mix-blend-mode:normal" class="color4caf50 svgShape"></circle>
                                    </g>
                                </svg>
                            </div>
                            <div class="intro-feature-info">
                                <h4 class="title">Setting Financial Goals</h4>
                                <p>
                                    Learn how to create and track your financial goals using our intuitive tools. Stay on course and reach your milestones to achieve financial independence.
                                </p>
                            </div>
                        </a>
                    </div>

                    <!-- How It Works: MyMI Gold -->
                    <div class="col-sm-6 col-lg-4">
                        <a class="intro-feature-item" href="<?php echo site_url('/How-It-Works/MyMI-Gold'); ?>">
                            <div class="intro-feature-media">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" id="FinancialAnalysis">
                                    <path fill="#2d302e" d="M456,216V448H56V216a24.006,24.006,0,0,1,24-24H432A24.006,24.006,0,0,1,456,216Z" class="color2d2d30 svgShape"></path>
                                    <polyline fill="#4285f4" points="352 216 432 216 432 424 80 424 80 216 160 216 320 216" class="color83d8f4 svgShape"></polyline>
                                    <path fill="#e0e1e2" d="M16,448H496a0,0,0,0,1,0,0v32a16,16,0,0,1-16,16H32a16,16,0,0,1-16-16V448a0,0,0,0,1,0,0Z" class="colore0e0e2 svgShape"></path>
                                    <polygon fill="#34a853" points="288 472 224 472 216 448 296 448 288 472" class="color57565c svgShape"></polygon>
                                    <circle cx="256" cy="144" r="88" fill="#fbbc05" class="colorff9811 svgShape"></circle>
                                    <circle cx="256" cy="144" r="64" fill="#ffcf44" class="colorffda44 svgShape"></circle>
                                    <rect width="24" height="48" x="16" y="16" fill="#ffcf44" class="colorffda44 svgShape"></rect>
                                    <rect width="24" height="48" x="472" y="112" fill="#ffcf44" transform="rotate(180 484 136)" class="colorffda44 svgShape"></rect>
                                    <rect width="24" height="88" x="120" y="264" fill="#ffcf44" class="colorffda44 svgShape"></rect>
                                    <rect width="24" height="56" x="168" y="296" fill="#ea4335" class="colorab2300 svgShape"></rect>
                                    <rect width="24" height="80" x="216" y="272" fill="#fbbc05" class="colorff9811 svgShape"></rect>
                                    <rect width="24" height="88" x="264" y="264" fill="#cc9904" class="color91cc04 svgShape"></rect>
                                    <rect width="24" height="56" x="312" y="296" fill="#fbbc05" class="colorff9811 svgShape"></rect>
                                    <rect width="24" height="80" x="360" y="272" fill="#ea4335" class="colorab2300 svgShape"></rect>
                                    <circle cx="360" cy="56" r="16" fill="#ea4335" class="colorab2300 svgShape"></circle>
                                    <g fill="#000000" class="color000000 svgShape">
                                        <path d="M496,440H464V216a32.042,32.042,0,0,0-32-32H343.26a95.309,95.309,0,0,0,5.7-16H448a8,8,0,0,0,0-16H351.66c.22-2.64.34-5.31.34-8a96,96,0,0,0-184.9-36.22L117.66,58.34A8.008,8.008,0,0,0,112,56H64a8,8,0,0,0,0,16h44.69l53.17,53.17A96.009,96.009,0,0,0,168.74,184H80a32.036,32.036,0,0,0-32,32V440H16a8,8,0,0,0-8,8v32a24.032,24.032,0,0,0,24,24H480a24.032,24.032,0,0,0,24-24V448A8,8,0,0,0,496,440ZM256,64a80,80,0,1,1-80,80A80.093,80.093,0,0,1,256,64ZM424,224V416H88V224H203.03a95.715,95.715,0,0,0,105.96,0ZM64,216a16.021,16.021,0,0,1,16-16h98.07a99.229,99.229,0,0,0,6.44,8H80a8,8,0,0,0-8,8V424a8,8,0,0,0,8,8H432a8,8,0,0,0,8-8V216a8,8,0,0,0-8-8H327.49a99.229,99.229,0,0,0,6.44-8H432a16.021,16.021,0,0,1,16,16V440H64ZM284.9,456l-2.67,8H229.77l-2.67-8ZM488,480a8.011,8.011,0,0,1-8,8H32a8.011,8.011,0,0,1-8-8V456H210.23l6.18,18.53A8,8,0,0,0,224,480h64a8,8,0,0,0,7.59-5.47L301.77,456H488Z" fill="#000000" class="color000000 svgShape"></path>
                                        <path d="M104 464H40a8 8 0 000 16h64a8 8 0 000-16zM136 464h-8a8 8 0 000 16h8a8 8 0 000-16zM256 216a72 72 0 10-72-72A72.083 72.083 0 00256 216zm0-128a56 56 0 11-56 56A56.062 56.062 0 01256 88z" fill="#000000" class="color000000 svgShape"></path>
                                        <path d="M240 160a8 8 0 000 16h8a8 8 0 0016 0h8a8 8 0 008-8V144a8 8 0 00-8-8H248v-8h24a8 8 0 000-16h-8a8 8 0 00-16 0h-8a8 8 0 00-8 8v24a8 8 0 008 8h24v8zM64 24H168a8 8 0 000-16H64a8 8 0 000 16zM64 48h56a8 8 0 000-16H64a8 8 0 000 16zM16 72H40a8 8 0 008-8V16a8 8 0 00-8-8H16a8 8 0 00-8 8V64A8 8 0 0016 72zm8-48h8V56H24zM448 128H392a8 8 0 000 16h56a8 8 0 000-16zM496 104H472a8 8 0 00-8 8v48a8 8 0 008 8h24a8 8 0 008-8V112A8 8 0 00496 104zm-8 48h-8V120h8zM112 360H400a8 8 0 000-16h-8V272a8 8 0 00-8-8H360a8 8 0 00-8 8v72h-8V296a8 8 0 00-8-8H312a8 8 0 00-8 8v48h-8V264a8 8 0 00-8-8H264a8 8 0 00-8 8v80h-8V272a8 8 0 00-8-8H216a8 8 0 00-8 8v72h-8V296a8 8 0 00-8-8H168a8 8 0 00-8 8v48h-8V264a8 8 0 00-8-8H120a8 8 0 00-8 8v80a8 8 0 000 16zm256-80h8v64h-8zm-48 24h8v40h-8zm-48-32h8v72h-8zm-48 8h8v64h-8zm-48 24h8v40h-8zm-48-32h8v72h-8zM112 384h80a8 8 0 000-16H112a8 8 0 000 16zM112 408h48a8 8 0 000-16H112a8 8 0 000 16zM296 368H216a8 8 0 000 16h80a8 8 0 000-16zM264 392H216a8 8 0 000 16h48a8 8 0 000-16zM400 368H320a8 8 0 000 16h80a8 8 0 000-16zM368 392H320a8 8 0 000 16h48a8 8 0 000-16zM360 80a23.856 23.856 0 0010.34-2.345l0 0 40 40A8 8 0 00416 120h32a8 8 0 000-16H419.313L381.657 66.343l0 0A24 24 0 10360 80zm0-32a8 8 0 11-8 8A8.009 8.009 0 01360 48z" fill="#000000" class="color000000 svgShape"></path>
                                    </g>
                                </svg>
                            </div>
                            <div class="intro-feature-info">
                                <h4 class="title">MyMI Gold</h4>
                                <p>
                                    Unlock exclusive features with MyMI Gold. Gain access to advanced analytics, higher trade limits, and special rewards. Learn how to acquire and grow your MyMI Gold balance.
                                </p>
                            </div>
                        </a>
                    </div>

                    <!-- How It Works: MyMI Exchange -->
                    <div class="col-sm-6 col-lg-4">
                        <a class="intro-feature-item" href="<?php echo site_url('/How-It-Works/MyMI-Exchange'); ?>">
                            <div class="intro-feature-media">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" id="BitcoinExchange">
                                    <circle cx="137.5" cy="137.5" r="137.5" fill="#34a853" class="color7dd9c2 svgShape"></circle>
                                    <path fill="#4285f4" d="M20 157.5C20 81.68 81.68 20 157.5 20a136.79 136.79 0 0 1 86.66 30.84A137.27 137.27 0 0 0 137.5 0C61.68 0 0 61.68 0 137.5a137.27 137.27 0 0 0 50.84 106.66A136.79 136.79 0 0 1 20 157.5Z" class="color5cd0b3 svgShape"></path>
                                    <circle cx="374.5" cy="374.5" r="137.5" fill="#ffd969" class="colorffcd69 svgShape"></circle>
                                    <path fill="#fbbc05" d="M257 394.5c0-75.82 61.68-137.5 137.5-137.5a136.79 136.79 0 0 1 86.66 30.84A137.27 137.27 0 0 0 374.5 237C298.68 237 237 298.68 237 374.5a137.27 137.27 0 0 0 50.84 106.66A136.79 136.79 0 0 1 257 394.5Z" class="colorffc144 svgShape"></path>
                                    <path fill="#f5f7fa" d="M170 137.5a37.49 37.49 0 0 0-11.65-65.9V57.5a7.5 7.5 0 0 0-15 0V70h-11.68V57.5a7.5 7.5 0 1 0-15 0V70H97.5a7.5 7.5 0 0 0 0 15H110v45H97.5a7.5 7.5 0 0 0 0 15H110v45H97.5a7.5 7.5 0 0 0 0 15h19.17v12.5a7.5 7.5 0 1 0 15 0V205h11.66v12.5a7.5 7.5 0 0 0 15 0v-14.1A37.49 37.49 0 0 0 170 137.5ZM125 85h22.5a22.5 22.5 0 0 1 0 45H125Zm22.5 105H125v-45h22.5a22.5 22.5 0 0 1 0 45Z" class="colorfaf7f5 svgShape"></path>
                                    <path fill="#ea4335" d="M429.14 207.17a7.5 7.5 0 0 1-7.5-7.5V127.5a32.54 32.54 0 0 0-32.5-32.5h-75a7.5 7.5 0 0 1 0-15h75a47.55 47.55 0 0 1 47.5 47.5v72.17a7.5 7.5 0 0 1-7.5 7.5Z" class="colordc72a9 svgShape"></path>
                                    <path fill="#e3958e" d="M429.14 211.5a7.5 7.5 0 0 1-5.3-2.2L388.49 174a7.5 7.5 0 1 1 10.6-10.61l30.05 30 30.06-30A7.5 7.5 0 1 1 469.8 174l-35.35 35.3a7.51 7.51 0 0 1-5.31 2.2Z" class="colore38eba svgShape"></path>
                                    <path fill="#ea4335" d="M197.86 432h-75a47.55 47.55 0 0 1-47.5-47.5v-72.17a7.5 7.5 0 0 1 15 0v72.17a32.54 32.54 0 0 0 32.5 32.5h75a7.5 7.5 0 0 1 0 15Z" class="colordc72a9 svgShape"></path>
                                    <path fill="#e3958e" d="M47.5 350.86a7.51 7.51 0 0 1-5.3-12.81l35.35-35.35a7.51 7.51 0 0 1 5.31-2.2 7.5 7.5 0 0 1 5.3 2.2l35.35 35.35a7.5 7.5 0 1 1-10.6 10.61l-30-30.05-30.11 30.05a7.48 7.48 0 0 1-5.3 2.2Z" class="colore38eba svgShape"></path>
                                    <path fill="#f5f7fa" d="M422 400.35A33.39 33.39 0 0 0 388.65 367h-28.3a18.35 18.35 0 1 1 0-36.69h46.15a7.5 7.5 0 0 0 0-15H394V297a7.5 7.5 0 0 0-15 0v18.35h-9V297a7.5 7.5 0 0 0-15 0v18.78a33.35 33.35 0 0 0 5.35 66.22h28.3a18.35 18.35 0 1 1 0 36.69H342.5a7.5 7.5 0 0 0 0 15H355V452a7.5 7.5 0 0 0 15 0v-18.31h9V452a7.5 7.5 0 0 0 15 0v-18.74a33.41 33.41 0 0 0 28-32.91Z" class="colorfaf7f5 svgShape"></path>
                                </svg>
                            </div>
                            <div class="intro-feature-info">
                                <h4 class="title">MyMI Exchange</h4>
                                <p>
                                    Trade MyMI Gold and other digital assets securely with our MyMI Exchange. Buy, sell, and manage your trades in one place to diversify your portfolio and enhance your financial growth.
                                </p>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- <section class="section bg-white">
  <div class="container container-xl">
    <div class="row justify-content-center text-center">
      <div class="col-lg-9 col-xl-7">
        <span class="overline-title text-primary">Your Comprehensive Guide</span>
        <h2 class="section-heading title">How It Works</h2>
        <p class="lead">
          MyMI Wallet’s all-in-one platform gives you control over your investments, budgeting, and financial future. Explore our easy-to-follow guides to get started.
        </p>
      </div>
    </div>

    <div class="row mt-4 g-4">
      <?php
      $howToGuides = [
        [
          'title' => 'Registering an Account',
          'desc' => 'Quickly create your MyMI Wallet account. Access essential tools to manage your financial journey.',
          'url' => site_url('/How-It-Works/Registering-An-Account'),
          'svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" id="Investor">
                                    <circle cx="32" cy="32" r="32" fill="#34a853" class="color65c981 svgShape"></circle>
                                    <path fill="#6d9be8" d="M43,38.87c-1.19-4-7.14-3.57-9.71-4.72s-2.17-5-2.49-5.7H24.5c-.33.67.08,4.54-2.49,5.7s-8.52.71-9.71,4.72a19.44,19.44,0,0,0-.8,5.35,95.15,95.15,0,0,0,16,1.62,102.5,102.5,0,0,0,16.33-1.62,19.45,19.45,0,0,0-.8-5.35Z" class="color6dc5e8 svgShape"></path>
                                    <path fill="#ffffff" d="M29.26,45.8a44,44,0,0,0,2.8-12.71H23.19A43.89,43.89,0,0,0,26,45.81l1.45,0,1.81,0Z" class="colorffffff svgShape"></path>
                                    <path fill="#d8a19c" d="M29,33.76H26.29l-.2.66,3.09,0Z" class="colord8b59c svgShape"></path>
                                    <path fill="#ea4335" d="M29.12,45.81l.06-.85-.65-8.56h-1.7L26.08,45l.06.86,1.31,0,1.67,0Z" class="colorf75267 svgShape"></path>
                                    <path fill="#b2352b" d="M26.84,36.43l1.7,0,0,.48" class="colorb22b39 svgShape"></path>
                                    <path fill="#ea4335" d="M25.62,34h4l-.23,1.37-.91,1H26.84l-1-1Z" class="colorf75267 svgShape"></path>
                                    <path fill="#e5e5e5" d="M26.29 33.76l-2.74-1.49s-.36.51-1.26 1.72l3 2.13a.32.32 0 0 0 .5-.2l.2-1.09zM28.87 33.76l2.74-1.49s.36.51 1.26 1.72l-3 2.13a.32.32 0 0 1-.5-.2l-.2-1.09z" class="colore5e5e5 svgShape"></path>
                                    <path fill="#4285f4" d="M35 38.66l-4.09 7.07c-.74 0-1.48.07-2.22.08L31.46 35.5 32.13 33l1.8 1.4h0l1 3.1L33.45 38zM21.23 34.43l-.95 3.06 1.43.51-1.58.66 4.1 7.09c.73 0 1.48.06 2.22.07L23 33z" class="color4395b5 svgShape"></path>
                                    <path fill="#d8c99e" d="M34.58 26.75c-.67-.12-1-1.22-.81-2.46s.95-2.14 1.62-2 1 1.22.81 2.46-.95 2.14-1.62 2zM19.06 24.73c-.22-1.24.14-2.34.81-2.46s1.4.78 1.62 2-.14 2.34-.81 2.46-1.4-.78-1.62-2z" class="colord8b79e svgShape"></path>
                                    <path fill="#f2e1b1" d="M34.46,16.94H20.8S17,32.54,27.63,34c10.66-1.51,6.83-17.1,6.83-17.1Z" class="colorf2cfb1 svgShape"></path>
                                    <path fill="#2d4f36" d="M20.13,22.8a10.48,10.48,0,0,0,.71-2.85s.52,1.06.73.13a7.23,7.23,0,0,1,2.14-2.8c.22,0-1,2-.91,2.95a32,32,0,0,1,3.49-1.49,12.55,12.55,0,0,1,8.51.08l.32,3.72S36.9,20.8,36,17a7.54,7.54,0,0,0-8.12-5.76c-3.65.41-6.48,1.86-7.48,4S19.22,19.42,20.13,22.8Z" class="color2d434f svgShape"></path>
                                    <path fill="#f7d163" d="M49.55,52.33a4.77,4.77,0,0,0-4.11-.1,4.58,4.58,0,0,1-1.42.32A13.68,13.68,0,0,1,40,52.23a8,8,0,0,1-.82-.3c-.29-.13-1.18-.24-3.8.67-2.23.76-1.76-1.18-1.08-2.78a9,9,0,0,0,.73-4c-.12-3,.36-8.35,4.89-11.61v-.94s-2.14-2.1-2.3-3.24c-.12-.89.27-1.52,1.65-1.5a4.44,4.44,0,0,1,2.24.67l1.34.82h.64s2.5-1.28,3.34-1.13S48.4,30,46.26,33.3v.88l0,0a13.23,13.23,0,0,1,4.8,11.53,9,9,0,0,0,.56,3.82l.65,1.72S53.62,53.61,49.55,52.33Z" class="colorf7cc63 svgShape"></path>
                                    <polygon fill="#fbbc05" points="46.26 33.3 46.26 34.18 46.04 34.18 45.63 33.3 46.26 33.3" class="colord89832 svgShape"></polygon>
                                    <polygon fill="#fbbc05" points="40.49 34.21 39.88 34.21 39.88 33.3 40.08 33.3 40.49 34.21" class="colord89832 svgShape"></polygon>
                                    <polygon fill="#fbbc05" points="45.69 34.18 45 34.19 44.59 33.3 45.28 33.3 45.69 34.18" class="colord89832 svgShape"></polygon>
                                    <polygon fill="#fbbc05" points="44.65 34.19 43.96 34.19 43.55 33.3 44.24 33.3 44.65 34.19" class="colord89832 svgShape"></polygon>
                                    <polygon fill="#fbbc05" points="43.61 34.19 42.92 34.2 42.51 33.3 43.2 33.3 43.61 34.19" class="colord89832 svgShape"></polygon>
                                    <polygon fill="#fbbc05" points="42.57 34.2 41.88 34.2 41.47 33.3 42.16 33.3 42.57 34.2" class="colord89832 svgShape"></polygon>
                                    <polygon fill="#fbbc05" points="41.53 34.2 40.84 34.2 40.43 33.3 41.12 33.3 41.53 34.2" class="colord89832 svgShape"></polygon>
                                    <polygon fill="#a53329" points="40.84 34.2 40.49 34.21 40.08 33.3 40.43 33.3 40.84 34.2" class="colora57329 svgShape"></polygon>
                                    <polygon fill="#a53329" points="41.88 34.2 41.53 34.2 41.12 33.3 41.47 33.3 41.88 34.2" class="colora57329 svgShape"></polygon>
                                    <polygon fill="#a53329" points="42.92 34.2 42.57 34.2 42.16 33.3 42.51 33.3 42.92 34.2" class="colora57329 svgShape"></polygon>
                                    <polygon fill="#a53329" points="43.96 34.19 43.61 34.19 43.2 33.3 43.55 33.3 43.96 34.19" class="colora57329 svgShape"></polygon>
                                    <polygon fill="#a53329" points="45 34.19 44.65 34.19 44.24 33.3 44.59 33.3 45 34.19" class="colora57329 svgShape"></polygon>
                                    <polygon fill="#a53329" points="46.04 34.18 45.69 34.18 45.28 33.3 45.63 33.3 46.04 34.18" class="colora57329 svgShape"></polygon>
                                    <path fill="#ffffff" d="M46.07,44.67a1.85,1.85,0,0,1-.67,1.49,3.34,3.34,0,0,1-1.88.68V48h-.8V46.86a6.5,6.5,0,0,1-2.5-.5V44.81a6.75,6.75,0,0,0,1.23.44,6.56,6.56,0,0,0,1.28.23V43.67l-.39-.15a4.37,4.37,0,0,1-1.64-1,1.91,1.91,0,0,1-.48-1.32,1.73,1.73,0,0,1,.66-1.39,3.37,3.37,0,0,1,1.85-.66v-.89h.8v.87a6.64,6.64,0,0,1,2.42.54L45.38,41a6.33,6.33,0,0,0-1.87-.46V42.3a9,9,0,0,1,1.62.76,2.22,2.22,0,0,1,.71.71A1.76,1.76,0,0,1,46.07,44.67ZM42,41.2a.55.55,0,0,0,.18.42,2.12,2.12,0,0,0,.58.34V40.6Q42,40.71,42,41.2Zm2.35,3.55a.53.53,0,0,0-.2-.42,2.62,2.62,0,0,0-.6-.35v1.46Q44.31,45.31,44.31,44.75Z" class="colorffffff svgShape"></path>
                                </svg>'
        ],
        [
          'title' => 'Personal Budgeting',
          'desc' => 'Track income, manage expenses, and set goals using our intuitive budgeting interface.',
          'url' => site_url('/How-It-Works/Personal-Budgeting'),
          'svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" id="GrowthReport">
                                    <path fill="#4285f4" d="M255.328,511.507H68.479a30.689,30.689,0,0,1-30.786-30.59V30.59A30.678,30.678,0,0,1,68.479,0H403.837a30.678,30.678,0,0,1,30.786,30.59V409.929Z" class="color79a1b5 svgShape"></path>
                                    <path fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="6" d="M89.79,135.1a29.1,29.1,0,1,0,58.205,0c0-7.919-5.933-14.487-12.864-19.339a39.808,39.808,0,0,0-16.283-6.309C104.423,106.993,89.791,96.277,89.791,82.2a29.1,29.1,0,1,1,58.2,0" class="colorStrokeffffff svgStroke"></path>
                                    <line x1="118.891" x2="118.891" y1="53.083" y2="34.55" fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="6" class="colorStrokeffffff svgStroke"></line>
                                    <line x1="118.891" x2="118.891" y1="182.748" y2="164.215" fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="6" class="colorStrokeffffff svgStroke"></line>
                                    <line x1="203.363" x2="382.519" y1="82.368" y2="82.368" fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="6" class="colorStrokeffffff svgStroke"></line>
                                    <line x1="203.363" x2="334.719" y1="134.93" y2="134.93" fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="6" class="colorStrokeffffff svgStroke"></line>
                                    <path fill="#34a853" d="M308.409,285.629c12.422,18.106,23.514,35.7,32.528,51.607L361,387.429,349.857,493.714l-11.847,7.768c-25.08,10.671-62.026,13.2-110.295,7.685-161.207-18.4.209-223.538.209-223.538L239.286,271.5l64.5,6.214Z" class="color964c36 svgShape"></path>
                                    <path fill="#fbbc05" d="M321.365,355.123l0,128.972c.779,7.229,6.9,13.25,18.343,18.13,14.03,5.987,34.86,9.775,58.127,9.775s44.1-3.788,58.126-9.775c11.438-4.88,17.689-10.9,18.34-18.13l0-128.972Z" class="colorffcd0c svgShape"></path>
                                    <ellipse cx="397.834" cy="355.123" fill="#fac019" rx="76.469" ry="27.905" class="colorfaa719 svgShape"></ellipse>
                                    <path fill="#fac019" d="M321.37,442.707c0,6.924,6.9,13.249,18.342,18.117,14.03,5.987,34.86,9.775,58.127,9.775s44.1-3.788,58.126-9.775c11.438-4.868,18.342-11.193,18.342-18.117V398.921c0,6.924-6.9,13.25-18.342,18.118-14.03,5.987-34.86,9.774-58.126,9.774s-44.1-3.787-58.127-9.774c-11.438-4.868-18.342-11.194-18.342-18.118Z" class="colorfaa719 svgShape"></path>
                                    <path fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="6" d="M245.023,418.442a21.6,21.6,0,1,0,43.19,0c0-5.876-4.4-10.75-9.545-14.35a29.541,29.541,0,0,0-12.083-4.682c-10.7-1.825-21.561-9.776-21.561-20.218a21.594,21.594,0,1,1,43.187,0" class="colorStrokeffffff svgStroke"></path>
                                    <line x1="266.617" x2="266.617" y1="357.583" y2="343.83" fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="6" class="colorStrokeffffff svgStroke"></line>
                                    <line x1="266.617" x2="266.617" y1="453.799" y2="440.046" fill="none" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="6" class="colorStrokeffffff svgStroke"></line>
                                    <path fill="#ea4335" d="M331.478,222.877l-23.063,62.752H227.921l-27.006-62.752s17.235-10.833,59.366,4.445a90.406,90.406,0,0,0,34.338,5.657C318.96,232.015,331.478,222.877,331.478,222.877Z" class="colorc36245 svgShape"></path>
                                </svg>'
        ],
        [
          'title' => 'Investment Dashboard',
          'desc' => 'View your entire portfolio at a glance. Monitor metrics, insights, and performance data.',
          'url' => site_url('/How-It-Works/Investment-Dashboard'),
          'svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 56 56" id="Investment">
                                    <path fill="#34a853" d="M52 51H4a1 1 0 0 0 0 2h48a1 1 0 0 0 0-2zm-30-2h12c.55 0 1-.45 1-1V36c0-.55-.45-1-1-1H22c-.55 0-1 .45-1 1v12c0 .55.45 1 1 1zM6 49h12c.55 0 1-.45 1-1v-8c0-.55-.45-1-1-1H6c-.55 0-1 .45-1 1v8c0 .55.45 1 1 1z" class="color3b4652 svgShape"></path>
                                    <path fill="#4285f4" d="M38 49h12c.55 0 1-.45 1-1V28c0-.55-.45-1-1-1H38c-.55 0-1 .45-1 1v20c0 .55.45 1 1 1z" class="color2b79c2 svgShape"></path>
                                    <path fill="#34a853" d="M6 37c.15 0 .303-.034.447-.105L32.43 23.903l-1.325 2.65a1 1 0 1 0 1.79.894l3-6A1.001 1.001 0 0 0 35 20h-7a1 1 0 0 0 0 2h3.763L5.553 35.105A1 1 0 0 0 6 37z" class="color3b4652 svgShape"></path>
                                    <path fill="#4285f4" d="M43.58 3c-5.19 0-9.41 4.22-9.41 9.42 0 5.19 4.22 9.41 9.41 9.41S53 17.61 53 12.42C53 7.22 48.77 3 43.58 3zm-.02 8.417c1.795 0 3.22 1.424 3.22 3.174a3.191 3.191 0 0 1-2.197 3.049v.634a1 1 0 0 1-2 0v-.641c-1.281-.422-2.196-1.599-2.196-2.998a1 1 0 0 1 2 0c0 .648.526 1.175 1.174 1.175.692 0 1.219-.527 1.219-1.175 0-.692-.527-1.218-1.175-1.218-1.795 0-3.218-1.425-3.218-3.175a3.19 3.19 0 0 1 2.196-3.048v-.635a1 1 0 0 1 2 0V7.2c1.28.422 2.197 1.598 2.197 2.997a1 1 0 0 1-2 0c0-.648-.527-1.175-1.175-1.175-.692 0-1.218.527-1.218 1.175 0 .692.526 1.219 1.174 1.219z" class="color2b79c2 svgShape"></path>
                                </svg>'
        ],
        [
          'title' => 'Setting Financial Goals',
          'desc' => 'Plan and track your financial milestones with our goal-setting and progress tracking tools.',
          'url' => site_url('/How-It-Works/Setting-Financial-Goals'),
          'svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" id="Business">
                                    <g transform="translate(-183 -1175.362)" fill="#000000" class="color000000 svgShape">
                                        <path fill="#4ac36a" fill-rule="evenodd" d="M190 1229.362v-10l11.958-11.937 2.921 3 7.942-8 1.947 2L227 1192.36v37.002z" class="color8bc34a svgShape"></path>
                                        <path fill="none" stroke="#374f3d" d="M187.5 1182.362v50m47.5-2.5h-50" class="colorStroke37474f svgStroke"></path>
                                        <path fill="none" stroke="#26382b" d="m189.34 1219.362 13-12 3 3 8-8 2 2 12.005-12.346" class="colorStroke263238 svgStroke"></path>
                                        <path fill="none" stroke="#26382b" d="M224 1191.862h3.5v3.5m-36 25v7m3-10v10m3-13v13m3-16v16m3-16v16m3-15v15m3-18v18m3-21v21m3-20v20m3-23v23m3-26v26m3-29v29" class="colorStroke263238 svgStroke"></path>
                                        <g transform="translate(183 185)" fill="#000000" class="color000000 svgShape">
                                        <path fill="#ffbe00" d="M53.5 1035.362h2v5h-2z" color="#000" overflow="visible" style="isolation:auto;mix-blend-mode:normal" class="colorff9800 svgShape"></path>
                                        <path fill="none" stroke="#ffbf07" stroke-linecap="round" stroke-linejoin="round" d="M52 1030.862h-2a3.492 3.492 0 0 1-3.5-3.5v-.729m0-.179v-2.592h3.321" color="#000" overflow="visible" style="isolation:auto;mix-blend-mode:normal" transform="matrix(-1 0 0 1 109 2)" class="colorStrokeffc107 svgStroke"></path>
                                        <path fill="none" stroke="#ffbf07" stroke-linecap="round" stroke-linejoin="round" d="M52 1032.862h-2a3.492 3.492 0 0 1-3.5-3.5v-.73m0-.178v-2.592h3.321" color="#000" overflow="visible" style="isolation:auto;mix-blend-mode:normal" class="colorStrokeffc107 svgStroke"></path>
                                        <rect width="11" height="11" x="49" y="1025.362" fill="#fbbc05" color="#000" overflow="visible" rx="4.889" ry="4.889" style="isolation:auto;mix-blend-mode:normal" class="colorffc107 svgShape"></rect>
                                        <rect width="11" height="8" x="49" y="1023.362" fill="#fbbc05" color="#000" overflow="visible" rx="0" ry="0" style="isolation:auto;mix-blend-mode:normal" class="colorffc107 svgShape"></rect>
                                        <path fill="#ffbe00" d="m54 1036.362-.89-.301-.752.561.012-.939-.767-.542.897-.279.279-.897.542.767.94-.012-.563.753z" color="#000" overflow="visible" style="isolation:auto;mix-blend-mode:normal" transform="rotate(8.722 5946.841 1188.277)scale(1.85876)" class="colorff9800 svgShape"></path>
                                        <rect width="5" height="1" x="52" y="1040.362" fill="#fbbc05" color="#000" overflow="visible" rx=".5" ry=".5" style="isolation:auto;mix-blend-mode:normal" class="colorffc107 svgShape"></rect>
                                        <rect width="5" height="1" x="52" y="1040.862" fill="#fbbc05" color="#000" overflow="visible" rx="0" ry="0" style="isolation:auto;mix-blend-mode:normal" class="colorffc107 svgShape"></rect>
                                        <rect width="9" height="4" x="50" y="1041.362" fill="#416d4d" color="#000" overflow="visible" rx="1" ry="1" style="isolation:auto;mix-blend-mode:normal" class="color6d4c41 svgShape"></rect>
                                        <path fill="#416d4d" d="M50 1043.362h9v2h-9z" color="#000" overflow="visible" style="isolation:auto;mix-blend-mode:normal" class="color6d4c41 svgShape"></path>
                                        <path fill="#f5b600" d="M52 1043.362h5v1h-5z" color="#000" overflow="visible" style="isolation:auto;mix-blend-mode:normal" class="colorf57c00 svgShape"></path>
                                        </g>
                                        <path fill="#4caf66" d="M190 1185.362h2v2h-2z" color="#000" overflow="visible" style="isolation:auto;mix-blend-mode:normal" class="color4caf50 svgShape"></path>
                                        <path fill="#ea4335" d="M190 1189.362h2v2h-2z" color="#000" overflow="visible" style="isolation:auto;mix-blend-mode:normal" class="colorf44336 svgShape"></path>
                                        <path fill="#e9eaed" d="M193 1185.362h4v2h-4zM193 1189.362h4v2h-4z" color="#000" overflow="visible" style="isolation:auto;mix-blend-mode:normal" class="colore9eded svgShape"></path>
                                        <path fill="#b0b8c5" d="M199 1185.362h11v2h-11zM199 1189.362h11v2h-11z" color="#000" overflow="visible" style="isolation:auto;mix-blend-mode:normal" class="colorb0bec5 svgShape"></path>
                                        <path fill="none" stroke="#416d4d" stroke-linecap="round" stroke-linejoin="round" d="m229.081 1207.857 1.414-1.414m-1.414 0 1.414 1.414" class="colorStroke6d4c41 svgStroke"></path>
                                        <path fill="none" stroke="#34a853" stroke-linecap="round" stroke-linejoin="round" d="m244.575 1205.488.919-.53m-2.375.14-.53-.919m1.598 2.758.53.919m-1.987-1.309-.918.53" class="colorStroke47a146 svgStroke"></path>
                                        <path fill="none" stroke="#f44536" stroke-linecap="round" stroke-linejoin="round" d="m231.626 1223.366.868-.5m-2.238.13-.494-.855m1.505 2.595.493.854m-1.876-1.224-.854.493" class="colorStrokef44336 svgStroke"></path>
                                        <path fill="none" stroke="#0248bd" stroke-linecap="round" stroke-linejoin="round" d="m244.08 1227.857 1.415-1.414m-1.414 0 1.414 1.414" class="colorStroke0277bd svgStroke"></path>
                                        <circle cx="233.5" cy="1203.862" r="1" fill="none" stroke="#4285f4" stroke-linecap="round" stroke-linejoin="round" color="#000" overflow="visible" style="isolation:auto;mix-blend-mode:normal" class="colorStroke2196f3 svgStroke"></circle>
                                        <circle cx="242.5" cy="1222.862" r=".5" fill="#ea4335" color="#000" overflow="visible" style="isolation:auto;mix-blend-mode:normal" class="colorf44336 svgShape"></circle>
                                        <circle cx="229.5" cy="1226.862" r=".5" fill="#4caf66" color="#000" overflow="visible" style="isolation:auto;mix-blend-mode:normal" class="color4caf50 svgShape"></circle>
                                    </g>
                                </svg>'
        ],
        [
          'title' => 'MyMI Gold',
          'desc' => 'Unlock premium features, analytics, and rewards with MyMI Gold. Learn how to start using it.',
          'url' => site_url('/How-It-Works/MyMI-Gold'),
          'svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" id="Business">
                                    <g transform="translate(-183 -1175.362)" fill="#000000" class="color000000 svgShape">
                                        <path fill="#4ac36a" fill-rule="evenodd" d="M190 1229.362v-10l11.958-11.937 2.921 3 7.942-8 1.947 2L227 1192.36v37.002z" class="color8bc34a svgShape"></path>
                                        <path fill="none" stroke="#374f3d" d="M187.5 1182.362v50m47.5-2.5h-50" class="colorStroke37474f svgStroke"></path>
                                        <path fill="none" stroke="#26382b" d="m189.34 1219.362 13-12 3 3 8-8 2 2 12.005-12.346" class="colorStroke263238 svgStroke"></path>
                                        <path fill="none" stroke="#26382b" d="M224 1191.862h3.5v3.5m-36 25v7m3-10v10m3-13v13m3-16v16m3-16v16m3-15v15m3-18v18m3-21v21m3-20v20m3-23v23m3-26v26m3-29v29" class="colorStroke263238 svgStroke"></path>
                                        <g transform="translate(183 185)" fill="#000000" class="color000000 svgShape">
                                        <path fill="#ffbe00" d="M53.5 1035.362h2v5h-2z" color="#000" overflow="visible" style="isolation:auto;mix-blend-mode:normal" class="colorff9800 svgShape"></path>
                                        <path fill="none" stroke="#ffbf07" stroke-linecap="round" stroke-linejoin="round" d="M52 1030.862h-2a3.492 3.492 0 0 1-3.5-3.5v-.729m0-.179v-2.592h3.321" color="#000" overflow="visible" style="isolation:auto;mix-blend-mode:normal" transform="matrix(-1 0 0 1 109 2)" class="colorStrokeffc107 svgStroke"></path>
                                        <path fill="none" stroke="#ffbf07" stroke-linecap="round" stroke-linejoin="round" d="M52 1032.862h-2a3.492 3.492 0 0 1-3.5-3.5v-.73m0-.178v-2.592h3.321" color="#000" overflow="visible" style="isolation:auto;mix-blend-mode:normal" class="colorStrokeffc107 svgStroke"></path>
                                        <rect width="11" height="11" x="49" y="1025.362" fill="#fbbc05" color="#000" overflow="visible" rx="4.889" ry="4.889" style="isolation:auto;mix-blend-mode:normal" class="colorffc107 svgShape"></rect>
                                        <rect width="11" height="8" x="49" y="1023.362" fill="#fbbc05" color="#000" overflow="visible" rx="0" ry="0" style="isolation:auto;mix-blend-mode:normal" class="colorffc107 svgShape"></rect>
                                        <path fill="#ffbe00" d="m54 1036.362-.89-.301-.752.561.012-.939-.767-.542.897-.279.279-.897.542.767.94-.012-.563.753z" color="#000" overflow="visible" style="isolation:auto;mix-blend-mode:normal" transform="rotate(8.722 5946.841 1188.277)scale(1.85876)" class="colorff9800 svgShape"></path>
                                        <rect width="5" height="1" x="52" y="1040.362" fill="#fbbc05" color="#000" overflow="visible" rx=".5" ry=".5" style="isolation:auto;mix-blend-mode:normal" class="colorffc107 svgShape"></rect>
                                        <rect width="5" height="1" x="52" y="1040.862" fill="#fbbc05" color="#000" overflow="visible" rx="0" ry="0" style="isolation:auto;mix-blend-mode:normal" class="colorffc107 svgShape"></rect>
                                        <rect width="9" height="4" x="50" y="1041.362" fill="#416d4d" color="#000" overflow="visible" rx="1" ry="1" style="isolation:auto;mix-blend-mode:normal" class="color6d4c41 svgShape"></rect>
                                        <path fill="#416d4d" d="M50 1043.362h9v2h-9z" color="#000" overflow="visible" style="isolation:auto;mix-blend-mode:normal" class="color6d4c41 svgShape"></path>
                                        <path fill="#f5b600" d="M52 1043.362h5v1h-5z" color="#000" overflow="visible" style="isolation:auto;mix-blend-mode:normal" class="colorf57c00 svgShape"></path>
                                        </g>
                                        <path fill="#4caf66" d="M190 1185.362h2v2h-2z" color="#000" overflow="visible" style="isolation:auto;mix-blend-mode:normal" class="color4caf50 svgShape"></path>
                                        <path fill="#ea4335" d="M190 1189.362h2v2h-2z" color="#000" overflow="visible" style="isolation:auto;mix-blend-mode:normal" class="colorf44336 svgShape"></path>
                                        <path fill="#e9eaed" d="M193 1185.362h4v2h-4zM193 1189.362h4v2h-4z" color="#000" overflow="visible" style="isolation:auto;mix-blend-mode:normal" class="colore9eded svgShape"></path>
                                        <path fill="#b0b8c5" d="M199 1185.362h11v2h-11zM199 1189.362h11v2h-11z" color="#000" overflow="visible" style="isolation:auto;mix-blend-mode:normal" class="colorb0bec5 svgShape"></path>
                                        <path fill="none" stroke="#416d4d" stroke-linecap="round" stroke-linejoin="round" d="m229.081 1207.857 1.414-1.414m-1.414 0 1.414 1.414" class="colorStroke6d4c41 svgStroke"></path>
                                        <path fill="none" stroke="#34a853" stroke-linecap="round" stroke-linejoin="round" d="m244.575 1205.488.919-.53m-2.375.14-.53-.919m1.598 2.758.53.919m-1.987-1.309-.918.53" class="colorStroke47a146 svgStroke"></path>
                                        <path fill="none" stroke="#f44536" stroke-linecap="round" stroke-linejoin="round" d="m231.626 1223.366.868-.5m-2.238.13-.494-.855m1.505 2.595.493.854m-1.876-1.224-.854.493" class="colorStrokef44336 svgStroke"></path>
                                        <path fill="none" stroke="#0248bd" stroke-linecap="round" stroke-linejoin="round" d="m244.08 1227.857 1.415-1.414m-1.414 0 1.414 1.414" class="colorStroke0277bd svgStroke"></path>
                                        <circle cx="233.5" cy="1203.862" r="1" fill="none" stroke="#4285f4" stroke-linecap="round" stroke-linejoin="round" color="#000" overflow="visible" style="isolation:auto;mix-blend-mode:normal" class="colorStroke2196f3 svgStroke"></circle>
                                        <circle cx="242.5" cy="1222.862" r=".5" fill="#ea4335" color="#000" overflow="visible" style="isolation:auto;mix-blend-mode:normal" class="colorf44336 svgShape"></circle>
                                        <circle cx="229.5" cy="1226.862" r=".5" fill="#4caf66" color="#000" overflow="visible" style="isolation:auto;mix-blend-mode:normal" class="color4caf50 svgShape"></circle>
                                    </g>
                                </svg>'
        ],
        [
          'title' => 'MyMI Exchange',
          'desc' => 'Trade MyMI Gold and crypto assets securely. Manage digital assets in one powerful dashboard.',
          'url' => site_url('/How-It-Works/MyMI-Exchange'),
          'svg' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" id="FinancialAnalysis">
                                    <path fill="#2d302e" d="M456,216V448H56V216a24.006,24.006,0,0,1,24-24H432A24.006,24.006,0,0,1,456,216Z" class="color2d2d30 svgShape"></path>
                                    <polyline fill="#4285f4" points="352 216 432 216 432 424 80 424 80 216 160 216 320 216" class="color83d8f4 svgShape"></polyline>
                                    <path fill="#e0e1e2" d="M16,448H496a0,0,0,0,1,0,0v32a16,16,0,0,1-16,16H32a16,16,0,0,1-16-16V448a0,0,0,0,1,0,0Z" class="colore0e0e2 svgShape"></path>
                                    <polygon fill="#34a853" points="288 472 224 472 216 448 296 448 288 472" class="color57565c svgShape"></polygon>
                                    <circle cx="256" cy="144" r="88" fill="#fbbc05" class="colorff9811 svgShape"></circle>
                                    <circle cx="256" cy="144" r="64" fill="#ffcf44" class="colorffda44 svgShape"></circle>
                                    <rect width="24" height="48" x="16" y="16" fill="#ffcf44" class="colorffda44 svgShape"></rect>
                                    <rect width="24" height="48" x="472" y="112" fill="#ffcf44" transform="rotate(180 484 136)" class="colorffda44 svgShape"></rect>
                                    <rect width="24" height="88" x="120" y="264" fill="#ffcf44" class="colorffda44 svgShape"></rect>
                                    <rect width="24" height="56" x="168" y="296" fill="#ea4335" class="colorab2300 svgShape"></rect>
                                    <rect width="24" height="80" x="216" y="272" fill="#fbbc05" class="colorff9811 svgShape"></rect>
                                    <rect width="24" height="88" x="264" y="264" fill="#cc9904" class="color91cc04 svgShape"></rect>
                                    <rect width="24" height="56" x="312" y="296" fill="#fbbc05" class="colorff9811 svgShape"></rect>
                                    <rect width="24" height="80" x="360" y="272" fill="#ea4335" class="colorab2300 svgShape"></rect>
                                    <circle cx="360" cy="56" r="16" fill="#ea4335" class="colorab2300 svgShape"></circle>
                                    <g fill="#000000" class="color000000 svgShape">
                                        <path d="M496,440H464V216a32.042,32.042,0,0,0-32-32H343.26a95.309,95.309,0,0,0,5.7-16H448a8,8,0,0,0,0-16H351.66c.22-2.64.34-5.31.34-8a96,96,0,0,0-184.9-36.22L117.66,58.34A8.008,8.008,0,0,0,112,56H64a8,8,0,0,0,0,16h44.69l53.17,53.17A96.009,96.009,0,0,0,168.74,184H80a32.036,32.036,0,0,0-32,32V440H16a8,8,0,0,0-8,8v32a24.032,24.032,0,0,0,24,24H480a24.032,24.032,0,0,0,24-24V448A8,8,0,0,0,496,440ZM256,64a80,80,0,1,1-80,80A80.093,80.093,0,0,1,256,64ZM424,224V416H88V224H203.03a95.715,95.715,0,0,0,105.96,0ZM64,216a16.021,16.021,0,0,1,16-16h98.07a99.229,99.229,0,0,0,6.44,8H80a8,8,0,0,0-8,8V424a8,8,0,0,0,8,8H432a8,8,0,0,0,8-8V216a8,8,0,0,0-8-8H327.49a99.229,99.229,0,0,0,6.44-8H432a16.021,16.021,0,0,1,16,16V440H64ZM284.9,456l-2.67,8H229.77l-2.67-8ZM488,480a8.011,8.011,0,0,1-8,8H32a8.011,8.011,0,0,1-8-8V456H210.23l6.18,18.53A8,8,0,0,0,224,480h64a8,8,0,0,0,7.59-5.47L301.77,456H488Z" fill="#000000" class="color000000 svgShape"></path>
                                        <path d="M104 464H40a8 8 0 000 16h64a8 8 0 000-16zM136 464h-8a8 8 0 000 16h8a8 8 0 000-16zM256 216a72 72 0 10-72-72A72.083 72.083 0 00256 216zm0-128a56 56 0 11-56 56A56.062 56.062 0 01256 88z" fill="#000000" class="color000000 svgShape"></path>
                                        <path d="M240 160a8 8 0 000 16h8a8 8 0 0016 0h8a8 8 0 008-8V144a8 8 0 00-8-8H248v-8h24a8 8 0 000-16h-8a8 8 0 00-16 0h-8a8 8 0 00-8 8v24a8 8 0 008 8h24v8zM64 24H168a8 8 0 000-16H64a8 8 0 000 16zM64 48h56a8 8 0 000-16H64a8 8 0 000 16zM16 72H40a8 8 0 008-8V16a8 8 0 00-8-8H16a8 8 0 00-8 8V64A8 8 0 0016 72zm8-48h8V56H24zM448 128H392a8 8 0 000 16h56a8 8 0 000-16zM496 104H472a8 8 0 00-8 8v48a8 8 0 008 8h24a8 8 0 008-8V112A8 8 0 00496 104zm-8 48h-8V120h8zM112 360H400a8 8 0 000-16h-8V272a8 8 0 00-8-8H360a8 8 0 00-8 8v72h-8V296a8 8 0 00-8-8H312a8 8 0 00-8 8v48h-8V264a8 8 0 00-8-8H264a8 8 0 00-8 8v80h-8V272a8 8 0 00-8-8H216a8 8 0 00-8 8v72h-8V296a8 8 0 00-8-8H168a8 8 0 00-8 8v48h-8V264a8 8 0 00-8-8H120a8 8 0 00-8 8v80a8 8 0 000 16zm256-80h8v64h-8zm-48 24h8v40h-8zm-48-32h8v72h-8zm-48 8h8v64h-8zm-48 24h8v40h-8zm-48-32h8v72h-8zM112 384h80a8 8 0 000-16H112a8 8 0 000 16zM112 408h48a8 8 0 000-16H112a8 8 0 000 16zM296 368H216a8 8 0 000 16h80a8 8 0 000-16zM264 392H216a8 8 0 000 16h48a8 8 0 000-16zM400 368H320a8 8 0 000 16h80a8 8 0 000-16zM368 392H320a8 8 0 000 16h48a8 8 0 000-16zM360 80a23.856 23.856 0 0010.34-2.345l0 0 40 40A8 8 0 00416 120h32a8 8 0 000-16H419.313L381.657 66.343l0 0A24 24 0 10360 80zm0-32a8 8 0 11-8 8A8.009 8.009 0 01360 48z" fill="#000000" class="color000000 svgShape"></path>
                                    </g>
                                </svg>'
        ],
      ];

      foreach ($howToGuides as $guide): ?>
        <div class="col-md-6 col-lg-4">
          <a class="intro-feature-item d-block p-4 border rounded shadow-sm h-100" href="<?= $guide['url'] ?>">
            <div class=" mb-3 text-center">
                <div class="intro-feature-media">
                <?= $guide['svg'] ?>
                </div>
            </div>
            <div class="intro-feature-info text-center">
              <h4 class="title"><?= esc($guide['title']) ?></h4>
              <p><?= esc($guide['desc']) ?></p>
            </div>
          </a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section> -->

<!-- Join Community Stats -->
<section class="py-5 bg-primary text-white full-width">
    <div class="container container-xl">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-8" data-aos="fade-up">
                <h2 class="display-5 fw-bold mb-3">Join Our Growing Platform</h2>
                <p class="lead">Thousands are already on the path to financial freedom. Join them today.</p>
            </div>
        </div>
        <div class="row text-center g-4">
            <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-card">
                    <div class="display-4 fw-bold" data-counter="true" data-bs-target="<?= $totalActiveUsers ?>"><?= $totalActiveUsers ?></div>
                    <p>Active Users</p>
                </div>
            </div>
            <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-card">
                    <div class="display-4 fw-bold" data-counter="true" data-bs-target="<?= $totalWalletsCreated ?>"><?= $totalWalletsCreated ?></div>
                    <p>Wallets Created</p>
                </div>
            </div>
            <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="300">
                <div class="stat-card">
                    <div class="display-4 fw-bold" data-counter="true" data-bs-target="<?= $totalTradesTracked ?>"><?= $totalTradesTracked ?></div>
                    <p>Trades Tracked</p>
                </div>
            </div>
            <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="400">
                <div class="stat-card">
                    <div class="display-4 fw-bold" data-counter="true" data-bs-target="<?= $totalActivePartners ?>"><?= $totalActivePartners ?></div>
                    <p>Active Partners</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Comprehensive Guide Section with Links -->
<div class="intro-section intro-feature bg-white">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-xl-12">
                <div class="intro-section-title text-center">
                    <span class="overline-title">Join Our Community</span>
                    <h2 class="intro-heading-lead title">MyMI's Communities for Investors</h2>
                    <div class="intro-section-desc">
                        <p>
                            Explore the vibrant MyMI Wallet communities across various social channels.<br>
                            Each platform offers unique insights, resources, and interactions to help you make the most of your financial journey.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="row justify-content-center intro-feature-list">

                    <!-- How It Works: Registering an Account -->
                    <div class="col-sm-12">
                        <?php 
                        // Loop through each social platform to display details
                        echo '<div class="row">';
                            foreach ($socialPlatforms as $name => $details) { ?>
                                <div class="col-12 col-lg-4 mb-3">
                                    <div class="social-platform">
                                        <div class="row">
                                            <div class="col">
                                                <?= $details['svg']; ?> 
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <h3><?= $name ?></h3>
                                                <p><?= $details['description'] ?></p>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <a href="<?= $details['url'] ?>" target="_blank" class=" btn btn-md btn-primary text-white social-link"><?= $details['button'] . ' ' . $name ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>