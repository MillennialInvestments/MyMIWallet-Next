<?php
/** @var array  $userActiveBudgetRecords */
/** @var float  $initialBankBalance */
/** @var string $initialBankBalanceFMT */
/** @var string|null $initialBankBalanceAsOf */
/** @var string|null $asOf */
/** @var float  $creditAvailable */
/** @var string $creditAvailableFMT */
/** @var mixed  $cuID */

if (!function_exists('miw_is_outflow')) {
    function miw_is_outflow(array $record): bool {
        $type = strtolower(trim($record['account_type'] ?? ($record['type'] ?? '');
        if ($type !== '') {
            $out = ['expense','debt','loan','liability','bill','payment'];
            $in  = ['income','salary','wages','paycheck','bonus','deposit','refund','rebate','self-employment'];
            if (in_array($type, $out, true)) return true;
            if (in_array($type, $in,  true)) return false;
        }
        $src = strtolower($record['source_type'] ?? '');
        if (preg_match('/salary|income|wage|pay(check)?|bonus|deposit|refund|rebate|self-?employment/', $src)) return false;
        return true;
    }
}

$fmtNum  = static fn ($n) => number_format((float)$n, 2, '.', '');
$fmtCash = static fn ($n) => '$' . number_format((float)$n, 2);

$initialBalance = isset($initialBankBalance) ? (float) $initialBankBalance : (float) ($totalAccountBalance ?? 0.0);
$initialBalanceFmt = $initialBankBalanceFMT ?? ($totalAccountBalanceFMT ?? '$0.00');
$initialBalanceAsOf = $initialBankBalanceAsOf ?? ($asOf ?? date('Y-m-d'));

$sumStart = $initialBalance;                // Money in hand starts from Bank balance only
$creditAmt = (float)($creditAvailable ?? 0.0);                   // Informational; does not change subtotal

// Sort records by date ASC for initial server render (client JS will re-evaluate on sort/search)
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

$epochOf = static function (?string $mdy): int {
    $d = DateTime::createFromFormat('m/d/Y', $mdy ?? '');
    if (!$d) return PHP_INT_MAX; // unknown => bottom
    $d->setTime(0,0,0);
    return $d->getTimestamp();
};
?>
<style <?= $nonce['style'] ?? '' ?>>
  /* Mobile-first tweaks */
  #userBudgetingDatatable { font-size: 0.95rem; }
  #userBudgetingDatatable th, #userBudgetingDatatable td { vertical-align: middle; }
  .table-wrap { overflow-x: auto; -webkit-overflow-scrolling: touch; }
  .dt-control { width: 36px; text-align: center; }
  .dt-control .toggle { width: 28px; height: 28px; line-height: 28px; border-radius: 999px; display: inline-flex; align-items: center; justify-content: center; border: 1px solid #e5e7eb; }
  .dt-control .toggle i { font-size: 14px; }
  .amount, .subtotal { text-align: right; white-space: nowrap; }
  .badge { font-size: .75rem; }
  .statusRed { color: #e85347; font-weight: 600; }
  @media (max-width: 480px) {
    .col-compact { padding-left: .35rem; padding-right: .35rem; }
    #userBudgetingDatatable th, #userBudgetingDatatable td { padding-top: .45rem; padding-bottom: .45rem; }
  }
  /* Child row card */
  .child-card { background:#fcfcfd; border:1px solid #eef0f3; border-radius:.5rem; padding:.75rem; }
  .child-row { padding: .4rem .6rem; }
  .child-row .label { color:#6b7280; font-size:.8rem; }
  .child-row .value { font-weight:600; }
  .child-actions a { margin-right:.35rem; display:inline-block; }
</style>

<div class="card h-100">
  <div class="card-inner px-2 px-lg-4">
    <div class="nk-order-ovwg">
      <div class="row g-3 align-items-center">
        <div class="col-12">
          <div class="d-flex align-items-center justify-content-between flex-wrap">
            <div class="mb-2">
              <h6 class="title mb-0">Monthly Financial Overview</h6>
              <small class="text-muted">Tap a row to view details & actions</small>
            </div>
            <div class="d-flex gap-2">
              <a class="btn btn-success btn-xs text-white dynamicModalLoader" data-formtype="Budget" data-endpoint="Add" data-category="Income" data-accountid="<?= esc($cuID); ?>">
                <i class="icon ni ni-plus"></i> Income
              </a>
              <a class="btn btn-danger btn-xs text-white dynamicModalLoader" data-formtype="Budget" data-endpoint="Add" data-category="Expense" data-accountid="<?= esc($cuID); ?>">
                <i class="icon ni ni-plus"></i> Expense
              </a>
              <a class="btn btn-outline-secondary btn-xs" href="<?= site_url('Budget/History'); ?>">
                <i class="icon ni ni-history"></i> History
              </a>
            </div>
          </div>

          <div class="table-wrap mt-2">
            <table class="table table-striped" id="userBudgetingDatatable"
                   data-start-sum="<?= htmlspecialchars($sumStart, ENT_QUOTES, 'UTF-8'); ?>">
              <thead>
                <tr>
                  <th class="dt-control"></th>
                  <th class="d-none">_bucket</th> <!-- 0 bank, 1 credit, 2 rest -->
                  <th>Due</th>
                  <th>Account</th>
                  <th class="amount">Amount</th>
                  <th class="subtotal">Subtotal</th>
                </tr>
              </thead>
              <tbody>

                <!-- Bank row (bucket 0; date order -1 so it never interferes) -->
                <tr data-role="bank">
                  <td class="dt-control"><button class="toggle btn btn-sm btn-light"><i class="ni ni-plus"></i></button></td>
                  <td data-order="0" class="d-none"></td>
                  <td data-order="-1">
                    <span class="d-none">-1</span><?= $firstOfMonth->format('M j, Y'); ?>
                  </td>
                  <td>
                    <span class="badge bg-primary text-white">Bank Accounts</span>
                    <div class="text-muted small mt-1">Initial Bank Balance as of <?= esc($initialBalanceAsOf); ?></div>
                  </td>
                  <td class="amount" data-order="<?= $fmtNum($sumStart); ?>"><?= esc($initialBankBalanceFMT ?? $initialBalanceFmt); ?></td>
                  <td class="subtotal js-subtotal" data-order="<?= $fmtNum($sumStart); ?>"><?= $fmtCash($sumStart); ?></td>
                </tr>

                <!-- Credit row (bucket 1; informational only) -->
                <tr data-role="credit">
                  <td class="dt-control"><button class="toggle btn btn-sm btn-light"><i class="ni ni-plus"></i></button></td>
                  <td data-order="1" class="d-none"></td>
                  <td data-order="-1">
                    <span class="d-none">-1</span><?= $firstOfMonth->format('M j, Y'); ?>
                  </td>
                  <td><span class="badge bg-warning text-white">Credit Accounts</span></td>
                  <td class="amount" data-order="<?= $fmtNum($creditAmt); ?>"><?= esc($creditAvailableFMT ?? '$0.00'); ?></td>
                  <td class="subtotal js-subtotal" data-order="<?= $fmtNum($sumStart); ?>"><?= $fmtCash($sumStart); ?></td>
                </tr>

                <!-- Dated entries (bucket 2) -->
                <?php foreach ($userActiveBudgetRecords as $r):
                    $dateStr = $r['designated_date'] ?? '';
                    $epoch   = $epochOf($dateStr);
                    $pretty  = ($epoch === PHP_INT_MAX) ? esc($dateStr) : date('M j, Y', $epoch);
                    $amount  = (float)($r['net_amount'] ?? 0);
                    $isOut   = miw_is_outflow($r);
                    $delta   = $isOut ? -$amount : $amount;

                    $running += $delta;
                    $displaySum = $running >= 0
                        ? $fmtCash($running)
                        : '<span class="statusRed">-' . $fmtCash(abs($running)) . '</span>';

                    $paid = !empty($r['paid']);
                    $id   = (int)($r['id'] ?? 0);
                    $type = esc($r['account_type'] ?? '');
                    $name = esc($r['name'] ?? '');
                    $cat  = esc($r['source_type'] ?? '');
                ?>
                <tr data-role="entry"
                    data-flow="<?= $isOut ? 'out' : 'in'; ?>"
                    data-amount="<?= htmlspecialchars($amount, ENT_QUOTES, 'UTF-8'); ?>"
                    data-id="<?= $id; ?>"
                    data-type="<?= $type; ?>"
                    data-name="<?= $name; ?>"
                    data-cat="<?= $cat; ?>"
                    data-date="<?= $pretty; ?>"
                    data-paid="<?= $paid ? '1' : '0'; ?>">
                  <td class="dt-control">
                    <button class="toggle btn btn-sm btn-light"><i class="ni ni-plus"></i></button>
                  </td>
                  <td data-order="2" class="d-none"></td>
                  <td data-order="<?= $epoch; ?>"><span class="d-none"><?= $epoch; ?></span><?= $pretty; ?></td>
                  <td><?= $name; ?></td>
                  <td class="amount" data-order="<?= $fmtNum($amount); ?>"><?= $fmtCash($amount); ?></td>
                  <td class="subtotal js-subtotal" data-order="<?= $fmtNum($running); ?>"><?= $displaySum; ?></td>
                </tr>
                <?php endforeach; ?>

              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
(function(){
  // Safe jQuery/DataTables boot
  function readyDT(cb) {
    function run(){ if (window.jQuery && (jQuery.fn.DataTable || jQuery.fn.dataTable)) jQuery(cb); }
    if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', run); else run();
  }

  readyDT(function($){
    var $table = $('#userBudgetingDatatable');

    // Currency formatter
    function fmtCash(n) {
      var s = (Math.abs(n).toFixed(2)).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
      return (n < 0 ? '-$' + s : '$' + s);
    }

    // Build child row HTML for a given <tr>
    function buildChildHTML(tr){
      var $tr = $(tr);
      var role   = $tr.attr('data-role') || '';
      var id     = $tr.data('id') || '';
      var type   = $tr.data('type') || '';
      var name   = $tr.data('name') || (role === 'bank' ? 'Bank Accounts' : (role === 'credit' ? 'Credit Accounts' : ''));
      var cat    = $tr.data('cat') || (role === 'credit' ? 'Credit' : (role === 'bank' ? 'Bank' : ''));
      var date   = $tr.data('date') || $tr.find('td').eq(2).text().trim();
      var paid   = String($tr.data('paid') || '0') === '1';
      var amountTxt = $tr.find('td.amount').text().trim();

      var actions = '';
      if (role === 'entry' && id) {
        if (!paid) {
          actions += '<a href="<?= site_url('Budget/Status/Paid/'); ?>'+id+'" class="btn btn-success btn-xs text-white me-1"><i class="ni ni-check-thick"></i> Paid</a>';
        }
        actions += '<a href="<?= site_url('Budget/Edit/'); ?>'+id+'" class="btn btn-primary btn-xs me-1"><i class="ni ni-edit"></i> Edit</a>';
        actions += '<a href="<?= site_url('Budget/Copy/'); ?>'+id+'" class="btn btn-secondary btn-xs me-1"><i class="ni ni-copy"></i> Copy</a>';
        actions += '<a href="<?= site_url('Budget/Delete-Account/'); ?>'+id+'" class="btn btn-danger btn-xs text-white"><i class="ni ni-trash"></i> Delete</a>';
      } else if (role === 'bank' || role === 'credit') {
        actions += '<a class="btn btn-success btn-xs text-white me-1" data-bs-toggle="modal" data-bs-target="#transactionModal"><i class="ni ni-plus"></i> Add</a>';
        actions += '<a href="<?= site_url('Wallets'); ?>" class="btn btn-primary btn-xs"><i class="ni ni-edit"></i> Manage</a>';
      }

      return ''+
      '<div class="child-card">'+
        '<div class="child-row"><span class="label">Account:</span> <span class="value">'+name+'</span></div>'+
        '<div class="child-row"><span class="label">Type:</span> <span class="value">'+(type || (role==='bank'?'Bank':role==='credit'?'Credit':'—'))+'</span></div>'+
        '<div class="child-row"><span class="label">Category:</span> <span class="value">'+(cat || '—')+'</span></div>'+
        '<div class="child-row"><span class="label">Due Date:</span> <span class="value">'+date+'</span></div>'+
        '<div class="child-row"><span class="label">Amount:</span> <span class="value">'+amountTxt+'</span></div>'+
        '<div class="child-row child-actions mt-2">'+ actions +'</div>'+
      '</div>';
    }

    var table = $table.DataTable({
      autoWidth: false,
      orderFixed: { pre: [[1,'asc']] },       // keep buckets fixed (0 bank, 1 credit, 2 entries)
      order: [[2,'asc']],                     // then by date (numeric epoch in data-order)
      columnDefs: [
        { targets: 1, visible: false, searchable: false }, // _bucket
        { targets: 0, orderable: false, searchable: false }, // control column
        { targets: 4, type: 'num' }, // Amount uses data-order numeric
        { targets: 5, type: 'num' }  // Subtotal uses data-order numeric
      ],
      paging: true,
      lengthMenu: [[25,50,100,500,-1],[25,50,100,500,'All']],
      searching: true,
      info: true,
      language: { searchPlaceholder: 'Search budget…', search: '' }
    });

    // Recalculate running subtotals based on CURRENT visible order (all pages)
    function recalcSubtotals() {
      var start = parseFloat($table.data('start-sum')) || 0;
      var idxs = table.rows({ order:'current', search:'applied', page:'all' }).indexes();
      var running = start;

      for (var i = 0; i < idxs.length; i++) {
        var row = table.row(idxs[i]);
        var tr  = row.node();
        if (!tr) continue;

        var role = tr.getAttribute('data-role');
        if (role === 'bank' || role === 'credit') {
          var cell = tr.querySelector('td.js-subtotal') || tr.querySelector('td.subtotal');
          if (cell) {
            cell.dataset.order = running.toFixed(2);
            cell.innerHTML = (running < 0) ? '<span class="statusRed">'+fmtCash(running)+'</span>' : fmtCash(running);
          }
          continue;
        }

        // Entries (+/-)
        var flow   = tr.getAttribute('data-flow');
        var amount = parseFloat(tr.getAttribute('data-amount')) || 0;
        running += (flow === 'out' ? -amount : amount);

        var tdS = tr.querySelector('td.js-subtotal') || tr.querySelector('td.subtotal');
        if (tdS) {
          tdS.dataset.order = running.toFixed(2);
          tdS.innerHTML = (running < 0) ? '<span class="statusRed">'+fmtCash(running)+'</span>' : fmtCash(running);
        }
      }

      // Tell DataTables that ordering data changed
      table.rows(idxs).invalidate('dom');
    }

    // Initial + on any redraw/sort/search
    recalcSubtotals();
    table.on('order.dt search.dt draw.dt', function(){ recalcSubtotals(); });

    // Expand/collapse details
    $table.on('click', '.dt-control .toggle', function(e){
      e.preventDefault(); e.stopPropagation();
      var tr   = $(this).closest('tr');
      var row  = table.row(tr);

      if (row.child.isShown()) {
        row.child.hide();
        $(this).find('i').removeClass('ni-minus').addClass('ni-plus');
      } else {
        row.child(buildChildHTML(tr[0])).show();
        $(this).find('i').removeClass('ni-plus').addClass('ni-minus');
      }
    });

    // Prevent link double-activation; stop propagation so row handlers don’t swallow taps
    $table.on('click', 'a', function(e){ e.stopPropagation(); });
    $(document).on('submit', 'form', function(e){
      if (this.dataset.submitted === 'true') { e.preventDefault(); return false; }
      this.dataset.submitted = 'true';
    });
  });
})();
</script>
