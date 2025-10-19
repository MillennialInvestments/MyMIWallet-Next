<?php
/**
 * app/Modules/Management/Views/Marketing/resources/generatedSummaries.php
 */
// Ensure $firstId is always defined (0 if no summaries)
if (! empty($todaysStory) && isset($todaysStory[0])) {
    $firstSummary = $todaysStory[0];
    if (is_array($firstSummary)) {
        $firstId = $firstSummary['id'] ?? 0;
    } else {
        $firstId = $firstSummary->id ?? 0;
    }
} else {
    $firstId = 0;
}
?>

<div class="nk-block">
    <div class="nk-block-head">
        <div class="nk-block-head-content d-flex justify-content-between align-items-center">
            <h4 class="nk-block-title">📢 Generated Marketing Summaries</h4>
            <div class="d-flex justify-content-end mt-3">
                <label class="form-check form-switch ml-2">
                    <input
                        type="checkbox"
                        class="form-check-input btn btn-lg"
                        id="liveModeToggle"
                    >
                    <span class="form-check-label">Live Mode</span>
                </label>
            </div>
        </div>
        <p class="text-soft">
            This section shows finalized summaries ready for distribution across platforms.
            <?php if (! empty($defaultKeyword)) : ?>
                <span class="badge bg-primary ms-2">🔍 Filtered by "<?= esc($defaultKeyword) ?>"</span>
            <?php endif; ?>
        </p>
    </div>

    <!-- Keyword Filter Input -->
    <div class="input-group mb-3">
        <input
            type="text"
            id="keywordFilterInput"
            class="form-control"
            placeholder="🔍 Filter by keyword..."
        >
        <button
            class="btn btn-outline-secondary"
            type="button"
            onclick="filterSummariesByKeyword()"
        >Apply</button>
        <button
            class="btn btn-outline-danger"
            type="button"
            onclick="clearKeywordFilter()"
        >Clear</button>
    </div>

    <!-- Summaries Grid -->
    <div class="row" id="generatedSummariesBlock">
        <?php if (! empty($todaysStory)) : ?>
                <?php
                // Precompute the first summary ID (for Chart.js fetch default)
                $firstSummary = $todaysStory[0];
                $firstId      = is_array($firstSummary)
                    ? ($firstSummary['id'] ?? 0)
                    : ($firstSummary->id    ?? 0);
                ?>

                <?php foreach ($todaysStory as $summary): ?>
                <?php
                // Extract fields (array or object)
                $title       = is_array($summary)
                    ? ($summary['title']      ?? '')
                    : ($summary->title        ?? '');
                $summaryText = is_array($summary)
                    ? ($summary['summary']    ?? '')
                    : ($summary->summary      ?? '');
                // Skip if summary text is empty/too short
                if (! $summaryText || mb_strlen(trim($summaryText)) < 15) {
                    continue;
                }
                $keywords  = is_array($summary)
                    ? ($summary['keywords']   ?? '')
                    : ($summary->keywords     ?? '');
                $cta       = is_array($summary)
                    ? ($summary['cta']        ?? '')
                    : ($summary->cta         ?? '');
                $id        = is_array($summary)
                    ? ($summary['id']         ?? 0)
                    : ($summary->id           ?? 0);
                $created   = is_array($summary)
                    ? ($summary['created_at'] ?? '')
                    : ($summary->created_at   ?? '');
                ?>
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body d-flex flex-column">
                            <h6 class="title mb-1"><?= esc(mb_decode_mimeheader($title)) ?></h6>
                            <p class="text-soft small mb-2">
                                <?= date('F j, Y g:i A', strtotime($created)) ?>
                            </p>
                            <div class="mb-2 small">
                                <?php
                                    $cleanSummary = preg_replace('/=\r?\n|\r|\n|=3D/', '', $summaryText);
                                    $maxLength = 250;
                                    $preview = mb_strlen($cleanSummary) > $maxLength
                                        ? mb_substr($cleanSummary, 0, $maxLength) . '...'
                                        : $cleanSummary;
                                    echo esc($preview);
                                ?>
                            </div>
                            <div class="mb-2 small">
                                <?= format_summary_preview($summaryText, 250) ?>
                            </div>

                            <?php if (! empty(trim($keywords)) && $keywords !== '[]'): ?>
                                <div class="mb-2 small text-muted" id="hashtag-block-<?= $id ?>">
                                    <strong>#Tags:</strong>
                                    <?php foreach (explode(',', $keywords) as $tag): ?>
                                        <?php $tag = trim($tag); ?>
                                        <?php if ($tag !== ''): ?>
                                            <span class="badge bg-light me-1 text-dark">
                                                #<?= esc($tag) ?>
                                            </span>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>

                            <?php if (! empty($cta)): ?>
                                <div class="small text-primary mb-2">
                                    <strong>📣 CTA:</strong> <?= esc($cta) ?>
                                </div>
                            <?php endif; ?>

                            <!-- Dynamic Preview Buttons Inline -->
                            <div class="d-flex gap-2 mt-auto">
                                <button class="btn btn-primary btn-sm dynamicModalLoader"
                                        data-formtype="Marketing"
                                        data-endpoint="previewGeneratedPost"
                                        data-accountid="<?= $summary['id']; ?>">
                                    🔍 Preview Post
                                </button>

                                <button class="btn btn-outline-secondary btn-sm dynamicModalLoader"
                                        data-formtype="Marketing"
                                        data-endpoint="generatePostMedia"
                                        data-accountid="<?= $summary['id']; ?>">
                                    📄 Generate Content
                                </button>  
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        <?php else: ?>
            <div class="col-12">
                <div class="alert alert-warning">
                    ⚠️ No summaries available. Click "Generate Today’s Content" to begin.
                </div>
            </div>
        <?php endif; ?>
    </div>

    <!-- Top Keywords Chart -->
    <div class="card mt-4">
        <div
            class="card-header bg-primary text-white"
            style="background-color: #3E61BC !important;"
        >
            <strong>Top Keywords Insight</strong>
        </div>
        <div class="card-body">
            <canvas id="tfidfChart" width="100%" height="300"></canvas>
        </div>
    </div>
