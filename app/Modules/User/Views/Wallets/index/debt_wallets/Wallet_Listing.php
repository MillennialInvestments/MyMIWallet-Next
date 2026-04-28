<!-- app/Modules/User/Views/Wallets/index/debt_wallets/Wallet_Listing.php -->
<?php
$accountInfo = is_array($accountInfo ?? null) ? $accountInfo : [];
$childAccountId = (int) ($accountID ?? ($accountInfo['id'] ?? 0));
$parentWalletId = (int) ($walletID ?? ($accountInfo['wallet_id'] ?? 0));
$deleteTargetId = $parentWalletId > 0 ? $parentWalletId : $childAccountId;
$deleteName     = (string) (
    $accountName
    ?? $accountInfo['nickname']
    ?? $accountInfo['label']
    ?? $accountInfo['debtor']
    ?? 'Debt Wallet'
);

echo '
<div class="col-xxl-3 col-lg-4 col-sm-6 mt-3">
    <div class="card card-bordered">
        <div class="nk-wgw">
            <div class="nk-wgw-inner">
                <a class="nk-wgw-name" href="' . site_url('Wallets/Debt/Details/' . $childAccountId) . '">
                    <div class="nk-wgw-icon is-default"><i class="icon ni ni-wallet"></i></div>
                    <h5 class="nk-wgw-title title">' . esc($accountBankName ?? '') . ' - ' . esc($accountName ?? '') . '</h5>
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
                        <a href="' . site_url('Wallets/Debt/Details/' . $childAccountId) . '">
                            <i class="icon ni ni-list-index mr-1"></i> <span>Details</span>
                        </a>
                    </li>
                    <li class="' . esc($btnSizing ?? '') . '">
                        <button class="btn dynamicModalLoader"
                                data-formtype="Edit"
                                data-endpoint="' . esc($btnID ?? 'editDebtAccount') . '"
                                data-accountid="' . esc($childAccountId) . '">
                            <i class="icon ni ni-pen"></i>
                            <span style="padding-top: 2px; padding-left: 5px;">Edit</span>
                        </button>
                    </li>
                    <li class="' . esc($btnSizing ?? '') . '">
                        <a href="#"
                           class="delete-wallet-button"
                           data-id="' . esc($deleteTargetId) . '"
                           data-wallet-id="' . esc($deleteTargetId) . '"
                           data-account-id="' . esc($childAccountId) . '"
                           data-name="' . esc($deleteName) . '"
                           data-type="Debt"
                           data-bs-toggle="modal"
                           data-bs-target="#deleteWalletModal"
                           onclick="openDeleteModal(event)">
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
                    <a class="dropdown-item" href="' . site_url('Wallets/Debt/Details/' . $childAccountId) . '">Details</a>
                    <a class="dropdown-item dynamicModalLoader"
                       href="#"
                       data-formtype="Edit"
                       data-endpoint="' . esc($btnID ?? 'editDebtAccount') . '"
                       data-accountid="' . esc($childAccountId) . '">Edit</a>
                    <a href="#"
                       class="dropdown-item delete-wallet-button"
                       data-id="' . esc($deleteTargetId) . '"
                       data-wallet-id="' . esc($deleteTargetId) . '"
                       data-account-id="' . esc($childAccountId) . '"
                       data-name="' . esc($deleteName) . '"
                       data-type="Debt"
                       data-bs-toggle="modal"
                       data-bs-target="#deleteWalletModal"
                       onclick="openDeleteModal(event)">Delete</a>
                </div>
            </div>
        </div>
    </div>
</div>
';
?>
