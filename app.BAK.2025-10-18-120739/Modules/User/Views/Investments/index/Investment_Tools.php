<!-- User/views/Investments/index/Investment_Tools.php -->
<?php 
$investmentTools = $investDashboard['investmentTools'] ?? [];
// log_message('debug', 'Investments\index\Investment_Tools L2 - $investDashboard Array: ' . (print_r($investmentTools, true)));
?>
<div class="h-100 card card-bordered">
    <div class="card-inner-group">
        <div class="card-inner card-inner-md">
            <div class="card-title-group">
                <div class="card-title">
                    <h6 class="title">Investment Tools</h6>
                </div>
                <div class="card-tools me-n1">
                    <div class="drodown">
                        <a href="#" class="btn btn-icon btn-trigger dropdown-toggle" data-bs-toggle="dropdown">
                            <em class="icon ni ni-more-h"></em>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <ul class="link-list-opt no-bdr">
                                <li><a href="#"><em class="icon ni ni-setting"></em><span>Action Settings</span></a></li>
                                <li><a href="#"><em class="icon ni ni-notify"></em><span>Push Notification</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-inner">
            <?php if (!empty($investmentTools)) : ?>
                <?php foreach ($investmentTools as $tools) : ?>
                    <?php 
                    // log_message('debug', 'Investments\index\Investment_Tools L30 - $feature_level: ' . $tools['feature_level']);
                    $featureLevel = ''; // Initialize the variable

                    if ($tools['feature_level'] > 0) {
                        $featureIcon = '<em class="icon ni ni-star-fill" style="color: #f4bd0e;"></em>';
                        $featureLevel = '<span>Premium</span>';
                    } elseif ($tools['feature_level'] == 0) { // Corrected comparison
                        $featureIcon = '<em class="icon ni ni-cpu"></em>';
                        $featureLevel = '<span>Free</span>';
                    }

                    // log_message('debug', 'Investments\index\Investment_Tools L30 - $featureLevel: ' . $featureLevel);
                    ?>
                    <div class="nk-wg-action">
                        <div class="nk-wg-action-content">                        
                            <div class="title"><?= $featureIcon; ?><?php echo $tools['feature'] . ' | ' . $featureLevel; ?></div>
                        </div>
                        <a href="<?php echo site_url($tools['feature_link']); ?>" class="btn btn-icon btn-trigger me-n2">
                            <em class="icon ni ni-forward-ios"></em>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p>No information to provide here.</p>
            <?php endif; ?>
        </div>
    </div>
</div>