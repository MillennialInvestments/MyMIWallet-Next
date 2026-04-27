<?php
/**
 * app/Modules/User/Views/Wallets/Details/crypto_accounts.php
 *
 * Crypto account details partial.
 */

$esc = static fn ($value): string => esc((string) ($value ?? ''));

$display = static function ($value, string $fallback = 'Not Provided'): string {
    $value = trim((string) ($value ?? ''));

    return $value !== '' ? esc($value) : esc($fallback);
};

$shortAddress = static function ($value): string {
    $value = trim((string) ($value ?? ''));

    if ($value === '') {
        return 'Not Provided';
    }

    if (strlen($value) <= 18) {
        return esc($value);
    }

    return esc(substr($value, 0, 10) . '...' . substr($value, -8));
};

$accountID         = (int) ($accountID ?? 0);
$accountWalletID   = (int) ($accountWalletID ?? 0);
$deleteTargetID    = (int) ($deleteTargetID ?? ($accountWalletID > 0 ? $accountWalletID : $accountID));

$accountTitle      = (string) ($accountTitle ?? 'Crypto Account');
$accountName       = (string) ($accountName ?? 'Crypto Wallet');
$accountExchange   = (string) ($accountExchange ?? '');
$accountProvider   = (string) ($accountProvider ?? '');
$accountNetwork    = (string) ($accountNetwork ?? '');
$accountAddress    = (string) ($accountAddress ?? ($accountCoinAddress ?? ''));
$accountNumber     = (string) ($accountNumber ?? '');
$accountBalance    = (string) ($accountBalance ?? '$0.00');
$accountStatus     = (string) ($accountStatus ?? '');
$createdOn         = (string) ($createdOn ?? '');
$updatedOn         = (string) ($updatedOn ?? '');

$detailsUrl = (string) ($detailsUrl ?? site_url('Wallets/Crypto/Details/' . $accountID));
$editUrl    = (string) ($editUrl ?? site_url('Wallets/Crypto/Edit/Account/' . $accountID));
$deleteHref = (string) ($deleteHref ?? site_url('Wallets/Delete/Crypto/' . $deleteTargetID . '?account_id=' . $accountID));

$statusText = $accountStatus !== '' ? $accountStatus : 'Active';

$statusBadgeClass = in_array(strtolower($statusText), ['1', 'active', 'linked'], true)
    ? 'badge badge-dot bg-success'
    : 'badge badge-dot bg-warning';
?>

