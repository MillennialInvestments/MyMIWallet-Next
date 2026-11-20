<?php

declare(strict_types=1);

namespace App\Libraries\Onboarding;

/**
 * The first-login how-to tour on the dashboard: a welcome, a dashboard
 * overview, then an overview slide and a quick-start slide for each free
 * module the member can open today, and a finish slide with first moves.
 *
 * A module only appears when its page would actually open for the member,
 * so the tour never sends someone to a switched-off page.
 */
final class FirstLoginTour
{
    public const MODULE_BUDGET  = 'budget';
    public const MODULE_WALLETS = 'wallets';
    public const MODULE_CRYPTO  = 'crypto';

    /**
     * Which free modules are open right now.
     *
     * Budget follows FEATURE_BUDGET (Config\Features). Wallets and Crypto
     * both live in WalletsController, whose guard treats FEATURE_WALLETS as
     * on unless it is explicitly false, so this mirrors that guard.
     *
     * @return array<string,bool>
     */
    public static function availableModules(): array
    {
        $budget = (bool) config('Features')->enabled('FEATURE_BUDGET');
        $wallets = filter_var(env('FEATURE_WALLETS', true), FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) !== false;

        return [
            self::MODULE_BUDGET  => $budget,
            self::MODULE_WALLETS => $wallets,
            self::MODULE_CRYPTO  => $wallets,
        ];
    }

    /**
     * @param array<string,bool>|null $modules from availableModules(); null reads it
     *
     * @return list<array<string,mixed>>
     */
    public static function slides(?array $modules = null): array
    {
        $modules ??= self::availableModules();
        $open = array_keys(array_filter($modules));

        $slides = [self::welcome($open), self::dashboard($open)];

        foreach ([self::MODULE_BUDGET, self::MODULE_WALLETS, self::MODULE_CRYPTO] as $module) {
            if (in_array($module, $open, true)) {
                foreach (self::moduleSlides($module) as $slide) {
                    $slides[] = $slide;
                }
            }
        }

        $slides[] = self::finish($open);

        return $slides;
    }

    /**
     * The first move for each open module, used on the finish slide.
     *
     * @param list<string> $open
     *
     * @return list<array{label:string,url:string,icon:string}>
     */
    public static function firstMoves(array $open): array
    {
        $moves = [];
        foreach ([self::MODULE_BUDGET, self::MODULE_WALLETS, self::MODULE_CRYPTO] as $module) {
            if (! in_array($module, $open, true)) {
                continue;
            }
            $quick = self::moduleSlides($module)[1];
            $moves[] = [
                'label' => (string) $quick['cta']['label'],
                'url'   => (string) $quick['cta']['url'],
                'icon'  => (string) $quick['icon'],
            ];
        }

        return $moves;
    }

    /**
     * @param list<string> $open
     */
    private static function welcome(array $open): array
    {
        $names = array_map(static fn (string $m): string => self::moduleName($m), $open);

        return [
            'key'     => 'welcome',
            'module'  => 'welcome',
            'icon'    => 'ni-spark',
            'eyebrow' => 'Welcome',
            'title'   => 'Welcome to MyMI Wallet',
            'body'    => $names === []
                ? 'This short tour shows you around your dashboard. It takes about two minutes, and you can replay it any time.'
                : 'This short tour shows you around your dashboard and the free tools you can use today: '
                    . self::humanList($names) . '. It takes about two minutes, and you can replay it any time.',
            'steps'   => [
                'Where to find your numbers on the dashboard',
                'How each free module works, in plain words',
                'One quick first step for each, so your dashboard fills in',
            ],
            'tip'     => 'Use Next and Back, or the arrow keys. Skip tour closes it, and "Take the tour" on the dashboard brings it back.',
            'cta'     => null,
        ];
    }

    /**
     * @param list<string> $open
     */
    private static function dashboard(array $open): array
    {
        $steps = [
            'Net Worth Snapshot shows everything you own minus everything you owe.',
            'The budget cards show this month\'s income, spending and what is left to save or invest.',
            'The menu on the left opens every module. On a phone, tap the menu icon at the top.',
            'The Continue setup banner finishes your profile, so tips and insights fit your situation.',
        ];

        return [
            'key'     => 'dashboard',
            'module'  => 'dashboard',
            'icon'    => 'ni-dashboard',
            'eyebrow' => 'Your dashboard',
            'title'   => 'Your money at a glance',
            'body'    => 'Everything you add in the modules shows up here. The more you add, the more useful this page becomes.',
            'steps'   => $steps,
            'tip'     => 'A new account starts at zero. That is normal: add your first income or account and the cards fill in right away.',
            'cta'     => null,
        ];
    }

