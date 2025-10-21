<?php
$pageURIB = $uri->getSegment(2);
// log_message('debug', 'Management\Views\Users\index L9 - $reporting array: ' . (print_r($reporting['getInactiveUsers'], true)));
// $reporting = $mymianalytics->reporting();
$getPendingUsers = $reporting['getPendingUsers'];
$totalPendingUsers = $reporting['totalPendingUsers'];
$getActiveUsers = $reporting['getActiveUsers'];
$totalActiveUsers = $reporting['totalActiveUsers'];
$getInactiveUsers = $reporting['getInactiveUsers'];
// log_message('debug', 'Management\Views\Users\index L9 - $getInactiveUsers array: ' . (print_r($getInactiveUsers, true)));
$totalInactiveUsers = $reporting['totalInactiveUsers'];

$getPendingPartners = $reporting['getPendingPartners'];
$totalPendingPartners = $reporting['totalPendingPartners'];
$getActivePartners = $reporting['getActivePartners'];
$totalActivePartners = $reporting['totalActivePartners'];
$getPendingSupport = $reporting['getPendingSupport'];
$totalPendingSupport = $reporting['totalPendingSupport'];
$getCompleteSupport = $reporting['getCompleteSupport'];
$totalCompleteSupport = $reporting['totalCompleteSupport'];

$viewFileData = [
    'pageURIB' => $pageURIB,
    'getActiveUsers' => $getActiveUsers,
    'getInactiveUsers' => $getInactiveUsers,
];

?>

<div class="nk-block">
    <div class="row gy-gs">
        <div class="col-lg-12 col-xl-12">
            <div class="nk-block">
                <div class="nk-block-head-xs">
                    <div class="nk-block-head-content">
                        <h1 class="title nk-block-title">MyMI Management - <?= $pageURIB; ?></h1>
                        <p id="private_key"></p>
                        <p id="address"></p>
                        <a href="<?= site_url('/Trade-Tracker'); ?>">Back to Dashboard</a>
                    </div>
                </div>
            </div>
            <div class="nk-block">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card card-bordered h-100">
                            <div class="card-inner-group">
                                <div class="card-inner card-inner-md">
                                    <div class="card-title-group">
                                        <div class="card-title">
                                            <h6 class="title">Action Center</h6>
                                        </div>
                                        <div class="card-tools me-n1">
                                            <div class="drodown">
                                                <a href="#" class="btn btn-icon btn-trigger dropdown-toggle" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="#"><em class="icon ni ni-setting"></em><span>Action Settings</span></a></li>
                                                        <li><a href="#"><em class="icon ni ni-notify"></em><span>Push Notification</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-inner">
                                    <div class="nk-wg-action">
                                        <div class="nk-wg-action-content">
                                            <em class="icon ni ni-cc-alt-fill"></em>
                                            <div class="title">User Activity Report</div>
                                            <p><strong><?= $totalActiveUsers; ?> Total Users</strong> and <strong><?= $totalPendingUsers; ?> Pending New Accounts</strong>.</p>
                                        </div>
                                        <a href="<?= site_url('/Management/Assets'); ?>" class="btn btn-icon btn-trigger me-n2"><em class="icon ni ni-forward-ios"></em></a>
                                    </div>
                                </div>
                                <div class="card-inner">
                                    <div class="nk-wg-action">
                                        <div class="nk-wg-action-content">
                                            <em class="icon ni ni-wallet-fill"></em>
                                            <div class="title">Partner Activity Report</div>
                                            <p>We have reached <strong><?= $totalActivePartners; ?> Active Partners</strong>, and <strong><?= $totalPendingPartners; ?> Pending Partners</strong></p>
                                        </div>
                                        <a href="#" class="btn btn-icon btn-trigger me-n2"><em class="icon ni ni-forward-ios"></em></a>
                                    </div>
                                </div>
                                <div class="card-inner">
                                    <div class="nk-wg-action">
                                        <div class="nk-wg-action-content">
                                            <em class="icon ni ni-help-fill"></em>
                                            <div class="title">Support Messages</div>
                                            <p>There is <strong><?= $totalPendingSupport; ?></strong> support messages and <strong><?= $totalCompleteSupport; ?></strong> completed request.</p>
                                        </div>
                                        <a href="#" class="btn btn-icon btn-trigger me-n2"><em class="icon ni ni-forward-ios"></em></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card card-bordered h-100">
                            <div class="card-inner">
                                <div class="card-title-group align-start mb-3">
                                    <div class="card-title">
                                        <h6 class="title">Month-to-Month Overview</h6>
                                        <p>Last 12 Months of Total Monthly Spend & Total Transaction Fees.</p>
                                    </div>
                                    <div class="card-tools me-n1 mt-n1">
                                        <div class="drodown">
                                            <a href="#" class="btn btn-icon btn-trigger dropdown-toggle" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-sm">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a href="#" class="active"><span>15 Days</span></a></li>
                                                    <li><a href="#"><span>30 Days</span></a></li>
                                                    <li><a href="#"><span>3 Months</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="nk-order-ovwg">
                                    <div class="row g-4 align-end">
                                        <div class="col-xxl-8">
                                            <div class="nk-order-ovwg-ck">
                                                <canvas class="order-overview-chart" id="orderOverview"></canvas>
                                            </div>
                                        </div>
                                        <div class="col-xxl-4">
                                            <div class="row g-4">
                                                <div class="col-sm-6 col-xxl-12">
                                                    <div class="nk-order-ovwg-data buy">
                                                        <div class="amount"><?= $totalActiveUsers; ?><small class="currenct currency-usd">Active Users</small></div>
                                                        <div class="info">Pending: <strong><?= $totalPendingUsers; ?><span class="currenct currency-usd">Pending Users</span></strong></div>
                                                        <div class="title"><em class="icon ni ni-arrow-down-left"></em> Active/Pending Users</div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-xxl-12">
                                                    <div class="nk-order-ovwg-data sell">
                                                        <div class="amount"><?= $totalActivePartners; ?><small class="currenct currency-usd">Active Partners</small></div>
                                                        <div class="info">Pending: <strong><?= $totalPendingPartners; ?><span class="currenct currency-usd">Pending Partners</span></strong></div>
                                                        <div class="title"><em class="icon ni ni-arrow-up-left"></em> Active/Pending Partners</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nk-block">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-bordered h-100">
                            <div class="card-inner-group">
                                <div class="card-inner card-inner-md">
                                    <div class="card-title-group">
                                        <div class="card-title">
                                            <h6 class="title">Active Users</h6>
                                        </div>
                                        <div class="card-tools me-n1">
                                            <div class="row">
                                                <span class="col">
                                                    <a href="<?= site_url('Management/Assets/Create'); ?>" class="link py-3"><i class="icon ni ni-plus-circle"></i> Add Asset</a>
                                                </span>
                                                <span class="col">
                                                    <div class="drodown">
                                                        <a href="#" class="btn btn-icon btn-trigger dropdown-toggle" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li><a href="#"><em class="icon ni ni-setting"></em><span>Action Settings</span></a></li>
                                                                <li><a href="#"><em class="icon ni ni-notify"></em><span>Push Notification</span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-inner">
                                    <?= view('Users/Active_Table', $viewFileData); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nk-block">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-bordered h-100">
                            <div class="card-inner-group">
                                <div class="card-inner card-inner-md">
                                    <div class="card-title-group">
                                        <div class="card-title">
                                            <h6 class="title">Inactive Users</h6>
                                        </div>
                                        <div class="card-tools me-n1">
                                            <div class="row">
                                                <span class="col">
                                                    <a href="<?= site_url('Management/Assets/Create'); ?>" class="link py-3"><i class="icon ni ni-plus-circle"></i> Add Asset</a>
                                                    <button class="btn btn-danger mb-3" id="ban-selected-users">🚫 Ban Selected Users</button>
                                                </span>
                                                <span class="col">
                                                    <div class="drodown">
                                                        <a href="#" class="btn btn-icon btn-trigger dropdown-toggle" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <ul class="link-list-opt no-bdr">
                                                                <li><a href="#"><em class="icon ni ni-setting"></em><span>Action Settings</span></a></li>
                                                                <li><a href="#"><em class="icon ni ni-notify"></em><span>Push Notification</span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-inner">
                                    <?= view('Users/Inactive_Table', $viewFileData); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script <?= $nonce['script'] ?? '' ?>>
