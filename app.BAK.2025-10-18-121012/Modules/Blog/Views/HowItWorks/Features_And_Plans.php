<?php
$page_title = "Features & Plans";
?>
<section class="cid-s0KKUOB7cY full-width mt-5" id="howItWorksFeatures">
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
                        <p class="card-description">FEATURE BREAKDOWN</p>
                        <hr>

                        <h2 class="pt-4 display-6">Free Features</h2>
                        <ul class="blog-text">
                            <li><strong>Personal Budgeting Tool:</strong> Track expenses, set goals, and manage cash flow with ease.</li>
                            <li><strong>Manual Investment Tracking:</strong> Add stocks, crypto, and ETFs manually for basic monitoring.</li>
                            <li><strong>Watchlist & Trade Alerts:</strong> Get updates on favorite assets and trade setups.</li>
                            <li><strong>Retirement Planning Tools:</strong> Estimate retirement targets and build future plans.</li>
                            <li><strong>Community Access via Discord:</strong> Join like-minded users, share strategies, and learn together.</li>
                        </ul>

                        <h2 class="pt-4 display-6">Premium Features</h2>
                        <ul class="blog-text">
                            <li><strong>Automated Account Integration:</strong> Sync with financial institutions for real-time updates.</li>
                            <li><strong>MyMI Solana Exchange Access:</strong> Swap tokens and manage assets within the ecosystem.</li>
                            <li><strong>Real-Time Data & Custom Alerts:</strong> Monitor performance with live market data and alerts.</li>
                            <li><strong>MyMI Asset Creator & Growth Coins:</strong> Tokenize and sell financial data or asset-backed coins.</li>
                            <li><strong>Advanced Forecasting & Tax Optimization:</strong> Get predictive insights and tax-smart strategies.</li>
                        </ul>

                        <hr>
                        <?= view('UserModule/Support/Need_Assistance'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
