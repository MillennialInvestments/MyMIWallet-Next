<?php
// echo '<script <?= $nonce['script'] ?? '' 
//     console.log("userInvestment Array: " + ' . (print_r($userInvestments, true)) . '
// </script>'; 
// log_message('debug', 'Investments\index L2 - $investDashboard Array: ' . (print_r($investDashboard, true)));
// $account_activated = $userAssessment['account_activated'] == 1 ? 'Yes' : 'No';
// $account_informationStatus = $userAssessment['account_information'] == 'Yes' ? 'Completed' : 'Pending';
// $kyc_verifiedStatus = $userAssessment['kyc_verified'] == 'Yes' ? 'Completed' : 'Pending';
// $features_activatedStatus = $userAssessment['features_activated'] == 'Yes' ? 'Completed' : 'Pending';
// $financial_assessmentStatus = $userAssessment['financial_assessment'] == 'Yes' ? 'Completed' : 'Pending';
// $banking_accountsStatus = $userAssessment['banking_accounts'] == 'Yes' ? 'Completed' : 'Pending';
// $banking_walletsStatus = $userAssessment['banking_wallets'] == 'Yes' ? 'Completed' : 'Pending';
// $last_banking_updateStatus = $userAssessment['last_banking_update'] == 'Yes' ? 'Completed' : 'Pending';
// $banking_integrationStatus = $userAssessment['banking_integration'] == 'Yes' ? 'Completed' : 'Pending';
// $credit_summaryStatus = $userAssessment['credit_summary'] == 'Yes' ? 'Completed' : 'Pending';
// $credit_walletsStatus = $userAssessment['credit_wallets'] == 'Yes' ? 'Completed' : 'Pending';
// $last_credit_updateStatus = $userAssessment['last_credit_update'] == 'Yes' ? 'Completed' : 'Pending';
// $credit_integrationStatus = $userAssessment['credit_integration'] == 'Yes' ? 'Completed' : 'Pending';
// $debt_summaryStatus = $userAssessment['debt_summary'] == 'Yes' ? 'Completed' : 'Pending';
// $debt_walletsStatus = $userAssessment['debt_wallets'] == 'Yes' ? 'Completed' : 'Pending';
// $last_debt_updateStatus = $userAssessment['last_debt_update'] == 'Yes' ? 'Completed' : 'Pending';
// $debt_integrationStatus = $userAssessment['debt_integration'] == 'Yes' ? 'Completed' : 'Pending';
// $investment_assessmentStatus = $userAssessment['investment_assessment'] == 'Yes' ? 'Completed' : 'Pending';
// $investment_walletsStatus = $userAssessment['investment_wallets'] == 'Yes' ? 'Completed' : 'Pending';
// $last_investment_updateStatus = $userAssessment['last_investment_update'] == 'Yes' ? 'Completed' : 'Pending';
// $brokerage_integrationStatus = $userAssessment['brokerage_integration'] == 'Yes' ? 'Completed' : 'Pending';
// $risk_assessmentStatus = $userAssessment['risk_assessment'] == 'Yes' ? 'Completed' : 'Pending';
// $financial_goalsStatus = $userAssessment['financial_goals'] == 'Yes' ? 'Completed' : 'Pending';
// $time_horizonStatus = $userAssessment['time_horizon'] == 'Yes' ? 'Completed' : 'Pending';
// $financial_ratingStatus = $userAssessment['financial_rating'] == 'Yes' ? 'Completed' : 'Pending';
// $investment_experienceStatus = $userAssessment['investment_experience'] == 'Yes' ? 'Completed' : 'Pending';
// $investment_knowledgeStatus = $userAssessment['investment_knowledge'] == 'Yes' ? 'Completed' : 'Pending';
// $market_sentimentStatus = $userAssessment['market_sentiment'] == 'Yes' ? 'Completed' : 'Pending';
// $investment_availabilityStatus = $userAssessment['investment_availability'] == 'Yes' ? 'Completed' : 'Pending';
// // log_message('debug', 'Investments\index L31 - $userInvestments Array: ' . (print_r($userInvestments, true)));
$investmentOverview = $userInvestments['investmentOverview'] ?? []; 
// log_message('debug', 'Investments\index L33 - $investmentOverview Array: ' . (print_r($investmentOverview, true)));
$subViewData = [
    'beta' => $beta,
    'assetOperations' => $siteSettings->assetOperations ?? 0,
    'investmentOperations' => $siteSettings->investmentOperations ?? 0,
    'cuID' => $cuID,
    'cuEmail' => $cuEmail,
    'cuUsername' => $cuUsername,
    // 'userAssessment' => $userAssessment,
    // 'account_informationStatus' => $account_informationStatus,
    // 'kyc_verifiedStatus' => $kyc_verifiedStatus,
    // 'features_activatedStatus' => $features_activatedStatus,
    // 'financial_assessmentStatus' => $financial_assessmentStatus,
    // 'banking_accountsStatus' => $banking_accountsStatus,
    // 'banking_walletsStatus' => $banking_walletsStatus,
    // 'last_banking_updateStatus' => $last_banking_updateStatus,
    // 'banking_integrationStatus' => $banking_integrationStatus,
    // 'credit_summaryStatus' => $credit_summaryStatus,
    // 'credit_walletsStatus' => $credit_walletsStatus,
    // 'last_credit_updateStatus' => $last_credit_updateStatus,
    // 'credit_integrationStatus' => $credit_integrationStatus,
    // 'debt_summaryStatus' => $debt_summaryStatus,
    // 'debt_walletsStatus' => $debt_walletsStatus,
    // 'last_debt_updateStatus' => $last_debt_updateStatus,
    // 'debt_integrationStatus' => $debt_integrationStatus,
    // 'investment_assessmentStatus' => $investment_assessmentStatus,
    // 'investment_walletsStatus' => $investment_walletsStatus,
    // 'last_investment_updateStatus' => $last_investment_updateStatus,
    // 'brokerage_integrationStatus' => $brokerage_integrationStatus,
    // 'risk_assessmentStatus' => $risk_assessmentStatus,
    // 'financial_goalsStatus' => $financial_goalsStatus,
    // 'time_horizonStatus' => $time_horizonStatus,
    // 'financial_ratingStatus' => $financial_ratingStatus,
    // 'investment_experienceStatus' => $investment_experienceStatus,
    // 'investment_knowledgeStatus' => $investment_knowledgeStatus,
    // 'market_sentimentStatus' => $market_sentimentStatus,
    // 'investment_availabilityStatus' => $investment_availabilityStatus,
    'investDashboard' => $investDashboard,
    'investmentOverview' => $userInvestments['investmentOverview'] ?? [],
    'userInvestmentRecords' => $userInvestments['userInvestmentRecords'] ?? [],
    'activeInvestments' => $userInvestments['activeInvestments'] ?? [],
    'totalUserInvestments' => $userInvestments['totalUserInvestments'] ?? [],
    'totalTradeValue' => $userInvestments['totalTradeValue'] ?? [],
    'totalTradeValueSum' => $userInvestments['totalTradeValueSum'] ?? [],
    'totalAssetValueSum' => $userInvestments['totalAssetValueSum'] ?? [],
    'totalLastTradeValueSum' => $userInvestments['totalLastTradeValueSum'] ?? [],
    'totalAnnualTradeValueSum' => $userInvestments['totalAnnualTradeValueSum'] ?? [],
    'totalAnnualTradePerformance' => $userInvestments['totalAnnualTradePerformance'] ?? [],
    'thisMonthTradePerformance' => $userInvestments['thisMonthTradePerformance'] ?? [],
    'lastMonthTradePerformance' => $userInvestments['lastMonthTradePerformance'] ?? [],
    'totalTradeCount' => $userInvestments['totalTradeCount'] ?? [],
    'totalActiveTradeCount' => $userInvestments['totalActiveTradeCount'] ?? [],
    'totalUserAssetsValue' => $userInvestments['totalUserAssetsValue'] ?? [],
    'totalUserAssetsCount' => $userInvestments['totalUserAssetsCount'] ?? [],
    'totalUserAssetPerformance' => $userInvestments['totalUserAssetPerformance'] ?? [],
    'totalMonthlyTradesCount' => $userInvestments['totalMonthlyTradesCount'] ?? [],
    'totalAssetCount' => $userInvestments['totalAssetCount'] ?? [],
    'totalGrowth' => $userInvestments['totalGrowth'] ?? [],
    'topPerformers' => $userInvestments['investmentOverview']['topInvestmentPerformers'] ?? [],
    'topLosers' => $userInvestments['investmentOverview']['topInvestmentLosers'] ?? [],
    'userCurrentAnnualValue' => $userInvestments['userCurrentAnnualValue'] ?? [],
    'userCurrentAnnualPerformance' => $userInvestments['userCurrentAnnualPerformance'] ?? [],
    'userCurrentAnnualTarget' => $userInvestments['userCurrentAnnualTarget'] ?? [],
    'userTopGainers' => $userInvestments['userTopGainers'] ?? [],
    'userTopGainer' => $userInvestments['userTopGainer'] ?? [],
    'userTopLosers' => $userInvestments['userTopLosers'] ?? [],
    'userTopLoser' => $userInvestments['userTopLoser'] ?? [],
    'userWatchlist' => $userInvestments['userWatchlist'] ?? [],
    'economicData' => $investDashboard['economicData'] ?? [],
    'squeezeRadar' => $squeezeRadar ?? [],
];
$investmentPartialData = is_array($subViewData ?? null) ? $subViewData : [];
$actionCenterData      = $investmentPartialData['actionCenter'] ?? $investmentPartialData;
if (!is_array($actionCenterData)) {
    $actionCenterData = [];
}