</div>

<!-- Preview Modal -->
<div
    class="modal fade"
    id="previewPostModal"
    tabindex="-1"
    aria-labelledby="previewPostModalLabel"
    aria-hidden="true"
>
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="previewPostModalLabel">🔍 Post Preview</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body" id="previewPostContent">
                <div class="text-center my-5">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="<?= base_url('assets/vendor/chart.js/2.1.2/Chart.min.js'); ?>" <?= $nonce['script'] ?? '' ?>></script>
<script <?= $nonce['script'] ?? '' ?>>
document.addEventListener("DOMContentLoaded", function () {
    const ctx = document.getElementById('tfidfChart').getContext('2d');
    const defaultSummaryId = <?= json_encode(intval($firstId)) ?>;

    // Only fetch the chart if we have a valid summary ID
    if (defaultSummaryId > 0) {
        fetch('<?= site_url("API/Marketing/getTopKeywordChart") ?>/' + defaultSummaryId)
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success' && Array.isArray(data.labels) && Array.isArray(data.scores)) {
                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: data.labels,
                            datasets: [{
                                label: 'TF-IDF Score',
                                data: data.scores,
                                backgroundColor: '#3E61BC'
                            }]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                } else {
                    ctx.canvas.parentNode.innerHTML =
                        "<p class='text-danger'>Failed to load chart data.</p>";
                }
            })
            .catch(error => {
                console.error("Error loading chart:", error);
                ctx.canvas.parentNode.innerHTML =
                    "<p class='text-danger'>Chart error.</p>";
            });
    } else {
        // No valid summary ID, show a placeholder message
        ctx.canvas.parentNode.innerHTML =
            "<p class='text-muted'>No chart available (no summaries yet).</p>";
    }
});
</script>

<script <?= $nonce['script'] ?? '' ?>>
/**
 * dynamicModalLoader(url):
 *   Fetches preview HTML (JSON) for a given post,
 *   then injects it into the #previewPostContent and shows the modal.
 */
