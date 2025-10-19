<?php if (!empty($todaysStory)) : ?>
    <?php foreach ($todaysStory as $summary) : ?>
        <div class="col-md-6 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title"><?= esc($summary['title']) ?></h5>
                    <p class="card-text"><?= character_limiter(strip_tags($summary['summary']), 150) ?></p>
                    <p class="text-muted small"><?= date('F j, Y g:i A', strtotime($summary['created_at'])) ?></p>
                    <button class="btn btn-sm btn-outline-primary" onclick="dynamicModalLoader('<?= site_url('API/Marketing/PreviewGeneratedPost/' . $summary['id']) ?>')">
                        🔍 Preview Post
                    </button>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php else : ?>
    <div class="col-12">
        <div class="alert alert-warning text-center">⚠️ No summaries found for today.</div>
    </div>
<?php endif; ?>
