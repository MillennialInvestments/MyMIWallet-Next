<?php
/**
 * Cash Buyer CRM & Wholesale Dispo Network View
 *
 * @var array<int, array<string, mixed>> $cashBuyers
 */
$buyers = $cashBuyers ?? [];
$totalBuyers = count($buyers);
$totalPof = 0.0;
$totalBroadcasts = 0;
$totalClosed = 0;

foreach ($buyers as $b) {
    if (! empty($b['proof_of_funds_verified'])) {
        $totalPof += (float) ($b['proof_of_funds_amount'] ?? 0.0);
    }
    $totalBroadcasts += (int) ($b['deals_received_count'] ?? 0);
    $totalClosed += (int) ($b['deals_closed_count'] ?? 0);
}
?>

<div class="nk-block-head nk-block-head-sm mb-4">
    <div class="nk-block-between align-items-center">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title page-title mb-1">
                <em class="icon ni ni-users text-primary"></em> Cash Buyer Network & Wholesale CRM
            </h4>
            <div class="nk-block-des text-soft">
                <span>Manage institutional funds, private balance sheets, and active Ark-La-Tex cash buyers for 1-click wholesale contract dispositions.</span>
            </div>
            <div class="mt-1 small text-muted">
                <strong>Lead Sponsor:</strong> Timothy Burks Incorporated, LLC. &bull; 
                <strong>Operating Managers:</strong> Timothy Burks & AnneAlicia Burks, Bossier City, LA
            </div>
        </div>
        <div class="nk-block-head-content">
            <div class="toggle-wrap nk-block-tools-toggle">
                <div class="btn-group">
                    <a href="<?= site_url('Management/Projects/Quick-Analysis') ?>" class="btn btn-outline-light">
                        <em class="icon ni ni-calculator"></em><span>Quick-Analysis</span>
                    </a>
                    <a href="<?= site_url('Management/Projects/Deal-Finder') ?>" class="btn btn-outline-primary">
                        <em class="icon ni ni-search"></em><span>Deal Finder</span>
                    </a>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAddCashBuyer">
                        <em class="icon ni ni-user-add"></em><span>Add Cash Buyer</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Key Buyer Metrics -->
<div class="row g-3 mb-4">
    <div class="col-6 col-md-3">
        <div class="card card-bordered card-full">
            <div class="card-inner p-3">
                <div class="text-soft small mb-1">Active Cash Buyers</div>
                <div class="h3 mb-0 text-primary"><?= number_format($totalBuyers) ?></div>
                <div class="small text-success mt-1"><em class="icon ni ni-check-circle"></em> Ready for Dispo</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card card-bordered card-full">
            <div class="card-inner p-3">
                <div class="text-soft small mb-1">Verified Proof of Funds</div>
                <div class="h3 mb-0 text-success">$<?= number_format($totalPof) ?></div>
                <div class="small text-muted mt-1">Bank Letter / Liquidity Verified</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card card-bordered card-full">
            <div class="card-inner p-3">
                <div class="text-soft small mb-1">Deals Dispatched</div>
                <div class="h3 mb-0 text-info"><?= number_format($totalBroadcasts) ?></div>
                <div class="small text-muted mt-1">Broadcast Alerts Sent</div>
            </div>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card card-bordered card-full">
            <div class="card-inner p-3">
                <div class="text-soft small mb-1">Contracts Closed</div>
                <div class="h3 mb-0 text-purple"><?= number_format($totalClosed) ?></div>
                <div class="small text-success mt-1"><em class="icon ni ni-arrow-up-right"></em> Dispo Complete</div>
            </div>
        </div>
    </div>
</div>

<!-- Broadcast Toolbar & Filters -->
<div class="card card-bordered mb-4">
    <div class="card-inner">
        <div class="row g-3 align-items-center">
            <div class="col-md-5">
                <div class="form-control-wrap">
                    <div class="form-icon form-icon-left"><em class="icon ni ni-search"></em></div>
                    <input type="text" class="form-control" id="buyerSearchInput" placeholder="Search by name, company, city, or target ZIP...">
                </div>
            </div>
            <div class="col-md-3">
                <select class="form-select" id="buyerTypeFilter">
                    <option value="">All Buyer Types</option>
                    <option value="institutional_fund">Institutional Funds</option>
                    <option value="local_flipper">Fix & Flip Operators</option>
                    <option value="section8_buy_hold">Section 8 Landlords</option>
                    <option value="high_net_worth">Private Balance Sheets</option>
                </select>
            </div>
            <div class="col-md-4 text-md-end">
                <button type="button" class="btn btn-outline-primary me-2" id="btnSelectAllBuyers">
                    <em class="icon ni ni-check-box"></em><span>Select All</span>
                </button>
                <button type="button" class="btn btn-success" id="btnOpenBroadcastModal" disabled>
                    <em class="icon ni ni-send"></em><span>Broadcast Deal (<span id="selectedBuyersCount">0</span>)</span>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Cash Buyers Directory Table -->
