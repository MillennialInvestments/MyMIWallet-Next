<?php
$current_year = date('Y');
$thisMonth = strtotime(date("m/1/Y"));
$sixMonthsAgo = date($thisMonth, strtotime("-6 months"));
$sixMonthsAhead = date($thisMonth, strtotime("-6 months"));
$last_year = date('Y') - 1;
$next_year = date('Y') + 1;
$current_date = date('m/d/Y');
$last_year_date = date('m/d' . $last_year);
$next_year_date = date('m/d' . $next_year);
$end_of_year = date('m/d/Y', strtotime('12/31'));
$daysLeft = date('dd', strtotime($end_of_year)) - date('dd', strtotime($current_date));
$weeksLeft = date('W', strtotime($end_of_year)) - date('W', strtotime($current_date));
$monthsLeft = date('m', strtotime($end_of_year)) - date('m', strtotime($current_date));
$monthlySavingsPercentage = 0.3;
$monthlySavingsPercentageFMT = number_format($monthlySavingsPercentage * 100, 0) . '%';
?>

<div class="nk-block">
    <div class="row">
        <div class="col-md-12 col-xl-3 my-sm-3">
            <h1>Import Solana Wallet - MyMI Wallet</h1>
            <p>Use the form below to import an existing Solana wallet by storing its public key in the MyMI Wallet system.</p>
            
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>

            <form action="<?= base_url('Exchange/SolanaController/importWallet') ?>" method="post">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

                <div class="form-group">
                    <label for="user_id">User ID</label>
                    <input type="text" name="user_id" id="user_id" class="form-control" value="<?= set_value('user_id') ?>" required>
                </div>
                <div class="form-group">
                    <label for="user_email">User Email</label>
                    <input type="email" name="user_email" id="user_email" class="form-control" value="<?= set_value('user_email') ?>" required>
                </div>
                <div class="form-group">
                    <label for="public_key">Public Key</label>
                    <input type="text" name="public_key" id="public_key" class="form-control" value="<?= set_value('public_key') ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Import Wallet</button>
            </form>
        </div>
    </div>
</div>
