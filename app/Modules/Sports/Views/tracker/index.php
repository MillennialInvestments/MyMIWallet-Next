<?php
/**
 * Bet Tracker & Bankroll Management Dashboard View.
 *
 * @var array $summary
 * @var list<array> $bets
 * @var array $filters
 * @var array $settings
 * @var string $disclaimer
 */
$summary ??= [];
$bets ??= [];
$filters ??= [];
$settings ??= [];
$currency = $summary['currency'] ?? 'USD';
?>
<?= view('App\\Modules\\Sports\\Views\\nfl\\_responsive') ?>
<section class="container-fluid py-4" id="sports-bet-tracker">
    <?= view('App\\Modules\\Sports\\Views\\_header', [
        'activeTab'    => 'tracker',
        'pageTitle'    => 'Sports Bet Tracker & Bankroll Intelligence',
        'pageSubtitle' => 'Private bankroll ledger, closing line value (CLV) monitoring, and multi-book performance analytics.',
    ]) ?>

    <!-- KPI Metric Cards -->
    <div class="row g-3 mb-4" id="tracker-kpi-cards">
        <div class="col-12 col-sm-6 col-xl-2">
            <div class="card h-100 shadow-sm border-0 border-start border-4 border-primary">
                <div class="card-body py-3">
                    <div class="text-muted small text-uppercase fw-semibold">Current Bankroll</div>
                    <div class="fs-4 fw-bold mt-1 text-primary">$<?= number_format((float) ($summary['current_bankroll'] ?? 2500), 2) ?></div>
                    <div class="small text-muted mt-1">Starting: $<?= number_format((float) ($summary['initial_bankroll'] ?? 2500), 2) ?></div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-2">
            <div class="card h-100 shadow-sm border-0 border-start border-4 <?= ($summary['net_pnl'] ?? 0) >= 0 ? 'border-success' : 'border-danger' ?>">
                <div class="card-body py-3">
                    <div class="text-muted small text-uppercase fw-semibold">Net Profit / Loss</div>
                    <div class="fs-4 fw-bold mt-1 <?= ($summary['net_pnl'] ?? 0) >= 0 ? 'text-success' : 'text-danger' ?>">
                        <?= ($summary['net_pnl'] ?? 0) >= 0 ? '+' : '' ?>$<?= number_format((float) ($summary['net_pnl'] ?? 0), 2) ?>
                    </div>
                    <div class="small <?= ($summary['roi_pct'] ?? 0) >= 0 ? 'text-success' : 'text-danger' ?> mt-1">
                        ROI: <?= ($summary['roi_pct'] ?? 0) >= 0 ? '+' : '' ?><?= number_format((float) ($summary['roi_pct'] ?? 0), 2) ?>%
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-2">
            <div class="card h-100 shadow-sm border-0 border-start border-4 border-info">
                <div class="card-body py-3">
                    <div class="text-muted small text-uppercase fw-semibold">Win Rate</div>
                    <div class="fs-4 fw-bold mt-1 text-info"><?= number_format((float) ($summary['win_rate_pct'] ?? 0), 1) ?>%</div>
                    <div class="small text-muted mt-1">
                        <?= (int) ($summary['won_bets'] ?? 0) ?>W - <?= (int) ($summary['lost_bets'] ?? 0) ?>L<?= ($summary['push_bets'] ?? 0) > 0 ? ' - ' . (int) $summary['push_bets'] . 'P' : '' ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-2">
            <div class="card h-100 shadow-sm border-0 border-start border-4 border-warning">
                <div class="card-body py-3">
                    <div class="text-muted small text-uppercase fw-semibold">Open Risk</div>
                    <div class="fs-4 fw-bold mt-1 text-warning">$<?= number_format((float) ($summary['open_risk'] ?? 0), 2) ?></div>
                    <div class="small text-muted mt-1"><?= (int) ($summary['open_bets'] ?? 0) ?> open <?= ($summary['open_bets'] ?? 0) === 1 ? 'slip' : 'slips' ?></div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-2">
            <div class="card h-100 shadow-sm border-0 border-start border-4 border-purple" style="border-left-color: #6f42c1 !important;">
                <div class="card-body py-3">
                    <div class="text-muted small text-uppercase fw-semibold">Avg CLV Edge</div>
                    <div class="fs-4 fw-bold mt-1 text-purple" style="color: #6f42c1;">
                        <?= ($summary['avg_clv_edge_pct'] ?? 0) >= 0 ? '+' : '' ?><?= number_format((float) ($summary['avg_clv_edge_pct'] ?? 0), 2) ?>%
                    </div>
                    <div class="small text-muted mt-1">Beating closing line</div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-2">
            <div class="card h-100 shadow-sm border-0 border-start border-4 border-secondary">
                <div class="card-body py-3">
                    <div class="text-muted small text-uppercase fw-semibold">Total Slips</div>
                    <div class="fs-4 fw-bold mt-1 text-dark"><?= (int) ($summary['total_bets'] ?? 0) ?></div>
                    <div class="small text-muted mt-1">Staked: $<?= number_format((float) ($summary['total_staked'] ?? 0), 2) ?></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Actions & Filter Toolbar -->
    <div class="card mb-4 shadow-sm border-0">
        <div class="card-body">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
                <form method="get" action="<?= site_url('My-Bets') ?>" class="d-flex flex-wrap align-items-center gap-2" id="tracker-filter-form">
                    <label class="form-label mb-0 fw-semibold small text-muted">Filter By:</label>
                    <select name="status" class="form-select form-select-sm" style="width: auto;" onchange="this.form.submit()">
                        <option value="all" <?= ($filters['status'] ?? 'all') === 'all' ? 'selected' : '' ?>>All Statuses</option>
                        <option value="open" <?= ($filters['status'] ?? '') === 'open' ? 'selected' : '' ?>>Open Slips</option>
                        <option value="won" <?= ($filters['status'] ?? '') === 'won' ? 'selected' : '' ?>>Won</option>
                        <option value="lost" <?= ($filters['status'] ?? '') === 'lost' ? 'selected' : '' ?>>Lost</option>
                        <option value="push" <?= ($filters['status'] ?? '') === 'push' ? 'selected' : '' ?>>Push / Void</option>
                    </select>

                    <select name="sport" class="form-select form-select-sm" style="width: auto;" onchange="this.form.submit()">
                        <option value="all" <?= ($filters['sport'] ?? 'all') === 'all' ? 'selected' : '' ?>>All Sports</option>
                        <option value="NFL" <?= ($filters['sport'] ?? '') === 'NFL' ? 'selected' : '' ?>>NFL Football</option>
                        <option value="NBA" <?= ($filters['sport'] ?? '') === 'NBA' ? 'selected' : '' ?>>NBA Basketball</option>
                        <option value="MLB" <?= ($filters['sport'] ?? '') === 'MLB' ? 'selected' : '' ?>>MLB Baseball</option>
                        <option value="NHL" <?= ($filters['sport'] ?? '') === 'NHL' ? 'selected' : '' ?>>NHL Hockey</option>
                    </select>

                    <select name="sportsbook" class="form-select form-select-sm" style="width: auto;" onchange="this.form.submit()">
                        <option value="all" <?= ($filters['sportsbook'] ?? 'all') === 'all' ? 'selected' : '' ?>>All Sportsbooks</option>
                        <option value="DraftKings" <?= ($filters['sportsbook'] ?? '') === 'DraftKings' ? 'selected' : '' ?>>DraftKings</option>
                        <option value="FanDuel" <?= ($filters['sportsbook'] ?? '') === 'FanDuel' ? 'selected' : '' ?>>FanDuel</option>
                        <option value="BetMGM" <?= ($filters['sportsbook'] ?? '') === 'BetMGM' ? 'selected' : '' ?>>BetMGM</option>
                        <option value="Caesars" <?= ($filters['sportsbook'] ?? '') === 'Caesars' ? 'selected' : '' ?>>Caesars</option>
                        <option value="Kalshi" <?= ($filters['sportsbook'] ?? '') === 'Kalshi' ? 'selected' : '' ?>>Kalshi</option>
                        <option value="Polymarket" <?= ($filters['sportsbook'] ?? '') === 'Polymarket' ? 'selected' : '' ?>>Polymarket</option>
                    </select>
                </form>

                <div class="d-flex flex-wrap align-items-center gap-2">
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#newBetModal" id="btn-open-new-bet">
                        <i class="bi bi-plus-circle me-1"></i> Log New Bet Slip
                    </button>
                    <a href="<?= site_url('My-Bets/Export') ?>" class="btn btn-outline-secondary btn-sm" title="Download all slips as CSV">
                        <i class="bi bi-download me-1"></i> Export CSV
                    </a>
                    <button type="button" class="btn btn-outline-info btn-sm" data-bs-toggle="modal" data-bs-target="#importModal">
                        <i class="bi bi-upload me-1"></i> Import Slips
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bet Ledger Table -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0 fw-bold">Personal Betting Ledger</h2>
            <span class="badge bg-light text-dark border"><?= count($bets) ?> entries</span>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" id="bets-ledger-table">
                <thead class="table-light text-muted small text-uppercase">
                    <tr>
                        <th>Date</th>
                        <th>Book</th>
                        <th>Sport</th>
                        <th>Event &amp; Selection</th>
                        <th>Type</th>
                        <th class="text-end">Odds</th>
                        <th class="text-end">Stake</th>
                        <th class="text-end">To Win</th>
                        <th class="text-center">Status</th>
                        <th class="text-end">P&amp;L</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($bets === []): ?>
                        <tr>
                            <td colspan="11" class="text-center py-5 text-muted">
                                <i class="bi bi-journal-x fs-1 d-block mb-2 text-muted"></i>
                                No bet slips recorded matching these filters.<br>
                                <button type="button" class="btn btn-primary btn-sm mt-3" data-bs-toggle="modal" data-bs-target="#newBetModal">
                                    <i class="bi bi-plus-circle me-1"></i> Log Your First Bet
                                </button>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($bets as $b): ?>
                            <?php
                            $status = strtolower((string) ($b['status'] ?? 'open'));
                            $statusBadge = match ($status) {
                                'won'        => '<span class="badge bg-success-subtle text-success border border-success-subtle">WON</span>',
                                'lost'       => '<span class="badge bg-danger-subtle text-danger border border-danger-subtle">LOST</span>',
                                'push'       => '<span class="badge bg-secondary-subtle text-secondary border">PUSH</span>',
                                'cashed_out' => '<span class="badge bg-info-subtle text-info border">CASHED</span>',
                                default      => '<span class="badge bg-warning-subtle text-warning border border-warning-subtle">OPEN</span>',
                            };
                            $pnl = (float) ($b['pnl_amount'] ?? 0);
                            $stake = (float) ($b['stake_amount'] ?? 0);
                            $payout = (float) ($b['potential_payout'] ?? 0);
                            $toWin = max(0.0, $payout - $stake);
                            $odds = (int) ($b['odds'] ?? -110);
                            $oddsDisplay = $odds > 0 ? '+' . $odds : (string) $odds;
                            ?>
                            <tr>
                                <td class="small text-nowrap"><?= date('M d, Y', strtotime((string) $b['placed_at'])) ?></td>
                                <td>
                                    <span class="badge bg-light text-dark border"><?= esc($b['sportsbook']) ?></span>
                                </td>
                                <td>
                                    <span class="badge bg-secondary-subtle text-secondary small"><?= esc($b['sport']) ?></span>
                                </td>
                                <td>
                                    <div class="fw-bold"><?= esc($b['selection']) ?></div>
                                    <div class="text-muted small"><?= esc($b['event_description']) ?></div>
                                </td>
                                <td><span class="badge bg-light text-muted border"><?= esc($b['bet_type']) ?></span></td>
                                <td class="text-end fw-semibold font-monospace"><?= esc($oddsDisplay) ?></td>
                                <td class="text-end font-monospace">$<?= number_format($stake, 2) ?></td>
                                <td class="text-end font-monospace text-muted">$<?= number_format($toWin, 2) ?></td>
                                <td class="text-center"><?= $statusBadge ?></td>
                                <td class="text-end font-monospace fw-bold <?= $pnl > 0 ? 'text-success' : ($pnl < 0 ? 'text-danger' : 'text-muted') ?>">
                                    <?= $pnl > 0 ? '+' : '' ?><?= $status === 'open' ? '-' : '$' . number_format($pnl, 2) ?>
                                </td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm">
                                        <button type="button" class="btn btn-outline-info btn-sm py-0 px-1" onclick="openShareModal('<?= esc($b['sport'], 'js') ?>', '<?= esc($b['selection'], 'js') ?>', '<?= esc($b['event_description'], 'js') ?>', <?= (int) $odds ?>, <?= (float) $stake ?>, '<?= esc($b['sportsbook'], 'js') ?>', '<?= esc($status, 'js') ?>', <?= (float) $pnl ?>)" title="Share Bet Card"><i class="bi bi-share"></i></button>
                                        <?php if ($status === 'open'): ?>
                                            <form method="post" action="<?= site_url('My-Bets/UpdateStatus/' . (int) $b['id']) ?>" class="d-inline">
                                                <?= csrf_field() ?>
                                                <input type="hidden" name="status" value="won">
                                                <button type="submit" class="btn btn-outline-success btn-sm py-0 px-1" title="Mark Won"><i class="bi bi-check-lg"></i></button>
                                            </form>
                                            <form method="post" action="<?= site_url('My-Bets/UpdateStatus/' . (int) $b['id']) ?>" class="d-inline">
                                                <?= csrf_field() ?>
                                                <input type="hidden" name="status" value="lost">
                                                <button type="submit" class="btn btn-outline-danger btn-sm py-0 px-1" title="Mark Lost"><i class="bi bi-x-lg"></i></button>
                                            </form>
                                            <form method="post" action="<?= site_url('My-Bets/UpdateStatus/' . (int) $b['id']) ?>" class="d-inline">
                                                <?= csrf_field() ?>
                                                <input type="hidden" name="status" value="push">
                                                <button type="submit" class="btn btn-outline-secondary btn-sm py-0 px-1" title="Mark Push"><i class="bi bi-dash"></i></button>
                                            </form>
                                        <?php endif; ?>
                                        <form method="post" action="<?= site_url('My-Bets/Delete/' . (int) $b['id']) ?>" class="d-inline" onsubmit="return confirm('Delete this bet slip?');">
                                            <?= csrf_field() ?>
                                            <button type="submit" class="btn btn-outline-secondary btn-sm py-0 px-1 text-danger" title="Delete"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal: Log New Bet Slip -->
    <div class="modal fade" id="newBetModal" tabindex="-1" aria-labelledby="newBetModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form method="post" action="<?= site_url('My-Bets/Create') ?>" id="form-create-bet">
                    <?= csrf_field() ?>
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold" id="newBetModalLabel"><i class="bi bi-journal-plus me-1 text-primary"></i> Log New Bet Slip</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body row g-3">
                        <div class="col-12 col-md-4">
                            <label for="sportsbook" class="form-label fw-semibold">Sportsbook</label>
                            <select class="form-select" id="sportsbook" name="sportsbook" required>
                                <option value="DraftKings">DraftKings</option>
                                <option value="FanDuel">FanDuel</option>
                                <option value="BetMGM">BetMGM</option>
                                <option value="Caesars">Caesars</option>
                                <option value="Kalshi">Kalshi</option>
                                <option value="Polymarket">Polymarket</option>
                                <option value="Bovada">Bovada</option>
                                <option value="Fanatics">Fanatics</option>
                                <option value="ESPN BET">ESPN BET</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="sport" class="form-label fw-semibold">Sport</label>
                            <select class="form-select" id="sport" name="sport" required>
                                <option value="NFL">NFL Football</option>
                                <option value="NBA">NBA Basketball</option>
                                <option value="MLB">MLB Baseball</option>
                                <option value="NHL">NHL Hockey</option>
                                <option value="CFB">College Football</option>
                                <option value="CBB">College Basketball</option>
                                <option value="Soccer">Soccer</option>
                                <option value="MMA">MMA / UFC</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-4">
                            <label for="bet_type" class="form-label fw-semibold">Bet Type</label>
                            <select class="form-select" id="bet_type" name="bet_type" required>
                                <option value="Prop">Player Prop</option>
                                <option value="Spread">Point Spread</option>
                                <option value="Moneyline">Moneyline</option>
                                <option value="Total">Game Total / Over-Under</option>
                                <option value="Parlay">Parlay</option>
                                <option value="Futures">Futures</option>
                            </select>
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="event_description" class="form-label fw-semibold">Event / Matchup</label>
                            <input type="text" class="form-control" id="event_description" name="event_description" placeholder="e.g. Kansas City Chiefs @ Buffalo Bills" required>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="selection" class="form-label fw-semibold">Selection</label>
                            <input type="text" class="form-control" id="selection" name="selection" placeholder="e.g. Patrick Mahomes Over 255.5 Passing Yds" required>
                        </div>

                        <div class="col-12 col-md-3">
                            <label for="line" class="form-label fw-semibold">Offered Line</label>
                            <input type="number" step="0.5" class="form-control" id="line" name="line" placeholder="e.g. 255.5 or -3.5">
                        </div>
                        <div class="col-12 col-md-3">
                            <label for="odds" class="form-label fw-semibold">American Odds</label>
                            <input type="number" step="1" class="form-control" id="odds" name="odds" value="-110" placeholder="-110 or +150" required>
                        </div>
                        <div class="col-12 col-md-3">
                            <label for="stake_amount" class="form-label fw-semibold">Stake Amount ($)</label>
                            <input type="number" step="0.01" min="0.01" class="form-control" id="stake_amount" name="stake_amount" value="<?= (float) ($settings['default_unit_size'] ?? 50.0) ?>" required>
                        </div>
                        <div class="col-12 col-md-3">
                            <label for="status" class="form-label fw-semibold">Initial Status</label>
                            <select class="form-select" id="status" name="status">
                                <option value="open">Open (Active)</option>
                                <option value="won">Won</option>
                                <option value="lost">Lost</option>
                                <option value="push">Push</option>
                            </select>
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="closing_odds" class="form-label fw-semibold">Closing Odds (Optional CLV)</label>
                            <input type="number" step="1" class="form-control" id="closing_odds" name="closing_odds" placeholder="e.g. -130 at game kick-off">
                            <div class="form-text">Used to measure closing line value (CLV) edge against market movement.</div>
                        </div>
                        <div class="col-12 col-md-6">
                            <label for="notes" class="form-label fw-semibold">Notes / Rationale</label>
                            <input type="text" class="form-control" id="notes" name="notes" placeholder="e.g. Goldilocks +EV pick vs Bottom-10 pass D">
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary"><i class="bi bi-save me-1"></i> Save to Ledger</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal: CSV Import -->
    <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="<?= site_url('My-Bets/Import') ?>" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold" id="importModalLabel"><i class="bi bi-upload me-1 text-info"></i> Import Bet Slips from CSV</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="text-muted small">Import past bets from Action Network, Pikkit, or any spreadsheet CSV export. Columns mapped: Date, Sport, Event, Selection, Odds, Stake, Status, Sportsbook.</p>
                        <div class="mb-3">
                            <label for="csv_file" class="form-label fw-semibold">Choose CSV File</label>
                            <input class="form-control" type="file" id="csv_file" name="csv_file" accept=".csv" required>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-info text-white"><i class="bi bi-cloud-arrow-up me-1"></i> Upload &amp; Import</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal: Share Bet Slip Card -->
    <div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="shareModalLabel"><i class="bi bi-share text-info me-2"></i> Share Verified Bet Card</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <canvas id="shareSlipCanvas" width="560" height="320" class="img-fluid rounded shadow-sm border mb-3"></canvas>

                    <div class="mb-3 text-start">
                        <label class="form-label small fw-semibold text-muted">Formatted Social Post (X / Telegram / Discord):</label>
                        <div class="input-group">
                            <textarea id="shareTextSnippet" class="form-control font-monospace small" rows="4" readonly></textarea>
                            <button type="button" class="btn btn-outline-secondary" onclick="copyShareText()"><i class="bi bi-clipboard"></i> Copy</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light justify-content-between">
                    <span class="small text-muted"><i class="bi bi-shield-check text-success"></i> Educational disclaimer watermarked</span>
                    <div>
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary btn-sm fw-bold" onclick="downloadSlipImage()"><i class="bi bi-download me-1"></i> Download PNG Card</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script<?= script_nonce_attr() ?>>
    function openShareModal(sport, selection, event, odds, stake, book, status, pnl) {
        const oddsStr = odds > 0 ? '+' + odds : odds;
        const statusUpper = status.toUpperCase();

        // 1. Generate text snippet
        const text = `🎯 MyMI Wallet Verified Edge\n` +
            `🏆 ${sport} | ${selection}\n` +
            `📅 Event: ${event}\n` +
            `💰 Odds: ${oddsStr} (${book}) | Stake: $${stake.toFixed(2)}\n` +
            `📊 Status: ${statusUpper}` + (statusUpper === 'WON' ? ` (+$${pnl.toFixed(2)})` : '') + `\n` +
            `🔒 Analytics via mymiwallet.com/My-Bets\n` +
            `⚠️ Educational analytics only. 1-800-GAMBLER.`;

        document.getElementById('shareTextSnippet').value = text;

        // 2. Render Graphic onto Canvas
        const canvas = document.getElementById('shareSlipCanvas');
        const ctx = canvas.getContext('2d');

        // Background Gradient
        const grad = ctx.createLinearGradient(0, 0, 560, 320);
        grad.addColorStop(0, '#0f172a');
        grad.addColorStop(1, '#1e293b');
        ctx.fillStyle = grad;
        ctx.fillRect(0, 0, 560, 320);

        // Header Border / Top bar
        ctx.fillStyle = '#10b981';
        ctx.fillRect(0, 0, 560, 6);

        // Logo / Title
        ctx.fillStyle = '#ffffff';
        ctx.font = 'bold 20px system-ui, -apple-system, sans-serif';
        ctx.fillText('MYMI WALLET', 24, 38);

        ctx.fillStyle = '#94a3b8';
        ctx.font = '12px system-ui, -apple-system, sans-serif';
        ctx.fillText('SPORTS QUANTITATIVE LEDGER', 170, 37);

        // Status Badge in Canvas
        const statusColor = statusUpper === 'WON' ? '#10b981' : (statusUpper === 'LOST' ? '#ef4444' : '#f59e0b');
        ctx.fillStyle = statusColor;
        ctx.beginPath();
        ctx.roundRect(450, 18, 86, 26, 4);
        ctx.fill();

        ctx.fillStyle = '#0f172a';
        ctx.font = 'bold 12px system-ui, -apple-system, sans-serif';
        ctx.textAlign = 'center';
        ctx.fillText(statusUpper, 493, 35);
        ctx.textAlign = 'left';

        // Sport Tag
        ctx.fillStyle = '#38bdf8';
        ctx.font = 'bold 13px system-ui, -apple-system, sans-serif';
        ctx.fillText(sport.toUpperCase() + ' MATCHUP', 24, 76);

        // Selection
        ctx.fillStyle = '#ffffff';
        ctx.font = 'bold 22px system-ui, -apple-system, sans-serif';
        const truncatedSelection = selection.length > 36 ? selection.substring(0, 34) + '...' : selection;
        ctx.fillText(truncatedSelection, 24, 110);

        // Event
        ctx.fillStyle = '#94a3b8';
        ctx.font = '14px system-ui, -apple-system, sans-serif';
        const truncatedEvent = event.length > 44 ? event.substring(0, 42) + '...' : event;
        ctx.fillText(truncatedEvent, 24, 138);

        // Divider
        ctx.strokeStyle = '#334155';
        ctx.lineWidth = 1;
        ctx.beginPath();
        ctx.moveTo(24, 160);
        ctx.lineTo(536, 160);
        ctx.stroke();

        // Metrics Row: Odds, Stake, Bookmaker
        ctx.fillStyle = '#64748b';
        ctx.font = '11px system-ui, -apple-system, sans-serif';
        ctx.fillText('OFFERED ODDS', 24, 186);
        ctx.fillText('STAKE AMOUNT', 170, 186);
        ctx.fillText('SPORTSBOOK', 330, 186);

        ctx.fillStyle = '#38bdf8';
        ctx.font = 'bold 20px monospace';
        ctx.fillText(oddsStr, 24, 214);

        ctx.fillStyle = '#ffffff';
        ctx.font = 'bold 20px monospace';
        ctx.fillText('$' + stake.toFixed(2), 170, 214);

        ctx.fillStyle = '#f8fafc';
        ctx.font = 'bold 18px system-ui, -apple-system, sans-serif';
        ctx.fillText(book, 330, 214);

        // Watermark Footer & Disclaimer
        ctx.fillStyle = '#475569';
        ctx.font = '10px system-ui, -apple-system, sans-serif';
        ctx.fillText('Educational analytics only. MyMI Wallet does not accept wagers. 1-800-GAMBLER.', 24, 290);
        ctx.fillText('mymiwallet.com', 460, 290);

        const modal = new bootstrap.Modal(document.getElementById('shareModal'));
        modal.show();
    }

    function copyShareText() {
        const text = document.getElementById('shareTextSnippet');
        text.select();
        navigator.clipboard.writeText(text.value).then(() => {
            alert('Bet slip text copied to clipboard!');
        });
    }

    function downloadSlipImage() {
        const canvas = document.getElementById('shareSlipCanvas');
        const link = document.createElement('a');
        link.download = 'mymi-betslip-' + Date.now() + '.png';
        link.href = canvas.toDataURL('image/png');
        link.click();
    }
    </script>
</section>
