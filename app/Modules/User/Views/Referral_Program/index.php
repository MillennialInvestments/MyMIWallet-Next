<?php
log_message('debug', 'Referral_Program\index L2 - $userReferrals: ' . (print_r($userReferrals, true)));
$getTotalReferrals                  = $userReferrals['getTotalReferrals'] ?? 0;
$totalReferrals                     = $userReferrals['totalReferrals'] ?? 0;
$getTotalActiveReferrals            = $userReferrals['getTotalActiveReferrals'] ?? [];
$totalActiveReferrals               = $userReferrals['totalActiveReferrals'] ?? 0;
$activeReferrals                    = $userReferrals['active_referrals'] ?? 0;  // New

$subViewData                        = [
    'cuReferrerCode'                => $cuReferrerCode ?? $cuID,
    'cuWalletID'                    => $cuWalletID,
    'getTotalReferrals'             => $getTotalReferrals,
    'totalReferrals'                => $totalReferrals,
    'getTotalActiveReferrals'       => $getTotalActiveReferrals,
    'totalActiveReferrals'          => $totalActiveReferrals,
    'active_referrals'              => $activeReferrals,  // New
    // 'userAccount' => $userAccount,
];
?>
<div class="nk-block d-none d-sm-block">
    <div class="row">
        <div class="d-none d-md-block col-md-12 col-xl-3 my-sm-3">
            <?php echo view('UserModule\Views\Referral_Program\My_Referrals\control_center', $subViewData); ?>
        </div>
        <div class="col-md-12 my-sm-3 col-xl-9 d-none d-sm-block">
            <div class="h-100 card card-bordered">
                <div class="card-inner">
                    <div class="align-start card-title-group mb-3">
                        <div class="card-title">
                            <h6 class="title">Month-to-Month Referral Overview</h6>
                            <p>Click on the legend below to hide or show parts of the chart and edit the timeframe at the bottom of it.</p>
                        </div>
                        <div class="card-tools me-n1 mt-n1">
                            <div class="dropdown">
                                <a href="#" class="btn btn-primary btn-md text-white" aria-expanded="false" data-bs-toggle="dropdown">
                                    <span>Chart Settings</span>
                                    <em class="icon ni ni-setting"></em>
                                </a>
                                <div class="dropdown-menu dropdown-menu-auto dropdown-menu-end mt-1" style="">
                                    <ul class="link-list-opt no-bdr">
                                        <li class="p-1">
                                            <h7>Start Date?</h7>
                                            <input type="date" class="form-control">
                                        </li>
                                        <li class="divider"></li>
                                        <li class="p-1">
                                            <h7>Historical Timeline?</h7>
                                            <select aria-label="Default select" class="form-control form-select link-list-opt no-bdr" id="chart-lower">
                                                <option value="-12">-12 months</option>
                                                <option value="-6">-6 months</option>
                                                <option value="-3">-3 months</option>
                                                <option value="-1" selected>-1 month</option>
                                                <option value="0">Only Forward</option>
                                            </select>
                                        </li>
                                        <li class="divider"></li>
                                        <li class="p-1">
                                            <h7>Forward-Looking?</h7>
                                            <select aria-label="Default select" class="form-control form-select" id="chart-upper">
                                                <option value="12" selected>12 months</option>
                                                <option value="6">6 months</option>
                                                <option value="3">3 months</option>
                                                <option value="1">1 month</option>
                                                <option value="0">Only Backward</option>
                                            </select>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nk-order-ovwg">
                        <div class="row align-end g-4">
                            <div class="col-12">
                                <div class="nk-order-ovwg-ck" style="height: 100%">
                                    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.2/Chart.min.js" type="text/javascript"></script> -->
                                    <div id='referral-data' hidden><?php echo json_encode($userReferrals['total_referrals'] ?? [], true); ?></div>
                                    <div class="h-100">
                                        <canvas class="h-100" id="referral-chart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nk-order-ovwg py-3">
                        <div class="row align-end g-4">
                            <div class="col-12 col-md-3 col-sm-3 col-xxl-3 mt-0">
                                <a href="<?php echo site_url('Referral/Active'); ?>">
                                    <div class="nk-order-ovwg-data income">
                                        <div class="title">
                                            <em class="icon ni ni-users"></em> <small>Active Referrals</small>
                                        </div>
                                        <div class="amount" id="activeReferralCount"><?php echo $userReferrals['totalActiveReferrals']; ?></div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-12 col-md-3 col-sm-3 col-xxl-3 mt-0">
                                <a href="<?php echo site_url('Referral/Pending'); ?>">
                                    <div class="nk-order-ovwg-data expenses">
                                        <div class="title">
                                            <em class="icon ni ni-user-check"></em> <small>Total Earnings</small>
                                        </div>
                                        <div class="amount" id="pendingReferralCount"><?php echo $userReferrals['totalReferrals'] - $userReferrals['totalReferralEarnings']; ?></div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-12 col-md-3 col-sm-3 col-xxl-3 mt-0">
                                <a href="<?php echo site_url('Referral/Reports'); ?>">
                                    <div class="nk-order-ovwg-data surplus">
                                        <div class="title">
                                            <em class="icon ni ni-file-text"></em> <small>Referral Reports</small>
                                        </div>
                                        <div class="amount">View</div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-12 col-md-3 col-sm-3 col-xxl-3 mt-0">
                                <a href="<?php echo site_url('Referral/Create'); ?>">
                                    <div class="nk-order-ovwg-data investments">
                                        <div class="title">
                                            <em class="icon ni ni-user-add"></em> <small>Create Referral</small>
                                        </div>
                                        <div class="amount">New</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="row">
        <?php //echo view('UserModule\Views\Referral_Program\My_Referrals\management_buttons', $subViewData); ?>
    </div> -->
    <div class="row">
        <div class="card card-bordered h-100">
            <div class="card-inner-group">
                <div class="card-inner card-inner-md">
                    <div class="card-title-group">
                        <div class="card-title">
                            <h6 class="title">Alerts Overview</h6>
                        </div>
                        <div class="card-tools me-n1">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <ul class="link-list-opt no-bdr">
                                        <li><a href="#"><em class="icon ni ni-setting"></em><span>Settings</span></a></li>
                                        <li><a href="#"><em class="icon ni ni-notify"></em><span>Push Notifications</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-inner">
                    <?php echo view('UserModule\Views\Referral_Program\My_Referrals\Referrals', $subViewData); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="bulkActionModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Bulk Actions</h5>
                    <button class="close" data-bs-dismiss="modal" type="button">×</button>
                </div>
                <div class="modal-body">
                    <button class="btn btn-primary" onclick='handleBulkAction("updateStatus")'>Mark as Active</button>
                    <button class="btn btn-danger" onclick='handleBulkAction("delete")'>Delete</button>
                </div>
            </div>
        </div>
    </div>

