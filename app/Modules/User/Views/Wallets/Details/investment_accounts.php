<?php
/**
 * app/Modules/User/Views/Wallets/Details/investment_accounts.php
 */

$display = static function ($value, string $fallback = 'Not Provided'): string {
    $value = trim((string) ($value ?? ''));
    return $value !== '' ? esc($value) : esc($fallback);
};

$money = static function ($value): string {
    if (is_string($value) && str_starts_with(trim($value), '$')) {
        return esc($value);
    }

    return '$' . number_format((float) str_replace(',', '', (string) ($value ?? 0)), 2);
};

$accountID           = (int) ($accountID ?? 0);
$accountWalletID     = (int) ($accountWalletID ?? 0);
$transactionWalletId = (int) ($transactionWalletId ?? ($accountWalletID > 0 ? $accountWalletID : $accountID));

$accountTitle          = (string) ($accountTitle ?? 'Investment Account');
$accountBroker         = (string) ($accountBroker ?? 'Investment Account');
$accountName           = (string) ($accountName ?? 'Investment Wallet');
$accountType           = (string) ($accountType ?? 'Investment');
$accountNumber         = (string) ($accountNumber ?? 'Not Provided');
$accountAmount         = (string) ($accountAmount ?? '$0.00');
$accountInitialValue   = $accountInitialValue ?? 0;
$accountAvailableFunds = (string) ($accountAvailableFunds ?? '$0.00');
$accountNetWorth       = $accountNetWorth ?? 0;
$accountNetReturns     = $accountNetReturns ?? 0;
$createdOn             = (string) ($createdOn ?? '');
$updatedOn             = (string) ($updatedOn ?? '');

$detailsUrl = (string) ($detailsUrl ?? site_url('Wallets/Investment/Details/' . $accountID));
$editUrl    = (string) ($editUrl ?? site_url('Wallets/Investment/Edit/Account/' . $accountID));
$deleteHref = (string) ($deleteHref ?? site_url('Wallets/Delete/Investment/' . ($accountWalletID ?: $accountID) . '?account_id=' . $accountID));

$transactionHistory = is_array($transactionHistory ?? null) ? $transactionHistory : [];
$transactionCount = count($transactionHistory);
?>

