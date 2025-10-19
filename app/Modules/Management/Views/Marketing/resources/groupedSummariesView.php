<!-- app/Modules/Management/Views/Marketing/resources/groupedSummariesView.php -->
<div class="container mt-4">
    <h3 class="mb-3">🧠 Grouped Finalized Summaries by Similarity</h3>
    <div class="mb-3">
        <a href="<?= site_url('API/Management/exportGroupedSummariesCSV') ?>" class="btn btn-sm btn-outline-secondary">📁 Export CSV</a>
        <a href="<?= site_url('API/Management/shareGroupedSummaries/discord') ?>" class="btn btn-sm btn-outline-primary">📤 Share to Discord</a>
        <a href="<?= site_url('API/Management/shareGroupedSummaries/linkedin') ?>" class="btn btn-sm btn-outline-info">📤 Share to LinkedIn</a>
    </div>

    <?php if (empty($groupedSummaries)): ?>
        <div class="alert alert-info">No grouped summaries found.</div>
    <?php else: ?>
        <?php foreach ($groupedSummaries as $index => $group): ?>
            <div class="card mb-4 shadow">
                <div class="card-header bg-primary text-white">
                    Group #<?= $index + 1 ?> — <?= count($group) ?> items
                </div>
                <div class="card-body">
                    <?php foreach ($group as $summary): ?>
                        <div class="mb-3 p-3 border rounded bg-light">
                            <h5><?= esc($summary['title'] ?? 'Untitled') ?></h5>
                            <p><?= esc(word_limiter(strip_tags($summary['summary'] ?? ''), 40)) ?></p>
                            <a href="<?= site_url('Marketing/PreviewGeneratedPost/' . $summary['id']) ?>" class="btn btn-sm btn-outline-primary" target="_blank">Preview</a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
