<div class="nk-block">
    <div class="row gy-gs">
        <div class="col-md-12 mb-3">  
            <div class="nk-block">
                <div class="nk-block-head">
                    <div class="nk-block-between-md g-4">
                        <div class="nk-block-head-content">
                            <div class="nk-wgwh">
                                <em class="icon-circle icon-circle-lg icon ni ni-cc-alt2" style="margin-top: -35px;"></em>
                                <div class="nk-wgwh-title h5">
                                    <h2 class="nk-block-title fw-bold"><?php echo $accountTitle; ?></h2>
                                    <div class="nk-block-des">
                                        <p>
                                            <span class="d-block d-md-none">Review Account Details</span>
                                            <span class="d-none d-md-block">Review Your <?php echo $accountBankName; ?> Credit Card Information and Details</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="nk-block">
                <div class="nk-block-between-md g-4">
                    <div class="nk-block-content">
                        <div class="nk-wg1">
                            <div class="nk-wg1-group g-2">
                                <div class="nk-wg1-item mr-xl-4">
                                    <div class="nk-wg1-title text-soft">Available Balance</div>
                                    <div class="nk-wg1-amount">
                                        <div class="amount"><?php echo $accountAvailableBalance; ?> <small class="currency currency-usd">USD</small></div>
                                        <div class="amount-sm">
                                            Credit Limit <span><?php echo $accountCreditLimit; ?> <span class="currency currency-usd">USD</span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="nk-wg1-item">
                                    <div class="nk-wg1-title text-soft">Current Balance</div>
                                    <div class="nk-wg1-amount">
                                        <div class="amount"><?php echo $accountCurrentBalance; ?> <small class="currency currency-usd">USD</small></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nk-block-content">
                        <ul class="nk-block-tools gx-3">
                            <li class="btn-wrap dropdown">
                                <a class="btn btn-icon btn-xl btn-dark" style="color: white;" type="button" data-bs-toggle="modal" href="#accountSettingsModule"><em class="icon ni ni-setting"></em></a><span class="btn-extext">Account Settings</span>
                            </li>
                            <li class="btn-wrap">
                                <a href="<?php echo site_url('/Add-Credit-Payment/' . $accountID); ?>" class="btn btn-icon btn-xl btn-dark"><em class="icon ni ni-cc-alt2"></em></a><span class="btn-extext">Make Payment</span>
                            </li>
                            <li class="btn-wrap">
                                <a href="<?php echo site_url('/Credit-Card-Statement/' . $accountID); ?>" class="btn btn-icon btn-xl btn-dark"><em class="icon ni ni-books"></em></a><span class="btn-extext">View Statement</span>
                            </li>
                            <li class="btn-wrap">
                                <a href="<?php echo site_url('/Report-Lost-Card/' . $accountID); ?>" class="btn btn-icon btn-xl btn-primary"><em class="icon ni ni-alert-circle"></em></a><span class="btn-extext">Report Lost/Stolen Card</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="nk-block nk-block-lg pb-3">
                <div class="row g-gs">
                    <div class="col-md-6">
                        <div class="card card-bordered">
                            <div class="card-inner">
                                <div class="nk-wg5">
                                    <div class="nk-wg5-title"><h6 class="title overline-title">Recent Transactions</h6></div>
                                    <div class="nk-wg5-text pb-2">
                                        <div class="nk-wg5-amount">
                                            <div class="amount">5 <span class="currency currency-btc">Transactions</span></div>
                                        </div>
                                    </div>
                                    <div class="nk-wg5-foot">
                                        <a href="<?php echo site_url('/Credit-Transaction-History/' . $accountID); ?>" class="link">View All</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-bordered">
                            <div class="card-inner">
                                <div class="nk-wg5">
                                    <div class="nk-wg5-title"><h6 class="title overline-title">Payment Due Date</h6></div>
                                    <div class="nk-wg5-text pb-2">
                                        <div class="nk-wg5-amount">
                                            <div class="amount"><?php echo $paymentDueDate ?? date('m/d/Y'); ?> <span class="currency currency-usd"></span></div>
                                        </div>
                                    </div>
                                    <div class="nk-wg5-foot">
                                        <span class="text-soft">Minimum Due <strong><?php echo $minimumDue ?? '$0.00'; ?> USD</strong></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row gy-gs">
        <div class="col-md-12">
            <div class="nk-block">                                    
                <div class="card card-preview">
                    <div class="card-inner">     
                        <div class="nk-block-head-xs">
                            <div class="nk-block-head-content"><h5 class="nk-block-title title">Transaction History</h5></div>
                        </div>  
                        <div class="dt-bootstrap4 no-footer">
                            <div class="my-3">
                                <table class="table display" id="creditAccountTransactionHistory" role="grid" aria-describedby="DataTables_Table_0_info">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Description</th>
                                            <th>Amount</th>
                                            <th>Type</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Transactions will be loaded here dynamically -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
