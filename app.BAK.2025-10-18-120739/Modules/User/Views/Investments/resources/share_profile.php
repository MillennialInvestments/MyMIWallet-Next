<div class="nk-block">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-bordered">
                <div class="card-inner">
                    <div class="card-title-group mb-3">
                        <div class="card-title">
                            <h6 class="title">Share Portfolio</h6>
                        </div>
                    </div>
                    <table id="portfolioTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Symbol</th>
                                <th>Shares</th>
                                <th>Entry Price</th>
                                <th>Current Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($portfolio as $investment): ?>
                                <tr>
                                    <td><?= $investment['symbol'] ?></td>
                                    <td><?= $investment['shares'] ?></td>
                                    <td><?= $investment['entry_price'] ?></td>
                                    <td><?= $investment['current_price'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
