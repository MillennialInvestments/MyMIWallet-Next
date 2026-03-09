<?php
$faqs = $faqs ?? [];
$idPrefix = $idPrefix ?? 'faq';
?>
<section class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-lg-8 text-center">
                <h2 class="h1">Frequently asked questions</h2>
                <p class="text-muted mb-0">Answers for the most common things people ask about this page.</p>
            </div>
        </div>
        <div class="accordion" id="<?= esc($idPrefix, 'attr') ?>-accordion">
            <?php foreach ($faqs as $index => $faq): 
                $collapseId = $idPrefix . '-item-' . $index;
                $headingId  = $collapseId . '-heading';
                $isFirst    = $index === 0;
            ?>
                <div class="card">
                    <div class="card-header" id="<?= esc($headingId, 'attr') ?>">
                        <h5 class="mb-0">
                            <button class="btn btn-link <?= $isFirst ? '' : 'collapsed' ?>" type="button" data-bs-toggle="collapse" data-bs-target="#<?= esc($collapseId, 'attr') ?>" aria-expanded="<?= $isFirst ? 'true' : 'false' ?>" aria-controls="<?= esc($collapseId, 'attr') ?>">
                                <?= esc($faq['question'] ?? 'Question') ?>
                            </button>
                        </h5>
                    </div>
                    <div id="<?= esc($collapseId, 'attr') ?>" class="collapse <?= $isFirst ? 'show' : '' ?>" aria-labelledby="<?= esc($headingId, 'attr') ?>" data-parent="#<?= esc($idPrefix, 'attr') ?>-accordion">
                        <div class="card-body text-muted">
                            <?= esc($faq['answer'] ?? 'Answer') ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