$actionCenterData['userInvestments'] = $actionCenterData['userInvestments'] ?? [];
$actionCenterData['riskTools']       = $actionCenterData['riskTools']       ?? [];
$actionCenterData['insights']        = $actionCenterData['insights']        ?? [];
?>

<div class="nk-block">
    <div class="card card-bordered">
        <div class="card-inner">
            <div class="card-title-group align-start mb-3">
                <div class="card-title">
                    <h6 class="subtitle">Forecast Intelligence</h6>
                    <span class="text-soft">Heatmap confidence, accuracy tracking, and manual refresh controls.</span>
                </div>
            </div>
            <ul class="nav nav-tabs mb-3" id="forecastTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="forecast-heatmap-tab" data-bs-toggle="tab" data-bs-target="#forecast-heatmap-pane" type="button" role="tab">Heatmap</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="forecast-accuracy-tab" data-bs-toggle="tab" data-bs-target="#forecast-accuracy-pane" type="button" role="tab">Accuracy</button>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="forecast-heatmap-pane" role="tabpanel">
                    <div class="d-flex flex-wrap justify-content-between align-items-center mb-2 gap-2">
                        <div class="small text-soft" id="investmentsHeatmapStatus">Loading heatmap…</div>
                        <div class="d-flex gap-2 align-items-center">
                            <select id="investmentsHeatmapTimeframe" class="form-select form-select-sm">
                                <option value="5m">5m</option>
                                <option value="10m">10m</option>
                            </select>
                            <button class="btn btn-sm btn-outline-primary" type="button" id="investmentsHeatmapRefresh">Refresh</button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm" id="investmentsHeatmapTable">
                            <thead>
                                <tr>
                                    <th>Ticker</th>
                                    <th>5m</th>
                                    <th>10m</th>
                                    <th>Updated</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="forecast-accuracy-pane" role="tabpanel">
                    <div class="row g-gs">
                        <div class="col-lg-6">
                            <div class="border rounded-3 p-3 h-100">
                                <h6 class="mb-2">Hit Rate by Timeframe</h6>
                                <canvas id="forecastAccuracyChart" height="180"></canvas>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="border rounded-3 p-3 h-100">
                                <h6 class="mb-2">Rolling Hit Rate</h6>
                                <div class="d-flex justify-content-between mb-2">
                                    <div>
                                        <div class="text-soft small">7d</div>
                                        <div class="fw-bold" id="forecastRolling7d">--%</div>
                                    </div>
                                    <div>
                                        <div class="text-soft small">30d</div>
                                        <div class="fw-bold" id="forecastRolling30d">--%</div>
                                    </div>
                                    <div>
                                        <div class="text-soft small">Last Eval</div>
                                        <div class="fw-bold" id="forecastAccuracyUpdated">--</div>
                                    </div>
                                </div>
                                <div class="small text-soft">Confidence → Accuracy</div>
                                <ul class="list-unstyled mb-0" id="forecastConfidenceBuckets"></ul>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="border rounded-3 p-3 h-100">
                                <h6 class="mb-2">Top Performing Tickers</h6>
                                <table class="table table-sm mb-0" id="forecastTopTickers">
                                    <thead>
                                        <tr>
                                            <th>Ticker</th>
                                            <th class="text-end">Hit Rate</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="border rounded-3 p-3 h-100">
                                <h6 class="mb-2">Worst Performing Tickers</h6>
                                <table class="table table-sm mb-0" id="forecastWorstTickers">
                                    <thead>
                                        <tr>
                                            <th>Ticker</th>
                                            <th class="text-end">Hit Rate</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style <?= $nonce['style'] ?? '' ?>>
