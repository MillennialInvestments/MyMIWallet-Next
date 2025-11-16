<?php
use DateTime;
use Exception;

$referrals = $getTotalReferrals ?? [];
$totalReferralsCount = is_array($referrals) ? count($referrals) : 0;
?>
<div class="row">
    <div class="col-12">
        <div class="card card-bordered">
            <div class="card-inner">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-3">
                    <div>
                        <h5 class="card-title mb-1">Referral Management</h5>
                        <p class="card-description mb-0 text-soft">Select referrals to apply bulk actions or filter by status.</p>
                    </div>
                    <div class="d-flex flex-wrap gap-2 align-items-center">
                        <label for="referralStatusFilter" class="form-label mb-0 text-nowrap">Status Filter</label>
                        <select class="form-select form-select-sm" id="referralStatusFilter">
                            <option value="">All</option>
                            <option value="active">Active</option>
                            <option value="paid">Paid</option>
                            <option value="pending">Pending</option>
                        </select>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered align-middle" id="referralsTable">
                        <thead class="text-muted small">
                            <tr>
                                <th style="width: 40px;">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="selectAllReferrals">
                                    </div>
                                </th>
                                <th>Name / Email</th>
                                <th>Status</th>
                                <th>Joined</th>
                                <th>Membership</th>
                                <th>Earnings</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($totalReferralsCount > 0): ?>
                                <?php foreach ($referrals as $referral): ?>
                                    <?php
                                        $referralId   = (int) ($referral['id'] ?? 0);
                                        $firstName    = trim((string) ($referral['first_name'] ?? ''));
                                        $lastName     = trim((string) ($referral['last_name'] ?? ''));
                                        $fullName     = trim($firstName . ' ' . $lastName);
                                        $email        = $referral['referral_email'] ?? '';
                                        $membership   = $referral['type'] ?? '—';
                                        $isActive     = (int) ($referral['active'] ?? 0) === 1;
                                        if ($isActive && $earnings > 0) {
                                            $statusKey = 'paid';
                                        } elseif ($isActive) {
                                            $statusKey = 'active';
                                        } else {
                                            $statusKey = 'pending';
                                        }
                                        $statusLabel  = ucfirst($statusKey);
                                        $earnings     = (float) ($referral['total_spend'] ?? 0);
                                        $joinedRaw    = $referral['signup_date'] ?? null;
                                        try {
                                            $joinedDate = $joinedRaw ? new DateTime($joinedRaw) : null;
                                        } catch (Exception $e) {
                                            $joinedDate = null;
                                        }
                                        $joinedFormatted = $joinedDate ? $joinedDate->format('M j, Y') : '—';
                                    ?>
                                    <tr data-status="<?= esc($statusKey, 'attr'); ?>" data-referral-row="<?= esc($referralId, 'attr'); ?>">
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input referral-select" value="<?= esc($referralId, 'attr'); ?>" aria-label="Select referral <?= esc($referralId, 'attr'); ?>">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="fw-semibold"><?= esc($fullName ?: 'Pending Referral'); ?></div>
                                            <?php if (! empty($email)): ?>
                                                <div class="small text-soft text-break"><?= esc($email); ?></div>
                                            <?php endif; ?>
                                        </td>
                                        <?php
                                            $statusClass = 'bg-warning text-dark';
                                            if ($statusKey === 'active') {
                                                $statusClass = 'bg-success';
                                            } elseif ($statusKey === 'paid') {
                                                $statusClass = 'bg-primary';
                                            }
                                        ?>
                                        <td>
                                            <span class="badge <?= esc($statusClass); ?> referral-status"><?= esc($statusLabel); ?></span>
                                        </td>
                                        <td><?= esc($joinedFormatted); ?></td>
                                        <td><?= esc($membership); ?></td>
                                        <td>$<?= number_format($earnings, 2); ?></td>
                                        <td class="text-end">
                                            <div class="btn-group btn-group-sm">
                                                <button type="button" class="btn btn-outline-light" data-referral-id="<?= esc($referralId, 'attr'); ?>" data-referral-action="view">View</button>
                                                <button type="button" class="btn btn-outline-light" data-referral-id="<?= esc($referralId, 'attr'); ?>" data-referral-action="edit">Edit</button>
                                                <button type="button" class="btn btn-outline-light" data-referral-id="<?= esc($referralId, 'attr'); ?>" data-referral-action="resend">Resend Invite</button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-center text-soft">You have not referred anyone yet.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <p class="text-soft small mt-2 mb-0">Showing <?= esc($totalReferralsCount); ?> referrals.</p>
            </div>
        </div>
    </div>
</div>
