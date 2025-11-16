<?php
log_message('debug', 'Referral_Program\index L2 - $userReferrals: ' . (print_r($userReferrals, true)));
$getTotalReferrals                  = $userReferrals['getTotalReferrals'] ?? [];
$totalReferrals                     = $userReferrals['totalReferrals'] ?? 0;
$getTotalActiveReferrals            = $userReferrals['getTotalActiveReferrals'] ?? [];
$totalActiveReferrals               = $userReferrals['totalActiveReferrals'] ?? 0;
$activeReferrals                    = $userReferrals['active_referrals'] ?? 0;  // New
$totalReferralEarnings              = $userReferrals['totalReferralEarnings'] ?? 0;
$referralLink                       = $userReferrals['referral_link'] ?? null;

$subViewData                        = [
    'cuReferrerCode'                => $cuReferrerCode ?? $cuID,
    'cuWalletID'                    => $cuWalletID,
    'getTotalReferrals'             => $getTotalReferrals,
    'totalReferrals'                => $totalReferrals,
    'getTotalActiveReferrals'       => $getTotalActiveReferrals,
    'totalActiveReferrals'          => $totalActiveReferrals,
    'active_referrals'              => $activeReferrals,  // New
    'referral_link'                 => $referralLink,
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
                                    <div id='referral-data' hidden><?php echo json_encode($userReferrals['total_referrals'] ?? [], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT); ?></div>
                                    <div class="h-100">
                                        <canvas class="h-100" id="referral-chart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nk-order-ovwg py-3">
                        <div class="row align-end g-4">
                            <div class="col-12 col-md-3 col-sm-6 col-xxl-3 mt-0">
                                <a href="<?php echo site_url('Referral/Reports'); ?>">
                                    <div class="nk-order-ovwg-data income">
                                        <div class="title">
                                            <em class="icon ni ni-grid-alt"></em> <small>Total Referrals</small>
                                        </div>
                                        <div class="amount" id="totalReferralCount" data-count="<?= esc($totalReferrals); ?>"><?php echo number_format($totalReferrals); ?></div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-12 col-md-3 col-sm-6 col-xxl-3 mt-0">
                                <a href="<?php echo site_url('Referral/Active'); ?>">
                                    <div class="nk-order-ovwg-data investments">
                                        <div class="title">
                                            <em class="icon ni ni-users"></em> <small>Active Referrals</small>
                                        </div>
                                        <div class="amount" id="activeReferralCount" data-count="<?= esc($totalActiveReferrals); ?>"><?php echo number_format($totalActiveReferrals); ?></div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-12 col-md-3 col-sm-6 col-xxl-3 mt-0">
                                <div class="nk-order-ovwg-data expenses">
                                    <div class="title">
                                        <em class="icon ni ni-wallet"></em> <small>Total Earnings</small>
                                    </div>
                                    <div class="amount" id="totalReferralEarnings">$<?php echo number_format($totalReferralEarnings, 2); ?></div>
                                </div>
                            </div>
                            <div class="col-12 col-md-3 col-sm-6 col-xxl-3 mt-0">
                                <a href="#referrals-management">
                                    <div class="nk-order-ovwg-data surplus">
                                        <div class="title">
                                            <em class="icon ni ni-activity-round"></em> <small>Manage Referrals</small>
                                        </div>
                                        <div class="amount">Open</div>
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
        <div class="card card-bordered h-100" id="referrals-management">
            <div class="card-inner-group">
                <div class="card-inner card-inner-md">
                    <div class="card-title-group">
                        <div class="card-title">
                            <h6 class="title">Referrals Overview</h6>
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
(function () {
    'use strict';
    const state = {
        tableElement: null,
        tableInstance: null,
        currentFilter: '',
        notify(message, level = 'info') {
            if (window.NioApp && typeof window.NioApp.Toast === 'function') {
                window.NioApp.Toast(message, level);
            } else if (level === 'error') {
                window.alert(message);
            } else {
                console.log(message);
            }
        },
        updateCounts(totalDelta = 0, activeDelta = 0) {
            const totalEl = document.getElementById('totalReferralCount');
            const activeEl = document.getElementById('activeReferralCount');
            if (totalEl && totalDelta !== 0) {
                const current = parseInt(totalEl.dataset.count ?? totalEl.textContent.replace(/,/g, ''), 10) || 0;
                const next = Math.max(0, current + totalDelta);
                totalEl.dataset.count = next;
                totalEl.textContent = next.toLocaleString();
            }
            if (activeEl && activeDelta !== 0) {
                const current = parseInt(activeEl.dataset.count ?? activeEl.textContent.replace(/,/g, ''), 10) || 0;
                const next = Math.max(0, current + activeDelta);
                activeEl.dataset.count = next;
                activeEl.textContent = next.toLocaleString();
            }
        },
    };
    state.bulkUrls = {
        delete: <?= json_encode(site_url('API/Referrals/bulk-delete')); ?>,
        update: <?= json_encode(site_url('API/Referrals/bulk-update-status')); ?>,
    };
    window.MyMIReferralDashboard = state;

    const MONTHS = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'];
    let referralData = [];
    const dataElement = document.getElementById('referral-data');
    if (dataElement) {
        try {
            referralData = JSON.parse(dataElement.textContent || '[]');
        } catch (error) {
            console.error('Unable to parse referral history payload.', error);
        }
    }

    const buildRange = () => {
        const now = new Date();
        const lowerSelect = document.getElementById('chart-lower');
        const upperSelect = document.getElementById('chart-upper');
        const lower = parseInt(lowerSelect?.value ?? '-11', 10) || 0;
        const upper = parseInt(upperSelect?.value ?? '0', 10) || 0;
        let startDate = new Date(now.getFullYear(), now.getMonth() + lower, 1);
        let endDate = new Date(now.getFullYear(), now.getMonth() + upper, 1);
        if (startDate > endDate) {
            const temp = startDate;
            startDate = endDate;
            endDate = temp;
        }
        return {
            start: { year: startDate.getFullYear(), month: startDate.getMonth() + 1 },
            end: { year: endDate.getFullYear(), month: endDate.getMonth() + 1 },
        };
    };

    const monthSequence = (range) => {
        if (!range?.start || !range?.end) {
            return [];
        }
        const months = [];
        const startIndex = range.start.year * 12 + (range.start.month - 1);
        const endIndex = range.end.year * 12 + (range.end.month - 1);
        for (let index = startIndex; index <= endIndex; index++) {
            months.push({
                year: Math.floor(index / 12),
                month: (index % 12) + 1,
            });
        }
        return months;
    };

    const summarizeReferralData = () => {
        return referralData.reduce((acc, item) => {
            const year = parseInt(item.year, 10);
            const month = parseInt(item.month, 10);
            if (!year || !month) {
                return acc;
            }
            const key = `${year}-${String(month).padStart(2, '0')}`;
            if (!acc[key]) {
                acc[key] = { total: 0, active: 0, paying: 0 };
            }
            acc[key].total += parseInt(item.total ?? item.count ?? 0, 10) || 0;
            acc[key].active += parseInt(item.active ?? 0, 10) || 0;
            acc[key].paying += parseInt(item.paying ?? 0, 10) || 0;
            return acc;
        }, {});
    };

    const buckets = summarizeReferralData();

    const aggregateData = (range) => {
        const months = monthSequence(range);
        const totals = {
            totalReferrals: [],
            totalActiveReferrals: [],
            totalPaidActiveReferrals: [],
        };
        months.forEach(({ year, month }) => {
            const key = `${year}-${String(month).padStart(2, '0')}`;
            const bucket = buckets[key] ?? { total: 0, active: 0, paying: 0 };
            totals.totalReferrals.push(bucket.total);
            totals.totalActiveReferrals.push(bucket.active);
            totals.totalPaidActiveReferrals.push(bucket.paying);
        });
        return { months, totals };
    };

    const buildLabels = (months) => months.map(({ year, month }) => `${MONTHS[(month - 1) % 12]} ${String(year).slice(-2)}`);

    let referralChart = null;
    const chartEl = document.getElementById('referral-chart');
    const refreshChart = () => {
        if (!referralChart) {
            return;
        }
        const range = buildRange();
        const { months, totals } = aggregateData(range);
        referralChart.data.labels = buildLabels(months);
        referralChart.data.datasets[0].data = totals.totalReferrals;
        referralChart.data.datasets[1].data = totals.totalActiveReferrals;
        referralChart.data.datasets[2].data = totals.totalPaidActiveReferrals;
        referralChart.update();
    };

    if (chartEl && window.Chart) {
        const range = buildRange();
        const { months, totals } = aggregateData(range);
        referralChart = new Chart(chartEl.getContext('2d'), {
            type: 'bar',
            data: {
                labels: buildLabels(months),
                datasets: [
                    { label: 'Total Referrals', data: totals.totalReferrals, backgroundColor: '#7f8c8d' },
                    { label: 'Active Referrals', data: totals.totalActiveReferrals, backgroundColor: '#3498db' },
                    { label: 'Paying Referrals', data: totals.totalPaidActiveReferrals, backgroundColor: '#1ee0ac' },
                ],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: { stacked: false },
                    y: { beginAtZero: true, ticks: { precision: 0 } },
                },
            },
        });
    }

    ['chart-upper', 'chart-lower'].forEach((id) => {
        const select = document.getElementById(id);
        if (select) {
            select.addEventListener('change', refreshChart);
        }
    });

    document.querySelectorAll('.copy-referral-link').forEach((button) => {
        button.addEventListener('click', async () => {
            const link = button.getAttribute('data-referral-link');
            if (!link) {
                state.notify('Referral link is not available yet.', 'warning');
                return;
            }
            try {
                if (navigator.clipboard?.writeText) {
                    await navigator.clipboard.writeText(link);
                } else {
                    const input = document.createElement('textarea');
                    input.value = link;
                    document.body.appendChild(input);
                    input.select();
                    document.execCommand('copy');
                    document.body.removeChild(input);
                }
                state.notify('Referral link copied to clipboard.', 'success');
            } catch (error) {
                state.notify('Unable to copy referral link.', 'error');
            }
        });
    });

    state.tableElement = document.getElementById('referralsTable');
    const statusFilter = document.getElementById('referralStatusFilter');

    const initDataTable = () => {
        if (!state.tableElement) {
            return;
        }
        const options = {
            paging: true,
            searching: true,
            ordering: true,
            order: [[3, 'desc']],
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, 'All']],
            info: true,
        };
        if (window.jQuery?.fn?.DataTable) {
            if (!jQuery.fn.dataTable.isDataTable(state.tableElement)) {
                state.tableInstance = jQuery(state.tableElement).DataTable(options);
            } else {
                state.tableInstance = jQuery(state.tableElement).DataTable();
            }
        } else if (typeof window.DataTable === 'function') {
            state.tableInstance = new DataTable(state.tableElement, options);
        }
    };

    state.applyStatusFilter = (value) => {
        state.currentFilter = value || '';
        if (state.tableInstance?.column) {
            state.tableInstance.column(2).search(state.currentFilter, true, false).draw();
            return;
        }
        if (!state.tableElement) {
            return;
        }
        const rows = state.tableElement.querySelectorAll('tbody tr');
        rows.forEach((row) => {
            const rowStatus = row.getAttribute('data-status') || '';
            if (!state.currentFilter || rowStatus === state.currentFilter) {
                row.removeAttribute('hidden');
            } else {
                row.setAttribute('hidden', 'hidden');
            }
        });
    };

    initDataTable();

    if (statusFilter) {
        statusFilter.addEventListener('change', (event) => {
            state.applyStatusFilter(event.target.value || '');
        });
    }

    const selectAll = document.getElementById('selectAllReferrals');
    if (selectAll && state.tableElement) {
        selectAll.addEventListener('change', () => {
            const checked = selectAll.checked;
            state.tableElement.querySelectorAll('.referral-select').forEach((checkbox) => {
                checkbox.checked = checked;
            });
        });
    }
})();

