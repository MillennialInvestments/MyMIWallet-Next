<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\ResponseInterface;

class HowItWorksController extends BaseController
{
    /**
     * Nav items and their paths (converted to full URLs at render time).
     */
    private array $navConfig = [
        ['slug' => 'overview',  'label' => 'Overview',  'path' => 'how-it-works'],
        ['slug' => 'budgeting', 'label' => 'Budgeting', 'path' => 'how-it-works/budgeting'],
        ['slug' => 'investing', 'label' => 'Investing', 'path' => 'how-it-works/investing'],
        ['slug' => 'crypto',    'label' => 'Crypto',    'path' => 'how-it-works/crypto'],
        ['slug' => 'alerts',    'label' => 'Alerts',    'path' => 'how-it-works/alerts'],
        ['slug' => 'projects',  'label' => 'Projects',  'path' => 'how-it-works/projects'],
        ['slug' => 'security',  'label' => 'Security',  'path' => 'how-it-works/security'],
        ['slug' => 'pricing',   'label' => 'Pricing',   'path' => 'how-it-works/pricing'],
    ];

    /**
     * Page copy and structure; URLs are converted to site_url() when rendered.
     */
    private array $pages = [
        'overview' => [
            'view'        => 'index',
            'title'       => 'How MyMI Wallet Works',
            'pageName'    => 'How It Works',
            'description' => 'Budgeting, investing, crypto, and alerts brought together in one public-ready experience.',
            'hero' => [
                'eyebrow'    => 'How it works',
                'title'      => 'How MyMI Wallet Works',
                'subtitle'   => 'Understand the public experience and how every module connects.',
                'highlights' => [
                    'Renders with the public layout (header, nav, footer) for a consistent feel.',
                    'Responsive Bootstrap 4.6 sections with cards, grids, and utilities.',
                    'No authentication needed—safe for guests and search-friendly.',
                ],
                'actions' => [
                    ['label' => 'Register free', 'url' => 'register', 'class' => 'btn-light text-primary'],
                    ['label' => 'View pricing',  'url' => 'Memberships', 'class' => 'btn-outline-light'],
                ],
            ],
            'whatYouGet' => [
                ['icon' => 'fas fa-layer-group', 'title' => 'Unified layout', 'description' => 'Every page is wrapped by the public theme so headers, navigation, and footers stay consistent.'],
                ['icon' => 'fas fa-columns',     'title' => 'Sectioned content', 'description' => 'Hero, value props, steps, audiences, CTAs, and FAQs mirror other public pages.'],
                ['icon' => 'fas fa-globe',       'title' => 'Guest friendly', 'description' => 'No login assumptions—everything renders for anonymous visitors.'],
                ['icon' => 'fas fa-sync',        'title' => 'Reusable partials', 'description' => 'Shared nav, hero, CTA, and FAQ partials keep markup DRY.'],
                ['icon' => 'fas fa-bolt',        'title' => 'Action-first CTAs', 'description' => 'Buttons always point to register, pricing, or dashboards using site_url().'],
                ['icon' => 'fas fa-shield-alt',  'title' => 'Safe defaults', 'description' => 'Metadata is fed through pageName/pageTitle to respect CSP and SEO helpers.'],
            ],
            'howItWorks' => [
                ['icon' => 'fas fa-user-plus', 'title' => 'Create your account', 'description' => 'Sign up or continue as a guest; pages render either way.'],
                ['icon' => 'fas fa-stream',    'title' => 'Browse the flow', 'description' => 'Use the shared How It Works nav to explore each module.'],
                ['icon' => 'fas fa-route',     'title' => 'Follow the steps', 'description' => 'Hero → What you get → How it works → Audience → CTA → FAQ for every page.'],
                ['icon' => 'fas fa-mouse-pointer', 'title' => 'Pick your path', 'description' => 'Jump to Budgeting, Investing, Crypto, Alerts, Projects, Security, or Pricing.'],
                ['icon' => 'fas fa-rocket',    'title' => 'Activate', 'description' => 'Register, view pricing, or open the dashboard when you are ready.'],
            ],
            'audiences' => [
                ['title' => 'New investors', 'description' => 'People exploring budgeting, alerts, and research without needing an account yet.'],
                ['title' => 'Power users',   'description' => 'Investors comparing modules before upgrading to a paid workspace.'],
                ['title' => 'Teams & partners', 'description' => 'Stakeholders who need a consistent public story to share with clients.'],
                ['title' => 'Mobile readers', 'description' => 'Visitors on phones benefit from the Bootstrap 4.6 grid already in place.'],
            ],
            'cta' => [
                'title'       => 'Start with the MyMI overview',
                'description' => 'Create a free account or browse pricing—no credit card required to explore.',
                'actions'     => [
                    ['label' => 'Register now', 'url' => 'register', 'class' => 'btn-light text-primary'],
                    ['label' => 'View pricing', 'url' => 'Memberships', 'class' => 'btn-outline-light'],
                    ['label' => 'Open dashboard', 'url' => 'Dashboard', 'class' => 'btn-outline-light'],
                ],
            ],
            'faqs' => [
                ['question' => 'Do these pages require login?', 'answer' => 'No. They render through the public layout and are safe for anonymous visitors.'],
                ['question' => 'Where do the header and footer come from?', 'answer' => 'The public layout (`themes/public/layouts/index`) injects header, nav, and footer automatically.'],
                ['question' => 'How are meta tags handled?', 'answer' => 'Set pageName/pageTitle; the MetaService and metadata-information view handle SEO defaults.'],
                ['question' => 'How do I keep links consistent?', 'answer' => 'Use site_url() for internal routes and base_url() for assets, following other public pages.'],
                ['question' => 'Can I reuse these partials elsewhere?', 'answer' => 'Yes. The hero, nav, CTA, FAQ, and section partials can be dropped into other public views.'],
            ],
            'sectionTitles' => [
                'benefitsTitle'    => 'What you get across the experience',
                'benefitsSubtitle' => 'Consistent layout, responsive sections, and reusable partials.',
                'stepsTitle'       => 'How the flow works',
                'stepsSubtitle'    => 'A predictable public pattern for every How It Works page.',
                'audiencesTitle'   => 'Who should start here',
                'audiencesSubtitle'=> 'A quick orientation for anyone curious about MyMI Wallet.',
            ],
            'faqIdPrefix' => 'overview',
        ],
        'budgeting' => [
            'title'       => 'Budgeting with MyMI Wallet',
            'pageName'    => 'How It Works — Budgeting',
            'description' => 'Create budgets, track spending, and get proactive alerts when you drift off plan.',
            'hero' => [
                'eyebrow'    => 'Budgeting',
                'title'      => 'Budgeting that adapts to real life',
                'subtitle'   => 'Set goals, categorize spending automatically, and stay ahead of cash flow surprises.',
                'highlights' => [
                    'Set envelopes, guardrails, and monthly targets in minutes.',
                    'Stay informed with alerts when spending patterns shift.',
                    'Review progress with simple, mobile-friendly dashboards.',
                ],
                'actions' => [
                    ['label' => 'Build a budget', 'url' => 'register', 'class' => 'btn-light text-primary'],
                    ['label' => 'See pricing',    'url' => 'Memberships', 'class' => 'btn-outline-light'],
                ],
            ],
            'whatYouGet' => [
                ['icon' => 'fas fa-wallet',    'title' => 'Unified budgets', 'description' => 'Income, expenses, and goals tracked together so you always know the plan.'],
                ['icon' => 'fas fa-chart-line','title' => 'Cashflow views', 'description' => 'Month-over-month trends, burn, and runway for households or solo users.'],
                ['icon' => 'fas fa-bell',      'title' => 'Smart nudges', 'description' => 'Alerts when categories heat up, when bills are due, or when savings fall behind.'],
                ['icon' => 'fas fa-exchange-alt', 'title' => 'Easy imports', 'description' => 'Link accounts or import CSVs to start with clean, categorized data.'],
                ['icon' => 'fas fa-clipboard-check', 'title' => 'Goal tracking', 'description' => 'Define savings targets and monitor how each paycheck moves you forward.'],
                ['icon' => 'fas fa-mobile-alt', 'title' => 'Mobile ready', 'description' => 'Responsive layouts keep budgets readable on any device.' ],
            ],
            'howItWorks' => [
                ['icon' => 'fas fa-bullseye',   'title' => 'Define targets', 'description' => 'Set monthly income, expenses, and savings goals.'],
                ['icon' => 'fas fa-link',       'title' => 'Connect accounts', 'description' => 'Sync banks or upload CSVs to populate categories automatically.'],
                ['icon' => 'fas fa-bell',       'title' => 'Configure alerts', 'description' => 'Set thresholds for categories, recurring bills, and savings pace.'],
                ['icon' => 'fas fa-clipboard-list', 'title' => 'Review weekly', 'description' => 'Use digest views to see what changed and where to adjust.'],
                ['icon' => 'fas fa-sliders-h',  'title' => 'Tune the plan', 'description' => 'Rebalance envelopes and goals as income or priorities shift.'],
            ],
            'audiences' => [
                ['title' => 'New budgeters', 'description' => 'People who want a guided setup with minimal math.'],
                ['title' => 'Side-hustlers', 'description' => 'Track multiple income streams without losing clarity.'],
                ['title' => 'Families', 'description' => 'Shared budgets and alerts that keep everyone aligned.'],
                ['title' => 'Coaches', 'description' => 'Advisors who need a simple, client-friendly budgeting view.'],
            ],
            'faqs' => [
                ['question' => 'Can I start without linking a bank?', 'answer' => 'Yes. You can enter categories manually or import CSVs before connecting accounts.'],
                ['question' => 'Do alerts cost extra?', 'answer' => 'Budget alerts are included; volume and destinations follow your plan limits.'],
                ['question' => 'What if my categories are unique?', 'answer' => 'You can rename, add, or merge categories to match how you spend.'],
                ['question' => 'Can households share one budget?', 'answer' => 'Yes. Budgets are viewable on any device and can be shared via your account settings.'],
                ['question' => 'How do I track sinking funds?', 'answer' => 'Create goals with due dates and fund them over time; progress shows in the dashboard.'],
            ],
            'sectionTitles' => [
                'benefitsTitle'    => 'What you get for budgeting',
                'benefitsSubtitle' => 'Everything you need to plan spending and avoid surprises.',
                'stepsTitle'       => 'How budgeting works',
                'stepsSubtitle'    => 'Five steps to go from setup to weekly confidence.',
                'audiencesTitle'   => 'Who benefits most',
                'audiencesSubtitle'=> 'Built for households, solo founders, and anyone juggling expenses.',
            ],
            'faqIdPrefix' => 'budgeting',
        ],
        'investing' => [
            'title'       => 'Investing with MyMI Wallet',
            'pageName'    => 'How It Works — Investing',
            'description' => 'Track portfolios, measure performance, and set alerts on stocks, ETFs, or custom watchlists.',
            'hero' => [
                'eyebrow'    => 'Investing',
                'title'      => 'Portfolio clarity without extra tabs',
                'subtitle'   => 'Aggregate holdings, monitor risk, and capture opportunities faster.',
                'highlights' => [
                    'One dashboard for equities, funds, and alternative holdings.',
                    'Built-in alerts keep you close to price moves and fundamentals.',
                    'Share insights with collaborators without exposing credentials.',
                ],
                'actions' => [
                    ['label' => 'Track my portfolio', 'url' => 'register', 'class' => 'btn-light text-primary'],
                    ['label' => 'Pricing',            'url' => 'Memberships', 'class' => 'btn-outline-light'],
                ],
            ],
            'whatYouGet' => [
                ['icon' => 'fas fa-chart-pie',  'title' => 'Holdings overview', 'description' => 'See allocation, gain/loss, and diversification in one place.'],
                ['icon' => 'fas fa-bell',       'title' => 'Signal-ready alerts', 'description' => 'Price, volume, and event-driven nudges keep you ahead.'],
                ['icon' => 'fas fa-search-dollar', 'title' => 'Research helpers', 'description' => 'Snapshots of fundamentals, earnings dates, and recent moves.'],
                ['icon' => 'fas fa-clipboard-list', 'title' => 'Watchlists', 'description' => 'Organize tickers by themes and monitor them side-by-side.'],
                ['icon' => 'fas fa-exchange-alt', 'title' => 'Import flexibility', 'description' => 'Add positions manually or sync account data where supported.'],
                ['icon' => 'fas fa-lock',      'title' => 'Permissioned sharing', 'description' => 'Share performance views without exposing brokerage credentials.'],
            ],
            'howItWorks' => [
                ['icon' => 'fas fa-plug',       'title' => 'Connect or import', 'description' => 'Link supported accounts or add holdings manually.'],
                ['icon' => 'fas fa-list-alt',   'title' => 'Organize watchlists', 'description' => 'Group symbols by strategy, sector, or risk profile.'],
                ['icon' => 'fas fa-chart-area', 'title' => 'Analyze exposure', 'description' => 'Review allocation, drawdowns, and trend indicators.'],
                ['icon' => 'fas fa-bell',       'title' => 'Set trading alerts', 'description' => 'Trigger on price levels, volume spikes, or earnings dates.'],
                ['icon' => 'fas fa-people-arrows', 'title' => 'Share updates', 'description' => 'Provide project stakeholders with read-only performance views.'],
            ],
            'audiences' => [
                ['title' => 'Active traders', 'description' => 'Need fast alerts and consolidated watchlists.'],
                ['title' => 'Long-term investors', 'description' => 'Track allocations to stay aligned with long-horizon goals.'],
                ['title' => 'Portfolio coaches', 'description' => 'Share progress with clients while keeping source accounts private.'],
                ['title' => 'Multi-asset holders', 'description' => 'Blend public equities, crypto, and alternatives in one view.'],
            ],
            'faqs' => [
                ['question' => 'Can I track assets manually?', 'answer' => 'Yes. Add tickers and quantities without linking a brokerage account.'],
                ['question' => 'What alert types are supported?', 'answer' => 'Price levels, volume moves, earnings dates, and general market reminders.'],
                ['question' => 'Does this replace my broker?', 'answer' => 'No. MyMI Wallet centralizes data and alerts; you place trades at your broker.'],
                ['question' => 'Can I export performance?', 'answer' => 'Performance data can be exported or shared via read-only dashboards where enabled.'],
                ['question' => 'How often is data refreshed?', 'answer' => 'Refresh frequency follows your plan limits and available integrations for each asset type.'],
            ],
            'sectionTitles' => [
                'benefitsTitle'    => 'What you get for investing',
                'benefitsSubtitle' => 'Clarity, alerts, and research snapshots in one view.',
                'stepsTitle'       => 'How investing works in MyMI',
                'stepsSubtitle'    => 'Connect data, organize watchlists, and react quickly.',
                'audiencesTitle'   => 'Who will love this',
                'audiencesSubtitle'=> 'Useful for traders, planners, and anyone watching multiple markets.',
            ],
            'faqIdPrefix' => 'investing',
        ],
        'crypto' => [
            'title'       => 'Crypto with MyMI Wallet',
            'pageName'    => 'How It Works — Crypto',
            'description' => 'Track wallets, swaps, and token performance with safer guardrails.',
            'hero' => [
                'eyebrow'    => 'Crypto',
                'title'      => 'Crypto tracking with safer rails',
                'subtitle'   => 'Monitor wallets and tokens, pair alerts with on-chain actions, and keep risk visible.',
                'highlights' => [
                    'Keep fiat and crypto side-by-side without extra tabs.',
                    'Use alerts to watch volatility and risk warnings.',
                    'Surface safety cues before you move funds or swap.',
                ],
                'actions' => [
                    ['label' => 'Add my wallet', 'url' => 'register', 'class' => 'btn-light text-primary'],
                    ['label' => 'Explore plans', 'url' => 'Memberships', 'class' => 'btn-outline-light'],
                ],
            ],
            'whatYouGet' => [
                ['icon' => 'fas fa-coins',     'title' => 'Multi-asset view', 'description' => 'See tokens alongside stocks and cash for a full balance picture.'],
                ['icon' => 'fas fa-chart-line','title' => 'Price + volatility', 'description' => 'Track movements, dominance, and relative strength across assets.'],
                ['icon' => 'fas fa-random',    'title' => 'Swap awareness', 'description' => 'Highlight swap considerations and fees before you move funds.'],
                ['icon' => 'fas fa-exclamation-triangle', 'title' => 'Risk cues', 'description' => 'Flag suspicious moves, unusual volume, or delisting signals.'],
                ['icon' => 'fas fa-file-export','title' => 'Exportable history', 'description' => 'Keep records organized for tax prep and audits.'],
                ['icon' => 'fas fa-mobile-alt','title' => 'Responsive design', 'description' => 'Built on the same Bootstrap grid for a clean mobile view.'],
            ],
            'howItWorks' => [
                ['icon' => 'fas fa-wallet',    'title' => 'Add wallets', 'description' => 'Input holdings or connect supported wallets to start tracking.'],
                ['icon' => 'fas fa-database',  'title' => 'Sync valuations', 'description' => 'Keep token prices current with automated refresh where available.'],
                ['icon' => 'fas fa-bell',      'title' => 'Set crypto alerts', 'description' => 'Get notified on price swings, liquidity moves, or news triggers.'],
                ['icon' => 'fas fa-shield-alt','title' => 'Review safety tips', 'description' => 'Use built-in reminders before large transfers or swaps.'],
                ['icon' => 'fas fa-share-alt', 'title' => 'Share read-only views', 'description' => 'Let collaborators see performance without exposing keys.'],
            ],
            'audiences' => [
                ['title' => 'Crypto newcomers', 'description' => 'Keep things simple with alerts and organized holdings.'],
                ['title' => 'Hybrid investors', 'description' => 'Track equities and tokens in one dashboard.'],
                ['title' => 'DeFi testers', 'description' => 'Monitor experimental allocations with guardrails and exports.'],
                ['title' => 'Compliance-minded teams', 'description' => 'Maintain records and visibility for audits or partners.'],
            ],
            'faqs' => [
                ['question' => 'Do I need to connect a wallet?', 'answer' => 'No. You can start with manual holdings and add connections later.'],
                ['question' => 'Are private keys stored?', 'answer' => 'No private keys are stored; the focus is on tracking and visibility.'],
                ['question' => 'Can I mix fiat and crypto views?', 'answer' => 'Yes. Dashboards show crypto, cash, and investments together.'],
                ['question' => 'What alerts are available for crypto?', 'answer' => 'Price levels, volatility moves, and general market reminders are supported.'],
                ['question' => 'How do exports work?', 'answer' => 'You can export activity summaries to assist with tax preparation and reviews.'],
            ],
            'sectionTitles' => [
                'benefitsTitle'    => 'What you get for crypto',
                'benefitsSubtitle' => 'Visibility, alerts, and safety cues for token holders.',
                'stepsTitle'       => 'How crypto tracking works',
                'stepsSubtitle'    => 'Add wallets, keep prices fresh, and stay ahead of risk.',
                'audiencesTitle'   => 'Who it helps',
                'audiencesSubtitle'=> 'For crypto-first and hybrid investors alike.',
            ],
            'faqIdPrefix' => 'crypto',
        ],
        'alerts' => [
            'title'       => 'Alerts with MyMI Wallet',
            'pageName'    => 'How It Works — Alerts',
            'description' => 'Create market, portfolio, and budgeting alerts that reach you on time.',
            'hero' => [
                'eyebrow'    => 'Alerts',
                'title'      => 'Alerts that cut through the noise',
                'subtitle'   => 'Build rules once and receive timely updates across budgeting, investments, and crypto.',
                'highlights' => [
                    'Mix price, volume, and fundamental triggers.',
                    'Send to email or dashboards based on your plan.',
                    'Throttle noisy symbols while keeping critical ones loud.',
                ],
                'actions' => [
                    ['label' => 'Create an alert', 'url' => 'register', 'class' => 'btn-light text-primary'],
                    ['label' => 'Compare plans',   'url' => 'Memberships', 'class' => 'btn-outline-light'],
                ],
            ],
            'whatYouGet' => [
                ['icon' => 'fas fa-bell',        'title' => 'Multi-channel notifications', 'description' => 'Send alerts to email or in-app destinations depending on your plan.'],
                ['icon' => 'fas fa-sliders-h',   'title' => 'Flexible rules', 'description' => 'Use price levels, volume spikes, earnings dates, or budget thresholds.'],
                ['icon' => 'fas fa-filter',      'title' => 'Noise controls', 'description' => 'Throttle busy tickers and highlight critical ones.'],
                ['icon' => 'fas fa-chart-line',  'title' => 'Previewable signals', 'description' => 'See example triggers before you save them.'],
                ['icon' => 'fas fa-history',     'title' => 'Recent activity', 'description' => 'Review what fired and when to refine your strategy.'],
                ['icon' => 'fas fa-lock',        'title' => 'Safe defaults', 'description' => 'Alerts respect CSP nonces and public layout standards.'],
            ],
            'howItWorks' => [
                ['icon' => 'fas fa-search',      'title' => 'Choose an asset or budget', 'description' => 'Pick a ticker, category, or metric you want to watch.'],
                ['icon' => 'fas fa-sliders-h',   'title' => 'Define the trigger', 'description' => 'Set the price, volume, or threshold that matters to you.'],
                ['icon' => 'fas fa-eye',         'title' => 'Preview the alert', 'description' => 'Validate conditions before saving to avoid noise.'],
                ['icon' => 'fas fa-bell',        'title' => 'Deliver it', 'description' => 'Send to the channels available in your membership tier.'],
                ['icon' => 'fas fa-sync',        'title' => 'Refine over time', 'description' => 'Adjust or pause alerts as markets and budgets change.'],
            ],
            'audiences' => [
                ['title' => 'Day and swing traders', 'description' => 'Keep signal latency low without babysitting charts.'],
                ['title' => 'Long-term investors', 'description' => 'Track earnings events and valuation ranges with calm alerts.'],
                ['title' => 'Budget owners', 'description' => 'Get nudges when spending exceeds a threshold.'],
                ['title' => 'Teams', 'description' => 'Share alert visibility across a project or workspace.'],
            ],
            'faqs' => [
                ['question' => 'What channels are supported?', 'answer' => 'Email and in-app destinations are supported; additional channels follow your plan.'],
                ['question' => 'Can I pause alerts?', 'answer' => 'Yes. You can pause or snooze alerts without deleting them.'],
                ['question' => 'Are there rate limits?', 'answer' => 'Alert volume respects membership limits so signals stay meaningful.'],
                ['question' => 'Do alerts include crypto?', 'answer' => 'Yes. Price and volatility-based alerts work for supported crypto assets.'],
                ['question' => 'Can I share alerts?', 'answer' => 'Projects and teams can review alert history and rules together where enabled.'],
            ],
            'sectionTitles' => [
                'benefitsTitle'    => 'What you get for alerts',
                'benefitsSubtitle' => 'Signal coverage across budgeting, investing, and crypto.',
                'stepsTitle'       => 'How alerting works',
                'stepsSubtitle'    => 'Define, preview, deliver, and refine your signals.',
                'audiencesTitle'   => 'Who relies on it',
                'audiencesSubtitle'=> 'Investors and teams that need timely nudges, not noise.',
            ],
            'faqIdPrefix' => 'alerts',
        ],
        'projects' => [
            'title'       => 'Projects with MyMI Wallet',
            'pageName'    => 'How It Works — Projects',
            'description' => 'Organize investment initiatives, commitments, and updates for collaborators.',
            'hero' => [
                'eyebrow'    => 'Projects',
                'title'      => 'Projects that keep capital organized',
                'subtitle'   => 'Share milestones, commitments, and updates without losing context.',
                'highlights' => [
                    'Collect pledges and track movement in one place.',
                    'Give stakeholders a read-only dashboard for progress.',
                    'Keep updates mobile-friendly for on-the-go reviews.',
                ],
                'actions' => [
                    ['label' => 'Start a project', 'url' => 'register', 'class' => 'btn-light text-primary'],
                    ['label' => 'Membership options', 'url' => 'Memberships', 'class' => 'btn-outline-light'],
                ],
            ],
            'whatYouGet' => [
                ['icon' => 'fas fa-users',       'title' => 'Shared visibility', 'description' => 'Invite collaborators to see updates without exposing raw data.'],
                ['icon' => 'fas fa-clipboard-check', 'title' => 'Milestone tracking', 'description' => 'Outline phases, tasks, or deliverables tied to investments.'],
                ['icon' => 'fas fa-hand-holding-usd', 'title' => 'Commitment tracking', 'description' => 'Log pledges, receipts, and disbursements inside the project.'],
                ['icon' => 'fas fa-comments',    'title' => 'Update stream', 'description' => 'Keep commentary and updates in one place.'],
                ['icon' => 'fas fa-chart-line',  'title' => 'Outcome reporting', 'description' => 'Share summary KPIs with stakeholders when ready.'],
                ['icon' => 'fas fa-mobile-alt',  'title' => 'Mobile friendly', 'description' => 'Projects render cleanly on phones via the public layout.'],
            ],
            'howItWorks' => [
                ['icon' => 'fas fa-plus-circle', 'title' => 'Create a project', 'description' => 'Name the initiative and set the scope.'],
                ['icon' => 'fas fa-user-friends','title' => 'Invite collaborators', 'description' => 'Bring in partners to view updates or commitments.'],
                ['icon' => 'fas fa-tasks',       'title' => 'Add milestones', 'description' => 'Outline phases and attach expected outcomes.'],
                ['icon' => 'fas fa-bell',        'title' => 'Notify the group', 'description' => 'Share progress and alert subscribers when things change.'],
                ['icon' => 'fas fa-flag-checkered', 'title' => 'Report results', 'description' => 'Close the loop with dashboards or exports for backers.'],
            ],
            'audiences' => [
                ['title' => 'Founders & operators', 'description' => 'Need to show progress and commitments in one place.'],
                ['title' => 'Partners & backers', 'description' => 'Want transparent updates without operational overhead.'],
                ['title' => 'Community leaders', 'description' => 'Coordinate shared projects and keep everyone informed.'],
                ['title' => 'Analysts', 'description' => 'Track milestones against capital deployment quickly.'],
            ],
            'faqs' => [
                ['question' => 'Can I restrict access?', 'answer' => 'Yes. Share read-only dashboards or limit access per project.'],
                ['question' => 'Where do commitments live?', 'answer' => 'They are logged within the project so updates and funding stay connected.'],
                ['question' => 'Is messaging built-in?', 'answer' => 'Projects support update posts and status changes; deeper chat can link out.'],
                ['question' => 'Do projects require payment?', 'answer' => 'Availability depends on your membership; free users can still preview.'],
                ['question' => 'Can I export project data?', 'answer' => 'You can export summaries to share with stakeholders as needed.'],
            ],
            'sectionTitles' => [
                'benefitsTitle'    => 'What you get for projects',
                'benefitsSubtitle' => 'Visibility, commitments, and updates in one workspace.',
                'stepsTitle'       => 'How projects work',
                'stepsSubtitle'    => 'Create, invite, track milestones, and report outcomes.',
                'audiencesTitle'   => 'Who thrives here',
                'audiencesSubtitle'=> 'Operators, backers, and communities coordinating investments.',
            ],
            'faqIdPrefix' => 'projects',
        ],
        'security' => [
            'title'       => 'Security at MyMI Wallet',
            'pageName'    => 'How It Works — Security',
            'description' => 'Learn about authentication, permissions, and operational safeguards for public visitors.',
            'hero' => [
                'eyebrow'    => 'Security',
                'title'      => 'Security & trust by design',
                'subtitle'   => 'Understand the controls, visibility, and recovery paths that keep data protected.',
                'highlights' => [
                    'Built with CSP nonces, HTTPS, and minimal public attack surface.',
                    'Role-aware pages that avoid leaking account data to guests.',
                    'Operational logging and alerts for suspicious activity.',
                ],
                'actions' => [
                    ['label' => 'Review safeguards', 'url' => 'register', 'class' => 'btn-light text-primary'],
                    ['label' => 'Memberships',       'url' => 'Memberships', 'class' => 'btn-outline-light'],
                ],
            ],
            'whatYouGet' => [
                ['icon' => 'fas fa-shield-alt', 'title' => 'Hardened layout', 'description' => 'Public views avoid exposing session data and ride on the vetted layout.'],
                ['icon' => 'fas fa-key',        'title' => 'Authentication controls', 'description' => 'MFA-ready flows and secure session handling for logged-in users.'],
                ['icon' => 'fas fa-clipboard-list', 'title' => 'Audit friendly', 'description' => 'Structured data for monitoring access and changes.'],
                ['icon' => 'fas fa-lock',       'title' => 'Least privilege defaults', 'description' => 'Projects and alerts respect role-based visibility.'],
                ['icon' => 'fas fa-recycle',    'title' => 'Recovery paths', 'description' => 'Support processes for account recovery and contact options.'],
                ['icon' => 'fas fa-mobile-alt', 'title' => 'Secure on mobile', 'description' => 'CSP-aware markup keeps scripts controlled across devices.'],
            ],
            'howItWorks' => [
                ['icon' => 'fas fa-user-check', 'title' => 'Start with safe defaults', 'description' => 'Public pages omit session-bound data and respect SEO-safe markup.'],
                ['icon' => 'fas fa-lock',       'title' => 'Enable MFA', 'description' => 'Protect accounts with MFA and secure credential flows.'],
                ['icon' => 'fas fa-eye',        'title' => 'Monitor sessions', 'description' => 'Use logs and alerts to watch for unusual access (per plan).'],
                ['icon' => 'fas fa-user-shield','title' => 'Manage permissions', 'description' => 'Apply role-based access where collaboration is enabled.'],
                ['icon' => 'fas fa-life-ring',  'title' => 'Plan for recovery', 'description' => 'Document how to regain access and contact support if needed.'],
            ],
            'audiences' => [
                ['title' => 'Security-conscious users', 'description' => 'People who need clarity on controls before signing up.'],
                ['title' => 'Compliance teams', 'description' => 'Teams checking how guest pages avoid data exposure.'],
                ['title' => 'Partners', 'description' => 'Stakeholders who need confidence before integrating.'],
                ['title' => 'Mobile-first readers', 'description' => 'Anyone evaluating security details from a phone.'],
            ],
            'faqs' => [
                ['question' => 'Do public pages expose user data?', 'answer' => 'No. They intentionally avoid session data and rely on safe defaults.'],
                ['question' => 'Is MFA supported?', 'answer' => 'Yes. Account flows support MFA where enabled in your plan.'],
                ['question' => 'How are scripts secured?', 'answer' => 'Layouts use CSP nonces and the dev HTML guard to limit script injection.'],
                ['question' => 'Where do I report issues?', 'answer' => 'Use the support page or contact channels listed in the footer.'],
                ['question' => 'Is there a recovery process?', 'answer' => 'Yes. Account recovery and support outreach paths are available if you lose access.'],
            ],
            'sectionTitles' => [
                'benefitsTitle'    => 'What you get for security',
                'benefitsSubtitle' => 'Controls and safe defaults for public visitors.',
                'stepsTitle'       => 'How security works here',
                'stepsSubtitle'    => 'Principles and steps that keep pages safe.',
                'audiencesTitle'   => 'Who cares most',
                'audiencesSubtitle'=> 'Security-first users, partners, and compliance teams.',
            ],
            'faqIdPrefix' => 'security',
        ],
        'pricing' => [
            'title'       => 'Pricing with MyMI Wallet',
            'pageName'    => 'How It Works — Pricing',
            'description' => 'Understand free versus paid capabilities and how to upgrade.',
            'hero' => [
                'eyebrow'    => 'Pricing',
                'title'      => 'Pick the right plan with confidence',
                'subtitle'   => 'See what is included at each tier and how upgrades work.',
                'highlights' => [
                    'Transparent tiers with clear limits.',
                    'Start free and upgrade only when ready.',
                    'Keep alerts and dashboards active during upgrades.',
                ],
                'actions' => [
                    ['label' => 'View plans',   'url' => 'Memberships', 'class' => 'btn-light text-primary'],
                    ['label' => 'Register free','url' => 'register', 'class' => 'btn-outline-light'],
                ],
            ],
            'whatYouGet' => [
                ['icon' => 'fas fa-tag',        'title' => 'Clear tiers', 'description' => 'Know which alerts, dashboards, and projects are included at each level.'],
                ['icon' => 'fas fa-rocket',     'title' => 'Easy upgrades', 'description' => 'Move between tiers without losing data.'],
                ['icon' => 'fas fa-bell',       'title' => 'Alert capacity', 'description' => 'See how many alert rules and channels come with each plan.'],
                ['icon' => 'fas fa-users',      'title' => 'Collaboration options', 'description' => 'Understand how many collaborators or viewers you can invite.'],
                ['icon' => 'fas fa-credit-card','title' => 'Billing clarity', 'description' => 'Transparent billing cycles with reminders before changes.'],
                ['icon' => 'fas fa-life-ring',  'title' => 'Support access', 'description' => 'Know what support channels unlock at higher tiers.'],
            ],
            'howItWorks' => [
                ['icon' => 'fas fa-list',       'title' => 'Compare tiers', 'description' => 'Review limits for alerts, projects, and integrations.'],
                ['icon' => 'fas fa-user-plus',  'title' => 'Create or sign in', 'description' => 'Start with a free account to test the experience.'],
                ['icon' => 'fas fa-arrow-up',   'title' => 'Upgrade when ready', 'description' => 'Select a plan in Memberships; your data stays intact.'],
                ['icon' => 'fas fa-sync',       'title' => 'Adjust anytime', 'description' => 'Change plans as your usage grows or shrinks.'],
                ['icon' => 'fas fa-headset',    'title' => 'Reach support', 'description' => 'Get help choosing a plan via the Support page.'],
            ],
            'audiences' => [
                ['title' => 'Free explorers', 'description' => 'Kick the tires with core budgeting and alert features.'],
                ['title' => 'Active investors', 'description' => 'Need higher alert limits and more dashboards.'],
                ['title' => 'Teams & partners', 'description' => 'Require shared views, projects, and advanced support.'],
                ['title' => 'Compliance reviewers', 'description' => 'Want clarity on billing, retention, and support SLAs.'],
            ],
            'faqs' => [
                ['question' => 'Is there a free plan?', 'answer' => 'Yes. You can start for free and upgrade only when you need more capacity.'],
                ['question' => 'How do upgrades work?', 'answer' => 'Choose a tier in Memberships; your data and alerts stay intact during the change.'],
                ['question' => 'Can I downgrade later?', 'answer' => 'Yes. You can move to a lower tier; limits apply after the billing period.'],
                ['question' => 'Where do I manage billing?', 'answer' => 'Use the Memberships page to see pricing, limits, and billing options.'],
                ['question' => 'Are there contracts?', 'answer' => 'Plans are flexible; review Memberships for the latest terms.'],
            ],
            'sectionTitles' => [
                'benefitsTitle'    => 'What you get at each tier',
                'benefitsSubtitle' => 'Transparent features for alerts, projects, and collaboration.',
                'stepsTitle'       => 'How choosing a plan works',
                'stepsSubtitle'    => 'Compare, start free, upgrade, and adjust anytime.',
                'audiencesTitle'   => 'Which plan fits whom',
                'audiencesSubtitle'=> 'From explorers to teams, pick the right starting point.',
            ],
            'faqIdPrefix' => 'pricing',
        ],
    ];

