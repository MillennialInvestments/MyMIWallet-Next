<style <?= $nonce['style'] ?? '' ?>>
    /* Custom scrollbar for table */
    .table-responsive::-webkit-scrollbar {
        height: 8px;
    }

    .table-responsive::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 4px;
    }

    .table-responsive::-webkit-scrollbar-thumb:hover {
        background: #555;
    }
</style>
<?php
if (!function_exists('miw_is_outflow')) {
    function miw_is_outflow(array $record): bool {
        $type = strtolower(trim($record['account_type'] ?? ($record['type'] ?? '')));
        if ($type !== '') {
            $outflow = ['expense','debt','loan','liability','bill','payment'];
            $inflow  = ['income','salary','wages','paycheck','bonus','deposit','refund','rebate','self-employment'];
            if (in_array($type, $outflow, true)) {
                return true;
            }
            if (in_array($type, $inflow, true)) {
                return false;
            }
        }

        $src = strtolower($record['source_type'] ?? '');
        if (preg_match('/salary|income|wage|pay(check)?|bonus|deposit|refund|rebate|self-?employment/', $src)) {
            return false;
        }

        return true;
    }
}

$isMobile  = !empty($userAgent) && method_exists($userAgent, 'isMobile') && $userAgent->isMobile();
$isBrowser = !empty($userAgent) && method_exists($userAgent, 'isBrowser') && $userAgent->isBrowser();

$fmtNum    = static fn ($n) => number_format((float) $n, 2, '.', '');
$fmtCash   = static fn ($n) => '$' . number_format((float) $n, 2);
$fmtSigned = static function (float $value) use ($fmtCash): string {
    if ($value < 0) {
        return '<span class="statusRed">-' . $fmtCash(abs($value)) . '</span>';
    }

    return $fmtCash($value);
};

$sumStart = (float) ($totalAccountBalance ?? 0.0);
if ($sumStart === 0.0 && isset($checkingSummary)) {
    $sumStart = (float) $checkingSummary;
}
$creditValue = (float) ($creditAvailable ?? 0.0);

$firstOfMonth = new DateTime('first day of this month');

$epochOf = static function (?string $mdy) {
    $d = DateTime::createFromFormat('m/d/Y', $mdy ?? '');
    if ($d instanceof DateTime) {
        $d->setTime(0, 0, 0);
        return $d->getTimestamp();
    }
    return PHP_INT_MAX;
};

$parseDate = static function (array $record) use ($epochOf) {
    $dateStr = $record['designated_date'] ?? '';
    $epoch   = $epochOf($dateStr);

    if ($epoch !== PHP_INT_MAX) {
        return [$epoch, date('F jS, Y', $epoch)];
    }

    $year  = (int) ($record['year'] ?? 0);
    $month = (int) ($record['month'] ?? 0);
    $day   = (int) ($record['day'] ?? 0);
    if ($year > 0 && $month > 0 && $day > 0) {
        $dt = DateTime::createFromFormat('Y-n-j', sprintf('%d-%d-%d', $year, $month, $day));
        if ($dt instanceof DateTime) {
            $dt->setTime(0, 0, 0);
            return [$dt->getTimestamp(), $dt->format('F jS, Y')];
        }
    }

    return [PHP_INT_MAX, 'Invalid Date'];
};

usort($userActiveBudgetRecords, static function ($a, $b) use ($parseDate) {
    [$epochA] = $parseDate($a);
    [$epochB] = $parseDate($b);

    if ($epochA === $epochB) {
        return 0;
    }

    return $epochA <=> $epochB;
});