<div class="nk-block">
    <div class="row gy-gs">
        <div class="col-md-12 mb-3">
            <div class="nk-block-head">
                <div class="nk-block-between-md g-4">
                    <div class="nk-block-head-content">
                        <div class="nk-wgwh">
                            <em class="icon-circle icon-circle-lg icon ni ni-trend-up" style="margin-top: -35px;"></em>
                            <div class="nk-wgwh-title h5">
                                <h2 class="nk-block-title fw-bold"><?= esc($accountTitle) ?></h2>
                                <div class="nk-block-des">
                                    <p>
                                        <span class="d-block d-md-none">Review Investment Details</span>
                                        <span class="d-none d-md-block">
                                            Review your <?= esc($accountBroker) ?> investment account information and portfolio values.
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="nk-block-head-content">
                        <ul class="nk-block-tools gx-2">
                            <li>
                                <a href="<?= site_url('Wallets') ?>" class="btn btn-light">
                                    <em class="icon ni ni-arrow-left"></em>
                                    <span>Back</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= esc($editUrl) ?>" class="btn btn-primary">
                                    <em class="icon ni ni-pen"></em>
                                    <span>Edit</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?= esc($deleteHref) ?>"
                                   class="btn btn-danger"
                                   onclick="return confirm('Are you sure you want to delete this investment wallet?');">
                                    <em class="icon ni ni-trash"></em>
                                    <span>Delete</span>
                                </a>
                            </li>
                        </ul>
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
                                    <div class="nk-wg1-title text-soft">Investment Value</div>
                                    <div class="nk-wg1-amount">
                                        <div class="amount">
                                            <?= $money($accountNetWorth) ?>
                                            <small class="currency currency-usd">USD</small>
                                        </div>
                                        <div class="amount-sm">
                                            Available Funds <span><?= esc($accountAvailableFunds) ?></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="nk-wg1-item">
                                    <div class="nk-wg1-title text-soft">Net Returns</div>
                                    <div class="nk-wg1-amount">
                                        <div class="amount">
                                            <?= $money($accountNetReturns) ?>
                                            <small class="currency currency-usd">USD</small>
                                        </div>
                                        <div class="amount-sm">
                                            Initial Value <span><?= $money($accountInitialValue) ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="nk-block-content">
                        <ul class="nk-block-tools gx-3">
                            <li class="btn-wrap">
                                <a href="<?= esc($detailsUrl) ?>" class="btn btn-icon btn-xl btn-dark">
                                    <em class="icon ni ni-list-index"></em>
                                </a>
                                <span class="btn-extext">Details</span>
                            </li>
                            <li class="btn-wrap">
                                <a href="<?= esc($editUrl) ?>" class="btn btn-icon btn-xl btn-primary">
                                    <em class="icon ni ni-pen"></em>
                                </a>
                                <span class="btn-extext">Edit</span>
                            </li>
                            <li class="btn-wrap">
                                <a href="<?= site_url('Wallets/Transaction-History/' . $transactionWalletId) ?>" class="btn btn-icon btn-xl btn-dark">
                                    <em class="icon ni ni-repeat"></em>
                                </a>
                                <span class="btn-extext">History</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="nk-block nk-block-lg pb-3">
                <div class="row g-gs">
                    <div class="col-md-4">
                        <div class="card card-bordered">
                            <div class="card-inner">
                                <div class="nk-wg5">
                                    <div class="nk-wg5-title">
                                        <h6 class="title overline-title">Broker</h6>
                                    </div>
                                    <div class="nk-wg5-text pb-2">
                                        <div class="nk-wg5-amount">
                                            <div class="amount"><?= $display($accountBroker) ?></div>
                                        </div>
                                        <div class="sub-text mt-1">Type: <?= $display($accountType) ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card card-bordered">
                            <div class="card-inner">
                                <div class="nk-wg5">
                                    <div class="nk-wg5-title">
                                        <h6 class="title overline-title">History Records</h6>
                                    </div>
                                    <div class="nk-wg5-text pb-2">
                                        <div class="nk-wg5-amount">
                                            <div class="amount">
                                                <?= esc((string) $transactionCount) ?>
                                                <span class="currency currency-btc">Records</span>
                                            </div>
                                        </div>
                                        <div class="sub-text mt-1">Stored wallet transaction records</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card card-bordered">
                            <div class="card-inner">
                                <div class="nk-wg5">
                                    <div class="nk-wg5-title">
                                        <h6 class="title overline-title">Account Reference</h6>
                                    </div>
                                    <div class="nk-wg5-text pb-2">
                                        <div class="nk-wg5-amount">
                                            <div class="amount"><?= esc($accountNumber) ?></div>
                                        </div>
                                        <div class="sub-text mt-1">Parent wallet ID <?= esc((string) $transactionWalletId) ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card card-bordered">
                            <div class="card-inner">
                                <div class="nk-block-head-xs">
                                    <div class="nk-block-head-content">
                                        <h5 class="nk-block-title title">Investment Account Information</h5>
                                        <p class="sub-text mb-0">Investment history is rendered below by the main Wallet Details page.</p>
                                    </div>
                                </div>

                                <div class="table-responsive mt-3">
                                    <table class="table table-striped table-sm">
                                        <tbody>
                                            <tr>
                                                <th style="width: 240px;">Account Name</th>
                                                <td><?= $display($accountName) ?></td>
                                            </tr>
                                            <tr>
                                                <th>Broker</th>
                                                <td><?= $display($accountBroker) ?></td>
                                            </tr>
                                            <tr>
                                                <th>Account Type</th>
                                                <td><?= $display($accountType) ?></td>
                                            </tr>
                                            <tr>
                                                <th>Account Number</th>
                                                <td><?= $display($accountNumber) ?></td>
                                            </tr>
                                            <tr>
                                                <th>Amount</th>
                                                <td><?= esc($accountAmount) ?></td>
                                            </tr>
                                            <tr>
                                                <th>Initial Value</th>
                                                <td><?= $money($accountInitialValue) ?></td>
                                            </tr>
                                            <tr>
                                                <th>Available Funds</th>
                                                <td><?= esc($accountAvailableFunds) ?></td>
                                            </tr>
                                            <tr>
                                                <th>Net Worth</th>
                                                <td><?= $money($accountNetWorth) ?></td>
                                            </tr>
                                            <tr>
                                                <th>Net Returns</th>
                                                <td><?= $money($accountNetReturns) ?></td>
                                            </tr>
                                            <tr>
                                                <th>Created</th>
                                                <td><?= $display($createdOn) ?></td>
                                            </tr>
                                            <tr>
                                                <th>Last Updated</th>
                                                <td><?= $display($updatedOn) ?></td>
                                            </tr>
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
</div>