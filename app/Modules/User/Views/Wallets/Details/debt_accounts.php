<div class="nk-block">
    <div class="row gy-gs">
        <div class="col-md-12 mb-3">  
            <div class="nk-block">
                <div class="nk-block-head">
                    <div class="nk-block-between-md g-4">
                        <div class="nk-block-head-content">
                            <div class="nk-wgwh">
                                <em class="icon-circle icon-circle-lg icon ni ni-wallet-out" style="margin-top: -35px;"></em>
                                <div class="nk-wgwh-title h5">
                                    <h2 class="nk-block-title fw-bold"><?php echo $accountTitle; ?></h2>
                                    <div class="nk-block-des">
                                        <p>
                                            <span class="d-block d-md-none">Review Account Details</span>
                                            <span class="d-none d-md-block">Review Your <?php echo $accountDebtor; ?> Debt Account Information and Details</span>
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
                                    <div class="nk-wg1-title text-soft">Current Balance</div>
                                    <div class="nk-wg1-amount">
                                        <div class="amount"><?php echo '$' . number_format($accountCurrentBalance,2); ?> <small class="currency currency-usd">USD</small></div>
                                    </div>
                                </div>
                                <div class="nk-wg1-item">
                                    <div class="nk-wg1-title text-soft">Monthly Payment</div>
                                    <div class="nk-wg1-amount">
                                        <div class="amount"><?php echo $accountMonthlyPayment ?? '$0.00'; ?> <small class="currency currency-usd">USD</small></div>
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
                                <a href="<?php echo site_url('/Make-Debt-Payment/' . $accountID); ?>" class="btn btn-icon btn-xl btn-dark"><em class="icon ni ni-wallet-out"></em></a><span class="btn-extext">Make Payment</span>
                            </li>
                            <li class="btn-wrap">
                                <a href="<?php echo site_url('/Debt-Payment-History/' . $accountID); ?>" class="btn btn-icon btn-xl btn-dark"><em class="icon ni ni-repeat"></em></a><span class="btn-extext">Payment History</span>
                            </li>
                            <li class="btn-wrap">
                                <a href="<?php echo site_url('/Negotiate-Debt/' . $accountID); ?>" class="btn btn-icon btn-xl btn-primary"><em class="icon ni ni-talk"></em></a><span class="btn-extext">Negotiate Debt</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="nk-block nk-block-lg pb-3">
                <div class="row g-gs">
                    <div class="col-md-12">
                        <div class="card card-bordered">
                            <div class="card-inner">
                                <div class="nk-wg5">
                                    <div class="nk-wg5-title"><h6 class="title overline-title">Due Next Payment</h6></div>
                                    <div class="nk-wg5-text pb-2">
                                        <div class="nk-wg5-amount">
                                            <div class="amount"><?php echo $nextPaymentDue ?? '$0.00'; ?> <small class="currency currency-usd">USD</small></div>
                                        </div>
                                    </div>
                                    <div class="nk-wg5-foot">
                                        <span class="text-soft">Due Date <strong><?php echo $nextPaymentDate ?? date('m-d-Y'); ?></strong></span>
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
                            <div class="nk-block-head-content"><h5 class="nk-block-title title">Payment History</h5></div>
                        </div>  
                        <div class="dt-bootstrap4 no-footer">
                            <div class="my-3">
                                <table class="table display" id="debtAccountPaymentHistory" role="grid" aria-describedby="DataTables_Table_0_info">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Amount</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Payments will be loaded here dynamically -->
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
