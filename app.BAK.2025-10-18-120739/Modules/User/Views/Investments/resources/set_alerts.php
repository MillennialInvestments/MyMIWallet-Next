<?php 
$alerts = []; 
?>
<div class="nk-block">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-bordered">
                <div class="card-inner">
                    <div class="card-title-group mb-3">
                        <div class="card-title">
                            <h6 class="title">Set Alerts</h6>
                        </div>
                    </div>
                    <form method="post">
                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

                        <div class="form-group">
                            <label for="symbol">Symbol</label>
                            <input type="text" class="form-control" name="symbol" id="symbol" required>
                        </div>
                        <div class="form-group">
                            <label for="condition">Condition</label>
                            <select class="form-control" name="condition" id="condition">
                                <option value="above">Above</option>
                                <option value="below">Below</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="value">Value</label>
                            <input type="number" class="form-control" name="value" id="value" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Alert</button>
                    </form>
                    <hr>
                    <table id="alertsTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Symbol</th>
                                <th>Condition</th>
                                <th>Value</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($alerts as $alert): ?>
                                <tr>
                                    <td><?= $alert['symbol'] ?></td>
                                    <td><?= $alert['condition'] ?></td>
                                    <td><?= $alert['value'] ?></td>
                                    <td>
                                        <a href="<?= site_url('/investments/deleteAlert/' . $alert['id']) ?>" class="btn btn-sm btn-danger">Delete</a>
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
