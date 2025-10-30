<!-- app/Modules/Management/Views/Marketing/resources/timelineGroupedView.php -->
<div class="container my-5">
    <h3 class="mb-4">🕒 Topic-Based Timeline View</h3>
    <?php if (!empty($timeline)): ?>
        <?php foreach ($timeline as $date => $articles): ?>
            <h5 class="text-muted mt-4"><?= esc(date('F j, Y', strtotime($date))) ?></h5>
            <div class="row">
                <?php foreach ($articles as $article): ?>
                    <div class="col-md-6 mb-3">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h6 class="card-title"><?= esc($article['title']) ?></h6>
                                <p class="card-text small"><?= esc(substr(strip_tags($article['summary']), 0, 150)) ?>...</p>
                                <p class="text-soft small"><?= date('g:i A', strtotime($article['scraped_at'] ?? $article['created_on'])) ?></p>
                                <a href="javascript:void(0);" class="btn btn-sm btn-outline-primary mt-2"
                                    onclick="loadSummaryInsightModal(<?= esc($article['id']) ?>)">
                                    🔍 View Insights
                                </a>

                                <?php if (!empty($article['keywords'])): ?>
                                    <div class="small text-muted mb-2">
                                        <?php foreach (explode(',', $article['keywords']) as $tag): ?>
                                            <span class="badge bg-light me-1">#<?= esc(trim($tag)) ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                                <canvas class="tfidf-chart" data-summary-id="<?= esc($article['id']) ?>" width="100%" height="200"></canvas>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="alert alert-warning">⚠️ No timeline data available.</div>
    <?php endif; ?>
</div>
<!-- Modal Placeholder -->
<div class="modal fade" id="insightModal" tabindex="-1" aria-labelledby="insightModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="insightModalLabel">📊 Summary Insight</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body" id="insightModalBody">
        <p class="text-muted">Loading insights...</p>
      </div>
    </div>
  </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
function loadSummaryInsightModal(summaryId) {
    fetch(`/index.php/API/Marketing/PreviewGeneratedPost/${summaryId}`)
        .then(res => res.text())
        .then(html => {
            document.getElementById('insightModalBody').innerHTML = html;
            let modal = new bootstrap.Modal(document.getElementById('insightModal'));
            modal.show();
        })
        .catch(err => {
            console.error('Failed to load insight modal:', err);
            document.getElementById('insightModalBody').innerHTML = "<p class='text-danger'>Failed to load insights.</p>";
        });
}
</script>

<script src="<?= base_url('assets/vendor/chart.js/2.1.2/Chart.min.js'); ?>" <?= $nonce['script'] ?? '' ?>></script>
<script <?= $nonce['script'] ?? '' ?>>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('.tfidf-chart').forEach(canvas => {
        const summaryId = canvas.dataset.summaryId;
        const ctx = canvas.getContext('2d');

        fetch(`/index.php/API/Marketing/getTopKeywordChart/${summaryId}`)
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
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
                            maintainAspectRatio: false,
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            },
                            plugins: {
                                legend: {
                                    display: false
                                }
                            }
                        }
                    });
                } else {
                    ctx.canvas.parentNode.innerHTML = "<p class='text-danger small'>Chart unavailable.</p>";
                }
            }).catch(err => {
                console.error(err);
                ctx.canvas.parentNode.innerHTML = "<p class='text-danger small'>Chart load failed.</p>";
            });
    });
});
</script>
