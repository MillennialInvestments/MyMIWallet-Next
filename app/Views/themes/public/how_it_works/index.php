<?php
/**
 * MyMI Wallet — How It Works: The Complete Financial Lifecycle Guide
 */
$nonceAttr = isset($nonce['style']) && !empty($nonce['style']) ? $nonce['style'] : '';

$stages = [
    [
        'stage'       => '01',
        'badge'       => 'STAGE 1: DAY 1 – 30',
        'title'       => 'Foundation & Financial Clarity',
        'subtitle'    => 'Get out of the dark. See every dollar, balance, and bill in one unified command center.',
        'icon'        => 'ni-wallet',
        'color'       => '#2c5282',
        'accent'      => '#ebf8ff',
        'starting'    => 'Scattered accounts across multiple banking apps, surprise recurring subscriptions, unclear monthly discretionary surplus, and uncertainty about where money actually goes each paycheck.',
        'unlocked'    => [
            'Personal Budgeting Engine' => 'Categorize income and expenses automatically or manually with 50/30/20 lifestyle guidance.',
            'Cash-Flow Horizon'         => 'Anticipate bill payment dates and payroll deposits so you never trigger overdraft or late fees.',
            'Institute Aggregator'      => 'Consolidate checking, savings, credit cards, and cash reserves in a single real-time view.',
            'Initial Safety Net Tracker'=> 'Establish and monitor your first $1,000 emergency liquid savings buffer.',
        ],
        'outcome'     => 'Complete transparency over your net monthly cash flow and an immediate buffer against unplanned expenses.',
        'link_label'  => 'Deep dive into Personal Budgeting',
        'link_url'    => site_url('How-It-Works/Personal-Budgeting'),
    ],
    [
        'stage'       => '02',
        'badge'       => 'STAGE 2: MONTHS 2 – 6',
        'title'       => 'Momentum & Capital Protection',
        'subtitle'    => 'Eliminate toxic debt, build targeted reserves, and set smart guardrails that protect your progress.',
        'icon'        => 'ni-shield-check',
        'color'       => '#276749',
        'accent'      => '#f0fff4',
        'starting'    => 'Cash flow is positive, but high-interest credit card debt, student loans, or unstructured savings targets threaten to derail long-term stability.',
        'unlocked'    => [
            'Goal Setting & Milestone Engines' => 'Define targeted financial goals (debt payoff, emergency fund, vacation, home down payment) with automated target-date calculators.',
            'Financial Forecasting Engine'    => 'Run 30/60/90-day scenarios to see how minor expense reductions or windfalls accelerate debt freedom.',
            'Proactive Alerts & Triggers'     => 'Receive real-time notifications when category budgets near their limits or important bills are due.',
            'Debt Avalanche / Snowball Logic' => 'Map out high-impact payoff schedules to save hundreds in recurring interest fees.',
        ],
        'outcome'     => 'Zero high-interest consumer debt, a fully funded 3-to-6 month emergency reserve, and locked-in savings habits.',
        'link_label'  => 'Explore Goals & Forecasting',
        'link_url'    => site_url('How-It-Works/Setting-Financial-Goals'),
    ],
    [
        'stage'       => '03',
        'badge'       => 'STAGE 3: MONTHS 6 – 12',
        'title'       => 'Wealth Building & Multi-Asset Tracking',
        'subtitle'    => 'Put surplus capital to work. Track stocks, ETFs, crypto, and market signals with institutional precision.',
        'icon'        => 'ni-growth',
        'color'       => '#2b6cb0',
        'accent'      => '#ebf8ff',
        'starting'    => 'Consistent monthly surplus capital is piling up in low-yield cash accounts; you are ready to invest but need a single dashboard to track risk, returns, and allocations.',
        'unlocked'    => [
            'Unified Investment Dashboard' => 'Track your complete investment universe—equities, index funds, ETFs, crypto, and alternatives—with live portfolio valuation.',
            'Trade Tracker & Audit Journal' => 'Log Stock, Crypto, Bond, and Options trades with precise cost-basis calculations, stop-loss tracking, and win/loss analytics.',
            'Curated Market News & Feeds'   => 'Live financial news, corporate earnings calendars, and FRED economic indicators deliver macro context without the noise.',
            'Dynamic Watchlists'           => 'Monitor candidate tickers with custom price triggers and technical notes before deploying capital.',
        ],
        'outcome'     => 'A compounding, diversified investment portfolio with complete visibility into risk, performance, and asset distribution.',
        'link_label'  => 'Explore Investment Management',
        'link_url'    => site_url('How-It-Works/Investment-Portfolio-Management'),
    ],
    [
        'stage'       => '04',
        'badge'       => 'STAGE 4: YEAR 1 & BEYOND',
        'title'       => 'Acceleration, Web3 & Ecosystem Expansion',
        'subtitle'    => 'Decentralized liquidity, tokenized assets, predictive insights, and complete financial autonomy.',
        'icon'        => 'ni-curve-down-right',
        'color'       => '#6b46c1',
        'accent'      => '#faf5ff',
        'starting'    => 'Mature portfolio management, seeking yield optimization, decentralized finance integration, tokenized asset diversification, and algorithmic decision support.',
        'unlocked'    => [
            'MyMI Crypto & Solana Pay/Swap' => 'Swap digital assets instantly with micro-cent Solana transaction fees, verifiable fee receipts, and secure self-custody support.',
            'MyMI Gold Utility & Rewards'   => 'Unlock premium tier capabilities, community staking rewards, and priority ecosystem feature access with MyMI Gold.',
            'Predictive Financial Insights' => 'AI-assisted portfolio health checks surface allocation drifts, rebalancing opportunities, and tax efficiency insights.',
            'Project Hub & Asset Backing'   => 'Discover and participate in tokenized real-world asset ventures, auctions, and community projects.',
        ],
        'outcome'     => 'True full-stack financial sovereignty spanning traditional assets, digital economies, and high-velocity Web3 applications.',
        'link_label'  => 'Discover MyMI Gold & Web3',
        'link_url'    => site_url('How-It-Works/MyMI-Gold'),
    ],
];

