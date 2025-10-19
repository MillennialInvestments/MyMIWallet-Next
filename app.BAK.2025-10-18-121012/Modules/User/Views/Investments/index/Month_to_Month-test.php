<!-- User/views/Investments/index/Month_to_Month.php -->
<div class="card card-bordered h-100">
    <div class="card-inner">
        <div class="align-start card-title-group mb-3">
            <div class="card-title">
                <h6 class="title">Month-to-Month Overview</h6>
                <p>View Your Month-to-Month Investment Growth</p>
            </div>
            <div class="card-tools mt-n1 me-n1">
                <div class="drodown">
                    <a href="#" class="dropdown-toggle btn btn-primary full-width" data-bs-toggle="dropdown">
                        Chart Settings
                    </a>
                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-3">
                        <ul class="link-list-opt no-bdr">
                            <li class="p-1">
                                <h7>Start Date?</h7>
                                <input type="date" id="start-date" class="form-control">
                            </li>
                            <li class="divider"></li>
                            <li class="p-1">
                                <h7>Historical Timeline?</h7>
                                <ul class="link-list-opt no-bdr" id="chart-lower-options">
                                    <li data-value="-12" class="option active">Past 12 Months</li>
                                    <li data-value="-6" class="option">Past 6 Months</li>
                                    <li data-value="-3" class="option">Past 3 Months</li>
                                    <li data-value="-1" class="option">Past 1 Month</li>
                                    <li data-value="0" class="option">Only Forward</li>
                                </ul>
                            </li>
                            <li class="divider"></li>
                            <li class="p-1">
                                <h7>Forward-Looking?</h7>
                                <ul class="link-list-opt no-bdr" id="chart-upper-options">
                                    <li data-value="12" class="option active">12 Months</li>
                                    <li data-value="6" class="option">6 Months</li>
                                    <li data-value="3" class="option">3 Months</li>
                                    <li data-value="1" class="option">1 Month</li>
                                    <li data-value="0" class="option">Only Backward</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="nk-order-ovwg">
            <div class="row g-4 align-end">
                <div class="col-12">
                    <div class="nk-order-ovwg-ck" style="height:100%;">
                        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.2/Chart.min.js"></script>
                        <?php
                        // log_message('debug', 'Investments\index\Month_to_Month L52 - $userInvestmentRecords Array: ' . (print_r($userInvestmentRecords, true)));
                        // $monthToMonthData = $allViewData['investmentOverview']['monthToMonthData'] ?? [];
                        $monthToMonthData = $userInvestmentRecords ?? [];
                        echo '<div id="investment-data" hidden>' . json_encode($monthToMonthData, true) . '</div>';
                        ?>
                        <div class="h-100">
                            <canvas class="h-100" id="investment-report-chart"></canvas>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>