$running = $sumStart;
$amountColumnIndex   = $isMobile ? 5 : 7;
$subtotalColumnIndex = $isMobile ? 6 : 8;
?>
<?php if ($isMobile): ?>
<div class="table-responsive">
<?php else: ?>
<div>
<?php endif; ?>
  <div class="d-flex flex-wrap justify-content-end gap-2 mb-3">
    <a class="btn btn-success btn-sm text-white me-md-2" href="<?= site_url('Budget/Add/Income'); ?>">+ Add Income</a>
    <a class="btn btn-danger btn-sm text-white me-md-2" href="<?= site_url('Budget/Add/Expense'); ?>">+ Add Expense</a>
    <a class="btn btn-secondary btn-sm" href="<?= site_url('Budget/History'); ?>">View History</a>
  </div>
  <table class="table table-default budgeting-table default" id="userBudgetingDatatable"
         data-start-sum="<?= htmlspecialchars($sumStart, ENT_QUOTES, 'UTF-8'); ?>">
    <thead>
      <?php if ($isMobile): ?>
        <tr>
          <th class="d-none"></th>
          <th class="d-none"></th>
          <th>All <input type="checkbox" id="selectAll"></th>
          <th>Due Date</th>
          <th>Account</th>
          <th>Amount</th>
          <th>Subtotal</th>
        </tr>
      <?php else: ?>
        <tr>
          <th class="d-none"></th>
          <th class="d-none"></th>
          <th>All <input type="checkbox" id="selectAll"></th>
          <th>Due Date</th>
          <th>Account</th>
          <th>Source</th>
          <th>YTD</th>
          <th>Amount</th>
          <th>Subtotal</th>
          <th>Actions</th>
        </tr>
      <?php endif; ?>
    </thead>
    <tbody>
      <tr data-role="bank">
        <td class="d-none" data-order="0"></td>
        <td class="d-none"></td>
        <td></td>
        <td data-order="<?= $firstOfMonth->getTimestamp(); ?>"><?= esc($firstOfMonth->format('F jS, Y')); ?></td>
        <td><a class="badge badge-sm rounded-pill bg-primary text-white px-4" href="<?= site_url('/Wallets'); ?>">Bank Accounts</a></td>
        <?php if (!$isMobile): ?>
          <td class="d-none d-lg-block"></td>
          <td></td>
        <?php endif; ?>
        <?php if ($isMobile): ?>
          <td data-order="<?= $fmtNum($sumStart); ?>"><?= $fmtSigned($sumStart); ?></td>
          <td class="js-subtotal" data-order="<?= $fmtNum($sumStart); ?>"><?= $fmtSigned($sumStart); ?></td>
        <?php else: ?>
          <td data-order="<?= $fmtNum($sumStart); ?>"><?= $fmtSigned($sumStart); ?></td>
          <td class="js-subtotal" data-order="<?= $fmtNum($sumStart); ?>"><?= $fmtSigned($sumStart); ?></td>
          <td>
            <a class="badge badge-sm rounded-pill bg-success text-white addBankAccount" data-bs-toggle="modal" data-bs-target="#transactionModal"><i class="icon ni ni-plus"></i></a>
            <a class="badge badge-sm rounded-pill bg-primary text-white" href="<?= site_url('Wallets'); ?>"><i class="icon ni ni-edit"></i></a>
          </td>
        <?php endif; ?>
      </tr>
      <tr data-role="credit">
        <td class="d-none" data-order="1"></td>
        <td class="d-none"></td>
        <td></td>
        <td data-order="<?= $firstOfMonth->getTimestamp(); ?>"><?= esc($firstOfMonth->format('F jS, Y')); ?></td>
        <td><a class="badge badge-sm rounded-pill bg-warning text-white px-4" href="<?= site_url('/Wallets'); ?>">Credit Accounts</a></td>
        <?php if (!$isMobile): ?>
          <td class="d-none d-lg-block"></td>
          <td></td>
        <?php endif; ?>
        <?php if ($isMobile): ?>
          <td data-order="<?= $fmtNum($creditValue); ?>"><?= $fmtSigned($creditValue); ?></td>
          <td class="js-subtotal" data-order="<?= $fmtNum($sumStart); ?>"><?= $fmtSigned($sumStart); ?></td>
        <?php else: ?>
          <td data-order="<?= $fmtNum($creditValue); ?>"><?= $fmtSigned($creditValue); ?></td>
          <td class="js-subtotal" data-order="<?= $fmtNum($sumStart); ?>"><?= $fmtSigned($sumStart); ?></td>
          <td>
            <a class="badge badge-sm rounded-pill bg-success text-white addBankAccount" data-bs-toggle="modal" data-bs-target="#transactionModal"><i class="icon ni ni-plus"></i></a>
            <a class="badge badge-sm rounded-pill bg-primary text-white" href="<?= site_url('Wallets'); ?>"><i class="icon ni ni-edit"></i></a>
          </td>
        <?php endif; ?>
      </tr>
      <?php foreach ($userActiveBudgetRecords as $account): ?>
        <?php
          [$epoch, $displayDate] = $parseDate($account);
          $amount = (float) ($account['net_amount'] ?? 0);
          $isOut  = miw_is_outflow($account);
          $delta  = $isOut ? -$amount : $amount;
          $running += $delta;
          $accountId    = (string) ($account['id'] ?? '');
          $accountIdUrl = rawurlencode($accountId);
          $name         = $account['name'] ?? '';
          $sourceType   = $account['source_type'] ?? '';
        ?>
        <tr data-role="entry" data-flow="<?= $isOut ? 'out' : 'in'; ?>" data-amount="<?= htmlspecialchars(abs($amount), ENT_QUOTES, 'UTF-8'); ?>">
          <td class="d-none" data-order="2"></td>
          <td class="d-none"><?= esc($account['account_type'] ?? ''); ?></td>
          <td><input type="checkbox" class="rowCheckbox" value="<?= esc($accountId); ?>"></td>
          <td data-order="<?= $epoch; ?>"><?= esc($displayDate); ?></td>
          <td><a href="<?= site_url('Budget/Details/' . $accountIdUrl); ?>"><?= esc($name); ?></a></td>
          <?php if (!$isMobile): ?>
            <td><?= esc($sourceType); ?></td>
            <td class="ytd-total-cell" data-name="<?= esc($name); ?>"></td>
          <?php endif; ?>
          <td data-order="<?= $fmtNum($delta); ?>"><?= $fmtSigned($delta); ?></td>
          <td class="js-subtotal" data-order="<?= $fmtNum($running); ?>"><?= $fmtSigned($running); ?></td>
          <?php if (!$isMobile): ?>
            <td>
              <?php if (empty($account['paid'])): ?>
                <a href="<?= site_url('Budget/Status/Paid/' . $accountIdUrl); ?>" title="Mark Paid"><i class="icon myfs-md ni ni-check-thick"></i></a>
              <?php endif; ?>
              <a href="<?= site_url('Budget/Edit/' . $accountIdUrl); ?>"><i class="icon ni ni-edit"></i></a>
              <a href="<?= site_url('Budget/Copy/' . $accountIdUrl); ?>"><i class="icon ni ni-copy"></i></a>
              <a class="text-red" href="<?= site_url('Budget/Delete-Account/' . $accountIdUrl); ?>"><i class="icon ni ni-trash"></i></a>
            </td>
          <?php endif; ?>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<script <?= $nonce['script'] ?? '' ?>>
