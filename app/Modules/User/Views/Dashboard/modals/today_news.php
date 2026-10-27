<?php

use Config\Database;

$completion = is_array($accountCompletion ?? null) ? $accountCompletion : [];
$profileIncomplete = (bool) ($completion['should_display'] ?? false);

$db = Database::connect('default');
$marketNews = [];
try {
    $newsTable = $db->tableExists('bf_financial_news')
        ? 'bf_financial_news'
        : ($db->tableExists('financial_news') ? 'financial_news' : null);

    if ($newsTable) {
        $builder = $db->table($newsTable);
        if ($db->fieldExists('created_at', $newsTable)) {
            $builder->orderBy('created_at', 'DESC');
        } elseif ($db->fieldExists('date', $newsTable)) {
            $builder->orderBy('date', 'DESC');
        }
        $marketNews = $builder->limit(3)->get()->getResultArray();
    }
} catch (\Throwable $e) {
    $marketNews = [];
}

$todayDate = date('F j, Y');
$modalId = 'todayMarketNewsModal';
?>
<div class="modal fade" id="<?= esc($modalId) ?>" tabindex="-1" aria-labelledby="todayMarketNewsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <div class="d-flex align-items-center">
                    <span class="badge bg-primary me-2">Today's Briefing</span>
                    <h5 class="modal-title mb-0" id="todayMarketNewsModalLabel">Market Intelligence & News</h5>
                </div>
                <span class="text-muted small ms-auto me-3"><?= esc($todayDate) ?></span>
                <button type="button" class="btn-close js-dismiss-today-news" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php if (! empty($marketNews)) : ?>
                    <div class="list-group list-group-flush">
                        <?php foreach ($marketNews as $item) : ?>
                            <?php
                                $headline = $item['headline'] ?? $item['title'] ?? $item['summary'] ?? 'Market Update';
                                $summary = $item['summary'] ?? $item['description'] ?? $item['content'] ?? '';
                                $ticker = $item['ticker'] ?? $item['symbol'] ?? null;
                                $source = $item['source'] ?? 'MyMI Market Intelligence';
                                $url = $item['url'] ?? $item['link'] ?? '#';
                            ?>
                            <div class="list-group-item px-0 py-3">
                                <div class="d-flex justify-content-between align-items-start mb-1">
                                    <h6 class="mb-1 text-primary fw-bold"><?= esc((string) $headline) ?></h6>
                                    <?php if ($ticker) : ?>
                                        <span class="badge bg-dark ms-2"><?= esc((string) $ticker) ?></span>
                                    <?php endif; ?>
                                </div>
                                <p class="mb-1 text-muted small"><?= esc(character_limiter((string) $summary, 160)) ?></p>
                                <div class="d-flex justify-content-between align-items-center mt-2 small text-secondary">
                                    <span>Source: <?= esc((string) $source) ?></span>
                                    <?php if ($url && $url !== '#') : ?>
                                        <a href="<?= esc((string) $url, 'attr') ?>" target="_blank" rel="noopener noreferrer" class="link-primary">Read Full Story &rarr;</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else : ?>
                    <div class="text-center py-4">
                        <em class="icon ni ni-reports fs-1 text-muted mb-2 d-block"></em>
                        <h6 class="fw-bold">All Markets Monitored</h6>
                        <p class="text-muted small mb-0">No breaking financial alerts for today. Your portfolio watchlists and budget metrics are up to date.</p>
                    </div>
                <?php endif; ?>
            </div>
            <div class="modal-footer bg-light d-flex justify-content-between">
                <div class="form-check form-check-sm">
                    <input class="form-check-input" type="checkbox" id="dontShowNewsToday" checked>
                    <label class="form-check-label text-muted small" for="dontShowNewsToday">Don't show headlines again today</label>
                </div>
                <button type="button" class="btn btn-primary btn-sm js-dismiss-today-news" data-bs-dismiss="modal">
                    Continue to Dashboard &rarr;
                </button>
            </div>
        </div>
    </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
document.addEventListener('DOMContentLoaded', function () {
    var profileIncomplete = <?= json_encode($profileIncomplete) ?>;
    var todayKey = 'mymi_news_dismissed_' + (new Date()).toISOString().slice(0, 10);
    var dismissedToday = localStorage.getItem(todayKey) === 'true';

    if (!profileIncomplete && !dismissedToday) {
        var walkthroughEl = document.getElementById('onboardingWalkthroughModal');
        var completionEl = document.getElementById('accountCompletionModal');

        var isOtherModalActive = (walkthroughEl && walkthroughEl.classList.contains('show')) ||
                                 (completionEl && completionEl.classList.contains('show'));

        if (!isOtherModalActive && typeof bootstrap !== 'undefined') {
            var newsModalEl = document.getElementById('<?= esc($modalId) ?>');
            if (newsModalEl) {
                setTimeout(function () {
                    var modal = bootstrap.Modal.getOrCreateInstance(newsModalEl);
                    modal.show();
                }, 400);
            }
        }
    }

    document.querySelectorAll('.js-dismiss-today-news').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var checkbox = document.getElementById('dontShowNewsToday');
            if (!checkbox || checkbox.checked) {
                localStorage.setItem(todayKey, 'true');
            }
        });
    });
});
</script>
