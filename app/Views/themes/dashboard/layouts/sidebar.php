<?php
$siteSettings = $siteSettings ?? (object) [];
$balance = $balance ?? ['amount' => 0, 'currency' => 'USD', 'asOf' => null];
$cuDisplayName = $cuDisplayName ?? '';
$cuEmail = $cuEmail ?? '';
$cuUsername = $cuUsername ?? null;
$initials = !empty($cuDisplayName) ? mb_strtoupper(mb_substr($cuDisplayName, 0, 2)) : 'ME';
$coinBalance = $userGoldData->coinSum ?? '0';

$request = service('request');
// $uri = $request->uri;
$currentUrl = current_url();

$groups = [
    'overview' => [
        'title' => 'Overview & Tools',
        'icon'  => 'ni ni-home',
        'links' => [
            [
                'label'   => 'Dashboard',
                'url'     => site_url('Dashboard'),
                'pattern' => 'Dashboard*',
                'icon'    => 'ni ni-dashboard',
            ],
            [
                'label'   => 'Alerts',
                'url'     => site_url('Alerts'),
                'pattern' => 'Alerts*',
                'icon'    => 'ni ni-bell',
            ],
            [
                'label'   => 'Assets',
                'url'     => site_url('Assets'),
                'pattern' => 'Assets*',
                'icon'    => 'ni ni-growth',
            ],
            [
                'label'   => 'Budget',
                'url'     => site_url('Budget'),
                'pattern' => 'Budget*',
                'icon'    => 'ni ni-pie',
            ],
            [
                'label'   => 'Credit & Debt',
                'url'     => site_url('Wallets/Debt'),
                'pattern' => 'Wallets/Debt*',
                'icon'    => 'ni ni-activity-round',
            ],
            [
                'label'   => 'MyMI Exchange',
                'url'     => site_url('Exchange/Solana'),
                'pattern' => 'Exchange/Solana*',
                'icon'    => 'ni ni-coin',
            ],
        ],
    ],
    'gold' => [
        'title' => 'MyMI Gold',
        'icon'  => 'ni ni-coin',
        'links' => [
            [
                'label'   => 'Purchase Gold',
                'url'     => site_url('Purchase/MyMIGold'),
                'pattern' => 'Purchase/MyMIGold*',
                'icon'    => 'ni ni-cart',
            ],
            [
                'label'   => 'Memberships',
                'url'     => !empty($siteSettings->monthlyMemberships) ? site_url('Wallets/Purchase/Memberships') : null,
                'pattern' => 'Wallets/Purchase/Memberships*',
                'icon'    => 'ni ni-award',
            ],
            [
                'label'   => 'Daily Goals',
                'url'     => !empty($siteSettings->dailyGoals) ? site_url('MyMI-Gold/Goals/Daily') : null,
                'pattern' => 'MyMI-Gold/Goals/Daily*',
                'icon'    => 'ni ni-calendar',
            ],
            [
                'label'   => 'Weekly Goals',
                'url'     => !empty($siteSettings->weeklyGoals) ? site_url('MyMI-Gold/Goals/Weekly') : null,
                'pattern' => 'MyMI-Gold/Goals/Weekly*',
                'icon'    => 'ni ni-calendar-alt',
            ],
            [
                'label'   => 'Monthly Goals',
                'url'     => !empty($siteSettings->monthlyGoals) ? site_url('MyMIGold/Goals/Monthly') : null,
                'pattern' => 'MyMIGold/Goals/Monthly*',
                'icon'    => 'ni ni-calendar-booking',
            ],
        ],
    ],
    'account' => [
        'title' => 'Account',
        'icon'  => 'ni ni-user-alt',
        'links' => [
            [
                'label'   => 'Profile',
                'url'     => site_url('Profile/' . ($cuUsername ?? 0)),
                'pattern' => 'Profile*',
                'icon'    => 'ni ni-user-alt',
            ],
            [
                'label'   => 'Account Settings',
                'url'     => site_url('Account'),
                'pattern' => 'Account',
                'icon'    => 'ni ni-setting-alt',
            ],
            [
                'label'   => 'Billing',
                'url'     => site_url('Account/Billing'),
                'pattern' => 'Account/Billing*',
                'icon'    => 'ni ni-credit-card',
            ],
            [
                'label'   => 'Connected Accounts',
                'url'     => site_url('Account/Connected-Accounts'),
                'pattern' => 'Account/Connected-Accounts*',
                'icon'    => 'ni ni-link',
            ],
            [
                'label'   => 'Login Activity',
                'url'     => site_url('Account/Activity'),
                'pattern' => 'Account/Activity*',
                'icon'    => 'ni ni-activity',
            ],
            [
                'label'   => 'Notifications',
                'url'     => site_url('Account/Notifications'),
                'pattern' => 'Account/Notifications*',
                'icon'    => 'ni ni-bell',
            ],
            [
                'label'   => 'Security',
                'url'     => site_url('Account/Security'),
                'pattern' => 'Account/Security*',
                'icon'    => 'ni ni-shield',
            ],
            [
                'label'   => 'Social Media',
                'url'     => site_url('Account/Social-Media'),
                'pattern' => 'Account/Social-Media*',
                'icon'    => 'ni ni-share-alt',
            ],
            [
                'label'   => 'Sign Out',
                'url'     => site_url('logout'),
                'pattern' => 'logout',
                'icon'    => 'ni ni-signout',
            ],
        ],
    ],
    'marketing' => [
        'title' => 'Marketing & Management',
        'icon'  => 'ni ni-target',
        'links' => [
            [
                'label'   => 'Marketing Dashboard',
                'url'     => site_url('Management/Marketing'),
                'pattern' => 'Management/Marketing',
                'icon'    => 'ni ni-target',
            ],
            [
                'label'   => 'Campaigns',
                'url'     => site_url('Management/Marketing/Campaigns'),
                'pattern' => 'Management/Marketing/Campaigns*',
                'icon'    => 'ni ni-collection',
            ],
            [
                'label'   => 'Ideas',
                'url'     => site_url('Management/Marketing/Ideas'),
                'pattern' => 'Management/Marketing/Ideas*',
                'icon'    => 'ni ni-bulb',
            ],
            [
                'label'   => 'Schedule',
                'url'     => site_url('Management/Marketing/Schedule'),
                'pattern' => 'Management/Marketing/Schedule*',
                'icon'    => 'ni ni-calendar-check',
            ],
            [
                'label'   => 'Promote (Solana)',
                'url'     => site_url('Management/Marketing/Promote/Solana'),
                'pattern' => 'Management/Marketing/Promote/Solana*',
                'icon'    => 'ni ni-broadcast',
            ],
            [
                'label'   => 'Content Generator',
                'url'     => site_url('Management/Marketing/Content/Generator'),
                'pattern' => 'Management/Marketing/Content/Generator*',
                'icon'    => 'ni ni-edit',
            ],
            [
                'label'   => 'Content Listing',
                'url'     => site_url('Management/Marketing/Content/Listing'),
                'pattern' => 'Management/Marketing/Content/Listing*',
                'icon'    => 'ni ni-list',
            ],
            [
                'label'   => 'Blog Creator',
                'url'     => site_url('Management/Marketing/Blog-Creator'),
                'pattern' => 'Management/Marketing/Blog-Creator*',
                'icon'    => 'ni ni-book-open',
            ],
            [
                'label'   => 'Post Creator',
                'url'     => site_url('Management/Marketing/Post-Creator'),
                'pattern' => 'Management/Marketing/Post-Creator*',
                'icon'    => 'ni ni-chat',
            ],
            [
                'label'   => 'Video Creator',
                'url'     => site_url('Management/Marketing/Video-Creator'),
                'pattern' => 'Management/Marketing/Video-Creator*',
                'icon'    => 'ni ni-video',
            ],
            [
                'label'   => 'Partners',
                'url'     => site_url('Management/Partners'),
                'pattern' => 'Management/Partners*',
                'icon'    => 'ni ni-network',
            ],
            [
                'label'   => 'Projects',
                'url'     => site_url('Management/Projects'),
                'pattern' => 'Management/Projects*',
                'icon'    => 'ni ni-list-round',
            ],
            [
                'label'   => 'Security Center',
                'url'     => site_url('Management/Security'),
                'pattern' => 'Management/Security*',
                'icon'    => 'ni ni-lock',
            ],
            [
                'label'   => 'Services',
                'url'     => site_url('Management/Services'),
                'pattern' => 'Management/Services*',
                'icon'    => 'ni ni-briefcase',
            ],
            [
                'label'   => 'Users',
                'url'     => site_url('Management/Users'),
                'pattern' => 'Management/Users*',
                'icon'    => 'ni ni-users',
            ],
            [
                'label'   => 'Wallets',
                'url'     => site_url('Management/Wallets'),
                'pattern' => 'Management/Wallets*',
                'icon'    => 'ni ni-wallet',
            ],
        ],
    ],
    'community' => [
        'title' => 'Community & Support',
        'icon'  => 'ni ni-chat-fill',
        'links' => [
            [
                'label'   => 'Announcements',
                'url'     => site_url('Announcements'),
                'pattern' => 'Announcements*',
                'icon'    => 'ni ni-megaphone',
            ],
            [
                'label'    => 'Discord',
                'url'      => 'https://discord.gg/BsDUjDHqrz',
                'pattern'  => null,
                'icon'     => 'ni ni-chat-circle',
                'external' => true,
            ],
            [
                'label'    => 'YouTube',
                'url'      => 'https://www.youtube.com/channel/UCtWWy71LQpea_tHkb7fIL7A',
                'pattern'  => null,
                'icon'     => 'ni ni-youtube',
                'external' => true,
            ],
            [
                'label'    => 'Facebook',
                'url'      => 'https://www.facebook.com/MyMillennialInvestments/',
                'pattern'  => null,
                'icon'     => 'ni ni-facebook-f',
                'external' => true,
            ],
            [
                'label'    => 'Twitter',
                'url'      => 'https://twitter.com/MyMillennialPro',
                'pattern'  => null,
                'icon'     => 'ni ni-twitter',
                'external' => true,
            ],
            [
                'label'   => 'Support Center',
                'url'     => site_url('Support'),
                'pattern' => 'Support*',
                'icon'    => 'ni ni-help-alt',
            ],
        ],
    ],
];

