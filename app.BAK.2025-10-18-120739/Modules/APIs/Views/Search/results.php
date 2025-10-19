<?php /** @var array $results */ ?>
<?php /** @var string $query */ ?>

<div class="container-fluid mt-4">
    <div class="row">
        <!-- Sidebar Filters -->
        <aside class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Filter Results</h5>
                </div>
                <div class="list-group list-group-flush" id="resultFilter">
                    <a href="#" class="list-group-item list-group-item-action active" data-filter="all">All</a>
                    <a href="#" class="list-group-item list-group-item-action" data-filter="users">Users</a>
                    <a href="#" class="list-group-item list-group-item-action" data-filter="alerts">Trade Alerts</a>
                    <a href="#" class="list-group-item list-group-item-action" data-filter="projects">Projects</a>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="col-md-9">
            <h2 class="mb-4">Search Results for: <strong><?= esc($query) ?></strong></h2>

            <div id="resultsContainer">
                <?php if (!empty($results['users'])): ?>
                    <div class="result-block users">
                        <h4>Users</h4>
                        <ul class="list-group mb-4">
                            <?php foreach ($results['users'] as $user): ?>
                                <li class="list-group-item">
                                    <strong><?= esc($user['display_name']) ?></strong> <small class="text-muted">(<?= esc($user['email']) ?>)</small>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <?php if (!empty($results['alerts'])): ?>
                    <div class="result-block alerts">
                        <h4>Trade Alerts</h4>
                        <ul class="list-group mb-4">
                            <?php foreach ($results['alerts'] as $alert): ?>
                                <li class="list-group-item">
                                    <strong><?= esc($alert['symbol']) ?></strong> - <?= esc($alert['summary']) ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <?php if (!empty($results['projects'])): ?>
                    <div class="result-block projects">
                        <h4>Projects</h4>
                        <ul class="list-group mb-4">
                            <?php foreach ($results['projects'] as $project): ?>
                                <li class="list-group-item">
                                    <strong><?= esc($project['title']) ?></strong> - <?= esc($project['description']) ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </main>
    </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
    document.addEventListener('DOMContentLoaded', function () {
        const filterLinks = document.querySelectorAll('#resultFilter a');
        const resultBlocks = document.querySelectorAll('.result-block');

        filterLinks.forEach(link => {
            link.addEventListener('click', function (e) {
                e.preventDefault();

                // Remove active from all
                filterLinks.forEach(l => l.classList.remove('active'));
                this.classList.add('active');

                const filter = this.getAttribute('data-filter');

                resultBlocks.forEach(block => {
                    if (filter === 'all' || block.classList.contains(filter)) {
                        block.style.display = 'block';
                    } else {
                        block.style.display = 'none';
                    }
                });
            });
        });
    });
</script>
