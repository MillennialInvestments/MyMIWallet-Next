<div class="nk-block">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-bordered">
                <div class="card-inner">
                    <div class="align-start card-title-group mb-3">
                        <div class="card-title">
                            <h6 class="title">Goal-Based Investing</h6>
                        </div>
                    </div>
                    <form method="post">
                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

                        <div class="form-group">
                            <label for="goal_name">Goal Name</label>
                            <input type="text" class="form-control" name="goal_name" id="goal_name" required>
                        </div>
                        <div class="form-group">
                            <label for="goal_amount">Goal Amount</label>
                            <input type="number" class="form-control" name="goal_amount" id="goal_amount" required>
                        </div>
                        <div class="form-group">
                            <label for="goal_timeframe">Timeframe (years)</label>
                            <input type="number" class="form-control" name="goal_timeframe" id="goal_timeframe" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Goal</button>
                    </form>
                    <hr>
                    <div class="nk-order-ovwg pb-5">
                        <h6>Your Goals</h6>
                        <ul>
                            <?php foreach ($goals as $goal): ?>
                                <li><?= $goal['goal_name'] ?>: $<?= number_format($goal['goal_amount'], 2) ?> in <?= $goal['goal_timeframe'] ?> years</li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
