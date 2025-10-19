<div class="card card-bordered">
    <div class="card-inner">
        <h6 class="title">📈 Momentum Change</h6>
        <ul class="list-group">
            <?php foreach ($momentumDelta ?? [] as $item): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <?= $item['ticker'] ?>
                    <span class="badge badge-outline-primary">
                        <?= ($item['change'] > 0 ? '+' : '') . number_format($item['change'], 2) ?>
                    </span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
