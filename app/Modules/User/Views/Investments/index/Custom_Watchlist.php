<!-- User/views/Investments/index/Insights.php -->
<div class="card card-bordered">
    <div class="card-inner mb-n2">
        <div class="card-title-group">
            <div class="card-title">
                <h6 class="title">US Markets</h6>
                <p>Latest market metrics.</p>
            </div>
            <div class="card-tools">
                <!-- Add any additional tools here -->
            </div>
        </div>
    </div>

    <div class="nk-tb-list is-loose traffic-channel-table">
        <div class="nk-tb-item nk-tb-head">
            <div class="nk-tb-col nk-tb-channel"><span>Symbol</span></div>
            <div class="nk-tb-col nk-tb-sessions"><span>Price</span></div>
            <div class="nk-tb-col nk-tb-prev-sessions"><span>Previous Close</span></div>
            <div class="nk-tb-col nk-tb-change"><span>Change</span></div>
            <div class="nk-tb-col nk-tb-trend tb-col-sm text-end"><span>Trend</span></div>
        </div>

        <?php
        try {
            $this->load->model('Investments_model');
            
            $symbolsArray = ['$DJI', 'SPY', 'NDAQ', 'RUT'];  // Replace this with the dynamic list based on your needs
            $sanitizedSymbols = array_map(fn($symbol) => str_replace('$', '', $symbol), $symbolsArray);
            
            $data = $this->Investments_model->fetch_batch_stock_quotes($sanitizedSymbols);  // Assume this method fetches batch stock quotes
            
            foreach ($data as $symbol => $details) {
                $displaySymbol = str_replace('$', '', $symbol);
                
                $historyData = $this->Investments_model->getSymbolHistory($displaySymbol);  // Assume you've moved getSymbolHistory to your Investments_model
                
                if ($historyData === null) {
                    echo '<script ' . $nonce['script'] ?? '' . '>var historyData_' . $displaySymbol . ' = [];</script>';
                    continue;
                }
            
                $currentPrice = $details['lastPrice'];
                $prevClose = $details['closePrice'];
                $change = $currentPrice - $prevClose;
                $percentageChange = ($change / $prevClose) * 100;
                $trend = $change >= 0 ? 'up' : 'down';
                ?>
                <div class="nk-tb-item">
                    <div class="nk-tb-col nk-tb-channel">
                        <span class="tb-lead"><?php echo $displaySymbol; ?></span>
                    </div>
                    <div class="nk-tb-col nk-tb-sessions">
                        <span class="tb-sub tb-amount"><span id="currentPrice-<?php echo $displaySymbol; ?>"><?php echo $currentPrice; ?></span></span>
                    </div>
                    <div class="nk-tb-col nk-tb-prev-sessions">
                        <span class="tb-sub tb-amount"><span id="prevClose-<?php echo $displaySymbol; ?>"><?php echo $prevClose; ?></span></span>
                    </div>
                    <div class="nk-tb-col nk-tb-change">
                        <span class="tb-sub"><span><?php echo number_format($percentageChange, 2) . '%'; ?></span> <span class="change <?php echo $trend; ?>"><em class="icon ni ni-arrow-long-<?php echo $trend; ?>"></em></span></span>
                    </div>
                    <div class="nk-tb-col nk-tb-trend text-end">
                        <canvas id="chart-<?php echo $displaySymbol; ?>" width="100" height="50"></canvas>
                    </div>
                </div>
                <?php
                echo '<script ' . $nonce['script'] ?? '' . '>';
                if (isset($historyData['candles'])) {
                    echo 'var historyData_' . $displaySymbol . ' = ' . json_encode($historyData['candles']) . ';';
                } else {
                    log_message('error', 'Candles data not found for symbol: ' . $displaySymbol);
                    echo 'var historyData_' . $displaySymbol . ' = [];';
                }
                echo '</script>';
            }            

        } catch (Exception $e) {
            log_message('error', 'An exception occurred: ' . $e->getMessage());
            echo '<div class="nk-tb-item"><div class="nk-tb-col">An error occurred. Please check the logs for details.</div></div>';
        }
        ?>
    </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
    // Your existing JavaScript code for charting, etc.
    const symbols = <?php echo json_encode($sanitizedSymbols); ?>;
    // ... Rest of your JavaScript code for real-time updates and other functionalities
</script>
