<?php
$run = $run ?? [];
$details = $run['details'] ?? [];
$steps = $details['steps'] ?? [];
$pretty = json_encode($details, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
?>

<div class="p-3">
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h5 class="mb-0">Auth Health Run #<?= esc((string) ($run['id'] ?? '')); ?></h5>
        <span class="badge <?= ($run['status'] ?? '') === 'PASS' ? 'bg-success' : (($run['status'] ?? '') === 'FAIL' ? 'bg-danger' : 'bg-secondary'); ?>">
            <?= esc($run['status'] ?? 'UNKNOWN'); ?>
        </span>
    </div>
    <p class="mb-1"><strong>Run at:</strong> <?= esc($run['run_at'] ?? ''); ?></p>
    <p class="mb-1"><strong>Summary:</strong> <?= esc($run['summary'] ?? ''); ?></p>
    <p class="mb-1"><strong>Duration:</strong> <?= esc((string) ($run['duration_ms'] ?? 0)); ?> ms</p>
    <p class="mb-3"><strong>Server:</strong> <?= esc($run['server'] ?? ''); ?></p>

    <?php if (! empty($steps)): ?>
        <h6>Steps</h6>
        <table class="table table-sm">
            <thead>
                <tr>
                    <th>Key</th>
                    <th>Status</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($steps as $step): ?>
                    <tr>
                        <td><?= esc($step['key'] ?? ''); ?></td>
                        <td><?= esc($step['status'] ?? ''); ?></td>
                        <td><?= esc($step['message'] ?? ''); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

    <?php if ($pretty): ?>
        <h6>Raw Details</h6>
        <pre class="bg-light p-2"><code><?= esc($pretty); ?></code></pre>
    <?php endif; ?>
</div>
