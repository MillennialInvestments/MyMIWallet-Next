<?php
/**
 * Multi-Book Line Shopping & Odds Matrix View.
 *
 * @var list<array> $oddsBoard
 * @var string $activeSport
 * @var bool $hasByok
 * @var string $disclaimer
 */
$oddsBoard ??= [];
$activeSport ??= 'NFL';
$hasByok ??= false;
?>
<?= view('App\\Modules\\Sports\\Views\\nfl\\_responsive') ?>
<section class="container-fluid py-4" id="sports-odds-matrix">
    <?= view('App\\Modules\\Sports\\Views\\_header', [
        'activeTab'    => 'odds',
        'pageTitle'    => 'Multi-Book Line Shopping & Odds Comparison Matrix',
        'pageSubtitle' => 'Compare real-time lines across DraftKings, FanDuel, BetMGM, and Caesars to capture line value and eliminate bookmaker juice.',
    ]) ?>

    <!-- Sport & Feed Status Bar -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
        <ul class="nav nav-pills" id="odds-sport-pills">
            <li class="nav-item">
                <a class="nav-link <?= $activeSport === 'NFL' ? 'active' : '' ?>" href="<?= site_url('MyMISports/Odds?sport=NFL') ?>">
                    <i class="bi bi-trophy me-1"></i> NFL Lines &amp; Props
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $activeSport === 'NBA' ? 'active' : '' ?>" href="<?= site_url('MyMISports/Odds?sport=NBA') ?>">
                    <i class="bi bi-dribbble me-1"></i> NBA Lines &amp; Props
                </a>
            </li>
        </ul>

        <div class="d-flex align-items-center gap-2 mt-2 mt-md-0">
            <?php if ($hasByok): ?>
                <span class="badge bg-success-subtle text-success border border-success-subtle">
                    <i class="bi bi-key-fill me-1"></i> BYOK Active (Personal Live API Key)
                </span>
            <?php else: ?>
                <span class="badge bg-light text-muted border">
                    <i class="bi bi-database me-1"></i> Consensus Market Lines
                </span>
                <a href="<?= site_url('MyMISports/Settings') ?>" class="btn btn-outline-primary btn-sm py-0 px-2" style="font-size: 0.8rem;">
                    Configure BYOK Key
                </a>
            <?php endif; ?>
        </div>
    </div>

    <!-- Line Shopping Table -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
            <div>
                <h2 class="h5 mb-0 fw-bold">Live Odds Matrix</h2>
                <span class="small text-muted">Discrepancy flags highlight book pricing differences (half-point key numbers and cross-book value).</span>
            </div>
            <span class="badge bg-light text-dark border"><?= count($oddsBoard) ?> markets tracked</span>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" id="odds-matrix-table">
                <thead class="table-light text-muted small text-uppercase">
                    <tr>
                        <th>Event / Player</th>
                        <th>Market</th>
                        <th class="text-center">Consensus</th>
                        <th class="text-center">DraftKings</th>
                        <th class="text-center">FanDuel</th>
                        <th class="text-center">BetMGM</th>
                        <th class="text-center">Caesars</th>
                        <th class="text-center">Best Price / Edge</th>
                        <th class="text-center">Quick Track</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($oddsBoard === []): ?>
                        <tr>
                            <td colspan="9" class="text-center py-5 text-muted">
                                <i class="bi bi-broadcast fs-1 d-block mb-2 text-muted"></i>
                                No active lines available for this sport currently.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($oddsBoard as $row): ?>
                            <?php
                            $dk = $row['books']['DraftKings'] ?? null;
                            $fd = $row['books']['FanDuel'] ?? null;
                            $mgm = $row['books']['BetMGM'] ?? null;
                            $czr = $row['books']['Caesars'] ?? null;
                            $hasDiscrepancy = ! empty($row['discrepancy']);
                            ?>
                            <tr class="<?= $hasDiscrepancy ? 'table-warning-subtle' : '' ?>">
                                <td>
                                    <div class="fw-bold"><?= esc($row['name']) ?></div>
                                    <div class="small text-muted"><?= esc($row['event']) ?></div>
                                </td>
                                <td>
                                    <span class="badge bg-light text-secondary border"><?= esc($row['market_label']) ?></span>
                                </td>
                                <td class="text-center font-monospace fw-bold">
                                    <?= esc((string) $row['consensus_line']) ?>
                                </td>
                                <!-- DraftKings -->
                                <td class="text-center">
                                    <?php if ($dk): ?>
                                        <div class="font-monospace small fw-bold <?= ($row['best_over_book'] ?? '') === 'DraftKings' ? 'text-success' : '' ?>">
                                            <?= esc((string) $dk['line']) ?> (<?= $dk['over_odds'] > 0 ? '+' . $dk['over_odds'] : $dk['over_odds'] ?>)
                                        </div>
                                    <?php else: ?><span class="text-muted">-</span><?php endif; ?>
                                </td>
                                <!-- FanDuel -->
                                <td class="text-center">
                                    <?php if ($fd): ?>
                                        <div class="font-monospace small fw-bold <?= ($row['best_over_book'] ?? '') === 'FanDuel' ? 'text-success' : '' ?>">
                                            <?= esc((string) $fd['line']) ?> (<?= $fd['over_odds'] > 0 ? '+' . $fd['over_odds'] : $fd['over_odds'] ?>)
                                        </div>
                                    <?php else: ?><span class="text-muted">-</span><?php endif; ?>
                                </td>
                                <!-- BetMGM -->
                                <td class="text-center">
                                    <?php if ($mgm): ?>
                                        <div class="font-monospace small fw-bold <?= ($row['best_over_book'] ?? '') === 'BetMGM' ? 'text-success' : '' ?>">
                                            <?= esc((string) $mgm['line']) ?> (<?= $mgm['over_odds'] > 0 ? '+' . $mgm['over_odds'] : $mgm['over_odds'] ?>)
                                        </div>
                                    <?php else: ?><span class="text-muted">-</span><?php endif; ?>
                                </td>
                                <!-- Caesars -->
                                <td class="text-center">
                                    <?php if ($czr): ?>
                                        <div class="font-monospace small fw-bold <?= ($row['best_over_book'] ?? '') === 'Caesars' ? 'text-success' : '' ?>">
                                            <?= esc((string) $czr['line']) ?> (<?= $czr['over_odds'] > 0 ? '+' . $czr['over_odds'] : $czr['over_odds'] ?>)
                                        </div>
                                    <?php else: ?><span class="text-muted">-</span><?php endif; ?>
                                </td>
                                <!-- Edge / Discrepancy -->
                                <td class="text-center">
                                    <?php if ($hasDiscrepancy): ?>
                                        <span class="badge bg-warning text-dark border">
                                            <i class="bi bi-lightning-charge-fill me-1"></i><?= esc($row['discrepancy']) ?>
                                        </span>
                                    <?php else: ?>
                                        <span class="badge bg-light text-muted border">Consensus aligned</span>
                                    <?php endif; ?>
                                </td>
                                <!-- Quick Track -->
                                <td class="text-center">
                                    <form method="post" action="<?= site_url('MyMISports/Tracker/Create') ?>" class="d-inline">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="sport" value="<?= esc($activeSport) ?>">
                                        <input type="hidden" name="sportsbook" value="<?= esc($row['best_over_book'] ?? 'DraftKings') ?>">
                                        <input type="hidden" name="event_description" value="<?= esc($row['event']) ?>">
                                        <input type="hidden" name="selection" value="<?= esc($row['name'] . ' Over ' . $row['consensus_line'] . ' ' . $row['market_label']) ?>">
                                        <input type="hidden" name="line" value="<?= esc((string) $row['consensus_line']) ?>">
                                        <input type="hidden" name="odds" value="-110">
                                        <input type="hidden" name="stake_amount" value="50.00">
                                        <button type="submit" class="btn btn-sm btn-outline-primary py-0 px-2" title="1-Click Log to Bet Tracker">
                                            <i class="bi bi-plus-circle me-1"></i> Track
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
