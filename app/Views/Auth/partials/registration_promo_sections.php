<?php
$registrationSourceContent = is_array($registrationSourceContent ?? null) ? $registrationSourceContent : [];
$sections = is_array($registrationSourceContent['promo_sections'] ?? null) ? $registrationSourceContent['promo_sections'] : [];
if (! ($registrationSourceContent['promo_enabled'] ?? false) || $sections === []) {
    return;
}
?>
<div class="register-promo-sections mt-4">
    <?php foreach ($sections as $section) : ?>
        <div class="card shadow-sm mb-3">
            <div class="card-body">
                <h3 class="h5 mb-2"><?= esc((string) ($section['title'] ?? '')) ?></h3>
                <?php if (! empty($section['description'])) : ?>
                    <p class="text-muted mb-3"><?= esc((string) $section['description']) ?></p>
                <?php endif; ?>

                <?php $cards = is_array($section['cards'] ?? null) ? $section['cards'] : []; ?>
                <?php if ($cards !== []) : ?>
                    <div class="row g-3">
                        <?php foreach ($cards as $card) : ?>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="border rounded p-3 h-100">
                                    <h4 class="h6"><?= esc((string) ($card['title'] ?? '')) ?></h4>
                                    <p class="small text-muted mb-0"><?= esc((string) ($card['body'] ?? '')) ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <?php $ctas = is_array($section['ctas'] ?? null) ? $section['ctas'] : []; ?>
                <?php if ($ctas !== []) : ?>
                    <div class="d-flex flex-wrap gap-2 mt-3">
                        <?php foreach ($ctas as $cta) : ?>
                            <?php
                            $url = site_url(ltrim((string) ($cta['url'] ?? '/login'), '/'));
                            $variant = (string) ($cta['variant'] ?? 'primary');
                            ?>
                            <a class="btn btn-<?= esc($variant) ?> btn-sm" href="<?= esc($url) ?>"><?= esc((string) ($cta['label'] ?? 'Learn more')) ?></a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>
