<div class="card card-bordered mb-4">
    <div class="card-inner">
        <div class="row g-3">
            <div class="col">
                <h6 class="small text-muted">📝 Posts Today</h6>
                <h4 class="fw-bold"><?= count($todaysStory ?? []) ?></h4>
            </div>
            <div class="col">
                <h6 class="small text-muted">🏷️ Keywords Used</h6>
                <h4 class="fw-bold">
                    <?= array_sum(array_map(fn($s) => count(explode(',', $s['keywords'] ?? '')), $todaysStory ?? [])) ?>
                </h4>
            </div>
            <div class="col">
                <h6 class="small text-muted">📣 Avg. CTA Length</h6>
                <h4 class="fw-bold">
                    <?php 
                        $ctaLengths = array_filter(array_map(fn($s) => strlen($s['cta'] ?? ''), $todaysStory ?? []));
                        echo $ctaLengths ? round(array_sum($ctaLengths)/count($ctaLengths), 1) : '0';
                    ?>
                </h4>
            </div>
        </div>
    </div>
</div>