$featureCards = [
    [
        'title'       => 'Personal Budgeting',
        'tag'         => 'Foundation',
        'description' => 'Build realistic budgets, monitor fixed vs. discretionary spending, and eliminate cash leaks with intuitive categorizations.',
        'url'         => site_url('How-It-Works/Personal-Budgeting'),
        'icon'        => 'ni-calc',
    ],
    [
        'title'       => 'Investment Tracking',
        'tag'         => 'Growth',
        'description' => 'Unify equities, ETFs, crypto, and options into a consolidated portfolio view with historical performance metrics.',
        'url'         => site_url('How-It-Works/Investment-Portfolio-Management'),
        'icon'        => 'ni-invest',
    ],
    [
        'title'       => 'Daily Market Intelligence',
        'tag'         => 'Awareness',
        'description' => 'Actionable financial news, corporate earnings dates, macroeconomic data, and sentiment tracking updated around the clock.',
        'url'         => site_url('How-It-Works/Daily-Financial-News'),
        'icon'        => 'ni-bulb',
    ],
    [
        'title'       => 'Goal Setting & Milestones',
        'tag'         => 'Direction',
        'description' => 'Transform vague ambitions into mathematically projected milestones with customizable timelines and progress meters.',
        'url'         => site_url('How-It-Works/Setting-Financial-Goals'),
        'icon'        => 'ni-flag',
    ],
    [
        'title'       => 'Smart Alerts & Guardrails',
        'tag'         => 'Protection',
        'description' => 'Stay informed with custom threshold notifications for budget ceilings, market swings, and upcoming payment deadlines.',
        'url'         => site_url('How-It-Works/alerts'),
        'icon'        => 'ni-bell',
    ],
    [
        'title'       => 'Web3 & MyMI Gold',
        'tag'         => 'Acceleration',
        'description' => 'Connect digital wallets, execute lightning-fast Solana swaps, and unlock tier privileges across the MyMI ecosystem.',
        'url'         => site_url('How-It-Works/MyMI-Gold'),
        'icon'        => 'ni-coins',
    ],
];