    public function index()
    {
        return $this->renderTheme('overview');
    }

    public function budgeting()
    {
        return $this->renderTheme('budgeting');
    }

    public function investing()
    {
        return $this->renderTheme('investing');
    }

    public function crypto()
    {
        return $this->renderTheme('crypto');
    }

    public function alerts()
    {
        return $this->renderTheme('alerts');
    }

    public function projects()
    {
        return $this->renderTheme('projects');
    }

    public function security()
    {
        return $this->renderTheme('security');
    }

    public function pricing()
    {
        return $this->renderTheme('pricing');
    }

    /**
     * Build the data array for a page and render through the public layout.
     */
    private function renderPage(string $slug): ResponseInterface|string
    {
        if (! array_key_exists($slug, $this->pages)) {
            throw PageNotFoundException::forPageNotFound($slug);
        }

        $data = $this->commonData();
        if ($data instanceof ResponseInterface) {
            return $data;
        }

        $page      = $this->hydratePage($slug);
        $pageTitle = $page['title'] . ' | How It Works | MyMI Wallet';

        $payload = array_merge($data, $page, [
            'layout'     => 'public',
            'pageTitle'  => $pageTitle,
            'pageName'   => $page['pageName'] ?? $page['title'],
            'meta'       => [
                'title'       => $page['title'] . ' | MyMI Wallet',
                'description' => $page['description'],
                'canonical'   => $page['canonical'],
            ],
        ]);

        return $this->renderTheme('themes/public/how_it_works/' . ($page['view'] ?? $slug), $payload);
    }

