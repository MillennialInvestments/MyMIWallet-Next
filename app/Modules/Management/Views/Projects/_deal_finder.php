<?php
/**
 * Distressed Property & Section 8 Deal Finder View
 *
 * Multi-portal distressed sourcing across:
 *  - foreclosure.com
 *  - auction.com
 *  - equator.com
 *  - xome.com
 *  - realtytrac.com
 *
 * Evaluates:
 *  - <$50K purchase price
 *  - >1,700 sqft
 *  - 3+ Bedroom
 *  - Section 8 HUD Fair Market Rents (huduser.gov)
 *  - Business Credit Cards (0% intro APR lines)
 *  - DSCR Loans (1.20x+ coverage)
 *  - 70% of Appraisal / MAO Rule
 *
 * Lead Sponsor: Timothy Burks Incorporated, LLC.
 * Operating Managers: Timothy Burks & AnneAlicia Burks, Bossier City, Louisiana.
 */
$finderData = $dealFinderData ?? [];
$deals = $finderData['deals'] ?? [];
$hudFmr = $finderData['hud_fmr_benchmarks'] ?? [
    'zip_code' => '71111',
    'city' => 'Bossier City',
    'state' => 'LA',
    'metro_area' => 'Shreveport-Bossier City MSA',
    'fmr_schedule' => ['0bed' => 840, '1bed' => 970, '2bed' => 1145, '3bed' => 1485, '4bed' => 1720],
];
$fmrSched = $hudFmr['fmr_schedule'] ?? ['3bed' => 1485, '4bed' => 1720];
$urls = $finderData['platform_urls'] ?? [];
?>
<div class="nk-block-head nk-block-head-sm">
  <div class="nk-block-between">
    <div class="nk-block-head-content">
      <nav class="mb-2">
        <a href="<?= site_url('Management/Projects') ?>" class="text-soft">&larr; Back to Management Projects</a>
      </nav>
      <h3 class="nk-block-title page-title">Distressed Property &amp; Section 8 Deal Finder</h3>
      <div class="nk-block-des text-soft">
        <p class="mb-1">Multi-site sourcing engine targeting sub-$50k homes with 1,700+ sqft, Section 8 guaranteed rent, and DSCR/0% CC financing.</p>
        <p class="small text-muted mb-0">
          <strong>Lead Sponsor:</strong> Timothy Burks Incorporated, LLC. &bull; 
          <strong>Operating Managers:</strong> Timothy Burks &amp; AnneAlicia Burks &bull; 
          Bossier City, Louisiana
        </p>
      </div>
    </div>
    <div class="nk-block-head-content">
      <a href="<?= site_url('Management/Projects/Quick-Analysis') ?>" class="btn btn-outline-primary me-2">
        <em class="icon ni ni-spark"></em><span>Quick-Analysis Underwriter</span>
      </a>
      <a href="<?= site_url('Management/Projects/Quick-Intake') ?>" class="btn btn-outline-success me-2">
        <em class="icon ni ni-plus-circle"></em><span>Drop Listing Link</span>
      </a>
      <a href="<?= site_url('Projects/Real-Estate') ?>" class="btn btn-outline-secondary" target="_blank">
        <em class="icon ni ni-globe"></em><span>Marketplace</span>
      </a>
    </div>
  </div>
</div>