$faqs = [
    [
        'q' => 'Where should I start if my finances feel disorganized or overwhelmed?',
        'a' => 'Start in Stage 1: Personal Budgeting. You do not need to link every single investment or delve into crypto on day one. Simply enter your primary income sources and fixed monthly expenses (rent, utilities, loans). MyMI will instantly calculate your true disposable cash flow, showing you where you stand and what is safe to save or invest.',
    ],
    [
        'q' => 'Do I have to invest in crypto to use MyMI Wallet?',
        'a' => 'Not at all. MyMI Wallet is built as a complete, modular financial ecosystem. Thousands of members use MyMI solely for personal budgeting, stock portfolio tracking, debt elimination, and market news. The Web3 and Solana exchange features remain ready whenever you decide to explore digital assets.',
    ],
    [
        'q' => 'How does MyMI Wallet protect my personal and financial information?',
        'a' => 'Security is our foundational architecture. All session and data transmissions use bank-grade TLS encryption, strict CSP policies, Shield RBAC role authorization, and tenant data isolation. We never sell customer records, and decentralized Web3 interactions utilize non-custodial or cryptographically signed audit chains.',
    ],
    [
        'q' => 'What is the difference between the Free tier and Premium membership?',
        'a' => 'The Free tier gives you full access to personal budgeting, manual wallet logs, trade tracking, basic market news, and community tools. Upgrading to Premium or using MyMI Gold unlocks advanced Solana asset swaps, automated portfolio alerts, AI-driven predictive forecasting, deep historical analytics, and priority member channels.',
    ],
];
?>

