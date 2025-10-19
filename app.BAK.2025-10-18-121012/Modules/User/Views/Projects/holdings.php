<?php
/**
 * Holdings Dashboard View — ProjectsController::holdings
 * Expects (from controller):
 *   $portfolio, $commitments, $investments, $distributions, $totals, $solanaData
 * Also relies on $this->data from commonData() for user/session/theme.
 */

$subViewData = [
    'portfolio'     => $portfolio ?? [],
    'commitments'   => $commitments ?? [],
    'investments'   => $investments ?? [],
    'distributions' => $distributions ?? [],
    'totals'        => $totals ?? ['units'=>0,'cost_basis'=>0,'est_value'=>0,'distributions'=>0,'commitments'=>0,'invested'=>0],
    'solanaData'    => $solanaData ?? [],
];

$csrfName = csrf_token();
$csrfHash = csrf_hash();

function fmt_money($v) { return number_format((float)$v, 2); }
function fmt_int($v)   { return number_format((float)$v, 0); }
?>
<style <?= $nonce['style'] ?? '' ?>>
@media only screen and (max-width: 768px) {
  #holdings-datatable_filter { padding-top: 1rem; text-align: left; }
}
.nk-order-ovwg-data.holdings { border-color: #84b8ff; }
.nk-order-ovwg-data .amount { font-size: 1.1rem; font-weight: 700; }
.card .mini-title { font-size: .8rem; text-transform: uppercase; letter-spacing: .04em; color: #7f8da9; }
.table thead th { white-space: nowrap; font-size: .85rem; }
.btn-icon { display: inline-flex; align-items: center; gap: .35rem; }
</style>

<div class="nk-block">
  <div class="row g-gs">

    <!-- Left Column: Overview / Actions -->
    <div class="col-md-12 col-xl-3">
      <div class="card card-bordered h-100">
        <div class="card-inner">
          <div class="card-title">
            <h6 class="title">Holdings Dashboard</h6>
            <p class="text-muted">Manage your project tokens, commitments and distributions.</p>
          </div>

          <!-- Overview Tiles -->
          <div class="row g-3">
            <div class="col-6">
              <div class="nk-order-ovwg-data holdings p-2 rounded border">
                <div class="mini-title">Total Units</div>
                <div class="amount"><?= fmt_int($subViewData['totals']['units'] ?? 0) ?></div>
              </div>
            </div>
            <div class="col-6">
              <div class="nk-order-ovwg-data holdings p-2 rounded border">
                <div class="mini-title">Cost Basis</div>
                <div class="amount">$<?= fmt_money($subViewData['totals']['cost_basis'] ?? 0) ?></div>
              </div>
            </div>
            <div class="col-6">
              <div class="nk-order-ovwg-data holdings p-2 rounded border">
                <div class="mini-title">Est. Value</div>
                <div class="amount">$<?= fmt_money($subViewData['totals']['est_value'] ?? 0) ?></div>
              </div>
            </div>
            <div class="col-6">
              <div class="nk-order-ovwg-data holdings p-2 rounded border">
                <div class="mini-title">Distributions (All-Time)</div>
                <div class="amount">$<?= fmt_money($subViewData['totals']['distributions'] ?? 0) ?></div>
              </div>
            </div>
            <div class="col-6">
              <div class="nk-order-ovwg-data holdings p-2 rounded border">
                <div class="mini-title">Commitments</div>
                <div class="amount">$<?= fmt_money($subViewData['totals']['commitments'] ?? 0) ?></div>
              </div>
            </div>
            <div class="col-6">
              <div class="nk-order-ovwg-data holdings p-2 rounded border">
                <div class="mini-title">Invested</div>
                <div class="amount">$<?= fmt_money($subViewData['totals']['invested'] ?? 0) ?></div>
              </div>
            </div>
          </div>

          <hr class="my-3">

          <!-- Quick Actions -->
          <div class="d-grid gap-2">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCommit">
              <em class="icon ni ni-plus"></em> Commit to Project
            </button>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalInvest">
              <em class="icon ni ni-trend-up"></em> Invest
            </button>
            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalSell">
              <em class="icon ni ni-trend-down"></em> Sell Stake
            </button>
            <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#modalReportRevenue">
              <em class="icon ni ni-coin"></em> Report Revenue
            </button>
          </div>

          <?php if (!empty($subViewData['solanaData'])): ?>
          <hr class="my-3">
          <div>
            <div class="mini-title mb-1">Solana Wallet Snapshot</div>
            <div class="small text-muted">Accounts: <?= count($subViewData['solanaData'] ?? []) ?></div>
          </div>
          <?php endif; ?>

        </div>
      </div>
    </div>

    <!-- Right Column: Analytics + Positions -->
    <div class="col-md-12 col-xl-9">
      <!-- Analytics Chart (placeholder subview – swap with your chart component if you have it) -->
      <div class="card card-bordered mb-3">
        <div class="card-inner">
          <div class="d-flex align-items-center justify-content-between mb-2">
            <h6 class="title mb-0">Holdings Analytics</h6>
            <div class="text-muted small">Value • Cost • Distributions</div>
          </div>
          <?php echo view('Projects\holdings\analytics_chart', $subViewData); ?>
        </div>
      </div>

      <!-- Positions Table -->
      <div class="card card-bordered h-100">
        <div class="card-inner">
          <div class="d-flex align-items-center justify-content-between mb-2">
            <h6 class="title mb-0">Positions</h6>
            <div class="input-group input-group-sm" style="max-width: 260px;">
              <span class="input-group-text"><em class="icon ni ni-search"></em></span>
              <input id="holdingsSearch" type="text" class="form-control" placeholder="Search projects / tokens">
            </div>
          </div>

          <div class="table-responsive">
            <table class="table table-sm" id="holdings-datatable">
              <thead>
                <tr>
                  <th>Project</th>
                  <th>Token</th>
                  <th class="text-end">Units</th>
                  <th class="text-end">Cost Basis</th>
                  <th class="text-end">Est. Value</th>
                  <th class="text-end">P/L</th>
                  <th class="text-end">Distributions</th>
                  <th class="text-end">Actions</th>
                </tr>
              </thead>
              <tbody>
              <?php if (!empty($subViewData['portfolio'])): ?>
                <?php foreach ($subViewData['portfolio'] as $row): 
                  $pid   = $row['project_id'] ?? null;
                  $pname = $row['project_name'] ?? ('Project #'.$pid);
                  $sym   = $row['token_symbol'] ?? '-';
                  $u     = (float)($row['units'] ?? 0);
                  $cb    = (float)($row['cost_basis'] ?? 0);
                  $ev    = (float)($row['est_value'] ?? 0);
                  $dist  = (float)($row['distributions'] ?? 0);
                  $pl    = $ev - $cb;
                ?>
                <tr data-project-id="<?= (int)$pid ?>">
                  <td><a href="<?= site_url('Projects/view/'.$pid) ?>"><?= esc($pname) ?></a></td>
                  <td><?= esc($sym) ?></td>
                  <td class="text-end"><?= fmt_int($u) ?></td>
                  <td class="text-end">$<?= fmt_money($cb) ?></td>
                  <td class="text-end">$<?= fmt_money($ev) ?></td>
                  <td class="text-end <?= $pl >= 0 ? 'text-success' : 'text-danger' ?>">$<?= fmt_money($pl) ?></td>
                  <td class="text-end">$<?= fmt_money($dist) ?></td>
                  <td class="text-end">
                    <div class="btn-group btn-group-sm">
                      <button class="btn btn-outline-primary btn-icon act-commit" data-project-id="<?= (int)$pid ?>"><em class="icon ni ni-plus"></em> Commit</button>
                      <button class="btn btn-outline-success btn-icon act-invest" data-project-id="<?= (int)$pid ?>"><em class="icon ni ni-trend-up"></em> Invest</button>
                      <button class="btn btn-outline-warning btn-icon act-sell" data-project-id="<?= (int)$pid ?>"><em class="icon ni ni-trend-down"></em> Sell</button>
                    </div>
                  </td>
                </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr><td colspan="8" class="text-center text-muted">No holdings yet.</td></tr>
              <?php endif; ?>
              </tbody>
            </table>
          </div>

          <!-- Historical Panels -->
          <div class="row g-3 mt-3">
            <div class="col-md-4">
              <div class="card card-bordered h-100">
                <div class="card-inner">
                  <div class="mini-title mb-1">Recent Commitments</div>
                  <?php echo view('Projects\holdings\list_commitments', $subViewData); ?>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-bordered h-100">
                <div class="card-inner">
                  <div class="mini-title mb-1">Recent Investments</div>
                  <?php echo view('Projects\holdings\list_investments', $subViewData); ?>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-bordered h-100">
                <div class="card-inner">
                  <div class="mini-title mb-1">Recent Distributions</div>
                  <?php echo view('Projects\holdings\list_distributions', $subViewData); ?>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

  </div>
</div>

<!-- Modals: Commit / Invest / Sell / Report Revenue -->
<div class="modal fade" id="modalCommit" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered"><div class="modal-content">
    <form method="post" action="" id="formCommit">
      <input type="hidden" name="<?= $csrfName ?>" value="<?= $csrfHash ?>">
      <div class="modal-header">
        <h5 class="modal-title">Commit to Project</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="project_id" id="commit_project_id">
        <div class="mb-2">
          <label class="form-label">Amount (USD)</label>
          <input class="form-control" name="amount" type="number" step="0.01" min="0" required>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" type="submit">Submit Commitment</button>
      </div>
    </form>
  </div></div>
</div>

<div class="modal fade" id="modalInvest" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered"><div class="modal-content">
    <form method="post" action="" id="formInvest">
      <input type="hidden" name="<?= $csrfName ?>" value="<?= $csrfHash ?>">
      <div class="modal-header">
        <h5 class="modal-title">Invest in Project</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="project_id" id="invest_project_id">
        <div class="mb-2">
          <label class="form-label">Investment Amount (USD)</label>
          <input class="form-control" name="investment_amount" type="number" step="0.01" min="0" required>
        </div>
        <div class="mb-2">
          <label class="form-label">Notes (optional)</label>
          <input class="form-control" name="notes" maxlength="255">
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-success" type="submit">Invest</button>
      </div>
    </form>
  </div></div>
</div>

<div class="modal fade" id="modalSell" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered"><div class="modal-content">
    <form method="post" action="" id="formSell">
      <input type="hidden" name="<?= $csrfName ?>" value="<?= $csrfHash ?>">
      <div class="modal-header">
        <h5 class="modal-title">Sell Stake</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="project_id" id="sell_project_id">
        <div class="mb-2">
          <label class="form-label">Units to Sell</label>
          <input class="form-control" name="units" type="number" step="1" min="1" required>
        </div>
        <div class="mb-2">
          <label class="form-label">Ask Price (USD/Unit)</label>
          <input class="form-control" name="ask_price" type="number" step="0.01" min="0" required>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-warning" type="submit">Submit Sell Order</button>
      </div>
    </form>
  </div></div>
</div>

<div class="modal fade" id="modalReportRevenue" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered"><div class="modal-content">
    <form method="post" action="<?= site_url('Projects/reportRevenue') ?>" id="formReportRevenue">
      <input type="hidden" name="<?= $csrfName ?>" value="<?= $csrfHash ?>">
      <div class="modal-header">
        <h5 class="modal-title">Report Project Revenue</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="mb-2">
          <label class="form-label">Project</label>
          <select class="form-select" name="project_id" required>
            <option value="">Select...</option>
            <?php foreach (($subViewData['portfolio'] ?? []) as $row): ?>
              <option value="<?= (int)($row['project_id'] ?? 0) ?>">
                <?= esc($row['project_name'] ?? ('Project #'.($row['project_id'] ?? ''); ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="mb-2">
          <label class="form-label">Amount (USD)</label>
          <input class="form-control" name="amount" type="number" step="0.01" min="0" required>
        </div>
        <div class="mb-2">
          <label class="form-label">Reported At</label>
          <input class="form-control" name="reported_at" type="date" value="<?= date('Y-m-d') ?>" required>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-primary" type="submit">Report</button>
      </div>
    </form>
  </div></div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
(function(){
  const $ = window.jQuery || null;

  // Wire action buttons in table rows to open modals with project ID prefilled
  function bindRowActions(){
    document.querySelectorAll('.act-commit').forEach(btn=>{
      btn.addEventListener('click', e=>{
        const pid = e.currentTarget.dataset.projectId;
        document.getElementById('commit_project_id').value = pid;
        document.getElementById('formCommit').setAttribute('action', '<?= site_url('Projects/commitInvestment') ?>' + '/' + pid);
      });
    });
    document.querySelectorAll('.act-invest').forEach(btn=>{
      btn.addEventListener('click', e=>{
        const pid = e.currentTarget.dataset.projectId;
        document.getElementById('invest_project_id').value = pid;
        document.getElementById('formInvest').setAttribute('action', '<?= site_url('User/Projects/SubmitInvest') ?>' + '/' + pid);
      });
    });
    document.querySelectorAll('.act-sell').forEach(btn=>{
      btn.addEventListener('click', e=>{
        const pid = e.currentTarget.dataset.projectId;
        document.getElementById('sell_project_id').value = pid;
        document.getElementById('formSell').setAttribute('action', '<?= site_url('User/Projects/SubmitSell') ?>' + '/' + pid);
      });
    });
  }

  // Simple client-side search (swap with DataTables if desired)
  function bindSearch(){
    const q = document.getElementById('holdingsSearch');
    if(!q) return;
    q.addEventListener('input', function(){
      const val = this.value.toLowerCase();
      document.querySelectorAll('#holdings-datatable tbody tr').forEach(tr=>{
        const text = tr.innerText.toLowerCase();
        tr.style.display = text.includes(val) ? '' : 'none';
      });
    });
  }

  // Optional AJAX submitters (progressive enhancement)
  function ajaxify(formId){
    const form = document.getElementById(formId);
    if(!form || !window.fetch) return;
    form.addEventListener('submit', async function(ev){
      if (form.getAttribute('data-noajax') === '1') return; // allow normal submit if desired
      ev.preventDefault();
      const fd = new FormData(form);
      const res = await fetch(form.action, { method: 'POST', body: fd, credentials: 'same-origin' });
      let ok = res.ok;
      let payload = {};
      try { payload = await res.json(); } catch(e){}
      if (ok && payload.status === 'success') {
        location.reload();
      } else {
        alert((payload && payload.message) ? payload.message : 'Request failed');
      }
    });
  }

  document.addEventListener('DOMContentLoaded', function(){
    bindRowActions();
    bindSearch();
    ajaxify('formCommit');
    ajaxify('formInvest');
    ajaxify('formSell');
    ajaxify('formReportRevenue');
  });
})();
</script>