$groups = array_filter($groups, static function (array $group): bool {
    $links = array_filter($group['links'], static fn ($link) => !empty($link['url']));
    return !empty($links);
});

$activeGroup = '';
foreach ($groups as $key => &$group) {
    $group['links'] = array_values(array_filter($group['links'], static fn ($link) => !empty($link['url'])));
    foreach ($group['links'] as &$link) {
        $pattern = $link['pattern'] ?? null;
        $link['active'] = false;
        if ($pattern) {
            $link['active'] = url_is($pattern);
        } elseif (!empty($link['url']) && $link['url'] === $currentUrl) {
            $link['active'] = true;
        }
        if ($link['active']) {
            $activeGroup = $key;
        }
    }
    unset($link);
}
unset($group);

if ($activeGroup === '' && isset($groups['overview'])) {
    $activeGroup = 'overview';
}

$agent = service('request')->getUserAgent();
$isMobile = $agent->isMobile();
$sidebarId = 'collapseSidebar';
$sidebarClasses = $isMobile
    ? 'nk-sidebar nk-sidebar-fixed is-dark pt-xl-4 collapse sidebar-offcanvas'
    : 'nk-sidebar nk-sidebar-fixed is-dark';
?>

<div id="<?= esc($isMobile ? 'sidebarMenu' : $sidebarId); ?>" class="<?= esc($sidebarClasses); ?>">
    <div class="nk-sidebar-element nk-sidebar-head w-90 m-auto d-flex justify-content-between align-items-center">
        <div class="nk-sidebar-brand w-80 ml-xl-0 pt-3">
            <a href="<?= site_url('Dashboard'); ?>" class="logo-link nk-sidebar-logo pt-xl-1 pr-xl-2">
                <img class="logo-light logo-img responsive-logo w-90" src="<?= base_url('assets/images/Company/MyMI-Wallet-White.png'); ?>" alt="MyMI Wallet">
                <img class="logo-dark logo-img responsive-logo w-80" src="<?= base_url('assets/images/Company/MyMI-Wallet-White.png'); ?>" alt="MyMI Wallet">
            </a>
        </div>
        <div class="nk-menu-trigger mr-n2">
            <button type="button"
                    class="btn btn-link text-white p-0"
                    data-bs-toggle="collapse"
                    data-bs-target="#<?= esc($sidebarId); ?>"
                    aria-controls="<?= esc($sidebarId); ?>"
                    aria-expanded="false"
                    aria-label="Toggle sidebar">
                <em class="icon ni ni-arrow-left" style="font-size:23px;"></em>
            </button>
        </div>
    </div>

    <div class="nk-sidebar-element py-1">
        <div class="nk-sidebar-body scrollable-sidebar" data-simplebar>
            <div class="nk-sidebar-content">
                <div class="nk-sidebar-widget pt-1">
                    <div class="user-account-info between-center">
                        <div class="user-account-main">
                            <h6 class="overline-title-alt">Current Balance</h6>
                            <div class="user-balance" title="As of <?= esc($balance['asOf'] ?? 'now'); ?>">
                                <?= '$' . number_format((float) ($balance['amount'] ?? 0), 2); ?>
                                <small class="currency currency-usd"><?= esc($balance['currency'] ?? 'USD'); ?></small>
                            </div>
                            <div class="user-balance-alt">
                                <?= esc($coinBalance); ?> <span class="currency currency-usd">MyMI Gold</span>
                            </div>
                        </div>
                    </div>
                    <div class="user-card-wrap pt-3">
                        <div class="user-card d-flex align-items-center gap-2">
                            <div class="user-avatar"><span><?= esc($initials); ?></span></div>
                            <div class="user-info">
                                <span class="lead-text"><?= esc($cuDisplayName); ?></span>
                                <span class="sub-text"><?= esc($cuEmail); ?></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="accordion mt-3" id="sidebarAccordion">
                    <?php foreach ($groups as $key => $group): ?>
                        <?php
                        $headingId = 'heading' . ucfirst($key);
                        $collapseId = 'collapse' . ucfirst($key);
                        $isOpen = ($activeGroup === $key);
                        ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="<?= esc($headingId); ?>">
                                <button class="accordion-button <?= $isOpen ? '' : 'collapsed'; ?>"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#<?= esc($collapseId); ?>"
                                        aria-expanded="<?= $isOpen ? 'true' : 'false'; ?>"
                                        aria-controls="<?= esc($collapseId); ?>">
                                    <em class="icon <?= esc($group['icon']); ?> me-2"></em>
                                    <?= esc($group['title']); ?>
                                </button>
                            </h2>
                            <div id="<?= esc($collapseId); ?>"
                                 class="accordion-collapse collapse <?= $isOpen ? 'show' : ''; ?>"
                                 aria-labelledby="<?= esc($headingId); ?>"
                                 data-bs-parent="#sidebarAccordion">
                                <div class="accordion-body p-0">
                                    <ul class="nav flex-column">
                                        <?php foreach ($group['links'] as $link): ?>
                                            <?php
                                            $isActive = !empty($link['active']);
                                            $linkClasses = 'nav-link d-flex align-items-center gap-2 py-2 ps-3';
                                            if ($isActive) {
                                                $linkClasses .= ' active fw-semibold';
                                            }
                                            $target = !empty($link['external']) ? ' target="_blank" rel="noopener noreferrer"' : '';
                                            ?>
                                            <li class="nav-item">
                                                <a class="<?= esc($linkClasses); ?>" href="<?= esc($link['url']); ?>"<?= $target; ?>>
                                                    <em class="icon <?= esc($link['icon']); ?>"></em>
                                                    <span><?= esc($link['label']); ?></span>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
