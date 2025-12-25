<?php
$sectionTitles = $sectionTitles ?? [];
?>
<?= view('themes/public/how_it_works/_hero', ['hero' => $hero ?? []]); ?>
<?= view('themes/public/how_it_works/_nav', ['navItems' => $navItems ?? [], 'active' => $activePage ?? 'projects']); ?>
<?= view('themes/public/how_it_works/partials/_benefits', [
    'items'     => $whatYouGet ?? [],
    'title'     => $sectionTitles['benefitsTitle'] ?? 'What you get for projects',
    'subtitle'  => $sectionTitles['benefitsSubtitle'] ?? 'Structure initiatives, track commitments, and keep everyone aligned.',
]); ?>
<?= view('themes/public/how_it_works/partials/_steps', [
    'items'     => $howItWorks ?? [],
    'title'     => $sectionTitles['stepsTitle'] ?? 'How projects work',
    'subtitle'  => $sectionTitles['stepsSubtitle'] ?? 'Set up a project, invite collaborators, and track progress.',
]); ?>
<?= view('themes/public/how_it_works/partials/_audiences', [
    'audiences' => $audiences ?? [],
    'title'     => $sectionTitles['audiencesTitle'] ?? 'Who thrives here',
    'subtitle'  => $sectionTitles['audiencesSubtitle'] ?? 'Builders, partners, and communities coordinating investments.',
]); ?>
<?= view('themes/public/how_it_works/partials/_cta', ['cta' => $cta ?? []]); ?>
<?= view('themes/public/how_it_works/partials/_faq', [
    'faqs'      => $faqs ?? [],
    'idPrefix'  => $faqIdPrefix ?? 'projects',
]); ?>
