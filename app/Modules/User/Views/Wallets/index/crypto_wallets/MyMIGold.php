<?php
echo '
<div class="col-xxl-3 col-lg-4 col-sm-6 mt-3">
	<div class="card card-bordered">
		<div class="nk-wgw">
			<div class="nk-wgw-inner">
				<a class="nk-wgw-name" href="' . site_url('/MyMI-Wallet') . '">
					<div class="nk-wgw-icon is-default"><i class="icon ni ni-wallet"></i></div>
					<h5 class="nk-wgw-title title">' . $walletTitle . '</h5>
				</a>
				<div class="nk-wgw-balance">
					<div class="amount">$' . number_format((float)$walletFunds ?? 0, 2) . '<span class="currency currency-usd">USD</span></div>
					<div class="amount-sm">
						' . $walletCoins . '<span class="currency currency-usd">Gold</span>
                         <a class="currency currency-usd dynamicModalLoader" data-formtype="Purchase" data-endpoint="purchasePaypal" href="#"><span class="nk-menu-text">Purchase</span></a>
					</div>
				</div>
			</div>
			<div class="nk-wgw-actions">
            <ul class="vertical-divider">
					<li class="' . $btnSizing . '">
						<a href="' . site_url('Wallets/Crypto/Details/' . $accountID) . '"><i class="icon ni ni-list-index mr-1"></i> <span>Details</span></a>
					</li>
					<li class="' . $btnSizing . '">
                    <button class="btn dynamicModalLoader" data-formtype="Edit" data-endpoint="' . $btnID . '" data-accountid="' . $accountID . '"><i class="icon ni ni-pen"></i> <span style="padding-top: 2px; padding-left: 5px;">Edit</span></button>
					</li>
					<li class="' . $btnSizing . '">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#deleteWalletModal' . $accountID . '"><i class="icon ni ni-cross mr-1"></i> <span>Delete</span></a>
					</li>
				</ul>
			</div>
			<div class="nk-wgw-more dropdown">
                <a href="#" class="btn btn-icon btn-trigger" data-bs-toggle="dropdown">
                    <i class="icon ni ni-more-h full-width"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-xs dropdown-menu-end">
                    <ul class="link-list-plain sm">
                        <li><a href="' . site_url('Wallets/Crypto/Details/' . $accountID) . '">Details</a></li>   
                        <li><a href="' . site_url('/Wallets/Crypto/Edit/Account/' . $walletID) . '">Edit</a></li>
                        <li><a href="#" data-bs-toggle="modal" data-bs-target="#deleteWalletModal' . $accountID . '">Delete</a></li>
                    </ul>
                </div>
            </div>
		</div>
	</div>
</div> 
';
?>