<div class="card card-bordered card-full">
    <div class="card-inner p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" id="cashBuyersTable">
                <thead class="table-light">
                    <tr>
                        <th style="width: 40px;" class="text-center">
                            <input type="checkbox" class="form-check-input" id="checkMasterBuyers">
                        </th>
                        <th>Buyer & Entity</th>
                        <th>Classification</th>
                        <th>Max Price</th>
                        <th>Target ZIPs / Markets</th>
                        <th>Proof of Funds</th>
                        <th>Activity</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($buyers)): ?>
                        <tr>
                            <td colspan="8" class="text-center py-4 text-muted">
                                <em>No cash buyers registered yet. Click "Add Cash Buyer" to enroll buyers into the network.</em>
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($buyers as $b): ?>
                            <?php
                            $buyerId = (int) ($b['id'] ?? 0);
                            $name = esc($b['full_name'] ?? 'Anonymous Buyer');
                            $company = esc($b['company_name'] ?? '');
                            $type = (string) ($b['buyer_type'] ?? 'institutional_fund');
                            $typeLabel = match ($type) {
                                'institutional_fund' => 'Institutional Fund',
                                'local_flipper'      => 'Fix & Flip Specialist',
                                'section8_buy_hold'  => 'Section 8 Landlord',
                                'high_net_worth'     => 'Private HNW Balance Sheet',
                                default              => 'Cash Buyer',
                            };
                            $badgeClass = match ($type) {
                                'institutional_fund' => 'badge-primary',
                                'local_flipper'      => 'badge-warning',
                                'section8_buy_hold'  => 'badge-info',
                                'high_net_worth'     => 'badge-success',
                                default              => 'badge-light',
                            };
                            $maxPrice = (float) ($b['max_purchase_price'] ?? 0.0);
                            $zips = esc($b['target_zips'] ?? '71111, 71101');
                            $cities = esc($b['target_cities'] ?? 'Bossier City, Shreveport');
                            $pofVerified = ! empty($b['proof_of_funds_verified']);
                            $pofAmount = (float) ($b['proof_of_funds_amount'] ?? 0.0);
                            $received = (int) ($b['deals_received_count'] ?? 0);
                            $closed = (int) ($b['deals_closed_count'] ?? 0);
                            ?>
                            <tr data-buyer-id="<?= $buyerId ?>" data-buyer-type="<?= esc($type) ?>">
                                <td class="text-center">
                                    <input type="checkbox" class="form-check-input buyer-checkbox" value="<?= $buyerId ?>" data-buyer-name="<?= $name ?>">
                                </td>
                                <td>
                                    <div class="fw-bold"><?= $name ?></div>
                                    <?php if ($company !== ''): ?>
                                        <div class="text-soft small"><?= $company ?></div>
                                    <?php endif; ?>
                                    <div class="small text-muted"><?= esc($b['email'] ?? '') ?> &bull; <?= esc($b['phone'] ?? '') ?></div>
                                </td>
                                <td>
                                    <span class="badge <?= $badgeClass ?>"><?= $typeLabel ?></span>
                                </td>
                                <td>
                                    <strong class="text-dark">$<?= number_format($maxPrice) ?></strong>
                                    <div class="small text-soft">Min ROI: <?= number_format((float) ($b['min_roi_pct'] ?? 10.0), 1) ?>%</div>
                                </td>
                                <td>
                                    <div class="small text-dark font-monospace"><?= $zips ?></div>
                                    <div class="text-soft small"><?= $cities ?></div>
                                </td>
                                <td>
                                    <?php if ($pofVerified): ?>
                                        <span class="badge bg-success-dim text-success">
                                            <em class="icon ni ni-shield-check"></em> Verified ($<?= number_format($pofAmount) ?>)
                                        </span>
                                    <?php else: ?>
                                        <span class="badge bg-warning-dim text-warning">Pending Letter</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="small">
                                        <span class="text-info"><?= $received ?></span> Sent &bull; 
                                        <span class="text-success fw-bold"><?= $closed ?></span> Closed
                                    </div>
                                </td>
                                <td class="text-end">
                                    <button type="button" class="btn btn-sm btn-outline-primary btn-quick-broadcast" data-buyer-id="<?= $buyerId ?>" data-buyer-name="<?= $name ?>">
                                        <em class="icon ni ni-send"></em> Deal
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal: Add Cash Buyer -->
<div class="modal fade" id="modalAddCashBuyer" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="formAddCashBuyer">
                <?= csrf_field(); ?>
                <div class="modal-header">
                    <h5 class="modal-title"><em class="icon ni ni-user-add text-primary"></em> Register Active Cash Buyer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label" for="addBuyerFullName">Full Name / Managing Director *</label>
                            <input type="text" class="form-control" id="addBuyerFullName" name="full_name" required placeholder="e.g. Jason Vance">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="addBuyerCompanyName">Purchasing Entity / LLC</label>
                            <input type="text" class="form-control" id="addBuyerCompanyName" name="company_name" placeholder="e.g. Bayou Equity Capital Partners, LLC">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="addBuyerEmail">Email Address *</label>
                            <input type="email" class="form-control" id="addBuyerEmail" name="email" required placeholder="acquisitions@bayouequity.com">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="addBuyerPhone">Phone Number</label>
                            <input type="tel" class="form-control" id="addBuyerPhone" name="phone" placeholder="318-555-0192">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="addBuyerType">Buyer Classification</label>
                            <select class="form-select" id="addBuyerType" name="buyer_type">
                                <option value="institutional_fund">Institutional Fund / Private Equity</option>
                                <option value="local_flipper">Fix & Flip Renovation Operator</option>
                                <option value="section8_buy_hold" selected>Buy & Hold Section 8 Landlord</option>
                                <option value="high_net_worth">High Net Worth Balance Sheet</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="addBuyerMaxPrice">Max Cash Purchase Price ($)</label>
                            <input type="number" step="5000" class="form-control" id="addBuyerMaxPrice" name="max_purchase_price" value="250000" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="addBuyerMinRoi">Minimum Target ROI (%)</label>
                            <input type="number" step="0.5" class="form-control" id="addBuyerMinRoi" name="min_roi_pct" value="10.0">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="addBuyerPofAmount">Proof of Funds Amount ($)</label>
                            <input type="number" step="10000" class="form-control" id="addBuyerPofAmount" name="proof_of_funds_amount" value="500000">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="addBuyerTargetZips">Target ZIP Codes (comma-separated)</label>
                            <input type="text" class="form-control" id="addBuyerTargetZips" name="target_zips" value="71111, 71101, 71105, 71107">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="addBuyerTargetCities">Target Cities</label>
                            <input type="text" class="form-control" id="addBuyerTargetCities" name="target_cities" value="Bossier City, Shreveport">
                        </div>
                        <div class="col-12">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="addBuyerPofVerified" name="proof_of_funds_verified" value="1" checked>
                                <label class="form-check-label" for="addBuyerPofVerified">Proof of Funds Letter on File & Liquid</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="addBuyerNotes">Acquisition Criteria & Notes</label>
                            <textarea class="form-control" id="addBuyerNotes" name="notes" rows="2" placeholder="Prefers 3+ bed single family homes with 70% ARV spreads or Section 8 cashflow. Closes in 10-14 days cash."></textarea>
                        </div>
                    </div>
                    <div id="addBuyerAlert" class="mt-3" style="display: none;"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="btnSubmitAddBuyer">
                        <em class="icon ni ni-save"></em><span>Save Cash Buyer</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal: Broadcast Deal to Buyers -->
