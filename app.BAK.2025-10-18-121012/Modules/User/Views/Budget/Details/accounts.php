<div class="nk-block">
	<div class="row gy-gs">
		<div class="col-md-12 mb-3">  
			<div class="nk-block">
				<div class="nk-block-head">
					<?php //echo theme_view('navigation_breadcrumbs'); ?>
					<div class="nk-block-between-md g-4">
						<div class="nk-block-head-content">
							<div class="nk-wgwh">
								<em class="icon-circle icon-circle-lg icon ni ni-sign-usd" style="margin-top: -35px;"></em>
								<div class="nk-wgwh-title h5">
									<h2 class="nk-block-title fw-bold myfs-md"><?php echo $recordName; ?></h2>
									<div class="nk-block-des">
										<p class="sub-text">View Your Financial Growths</p>
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
										<div class="amount">$<?php echo $recordBalance; ?> <small class="currency currency-usd">USD</small></div>
										<div class="amount-sm">
											Source: <span><?php echo $recordSource; ?></span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="nk-block-content">
						<ul class="nk-block-tools gx-3">
							<li class="btn-wrap">
								<a href="<?php echo site_url('/Budget/Add/' . $recordType); ?>" class="btn btn-icon btn-lg btn-success"><em class="icon ni ni-plus"></em></a><span class="btn-extext">Add</span>
							</li>
							<li class="btn-wrap">
								<a href="<?php echo site_url('/Budget/Delete-Account/' . $recordID); ?>" class="btn btn-icon btn-lg btn-danger"><em class="icon ni ni-cross"></em></a><span class="btn-extext">Delete</span>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
        <div class="col-md-12">
            <div class="card card-bordered h-100">
                <div class="card-inner-group">
                    <div class="card-inner card-inner-md">
                        <div class="card-title-group">
                            <div class="card-title">
                                <h6 class="title">Account Overview</h6>
                            </div>
                            <div class="card-tools me-n1">
                                <!-- <a class="btn btn-success text-white" href="<?php //echo site_url('/Budget/Approve-Recurring-Schedule/' . $recordID); ?>">Approve</a>
                                <a class="btn btn-danger text-white" href="<?php //echo site_url('/Budget/Cancel-Account/' . $recordID); ?>">Cancel</a> -->
                            </div>
                        </div>
                    </div><!-- .card-inner -->
                    <div class="card-inner">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th>Account Name:</th>
                                    <td><?= $recordName; ?></td>
                                </tr>
                                <tr>
                                    <th>Account Type:</th>
                                    <td><?= $recordType; ?></td>
                                    <th>Account Source:</th>
                                    <td><?= $recordSource; ?></td>
                                </tr>
                                <tr>
                                    <th>Recurring:</th>
                                    <td><?= $recordRecAccount; ?></td>
                                    <th>Recurring Cycle:</th>
                                    <td><?= $recordIntervals; ?></td>
                                </tr>
                                <tr>
                                    <th>Date Due:</th>
                                    <td><?= $recordDesDate; ?></td>
                                    <th>Amount Due:</th>
                                    <td>$<?= $recordBalance; ?></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td><a class="btn btn-success text-white" href="<?php echo site_url('Budget/Edit/' . $recordID); ?>">Edit</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
		<!-- <div class="col-md-12">
			<div class="nk-block nk-block-lg pb-3">
				<div class="row g-gs">
					<div class="col-md-4">
						<div class="card card-bordered">
							<div class="card-inner">
								<div class="nk-wg5">
									<div class="nk-wg5-title"><h6 class="title overline-title myfs-xs">Total Gains/Losses</h6></div>
									<div class="nk-wg5-text">
										<div class="nk-wg5-amount">
											<div class="amount"><?php //echo $walletGains; ?> <span class="currency currency-btc">USD</span></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card card-bordered">
							<div class="card-inner">
								<div class="nk-wg5">
									<div class="nk-wg5-title"><h6 class="title overline-title myfs-xs">Total Trades</h6></div>
									<div class="nk-wg5-text">
										<div class="nk-wg5-amount">
											<div class="amount"><?php //echo $totalTrades; ?> <span class="currency currency-btc">Trades</span></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card card-bordered">
							<div class="card-inner">
								<div class="nk-wg5">
									<div class="nk-wg5-title"><h6 class="title overline-title myfs-xs">Deposits/Withdraw</h6></div>
									<div class="nk-wg5-text">
										<div class="nk-wg5-amount">
											<div class="amount"><?php //echo $transferBalance; ?> <span class="currency currency-btc">USD</span></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> -->
	</div>
    <?php 
    if ($uri->getSegment(2) === 'Details') {
    ?>
	<div class="row gy-gs pt-3">
		<div class="col-md-12">
			<div class="nk-block">	  									
                <div class="card card-bordered card-preview">
                    <div class="card-inner">     
                        <div class="nk-block-head-xs">
                            <div class="nk-block-head-content">
                                <h5 class="nk-block-title title"><?php echo $recordName; ?></h5>
                                <p class="card-description">Related Records</p>
                            </div>
                        </div>	
                        <div class="dt-bootstrap4 no-footer">
                            <div class="my-3">
                                <table class="table display" id="userBudgetDetailsDatatable" role="grid" aria-describedby="DataTables_Table_0_info">
                                    <thead>
                                        <?php
                                        if ($userAgent->isMobile()) {
                                            echo '
                                            <tr>
                                                <th class="d-none"></th>
                                                <th>Account</th>
                                                <th>Amount</th>
                                                <th>Subtotal</th>
                                            </tr>';
                                        } elseif ($userAgent->isBrowser()) {
                                            echo '<tr>
                                                <th class="d-none"></th>
                                                <th>Due Date</th>
                                                <th>Account</th>
                                                <th>Source</th>
                                                <th>Amount</th>
                                                <th>Subtotal</th>
                                                <th>Actions</th>
                                            </tr>';
                                        }
                                        ?>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // Initialize a variable to keep track of the running subtotal
                                        $runningSubtotal = 0.0;
                                        // print_r($budgetRelatedRecords); 
                                        foreach ($budgetRelatedRecords as $relatedRecords) {
                                            // Calculate running subtotal based on account type
                                            if ($relatedRecords['account_type'] === 'Income') {
                                                $accountNetAmount = (float)$relatedRecords['net_amount'];
                                            } elseif ($relatedRecords['account_type'] === 'Expense') {
                                                $accountNetAmount = -(float)$relatedRecords['net_amount'];
                                            }

                                            // Update the running subtotal
                                            $runningSubtotal += $accountNetAmount;

                                            // Check paid status and adjust running subtotal accordingly
                                            if ($relatedRecords['paid'] == 0) {
                                                $accountPaidStatus = '<a href="' . site_url('Budget/Status/Paid/' . $relatedRecords['id']) . '"><i class="icon myfs-md ni ni-check-thick"></i></a>';
                                                // $runningSubtotal += $accountNetAmount;
                                            } else {
                                                $accountPaidStatus = '<a class="statusGreen" href="' . site_url('Budget/Status/Unpaid/' . $relatedRecords['id']) . '"><i class="icon myfs-md ni ni-check-thick"></i></a>';
                                                // $runningSubtotal += 0;
                                            }
                                            // Format the running subtotal for display
                                            $sumDisplay = number_format($runningSubtotal, 2);
                                            if ($runningSubtotal < 0) {
                                                $sumDisplay = '<span class="statusRed">$' . $sumDisplay . '</span>';
                                            } else {
                                                $sumDisplay = '$' . $sumDisplay;
                                            }

                                            // Format Paid Status

                                            // Output the row including the running subtotal
                                            echo '<tr>
                                                <td class="d-none">' . date("Y-m-d", strtotime($relatedRecords['year'] . '-' . $relatedRecords['month'] . '-' . $relatedRecords['day'])) . '</td>
                                                <td>' . date("F jS, Y", strtotime($relatedRecords['year'] . '-' . $relatedRecords['month'] . '-' . $relatedRecords['day'])) . '</td>
                                                <td><a href="' . site_url('Budget/Details/' . $relatedRecords['id']) . '">' . $relatedRecords['name'] . '</a></td>
                                                <td>' . $relatedRecords['source_type'] . '</td>
                                                <td>' . number_format($accountNetAmount,2) . '</td>
                                                <td>' . $sumDisplay . '</td>
                                                <td>
                                                    ' . $accountPaidStatus . '
                                                    <a href="' . site_url('Budget/Edit/' . $relatedRecords['id']) . '"><i class="icon  myfs-md ni ni-edit"></i></a>
                                                    <a href="' . site_url('Budget/Copy/' . $relatedRecords['id']) . '"><i class="icon  myfs-md ni ni-copy"></i></a>
                                                    <a class="text-red" href="' . site_url('Budget/Delete-Account/' . $relatedRecords['id']) . '"><i class="icon myfs-md ni ni-trash"></i></a>
                                                </td>
                                            </tr>';
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>
    <script <?= $nonce['script'] ?? '' ?>>
        $(document).ready(function() {
            $("#userBudgetDetailsDatatable").DataTable({
                "order": [[ 0, "des" ]],     
                "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
            });
        });
    </script>
    <?php
    }
    ?>
</div>