<style <?= $nonceAttr ?>>
.hiw-hero {
    background: radial-gradient(ellipse at 80% 20%, rgba(56, 207, 194, 0.15), transparent 45%),
                linear-gradient(135deg, #061540 0%, #0d2157 55%, #08163b 100%);
    color: #ffffff;
    padding: clamp(5rem, 8vw, 7.5rem) 0 4rem;
    position: relative;
    overflow: hidden;
}
.hiw-hero h1 {
    font-size: clamp(2.2rem, 4.2vw, 3.6rem);
    font-weight: 800;
    line-height: 1.15;
    letter-spacing: -0.03em;
    color: #ffffff;
}
.hiw-hero .lead {
    font-size: clamp(1.05rem, 1.4vw, 1.25rem);
    color: #d5e4ff;
    line-height: 1.7;
    max-width: 44rem;
}
.hiw-pill {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.35rem 0.85rem;
    border-radius: 100px;
    font-size: 0.78rem;
    font-weight: 700;
    letter-spacing: 0.08em;
    text-transform: uppercase;
    background: rgba(56, 207, 194, 0.15);
    color: #38cfc2;
    border: 1px solid rgba(56, 207, 194, 0.35);
}
.hiw-stage-card {
    border-radius: 18px;
    border: 1px solid #e2e8f0;
    background: #ffffff;
    box-shadow: 0 10px 30px rgba(0, 7, 34, 0.04);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    overflow: hidden;
}
.hiw-stage-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 16px 40px rgba(0, 7, 34, 0.08);
}
.hiw-stage-badge {
    font-size: 0.72rem;
    font-weight: 800;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    padding: 0.35rem 0.75rem;
    border-radius: 8px;
    display: inline-block;
}
.hiw-stage-num {
    font-size: 3.5rem;
    font-weight: 900;
    line-height: 1;
    opacity: 0.12;
    position: absolute;
    right: 1.5rem;
    top: 1.2rem;
    user-select: none;
}
.hiw-check-list {
    list-style: none;
    padding-left: 0;
    margin-bottom: 0;
}
.hiw-check-list li {
    position: relative;
    padding-left: 1.75rem;
    margin-bottom: 0.75rem;
    font-size: 0.925rem;
    color: #475569;
    line-height: 1.55;
}
.hiw-check-list li::before {
    content: "✓";
    position: absolute;
    left: 0;
    top: 0;
    color: #10b981;
    font-weight: 900;
}
.hiw-outcome-box {
    background: #f8fafc;
    border-left: 4px solid #38cfc2;
    border-radius: 0 12px 12px 0;
    padding: 1rem 1.25rem;
    margin-top: 1.25rem;
}
.hiw-outcome-box strong {
    color: #0f172a;
    font-size: 0.85rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    display: block;
    margin-bottom: 0.25rem;
}
.hiw-feature-tile {
    border-radius: 16px;
    border: 1px solid #e6edf9;
    background: #ffffff;
    padding: 1.75rem;
    height: 100%;
    transition: transform 0.2s ease, border-color 0.2s ease;
    display: flex;
    flex-direction: column;
}
.hiw-feature-tile:hover {
    transform: translateY(-4px);
    border-color: #38cfc2;
    box-shadow: 0 12px 30px rgba(18, 37, 76, 0.06);
}
.hiw-feature-icon {
    width: 48px;
    height: 48px;
    border-radius: 12px;
    background: rgba(56, 107, 250, 0.1);
    color: #366bfa;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 1.4rem;
    margin-bottom: 1.25rem;
}
.hiw-comparison-table {
    border-radius: 16px;
    overflow: hidden;
    border: 1px solid #e2e8f0;
    background: #ffffff;
}
.hiw-comparison-table th {
    background: #061540;
    color: #ffffff;
    font-weight: 700;
    padding: 1rem 1.25rem;
    border: none;
}
.hiw-comparison-table td {
    padding: 1rem 1.25rem;
    border-bottom: 1px solid #f1f5f9;
    color: #334155;
    vertical-align: middle;
}
</style>

<!-- Hero Section -->
<section class="hiw-hero">
    <div class="container container-xl">
        <div class="row align-items-center g-5">
            <div class="col-lg-8">
                <div class="mb-3">
                    <span class="hiw-pill"><em class="icon ni ni-spark"></em> Standard Financial Lifecycle</span>
                </div>
                <h1 class="mb-3">From Day-One Budgeting to Multi-Asset Wealth</h1>
                <p class="lead mb-4">
                    Most people don’t start out with an institutional trading desk—they start with a paycheck, monthly bills, and a desire to build real stability. MyMI Wallet is architected around your natural financial progression: master your foundation first, build automated savings momentum, invest with clarity, and scale into Web3 wealth.
                </p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="<?= site_url('register') ?>" class="btn btn-primary btn-lg px-4 text-white">
                        <span>Get Started Free</span> <em class="icon ni ni-arrow-right ms-2"></em>
                    </a>
                    <a href="#lifecycle-path" class="btn btn-outline-light btn-lg px-4">
                        <span>Explore the 4 Growth Stages</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 d-none d-lg-block">
                <div class="p-4 rounded-4" style="background: rgba(255, 255, 255, 0.07); border: 1px solid rgba(255, 255, 255, 0.16); backdrop-filter: blur(8px);">
                    <div class="d-flex align-items-center gap-3 mb-4 pb-3" style="border-bottom: 1px solid rgba(255, 255, 255, 0.15);">
                        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center shadow-sm" style="width: 44px; height: 44px; flex-shrink: 0;">
                            <em class="icon ni ni-check" style="font-size: 1.25rem;"></em>
                        </div>
                        <div>
                            <div class="text-white fw-bold fs-6 mb-0">Step-by-Step Unlocks</div>
                            <div class="text-white-50 small">Grow as your net worth grows</div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between text-white-50 small mb-1">
                            <span>Stage 1: Foundation</span>
                            <span>Day 1–30</span>
                        </div>
                        <div class="progress" style="height: 6px; background: rgba(255,255,255,0.15);"><div class="progress-bar bg-info" style="width: 25%"></div></div>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between text-white-50 small mb-1">
                            <span>Stage 2: Momentum</span>
                            <span>Mo 2–6</span>
                        </div>
                        <div class="progress" style="height: 6px; background: rgba(255,255,255,0.15);"><div class="progress-bar bg-success" style="width: 50%"></div></div>
                    </div>
                    <div class="mb-3">
                        <div class="d-flex justify-content-between text-white-50 small mb-1">
                            <span>Stage 3: Wealth Building</span>
                            <span>Mo 6–12</span>
                        </div>
                        <div class="progress" style="height: 6px; background: rgba(255,255,255,0.15);"><div class="progress-bar bg-primary" style="width: 75%"></div></div>
                    </div>
                    <div class="mb-1">
                        <div class="d-flex justify-content-between text-white-50 small mb-1">
                            <span>Stage 4: Web3 &amp; Sovereignty</span>
                            <span>Yr 1+</span>
                        </div>
                        <div class="progress" style="height: 6px; background: rgba(255,255,255,0.15);"><div class="progress-bar bg-warning" style="width: 100%"></div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Lifecycle Path Section -->