<div class="nk-block">
    <div class="row gy-gs">
        <div class="col-md-12 mb-3">
            <div class="nk-block">
                <div class="nk-block-head">
                    <?php if (function_exists('theme_view')): ?>
                        <?php // echo theme_view('navigation_breadcrumbs'); ?>
                    <?php endif; ?>

                    <div class="nk-block-between-md g-4">
                        <div class="nk-block-head-content">
                            <div class="nk-wgwh">
                                <em class="icon-circle icon-circle-lg icon ni ni-wallet" style="margin-top: -35px;"></em>

                                <div class="nk-wgwh-title h5">
                                    <h2 class="nk-block-title fw-bold"><?= $esc($accountTitle) ?></h2>
                                    <div class="nk-block-des">
                                        <p>
                                            <span class="d-block d-md-none">Review Crypto Account</span>
                                            <span class="d-none d-md-block">
                                                Review your <?= $display($accountExchange, 'crypto') ?> wallet information, balance, and connection details.
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
                                       onclick="return confirm('Are you sure you want to delete this crypto wallet?');">
                                        <em class="icon ni ni-trash"></em>
                                        <span>Delete</span>
                                    </a>
                                </li>
                            </ul>
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
                                        <div class="amount">
                                            <?= $display($accountBalance, '$0.00') ?>
                                            <small class="currency currency-usd">USD</small>
                                        </div>
                                        <div class="amount-sm">
                                            Status
                                            <span class="<?= esc($statusBadgeClass) ?>">
                                                <?= $display($statusText, 'Active') ?>
                                            </span>
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
                                <a href="<?= esc($deleteHref) ?>"
                                   class="btn btn-icon btn-xl btn-danger"
                                   onclick="return confirm('Are you sure you want to delete this crypto wallet?');">
                                    <em class="icon ni ni-trash"></em>
                                </a>
                                <span class="btn-extext">Delete</span>
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
                                        <h6 class="title overline-title myfs-xs">Exchange / Provider</h6>
                                    </div>
                                    <div class="nk-wg5-text">
                                        <div class="nk-wg5-amount">
                                            <div class="amount">
                                                <?= $display($accountExchange ?: $accountProvider, 'Manual Crypto Wallet') ?>
                                            </div>
                                        </div>
                                        <?php if ($accountProvider !== ''): ?>
                                            <div class="sub-text mt-1">Provider: <?= $display($accountProvider) ?></div>
                                        <?php endif; ?>
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
                                        <h6 class="title overline-title myfs-xs">Network</h6>
                                    </div>
                                    <div class="nk-wg5-text">
                                        <div class="nk-wg5-amount">
                                            <div class="amount"><?= $display($accountNetwork, 'Not Set') ?></div>
                                        </div>
                                        <div class="sub-text mt-1">Blockchain / chain network</div>
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
                                        <h6 class="title overline-title myfs-xs">Wallet ID</h6>
                                    </div>
                                    <div class="nk-wg5-text">
                                        <div class="nk-wg5-amount">
                                            <div class="amount"><?= $accountWalletID > 0 ? esc($accountWalletID) : esc($accountID) ?></div>
                                        </div>
                                        <div class="sub-text mt-1">Internal MyMI Wallet reference</div>
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
                                        <h5 class="nk-block-title title">Crypto Wallet Information</h5>
                                        <p class="sub-text mb-0">
                                            Sensitive values are shortened or masked for safety.
                                        </p>
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
                                                <th>Exchange / Provider</th>
                                                <td><?= $display($accountExchange ?: $accountProvider, 'Not Provided') ?></td>
                                            </tr>
                                            <tr>
                                                <th>Network</th>
                                                <td><?= $display($accountNetwork) ?></td>
                                            </tr>
                                            <tr>
                                                <th>Account Number</th>
                                                <td><?= $display($accountNumber) ?></td>
                                            </tr>
                                            <tr>
                                                <th>Wallet Address</th>
                                                <td>
                                                    <code><?= $shortAddress($accountAddress) ?></code>

                                                    <?php if (trim($accountAddress) !== ''): ?>
                                                        <button type="button"
                                                                class="btn btn-xs btn-light ms-2"
                                                                data-copy-value="<?= esc($accountAddress) ?>"
                                                                onclick="navigator.clipboard && navigator.clipboard.writeText(this.getAttribute('data-copy-value'));">
                                                            Copy
                                                        </button>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Current Balance</th>
                                                <td><?= $display($accountBalance, '$0.00') ?></td>
                                            </tr>
                                            <tr>
                                                <th>Status</th>
                                                <td><span class="<?= esc($statusBadgeClass) ?>"><?= $display($statusText, 'Active') ?></span></td>
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

                                <div class="alert alert-light mt-3 mb-0">
                                    <strong>Security note:</strong>
                                    Never share private keys or seed phrases. MyMI Wallet should only store public addresses,
                                    provider metadata, and encrypted integration credentials where required.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php if (! empty($previousData) && is_array($previousData)): ?>
            <div class="col-md-12">
                <div class="card card-bordered">
                    <div class="card-inner">
                        <div class="nk-block-head-xs">
                            <div class="nk-block-head-content">
                                <h5 class="nk-block-title title">Raw Account Snapshot</h5>
                                <p class="sub-text">
                                    Developer-only reference for confirming field mappings.
                                </p>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-sm table-bordered">
                                <tbody>
                                    <?php foreach ($previousData as $key => $value): ?>
                                        <?php
                                            if (is_array($value) || is_object($value)) {
                                                $value = json_encode($value, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
                                            }
                                        ?>
                                        <tr>
                                            <th style="width: 240px;"><?= esc((string) $key) ?></th>
                                            <td><?= esc((string) $value) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>