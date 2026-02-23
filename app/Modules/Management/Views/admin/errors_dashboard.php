<div class="nk-content">
  <div class="container-fluid">

    <div class="nk-block-head">
      <div class="nk-block-head-content">
        <h3 class="nk-block-title">Error Ops Dashboard</h3>
        <div class="nk-block-des">
          <p>Real-time KPIs + controller/service concentration + learned patterns.</p>
        </div>
      </div>
    </div>

    <div class="row g-gs">
      <div class="col-md-3">
        <div class="card"><div class="card-body">
          <div class="h6">Last 15m Total</div>
          <div id="kpiTotal" class="display-6">0</div>
        </div></div>
      </div>
      <div class="col-md-9">
        <div class="card"><div class="card-body">
          <canvas id="kpiLevelsChart" height="80"></canvas>
        </div></div>
      </div>
    </div>

    <div class="row g-gs mt-3">
      <div class="col-lg-6">
        <div class="card"><div class="card-body">
          <h6 class="mb-2">Top Controllers (last 60m)</h6>
          <canvas id="topControllersChart" height="140"></canvas>
        </div></div>
      </div>

      <div class="col-lg-6">
        <div class="card"><div class="card-body">
          <h6 class="mb-2">Heatmap (bucket/hour x controller)</h6>
          <canvas id="heatmapChart" height="140"></canvas>
          <small class="text-muted">This is a compact “heat” proxy (counts by bucket). If you want a true matrix heatmap, we’ll drop in a custom renderer.</small>
        </div></div>
      </div>
    </div>

    <div class="row g-gs mt-3">
      <div class="col-12">
        <div class="card"><div class="card-body">
          <h6 class="mb-2">Learned Error Patterns</h6>
          <table id="patternsTable" class="table table-striped table-sm w-100">
            <thead>
              <tr>
                <th>Severity</th>
                <th>Category</th>
                <th>Type</th>
                <th>Title</th>
                <th>Count</th>
                <th>Last Seen</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div></div>
      </div>
    </div>

  </div>
</div>

<script <?= isset($nonce['script']) ? $nonce['script'] : '' ?>>
(function(){
  const baseUrl = "<?= site_url('Management/ErrorOps') ?>";

  let kpiChart = null;
  let topChart = null;
  let heatChart = null;
  let dt = null;

  async function fetchJson(url){
    const res = await fetch(url, {headers: {'Accept':'application/json'}});
    return await res.json();
  }

  async function loadKpis(){
    const j = await fetchJson(baseUrl + "/apiKpis");
    if (!j || j.status !== 'success') return;
    const data = j.data;

    document.getElementById('kpiTotal').innerText = data.total || 0;

    const labels = Object.keys(data.byLevel || {});
    const values = labels.map(k => data.byLevel[k]);

    if (!kpiChart){
      kpiChart = new Chart(document.getElementById('kpiLevelsChart'), {
        type: 'bar',
        data: { labels, datasets: [{ label: 'Count', data: values }] },
        options: { responsive: true, plugins: { legend: { display: false } } }
      });
    } else {
      kpiChart.data.labels = labels;
      kpiChart.data.datasets[0].data = values;
      kpiChart.update();
    }
  }

  async function loadTopControllers(){
    const j = await fetchJson(baseUrl + "/apiTopControllers");
    if (!j || j.status !== 'success') return;

    const rows = (j.data && j.data.rows) ? j.data.rows : [];
    const labels = rows.map(r => r.controller_key);
    const values = rows.map(r => parseInt(r.c, 10) || 0);

    if (!topChart){
      topChart = new Chart(document.getElementById('topControllersChart'), {
        type: 'bar',
        data: { labels, datasets: [{ label: 'Errors', data: values }] },
        options: { indexAxis: 'y', responsive: true, plugins: { legend: { display: false } } }
      });
    } else {
      topChart.data.labels = labels;
      topChart.data.datasets[0].data = values;
      topChart.update();
    }
  }

  async function loadHeatmap(){
    const j = await fetchJson(baseUrl + "/apiHeatmap");
    if (!j || j.status !== 'success') return;

    // Compact proxy: sum per bucket (hour) so you can visually see spikes.
    const rows = (j.data && j.data.rows) ? j.data.rows : [];
    const buckets = {};
    rows.forEach(r => {
      const b = r.bucket;
      const c = parseInt(r.c, 10) || 0;
      buckets[b] = (buckets[b] || 0) + c;
    });

    const labels = Object.keys(buckets).sort();
    const values = labels.map(l => buckets[l]);

    if (!heatChart){
      heatChart = new Chart(document.getElementById('heatmapChart'), {
        type: 'line',
        data: { labels, datasets: [{ label: 'Errors per hour', data: values }] },
        options: { responsive: true, plugins: { legend: { display: false } } }
      });
    } else {
      heatChart.data.labels = labels;
      heatChart.data.datasets[0].data = values;
      heatChart.update();
    }
  }

  async function loadPatterns(){
    const j = await fetchJson(baseUrl + "/apiPatterns");
    if (!j || j.status !== 'success') return;
    const rows = j.data || [];

    if (!dt){
      dt = $('#patternsTable').DataTable({
        data: rows,
        columns: [
          { data: 'severity' },
          { data: 'category' },
          { data: 'error_type' },
          { data: 'title' },
          { data: 'occurrence_count' },
          { data: 'last_seen' }
        ],
        order: [[5, 'desc']],
        pageLength: 25
      });
    } else {
      dt.clear();
      dt.rows.add(rows);
      dt.draw(false);
    }
  }

  async function tick(){
    await Promise.all([loadKpis(), loadTopControllers(), loadHeatmap(), loadPatterns()]);
  }

  tick();
  setInterval(tick, 15000);
})();
</script>