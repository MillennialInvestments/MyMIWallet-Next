<div class="container my-4">
    <h5 class="mb-3">Search results for: <em><?= esc($query) ?></em></h5>

    <?php if (empty($results)) : ?>
        <div class="alert alert-info">No ticker matches found.</div>
    <?php else : ?>
        <div class="list-group">
            <?php foreach ($results as $row) : ?>
                <a
                    class="list-group-item list-group-item-action d-flex justify-content-between align-items-center"
                    href="<?= site_url('Investments/Symbol/' . urlencode($row['symbol'] ?? '')) ?>"
                >
                    <span>
                        <strong><?= esc($row['symbol'] ?? '') ?></strong>
                        <?php if (!empty($row['name'])) : ?>
                            <small class="text-muted">— <?= esc($row['name']) ?></small>
                        <?php endif; ?>
                    </span>
                    <small class="text-muted">
                        <?= esc($row['exchange'] ?? '') ?>
                        <?= esc($row['currency'] ?? '') ?>
                    </small>
                </a>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>