<section class="py-5 bg-white" id="lifecycle-path">
    <div class="container container-xl py-4">
        <div class="text-center max-w-700 mx-auto mb-5">
            <span class="text-primary text-uppercase fw-bold letter-spacing-1 small">The Standard Growth Path</span>
            <h2 class="display-6 fw-bold mt-1 mb-3">How Most People Grow in MyMI Wallet</h2>
            <p class="text-muted">
                Financial independence isn't an overnight switch—it is a series of earned stages. Here is the exact path followed by successful members, the obstacles conquered at each phase, and what MyMI unlocks for you along the way.
            </p>
        </div>

        <div class="row g-4">
            <?php foreach ($stages as $idx => $st): ?>
                <div class="col-lg-6">
                    <div class="hiw-stage-card p-4 p-md-5 h-100 position-relative d-flex flex-column">
                        <div class="hiw-stage-num"><?= esc($st['stage']) ?></div>
                        
                        <div class="mb-3">
                            <span class="hiw-stage-badge" style="background-color: <?= esc($st['accent']) ?>; color: <?= esc($st['color']) ?>;">
                                <?= esc($st['badge']) ?>
                            </span>
                        </div>

                        <h3 class="h4 fw-bold text-dark mb-2"><?= esc($st['title']) ?></h3>
                        <p class="text-muted small mb-4"><?= esc($st['subtitle']) ?></p>

                        <div class="p-3 rounded-3 mb-4" style="background-color: #f8fafc; border: 1px dashed #cbd5e1;">
                            <div class="fw-bold text-danger small text-uppercase mb-1"><em class="icon ni ni-alert-circle me-1"></em> The Common Obstacle:</div>
                            <div class="small text-muted"><?= esc($st['starting']) ?></div>
                        </div>

                        <div class="mb-4 flex-grow-1">
                            <div class="fw-bold text-dark small text-uppercase letter-spacing-1 mb-2">What MyMI Unlocks:</div>
                            <ul class="hiw-check-list">
                                <?php foreach ($st['unlocked'] as $feature => $detail): ?>
                                    <li>
                                        <strong class="text-dark"><?= esc($feature) ?>:</strong> <?= esc($detail) ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                        <div class="hiw-outcome-box">
                            <strong><em class="icon ni ni-trophy me-1"></em> Stage Milestone Earned:</strong>
                            <div class="small text-dark"><?= esc($st['outcome']) ?></div>
                        </div>

                        <div class="mt-4 pt-3 border-top d-flex justify-content-between align-items-center">
                            <a href="<?= esc($st['link_url']) ?>" class="fw-bold text-primary small text-decoration-none">
                                <?= esc($st['link_label']) ?> →
                            </a>
                            <span class="badge bg-light text-muted fw-normal">Phase <?= esc($st['stage']) ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Feature Deep-Dive Cards -->
