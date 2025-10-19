<?php
/** @var array  $userActiveBudgetRecords */
/** @var float  $initialBankBalance */
/** @var string $initialBankBalanceFMT */
/** @var string|null $initialBankBalanceAsOf */
/** @var string|null $asOf */
/** @var float  $creditAvailable */
/** @var string $creditAvailableFMT */

if (!function_exists('miw_is_outflow')) {
    function miw_is_outflow(array $record): bool {
        $type = strtolower(trim($record['account_type'] ?? ($record['type'] ?? '')));
        if ($type !== '') {
            $outflow = ['expense','debt','loan','liability','bill','payment'];
            $inflow  = ['income','salary','wages','paycheck','bonus','deposit','refund','rebate','self-employment'];
            if (in_array($type, $outflow, true)) return true;
            if (in_array($type, $inflow,  true)) return false;
        }
        $src = strtolower($record['source_type'] ?? '');
        if (preg_match('/salary|income|wage|pay(check)?|bonus|deposit|refund|rebate|self-?employment/', $src)) return false;
        return true;
    }
}

$fmtNum  = static fn ($n) => number_format((float)$n, 2, '.', '');
$fmtCash = static fn ($n) => '$' . number_format((float)$n, 2);
$fmtSigned = static function (float $value) use ($fmtCash): string {
    if ($value < 0) {
        return '<span class="statusRed">-' . $fmtCash(abs($value)) . '</span>';
    }

    return $fmtCash($value);
};

$initialBalance = isset($initialBankBalance) ? (float) $initialBankBalance : (float) ($totalAccountBalance ?? 0.0);
$initialBalanceFmt = $initialBankBalanceFMT ?? ($totalAccountBalanceFMT ?? '$0.00');
$initialBalanceAsOf = $initialBankBalanceAsOf ?? ($asOf ?? date('Y-m-d'));

$sumStart = $initialBalance;

/** Sort original records by date ASC so server-side subtotals are sensible on first render */
usort($userActiveBudgetRecords, static function($a, $b) {
    $da = DateTime::createFromFormat('m/d/Y', $a['designated_date'] ?? '') ?: null;
    $db = DateTime::createFromFormat('m/d/Y', $b['designated_date'] ?? '') ?: null;
    if ($da && $db) return $da <=> $db;
    if ($da && !$db) return -1;
    if (!$da && $db) return 1;
    return 0;
});

$running = $sumStart;
$firstOfMonth = new DateTime('first day of this month');

