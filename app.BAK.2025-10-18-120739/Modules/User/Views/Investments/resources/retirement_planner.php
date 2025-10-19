<div class="nk-block">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-bordered">
                <div class="card-inner">
                    <div class="card-title-group mb-3">
                        <div class="card-title">
                            <h6 class="title">Retirement Planner</h6>
                        </div>
                    </div>
                    <form method="post">
                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

                        <div class="form-group">
                            <label for="retirement_age">Retirement Age</label>
                            <input type="number" class="form-control" name="retirement_age" id="retirement_age" value="<?= $plan['retirement_age'] ?? '' ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="monthly_savings">Monthly Savings</label>
                            <input type="number" class="form-control" name="monthly_savings" id="monthly_savings" value="<?= $plan['monthly_savings'] ?? '' ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="current_savings">Current Savings</label>
                            <input type="number" class="form-control" name="current_savings" id="current_savings" value="<?= $plan['current_savings'] ?? '' ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Plan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
