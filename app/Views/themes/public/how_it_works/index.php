<?php
$sectionTitles = $sectionTitles ?? [];
?>
<?= view('themes/public/how_it_works/_hero', ['hero' => $hero ?? []]); ?>
<?= view('themes/public/how_it_works/_nav', ['navItems' => $navItems ?? [], 'active' => $activePage ?? 'overview']); ?>
<?= view('themes/public/how_it_works/partials/_benefits', [
    'items'     => $whatYouGet ?? [],
    'title'     => $sectionTitles['benefitsTitle'] ?? 'What you get',
    'subtitle'  => $sectionTitles['benefitsSubtitle'] ?? 'A quick look at the value you unlock with MyMI Wallet.',
]); ?>
<?= view('themes/public/how_it_works/partials/_steps', [
    'items'     => $howItWorks ?? [],
    'title'     => $sectionTitles['stepsTitle'] ?? 'How it works',
    'subtitle'  => $sectionTitles['stepsSubtitle'] ?? 'From sign-up to insights, here is how the flow comes together.',
]); ?>
<?= view('themes/public/how_it_works/partials/_audiences', [
    'audiences' => $audiences ?? [],
    'title'     => $sectionTitles['audiencesTitle'] ?? "Who's involved",
    'subtitle'  => $sectionTitles['audiencesSubtitle'] ?? 'Built for new investors, active traders, and teams alike.',
]); ?>
<?= view('themes/public/how_it_works/partials/_cta', ['cta' => $cta ?? []]); ?>
<?= view('themes/public/how_it_works/partials/_faq', [
    'faqs'      => $faqs ?? [],
    'idPrefix'  => $faqIdPrefix ?? 'how-it-works',
]); ?>
