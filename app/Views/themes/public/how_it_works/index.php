<?php
$cards = [
    [
        'title' => 'Personal Budgeting',
        'text'  => 'Build a practical budget, organize income and expenses, and see where your money is going before it becomes a problem.',
        'url'   => site_url('How-It-Works/Personal-Budgeting'),
    ],
    [
        'title' => 'Investment Portfolio Management',
        'text'  => 'Track market activity, forecast signals, portfolio movement, and investment goals from one connected workspace.',
        'url'   => site_url('How-It-Works/Investment-Portfolio-Management'),
    ],
    [
        'title' => 'Daily Financial News',
        'text'  => 'Use market news, earnings, and economic updates to stay aware of what may affect your financial decisions.',
        'url'   => site_url('How-It-Works/Daily-Financial-News'),
    ],
    [
        'title' => 'MyMI Gold',
        'text'  => 'Learn how MyMI Gold connects memberships, purchases, wallets, and premium financial features.',
        'url'   => site_url('How-It-Works/MyMI-Gold'),
    ],
    [
        'title' => 'Alerts',
        'text'  => 'Create alerts for financial activity, market signals, budgets, and other events that need your attention.',
        'url'   => site_url('How-It-Works/alerts'),
    ],
    [
        'title' => 'Security',
        'text'  => 'Understand the security-first approach behind account access, sessions, protected workflows, and user data handling.',
        'url'   => site_url('How-It-Works/security'),
    ],
];
?>

<section class="py-5 bg-light border-bottom">
    <div class="container">
        <div class="row align-items-center g-4">
            <div class="col-lg-7">
                <p class="text-uppercase fw-semibold text-primary mb-2">How It Works</p>
                <h1 class="display-5 fw-bold mb-3">MyMI Wallet is your connected financial command center.</h1>
                <p class="lead text-muted mb-4">
                    MyMI Wallet brings budgeting, wallets, investments, alerts, learning resources, and financial goals into one organized experience so users can understand where they are, plan what comes next, and act with more confidence.
                </p>
                <div class="d-flex flex-wrap gap-2">
                    <a class="btn btn-primary btn-lg" href="<?= site_url('register') ?>">Create your free account</a>
                    <a class="btn btn-outline-primary btn-lg" href="<?= site_url('How-It-Works/Personal-Budgeting') ?>">Start with budgeting</a>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <h2 class="h4 mb-3">What MyMI helps you do</h2>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-3">✓ Build and track a personal budget.</li>
                            <li class="mb-3">✓ Organize wallets, balances, and financial accounts.</li>
                            <li class="mb-3">✓ Monitor investments, news, and market signals.</li>
                            <li class="mb-3">✓ Set goals and use alerts to stay on track.</li>
                            <li>✓ Learn how each part of the platform fits together.</li>
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
                <h2 class="fw-bold">The MyMI Wallet workflow</h2>
                <p class="text-muted mb-0">
                    Start with your account, connect your financial picture, then use MyMI tools to budget, monitor, forecast, and improve.
                </p>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="h-100 p-4 border rounded-3 bg-white">
                    <span class="badge bg-primary mb-3">Step 1</span>
                    <h3 class="h5">Create your profile</h3>
                    <p class="text-muted mb-0">Set up your account so MyMI can personalize your dashboard, security, financial tools, and learning path.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="h-100 p-4 border rounded-3 bg-white">
                    <span class="badge bg-primary mb-3">Step 2</span>
                    <h3 class="h5">Build your money view</h3>
                    <p class="text-muted mb-0">Use wallets, budgets, balances, income, and expenses to understand your current financial position.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="h-100 p-4 border rounded-3 bg-white">
                    <span class="badge bg-primary mb-3">Step 3</span>
                    <h3 class="h5">Track and improve</h3>
                    <p class="text-muted mb-0">Use alerts, forecasts, investments, and education content to adjust your plan as your financial picture changes.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <div class="row mb-4">
            <div class="col-lg-8">
                <h2 class="fw-bold">Explore each feature area</h2>
                <p class="text-muted mb-0">Each guide explains what the feature does, why it matters, and how it connects to the rest of MyMI Wallet.</p>
            </div>
        </div>

        <div class="row g-4">
            <?php foreach ($cards as $card): ?>
                <div class="col-md-6 col-lg-4">
                    <a class="text-decoration-none text-dark" href="<?= esc($card['url']) ?>">
                        <div class="h-100 card border-0 shadow-sm">
                            <div class="card-body p-4">
                                <h3 class="h5"><?= esc($card['title']) ?></h3>
                                <p class="text-muted mb-3"><?= esc($card['text']) ?></p>
                                <span class="fw-semibold text-primary">Learn more →</span>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container text-center">
        <h2 class="fw-bold mb-3">Ready to organize your financial life?</h2>
        <p class="text-muted mb-4">Start with a free account and use MyMI Wallet to move from scattered financial activity to a connected plan.</p>
        <a class="btn btn-primary btn-lg" href="<?= site_url('register') ?>">Create your free account</a>
    </div>
</section>