    /**
     * Expand relative URLs to site_url() references and attach navigation.
     */
    private function hydratePage(string $slug): array
    {
        $page    = $this->pages[$slug];
        $nav     = $this->withNavUrls();
        $hero    = $page['hero'] ?? [];
        $cta     = $page['cta'] ?? $this->defaultCta($page['title']);

        if (! empty($hero['actions'])) {
            $hero['actions'] = $this->prepareActions($hero['actions']);
        }

        $cta['actions'] = $this->prepareActions($cta['actions'] ?? []);

        return [
            'view'           => $page['view'] ?? $slug,
            'title'          => $page['title'],
            'pageName'       => $page['pageName'] ?? $page['title'],
            'description'    => $page['description'],
            'canonical'      => $this->navLink($slug),
            'hero'           => $hero,
            'whatYouGet'     => $page['whatYouGet'] ?? [],
            'howItWorks'     => $page['howItWorks'] ?? [],
            'audiences'      => $page['audiences'] ?? [],
            'cta'            => $cta,
            'faqs'           => $page['faqs'] ?? [],
            'sectionTitles'  => $page['sectionTitles'] ?? [],
            'faqIdPrefix'    => $page['faqIdPrefix'] ?? $slug,
            'navItems'       => $nav,
            'activePage'     => $slug,
        ];
    }

