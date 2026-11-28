<?php if(session()->has('success')): ?>
  <div class="alert alert-success"><?= esc(session('success')) ?></div>
<?php endif; ?>
<?php if(session()->has('error')): ?>
  <div class="alert alert-danger"><?= esc(session('error')) ?></div>
<?php endif; ?>

<form class="card p-3 shadow-sm border" id="reQuickIntake" method="post" action="<?= site_url('Management/Projects/Quick-Intake'); ?>">
  <?= csrf_field(); ?>
  <div class="d-flex justify-content-between align-items-center mb-2">
    <h5 class="mb-0">Real Estate Property Sourcing & Underwriting</h5>
    <div class="d-flex gap-2 align-items-center">
      <a href="<?= site_url('Management/Projects/Deal-Finder') ?>" class="btn btn-sm btn-outline-danger">
        <em class="icon ni ni-search"></em><span>Distressed Deal Finder</span>
      </a>
      <a href="<?= site_url('Management/Projects/Quick-Analysis') ?>" class="btn btn-sm btn-outline-primary">
        <em class="icon ni ni-spark"></em><span>Open AIOps Quick-Analysis</span>
      </a>
      <span class="badge bg-primary">Timothy Burks Incorporated, LLC.</span>
    </div>
  </div>
  <p class="text-muted small mb-1">Paste a Zillow/listing link or enter an address. Optionally enable instant pro forma underwriting to structure an Airbnb or commercial co-investment deal.</p>
  <p class="small text-soft mb-3"><strong>Operating Managers &amp; Co-Owners:</strong> Timothy Burks &amp; AnneAlicia Burks &bull; Bossier City, Louisiana</p>

  <div class="mb-3">
    <label class="form-label d-flex justify-content-between align-items-center mb-1" for="zillow_url">
      <span><em class="icon ni ni-link-alt text-primary me-1"></em>Listing Link (Zillow, Realtor, LoopNet)</span>
      <span class="badge bg-outline-info small" id="intakeListingBadge" style="display:none;"></span>
    </label>
    <div class="input-group">
      <input type="url" name="zillow_url" id="zillow_url" class="form-control" placeholder="https://www.zillow.com/homedetails/..." autocomplete="off">
      <button type="button" class="btn btn-primary" id="btnIntakeFetch">
        <em class="icon ni ni-download-cloud me-1"></em><span>Auto-Fill from Link</span>
      </button>
    </div>
    <div id="intakeListingAlert" class="mt-2" style="display:none;"></div>
  </div>

  <div class="text-center my-2 text-soft small">— or enter property details —</div>

  <div class="mb-2">
    <label class="form-label" for="address_line1">Street Address</label>
    <input name="address_line1" id="address_line1" class="form-control" placeholder="123 Main St">
  </div>
  <div class="row g-2 mb-3">
    <div class="col-md-5"><input name="city" id="city" class="form-control" placeholder="City"></div>
    <div class="col-md-3"><input name="state" id="state" maxlength="2" class="form-control text-uppercase" placeholder="ST"></div>
    <div class="col-md-4"><input name="postal_code" id="postal_code" class="form-control" placeholder="ZIP"></div>
  </div>

  <!-- Pro Forma Accordion / Toggle -->
  <div class="border rounded p-3 mb-3 bg-light">
    <div class="form-check form-switch mb-2">
      <input class="form-check-input" type="checkbox" id="enableProForma" name="create_project" value="1" checked>
      <label class="form-check-label font-weight-bold" for="enableProForma">Underwrite Pro Forma & Create Co-Investment Deal</label>
    </div>

    <div id="proFormaFields">
      <div class="row g-2 mb-2">
        <div class="col-md-6">
          <label class="form-label small">Property Category</label>
          <select name="property_category" id="reCategory" class="form-select form-select-sm">
            <option value="residential_str" selected>Residential Short-Term Rental (Airbnb / VRBO)</option>
            <option value="commercial_lease">Commercial Property (NNN / Leased)</option>
          </select>
        </div>
        <div class="col-md-6">
          <label class="form-label small">Project / Syndicate Title</label>
          <input name="title" id="reTitle" class="form-control form-control-sm" placeholder="e.g. Smoky Mountains Luxury Cabin">
        </div>
        <div class="col-md-4">
          <label class="form-label small">Purchase Price ($)</label>
          <input type="number" step="1000" min="0" name="purchase_price" id="rePurchase" class="form-control form-control-sm" value="350000">
        </div>
        <div class="col-md-4">
          <label class="form-label small">Renovation Budget ($)</label>
          <input type="number" step="500" min="0" name="renovation_budget" id="reReno" class="form-control form-control-sm" value="25000">
        </div>
        <div class="col-md-4" id="furnishingCol">
          <label class="form-label small">Furnishing Budget ($)</label>
          <input type="number" step="500" min="0" name="furnishing_budget" id="reFurnish" class="form-control form-control-sm" value="20000">
        </div>
      </div>

      <!-- STR Specific Inputs -->
      <div id="strInputs" class="row g-2 mb-2">
        <div class="col-md-6">
          <label class="form-label small">Projected ADR ($ / night)</label>
          <input type="number" step="5" min="0" name="projected_adr" id="reAdr" class="form-control form-control-sm" value="275">
        </div>
        <div class="col-md-6">
          <label class="form-label small">Projected Occupancy (%)</label>
          <input type="number" step="1" min="1" max="100" name="projected_occupancy_pct" id="reOcc" class="form-control form-control-sm" value="72">
        </div>
      </div>

      <!-- Commercial Specific Inputs -->
      <div id="commercialInputs" class="row g-2 mb-2" style="display: none;">
        <div class="col-md-6">
          <label class="form-label small">Projected Monthly Rent ($)</label>
          <input type="number" step="100" min="0" name="projected_monthly_rent" id="reRent" class="form-control form-control-sm" value="4500">
        </div>
        <div class="col-md-6">
          <label class="form-label small">Lease Type</label>
          <select name="lease_type" id="reLeaseType" class="form-select form-select-sm">
            <option value="triple_net_nnn" selected>Triple-Net (NNN)</option>
            <option value="gross_lease">Modified Gross Lease</option>
          </select>
        </div>
      </div>

      <!-- Live Calculation Card -->
      <div class="bg-white border rounded p-2 mt-2">
        <div class="d-flex justify-content-between text-muted small">
          <span>Est. Total Raise: <strong id="lblTotalRaise" class="text-dark">$395,000</strong></span>
          <span>Annual NOI: <strong id="lblNoi" class="text-success">$46,800</strong></span>
          <span>Target CoC Yield: <strong id="lblCoc" class="text-success">11.85%</strong></span>
        </div>
      </div>
    </div>
  </div>

  <div class="d-flex gap-2">
    <button class="btn btn-primary" type="submit" id="btnSubmitIntake">Create Deal & Open Syndication</button>
    <a class="btn btn-light" href="<?= site_url('Projects/Real-Estate'); ?>">View Marketplace</a>
  </div>
