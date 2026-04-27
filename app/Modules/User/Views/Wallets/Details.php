<?php
/**
 * app/Modules/User/Views/Wallets/Details.php
 *
 * Dispatcher view for wallet/account detail pages.
 *
 * Expected controller data:
 * - previousData: array
 * - accountType/accountTypeRaw: normalized account type hints
 * - transactionWalletId: parent bf_users_wallet.id used for transaction lookup
 * - transactionHistory: rows from bf_users_wallet_transactions
 */

$uri = $uri ?? service('uri');

$previousData = is_array($previousData ?? null) ? $previousData : [];
$transactionHistory = is_array($transactionHistory ?? null) ? $transactionHistory : [];

if (empty($previousData)) {
    ?>
    <div class="nk-block">
        <div class="alert alert-warning">
            <strong>Wallet/account record not found.</strong>
            <div class="mt-1">Return to your wallet dashboard and try again.</div>
            <a href="<?= site_url('Wallets') ?>" class="btn btn-sm btn-primary mt-3">Back to Wallets</a>
        </div>
    </div>
    <?php
    return;
}

$getValue = static function (array $row, array $keys, $default = '') {
    foreach ($keys as $key) {
        if (array_key_exists($key, $row) && $row[$key] !== null && $row[$key] !== '') {
            return $row[$key];
        }
    }

    return $default;
};

$formatMoney = static function ($value): string {
    if ($value === null || $value === '') {
        $value = 0;
    }

    $numeric = (float) str_replace(',', '', (string) $value);

    return '$' . number_format($numeric, 2);
};

$numericMoney = static function ($value): float {
    if ($value === null || $value === '') {
        return 0.0;
    }

    return (float) str_replace(',', '', (string) $value);
};

$maskAccount = static function ($value): string {
    $value = trim((string) $value);

    if ($value === '') {
        return 'Not Provided';
    }

    if (str_starts_with($value, '****')) {
        return $value;
    }

    $digits = preg_replace('/\D+/', '', $value);

    if ($digits === '') {
        return $value;
    }

    return '****' . substr($digits, -4);
};

$isInvalidDateValue = static function ($value): bool {
    $value = trim((string) ($value ?? ''));

    if ($value === '') {
        return true;
    }

    $lower = strtolower($value);

    $invalidValues = [
        '0',
        '0000',
        '0000-00-00',
        '0000-00-00 00:00:00',
        '0000-00-00t00:00:00',
        '-0001-11-30',
        'nov 30, -0001',
        'null',
        'n/a',
        'na',
        'none',
    ];

    if (in_array($lower, $invalidValues, true)) {
        return true;
    }

    if (preg_match('/^0{4}-0{2}-0{2}/', $value)) {
        return true;
    }

    if (preg_match('/^-0{0,3}1-11-30/', $value)) {
        return true;
    }

    return false;
};

$normalizeDateForDisplay = static function ($value) use ($isInvalidDateValue): ?array {
    $value = trim((string) ($value ?? ''));

    if ($isInvalidDateValue($value)) {
        return null;
    }

    if (ctype_digit($value)) {
        $timestamp = (int) $value;

        if ($timestamp > 9999999999) {
            $timestamp = (int) floor($timestamp / 1000);
        }
    } else {
        $timestamp = strtotime($value);
    }

    if ($timestamp === false || $timestamp <= 0) {
        return null;
    }

    $year = (int) date('Y', $timestamp);

    if ($year < 1900) {
        return null;
    }

    return [
        'timestamp' => $timestamp,
        'display'   => date('M j, Y', $timestamp),
        'sort'      => date('Y-m-d H:i:s', $timestamp),
    ];
};

$formatDate = static function ($value) use ($normalizeDateForDisplay): string {
    $normalized = $normalizeDateForDisplay($value);

    return $normalized['display'] ?? 'N/A';
};

