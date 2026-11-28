<?php
/**
 * AIOps Real Estate Quick-Analysis View
 *
 * Comprehensive underwriting and pro forma evaluation for Timothy Burks Incorporated, LLC.
 * Operating Managers: Timothy Burks & AnneAlicia Burks
 */
?>
<div class="nk-block-head nk-block-head-sm">
  <div class="nk-block-between">
    <div class="nk-block-head-content">
      <nav class="mb-2">
        <a href="<?= site_url('Management/Projects') ?>" class="text-soft">&larr; Back to Management Projects</a>
      </nav>
      <h3 class="nk-block-title page-title">AIOps Real Estate Quick-Analysis</h3>
      <div class="nk-block-des text-soft">
        <p class="mb-1">Automated underwriting, cash flow stress-testing, and syndication structuring for AnneAlicia &amp; Timothy.</p>
        <p class="small text-muted mb-0">
          <strong>Lead Sponsor:</strong> Timothy Burks Incorporated, LLC. &bull; 
          <strong>Operating Managers:</strong> Timothy Burks &amp; AnneAlicia Burks &bull; 
          Bossier City, Louisiana
        </p>
      </div>
    </div>
    <div class="nk-block-head-content">
      <a href="<?= site_url('Management/Projects/Quick-Intake') ?>" class="btn btn-outline-primary me-2">
        <em class="icon ni ni-plus"></em><span>Quick-Intake Form</span>
      </a>
      <a href="<?= site_url('Projects/Real-Estate') ?>" class="btn btn-outline-secondary" target="_blank">
        <em class="icon ni ni-globe"></em><span>View Marketplace</span>
      </a>
    </div>
  </div>
</div>