</form>

<script <?= $nonce['script'] ?? '' ?>>
document.addEventListener('DOMContentLoaded', function(){
  const catSelect = document.getElementById('reCategory');
  const strBox = document.getElementById('strInputs');
  const commBox = document.getElementById('commercialInputs');
  const furnishCol = document.getElementById('furnishingCol');
  const btnFetch = document.getElementById('btnIntakeFetch');
  const inputUrl = document.getElementById('zillow_url');
  const inputAddress = document.getElementById('address_line1');
  const inputCity = document.getElementById('city');
  const inputState = document.getElementById('state');
  const inputZip = document.getElementById('postal_code');
  const inputPurchase = document.getElementById('rePurchase');
  const inputTitle = document.getElementById('reTitle');
  const badgeListing = document.getElementById('intakeListingBadge');
  const alertListing = document.getElementById('intakeListingAlert');

  function updateCategory(){
    if (catSelect.value === 'commercial_lease') {
      strBox.style.display = 'none';
      commBox.style.display = 'flex';
      furnishCol.style.display = 'none';
    } else {
      strBox.style.display = 'flex';
      commBox.style.display = 'none';
      furnishCol.style.display = 'block';
    }
    calcProForma();
  }

  catSelect.addEventListener('change', updateCategory);

  function calcProForma(){
    const purchase = parseFloat(document.getElementById('rePurchase').value) || 0;
    const reno = parseFloat(document.getElementById('reReno').value) || 0;
    const furnish = catSelect.value === 'commercial_lease' ? 0 : (parseFloat(document.getElementById('reFurnish').value) || 0);
    const closing = purchase * 0.03;
    const totalRaise = purchase + reno + furnish + closing;

    let noi = 0;
    if (catSelect.value === 'commercial_lease') {
      const rent = parseFloat(document.getElementById('reRent').value) || 0;
      const annualRent = rent * 12 * 0.95; // 5% vacancy
      noi = annualRent * 0.89; // opex + 8% fee
    } else {
      const adr = parseFloat(document.getElementById('reAdr').value) || 0;
      const occ = (parseFloat(document.getElementById('reOcc').value) || 70) / 100;
      const gross = adr * 365 * occ;
      noi = gross * 0.50; // 15% platform/clean, 20% opex, 15% sponsor fee
    }

    const coc = totalRaise > 0 ? ((noi / totalRaise) * 100).toFixed(2) : '0.00';

    document.getElementById('lblTotalRaise').innerText = '$' + Math.round(totalRaise).toLocaleString();
    document.getElementById('lblNoi').innerText = '$' + Math.round(noi).toLocaleString();
    document.getElementById('lblCoc').innerText = coc + '%';
  }

  ['rePurchase','reReno','reFurnish','reAdr','reOcc','reRent'].forEach(id => {
    const el = document.getElementById(id);
    if(el) el.addEventListener('input', calcProForma);
  });

  calcProForma();

  // Listing URL Fetch & Auto-Fill
  function doFetchIntakeListing(rawUrl) {
    const url = (rawUrl || inputUrl.value || '').trim();
    if (!url) {
      alertListing.className = 'alert alert-warning py-1 px-2 small mb-0';
      alertListing.innerHTML = 'Please enter a valid Zillow, Realtor, or listing link.';
      alertListing.style.display = 'block';
      return;
    }

    const origBtnHtml = btnFetch.innerHTML;
    btnFetch.innerHTML = '<span class="spinner-border spinner-border-sm me-1" role="status"></span> Fetching...';
    btnFetch.disabled = true;
    badgeListing.style.display = 'inline-block';
    badgeListing.className = 'badge bg-warning text-dark small';
    badgeListing.innerText = 'Extracting...';
    alertListing.style.display = 'none';

    const form = document.getElementById('reQuickIntake');
    const csrfToken = form.querySelector('input[name="csrf_token_name"]')?.value || form.querySelector('input[name="csrf_test_name"]')?.value || '';

    const payload = new FormData();
    payload.append('url', url);
    payload.append('zillow_url', url);
    if (csrfToken) {
      payload.append('csrf_token_name', csrfToken);
      payload.append('csrf_test_name', csrfToken);
    }

    fetch('<?= site_url("Management/Projects/Quick-Analysis/Parse-Listing") ?>', {
      method: 'POST',
      body: payload,
      headers: {
        'X-Requested-With': 'XMLHttpRequest'
      }
    })
    .then(r => r.json())
    .then(res => {
      btnFetch.innerHTML = origBtnHtml;
      btnFetch.disabled = false;

      if (!res || res.status !== 'ok' || !res.data) {
        badgeListing.className = 'badge bg-danger text-white small';
        badgeListing.innerText = 'Manual entry';
        alertListing.className = 'alert alert-danger py-1 px-2 small mb-0';
        alertListing.innerHTML = res?.message || 'Could not auto-extract listing. You may enter details manually.';
        alertListing.style.display = 'block';
        return;
      }

      const d = res.data;
      badgeListing.className = 'badge bg-success text-white small';
      badgeListing.innerText = '✓ Extracted (' + (d.source_domain || 'Zillow') + ')';

      if (d.address_line1) inputAddress.value = d.address_line1;
      if (d.city) inputCity.value = d.city;
      if (d.state) inputState.value = d.state;
      if (d.postal_code) inputZip.value = d.postal_code;
      if (d.purchase_price && Number(d.purchase_price) > 0) {
        inputPurchase.value = Math.round(Number(d.purchase_price));
      }
      if (d.title) {
        inputTitle.value = d.title;
      } else if (d.address_line1) {
        inputTitle.value = d.address_line1 + ' Acquisition';
      }

      alertListing.className = 'alert alert-success py-1 px-2 small mb-0';
      const priceStr = d.purchase_price ? ' | Price: $' + Number(d.purchase_price).toLocaleString() : '';
      alertListing.innerHTML = '<strong>Success!</strong> Auto-filled from ' + (d.source_domain || 'listing') + ': ' + (d.address_line1 || '') + priceStr;
      alertListing.style.display = 'block';

      calcProForma();
    })
    .catch(err => {
      btnFetch.innerHTML = origBtnHtml;
      btnFetch.disabled = false;
      badgeListing.className = 'badge bg-danger text-white small';
      badgeListing.innerText = 'Fetch error';
      alertListing.className = 'alert alert-danger py-1 px-2 small mb-0';
      alertListing.innerHTML = 'Network error fetching listing details.';
      alertListing.style.display = 'block';
      console.error(err);
    });
  }

  btnFetch.addEventListener('click', function(e){
    e.preventDefault();
    doFetchIntakeListing();
  });

  inputUrl.addEventListener('paste', function(e){
    setTimeout(function(){
      const val = inputUrl.value.trim();
      if (val.startsWith('http://') || val.startsWith('https://') || val.includes('zillow.com') || val.includes('realtor.com')) {
        doFetchIntakeListing(val);
      }
    }, 100);
  });

  inputAddress.addEventListener('paste', function(e){
    setTimeout(function(){
      const val = inputAddress.value.trim();
      if (val.startsWith('http://') || val.startsWith('https://') || val.includes('zillow.com') || val.includes('realtor.com')) {
        inputUrl.value = val;
        inputAddress.value = '';
        doFetchIntakeListing(val);
      }
    }, 100);
  });
});
</script>