<section class="py-5" style="background-color: #f8fafc; border-top: 1px solid #e2e8f0; border-bottom: 1px solid #e2e8f0;">
    <div class="container container-xl py-4">
        <div class="row align-items-end mb-5">
            <div class="col-lg-8">
                <span class="text-primary text-uppercase fw-bold letter-spacing-1 small">Integrated Capabilities</span>
                <h2 class="display-6 fw-bold mt-1 mb-2">Explore the MyMI Feature Ecosystem</h2>
                <p class="text-muted mb-0">Every module is connected. Budgeting informs your investment capital, while alerts protect your reserves.</p>
            </div>
            <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                <a href="<?= site_url('register') ?>" class="btn btn-outline-primary">Join MyMI Free</a>
            </div>
        </div>

        <div class="row g-4">
            <?php foreach ($featureCards as $fc): ?>
                <div class="col-md-6 col-lg-4">
                    <a href="<?= esc($fc['url']) ?>" class="text-decoration-none text-dark">
                        <div class="hiw-feature-tile">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="hiw-feature-icon">
                                    <em class="icon ni <?= esc($fc['icon']) ?>"></em>
                                </div>
                                <span class="badge bg-light text-secondary fw-semibold small"><?= esc($fc['tag']) ?></span>
                            </div>
                            <h4 class="h5 fw-bold text-dark mb-2"><?= esc($fc['title']) ?></h4>
                            <p class="text-muted small flex-grow-1"><?= esc($fc['description']) ?></p>
                            <div class="text-primary fw-bold small mt-2 d-flex align-items-center gap-1">
                                <span>Read documentation</span> <em class="icon ni ni-arrow-right"></em>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Tier Unlock Matrix -->
