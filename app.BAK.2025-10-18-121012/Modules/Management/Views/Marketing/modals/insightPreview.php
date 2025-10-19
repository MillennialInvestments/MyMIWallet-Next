<!-- app/Modules/Management/Views/Marketing/modals/insightPreview.php -->
<div class="modal-header bg-primary text-white">
    <h5 class="modal-title">🧠 AI Insight Editor</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body">
    <form id="insightEditorForm">
        <input type="hidden" name="id" value="<?= esc($summary['id']) ?>">

        <div class="mb-3">
            <label class="form-label fw-bold">Title</label>
            <input type="text" name="title" class="form-control" value="<?= esc($summary['title']) ?>">
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Summary</label>
            <textarea name="summary" rows="6" class="form-control"><?= esc($cleaned_summary) ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Call to Action (CTA)</label>
            <input type="text" name="cta" class="form-control" value="<?= esc($summary['cta'] ?? '') ?>">
        </div>

        <?php if (!empty($keywords)) : ?>
            <div class="mb-3">
                <div class="d-flex flex-wrap gap-2">
                    <?php foreach ($keywords as $keyword): ?>
                        <span class="badge bg-primary text-light">#<?= esc($keyword) ?></span>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>


        <div class="text-end">
            <button type="submit" class="btn btn-success">💾 Save Changes</button>
        </div>
    </form>

    <?php if (!empty($posts)): ?>
        <hr>
        <h6 class="fw-bold mt-4">📢 Platform Preview</h6>
        <div class="bg-light p-3 rounded small">
            <?php foreach ($posts as $platform => $content): ?>
                <div class="mb-3">
                    <span class="badge bg-secondary"><?= ucfirst($platform) ?></span>
                    <pre class="mt-2"><?= esc($content) ?></pre>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    
    <hr>
    <div class="mt-4">
        <strong>📊 TF-IDF Chart:</strong>
        <canvas id="tfidfChart" height="200"></canvas>
    </div>

    <hr>
    <div class="mt-4">
        <strong>🧵 Thread Preview</strong>
        <div id="threadPreview" class="bg-white border p-3 rounded small text-muted" style="max-height: 300px; overflow-y: auto;">
            <em>Loading preview...</em>
        </div>
    </div>

</div>

<script <?= $nonce['script'] ?? '' ?>>
document.getElementById('insightEditorForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const formData = new FormData(this);

    fetch('<?= site_url("/API/Management/updateInsight") ?>', {
        method: 'POST',
        body: formData
    })
    .then(r => r.json())
    .then(res => {
        if (res.status === 'success') {
            alert('✅ Saved successfully!');
            location.reload();
        } else {
            alert('❌ Error: ' + res.message);
        }
    })
    .catch(err => {
        alert('❌ Save failed.');
        console.error(err);
    });
});
</script>
<script <?= $nonce['script'] ?? '' ?>>
function updatePlatformPreview() {
    const title = document.querySelector('input[name="title"]').value;
    const summary = document.querySelector('textarea[name="summary"]').value;
    const keywords = document.querySelector('input[name="keywords"]').value;

    fetch('<?= site_url('/API/Marketing/generateLivePreview') ?>', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({ title, summary, keywords })
    })
    .then(r => r.json())
    .then(res => {
        if (res.status === 'success') {
            const previewContainer = document.querySelector('.bg-light');
            previewContainer.innerHTML = '';
            Object.entries(res.posts).forEach(([platform, content]) => {
                previewContainer.innerHTML += `
                    <div class="mb-3">
                        <span class="badge bg-secondary">${platform}</span>
                        <pre class="mt-2">${content}</pre>
                    </div>`;
            });
        }
    })
    .catch(err => console.error('Live preview failed', err));
}

document.querySelector('textarea[name="summary"]').addEventListener('input', updatePlatformPreview);
document.querySelector('input[name="keywords"]').addEventListener('input', updatePlatformPreview);
</script>

<script <?= $nonce['script'] ?? '' ?>>
document.addEventListener("DOMContentLoaded", function () {
    fetch(`/index.php/API/Marketing/getTopKeywordChart/<?= esc($summary['id']) ?>`)
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success') {
                const ctx = document.getElementById('tfidfChart').getContext('2d');
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
                        plugins: {
                            legend: { display: false }
                        },
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }
        });
});
</script>
<script <?= $nonce['script'] ?? '' ?>>
document.addEventListener("DOMContentLoaded", function () {
    fetch(`/index.php/API/Marketing/generateThreadFromSummary/<?= esc($summary['id']) ?>`)
        .then(res => res.json())
        .then(data => {
            if (data.status === 'success') {
                const container = document.getElementById('threadPreview');
                container.innerHTML = '';
                data.thread.forEach((tweet, i) => {
                    container.innerHTML += `<p><strong>Part ${i + 1}:</strong> ${tweet}</p>`;
                });
            }
        });
});
</script>
