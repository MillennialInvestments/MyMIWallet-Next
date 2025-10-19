<?php
echo '
<div class="col-md-6 col-lg-4 mt-3">
	<div class="card card-bordered">
		<div class="nk-wgw">
			<div class="nk-wgw-inner">
				<a class="nk-wgw-name" href="' . site_url('/MyMI-Wallet') . '">
					<div class="nk-wgw-icon is-default"><i class="icon-wallet"></i></div>
					<h5 class="nk-wgw-title title">' . $walletNickname . '</h5>
				</a>
				<div class="nk-wgw-balance">
					<div class="amount">$' . number_format($walletFunds, 2) . '<span class="currency currency-usd">USD</span></div>
					<div class="amount-sm">
						' . $walletGains . '<span class="currency currency-usd">USD</span>
					</div>
				</div>
			</div>
			<div class="nk-wgw-actions">
				<ul>
					<li>
						<a class="depositFundsBtn" href="#" data-bs-toggle="modal" data-bs-target="#transactionModal"><i class="icon icon-arrow-up"></i> <span>Deposit Funds</span></a>
					</li>
					<li>
						<a class="withdrawFundsBtn" href="#" data-bs-toggle="modal" data-bs-target="#transactionModal"><em class="icon icon-arrow-down"></em><span>Withdraw Funds</span></a>
					</li>
				</ul>
			</div>
			<div class="nk-wgw-more dropdown">
				<a href="#" class="btn btn-icon btn-trigger" data-bs-toggle="dropdown"><i class="icon-options full-width"></i></a>
				<div class="dropdown-menu dropdown-menu-xs dropdown-menu-right">
					<ul class="link-list-plain sm">
						<li><a href="' . site_url('/MyMI-Wallet') . '">Details</a></li>   
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
	';
?>


