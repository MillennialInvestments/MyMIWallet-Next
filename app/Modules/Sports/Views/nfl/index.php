<?php
/** @var bool $tablesReady @var array $players @var string $disclaimer */
?>
<?= view('App\\Modules\\Sports\\Views\\nfl\\_responsive') ?>
<section class="container-fluid py-4" id="sports-rb-props">
    <div class="mb-3">
        <h1 class="h3 mb-1">NFL Running Back Props</h1>
        <p class="text-muted mb-0">Rushing and receiving yards per game, split by opponent defense rank, with a Goldilocks prop pick.</p>
    </div>

    <div class="alert alert-warning small" role="note"><?= esc($disclaimer) ?></div>

    <?php if (! $tablesReady): ?>
        <div class="alert alert-info">Sports tables are not set up yet. An operator runs the migration <code>2026-11-27-000100_CreateSportsPropAnalyticsTables</code>, then <code>php spark sports:import --provider=sample</code>.</div>
    <?php elseif ($players === []): ?>
        <div class="alert alert-info">No game logs yet. Load the sample set with <code>php spark sports:import --provider=sample</code> or import a CSV with <code>php spark sports:import --logs=FILE --defense=FILE</code>.</div>
    <?php else: ?>
        <div class="card">
            <div class="table-responsive">
                <table class="table table-striped mb-0 sports-stack" id="sports-player-table">
                    <thead><tr><th>Player</th><th>Team</th><th>Season</th><th class="text-end">Games</th><th class="text-end">Rush yds / game</th><th class="text-end">Rec yds / game</th><th><span class="visually-hidden">Actions</span></th></tr></thead>
                    <tbody>
                    <?php foreach ($players as $p): ?>
                        <tr>
                            <td class="sports-stack-title"><?= esc((string) $p['full_name']) ?><?php if ($p['provider'] === 'sample'): ?> <span class="badge bg-secondary">sample data</span><?php endif; ?></td>
                            <td data-label="Team"><?= esc((string) $p['team']) ?></td>
                            <td data-label="Season"><?= (int) $p['season'] ?></td>
                            <td class="text-end" data-label="Games"><?= (int) $p['games'] ?></td>
                            <td class="text-end" data-label="Rush yds / game"><?= esc(number_format((float) $p['rush_avg'], 1)) ?></td>
                            <td class="text-end" data-label="Rec yds / game"><?= esc(number_format((float) $p['rec_avg'], 1)) ?></td>
                            <td class="sports-stack-action"><a class="btn btn-sm btn-primary text-nowrap" href="<?= site_url('MyMISports/NFL/Player/' . (int) $p['id']) ?>">Splits &amp; Goldilocks</a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>
</section>
