<?php
$page_title = "Manage Your Finances";
?>
<section class="cid-s0KKUOB7cY full-width mt-5" id="howItWorks">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="px-5 col-11 grid-margin stretch-card">
                <div class="card">
                    <div class="pt-3 card-body px-5">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= site_url('/How-To-Guides'); ?>">How It Works</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?= $page_title; ?></li>
                            </ol>
                        </nav>
                        <h1 class="card-title display-5"><?= strtoupper($page_title); ?></h1>
                        <p class="card-description">STEP-BY-STEP WALKTHROUGH</p>
                        <hr>

                        <h2 class="pt-4 display-6">1. Start Your Free Personal Budget</h2>
                        <p class="blog-text">Track income and expenses with ease. Set monthly limits and monitor progress to maximize savings and investments.</p>

                        <h2 class="pt-4 display-6">2. Add Credit/Debt Accounts</h2>
                        <p class="blog-text">Log your cards and loans. View balances, interest, due dates, and repayment forecasts.</p>

                        <h2 class="pt-4 display-6">3. Create Your Investment Profile</h2>
                        <p class="blog-text">Manually enter and categorize assets. Upgrade to sync brokerage data with premium automation.</p>

                        <h2 class="pt-4 display-6">4. Use the Watchlist, Trade Tracker & Retirement Planner</h2>
                        <p class="blog-text">Track markets, confirm trades, and set future goals with personalized retirement planning tools.</p>

                        <hr>
                        <?= view('UserModule/Support/Need_Assistance'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