</div>
<script <?= $nonce['script'] ?? '' ?>>
document.addEventListener('DOMContentLoaded', function () {
    let referralData = JSON.parse(document.querySelector("#referral-data").innerText || "[]");

    if (referralData.length === 0) {
        // If no data, set default values
        referralData = [{
            year: new Date().getFullYear(),
            month: new Date().getMonth() + 1,
            day: 1,
            active: 0,
            paying: 0
        }];
    }

    const getMonthLabels = (start = { year: 0, month: 0, day: 0 }, end = { year: 0, month: 0, day: 0 }, showYears) => {
        const MONTHS = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'];
        const monthsBetween = end.month - start.month + 1 + 12 * (end.year - start.year);

        const labels = [];
        for (let i = 0; i < monthsBetween; i++) {
            const currentMonth = start.month + i;
            const currentYear = showYears ? start.year + Math.floor((currentMonth - 1) / 12) : "";
            labels.push(`${MONTHS[(currentMonth - 1) % 12]} ${currentYear}`);
        }
        return labels;
    }

    const processData = (data, start, end) => {
        const totals = { totalReferrals: [], totalActiveReferrals: [], totalPaidActiveReferrals: [] };

        for (let i = 0; i < 12; i++) {
            totals.totalReferrals.push(0);
            totals.totalActiveReferrals.push(0);
            totals.totalPaidActiveReferrals.push(0);
        }

        return totals;
    }

    const upperSelector = document.querySelector("#chart-upper");
    const lowerSelector = document.querySelector("#chart-lower");

    const start = { year: new Date().getFullYear(), month: new Date().getMonth() + 1, day: 1 };
    const end = { year: new Date().getFullYear(), month: new Date().getMonth() + 1, day: 31 };

    const ctx = document.getElementById('referral-chart').getContext('2d');
    const { totalReferrals, totalActiveReferrals, totalPaidActiveReferrals } = processData(referralData, start, end);

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: getMonthLabels(start, end, true),
            datasets: [
                { label: 'Total Referrals', data: totalReferrals, backgroundColor: '#7f8c8d' },
                { label: 'Active Referrals', data: totalActiveReferrals, backgroundColor: '#3498db' },
                { label: 'Paid Referrals', data: totalPaidActiveReferrals, backgroundColor: '#1ee0ac' }
            ]
        },
        options: {
            scales: {
                y: { beginAtZero: true },
                x: { stacked: true }
            }
        }
    });
});

</script>
