<div class="container">
    <h4 class="mt-4">MyMI News</h4>
    <ul class="list-group">
        <?php if (!empty($myMINews)): ?>
            <?php foreach ($myMINews as $news): ?>
                <li class="list-group-item">
                    <a href="<?= esc($news['url']) ?>" target="_blank"><?= esc($news['title']) ?></a>
                    <p><?= esc($news['description']) ?></p>
                    <small>Published at: <?= esc($news['published_at']) ?></small>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li class="list-group-item">No news available.</li>
        <?php endif; ?>
    </ul>
</div>
