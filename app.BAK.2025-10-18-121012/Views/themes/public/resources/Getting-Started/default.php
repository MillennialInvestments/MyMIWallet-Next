<?php
$subViewData = [
    'debug' => $debug ?? false,
    'uri'   => $uri ?? service('uri'),
];
?>
<style <?= $nonce['style'] ?? '' ?>>
    body {
        font-family: 'Segoe UI', sans-serif;
    }
    #gettingStartedBanner {
        background-image: url('<?= base_url('assets/images/MyMI-Walllet-Background.jpeg'); ?>');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 100%;
        width: 100%;
    }
    .hero {
        background-color: #0d6efd;
        color: white;
        padding: 3rem 1rem;
        text-align: center;
    }
    .section {
        padding: 2.5rem 1rem;
    }
    .badge-feature {
        font-size: 1rem;
    }
    .cta-sticky {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        background: #ffc107;
        color: #000;
        padding: 0.75rem 1rem;
        text-align: center;
        font-weight: bold;
        z-index: 9999;
        box-shadow: 0 -2px 10px rgba(0,0,0,0.2);
    }
    @media (min-width: 768px) {
        .cta-sticky {
            display: none;
        }
    }
</style>

<div class="bg-light mt-3 pt-3 pt-xl-3 pb-3">
    <div class="container">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= site_url('/'); ?>">Home</a></li>
            <li class="breadcrumb-item text-primary active">Getting Started</li>
        </ul>
        <h1 class="text-primary">Getting Started with MyMI Wallet</h1>
        <p class="lead">Your all-in-one platform for budgeting, investing, crypto, and smart money management.</p>
    </div>
</div>

<!-- Sticky CTA for mobile -->
<div class="cta-sticky d-md-none">
    🚀 Start for Free → <a href="<?= site_url('/register'); ?>" class="text-dark"><u>Create Account</u></a>
</div>

<div class="container my-5">
    <div class="row justify-content-center">
        <!-- LEFT COLUMN -->
        <div class="col-12 col-lg-6">
            <div class="content">
                <h2>Step 1: Create Your Account</h2>
                <ol>
                    <li>Visit <a href="<?= site_url('/register'); ?>">Register Page</a>.</li>
                    <li>Fill in details and verify via email.</li>
                    <li>Log in and access your dashboard.</li>
                </ol>

                <h2>Step 2: Build Your Budget</h2>
                <ol>
                    <li>Go to Budgeting from the dashboard.</li>
                    <li>Add income, expenses, and goals.</li>
                    <li>See your investable balance.</li>
                </ol>

                <h2>Step 3: Manage Investments</h2>
                <ol>
                    <li>Add assets or link accounts.</li>
                    <li>Track portfolio performance.</li>
                    <li>Use insights to guide trades.</li>
                </ol>

                <h2>Step 4: Get Funded via Apex</h2>
                <ol>
                    <li>Use our <a href="<?= site_url('/Apex/Referral'); ?>">Apex Referral</a> to sign up.</li>
                    <li>Connect Apex to your Wallet.</li>
                    <li>Monitor trades + performance.</li>
                </ol>

                <h2>Step 5: Explore Asset Creation</h2>
                <ul>
                    <li>Create your own MyMI token.</li>
                    <li>Trade via the Solana Exchange.</li>
                    <li>Join real-estate-backed projects.</li>
                </ul>

                <h2>🎓 Frequently Asked Questions</h2>
                <ul>
                    <li><strong>Is MyMI Wallet secure?</strong> Yes. Bank-level encryption + decentralized tech.</li>
                    <li><strong>Can I use it free?</strong> Absolutely. Start with our free tools, upgrade anytime.</li>
                    <li><strong>What's the Premium plan?</strong> It includes trade alerts, asset creation, and more.</li>
                </ul>
            </div>
        </div>

        <!-- RIGHT COLUMN -->
        <div class="col-12 col-lg-6">
            <div class="content">
                <div class="ratio ratio-16x9 mb-4">
                    <iframe src="https://www.youtube.com/embed/AMCS5kwGgpA" allowfullscreen></iframe>
                </div>

                <h4>Need Help?</h4>
                <p><a href="<?= site_url('/support'); ?>">Visit Support</a> or ask in Discord for real-time help.</p>

                <h4>Join the Community</h4>
                <p><a class="btn btn-success btn-lg px-5" href="https://discord.gg/VzVYb9mqEv" target="_blank">Join 1,500+ users in our Discord</a></p>

                <h4>💥 Save 60% on Premium</h4>
                <p>Use promo code <code>GET60OFF</code> at checkout.</p>
                <a href="<?= site_url('/Pricing'); ?>" class="btn btn-warning">💼 View Membership Plans</a>
            </div>
        </div>
    </div>

    <hr>
    <div class="row text-center my-5">
        <div class="col">
            <h3>🚀 Ready to Master Your Money?</h3>
            <p>Join thousands using MyMI Wallet to invest smarter.</p>
            <a href="<?= site_url('/register'); ?>" class="btn btn-success btn-lg">Get Started Now</a>
        </div>
    </div>
    <hr>
    <?= view('themes/public/resources/stayConnected', $subViewData); ?>
</div>
