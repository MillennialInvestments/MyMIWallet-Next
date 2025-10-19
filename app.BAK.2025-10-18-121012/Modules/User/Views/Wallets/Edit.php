<?php
/**
 * Modal: Edit Wallet (Bank/Credit/Debt/Invest)
 * Robust version — will render even if controller didn’t preload $pageView/$fieldData.
 */

log_message('info', 'Wallets\Edit.php L3: Current URL: ' . current_url());

helper(['form', 'url']);

$errorClass   = $errorClass   ?? ' error';
$controlClass = $controlClass ?? 'span6';

/** @var \CodeIgniter\HTTP\IncomingRequest $request */
$uri = $request->getUri();

// Figure out segments
if ($uri->getSegment(1) === 'Dashboard') {
    $formType   = $uri->getSegment(3);
    $endpoint   = $accountType ?? $uri->getSegment(4); // e.g. editBankAccount
    $accountID  = (int) ($accountID ?? $uri->getSegment(5));
} else {
    $formType   = $uri->getSegment(2);
    $endpoint   = $accountType ?? $uri->getSegment(3);
    $accountID  = (int) ($accountID ?? $uri->getSegment(4));
}

log_message('info', 'Wallets\Edit L15: $accountType: ' . $endpoint);
log_message('info', 'Wallets\Edit L19: $accountID: ' . $accountID);

// Defaults
$addModalTitle = $addModalTitle ?? 'Edit Account';
$redirectURL   = $redirectURL   ?? site_url('/Wallets');

// If controller already provided everything, use it
$finalPageView  = $pageView  ?? null;
$finalFieldData = $fieldData ?? null;

// If not provided, resolve now (safe fallback)
if (!$finalPageView || !$finalFieldData) {
    /** @var \App\Models\WalletModel $wm */
    $wm = model(\App\Models\WalletModel::class);

    // Current user context (if controller didn’t set them)
    $cuID       = (int) ($cuID       ?? (function_exists('auth') && auth()->loggedIn() ? (int) auth()->id() : 0));
    $cuEmail    = (string) ($cuEmail  ?? '');
    $cuUsername = (string) ($cuUsername ?? '');
    $beta       = (string) (($siteSettings->beta ?? 0) . '');

    $row = $wm->findAccountRowForEdit($endpoint, $accountID, $cuID);
    if (!$row) {
        echo '<div class="alert alert-danger m-3">We couldn’t find that account. Please refresh and try again.</div>';
        return;
    }

    // Title/PageView from meta
    $addModalTitle = $row['__title']    ?? $addModalTitle;
    $finalPageView = $row['__pageView'] ?? null;

    if (!$finalPageView) {
        echo '<div class="alert alert-danger m-3">We couldn’t load the account details. Please refresh and try again.</div>';
        return;
    }

    // Build the exact payload the partials expect, *casting to strings*
    $endpointL = strtolower($endpoint);

    if ($endpointL === 'editbankaccount') {
        $finalFieldData = [
            'errorClass'        => (string) $errorClass,
            'controlClass'      => (string) $controlClass,
            'redirectURL'       => (string) $redirectURL,
            'cuID'              => (string) $cuID,
            'cuEmail'           => (string) $cuEmail,
            'accountBeta'       => (string) $beta,
            'accountID'         => (string) $accountID,
            'accountWalletID'   => (string) ($row['wallet_id'] ?? $accountID),
            'accountUserID'     => (string) ($row['user_id'] ?? $cuID),
            'accountUserEmail'  => (string) $cuEmail,
            'accountUsername'   => (string) $cuUsername,
            'accountType'       => 'editBankAccount',
            'accountTypeText'   => 'Bank Account',
            'accountBank'       => $wm->sval($row, 'bank_name', ''),
            'accountOwner'      => $wm->sval($row, 'bank_account_owner', 'Yes'),
            'accountRouting'    => $wm->sval($row, 'routing_number', ''),
            'accountNumber'     => $wm->sval($row, 'account_number', ''),
            'accountName'       => $wm->sval($row, 'nickname', ''),
            'accountNickname'   => $wm->sval($row, 'nickname', ''),
            'accountBalance'    => $wm->sval($row, 'balance', '0'),
        ];
    } elseif ($endpointL === 'editcreditaccount') {
        $finalFieldData = [
            'errorClass'            => (string) $errorClass,
            'controlClass'          => (string) $controlClass,
            'redirectURL'           => (string) $redirectURL,
            'cuID'                  => (string) $cuID,
            'cuEmail'               => (string) $cuEmail,
            'accountBeta'           => (string) $beta,
            'accountID'             => (string) $accountID,
            'accountWalletID'       => (string) ($row['wallet_id'] ?? $accountID),
            'accountUserID'         => (string) ($row['user_id'] ?? $cuID),
            'accountUserEmail'      => (string) $cuEmail,
            'accountUsername'       => (string) $cuUsername,
            'accountType'           => 'editCreditAccount',
            'accountTypeText'       => 'Credit Account',
            'accountBank'           => $wm->sval($row, 'bank_name', ''),
            'accountNumber'         => $wm->sval($row, 'account_number', ''),
            'accountName'           => $wm->sval($row, 'nickname', ''),
            'accountNickname'       => $wm->sval($row, 'nickname', ''),
            'accountCreditLimit'    => $wm->sval($row, 'credit_limit', '0'),
            'accountCurrentBalance' => $wm->sval($row, 'current_balance', '0'),
            'accountAvailableBalance'=> $wm->sval($row, 'available_balance', '0'),
            'accountCreditStatus'   => $wm->sval($row, 'credit_status', 'Open'),
            'accountDueDate'        => $wm->sval($row, 'due_date', ''),
            'accountPaymentDue'     => $wm->sval($row, 'payment_due', '0'),
            'accountInterestRate'   => $wm->sval($row, 'interest_rate', '0'),
        ];
    } elseif ($endpointL === 'editdebtaccount') {
        $finalFieldData = [
            'errorClass'            => (string) $errorClass,
            'controlClass'          => (string) $controlClass,
            'redirectURL'           => (string) $redirectURL,
            'cuID'                  => (string) $cuID,
            'cuEmail'               => (string) $cuEmail,
            'accountBeta'           => (string) $beta,
            'accountID'             => (string) $accountID,
            'accountWalletID'       => (string) ($row['wallet_id'] ?? $accountID),
            'accountUserID'         => (string) ($row['user_id'] ?? $cuID),
            'accountUserEmail'      => (string) $cuEmail,
            'accountUsername'       => (string) $cuUsername,
            'accountStatus'         => $wm->sval($row, 'account_status', 'Open'),
            'accountSourceType'     => $wm->sval($row, 'account_type', 'Loan'),
            'accountTypeText'       => 'Debt Account',
            'accountDebtor'         => $wm->sval($row, 'debtor', ''),
            'accountName'           => $wm->sval($row, 'nickname', ''),
            'accountNickname'       => $wm->sval($row, 'nickname', ''),
            'accountNumber'         => $wm->sval($row, 'account_number', ''),
            'accountDueDate'        => $wm->sval($row, 'due_date', ''),
            'accountCreditLimit'    => $wm->sval($row, 'credit_limit', '0'),
            'accountCurrentBalance' => $wm->sval($row, 'current_balance', '0'),
            'accountAvailableBalance'=> $wm->sval($row, 'available_balance', '0'),
            'accountMonthlyPayment' => $wm->sval($row, 'monthly_payment', '0'),
            'accountInterestRate'   => $wm->sval($row, 'interest_rate', '0'),
        ];
    } elseif ($endpointL === 'editinvestaccount') {
        $finalFieldData = [
            'errorClass'          => (string) $errorClass,
            'controlClass'        => (string) $controlClass,
            'redirectURL'         => (string) $redirectURL,
            'cuID'                => (string) $cuID,
            'cuEmail'             => (string) $cuEmail,
            'accountBeta'         => (string) $beta,
            'accountID'           => (string) $accountID,
            'accountWalletID'     => (string) ($row['wallet_id'] ?? $accountID),
            'accountUserID'       => (string) ($row['user_id'] ?? $cuID),
            'accountUserEmail'    => (string) $cuEmail,
            'accountUsername'     => (string) $cuUsername,
            'accountType'         => 'editInvestAccount',
            'accountTypeText'     => 'Investment Account',
            'accountName'         => $wm->sval($row, 'nickname', ''),
            'accountNickname'     => $wm->sval($row, 'nickname', ''),
            'accountBroker'       => $wm->sval($row, 'broker', ''),
            'accountNumber'       => $wm->sval($row, 'account_number', ''),
            'accountAmount'       => $wm->sval($row, 'amount', '0'),
            'accountInitialValue' => $wm->sval($row, 'initial_value', '0'),
            'accountAvailableFunds'=> $wm->sval($row, 'available_funds', '0'),
            'accountNetWorth'     => $wm->sval($row, 'net_worth', '0'),
        ];
    } else {
        echo '<div class="alert alert-danger m-3">Unsupported account type.</div>';
        return;
    }
}

