<!-- app/Modules/Management/Views/Marketing/resources/ctaRecommenderModule.php -->
<div class="card card-bordered mb-4">
    <div class="card-inner">
        <h5 class="title mb-3">💡 Suggested CTAs</h5>
        <?php log_message('info', 'ctaRecommenderModule L5 - $todaysStory: ' . (print_r($todaysStory, true))); ?> 
        <?php foreach ($todaysStory as $summary): ?>
            <?php $summary = is_array($summary) ? $summary : (array) $summary; ?>
            <?php if (empty($summary['cta'])): ?>
                <div class="mb-3">
                    <h6><?= esc($summary['title']) ?></h6>
                    <p class="small text-muted"><?= esc(word_limiter($summary['summary'], 15)) ?></p>
                    <div class="alert alert-info">
                        Suggested CTA: <strong>👉 Learn more about <?= strtok($summary['title'], ' ') ?> today!</strong>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>

    </div>
</div>
