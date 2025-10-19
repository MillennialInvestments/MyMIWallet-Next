<div class="container">
    <h4 class="mt-4">MyMI Research</h4>
    <ul class="list-group">
        <?php if (!empty($myMIResearch)): ?>
            <?php foreach ($myMIResearch as $research): ?>
                <li class="list-group-item">
                    <a href="<?= esc($research['url']) ?>" target="_blank"><?= esc($research['title']) ?></a>
                    <p><?= esc($research['description']) ?></p>
                    <small>Published at: <?= esc($research['published_at']) ?></small>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li class="list-group-item">No research available.</li>
        <?php endif; ?>
    </ul>
</div>