<section class="py-5 bg-white">
    <div class="container container-xl py-4">
        <div class="text-center max-w-700 mx-auto mb-5">
            <span class="text-primary text-uppercase fw-bold letter-spacing-1 small">Transparent Access</span>
            <h2 class="display-6 fw-bold mt-1 mb-3">What Unlocks by Tier</h2>
            <p class="text-muted">Start with zero financial friction. As your needs grow from foundational organization to high-frequency Web3 exchange and predictive AI, unlock advanced capabilities.</p>
        </div>

        <div class="table-responsive">
            <table class="table hiw-comparison-table mb-0">
                <thead>
                    <tr>
                        <th style="width: 40%;">Core Platform Capability</th>
                        <th style="width: 30%;" class="text-center">Free Forever</th>
                        <th style="width: 30%;" class="text-center" style="background: #0d2157;">Premium / Pro (MyMI Gold)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Personal Budgeting Engine</strong> (50/30/20 Categories, Fixed vs Discretionary)</td>
                        <td class="text-center text-success fw-bold">✓ Included</td>
                        <td class="text-center text-success fw-bold">✓ Included</td>
                    </tr>
                    <tr>
                        <td><strong>Cash-Flow Horizon & Bill Alerts</strong></td>
                        <td class="text-center text-success fw-bold">✓ Standard</td>
                        <td class="text-center text-primary fw-bold">✓ Priority Real-time</td>
                    </tr>
                    <tr>
                        <td><strong>Investment Portfolio Logging</strong> (Stocks, ETFs, Crypto, Options)</td>
                        <td class="text-center text-success fw-bold">✓ Manual & Bulk Log</td>
                        <td class="text-center text-primary fw-bold">✓ Automated & Advanced Analytics</td>
                    </tr>
                    <tr>
                        <td><strong>Daily Financial News & Earnings Feed</strong></td>
                        <td class="text-center text-success fw-bold">✓ Daily Digest</td>
                        <td class="text-center text-primary fw-bold">✓ Real-time NewsAPI, FRED & Macro</td>
                    </tr>
                    <tr>
                        <td><strong>Financial Forecasting Engine</strong></td>
                        <td class="text-center text-muted">30-Day Projections</td>
                        <td class="text-center text-primary fw-bold">✓ 90-Day & Multi-Year Scenarios</td>
                    </tr>
                    <tr>
                        <td><strong>Solana Crypto Swap & Web3 Pay</strong></td>
                        <td class="text-center text-muted">Standard Rates</td>
                        <td class="text-center text-primary fw-bold">✓ Reduced Fees & Fee Reclaim</td>
                    </tr>
                    <tr>
                        <td><strong>AI-Assisted Predictive Advisor Insights</strong></td>
                        <td class="text-center text-muted">Community Guides</td>
                        <td class="text-center text-primary fw-bold">✓ Automated Portfolio Insights</td>
                    </tr>
                    <tr>
                        <td><strong>Private VIP Discord Channels</strong></td>
                        <td class="text-center text-muted">Public Community</td>
                        <td class="text-center text-primary fw-bold">✓ Exclusive Alpha Channels</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-5" style="background-color: #f8fafc; border-top: 1px solid #e2e8f0;">
    <div class="container container-xl py-4">
        <div class="row g-5">
            <div class="col-lg-4">
                <span class="text-primary text-uppercase fw-bold letter-spacing-1 small">Common Questions</span>
                <h3 class="h3 fw-bold text-dark mt-1 mb-3">Frequently Asked Questions</h3>
                <p class="text-muted mb-4">Have questions about where to begin or how MyMI manages your financial records? Find answers to the most common onboarding questions.</p>
                <a href="<?= site_url('Support') ?>" class="btn btn-outline-primary btn-sm">Visit Customer Support</a>
            </div>
            <div class="col-lg-8">
                <div class="accordion" id="hiwFaqAccordion">
                    <?php foreach ($faqs as $i => $faq): ?>
                        <div class="accordion-item border-0 mb-3 rounded-3 shadow-sm overflow-hidden">
                            <h2 class="accordion-header" id="heading<?= $i ?>">
                                <button class="accordion-button <?= $i === 0 ? '' : 'collapsed' ?> fw-bold text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $i ?>" aria-expanded="<?= $i === 0 ? 'true' : 'false' ?>" aria-controls="collapse<?= $i ?>">
                                    <?= esc($faq['q']) ?>
                                </button>
                            </h2>
                            <div id="collapse<?= $i ?>" class="accordion-collapse collapse <?= $i === 0 ? 'show' : '' ?>" aria-labelledby="heading<?= $i ?>" data-bs-parent="#hiwFaqAccordion">
                                <div class="accordion-body text-muted small lh-lg">
                                    <?= esc($faq['a']) ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Closing Conversion Banner -->
<section class="py-5" style="background: linear-gradient(135deg, #061540 0%, #0d2157 100%); color: #ffffff;">
    <div class="container container-xl py-4 text-center">
        <span class="hiw-pill mb-3">Start Your Growth Path Today</span>
        <h2 class="display-6 fw-bold text-white mb-3">Ready to Take Control of Your Financial Future?</h2>
        <p class="lead text-white-50 max-w-700 mx-auto mb-4">
            Join thousands of individuals using MyMI Wallet to move from scattered financial confusion to a unified, empowering wealth plan. Free to start, no credit card required.
        </p>
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="<?= site_url('register') ?>" class="btn btn-primary btn-lg px-5 text-white">
                <span>Create Your Free Account</span> <em class="icon ni ni-arrow-right ms-2"></em>
            </a>
            <a href="<?= site_url('Knowledgebase') ?>" class="btn btn-outline-light btn-lg px-4" target="_blank">
                <span>Browse Documentation</span>
            </a>
        </div>
    </div>
</section>
