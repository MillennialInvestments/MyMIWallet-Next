<div class="card card-bordered h-100">
    <div class="card-inner mb-n2">
        <div class="card-title-group">
            <div class="card-title card-title-sm">
                <h6 class="title">Last 5 Transactions</h6>
            </div>
            <div class="card-tools">
                <div class="drodown">
                    <a href="#" class="dropdown-toggle dropdown-indicator btn btn-sm btn-outline-light btn-white" data-bs-toggle="dropdown">30 Days</a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                        <ul class="link-list-opt no-bdr">
                            <li><a href="#"><span>7 Days</span></a></li>
                            <li><a href="#"><span>15 Days</span></a></li>
                            <li><a href="#"><span>30 Days</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="nk-tb-list is-loose">
            <div class="nk-tb-item nk-tb-head">
                <div class="nk-tb-col">
                    <span>Source Type</span>
                </div>
                <div class="nk-tb-col text-end">
                    <span>Name</span>
                </div>
                <div class="nk-tb-col">
                    <span>Net Amount</span>
                </div>
                <div class="nk-tb-col tb-col-sm text-end">
                    <span>YTD Summary</span>
                </div>
                <div class="nk-tb-col tb-col-sm text-end">
                    <span>% of Total <?php echo $accountType; ?></span>
                </div>
            </div>
            <?php         
            // log_message('info', 'history_overview - L40: $sourceRecords' . print_r($userSourceRecords, true));
            if (is_array($userSourceRecords) && !empty($userSourceRecords)) {
                foreach ($userSourceRecords as $sourceRecord) {
                    $sourceType = $sourceRecord['source_type'];
                    $sourceName = $sourceRecord['name'];
                    $netAmount = $sourceRecord['net_amount'];
                    $submittedOn = $sourceRecord['submitted_on'];

                    // Ensure $incomeYTDSummary or $expenseYTDSummary is an array before accessing it
                    if ($uri->getSegment(2) === 'Income') {
                        log_message('info', 'history_overview - L48: $getIncomeYTDSummary' . print_r($incomeYTDSummary, true));
                        // Check if $incomeYTDSummary is an array and has the expected data
                        if (is_array($incomeYTDSummary) && isset($incomeYTDSummary[0]['ytd_income'])) {
                            $yearToDateSummary = $incomeYTDSummary[0]['ytd_income'];
                        } else {
                            $yearToDateSummary = 0;
                        }
                    } elseif ($uri->getSegment(2) === 'Expenses') {
                        log_message('info', 'history_overview - L48: $getExpenseYTDSummary' . print_r($expenseYTDSummary, true));
                        // Check if $expenseYTDSummary is an array and has the expected data
                        if (is_array($expenseYTDSummary) && isset($expenseYTDSummary[0]['ytd_expense'])) {
                            $yearToDateSummary = $expenseYTDSummary[0]['ytd_expense'];
                        } else {
                            $yearToDateSummary = 0;
                        }
                    }

                    if ($netAmount > 0 && $yearToDateSummary != 0) {
                        $percentage = ($netAmount / $yearToDateSummary) * 100;
                    } else {
                        $percentage = 0; 
                    }                    

                    echo '<div class="nk-tb-item">
                            <div class="nk-tb-col">
                                <div class="icon-text">
                                    <em class="text-primary icon ni ni-money"></em>
                                    <span class="tb-lead">' . $sourceType . '</span>
                                </div>
                            </div>
                            <div class="nk-tb-col text-end">
                                <span class="tb-sub tb-amount"><span>' . $sourceName . '</span></span>
                            </div>
                            <div class="nk-tb-col text-end">
                                <span class="tb-sub tb-amount"><span>$' . $netAmount . '</span></span>
                            </div>
                            <div class="nk-tb-col tb-col-sm text-end">
                                <span class="tb-sub">$' . number_format(abs($yearToDateSummary), 2) . '</span>
                            </div>
                            <div class="nk-tb-col">
                                <div class="progress progress-md progress-alt bg-transparent">
                                    <div class="progress-bar" data-progress="' . $percentage . '" style="width: ' . $percentage . '%;"></div>
                                    <div class="progress-amount">' . number_format(abs($percentage), 2) . '%</div>
                                </div>
                            </div>
                        </div>';
                }
            } else {
                echo '<div class="nk-tb-item"><div class="nk-tb-col"><span>No records found.</span></div></div>';
            }
            ?>

        </div>
    </div>
</div>
