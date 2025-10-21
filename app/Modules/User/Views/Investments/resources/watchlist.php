<?php
$current_year = date('Y');
$subViewData = [];
?>
<div class="nk-block">
    <div class="row">
        <div class="my-sm-3 col-md-3">
            <?php echo view('Budget/index/control_center', $subViewData); ?>
        </div>
        <div class="my-sm-3 col-md-9">
            <div class="card card-bordered h-100">
                <div class="card-inner">
                    <div class="align-start card-title-group mb-3">
                        <div class="card-title">
                            <h6 class="title">User Watchlist</h6>
                            <p>Items you are currently watching.</p>
                        </div>
                    </div>
                    <hr>
                    <div class="nk-order-ovwg pb-5">
                        <h6>Watchlist</h6>
                        <table class="table" id="userWatchlistTable">
                            <thead>
                                <tr>
                                    <th>Symbol</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($userWatchlist as $item): ?>
                                    <tr>
                                        <td><?= $item['symbol'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <hr>
                        <h6>Add to Watchlist</h6>
                        <form action="<?= site_url('add-to-watchlist') ?>" method="post">
                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

                            <div class="form-group">
                                <label for="symbol">Symbol</label>
                                <input type="text" name="symbol" id="symbol" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </form>
                        <hr>
                        <h6>Remove from Watchlist</h6>
                        <form action="<?= site_url('remove-from-watchlist') ?>" method="post">
                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

                            <div class="form-group">
                                <label for="symbol">Symbol</label>
                                <input type="text" name="symbol" id="symbol" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-danger">Remove</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script <?= $nonce['script'] ?? '' ?>>
    $(document).ready(function() {
        $("#userWatchlistTable").DataTable({});
    });
</script>
