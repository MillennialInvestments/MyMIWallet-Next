<!-- application/modules/User/views/Investments/index/Insights.php -->
<div class="nk-block nk-block-lg">
    <div class="row g-gs">
        <!-- Active Trades Section -->
        <div class="col-lg-6">
            <div class="card card-bordered">
                <div class="card-inner-group">
                    <div class="card-inner card-inner-md">
                        <div class="card-title-group">
                            <div class="card-title">
                                <h6 class="title">Active Trades</h6>
                            </div>
                            <div class="card-tools me-n1">
                                <ul class="card-tools-nav">
                                    <li>
                                        <div class="dropdown">
                                            <a href="#" class="dropdown-toggle btn btn-success btn-icon text-white" data-bs-toggle="dropdown"><i class="icon ni ni-plus mx-2"></i></a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a href="<?php // echo site_url('Investments/Add/Bond'); ?>#" class="dynamicModalLoader" data-formtype="Investments" data-endpoint="addBondTrade"><span>Bond</span></a></li>
                                                    <li><a href="<?php // echo site_url('Investments/Add/Crypto'); ?>#" class="dynamicModalLoader" data-formtype="Investments" data-endpoint="addCryptoTrade"><span>Crypto</span></a></li>
                                                    <li><a href="<?php // echo site_url('Investments/Add/Options'); ?>#" class="dynamicModalLoader" data-formtype="Investments" data-endpoint="addOptionsTrade"><span>Options</span></a></li>
                                                    <li><a href="<?php // echo site_url('Investments/Add/Stock'); ?>#" class="dynamicModalLoader" data-formtype="Investments" data-endpoint="addStockTrade"><span>Stock</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- <li>
                                        <div class="drodown">
                                            <a href="#" class="dropdown-toggle btn btn-icon" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <ul class="link-list-opt no-bdr">
                                                    <li><a href="#"><em class="icon ni ni-setting"></em><span>Action Settings</span></a></li>
                                                    <li><a href="#"><em class="icon ni ni-notify"></em><span>Push Notification</span></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-inner card-inner-md">