<?php if (!empty($topKeywords)): ?>
    <div class="card card-bordered">
        <div class="card-inner">
            <h5 class="card-title">📊 Top Enriched Keywords</h5>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Keyword</th>
                            <th>Times Used</th>
                            <th>Last Enriched</th>
                            <th>Related Content</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($topKeywords as $index => $keyword): ?>
                            <tr>
                                <td><?= $index + 1; ?></td>
                                <td><strong><?= esc($keyword['keyword']) ?></strong></td>
                                <td><?= esc($keyword['uses']) ?></td>
                                <td><?= date('M d, Y H:i', strtotime($keyword['last_enriched_at'])) ?></td>
                                <td>
                                    <a href="<?= site_url('/Marketing/Generated/Keyword/' . urlencode($keyword['keyword'])) ?>" target="_blank" class="btn btn-sm btn-info">
                                        View Posts
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="alert alert-info">No keyword enrichment data found yet.</div>
<?php endif; ?>
