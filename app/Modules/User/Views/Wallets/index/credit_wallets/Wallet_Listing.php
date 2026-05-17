<!-- app/Modules/User/Views/Wallets/index/credit_wallets/Wallet_Listing.php -->
<?php
$accountInfo = is_array($accountInfo ?? null) ? $accountInfo : [];
$childAccountId = (int) ($accountID ?? ($accountInfo['id'] ?? 0));
$parentWalletId = (int) ($walletID ?? ($accountInfo['wallet_id'] ?? 0));
$deleteTargetId = $parentWalletId > 0 ? $parentWalletId : $childAccountId;
$deleteName     = (string) (
    $accountName
    ?? $accountInfo['nickname']
    ?? $accountInfo['label']
    ?? $accountInfo['bank_name']
    ?? 'Credit Wallet'
);
echo '
<div class="col-xxl-3 col-lg-4 col-sm-6 mt-3">
    <div class="card card-bordered">
        <div class="nk-wgw">
            <div class="nk-wgw-inner">
                <a class="nk-wgw-name" href="' . site_url('Wallets/Credit/Details/' . $childAccountId) . '">
                    <div class="nk-wgw-icon is-default"><i class="icon ni ni-wallet"></i></div>';

if (!empty($accountStatus) && (int) $accountStatus === 2) {
    echo '<h5 class="nk-wgw-title title">' . esc($accountBankName ?? '') . ' - ' . esc($accountName ?? '') . ' <small>(Closed)</small></h5>';
} else {
    echo '<h5 class="nk-wgw-title title">' . esc($accountBankName ?? '') . ' - ' . esc($accountName ?? '') . '</h5>';
}

echo '
                </a>
                <div class="nk-wgw-balance">
                    <div class="amount">$' . number_format((float) str_replace(',', '', $accountBalance ?? 0), 2) . '<span class="currency currency-usd">USD</span></div>
                    <div class="amount-sm">
                        <span class="currency currency-usd">USD</span>
                    </div>
                </div>
            </div>

            <div class="nk-wgw-actions">
                <ul class="vertical-divider">
                    <li class="' . esc($btnSizing ?? '') . '">
                        <a href="' . site_url('Wallets/Credit/Details/' . $childAccountId) . '">
                            <i class="icon ni ni-list-index mr-1"></i> <span>Details</span>
                        </a>
                    </li>
                    <li class="' . esc($btnSizing ?? '') . '">
                        <button class="btn dynamicModalLoader"
                                data-formtype="Wallets"
                                data-endpoint="' . esc($btnID ?? 'editCreditAccount') . '"
                                data-accountid="' . esc($childAccountId) . '">
                            <i class="icon ni ni-pen"></i>
                            <span style="padding-top: 2px; padding-left: 5px;">Edit</span>
                        </button>
                    </li>
                    <li class="' . esc($btnSizing ?? '') . '">
                        <a href="#"
                           class="dynamicModalLoader delete-wallet-button"
                           data-id="' . esc($deleteTargetId) . '"
                           data-wallet-id="' . esc($deleteTargetId) . '"
                           data-formtype="Wallets"
                           data-endpoint="deleteWallet"
                           data-accountid="' . esc($deleteTargetId) . '"
                           data-account-id="' . esc($childAccountId) . '"
                           data-name="' . esc($deleteName) . '"
                           data-type="Credit"
                           data-category="Credit">
                            <i class="icon ni ni-minus mr-1"></i> <span>Delete</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="nk-wgw-more dropdown">
                <a href="#" class="btn btn-icon btn-trigger" data-bs-toggle="dropdown">
                    <i class="icon ni ni-more-h full-width"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-xs dropdown-menu-right">
                    <ul class="link-list-plain sm">
                        <li>
                            <a href="' . site_url('Wallets/Credit/Details/' . $childAccountId) . '">Details</a>
                        </li>
                        <li>
                            <a href="#"
                               class="dynamicModalLoader"
                               data-formtype="Wallets"
                               data-endpoint="' . esc($btnID ?? 'editCreditAccount') . '"
                               data-accountid="' . esc($childAccountId) . '">Edit</a>
                        </li>
                        <li>
                            <a href="#"
                               class="dynamicModalLoader delete-wallet-button"
                               data-id="' . esc($deleteTargetId) . '"
                               data-wallet-id="' . esc($deleteTargetId) . '"
                               data-formtype="Wallets"
                               data-endpoint="deleteWallet"
                               data-accountid="' . esc($deleteTargetId) . '"
                               data-account-id="' . esc($childAccountId) . '"
                               data-name="' . esc($deleteName) . '"
                               data-type="Credit"
                               data-category="Credit">Delete</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
';
?>
