<?php if (!empty($todaysStory)) : ?>
    <div class="row" id="generatedSummariesBlock">
        <?php foreach ($todaysStory as $summary) : ?>
            <div class="col-md-6 mb-4">
                <div class="card card-bordered h-100 shadow-sm">
                    <div class="card-inner d-flex flex-column">
                        <h6><?= esc($summary['title']) ?></h6>
                        <p class="text-muted small"><?= date('F j, Y g:i A', strtotime($summary['created_at'])) ?></p>
                        <p><?= esc($summary['summary']) ?></p>

                        <?php if (!empty($summary['keywords'])): ?>
                            <div class="mt-2">
                                <strong>Tags:</strong>
                                <?php foreach (explode(',', $summary['keywords']) as $tag): ?>
                                    <span class="badge bg-light text-dark">#<?= trim($tag) ?></span>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($summary['cta'])): ?>
                            <div class="alert alert-primary mt-2"><strong>CTA:</strong> <?= esc($summary['cta']) ?></div>
                        <?php endif; ?>

                        <a class="btn btn-primary btn-sm mt-auto dynamicModalLoader" 
                           href="javascript:void(0);" 
                           data-formtype="Marketing" 
                           data-endpoint="PreviewGeneratedPost" 
                           data-accountid="<?= $summary['id'] ?>">
                            🔍 Preview Post
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else : ?>
    <div class="alert alert-warning">⚠️ No summaries found for today.</div>
<?php endif; ?>