$formatDateSortValue = static function ($value) use ($normalizeDateForDisplay): string {
    $normalized = $normalizeDateForDisplay($value);

    return $normalized['sort'] ?? '1900-01-01 00:00:00';
};

$getJsonValue = static function ($json, array $keys) {
    if (is_array($json)) {
        $decoded = $json;
    } else {
        $json = trim((string) ($json ?? ''));

        if ($json === '') {
            return null;
        }

        $decoded = json_decode($json, true);
    }

    if (! is_array($decoded)) {
        return null;
    }

    foreach ($keys as $key) {
        if (array_key_exists($key, $decoded) && $decoded[$key] !== null && $decoded[$key] !== '') {
            return $decoded[$key];
        }
    }

    foreach ($decoded as $value) {
        if (is_array($value)) {
            foreach ($keys as $key) {
                if (array_key_exists($key, $value) && $value[$key] !== null && $value[$key] !== '') {
                    return $value[$key];
                }
            }
        }
    }

    return null;
};

$transactionDate = static function (array $transaction) use ($isInvalidDateValue, $getJsonValue): string {
    $dateKeys = [
        'posted_date',
        'transaction_date',
        'authorized_date',
        'post_date',
        'date',
        'trans_date',
        'transactionDate',
        'authorizedDate',
        'datetime',
        'transaction_datetime',
        'authorized_datetime',
        'posted_at',
        'submitted_date',
        'deposit_date',
        'withdraw_date',
        'transfer_date',
        'created_at',
        'created_on',
        'updated_on',
        'modified_on',
    ];

    foreach ($dateKeys as $key) {
        if (array_key_exists($key, $transaction) && ! $isInvalidDateValue($transaction[$key])) {
            return (string) $transaction[$key];
        }
    }

    $year  = trim((string) ($transaction['year'] ?? ''));
    $month = trim((string) ($transaction['month'] ?? ''));
    $day   = trim((string) ($transaction['day'] ?? ''));

    if ($year !== '' && $month !== '' && $day !== '') {
        $yearInt  = (int) $year;
        $monthInt = (int) $month;
        $dayInt   = (int) $day;

        if ($yearInt >= 1900 && $monthInt >= 1 && $monthInt <= 12 && $dayInt >= 1 && $dayInt <= 31) {
            return sprintf('%04d-%02d-%02d', $yearInt, $monthInt, $dayInt);
        }
    }

    $jsonColumns = [
        'raw',
        'raw_data',
        'metadata',
        'payload',
        'details',
        'transaction_json',
        'plaid_data',
        'extra',
    ];

    $jsonDateKeys = [
        'date',
        'authorized_date',
        'datetime',
        'authorized_datetime',
        'transaction_date',
        'posted_date',
        'posted_at',
    ];

    foreach ($jsonColumns as $jsonColumn) {
        if (! empty($transaction[$jsonColumn])) {
            $dateFromJson = $getJsonValue($transaction[$jsonColumn], $jsonDateKeys);

            if (! $isInvalidDateValue($dateFromJson)) {
                return (string) $dateFromJson;
            }
        }
    }

    return '';
};

$transactionDescription = static function (array $transaction): string {
    $keys = ['description', 'name', 'merchant_name', 'title', 'memo', 'notes', 'trans_type'];

    foreach ($keys as $key) {
        if (array_key_exists($key, $transaction) && $transaction[$key] !== null && trim((string) $transaction[$key]) !== '') {
            return trim((string) $transaction[$key]);
        }
    }

    return 'Transaction';
};

$transactionAmount = static function (array $transaction): float {
    foreach (['amount', 'total_cost', 'subtotal', 'value'] as $key) {
        if (array_key_exists($key, $transaction) && $transaction[$key] !== null && $transaction[$key] !== '') {
            return (float) str_replace(',', '', (string) $transaction[$key]);
        }
    }

    return 0.0;
};

$pageAccountType = (string) ($accountTypeRaw ?? $accountType ?? $uri->getSegment(2) ?? '');
$pageAccountTypeKey = strtolower($pageAccountType);