    private function withNavUrls(): array
    {
        return array_map(function (array $item) {
            $item['url'] = site_url($item['path']);
            return $item;
        }, $this->navConfig);
    }

    private function navLink(string $slug): string
    {
        foreach ($this->navConfig as $item) {
            if ($item['slug'] === $slug) {
                return site_url($item['path']);
            }
        }

        return site_url('how-it-works');
    }

    private function prepareActions(array $actions): array
    {
        return array_map(function (array $action) {
            if (! empty($action['url'])) {
                $action['url'] = site_url($action['url']);
            }
            return $action;
        }, $actions);
    }

    private function defaultCta(string $title): array
    {
        return [
            'title'       => 'Ready to explore ' . $title . '?',
            'description' => 'Create your free MyMI Wallet account, review pricing, and keep browsing the public experience.',
            'actions'     => [
                ['label' => 'Register free', 'url' => 'register', 'class' => 'btn-light text-primary'],
                ['label' => 'View pricing',  'url' => 'Memberships', 'class' => 'btn-outline-light'],
                ['label' => 'Open dashboard', 'url' => 'Dashboard', 'class' => 'btn-outline-light'],
            ],
        ];
    }

    public function show(...$args)
    {
        log_message('warning', 'Unimplemented endpoint accessed: HowItWorksController::show');
        return redirect()->to('/Maintenance');
    }
}
