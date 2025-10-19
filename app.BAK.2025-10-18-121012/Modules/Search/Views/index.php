<div class="card p-3">
  <form id="searchForm" class="mb-3">
    <div class="input-group">
      <input class="form-control" type="text" id="q" name="q" placeholder="Search projects, assets, posts, alerts…" required>
      <button class="btn btn-primary" type="submit">Search</button>
    </div>
    <div class="form-text">Tip: try a ticker (e.g., <strong>BTC</strong>) or project keyword.</div>
  </form>

  <div id="results"></div>
  <nav><ul class="pagination mt-3" id="pager"></ul></nav>
</div>

<script <?= $nonce['script'] ?? '' ?>>
(function(){
  let offset = 0, limit = 20;
  const form = document.getElementById('searchForm');
  const q = document.getElementById('q');
  const results = document.getElementById('results');
  const pager = document.getElementById('pager');

  async function run(query, o=0){
    const params = new URLSearchParams({q: query, limit, offset: o});
    const res = await fetch('/API/Search?'+params.toString(), {headers:{'Accept':'application/json'}});
    const json = await res.json();
    if (json?.csrf){ const meta=document.querySelector('meta[name="csrf-token"]'); if(meta) meta.setAttribute('content', json.csrf); }
    render(json?.data?.items || [], json?.data?.total || 0, query, o);
  }

  function render(items, total, query, o){
    results.innerHTML = items.map(it => `
      <div class="border-bottom py-2">
        <div class="small text-muted">${it.type} • ${it.created_at ?? ''}</div>
        <a href="${it.url}" class="fw-semibold">${it.title}</a>
        <div class="text-muted">${(it.snippet || '').replaceAll('<','&lt;')}</div>
      </div>
    `).join('') || '<div class="text-muted">No results.</div>';

    pager.innerHTML = '';
    const prev = document.createElement('li'); prev.className = 'page-item'+(o<=0?' disabled':'');
    prev.innerHTML = '<a class="page-link" href="#">Prev</a>';
    prev.onclick = e => { e.preventDefault(); if(o>0){ offset=Math.max(0,o-limit); run(query,offset);} };
    const next = document.createElement('li'); next.className = 'page-item'+(items.length<limit?' disabled':'');
    next.innerHTML = '<a class="page-link" href="#">Next</a>';
    next.onclick = e => { e.preventDefault(); if(items.length===limit){ offset=o+limit; run(query,offset);} };
    pager.appendChild(prev); pager.appendChild(next);
  }

  form.addEventListener('submit', e => { e.preventDefault(); offset=0; const query=q.value.trim(); if(query) run(query,0); });
})();
</script>