function handleBulkAction(action) {
    const state = window.MyMIReferralDashboard || {};
    const tableEl = state.tableElement || document.getElementById('referralsTable');
    if (!tableEl) {
        return;
    }
    const selected = Array.from(tableEl.querySelectorAll('.referral-select:checked'))
        .map((input) => parseInt(input.value, 10))
        .filter((id) => id > 0);
    if (selected.length === 0) {
        (state.notify || window.alert)('Select at least one referral before continuing.', 'warning');
        return;
    }
    const endpoint = action === 'delete'
        ? (state.bulkUrls?.delete ?? '')
        : (state.bulkUrls?.update ?? '');
    if (!endpoint) {
        (state.notify || window.alert)('Referral endpoint is unavailable.', 'error');
        return;
    }
    const payload = { ids: selected };
    if (action === 'updateStatus') {
        payload.status = 'active';
    }
    const csrfHeader = document.querySelector('meta[name="csrf-header"]')?.content || 'X-CSRF-TOKEN';
    const csrfTokenEl = document.querySelector('meta[name="csrf-token"]');
    const csrfToken = csrfTokenEl?.content || (window.CSRF?.token ?? '');

    fetch(endpoint, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            [csrfHeader]: csrfToken,
        },
        credentials: 'same-origin',
        body: JSON.stringify(payload),
    })
        .then(async (response) => {
            const data = await response.json().catch(() => ({}));
            if (!response.ok || (data.status ?? 'error') !== 'success') {
                throw new Error(data.message || 'Bulk action failed.');
            }
            if (data.csrf?.token && csrfTokenEl) {
                csrfTokenEl.setAttribute('content', data.csrf.token);
                window.CSRF = window.CSRF || {};
                window.CSRF.token = data.csrf.token;
            }
            const selectAll = document.getElementById('selectAllReferrals');
            if (selectAll) {
                selectAll.checked = false;
            }
            let totalDelta = 0;
            let activeDelta = 0;
            selected.forEach((id) => {
                const checkbox = tableEl.querySelector(`.referral-select[value="${id}"]`);
                if (!checkbox) {
                    return;
                }
                const row = checkbox.closest('tr');
                if (!row) {
                    return;
                }
                if (action === 'delete') {
                    const wasActive = row.getAttribute('data-status') === 'active';
                    if (state.tableInstance?.row) {
                        state.tableInstance.row(row).remove();
                    } else {
                        row.remove();
                    }
                    totalDelta -= 1;
                    if (wasActive) {
                        activeDelta -= 1;
                    }
                } else {
                    if (row.getAttribute('data-status') !== 'active') {
                        row.setAttribute('data-status', 'active');
                        activeDelta += 1;
                    }
                    const badge = row.querySelector('.referral-status');
                    if (badge) {
                        badge.textContent = 'Active';
                        badge.classList.remove('bg-warning', 'text-dark');
                        badge.classList.add('bg-success');
                    }
                    checkbox.checked = false;
                }
            });
            if (state.tableInstance?.draw) {
                state.tableInstance.draw(false);
            } else if (state.applyStatusFilter) {
                state.applyStatusFilter(state.currentFilter || '');
            }
            if (typeof state.updateCounts === 'function') {
                state.updateCounts(totalDelta, activeDelta);
            }
            (state.notify || window.alert)(data.message || 'Bulk action completed.', 'success');
        })
        .catch((error) => {
            (state.notify || window.alert)(error.message || 'Bulk action failed.', 'error');
        });
}
</script>
