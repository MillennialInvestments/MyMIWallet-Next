<?php
$ctaUrl = empty($cuID ?? null) ? site_url('register') : site_url('Budget');
?>

<section class="py-5 bg-light border-bottom">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-lg-7">
                <p class="text-uppercase fw-semibold text-primary mb-2">How It Works</p>
                <h1 class="display-5 fw-bold mb-3">Personal Budgeting & Financial Forecasting</h1>
                <p class="lead text-muted mb-4">
                    MyMI Wallet helps you organize income, expenses, wallets, credit balances, financial goals, and recurring obligations so you can understand your current position and plan what happens next.
                </p>
                <div class="d-flex flex-wrap gap-2">
                    <a class="btn btn-primary btn-lg" href="<?= esc($ctaUrl) ?>">
                        <?= empty($cuID ?? null) ? 'Create your free account' : 'Open your budget' ?>
                    </a>
                    <a class="btn btn-outline-primary btn-lg" href="<?= site_url('How-It-Works/Setting-Financial-Goals') ?>">Set financial goals</a>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h2 class="h4 mb-3">Budgeting with MyMI</h2>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-3">✓ Track income and planned expenses.</li>
                            <li class="mb-3">✓ Organize recurring and one-time obligations.</li>
                            <li class="mb-3">✓ Compare available balances and credit balances.</li>
                            <li class="mb-3">✓ Forecast repayment and cash-flow pressure.</li>
                            <li>✓ Connect budgeting to goals, wallets, and alerts.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row mb-4">
            <div class="col-lg-8">
                <h2 class="fw-bold">A practical budgeting workflow</h2>
                <p class="text-muted mb-0">Start with what you know today, then refine your plan as new income, expenses, and goals appear.</p>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-6">
                <div class="h-100 p-4 border rounded-3 bg-white">
                    <h3 class="h5">1. Gather your financial picture</h3>
                    <p class="text-muted mb-0">Collect income, bills, subscriptions, debt payments, credit balances, savings, and wallet balances so your budget starts from reality.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="h-100 p-4 border rounded-3 bg-white">
                    <h3 class="h5">2. Build your monthly plan</h3>
                    <p class="text-muted mb-0">Add expected income and expenses, then separate recurring obligations from one-time spending so MyMI can help you forecast more clearly.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="h-100 p-4 border rounded-3 bg-white">
                    <h3 class="h5">3. Track progress and pressure points</h3>
                    <p class="text-muted mb-0">Use budget records, available balances, repayment summaries, and alerts to see where you are ahead, behind, or at risk.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="h-100 p-4 border rounded-3 bg-white">
                    <h3 class="h5">4. Connect your goals</h3>
                    <p class="text-muted mb-0">Tie your budget to larger outcomes like paying down debt, building savings, preparing for investments, and improving financial stability.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4 align-items-start">
            <div class="col-lg-6">
                <h2 class="fw-bold">What this feature supports</h2>
                <p class="text-muted">Personal budgeting is the foundation for multiple MyMI Wallet workflows.</p>
                <ul class="list-unstyled">
                    <li class="mb-3">✓ Budget dashboard and budget records</li>
                    <li class="mb-3">✓ Income and expense planning</li>
                    <li class="mb-3">✓ Wallet and balance visibility</li>
                    <li class="mb-3">✓ Credit balance awareness</li>
                    <li class="mb-3">✓ Repayment and cash-flow summaries</li>
                    <li>✓ Forecasting for upcoming financial decisions</li>
                </ul>
            </div>
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h3 class="h5">Next guides</h3>
                        <div class="list-group list-group-flush">
                            <a class="list-group-item list-group-item-action" href="<?= site_url('How-It-Works/Setting-Financial-Goals') ?>">Setting financial goals</a>
                            <a class="list-group-item list-group-item-action" href="<?= site_url('How-It-Works/Investment-Portfolio-Management') ?>">Investment portfolio management</a>
                            <a class="list-group-item list-group-item-action" href="<?= site_url('How-It-Works/Daily-Financial-News') ?>">Daily financial news</a>
                            <a class="list-group-item list-group-item-action" href="<?= site_url('How-It-Works/MyMI-Gold') ?>">MyMI Gold</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