$(document).on('click', '.ban-user-btn', function (e) {
    e.preventDefault();
    let userID = $(this).data('user-id');
    let $row = $(this).closest('tr'); // assumes button is in a <tr>

    if (confirm('Are you sure you want to ban this user?')) {
        $.ajax({
            url: '/index.php/Management/Users/ajaxBlockUser',
            method: 'POST',
            data: { user_id: userID },
            success: function (response) {
                if (response.status === 'success') {
                    $row.fadeOut(); // removes the row from the UI
                } else {
                    alert(response.message);
                }
            },
            error: function () {
                alert('Something went wrong.');
            }
        });
    }
});

</script>
<script <?= $nonce['script'] ?? '' ?>>
$(document).ready(function () {
    // const table = $('#management-inactive-users').DataTable({
    //     order: [[1, 'desc']],
    //     lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]]
    // });

    // Select/deselect all
    $('#select-all-users').on('change', function () {
        $('.user-checkbox').prop('checked', $(this).is(':checked'));
    });

    // Handle Ban Selected
    $('#ban-selected-users').on('click', function () {
        const selectedIDs = $('.user-checkbox:checked').map(function () {
            return $(this).val();
        }).get();

        if (selectedIDs.length === 0) {
            alert('No users selected.');
            return;
        }

        if (!confirm(`Are you sure you want to ban ${selectedIDs.length} users?`)) {
            return;
        }

        // Get CSRF token from meta tag
        const csrfName = $('meta[name="csrf_token_name"]').attr('content');
        const csrfHash = $('meta[name="csrf_token_value"]').attr('content');

        $.ajax({
            url: '/index.php/Management/Users/ajaxBulkBanUsers',
            type: 'POST',
            data: {
                [csrfName]: csrfHash, // Attach CSRF token
                user_ids: selectedIDs
            },
            success: function (res) {
                if (res.status === 'success') {
                    selectedIDs.forEach(id => {
                        table.row($('#row-' + id)).remove().draw(false);
                    });
                    alert(res.message);
                } else {
                    alert('Some users failed to ban.');
                }
            },
            error: function () {
                alert('AJAX error occurred.');
            }
        });
    });
});
</script>
