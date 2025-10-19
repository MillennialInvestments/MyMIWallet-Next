<?php if (!empty($pendingSummaries)): ?>
<ul class="list-group">
    <?php foreach ($pendingSummaries as $summary): ?>
    <li class="list-group-item d-flex justify-content-between align-items-start flex-column">
        <div class="w-100">
            <strong><?= esc($summary['title'] ?? '(Untitled Post)') ?></strong>
            <p class="text-muted"><?= date('M d, Y h:i A', strtotime($summary['scraped_at'])) ?></p>
            <p><?= esc(word_limiter(strip_tags($summary['summary']), 20)) ?></p>
        </div>
        <div class="mt-2">
            <button class="btn btn-sm btn-success" onclick="approveScraperItem(<?= $summary['id'] ?>)">✅ Approve</button>
            <button class="btn btn-sm btn-danger" onclick="rejectScraperItem(<?= $summary['id'] ?>)">❌ Reject</button>
        </div>
    </li>
    <?php endforeach; ?>
</ul>
<?php else: ?>
<p class="text-muted">No pending summaries available.</p>
<?php endif; ?>
