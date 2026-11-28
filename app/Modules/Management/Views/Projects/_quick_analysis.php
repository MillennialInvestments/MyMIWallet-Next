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
                <option value="residential_ltr">Residential Pure Renting (12-Month Lease)</option>
                <option value="wholesale_flip">Wholesale Contract Flip &amp; Cash Buyer Match (Tranchi-Style)</option>
                <option value="commercial_lease">Commercial Leased Asset (NNN / Triple Net)</option>
              </select>
            </div>

            <div class="mb-2">
              <label class="form-label small" for="qaTitle">Deal Title</label>
              <input type="text" name="title" id="qaTitle" class="form-control form-control-sm" value="Bossier City Luxury Short-Term Rental">
            </div>

            <!-- Preset Overrides -->
            <div class="mb-3 p-2 bg-light rounded border">
              <div class="d-flex justify-content-between align-items-center mb-1">
                <span class="small fw-bold text-dark"><em class="icon ni ni-setting text-primary me-1"></em>1-Click Deal Presets</span>
                <span class="text-muted small" style="font-size: 0.72rem;">Instant Overrides</span>
              </div>
              <div class="btn-group btn-group-sm w-100" role="group">
                <button type="button" class="btn btn-outline-secondary" id="btnPresetStarter">$125k Starter</button>
                <button type="button" class="btn btn-outline-primary" id="btnPresetTurnkey">$225k Turnkey</button>
                <button type="button" class="btn btn-outline-success" id="btnPresetLuxury">$320k Luxury</button>
                <button type="button" class="btn btn-outline-warning" id="btnPresetWholesale">⚡ $15k Flip</button>
                <button type="button" class="btn btn-outline-info" id="btnPresetCommercial">$450k NNN</button>
              </div>
            </div>

            <div class="row g-2 mb-2">
              <div class="col-6">
                <label class="form-label small" for="qaPurchase">Purchase Price ($)</label>
                <input type="number" step="1000" min="0" name="purchase_price" id="qaPurchase" class="form-control form-control-sm" value="320000">
                <div class="d-flex gap-1 mt-1">
                  <button type="button" class="btn btn-xs btn-outline-danger flex-fill py-0" id="btnPriceMinus25" style="font-size: 0.68rem;">-$25k</button>
                  <button type="button" class="btn btn-xs btn-outline-danger flex-fill py-0" id="btnPriceMinus10" style="font-size: 0.68rem;">-$10k</button>
                  <button type="button" class="btn btn-xs btn-outline-success flex-fill py-0" id="btnPricePlus10" style="font-size: 0.68rem;">+$10k</button>
                  <button type="button" class="btn btn-xs btn-outline-success flex-fill py-0" id="btnPricePlus25" style="font-size: 0.68rem;">+$25k</button>
                </div>
              </div>
              <div class="col-6">
                <label class="form-label small" for="qaReno">Renovation Budget ($)</label>
                <input type="number" step="500" min="0" name="renovation_budget" id="qaReno" class="form-control form-control-sm" value="25000">
              </div>
            </div>

            <div class="row g-2 mb-2" id="qaStrInputs">
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

            <div class="p-2 mb-3 bg-light rounded border" id="qaLtrInputs">
              <div class="d-flex justify-content-between align-items-center mb-1">
                <label class="form-label small fw-bold text-dark mb-0" for="qaLtrRent">
                  <em class="icon ni ni-home text-primary me-1"></em>Pure Renting (LTR) Est. Rent ($/mo)
                </label>
                <span class="text-muted small" style="font-size: 0.72rem;">12-Mo Traditional Lease</span>
              </div>
              <div class="input-group input-group-sm">
                <span class="input-group-text">$</span>
                <input type="number" step="50" min="0" name="ltr_monthly_rent" id="qaLtrRent" class="form-control" value="2100">
                <span class="input-group-text">/mo</span>
              </div>
              <div class="small text-muted mt-1" style="font-size: 0.7rem;">
                Evaluated side-by-side with Airbnb/VRBO cash flow ($0 furnishing capital required).
              </div>
            </div>

            <!-- Wholesale Contract Flip & Cash Buyer Parameters (Tranchi-Style) -->
            <div class="p-2 mb-3 bg-light rounded border border-warning-subtle" id="qaWholesaleInputs" style="display: none;">
              <div class="d-flex justify-content-between align-items-center mb-1">
                <label class="form-label small fw-bold text-dark mb-0">
                  <em class="icon ni ni-bolt text-warning me-1"></em>Contract Flip Parameters (Tranchi Dispo)
                </label>
                <span class="badge bg-warning-soft text-warning small" style="font-size: 0.72rem;">Rapid Liquidity</span>
              </div>
              <div class="row g-2 mb-2">
                <div class="col-6">
                  <label class="form-label small" for="qaArv">After Repair Value (ARV $)</label>
                  <input type="number" step="1000" min="0" name="after_repair_value" id="qaArv" class="form-control form-control-sm" value="210000">
                </div>
                <div class="col-6">
                  <label class="form-label small" for="qaAssignmentFee">Desired Assignment Fee ($)</label>
                  <input type="number" step="500" min="0" name="assignment_fee" id="qaAssignmentFee" class="form-control form-control-sm text-success fw-bold" value="15000">
                </div>
              </div>
              <div class="row g-2">
                <div class="col-6">
                  <label class="form-label small" for="qaEmd">Earnest Money ($)</label>
                  <input type="number" step="250" min="0" name="earnest_money_deposit" id="qaEmd" class="form-control form-control-sm" value="2500">
                </div>
                <div class="col-6">
                  <label class="form-label small" for="qaDaysToClose">Close Window (Days)</label>
                  <input type="number" step="1" min="1" max="90" name="days_to_close" id="qaDaysToClose" class="form-control form-control-sm" value="14">
                </div>
              </div>
              <div class="small text-muted mt-2" style="font-size: 0.7rem;">
                ⚡ <strong>Tranchi Model:</strong> TBI locks contract below market, assigns to verified cash buyers, and collects instant cash fee in 14 days with zero renovation debt or holding risks.
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

        <!-- Multi-Strategy Underwriting Evaluation: Airbnb/VRBO vs. Pure Traditional Renting vs. Wholesale Contract Flip -->
        <div class="card card-bordered mb-3 border-primary-subtle shadow-sm" id="cardDualComparisonBox">
          <div class="card-inner py-2 px-3 bg-lighter border-bottom d-flex justify-content-between align-items-center">
            <h6 class="card-title mb-0 fs-13px text-dark">
              <em class="icon ni ni-swap-alt text-primary me-1"></em>Multi-Strategy Underwriting: Airbnb vs. Pure Renting vs. Contract Flip (Tranchi)
            </h6>
            <span class="badge bg-success small" id="dualComparisonVerdictBadge">Airbnb Yields +$1,473/mo</span>
          </div>
          <div class="card-inner p-3">
            <div class="row g-2">
              <!-- STR Column -->
              <div class="col-md-4">
                <div class="border rounded p-2 h-100 bg-white" id="boxStrStrategy">
                  <div class="d-flex justify-content-between align-items-center mb-1">
                    <span class="fw-bold text-dark small"><em class="icon ni ni-building text-success me-1"></em>Airbnb / VRBO</span>
                    <span class="badge bg-outline-success" style="font-size: 0.65rem;">Active STR</span>
                  </div>
                  <div class="small text-muted">
                    <div class="d-flex justify-content-between py-1 border-bottom">
                      <span>All-In Raise:</span>
                      <strong class="text-dark" id="dualStrRaise">$374,600</strong>
                    </div>
                    <div class="d-flex justify-content-between py-1 border-bottom">
                      <span>Furnishing:</span>
                      <strong class="text-dark" id="dualStrFurnish">$20,000</strong>
                    </div>
                    <div class="d-flex justify-content-between py-1 border-bottom">
                      <span>Gross Rev / yr:</span>
                      <strong class="text-dark" id="dualStrGross">$69,642</strong>
                    </div>
                    <div class="d-flex justify-content-between py-1 border-bottom">
                      <span>Annual NOI:</span>
                      <strong class="text-success" id="dualStrNoi">$34,821</strong>
                    </div>
                    <div class="d-flex justify-content-between py-1 border-bottom">
                      <span>Monthly NOI:</span>
                      <strong class="text-success" id="dualStrMonthly">$2,901 / mo</strong>
                    </div>
                    <div class="d-flex justify-content-between pt-1">
                      <span>CoC Return:</span>
                      <strong class="text-success fs-14px" id="dualStrCoc">9.30%</strong>
                    </div>
                  </div>
                </div>
              </div>

              <!-- LTR Column -->
              <div class="col-md-4">
                <div class="border rounded p-2 h-100 bg-white" id="boxLtrStrategy">
                  <div class="d-flex justify-content-between align-items-center mb-1">
                    <span class="fw-bold text-dark small"><em class="icon ni ni-home text-primary me-1"></em>Pure Renting (LTR)</span>
                    <span class="badge bg-outline-primary" style="font-size: 0.65rem;">12-Mo Lease</span>
                  </div>
                  <div class="small text-muted">
                    <div class="d-flex justify-content-between py-1 border-bottom">
                      <span>All-In Raise:</span>
                      <strong class="text-dark" id="dualLtrRaise">$354,600</strong>
                    </div>
                    <div class="d-flex justify-content-between py-1 border-bottom">
                      <span>Furnishing:</span>
                      <strong class="text-success" id="dualLtrFurnish">$0 (Saves $20k)</strong>
                    </div>
                    <div class="d-flex justify-content-between py-1 border-bottom">
                      <span>Gross Rent / yr:</span>
                      <strong class="text-dark" id="dualLtrGross">$25,200</strong>
                    </div>
                    <div class="d-flex justify-content-between py-1 border-bottom">
                      <span>Annual NOI:</span>
                      <strong class="text-primary" id="dualLtrNoi">$17,136</strong>
                    </div>
                    <div class="d-flex justify-content-between py-1 border-bottom">
                      <span>Monthly NOI:</span>
                      <strong class="text-primary" id="dualLtrMonthly">$1,428 / mo</strong>
                    </div>
                    <div class="d-flex justify-content-between pt-1">
                      <span>CoC Return:</span>
                      <strong class="text-primary fs-14px" id="dualLtrCoc">4.83%</strong>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Wholesale Contract Flip Column (Tranchi-Style) -->
              <div class="col-md-4">
                <div class="border rounded p-2 h-100 bg-white border-warning-subtle" id="boxWholesaleStrategy">
                  <div class="d-flex justify-content-between align-items-center mb-1">
                    <span class="fw-bold text-dark small"><em class="icon ni ni-bolt text-warning me-1"></em>Contract Flip (Tranchi)</span>
                    <span class="badge bg-warning text-dark" style="font-size: 0.65rem;">Rapid Cash</span>
                  </div>
                  <div class="small text-muted">
                    <div class="d-flex justify-content-between py-1 border-bottom">
                      <span>Contract Lock:</span>
                      <strong class="text-dark" id="dualFlipLock">$145,000</strong>
                    </div>
                    <div class="d-flex justify-content-between py-1 border-bottom">
                      <span>After Repair (ARV):</span>
                      <strong class="text-dark" id="dualFlipArv">$210,000</strong>
                    </div>
                    <div class="d-flex justify-content-between py-1 border-bottom">
                      <span>Assignment Profit:</span>
                      <strong class="text-success fw-bold" id="dualFlipFee">+$15,000 Fee</strong>
                    </div>
                    <div class="d-flex justify-content-between py-1 border-bottom">
                      <span>End Buyer Price:</span>
                      <strong class="text-dark" id="dualFlipEndBuyer">$160,000</strong>
                    </div>
                    <div class="d-flex justify-content-between py-1 border-bottom">
                      <span>Buyer Net Profit:</span>
                      <strong class="text-primary" id="dualFlipBuyerProfit">$22,500 (11.9%)</strong>
                    </div>
                    <div class="d-flex justify-content-between pt-1">
                      <span>Turnaround / CoC:</span>
                      <strong class="text-warning fs-14px" id="dualFlipCoc">14 Days (600%)</strong>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Comparative Verdict & Strategy Selection -->
            <div class="mt-2 p-2 rounded border bg-light small" id="dualVerdictBanner">
              <div class="d-flex justify-content-between align-items-center mb-1">
                <div>
                  <span class="fw-bold text-success" id="dualPremiumLabel"><em class="icon ni ni-trend-up me-1"></em>Airbnb Cash Flow Advantage:</span>
                  <strong class="text-dark ms-1" id="dualDeltaMonthly">+$1,473 / mo</strong>
                  <span class="badge bg-success-soft text-success ms-1" id="dualDeltaCoc">+4.47% CoC</span>
                </div>
                <div class="btn-group btn-group-sm" role="group">
                  <button type="button" class="btn btn-xs btn-outline-success" id="btnSelectStr">Set Airbnb</button>
                  <button type="button" class="btn btn-xs btn-outline-primary" id="btnSelectLtr">Set Pure Renting</button>
                  <button type="button" class="btn btn-xs btn-outline-warning" id="btnSelectWholesale">⚡ Set Contract Flip</button>
                </div>
              </div>
              <div class="text-muted" style="font-size: 0.72rem;" id="dualHedgeText">
                🛡️ <strong>Downside Hedge:</strong> Pure renting requires $20,000 less capital and establishes a guaranteed $1,428/mo NOI baseline if travel demand or municipal lodging rules fluctuate.
              </div>
            </div>
          </div>
        </div>

        <!-- Tranchi-Style Contract Flipping & Cash Buyer Matching Engine -->
        <div class="card card-bordered mb-3 border-warning-subtle shadow-sm" id="cardWholesaleBuyerMatchBox">
          <div class="card-inner py-2 px-3 bg-lighter border-bottom d-flex justify-content-between align-items-center">
            <h6 class="card-title mb-0 fs-13px text-dark">
              <em class="icon ni ni-users text-warning me-1"></em>Tranchi.ai Cash Buyer Match &amp; Contract Dispo Engine
            </h6>
            <span class="badge bg-warning text-dark small" id="badgeBuyerCount">4 Pre-Matched Cash Buyers</span>
          </div>
          <div class="card-inner p-3">
            <div class="row g-2 mb-3" id="buyerMatchCardsContainer">
              <!-- Buyer 1 -->
              <div class="col-md-6">
                <div class="border rounded p-2 bg-white h-100 shadow-sm">
                  <div class="d-flex justify-content-between align-items-center mb-1">
                    <strong class="text-dark small"><em class="icon ni ni-trend-up text-success me-1"></em>Ark-La-Tex Rehabbers</strong>
                    <span class="badge bg-success text-white small">94% Match</span>
                  </div>
                  <div class="small text-muted mb-1">
                    <span>Target:</span> Fix &amp; Flip SFRs &bull; Max: <strong class="text-dark">$165k</strong> &bull; Close: <strong>10-14 Days</strong>
                  </div>
                  <div class="d-flex gap-1">
                    <span class="badge bg-outline-info" style="font-size:0.65rem;">Cash Verified</span>
                    <span class="badge bg-outline-primary" style="font-size:0.65rem;">Bossier/Caddo</span>
                    <span class="badge bg-outline-success" style="font-size:0.65rem;">Spread: $22.5k+</span>
                  </div>
                </div>
              </div>
              <!-- Buyer 2 -->
              <div class="col-md-6">
                <div class="border rounded p-2 bg-white h-100 shadow-sm">
                  <div class="d-flex justify-content-between align-items-center mb-1">
                    <strong class="text-dark small"><em class="icon ni ni-home text-primary me-1"></em>Red River Turnkey Fund</strong>
                    <span class="badge bg-primary text-white small">91% Match</span>
                  </div>
                  <div class="small text-muted mb-1">
                    <span>Target:</span> Long-Term 3-Bed Rental &bull; Max: <strong class="text-dark">$158k</strong> &bull; Close: <strong>7-10 Days</strong>
                  </div>
                  <div class="d-flex gap-1">
                    <span class="badge bg-outline-info" style="font-size:0.65rem;">POF On File</span>
                    <span class="badge bg-outline-secondary" style="font-size:0.65rem;">10%+ Cap</span>
                    <span class="badge bg-outline-dark" style="font-size:0.65rem;">Section 8 Ok</span>
                  </div>
                </div>
              </div>
              <!-- Buyer 3 -->
              <div class="col-md-6">
                <div class="border rounded p-2 bg-white h-100 shadow-sm">
                  <div class="d-flex justify-content-between align-items-center mb-1">
                    <strong class="text-dark small"><em class="icon ni ni-building text-info me-1"></em>Bayou Hospitality Partners</strong>
                    <span class="badge bg-info text-white small">88% Match</span>
                  </div>
                  <div class="small text-muted mb-1">
                    <span>Target:</span> Airbnb / Mid-Term Rental &bull; Max: <strong class="text-dark">$170k</strong> &bull; Close: <strong>14 Days</strong>
                  </div>
                  <div class="d-flex gap-1">
                    <span class="badge bg-outline-success" style="font-size:0.65rem;">STR Operator</span>
                    <span class="badge bg-outline-warning" style="font-size:0.65rem;">Furnishing Ready</span>
                  </div>
                </div>
              </div>
              <!-- Buyer 4 -->
              <div class="col-md-6">
                <div class="border rounded p-2 bg-white h-100 shadow-sm">
                  <div class="d-flex justify-content-between align-items-center mb-1">
                    <strong class="text-dark small"><em class="icon ni ni-shield text-dark me-1"></em>Sunbelt Institutional SFR Desk</strong>
                    <span class="badge bg-dark text-white small">85% Match</span>
                  </div>
                  <div class="small text-muted mb-1">
                    <span>Target:</span> Clean Title SFRs &bull; Max: <strong class="text-dark">$160k</strong> &bull; Close: <strong>14 Days</strong>
                  </div>
                  <div class="d-flex gap-1">
                    <span class="badge bg-outline-primary" style="font-size:0.65rem;">Institutional</span>
                    <span class="badge bg-outline-success" style="font-size:0.65rem;">Immediate Wire</span>
                  </div>
                </div>
              </div>
            </div>

            <!-- 1-Click Dispo Marketing Actions (Tranchi-Style) -->
            <div class="p-2 rounded bg-light border">
              <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="small fw-bold text-dark">
                  <em class="icon ni ni-send text-primary me-1"></em>1-Click Buyer Dispo Marketing Generators
                </span>
                <span class="badge bg-success-soft text-success small" id="dispoCopyFeedback" style="display:none;">Copied to clipboard!</span>
              </div>
              <div class="d-flex gap-2">
                <button type="button" class="btn btn-sm btn-outline-primary flex-fill" id="btnCopySmsBlast">
                  <em class="icon ni ni-mobile me-1"></em><span>Copy SMS Deal Blast</span>
                </button>
                <button type="button" class="btn btn-sm btn-outline-info flex-fill" id="btnCopyEmailPitch">
                  <em class="icon ni ni-mail me-1"></em><span>Copy Investor Email Pitch</span>
                </button>
                <button type="button" class="btn btn-sm btn-outline-secondary" id="btnToggleContractTerms" title="View Louisiana Assignment Checklist">
                  <em class="icon ni ni-file-text me-1"></em><span>Assignment Terms</span>
                </button>
              </div>
              <div class="mt-2 p-2 bg-white rounded border small text-muted" id="boxContractTerms" style="display: none; font-size: 0.72rem;">
                <strong>Louisiana Real Estate Assignment Safeguards:</strong>
                <ul class="mb-0 ps-3 mt-1">
                  <li><strong>Standard LREC / TBI Clause:</strong> "Buyer reserves the unencumbered right to assign this Purchase Agreement to Timothy Burks Incorporated, LLC. or nominated assignee prior to closing."</li>
                  <li><strong>Earnest Money Deposit:</strong> $2,500 held in licensed title company escrow (non-refundable after 10-day inspection).</li>
                  <li><strong>Rapid Cash Liquidity:</strong> 14-day cash close with zero financing contingencies.</li>
                </ul>
              </div>
            </div>
          </div>
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
  const ltrBox = document.getElementById('qaLtrInputs');
  const commBox = document.getElementById('qaCommercialInputs');
  const wholesaleBox = document.getElementById('qaWholesaleInputs');
  const dualCard = document.getElementById('cardDualComparisonBox');
  const buyerBox = document.getElementById('cardWholesaleBuyerMatchBox');
  const btnAnalyze = document.getElementById('btnRunAiopsAnalysis');
  const btnFetch = document.getElementById('btnFetchListing');
  const inputUrl = document.getElementById('qaListingUrl');
  const inputAddress = document.getElementById('qaAddress');
  const inputCity = document.getElementById('qaCity');
  const inputState = document.getElementById('qaState');
  const inputZip = document.getElementById('qaZip');
  const inputPurchase = document.getElementById('qaPurchase');
  const inputReno = document.getElementById('qaReno');
  const inputFurnish = document.getElementById('qaFurnish');
  const inputAdr = document.getElementById('qaAdr');
  const inputOcc = document.getElementById('qaOcc');
  const inputLtrRent = document.getElementById('qaLtrRent');
  const inputRent = document.getElementById('qaRent');
  const inputTitle = document.getElementById('qaTitle');
  const inputArv = document.getElementById('qaArv');
  const inputFee = document.getElementById('qaAssignmentFee');
  const inputEmd = document.getElementById('qaEmd');
  const inputDays = document.getElementById('qaDaysToClose');
  const badgeListing = document.getElementById('qaListingBadge');
  const alertListing = document.getElementById('qaListingAlert');

  // Dispo templates state
  let currentSmsBlast = '';
  let currentEmailPitch = '';

  // Real-Time Client-Side Pro Forma & Multi-Strategy Calculation Engine
  function recalcQuickAnalysisUI() {
    const isCommercial = cat.value === 'commercial_lease';
    const isLtr = cat.value === 'residential_ltr';
    const isWholesale = cat.value === 'wholesale_flip';
    const purchase = parseFloat(inputPurchase.value) || 0;
    const reno = parseFloat(inputReno.value) || 0;
    const closing = purchase * 0.03;

    // STR calculations (Airbnb / VRBO)
    const strFurnish = parseFloat(inputFurnish.value) || 0;
    const strTotalRaise = purchase + reno + strFurnish + closing;
    const adr = parseFloat(inputAdr.value) || 0;
    const occ = (parseFloat(inputOcc.value) || 70) / 100;
    const grossStr = adr * 365 * occ;
    const strNoi = grossStr * 0.50; // 15% platform/cleaning, 20% opex, 15% sponsor fee
    const strMonthlyNoi = strNoi / 12;
    const strCoc = strTotalRaise > 0 ? (strNoi / strTotalRaise) * 100 : 0;
    const strCap = purchase > 0 ? (strNoi / purchase) * 100 : 0;

    // Pure Renting calculations (12-Month Traditional Lease, $0 furnishing)
    const ltrTotalRaise = purchase + reno + closing;
    const ltrRent = parseFloat(inputLtrRent ? inputLtrRent.value : 0) || (purchase > 0 ? Math.round(purchase * 0.0075 / 50) * 50 : 1450);
    const grossLtr = ltrRent * 12;
    const effectiveLtr = grossLtr * 0.95; // 5% vacancy allowance
    const ltrNoi = effectiveLtr * 0.72; // 20% opex, 8% sponsor management fee
    const ltrMonthlyNoi = ltrNoi / 12;
    const ltrCoc = ltrTotalRaise > 0 ? (ltrNoi / ltrTotalRaise) * 100 : 0;
    const ltrCap = purchase > 0 ? (ltrNoi / purchase) * 100 : 0;

    // Wholesale Contract Flip calculations (Tranchi-Style)
    const arv = parseFloat(inputArv?.value) || (purchase > 0 ? Math.round(purchase * 1.38 / 1000) * 1000 : 210000);
    const fee = parseFloat(inputFee?.value) || 15000;
    const emd = parseFloat(inputEmd?.value) || 2500;
    const daysToClose = parseInt(inputDays?.value) || 14;
    const endBuyerPrice = purchase + fee;
    const endBuyerClosing = endBuyerPrice * 0.03;
    const endBuyerAllIn = endBuyerPrice + reno + endBuyerClosing;
    const endBuyerProfit = Math.max(0, arv - endBuyerAllIn);
    const endBuyerRoi = endBuyerAllIn > 0 ? (endBuyerProfit / endBuyerAllIn) * 100 : 0;
    const flipCoc = emd > 0 ? (fee / emd) * 100 : 0;

    // Update Wholesale Column in Comparison Box
    const elFlipLock = document.getElementById('dualFlipLock');
    const elFlipArv = document.getElementById('dualFlipArv');
    const elFlipFee = document.getElementById('dualFlipFee');
    const elFlipEndBuyer = document.getElementById('dualFlipEndBuyer');
    const elFlipBuyerProfit = document.getElementById('dualFlipBuyerProfit');
    const elFlipCoc = document.getElementById('dualFlipCoc');

    if (elFlipLock) elFlipLock.innerText = '$' + Math.round(purchase).toLocaleString();
    if (elFlipArv) elFlipArv.innerText = '$' + Math.round(arv).toLocaleString();
    if (elFlipFee) elFlipFee.innerText = '+$' + Math.round(fee).toLocaleString() + ' Cash';
    if (elFlipEndBuyer) elFlipEndBuyer.innerText = '$' + Math.round(endBuyerPrice).toLocaleString();
    if (elFlipBuyerProfit) elFlipBuyerProfit.innerText = '$' + Math.round(endBuyerProfit).toLocaleString() + ' (' + endBuyerRoi.toFixed(1) + '%)';
    if (elFlipCoc) elFlipCoc.innerText = daysToClose + ' Days (' + Math.round(flipCoc) + '%)';

    // Update Comparison Box Elements
    if (dualCard) {
      if (isCommercial) {
        dualCard.style.display = 'none';
      } else {
        dualCard.style.display = 'block';

        const elStrRaise = document.getElementById('dualStrRaise');
        const elStrFurnish = document.getElementById('dualStrFurnish');
        const elStrGross = document.getElementById('dualStrGross');
        const elStrNoi = document.getElementById('dualStrNoi');
        const elStrMonthly = document.getElementById('dualStrMonthly');
        const elStrCoc = document.getElementById('dualStrCoc');

        const elLtrRaise = document.getElementById('dualLtrRaise');
        const elLtrFurnish = document.getElementById('dualLtrFurnish');
        const elLtrGross = document.getElementById('dualLtrGross');
        const elLtrNoi = document.getElementById('dualLtrNoi');
        const elLtrMonthly = document.getElementById('dualLtrMonthly');
        const elLtrCoc = document.getElementById('dualLtrCoc');

        if (elStrRaise) elStrRaise.innerText = '$' + Math.round(strTotalRaise).toLocaleString();
        if (elStrFurnish) elStrFurnish.innerText = '$' + Math.round(strFurnish).toLocaleString();
        if (elStrGross) elStrGross.innerText = '$' + Math.round(grossStr).toLocaleString();
        if (elStrNoi) elStrNoi.innerText = '$' + Math.round(strNoi).toLocaleString();
        if (elStrMonthly) elStrMonthly.innerText = '$' + Math.round(strMonthlyNoi).toLocaleString() + ' / mo';
        if (elStrCoc) elStrCoc.innerText = strCoc.toFixed(2) + '%';

        if (elLtrRaise) elLtrRaise.innerText = '$' + Math.round(ltrTotalRaise).toLocaleString();
        if (elLtrFurnish) elLtrFurnish.innerHTML = '$0 <span class="badge bg-success-soft text-success" style="font-size:0.65rem;">Saves $' + Math.round(strFurnish).toLocaleString() + '</span>';
        if (elLtrGross) elLtrGross.innerText = '$' + Math.round(grossLtr).toLocaleString();
        if (elLtrNoi) elLtrNoi.innerText = '$' + Math.round(ltrNoi).toLocaleString();
        if (elLtrMonthly) elLtrMonthly.innerText = '$' + Math.round(ltrMonthlyNoi).toLocaleString() + ' / mo';
        if (elLtrCoc) elLtrCoc.innerText = ltrCoc.toFixed(2) + '%';

        const diffMonthly = strMonthlyNoi - ltrMonthlyNoi;
        const diffCoc = strCoc - ltrCoc;
        const verdictBadge = document.getElementById('dualComparisonVerdictBadge');
        const premiumLabel = document.getElementById('dualPremiumLabel');
        const deltaMonthlyEl = document.getElementById('dualDeltaMonthly');
        const deltaCocEl = document.getElementById('dualDeltaCoc');
        const hedgeEl = document.getElementById('dualHedgeText');

        if (isWholesale) {
          if (verdictBadge) {
            verdictBadge.className = 'badge bg-warning text-dark small';
            verdictBadge.innerText = 'Contract Flip: +$' + Math.round(fee).toLocaleString() + ' Cash in ' + daysToClose + 'd';
          }
          if (premiumLabel) {
            premiumLabel.innerHTML = '<em class="icon ni ni-bolt text-warning me-1"></em>Tranchi Rapid Liquidity Advantage:';
          }
          if (deltaMonthlyEl) {
            deltaMonthlyEl.className = 'text-warning fw-bold ms-1';
            deltaMonthlyEl.innerText = '+$' + Math.round(fee).toLocaleString() + ' Cash Profit';
          }
          if (deltaCocEl) {
            deltaCocEl.className = 'badge bg-warning-soft text-warning ms-1';
            deltaCocEl.innerText = Math.round(flipCoc) + '% CoC on EMD';
          }
          if (hedgeEl) {
            hedgeEl.innerHTML = `⚡ <strong>Wholesale Arbitrage:</strong> Contract locked at $${Math.round(purchase).toLocaleString()} ($${Math.round(arv - purchase).toLocaleString()} under ARV). Collect $${Math.round(fee).toLocaleString()} cash assignment fee in ${daysToClose} days with zero debt, zero rehab risk, and $${Math.round(endBuyerProfit).toLocaleString()} profit left for end buyer.`;
          }
        } else if (diffMonthly >= 0) {
          if (verdictBadge) {
            verdictBadge.className = 'badge bg-success small';
            verdictBadge.innerText = 'Airbnb Yields +$' + Math.round(diffMonthly).toLocaleString() + '/mo';
          }
          if (premiumLabel) {
            premiumLabel.innerHTML = '<em class="icon ni ni-trend-up me-1"></em>Airbnb Cash Flow Advantage:';
          }
          if (deltaMonthlyEl) {
            deltaMonthlyEl.className = 'text-success fw-bold ms-1';
            deltaMonthlyEl.innerText = '+$' + Math.round(diffMonthly).toLocaleString() + ' / mo';
          }
          if (deltaCocEl) {
            deltaCocEl.className = 'badge bg-success-soft text-success ms-1';
            deltaCocEl.innerText = '+' + diffCoc.toFixed(2) + '% CoC';
          }
          if (hedgeEl) {
            hedgeEl.innerHTML = '🛡️ <strong>Downside Hedge:</strong> Pure renting requires $' + Math.round(strFurnish).toLocaleString() + ' less initial capital and establishes a guaranteed $' + Math.round(ltrMonthlyNoi).toLocaleString() + '/mo NOI baseline if travel demand or municipal lodging rules fluctuate.';
          }
        } else {
          if (verdictBadge) {
            verdictBadge.className = 'badge bg-primary small';
            verdictBadge.innerText = 'Pure Renting Yields +$' + Math.round(Math.abs(diffMonthly)).toLocaleString() + '/mo';
          }
          if (premiumLabel) {
            premiumLabel.innerHTML = '<em class="icon ni ni-trend-up me-1"></em>Pure Renting Advantage:';
          }
          if (deltaMonthlyEl) {
            deltaMonthlyEl.className = 'text-primary fw-bold ms-1';
            deltaMonthlyEl.innerText = '+$' + Math.round(Math.abs(diffMonthly)).toLocaleString() + ' / mo';
          }
          if (deltaCocEl) {
            deltaCocEl.className = 'badge bg-primary-soft text-primary ms-1';
            deltaCocEl.innerText = '+' + Math.abs(diffCoc).toFixed(2) + '% CoC';
          }
          if (hedgeEl) {
            hedgeEl.innerHTML = '🛡️ <strong>Downside Hedge:</strong> Pure renting requires $' + Math.round(strFurnish).toLocaleString() + ' less initial capital and establishes a guaranteed $' + Math.round(ltrMonthlyNoi).toLocaleString() + '/mo NOI baseline if travel demand or municipal lodging rules fluctuate.';
          }
        }
      }
    }

    // Determine active strategy numbers for top metric ribbon
    let activeTotalRaise = strTotalRaise;
    let activeNoi = strNoi;
    let activeCoc = strCoc;
    let activeCapRate = strCap;
    let ribbonSubtitle = 'All-in Capital';
    let ribbonNoiSubtitle = '$' + Math.round(strMonthlyNoi).toLocaleString() + '/mo';
    let ribbonCapLabel = 'Cap Rate: ' + activeCapRate.toFixed(2) + '%';

    if (isCommercial) {
      const rent = parseFloat(inputRent.value) || 0;
      const annualRent = rent * 12 * 0.95; // 5% vacancy allowance
      activeNoi = annualRent * 0.89; // opex + 8% sponsor management fee
      activeTotalRaise = purchase + reno + closing;
      activeCoc = activeTotalRaise > 0 ? (activeNoi / activeTotalRaise) * 100 : 0;
      activeCapRate = purchase > 0 ? (activeNoi / purchase) * 100 : 0;
      ribbonNoiSubtitle = '$' + Math.round(activeNoi / 12).toLocaleString() + '/mo';
      ribbonCapLabel = 'Cap Rate: ' + activeCapRate.toFixed(2) + '%';
    } else if (isLtr) {
      activeTotalRaise = ltrTotalRaise;
      activeNoi = ltrNoi;
      activeCoc = ltrCoc;
      activeCapRate = ltrCap;
      ribbonNoiSubtitle = '$' + Math.round(ltrMonthlyNoi).toLocaleString() + '/mo';
      ribbonCapLabel = 'Cap Rate: ' + activeCapRate.toFixed(2) + '%';
    } else if (isWholesale) {
      activeTotalRaise = emd;
      activeNoi = fee;
      activeCoc = flipCoc;
      activeCapRate = purchase > 0 ? ((arv - purchase) / purchase) * 100 : 0;
      ribbonSubtitle = 'EMD at Risk ($' + Math.round(emd).toLocaleString() + ')';
      ribbonNoiSubtitle = daysToClose + '-Day Cash Close';
      ribbonCapLabel = 'Discount: ' + activeCapRate.toFixed(1) + '% under ARV';
    }

    // Deal score computation (0 - 100)
    let score = isWholesale ? 92 : 50;
    if (!isWholesale) {
      if (activeCoc >= 14) score += 30;
      else if (activeCoc >= 10) score += 24;
      else if (activeCoc >= 8) score += 18;
      else if (activeCoc >= 6) score += 10;

      if (activeCapRate >= 10) score += 15;
      else if (activeCapRate >= 8) score += 12;
      else if (activeCapRate >= 6.5) score += 8;
    }

    const state = (inputState.value || 'LA').toUpperCase();
    if (state === 'LA' || state === 'LOUISIANA') score += 5;
    score = Math.min(98, Math.max(40, Math.round(score)));

    let grade = 'C';
    if (score >= 90) grade = 'A+';
    else if (score >= 82) grade = 'A';
    else if (score >= 74) grade = 'B+';
    else if (score >= 65) grade = 'B';

    // Crowdfund Unit Structuring
    const totalUnits = Math.ceil((isWholesale ? endBuyerPrice : activeTotalRaise) / 100);
    const activeMonthlyNoi = activeNoi / 12;
    const monthlyPayoutPer1k = activeTotalRaise > 0 ? (activeMonthlyNoi * 0.85) / (activeTotalRaise / 1000) : 0;

    // Update Right-Hand Metric Ribbon
    document.getElementById('cardDealScore').innerText = score + '/100';
    document.getElementById('cardDealGrade').innerText = 'Grade ' + grade;
    document.getElementById('cardTotalRaise').innerText = isWholesale ? ('$' + Math.round(endBuyerPrice).toLocaleString()) : ('$' + Math.round(activeTotalRaise).toLocaleString());
    document.getElementById('cardTotalRaise').nextElementSibling.innerText = isWholesale ? ('End Buyer Price (EMD: $' + Math.round(emd).toLocaleString() + ')') : ribbonSubtitle;
    document.getElementById('cardAnnualNoi').innerText = isWholesale ? ('+$' + Math.round(fee).toLocaleString() + ' Cash') : ('$' + Math.round(activeNoi).toLocaleString());
    document.getElementById('cardMonthlyNoi').innerText = ribbonNoiSubtitle;
    document.getElementById('cardCocYield').innerText = activeCoc >= 100 ? (Math.round(activeCoc) + '%') : (activeCoc.toFixed(2) + '%');
    document.getElementById('cardCapRate').innerText = ribbonCapLabel;
    document.getElementById('cardTotalUnits').innerText = totalUnits.toLocaleString();
    document.getElementById('cardPayoutPer1k').innerText = isWholesale ? ('+$' + Math.round(fee).toLocaleString() + ' 1-Time') : ('$' + monthlyPayoutPer1k.toFixed(2) + ' / mo');

    // Live update Executive Thesis
    const addr = inputAddress.value.trim() || 'Target Property';
    const city = inputCity.value.trim() || 'Bossier City';
    const st = (inputState.value.trim() || 'LA').toUpperCase();

    if (isWholesale) {
      document.getElementById('cardExecutiveSummary').innerHTML =
        `High-velocity wholesale contract assignment opportunity for <strong>${addr}</strong> in <strong>${city}, ${st}</strong> (Tranchi.ai Dispo Model). ` +
        `Contract locked at <strong>$${Math.round(purchase).toLocaleString()}</strong> ($${Math.round(arv - purchase).toLocaleString()} under $${Math.round(arv).toLocaleString()} ARV). ` +
        `With an estimated $${Math.round(reno).toLocaleString()} renovation budget, Timothy Burks Incorporated, LLC. assigns the contract to a pre-screened cash buyer for <strong>$${Math.round(endBuyerPrice).toLocaleString()}</strong>, ` +
        `securing an immediate <strong>$${Math.round(fee).toLocaleString()} net cash assignment fee</strong> in ${daysToClose} days with zero permanent debt or holding risk. ` +
        `The end buyer retains <strong>$${Math.round(endBuyerProfit).toLocaleString()} in net profit (${endBuyerRoi.toFixed(1)}% ROI)</strong>.`;
    } else {
      const typeLabel = isCommercial
        ? 'commercial triple-net leased asset'
        : (isLtr ? 'residential pure long-term rental' : 'residential short-term rental conversion');
      document.getElementById('cardExecutiveSummary').innerHTML =
        `Strong ${typeLabel} opportunity at <strong>${addr}</strong> in <strong>${city}, ${st}</strong>. ` +
        `At a <strong>$${Math.round(purchase).toLocaleString()}</strong> acquisition price with <strong>$${Math.round(activeTotalRaise).toLocaleString()}</strong> total capitalization, ` +
        `the property achieves a projected <strong>$${Math.round(activeNoi).toLocaleString()}/yr</strong> Net Operating Income (<strong>${activeCoc.toFixed(2)}%</strong> Cash-on-Cash yield). ` +
        `AnneAlicia &amp; Timothy can execute a high-yield monetization strategy targeting robust community returns and audited monthly investor distributions.`;
    }

    // Update dynamic SMS and Email dispo copy
    currentSmsBlast = `🔥 OFF-MARKET DEAL BLAST: ${addr}, ${city}, ${st}\n` +
      `Contract Locked: $${Math.round(endBuyerPrice).toLocaleString()} ($${Math.round(arv - endBuyerPrice).toLocaleString()} below $${Math.round(arv).toLocaleString()} ARV)\n` +
      `Est. Rehab: $${Math.round(reno).toLocaleString()} | Projected End-Buyer Profit: $${Math.round(endBuyerProfit).toLocaleString()} (${endBuyerRoi.toFixed(1)}% ROI)\n` +
      `Terms: ${daysToClose}-Day Cash Close, Clean Title, LREC Assignment.\n` +
      `Contact Timothy & AnneAlicia Burks / TBI Solutions: 318-706-9694 | portal: mymiwallet.com/Projects`;

    currentEmailPitch = `Subject: Off-Market Wholesale Investment Opportunity: ${addr}, ${city}, ${st}\n\n` +
      `Dear Investor,\n\n` +
      `Timothy Burks Incorporated, LLC. has secured an exclusive assignable purchase agreement for an off-market property in ${city}, ${st}:\n\n` +
      `• Property Address: ${addr}, ${city}, ${st} ${inputZip.value || ''}\n` +
      `• Contract Assignment Price: $${Math.round(endBuyerPrice).toLocaleString()}\n` +
      `• Conservative After-Repair-Value (ARV): $${Math.round(arv).toLocaleString()}\n` +
      `• Estimated Renovation Budget: $${Math.round(reno).toLocaleString()}\n` +
      `• Projected End-Buyer Net Equity / Profit: $${Math.round(endBuyerProfit).toLocaleString()} (${endBuyerRoi.toFixed(1)}% ROI)\n` +
      `• Closing Window: ${daysToClose} days | Earnest Money Escrow: $${Math.round(emd).toLocaleString()}\n\n` +
      `Review full property details, comps, and title documents at: ${window.location.origin}/Projects\n\n` +
      `Best regards,\nTimothy Burks & AnneAlicia Burks\nTimothy Burks Incorporated, LLC.\nBossier City, Louisiana`;
  }

  cat.addEventListener('change', function(){
    if (this.value === 'commercial_lease') {
      strBox.style.display = 'none';
      if (ltrBox) ltrBox.style.display = 'none';
      if (wholesaleBox) wholesaleBox.style.display = 'none';
      commBox.style.display = 'flex';
      if (dualCard) dualCard.style.display = 'none';
      if (buyerBox) buyerBox.style.display = 'none';
    } else if (this.value === 'residential_ltr') {
      strBox.style.display = 'none';
      if (ltrBox) ltrBox.style.display = 'block';
      if (wholesaleBox) wholesaleBox.style.display = 'none';
      commBox.style.display = 'none';
      if (dualCard) dualCard.style.display = 'block';
      if (buyerBox) buyerBox.style.display = 'none';
    } else if (this.value === 'wholesale_flip') {
      strBox.style.display = 'none';
      if (ltrBox) ltrBox.style.display = 'none';
      if (wholesaleBox) wholesaleBox.style.display = 'block';
      commBox.style.display = 'none';
      if (dualCard) dualCard.style.display = 'block';
      if (buyerBox) buyerBox.style.display = 'block';
    } else {
      strBox.style.display = 'flex';
      if (ltrBox) ltrBox.style.display = 'block';
      if (wholesaleBox) wholesaleBox.style.display = 'none';
      commBox.style.display = 'none';
      if (dualCard) dualCard.style.display = 'block';
      if (buyerBox) buyerBox.style.display = 'block';
    }
    recalcQuickAnalysisUI();
  });

  // Attach live input listeners to all form controls for instantaneous calculation
  [inputPurchase, inputReno, inputFurnish, inputAdr, inputOcc, inputLtrRent, inputRent, inputAddress, inputCity, inputState, inputZip, inputArv, inputFee, inputEmd, inputDays].forEach(el => {
    if (el) {
      el.addEventListener('input', recalcQuickAnalysisUI);
      el.addEventListener('change', recalcQuickAnalysisUI);
    }
  });

  // Strategy Switchers on Comparison Card
  document.getElementById('btnSelectStr')?.addEventListener('click', function(e){
    e.preventDefault();
    cat.value = 'residential_str';
    cat.dispatchEvent(new Event('change'));
    if ((parseFloat(inputFurnish.value) || 0) === 0) {
      inputFurnish.value = 20000;
    }
    recalcQuickAnalysisUI();
    btnAnalyze.click();
  });

  document.getElementById('btnSelectLtr')?.addEventListener('click', function(e){
    e.preventDefault();
    cat.value = 'residential_ltr';
    cat.dispatchEvent(new Event('change'));
    recalcQuickAnalysisUI();
    btnAnalyze.click();
  });

  document.getElementById('btnSelectWholesale')?.addEventListener('click', function(e){
    e.preventDefault();
    cat.value = 'wholesale_flip';
    cat.dispatchEvent(new Event('change'));
    recalcQuickAnalysisUI();
    btnAnalyze.click();
  });

  // 1-Click Deal Preset Overrides
  document.getElementById('btnPresetStarter')?.addEventListener('click', function(){
    cat.value = 'residential_str';
    cat.dispatchEvent(new Event('change'));
    inputPurchase.value = 125000;
    inputReno.value = 25000;
    inputFurnish.value = 15000;
    inputAdr.value = 195;
    inputOcc.value = 68;
    if (inputLtrRent) inputLtrRent.value = 1150;
    inputTitle.value = (inputAddress.value.trim() || 'Bossier City') + ' (Starter STR)';
    recalcQuickAnalysisUI();
  });

  document.getElementById('btnPresetTurnkey')?.addEventListener('click', function(){
    cat.value = 'residential_str';
    cat.dispatchEvent(new Event('change'));
    inputPurchase.value = 225000;
    inputReno.value = 15000;
    inputFurnish.value = 20000;
    inputAdr.value = 250;
    inputOcc.value = 72;
    if (inputLtrRent) inputLtrRent.value = 1650;
    inputTitle.value = (inputAddress.value.trim() || 'Bossier City') + ' (Turnkey STR)';
    recalcQuickAnalysisUI();
  });

  document.getElementById('btnPresetLuxury')?.addEventListener('click', function(){
    cat.value = 'residential_str';
    cat.dispatchEvent(new Event('change'));
    inputPurchase.value = 320000;
    inputReno.value = 25000;
    inputFurnish.value = 25000;
    inputAdr.value = 310;
    inputOcc.value = 75;
    if (inputLtrRent) inputLtrRent.value = 2100;
    inputTitle.value = (inputAddress.value.trim() || 'Bossier City') + ' (Luxury STR)';
    recalcQuickAnalysisUI();
  });

  document.getElementById('btnPresetWholesale')?.addEventListener('click', function(){
    cat.value = 'wholesale_flip';
    cat.dispatchEvent(new Event('change'));
    inputPurchase.value = 135000;
    inputReno.value = 20000;
    if (inputArv) inputArv.value = 205000;
    if (inputFee) inputFee.value = 15000;
    if (inputEmd) inputEmd.value = 2500;
    if (inputDays) inputDays.value = 14;
    inputTitle.value = (inputAddress.value.trim() || 'Bossier City') + ' (Wholesale Contract Flip)';
    recalcQuickAnalysisUI();
  });

  document.getElementById('btnPresetCommercial')?.addEventListener('click', function(){
    cat.value = 'commercial_lease';
    cat.dispatchEvent(new Event('change'));
    inputPurchase.value = 450000;
    inputReno.value = 20000;
    inputRent.value = 4800;
    inputTitle.value = (inputAddress.value.trim() || 'Commercial Property') + ' (NNN Leased Asset)';
    recalcQuickAnalysisUI();
  });

  // Price Step Adjusters
  document.getElementById('btnPriceMinus25')?.addEventListener('click', function(){
    inputPurchase.value = Math.max(10000, (parseFloat(inputPurchase.value) || 0) - 25000);
    if (inputLtrRent) {
      inputLtrRent.value = Math.max(800, Math.round((parseFloat(inputPurchase.value) * 0.0075) / 50) * 50);
    }
    if (inputArv) {
      inputArv.value = Math.round((parseFloat(inputPurchase.value) * 1.38) / 1000) * 1000;
    }
    recalcQuickAnalysisUI();
  });
  document.getElementById('btnPriceMinus10')?.addEventListener('click', function(){
    inputPurchase.value = Math.max(10000, (parseFloat(inputPurchase.value) || 0) - 10000);
    if (inputLtrRent) {
      inputLtrRent.value = Math.max(800, Math.round((parseFloat(inputPurchase.value) * 0.0075) / 50) * 50);
    }
    if (inputArv) {
      inputArv.value = Math.round((parseFloat(inputPurchase.value) * 1.38) / 1000) * 1000;
    }
    recalcQuickAnalysisUI();
  });
  document.getElementById('btnPricePlus10')?.addEventListener('click', function(){
    inputPurchase.value = (parseFloat(inputPurchase.value) || 0) + 10000;
    if (inputLtrRent) {
      inputLtrRent.value = Math.max(800, Math.round((parseFloat(inputPurchase.value) * 0.0075) / 50) * 50);
    }
    if (inputArv) {
      inputArv.value = Math.round((parseFloat(inputPurchase.value) * 1.38) / 1000) * 1000;
    }
    recalcQuickAnalysisUI();
  });
  document.getElementById('btnPricePlus25')?.addEventListener('click', function(){
    inputPurchase.value = (parseFloat(inputPurchase.value) || 0) + 25000;
    if (inputLtrRent) {
      inputLtrRent.value = Math.max(800, Math.round((parseFloat(inputPurchase.value) * 0.0075) / 50) * 50);
    }
    if (inputArv) {
      inputArv.value = Math.round((parseFloat(inputPurchase.value) * 1.38) / 1000) * 1000;
    }
    recalcQuickAnalysisUI();
  });

  // Dispo Copy Buttons
  const copyFeedback = document.getElementById('dispoCopyFeedback');
  function showCopyFeedback(msg) {
    if (copyFeedback) {
      copyFeedback.innerText = msg || 'Copied to clipboard!';
      copyFeedback.style.display = 'inline-block';
      setTimeout(() => { copyFeedback.style.display = 'none'; }, 3000);
    }
  }

  document.getElementById('btnCopySmsBlast')?.addEventListener('click', function(){
    if (navigator.clipboard && currentSmsBlast) {
      navigator.clipboard.writeText(currentSmsBlast).then(() => {
        showCopyFeedback('SMS Blast Copied!');
      }).catch(err => console.error(err));
    }
  });

  document.getElementById('btnCopyEmailPitch')?.addEventListener('click', function(){
    if (navigator.clipboard && currentEmailPitch) {
      navigator.clipboard.writeText(currentEmailPitch).then(() => {
        showCopyFeedback('Email Pitch Copied!');
      }).catch(err => console.error(err));
    }
  });

  const boxTerms = document.getElementById('boxContractTerms');
  document.getElementById('btnToggleContractTerms')?.addEventListener('click', function(){
    if (boxTerms) {
      boxTerms.style.display = boxTerms.style.display === 'none' ? 'block' : 'none';
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
        if (inputLtrRent) {
          inputLtrRent.value = Math.max(800, Math.round((Number(d.purchase_price) * 0.0075) / 50) * 50);
        }
        if (inputArv) {
          inputArv.value = Math.round((Number(d.purchase_price) * 1.38) / 1000) * 1000;
        }
      }
      if (d.title) {
        inputTitle.value = d.title;
      } else if (d.address_line1) {
        inputTitle.value = d.address_line1 + ' (' + (d.city || 'Bossier City') + ', ' + (d.state || 'LA') + ')';
      }

      alertListing.className = 'alert alert-success py-1 px-2 small mb-0';
      const priceStr = d.purchase_price ? ' | Price: $' + Number(d.purchase_price).toLocaleString() : '';
      const benchmarkNote = d.is_benchmark_price ? ' (Target Valuation)' : '';
      alertListing.innerHTML = '<strong>Success!</strong> Auto-filled: <strong>' + (d.address_line1 || '') + '</strong>' + priceStr + benchmarkNote + '. Pro forma recalculated live!';
      alertListing.style.display = 'block';

      // 1. Instant client-side pro forma recalculation
      recalcQuickAnalysisUI();

      // 2. Trigger server-side AIOps synthesis
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
    btnAnalyze.innerHTML = '<span class="spinner-border spinner-border-sm me-1" role="status"></span> Underwriting...';
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
        return;
      }

      // Update UI metrics
      document.getElementById('cardDealScore').innerText = data.deal_score + '/100';
      document.getElementById('cardDealGrade').innerText = 'Grade ' + data.deal_grade;
      document.getElementById('cardTotalRaise').innerText = '$' + Math.round(data.pro_forma.total_acquisition).toLocaleString();
      document.getElementById('cardAnnualNoi').innerText = (data.property?.category === 'wholesale_flip')
        ? ('+$' + Math.round(data.pro_forma.projected_annual_noi).toLocaleString() + ' Cash')
        : ('$' + Math.round(data.pro_forma.projected_annual_noi).toLocaleString());
      document.getElementById('cardMonthlyNoi').innerText = (data.property?.category === 'wholesale_flip')
        ? '14-Day Cash Close'
        : ('$' + Math.round(data.pro_forma.projected_monthly_noi).toLocaleString() + '/mo');
      document.getElementById('cardCocYield').innerText = Number(data.pro_forma.target_coc_return).toFixed(2) + '%';
      document.getElementById('cardCapRate').innerText = (data.property?.category === 'wholesale_flip')
        ? ('Discount: ' + Number(data.pro_forma.cap_rate).toFixed(1) + '% under ARV')
        : ('Cap Rate: ' + Number(data.pro_forma.cap_rate).toFixed(2) + '%');

      // Update Multi-Strategy Comparison from server
      if (data.dual_strategy_comparison && dualCard) {
        const dual = data.dual_strategy_comparison;
        if (dual.str) {
          document.getElementById('dualStrRaise').innerText = '$' + Math.round(dual.str.total_acquisition).toLocaleString();
          document.getElementById('dualStrFurnish').innerText = '$' + Math.round(dual.str.furnishing_budget).toLocaleString();
          document.getElementById('dualStrGross').innerText = '$' + Math.round(dual.str.gross_annual).toLocaleString();
          document.getElementById('dualStrNoi').innerText = '$' + Math.round(dual.str.annual_noi).toLocaleString();
          document.getElementById('dualStrMonthly').innerText = '$' + Math.round(dual.str.monthly_noi).toLocaleString() + ' / mo';
          document.getElementById('dualStrCoc').innerText = Number(dual.str.coc_return).toFixed(2) + '%';
        }
        if (dual.ltr) {
          document.getElementById('dualLtrRaise').innerText = '$' + Math.round(dual.ltr.total_acquisition).toLocaleString();
          document.getElementById('dualLtrFurnish').innerHTML = '$0 <span class="badge bg-success-soft text-success" style="font-size:0.65rem;">Saves $' + Math.round(dual.comparison?.capital_saved_ltr || 20000).toLocaleString() + '</span>';
          document.getElementById('dualLtrGross').innerText = '$' + Math.round(dual.ltr.gross_annual).toLocaleString();
          document.getElementById('dualLtrNoi').innerText = '$' + Math.round(dual.ltr.annual_noi).toLocaleString();
          document.getElementById('dualLtrMonthly').innerText = '$' + Math.round(dual.ltr.monthly_noi).toLocaleString() + ' / mo';
          document.getElementById('dualLtrCoc').innerText = Number(dual.ltr.coc_return).toFixed(2) + '%';
        }
        if (dual.wholesale) {
          const w = dual.wholesale;
          const elFlipLock = document.getElementById('dualFlipLock');
          const elFlipArv = document.getElementById('dualFlipArv');
          const elFlipFee = document.getElementById('dualFlipFee');
          const elFlipEndBuyer = document.getElementById('dualFlipEndBuyer');
          const elFlipBuyerProfit = document.getElementById('dualFlipBuyerProfit');
          const elFlipCoc = document.getElementById('dualFlipCoc');
          if (elFlipLock) elFlipLock.innerText = '$' + Math.round(w.contract_price).toLocaleString();
          if (elFlipArv) elFlipArv.innerText = '$' + Math.round(w.after_repair_value).toLocaleString();
          if (elFlipFee) elFlipFee.innerText = '+$' + Math.round(w.assignment_fee).toLocaleString() + ' Cash';
          if (elFlipEndBuyer) elFlipEndBuyer.innerText = '$' + Math.round(w.end_buyer_price).toLocaleString();
          if (elFlipBuyerProfit) elFlipBuyerProfit.innerText = '$' + Math.round(w.end_buyer_profit).toLocaleString() + ' (' + Number(w.end_buyer_roi_pct).toFixed(1) + '%)';
          if (elFlipCoc) elFlipCoc.innerText = w.days_to_close + ' Days (' + Math.round(w.coc_return) + '%)';
        }
      }

      // Update Matched Buyers & Dispo Package from server if available
      if (data.matched_buyers && data.matched_buyers.length > 0) {
        let buyerHtml = '';
        data.matched_buyers.forEach(b => {
          buyerHtml += `
            <div class="col-md-6">
              <div class="border rounded p-2 bg-white h-100 shadow-sm">
                <div class="d-flex justify-content-between align-items-center mb-1">
                  <strong class="text-dark small"><em class="icon ni ni-user-check text-success me-1"></em>${b.name || 'Verified Buyer'}</strong>
                  <span class="badge bg-success text-white small">${b.match_score || 90}% Match</span>
                </div>
                <div class="small text-muted mb-1">
                  <span>Target:</span> ${b.buyer_type || 'Investor'} &bull; Max: <strong class="text-dark">$${Math.round(b.max_offer || 0).toLocaleString()}</strong> &bull; Close: <strong>${b.close_time_days || 14}d</strong>
                </div>
                <div class="d-flex gap-1 flex-wrap">
                  <span class="badge bg-outline-info" style="font-size:0.65rem;">${b.pof_verified ? 'POF Verified' : 'Cash Buyer'}</span>
                  <span class="badge bg-outline-primary" style="font-size:0.65rem;">${b.market || 'Bossier/Shreveport'}</span>
                  <span class="badge bg-outline-success" style="font-size:0.65rem;">Est. Spread: $${Math.round(b.buyer_spread || 0).toLocaleString()}</span>
                </div>
              </div>
            </div>`;
        });
        const container = document.getElementById('buyerMatchCardsContainer');
        if (container) container.innerHTML = buyerHtml;
        const countBadge = document.getElementById('badgeBuyerCount');
        if (countBadge) countBadge.innerText = data.matched_buyers.length + ' Pre-Matched Cash Buyers';
      }

      if (data.dispo_package) {
        if (data.dispo_package.sms_blast) currentSmsBlast = data.dispo_package.sms_blast;
        if (data.dispo_package.email_pitch) currentEmailPitch = data.dispo_package.email_pitch;
      }

      // Update summary
      if (data.executive_summary) {
        document.getElementById('cardExecutiveSummary').innerHTML = data.executive_summary;
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
        document.getElementById('cardPayoutPer1k').innerText = (data.property?.category === 'wholesale_flip')
          ? ('+$' + Math.round(data.pro_forma.projected_annual_noi).toLocaleString() + ' 1-Time')
          : ('$' + Number(data.crowdfund_structure.est_monthly_payout_per_1k).toFixed(2) + ' / mo');
      }
    })
    .catch(err => {
      btnAnalyze.innerHTML = origHtml;
      btnAnalyze.disabled = false;
      console.error(err);
    });
  });

  // Check URL parameters for direct link or address forwarding
  const urlParams = new URLSearchParams(window.location.search);
  const qUrl = urlParams.get('zillow_url') || urlParams.get('url');
  const qAddr = urlParams.get('address');
  if (qUrl) {
    inputUrl.value = qUrl;
    doFetchListing(qUrl);
  } else if (qAddr) {
    inputAddress.value = qAddr;
    recalcQuickAnalysisUI();
  } else {
    // Run initial calculation to sync state on load
    recalcQuickAnalysisUI();
  }
});
</script>
