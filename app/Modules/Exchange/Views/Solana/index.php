<!-- app/Modules/Exchange/Views/Solana/index.php -->
<?php 
$siteSettings = $siteSettings ?? (object)[];
$beta = (int)($siteSettings->beta ?? 0);
$debug = (int)($siteSettings->debug ?? 0);
$createSolanaStatus = (int)($siteSettings->createSolanaStatus ?? 0);
$solanaNetwork = (int)($siteSettings->solanaNetwork ?? 0);
$solanaNotifications = (int)($siteSettings->solanaNotifications ?? 0);
$solanaUserAssets = (int)($siteSettings->solanaUserAssets ?? 0);
$swapSolanaStatus = (int)($siteSettings->swapSolanaStatus ?? 0);
$tradeSolanaStatus = (int)($siteSettings->tradeSolanaStatus ?? 0);
$transactionsSolanaStatus = (int)($siteSettings->transactionsSolanaStatus ?? 0);
$solanaTokens = $solanaTokens ?? [];
$cuSolanaDW = (isset($cuSolanaDW) && is_array($cuSolanaDW)) ? $cuSolanaDW : [];

$subViewData = [
    'solanaTokens' => $solanaTokens,
];
?>

<div class="nk-block-head nk-block-head-sm pt-xl-5">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">Exchange - Solana Dashboard</h3>
            <div class="nk-block-des text-soft">
                <p>Welcome to the Solana Blockchain Dashboard of MyMI Wallet.</p>
            </div>
        </div>
        <div class="nk-block-head-content">
            <div class="toggle-wrap nk-block-tools-toggle">
                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-bs-target="pageMenu">
                    <em class="icon ni ni-more-v"></em>
                </a>
                <div class="toggle-expand-content" data-content="pageMenu">
                    <ul class="nk-block-tools g-3">
                        <?php if (empty($cuSolanaDW)) : ?>
                            <li><a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#connectWalletModal">
                                <em class="icon ni ni-plus"></em><span>Connect Wallet</span></a>
                            </li>
                        <?php else : ?>
                            <li>
                                <?php if (is_array($cuSolanaDW) && !empty($cuSolanaDW['address'])) : ?>
                                <a onclick="copyAddressToClipboard('<?= esc($cuSolanaDW['address'] ?? '') ?>')" href="#"><em class="icon ni ni-copy"></em></a>
                                <?php endif; ?>
                            </li>
                            <li><a class="btn btn-primary text-white dynamicModalLoader" data-formtype="Solana" data-endpoint="viewSolanaWallet">
                                <em class="icon ni ni-eye"></em><span>View Wallet</span></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="nk-block">
    <div class="row g-gs">
        <!-- Solana Overview -->
        <div class="col-md-4">
            <div class="card card-bordered card-full">
                <div class="card-inner">
                    <div class="card-title-group align-start mb-0">
                        <div class="card-title">
                            <h6 class="subtitle">My Solana</h6>
                        </div>
                    </div>
                    <div class="card-amount">
                        <span id="solana-total" class="amount">Loading...</span>
                        <span class="currency currency-usd">SOL</span>
                    </div>
                    <div class="invest-data">
                        <div class="invest-data-amount g-2">
                            <div class="invest-data-history">
                                <div class="title">Total Value</div>
                                <div id="solana-value" class="amount">Loading...</div>
                            </div>
                            <div class="invest-data-history">
                                <div class="title">24-Hr P/L</div>
                                <div id="solana-pl" class="amount">Loading...</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card card-bordered card-full">
                <div class="card-inner">
                    <div class="card-title-group align-start mb-0">
                        <div class="card-title">
                            <h6 class="subtitle">Current SOL Value</h6>
                        </div>
                        <div class="card-tools">
                            <em class="card-hint icon ni ni-help-fill" data-bs-toggle="tooltip" data-bs-placement="left" title="Total Withdraw"></em>
                        </div>
                    </div>
                    <div class="card-amount">
                        <span class="amount" id="solana-price"> $0.00 <span class="currency currency-usd">USD</span></span>
                        <span id="mtd-pl-change" class="change down text-danger">
                            <em class="icon ni ni-arrow-long-down"></em>0.00 MTD
                        </span>
                    </div>
                    <div class="invest-data">
                        <div class="invest-data-amount g-2">
                            <div class="invest-data-history">
                                <div class="title">Daily P/L</div>
                                <div id="daily-pl" class="amount">0.00 <span class="currency currency-usd">%</span></div>
                            </div>
                            <div class="invest-data-history">
                                <div class="title">1-Hr P/L</div>
                                <div id="hourly-pl" class="amount">0.00 <span class="currency currency-usd">%</span></div>
                            </div>
                        </div>
                        <div class="invest-data-ck">
                            <canvas class="iv-data-chart" id="totalWithdraw"></canvas>
                        </div>
                    </div>
                </div>
            </div><!-- .card -->
        </div><!-- .col -->

        <!-- Solana Market Cap -->
        <div class="col-md-4">
            <div class="card card-bordered card-full">
                <div class="card-inner">
                    <div class="card-title-group align-start mb-0">
                        <div class="card-title">
                            <h6 class="subtitle">Solana Market Cap</h6>
                        </div>
                    </div>
                    <div class="card-amount">
                        <span id="market-cap" class="amount">Loading...</span>
                        <span class="currency currency-usd">USD</span>
                    </div>
                    <div class="invest-data">
                        <div class="invest-data-amount g-2">
                            <div class="invest-data-history">
                                <div class="title">24-Hr Volume</div>
                                <div id="daily-volume" class="amount">Loading...</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-12 col-md-4 col-xxl-4">
            <div class="card card-bordered card-full">
                <div class="card-inner border-bottom d-flex flex-column h-100">
                    <div class="card-title-group mb-3">
                        <div class="card-title">
                            <h6 class="title">Create on Solana</h6>
                            <p>Create and Manage Your World in Solana!</p>
                        </div>
                        <!-- <div class="card-tools mt-n4 me-n1">
                            <div class="drodown">
                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                    <ul class="link-list-opt no-bdr">
                                        <li><a href="#"><span>15 Days</span></a></li>
                                        <li><a href="#" class="active"><span>30 Days</span></a></li>
                                        <li><a href="#"><span>3 Months</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <div class="progress-list gy-3">
                        <div class="progress-wrap">
                            <div class="progress-text">
                                <div class="progress-label">
                                    Solana Wallet 
                                    <?php if (is_array($cuSolanaDW) && !empty($cuSolanaDW['address'])) : ?>
                                    <a onclick="copyAddressToClipboard('<?= esc($cuSolanaDW['address'] ?? '') ?>')" href="#"><em class="icon ni ni-copy"></em></a>
                                    <?php endif; ?>
                                </div>
                                <?php if (is_array($cuSolanaDW) && !empty($cuSolanaDW['address'])) : ?>
                                <div class="progress-amount w-40">                               
                                    <a class="btn btn-primary btn-block text-white dynamicModalLoader" data-formtype="Solana" data-endpoint="viewSolanaWallet"><em class="icon ni ni-eye"></em> MyMI Solana</a>
                                </div>
                                <?php else : ?>
                                <div class="progress-amount w-40"><a class="btn btn-success btn-block text-white" data-bs-toggle="modal" data-bs-target="#connectWalletModal"><em class="icon ni ni-plus"></em> Connect</a></div>
                                <?php endif; ?>
                            </div>
                            <!-- <div class="progress progress-md">
                                <div class="progress-bar" data-progress="58"></div>
                            </div> -->
                        </div>
                        <?php if ($tradeSolanaStatus === 1) : ?>
                        <div class="progress-wrap">
                            <div class="progress-text">
                                <div class="progress-label">Buy/Sell Solana</div>
                                <?php if (!empty($cuSolanaDW)) : ?>
                                <div class="progress-amount w-40"><a class="btn btn-success btn-block text-white dynamicModalLoader" data-formtype="Solana" data-endpoint="tradeSolana"><em class="icon ni ni-plus"></em> Trade </a></div>
                                <?php else : ?>
                                <div class="progress-amount w-40"><a class="btn btn-success btn-block disabled" href="#"><em class="icon ni ni-spark-off"></em> Trade </a></div>
                                <?php endif; ?>
                            </div>
                            <!-- <div class="progress progress-md">
                                <div class="progress-bar" data-progress="58"></div>
                            </div> -->
                        </div>
                        <?php endif; ?>
                        <?php if ($transactionsSolanaStatus === 1) : ?>
                        <div class="progress-wrap">
                            <div class="progress-text">
                                <div class="progress-label">Transactions</div>
                                <?php if (!empty($cuSolanaDW)) : ?>
                                <div class="progress-amount w-40"><a class="btn btn-dark btn-block text-white dynamicModalLoader" data-formtype="Solana" data-endpoint="viewSolanaOrders"><em class="icon ni ni-history"></em> Orders</a></div>
                                <?php else : ?>
                                <div class="progress-amount w-40"><a class="btn btn-secondary btn-block disabled" href="#"><em class="icon ni ni-spark-off"></em> Orders</a></div>
                                <?php endif; ?>
                            </div>
                            <!-- <div class="progress progress-md">
                                <div class="progress-bar" data-progress="58"></div>
                            </div> -->
                        </div>
                        <?php endif; ?>
                        <?php if ($swapSolanaStatus === 1) : ?>
                        <div class="progress-wrap">
                            <div class="progress-text">
                                <div class="progress-label">Swap Assets</div>
                                <?php if (!empty($cuSolanaDW)) : ?>
                                <div class="progress-amount w-40"><a class="btn btn-primary btn-block text-white dynamicModalLoader" data-formtype="Solana" data-endpoint="coinSwap"><em class="icon ni ni-swap"></em> Swap </a></div>
                                <?php else : ?>
                                <div class="progress-amount w-40"><a class="btn btn-secondary btn-block disabled" href="#"><em class="icon ni ni-spark-off"></em> Swap </a></div>
                                <?php endif; ?>
                            </div>
                            <!-- <div class="progress progress-md">
                                <div class="progress-bar" data-progress="58"></div>
                            </div> -->
                        </div>
                        <?php endif; ?>
                        <?php if ($createSolanaStatus === 1) : ?>
                        <hr>
                        <div class="progress-wrap">
                            <div class="progress-text">
                                <div class="progress-label">Create MyMI Solana</div>
                                <?php if (!empty($cuSolanaDW)) : ?>
                                    <div class="progress-amount w-40"><a class="btn btn-success btn-block text-white dynamicModalLoader" data-formtype="Solana" data-endpoint="createSolanaToken"><em class="icon ni ni-grid-plus"></em> Create </a></div>
                                <?php else : ?>
                                <div class="progress-amount w-40"><a class="btn btn-secondary btn-block disabled" href="#"><em class="icon ni ni-spark-off"></em> Create </a></div>
                                <?php endif; ?>
                            </div>
                            <!-- <div class="progress progress-md">
                                <div class="progress-bar" data-progress="58"></div>
                            </div> -->
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="invest-top-ck mt-auto">
                        <canvas class="iv-plan-purchase" id="planPurchase"></canvas>
                    </div>
                </div>
            </div>
        </div><!-- .col -->                    
        <!-- Top Performing Tokens -->
        <div class="col-12 col-md-8 col-xxl-8">
            <?php echo view('ExchangeModule/Views/Solana\index\Top-Performing-Tokens', $subViewData); ?>
        </div>
        <?php if ($solanaUserAssets === 1) : ?>
        <div class="col-12 col-md-4 col-xxl-4">
            <div class="card card-bordered card-full">
                <div class="card-inner border-bottom">
                    <div class="card-title-group">
                        <div class="card-title">
                            <h6 class="title">My Solana Assets</h6>
                            <p>View your Top Solana Assets.</p>
                        </div>
                        <div class="card-tools">
                            <ul class="card-tools-nav">
                                <li><a href="#"><span>Cancel</span></a></li>
                                <li class="active"><a href="#"><span>All</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <ul id="solana-assets-list" class="nk-activity">
                    <li class="nk-activity-item">
                        <div class="nk-activity-media user-avatar bg-light">
                            <span>Loading...</span>
                        </div>
                        <div class="nk-activity-data">
                            <div class="label">Fetching Solana Assets...</div>
                        </div>
                    </li>
                </ul>
            </div><!-- .card -->
        </div><!-- .col -->
        <?php endif; ?>

        <?php if ($solanaNotifications === 1) : ?>
        <div class="col-12 col-md-4 col-xxl-4">
            <div class="card card-bordered h-100">
                <div class="card-inner">
                    <div class="card-title-group">
                        <div class="card-title">
                            <h6 class="title">Notifications</h6>
                            <p>Your Recent Activity on Solana's Blockchain.</p>
                        </div>
                    </div>
                </div>
                <div class="card-inner">
                    <div class="timeline">
                        <h6 class="timeline-head"><?php echo date("D - F jS, Y"); ?></h6>
                        <ul id="solana-notifications-list" class="timeline-list">
                            <li class="timeline-item">
                                <div class="timeline-status bg-light"></div>
                                <div class="timeline-data">
                                    <div class="timeline-title">Loading Notifications...</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- .card -->
        </div><!-- .col -->
        <?php endif; ?>

        <?php if ($solanaNetwork === 1) : ?>
        <div class="col-12 col-md-4 col-xxl-4">
            <div class="card card-bordered card-full">
                <div class="card-inner">
                    <div class="card-title-group mb-1">
                        <div class="card-title">
                            <h6 class="title">Solana - Network Performance</h6>
                            <p>Solana Network and Performance Analytics Overview.</p>
                        </div>
                    </div>
                    <div class="tab-content mt-0">
                        <div class="tab-pane active" id="overview">
                            <div class="invest-ov gy-2">
                                <div class="subtitle">Network Status</div>
                                <div class="invest-ov-details">
                                    <div class="invest-ov-info">
                                        <div id="network-status" class="amount">Loading...</div>
                                    </div>
                                </div>
                            </div>
                            <div class="invest-ov gy-2">
                                <div class="subtitle">Transaction Speed</div>
                                <div class="invest-ov-details">
                                    <div class="invest-ov-info">
                                        <div id="transaction-speed" class="amount">Loading...</div>
                                    </div>
                                </div>
                            </div>
                            <div class="invest-ov gy-2">
                                <div class="subtitle">Network Throughput</div>
                                <div class="invest-ov-details">
                                    <div class="invest-ov-info">
                                        <div id="network-throughput" class="amount">Loading...</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .card -->
        </div><!-- .col -->
        <?php endif; ?>
    </div>