$typeMap = [
    'bank'        => 'Banking',
    'banking'     => 'Banking',
    'checking'    => 'Banking',
    'financial'   => 'Banking',
    'fiat'        => 'Banking',
    'credit'      => 'Credit',
    'debt'        => 'Debt',
    'loan'        => 'Debt',
    'investment'  => 'Investment',
    'investments' => 'Investment',
    'invest'      => 'Investment',
    'crypto'      => 'Crypto',
];

$pageAccountType = $typeMap[$pageAccountTypeKey] ?? ucfirst($pageAccountTypeKey);

$accountID = (int) $getValue($previousData, ['id'], 0);

$walletIDRaw = $getValue($previousData, ['wallet_id'], 0);
$walletID = (int) $walletIDRaw;

$transactionWalletId = (int) ($transactionWalletId ?? 0);

if ($transactionWalletId <= 0) {
    $transactionWalletId = $walletID > 0 ? $walletID : $accountID;
}

$deleteTargetID = $walletID > 0 ? $walletID : $accountID;

$createdOn = (string) $getValue($previousData, ['created_on', 'current_timestamp', 'date'], '');
$updatedOn = (string) $getValue($previousData, ['updated_on', 'modified_on'], '');

$common = [
    'previousData'          => $previousData,
    'accountID'             => $accountID,
    'accountWalletID'       => $walletID,
    'transactionWalletId'   => $transactionWalletId,
    'transactionHistory'    => $transactionHistory,
    'deleteTargetID'        => $deleteTargetID,
    'createdOn'             => $createdOn,
    'updatedOn'             => $updatedOn,
    'formatMoney'           => $formatMoney,
    'maskAccount'           => $maskAccount,
];

$detailView = null;
$accountInformation = [];

