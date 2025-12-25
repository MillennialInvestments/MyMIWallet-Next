<?php
$sectionTitles = $sectionTitles ?? [];
?>
<?= view('themes/public/how_it_works/_hero', ['hero' => $hero ?? []]); ?>
<?= view('themes/public/how_it_works/_nav', ['navItems' => $navItems ?? [], 'active' => $activePage ?? 'investing']); ?>
<?= view('themes/public/how_it_works/partials/_benefits', [
    'items'     => $whatYouGet ?? [],
    'title'     => $sectionTitles['benefitsTitle'] ?? 'What you get for investing',
    'subtitle'  => $sectionTitles['benefitsSubtitle'] ?? 'Portfolio visibility, analytics, and alerts built for everyday investors.',
]); ?>
<?= view('themes/public/how_it_works/partials/_steps', [
    'items'     => $howItWorks ?? [],
    'title'     => $sectionTitles['stepsTitle'] ?? 'How investing works in MyMI',
    'subtitle'  => $sectionTitles['stepsSubtitle'] ?? 'Connect holdings, analyze positions, and act from a single workspace.',
]); ?>
<?= view('themes/public/how_it_works/partials/_audiences', [
    'audiences' => $audiences ?? [],
    'title'     => $sectionTitles['audiencesTitle'] ?? 'Who will love this',
    'subtitle'  => $sectionTitles['audiencesSubtitle'] ?? 'From long-term planners to active traders, everyone gets clarity.',
]); ?>
<?= view('themes/public/how_it_works/partials/_cta', ['cta' => $cta ?? []]); ?>
<?= view('themes/public/how_it_works/partials/_faq', [
    'faqs'      => $faqs ?? [],
    'idPrefix'  => $faqIdPrefix ?? 'investing',
]); ?>
