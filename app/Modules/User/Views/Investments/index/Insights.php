<!-- application/modules/User/views/Investments/index/Insights.php -->
<?php $squeezeRadar = $squeezeRadar ?? []; ?>
<div class="nk-block nk-block-lg">
    <div class="row g-gs">
        <!-- Active Trades Section -->
        <div class="col-lg-6">
            <div class="card card-bordered">
                <div class="card-inner-group">
                    <div class="card-inner card-inner-md">
                        <div class="card-title-group">
                            <div class="card-title">
                                <h6 class="title">Active Trades</h6>
                            </div>
                            <div class="card-tools me-n1">
                                <ul class="card-tools-nav">
                                    <li>
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle btn btn-success btn-icon text-white" data-bs-toggle="dropdown"><i class="icon ni ni-plus mx-2"></i></a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a class="dynamicModalLoader" data-formtype="Investments" data-endpoint="addBondTrade"><span>Bond</span></a></li>
                                                    <li><a class="dynamicModalLoader" data-formtype="Investments" data-endpoint="addCryptoTrade"><span>Crypto</span></a></li>
                                                    <li><a class="dynamicModalLoader" data-formtype="Investments" data-endpoint="addOptionsTrade"><span>Options</span></a></li>
                                                    <li><a class="dynamicModalLoader" data-formtype="Investments" data-endpoint="addStockTrade"><span>Stock</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- <li>
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle btn btn-icon" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a href="#"><em class="icon ni ni-setting"></em><span>Action Settings</span></a></li>
                                                    <li><a href="#"><em class="icon ni ni-notify"></em><span>Push Notification</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-inner card-inner-md">
                        <div class="active-trades-list">
                            <table class="datatable-init nk-tb-list nk-tb-ulist" id="activeTradeDataTable" data-auto-responsive="false">
                                <thead>
                                    <tr class="nk-tb-item nk-tb-head">
                                        <th class="nk-tb-col"><span class="sub-text">Trade Name</span></th>
                                        <th class="nk-tb-col"><span class="sub-text">Value</span></th>
                                        <!-- Add more columns as needed -->
                                    </tr>
                                </thead>
                                <tbody id="activeTradesTableBody">
                                    <!-- Active trades rows will be populated here -->
                                    <?php
                                        if ($siteSettings->debug === 1) {
                                            //log_message('debug', 'Investments\index\Insights L57: $userInvestmentRecords: ' . print_r($userInvestmentRecords, true));
                                        };
                                        foreach ($userInvestmentRecords as $investRecords) {
                                            $symbolName = $investRecords['symbol'] . ' - ' . $investRecords['open_date']; 
                                            $tradeValue = $investRecords['current_price'] * $investRecords['shares'];

                                            echo '
                                            <tr class="nk-tb-item">
                                                <td class="nk-tb-col">' . $symbolName . '</td>
                                                <td class="nk-tb-col">' . $tradeValue . '</td>
                                            </tr>
                                            ';
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Watchlist Section -->
        <div class="col-lg-6">
            <!-- Displaying Economic Data -->
            <div class="card card-bordered nk-block">
                <div class="card-inner-group">
                    <div class="card-inner card-inner-md">
                        <div class="card-title-group">
                            <div class="card-title">
                                <h6 class="title">My Watchlist</h6>
                            </div>
                            <div class="card-tools me-n1">
                                <ul class="card-tools-nav">
                                    <li>
                                        <a href="#" class="btn btn-success btn-icon text-white dynamicModalLoader" data-formtype="Investments" data-endpoint="addWatchlist"><i class="icon ni ni-plus mx-2"></i></a>
                                        <!-- <div class="dropdown">
                                            <a href="#" class="dropdown-toggle btn btn-success btn-icon text-white" data-bs-toggle="dropdown"><i class="icon ni ni-plus mx-2"></i></a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a class="dynamicModalLoader" data-formtype="Investments" data-endpoint="addBondWatchlist"><span>Bond</span></a></li>
                                                    <li><a class="dynamicModalLoader" data-formtype="Investments" data-endpoint="addCryptoWatchlist"><span>Crypto</span></a></li>
                                                    <li><a class="dynamicModalLoader" data-formtype="Investments" data-endpoint="addOptionsWatchlist"><span>Options</span></a></li>
                                                    <li><a class="dynamicModalLoader" data-formtype="Investments" data-endpoint="addStockWatchlist"><span>Stock</span></a></li>
                                                </ul>
                                            </div>
                                        </div> -->
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- .card-inner -->
                    <div class="card-inner card-inner-md">
                        <div class="watchlist">
                            <table class="datatable-init nk-tb-list nk-tb-ulist" id="watchListDataTable" data-auto-responsive="false">
                                <thead>
                                    <tr class="nk-tb-item nk-tb-head">
                                        <th class="nk-tb-col"><span class="sub-text">Asset Name</span></th>
                                        <th class="nk-tb-col"><span class="sub-text">Current Value</span></th>
                                        <!-- Add more columns as needed -->
                                    </tr>
                                </thead>
                                <tbody id="watchlistTableBody">
                                    <?php 
                                    // foreach ($userWatchlist as $watchlist) {
                                    //     echo '
                                    //     <tr class="text-center">
                                    //         <td>' . $watchlist['symbol'] . '</td>
                                    //         <td>' . $watchlist['current_price'] . '</td>
                                    //     </tr>
                                    //     ';
                                    // }
                                    ?>
                                    <!-- Watchlist rows will be populated here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Short Squeeze Radar (insertion point) -->
            <div class="card card-bordered mt-3">
                <div class="card-inner">
                    <div class="card-title-group align-start mb-2">
                        <div class="card-title">
                            <h6 class="title">🔥 Short Squeeze Radar</h6>
                            <p class="text-soft small">Mechanical squeeze risk only. High scores can fade quickly without catalysts.</p>
                        </div>
                        <div class="card-tools">
                            <a class="btn btn-sm btn-outline-primary" href="<?= site_url('investments/squeeze'); ?>">View Squeeze Analysis</a>
                        </div>
                    </div>
                    <?php if (!empty($squeezeRadar)): ?>
                        <div class="table-responsive">
                            <table class="table table-sm align-middle">
                                <thead>
                                    <tr>
                                        <th>Symbol</th>
                                        <th>Score</th>
                                        <th>Float</th>
                                        <th>SI %</th>
                                        <th>Turnover</th>
                                        <th>Zoom-Out</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($squeezeRadar as $row): ?>
                                        <?php
                                            $symbol = strtoupper((string) ($row['symbol'] ?? ''));
                                            $scoreTotal = (int) ($row['score_total'] ?? 0);
                                            $inputs = $row['inputs'] ?? [];
                                            $floatShares = (int) ($inputs['float_shares'] ?? 0);
                                            $siPct = (float) ($inputs['short_interest_pct'] ?? 0);
                                            $volumeToday = (float) ($inputs['volume_today'] ?? 0);
                                            $turnover = $floatShares > 0 ? ($volumeToday / $floatShares) : 0;
                                            $floatBadge = 'High';
                                            if ($floatShares > 0 && $floatShares <= 5000000) {
                                                $floatBadge = 'Low';
                                            } elseif ($floatShares > 0 && $floatShares <= 15000000) {
                                                $floatBadge = 'Med';
                                            }
                                            $zoomOut = $row['zoomout'] ?? [];
                                            $zoomFlag = (!empty($zoomOut['trend_state']) && $zoomOut['trend_state'] === 'downtrend')
                                                || (!empty($zoomOut['fundamentals_state']) && $zoomOut['fundamentals_state'] === 'weak');
                                            $scoreBadge = $scoreTotal >= 80 ? 'danger' : ($scoreTotal >= 60 ? 'warning' : 'info');
                                            $siClass = $siPct >= 100 ? 'text-danger' : ($siPct >= 50 ? 'text-warning' : 'text-muted');
                                        ?>
                                        <tr>
                                            <td><a href="<?= site_url('investments/squeeze'); ?>?symbol=<?= esc($symbol); ?>"><?= esc($symbol); ?></a></td>
                                            <td><span class="badge bg-<?= $scoreBadge; ?>"><?= esc($scoreTotal); ?></span></td>
                                            <td><span class="badge bg-outline-secondary"><?= esc($floatBadge); ?></span></td>
                                            <td><span class="<?= $siClass; ?>"><?= esc(number_format($siPct, 2)); ?></span></td>
                                            <td><?= esc(number_format($turnover, 1)); ?>x</td>
                                            <td>
                                                <?php if ($zoomFlag): ?>
                                                    <span data-bs-toggle="tooltip" title="Mechanical unwind risk">⚠️</span>
                                                <?php else: ?>
                                                    —
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-end">
                                                <a class="btn btn-sm btn-outline-primary" href="<?= site_url('investments/squeeze'); ?>?symbol=<?= esc($symbol); ?>">View</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <div class="text-soft">No squeeze scorecards available. Run a manual scorecard to populate this list.</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Additional JavaScript for interactive elements -->
<script <?= $nonce['script'] ?? '' ?>>
    // !! FIX THIS
    // document.getElementById('saveTrade').addEventListener('click', function(event) {
    //     event.preventDefault();
    //     const assetName = document.getElementById('assetName').value;
    //     const currentValue = document.getElementById('currentValue').value;

    //     fetch('/path/to/your/controller/method', { // Update this URL
    //         method: 'POST',
    //         headers: {
    //             'Content-Type': 'application/json',
    //         },
    //         body: JSON.stringify({ assetName, currentValue })
    //     })
    //     .then(response => response.json())
    //     .then(data => {
    //         $('#addTradeModal').modal('hide');
    //         // Call function to refresh watchlist after successful addition
    //         refreshWatchlist();
    //     })
    //     .catch(error => {
    //         console.error('Error adding new trade:', error);
    //     });
    // });

    // Function to fetch and refresh the watchlist
    function refreshWatchlist() {
        fetch(<?php echo '"' . site_url('API/Investments/GetUserWatchlist/') . '"'; ?>) // Update this URL to your method
            .then(response => response.json())
            .then(data => {
                const watchlistTableBody = document.getElementById('watchlistTableBody');
                watchlistTableBody.innerHTML = ''; // Clear existing rows
                data.forEach(asset => {
                    const row = `<tr class="nk-tb-item">
                                    <td class="nk-tb-col">${asset.assetName}</td>
                                    <td class="nk-tb-col">${asset.currentValue}</td>
                                </tr>`;
                    watchlistTableBody.innerHTML += row;
                });
            })
            .catch(error => console.error('Error refreshing watchlist:', error));
    }

    document.addEventListener('DOMContentLoaded', function() {
        fetchWatchlistData();
    });

    function fetchWatchlistData() {
        let baseUrl = <?php echo '"' . site_url('API/Investments/GetUserWatchlist/') . '"'; ?>;
        let userID = <?php echo '"' . $cuID . '"'; ?>;
        let apiURL = `${baseUrl}${userID}`;

        fetch(apiURL)
            .then(response => response.json())
            .then(response => {
                console.log(response);
                if (response.status === 'success') {
                    populateWatchlistTable(response.data); // Ensure we pass the array to the function
                } else {
                    console.error('Failed to fetch data:', response.message);
                }
            })
            .catch(error => console.error('Error fetching watchlist data:', error));
    }

    const squeezeBaseUrl = <?= json_encode(site_url('investments/squeeze')); ?>;

    function squeezeBadge(score, symbol) {
        if (score === null || score === undefined) {
            return '';
        }

        let badgeClass = 'bg-warning';
        if (score >= 80) {
            badgeClass = 'bg-danger';
        } else if (score >= 60) {
            badgeClass = 'bg-warning';
        } else {
            badgeClass = 'bg-info';
        }

        return `<a href="${squeezeBaseUrl}?symbol=${symbol}" class="badge ${badgeClass} ms-2" data-bs-toggle="tooltip" title="High short interest / low float detected. Zoom-Out analysis recommended.">🔥 Squeeze</a>`;
    }

    function populateWatchlistTable(data) {
        const watchlistTableBody = document.getElementById('watchlistTableBody');
        watchlistTableBody.innerHTML = ''; // Clear existing rows

        const fragment = document.createDocumentFragment();
        data.forEach(asset => {
            const row = document.createElement('tr');
            row.classList.add('nk-tb-item');
            const squeezeScore = asset.squeeze ? parseFloat(asset.squeeze.score_total) : null;
            const symbol = asset.symbol || '';
            row.innerHTML = `<td class="nk-tb-col">${symbol}${squeezeBadge(squeezeScore, symbol)}</td>
                            <td class="nk-tb-col">${asset.current_price}</td>`;
            fragment.appendChild(row);
        });
        watchlistTableBody.appendChild(fragment);
    }


    function refreshWatchlistPrices() {
        fetch('<?php echo site_url('/Investments/API/getSymbolsByTradeType/'); ?>')
            .then(response => response.json())
            .then(data => updateWatchlistPrices(data))
            .catch(error => console.error('Error refreshing watchlist prices:', error));
    }

    function updateWatchlistPrices(data) {
        data.forEach(asset => {
            const assetRow = document.querySelector(`#watchlistTableBody .asset-${asset.id}`);
            if(assetRow) {
                const priceCell = assetRow.querySelector('.asset-price');
                if(priceCell) {
                    priceCell.textContent = asset.currentPrice;
                }
            }
        });
    }

    function refreshActiveTradesPrices() {
        fetch('<?php echo site_url('/Investments/API/getSymbolsByTradeType/'); ?>')
            .then(response => response.json())
            .then(data => updateActiveTradesPrices(data))
            .catch(error => console.error('Error refreshing active trades prices:', error));
    }

    function updateActiveTradesPrices(data) {
        data.forEach(trade => {
            const tradeRow = document.querySelector(`#activeTradesTableBody .trade-${trade.id}`);
            if(tradeRow) {
                const priceCell = tradeRow.querySelector('.trade-value');
                if(priceCell) {
                    priceCell.textContent = trade.currentValue;
                }
            }
        });
    }
    
</script>
<script <?= $nonce['script'] ?? '' ?>>
    $(document).ready(function() {
        $('#activeTradeDataTable').DataTable({
            "order": [[ 0, "desc" ]],
            "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]]
        });
    });
</script>