switch ($pageAccountType) {
    case 'Banking':
        $accountBankName = (string) $getValue($previousData, ['bank_name', 'provider'], 'Bank Account');
        $accountName     = (string) $getValue($previousData, ['nickname', 'account_name', 'label'], 'Bank Wallet');
        $accountTitle    = trim($accountBankName . ' - ' . $accountName, ' -');

        $accountInformation = $common + [
            'accountType'        => (string) $getValue($previousData, ['account_type'], 'Checking'),
            'accountBankName'    => $accountBankName,
            'accountName'        => $accountName,
            'accountTitle'       => $accountTitle,
            'accountRouting'     => (string) $getValue($previousData, ['routing_number'], ''),
            'accountNumber'      => $maskAccount($getValue($previousData, ['account_number'], '')),
            'accountBalance'     => $formatMoney($getValue($previousData, ['balance', 'current_balance'], 0)),
            'accountProvider'    => (string) $getValue($previousData, ['provider'], ''),
            'accountStatus'      => (string) $getValue($previousData, ['status'], ''),
            'detailsUrl'         => site_url('Wallets/Banking/Details/' . $accountID),
            'editUrl'            => site_url('Wallets/Banking/Edit/Account/' . $accountID),
            'deleteHref'         => site_url('Wallets/Delete/Bank/' . $deleteTargetID . '?account_id=' . $accountID),
        ];

        $detailView = 'UserModule\Views\Wallets\Details\bank_accounts';
        break;

    case 'Credit':
        $accountBankName = (string) $getValue($previousData, ['bank_name', 'provider'], 'Credit Account');
        $accountName     = (string) $getValue($previousData, ['nickname', 'account_name', 'label'], 'Credit Wallet');
        $accountTitle    = trim($accountBankName . ' - ' . $accountName, ' -');

        $creditLimit = $numericMoney($getValue($previousData, ['credit_limit'], 0));
        $currentBalance = $numericMoney($getValue($previousData, ['current_balance'], 0));
        $availableBalance = $getValue($previousData, ['available_balance'], null);

        if ($availableBalance === null || $availableBalance === '') {
            $availableBalance = max(0, $creditLimit - $currentBalance);
        }

        $accountInformation = $common + [
            'accountType'             => (string) $getValue($previousData, ['account_type'], 'Credit'),
            'accountBankName'         => $accountBankName,
            'accountName'             => $accountName,
            'accountTitle'            => $accountTitle,
            'accountNumber'           => $maskAccount($getValue($previousData, ['account_number'], '')),
            'accountCreditLimit'      => $formatMoney($creditLimit),
            'accountCurrentBalance'   => $formatMoney($currentBalance),
            'accountAvailableBalance' => $formatMoney($availableBalance),
            'accountCreditStatus'     => (string) $getValue($previousData, ['credit_status', 'status'], ''),
            'accountDueDate'          => (string) $getValue($previousData, ['due_date'], ''),
            'accountPaymentDue'       => $formatMoney($getValue($previousData, ['payment_due'], 0)),
            'accountInterestRate'     => (string) $getValue($previousData, ['interest_rate'], ''),
            'detailsUrl'              => site_url('Wallets/Credit/Details/' . $accountID),
            'editUrl'                 => site_url('Wallets/Credit/Edit/Account/' . $accountID),
            'deleteHref'              => site_url('Wallets/Delete/Credit/' . $deleteTargetID . '?account_id=' . $accountID),
        ];

        $detailView = 'UserModule\Views\Wallets\Details\credit_accounts';
        break;

    case 'Debt':
        $accountDebtor = (string) $getValue($previousData, ['debtor', 'bank_name', 'provider'], 'Debt Account');
        $accountName   = (string) $getValue($previousData, ['nickname', 'account_name', 'label'], 'Debt Wallet');
        $accountTitle  = trim($accountDebtor . ' - ' . $accountName, ' -');

        $accountInformation = $common + [
            'accountType'             => (string) $getValue($previousData, ['account_type'], 'Debt'),
            'accountDebtor'           => $accountDebtor,
            'accountName'             => $accountName,
            'accountTitle'            => $accountTitle,
            'accountNumber'           => $maskAccount($getValue($previousData, ['account_number'], '')),
            'accountCreditStatus'     => (string) $getValue($previousData, ['credit_status', 'account_status', 'status'], ''),
            'accountCurrentBalance'   => $numericMoney($getValue($previousData, ['current_balance', 'balance'], 0)),
            'accountAvailableBalance' => $formatMoney($getValue($previousData, ['available_balance'], 0)),
            'accountMonthlyPayment'   => $formatMoney($getValue($previousData, ['monthly_payment'], 0)),
            'accountDueDate'          => (string) $getValue($previousData, ['due_date'], ''),
            'accountInterestRate'     => (string) $getValue($previousData, ['interest_rate'], ''),
            'detailsUrl'              => site_url('Wallets/Debt/Details/' . $accountID),
            'editUrl'                 => site_url('Wallets/Debt/Edit/Account/' . $accountID),
            'deleteHref'              => site_url('Wallets/Delete/Debt/' . $deleteTargetID . '?account_id=' . $accountID),
        ];

        $detailView = 'UserModule\Views\Wallets\Details\debt_accounts';
        break;

    case 'Investment':
        $accountBroker = (string) $getValue($previousData, ['broker', 'provider'], 'Investment Account');
        $accountName   = (string) $getValue($previousData, ['nickname', 'account_name', 'label'], 'Investment Wallet');
        $accountTitle  = trim($accountBroker . ' - ' . $accountName, ' -');

        $accountInformation = $common + [
            'accountType'           => (string) $getValue($previousData, ['account_type', 'investment_type'], 'Investment'),
            'accountBroker'         => $accountBroker,
            'accountName'           => $accountName,
            'accountTitle'          => $accountTitle,
            'accountNumber'         => $maskAccount($getValue($previousData, ['account_number'], '')),
            'accountAmount'         => $formatMoney($getValue($previousData, ['amount'], 0)),
            'accountInitialValue'   => $numericMoney($getValue($previousData, ['initial_value', 'investment_amount'], 0)),
            'accountAvailableFunds' => $formatMoney($getValue($previousData, ['available_funds'], 0)),
            'accountNetWorth'       => $numericMoney($getValue($previousData, ['net_worth', 'amount'], 0)),
            'accountNetReturns'     => $numericMoney($getValue($previousData, ['net_returns', 'returns'], 0)),
            'detailsUrl'            => site_url('Wallets/Investment/Details/' . $accountID),
            'editUrl'               => site_url('Wallets/Investment/Edit/Account/' . $accountID),
            'deleteHref'            => site_url('Wallets/Delete/Investment/' . $deleteTargetID . '?account_id=' . $accountID),
        ];

        $detailView = 'UserModule\Views\Wallets\Details\investment_accounts';
        break;

    case 'Crypto':
        $accountExchange = (string) $getValue($previousData, ['exchange', 'provider', 'network'], 'Crypto Wallet');
        $accountName     = (string) $getValue($previousData, ['nickname', 'label', 'account_name'], 'Crypto Account');
        $accountTitle    = trim($accountExchange . ' - ' . $accountName, ' -');

        $accountInformation = $common + [
            'accountType'        => (string) $getValue($previousData, ['account_type', 'crypto_type'], 'Crypto'),
            'accountExchange'    => $accountExchange,
            'accountProvider'    => (string) $getValue($previousData, ['provider'], ''),
            'accountNetwork'     => (string) $getValue($previousData, ['network', 'chain'], ''),
            'accountName'        => $accountName,
            'accountTitle'       => $accountTitle,
            'accountNumber'      => $maskAccount($getValue($previousData, ['account_number'], '')),
            'accountAddress'     => (string) $getValue($previousData, ['address', 'wallet_address', 'coin_address'], ''),
            'accountCoinAddress' => (string) $getValue($previousData, ['coin_address', 'wallet_address', 'address'], ''),
            'accountBalance'     => $formatMoney($getValue($previousData, ['balance', 'amount', 'current_balance'], 0)),
            'accountStatus'      => (string) $getValue($previousData, ['status'], ''),
            'detailsUrl'         => site_url('Wallets/Crypto/Details/' . $accountID),
            'editUrl'            => site_url('Wallets/Crypto/Edit/Account/' . $accountID),
            'deleteHref'         => site_url('Wallets/Delete/Crypto/' . $deleteTargetID . '?account_id=' . $accountID),
        ];

        $detailView = 'UserModule\Views\Wallets\Details\crypto_accounts';
        break;
}

