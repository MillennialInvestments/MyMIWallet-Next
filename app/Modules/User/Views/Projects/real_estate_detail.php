<?php
/**
 * Real Estate Syndication Detail & Co-Investment View
 *
 * @var array $project
 * @var array|null $property
 * @var array $revenues
 * @var array $revenueTotals
 */
$cat = $property['property_category'] ?? 'residential_str';
$isStr = $cat === 'residential_str';
$isLtr = $cat === 'residential_ltr';
$isFlip = $cat === 'wholesale_flip';
$isCommercial = $cat === 'commercial_lease';
$targetRaise = (float) ($property['total_acquisition_cost'] ?? $project['target_amount'] ?? 1.0);
$raised = (float) ($project['current_amount'] ?? 0.0);
$pct = $targetRaise > 0 ? min(100.0, round(($raised / $targetRaise) * 100, 1)) : 0.0;
?>
<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <nav class="mb-2">
                <a href="<?= site_url('Projects/Real-Estate') ?>" class="text-soft">&larr; Back to Real Estate Marketplace</a>
            </nav>
            <h3 class="nk-block-title page-title"><?= esc($project['name'] ?? $project['title'] ?? 'Real Estate Syndication') ?></h3>
            <div class="nk-block-des text-soft">
                <?php if ($isFlip): ?>
                    <span class="badge bg-warning text-dark me-2">Contract Flip / Wholesale Dispo</span>
                <?php elseif ($isLtr): ?>
                    <span class="badge bg-primary me-2">Pure Long-Term Rental (12-Mo Lease)</span>
                <?php elseif ($isCommercial): ?>
                    <span class="badge bg-info me-2">Commercial Triple-Net (NNN) Lease</span>
                <?php else: ?>
                    <span class="badge bg-success me-2">Residential Airbnb/VRBO Conversion</span>
                <?php endif; ?>
                <span><em class="icon ni ni-map-pin"></em> <?= esc(($property['property_address'] ?? '') . ', ' . ($property['city'] ?? '') . ' ' . ($property['state'] ?? '')) ?></span>
                <span class="ms-3 badge bg-outline-primary text-uppercase"><?= esc($property['operational_stage'] ?? 'sourcing') ?></span>
            </div>
        </div>
        <div class="nk-block-head-content">
            <?php if (! empty($property['zillow_url'])): ?>
                <a href="<?= esc($property['zillow_url']) ?>" target="_blank" rel="noopener" class="btn btn-outline-light me-1">
                    <em class="icon ni ni-external"></em><span>Zillow Listing</span>
                </a>
            <?php endif; ?>
            <?php if (! empty($property['airbnb_listing_url'])): ?>
                <a href="<?= esc($property['airbnb_listing_url']) ?>" target="_blank" rel="noopener" class="btn btn-outline-danger me-1">
                    <em class="icon ni ni-home"></em><span>Airbnb Listing</span>
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>

