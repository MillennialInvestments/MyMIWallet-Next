<?php
$currentSlug = $currentSlug ?? null;
$howItWorksNavItems = array (
  0 =>
  array (
    'name' => 'Daily_Financial_News',
    'label' => 'Daily Financial News',
    'slug' => 'daily-financial-news',
    'href' => '/How-It-Works/daily-financial-news',
    'source' => 'view',
  ),
  1 =>
  array (
    'name' => 'Determining_Your_Financial_Goals',
    'label' => 'Determining Your Financial Goals',
    'slug' => 'determining-your-financial-goals',
    'href' => '/How-It-Works/determining-your-financial-goals',
    'source' => 'view',
  ),
  2 =>
  array (
    'name' => 'Discord',
    'label' => 'Discord',
    'slug' => 'discord',
    'href' => '/How-It-Works/discord',
    'source' => 'view',
  ),
  3 =>
  array (
    'name' => 'Features_And_Plans',
    'label' => 'Features And Plans',
    'slug' => 'features-and-plans',
    'href' => '/How-It-Works/features-and-plans',
    'source' => 'view',
  ),
  4 =>
  array (
    'name' => 'financial-forecasting',
    'label' => 'Financial Forecasting',
    'slug' => 'financial-forecasting',
    'href' => '/How-It-Works/financial-forecasting',
    'source' => 'docs',
  ),
  5 =>
  array (
    'name' => 'financial-goals',
    'label' => 'Financial Goals',
    'slug' => 'financial-goals',
    'href' => '/How-It-Works/financial-goals',
    'source' => 'docs',
  ),
  6 =>
  array (
    'name' => 'investment-portfolio-management',
    'label' => 'Investment Portfolio Management',
    'slug' => 'investment-portfolio-management',
    'href' => '/How-It-Works/investment-portfolio-management',
    'source' => 'docs',
  ),
  7 =>
  array (
    'name' => 'Manage_Finances',
    'label' => 'Manage Finances',
    'slug' => 'manage-finances',
    'href' => '/How-It-Works/manage-finances',
    'source' => 'view',
  ),
  8 =>
  array (
    'name' => 'mymi-gold',
    'label' => 'MyMI Gold',
    'slug' => 'mymi-gold',
    'href' => '/How-It-Works/mymi-gold',
    'source' => 'docs',
  ),
  9 =>
  array (
    'name' => 'options-trading',
    'label' => 'Options Trading',
    'slug' => 'options-trading',
    'href' => '/How-It-Works/options-trading',
    'source' => 'docs',
  ),
  10 =>
  array (
    'name' => 'personal-budgeting',
    'label' => 'Personal Budgeting',
    'slug' => 'personal-budgeting',
    'href' => '/How-It-Works/personal-budgeting',
    'source' => 'docs',
  ),
  11 =>
  array (
    'name' => 'portfolio-diversification',
    'label' => 'Portfolio Diversification',
    'slug' => 'portfolio-diversification',
    'href' => '/How-It-Works/portfolio-diversification',
    'source' => 'docs',
  ),
  12 =>
  array (
    'name' => 'Purchase_MyMI_Gold',
    'label' => 'Purchase MyMI Gold',
    'slug' => 'purchase-mymi-gold',
    'href' => '/How-It-Works/purchase-mymi-gold',
    'source' => 'view',
  ),
  13 =>
  array (
    'name' => 'Registering_An_Account',
    'label' => 'Registering An Account',
    'slug' => 'registering-an-account',
    'href' => '/How-It-Works/registering-an-account',
    'source' => 'view',
  ),
  14 =>
  array (
    'name' => 'Streaming',
    'label' => 'Streaming',
    'slug' => 'streaming',
    'href' => '/How-It-Works/streaming',
    'source' => 'view',
  ),
);

?>
<ul class="how-it-works-nav list-unstyled">
    <?php foreach ($howItWorksNavItems as $item): ?>
        <li class="mb-2">
            <a class="<?= ($currentSlug === $item['slug']) ? 'fw-bold' : '' ?>" href="<?= esc($item['href']) ?>">
                <?= esc($item['label']) ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
