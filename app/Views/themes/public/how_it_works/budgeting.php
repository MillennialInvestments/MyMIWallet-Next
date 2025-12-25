<?php
$sectionTitles = $sectionTitles ?? [];
?>
<?= view('themes/public/how_it_works/_hero', ['hero' => $hero ?? []]); ?>
<?= view('themes/public/how_it_works/_nav', ['navItems' => $navItems ?? [], 'active' => $activePage ?? 'budgeting']); ?>
<?= view('themes/public/how_it_works/partials/_benefits', [
    'items'     => $whatYouGet ?? [],
    'title'     => $sectionTitles['benefitsTitle'] ?? 'What you get for budgeting',
    'subtitle'  => $sectionTitles['benefitsSubtitle'] ?? 'Budget templates, automation, and coaching signals that keep spending on track.',
]); ?>
<?= view('themes/public/how_it_works/partials/_steps', [
    'items'     => $howItWorks ?? [],
    'title'     => $sectionTitles['stepsTitle'] ?? 'How budgeting works',
    'subtitle'  => $sectionTitles['stepsSubtitle'] ?? 'Set targets, sync accounts, and get alerted before you overspend.',
]); ?>
<?= view('themes/public/how_it_works/partials/_audiences', [
    'audiences' => $audiences ?? [],
    'title'     => $sectionTitles['audiencesTitle'] ?? 'Who benefits most',
    'subtitle'  => $sectionTitles['audiencesSubtitle'] ?? 'Great for new budgeters, side-hustlers, and households that share spending.',
]); ?>
<?= view('themes/public/how_it_works/partials/_cta', ['cta' => $cta ?? []]); ?>
<?= view('themes/public/how_it_works/partials/_faq', [
    'faqs'      => $faqs ?? [],
    'idPrefix'  => $faqIdPrefix ?? 'budgeting',
]); ?>
