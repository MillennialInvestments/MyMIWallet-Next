<?php 
$trades = []; 
?>
<div class="nk-block">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-bordered">
                <div class="card-inner">
                    <div class="card-title-group mb-3">
                        <div class="card-title">
                            <h6 class="title">Manage Trades</h6>
                        </div>
                        <div class="card-tools">
                            <a href="<?= site_url('/investments/addTrade') ?>" class="btn btn-primary">Add New Trade</a>
                        </div>
                    </div>
                    <table id="tradeTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Symbol</th>
                                <th>Shares</th>
                                <th>Entry Price</th>
                                <th>Current Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($trades as $trade): ?>
                                <tr>
                                    <td><?= $trade['id'] ?></td>
                                    <td><?= $trade['symbol'] ?></td>
                                    <td><?= $trade['shares'] ?></td>
                                    <td><?= $trade['entry_price'] ?></td>
                                    <td><?= $trade['current_price'] ?></td>
                                    <td>
                                        <a href="<?= site_url('/investments/editTrade/' . $trade['id']) ?>" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="<?= site_url('/investments/deleteTrade/' . $trade['id']) ?>" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
