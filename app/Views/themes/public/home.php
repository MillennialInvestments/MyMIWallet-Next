<?php
/**
 * MyMI public homepage.
 * Copy is managed in Content/editorial/public.home.json; layout remains in this view.
 */
helper('mymi_editorial');

$copy = static fn (string $key, string $fallback): string =>
    mymi_editorial_text('public.home', $key, $fallback);

$homeUserId = (int) ($cuID ?? 0);
$homeBeta = (int) ($beta ?? 0);
$primaryUrl = $homeUserId > 0
    ? site_url('Dashboard')
    : site_url($homeBeta === 0 ? 'Free/register' : 'Beta/register');
$primaryLabel = $homeUserId > 0
    ? 'Open your dashboard'
    : $copy('hero.primary_cta', 'Create your account');

$features = [
    [
        'number' => '01',
        'title' => $copy('feature.budget.title', 'Make your budget work for you'),
        'description' => $copy('feature.budget.description', 'Organize income, expenses, and priorities so you can plan for what matters.'),
    ],
    [
        'number' => '02',
        'title' => $copy('feature.investments.title', 'Keep investments in perspective'),
        'description' => $copy('feature.investments.description', 'Review the investments you are tracking alongside your broader financial picture.'),
    ],
    [
        'number' => '03',
        'title' => $copy('feature.goals.title', 'Give your goals a direction'),
        'description' => $copy('feature.goals.description', 'Turn the next milestone into a plan you can review and refine.'),
    ],
    [
        'number' => '04',
        'title' => $copy('feature.insights.title', 'Stay informed, not overwhelmed'),
        'description' => $copy('feature.insights.description', 'Explore market news and financial insights with context for your decisions.'),
    ],
];

$steps = [
    [
        'number' => '01',
        'title' => $copy('step.one.title', 'Create your space'),
        'description' => $copy('step.one.description', 'Start with an account and explore the financial workspace.'),
    ],
    [
        'number' => '02',
        'title' => $copy('step.two.title', 'Organize your picture'),
        'description' => $copy('step.two.description', 'Add the information you want to track using available account and portfolio tools.'),
    ],
    [
        'number' => '03',
        'title' => $copy('step.three.title', 'Review what matters'),
        'description' => $copy('step.three.description', 'Use budgets, goals, and investment views to spot priorities and make a plan.'),
    ],
];

$questions = [
    [
        'question' => $copy('faq.one.question', 'What is MyMI Wallet?'),
        'answer' => $copy('faq.one.answer', 'A personal finance workspace centered on budgeting, financial goals, investment tracking, and financial information.'),
    ],
    [
        'question' => $copy('faq.two.question', 'Can I use MyMI Wallet to make investment decisions?'),
        'answer' => $copy('faq.two.answer', 'The platform is designed to help organize and review information, not guarantee returns or replace personalized advice from a qualified professional.'),
    ],
    [
        'question' => $copy('faq.three.question', 'How do I get started?'),
        'answer' => $copy('faq.three.answer', 'Create an account, explore the dashboard, and begin with the financial areas most important to you. Available tools and integrations may vary.'),
    ],
];
?>

