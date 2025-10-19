<?php
echo '
<div class="col-xxl-3 col-lg-4 col-sm-6 mt-3">
	<div class="card card-bordered">
		<div class="nk-wgw">
			<div class="nk-wgw-inner">
				<a class="nk-wgw-name" href="' . site_url('Wallets/Debt/Details/' . $accountID) . '">
					<div class="nk-wgw-icon is-default"><i class="icon ni ni-wallet"></i></div>
					<h5 class="nk-wgw-title title">' . $accountBankName . ' - ' . $accountName . '</h5>
				</a>
				<div class="nk-wgw-balance">
					<div class="amount">$' . number_format((float)str_replace(',', '', $accountBalance ?? 0), 2) . '<span class="currency currency-usd">USD</span></div>
					<div class="amount-sm">
						<span class="currency currency-usd">USD</span>
					</div>
				</div>
			</div>
			<div class="nk-wgw-actions">
                <ul class="vertical-divider">
					<li class="' . $btnSizing . '">
						<a href="' . site_url('Wallets/Debt/Details/' . $accountID) . '"><i class="icon ni ni-list-index mr-1"></i> <span>Details</span></a>
					</li>
					<li class="' . $btnSizing . '">
                        <button class="btn dynamicModalLoader" data-formtype="Edit" data-endpoint="' . $btnID . '" data-accountid="' . $accountID . '"><i class="icon ni ni-pen"></i> <span style="padding-top: 2px; padding-left: 5px;">Edit</span></button>
					</li>
					<li class="' . $btnSizing . '">
                        <a href="#" class="delete-wallet-button" data-id="' . $accountID . '" data-name="' . $accountName . '" data-type="Debt" data-bs-toggle="modal" data-bs-target="#deleteWalletModal" onclick="openDeleteModal(event)">
                            <i class="icon ni ni-minus mr-1"></i> <span>Delete</span>
                        </a>
					</li>
				</ul>
			</div>
            <div class="nk-wgw-more dropdown">
                <button type="button" class="btn btn-icon btn-trigger dropdown-toggle"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon ni ni-more-h full-width"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-xs dropdown-menu-right">
                    <a class="dropdown-item" href="' . site_url('/Budget/Details/' . $accountID) . '">Details</a>
                    <a class="dropdown-item" href="' . site_url('/Budget/Edit/' . $accountID) . '">Edit</a>
                    <a class="dropdown-item" href="' . site_url('/Budget/Delete-Account/' . $accountID) . '">Delete</a>
                </div>
            </div>
		</div>
	</div>
</div> 
';
?>