(function () {
  function readyDT(cb) {
    if (window.jQuery && jQuery.fn && (jQuery.fn.DataTable || jQuery.fn.dataTable)) {
      jQuery(cb);
      return true;
    }
    document.addEventListener('DOMContentLoaded', function () {
      if (window.jQuery && jQuery.fn && (jQuery.fn.DataTable || jQuery.fn.dataTable)) {
        jQuery(cb);
      }
    });
    return false;
  }

  readyDT(function ($) {
    var $table = $('#userBudgetingDatatable');
    if ($table.length === 0) {
      return;
    }

    var table = $table.DataTable({
      orderFixed: { pre: [[0, 'asc']] },
      order: [[3, 'asc']],
      columnDefs: [
        { targets: [0, 1], visible: false, searchable: false },
        { targets: 3, type: 'num' },
        { targets: <?= $amountColumnIndex; ?>, type: 'num' },
        { targets: <?= $subtotalColumnIndex; ?>, type: 'num' }
      ],
      paging: true,
      searching: true,
      lengthMenu: [[25, 50, 100, 500, -1], [25, 50, 100, 500, 'All']],
      info: true
    });

    function fmtCash(n) {
      var abs = Math.abs(n).toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
      return (n < 0 ? '-$' + abs : '$' + abs);
    }

    function recalc() {
      var start = parseFloat($table.data('start-sum')) || 0;
      var nodes = table.rows({ order: 'current', search: 'applied' }).nodes();
      var running = start;

      for (var i = 0; i < nodes.length; i++) {
        var tr = nodes[i];
        var role = tr.getAttribute('data-role');
        var subtotalCell = tr.querySelector('td.js-subtotal');

        if (role === 'bank') {
          if (subtotalCell) {
            subtotalCell.dataset.order = start.toFixed(2);
            subtotalCell.innerHTML = fmtCash(start);
          }
          continue;
        }

        if (role === 'credit') {
          if (subtotalCell) {
            subtotalCell.dataset.order = running.toFixed(2);
            subtotalCell.innerHTML = fmtCash(running);
          }
          continue;
        }

        var amount = parseFloat(tr.getAttribute('data-amount')) || 0;
        var flow = tr.getAttribute('data-flow');
        running += (flow === 'out' ? -amount : amount);

        if (subtotalCell) {
          subtotalCell.dataset.order = running.toFixed(2);
          if (running < 0) {
            subtotalCell.innerHTML = '<span class="statusRed">' + fmtCash(running) + '</span>';
          } else {
            subtotalCell.innerHTML = fmtCash(running);
          }
        }
      }

      table.rows().invalidate('dom');
    }

    recalc();
    table.on('order.dt search.dt draw.dt', recalc);

    $table.off('click', 'a').on('click', 'a', function (e) {
      e.stopPropagation();
    });

    var $selectAll = $('#selectAll');
    if ($selectAll.length) {
      $selectAll.on('change', function () {
        var checked = this.checked;
        $table.find('tbody .rowCheckbox').prop('checked', checked);
      });
    }

    $(document).on('submit', 'form', function (e) {
      if (this.dataset.submitted === 'true') {
        e.preventDefault();
        return false;
      }
      this.dataset.submitted = 'true';
    });
  });
})();
</script>