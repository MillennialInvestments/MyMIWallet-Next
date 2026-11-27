<?php
/**
 * NBA Intelligence Dashboard View:
 * Player prop distributions by opponent defensive tier (Points, Rebounds, Assists, 3-Pointers, Stocks, PRA).
 *
 * @var bool $tablesReady
 * @var list<array> $players
 * @var list<array> $picks
 * @var string $activePos
 * @var string|null $statsUpdated
 * @var string $disclaimer
 */
$players ??= [];
$picks ??= [];
$activePos ??= 'ALL';
$statsUpdated ??= null;
?>
<?= view('App\\Modules\\Sports\\Views\\nfl\\_responsive') ?>
<section class="container-fluid py-4" id="sports-nba-index">
    <?= view('App\\Modules\\Sports\\Views\\_header', [
        'activeTab'    => 'nba',
        'pageTitle'    => 'NBA Props & Matchup Intelligence',
        'pageSubtitle' => 'Quantitative player prop distributions by opponent defensive rank (Points, Rebounds, Assists, 3s, Stocks, PRA).',
    ]) ?>

    <!-- Position Navigation Pills -->
    <ul class="nav nav-pills mb-3" id="nba-pos-pills">
        <li class="nav-item">
            <a class="nav-link <?= $activePos === 'ALL' ? 'active' : '' ?>" href="<?= site_url('MyMISports/NBA?pos=ALL') ?>">All Players</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $activePos === 'PG' ? 'active' : '' ?>" href="<?= site_url('MyMISports/NBA?pos=PG') ?>">Point Guards (PG)</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $activePos === 'SG' ? 'active' : '' ?>" href="<?= site_url('MyMISports/NBA?pos=SG') ?>">Shooting Guards (SG)</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $activePos === 'SF' ? 'active' : '' ?>" href="<?= site_url('MyMISports/NBA?pos=SF') ?>">Small Forwards (SF)</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $activePos === 'PF' ? 'active' : '' ?>" href="<?= site_url('MyMISports/NBA?pos=PF') ?>">Power Forwards (PF)</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $activePos === 'C' ? 'active' : '' ?>" href="<?= site_url('MyMISports/NBA?pos=C') ?>">Centers (C)</a>
        </li>
    </ul>

    <?php if ($tablesReady): ?>
        <form method="post" action="<?= site_url('MyMISports/NBA/Refresh') ?>" class="d-flex flex-wrap align-items-center gap-2 mb-3" id="nba-refresh-form">
            <?= csrf_field() ?>
            <button type="submit" class="btn btn-outline-primary btn-sm">Refresh NBA Stats</button>
            <span class="text-muted small"><?= $statsUpdated ? 'Stats updated ' . esc($statsUpdated) . ' UTC.' : 'Stats update automatically daily.' ?></span>
        </form>
    <?php endif; ?>

    <!-- Goldilocks Top Edge Picks -->
    <?php if ($picks !== []): ?>
        <div class="card mb-4 border-success shadow-sm">
            <div class="card-header bg-success text-white py-2 d-flex justify-content-between align-items-center">
                <h2 class="h6 mb-0 fw-bold"><i class="bi bi-stars me-1"></i> Goldilocks +EV NBA Value Picks</h2>
                <span class="badge bg-white text-success fw-bold">Mathematical Edge &gt; 3%</span>
            </div>
            <div class="table-responsive">
                <table class="table table-sm table-hover align-middle mb-0">
                    <thead class="table-light small text-uppercase text-muted">
                        <tr>
                            <th>Player</th>
                            <th>Team</th>
                            <th>Opponent Tier</th>
                            <th>Prop Market</th>
                            <th class="text-center">Line</th>
                            <th class="text-center">Recommendation</th>
                            <th class="text-end">Hit Prob</th>
                            <th class="text-end">Edge</th>
                            <th class="text-end">EV / $</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($picks as $pick): ?>
                            <tr>
                                <td class="fw-bold"><?= esc($pick['player_name']) ?></td>
                                <td><span class="badge bg-light text-dark border"><?= esc($pick['team']) ?></span></td>
                                <td>
                                    <span class="badge bg-<?= ($pick['tier'] ?? '') === 'bottom' ? 'success' : (($pick['tier'] ?? '') === 'top' ? 'danger' : 'warning') ?>-subtle text-dark border">
                                        <?= esc(ucfirst((string) ($pick['tier'] ?? 'neutral'))) ?> Def
                                    </span>
                                </td>
                                <td><?= esc($pick['market_label'] ?? $pick['market']) ?></td>
                                <td class="text-center font-monospace fw-bold"><?= esc((string) $pick['line']) ?></td>
                                <td class="text-center">
                                    <span class="badge bg-primary"><?= esc(strtoupper((string) $pick['side'])) ?></span>
                                </td>
                                <td class="text-end font-monospace"><?= number_format((float) $pick['model_prob'] * 100, 1) ?>%</td>
                                <td class="text-end font-monospace text-success fw-bold">+<?= number_format((float) $pick['edge'] * 100, 1) ?>%</td>
                                <td class="text-end font-monospace text-success fw-bold">+<?= number_format((float) $pick['ev_per_dollar'] * 100, 1) ?>%</td>
                                <td class="text-center">
                                    <form method="post" action="<?= site_url('MyMISports/Tracker/Create') ?>" class="d-inline">
                                        <?= csrf_field() ?>
                                        <input type="hidden" name="sport" value="NBA">
                                        <input type="hidden" name="sportsbook" value="DraftKings">
                                        <input type="hidden" name="event_description" value="NBA Matchup">
                                        <input type="hidden" name="selection" value="<?= esc($pick['player_name'] . ' ' . strtoupper((string) $pick['side']) . ' ' . $pick['line'] . ' ' . ($pick['market_label'] ?? $pick['market'])) ?>">
                                        <input type="hidden" name="line" value="<?= esc((string) $pick['line']) ?>">
                                        <input type="hidden" name="odds" value="-110">
                                        <input type="hidden" name="stake_amount" value="50.00">
                                        <button type="submit" class="btn btn-outline-success btn-sm py-0 px-2" title="Track in Ledger">
                                            <i class="bi bi-plus-circle me-1"></i> Track
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>

    <!-- Players Table -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0 fw-bold">Active NBA Player Roster</h2>
            <span class="badge bg-light text-dark border"><?= count($players) ?> players tracked</span>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" id="nba-players-table">
                <thead class="table-light small text-uppercase text-muted">
                    <tr>
                        <th>Player</th>
                        <th>Team</th>
                        <th>Pos</th>
                        <th class="text-center">Games</th>
                        <th class="text-end">PPG</th>
                        <th class="text-end">RPG</th>
                        <th class="text-end">APG</th>
                        <th class="text-end">3PM</th>
                        <th class="text-end">PRA</th>
                        <th class="text-center">Matchup Intelligence</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($players === []): ?>
                        <tr>
                            <td colspan="10" class="text-center py-5 text-muted">
                                <i class="bi bi-dribbble fs-1 d-block mb-2 text-muted"></i>
                                No NBA players loaded. Run <code>Refresh NBA Stats</code> to import the latest player logs.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($players as $p): ?>
                            <tr>
                                <td class="fw-bold">
                                    <a href="<?= site_url('MyMISports/NBA/Player/' . (int) $p['id']) ?>" class="text-decoration-none">
                                        <?= esc($p['full_name']) ?>
                                    </a>
                                </td>
                                <td><span class="badge bg-light text-dark border"><?= esc($p['team'] ?? 'NBA') ?></span></td>
                                <td><span class="badge bg-secondary-subtle text-secondary"><?= esc($p['position']) ?></span></td>
                                <td class="text-center font-monospace"><?= (int) ($p['games'] ?? 0) ?></td>
                                <td class="text-end font-monospace fw-bold"><?= number_format((float) ($p['pts_pg'] ?? 0), 1) ?></td>
                                <td class="text-end font-monospace"><?= number_format((float) ($p['reb_pg'] ?? 0), 1) ?></td>
                                <td class="text-end font-monospace"><?= number_format((float) ($p['ast_pg'] ?? 0), 1) ?></td>
                                <td class="text-end font-monospace"><?= number_format((float) ($p['threes_pg'] ?? 0), 1) ?></td>
                                <td class="text-end font-monospace fw-bold text-primary"><?= number_format((float) ($p['pra_pg'] ?? 0), 1) ?></td>
                                <td class="text-center">
                                    <a href="<?= site_url('MyMISports/NBA/Player/' . (int) $p['id']) ?>" class="btn btn-sm btn-outline-primary py-0 px-2">
                                        Analyze Splits <i class="bi bi-chevron-right ms-1"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