function dynamicModalLoader(url) {
    const modalElement = document.getElementById('previewPostModal');
    const modal = new bootstrap.Modal(modalElement);
    const content = document.getElementById('previewPostContent');

    // Immediately show spinner
    content.innerHTML = `
        <div class="text-center my-5">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    `;
    modal.show();

    fetch(url)
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success' && data.html) {
                content.innerHTML = data.html;
            } else {
                content.innerHTML = `
                    <div class="alert alert-danger">
                        ❌ Failed to load preview. Please try again.
                    </div>
                `;
            }
        })
        .catch(err => {
            console.error('Error loading preview:', err);
            content.innerHTML = `
                <div class="alert alert-danger">
                    ❌ Error loading preview. Please try again.
                </div>
            `;
        });
}
</script>

<script <?= $nonce['script'] ?? '' ?>>
/**
 * LIVE MODE: Automatically refresh the "generatedSummariesBlock" every 30s
 * if #liveModeToggle is checked.
 */
const liveToggle = document.getElementById('liveModeToggle');
const summariesBlock = document.getElementById('generatedSummariesBlock');
const spinnerHtml = `
    <div class="text-center w-100 my-5">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
`;
let liveInterval = null;

if (liveToggle && summariesBlock) {
    liveToggle.addEventListener('change', () => {
        if (liveToggle.checked) {
            // Immediately refresh once
            refreshGeneratedSummaries();
            // Then set 30s interval
            liveInterval = setInterval(refreshGeneratedSummaries, 30000);
        } else {
            clearInterval(liveInterval);
        }
    });
}

async function refreshGeneratedSummaries() {
    summariesBlock.innerHTML = spinnerHtml;

    try {
        const response = await fetch('<?= site_url("API/Marketing/fetchGeneratedSummariesJson") ?>');
        const data = await response.json();

        if (data.status !== 'success') {
            summariesBlock.innerHTML = `
                <div class="alert alert-warning">⚠️ ${data.message}</div>
            `;
            return;
        }

        // Clear block, re-render each summary
        const trendingKeywords = {};
        summariesBlock.innerHTML = '';

        data.summaries.forEach(summary => {
            // For each summary, construct a card
            const card = renderSummaryCard(summary);
            summariesBlock.appendChild(card);

            // Collect tags for trending
            if (summary.keywords) {
                summary.keywords.split(',').forEach(keyword => {
                    keyword = keyword.trim();
                    if (keyword) {
                        trendingKeywords[keyword] = (trendingKeywords[keyword] || 0) + 1;
                    }
                });
            }
        });

        renderTrendingKeywords(trendingKeywords);
        filterSummariesByKeyword();
    } catch (err) {
        console.error('Live refresh failed:', err);
        summariesBlock.innerHTML = `
            <div class="alert alert-danger">
                🚨 Failed to refresh summaries.
            </div>
        `;
    }
}

/**
 * Builds a single summary card (DOM element) from JSON data.
 */
function renderSummaryCard(summary) {
    const col = document.createElement('div');
    col.className = 'col-lg-4 col-md-6 mb-4';

    const card = document.createElement('div');
    card.className = 'card h-100 shadow-sm';

    const cardBody = document.createElement('div');
    cardBody.className = 'card-body d-flex flex-column';

    // Title
    const title = document.createElement('h6');
    title.className = 'mb-1 title';
    title.innerText = summary.title || '';

    // Date
    const date = document.createElement('p');
    date.className = 'text-soft small mb-2';
    date.innerText = new Date(summary.created_at).toLocaleString();

    // Summary Text
    const summaryText = document.createElement('div');
    summaryText.className = 'mb-2 small';
    summaryText.innerText = summary.summary || '';

    // Hashtags
    const hashtagsBlock = document.createElement('div');
    hashtagsBlock.className = 'mb-2 small text-muted';
    hashtagsBlock.id = 'hashtag-block-' + summary.id;
    if (summary.keywords) {
        const tagsHtml = summary.keywords.split(',').map(tag => {
            tag = tag.trim();
            if (tag !== '') {
                return `<span class="badge bg-light me-1 text-dark">#${tag}</span>`;
            }
            return '';
        }).join(' ');
        hashtagsBlock.innerHTML = `<strong>#Tags:</strong> ${tagsHtml}`;
    }

    // CTA
    const ctaBlock = document.createElement('div');
    if (summary.cta) {
        ctaBlock.className = 'mb-2 small text-primary';
        ctaBlock.innerHTML = `<strong>📣 CTA:</strong> ${summary.cta}`;
    }

    // Preview Button
    const previewBtn = document.createElement('button');
    previewBtn.type = 'button';
    previewBtn.className = 'btn btn-primary btn-sm mt-auto';
    previewBtn.innerHTML = '🔍 Preview Post';
    // Build the URL via PHP + JavaScript concatenation
    previewBtn.onclick = () => {
        const url = '<?= site_url("Management/Marketing/previewGeneratedPost") ?>/' + summary.id;
        dynamicModalLoader(url);
    };

    // Assemble
    cardBody.append(title, date, summaryText, hashtagsBlock, ctaBlock, previewBtn);
    card.append(cardBody);
    col.append(card);
    return col;
}