if ($detailView === null) {
    ?>
    <div class="nk-block">
        <div class="alert alert-warning">
            <strong>Unsupported wallet/account type.</strong>
            <div class="mt-1">
                Type received:
                <code><?= esc($pageAccountType) ?></code>
            </div>
            <a href="<?= site_url('Wallets') ?>" class="btn btn-sm btn-primary mt-3">Back to Wallets</a>
        </div>
    </div>
    <?php
    return;
}

echo view($detailView, $accountInformation);
?>

<div class="nk-block nk-block-lg mt-4">
    <div class="card card-bordered">
        <div class="card-inner">
            <div class="nk-block-between-md g-3">
                <div class="nk-block-head-content">
                    <h5 class="nk-block-title title">Transaction History</h5>
                    <p class="sub-text mb-0">
                        Showing transactions stored for parent wallet ID
                        <code><?= esc((string) $transactionWalletId) ?></code>.
                    </p>
                </div>

                <?php if ($transactionWalletId > 0 && in_array($pageAccountType, ['Banking', 'Credit'], true)): ?>
                    <div class="nk-block-head-content">
                        <button type="button"
                                class="btn btn-sm btn-primary"
                                data-wallet-id="<?= esc((string) $transactionWalletId) ?>"
                                onclick="syncPlaidTransactionsFromDetails(this)">
                            <em class="icon ni ni-reload"></em>
                            <span>Sync Transactions</span>
                        </button>
                    </div>
                <?php endif; ?>
            </div>

            <div class="table-responsive mt-3">
                <table id="walletTransactionDatabase" class="table table-striped table-hover table-sm align-middle w-100 defaultDTTable">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th class="text-end">Amount</th>
                            <th class="text-end">Running Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (! empty($transactionHistory)): ?>
                            <?php foreach ($transactionHistory as $transaction): ?>
                                <?php
                                    $rawDate = $transactionDate($transaction);

                                    $description = $transactionDescription($transaction);

                                    $category = $transaction['category']
                                        ?? $transaction['personal_finance_category']
                                        ?? $transaction['trans_type']
                                        ?? 'Uncategorized';

                                    if (is_array($category)) {
                                        $category = $category['primary'] ?? json_encode($category);
                                    }

                                    $pending = $transaction['pending']
                                        ?? $transaction['status']
                                        ?? '';

                                    $pendingText = in_array((string) $pending, ['1', 'true', 'pending', 'Pending'], true)
                                        ? 'Pending'
                                        : ((string) $pending !== '' ? (string) $pending : 'Posted');

                                    $amount = $transactionAmount($transaction);

                                    $displayDate = $formatDate($rawDate);
                                    $sortDate    = $formatDateSortValue($rawDate);
                                ?>
                                <tr>
                                    <td data-order="<?= esc($sortDate) ?>">
                                        <?= esc($displayDate) ?>

                                        <?php if ($displayDate === 'N/A'): ?>
                                            <div class="small text-danger">
                                                Missing transaction date
                                            </div>
                                        <?php endif; ?>
                                    </td>

                                    <td>
                                        <span class="fw-medium"><?= esc($description) ?></span>

                                        <?php if (! empty($transaction['external_id'])): ?>
                                            <div class="small text-muted">
                                                Ref: <?= esc((string) $transaction['external_id']) ?>
                                            </div>
                                        <?php endif; ?>

                                        <?php if (! empty($transaction['merchant_name'])): ?>
                                            <div class="small text-muted">
                                                Merchant: <?= esc((string) $transaction['merchant_name']) ?>
                                            </div>
                                        <?php endif; ?>
                                    </td>

                                    <td><?= esc((string) $category) ?></td>

                                    <td>
                                        <span class="badge bg-light text-dark"><?= esc($pendingText) ?></span>
                                    </td>

                                    <td class="text-end js-transaction-amount"
                                        data-order="<?= esc((string) $amount) ?>"
                                        data-amount="<?= esc((string) $amount) ?>">
                                        <?= esc($formatMoney($amount)) ?>
                                    </td>

                                    <td class="text-end js-running-subtotal"
                                        data-order="0">
                                        $0.00
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">
                                    No transactions found for this wallet yet.

                                    <?php if ($transactionWalletId > 0 && in_array($pageAccountType, ['Banking', 'Credit'], true)): ?>
                                        <div class="mt-2">
                                            Click <strong>Sync Transactions</strong> to pull the latest Plaid transaction history.
                                        </div>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>

                    <?php if (! empty($transactionHistory)): ?>
                        <tfoot>
                            <tr>
                                <th colspan="4" class="text-end">Filtered Total</th>
                                <th class="text-end" id="walletTransactionFilteredTotal">$0.00</th>
                                <th class="text-end" id="walletTransactionFinalSubtotal">$0.00</th>
                            </tr>
                        </tfoot>
                    <?php endif; ?>
                </table>
            </div>

            <?php if (! empty($transactionHistory)): ?>
                <div class="small text-muted mt-2">
                    Loaded <?= esc((string) count($transactionHistory)) ?> transaction record(s).
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script>
function syncPlaidTransactionsFromDetails(button) {
    const walletId = button.getAttribute('data-wallet-id');

    if (!walletId) {
        alert('Missing wallet ID for transaction sync.');
        return;
    }

    const originalHtml = button.innerHTML;

    button.disabled = true;
    button.innerHTML = '<span>Syncing...</span>';

    fetch("<?= site_url('API/Wallets/Plaid/Sync-Transactions') ?>/" + encodeURIComponent(walletId), {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
            <?php if (function_exists('csrf_header') && function_exists('csrf_hash')): ?>
            , '<?= csrf_header() ?>': '<?= csrf_hash() ?>'
            <?php endif; ?>
        }
    })
    .then(function(response) {
        return response.json().then(function(json) {
            return {
                ok: response.ok,
                status: response.status,
                json: json
            };
        });
    })
    .then(function(result) {
        if (!result.ok || !result.json || result.json.status === 'error') {
            console.error('Plaid transaction sync failed:', result);
            alert((result.json && result.json.message) ? result.json.message : 'Transaction sync failed.');
            return;
        }

        window.location.reload();
    })
    .catch(function(error) {
        console.error('Plaid transaction sync request failed:', error);
        alert('Unable to sync transactions right now.');
    })
    .finally(function() {
        button.disabled = false;
        button.innerHTML = originalHtml;
    });
}

