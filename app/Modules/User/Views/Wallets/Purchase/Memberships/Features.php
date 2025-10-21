<?php
use App\Models\DashboardModel; 
if ($debug === 1) {
// log_message('debug', 'Wallets\Purchase\Memberships\Features L2 - $uri->getSegment(3): ' . ($uri->getTotalSegments() >= 3) ? $uri->getSegment(3) : 'URI Seg 3: Not set.');
// log_message('debug', 'Wallets\Purchase\Memberships\Features L2 - $uri->getSegment(4): ' . ($uri->getTotalSegments() >= 4) ? $uri->getSegment(4) : 'URI Seg 4: Not set.');
// log_message('debug', 'Wallets\Purchase\Memberships\Features L2 - $uri->getSegment(5): ' . ($uri->getTotalSegments() >= 5) ? $uri->getSegment(5) : 'URI Seg 5: Not set.');
}
$client_id = $cuUserType === 'Beta' ? 'AewHMlPPPhVyrOAAxPGHzBsgnftW3K9iztFySQt9bWx5PpH5YdNqcMGPu8IyXe6O96rJBcaYgxz-DohH' : 'AXZPKPakARMCxGCjA7mtB0u2eVMNqhzo78X4kuiY0uiKTVNo13daa-xzXrVPExd98m_PQdYT3ZlVPaiR';
$featureIdentifier = ($uri->getTotalSegments() >= 4) ? $uri->getSegment(4) : null; 
if (!empty($featureIdentifier)) {
    $this->dashboardModel = new DashboardModel(); 
    $featureInfo = $this->dashboardModel->getFeatureInformation($featureIdentifier); 
    $featureCategory = $featureInfo['category']; 
    $feature_cost = $featureInfo['feature_cost']; 
    if ($featureInfo['feature_cost'] > 0) {
        $featureCost = '<strong>$' . $featureInfo['feature_cost'] . '/month</strong>';
    } else {
        $featureCost = '<strong>FREE</strong>';
    }
    $feature_benefits = $featureInfo['feature_benefits']; 
    $feature_description = $featureInfo['feature_description']; 
    $feature_name = $featureInfo['feature_name']; 
    $feature_link = $featureInfo['feature_link']; 
}
$membership_fee = 0; 
$membership_type = 0; 
$subViewData = [
    'uri' => $uri,
    'debug' => $debug,
]
?>
<div class="modal-header">
    <h3 class="modal-title" id="useCoinModalLabel">Learn More About Our Financial Solutions!</h3>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div> 
<div class="modal-body">
    <div class="nk-block">
        <div class="row g-gs">
            <div class="col-12 mt-0">
                <?php echo view('Wallets/Purchase/Memberships/Advertisements/CustomizeYourMembership', $subViewData); ?>
            </div>
        </div>
        <div class="row g-gs flex-lg-row-reverse">
            <div class="col-12 col-md-5 mt-0">
                <div class="card card-bordered">
                    <div class="card-inner">
                        <div class="card-head">
                            <h4 class="card-title">Subscribe to <?= ucfirst($feature_name) ?> Membership</h4>
                        </div>
                        <div class="card-body">
                            <h6 class="card-subtitle"></h6>
                            <p>Subscribe to our <?= ucfirst($feature_name) ?> Membership for only <?= $featureCost; ?> and enjoy our service.</p>
                            <?php if ($feature_cost > 0) : ?>
                                <div class="d-none" id="transCost"><?= $feature_cost ?></div>
                                <div id="paypal-button-container"></div>
                            <?php else : ?>
                                <a class="btn btn-success" href="<?php echo site_url($feature_link); ?>">Start Now!</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-7 mt-0">
                <div class="entry me-xxl-3 product-details">
                    <h3><?= $feature_name ?> Details</h3>
                    <p><?= $feature_description ?></p>
                    <h3 class="mb-3">Monthly Subscription</h3>
                    <h6 class="mb-4">Subscribe for <?= $featureCost; ?></h6>
                    <h3>Key Features</h3>
                    <p><?= $feature_benefits ?></p>
                    <!-- <span><a class="btn btn-primary" href="<?php echo site_url('Wallets/Purchase/Memberships'); ?>"><em class="icon ni ni-arrow-left"></em> Back to Memberships</a></span>  -->
                    
                    <!-- <span><a class="btn btn-success" href="<?php echo site_url('Dashboard'); ?>">Subscribe: <?= $featureCost; ?> <em class="icon ni ni-arrow-right"></em></a></span> -->
                </div>
            </div>
        </div>
    </div>
</div>


