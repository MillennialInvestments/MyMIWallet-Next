<?php
/** @var array $userActiveBudgetRecords */
/** @var float $totalAccountBalance */
/** @var string $totalAccountBalanceFMT */
/** @var float $creditAvailable */
/** @var string $creditAvailableFMT */

// helper from index.php might not be loaded when this view is rendered directly
if (!function_exists('miw_is_outflow')) {
    function miw_is_outflow(array $record): bool {
        $type = strtolower(trim($record['account_type'] ?? ($record['type'] ?? '')));
        if ($type !== '') {
            $outflowTypes = ['expense','debt','loan','liability','bill','payment'];
            if (in_array($type, $outflowTypes, true)) { return true; }
            $inflowTypes = ['income','salary','wages','paycheck','bonus','deposit','refund','rebate','self-employment'];
            if (in_array($type, $inflowTypes, true)) { return false; }
        }
        $src = strtolower($record['source_type'] ?? '');
        if (preg_match('/salary|income|wage|paycheck|bonus|deposit|refund|rebate|self-?employment/', $src)) {
            return false;
        }
        return true;
    }
}

// Running subtotal starts at current bank balance if provided
$sum = (float) ($totalAccountBalance ?? 0);
$firstOfMonth = new DateTime('first day of this month');
?>
<div class="card card-bordered">
  <div class="card-inner">
    <div class="table-responsive">
      <table class="table table-striped" id="userBudgetingDatatable">
        <thead>
          <tr>
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

          <!-- Opening rows reflecting current balances -->
          <tr>
            <td data-order="<?= $firstOfMonth->format('Y-m-d'); ?>"><?= $firstOfMonth->format('F jS, Y'); ?></td>
            <td class="d-none"></td>
            <td><span class="badge bg-primary text-white">Bank Accounts</span></td>
            <td></td>
            <td><?= esc($totalAccountBalanceFMT ?? '$0.00'); ?></td>
            <td><?= '$' . number_format($sum, 2); ?></td>
            <td>
              <a class="badge badge-sm bg-success text-white addBankAccount" data-bs-toggle="modal" data-bs-target="#transactionModal">
                <i class="icon ni ni-plus"></i>
              </a>
              <a class="badge badge-sm bg-primary text-white" href="<?= site_url('Wallets'); ?>">
                <i class="icon ni ni-edit"></i>
              </a>
            </td>
          </tr>
          <tr>
            <td data-order="<?= $firstOfMonth->format('Y-m-d'); ?>"><?= $firstOfMonth->format('F jS, Y'); ?></td>
            <td class="d-none"></td>
            <td><span class="badge bg-warning text-white">Credit Accounts</span></td>
            <td></td>
            <td><?= esc($creditAvailableFMT ?? '$0.00'); ?></td>
            <td><?= '$' . number_format($sum, 2); ?></td>
            <td>
              <a class="badge badge-sm bg-success text-white addBankAccount" data-bs-toggle="modal" data-bs-target="#transactionModal">
                <i class="icon ni ni-plus"></i>
              </a>
              <a class="badge badge-sm bg-primary text-white" href="<?= site_url('Wallets'); ?>">
                <i class="icon ni ni-edit"></i>
              </a>
            </td>
          </tr>

          <?php foreach ($userActiveBudgetRecords as $account):
              $dateStr = $account['designated_date'] ?? '';
              $dObj = DateTime::createFromFormat('m/d/Y', $dateStr);
              $iso = $dObj ? $dObj->format('Y-m-d') : '';
              $pretty = $dObj ? $dObj->format('F jS, Y') : esc($dateStr);

              $amount = (float) ($account['net_amount'] ?? 0);
              $delta = miw_is_outflow($account) ? -$amount : $amount;
              $sum += $delta;

              $displaySum = $sum >= 0
                  ? '$' . number_format($sum, 2)
                  : '<span class="statusRed">-$' . number_format(abs($sum), 2) . '</span>';

              $accountPaidStatus = !empty($account['paid'])
                  ? ''
                  : '<a href="' . site_url('Budget/Status/Paid/' . $account['id']) . '"><i class="icon myfs-md ni ni-check-thick"></i></a>';
          ?>
          <tr>
            <td data-order="<?= $iso; ?>"><?= $pretty; ?></td>
            <td class="d-none"><?= esc($account['account_type'] ?? ''); ?></td>
            <td>
              <a href="<?= site_url('Budget/Details/' . $account['id']); ?>">
                <?= esc($account['name'] ?? ''); ?>
              </a>
            </td>
            <td><?= esc($account['source_type'] ?? ''); ?></td>
            <td>$<?= number_format($amount, 2); ?></td>
            <td><?= $displaySum; ?></td>
            <td>
              <?= $accountPaidStatus; ?>
              <a href="<?= site_url('Budget/Edit/' . $account['id']); ?>"><i class="icon myfs-md ni ni-edit"></i></a>
              <a href="<?= site_url('Budget/Copy/' . $account['id']); ?>"><i class="icon myfs-md ni ni-copy"></i></a>
              <a class="text-red" href="<?= site_url('Budget/Delete-Account/' . $account['id']); ?>"><i class="icon myfs-md ni ni-trash"></i></a>
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
// Safe DataTables init: supports jQuery or DataTables 2.x (no jQuery)
document.addEventListener('DOMContentLoaded', function () {
  var el = document.getElementById('userBudgetingDatatable');
  if (!el) return;

  var options = {
    paging: true,
    searching: true,
    ordering: true,
    order: [[0,'asc']],
    lengthMenu: [[25, 50, 100, 500, -1], [25, 50, 100, 500, "All"]],
    info: true
  };

  if (window.jQuery && jQuery.fn && jQuery.fn.DataTable) {
    // jQuery DataTables path
    if (!jQuery.fn.dataTable.isDataTable(el)) {
      jQuery(el).DataTable(options);
    }
  } else if (typeof window.DataTable === 'function') {
    // No-jQuery DataTables 2.x path
    if (!el.classList.contains('dt-initialized')) {
      new DataTable(el, options);
      el.classList.add('dt-initialized');
    }
  } else {
    console.warn('DataTables (jQuery or 2.x) is not loaded on this page.');
  }
});
</script>
