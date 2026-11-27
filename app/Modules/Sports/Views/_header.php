<?php
/**
 * Shared Top-Level Header & Navigation Bar for MyMI Sports & Betting Analytics Hub.
 *
 * @var string $activeTab 'nfl'|'nba'|'tracker'|'odds'|'calculators'|'settings'
 * @var string|null $pageTitle
 * @var string|null $pageSubtitle
 * @var string|null $notice
 */
$activeTab ??= 'nfl';
$notice ??= session()->getFlashdata('sports_notice');
$disclaimer = \App\Modules\Sports\Libraries\SportsPropsService::DISCLAIMER;
?>
<div class="mb-4" id="sports-hub-header">
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
        <div>
            <h1 class="h3 mb-1 fw-bold"><?= esc($pageTitle ?? 'MyMI Sports & Betting Analytics Hub') ?></h1>
            <p class="text-muted mb-0"><?= esc($pageSubtitle ?? 'Quantitative player prop distributions, line shopping, bankroll tracking, and mathematical edge modeling.') ?></p>
        </div>
        <div class="d-flex gap-2 mt-2 mt-md-0">
            <a href="<?= site_url('MyMISports/Tracker') ?>" class="btn btn-sm btn-outline-success">
                <i class="bi bi-journal-check me-1"></i> Bet Tracker
            </a>
            <a href="<?= site_url('MyMISports/Calculators') ?>" class="btn btn-sm btn-outline-info">
                <i class="bi bi-calculator me-1"></i> Calculators
            </a>
            <a href="<?= site_url('MyMISports/Settings') ?>" class="btn btn-sm btn-outline-secondary">
                <i class="bi bi-gear me-1"></i> Settings &amp; BYOK
            </a>
        </div>
    </div>

    <!-- Educational & Regulatory Disclaimer Alert -->
    <div class="alert alert-warning py-2 px-3 small d-flex align-items-center mb-3" role="note">
        <i class="bi bi-shield-exclamation me-2 fs-5 text-warning"></i>
        <div><?= esc($disclaimer) ?></div>
    </div>

    <?php if (is_string($notice) && $notice !== ''): ?>
        <div class="alert alert-info py-2 px-3 alert-dismissible fade show" role="status" id="sports-notice">
            <i class="bi bi-info-circle me-1"></i> <?= esc($notice) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <!-- Main Navigation Tabs -->
    <ul class="nav nav-tabs border-bottom mb-3" id="sports-main-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link <?= $activeTab === 'nfl' ? 'active fw-bold' : 'text-secondary' ?>" href="<?= site_url('MyMISports/NFL') ?>">
                <i class="bi bi-trophy me-1"></i> NFL Intelligence
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $activeTab === 'nba' ? 'active fw-bold' : 'text-secondary' ?>" href="<?= site_url('MyMISports/NBA') ?>">
                <i class="bi bi-dribbble me-1"></i> NBA Intelligence
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $activeTab === 'tracker' ? 'active fw-bold' : 'text-secondary' ?>" href="<?= site_url('MyMISports/Tracker') ?>">
                <i class="bi bi-wallet2 me-1"></i> Bet Tracker &amp; Bankroll
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $activeTab === 'odds' ? 'active fw-bold' : 'text-secondary' ?>" href="<?= site_url('MyMISports/Odds') ?>">
                <i class="bi bi-graph-up-arrow me-1"></i> Line Shopping &amp; Odds Matrix
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $activeTab === 'calculators' ? 'active fw-bold' : 'text-secondary' ?>" href="<?= site_url('MyMISports/Calculators') ?>">
                <i class="bi bi-calculator me-1"></i> +EV &amp; Kelly Calculators
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= $activeTab === 'settings' ? 'active fw-bold' : 'text-secondary' ?>" href="<?= site_url('MyMISports/Settings') ?>">
                <i class="bi bi-sliders me-1"></i> Integrations &amp; Settings
            </a>
        </li>
    </ul>
</div>
