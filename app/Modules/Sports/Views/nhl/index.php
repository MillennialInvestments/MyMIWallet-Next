<?php
/**
 * NHL Hockey Analytics Dashboard View:
 * Skater Shots on Goal (SOG), Goalie Save %, and Special Teams (PP% vs PK%) Matchups.
 *
 * @var bool $tablesReady
 * @var list<array> $players
 * @var array<string,array> $teamsDefense
 * @var string $activePos
 * @var string|null $statsUpdated
 * @var string $disclaimer
 */
$players ??= [];
$teamsDefense ??= [];
$activePos ??= 'ALL';
$statsUpdated ??= null;
?>
<?= view('App\\Modules\\Sports\\Views\\nfl\\_responsive') ?>
<section class="container-fluid py-4" id="sports-nhl-index">
    <?= view('App\\Modules\\Sports\\Views\\_header', [
        'activeTab'    => 'nhl',
        'pageTitle'    => 'NHL Hockey Analytics & Prop Intelligence',
        'pageSubtitle' => 'Quantitative skater Shots on Goal (SOG), goalie save distributions, and Special Teams (PP% vs PK%) efficiency.',
    ]) ?>

    <!-- Position Navigation Pills -->
    <ul class="nav nav-pills mb-3" id="nhl-pos-pills">
        <li class="nav-item">
            <a class="nav-link <?= $activePos === 'ALL' ? 'active' : '' ?>" href="<?= site_url('MyMISports/NHL?pos=ALL') ?>">All Players</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $activePos === 'SKATER' ? 'active' : '' ?>" href="<?= site_url('MyMISports/NHL?pos=SKATER') ?>">Skaters (C / W / D)</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $activePos === 'GOALIE' ? 'active' : '' ?>" href="<?= site_url('MyMISports/NHL?pos=GOALIE') ?>">Goalies (G)</a>
        </li>
    </ul>

    <!-- Special Teams Defense Matrix -->
    <div class="row g-3 mb-4">
        <div class="col-12 col-xl-8">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
                    <h2 class="h5 mb-0 fw-bold"><i class="bi bi-shield-shaded text-primary me-1"></i> Team Shot Suppression &amp; Special Teams Matrix</h2>
                    <span class="badge bg-light text-dark border">Defense Ranks</span>
                </div>
                <div class="table-responsive">
                    <table class="table table-sm table-hover align-middle mb-0">
                        <thead class="table-light small text-uppercase text-muted">
                            <tr>
                                <th>Team</th>
                                <th class="text-end">SOG Allowed/G</th>
                                <th class="text-end">SOG Rank</th>
                                <th class="text-end">GAA</th>
                                <th class="text-end">Penalty Kill (PK%)</th>
                                <th class="text-end">Power Play (PP%)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($teamsDefense as $t): ?>
                                <tr>
                                    <td><span class="badge bg-light text-dark border fw-bold"><?= esc($t['team']) ?></span></td>
                                    <td class="text-end font-monospace"><?= number_format((float) ($t['sog_allowed_pg'] ?? 0), 1) ?></td>
                                    <td class="text-end font-monospace">
                                        <span class="badge bg-<?= (int) ($t['sog_def_rank'] ?? 15) <= 10 ? 'danger' : ((int) ($t['sog_def_rank'] ?? 15) >= 21 ? 'success' : 'warning') ?>-subtle text-dark">
                                            #<?= (int) ($t['sog_def_rank'] ?? 15) ?>
                                        </span>
                                    </td>
                                    <td class="text-end font-monospace"><?= number_format((float) ($t['ga_pg'] ?? 0), 2) ?></td>
                                    <td class="text-end font-monospace text-primary fw-bold"><?= number_format((float) ($t['pk_pct'] ?? 80), 1) ?>%</td>
                                    <td class="text-end font-monospace text-danger fw-bold"><?= number_format((float) ($t['pp_pct'] ?? 20), 1) ?>%</td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-12 col-xl-4">
            <div class="card shadow-sm border-0 h-100 bg-info-subtle text-dark">
                <div class="card-body">
                    <h3 class="h6 fw-bold text-info-emphasis mb-2"><i class="bi bi-fire me-1"></i> Special Teams Mismatch Engine</h3>
                    <p class="small text-muted mb-3">
                        When an elite Power Play (top 5 PP%) faces a weak Penalty Kill (bottom 10 PK%), player points and power-play point odds experience massive positive expectation.
                    </p>
                    <ul class="list-unstyled small mb-3">
                        <li class="mb-1"><i class="bi bi-check-circle-fill text-success me-1"></i> High Danger Scoring Chances (HDCF)</li>
                        <li class="mb-1"><i class="bi bi-check-circle-fill text-success me-1"></i> Expected Goals (xG) against goaltenders</li>
                        <li class="mb-1"><i class="bi bi-check-circle-fill text-success me-1"></i> Pace-adjusted Shots on Goal (SOG) splits</li>
                    </ul>
                    <a href="<?= site_url('My-Bets/Calculators') ?>" class="btn btn-sm btn-outline-dark w-100">
                        View Kelly &amp; Arbitrage Tools <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Players Table -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
            <h2 class="h5 mb-0 fw-bold">Active NHL Player Roster</h2>
            <span class="badge bg-light text-dark border"><?= count($players) ?> players tracked</span>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" id="nhl-players-table">
                <thead class="table-light small text-uppercase text-muted">
                    <tr>
                        <th>Player</th>
                        <th>Team</th>
                        <th>Pos</th>
                        <th>Type</th>
                        <th class="text-center">Games</th>
                        <th class="text-end">Primary Metric</th>
                        <th class="text-end">Secondary Metric</th>
                        <th class="text-end">Key Production</th>
                        <th class="text-center">Matchup Intelligence</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($players === []): ?>
                        <tr>
                            <td colspan="9" class="text-center py-5 text-muted">
                                <i class="bi bi-snow fs-1 d-block mb-2 text-muted"></i>
                                No NHL players loaded.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($players as $p): ?>
                            <?php $isG = ($p['type'] ?? '') === 'Goalie'; ?>
                            <tr>
                                <td class="fw-bold">
                                    <a href="<?= site_url('MyMISports/NHL/Player/' . (int) $p['id']) ?>" class="text-decoration-none">
                                        <?= esc($p['full_name']) ?>
                                    </a>
                                </td>
                                <td><span class="badge bg-light text-dark border"><?= esc($p['team'] ?? 'NHL') ?></span></td>
                                <td><span class="badge bg-secondary-subtle text-secondary"><?= esc($p['position']) ?></span></td>
                                <td>
                                    <span class="badge bg-<?= $isG ? 'danger' : 'primary' ?>-subtle text-dark">
                                        <?= esc($p['type']) ?>
                                    </span>
                                </td>
                                <td class="text-center font-monospace"><?= (int) ($p['games'] ?? 0) ?></td>
                                <td class="text-end font-monospace fw-bold">
                                    <?= $isG ? number_format((float) ($p['saves_pg'] ?? 0), 1) . ' Saves/G' : number_format((float) ($p['sog_pg'] ?? 0), 1) . ' SOG/G' ?>
                                </td>
                                <td class="text-end font-monospace">
                                    <?= $isG ? number_format((float) ($p['ga_pg'] ?? 0), 2) . ' GAA' : number_format((float) ($p['pts_pg'] ?? 0), 1) . ' Pts/G' ?>
                                </td>
                                <td class="text-end font-monospace text-primary fw-bold">
                                    <?= $isG ? '.' . str_pad((string) (int) round(((float) ($p['save_pct'] ?? 0)) * 1000), 3, '0', STR_PAD_LEFT) . ' SV%' : (int) ($p['goals'] ?? 0) . 'G / ' . (int) ($p['assists'] ?? 0) . 'A' ?>
                                </td>
                                <td class="text-center">
                                    <a href="<?= site_url('MyMISports/NHL/Player/' . (int) $p['id']) ?>" class="btn btn-sm btn-outline-primary py-0 px-2">
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