/**
 * Renders the top 5 trending keywords beneath the header.
 */
function renderTrendingKeywords(trendingKeywords) {
    const trendingAreaId = 'trending-keywords-strip';
    let trendingArea = document.getElementById(trendingAreaId);

    if (! trendingArea) {
        // Insert right under the block head content
        const header = document.querySelector('.nk-block-head-content');
        trendingArea = document.createElement('div');
        trendingArea.id = trendingAreaId;
        trendingArea.className = 'text-soft small mt-2';
        header.appendChild(trendingArea);
    }

    const topKeywords = Object.entries(trendingKeywords)
        .sort(([, a], [, b]) => b - a)
        .slice(0, 5)
        .map(([word]) => `<span class="badge bg-info text-dark me-1">#${word}</span>`)
        .join(' ');

    trendingArea.innerHTML = `<strong>📈 Trending:</strong> ${topKeywords || 'No trending keywords yet'}`;
}

/**
 * filterSummariesByKeyword():
 *   Hides or shows each summary card if it does not contain the keyword
 *   in its title, body text, or hashtags.
 */
function filterSummariesByKeyword() {
    const keyword = document.getElementById('keywordFilterInput').value
        .toLowerCase()
        .trim();
    const cards = document.querySelectorAll('#generatedSummariesBlock .col-md-6, #generatedSummariesBlock .col-lg-4');

    cards.forEach(card => {
        const title = card.querySelector('h6.title')?.innerText.toLowerCase() || '';
        const body  = card.querySelector('.mb-2.small')?.innerText.toLowerCase()  || '';
        const tagsBlock = card.querySelector('[id^="hashtag-block-"]');
        const tags = tagsBlock ? tagsBlock.innerText.toLowerCase() : '';

        const match = keyword === '' 
            || title.includes(keyword)
            || body.includes(keyword)
            || tags.includes(keyword);

        card.style.display = match ? '' : 'none';
    });
}

/**
 * clearKeywordFilter():
 *   Clears the input and re‐shows all cards.
 */
function clearKeywordFilter() {
    document.getElementById('keywordFilterInput').value = '';
    filterSummariesByKeyword();
}

/**
 * On page load, pre‐populate the keyword filter from either:
 *   1) A query‐string ?keyword=foo
 *   2) A URL segment /Search/Marketing/{keyword}
 *   3) Or else $defaultKeyword from PHP
 */
document.addEventListener("DOMContentLoaded", () => {
    const keywordInput = document.getElementById('keywordFilterInput');
    const params       = new URLSearchParams(window.location.search);
    const keywordParam = params.get('keyword') || '';

    // Check for a URL‐path‐based search: e.g. /Search/Marketing/foo
    const pathSegments = window.location.pathname.split('/').filter(Boolean);
    let keywordFromPath = '';

    if (pathSegments.includes('Search')) {
        const idx       = pathSegments.indexOf('Search');
        const value     = pathSegments[idx + 2] || '';
        keywordFromPath = decodeURIComponent(value);
    }

    // Fallback to PHP $defaultKeyword if no other source
    const finalKeyword = keywordParam || keywordFromPath || <?= json_encode($defaultKeyword ?? '') ?>;

    if (finalKeyword && keywordInput) {
        keywordInput.value = finalKeyword;
        filterSummariesByKeyword();
    }
});
</script>