/** helper: epoch at midnight UTC for DataTables numeric sort */
$epochOf = static function (?string $mdy): int {
    $d = DateTime::createFromFormat('m/d/Y', $mdy ?? '');
    if (!$d) return PHP_INT_MAX; // unknown => push to bottom
    $d->setTime(0,0,0);
    return $d->getTimestamp();
};
?>
<div class="card card-bordered">
  <div class="card-inner">
    <div class="d-flex flex-wrap justify-content-end gap-2 mb-3">
      <a class="btn btn-success btn-sm text-white me-md-2" href="<?= site_url('Budget/Add/Income'); ?>">+ Add Income</a>
      <a class="btn btn-danger btn-sm text-white me-md-2" href="<?= site_url('Budget/Add/Expense'); ?>">+ Add Expense</a>
      <a class="btn btn-secondary btn-sm" href="<?= site_url('Budget/History'); ?>">View History</a>
    </div>
    <div class="table-responsive">
      <table class="table table-striped" id="userBudgetingDatatable"
             data-start-sum="<?= htmlspecialchars($sumStart, ENT_QUOTES, 'UTF-8'); ?>">
        <thead>
          <tr>
            <th class="d-none">_bucket</th> <!-- 0 bank, 1 credit, 2 rest -->
            <th>Due Date</th>
            <th class="d-none">Type</th>
            <th>Source</th>
            <th>Category</th>
            <th>Amount</th>
            <th>Subtotal</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>

          <!-- Bucket 0: Bank Accounts (date order = -1 so it never interferes) -->
          <tr data-role="bank">
            <td data-order="0" class="d-none"></td>
            <td data-order="-1">
              <span class="d-none">-1</span>
              <?= $firstOfMonth->format('F jS, Y'); ?>
            </td>
            <td class="d-none"></td>
            <td>
              <span class="badge bg-primary text-white">Bank Accounts</span>
              <small class="text-muted d-block mt-1">Initial Bank Balance as of <?= esc($initialBalanceAsOf); ?></small>
            </td>
            <td></td>
            <td data-order="<?= $fmtNum($initialBalance); ?>"><?= esc($initialBankBalanceFMT ?? $initialBalanceFmt); ?></td>
            <td class="js-subtotal" data-order="<?= $fmtNum($sumStart); ?>"><?= $fmtCash($sumStart); ?></td>
            <td>
              <a class="badge badge-sm bg-success text-white" data-bs-toggle="modal" data-bs-target="#transactionModal" title="Add Bank Account">
                <i class="icon ni ni-plus"></i>
              </a>
              <a class="badge badge-sm bg-primary text-white" href="<?= site_url('Wallets'); ?>" title="Manage Wallets">
                <i class="icon ni ni-edit"></i>
              </a>
            </td>
          </tr>

          <!-- Bucket 1: Credit Accounts (informational; does not change subtotal) -->
          <tr data-role="credit">
            <td data-order="1" class="d-none"></td>
            <td data-order="-1">
              <span class="d-none">-1</span>
              <?= $firstOfMonth->format('F jS, Y'); ?>
            </td>
            <td class="d-none"></td>
            <td><span class="badge bg-warning text-white">Credit Accounts</span></td>
            <td></td>
            <td data-order="<?= $fmtNum($creditAvailable ?? 0); ?>"><?= esc($creditAvailableFMT ?? '$0.00'); ?></td>
            <td class="js-subtotal" data-order="<?= $fmtNum($sumStart); ?>"><?= $fmtCash($sumStart); ?></td>
            <td>
              <a class="badge badge-sm bg-success text-white" data-bs-toggle="modal" data-bs-target="#transactionModal" title="Add Credit Account">
                <i class="icon ni ni-plus"></i>
              </a>
              <a class="badge badge-sm bg-primary text-white" href="<?= site_url('Wallets'); ?>" title="Manage Wallets">
                <i class="icon ni ni-edit"></i>
              </a>
            </td>
          </tr>

          <!-- Bucket 2: Dated entries -->
          <?php foreach ($userActiveBudgetRecords as $account):
                $dateStr  = $account['designated_date'] ?? '';
                $epoch    = $epochOf($dateStr);
                $prettyRaw = $epoch === PHP_INT_MAX
                    ? ($dateStr !== '' ? $dateStr : 'Invalid Date')
                    : date('F jS, Y', $epoch);
                $pretty   = esc($prettyRaw);
                $amount   = (float)($account['net_amount'] ?? 0);
                $isOut    = miw_is_outflow($account);
                $delta    = $isOut ? -$amount : $amount;
                $amountOrder = $fmtNum($delta);

                // server-side subtotal for initial render (will be re-evaluated client-side on sort/search)
                $running += $delta;
                $displaySum = $fmtSigned($running);

                $accountId = (string)($account['id'] ?? '');
                $accountIdUrl = rawurlencode($accountId);

                $paidLink = !empty($account['paid']) ? '' :
                  '<a href="' . site_url('Budget/Status/Paid/' . $accountIdUrl) . '" class="js-mark-paid" title="Mark Paid"><i class="icon myfs-md ni ni-check-thick"></i></a>';          ?>
          <tr data-role="entry"
              data-flow="<?= $isOut ? 'out' : 'in'; ?>"
              data-amount="<?= htmlspecialchars(abs($amount), ENT_QUOTES, 'UTF-8'); ?>">
            <td data-order="2" class="d-none"></td>
            <td data-order="<?= $epoch; ?>">
              <span class="d-none"><?= $epoch; ?></span>
              <?= $pretty; ?>
            </td>
            <td class="d-none"><?= esc($account['account_type'] ?? ''); ?></td>
            <td>
              <a href="<?= site_url('Budget/Details/' . $accountIdUrl); ?>">
                <?= esc($account['name'] ?? ''); ?>
              </a>
            </td>
            <td><?= esc($account['source_type'] ?? ''); ?></td>
            <td data-order="<?= $amountOrder; ?>"><?= $fmtSigned($delta); ?></td>
            <td class="js-subtotal" data-order="<?= $fmtNum($running); ?>"><?= $displaySum; ?></td>
            <td class="js-actions">
              <?= $paidLink; ?>
              <a href="<?= site_url('Budget/Edit/' . $accountIdUrl); ?>" class="js-action" title="Edit"><i class="icon myfs-md ni ni-edit"></i></a>
              <a href="<?= site_url('Budget/Copy/' . $accountIdUrl); ?>" class="js-action" title="Copy"><i class="icon myfs-md ni ni-copy"></i></a>
              <a class="text-red js-action" href="<?= site_url('Budget/Delete-Account/' . $accountIdUrl); ?>" title="Delete"><i class="icon myfs-md ni ni-trash">
            </td>
          </tr>
          <?php endforeach; ?>

        </tbody>
      </table>
    </div>
  </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
