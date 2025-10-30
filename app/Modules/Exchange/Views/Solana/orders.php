<?php 
// $cuSolanaDefaultWallet = $userSolana['cuSolanaDefaultWallet']; 
// $cuSolanaTransactions = $userSolana['cuSolanaTransactions']; 
// $cuSolanaDW = $cuSolanaDefaultWallet; 
// $cuSolanaTotal = 0; 
// $cuSolanaValue = 0; 
// $solanaPrice = 0; 
?>
<div class="modal-header">
    <h3 class="modal-title" id="useCoinModalLabel">Activity & Transactions</h3>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="nk-block nk-block-lg">
        <div class="card card-stretch">
            <div class="card-inner-group">
                <div class="card-inner">
                    <div class="card-title-group">
                        <div class="card-title">
                            <h5 class="title">All Orders</h5>
                        </div>
                        <div class="card-tools me-n1">
                            <ul class="btn-toolbar gx-1">
                                <li>
                                    <a href="#" class="search-toggle toggle-search btn btn-icon" data-bs-target="search"><em class="icon ni ni-search"></em></a>
                                </li><!-- li -->
                                <li class="btn-toolbar-sep"></li><!-- li -->
                                <li>
                                    <div class="dropdown">
                                        <a href="#" class="btn btn-trigger btn-icon dropdown-toggle" data-bs-toggle="dropdown">
                                            <div class="badge badge-circle bg-primary">4</div>
                                            <em class="icon ni ni-filter-alt"></em>
                                        </a>
                                        <div class="filter-wg dropdown-menu dropdown-menu-xl dropdown-menu-end">
                                            <div class="dropdown-head">
                                                <span class="sub-title dropdown-title">Advance Filter</span>
                                                <div class="dropdown">
                                                    <a href="#" class="link link-light">
                                                        <em class="icon ni ni-more-h"></em>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="dropdown-body dropdown-body-rg">
                                                <div class="row gx-6 gy-4">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label class="overline-title overline-title-alt">Type</label>
                                                            <select class="form-select js-select2">
                                                                <option value="any">Any Type</option>
                                                                <option value="deposit">Deposit</option>
                                                                <option value="buy">Buy Coin</option>
                                                                <option value="sell">Sell Coin</option>
                                                                <option value="transfer">Transfer</option>
                                                                <option value="withdraw">Withdraw</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label class="overline-title overline-title-alt">Status</label>
                                                            <select class="form-select js-select2">
                                                                <option value="any">Any Status</option>
                                                                <option value="pending">Pending</option>
                                                                <option value="cancel">Cancel</option>
                                                                <option value="process">Process</option>
                                                                <option value="completed">Completed</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label class="overline-title overline-title-alt">Pay Currency</label>
                                                            <select class="form-select js-select2">
                                                                <option value="any">Any Coin</option>
                                                                <option value="bitcoin">Bitcoin</option>
                                                                <option value="ethereum">Ethereum</option>
                                                                <option value="litecoin">Litecoin</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label class="overline-title overline-title-alt">Method</label>
                                                            <select class="form-select js-select2">
                                                                <option value="any">Any Method</option>
                                                                <option value="paypal">PayPal</option>
                                                                <option value="bank">Bank</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <div class="custom-control custom-control-sm custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="includeDel">
                                                                <label class="custom-control-label" for="includeDel"> Including Deleted</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <button type="button" class="btn btn-secondary">Filter</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-foot between">
                                                <a class="clickable" href="#">Reset Filter</a>
                                                <a href="#savedFilter" data-bs-toggle="modal">Save Filter</a>
                                            </div>
                                        </div><!-- .filter-wg -->
                                    </div><!-- .dropdown -->
                                </li><!-- li -->
                                <li>
                                    <div class="dropdown">
                                        <a href="#" class="btn btn-trigger btn-icon dropdown-toggle" data-bs-toggle="dropdown">
                                            <em class="icon ni ni-setting"></em>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-xs dropdown-menu-end">
                                            <ul class="link-check">
                                                <li><span>Show</span></li>
                                                <li class="active"><a href="#">10</a></li>
                                                <li><a href="#">20</a></li>
                                                <li><a href="#">50</a></li>
                                            </ul>
                                            <ul class="link-check">
                                                <li><span>Order</span></li>
                                                <li class="active"><a href="#">DESC</a></li>
                                                <li><a href="#">ASC</a></li>
                                            </ul>
                                        </div>
                                    </div><!-- .dropdown -->
                                </li><!-- li -->
                            </ul><!-- .btn-toolbar -->
                        </div><!-- .card-tools -->
                        <div class="card-search search-wrap" data-search="search">
                            <div class="search-content">
                                <a href="#" class="search-back btn btn-icon toggle-search" data-bs-target="search"><em class="icon ni ni-arrow-left"></em></a>
                                <input type="text" class="form-control border-transparent form-focus-none" placeholder="Quick search by transaction">
                                <button class="search-submit btn btn-icon"><em class="icon ni ni-search"></em></button>
                            </div>
                        </div><!-- .card-search -->
                    </div><!-- .card-title-group -->
                </div><!-- .card-inner -->
                <div class="card-inner p-0">
                    <div class="nk-tb-list nk-tb-tnx">
                    <table class="table" id="cuSolanaOrdersTable">
                        <thead class="nk-tb-item nk-tb-head">
                            <tr>
                                <th class="nk-tb-col"><span>Signature</span></th>
                                <th class="nk-tb-col tb-col-xxl"><span>Slot</span></th>
                                <th class="nk-tb-col tb-col-lg"><span>Block Time</span></th>
                                <th class="nk-tb-col text-end"><span>Confirmation Status</span></th>
                                <th class="nk-tb-col nk-tb-col-tools"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if ($siteSettings->debug === 1) {
                                log_message('debug', 'Views\Solana\orders L164 - $cryptoAccount: ' . print_r($cryptoAccount, true));
                                log_message('debug', 'Views\Solana\orders L164 - $cryptoTransactions: ' . print_r($cryptoTransactions, true));
                            }; 
                            ?>
                            <?php foreach ($cryptoTransactions as $transaction) : ?>
                            <tr class="nk-tb-item">
                                <td class="nk-tb-col">
                                    <div class="nk-tnx-type">
                                        <div class="nk-tnx-type-icon bg-success-dim text-success">
                                            <em class="icon ni ni-arrow-up-right"></em>
                                        </div>
                                        <div class="nk-tnx-type-text">
                                            <span class="tb-lead"><?= $transaction['signature'] ?></span>
                                            <span class="tb-date"><?= date('d/m/Y H:i:s', $transaction['blockTime']) ?></span>
                                        </div>
                                    </div>
                                </td>
                                <td class="nk-tb-col tb-col-xxl">
                                    <span class="tb-lead-sub"><?= $transaction['slot'] ?></span>
                                </td>
                                <td class="nk-tb-col tb-col-lg">
                                    <span class="tb-lead-sub"><?= date('d/m/Y H:i:s', $transaction['blockTime']) ?></span>
                                </td>
                                <td class="nk-tb-col text-end">
                                    <span class="tb-amount"><?= $transaction['confirmationStatus'] ?></span>
                                </td>
                                <td class="nk-tb-col nk-tb-col-tools">
                                    <ul class="nk-tb-actions gx-2">
                                        <li class="nk-tb-action-hidden">
                                            <a href="#" class="bg-white btn btn-sm btn-outline-light btn-icon" data-bs-toggle="tooltip" data-bs-placement="top" title="Approve"><em class="icon ni ni-done"></em></a>
                                        </li>
                                        <li class="nk-tb-action-hidden">
                                            <a href="#tranxDetails" data-bs-toggle="modal" class="bg-white btn btn-sm btn-outline-light btn-icon btn-tooltip" title="Details"><em class="icon ni ni-eye"></em></a>
                                        </li>
                                        <li>
                                            <div class="dropdown">
                                                <a href="#" class="dropdown-toggle bg-white btn btn-sm btn-outline-light btn-icon" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <ul class="link-list-opt">
                                                        <li><a href="#"><em class="icon ni ni-done"></em><span>Approve</span></a></li>
                                                        <li><a href="#"><em class="icon ni ni-cross-round"></em><span>Reject</span></a></li>
                                                        <li><a href="#"><em class="icon ni ni-repeat"></em><span>Check</span></a></li>
                                                        <li><a href="#tranxDetails" data-bs-toggle="modal"><em class="icon ni ni-eye"></em><span>View Details</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    </div><!-- .nk-tb-list -->
                </div><!-- .card-inner -->

                <div class="card-inner">
                    <ul class="pagination justify-content-center justify-content-md-start">
                        <li class="page-item"><a class="page-link" href="#">Prev</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><span class="page-link"><em class="icon ni ni-more-h"></em></span></li>
                        <li class="page-item"><a class="page-link" href="#">6</a></li>
                        <li class="page-item"><a class="page-link" href="#">7</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </div><!-- .card-inner -->
            </div><!-- .card-inner-group -->
        </div><!-- .card -->
    </div>
</div>