<div class="modal fade" id="modalBroadcastDeal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="formBroadcastDeal">
                <?= csrf_field(); ?>
                <div class="modal-header">
                    <h5 class="modal-title"><em class="icon ni ni-send text-success"></em> 1-Click Wholesale Deal Broadcast</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-soft small mb-3">
                        Dispatch institutional contract flip memorandum with assignment terms ($15,000 fee, $2,500 title escrow, 14-day close) directly to verified cash buyers.
                    </p>
                    <input type="hidden" name="buyer_ids" id="broadcastBuyerIds">
                    
                    <div class="alert alert-info py-2 small mb-3">
                        <strong>Recipients:</strong> <span id="broadcastBuyerNames">None selected</span>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-8">
                            <label class="form-label">Property Title / Address</label>
                            <input type="text" class="form-control" name="deal_address" value="1842 Barksdale Blvd, Bossier City, LA 71111" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">End-Buyer Price ($)</label>
                            <input type="number" class="form-control" name="end_buyer_price" value="57500" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Appraised ARV ($)</label>
                            <input type="number" class="form-control" name="arv" value="128000" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Estimated Rehab ($)</label>
                            <input type="number" class="form-control" name="rehab" value="16500" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Projected Net ROI (%)</label>
                            <input type="number" step="0.1" class="form-control" name="roi" value="22.5" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Wholesale Assignment Terms</label>
                            <input type="text" class="form-control" name="terms" value="TBI LREC Contract Assignment: $15,000 fee, $2,500 EMD in title escrow, 14-day cash close." readonly>
                        </div>
                    </div>
                    <div id="broadcastAlert" class="mt-3" style="display: none;"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" id="btnSubmitBroadcast">
                        <em class="icon ni ni-send"></em><span>Send Deal Broadcast Now</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
