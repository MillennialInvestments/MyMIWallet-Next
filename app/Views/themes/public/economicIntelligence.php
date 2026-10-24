<?php
$snapshot = is_array($economicSnapshot ?? null)
    ? $economicSnapshot : [];
$indicators = is_array($snapshot['indicators'] ?? null)
    ? $snapshot['indicators'] : [];
$series = [
    'GDP' => 'U.S. nominal GDP (billions USD)',
    'UNRATE' => 'U.S. unemployment rate (%)',
    'CPIAUCSL' => 'Consumer Price Index (index level)',
    'DGS10' => '10-year Treasury yield (%)',
    'MORTGAGE30US' => '30-year mortgage rate (%)',
];
?>
<section class="container py-5" aria-labelledby="economic-intelligence-title">
    <nav aria-label="Breadcrumb">
        <a href="<?= site_url('/') ?>">Home</a>
        <span aria-hidden="true"> / </span> Economic Intelligence
    </nav>
    <h1 id="economic-intelligence-title" class="mt-4">
        MyMI Economic Intelligence
    </h1>
    <p class="lead">
        Explore published U.S. economic indicators and their observation dates.
    </p>
    <div class="row g-3">
        <?php foreach ($series as $id => $label): ?>
            <?php
            $point = is_array($indicators[$id] ?? null)
                ? $indicators[$id] : [];
            $value = isset($point['value']) && is_numeric($point['value'])
                ? number_format((float) $point['value'], 2)
                : 'Unavailable';
            $date = $point['date'] ?? '';
            ?>
            <div class="col-md-6 col-xl-4">
                <article class="card h-100">
                    <div class="card-body">
                        <h2 class="h6"><?= esc($label) ?></h2>
                        <p class="h3"><?= esc($value) ?></p>
                        <p class="text-muted small mb-0">
                            <?= $date !== ''
                                ? 'Observation: ' . esc((string) $date)
                                : 'No verified observation available' ?>
                        </p>
                    </div>
                </article>
            </div>
        <?php endforeach; ?>
    </div>
    <section class="mt-5" aria-labelledby="economic-forecast-title">
        <h2 id="economic-forecast-title">Economic forecasting</h2>
        <p>
            Forecasts, uncertainty intervals, regional models and
            historical accuracy reports are not yet published.
            No projected values are displayed without validation.
        </p>
        <a href="<?= site_url('login') ?>" class="btn btn-primary">
            Sign in to MyMI Wallet
        </a>
    </section>
    <p class="text-muted small mt-4">
        Observations may be delayed or revised. These indicators
        are informational and are not investment recommendations.
    </p>
</section>