<!-- Platform Direct Sourcing Hub -->
<div class="card card-bordered mb-3 bg-lighter shadow-sm">
  <div class="card-inner py-2 px-3">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2">
      <span class="small fw-bold text-dark">
        <em class="icon ni ni-radar text-primary me-1"></em>Connected Distressed Portals:
      </span>
      <div class="d-flex flex-wrap gap-1" id="platformLinksBar">
        <a href="<?= esc($urls['foreclosure']['search_url'] ?? 'https://www.foreclosure.com') ?>" target="_blank" class="btn btn-xs btn-outline-danger">
          <em class="icon ni ni-external me-1"></em>Foreclosure.com
        </a>
        <a href="<?= esc($urls['auction']['search_url'] ?? 'https://www.auction.com') ?>" target="_blank" class="btn btn-xs btn-outline-warning text-dark">
          <em class="icon ni ni-external me-1"></em>Auction.com
        </a>
        <a href="<?= esc($urls['equator']['search_url'] ?? 'https://www.equator.com') ?>" target="_blank" class="btn btn-xs btn-outline-primary">
          <em class="icon ni ni-external me-1"></em>Equator.com REO
        </a>
        <a href="<?= esc($urls['xome']['search_url'] ?? 'https://www.xome.com') ?>" target="_blank" class="btn btn-xs btn-outline-info">
          <em class="icon ni ni-external me-1"></em>Xome.com
        </a>
        <a href="<?= esc($urls['realtytrac']['search_url'] ?? 'https://www.realtytrac.com') ?>" target="_blank" class="btn btn-xs btn-outline-secondary">
          <em class="icon ni ni-external me-1"></em>RealtyTrac.com
        </a>
      </div>
    </div>
  </div>
</div>

