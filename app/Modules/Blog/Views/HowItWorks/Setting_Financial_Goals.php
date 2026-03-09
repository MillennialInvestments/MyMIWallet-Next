<?php

$registerType = $uri->getSegment(1);

if ($registerType === 'Investor') {
    $title = 'Set Your Financial Goals';
} else {
    $title = 'Set Your Financial Goals With MyMI Wallet';
}

if (empty($cuID)) {
    if ($beta === 0) {
        $btnURL = site_url('/Free/register');
    } elseif ($beta === 1) {
        $btnURL = site_url('/Beta/register');
    } else {
        $btnURL = site_url('/Free/register');
    }
    $btnText = 'Create Free Account';
} else {
    $btnURL  = site_url('/Dashboard');
    $btnText = 'Go To Dashboard';
}

$totalActiveUsers    = $reporting['totalActiveUsers'] ?? 0;
$totalWalletsCreated = $reporting['totalWalletsCreated'] ?? 0;
$totalTradesTracked  = $reporting['totalTradesTracked'] ?? 0;

?>

<style <?= $nonce['style'] ?? '' ?>>
.intro-banner {
    background: url(<?= base_url('assets/images/MyMI-Walllet-Background.jpeg'); ?>) no-repeat center center fixed;
    background-size: cover;
}

.intro-banner .version {
    background-color: #3E61BC;
}

.list-checked > li {
    color: #364A63;
    font-size: 1.05rem;
}

.list-blue-header {
    color: #3E61BC;
    margin-left: 25px;
}
</style>


<div class="intro-banner pb-3 bg-dark">

    <div class="container pt-4">

        <div class="row justify-content-center">

            <div class="col-lg-7">

                <div class="intro-banner-inner text-center">

                    <span class="overline-title">MyMI Wallet</span>

                    <h1 class="title text-white">
                        Setting Financial Goals
                    </h1>

                    <h3 class="text-white pb-3">
                        Define Your Financial Future
                    </h3>

                    <p class="text-light">
                        Establishing financial goals is one of the most important steps toward achieving long-term
                        financial stability. Whether you want to eliminate debt, build investment portfolios,
                        or prepare for retirement, defining clear financial objectives creates the roadmap
                        for success.
                    </p>

                    <div class="ratio ratio-16x9 mb-4">

                        <iframe
                            src="<?= esc($socialMedia->promotional_yt_video ?? '') ?>"
                            title="MyMI Wallet Overview"
                            allowfullscreen>
                        </iframe>

                    </div>

                    <a class="btn btn-lg btn-primary" href="<?= $btnURL ?>">
                        <?= esc($btnText) ?>
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>


<div class="intro-section bg-white pt-5">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-8 text-center">

                <span class="overline-title intro-section-subtitle">
                    Financial Planning
                </span>

                <h3 class="intro-heading-lead">
                    How To Determine Your Financial Goals
                </h3>

                <p class="dark-text">
                    Your financial goals provide direction for your budgeting,
                    investment decisions, and long-term planning strategy.
                    By clearly defining what you want to achieve financially,
                    you can build a structured plan to reach those milestones.
                </p>

            </div>

        </div>


        <div class="row justify-content-center pt-5 text-left">

            <div class="col-lg-8">

                <h4 class="subtitle">
                    <strong>1. Evaluate Your Current Financial Situation</strong>
                </h4>

                <ul class="list list-sm list-checked">

                    <li>
                        <strong class="list-blue-header">Analyze Income & Expenses:</strong>
                        Review your monthly income and all recurring expenses.
                        Understanding your cash flow is essential for determining
                        how much you can realistically save or invest.
                    </li>

                    <li>
                        <strong class="list-blue-header">Assess Debt Obligations:</strong>
                        Evaluate existing debts such as credit cards, loans,
                        or mortgages and prioritize strategies to manage or
                        eliminate them.
                    </li>

                </ul>

            </div>

        </div>



        <div class="row justify-content-center pt-5 text-left">

            <div class="col-lg-8">

                <h4 class="subtitle">
                    <strong>2. Identify Short-Term and Long-Term Goals</strong>
                </h4>

                <ul class="list list-sm list-checked">

                    <li>
                        <strong class="list-blue-header">Short-Term Goals:</strong>
                        Saving for an emergency fund, paying off credit cards,
                        or preparing for major purchases.
                    </li>

                    <li>
                        <strong class="list-blue-header">Mid-Term Goals:</strong>
                        Saving for a home, launching a business, or building
                        a diversified investment portfolio.
                    </li>

                    <li>
                        <strong class="list-blue-header">Long-Term Goals:</strong>
                        Retirement planning, financial independence,
                        and long-term wealth generation.
                    </li>

                </ul>

            </div>

        </div>



        <div class="row justify-content-center pt-5 text-left">

            <div class="col-lg-8">

                <h4 class="subtitle">
                    <strong>3. Define Measurable Targets</strong>
                </h4>

                <ul class="list list-sm list-checked">

                    <li>
                        <strong class="list-blue-header">Set Specific Goals:</strong>
                        Instead of “save money”, define measurable targets
                        such as “save $10,000 in 24 months”.
                    </li>

                    <li>
                        <strong class="list-blue-header">Track Progress:</strong>
                        Use the budgeting and forecasting tools inside
                        MyMI Wallet to monitor your progress and
                        adjust your financial strategy when necessary.
                    </li>

                </ul>

            </div>

        </div>



        <div class="row justify-content-center pt-5 text-left">

            <div class="col-lg-8">

                <h4 class="subtitle">
                    <strong>4. Build Your Financial Strategy</strong>
                </h4>

                <ul class="list list-sm list-checked">

                    <li>
                        <strong class="list-blue-header">Budgeting:</strong>
                        Use the MyMI Budget system to allocate income,
                        manage expenses, and forecast your financial future.
                    </li>

                    <li>
                        <strong class="list-blue-header">Investing:</strong>
                        Diversify investments across stocks, ETFs,
                        and digital assets while maintaining
                        appropriate risk management.
                    </li>

                    <li>
                        <strong class="list-blue-header">Automation:</strong>
                        Automate savings and investment contributions
                        so you consistently move toward your
                        long-term financial objectives.
                    </li>

                </ul>

            </div>

        </div>



        <div class="row justify-content-center pt-5 pb-5 text-center">

            <div class="col-lg-8">

                <h4 class="mb-3">
                    Start Planning Today
                </h4>

                <p class="dark-text">
                    MyMI Wallet provides powerful budgeting,
                    forecasting, and investment analytics tools
                    designed to help you achieve your financial
                    goals faster and more efficiently.
                </p>

                <a href="<?= $btnURL ?>" class="btn btn-lg btn-primary">
                    <?= esc($btnText) ?>
                </a>

            </div>

        </div>

    </div>

</div>