</div>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
<script <?= $nonce['script'] ?? '' ?>>
// --- Global jQuery AJAX setup: send XHR header + attach CSRF automatically ---
$.ajaxSetup({
  headers: { 'X-Requested-With': 'XMLHttpRequest' }
});

// Refresh CSRF hash after any JSON response that includes { csrf: "..." }
$(document).ajaxComplete(function (_evt, xhr) {
  try {
    const res = xhr.responseJSON;
    if (res && typeof res.csrf === 'string' && res.csrf.length > 0) {
      window.CSRF_TOKEN_HASH = res.csrf;
    }
  } catch (_) { /* ignore */ }
});

$(document).ready(function () {
  // Build POST data with CSRF (works if tokenRandomize is on)
  const postData = {};
  if (window.CSRF_TOKEN_NAME && window.CSRF_TOKEN_HASH) {
    postData[window.CSRF_TOKEN_NAME] = window.CSRF_TOKEN_HASH;
  }

  $.ajax({
    url: '/index.php/Exchange/Solana/fetchFrontendData',
    method: 'POST',
    data: postData,
    xhrFields: { withCredentials: true }
  })
  .done(function (response) {
    if (!response || response.status !== 'success') {
      console.error('Failed to fetch data:', response?.message || 'Unknown error');
      return;
    }

    const data = response.data || {};

    // Helpers
    function formatCurrency(value) {
      const number = parseFloat(value) || 0;
      return number.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    }
    function extractTokens(payload) {
      if (Array.isArray(payload)) return payload;
      if (payload && Array.isArray(payload.all)) return payload.all;
      if (payload && Array.isArray(payload.tokens)) return payload.tokens;
      return [];
    }

    // Overview
    $('#solana-total').text(formatCurrency(data.mySolanaData?.totalSolana ?? 0));
    $('#solana-value').text(`$${formatCurrency(data.mySolanaData?.totalValue ?? 0)}`);
    $('#solana-pl').text(`$${formatCurrency(data.mySolanaData?.profitLoss24hr ?? 0)}`);

    // Market
    $('#solana-price').html(`$${formatCurrency(data.marketData?.currentPrice ?? 0)} <span class="currency currency-usd">USD</span>`);
    $('#market-cap').text(`$${formatCurrency(data.marketData?.market_cap ?? 0)}`);
    $('#daily-volume').text(`$${formatCurrency(data.marketData?.dailyVolume ?? 0)}`);

    const mtdPL = parseFloat(data.marketData?.mtdPL) || 0;
    $('#mtd-pl-change')
      .text(`${formatCurrency(mtdPL)} MTD`)
      .removeClass('up text-success down text-danger')
      .addClass(mtdPL >= 0 ? 'up text-success' : 'down text-danger');

    $('#daily-pl').text(`${formatCurrency(data.marketData?.dailyPL ?? 0)} %`);
    $('#hourly-pl').text(`${formatCurrency(data.marketData?.hourlyPL ?? 0)} %`);

    // Tokens
    const tokens = extractTokens(data.allSolanaToken);
    updateSolanaAssets(tokens);
    setTimeout(() => updateTopPerformingTokens(tokens), 100);

    // Notifications + Network
    updateSolanaNotifications(data.marketData?.notifications || []);
    $('#network-status').text(data.marketData?.networkStatus ?? 'Loading...');
    $('#transaction-speed').text(data.marketData?.transactionSpeed ?? 'Loading...');
    $('#network-throughput').text(data.marketData?.networkThroughput ?? 'Loading...');
  })
  .fail(function (xhr) {
    if (xhr.status === 401) {
      console.warn('Not authenticated; prompt login or connect wallet.');
      // show login/connect modal here if desired
    } else if (xhr.status === 403) {
      console.warn('CSRF forbidden (403). Ensure CSRF token is rendered into the page and sent.');
    } else {
      console.error('Error fetching data:', xhr.status, xhr.responseText || xhr.statusText);
    }
  });

  function updateSolanaAssets(tokens) {
    const $list = $('#solana-assets-list');
    $list.empty();

    if (Array.isArray(tokens) && tokens.length > 0) {
      tokens.forEach(t => {
        const li = `
          <li class="nk-activity-item">
            <div class="nk-activity-media user-avatar bg-light">
              <img src="${t?.coin_logo || '/assets/images/avatar-placeholder.png'}"
                   alt="${t?.coin_name || 'Token'}"
                   onerror="this.src='/assets/images/avatar-placeholder.png';">
            </div>
            <div class="nk-activity-data">
              <div class="label">${t?.coin_name || 'Unknown'} (${t?.symbol || ''})</div>
              <span class="time">Market Cap: $${t?.market_cap ?? 'N/A'}</span>
            </div>
          </li>`;
        $list.append(li);
      });
    } else {
      $list.append('<li><div class="label">No tokens available.</div></li>');
    }
  }

  function updateSolanaNotifications(notifications) {
    const $list = $('#solana-notifications-list');
    $list.empty();

    if (Array.isArray(notifications) && notifications.length > 0) {
      notifications.forEach(n => {
        const li = `
          <li class="timeline-item">
            <div class="timeline-status bg-primary is-outline"></div>
            <div class="timeline-data">
              <h6 class="timeline-title">${n?.title || 'Untitled Notification'}</h6>
              <div class="timeline-des">
                <p>${n?.description || 'No details available.'}</p>
                <span class="time">${n?.time || 'Just now'}</span>
              </div>
            </div>
          </li>`;
        $list.append(li);
      });
    } else {
      $list.append('<li><div class="timeline-title">No notifications available.</div></li>');
    }
  }

  function updateTopPerformingTokens(tokens) {
    // Use a specific ID to avoid matching multiple tables
    const $table = $('#solanaTopPerformers'); // ensure your table has this id
    if (!$table.length) {
      console.warn('Top performers table not found (#solanaTopPerformers).');
      return;
    }

    // Destroy safely if already initialized
    if ($.fn.DataTable && $.fn.DataTable.isDataTable($table)) {
      $table.DataTable().clear().destroy();
    }

    const $tbody = $table.find('tbody');
    $tbody.empty();

    const defaultLogo = base_url('assets/images/MyMI-Wallet.png');

    if (Array.isArray(tokens) && tokens.length > 0) {
      tokens.forEach(t => {
        // EXACTLY 5 <td> to match 5 <th> headers to prevent _DT_CellIndex errors
        const row = `
          <tr>
            <td>
              <a class="d-inline-flex align-items-center" href="#">
                <img src="${t?.coin_logo || '/assets/images/avatar-placeholder.png'}"
                     class="user-avatar bg-light"
                     alt="${t?.coin_name || 'Token'}"
                     onerror="this.onerror=null; this.src='${defaultLogo}';"/>
                <span>${t?.coin_name || 'Unknown'} (${t?.symbol || ''})</span>
              </a>
            </td>
            <td>${t?.coin_value ?? 'N/A'}</td>
            <td>${t?.market_cap ?? 'N/A'}</td>
            <td>${t?.volume ?? 'N/A'}</td>
            <td><a href="${t?.website || '#'}" target="_blank">Website</a></td>
          </tr>`;
        $tbody.append(row);
      });
    } else {
      $tbody.html('<tr><td colspan="5" class="text-center">No tokens available.</td></tr>');
    }

    if ($.fn.DataTable) {
      $table.DataTable({
        order: [[0, 'asc']],
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, 'All']],
        destroy: true
      });
    }
  }

  function base_url(path) {
    return `${window.location.origin}/${path}`;
  }
});
</script>


