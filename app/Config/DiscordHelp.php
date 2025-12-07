<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class DiscordHelp extends BaseConfig
{
    public array $commands = [
        // Core “help/onboarding”
        'help' => [
            'name'        => '/mymi help',
            'category'    => 'Onboarding',
            'description' => 'Shows how the Discord server works and where to start.',
            'usage'       => '/mymi help',
            'premium'     => false,
        ],
        'link' => [
            'name'        => '/mymi link',
            'category'    => 'Onboarding',
            'description' => 'Connect your Discord user to your MyMI Wallet account.',
            'usage'       => '/mymi link',
            'premium'     => false,
        ],

        // Alerts / trading
        'alerts' => [
            'name'        => '/mymi alerts',
            'category'    => 'Trading & Alerts',
            'description' => 'View current trade alerts for your account or the community.',
            'usage'       => '/mymi alerts [symbol] [timeRange]',
            'premium'     => true,
        ],
        'ticker' => [
            'name'        => '/mymi ticker',
            'category'    => 'Trading & Alerts',
            'description' => 'Get the latest alert + chart + fundamentals for a symbol.',
            'usage'       => '/mymi ticker <symbol> or $SYMBOL in chat',
            'premium'     => true,
        ],

        // Budget & Forecast
        'budget' => [
            'name'        => '/mymi budget',
            'category'    => 'Budget & Forecast',
            'description' => 'Get a quick summary of your MyMI budget and forecast.',
            'usage'       => '/mymi budget',
            'premium'     => true,
        ],

        // Portfolio / trades
        'portfolio' => [
            'name'        => '/mymi portfolio',
            'category'    => 'Trading & Alerts',
            'description' => 'View your active trades and portfolio snapshot.',
            'usage'       => '/mymi portfolio [summary|positions]',
            'premium'     => true,
        ],
        'watchlist' => [
            'name'        => '/mymi watchlist',
            'category'    => 'Trading & Alerts',
            'description' => 'View or manage your watchlist symbols.',
            'usage'       => '/mymi watchlist [symbol]',
            'premium'     => true,
        ],

        // Projects / assets / research / news / support
        'projects' => [
            'name'        => '/mymi projects',
            'category'    => 'MyMI Projects',
            'description' => 'Discover MyMI Projects and co-investment opportunities.',
            'usage'       => '/mymi projects [search]',
            'premium'     => true,
        ],
        'assets' => [
            'name'        => '/mymi assets',
            'category'    => 'Assets & Creator',
            'description' => 'Search or manage your MyMI assets/coins.',
            'usage'       => '/mymi assets [search]',
            'premium'     => true,
        ],
        'news' => [
            'name'        => '/mymi news',
            'category'    => 'News & Research',
            'description' => 'Request financial/economic news related to chosen topics or tickers.',
            'usage'       => '/mymi news [topic|symbol]',
            'premium'     => false,
        ],
        'earnings' => [
            'name'        => '/mymi earnings',
            'category'    => 'News & Research',
            'description' => 'See today/this week’s earnings of interest.',
            'usage'       => '/mymi earnings [today|this_week]',
            'premium'     => false,
        ],
        'support' => [
            'name'        => '/mymi support',
            'category'    => 'Support',
            'description' => 'Get a direct link to Support and open a help request.',
            'usage'       => '/mymi support',
            'premium'     => false,
        ],
    ];

    public array $onboardingSteps = [
        [
            'key'         => 'register_account',
            'title'       => 'Register your MyMI Wallet account',
            'description' => 'Go to the MyMI site, create an account, and verify your email.',
            'url'         => 'https://www.mymiwallet.com/Register',
        ],
        [
            'key'         => 'link_discord',
            'title'       => 'Link your Discord account',
            'description' => 'Use /mymi link and follow the link to connect your accounts.',
            'url'         => 'https://www.mymiwallet.com/Account/Social-Media',
        ],
        [
            'key'         => 'setup_budget',
            'title'       => 'Set up your budget & forecast',
            'description' => 'Complete your monthly budget in MyMI Wallet to unlock forecasts and Discord summaries.',
            'url'         => 'https://www.mymiwallet.com/Budget',
        ],
        // Add steps for:
        // - Linking wallets
        // - Tracking trades
        // - Due diligence tracking
        // - MyMI Projects discovery
        // - Asset Creator
        // - Management: Marketing & auto-cleanup
        // - How It Works: Budget -> Investments -> Assets -> Retirement
    ];
}