@media only screen and (max-width: 768px) {
    #userBudgetingDatatable_filter {
        padding-top: 1rem;
        text-align: left;
    }
}
.nk-order-ovwg-data.income {
    border-color: #8ff0d6;
}
.nk-order-ovwg-data.expenses {
    border-color: #e85347;
}
.nk-order-ovwg-data.surplus {
    border-color: #84b8ff;
}
.nk-order-ovwg-data.investments {
    border-color: #f4bd0e;
}
.nk-order-ovwg-data .amount {
    font-size: 1.25rem;
    font-weight: 700;
}
</style>
<!-- <div id="investment-dashboard">
    <div id="action-center">Loading Action Center...</div>
    <div id="month-to-month">Loading Month-to-Month Performance...</div>
    <div id="investment-tools">Loading Investment Tools...</div>
    <div id="investment-insights">Loading Insights...</div>
</div> -->

<div class="nk-block">
    <div class="g-gs row">
        <div class="col-md-12 col-xl-3">
            <?php echo view('UserModule\Views\Investments\index\Action_Center', $actionCenterData); ?>
        </div>
        <div class="col-md-12 col-xl-9">
            <?php echo view('UserModule\Views\Investments\index\Month_to_Month', $investmentPartialData); ?>
        </div>
        <div class="col-md-12 col-xl-3">
            <div class="nk-block nk-block-lg">
                <div class="row g-gs">
                    <!-- Active Trades Section -->
                    <div class="col-lg-12">
                        <div class="economic-data">
                            <?php echo view('UserModule\Views\Investments\index\Investment_Calendar', $investmentPartialData); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-xl-9">
            <div class="investment-insights">
                <?php echo view('UserModule\Views\Investments\index\Insights', $investmentPartialData); ?>
            </div>
        </div>
        <?php if ($cuRole <= 2) { ?>
        <div class="col-md-12">
            <div class="investment-insights">
                <?php // echo view('UserModule\Views\Investments\index\Insights', $investmentPartialData); ?>
            </div>
        </div>
        <?php }; ?>
        <?php if ($siteSettings->stage > 5) : ?>
        <div class="col-md-12 col-xl-3">
            <div class="nk-block nk-block-lg">
                <div class="row g-gs">
                    <!-- Active Trades Section -->
                    <div class="col-lg-12">
                        <div class="investment-insights">
                            <?php echo view('UserModule\Views\Investments\index\MyMI_News', $investmentPartialData); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-xl-9">
            <div class="nk-block nk-block-lg">
                <div class="row g-gs">
                    <!-- Active Trades Section -->
                    <div class="col-lg-6">
                        <div class="investment-insights">
                            <?php echo view('UserModule\Views\Investments\index\My_Performance', $investmentPartialData); ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="investment-insights">
                            <?php echo view('UserModule\Views\Investments\index\My_Alerts', $investmentPartialData); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-xl-3">
            <div class="nk-block nk-block-lg">
                <div class="row g-gs">
                    <!-- Active Trades Section -->
                    <div class="col-lg-12">
                        <div class="investment-insights">
                            <?php echo view('UserModule\Views\Investments\index\Economic_Data', $investmentPartialData); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-xl-9">
            <div class="nk-block nk-block-lg">
                <div class="row g-gs">
                    <!-- Active Trades Section -->
                    <div class="col-lg-6">
                        <div class="investment-insights">
                            <?php echo view('UserModule\Views\Investments\index\Stock_Overview', $investmentPartialData); ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="investment-insights">
                            <?php echo view('UserModule\Views\Investments\index\Crypto_Overview', $investmentPartialData); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
