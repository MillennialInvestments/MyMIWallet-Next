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
    if (!$d) return PHP_INT_MAX;
    $d->setTime(0,0,0);
    return $d->getTimestamp();
};
?>

<div class="card card-bordered">
  <div class="card-inner">
    <div class="d-flex flex-column flex-lg-row justify-content-between align-items-start align-items-lg-center gap-3 mb-3">
        <div class="input-group" style="max-width: 300px; width: 100%;">
            <input
                type="text"
                class="form-control mt-4"
                id="searchInputField"
                value="<?= esc($searchQuery ?? '') ?>"
                placeholder="Search budget..."
            />
            <button class="btn btn-primary mt-4 pb-1" id="redirectSearchBtn" type="button">
                <em class="icon ni ni-search"></em>
            </button>
        </div>

        <div class="d-flex flex-wrap justify-content-lg-end gap-2 w-100 w-lg-auto">
            <a href="#" class="btn btn-success btn-sm text-white dynamicModalLoader" data-formtype="Budget" data-endpoint="Add" data-category="Income" data-accountid="<?= esc($cuID); ?>">+ Add Income</a>
            <a href="#" class="btn btn-danger btn-sm text-white dynamicModalLoader" data-formtype="Budget" data-endpoint="Add" data-category="Expense" data-accountid="<?= esc($cuID); ?>">+ Add Expense</a>
            <a class="btn btn-secondary btn-sm" href="<?= site_url('Budget/History'); ?>">View History</a>
        </div>
    </div>

    <div class="table-responsive mt-5">
      <table class="table table-striped" id="userBudgetingDatatable"
             data-start-sum="<?= htmlspecialchars($sumStart, ENT_QUOTES, 'UTF-8'); ?>">
        <thead>
          <tr>
            <th class="d-none">_bucket</th>
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

            $running += $delta;
            $displaySum = $fmtSigned($running);

            $accountId = (string)($account['id'] ?? '');
            $accountIdInt = (int)($account['id'] ?? 0);
            $accountIdUrl = rawurlencode($accountId);

            $paidLink = !empty($account['paid']) ? '' :
            '<a href="' . site_url('Budget/Status/Paid/' . $accountIdUrl) . '"
                class="js-mark-paid js-action"
                data-account-id="' . $accountIdInt . '"
                title="Mark Paid"
                aria-label="Mark Paid">
                    <i class="icon myfs-md ni ni-check-thick"></i>
            </a>';

            $deleteLink =
            '<a href="' . site_url('Budget/Delete-Account/' . $accountIdUrl) . '"
                class="text-red js-delete-account js-action"
                data-account-id="' . $accountIdInt . '"
                title="Delete"
                aria-label="Delete">
                    <i class="icon myfs-md ni ni-trash"></i>
            </a>';
        ?>
        <tr
            data-role="entry"
            data-budget-row-id="<?= $accountIdInt; ?>"
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
                <a href="<?= site_url('Budget/Edit/' . $accountIdUrl); ?>" class="js-action" title="Edit" aria-label="Edit">
                    <i class="icon myfs-md ni ni-edit"></i>
                </a>
                <a href="<?= site_url('Budget/Copy/' . $accountIdUrl); ?>" class="js-action" title="Copy" aria-label="Copy">
                    <i class="icon myfs-md ni ni-copy"></i>
                </a>
                <?= $deleteLink; ?>
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
    var table  = initDataTableSafe($table, {
      orderFixed: { pre: [[0, 'asc']] },
      order: [[1, 'asc']],
      columnDefs: [
        { targets: 0, visible: false, searchable: false },
        { targets: 2, visible: false, searchable: true },
        { targets: [1, 5, 6], type: 'num' }
      ],
      paging: true,
      searching: true,
      lengthMenu: [[25, 50, 100, 500, -1], [25, 50, 100, 500, 'All']],
      info: true
    });

    function fmtCash(n) {
      var s = (Math.abs(n).toFixed(2)).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
      return (n < 0 ? '-$' + s : '$' + s);
    }

    function recalcSubtotals() {
      var start = parseFloat($table.data('start-sum')) || 0;
      var nodes = table.rows({ order: 'current', search: 'applied' }).nodes();

      var running = start;
      for (var i = 0; i < nodes.length; i++) {
        var tr = nodes[i];

        if (tr.getAttribute('data-role') === 'bank') {
          var tdBank = tr.querySelector('td.js-subtotal');
          if (tdBank) {
            tdBank.dataset.order = running.toFixed(2);
            tdBank.innerHTML = fmtCash(running);
          }
          continue;
        }

        if (tr.getAttribute('data-role') === 'credit') {
          var tdCredit = tr.querySelector('td.js-subtotal');
          if (tdCredit) {
            tdCredit.dataset.order = running.toFixed(2);
            tdCredit.innerHTML = fmtCash(running);
          }
          continue;
        }

        var flow = tr.getAttribute('data-flow');
        var amount = parseFloat(tr.getAttribute('data-amount')) || 0;

        running += (flow === 'out' ? -amount : amount);

        var td = tr.querySelector('td.js-subtotal');
        if (td) {
          td.dataset.order = running.toFixed(2);
          td.innerHTML = running < 0
            ? '<span class="statusRed">' + fmtCash(running) + '</span>'
            : fmtCash(running);
        }
      }

      table.rows().invalidate('dom');
    }

    function bindSearchRedirect() {
      var searchBtn = document.getElementById('redirectSearchBtn');
      var searchInput = document.getElementById('searchInputField');
      var searchBaseUrl = "<?= rtrim(site_url('Budget/Search'), '/') ?>/";
      var budgetUrl = "<?= site_url('Budget') ?>";

      function runBudgetSearch() {
        var val = (searchInput && searchInput.value ? searchInput.value : '').trim();

        if (val !== '') {
          window.location.href = searchBaseUrl + encodeURIComponent(val);
        } else {
          window.location.href = budgetUrl;
        }
      }

      if (searchBtn && !searchBtn.dataset.boundSearch) {
        searchBtn.dataset.boundSearch = 'true';
        searchBtn.addEventListener('click', function (e) {
          e.preventDefault();
          runBudgetSearch();
        });
      }

      if (searchInput && !searchInput.dataset.boundSearch) {
        searchInput.dataset.boundSearch = 'true';
        searchInput.addEventListener('keydown', function (e) {
          if (e.key === 'Enter') {
            e.preventDefault();
            runBudgetSearch();
          }
        });
      }
    }

    function bindRowActions() {
      $table.find('.js-mark-paid').off('click.budgetPaid').on('click.budgetPaid', function (e) {
        e.preventDefault();
        e.stopPropagation();

        var $link = $(this);
        var url = $link.attr('href');
        var accountId = String($link.data('account-id') || '');
        var rowNode = document.querySelector('[data-budget-row-id="' + accountId + '"]');

        if (!url || !accountId || !rowNode) {
          return false;
        }

        if ($link.data('busy') === true) {
          return false;
        }

        $link.data('busy', true).css({
          pointerEvents: 'none',
          opacity: 0.5
        });

        $.ajax({
          url: url,
          type: 'GET',
          headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
          },
          xhrFields: {
            withCredentials: true
          }
        }).done(function (response) {
          if (!response || response.status !== 'success') {
            throw new Error((response && response.message) ? response.message : 'Mark paid failed.');
          }

          table.row($(rowNode)).remove().draw(false);
          recalcSubtotals();
        }).fail(function (xhr) {
          console.error('Mark paid request failed:', xhr);
          window.location.reload();
        }).always(function () {
          $link.data('busy', false).css({
            pointerEvents: '',
            opacity: ''
          });
        });

        return false;
      });

      $table.find('.js-delete-account').off('click.budgetDelete').on('click.budgetDelete', function (e) {
        e.preventDefault();
        e.stopPropagation();

        var $link = $(this);
        var url = $link.attr('href');
        var accountId = String($link.data('account-id') || '');
        var rowNode = document.querySelector('[data-budget-row-id="' + accountId + '"]');

        if (!url || !accountId || !rowNode) {
          return false;
        }

        if (!window.confirm('Are you sure you want to delete this account?')) {
          return false;
        }

        if ($link.data('busy') === true) {
          return false;
        }

        $link.data('busy', true).css({
          pointerEvents: 'none',
          opacity: 0.5
        });

        $.ajax({
          url: url,
          type: 'GET',
          headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
          },
          xhrFields: {
            withCredentials: true
          }
        }).done(function (response) {
          if (!response || response.status !== 'success') {
            throw new Error((response && response.message) ? response.message : 'Delete failed.');
          }

          table.row($(rowNode)).remove().draw(false);
          recalcSubtotals();
        }).fail(function (xhr) {
          console.error('Delete request failed:', xhr);
          window.location.reload();
        }).always(function () {
          $link.data('busy', false).css({
            pointerEvents: '',
            opacity: ''
          });
        });

        return false;
      });
    }

    recalcSubtotals();
    bindSearchRedirect();
    bindRowActions();

    table.on('order.dt search.dt draw.dt', function () {
      recalcSubtotals();
      bindRowActions();
    });

    $table.off('click', 'a').on('click', 'a', function (e) {
      e.stopPropagation();
    });

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