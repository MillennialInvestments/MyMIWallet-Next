<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>
<link rel="stylesheet" href="/public/assets/investments/squeeze/squeeze.css">

<div class="container-fluid squeeze-dashboard">
    <div class="row">
        <div class="col-12">
            <h1 class="mb-3">Short Squeeze Scorecard</h1>
            <p class="text-muted">Probabilistic analysis only. Scores reflect squeeze risk + sustainability with structural risk adjustments.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8 mb-4">
            <?php $this->load->view('investments/squeeze/partials/scorecard'); ?>
        </div>
        <div class="col-lg-4 mb-4">
            <?php $this->load->view('investments/squeeze/partials/zoom_out'); ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 mb-4">
            <?php $this->load->view('investments/squeeze/partials/fade_setups'); ?>
        </div>
        <div class="col-lg-6 mb-4">
            <div class="card">
                <div class="card-header">Charts</div>
                <div class="card-body">
                    <div class="chart-wrapper mb-3">
                        <canvas id="squeezeScoreChart" height="200"></canvas>
                    </div>
                    <div class="chart-wrapper">
                        <canvas id="squeezeFlagChart" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/public/assets/investments/squeeze/squeeze.js"></script>
