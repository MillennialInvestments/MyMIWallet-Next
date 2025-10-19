<?php 
$realTimeData = []; 
?>
<div class="nk-block">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-bordered">
                <div class="card-inner">
                    <div class="card-title-group mb-3">
                        <div class="card-title">
                            <h6 class="title">Real-Time Data for <?= $symbol ?></h6>
                        </div>
                    </div>
                    <table id="realTimeDataTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Time</th>
                                <th>Open</th>
                                <th>High</th>
                                <th>Low</th>
                                <th>Close</th>
                                <th>Volume</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($realTimeData as $time => $data): ?>
                                <tr>
                                    <td><?= $time ?></td>
                                    <td><?= $data['1. open'] ?></td>
                                    <td><?= $data['2. high'] ?></td>
                                    <td><?= $data['3. low'] ?></td>
                                    <td><?= $data['4. close'] ?></td>
                                    <td><?= $data['5. volume'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
