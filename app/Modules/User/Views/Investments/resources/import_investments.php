<div class="nk-block">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-bordered">
                <div class="card-inner">
                    <div class="card-title-group mb-3">
                        <div class="card-title">
                            <h6 class="title">Import Investments</h6>
                        </div>
                    </div>
                    <form method="post" enctype="multipart/form-data">
                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

                        <div class="form-group">
                            <label for="csv_file">Upload CSV File</label>
                            <input type="file" class="form-control" name="csv_file" id="csv_file" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
/* symbol,shares,entry_price,current_price,trade_date
AAPL,10,150.00,200.00,2024-01-01
GOOGL,5,1000.00,1500.00,2024-02-01 */
?>