<div class="nk-block">
  <div class="row g-gs">
    <!-- Left Column: Input Underwriting Parameters -->
    <div class="col-lg-5">
      <div class="card card-bordered">
        <div class="card-inner">
          <h5 class="card-title mb-3">Property Parameters</h5>
          <form id="aiopsAnalysisForm" method="post" action="<?= site_url('Management/Projects/Quick-Analysis/Publish'); ?>">
            <?= csrf_field(); ?>

            <!-- Zillow / Listing Link Drop-in Box -->
            <div class="p-3 mb-3 bg-lighter rounded border border-primary-subtle shadow-sm">
              <label class="form-label d-flex justify-content-between align-items-center mb-1" for="qaListingUrl">
                <span class="text-primary fw-bold">
                  <em class="icon ni ni-link-alt me-1"></em>Zillow / Listing Link Drop-in
                </span>
                <span class="badge bg-primary-soft text-primary small">Instant AI Extraction</span>
              </label>
              <div class="input-group">
                <input type="url" name="zillow_url" id="qaListingUrl" class="form-control" placeholder="Drop/paste Zillow link (e.g., https://www.zillow.com/homedetails/...)" autocomplete="off">
                <button type="button" class="btn btn-primary" id="btnFetchListing">
                  <em class="icon ni ni-download-cloud me-1"></em><span>Fetch</span>
                </button>
              </div>
              <div class="d-flex justify-content-between align-items-center mt-1">
                <span class="small text-muted" style="font-size: 0.75rem;">Supports Zillow, Realtor.com, Redfin, or MLS links.</span>
                <span class="badge bg-outline-info small" style="font-size: 0.7rem;" id="qaListingBadge">Ready for link</span>
              </div>
              <div id="qaListingAlert" class="mt-2" style="display:none;"></div>
            </div>

            <div class="mb-2">
              <label class="form-label" for="qaAddress">Street Address</label>
              <input type="text" name="address_line1" id="qaAddress" class="form-control" value="1420 Benton Rd" placeholder="123 Main St" required>
            </div>

            <div class="row g-2 mb-2">
              <div class="col-6">
                <label class="form-label small" for="qaCity">City</label>
                <input type="text" name="city" id="qaCity" class="form-control form-control-sm" value="Bossier City">
              </div>
              <div class="col-3">
                <label class="form-label small" for="qaState">State</label>
                <input type="text" name="state" id="qaState" maxlength="2" class="form-control form-control-sm text-uppercase" value="LA">
              </div>
              <div class="col-3">
                <label class="form-label small" for="qaZip">ZIP</label>
                <input type="text" name="postal_code" id="qaZip" class="form-control form-control-sm" value="71111">
              </div>
            </div>

            <div class="mb-2">
              <label class="form-label small" for="qaCategory">Property Category</label>
              <select name="property_category" id="qaCategory" class="form-select form-select-sm">
                <option value="residential_str" selected>Residential Short-Term Rental (Airbnb / VRBO)</option>
                <option value="commercial_lease">Commercial Leased Asset (NNN / Triple Net)</option>
              </select>
            </div>

            <div class="mb-2">
              <label class="form-label small" for="qaTitle">Deal Title</label>
              <input type="text" name="title" id="qaTitle" class="form-control form-control-sm" value="Bossier City Luxury Short-Term Rental">
            </div>

            <div class="row g-2 mb-2">
              <div class="col-6">
                <label class="form-label small" for="qaPurchase">Purchase Price ($)</label>
                <input type="number" step="1000" min="0" name="purchase_price" id="qaPurchase" class="form-control form-control-sm" value="320000">
              </div>
              <div class="col-6">
                <label class="form-label small" for="qaReno">Renovation Budget ($)</label>
                <input type="number" step="500" min="0" name="renovation_budget" id="qaReno" class="form-control form-control-sm" value="25000">
              </div>
            </div>

            <div class="row g-2 mb-3" id="qaStrInputs">
              <div class="col-4">
                <label class="form-label small" for="qaFurnish">Furnishing ($)</label>
                <input type="number" step="500" min="0" name="furnishing_budget" id="qaFurnish" class="form-control form-control-sm" value="20000">
              </div>
              <div class="col-4">
                <label class="form-label small" for="qaAdr">Proj. ADR ($)</label>
                <input type="number" step="5" min="0" name="projected_adr" id="qaAdr" class="form-control form-control-sm" value="265">
              </div>
              <div class="col-4">
                <label class="form-label small" for="qaOcc">Occupancy (%)</label>
                <input type="number" step="1" min="1" max="100" name="projected_occupancy_pct" id="qaOcc" class="form-control form-control-sm" value="72">
              </div>
            </div>

            <div class="row g-2 mb-3" id="qaCommercialInputs" style="display: none;">
              <div class="col-6">
                <label class="form-label small" for="qaRent">Monthly Rent ($)</label>
                <input type="number" step="100" min="0" name="projected_monthly_rent" id="qaRent" class="form-control form-control-sm" value="4800">
              </div>
              <div class="col-6">
                <label class="form-label small" for="qaLeaseType">Lease Type</label>
                <select name="lease_type" id="qaLeaseType" class="form-select form-select-sm">
                  <option value="triple_net_nnn" selected>Triple Net (NNN)</option>
                  <option value="gross_lease">Modified Gross</option>
                </select>
              </div>
            </div>

            <div class="d-grid gap-2">
              <button type="button" class="btn btn-outline-primary" id="btnRunAiopsAnalysis">
                <em class="icon ni ni-spark"></em><span>Run AIOps Underwriting Analysis</span>
              </button>
              <button type="submit" class="btn btn-success" id="btnPublishDeal">
                <em class="icon ni ni-check-circle-cut"></em><span>Approve &amp; Publish to Marketplace</span>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Right Column: Live AIOps Underwriting & Synthesis Output -->
    <div class="col-lg-7">
      <div id="aiopsAnalysisContainer">
        <!-- Metric Ribbon -->
        <div class="row g-2 mb-3">
          <div class="col-6 col-md-3">
            <div class="card card-bordered text-center p-2">
              <span class="sub-text">AIOps Score</span>
              <div class="h3 mb-0 text-primary" id="cardDealScore">88/100</div>
              <span class="badge bg-success mt-1" id="cardDealGrade">Grade A</span>
            </div>
          </div>
          <div class="col-6 col-md-3">
            <div class="card card-bordered text-center p-2">
              <span class="sub-text">Total Raise</span>
              <div class="h3 mb-0" id="cardTotalRaise">$374,600</div>
              <span class="small text-muted">All-in Capital</span>
            </div>
          </div>
          <div class="col-6 col-md-3">
            <div class="card card-bordered text-center p-2">
              <span class="sub-text">Annual NOI</span>
              <div class="h3 mb-0 text-success" id="cardAnnualNoi">$34,821</div>
              <span class="small text-muted" id="cardMonthlyNoi">$2,901/mo</span>
            </div>
          </div>
          <div class="col-6 col-md-3">
            <div class="card card-bordered text-center p-2">
              <span class="sub-text">Target CoC Return</span>
              <div class="h3 mb-0 text-success" id="cardCocYield">9.30%</div>
              <span class="small text-muted" id="cardCapRate">Cap Rate: 10.88%</span>
            </div>
          </div>
        </div>

        <!-- Executive Summary Card -->
        <div class="card card-bordered mb-3">
          <div class="card-inner">
            <div class="d-flex justify-content-between align-items-center mb-2">
              <h6 class="card-title mb-0">
                <em class="icon ni ni-notes-alt text-primary me-1"></em>Executive Underwriting Thesis
              </h6>
              <span class="badge bg-light text-dark">Bossier City Jurisdiction</span>
            </div>
            <p class="text-secondary small mb-0" id="cardExecutiveSummary">
              Strong residential short-term rental conversion opportunity in Bossier City, LA. At a $320,000 acquisition price with $374,600 total capitalization, the property achieves a projected $34,821/yr Net Operating Income (9.30% Cash-on-Cash yield). AnneAlicia &amp; Timothy can execute a high-end designer furnishing strategy targeting leisure travelers, regional corporate bookings, and event guests.
            </p>
          </div>
        </div>

        <!-- Value-Add Playbook -->
        <div class="card card-bordered mb-3">
          <div class="card-inner">
            <h6 class="card-title mb-2">
              <em class="icon ni ni-growth text-success me-1"></em>Value-Add Execution Playbook
            </h6>
            <div class="row g-2" id="cardPlaybookContainer">
              <div class="col-md-6">
                <div class="border rounded p-2 bg-light h-100">
                  <strong class="d-block small text-dark mb-1">1. Hospitality Furnishing</strong>
                  <span class="small text-muted">Deploy high-yield interior design (local art, luxury bedding, game room/hot tub) to maximize Airbnb/VRBO average daily rate.</span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="border rounded p-2 bg-light h-100">
                  <strong class="d-block small text-dark mb-1">2. Smart Access &amp; Tech</strong>
                  <span class="small text-muted">Install remote keyless entry, smart thermostats, and exterior noise/security monitoring to minimize overhead.</span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="border rounded p-2 bg-light h-100">
                  <strong class="d-block small text-dark mb-1">3. Multi-Platform Syndication</strong>
                  <span class="small text-muted">Syndicate calendar simultaneously across Airbnb, VRBO, and direct MyMI booking channels with dynamic pricing.</span>
                </div>
              </div>
              <div class="col-md-6">
                <div class="border rounded p-2 bg-light h-100">
                  <strong class="d-block small text-dark mb-1">4. Audited Distributions</strong>
                  <span class="small text-muted">Pool platform payouts monthly, deduct operating expenses, and distribute audited USDC pro-rata to coinvestor wallets.</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Downside Risk & Crowdfund Terms -->
        <div class="row g-2">
          <div class="col-md-6">
            <div class="card card-bordered h-100">
              <div class="card-inner">
                <h6 class="card-title small mb-2">
                  <em class="icon ni ni-shield-check text-info me-1"></em>Downside Stress-Testing
                </h6>
                <ul class="list-unstyled small text-muted mb-0" id="cardRisksContainer">
                  <li class="mb-1">&bull; <strong>Occupancy Buffer:</strong> Retains positive cash flow even with a 15% booking dip.</li>
                  <li class="mb-1">&bull; <strong>Local Ordinance:</strong> Factored for Bossier City tourist tax and lodging rules.</li>
                  <li>&bull; <strong>Reserve Fund:</strong> Includes upfront 6-month operating cash buffer.</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card card-bordered h-100">
              <div class="card-inner">
                <h6 class="card-title small mb-2">
                  <em class="icon ni ni-coins text-warning me-1"></em>Co-Investment Offering Terms
                </h6>
                <div class="small text-muted">
                  <div class="d-flex justify-content-between mb-1">
                    <span>Unit Price (USDC):</span>
                    <strong class="text-dark" id="cardUnitPrice">$100.00</strong>
                  </div>
                  <div class="d-flex justify-content-between mb-1">
                    <span>Total Units Issued:</span>
                    <strong class="text-dark" id="cardTotalUnits">3,746</strong>
                  </div>
                  <div class="d-flex justify-content-between mb-1">
                    <span>Sponsor Retained (10%):</span>
                    <strong class="text-dark">375 units</strong>
                  </div>
                  <div class="d-flex justify-content-between mb-1">
                    <span>Community Pool (90%):</span>
                    <strong class="text-dark">3,371 units</strong>
                  </div>
                  <div class="d-flex justify-content-between">
                    <span>Est. Payout per $1k:</span>
                    <strong class="text-success" id="cardPayoutPer1k">$6.58 / mo</strong>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