<div class="nk-block">
  <div class="row g-gs">
    <!-- Left Column: Sourcing Filters, HUD FMR & Financing Strategies -->
    <div class="col-lg-4">
      <!-- Search Filter Form -->
      <div class="card card-bordered mb-3">
        <div class="card-inner">
          <h6 class="card-title mb-2">
            <em class="icon ni ni-filter text-primary me-1"></em>Deal Criteria Filters
          </h6>
          <form id="dealFinderForm">
            <?= csrf_field(); ?>

            <!-- Max Price -->
            <div class="mb-2">
              <div class="d-flex justify-content-between align-items-center mb-1">
                <label class="form-label small mb-0" for="dfMaxPrice">Maximum Purchase Price ($)</label>
                <span class="badge bg-success-soft text-success small" style="font-size:0.7rem;">&lt; $50K Target</span>
              </div>
              <div class="input-group input-group-sm">
                <span class="input-group-text">$</span>
                <input type="number" step="1000" min="5000" max="250000" name="max_price" id="dfMaxPrice" class="form-control" value="50000">
              </div>
              <div class="btn-group btn-group-sm w-100 mt-1" role="group">
                <button type="button" class="btn btn-xs btn-outline-secondary" onclick="setMaxPrice(35000)">$35k</button>
                <button type="button" class="btn btn-xs btn-outline-success active" onclick="setMaxPrice(50000)">$50k Target</button>
                <button type="button" class="btn btn-xs btn-outline-secondary" onclick="setMaxPrice(75000)">$75k</button>
                <button type="button" class="btn btn-xs btn-outline-secondary" onclick="setMaxPrice(100000)">$100k</button>
              </div>
            </div>

            <!-- Min SqFt -->
            <div class="mb-2">
              <div class="d-flex justify-content-between align-items-center mb-1">
                <label class="form-label small mb-0" for="dfMinSqft">Minimum Square Feet</label>
                <span class="badge bg-primary-soft text-primary small" style="font-size:0.7rem;">&gt; 1,700 SqFt Target</span>
              </div>
              <input type="number" step="50" min="500" max="10000" name="min_sqft" id="dfMinSqft" class="form-control form-control-sm" value="1700">
              <div class="btn-group btn-group-sm w-100 mt-1" role="group">
                <button type="button" class="btn btn-xs btn-outline-secondary" onclick="setMinSqft(1500)">1,500+</button>
                <button type="button" class="btn btn-xs btn-outline-primary active" onclick="setMinSqft(1700)">1,700+ Target</button>
                <button type="button" class="btn btn-xs btn-outline-secondary" onclick="setMinSqft(2000)">2,000+</button>
              </div>
            </div>

            <!-- Beds & Baths -->
            <div class="row g-2 mb-2">
              <div class="col-6">
                <label class="form-label small mb-1" for="dfBeds">Bedrooms</label>
                <select name="beds" id="dfBeds" class="form-select form-select-sm">
                  <option value="2">2+ Beds</option>
                  <option value="3" selected>3+ Beds (FMR Target)</option>
                  <option value="4">4+ Beds (Super Voucher)</option>
                </select>
              </div>
              <div class="col-6">
                <label class="form-label small mb-1" for="dfZip">Target ZIP Code</label>
                <input type="text" name="zip" id="dfZip" class="form-control form-control-sm" value="71111" maxlength="5">
              </div>
            </div>

            <!-- Regional Selector -->
            <div class="row g-2 mb-3">
              <div class="col-8">
                <label class="form-label small mb-1" for="dfCity">Target City</label>
                <input type="text" name="city" id="dfCity" class="form-control form-control-sm" value="Bossier City">
              </div>
              <div class="col-4">
                <label class="form-label small mb-1" for="dfState">State</label>
                <input type="text" name="state" id="dfState" class="form-control form-control-sm text-uppercase" value="LA" maxlength="2">
              </div>
            </div>

            <!-- Priority ZIP Quick Pickers -->
            <div class="mb-3 p-2 bg-light rounded border">
              <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="small fw-bold text-dark"><em class="icon ni ni-map-pin text-primary me-1"></em>High-Yield Opportunity ZIPs</span>
                <span class="text-muted small" style="font-size:0.7rem;">HUD Priority</span>
              </div>
              <div class="d-flex flex-wrap gap-1">
                <button type="button" class="btn btn-xs btn-outline-dark" onclick="setTargetZip('71111', 'Bossier City')">71111 (Bossier)</button>
                <button type="button" class="btn btn-xs btn-outline-dark" onclick="setTargetZip('71112', 'Bossier City')">71112 (South Bossier)</button>
                <button type="button" class="btn btn-xs btn-outline-dark" onclick="setTargetZip('71101', 'Shreveport')">71101 (Downtown)</button>
                <button type="button" class="btn btn-xs btn-outline-dark" onclick="setTargetZip('71103', 'Shreveport')">71103 (Queensboro)</button>
                <button type="button" class="btn btn-xs btn-outline-dark" onclick="setTargetZip('71107', 'Shreveport')">71107 (North Mkt)</button>
              </div>
            </div>

            <div class="d-grid gap-2">
              <button type="button" class="btn btn-primary" id="btnRunDealSearch">
                <em class="icon ni ni-search"></em><span>Scan Distressed Inventory</span>
              </button>
            </div>
          </form>
        </div>
      </div>

      <!-- HUD Fair Market Rent Calculator (huduser.gov) -->
      <div class="card card-bordered mb-3 border-info-subtle">
        <div class="card-inner">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <h6 class="card-title mb-0 small">
              <em class="icon ni ni-shield-check text-info me-1"></em>HUD Fair Market Rent (FMR)
            </h6>
            <span class="badge bg-info-soft text-info small" id="hudZipBadge">ZIP <?= esc($hudFmr['zip_code']) ?></span>
          </div>
          <p class="small text-muted mb-2" style="font-size:0.72rem;">
            Official Public Housing Authority (PHA) Section 8 payment standards via <strong>huduser.gov</strong>:
          </p>
          <div class="bg-light rounded p-2 mb-2">
            <div class="d-flex justify-content-between py-1 border-bottom small">
              <span>0-Bed (Studio):</span>
              <strong class="text-dark" id="fmr0Bed">$<?= number_format($hudFmr['fmr_schedule']['0bed'] ?? 840) ?> / mo</strong>
            </div>
            <div class="d-flex justify-content-between py-1 border-bottom small">
              <span>1-Bedroom:</span>
              <strong class="text-dark" id="fmr1Bed">$<?= number_format($hudFmr['fmr_schedule']['1bed'] ?? 970) ?> / mo</strong>
            </div>
            <div class="d-flex justify-content-between py-1 border-bottom small">
              <span>2-Bedroom:</span>
              <strong class="text-dark" id="fmr2Bed">$<?= number_format($hudFmr['fmr_schedule']['2bed'] ?? 1145) ?> / mo</strong>
            </div>
            <div class="d-flex justify-content-between py-1 border-bottom small bg-white px-1 rounded">
              <span class="fw-bold text-success">3-Bedroom (Target):</span>
              <strong class="text-success fs-14px" id="fmr3Bed">$<?= number_format($fmrSched['3bed'] ?? 1485) ?> / mo</strong>
            </div>
            <div class="d-flex justify-content-between pt-1 small">
              <span class="fw-bold text-primary">4-Bedroom:</span>
              <strong class="text-primary" id="fmr4Bed">$<?= number_format($fmrSched['4bed'] ?? 1720) ?> / mo</strong>
            </div>
          </div>
          <div class="small text-muted" style="font-size:0.7rem;">
            🏛️ <strong>Section 8 Arbitrage:</strong> A $42,500 purchase with $15,000 rehab yields <strong>$17,820/yr</strong> in guaranteed direct-deposit rent (31% gross annual yield!).
          </div>
        </div>
      </div>

      <!-- Financing Strategies Playbook -->
      <div class="card card-bordered mb-3">
        <div class="card-inner">
          <h6 class="card-title mb-2 small">
            <em class="icon ni ni-coins text-warning me-1"></em>Financing Execution Strategies
          </h6>
          <div class="small">
            <div class="border rounded p-2 mb-2 bg-light">
              <strong class="d-block text-dark"><em class="icon ni ni-cc-alt text-primary me-1"></em>1. Business Credit Cards (0% APR)</strong>
              <span class="text-muted" style="font-size:0.72rem;">
                Stack 0% intro APR business cards ($25k-$50k lines) for 100% of acquisition and cosmetic rehab. Zero interest holding costs for 12-18 months.
              </span>
            </div>
            <div class="border rounded p-2 mb-2 bg-light">
              <strong class="d-block text-dark"><em class="icon ni ni-calc text-success me-1"></em>2. DSCR Loans (1.20x+ Coverage)</strong>
              <span class="text-muted" style="font-size:0.72rem;">
                Debt Service Coverage Ratio loans qualified 100% on the Section 8 voucher rent. $1,485 rent vs $550 debt service gives <strong>2.7x DSCR</strong> (no W-2 needed).
              </span>
            </div>
            <div class="border rounded p-2 bg-light">
              <strong class="d-block text-dark"><em class="icon ni ni-growth text-warning me-1"></em>3. 70% Appraisal / MAO Rule</strong>
              <span class="text-muted" style="font-size:0.72rem;">
                Max Allowable Offer = (Appraised ARV &times; 0.70) - Renovation. Ensures immediate 30%+ instant equity margin and downside capital protection.
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Right Column: Distressed Deals Feed & Direct Actions -->
    <div class="col-lg-8">
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h5 class="mb-0 fs-16px text-dark">
          <em class="icon ni ni-building text-primary me-1"></em>Matched Distressed Inventory (<span id="resultsCount"><?= count($deals) ?></span> Opportunities)
        </h5>
        <span class="badge bg-success-soft text-success small" id="searchFeedbackBadge">Filtered for &lt;$50k &bull; &gt;1,700 SqFt &bull; 3+ Bed</span>
      </div>

      <div id="distressedDealsContainer">
        <?php if (empty($deals)): ?>
          <div class="card card-bordered text-center py-5">
            <em class="icon ni ni-search text-soft" style="font-size: 42px;"></em>
            <h6 class="mt-3 text-dark">No Distressed Properties Matched</h6>
            <p class="small text-muted mb-3">Adjust your price ceiling or search radius to discover additional properties.</p>
            <button type="button" class="btn btn-sm btn-primary" onclick="setMaxPrice(75000); document.getElementById('btnRunDealSearch').click();">
              Expand Search to $75k
            </button>
          </div>
        <?php else: ?>
          <?php foreach ($deals as $deal): ?>
            <?php
            $uw = $deal['underwriting'] ?? [];
            $price = (float) $deal['purchase_price'];
            $sqft = (int) $deal['sqft'];
            $beds = (int) $deal['beds'];
            $baths = (float) ($deal['baths'] ?? 2.0);
            $arv = (float) ($deal['appraised_arv'] ?? 125000);
            $sec8Rent = (float) ($uw['hud_fmr']['monthly_voucher_rate'] ?? 1450);
            $dscr = (float) ($uw['dscr_loan_underwriting']['dscr_ratio'] ?? 2.4);
            $maoLimit = (float) ($uw['rule_70_appraisal']['mao_limit'] ?? 72500);
            $equity = (float) ($uw['rule_70_appraisal']['equity_spread'] ?? 68000);
            $platformKey = $deal['platform'] ?? 'foreclosure.com';
            $pConfig = \App\Services\RealEstateDealFinderService::PLATFORMS[$platformKey] ?? [
                'name' => 'Distressed Source',
                'badge' => 'Distressed',
                'color_class' => 'primary',
            ];
            ?>
            <div class="card card-bordered mb-3 shadow-sm deal-item-card">
              <div class="card-inner p-3">
                <div class="d-flex justify-content-between align-items-start mb-2">
                  <div>
                    <span class="badge bg-<?= $pConfig['color_class'] ?> small mb-1">
                      <?= esc($pConfig['badge']) ?> &bull; <?= esc($deal['distressed_type']) ?>
                    </span>
                    <h6 class="card-title mb-0">
                      <?= esc($deal['address']) ?>, <?= esc($deal['city']) ?>, <?= esc($deal['state']) ?> <?= esc($deal['zip']) ?>
                    </h6>
                    <span class="small text-muted">
                      <?= esc($deal['title']) ?> &bull; Status: <strong><?= esc($deal['status']) ?></strong>
                    </span>
                  </div>
                  <div class="text-end">
                    <div class="h4 mb-0 text-success fw-bold">$<?= number_format($price, 0) ?></div>
                    <span class="small text-muted" style="font-size:0.75rem;">$<?= round($price / max(1, $sqft), 1) ?> / sqft</span>
                  </div>
                </div>

                <!-- Metrics Grid -->
                <div class="row g-2 mb-3 bg-light rounded p-2 border">
                  <div class="col-6 col-sm-3">
                    <span class="sub-text" style="font-size:0.7rem;">Property Size</span>
                    <div class="fw-bold text-dark"><?= number_format($sqft) ?> sqft</div>
                    <span class="small text-muted"><?= $beds ?> Bed / <?= $baths ?> Bath</span>
                  </div>
                  <div class="col-6 col-sm-3">
                    <span class="sub-text" style="font-size:0.7rem;">HUD Section 8 FMR</span>
                    <div class="fw-bold text-success">$<?= number_format($sec8Rent, 0) ?>/mo</div>
                    <span class="small text-muted">$<?= number_format($sec8Rent * 12, 0) ?>/yr guaranteed</span>
                  </div>
                  <div class="col-6 col-sm-3">
                    <span class="sub-text" style="font-size:0.7rem;">DSCR Coverage</span>
                    <div class="fw-bold text-primary"><?= $dscr ?>x DSCR</div>
                    <span class="small text-muted">No W-2 Required</span>
                  </div>
                  <div class="col-6 col-sm-3">
                    <span class="sub-text" style="font-size:0.7rem;">70% Appraisal Equity</span>
                    <div class="fw-bold text-dark">+$<?= number_format($equity, 0) ?> Spread</div>
                    <span class="small text-muted">ARV: $<?= number_format($arv, 0) ?></span>
                  </div>
                </div>

                <!-- Financing Strategy Tag Bar -->
                <div class="d-flex flex-wrap gap-1 align-items-center mb-3">
                  <span class="small text-muted me-1" style="font-size:0.72rem;">Financing Fit:</span>
                  <span class="badge bg-outline-success" style="font-size:0.68rem;">✓ 0% Business CC Eligible ($<?= number_format($price + 15000) ?> All-In)</span>
                  <span class="badge bg-outline-primary" style="font-size:0.68rem;">✓ Super-Prime DSCR (<?= $dscr ?>x)</span>
                  <span class="badge bg-outline-warning text-dark" style="font-size:0.68rem;">✓ $<?= number_format($maoLimit - $price) ?> Below 70% MAO</span>
                </div>

                <!-- Action Button Group -->
                <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-2 border-top">
                  <a href="<?= esc($deal['direct_url']) ?>" target="_blank" class="btn btn-sm btn-outline-secondary">
                    <em class="icon ni ni-external me-1"></em><span>View on <?= esc($pConfig['name']) ?></span>
                  </a>
                  <div class="d-flex gap-1">
                    <button type="button" class="btn btn-sm btn-outline-success" onclick="queueToInbox(<?= htmlspecialchars(json_encode($deal), ENT_QUOTES, 'UTF-8') ?>)">
                      <em class="icon ni ni-download me-1"></em><span>Save to Intake Queue</span>
                    </button>
                    <a href="<?= site_url('Management/Projects/Quick-Analysis') ?>?address=<?= urlencode((string) $deal['address']) ?>&purchase_price=<?= (int) $price ?>&city=<?= urlencode((string) $deal['city']) ?>&state=<?= urlencode((string) $deal['state']) ?>&postal_code=<?= urlencode((string) $deal['zip']) ?>" class="btn btn-sm btn-primary">
                      <em class="icon ni ni-spark me-1"></em><span>Underwrite in Quick-Analysis &rarr;</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