<a class="mymi-home__skip" href="#main-content">Skip to main content</a>
<main class="mymi-home" id="main-content">
    <section class="mymi-home__hero" aria-labelledby="mymi-hero-heading">
        <div class="container-xl">
            <div class="mymi-home__hero-grid">
                <div class="mymi-home__hero-copy">
                    <p class="mymi-home__eyebrow"><?= esc($copy('hero.eyebrow', 'ONE PLACE TO SEE THE BIGGER PICTURE')) ?></p>
                    <h1 id="mymi-hero-heading"><?= esc($copy('hero.title', 'Understand your money. Move with confidence.')) ?></h1>
                    <p class="mymi-home__lead"><?= esc($copy('hero.description', 'Bring budgeting, investment tracking, and financial goals into one clearer view.')) ?></p>
                    <div class="mymi-home__actions">
                        <a class="mymi-home__btn mymi-home__btn--primary"
                           href="<?= esc($primaryUrl, 'attr') ?>"><?= esc($primaryLabel) ?><span aria-hidden="true"> →</span></a>
                        <a class="mymi-home__btn mymi-home__btn--secondary"
                           href="<?= esc(site_url('How-It-Works'), 'attr') ?>"><?= esc($copy('hero.secondary_cta', 'See how it works')) ?></a>
                    </div>
                    <p class="mymi-home__hero-note"><?= esc($copy('hero.note', 'Build a clearer financial picture, one decision at a time.')) ?></p>
                </div>

                <div class="mymi-home__preview" aria-label="Illustrative financial overview, not live account data">
                    <div class="mymi-home__preview-head">
                        <span class="mymi-home__preview-brand">MyMI <strong>Overview</strong></span>
                        <span class="mymi-home__preview-tag">Illustrative preview</span>
                    </div>
                    <div class="mymi-home__preview-lead">
                        <span>YOUR FINANCIAL PICTURE</span>
                        <strong>More context, less noise.</strong>
                        <p>Explore how the pieces of your financial life fit together.</p>
                    </div>
                    <div class="mymi-home__preview-grid">
                        <div class="mymi-home__preview-tile">
                            <span class="mymi-home__preview-icon" aria-hidden="true">◎</span>
                            <strong>Budget</strong><small>Know your priorities</small>
                            <div class="mymi-home__preview-bars" aria-hidden="true"><i></i><i></i><i></i></div>
                        </div>
                        <div class="mymi-home__preview-tile">
                            <span class="mymi-home__preview-icon" aria-hidden="true">◈</span>
                            <strong>Investments</strong><small>See what you're tracking</small>
                            <div class="mymi-home__preview-line" aria-hidden="true"></div>
                        </div>
                        <div class="mymi-home__preview-tile mymi-home__preview-tile--wide">
                            <span class="mymi-home__preview-icon" aria-hidden="true">✦</span>
                            <div><strong>Goals</strong><small>Give the next milestone a direction</small></div>
                            <span class="mymi-home__preview-status">Plan ahead</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mymi-home__hero-bottom" aria-label="Financial areas">
                <span>PERSONAL FINANCES</span><span>BUDGETS</span><span>INVESTMENTS</span><span>FINANCIAL GOALS</span>
            </div>
        </div>
    </section>

    <section class="mymi-home__section mymi-home__section--light" id="features" aria-labelledby="mymi-features-title">
        <div class="container-xl">
            <div class="mymi-home__section-heading">
                <p class="mymi-home__eyebrow"><?= esc($copy('features.eyebrow', 'WHY MYMI WALLET')) ?></p>
                <h2 id="mymi-features-title"><?= esc($copy('features.title', 'Less financial guesswork. More perspective.')) ?></h2>
                <p><?= esc($copy('features.description', 'Your goals, budget, and investments are connected. Your tools should help you see them together.')) ?></p>
            </div>
            <div class="mymi-home__features">
                <?php foreach ($features as $feature): ?>
                <article class="mymi-home__feature-card">
                    <span class="mymi-home__feature-number"><?= esc($feature['number']) ?></span>
                    <h3><?= esc($feature['title']) ?></h3>
                    <p><?= esc($feature['description']) ?></p>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="mymi-home__section mymi-home__section--steps" id="how-it-works" aria-labelledby="mymi-steps-title">
        <div class="container-xl">
            <div class="mymi-home__section-heading">
                <p class="mymi-home__eyebrow"><?= esc($copy('steps.eyebrow', 'HOW IT WORKS')) ?></p>
                <h2 id="mymi-steps-title"><?= esc($copy('steps.title', 'Start with clarity. Build from there.')) ?></h2>
            </div>
            <div class="mymi-home__steps">
                <?php foreach ($steps as $step): ?>
                <article class="mymi-home__step">
                    <span class="mymi-home__step-number"><?= esc($step['number']) ?></span>
                    <h3><?= esc($step['title']) ?></h3>
                    <p><?= esc($step['description']) ?></p>
                </article>
                <?php endforeach; ?>
            </div>
            <div class="mymi-home__section-action">
                <a href="<?= esc(site_url('How-It-Works'), 'attr') ?>" class="mymi-home__text-link">Explore how MyMI works <span aria-hidden="true">→</span></a>
            </div>
        </div>
    </section>

    <section class="mymi-home__section mymi-home__section--trust" aria-labelledby="mymi-trust-title">
        <div class="container-xl">
            <div class="mymi-home__trust-layout">
                <div>
                    <p class="mymi-home__eyebrow"><?= esc($copy('trust.eyebrow', 'BUILT AROUND YOUR DECISIONS')) ?></p>
                    <h2 id="mymi-trust-title"><?= esc($copy('trust.title', 'Tools to understand your options. Not promises about outcomes.')) ?></h2>
                </div>
                <div>
                    <p><?= esc($copy('trust.description', 'MyMI Wallet focuses on financial organization and information. Feature availability varies; market data and investments involve risk, and information on the platform is not personalized investment advice.')) ?></p>
                    <a href="<?= esc(site_url('Privacy-Policy'), 'attr') ?>">Read our privacy policy <span aria-hidden="true">→</span></a>
                </div>
            </div>
        </div>
    </section>

    <section class="mymi-home__section mymi-home__section--faq" aria-labelledby="mymi-faq-title">
        <div class="container-xl">
            <div class="mymi-home__section-heading">
                <p class="mymi-home__eyebrow">COMMON QUESTIONS</p>
                <h2 id="mymi-faq-title"><?= esc($copy('faq.title', 'A few things worth knowing')) ?></h2>
            </div>
            <div class="mymi-home__faq">
                <?php foreach ($questions as $entry): ?>
                <details>
                    <summary><?= esc($entry['question']) ?><span aria-hidden="true">+</span></summary>
                    <p><?= esc($entry['answer']) ?></p>
                </details>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="mymi-home__closing" aria-labelledby="mymi-closing-title">
        <div class="container-xl">
            <div class="mymi-home__closing-inner">
                <div>
                    <h2 id="mymi-closing-title"><?= esc($copy('closing.title', 'Your next financial decision starts with a clearer view.')) ?></h2>
                    <p><?= esc($copy('closing.description', 'Put your budget, goals, and investment picture into context with MyMI Wallet.')) ?></p>
                </div>
                <a class="mymi-home__btn mymi-home__btn--closing" href="<?= esc($primaryUrl, 'attr') ?>">
                    <?= esc($homeUserId > 0 ? 'Open your dashboard' : $copy('closing.cta', 'Get started with MyMI Wallet')) ?> <span aria-hidden="true">→</span>
                </a>
            </div>
        </div>
    </section>
</main>
