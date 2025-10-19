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
<?php 
if ($this->agent->is_browser()) {
// echo '
// <div class="nk-block d-none d-sm-block">
//     <div class="row">
//         <div class="d-lg-none d-xl-block col-md-12 col-xl-3 my-sm-3">';
//             echo view('UserModule/Budget/index/Investor_Assessment/assessment_center', $allViewData);
//             // echo view('UserModule/Budget/index/control_center', $allViewData);
//         echo '
//         </div><!-- .col -->
//         <div class="d-none d-sm-block col-md-12 col-xl-9 my-sm-3">';
//             echo view('UserModule/Budget/index/Investor_Assessment/assessment_content', $allViewData);
//             // echo view('UserModule/Budget/index/overview_chart', $allViewData);
//         echo '
//         </div>
//     </div>
// </div>';
echo '
<div class="nk-block d-none d-sm-block">
    <div class="row">
        <div class="d-none d-md-block col-md-12 col-xl-3 my-sm-3">';
            // echo view('UserModule/Budget/index/assessment_center', $allViewData);
            ?>
            <div class="card card-bordered h-100">
                <div class="card-inner-group">
                    <div class="card-inner card-inner-md">
                        <div class="card-title-group">
                            <div class="card-title">
                                <h6 class="title">Financial Summary</h6>
                            </div>
                            <div class="card-tools me-n1">
                                <div class="drodown">
                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger full-width" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <ul class="link-list-opt no-bdr">
                                            <li><a href="#"><em class="icon ni ni-setting"></em><span>Action Settings</span></a></li>
                                            <li><a href="#"><em class="icon ni ni-notify"></em><span>Push Notification</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- .card-inner -->
                    <div class="card-inner">
                        <div class="nk-wg-action">
                            <div class="nk-wg-action-content">
                                <em class="icon ni ni-wallet-in"></em>
                                <div class="title">Income YTD - <?php echo $incomeYTDSummaryFMT; ?></div>
                                <p>
                                    Manage your 
                                    <a href="<?php echo site_url('Budget/Income'); ?>">Income Accounts</a> 
                                    <!-- <a href="#budgeting-monthly-financial-overview">Income Accounts</a>  -->
                                    <!-- 
                                        // #NEXTSTEPS Change to this once Individual Wallet Overviews are completed (/Wallets/Checking, /Wallets/Savings, etc.)
                                        <a href="<?php //echo site_url('/Wallets/Checking'); ?>">Checking Accounts</a>  
                                    -->
                                    to update your Financial Forecast.
                                </p>
                            </div>
                            <a href="<?php echo site_url('Budget/Income'); ?>" class="btn btn-icon btn-trigger me-n2"><em class="icon ni ni-forward-ios"></em></a>
                            <!-- <a href="#budgeting-monthly-financial-overview" class="btn btn-icon btn-trigger me-n2"><em class="icon ni ni-forward-ios"></em></a> -->
                        </div>
                    </div><!-- .card-inner -->
                    <div class="card-inner">
                        <div class="nk-wg-action">
                            <div class="nk-wg-action-content">
                                <em class="icon ni ni-wallet-out"></em>
                                <div class="title">Expense YTD - <?php echo $expenseYTDSummaryFMT; ?></div>
                                <p>
                                    Manage your 
                                    <a href="<?php echo site_url('Budget/Expenses'); ?>">Expense Accounts</a> 
                                    <!-- <a href="#budgeting-monthly-financial-overview">Expense Accounts</a>  -->
                                    <!-- 
                                        // #NEXTSTEPS Change to this once Individual Wallet Overviews are completed (/Wallets/Checking, /Wallets/Savings, etc.)
                                        <a href="<?php //echo site_url('/Wallets/Checking'); ?>">Checking Accounts</a>  
                                    -->
                                    to update your Financial Forecast.
                                </p>
                            </div>
                            <a href="<?php echo site_url('Budget/Expenses'); ?>" class="btn btn-icon btn-trigger me-n2"><em class="icon ni ni-forward-ios"></em></a>
                            <!-- <a href="#budgeting-monthly-financial-overview" class="btn btn-icon btn-trigger me-n2"><em class="icon ni ni-forward-ios"></em></a> -->
                        </div>
                    </div><!-- .card-inner -->
                    <div class="card-inner">
                        <div class="nk-wg-action">
                            <div class="nk-wg-action-content">
                                <em class="icon ni ni-cc-alt"></em>
                                <div class="title">Checking - <?php echo $checkingSummaryFMT; ?></div>
                                <p>
                                    Manage your 
                                    <a href="<?php echo site_url('Wallets/Checking'); ?>">Checking Accounts</a> 
                                    <!-- 
                                        // #NEXTSTEPS Change to this once Individual Wallet Overviews are completed (/Wallets/Checking, /Wallets/Savings, etc.)
                                        <a href="<?php //echo site_url('/Wallets/Checking'); ?>">Checking Accounts</a>  
                                    -->
                                    to update your Monthly Budget.
                                </p>
                            </div>
                            <a href="<?php echo site_url('/Wallets/Checking'); ?>" class="btn btn-icon btn-trigger me-n2"><em class="icon ni ni-forward-ios"></em></a>
                        </div>
                    </div><!-- .card-inner -->
                    <div class="card-inner">
                        <div class="nk-wg-action">
                            <div class="nk-wg-action-content">
                                <em class="icon ni ni-activity"></em>
                                <div class="title">Credit Cards - <?php echo $creditAvailableFMT . ' / <small>' . $creditLimitFMT . '</small>'; ?></div>
                                <p>
                                    Manage your 
                                    <a href="<?php echo site_url('/Wallets/Credit'); ?>">Credit</a> 
                                    <!-- 
                                        // #NEXTSTEPS Change to this once Individual Wallet Overviews are completed (/Wallets/Checking, /Wallets/Savings, etc.)
                                        <a href="<?php //echo site_url('/Wallets/Checking'); ?>">Checking Accounts</a>  
                                    -->
                                    to update your Financial Forecast.
                                </p>
                            </div>
                            <a href="<?php echo site_url('/Wallets/Credit'); ?>" class="btn btn-icon btn-trigger me-n2"><em class="icon ni ni-forward-ios"></em></a>
                        </div>
                    </div><!-- .card-inner -->
                    <div class="card-inner">
                        <div class="nk-wg-action">
                            <div class="nk-wg-action-content">
                                <em class="icon ni ni-activity"></em>
                                <div class="title">Debt - <?php echo $debtSummaryFMT; ?></div>
                                <p>
                                    Manage your 
                                    <a href="<?php echo site_url('/Wallets/Debt'); ?>">Debt</a> 
                                    <!-- 
                                        // #NEXTSTEPS Change to this once Individual Wallet Overviews are completed (/Wallets/Checking, /Wallets/Savings, etc.)
                                        <a href="<?php //echo site_url('/Wallets/Checking'); ?>">Checking Accounts</a>  
                                    -->
                                    to update your Financial Forecast.
                                </p>
                            </div>
                            <a href="<?php echo site_url('/Wallets/Debt'); ?>" class="btn btn-icon btn-trigger me-n2"><em class="icon ni ni-forward-ios"></em></a>
                        </div>
                    </div><!-- .card-inner -->        
                    <div class="card-inner">
                        <div class="nk-wg-action">
                            <div class="nk-wg-action-content">
                                <em class="icon ni ni-activity"></em>
                                <div class="title">Investments - <small>(**COMING SOON**)</small></div>
                                <p>
                                    Manage your 
                                    Investments
                                    <!-- <a href="<?php echo site_url('/Wallets/Investments'); ?>">Investments</a>  -->
                                    <!-- 
                                        // #NEXTSTEPS Change to this once Individual Wallet Overviews are completed (/Wallets/Checking, /Wallets/Savings, etc.)
                                        <a href="<?php //echo site_url('/Wallets/Checking'); ?>">Checking Accounts</a>  
                                    -->
                                    to update your Retirement Financial Forecast.
                                </p>
                            </div>
                            <?php 
                            // !! Pop Up Modal with Service Description // 
                            ?>
                            <a href="#" class="btn btn-icon btn-trigger me-n2"><em class="icon ni ni-forward-ios"></em></a>
                        </div>
                    </div><!-- .card-inner -->
                    <div class="card-inner">
                        <div class="nk-wg-action">
                            <div class="nk-wg-action-content">
                                <em class="icon ni ni-activity"></em>
                                <div class="title">Retirement - <small>(**COMING SOON**)</small></div>
                                <p>
                                    Manage your 
                                    Retirement Plan
                                    <!-- <a href="<?php //echo site_url('/Wallets/Retirement'); ?>">Retirement</a>  -->
                                    <!-- 
                                        // #NEXTSTEPS Change to this once Individual Wallet Overviews are completed (/Wallets/Checking, /Wallets/Savings, etc.)
                                        <a href="<?php //echo site_url('/Wallets/Checking'); ?>">Checking Accounts</a>  
                                    -->
                                    to update your Retirement Financial Forecast.
                                </p>
                            </div>
                            <?php 
                            // !! Pop Up Modal with Service Description // 
                            ?>
                            <a href="#" class="btn btn-icon btn-trigger me-n2"><em class="icon ni ni-forward-ios"></em></a>
                        </div>
                    </div><!-- .card-inner -->
                    <br>
                    <?php 
                    if ($investmentOperations === 1) {
                    ?>    
                    <div class="card-inner">
                        <div class="nk-wg-action">
                            <div class="nk-wg-action-content">
                                <em class="icon ni ni-wallet-out"></em>
                                <div class="title">Investment Strategy</div>
                                <p>
                                    Manage your 
                                    <a href="#budgeting-monthly-financial-overview">Investment Profile &amp; Strategy</a> 
                                    <!-- 
                                        // #NEXTSTEPS Change to this once Individual Wallet Overviews are completed (/Wallets/Checking, /Wallets/Savings, etc.)
                                        <a href="<?php //echo site_url('/Wallets/Checking'); ?>">Checking Accounts</a>  
                                    -->
                                    to accurately forecast your Personal Budget.
                                </p>
                            </div>
                            <a href="#budgeting-monthly-financial-overview" class="btn btn-icon btn-trigger me-n2"><em class="icon ni ni-forward-ios"></em></a>
                        </div>
                    </div><!-- .card-inner -->
                    <?php
                    }
                    ?>
                    <!--
                    <div class="card-inner">
                        <div class="nk-wg-action">
                            <div class="nk-wg-action-content">
                                <em class="icon ni ni-coins"></em>
                                <div class="title">Investments / Assets</div>
                                <p>
                                    Manage your 
                                    <a href="<?php //echo site_url('/Budget/Income/Accounts'); ?>">Investments / Assets</a> 
                                    <!-- 
                                        // #NEXTSTEPS Change to this once Individual Wallet Overviews are completed (/Wallets/Checking, /Wallets/Savings, etc.)
                                        <a href="<?php //echo site_url('/Wallets/Checking'); ?>">Checking Accounts</a>  
                                    --
                                    to update your Financial Forecast.
                                </p>
                            </div>
                            <a href="<?php //echo site_url('/Budget/Add/Expense'); ?>" class="btn btn-icon btn-trigger me-n2"><em class="icon ni ni-forward-ios"></em></a>
                        </div>
                    </div><!-- .card-inner -->
                    <!--
                    <div class="card-inner">
                        <div class="nk-wg-action">
                            <div class="nk-wg-action-content">
                                <em class="icon ni ni-growth"></em>
                                <div class="title">Retirement</div>
                                <p>View, manage and analyze your <a href="<?php //echo site_url('Budget/Forecast'); ?>"><strong><?php //echo $totalTransactions; ?> Financial Forecast &amp; 5-Year Projections</strong></a>.</p>
                            </div>
                            <a href="<?php //echo site_url('Exchanges'); ?>" class="btn btn-icon btn-trigger me-n2"><em class="icon ni ni-forward-ios"></em></a>
                        </div>
                    </div><!-- .card-inner -->
                </div><!-- .card-inner-group -->
            </div><!-- .card -->
        echo '
        </div><!-- .col -->
        <div class="d-none d-sm-block col-md-12 col-xl-9 my-sm-3">';
            // echo view('UserModule/Budget/index/assessment_content', $allViewData);
            <div class="card card-bordered h-100">
    <div class="card-inner">
        <div class="card-title-group align-start mb-3">
            <div class="card-title">
                <h6 class="title">Month-to-Month Overview</h6>
                <p>Click on the legend below to hide or show parts of the chart and edit the timeframe at the bottom of it</p>
            </div>
            <div class="card-tools mt-n1 me-n1">
                <div class="dropdown text-white d-sm-none d-md-block">
                    <a href="#" class="btn btn-primary btn-md text-white" data-bs-toggle="dropdown" aria-expanded="false"><span>Chart Settings</span><em class="icon ni ni-setting"></em></a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-auto mt-1" style="">
                        <ul class="link-list-opt no-bdr">
                            <li class="p-1">
                                <h7>Start Date?</h7>
                                <input type="date">   
                            </li>
                            <li class="divider"></li>
                            <li class="p-1">
                                <h7>Historical Timeline?</h7>
                                <select class="form-select form-control link-list-opt no-bdr" id="chart-lower" aria-label="Default select ">
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
                                <select class="form-select form-control" id="chart-upper" aria-label="Default select ">
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
        </div><!-- .card-title-group -->
        <div class="nk-order-ovwg">
            <div class="row g-4 align-end">
                <div class="col-12">
                    <div class="nk-order-ovwg-ck" style="height:100%;">
                        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.2/Chart.min.js"></script>
                        <?php
                        echo("<div id='budget-data' hidden>" .json_encode($userBudgetRecords,true) . '</div>');
                        ?>
                        <div class="h-100">
                            <canvas class="h-100" id="report-chart"></canvas>
                        </div>                               
                    </div>
                </div><!-- .col -->
            </div>
        </div><!-- .nk-order-ovwg -->
        <div class="nk-order-ovwg">
            <div class="row g-4 align-end">
                <div class="col-12">
                    <h6>This month's performance</h6>
                    <p>A quick visual summary of your incomes and expenses this month</p>
                </div>
            </div>
        </div>
        <div class="nk-order-ovwg py-5">
            <div class="row g-4 align-end">
                <div class="col-12 col-sm-3 col-md-6 col-xxl-3">
                    <a href="<?php echo site_url('Budget/Income'); ?>">
                        <div class="nk-order-ovwg-data surplus">
                            <div class="title"><em class="icon ni ni-arrow-down-left"></em> <small>Income</small></div>
                            <div class="amount"><?php echo $thisMonthsIncomeFMT; ?></div>
                            <div class="info row">
                                <span class="col-6 p-0">Last Month</span><span class="col-6 p-0 text-right"><strong><?php echo $lastMonthsIncomeFMT; ?></strong></span>
                                <span class="col-6 p-0">Next Month</span><span class="col-6 p-0 text-right"><strong><?php echo $nextMonthsIncomeFMT; ?></strong></span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-3 col-md-6 col-xxl-3">
                    <a href="<?php echo site_url('Budget/Expenses'); ?>">
                        <div class="nk-order-ovwg-data surplus">
                            <div class="title"><em class="icon ni ni-arrow-up-left"></em> <small>Expenses</small></div>
                            <div class="amount"><?php echo $thisMonthsExpenseFMT; ?></div>
                            <div class="info row">
                                <span class="col-6 p-0">Last Month</span><span class="col-6 p-0 text-right"><strong><?php echo $lastMonthsExpenseFMT; ?></strong></span>
                                <span class="col-6 p-0">Next Month</span><span class="col-6 p-0 text-right"><strong><?php echo $nextMonthsExpenseFMT; ?></strong></span>
                                <span class="col-12"></span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-3 col-md-6 col-xxl-3">
                    <a href="">
                        <div class="nk-order-ovwg-data surplus">
                            <div class="title"><em class="icon ni ni-arrow-down-left"></em> <small>Savings</small></div>
                            <div class="amount"><?php echo $thisMonthsSurplusFMT; ?></div>
                            <div class="info row">
                                <span class="col-6 p-0">Last Month</span><span class="col-6 p-0 text-right"><strong><?php echo $lastMonthsSurplusFMT; ?></strong></span>
                                <span class="col-6 p-0">Next Month</span><span class="col-6 p-0 text-right"><strong><?php echo $nextMonthsSurplusFMT; ?></strong></span>
                                <span class="col-12"></span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-3 col-md-6 col-xxl-3">
                    <a href="">
                        <div class="nk-order-ovwg-data surplus">
                            <div class="title"><em class="icon ni ni-arrow-up-left"></em> <small>Investments (<?php echo $monthlySavingsPercentageFMT; ?>)</small></div>
                            <div class="amount"><?php echo $thisMonthsInvestmentsFMT . '<small style="font-size:0.75rem;"> / ' . $thisMonthsInvestmentsSplitFMT . '</small>'; ?></div>
                            <div class="info row">
                                <span class="col-6 p-0">Last Month</span><span class="col-6 p-0 text-right"><strong><?php echo $lastMonthsInvestmentsFMT; ?></strong></span>
                                <span class="col-6 p-0">Next Month</span><span class="col-6 p-0 text-right"><strong><?php echo $nextMonthsInvestmentsFMT; ?></strong></span>
                                <span class="col-12"></span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-3 col-md-6 col-xxl-3">
                    <a href="<?php echo site_url('Budget/Income'); ?>">
                        <div class="nk-order-ovwg-data surplus">
                            <div class="title"><em class="icon ni ni-arrow-down-left"></em> <small>Daily Income Req.</small></div>
                            <div class="amount"><?php echo '$' . number_format($thisMonthsExpense/20,2) . ' <small style="font-size:0.75rem;">/ Day</small>'; ?></div>
                            <div class="info row">
                                <span class="col-6 p-0">Last Month</span><span class="col-6 p-0 text-right"><strong><?php echo '$' . number_format($lastMonthsExpense/20,2); ?></strong></span>
                                <span class="col-6 p-0">Next Month</span><span class="col-6 p-0 text-right"><strong><?php echo '$' . number_format($nextMonthsExpense/20,2); ?></strong></span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-3 col-md-6 col-xxl-3">
                    <a href="<?php echo site_url('Budget/Expenses'); ?>">
                        <div class="nk-order-ovwg-data surplus">
                            <div class="title"><em class="icon ni ni-arrow-down-left"></em> <small>Weekly Req.</small></div>
                            <div class="amount"><?php echo '$' . number_format(($thisMonthsExpense/20) * 5,2) . ' <small style="font-size:0.75rem;">/ Week</small>'; ?></div>
                            <div class="info row">
                                <span class="col-6 p-0">Last Month</span><span class="col-6 p-0 text-right"><strong><?php echo '$' . number_format(($lastMonthsExpense/20) * 5,2); ?></strong></span>
                                <span class="col-6 p-0">Next Month</span><span class="col-6 p-0 text-right"><strong><?php echo '$' . number_format(($nextMonthsExpense/20) * 5,2); ?></strong></span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-3 col-md-6 col-xxl-3">
                    <a href="">
                        <div class="nk-order-ovwg-data surplus">
                            <div class="title"><em class="icon ni ni-arrow-down-left"></em> <small>Bi-Weekly Req.</small></div>
                            <div class="amount"><?php echo '$' . number_format(($thisMonthsExpense/20) * 10,2) . ' <small style="font-size:0.75rem;">/ Bi-Weekly</small>'; ?></div>
                            <div class="info row">
                                <span class="col-6 p-0">Last Month</span><span class="col-6 p-0 text-right"><strong><?php echo '$' . number_format(($lastMonthsExpense/20) * 10,2); ?></strong></span>
                                <span class="col-6 p-0">Next Month</span><span class="col-6 p-0 text-right"><strong><?php echo '$' . number_format(($nextMonthsExpense/20) * 10,2); ?></strong></span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-12 col-sm-3 col-md-6 col-xxl-3">
                    <a href="">
                        <div class="nk-order-ovwg-data surplus">
                            <div class="title"><em class="icon ni ni-arrow-down-left"></em> <small>Monthly Req.</small></div>
                            <div class="amount"><?php echo '$' . number_format(($thisMonthsExpense/20) * 20,2) . ' <small style="font-size:0.75rem;">/ Month</small>'; ?></div>
                            <div class="info row">
                                <span class="col-6 p-0">Last Month</span><span class="col-6 p-0 text-right"><strong><?php echo '$' . number_format(($lastMonthsExpense/20) * 20,2); ?></strong></span>
                                <span class="col-6 p-0">Next Month</span><span class="col-6 p-0 text-right"><strong><?php echo '$' . number_format(($nextMonthsExpense/20) * 20,2); ?></strong></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div><!-- .card-inner -->
</div><!-- .card -->
<?php
        echo '
        </div>
    </div>
</div>
';
}
?>
<div id="budgeting-monthly-financial-overview"></div>
<div class="nk-block">
    <div class="row">
        <div class="col-sm-12 col-md-12 my-sm-3">
            <?php
            if ($this->agent->is_mobile()) {
                echo '<div class="card h-100">';
            } elseif ($this->agent->is_browser()) {
                echo '<div class="card card-bordered h-100">';
            };
            ?>
                <div class="card-inner px-2 px-lg-4">
                    <div class="nk-order-ovwg">
                        <?php 
                        if ($this->agent->is_browser()) {
                            echo '
                        <div class="row g-4 align-end">
                            <div class="col-12">
                                <div class="card-title-group align-start mb-3">
                                    <div class="card-title">
                                        <h6 class="title">Monthly Financial Overview</h6>
                                        <p>Last 12 Months of Total Monthly ßFinancial Growth.</p>
                                    </div>
                                    <div class="card-tools mt-n1 me-n1">
                                        <a class="btn btn-success btn-sm text-white" href="' . site_url('/Budget/Add/Income') . '"><i class="icon ni ni-plus"></i> Income</a>
                                        <a class="btn btn-danger btn-sm text-white" href="' . site_url('/Budget/Add/Expense') . '"><i class="icon ni ni-plus"></i> Expense</a>
                                        <a class="btn btn-primary btn-sm text-white" data-bs-toggle="modal" data-bs-target="#bulkActionModal"><i class="icon ni ni-pencil"></i> Edit All</a>
                                        <a class="btn btn-outline-secondary btn-sm" href="' . site_url('/Budget/History') . '"><i class="icon ni ni-history"></i> History</a>
                                        <div class="dropdown">
                                            <a href="#" class="btn btn-outline-secondary btn-sm" data-bs-toggle="dropdown" aria-expanded="false"><span>Chart Settings</span><em class="icon ni ni-setting"></em></a>
                                            <div class="dropdown-menu dropdown-menu-end mt-1" style="">
                                                <ul class="link-check link-list-opt no-bdr">
                                                    <li><span>Include Credit?</span></li>
                                                        <li class="p-1">
                                                            <a class="" href="' . site_url('/Budget/Add/Income') . '">On</a>
                                                        </li>
                                                        <li class="p-1 active">
                                                            <a class="" href="' . site_url('/Budget/Add/Income') . '">Off</a>
                                                        </li>
                                                    <li><span>Include Investments?</span></li>
                                                        <li class="p-1">
                                                            <a class="" href="' . site_url('/Budget/Add/Income') . '">On</a>
                                                        </li>
                                                        <li class="p-1 active">
                                                            <a class="" href="' . site_url('/Budget/Add/Income') . '">Off</a>
                                                        </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card-tools mt-1 me-n1">
                                            <span class="mr-3">
                                                Include Credit Accounts: <a class="" href="' . site_url('/Budget/Add/Income') . '"><i class="icon ni ni-toggle-off"></i></a>
                                            </span>
                                            <span>
                                                Include Investment Accounts: <a class="" href="' . site_url('/Budget/Add/Income') . '"><i class="icon ni ni-toggle-off"></i></a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="card-title-group align-start mb-3">
                                    <div class="card-tools mt-n1 me-n1">
                                        Include Credit Accounts: <a class="" href="' . site_url('/Budget/Add/Income') . '"><i class="icon ni ni-toggle-off"></i></a>
                                        Include Investment Accounts: <a class="" href="' . site_url('/Budget/Add/Income') . '"><i class="icon ni ni-toggle-off"></i></a>
                                    </div>
                                </div>
                                <div class="card-title-group align-start mb-3">
                                    <div class="card-tools mt-n1 me-n1">
                                        <ul class="nav nav-pills p-lg-3">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Current</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="home-tab" type="button" role="tab" data-bs-toggle="modal" data-bs-target="#bulkActionModal" aria-controls="home" aria-selected="true">Edit All</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">History</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div> -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">';
                                        echo view('UserModule/Budget/index/active_table', $allViewData);
                                        echo '
                                    </div>
                                    <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">';
                                    //echo view('UserModule/Budget/index/historical_table', $allViewData);
                                    echo '
                                    </div>
                                </div>
                            </div>
                        </div>
                            ';
                        } elseif ($this->agent->is_mobile()) {
                            echo '
                        <div class="row g-4 align-end">
                            <div class="col-12 pr-3">
                                <div class="card-title-group align-start mb-3">
                                    <div class="card-title">
                                        <h6 class="title">Monthly Financial Overview</h6>
                                        <p>Last 12 Months of Total Monthly ßFinancial Growth.</p>
                                    </div>
                                    <div class="card-tools mt-n1 me-n1">
                                        <a class="btn btn-success btn-xs text-white" href="' . site_url('/Budget/Add/Income') . '"><i class="icon ni ni-plus"></i> Income</a>
                                        <a class="btn btn-danger btn-xs text-white" href="' . site_url('/Budget/Add/Expense') . '"><i class="icon ni ni-plus"></i> Expense</a>
                                    </div>
                                </div>
                                <!-- <div class="card-title-group align-start mb-3">
                                    <div class="card-tools mt-n1 me-n1">
                                        <ul class="nav nav-pills p-lg-3">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Current</a>
                                            </li> 
                                            <li class="nav-item">
                                                <a class="nav-link" id="home-tab" type="button" role="tab" data-bs-toggle="modal" data-bs-target="#bulkActionModal" aria-controls="home" aria-selected="true">Edit All</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">History</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div> -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">';
                                            echo view('UserModule/Budget/index/active_table', $allViewData);
                                            echo '
                                        </div>
                                        <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">';
                                        //echo view('UserModule/Budget/index/historical_table', $allViewData);
                                        echo '
                                        </div>
                                    </div>
                                </div>
                            </div>
                            ';
                        }
                        ?>
                    </div><!-- .nk-order-ovwg -->
                </div><!-- .card-inner -->
            </div><!-- .card -->
        </div>
    </div>
</div>
<!-- Add this modal HTML in your view -->
<div class="modal" id="bulkActionModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Bulk Actions</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <button onclick="handleBulkAction('updateStatus')" class="btn btn-primary">Mark as Paid</button>
                <button onclick="handleBulkAction('delete')" class="btn btn-danger">Delete</button>
            </div>
        </div>
    </div>
</div>
