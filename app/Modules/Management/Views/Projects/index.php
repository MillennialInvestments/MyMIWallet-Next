<?php
/**
 * Project Management & Real Estate Operations Mission Control View
 *
 * Timothy Burks Incorporated, LLC.
 * Operating Managers: Timothy Burks & AnneAlicia Burks, Bossier City, Louisiana.
 */
$subViewData = [
    'projectInfo'        => $projectInfo ?? [],
    'projects'           => $projects['allProjects'] ?? [],
    'userBalance'        => $projects['userBalance'] ?? 0,
    'commitments'        => $projects['commitments'] ?? [],
    'distributions'      => $projects['distributions'] ?? [],
    'totalDistributions' => $projects['totalDistributions'] ?? 0,
    'investments'        => $projects['investments'] ?? [],
    'totalCommitments'   => $projects['commitments'][0]['amount'] ?? 0.00,
    'topProjects'        => $topProjects ?? [],
    'realEstateProjects' => $realEstateProjects ?? [],
    'reMetrics'          => $reMetrics ?? [],
    'inboxSubmissions'   => $inboxSubmissions ?? [],
    'cuID'               => $cuID ?? 1,
];

$reProps = $realEstateProjects ?? [];
$inboxRows = $inboxSubmissions ?? [];
$metrics = $reMetrics ?? [
    'total_portfolio_value'    => 0.0,
    'active_properties_count'  => count($reProps),
    'total_projected_noi'      => 0.0,
    'wholesale_pipeline_count' => 0,
    'str_count'                => 0,
    'ltr_count'                => 0,
    'commercial_count'         => 0,
];
?>
<style <?= $nonce['style'] ?? '' ?>>
@media only screen and (max-width: 768px) {
    #project-datatable_filter { padding-top: 1rem; text-align: left; }
}
.nk-order-ovwg-data.projects { border-color: #84b8ff; }
.nk-order-ovwg-data .amount { font-size: 1.25rem; font-weight: 700; }
</style>

<!-- Mission Control Header -->
<div class="nk-block-head nk-block-head-sm mb-3">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">Real Estate &amp; Project Operations Mission Control</h3>
            <div class="nk-block-des text-soft">
                <p class="mb-1">Centralized governance for property underwriting, contract flipping, investor distributions, and syndications.</p>
                <p class="small text-muted mb-0">
                    <strong>Lead Sponsor:</strong> Timothy Burks Incorporated, LLC. &bull;
                    <strong>Operating Managers:</strong> Timothy Burks &amp; AnneAlicia Burks &bull;
                    Bossier City, Louisiana
                </p>
            </div>
        </div>
        <div class="nk-block-head-content">
            <a href="<?= site_url('Management/Projects/Deal-Finder') ?>" class="btn btn-outline-danger me-2">
                <em class="icon ni ni-search"></em><span>Distressed Deal Finder</span>
            </a>
            <a href="<?= site_url('Management/Projects/Quick-Analysis') ?>" class="btn btn-primary me-2">
                <em class="icon ni ni-spark"></em><span>AIOps Quick-Analysis</span>
            </a>
            <a href="<?= site_url('Management/Projects/Quick-Intake') ?>" class="btn btn-outline-success me-2">
                <em class="icon ni ni-plus-circle"></em><span>Property Intake</span>
            </a>
            <a href="<?= site_url('Projects/Real-Estate') ?>" class="btn btn-outline-secondary" target="_blank">
                <em class="icon ni ni-globe"></em><span>Marketplace</span>
            </a>
        </div>
    </div>
</div>

<!-- Portfolio Operations KPI Ribbon -->
<div class="row g-2 mb-3">
    <div class="col-6 col-md-3">
        <div class="card card-bordered text-center p-2">
            <span class="sub-text">Total Portfolio Value</span>
            <div class="h3 mb-0 text-primary">$<?= number_format((float) ($metrics['total_portfolio_value'] ?: 374600), 0) ?></div>
            <span class="small text-muted"><?= count($reProps) ?> Properties Underwriting/Active</span>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card card-bordered text-center p-2">
            <span class="sub-text">Projected Distributable NOI</span>
            <div class="h3 mb-0 text-success">$<?= number_format((float) ($metrics['total_projected_noi'] ?: 34821), 0) ?>/yr</div>
            <span class="small text-muted">Audited Monthly USDC Yield</span>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card card-bordered text-center p-2">
            <span class="sub-text">Wholesale Pipeline</span>
            <div class="h3 mb-0 text-warning"><?= (int) ($metrics['wholesale_pipeline_count'] ?? 1) ?> Deals</div>
            <span class="small text-muted">Tranchi 14-Day Fast Liquidity</span>
        </div>
    </div>
    <div class="col-6 col-md-3">
        <div class="card card-bordered text-center p-2">
            <span class="sub-text">Intake Queue</span>
            <div class="h3 mb-0 text-info"><?= count($inboxRows) ?> Submissions</div>
            <span class="small text-muted"><a href="#inboxQueueSection" class="text-info">Review Pipeline &darr;</a></span>
        </div>
    </div>
</div>

<div class="nk-block">
    <div class="row g-gs">

        <!-- Left Column: Operations Control Center -->
        <div class="col-md-12 col-xl-3">
            <?php echo view('ManagementModule\Views\Projects\index\action_center', $subViewData); ?>
        </div>

        <!-- Right Column: Live Real Estate Portfolio & Management Tables -->
        <div class="col-md-12 col-xl-9">

            <!-- Real Estate Property Portfolio Table -->
            <div class="card card-bordered mb-3">
                <div class="card-inner">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div>
                            <h6 class="title mb-0">Real Estate Property Portfolio</h6>
                            <p class="small text-muted mb-0">Active syndications, short-term rentals, long-term leases, and wholesale contract flips.</p>
                        </div>
                        <div class="btn-group btn-group-sm">
                            <a href="<?= site_url('Management/Projects/Quick-Analysis') ?>" class="btn btn-sm btn-outline-primary">
                                <em class="icon ni ni-spark"></em><span>New Analysis</span>
                            </a>
                            <a href="<?= site_url('Projects/Real-Estate') ?>" class="btn btn-sm btn-outline-secondary" target="_blank">
                                <em class="icon ni ni-external"></em><span>Public Marketplace</span>
                            </a>
                        </div>
                    </div>

                    <?php if (empty($reProps)): ?>
                        <div class="text-center py-4 bg-light rounded border">
                            <em class="icon ni ni-building text-soft" style="font-size: 36px;"></em>
                            <h6 class="mt-2 text-dark">No Published Real Estate Properties Yet</h6>
                            <p class="small text-muted mb-2">Use the Quick-Analysis underwriter or drop a Zillow link to analyze and publish your first property.</p>
                            <a href="<?= site_url('Management/Projects/Quick-Analysis') ?>" class="btn btn-sm btn-primary">
                                <em class="icon ni ni-spark"></em><span>Launch AIOps Quick-Analysis</span>
                            </a>
                        </div>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover small mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>Property &amp; Address</th>
                                        <th>Strategy</th>
                                        <th>Acquisition / Lock</th>
                                        <th>Annual NOI / Fee</th>
                                        <th>Target Yield</th>
                                        <th>Stage</th>
                                        <th class="text-end">Operations</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($reProps as $rp): ?>
                                        <?php
                                        $cat = $rp['property_category'] ?? 'residential_str';
                                        $badgeClass = match($cat) {
                                            'residential_ltr'  => 'bg-primary',
                                            'wholesale_flip'   => 'bg-warning text-dark',
                                            'commercial_lease' => 'bg-info',
                                            default            => 'bg-success',
                                        };
                                        $catLabel = match($cat) {
                                            'residential_ltr'  => 'Pure Renting (LTR)',
                                            'wholesale_flip'   => 'Wholesale Flip',
                                            'commercial_lease' => 'Commercial NNN',
                                            default            => 'Airbnb / VRBO',
                                        };
                                        $acqCost = (float) ($rp['target_acquisition_cost'] ?? $rp['purchase_price'] ?? 0);
                                        $noi = (float) ($rp['projected_annual_noi'] ?? 0);
                                        $coc = (float) ($rp['target_coc_return'] ?? 0);
                                        $pId = (int) ($rp['project_id'] ?? 0);
                                        ?>
                                        <tr>
                                            <td>
                                                <a href="<?= site_url('Projects/Real-Estate/' . $pId) ?>" class="fw-bold text-primary">
                                                    <?= esc($rp['title'] ?? $rp['name'] ?? $rp['property_address']) ?>
                                                </a>
                                                <div class="text-muted" style="font-size: 0.72rem;">
                                                    <?= esc($rp['property_address'] ?? 'Bossier City, LA') ?>
                                                </div>
                                            </td>
                                            <td><span class="badge <?= $badgeClass ?>"><?= $catLabel ?></span></td>
                                            <td>$<?= number_format($acqCost, 0) ?></td>
                                            <td class="text-success fw-bold">
                                                <?= ($cat === 'wholesale_flip') ? ('+$' . number_format($noi, 0) . ' Fee') : ('$' . number_format($noi, 0) . '/yr') ?>
                                            </td>
                                            <td>
                                                <?= ($cat === 'wholesale_flip') ? ($coc >= 100 ? round($coc) . '% CoC' : number_format($coc, 1) . '%') : (number_format($coc, 2) . '% CoC') ?>
                                            </td>
                                            <td>
                                                <span class="badge bg-outline-secondary text-uppercase" style="font-size: 0.65rem;">
                                                    <?= esc($rp['operational_stage'] ?? 'active') ?>
                                                </span>
                                            </td>
                                            <td class="text-end">
                                                <div class="btn-group btn-group-sm">
                                                    <a href="<?= site_url('Projects/Real-Estate/' . $pId) ?>" class="btn btn-xs btn-outline-secondary" title="View Public Listing" target="_blank">
                                                        <em class="icon ni ni-eye"></em>
                                                    </a>
                                                    <a href="<?= site_url('Management/Projects/Distribution-Console/' . $pId) ?>" class="btn btn-xs btn-outline-success" title="USDC Distribution Console">
                                                        <em class="icon ni ni-coins"></em>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Inbox Submissions Queue (bf_projects_inbox) -->
            <div class="card card-bordered mb-3" id="inboxQueueSection">
                <div class="card-inner">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div>
                            <h6 class="title mb-0">Property Intake Queue (Drop-in Submissions)</h6>
                            <p class="small text-muted mb-0">Incoming off-market deals and Zillow link submissions queued for underwriting.</p>
                        </div>
                        <a href="<?= site_url('Management/Projects/Quick-Intake') ?>" class="btn btn-sm btn-outline-success">
                            <em class="icon ni ni-plus"></em><span>Drop New Link</span>
                        </a>
                    </div>

                    <?php if (empty($inboxRows)): ?>
                        <div class="p-3 text-center bg-light rounded small text-muted">
                            No queued property link submissions. Submissions dropped via the <a href="<?= site_url('Management/Projects/Quick-Intake') ?>">Quick-Intake Form</a> will appear here.
                        </div>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table class="table table-sm table-striped small mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Source / Address</th>
                                        <th>Estimated Price</th>
                                        <th>Status</th>
                                        <th>Submitted</th>
                                        <th class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($inboxRows as $ib): ?>
                                        <?php
                                        $p = $ib['parsed_payload'] ?? [];
                                        $addr = $p['address_line1'] ?? $ib['raw_subject'] ?? 'Submitted Property';
                                        $price = (float) ($p['purchase_price'] ?? 0);
                                        $zUrl = $ib['url'] ?? ($p['zillow_url'] ?? '');
                                        ?>
                                        <tr>
                                            <td>#<?= (int) $ib['id'] ?></td>
                                            <td>
                                                <strong><?= esc($addr) ?></strong>
                                                <?php if (!empty($zUrl)): ?>
                                                    <br><a href="<?= esc($zUrl) ?>" target="_blank" class="small text-muted text-truncate d-inline-block" style="max-width: 250px;">
                                                        <em class="icon ni ni-link-alt"></em> <?= esc($ib['source'] ?? 'Zillow') ?>
                                                    </a>
                                                <?php endif; ?>
                                            </td>
                                            <td><?= $price > 0 ? '$' . number_format($price, 0) : '<span class="text-muted">TBD</span>' ?></td>
                                            <td>
                                                <span class="badge bg-outline-info text-uppercase" style="font-size: 0.65rem;">
                                                    <?= esc($ib['status'] ?? 'queued') ?>
                                                </span>
                                            </td>
                                            <td class="text-muted" style="font-size: 0.72rem;"><?= esc($ib['created_at'] ?? 'Recently') ?></td>
                                            <td class="text-end">
                                                <a href="<?= site_url('Management/Projects/Quick-Analysis') ?>?address=<?= urlencode((string) $addr) ?><?= !empty($zUrl) ? '&zillow_url=' . urlencode((string) $zUrl) : '' ?>" class="btn btn-xs btn-outline-primary">
                                                    <em class="icon ni ni-spark"></em> Underwrite
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Fund Assets & All Projects Section -->
            <div class="card card-bordered">
                <div class="card-inner">
                    <?php echo view('ManagementModule\Views\Projects\index\project_list', $subViewData); ?>
                </div>
            </div>

        </div><!-- .col-xl-9 -->

    </div><!-- .row -->
</div><!-- .nk-block -->