<div class="nk-block">
    <div class="row g-gs">
        <!-- Main Column: Underwriting Pro Forma & Details -->
        <div class="col-lg-8">
            <div class="card card-bordered mb-4">
                <div class="card-inner">
                    <h5 class="card-title mb-3">Underwriting & Pro Forma Economics</h5>
                    <div class="row g-3">
                        <div class="col-sm-6 col-md-3">
                            <div class="border rounded p-2 text-center bg-light">
                                <div class="sub-text">Purchase Price</div>
                                <div class="lead-text fs-16px">$<?= number_format((float) ($property['purchase_price'] ?? 0), 2) ?></div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="border rounded p-2 text-center bg-light">
                                <div class="sub-text">Renovation & Capex</div>
                                <div class="lead-text fs-16px">$<?= number_format((float) (($property['renovation_budget'] ?? 0) + ($property['furnishing_budget'] ?? 0)), 2) ?></div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="border rounded p-2 text-center bg-light">
                                <div class="sub-text">Total Acquisition Raise</div>
                                <div class="lead-text fs-16px text-primary">$<?= number_format($targetRaise, 2) ?></div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="border rounded p-2 text-center bg-light">
                                <div class="sub-text">Target CoC Return</div>
                                <div class="lead-text fs-16px text-success"><?= number_format((float) ($property['target_coc_return'] ?? 0), 2) ?>% / yr</div>
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <?php
                    $metricsTitle = match(true) {
                        $isFlip       => 'Wholesale Contract Assignment & Dispo Parameters',
                        $isStr        => 'STR Projected Operating Metrics',
                        $isLtr        => 'Long-Term Rental Projected Operating Metrics',
                        default       => 'Commercial Lease Parameters',
                    };
                    ?>
                    <h6 class="overline-title text-soft mb-2"><?= $metricsTitle ?></h6>
                    <div class="row g-3">
                        <?php if ($isFlip): ?>
                            <div class="col-md-4">
                                <div class="sub-text">Wholesale Assignment Spread</div>
                                <div class="lead-text text-success">+$<?= number_format((float) ($property['projected_annual_noi'] ?? 15000), 2) ?> Cash</div>
                            </div>
                            <div class="col-md-4">
                                <div class="sub-text">Closing Timeline</div>
                                <div class="lead-text">14-Day Cash Close</div>
                            </div>
                        <?php elseif ($isStr): ?>
                            <div class="col-md-4">
                                <div class="sub-text">Average Daily Rate (ADR)</div>
                                <div class="lead-text">$<?= number_format((float) ($property['projected_adr'] ?? 0), 2) ?> / night</div>
                            </div>
                            <div class="col-md-4">
                                <div class="sub-text">Projected Occupancy</div>
                                <div class="lead-text"><?= number_format((float) ($property['projected_occupancy_pct'] ?? 70), 1) ?>%</div>
                            </div>
                        <?php elseif ($isLtr): ?>
                            <div class="col-md-4">
                                <div class="sub-text">Projected Monthly Rent</div>
                                <div class="lead-text">$<?= number_format((float) ($property['projected_monthly_rent'] ?? 0), 2) ?> / mo</div>
                            </div>
                            <div class="col-md-4">
                                <div class="sub-text">Lease Structure</div>
                                <div class="lead-text text-uppercase">12-Month Traditional Lease</div>
                            </div>
                        <?php else: ?>
                            <div class="col-md-4">
                                <div class="sub-text">Projected Monthly Rent</div>
                                <div class="lead-text">$<?= number_format((float) ($property['projected_monthly_rent'] ?? 0), 2) ?> / mo</div>
                            </div>
                            <div class="col-md-4">
                                <div class="sub-text">Lease Structure</div>
                                <div class="lead-text text-uppercase"><?= esc($property['monetization_strategy'] ?? 'triple_net_nnn') ?></div>
                            </div>
                        <?php endif; ?>
                        <div class="col-md-4">
                            <div class="sub-text">Projected Annual NOI</div>
                            <div class="lead-text text-success">$<?= number_format((float) ($property['projected_annual_noi'] ?? 0), 2) ?> / yr</div>
                        </div>
                        <div class="col-md-4">
                            <div class="sub-text">Sponsor Management Fee</div>
                            <div class="lead-text"><?= number_format((float) ($property['sponsor_management_fee_pct'] ?? 15), 1) ?>% of Gross</div>
                        </div>
                        <div class="col-md-4">
                            <div class="sub-text">SPV Holding Entity</div>
                            <div class="lead-text"><?= esc($property['spv_entity_name'] ?? 'TBI Real Estate Holdings LLC') ?></div>
                        </div>
                        <div class="col-md-4">
                            <div class="sub-text">Distribution Frequency</div>
                            <div class="lead-text">Monthly Pro-Rata</div>
                        </div>
                    </div>

                    <div class="alert alert-light mt-4 mb-0 border">
                        <div class="d-flex align-items-center">
                            <em class="icon ni ni-shield-check text-primary me-3" style="font-size: 28px;"></em>
                            <div>
                                <h6 class="mb-0 text-dark">Sponsor & Asset Management: Timothy Burks Incorporated, LLC.</h6>
                                <p class="small text-muted mb-0">
                                    Operating Managers & Co-Owners: <strong>Timothy Burks &amp; AnneAlicia Burks</strong> &bull; Bossier City, Louisiana &bull; Manager-Managed Louisiana SPV Structure
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Historical Audited Revenue & Distribution Ledger -->
            <div class="card card-bordered">
                <div class="card-inner">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h5 class="card-title mb-0">Audited Monthly Operating Returns & Distributions</h5>
                            <p class="text-soft small">All gross receipts, deductions, and pro-rata distributions are verified on-ledger.</p>
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#reportRevenueModal">
                            <em class="icon ni ni-report"></em><span>Report Revenue</span>
                        </button>
                    </div>

                    <div class="row g-2 mb-3 bg-light rounded p-2">
                        <div class="col-sm-4 text-center">
                            <div class="sub-text">Total Gross Cash Flow</div>
                            <div class="lead-text fs-14px">$<?= number_format((float) ($revenueTotals['total_gross'] ?? 0), 2) ?></div>
                        </div>
                        <div class="col-sm-4 text-center">
                            <div class="sub-text">Total Net Distributed</div>
                            <div class="lead-text fs-14px text-success">$<?= number_format((float) ($revenueTotals['total_distributed'] ?? 0), 2) ?></div>
                        </div>
                        <div class="col-sm-4 text-center">
                            <div class="sub-text">Completed Periods</div>
                            <div class="lead-text fs-14px"><?= (int) ($revenueTotals['periods_count'] ?? 0) ?> Months</div>
                        </div>
                    </div>

                    <?php if (empty($revenues)): ?>
                        <div class="alert alert-light text-center py-3 mb-0">
                            No operating revenues recorded yet. Once the property is operational, monthly performance reports and pro-rata crypto distribution receipts will appear here.
                        </div>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <thead>
                                    <tr>
                                        <th>Period</th>
                                        <th>Source</th>
                                        <th>Gross Revenue</th>
                                        <th>Total Deductions</th>
                                        <th>Net Distributable</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($revenues as $rev): ?>
                                        <?php
                                        $deductions = (float) ($rev['gross_revenue'] - $rev['net_distributable']);
                                        ?>
                                        <tr>
                                            <td><strong><?= esc($rev['reporting_period']) ?></strong></td>
                                            <td><?= esc($rev['revenue_source']) ?></td>
                                            <td>$<?= number_format((float) $rev['gross_revenue'], 2) ?></td>
                                            <td>-$<?= number_format($deductions, 2) ?></td>
                                            <td class="text-success font-weight-bold">$<?= number_format((float) $rev['net_distributable'], 2) ?></td>
                                            <td>
                                                <span class="badge <?= $rev['status'] === 'distributed' ? 'bg-success' : 'bg-warning' ?>">
                                                    <?= esc($rev['status']) ?>
                                                </span>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Sidebar Column: Co-Investment & SolanaPay / CryptoPay -->
        <div class="col-lg-4">
            <div class="card card-bordered card-full">
                <div class="card-inner">
                    <h5 class="card-title mb-2">Co-Invest with Lead Sponsors</h5>
                    <p class="text-soft small mb-3">Contribute crypto via SolanaPay or Multi-Chain CryptoPay to receive fractional SPV membership units and automated monthly profit distributions.</p>

                    <div class="border rounded p-3 mb-3 bg-light">
                        <div class="d-flex justify-content-between small mb-1">
                            <span>Funding Progress</span>
                            <strong><?= $pct ?>%</strong>
                        </div>
                        <div class="progress progress-md mb-2">
                            <div class="progress-bar" style="width: <?= $pct ?>%"></div>
                        </div>
                        <div class="d-flex justify-content-between small text-soft">
                            <span>$<?= number_format($raised, 2) ?> Raised</span>
                            <span>$<?= number_format($targetRaise, 2) ?> Target</span>
                        </div>
                    </div>

                    <div class="mb-3 small">
                        <ul class="list-unstyled mb-0">
                            <li class="d-flex justify-content-between py-1 border-bottom">
                                <span class="text-soft">Min Co-Investment:</span>
                                <strong>$<?= number_format((float) ($project['min_commit'] ?? 500), 2) ?></strong>
                            </li>
                            <li class="d-flex justify-content-between py-1 border-bottom">
                                <span class="text-soft">Unit Price (NAV):</span>
                                <strong>$<?= number_format((float) ($project['nav_per_unit'] ?? 1.0), 4) ?> / unit</strong>
                            </li>
                            <li class="d-flex justify-content-between py-1 border-bottom">
                                <span class="text-soft">Target CoC Yield:</span>
                                <strong class="text-success"><?= number_format((float) ($property['target_coc_return'] ?? 0), 2) ?>% / yr</strong>
                            </li>
                            <li class="d-flex justify-content-between py-1">
                                <span class="text-soft">Compliance Standard:</span>
                                <span>SEC Reg D 506(c)</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Co-Investment Form -->
                    <form id="cryptoInvestForm">
                        <?= csrf_field(); ?>
                        <div class="form-group mb-3">
                            <label class="form-label" for="investAmount">Co-Investment Amount (USD)</label>
                            <div class="form-control-wrap">
                                <div class="form-icon form-icon-left"><em class="icon ni ni-sign-usd"></em></div>
                                <input type="number" step="10" min="<?= (float) ($project['min_commit'] ?? 500) ?>" max="<?= $targetRaise ?>" class="form-control" id="investAmount" name="amount" value="<?= (float) ($project['min_commit'] ?? 500) ?>" required>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label" for="investChain">Contribution Payment Rail</label>
                            <select class="form-select" id="investChain" name="chain">
                                <option value="solana" selected>SolanaPay (USDC on Solana - Instant, Zero Fees)</option>
                                <option value="base">Base (USDC on Base L2)</option>
                                <option value="ethereum">Ethereum (USDC / ETH)</option>
                                <option value="bitcoin">Bitcoin (BTC)</option>
                            </select>
                        </div>

                        <div class="alert alert-warning small mb-3">
                            <em class="icon ni ni-alert-circle"></em> Co-investors must hold accredited investor status. All contributions are subject to OFAC sanctions screening and Operating Agreement consent.
                        </div>

                        <button type="submit" class="btn btn-primary w-100" id="btnInvestCrypto">
                            <em class="icon ni ni-wallet"></em><span>Pay with Crypto & Mint Units</span>
                        </button>
                    </form>

                    <div id="investResult" class="mt-3" style="display: none;"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Report Revenue Modal -->
