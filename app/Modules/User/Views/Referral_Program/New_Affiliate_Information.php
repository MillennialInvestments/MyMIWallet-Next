<?php
/**
 * GT-FORM-ROUTES-001: admin review list for referral applications
 * (bf_users_referral_program). Replaces the CodeIgniter 3 form whose save
 * method never existed. Activation is a POST to Referral-Program/Activate/{id}.
 */
$applications = $applications ?? [];
?>
<div class="nk-block">
    <h1 class="nk-block-title title">Referral Applications</h1>
    <?php if (session('message')): ?><div class="alert alert-success"><?= esc(session('message')) ?></div><?php endif; ?>
    <?php if (session('error')): ?><div class="alert alert-danger"><?= esc(session('error')) ?></div><?php endif; ?>
    <?php if ($applications === []): ?>
        <p class="text-muted">No applications yet.</p>
    <?php else: ?>
    <div class="table-responsive">
        <table class="table table-sm">
            <thead><tr><th>ID</th><th>User</th><th>Name</th><th>Email</th><th>Code</th><th>Applied</th><th>Status</th><th></th></tr></thead>
            <tbody>
            <?php foreach ($applications as $a): ?>
                <tr>
                    <td><?= (int) $a['id'] ?></td>
                    <td><?= (int) ($a['user_id'] ?? 0) ?></td>
                    <td><?= esc(trim(($a['first_name'] ?? '') . ' ' . ($a['last_name'] ?? ''))) ?></td>
                    <td><?= esc($a['email'] ?? '') ?></td>
                    <td><?= esc($a['referrer_code'] ?? '') ?></td>
                    <td><?= esc($a['signup_date'] ?? '') ?></td>
                    <td><?= ! empty($a['active']) ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-warning text-dark">Pending</span>' ?></td>
                    <td>
                        <?php if (empty($a['active'])): ?>
                        <form method="post" action="<?= esc(site_url('Referral-Program/Activate/' . (int) $a['id']), 'attr') ?>" class="d-inline">
                            <?= csrf_field() ?>
                            <button type="submit" class="btn btn-sm btn-primary">Activate</button>
                        </form>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php endif; ?>
</div>
