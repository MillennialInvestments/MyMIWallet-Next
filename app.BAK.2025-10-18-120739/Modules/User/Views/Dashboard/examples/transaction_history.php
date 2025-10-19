<!-- Transaction History -->
<div class="nk-block">
    <div class="card card-bordered">
        <div class="card-inner border-bottom">
            <h6 class="title">Transaction History</h6>
        </div>
        <div class="card-inner p-0 border-top">
            <div class="nk-tb-list nk-tb-orders">
                <div class="nk-tb-item nk-tb-head">
                    <div class="nk-tb-col"><span>Date</span></div>
                    <div class="nk-tb-col"><span>Type</span></div>
                    <div class="nk-tb-col"><span>Asset</span></div>
                    <div class="nk-tb-col"><span>Amount</span></div>
                    <div class="nk-tb-col"><span>Status</span></div>
                </div>
                <!-- Loop through transactions -->
                <?php foreach ($transactions as $transaction): ?>
                    <div class="nk-tb-item">
                        <div class="nk-tb-col"><span><?php echo $transaction['date']; ?></span></div>
                        <div class="nk-tb-col"><span><?php echo $transaction['type']; ?></span></div>
                        <div class="nk-tb-col"><span><?php echo $transaction['asset']; ?></span></div>
                        <div class="nk-tb-col"><span><?php echo $transaction['amount']; ?></span></div>
                        <div class="nk-tb-col"><span><?php echo $transaction['status']; ?></span></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>