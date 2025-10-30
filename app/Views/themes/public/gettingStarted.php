<?php
$subViewData = [
    'debug' => $debug ?? false,
    'uri'   => $uri ?? service('uri'),
];
?>
<style <?= $nonce['style'] ?? '' ?>>
#gettingStartedBanner {
    background-image: url('<?= base_url('assets/images/MyMI-Walllet-Background.jpeg'); ?>');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    height: 100%;
    width: 100%;
}
.highlight-image {
    filter: sepia(1) saturate(5) hue-rotate(10deg) brightness(1.2);
    width: 10%;
}
</style>

<!-- ✅ BANNER + BREADCRUMB -->
<div class="bg-light mt-3 pt-3 pb-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= site_url('/'); ?>">Home</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Getting Started</li>
                </ul>
                <h1 class="text-primary">Getting Started with MyMI Wallet</h1>
                <p class="lead">Your journey to financial independence begins here.</p>
            </div>
        </div>
    </div>
</div>

<!-- ✅ MAIN ONBOARDING STEPS -->
<div class="container my-5">
    <div class="row justify-content-center">
        <!-- ✅ LEFT SIDE: INSTRUCTIONS -->
        <div class="col-12 col-lg-6">
            <div class="content">
                <h2>Step 1: Create Your Free Account</h2>
                <ol>
                    <li>Visit <a href="<?= site_url('/register'); ?>">the Registration Page</a></li>
                    <li>Fill in your details and submit the form</li>
                    <li>Check your inbox for a confirmation email</li>
                    <li>Click the link to activate your account</li>
                    <li>Log in to access your Dashboard</li>
                </ol>

                <h2>Step 2: Set Up Your Budget</h2>
                <ol>
                    <li>Go to <strong>Budgeting</strong> in your Dashboard</li>
                    <li>Enter your monthly income and expenses</li>
                    <li>Set category limits and goals</li>
                    <li>Track and adjust as you go</li>
                </ol>

                <h2>Step 3: Begin Investing</h2>
                <ol>
                    <li>Visit the <strong>Investments</strong> section</li>
                    <li>Add your assets manually or link accounts</li>
                    <li>Review your performance and risk indicators</li>
                    <li>Use built-in tools to optimize your portfolio</li>
                </ol>

                <h2>Step 4: Connect with Apex Trader Funding</h2>
                <ol>
                    <li><a href="<?= site_url('/Apex/Referral'); ?>">Click here to register with Apex Trader</a></li>
                    <li>Use our referral for exclusive funding perks</li>
                    <li>Link your Apex account with MyMI</li>
                    <li>Track trades and maximize your capital</li>
                </ol>
            </div>
        </div>

        <!-- ✅ RIGHT SIDE: VIDEO + SUPPORT + COMMUNITY -->
        <div class="col-12 col-lg-6">
            <div class="content">
                <div class="ratio ratio-16x9 mb-4">
                    <iframe src="https://www.youtube.com/embed/AMCS5kwGgpA" 
                        title="Welcome to MyMI Wallet Walkthrough" frameborder="0" allowfullscreen>
                    </iframe>
                </div>
                <h4>Need Help?</h4>
                <p>Our support team is ready to assist you. Visit the <a href="<?= site_url('/support'); ?>">Support Center</a>.</p>

                <h4>Join the Community</h4>
                <p>Connect with fellow investors on our official Discord server: 
                    <a href="https://discord.gg/VzVYb9mqEv" target="_blank">Join MyMI Wallet on Discord</a></p>
            </div>
        </div>
    </div>

    <!-- ✅ FOOTER CTA BLOCKS -->
    <hr>
    <?= view('themes/public/resources/stayConnected', $subViewData); ?>
    <hr>
    <div class="row justify-content-center my-5">
        <div class="col-12 text-center">
            <a href="<?= site_url('/register'); ?>" class="btn btn-primary btn-lg px-5">Create My Account</a>
            <p class="mt-3">Already have an account? <a href="<?= site_url('/login'); ?>">Log in here</a>.</p>
        </div>
    </div>
</div>