<!-- <script <?= $nonce['script'] ?? '' ?>>
    // // Ensure only a single WebSocket initialization in your project
    // if (typeof socket === 'undefined' || socket.readyState === WebSocket.CLOSED) {
    //     socket = new WebSocket('wss://mymiwallet.com/ws');
    //     console.log("WebSocket initialized in index.php");
    // }
</script> -->

<!-- <script <?= $nonce['script'] ?? '' ?>>
    const socket = new WebSocket('wss://mymiwallet.com:8081/ws');

    socket.onopen = () => {
        console.log("WebSocket connection established");
        // Send initial fetch request
        socket.send(JSON.stringify({ type: 'fetch', section: 'dashboard' }));
    };

    socket.onmessage = (event) => {
        const data = JSON.parse(event.data);
        // Update all relevant sections of the dashboard
        updateDashboard(data);
    };

    function updateDashboard(data) {
        // Update Solana Assets
        if (data.solanaAssets) {
            const assetsList = document.getElementById('solana-assets-list');
            assetsList.innerHTML = ''; // Clear the current list
            data.solanaAssets.forEach(asset => {
                const listItem = `
                    <li class="nk-activity-item">
                        <div class="nk-activity-media user-avatar bg-success">
                            <img src="${asset.logo || '/assets/images/avatar-placeholder.png'}" alt="${asset.name}">
                        </div>
                        <div class="nk-activity-data">
                            <div class="label">${asset.name} (${asset.symbol})</div>
                            <span class="time">${asset.timeAgo || 'Just Now'}</span>
                        </div>
                    </li>
                `;
                assetsList.insertAdjacentHTML('beforeend', listItem);
            });
        }

        // Update Notifications
        if (data.notifications) {
            const notificationsList = document.getElementById('solana-notifications-list');
            notificationsList.innerHTML = ''; // Clear current notifications
            data.notifications.forEach(notification => {
                const notificationItem = `
                    <li class="timeline-item">
                        <div class="timeline-status bg-primary is-outline"></div>
                        <div class="timeline-date">${notification.date}</div>
                        <div class="timeline-data">
                            <h6 class="timeline-title">${notification.title}</h6>
                            <div class="timeline-des">
                                <p>${notification.description}</p>
                                <span class="time">${notification.time}</span>
                            </div>
                        </div>
                    </li>
                `;
                notificationsList.insertAdjacentHTML('beforeend', notificationItem);
            });
        }

        // Update Network Performance
        if (data.networkPerformance) {
            document.getElementById('network-status').textContent = data.networkPerformance.status || 'Unknown';
            document.getElementById('transaction-speed').textContent = data.networkPerformance.transactionSpeed || 'Unknown';
            document.getElementById('network-throughput').textContent = data.networkPerformance.throughput || 'Unknown';
        }

        // Update Main Dashboard Stats
        if (data.solanaStats) {
            document.getElementById('solana-total').textContent = data.solanaStats.total || '0';
            document.getElementById('solana-value').textContent = `$${data.solanaStats.value || '0.00'}`;
            document.getElementById('market-cap').textContent = `$${data.solanaStats.marketCap || '0.00'}`;
            document.getElementById('daily-volume').textContent = `$${data.solanaStats.dailyVolume || '0.00'}`;
        }

        // Update Current SOL Value
        if (data.solanaStats) {
            // Update SOL price
            document.getElementById('solana-price').textContent = `$${(data.solanaStats.price || 0).toFixed(2)}`;

            // Update MTD P/L
            const mtdPlChange = document.getElementById('mtd-pl-change');
            const mtdPL = data.solanaStats.mtdPL || 0;
            mtdPlChange.textContent = `${mtdPL} MTD`;
            mtdPlChange.className = `change ${mtdPL >= 0 ? 'up text-success' : 'down text-danger'}`;

            // Update Daily P/L
            const dailyPL = data.solanaStats.dailyPL || 0;
            document.getElementById('daily-pl').textContent = `${dailyPL} %`;

            // Update Hourly P/L
            const hourlyPL = data.solanaStats.hourlyPL || 0;
            document.getElementById('hourly-pl').textContent = `${hourlyPL} %`;
        }

        // Update the Top-Performing-Tokens table
        if (data.topPerformingTokens) {
            updateTopPerformingTokens(data.topPerformingTokens);
        }
    }

    function updateTopPerformingTokens(tokens) {
        const tableBody = document.querySelector('.solanaTopPerformersTable tbody');
        tableBody.innerHTML = ''; // Clear current rows

        tokens.forEach(token => {
            const row = `
                <tr>
                    <td>
                        <a class="d-inline-flex align-items-center" href="#">
                            <img src="${token.coin_logo}" class="user-avatar bg-light" alt="${token.coin_name}" onerror="this.src='/assets/images/placeholder.png';"/>
                            <span>${token.coin_name} (${token.symbol})</span>
                        </a>
                    </td>
                    <td>${token.coin_value}</td>
                    <td>${token.marketCap}</td>
                    <td>${token.volume}</td>
                    <td>
                        <a href="${token.website}" target="_blank">Website</a>
                    </td>
                </tr>
            `;
            tableBody.insertAdjacentHTML('beforeend', row);
        });
    }
</script> -->
