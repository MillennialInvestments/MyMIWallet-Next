<?php
/**
 * Real Estate Private Equity & Syndication Marketplace View
 *
 * @var array $properties
 */
?>
<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">Real Estate Private Equity & Syndications</h3>
            <div class="nk-block-des text-soft">
                <p class="mb-1">Co-invest alongside lead sponsors in cash-flowing residential short-term rentals (Airbnb/VRBO) and triple-net commercial leases with audited pro-rata crypto distributions.</p>
                <p class="small text-muted mb-0">
                    <strong>Lead Sponsor:</strong> Timothy Burks Incorporated, LLC. &bull; <strong>Operating Managers:</strong> Timothy Burks &amp; AnneAlicia Burks &bull; Bossier City, Louisiana
                </p>
            </div>
        </div>
        <div class="nk-block-head-content">
            <a href="<?= site_url('Management/Projects/Quick-Intake') ?>" class="btn btn-outline-primary">
                <em class="icon ni ni-plus"></em><span>Propose Property Deal</span>
            </a>
        </div>
    </div>
</div>

<div class="nk-block">
    <?php if (empty($properties)): ?>
        <div class="card card-bordered">
            <div class="card-inner text-center py-5">
                <em class="icon ni ni-building text-soft" style="font-size: 48px;"></em>
                <h5 class="mt-3">No Active Real Estate Deals</h5>
                <p class="text-muted">New residential Airbnb/VRBO conversions and commercial lease syndications will appear here as soon as they pass underwriting intake.</p>
                <a href="<?= site_url('Management/Projects/Quick-Intake') ?>" class="btn btn-primary mt-2">Submit First Property</a>
            </div>
        </div>
    <?php else: ?>
        <div class="row g-gs">
            <?php foreach ($properties as $prop): ?>
                <?php
                $targetRaise = (float) ($prop['target_acquisition_cost'] ?? $prop['total_acquisition_cost'] ?? $prop['target_amount'] ?? 1.0);
                $raised = (float) ($prop['current_amount'] ?? 0.0);
                $pct = $targetRaise > 0 ? min(100.0, round(($raised / $targetRaise) * 100, 1)) : 0.0;
                $propCategory = $prop['property_category'] ?? 'residential_str';
                $isStr = ($propCategory === 'residential_str');
                $isFlip = ($propCategory === 'wholesale_flip');
                $isLtr = ($propCategory === 'residential_ltr');
                $isCommercial = ($propCategory === 'commercial_lease');

                $catBadge = match($propCategory) {
                    'residential_ltr'  => 'bg-primary',
                    'wholesale_flip'   => 'bg-warning text-dark',
                    'commercial_lease' => 'bg-info',
                    default            => 'bg-success',
                };
                $catLabel = match($propCategory) {
                    'residential_ltr'  => 'Residential Pure Rental',
                    'wholesale_flip'   => 'Contract Flip / Wholesale Dispo',
                    'commercial_lease' => 'Commercial NNN Lease',
                    default            => 'Residential Airbnb/VRBO',
                };
                ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card card-bordered h-100">
                        <div class="card-inner d-flex flex-column justify-content-between">
                            <div>
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <span class="badge <?= $catBadge ?>">
                                        <?= $catLabel ?>
                                    </span>
                                    <span class="badge bg-outline-secondary text-uppercase">
                                        <?= esc($prop['operational_stage'] ?? 'sourcing') ?>
                                    </span>
                                </div>
                                <h5 class="card-title mb-1">
                                    <a href="<?= site_url('Projects/Real-Estate/' . (int) $prop['project_id']) ?>">
                                        <?= esc($prop['name'] ?? $prop['title'] ?? $prop['property_address']) ?>
                                    </a>
                                </h5>
                                <p class="text-soft small mb-3">
                                    <em class="icon ni ni-map-pin"></em>
                                    <?= esc($prop['city'] ? "{$prop['city']}, {$prop['state']}" : $prop['property_address']) ?>
                                </p>

                                <div class="row g-2 mb-3 bg-light rounded p-2">
                                    <div class="col-6">
                                        <div class="sub-text"><?= $isFlip ? 'End Buyer Price' : 'Target Raise' ?></div>
                                        <div class="lead-text fs-14px">$<?= number_format((float) ($prop['total_acquisition_cost'] ?? $prop['target_amount'] ?? 0), 2) ?></div>
                                    </div>
                                    <div class="col-6">
                                        <div class="sub-text"><?= $isFlip ? 'Wholesale Spread' : 'Target CoC Return' ?></div>
                                        <div class="lead-text fs-14px text-success">
                                            <?= $isFlip ? '+$' . number_format((float) ($prop['projected_annual_noi'] ?? 15000), 2) : number_format((float) ($prop['target_coc_return'] ?? 0), 2) . '% / yr' ?>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="sub-text"><?= $isFlip ? 'Assignment Profit' : 'Est. Annual NOI' ?></div>
                                        <div class="lead-text fs-14px text-success">$<?= number_format((float) ($prop['projected_annual_noi'] ?? 0), 2) ?></div>
                                    </div>
                                    <div class="col-6">
                                        <div class="sub-text">
                                            <?php
                                            if ($isFlip) echo 'Close Speed';
                                            elseif ($isStr) echo 'Projected ADR';
                                            else echo 'Monthly Rent';
                                            ?>
                                        </div>
                                        <div class="lead-text fs-14px">
                                            <?php
                                            if ($isFlip) echo '14-Day Cash Close';
                                            elseif ($isStr) echo '$' . number_format((float) ($prop['projected_adr'] ?? 0), 2) . ' / night';
                                            else echo '$' . number_format((float) ($prop['projected_monthly_rent'] ?? 0), 2) . ' / mo';
                                            ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="d-flex justify-content-between small mb-1">
                                        <span>Funded Progress</span>
                                        <span><?= $pct ?>%</span>
                                    </div>
                                    <div class="progress progress-md">
                                        <div class="progress-bar" style="width: <?= $pct ?>%"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="pt-2">
                                <a href="<?= site_url('Projects/Real-Estate/' . (int) $prop['project_id']) ?>" class="btn btn-primary w-100">
                                    <span><?= $isFlip ? 'View Contract & Match Buyers' : 'View Deal & Co-Invest' ?></span>
                                    <em class="icon ni ni-arrow-right"></em>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>