<div class="modal fade" id="reportRevenueModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Record Monthly Property Performance & Revenue</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formReportRevenue">
                <?= csrf_field() ?>
                <input type="hidden" name="project_id" value="<?= (int) ($project['id'] ?? 0) ?>">
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Reporting Period (YYYY-MM)</label>
                            <input type="text" class="form-control" name="reporting_period" value="<?= date('Y-m') ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Revenue Source</label>
                            <select class="form-select" name="revenue_source">
                                <option value="airbnb_payout">Airbnb Booking Payout</option>
                                <option value="vrbo_payout">VRBO Booking Payout</option>
                                <option value="commercial_rent">Commercial Tenant Rent</option>
                                <option value="other">Other Operating Income</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Gross Revenue ($)</label>
                            <input type="number" step="0.01" min="0" class="form-control" name="gross_revenue" required id="revGross">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Cleaning & Turnover Fees ($)</label>
                            <input type="number" step="0.01" min="0" class="form-control" name="cleaning_fees" value="0.00">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Utilities ($)</label>
                            <input type="number" step="0.01" min="0" class="form-control" name="utilities" value="0.00">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Property Taxes ($)</label>
                            <input type="number" step="0.01" min="0" class="form-control" name="property_taxes" value="0.00">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Maintenance Reserves ($)</label>
                            <input type="number" step="0.01" min="0" class="form-control" name="maintenance_reserves" value="0.00">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Sponsor Management Fee ($)</label>
                            <input type="number" step="0.01" min="0" class="form-control" name="sponsor_fee" value="0.00">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Proof / Payout Statement URL</label>
                            <input type="url" class="form-control" name="proof_attachment_url" placeholder="https://...">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Auditor & Management Notes</label>
                            <textarea class="form-control" name="notes" rows="2" placeholder="Occupancy details, maintenance performed, or seasonal reserve notes."></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="btnSubmitRevenue">Save Audited Revenue</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
