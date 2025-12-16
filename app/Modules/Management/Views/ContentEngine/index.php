<?php
$ingests = $contentEngine['ingests'] ?? [];
$latestIngestId = $contentEngine['latest_ingest_id'] ?? null;
?>
<div class="card card-bordered mb-3">
    <div class="card-inner">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <div>
                <h5 class="mb-1">Daily Scanner Content</h5>
                <p class="text-soft mb-0">Top gainers → scoring → drafts → posts. Tokens: TradingView, StockTwits, TikTok, YouTube, Facebook, Discord.</p>
            </div>
            <div class="btn-group">
                <button class="btn btn-primary" id="ce-run-latest" data-ingest="<?= esc($latestIngestId); ?>">Generate Drafts</button>
                <button class="btn btn-outline-primary" id="ce-run-cron">Run Daily (CRON)</button>
            </div>
        </div>
        <div class="table-responsive mb-3">
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Scan</th>
                        <th>Quote Time</th>
                        <th>Status</th>
                        <th>Rows</th>
                        <th>T1/T2/T3/Avoid</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ingests as $bundle): $ingest = $bundle['ingest']; ?>
                        <tr class="ce-ingest-row" data-ingest-id="<?= esc($ingest['id']); ?>">
                            <td>#<?= esc($ingest['id']); ?></td>
                            <td><?= esc($ingest['scan_name']); ?></td>
                            <td><?= esc($ingest['quote_ts'] ?? 'n/a'); ?></td>
                            <td><span class="badge bg-light text-dark"><?= esc($ingest['status']); ?></span></td>
                            <td><?= esc($ingest['row_count']); ?></td>
                            <td>
                                <span class="text-success"><?= (int)($bundle['tiers']['tier1'] ?? 0); ?></span> /
                                <span class="text-primary"><?= (int)($bundle['tiers']['tier2'] ?? 0); ?></span> /
                                <span class="text-info"><?= (int)($bundle['tiers']['tier3'] ?? 0); ?></span> /
                                <span class="text-muted"><?= (int)($bundle['tiers']['avoid'] ?? 0); ?></span>
                            </td>
                            <td class="text-nowrap">
                                <button class="btn btn-xs btn-outline-primary ce-process" data-ingest="<?= esc($ingest['id']); ?>">Generate Drafts</button>
                                <?php if (! empty($bundle['preview_post_id'])): ?>
                                    <button class="btn btn-xs btn-outline-secondary ce-preview" data-post="<?= esc($bundle['preview_post_id']); ?>">Preview Drafts</button>
                                <?php else: ?>
                                    <button class="btn btn-xs btn-outline-secondary" disabled>Preview Drafts</button>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            <ul class="nav nav-tabs" id="ce-tier-nav">
                <li class="nav-item"><a href="#" class="nav-link active" data-tier="tier1">Tier 1</a></li>
                <li class="nav-item"><a href="#" class="nav-link" data-tier="tier2">Tier 2</a></li>
                <li class="nav-item"><a href="#" class="nav-link" data-tier="tier3">Tier 3</a></li>
                <li class="nav-item"><a href="#" class="nav-link" data-tier="avoid">Avoid</a></li>
            </ul>
            <div class="card card-bordered mt-2">
                <div class="card-inner" id="ce-idea-list">
                    <p class="text-soft mb-0">Select an ingest row above to view ideas.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
(function() {
    const tierNav = document.getElementById('ce-tier-nav');
    const ideaList = document.getElementById('ce-idea-list');
    let activeIngest = document.querySelector('.ce-ingest-row')?.dataset.ingestId || '<?= esc($latestIngestId); ?>';
    let activeTier = 'tier1';

    function renderIdeas(items) {
        if (!items || items.length === 0) {
            ideaList.innerHTML = '<p class="text-soft mb-0">No ideas available for this tier.</p>';
            return;
        }
        const html = items.map(item => {
            const reasons = (item.reasons || []).map(reason => `<li>${reason}</li>`).join('');
            return `<div class="border-bottom pb-2 mb-2"><div class="d-flex justify-content-between"><strong>${item.symbol}</strong><span class="badge bg-light text-dark">${item.tier} · ${item.score_total}</span></div><ul class="small mb-1">${reasons}</ul><div class="small text-soft">Platforms: ${(item.recommended_platforms || item.platforms || []).join(', ')}</div></div>`;
        }).join('');
        ideaList.innerHTML = html;
    }

    function loadIdeas() {
        if (!activeIngest) { return; }
        fetch(`/API/ContentEngine/topIdeas?ingest_id=${activeIngest}&tier=${activeTier}`)
            .then(resp => resp.json())
            .then(renderIdeas)
            .catch(() => { ideaList.innerHTML = '<p class="text-danger mb-0">Failed to load ideas.</p>'; });
    }

    tierNav?.addEventListener('click', function (e) {
        if (e.target.dataset?.tier) {
            e.preventDefault();
            tierNav.querySelectorAll('.nav-link').forEach(el => el.classList.remove('active'));
            e.target.classList.add('active');
            activeTier = e.target.dataset.tier;
            loadIdeas();
        }
    });

    document.querySelectorAll('.ce-ingest-row').forEach(function(row) {
        row.addEventListener('click', function() {
            activeIngest = this.dataset.ingestId;
            loadIdeas();
        });
    });

    document.querySelectorAll('.ce-process').forEach(function(btn) {
        btn.addEventListener('click', function(e) {
            e.stopPropagation();
            const ingestId = this.dataset.ingest;
            fetch(`/API/ContentEngine/processIngest/${ingestId}`, {method: 'POST'})
                .then(resp => resp.json())
                .then(() => {
                    loadIdeas();
                    alert('Drafts generated for ingest ' + ingestId);
                })
                .catch(() => alert('Failed to process ingest.'));
        });
    });

    document.querySelectorAll('.ce-preview').forEach(function(btn) {
        btn.addEventListener('click', function(e) {
            e.stopPropagation();
            const postId = this.dataset.post;
            if (!postId) { return; }
            if (typeof window.dynamicModalLoader === 'function') {
                window.dynamicModalLoader('Content Engine', `/Management/ContentEngine/previewPost/${postId}`, 'modal-lg');
            } else {
                window.location.href = `/Management/ContentEngine/previewPost/${postId}`;
            }
        });
    });

    document.getElementById('ce-run-latest')?.addEventListener('click', function() {
        const ingestId = this.dataset.ingest;
        if (!ingestId) { return; }
        fetch(`/API/ContentEngine/processIngest/${ingestId}`, {method: 'POST'})
            .then(resp => resp.json())
            .then(() => loadIdeas())
            .catch(() => alert('Failed to run ingest.'));
    });

    document.getElementById('ce-run-cron')?.addEventListener('click', function() {
        fetch('/API/ContentEngine/runDaily', {method: 'POST'})
            .then(resp => resp.json())
            .then(() => loadIdeas())
            .catch(() => alert('Failed to trigger daily run.'));
    });

    loadIdeas();
})();
</script>