    /**
     * @return array{0:array<string,mixed>,1:array<string,mixed>} overview, quick start
     */
    private static function moduleSlides(string $module): array
    {
        switch ($module) {
            case self::MODULE_BUDGET:
                return [
                    [
                        'key'     => 'budget-overview',
                        'module'  => $module,
                        'icon'    => 'ni-pie',
                        'eyebrow' => 'Budget',
                        'title'   => 'Know where every dollar goes',
                        'body'    => 'Your budget tracks money coming in and going out, month by month, and shows what is left over.',
                        'steps'   => [
                            'This Month, Last Month and Next Month views let you look back and plan ahead.',
                            'Recurring income and bills repeat on the schedule you pick, so you enter them once.',
                            'What is left after bills becomes your "available to invest" number on the dashboard.',
                        ],
                        'tip'     => 'Start with the big items. Rent, paychecks and car payments matter more than every coffee.',
                        'cta'     => ['label' => 'Open Budget', 'url' => 'Budget'],
                    ],
                    [
                        'key'     => 'budget-quickstart',
                        'module'  => $module,
                        'icon'    => 'ni-pie',
                        'eyebrow' => 'Budget quick start',
                        'title'   => 'Your first budget in three steps',
                        'body'    => 'About three minutes is enough to see a real picture of your month.',
                        'steps'   => [
                            'Add your main paycheck as income, and set how often it repeats.',
                            'Add your three biggest bills as expenses, with their due dates.',
                            'Open This Month to see what is left after your bills.',
                        ],
                        'tip'     => 'You can edit or remove any entry later, so a rough number is fine for now.',
                        'cta'     => ['label' => 'Add my income', 'url' => 'Budget/Add/Income'],
                    ],
                ];

            case self::MODULE_WALLETS:
                return [
                    [
                        'key'     => 'wallets-overview',
                        'module'  => $module,
                        'icon'    => 'ni-wallet-alt',
                        'eyebrow' => 'Wallets',
                        'title'   => 'All your accounts in one place',
                        'body'    => 'Add the accounts you already have to see their balances together. They feed your net worth on the dashboard.',
                        'steps'   => [
                            'Bank: checking and savings accounts.',
                            'Credit and debt: credit cards, car loans, student loans and anything else you owe.',
                            'Investments: brokerage and retirement accounts.',
                        ],
                        'tip'     => 'Adding an account here records its balance for tracking. It does not move any money.',
                        'cta'     => ['label' => 'Open Wallets', 'url' => 'Wallets'],
                    ],
                    [
                        'key'     => 'wallets-quickstart',
                        'module'  => $module,
                        'icon'    => 'ni-wallet-alt',
                        'eyebrow' => 'Wallets quick start',
                        'title'   => 'Add your first accounts',
                        'body'    => 'Two accounts are enough to make your net worth real.',
                        'steps'   => [
                            'Add your main checking account and its current balance.',
                            'Add one credit card or loan with what you owe today.',
                            'Open Wallets to see your totals, and update balances when they change.',
                        ],
                        'tip'     => 'Give each account a nickname you will recognize, like "Everyday checking".',
                        'cta'     => ['label' => 'Add a bank account', 'url' => 'Wallets/Add/Bank'],
                    ],
                ];

            case self::MODULE_CRYPTO:
                return [
                    [
                        'key'     => 'crypto-overview',
                        'module'  => $module,
                        'icon'    => 'ni-coins',
                        'eyebrow' => 'Crypto',
                        'title'   => 'Track your coins next to everything else',
                        'body'    => 'Record the crypto you hold so it counts in your net worth and your overall mix of assets.',
                        'steps'   => [
                            'Add one entry for each exchange or wallet where you hold coins.',
                            'Update the amount when you buy, sell or move coins.',
                            'See crypto as part of your total allocation on the dashboard.',
                        ],
                        'tip'     => 'Tracking only needs a name and an amount. Never share a seed phrase or private key with anyone, including us.',
                        'cta'     => ['label' => 'Open Crypto', 'url' => 'Wallets/Crypto'],
                    ],
                    [
                        'key'     => 'crypto-quickstart',
                        'module'  => $module,
                        'icon'    => 'ni-coins',
                        'eyebrow' => 'Crypto quick start',
                        'title'   => 'Add your first crypto holding',
                        'body'    => 'One entry takes less than a minute.',
                        'steps'   => [
                            'Choose Add crypto and name it after where the coins live, like "Coinbase".',
                            'Enter what it is worth today.',
                            'Check the dashboard: your net worth and allocation now include it.',
                        ],
                        'tip'     => 'No crypto yet? Skip this one. It will be here when you need it.',
                        'cta'     => ['label' => 'Add crypto', 'url' => 'Wallets/Add/Crypto'],
                    ],
                ];
        }

        return [];
    }

    /**
     * @param list<string> $open
     */
    private static function finish(array $open): array
    {
        return [
            'key'     => 'finish',
            'module'  => 'finish',
            'icon'    => 'ni-check-circle',
            'eyebrow' => 'You are all set',
            'title'   => 'Pick your first move',
            'body'    => 'Choose one to start now, or finish the tour and look around. "Take the tour" on the dashboard replays this any time.',
            'steps'   => [],
            'moves'   => self::firstMoves($open),
            'tip'     => null,
            'cta'     => null,
        ];
    }

    private static function moduleName(string $module): string
    {
        return match ($module) {
            self::MODULE_BUDGET  => 'Budget',
            self::MODULE_WALLETS => 'Wallets',
            self::MODULE_CRYPTO  => 'Crypto',
            default              => ucfirst($module),
        };
    }

    /**
     * @param list<string> $items
     */
    private static function humanList(array $items): string
    {
        if (count($items) <= 1) {
            return implode('', $items);
        }
        $last = array_pop($items);

        return implode(', ', $items) . ' and ' . $last;
    }
}
