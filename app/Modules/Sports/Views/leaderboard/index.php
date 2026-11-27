<?php
/**
 * Gamified Social Competitions & Leaderboard View:
 * UIGEA-exempt skill-based prediction tournaments and community prestige rankings.
 *
 * @var list<array> $leaderboard
 * @var array $userStats
 * @var array $contest
 * @var string $disclaimer
 */
$leaderboard = !empty($leaderboard) ? $leaderboard : ($leaders ?? []);
$userStats ??= [];
$contest = !empty($contest) ? $contest : ($tournament ?? []);
?>
<?= view('App\\Modules\\Sports\\Views\\nfl\\_responsive') ?>
<section class="container-fluid py-4" id="sports-gamified-leaderboard">
    <?= view('App\\Modules\\Sports\\Views\\_header', [
        'activeTab'    => 'leaderboard',
        'pageTitle'    => 'Gamified Social Competitions & Community Leaderboard',
        'pageSubtitle' => 'Compete with simulated bankrolls on skill-based prediction tournaments. Compliant with UIGEA § 5362(1)(E)(ix); zero cash wagered.',
    ]) ?>

    <!-- Weekly Tournament Banner -->
    <?php if ($contest !== []): ?>
        <div class="card mb-4 border-warning shadow-sm">
            <div class="card-header bg-warning text-dark py-2 d-flex justify-content-between align-items-center">
                <span class="fw-bold"><i class="bi bi-trophy-fill me-1"></i> <?= esc($contest['title'] ?? 'Weekly Tournament') ?></span>
                <span class="badge bg-dark text-warning fw-bold"><?= esc($contest['prize_pool_usd'] ?? '1,500 USDC') ?> Guaranteed Pool</span>
            </div>
            <div class="card-body">
                <div class="row g-3 align-items-center">
                    <div class="col-12 col-md-8">
                        <h2 class="h5 fw-bold mb-1">Prove Your Statistical Edge — Zero Purchase Necessary</h2>
                        <p class="small text-muted mb-2">
                            Select 5 quantitative player prop or prediction market picks. Rankings evaluate net ROI % across all selections.
                            Completely free to enter under federal skill-based tournament exemptions.
                        </p>
                        <div class="d-flex flex-wrap gap-3 small text-muted">
                            <span><i class="bi bi-people-fill me-1 text-primary"></i> <?= (int) ($contest['participants'] ?? 0) ?> Competitors</span>
                            <span><i class="bi bi-calendar-check me-1 text-success"></i> Weekly Cadence</span>
                            <span><i class="bi bi-shield-check me-1 text-info"></i> <?= esc($contest['rule_type'] ?? '') ?></span>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 text-md-end">
                        <a href="<?= site_url('MyMISports/NFL') ?>" class="btn btn-warning fw-bold text-dark px-4">
                            <i class="bi bi-lightning-charge me-1"></i> Make Tournament Picks
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- User Prestige & Stats Card -->
    <div class="row g-3 mb-4">
        <div class="col-12 col-md-3">
            <div class="card h-100 shadow-sm border-0 border-start border-4 border-warning">
                <div class="card-body py-3">
                    <div class="text-muted small text-uppercase fw-semibold">My Community Rank</div>
                    <div class="fs-4 fw-bold mt-1 text-warning">#<?= (int) ($userStats['rank'] ?? 1) ?></div>
                    <div class="small text-muted mt-1">Tier: <span class="badge bg-light text-dark border"><?= esc(ucfirst((string) ($userStats['avatar_badge'] ?? 'Rookie'))) ?></span></div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-3">
            <div class="card h-100 shadow-sm border-0 border-start border-4 border-success">
                <div class="card-body py-3">
                    <div class="text-muted small text-uppercase fw-semibold">Virtual Bankroll</div>
                    <div class="fs-4 fw-bold mt-1 text-success">$<?= number_format((float) ($userStats['virtual_bankroll'] ?? 2500), 2) ?></div>
                    <div class="small text-muted mt-1">Starting: $2,500.00</div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-3">
            <div class="card h-100 shadow-sm border-0 border-start border-4 border-primary">
                <div class="card-body py-3">
                    <div class="text-muted small text-uppercase fw-semibold">Tournament ROI</div>
                    <div class="fs-4 fw-bold mt-1 text-primary"><?= number_format((float) ($userStats['net_roi_pct'] ?? 0), 1) ?>%</div>
                    <div class="small text-muted mt-1">Win Rate: <?= number_format((float) ($userStats['win_rate_pct'] ?? 0), 1) ?>%</div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-3">
            <div class="card h-100 shadow-sm border-0 border-start border-4 border-info">
                <div class="card-body py-3">
                    <div class="text-muted small text-uppercase fw-semibold">Prestige XP &amp; Streak</div>
                    <div class="fs-4 fw-bold mt-1 text-info"><?= number_format((int) ($userStats['xp_points'] ?? 0)) ?> XP</div>
                    <div class="small text-muted mt-1">Current Streak: <?= (int) ($userStats['current_streak'] ?? 0) ?>W (Best: <?= (int) ($userStats['best_streak'] ?? 0) ?>W)</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Community Leaderboard Table -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0 fw-bold">Community Leaderboard (Season 2025)</h2>
            <span class="badge bg-light text-dark border"><?= count($leaderboard) ?> ranked traders</span>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" id="community-leaderboard-table">
                <thead class="table-light small text-uppercase text-muted">
                    <tr>
                        <th class="text-center" style="width: 70px;">Rank</th>
                        <th>User</th>
                        <th>Badge Tier</th>
                        <th class="text-end">Virtual Bankroll</th>
                        <th class="text-center">Record (W-L)</th>
                        <th class="text-end">Win Rate</th>
                        <th class="text-end">Net ROI %</th>
                        <th class="text-center">Streak</th>
                        <th class="text-end">Prestige XP</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($leaderboard as $trader): ?>
                        <?php
                        $rank = (int) $trader['rank'];
                        $rankBadge = match ($rank) {
                            1       => '<span class="badge rounded-pill bg-warning text-dark fs-6"><i class="bi bi-trophy-fill"></i> 1</span>',
                            2       => '<span class="badge rounded-pill bg-secondary text-white fs-6">2</span>',
                            3       => '<span class="badge rounded-pill bg-bronze text-white fs-6" style="background-color: #cd7f32;">3</span>',
                            default => '<span class="badge rounded-pill bg-light text-dark border">' . $rank . '</span>',
                        };
                        ?>
                        <tr class="<?= $rank <= 3 ? 'table-warning-subtle' : '' ?>">
                            <td class="text-center"><?= $rankBadge ?></td>
                            <td>
                                <div class="fw-bold"><?= esc($trader['username']) ?></div>
                            </td>
                            <td>
                                <span class="badge bg-light text-dark border">
                                    <i class="bi bi-patch-check-fill text-primary me-1"></i><?= esc(ucfirst((string) $trader['avatar_badge'])) ?>
                                </span>
                            </td>
                            <td class="text-end font-monospace fw-bold">$<?= number_format((float) $trader['virtual_bankroll'], 2) ?></td>
                            <td class="text-center font-monospace"><?= (int) $trader['won_predictions'] ?>W - <?= (int) $trader['lost_predictions'] ?>L</td>
                            <td class="text-end font-monospace"><?= number_format((float) $trader['win_rate_pct'], 1) ?>%</td>
                            <td class="text-end font-monospace fw-bold text-success">+<?= number_format((float) $trader['net_roi_pct'], 1) ?>%</td>
                            <td class="text-center font-monospace">
                                <span class="badge bg-success-subtle text-success"><?= (int) $trader['current_streak'] ?>W</span>
                            </td>
                            <td class="text-end font-monospace fw-bold text-info"><?= number_format((int) $trader['xp_points']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
