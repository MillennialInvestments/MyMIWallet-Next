<div class="container-fluid py-3">
  <div class="d-flex align-items-center justify-content-between mb-3">
    <div>
      <h3 class="mb-0">Weekly Signal Scanner</h3>
      <small class="text-muted">Week: <span id="weekKey"><?= esc($week) ?></span></small>
    </div>
    <div class="d-flex gap-2">
      <button class="btn btn-primary" id="btnIngest">Ingest This Week</button>
      <button class="btn btn-outline-secondary" id="btnRecalc">Recalc Scores</button>
      <button class="btn btn-outline-dark" id="btnRefresh">Refresh</button>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-4">
      <div class="card mb-3">
        <div class="card-header">Files</div>
        <div class="card-body">
          <div id="filesList" class="small text-muted">Loading…</div>
        </div>
      </div>
    </div>

    <div class="col-lg-8">
      <div class="card mb-3">
        <div class="card-header">Signals (Top)</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-sm table-striped" id="signalsTable">
              <thead>
                <tr>
                  <th>Score</th>
                  <th>Symbol</th>
                  <th>Category</th>
                  <th>Type</th>
                  <th>Appear</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
          <small class="text-muted">Tip: score increases when the same symbol appears across multiple CSV exports.</small>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal mount -->
<div class="modal fade" id="signalPreviewModal" tabindex="-1">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content" id="signalPreviewModalBody"></div>
  </div>
</div>

<script>
(function() {
  const weekKey = document.getElementById('weekKey').innerText;

  async function apiGet(url) {
    const res = await fetch(url, { headers: { 'Accept': 'application/json' } });
    return res.json();
  }

  async function refreshFiles() {
    const data = await apiGet(`/API/Alerts/signalFiles?week=${encodeURIComponent(weekKey)}`);
    const wrap = document.getElementById('filesList');

    if (!data || data.status !== 'success') {
      wrap.innerHTML = '<span class="text-danger">Failed to load files</span>';
      return;
    }

    if (!data.data.length) {
      wrap.innerHTML = '<span class="text-muted">No files processed yet.</span>';
      return;
    }

    wrap.innerHTML = data.data.map(f => `
      <div class="d-flex justify-content-between align-items-center border-bottom py-1">
        <div>
          <div class="fw-bold">${escapeHtml(f.file_name)}</div>
          <div class="text-muted">${escapeHtml(f.category)} · ${escapeHtml(f.signal_type)} · rows: ${f.rows_total}</div>
        </div>
        <button class="btn btn-sm btn-outline-primary" data-file-id="${f.id}">Preview</button>
      </div>
    `).join('');

    wrap.querySelectorAll('button[data-file-id]').forEach(btn => {
      btn.addEventListener('click', async () => {
        const id = btn.getAttribute('data-file-id');
        const html = await fetch(`/API/Alerts/previewSignalFile/${id}`).then(r => r.text());
        document.getElementById('signalPreviewModalBody').innerHTML = html;
        const modal = new bootstrap.Modal(document.getElementById('signalPreviewModal'));
        modal.show();
      });
    });
  }

  async function refreshSignals() {
    const data = await apiGet(`/API/Alerts/signals?week=${encodeURIComponent(weekKey)}`);
    const tbody = document.querySelector('#signalsTable tbody');

    tbody.innerHTML = '';
    if (!data || data.status !== 'success') {
      tbody.innerHTML = `<tr><td colspan="6" class="text-danger">Failed to load signals</td></tr>`;
      return;
    }

    const rows = (data.data || []).slice(0, 250);
    rows.forEach(r => {
      const tr = document.createElement('tr');
      tr.innerHTML = `
        <td><span class="badge bg-dark">${r.score}</span></td>
        <td class="fw-bold">${escapeHtml(r.symbol)}</td>
        <td>${escapeHtml(r.category)}</td>
        <td>${escapeHtml(r.signal_type)}</td>
        <td>${r.appearances}</td>
        <td>${escapeHtml(r.signal_date || '')}</td>
      `;
      tbody.appendChild(tr);
    });
  }

  function escapeHtml(s) {
    return String(s || '').replace(/[&<>"']/g, m => ({
      '&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'
    })[m]);
  }

  document.getElementById('btnRefresh').addEventListener('click', async () => {
    await refreshFiles();
    await refreshSignals();
  });

  document.getElementById('btnRecalc').addEventListener('click', async () => {
    const res = await apiGet(`/API/Alerts/recalcSignalScores?week=${encodeURIComponent(weekKey)}`);
    await refreshSignals();
    alert(`Recalc complete. Updated: ${(res.data && res.data.updated) || 0}`);
  });

  document.getElementById('btnIngest').addEventListener('click', async () => {
    // Token optional in UI; your CRON will pass it.
    const res = await apiGet(`/API/Alerts/ingestCsvSignals?week=${encodeURIComponent(weekKey)}`);
    await refreshFiles();
    await refreshSignals();
    alert(`Ingest complete. Files processed: ${(res.data.ingest && res.data.ingest.files_processed) || 0}`);
  });

  // initial load
  refreshFiles();
  refreshSignals();
})();
</script>
