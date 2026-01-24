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
$forecastConfig = config('MyMIForecasting');
$showHeatmap = $forecastConfig->features['confidenceHeatmaps'] ?? false;
$showAccuracy = $forecastConfig->features['accuracyTracking'] ?? false;
$heatmapTimeframes = $forecastConfig->heatmap['timeframes'] ?? ['5m', '15m', '1h'];
$heatmapWindow = $forecastConfig->heatmap['defaultWindow'] ?? '6h';
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
        <?php if ($showHeatmap): ?>
        <div class="col-12">
            <div class="card card-bordered">
                <div class="card-inner">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                        <div>
                            <h6 class="subtitle mb-1">Confidence Heatmap</h6>
                            <div class="text-soft small">Toggle to reveal cached conviction signals across watchlist tickers.</div>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="investmentsHeatmapToggle">
                                <label class="form-check-label" for="investmentsHeatmapToggle">Show Confidence Heatmap</label>
                            </div>
                            <span class="badge bg-danger">0-40</span>
                            <span class="badge bg-warning text-dark">41-65</span>
                            <span class="badge bg-success">66-100</span>
                        </div>
                    </div>
                    <div class="mt-3" id="investmentsHeatmapContainer" hidden>
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered align-middle text-center" id="investmentsHeatmapTable">
                                <thead>
                                    <tr>
                                        <th class="text-start">Ticker</th>
                                        <?php foreach ($heatmapTimeframes as $timeframe): ?>
                                            <th><?= esc($timeframe); ?></th>
                                        <?php endforeach; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="<?= count($heatmapTimeframes) + 1 ?>" class="text-soft">Toggle heatmap to load cached data.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="small text-soft" id="investmentsHeatmapStatus">Heatmap idle.</div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php if ($showAccuracy): ?>
        <div class="col-12">
            <div class="card card-bordered">
                <div class="card-inner">
                    <div class="card-title-group align-start mb-2">
                        <div class="card-title">
                            <h6 class="subtitle">Forecast Accuracy Tracking</h6>
                            <span class="text-soft">Rolling accuracy, direction bias, and confidence correlation.</span>
                        </div>
                        <div class="card-tools">
                            <span class="badge bg-outline-primary">Admin-only (soon)</span>
                        </div>
                    </div>
                    <ul class="nav nav-tabs nav-tabs-sm" id="forecastAccuracyTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="accuracy-summary-tab" data-bs-toggle="tab" data-bs-target="#accuracy-summary" type="button" role="tab">Rolling Stats</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="accuracy-timeframe-tab" data-bs-toggle="tab" data-bs-target="#accuracy-timeframe" type="button" role="tab">By Timeframe</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="accuracy-direction-tab" data-bs-toggle="tab" data-bs-target="#accuracy-direction" type="button" role="tab">By Direction</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="accuracy-confidence-tab" data-bs-toggle="tab" data-bs-target="#accuracy-confidence" type="button" role="tab">Confidence vs Accuracy</button>
                        </li>
                    </ul>
                    <div class="tab-content pt-3" id="forecastAccuracyContent">
                        <div class="tab-pane fade show active" id="accuracy-summary" role="tabpanel">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="border rounded p-3 h-100">
                                        <div class="text-soft small">Rolling 7-Day</div>
                                        <div class="fw-semibold" id="accuracyRolling7">--</div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="border rounded p-3 h-100">
                                        <div class="text-soft small">Rolling 30-Day</div>
                                        <div class="fw-semibold" id="accuracyRolling30">--</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="accuracy-timeframe" role="tabpanel">
                            <ul class="list-group list-group-sm" id="accuracyByTimeframe">
                                <li class="list-group-item text-soft">Loading timeframe accuracy...</li>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="accuracy-direction" role="tabpanel">
                            <ul class="list-group list-group-sm" id="accuracyByDirection">
                                <li class="list-group-item text-soft">Loading direction accuracy...</li>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="accuracy-confidence" role="tabpanel">
                            <ul class="list-group list-group-sm" id="accuracyConfidenceCorrelation">
                                <li class="list-group-item text-soft">Loading confidence correlation...</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
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
    const heatmapToggle = document.getElementById('investmentsHeatmapToggle');
    const heatmapContainer = document.getElementById('investmentsHeatmapContainer');
    const heatmapTable = document.getElementById('investmentsHeatmapTable');
    const heatmapStatus = document.getElementById('investmentsHeatmapStatus');
    const heatmapTimeframes = <?= json_encode($heatmapTimeframes, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>;

    const renderHeatmap = (payload, cached) => {
        if (!heatmapTable) {
            return;
        }
        const tbody = heatmapTable.querySelector('tbody');
        tbody.innerHTML = '';
        const tickers = payload?.tickers || Object.keys(payload?.grid || {});

        if (!tickers.length) {
            tbody.innerHTML = `<tr><td colspan="${heatmapTimeframes.length + 1}" class="text-soft">No cached heatmap data yet.</td></tr>`;
            if (heatmapStatus) {
                heatmapStatus.textContent = cached ? 'Cache ready.' : 'Waiting for cached confidence data.';
            }
            return;
        }

        tickers.slice(0, 15).forEach((ticker) => {
            const row = document.createElement('tr');
            const label = document.createElement('td');
            label.className = 'text-start fw-semibold';
            label.textContent = ticker;
            row.appendChild(label);

            heatmapTimeframes.forEach((tf) => {
                const cell = document.createElement('td');
                const value = payload?.grid?.[ticker]?.[tf];
                const confidence = Number.isFinite(Number(value)) ? Number(value) : null;
                cell.textContent = confidence !== null ? `${confidence}%` : '—';
                if (confidence !== null) {
                    if (confidence <= 40) {
                        cell.classList.add('bg-danger', 'text-white');
                    } else if (confidence <= 65) {
                        cell.classList.add('bg-warning', 'text-dark');
                    } else {
                        cell.classList.add('bg-success', 'text-white');
                    }
                    cell.title = `${ticker} ${tf}: ${confidence}%`;
                }
                row.appendChild(cell);
            });

            tbody.appendChild(row);
        });

        if (heatmapStatus) {
            heatmapStatus.textContent = cached ? 'Using cached confidence snapshots.' : 'Heatmap cache refreshed.';
        }
    };

    const loadHeatmap = async () => {
        if (!heatmapTable) {
            return;
        }
        if (heatmapStatus) {
            heatmapStatus.textContent = 'Loading heatmap...';
        }
        try {
            const response = await fetch(`/API/Investments/getConfidenceHeatmap?timeframe=all&window=<?= esc($heatmapWindow, 'url') ?>`);
            const json = await response.json();
            renderHeatmap(json?.data || {}, json?.cached);
        } catch (error) {
            console.error('Heatmap load failed', error);
            if (heatmapStatus) {
                heatmapStatus.textContent = 'Heatmap unavailable.';
            }
        }
    };

    if (heatmapToggle && heatmapContainer) {
        heatmapToggle.addEventListener('change', () => {
            heatmapContainer.hidden = !heatmapToggle.checked;
            if (heatmapToggle.checked) {
                loadHeatmap();
            }
        });
    }

    <?php if ($showAccuracy): ?>
    const accuracyRolling7 = document.getElementById('accuracyRolling7');
    const accuracyRolling30 = document.getElementById('accuracyRolling30');
    const accuracyByTimeframe = document.getElementById('accuracyByTimeframe');
    const accuracyByDirection = document.getElementById('accuracyByDirection');
    const accuracyConfidence = document.getElementById('accuracyConfidenceCorrelation');

    const renderAccuracyList = (container, items, formatter) => {
        if (!container) return;
        container.innerHTML = '';
        if (!items || items.length === 0) {
            container.innerHTML = '<li class="list-group-item text-soft">No accuracy data yet.</li>';
            return;
        }
        items.forEach((item) => {
            const li = document.createElement('li');
            li.className = 'list-group-item d-flex justify-content-between align-items-center';
            li.innerHTML = formatter(item);
            container.appendChild(li);
        });
    };

    const loadAccuracy = async () => {
        try {
            const response = await fetch('/API/Investments/getForecastAccuracySummary?days=30');
            const json = await response.json();
            const data = json?.data || {};

            if (accuracyRolling7) {
                const rolling7 = data?.rolling?.['7d'];
                accuracyRolling7.textContent = rolling7
                    ? `Hit Rate ${rolling7.hitRate}% (${rolling7.hits}/${rolling7.total}) • Avg MFE ${rolling7.avgMfe} • Avg MAE ${rolling7.avgMae}`
                    : '--';
            }
            if (accuracyRolling30) {
                const rolling30 = data?.rolling?.['30d'];
                accuracyRolling30.textContent = rolling30
                    ? `Hit Rate ${rolling30.hitRate}% (${rolling30.hits}/${rolling30.total}) • Avg MFE ${rolling30.avgMfe} • Avg MAE ${rolling30.avgMae}`
                    : '--';
            }

            renderAccuracyList(accuracyByTimeframe, data?.byTimeframe, (item) =>
                `<span>${item.label}</span><span class="badge bg-outline-primary">${item.hitRate}% (${item.hits}/${item.total})</span>`
            );
            renderAccuracyList(accuracyByDirection, data?.byDirection, (item) =>
                `<span>${item.label}</span><span class="badge bg-outline-primary">${item.hitRate}% (${item.hits}/${item.total})</span>`
            );
            renderAccuracyList(accuracyConfidence, data?.confidenceCorrelation, (item) =>
                `<span>${item.bucket}</span><span class="badge bg-outline-primary">${item.hitRate}% (${item.total})</span>`
            );
        } catch (error) {
            console.error('Accuracy load failed', error);
        }
    };

    loadAccuracy();
    <?php endif; ?>
});
</script>

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
       