document.addEventListener('DOMContentLoaded', function(){
  const cat = document.getElementById('qaCategory');
  const strBox = document.getElementById('qaStrInputs');
  const commBox = document.getElementById('qaCommercialInputs');
  const btnAnalyze = document.getElementById('btnRunAiopsAnalysis');
  const btnFetch = document.getElementById('btnFetchListing');
  const inputUrl = document.getElementById('qaListingUrl');
  const inputAddress = document.getElementById('qaAddress');
  const inputCity = document.getElementById('qaCity');
  const inputState = document.getElementById('qaState');
  const inputZip = document.getElementById('qaZip');
  const inputPurchase = document.getElementById('qaPurchase');
  const inputTitle = document.getElementById('qaTitle');
  const badgeListing = document.getElementById('qaListingBadge');
  const alertListing = document.getElementById('qaListingAlert');

  cat.addEventListener('change', function(){
    if (this.value === 'commercial_lease') {
      strBox.style.display = 'none';
      commBox.style.display = 'flex';
    } else {
      strBox.style.display = 'flex';
      commBox.style.display = 'none';
    }
  });

  // Function to fetch and parse listing URL
  function doFetchListing(rawUrl) {
    const url = (rawUrl || inputUrl.value || '').trim();
    if (!url) {
      alertListing.className = 'alert alert-warning py-1 px-2 small mb-0';
      alertListing.innerHTML = 'Please paste a valid Zillow, Realtor, or listing URL.';
      alertListing.style.display = 'block';
      return;
    }

    const origBtnHtml = btnFetch.innerHTML;
    btnFetch.innerHTML = '<span class="spinner-border spinner-border-sm me-1" role="status"></span> Extracting...';
    btnFetch.disabled = true;
    badgeListing.className = 'badge bg-warning text-dark small';
    badgeListing.innerText = 'Extracting data...';
    alertListing.style.display = 'none';

    const form = document.getElementById('aiopsAnalysisForm');
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
        badgeListing.innerText = 'Manual input needed';
        alertListing.className = 'alert alert-danger py-1 px-2 small mb-0';
        alertListing.innerHTML = res?.message || 'Could not auto-extract listing. You may enter property details manually.';
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
      alertListing.innerHTML = '<strong>Success!</strong> Auto-filled from ' + (d.source_domain || 'listing') + ': ' + (d.address_line1 || '') + priceStr + '. Re-calculating pro forma...';
      alertListing.style.display = 'block';

      // Auto-trigger AIOps underwriting analysis
      btnAnalyze.click();
    })
    .catch(err => {
      btnFetch.innerHTML = origBtnHtml;
      btnFetch.disabled = false;
      badgeListing.className = 'badge bg-danger text-white small';
      badgeListing.innerText = 'Fetch error';
      alertListing.className = 'alert alert-danger py-1 px-2 small mb-0';
      alertListing.innerHTML = 'Network error fetching listing. Please check connection or enter address manually.';
      alertListing.style.display = 'block';
      console.error(err);
    });
  }

  btnFetch.addEventListener('click', function(e){
    e.preventDefault();
    doFetchListing();
  });

  // Auto-detect when URL is pasted into the listing URL input
  inputUrl.addEventListener('paste', function(e){
    setTimeout(function(){
      const val = inputUrl.value.trim();
      if (val.startsWith('http://') || val.startsWith('https://') || val.includes('zillow.com') || val.includes('realtor.com')) {
        doFetchListing(val);
      }
    }, 100);
  });

  // If user accidentally pastes a URL into the Address field, intercept and redirect to Listing URL
  inputAddress.addEventListener('paste', function(e){
    setTimeout(function(){
      const val = inputAddress.value.trim();
      if (val.startsWith('http://') || val.startsWith('https://') || val.includes('zillow.com') || val.includes('realtor.com')) {
        inputUrl.value = val;
        inputAddress.value = '';
        doFetchListing(val);
      }
    }, 100);
  });

  btnAnalyze.addEventListener('click', function(e){
    e.preventDefault();
    const origHtml = btnAnalyze.innerHTML;
    btnAnalyze.innerHTML = '<span class="spinner-border spinner-border-sm me-1" role="status"></span> Analyzing with AIOps...';
    btnAnalyze.disabled = true;

    const formData = new FormData(document.getElementById('aiopsAnalysisForm'));

    fetch('<?= site_url("Management/Projects/Quick-Analysis/Analyze") ?>', {
      method: 'POST',
      body: formData,
      headers: {
        'X-Requested-With': 'XMLHttpRequest'
      }
    })
    .then(r => r.json())
    .then(data => {
      btnAnalyze.innerHTML = origHtml;
      btnAnalyze.disabled = false;

      if (!data || data.status !== 'ok') {
        alert('Analysis error: ' + (data.message || 'Unable to analyze property.'));
        return;
      }

      // Update UI metrics
      document.getElementById('cardDealScore').innerText = data.deal_score + '/100';
      document.getElementById('cardDealGrade').innerText = 'Grade ' + data.deal_grade;
      document.getElementById('cardTotalRaise').innerText = '$' + Math.round(data.pro_forma.total_acquisition).toLocaleString();
      document.getElementById('cardAnnualNoi').innerText = '$' + Math.round(data.pro_forma.projected_annual_noi).toLocaleString();
      document.getElementById('cardMonthlyNoi').innerText = '$' + Math.round(data.pro_forma.projected_monthly_noi).toLocaleString() + '/mo';
      document.getElementById('cardCocYield').innerText = Number(data.pro_forma.target_coc_return).toFixed(2) + '%';
      document.getElementById('cardCapRate').innerText = 'Cap Rate: ' + Number(data.pro_forma.cap_rate).toFixed(2) + '%';

      // Update summary
      if (data.executive_summary) {
        document.getElementById('cardExecutiveSummary').innerText = data.executive_summary;
      }

      // Update Playbook
      if (data.value_add_playbook) {
        let pbHtml = '';
        let step = 1;
        for (const [title, desc] of Object.entries(data.value_add_playbook)) {
          pbHtml += `
            <div class="col-md-6">
              <div class="border rounded p-2 bg-light h-100">
                <strong class="d-block small text-dark mb-1">${step}. ${title}</strong>
                <span class="small text-muted">${desc}</span>
              </div>
            </div>`;
          step++;
        }
        document.getElementById('cardPlaybookContainer').innerHTML = pbHtml;
      }

      // Update Risks
      if (data.stress_test_risks) {
        let rHtml = '';
        for (const [title, desc] of Object.entries(data.stress_test_risks)) {
          rHtml += `<li class="mb-1">&bull; <strong>${title}:</strong> ${desc}</li>`;
        }
        document.getElementById('cardRisksContainer').innerHTML = rHtml;
      }

      // Update Crowdfund Terms
      if (data.crowdfund_structure) {
        document.getElementById('cardTotalUnits').innerText = Number(data.crowdfund_structure.total_units_issued).toLocaleString();
        document.getElementById('cardPayoutPer1k').innerText = '$' + Number(data.crowdfund_structure.est_monthly_payout_per_1k).toFixed(2) + ' / mo';
      }
    })
    .catch(err => {
      btnAnalyze.innerHTML = origHtml;
      btnAnalyze.disabled = false;
      console.error(err);
      alert('Network error communicating with AIOps analysis engine.');
    });
  });
});
</script>
