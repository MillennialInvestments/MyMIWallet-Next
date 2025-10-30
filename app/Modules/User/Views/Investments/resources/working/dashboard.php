<?php
$current_year = date('Y');
$subViewData = [];
?>
<div class="nk-block">
    <div class="row">
        <div class="my-sm-3 col-md-3">
            <?php echo view('UserModule\Views\Investments\index\control_center', $subViewData); ?>
        </div>
        <div class="my-sm-3 col-md-9">
            <div class="card card-bordered h-100">
                <div class="card-inner">
                    <div class="align-start card-title-group mb-3">
                        <div class="card-title">
                            <h6 class="title">Investment Dashboard</h6>
                            <p>Overview of your investments and alerts.</p>
                        </div>
                    </div>
                    <hr>
                    <div class="nk-order-ovwg pb-5">
                        <h6 class="subtitle">Alerts</h6>
                        <ul class="list-group mb-4">
                            <!-- Replace with dynamic alerts content -->
                            <li class="list-group-item">No alerts available.</li>
                        </ul>
                        
                        <h6 class="subtitle">Trade Alerts</h6>
                        <ul class="list-group mb-4">
                            <!-- Replace with dynamic trade alerts content -->
                            <li class="list-group-item">No trade alerts available.</li>
                        </ul>
                        
                        <h6 class="subtitle">Investment Tools</h6>
                        <ul class="list-group mb-4">
                            <!-- Replace with dynamic investment tools content -->
                            <li class="list-group-item">
                                <h6>Manual Trade Tracker</h6>
                                <p>Keep a close eye on your trades with our Manual Trade Tracker. Manually enter and monitor each trade, analyze performance, and make data-driven decisions to optimize your investments.</p>
                                <a class="btn btn-md btn-primary" href="">Acccess</a>
                            </li>
                            <li class="list-group-item">
                                <h6>MyMI Trade Alerts</h6>
                                <p>Never miss a trading opportunity with MyMI Trade Alerts. Receive instant notifications on trade signals, market movements, and investment strategies tailored to your preferences.</p>
                                <a class="btn btn-md btn-primary" href="">Acccess</a>
                            </li>
                            <li class="list-group-item">
                                <h6>MyMI Trade Tracker</h6>
                                <p>Enhance your trading efficiency with MyMI Trade Tracker. Our service provides automated account and brokerage integration along with an advanced investment analytical system, offering comprehensive insights to optimize your trading strategies.</p>
                                <a class="btn btn-md btn-primary" href="">Acccess</a>
                            </li>
                            <li class="list-group-item">
                                <h6>Exclusive Group Access</h6>
                                <p>Join our exclusive investment groups and connect with like-minded investors. Share insights, discuss strategies, and gain access to expert advice in a collaborative environment.</p>
                                <a class="btn btn-md btn-primary" href="">Acccess</a>
                            </li>
                        </ul>
                        
                        <h6 class="subtitle">Economic Data</h6>
                        <ul class="list-group mb-4">
                            <!-- Replace with dynamic economic data content -->
                            <li class="list-group-item">No economic data available.</li>
                        </ul>
                        
                        <h6 class="subtitle">Market News</h6>
                        <ul class="list-group mb-4">
                            <!-- Replace with dynamic market news content -->
                            <li class="list-group-item">No market news available.</li>
                        </ul>
                        
                        <h6 class="subtitle">MyMI News</h6>
                        <ul class="list-group mb-4">
                            <!-- Replace with dynamic MyMI news content -->
                            <li class="list-group-item">No MyMI news available.</li>
                        </ul>
                        
                        <h6 class="subtitle">MyMI Research</h6>
                        <ul class="list-group mb-4">
                            <!-- Replace with dynamic MyMI research content -->
                            <li class="list-group-item">No MyMI research available.</li>
                        </ul>
                        
                        <h6 class="subtitle">Stock Overview</h6>
                        <ul class="list-group mb-4">
                            <!-- Replace with dynamic stock overview content -->
                            <li class="list-group-item">No stock overview available.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