// action (keep your existing route)
$formAction = $formAction ?? site_url("Wallets/Edit/{$finalFieldData['accountType']}/{$finalFieldData['accountID']}");

?>
<div class="modal-header">
  <h3 class="modal-title" id="useCoinModalLabel"><?= esc($addModalTitle) ?></h3>
  <button aria-label="Close" class="close" data-dismiss="modal" type="button">
    <span aria-hidden="true">×</span>
  </button>
</div>

<div class="modal-body">
  <form action="<?= esc($formAction) ?>" id="edit_user_wallet" method="POST">
    <?= csrf_field(); ?>
    <fieldset>
      <?php
        // finally render your partial
        echo view($finalPageView, $finalFieldData);
      ?>
    </fieldset>
  </form>

  <?php if (function_exists('validation_errors') && validation_errors()): ?>
    <div class="alert alert-error fade in">
      <?= validation_errors(); ?>
    </div>
  <?php endif; ?>
</div>

<script <?= $nonce['script'] ?? '' ?>>
document.getElementById('edit_user_wallet')?.addEventListener('submit', async (e) => {
  e.preventDefault();
  const form = e.currentTarget;

  try {
    const res = await fetch(form.action, {
      method: 'POST',
      body: new FormData(form),
      credentials: 'same-origin',
      headers: {'X-Requested-With': 'XMLHttpRequest'}
    });

    let j = {};
    try { j = await res.json(); } catch (_) {}

    if (res.ok && j.status === 'success') {
      // Figure out which card to refresh (prefer hidden field, else parse URL)
      const idField = form.querySelector('[name="account_id"],[name="wallet_id"],[name="accountID"]');
      let targetId  = idField?.value;
      if (!targetId) {
        const m = form.action.match(/\/(\d+)\s*$/);
        targetId = m ? m[1] : null;
      }
      if (targetId) {
        window.dispatchEvent(new CustomEvent('wallet:updated', { detail: { id: Number(targetId) } }));
      }

      // close the modal
      (window.bootstrap?.Modal?.getInstance(document.getElementById('transactionModal'))
        || new (window.bootstrap?.Modal)(document.getElementById('transactionModal'))
      )?.hide();
    } else {
      alert(j.message || 'Update failed');
    }
  } catch (err) {
    alert('Network error. Please try again.');
  }
});
</script>

