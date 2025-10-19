<?php 
// User's Investment Commitment - investment_commitment.php
// Investment Commitment Form
$userBalance = $userBalance ?? 0;
?>
<div class="card h-100" id="investment-commitment-form">
    <div class="card-inner">
        <h6 class="title">Make an Investment Commitment</h6>
        <form action="<?= site_url('Projects/Commit'); ?>" method="post">
            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

            <div class="form-group">
                <label for="project">Select Project</label>
                <select name="project_id" id="project" class="form-control">
                    <?php foreach ($projects as $project): ?>
                        <option value="<?= $project['id']; ?>"><?= $project['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="amount">Investment Amount ($)</label>
                <input type="number" name="amount" id="amount" class="form-control" min="1" max="<?= $userBalance; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Commit</button>
        </form>
    </div>
</div>