(function () {
  // Robust jQuery/DataTables init (avoids "$ is not defined")
  function readyDT(cb) {
    if (window.jQuery && jQuery.fn && (jQuery.fn.DataTable || jQuery.fn.dataTable)) {
      jQuery(cb);
      return true;
    }
    document.addEventListener('DOMContentLoaded', function () {
      if (window.jQuery && jQuery.fn && (jQuery.fn.DataTable || jQuery.fn.dataTable)) jQuery(cb);
    });
    return false;
  }

  readyDT(function ($) {
    var $table = $('#userBudgetingDatatable');
    var table  = $table.DataTable({
      orderFixed: { pre: [[0, 'asc']] },   // keep buckets (bank/credit/entries) fixed
      order: [[1, 'asc']],                 // then date ascending (by numeric epoch)
      columnDefs: [
        { targets: 0, visible: false, searchable: false }, // _bucket hidden
        { targets: 2, visible: false, searchable: true  }, // Type hidden but searchable
        { targets: [1,5,6], type: 'num' }                  // date/amount/subtotal sort numerically (data-order)
      ],
      paging: true,
      searching: true,
      lengthMenu: [[25,50,100,500,-1],[25,50,100,500,'All']],
      info: true
    });

    // Format a number to $x,xxx.xx
    function fmtCash(n) {
      var s = (Math.abs(n).toFixed(2)).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      return (n < 0 ? '-$' + s : '$' + s);
    }

    // Recalculate running subtotal based on VISIBLE order
    function recalcSubtotals() {
      var start = parseFloat($table.data('start-sum')) || 0;
      var nodes = table.rows({ order: 'current', search: 'applied' }).nodes();

      var running = start;
      for (var i = 0; i < nodes.length; i++) {
        var tr = nodes[i];

        // bank row: show the start sum and continue
        if (tr.getAttribute('data-role') === 'bank') {
          var td = tr.querySelector('td.js-subtotal');
          if (td) { td.dataset.order = running.toFixed(2); td.innerHTML = fmtCash(running); }
          continue;
        }

        // credit row: informational only — keep same subtotal as current running
        if (tr.getAttribute('data-role') === 'credit') {
          var tdC = tr.querySelector('td.js-subtotal');
          if (tdC) { tdC.dataset.order = running.toFixed(2); tdC.innerHTML = fmtCash(running); }
          continue;
        }

        // entry rows
        var flow   = tr.getAttribute('data-flow'); // 'in' or 'out'
        var amount = parseFloat(tr.getAttribute('data-amount')) || 0;
        running += (flow === 'out' ? -amount : amount);

        var tdS = tr.querySelector('td.js-subtotal');
        if (tdS) {
          tdS.dataset.order = running.toFixed(2);
          if (running < 0) {
            tdS.innerHTML = '<span class="statusRed">' + fmtCash(running) + '</span>';
          } else {
            tdS.innerHTML = fmtCash(running);
          }
        }
      }
      // tell DataTables we changed order data in-place
      table.rows().invalidate('dom');
    }

    // Initial compute + recompute on any draw/order/search
    recalcSubtotals();
    table.on('order.dt search.dt draw.dt', recalcSubtotals);

    // Prevent “two clicks” by stopping row-level handlers from swallowing anchor clicks
    $table
      .off('click', 'a')
      .on('click', 'a', function (e) { e.stopPropagation(); });

    // Also guard against accidental double-submits
    $(document).on('submit', 'form', function (e) {
      if (this.dataset.submitted === 'true') { e.preventDefault(); return false; }
      this.dataset.submitted = 'true';
    });
  });
})();
</script>
