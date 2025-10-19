<div class="row">
    <div class="col-sm-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h5 class="card-title">My Referrals</h5>
                        <p class="card-description">View Information Regarding Your Current Referrals &amp; Income</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-bordered default" id="myReferralsDatatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Sign-Up Date</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Membership</th>
                                    <th class="text-center">Monthly Income</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($getTotalReferrals)): ?>
                                    <?php foreach ($getTotalReferrals as $referral): ?>
                                        <tr>
                                            <td><?= $referral['id']; ?></td>
                                            <td><?= $referral['signup_date']; ?></td>
                                            <td class="text-center"><a href="#"><?= $referral['referral_email']; ?></a></td>
                                            <td class="text-center"><?= $referral['type']; ?></td>
                                            <td class="text-center">
                                                <?php 
                                                switch ($referral['type']) {
                                                    case 'Basic':
                                                        echo '$9.50';
                                                        break;
                                                    case 'Premium':
                                                        echo '$49.50';
                                                        break;
                                                    case 'Gold':
                                                        echo '$74.50';
                                                        break;
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr class="border">
                                        <td colspan="5" class="text-center">No referrals found</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                            <tfoot class="border">
                                <tr>
                                    <th colspan="4" class="text-right">Total Monthly Income:</th>
                                    <td class="text-center">
                                        <?php
                                        $totalIncome = 0;
                                        foreach ($getTotalReferrals as $referral) {
                                            switch ($referral['type']) {
                                                case 'Basic':
                                                    $totalIncome += 9.50;
                                                    break;
                                                case 'Premium':
                                                    $totalIncome += 49.50;
                                                    break;
                                                case 'Gold':
                                                    $totalIncome += 74.50;
                                                    break;
                                            }
                                        }
                                        echo '$' . number_format($totalIncome, 2);
                                        ?>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>    
            </div>
        </div>
    </div>
</div>