function setMaxPrice(val) {
  const el = document.getElementById('dfMaxPrice');
  if (el) el.value = val;
}

function setMinSqft(val) {
  const el = document.getElementById('dfMinSqft');
  if (el) el.value = val;
}

function setTargetZip(zip, city) {
  const elZip = document.getElementById('dfZip');
  const elCity = document.getElementById('dfCity');
  if (elZip) elZip.value = zip;
  if (elCity) elCity.value = city;
  fetchHudFmr(zip);
}

function fetchHudFmr(zip) {
  const payload = new FormData();
  payload.append('zip', zip);
  const form = document.getElementById('dealFinderForm');
  const csrf = form.querySelector('input[name="csrf_token_name"]')?.value || form.querySelector('input[name="csrf_test_name"]')?.value || '';
  if (csrf) {
    payload.append('csrf_token_name', csrf);
    payload.append('csrf_test_name', csrf);
  }

  fetch('<?= site_url("Management/Projects/Deal-Finder/Hud-Fmr") ?>', {
    method: 'POST',
    body: payload,
    headers: { 'X-Requested-With': 'XMLHttpRequest' }
  })
  .then(r => r.json())
  .then(res => {
    if (res && res.status === 'ok' && res.data) {
      const d = res.data;
      const sched = d.fmr_schedule || {};
      const zBadge = document.getElementById('hudZipBadge');
      if (zBadge) zBadge.innerText = 'ZIP ' + d.zip_code;
      if (sched['0bed']) document.getElementById('fmr0Bed').innerText = '$' + sched['0bed'].toLocaleString() + ' / mo';
      if (sched['1bed']) document.getElementById('fmr1Bed').innerText = '$' + sched['1bed'].toLocaleString() + ' / mo';
      if (sched['2bed']) document.getElementById('fmr2Bed').innerText = '$' + sched['2bed'].toLocaleString() + ' / mo';
      if (sched['3bed']) document.getElementById('fmr3Bed').innerText = '$' + sched['3bed'].toLocaleString() + ' / mo';
      if (sched['4bed']) document.getElementById('fmr4Bed').innerText = '$' + sched['4bed'].toLocaleString() + ' / mo';
    }
  })
  .catch(err => console.error(err));
}