document.addEventListener('DOMContentLoaded', () => {
    async function fetchInvestmentData() {
        try {
            const response = await fetch(<?= site_url('/API/getUserInvestmentData/' . $cuID)?>); // Replace with your API endpoint
            const data = await response.json();

            if (response.ok) {
                populateDashboard(data);
            } else {
                console.error('Failed to fetch data:', data.message);
            }
        } catch (error) {
            console.error('Error fetching investment data:', error);
        }
    }

    function populateDashboard(data) {
        document.getElementById('action-center').innerHTML = renderActionCenter(data.actionCenter);
        document.getElementById('month-to-month').innerHTML = renderMonthToMonth(data.monthToMonth);
        document.getElementById('investment-tools').innerHTML = renderInvestmentTools(data.tools);
        document.getElementById('investment-insights').innerHTML = renderInvestmentInsights(data.insights);
    }

    fetchInvestmentData();
});
</script>
<script <?= $nonce['script'] ?? '' ?>>
document.addEventListener('DOMContentLoaded', function () {
    const heatmapTable = document.getElementById('investmentsHeatmapTable');
    const heatmapStatus = document.getElementById('investmentsHeatmapStatus');
    const heatmapSelect = document.getElementById('investmentsHeatmapTimeframe');
    const heatmapRefresh = document.getElementById('investmentsHeatmapRefresh');
    const accuracyChartEl = document.getElementById('forecastAccuracyChart');
    const rolling7d = document.getElementById('forecastRolling7d');
    const rolling30d = document.getElementById('forecastRolling30d');
    const accuracyUpdated = document.getElementById('forecastAccuracyUpdated');
    const confidenceBuckets = document.getElementById('forecastConfidenceBuckets');
    const topTickersTable = document.querySelector('#forecastTopTickers tbody');
    const worstTickersTable = document.querySelector('#forecastWorstTickers tbody');
    const csrfToken = '<?= csrf_hash(); ?>';

    function badgeClass(confidence) {
        if (confidence >= 75) return 'bg-success';
        if (confidence >= 60) return 'bg-warning';
        if (confidence >= 40) return 'bg-info';
        return 'bg-secondary';
    }

    function openForecastModal(ticker) {
        if (typeof window.dynamicModalLoader === 'function') {
            window.dynamicModalLoader('/Investments/forecastModal/' + ticker);
        } else {
            window.location.href = '/Investments/forecastModal/' + ticker;
        }
    }

    function renderHeatmap(data) {
        if (!heatmapTable) return;
        const tbody = heatmapTable.querySelector('tbody');
        tbody.innerHTML = '';

        (data.matrix || []).forEach(row => {
            const info5m = row.timeframes?.['5m'] || { confidence: 0 };
            const info10m = row.timeframes?.['10m'] || { confidence: 0 };
            const updatedAt = Object.values(row.timeframes || {}).map(item => item.updated_at).filter(Boolean).sort().pop() || '—';

            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td><strong>${row.ticker}</strong></td>
                <td><span class=\"badge ${badgeClass(info5m.confidence)}\">${info5m.confidence}%</span></td>
                <td><span class=\"badge ${badgeClass(info10m.confidence)}\">${info10m.confidence}%</span></td>
                <td class=\"small text-soft\">${updatedAt}</td>
                <td class=\"text-end\"></td>
            `;

            const actionCell = tr.querySelector('td.text-end');
            const viewButton = document.createElement('button');
            viewButton.type = 'button';
            viewButton.className = 'btn btn-sm btn-outline-primary me-1';
            viewButton.textContent = 'View Details';
            viewButton.addEventListener('click', () => openForecastModal(row.ticker));

            const reforecastButton = document.createElement('button');
            reforecastButton.type = 'button';
            reforecastButton.className = 'btn btn-sm btn-outline-warning';
            reforecastButton.textContent = 'Re-Forecast';
            reforecastButton.addEventListener('click', () => reforecastTicker(row.ticker));

            actionCell.appendChild(viewButton);
            actionCell.appendChild(reforecastButton);
            tbody.appendChild(tr);
        });

        if (heatmapStatus) {
            heatmapStatus.textContent = data.matrix && data.matrix.length ? 'Heatmap updated.' : 'No forecast data available.';
        }
    }

    function loadHeatmap() {
        const timeframe = heatmapSelect?.value || '5m';
        fetch(`/API/Investments/getConfidenceHeatmap?timeframe=${encodeURIComponent(timeframe)}&window=60`)
            .then(resp => resp.json())
            .then(data => renderHeatmap(data))
            .catch(() => {
                if (heatmapStatus) {
                    heatmapStatus.textContent = 'Unable to load heatmap.';
                }
            });
    }

    function reforecastTicker(ticker) {
        const timeframe = heatmapSelect?.value || '5m';
        const payload = new URLSearchParams();
        payload.append('ticker', ticker);
        payload.append('timeframes', timeframe);

        fetch('/API/Investments/reforecastTicker', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
                'X-CSRF-TOKEN': csrfToken,
            },
            body: payload.toString(),
        })
            .then(resp => resp.json())
            .then(() => loadHeatmap())
            .catch(() => {
                if (heatmapStatus) {
                    heatmapStatus.textContent = 'Re-forecast failed.';
                }
            });
    }

    function renderTickerTable(tableBody, rows) {
        if (!tableBody) return;
        tableBody.innerHTML = '';
        (rows || []).forEach(row => {
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>${row.label}</td>
                <td class=\"text-end\">${row.hit_rate}%</td>
            `;
            tableBody.appendChild(tr);
        });
    }

    function renderAccuracySummary(data) {
        if (rolling7d) rolling7d.textContent = `${data.rollingHitRate?.['7d'] ?? 0}%`;
        if (rolling30d) rolling30d.textContent = `${data.rollingHitRate?.['30d'] ?? 0}%`;
        if (accuracyUpdated) accuracyUpdated.textContent = data.lastEvaluatedAt || '--';

        if (confidenceBuckets) {
            confidenceBuckets.innerHTML = '';
            (data.confidenceBuckets || []).forEach(bucket => {
                const li = document.createElement('li');
                li.className = 'd-flex justify-content-between small mb-1';
                li.innerHTML = `<span>${bucket.label}</span><span>${bucket.hit_rate}%</span>`;
                confidenceBuckets.appendChild(li);
            });
        }

        renderTickerTable(topTickersTable, data.topTickers);
        renderTickerTable(worstTickersTable, data.worstTickers);

        if (accuracyChartEl && window.Chart) {
            const labels = (data.accuracyByTimeframe || []).map(row => row.label);
            const values = (data.accuracyByTimeframe || []).map(row => row.hit_rate);
            new Chart(accuracyChartEl.getContext('2d'), {
                type: 'bar',
                data: {
                    labels,
                    datasets: [{
                        label: 'Hit Rate',
                        data: values,
                        backgroundColor: '#6576ff',
                    }],
                },
                options: {
                    plugins: { legend: { display: false } },
                    scales: { y: { beginAtZero: true, max: 100 } },
                },
            });
        }
    }

    function loadAccuracySummary() {
        fetch('/API/Investments/getForecastAccuracySummary?window=7d')
            .then(resp => resp.json())
            .then(data => renderAccuracySummary(data))
            .catch(() => {});
    }

    if (heatmapSelect) {
        heatmapSelect.addEventListener('change', loadHeatmap);
    }
    if (heatmapRefresh) {
        heatmapRefresh.addEventListener('click', loadHeatmap);
    }

    loadHeatmap();
    loadAccuracySummary();
});
</script>
<script <?= $nonce['script'] ?? '' ?>>
document.addEventListener('DOMContentLoaded', function () {
    const cache = new Map();

    // Initialize last 12 months
    function initializeLast12Months() {
        const monthlyData = {};
        const date = new Date();
        for (let i = 0; i < 12; i++) {
            const monthYear = `${date.getFullYear()}-${String(date.getMonth() + 1).padStart(2, "0")}`;
            monthlyData[monthYear] = 0; // Start with 0 for each month
            date.setMonth(date.getMonth() - 1); // Go back one month
        }
        return monthlyData;
    }

    // Get JSON content from DOM
    const getJsonContent = (selector, defaultValue = '[]') => {
        const element = document.querySelector(selector);
        try {
            return element ? JSON.parse(element.textContent || defaultValue) : JSON.parse(defaultValue);
        } catch (error) {
            console.error(`Error parsing JSON from selector ${selector}:`, error);
            return JSON.parse(defaultValue);
        }
    };

    const investmentData = getJsonContent("#investment-data");
    console.log("Loaded Investment Data:", investmentData);

    const tradeTypeMappings = {
        'equity': 'Stocks',
        'Stock': 'Stocks',
        'option_buy': 'Options',
        'option_sell': 'Options',
        'crypto': 'Cryptocurrencies',
        'mymi_asset': 'MyMI Crypto',
        'mymi_projects': 'MyMI Projects',
    };

    async function initInvestmentChart() {
        const monthlyNetGains = initializeLast12Months();
        const categoryGains = {
            'Stocks': initializeLast12Months(),
            'Options': initializeLast12Months(),
            'Cryptocurrencies': initializeLast12Months(),
            'MyMI Crypto': initializeLast12Months(),
            'MyMI Projects': initializeLast12Months(),
        };

        investmentData.forEach(item => {
            if (!item || !item.category || !item.close_date || !item.net_gains) {
                console.warn('Skipping invalid investment item:', item);
                return;
            }

            const mappedCategory = tradeTypeMappings[item.category];
            if (!mappedCategory) {
                console.warn(`Skipping unsupported trade type: ${item.category}`);
                return;
            }

            const closeDate = new Date(item.close_date);
            const monthYear = `${closeDate.getFullYear()}-${String(closeDate.getMonth() + 1).padStart(2, "0")}`;
            const netGain = parseFloat(item.net_gains) || 0;

            // Aggregate net gains into monthly data
            monthlyNetGains[monthYear] = (monthlyNetGains[monthYear] || 0) + netGain;
            categoryGains[mappedCategory][monthYear] = (categoryGains[mappedCategory][monthYear] || 0) + netGain;
        });

        const sortedKeys = Object.keys(monthlyNetGains).sort();
        const last12MonthsKeys = sortedKeys.slice(-12);

        const chartData = {
            labels: last12MonthsKeys.map(monthYear => {
                const date = new Date(`${monthYear}-01`);
                return date.toLocaleString('default', { month: 'short', year: '2-digit' });
            }),
            datasets: [
                {
                    label: "Total Portfolio",
                    data: last12MonthsKeys.map(key => monthlyNetGains[key]),
                    borderColor: "#007bff",
                    fill: false,
                    type: "line",
                },
                ...Object.keys(categoryGains).map(category => ({
                    label: category,
                    data: last12MonthsKeys.map(key => categoryGains[category][key] || 0),
                    backgroundColor: "#" + Math.floor(Math.random() * 16777215).toString(16),
                    type: "bar",
                })),
            ],
        };

        const ctx = document.getElementById("investment-report-chart");
        if (!ctx) {
            console.error("Chart canvas element not found.");
            return;
        }

        new Chart(ctx.getContext("2d"), {
            type: "bar",
            data: chartData,
            options: {
                scales: {
                    y: { beginAtZero: true },
                    x: { stacked: true },
                },
                plugins: { legend: { position: "bottom" } },
            },
        });
    }

    initInvestmentChart().catch(error => {
        console.error(`Error initializing investment chart: ${error}`);
    });
});

</script>
       
