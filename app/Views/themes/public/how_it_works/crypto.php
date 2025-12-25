<?php
$sectionTitles = $sectionTitles ?? [];
?>
<?= view('themes/public/how_it_works/_hero', ['hero' => $hero ?? []]); ?>
<?= view('themes/public/how_it_works/_nav', ['navItems' => $navItems ?? [], 'active' => $activePage ?? 'crypto']); ?>
<?= view('themes/public/how_it_works/partials/_benefits', [
    'items'     => $whatYouGet ?? [],
    'title'     => $sectionTitles['benefitsTitle'] ?? 'What you get for crypto',
    'subtitle'  => $sectionTitles['benefitsSubtitle'] ?? 'Track wallets, swaps, and valuations alongside your traditional accounts.',
]); ?>
<?= view('themes/public/how_it_works/partials/_steps', [
    'items'     => $howItWorks ?? [],
    'title'     => $sectionTitles['stepsTitle'] ?? 'How crypto tracking works',
    'subtitle'  => $sectionTitles['stepsSubtitle'] ?? 'Stay organized with pricing, alerts, and safety cues.',
]); ?>
<?= view('themes/public/how_it_works/partials/_audiences', [
    'audiences' => $audiences ?? [],
    'title'     => $sectionTitles['audiencesTitle'] ?? 'Who it helps',
    'subtitle'  => $sectionTitles['audiencesSubtitle'] ?? 'Crypto newcomers, hybrid investors, and anyone watching tokenized assets.',
]); ?>
<?= view('themes/public/how_it_works/partials/_cta', ['cta' => $cta ?? []]); ?>
<?= view('themes/public/how_it_works/partials/_faq', [
    'faqs'      => $faqs ?? [],
    'idPrefix'  => $faqIdPrefix ?? 'crypto',
]); ?>