</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const tableSelector = '#walletTransactionDatabase';

    if (!document.querySelector(tableSelector)) {
        return;
    }

    if (!window.jQuery || !jQuery.fn || !jQuery.fn.DataTable) {
        console.warn('DataTablesJS is not loaded on this page. Transaction table will remain a standard table.');
        return;
    }

    const formatCurrency = function (value) {
        const amount = Number(value || 0);

        return amount.toLocaleString('en-US', {
            style: 'currency',
            currency: 'USD'
        });
    };

    const recalculateRunningSubtotal = function (table) {
        let runningSubtotal = 0;

        const visibleRows = table.rows({
            search: 'applied',
            order: 'applied'
        }).nodes();

        jQuery(visibleRows).each(function () {
            const $row = jQuery(this);
            const amountRaw = $row.find('.js-transaction-amount').attr('data-amount') || '0';
            const amount = Number(String(amountRaw).replace(/[^0-9.-]/g, '')) || 0;

            runningSubtotal += amount;

            $row.find('.js-running-subtotal')
                .attr('data-order', runningSubtotal)
                .text(formatCurrency(runningSubtotal));
        });

        jQuery('#walletTransactionFilteredTotal').text(formatCurrency(runningSubtotal));
        jQuery('#walletTransactionFinalSubtotal').text(formatCurrency(runningSubtotal));
    };

    const $table = jQuery(tableSelector);

    if (jQuery.fn.DataTable.isDataTable(tableSelector)) {
        const existingTable = $table.DataTable();
        recalculateRunningSubtotal(existingTable);
        return;
    }

    const dataTableOptions = {
        order: [[0, 'desc']],
        pageLength: 25,
        lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, 'All']],
        responsive: true,
        autoWidth: false,
        stateSave: true,
        columnDefs: [
            {
                targets: 4,
                className: 'text-end'
            },
            {
                targets: 5,
                className: 'text-end'
            }
        ],
        language: {
            search: 'Filter transactions:',
            lengthMenu: 'Show _MENU_ transactions',
            info: 'Showing _START_ to _END_ of _TOTAL_ transactions',
            infoEmpty: 'No transactions available',
            zeroRecords: 'No matching transactions found'
        },
        drawCallback: function () {
            recalculateRunningSubtotal(this.api());
        },
        initComplete: function () {
            recalculateRunningSubtotal(this.api());
        }
    };

    let table;

    if (window.initDataTableSafe) {
        table = window.initDataTableSafe($table, dataTableOptions);

        if (table && typeof table.on === 'function') {
            table.on('draw', function () {
                recalculateRunningSubtotal(table);
            });
        }

        if (table) {
            recalculateRunningSubtotal(table);
        }

        return;
    }

    table = $table.DataTable(dataTableOptions);
    recalculateRunningSubtotal(table);
});
</script>