document.addEventListener('DOMContentLoaded', function () {
    const investForm = document.getElementById('cryptoInvestForm');
    const investResult = document.getElementById('investResult');
    const btnInvest = document.getElementById('btnInvestCrypto');

    if (investForm) {
        investForm.addEventListener('submit', function (e) {
            e.preventDefault();
            btnInvest.disabled = true;
            btnInvest.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Generating Payment Rail...';

            const formData = new FormData(investForm);

            fetch('<?= site_url('Projects/Invest-Crypto/' . (int) ($project['id'] ?? 0)) ?>', {
                method: 'POST',
                body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(res => res.json())
            .then(data => {
                btnInvest.disabled = false;
                btnInvest.innerHTML = '<em class="icon ni ni-wallet"></em><span>Pay with Crypto & Mint Units</span>';

                if (data.status === 'ok') {
                    let html = '<div class="alert alert-success">';
                    html += '<h6>Checkout Invoice Created!</h6>';
                    html += '<p class="small mb-2">Reference: <code>' + (data.reference || '') + '</code></p>';
                    if (data.checkout_url) {
                        html += '<a href="' + data.checkout_url + '" class="btn btn-success btn-sm w-100 mb-1" target="_blank">Complete Crypto Payment &rarr;</a>';
                    }
                    if (data.solana_url) {
                        html += '<a href="' + data.solana_url + '" class="btn btn-outline-primary btn-sm w-100">Open in Solana Wallet</a>';
                    }
                    html += '</div>';
                    investResult.innerHTML = html;
                    investResult.style.display = 'block';
                } else if (data.status === 'compliance_required') {
                    investResult.innerHTML = '<div class="alert alert-warning"><strong>Compliance Required:</strong> ' + (data.message || 'Accreditation verification is required before co-investing.') + '</div>';
                    investResult.style.display = 'block';
                } else {
                    investResult.innerHTML = '<div class="alert alert-danger"><strong>Error:</strong> ' + (data.message || data.error || 'Checkout initiation failed.') + '</div>';
                    investResult.style.display = 'block';
                }
            })
            .catch(err => {
                btnInvest.disabled = false;
                btnInvest.innerHTML = '<em class="icon ni ni-wallet"></em><span>Pay with Crypto & Mint Units</span>';
                investResult.innerHTML = '<div class="alert alert-danger">Unexpected network error occurred. Please try again.</div>';
                investResult.style.display = 'block';
            });
        });
    }

    const revForm = document.getElementById('formReportRevenue');
    if (revForm) {
        revForm.addEventListener('submit', function (e) {
            e.preventDefault();
            const btn = document.getElementById('btnSubmitRevenue');
            btn.disabled = true;
            btn.innerHTML = 'Saving...';

            fetch('<?= site_url('Projects/Report-RealEstate-Revenue') ?>', {
                method: 'POST',
                body: new FormData(revForm),
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(res => res.json())
            .then(data => {
                btn.disabled = false;
                btn.innerHTML = 'Save Audited Revenue';
                if (data.status === 'ok') {
                    alert('Revenue recorded successfully!');
                    location.reload();
                } else {
                    alert('Error: ' + (data.message || 'Failed to record revenue.'));
                }
            })
            .catch(err => {
                btn.disabled = false;
                btn.innerHTML = 'Save Audited Revenue';
                alert('An error occurred submitting the report.');
            });
        });
    }
});
</script>
