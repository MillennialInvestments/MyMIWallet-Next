<?php

declare(strict_types=1);

namespace Config;

use CodeIgniter\Config\BaseConfig;

class RegistrationSources extends BaseConfig
{
    /**
     * Source-keyed registration content map.
     *
     * @var array<string,array<string,mixed>>
     */
    public array $sources = [
        'default' => [
            'headline' => 'Create Your Free MyMI Wallet Account',
            'subheadline' => 'Budget smarter, track investments, and grow with a guided onboarding flow.',
            'layout' => 'single',
            'promo_enabled' => true,
            'promo_sections' => [
                [
                    'title' => 'What You Can Do Here',
                    'cards' => [
                        ['title' => 'Budgeting', 'body' => 'Set monthly plans, track recurring bills, and understand cash flow before you invest.'],
                        ['title' => 'Investing', 'body' => 'Use watchlists, trade tracking, and research workflows to stay intentional.'],
                        ['title' => 'Wallets', 'body' => 'Manage connected assets and monitor account activity from one place.'],
                    ],
                ],
            ],
        ],
        'discord' => [
            'headline' => 'Welcome, Discord Community 👋',
            'subheadline' => 'Register once, then move directly into a guided MyMI Wallet starter experience.',
            'layout' => 'split',
            'intro_view' => 'Auth/register/Discord',
            'promo_enabled' => true,
            'post_register_redirect' => '/register/success',
            'promo_sections' => [
                [
                    'title' => 'Budgeting Tools',
                    'description' => 'Build a realistic money plan before investing.',
                    'cards' => [
                        ['title' => 'Monthly Budgeting', 'body' => 'Track income, bills, and discretionary spending with clear monthly views.'],
                        ['title' => 'Recurring Bills', 'body' => 'Organize recurring obligations and reduce missed-payment risk.'],
                        ['title' => 'Forecast Direction', 'body' => 'Use trend-aware planning to estimate what can safely be invested.'],
                    ],
                ],
                [
                    'title' => 'Investment Tools',
                    'description' => 'MyMI Wallet goes beyond simple budgeting.',
                    'cards' => [
                        ['title' => 'Watchlists & Analysis', 'body' => 'Follow symbols, monitor setups, and keep context around market moves.'],
                        ['title' => 'Trade Tracking', 'body' => 'Track entries, exits, and outcomes to improve your process over time.'],
                        ['title' => 'Premium Insights Path', 'body' => 'Free accounts can explore core tools while premium features expand advanced workflows.'],
                    ],
                ],
                [
                    'title' => 'Exchange / Wallet Features',
                    'cards' => [
                        ['title' => 'Digital Wallet Direction', 'body' => 'Manage wallet-related features and connected asset data as the ecosystem grows.'],
                        ['title' => 'Connected Asset Workflows', 'body' => 'Keep crypto and account context aligned with your broader financial plan.'],
                    ],
                ],
                [
                    'title' => 'Alerts, Market Intelligence, and Content',
                    'cards' => [
                        ['title' => 'Alerts', 'body' => 'Receive market-relevant updates and community-facing signals where available.'],
                        ['title' => 'Education & Updates', 'body' => 'Access platform updates, guides, and practical finance content as new features ship.'],
                    ],
                ],
                [
                    'title' => 'Community & Membership Value',
                    'cards' => [
                        ['title' => 'Join Early', 'body' => 'Shape feedback loops, product priorities, and onboarding improvements from day one.'],
                        ['title' => 'Free vs Premium', 'body' => 'Start free, discover value quickly, then upgrade only when advanced tooling makes sense.'],
                    ],
                ],
                [
                    'title' => 'Quick Start CTAs',
                    'ctas' => [
                        ['label' => 'Go to Login', 'url' => '/login', 'variant' => 'primary'],
                        ['label' => 'View Pricing', 'url' => '/pricing', 'variant' => 'outline-primary'],
                        ['label' => 'Help & Support', 'url' => '/Support', 'variant' => 'outline-secondary'],
                    ],
                ],
            ],
        ],
    ];
}