document.addEventListener('DOMContentLoaded', function () {
    const searchInput = document.getElementById('buyerSearchInput');
    const typeFilter = document.getElementById('buyerTypeFilter');
    const table = document.getElementById('cashBuyersTable');
    const checkMaster = document.getElementById('checkMasterBuyers');
    const btnSelectAll = document.getElementById('btnSelectAllBuyers');
    const btnOpenBroadcast = document.getElementById('btnOpenBroadcastModal');
    const selectedCountSpan = document.getElementById('selectedBuyersCount');
    const broadcastModalEl = document.getElementById('modalBroadcastDeal');
    const broadcastModal = broadcastModalEl ? new bootstrap.Modal(broadcastModalEl) : null;

    function getSelectedCheckboxes() {
        return table.querySelectorAll('.buyer-checkbox:checked');
    }

    function updateSelectionState() {
        const selected = getSelectedCheckboxes();
        const count = selected.length;
        if (selectedCountSpan) selectedCountSpan.textContent = count;
        if (btnOpenBroadcast) btnOpenBroadcast.disabled = (count === 0);

        if (checkMaster) {
            const allBoxes = table.querySelectorAll('.buyer-checkbox');
            checkMaster.checked = (allBoxes.length > 0 && selected.length === allBoxes.length);
        }
    }

    if (table) {
        table.addEventListener('change', function (e) {
            if (e.target.classList.contains('buyer-checkbox')) {
                updateSelectionState();
            }
        });
    }

    if (checkMaster) {
        checkMaster.addEventListener('change', function () {
            const allBoxes = table.querySelectorAll('.buyer-checkbox');
            allBoxes.forEach(cb => {
                const tr = cb.closest('tr');
                if (tr && tr.style.display !== 'none') {
                    cb.checked = checkMaster.checked;
                }
            });
            updateSelectionState();
        });
    }

    if (btnSelectAll) {
        btnSelectAll.addEventListener('click', function () {
            const allBoxes = table.querySelectorAll('.buyer-checkbox');
            allBoxes.forEach(cb => {
                const tr = cb.closest('tr');
                if (tr && tr.style.display !== 'none') {
                    cb.checked = true;
                }
            });
            updateSelectionState();
        });
    }

    // Quick single-buyer broadcast button
    document.querySelectorAll('.btn-quick-broadcast').forEach(btn => {
        btn.addEventListener('click', function () {
            const buyerId = this.dataset.buyerId;
            const buyerName = this.dataset.buyerName;
            document.getElementById('broadcastBuyerIds').value = buyerId;
            document.getElementById('broadcastBuyerNames').textContent = buyerName + ' (ID: ' + buyerId + ')';
            if (broadcastModal) broadcastModal.show();
        });
    });

    // Multi-buyer broadcast trigger
    if (btnOpenBroadcast) {
        btnOpenBroadcast.addEventListener('click', function () {
            const selected = getSelectedCheckboxes();
            const ids = [];
            const names = [];
            selected.forEach(cb => {
                ids.push(cb.value);
                names.push(cb.dataset.buyerName);
            });
            document.getElementById('broadcastBuyerIds').value = ids.join(',');
            document.getElementById('broadcastBuyerNames').textContent = names.join(', ') + ' (' + ids.length + ' buyers)';
            if (broadcastModal) broadcastModal.show();
        });
    }

    // Table Filtering
    function filterTable() {
        const query = (searchInput ? searchInput.value : '').toLowerCase().trim();
        const selectedType = (typeFilter ? typeFilter.value : '').trim();
        const rows = table.querySelectorAll('tbody tr[data-buyer-id]');

        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            const type = row.getAttribute('data-buyer-type') || '';

            const matchesQuery = !query || text.includes(query);
            const matchesType = !selectedType || type === selectedType;

            row.style.display = (matchesQuery && matchesType) ? '' : 'none';
        });
    }

    if (searchInput) searchInput.addEventListener('input', filterTable);
    if (typeFilter) typeFilter.addEventListener('change', filterTable);

    // Add Buyer AJAX submission
    const formAddBuyer = document.getElementById('formAddCashBuyer');
    const btnSubmitAddBuyer = document.getElementById('btnSubmitAddBuyer');
    const addBuyerAlert = document.getElementById('addBuyerAlert');

    if (formAddBuyer) {
        formAddBuyer.addEventListener('submit', function (e) {
            e.preventDefault();
            btnSubmitAddBuyer.disabled = true;
            btnSubmitAddBuyer.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Saving...';

            const formData = new FormData(formAddBuyer);

            fetch('/Management/Projects/Buyers/Add', {
                method: 'POST',
                body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(res => res.json())
            .then(data => {
                btnSubmitAddBuyer.disabled = false;
                btnSubmitAddBuyer.innerHTML = '<em class="icon ni ni-save"></em><span>Save Cash Buyer</span>';

                if (data.status === 'ok') {
                    addBuyerAlert.innerHTML = '<div class="alert alert-success">✓ ' + (data.message || 'Buyer added successfully!') + '</div>';
                    addBuyerAlert.style.display = 'block';
                    setTimeout(() => window.location.reload(), 1200);
                } else {
                    addBuyerAlert.innerHTML = '<div class="alert alert-danger">Error: ' + (data.message || 'Failed to add buyer.') + '</div>';
                    addBuyerAlert.style.display = 'block';
                }
            })
            .catch(err => {
                btnSubmitAddBuyer.disabled = false;
                btnSubmitAddBuyer.innerHTML = '<em class="icon ni ni-save"></em><span>Save Cash Buyer</span>';
                addBuyerAlert.innerHTML = '<div class="alert alert-danger">Unexpected network error occurred.</div>';
                addBuyerAlert.style.display = 'block';
            });
        });
    }

    // Broadcast AJAX submission
    const formBroadcast = document.getElementById('formBroadcastDeal');
    const btnSubmitBroadcast = document.getElementById('btnSubmitBroadcast');
    const broadcastAlert = document.getElementById('broadcastAlert');

    if (formBroadcast) {
        formBroadcast.addEventListener('submit', function (e) {
            e.preventDefault();
            btnSubmitBroadcast.disabled = true;
            btnSubmitBroadcast.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Dispatching Deal...';

            const formData = new FormData(formBroadcast);

            fetch('/Management/Projects/Buyers/Broadcast', {
                method: 'POST',
                body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            })
            .then(res => res.json())
            .then(data => {
                btnSubmitBroadcast.disabled = false;
                btnSubmitBroadcast.innerHTML = '<em class="icon ni ni-send"></em><span>Send Deal Broadcast Now</span>';

                if (data.status === 'ok') {
                    broadcastAlert.innerHTML = '<div class="alert alert-success">✓ ' + (data.message || 'Deal dispatched successfully!') + '</div>';
                    broadcastAlert.style.display = 'block';
                    setTimeout(() => window.location.reload(), 1400);
                } else {
                    broadcastAlert.innerHTML = '<div class="alert alert-danger">Error: ' + (data.message || 'Broadcast failed.') + '</div>';
                    broadcastAlert.style.display = 'block';
                }
            })
            .catch(err => {
                btnSubmitBroadcast.disabled = false;
                btnSubmitBroadcast.innerHTML = '<em class="icon ni ni-send"></em><span>Send Deal Broadcast Now</span>';
                broadcastAlert.innerHTML = '<div class="alert alert-danger">Unexpected network error occurred.</div>';
                broadcastAlert.style.display = 'block';
            });
        });
    }
});
</script>