function queueToInbox(deal) {
  const payload = new FormData();
  payload.append('source', deal.platform || 'foreclosure.com');
  payload.append('address_line1', deal.address || '');
  payload.append('city', deal.city || '');
  payload.append('state', deal.state || 'LA');
  payload.append('postal_code', deal.zip || '71111');
  payload.append('purchase_price', deal.purchase_price || 0);
  payload.append('zillow_url', deal.direct_url || '');

  const form = document.getElementById('dealFinderForm');
  const csrf = form.querySelector('input[name="csrf_token_name"]')?.value || form.querySelector('input[name="csrf_test_name"]')?.value || '';
  if (csrf) {
    payload.append('csrf_token_name', csrf);
    payload.append('csrf_test_name', csrf);
  }

  fetch('<?= site_url("Management/Projects/Quick-Intake") ?>', {
    method: 'POST',
    body: payload,
    headers: { 'X-Requested-With': 'XMLHttpRequest' }
  })
  .then(() => {
    alert('✓ Saved ' + (deal.address || 'deal') + ' to Property Intake Queue!');
  })
  .catch(err => console.error(err));
}

document.addEventListener('DOMContentLoaded', function(){
  const btnSearch = document.getElementById('btnRunDealSearch');
  const inputZip = document.getElementById('dfZip');

  inputZip?.addEventListener('change', function(){
    fetchHudFmr(this.value.trim());
  });

  btnSearch?.addEventListener('click', function(e){
    e.preventDefault();
    const origHtml = btnSearch.innerHTML;
    btnSearch.innerHTML = '<span class="spinner-border spinner-border-sm me-1" role="status"></span> Scanning...';
    btnSearch.disabled = true;

    const formData = new FormData(document.getElementById('dealFinderForm'));

    fetch('<?= site_url("Management/Projects/Deal-Finder/Search") ?>', {
      method: 'POST',
      body: formData,
      headers: { 'X-Requested-With': 'XMLHttpRequest' }
    })
    .then(r => r.json())
    .then(data => {
      btnSearch.innerHTML = origHtml;
      btnSearch.disabled = false;

      if (!data || data.status !== 'ok') return;

      const deals = data.deals || [];
      document.getElementById('resultsCount').innerText = deals.length;

      // Update platform URLs in header
      if (data.platform_urls) {
        const u = data.platform_urls;
        let pBarHtml = '';
        if (u.foreclosure) pBarHtml += `<a href="${u.foreclosure.search_url}" target="_blank" class="btn btn-xs btn-outline-danger"><em class="icon ni ni-external me-1"></em>Foreclosure.com</a> `;
        if (u.auction) pBarHtml += `<a href="${u.auction.search_url}" target="_blank" class="btn btn-xs btn-outline-warning text-dark"><em class="icon ni ni-external me-1"></em>Auction.com</a> `;
        if (u.equator) pBarHtml += `<a href="${u.equator.search_url}" target="_blank" class="btn btn-xs btn-outline-primary"><em class="icon ni ni-external me-1"></em>Equator.com REO</a> `;
        if (u.xome) pBarHtml += `<a href="${u.xome.search_url}" target="_blank" class="btn btn-xs btn-outline-info"><em class="icon ni ni-external me-1"></em>Xome.com</a> `;
        if (u.realtytrac) pBarHtml += `<a href="${u.realtytrac.search_url}" target="_blank" class="btn btn-xs btn-outline-secondary"><em class="icon ni ni-external me-1"></em>RealtyTrac.com</a>`;
        const bar = document.getElementById('platformLinksBar');
        if (bar) bar.innerHTML = pBarHtml;
      }

      // Render deals
      const container = document.getElementById('distressedDealsContainer');
      if (!deals.length) {
        container.innerHTML = `
          <div class="card card-bordered text-center py-5">
            <em class="icon ni ni-search text-soft" style="font-size: 42px;"></em>
            <h6 class="mt-3 text-dark">No Distressed Properties Matched</h6>
            <p class="small text-muted mb-3">Adjust your price ceiling or search radius to discover additional properties.</p>
          </div>`;
        return;
      }

      let html = '';
      deals.forEach(d => {
        const uw = d.underwriting || {};
        const p = Number(d.purchase_price) || 0;
        const sq = Number(d.sqft) || 1700;
        const beds = Number(d.beds) || 3;
        const baths = Number(d.baths) || 2;
        const arv = Number(d.appraised_arv) || 125000;
        const sec8 = Number(uw.hud_fmr?.monthly_voucher_rate) || 1450;
        const dscr = Number(uw.dscr_loan_underwriting?.dscr_ratio) || 2.4;
        const equity = Number(uw.rule_70_appraisal?.equity_spread) || 68000;
        const mao = Number(uw.rule_70_appraisal?.mao_limit) || 72500;
        const dealJson = JSON.stringify(d).replace(/"/g, '&quot;');

        html += `
          <div class="card card-bordered mb-3 shadow-sm deal-item-card">
            <div class="card-inner p-3">
              <div class="d-flex justify-content-between align-items-start mb-2">
                <div>
                  <span class="badge bg-danger small mb-1">${d.platform || 'Distressed'} &bull; ${d.distressed_type || 'Foreclosure'}</span>
                  <h6 class="card-title mb-0">${d.address}, ${d.city}, ${d.state} ${d.zip}</h6>
                  <span class="small text-muted">${d.title} &bull; Status: <strong>${d.status || 'Active'}</strong></span>
                </div>
                <div class="text-end">
                  <div class="h4 mb-0 text-success fw-bold">$${Math.round(p).toLocaleString()}</div>
                  <span class="small text-muted" style="font-size:0.75rem;">$${Math.round(p / sq)} / sqft</span>
                </div>
              </div>
              <div class="row g-2 mb-3 bg-light rounded p-2 border">
                <div class="col-6 col-sm-3">
                  <span class="sub-text" style="font-size:0.7rem;">Property Size</span>
                  <div class="fw-bold text-dark">${sq.toLocaleString()} sqft</div>
                  <span class="small text-muted">${beds} Bed / ${baths} Bath</span>
                </div>
                <div class="col-6 col-sm-3">
                  <span class="sub-text" style="font-size:0.7rem;">HUD Section 8 FMR</span>
                  <div class="fw-bold text-success">$${Math.round(sec8).toLocaleString()}/mo</div>
                  <span class="small text-muted">$${Math.round(sec8 * 12).toLocaleString()}/yr guaranteed</span>
                </div>
                <div class="col-6 col-sm-3">
                  <span class="sub-text" style="font-size:0.7rem;">DSCR Coverage</span>
                  <div class="fw-bold text-primary">${dscr}x DSCR</div>
                  <span class="small text-muted">No W-2 Required</span>
                </div>
                <div class="col-6 col-sm-3">
                  <span class="sub-text" style="font-size:0.7rem;">70% Appraisal Equity</span>
                  <div class="fw-bold text-dark">+$${Math.round(equity).toLocaleString()} Spread</div>
                  <span class="small text-muted">ARV: $${Math.round(arv).toLocaleString()}</span>
                </div>
              </div>
              <div class="d-flex flex-wrap gap-1 align-items-center mb-3">
                <span class="badge bg-outline-success" style="font-size:0.68rem;">✓ 0% Business CC Eligible</span>
                <span class="badge bg-outline-primary" style="font-size:0.68rem;">✓ Super-Prime DSCR (${dscr}x)</span>
                <span class="badge bg-outline-warning text-dark" style="font-size:0.68rem;">✓ $${Math.round(mao - p).toLocaleString()} Below 70% MAO</span>
              </div>
              <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 pt-2 border-top">
                <a href="${d.direct_url}" target="_blank" class="btn btn-sm btn-outline-secondary">
                  <em class="icon ni ni-external me-1"></em><span>View Source</span>
                </a>
                <div class="d-flex gap-1">
                  <button type="button" class="btn btn-sm btn-outline-success" onclick="queueToInbox(${dealJson})">
                    <em class="icon ni ni-download me-1"></em><span>Save to Intake Queue</span>
                  </button>
                  <a href="<?= site_url('Management/Projects/Quick-Analysis') ?>?address=${encodeURIComponent(d.address)}&purchase_price=${p}&city=${encodeURIComponent(d.city)}&state=${encodeURIComponent(d.state)}&postal_code=${encodeURIComponent(d.zip)}" class="btn btn-sm btn-primary">
                    <em class="icon ni ni-spark me-1"></em><span>Underwrite in Quick-Analysis &rarr;</span>
                  </a>
                </div>
              </div>
            </div>
          </div>`;
      });
      container.innerHTML = html;
    })
    .catch(err => {
      btnSearch.innerHTML = origHtml;
      btnSearch.disabled = false;
      console.error(err);
    });
  });
});
</script>
