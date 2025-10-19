<div class="card card-bordered h-100">
    <div class="card-inner-group">
        <div class="card-inner card-inner-md">
            <div class="card-title-group">
                <div class="card-title">
                    <h6 class="title"><?php echo 'MyMI Gold ' . $uri->getSegment(3) . ' Goals'; ?></h6>
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
                    <em class="icon ni ni-sign-usd"></em>
                    <div class="title"><strong>Daily Goals for MyMIGold:</strong></div>
                    <p>
                        Receives Rewards for completing your <a href="<?php echo site_url('Daily-Goals'); ?>">Daily Goals for MyMIGold</a>! 
                    </p>
                </div>
                <a href="<?php echo site_url('Budget/Income'); ?>" class="btn btn-icon btn-trigger me-n2"><em class="icon ni ni-forward-ios"></em></a>
                <!-- <a href="#budgeting-monthly-financial-overview" class="btn btn-icon btn-trigger me-n2"><em class="icon ni ni-forward-ios"></em></a> -->
            </div>
        </div><!-- .card-inner -->
        <div class="card-inner">
            <div class="nk-wg-action">
                <div class="nk-wg-action-content">
                    <em class="icon ni ni-wallet-in"></em>
                    <div class="title"><strong>Income YTD:</strong> <?php //echo $incomeYTDSummaryFMT; ?></div>
                    <p>
                        Manage your 
                        <a href="<?php echo site_url('Budget/Income'); ?>">Income Accounts</a> 
                        <!-- <a href="#budgeting-monthly-financial-overview">Income Accounts</a>  -->
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
                    <div class="title"><strong>Expenses YTD:</strong> <?php //echo $expenseYTDSummaryFMT; ?></div>
                    <p>
                        Manage your 
                        <a href="<?php echo site_url('Budget/Expenses'); ?>">Expense Accounts</a> 
                        <!-- <a href="#budgeting-monthly-financial-overview">Expense Accounts</a>  -->
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
                    <div class="title"><strong>Checking:</strong> <?php //echo $checkingSummaryFMT; ?></div>
                    <p>
                        Manage your 
                        <a href="<?php echo site_url('Wallets/Checking'); ?>">Checking Accounts</a> 
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
                    <div class="title"><strong>Credit Cards:</strong> <?php //echo $creditAvailableFMT . ' / <small>' . $creditLimitFMT . '</small>'; ?></div>
                    <p>
                        Manage your 
                        <a href="<?php echo site_url('/Wallets/Credit'); ?>">Credit</a> 
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
                    <div class="title"><strong>Debt:</strong> <?php //echo $debtSummaryFMT; ?></div>
                    <p>
                        Manage your 
                        <a href="<?php echo site_url('/Wallets/Debt'); ?>">Debt</a> 
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
                    <div class="title"><strong>Investments:</strong> <?php // echo $investSummaryFMT; ?></div>
                    <p>
                        Manage your 
                        Investments
                        <a href="<?php echo site_url('/Wallets/Investments'); ?>">Investments</a> 
                        to update your Retirement Financial Forecast.
                    </p>
                </div>
                <?php 
                // !! Pop Up Modal with Service Description // 
                ?>
                <a href="<?php echo site_url('/Wallets/Investments'); ?>" class="btn btn-icon btn-trigger me-n2"><em class="icon ni ni-forward-ios"></em></a>
            </div>
        </div><!-- .card-inner -->
        <?php 
        if ($investmentOperations === 1) {
        ?>    
        <div class="card-inner">
            <div class="nk-wg-action">
                <div class="nk-wg-action-content">
                    <em class="icon ni ni-activity"></em>
                    <div class="title">Retirement: <small>(**COMING SOON**)</small></div>
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
                <!-- <a href="#" class="btn btn-icon btn-trigger me-n2"><em class="icon ni ni-forward-ios"></em></a> -->
            </div>
        </div><!-- .card-inner -->
        <div class="card-inner">
            <div class="nk-wg-action">
                <div class="nk-wg-action-content">
                    <em class="icon ni ni-wallet-out"></em>
                    <div class="title">Investment Strategy <small>(**COMING SOON**)</small></div>
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
                <!-- <a href="#budgeting-monthly-financial-overview" class="btn btn-icon btn-trigger me-n2"><em class="icon ni ni-forward-ios"></em></a> -->
            </div>
        </div><!-- .card-inner -->
        <br>
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