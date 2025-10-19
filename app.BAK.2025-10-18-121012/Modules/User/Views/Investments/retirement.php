<a class="btn btn-primary" href="<?= site_url('/Investments') ?>"><em class="icon ni ni-arrow-left"></em> Back to Investments</a>
<div class="nk-block">
    <div class="row g-gs">
        <!-- Account Overview Section -->
        <div class="col-md-12 col-lg-6">
            <div class="card card-bordered">
                <div class="card-inner">
                    <h6 class="title">Account Overview</h6>
                    <p class="sub-title">Balance (as of <?= date('M d, Y'); ?>):</p>
                    <div class="text-center my-3">
                        <div class="value positive" id="balance">
                            <strong><?= number_format($accountData['balance'] ?? 0, 2); ?></strong>
                        </div>
                    </div>
                    <div class="row performance-group">
                        <div class="col-6">
                            <div class="rs-heading2-text">Vested Balance</div>
                        </div>
                        <div class="col-6 text-right">
                            <div class="font-size-medium">
                                <?= number_format($accountData['vestedBalance'] ?? 0, 2); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row performance-group">
                        <div class="col-6">
                            <div class="rs-heading2-text">Loan Balance</div>
                        </div>
                        <div class="col-6 text-right">
                            <div class="font-size-medium">
                                <?= number_format($accountData['loanBalance'] ?? 0, 2); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Performance Section -->
        <div class="col-md-12 col-lg-6">
            <div class="card card-bordered">
                <div class="card-inner">
                    <h6 class="title">Performance</h6>
                    <p class="sub-title">(<?= date('M d, Y', strtotime('-1 year')); ?> - <?= date('M d, Y'); ?>)</p>
                    <div class="text-center my-3">
                        <div class="value positive" id="performance">
                            <i class="fa fa-arrow-up"></i>
                            <span><?= $accountData['performance']['total'] ?? 'N/A'; ?>%</span>
                        </div>
                    </div>
                    <div class="row performance-group">
                        <div class="col-6">Quarter</div>
                        <div class="col-6 text-right">
                            <span class="positive">
                                <i class="fa fa-arrow-up"></i>
                                <?= $accountData['performance']['quarter'] ?? 'N/A'; ?>%
                            </span>
                        </div>
                    </div>
                    <div class="row performance-group">
                        <div class="col-6">One Year</div>
                        <div class="col-6 text-right">
                            <span class="positive">
                                <i class="fa fa-arrow-up"></i>
                                <?= $accountData['performance']['oneYear'] ?? 'N/A'; ?>%
                            </span>
                        </div>
                    </div>
                    <div class="row performance-group">
                        <div class="col-6">Three Years</div>
                        <div class="col-6 text-right">
                            <span class="positive">
                                <i class="fa fa-arrow-up"></i>
                                <?= $accountData['performance']['threeYears'] ?? 'N/A'; ?>%
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="nk-block">
    <div class="row g-gs">
        <!-- Estimated Total Savings -->
        <div class="col-md-12 col-lg-4">
            <div class="card card-bordered">
                <div class="card-inner text-center">
                    <h6 class="title">Estimated Total Savings</h6>
                    <div class="mt-3">
                        <strong class="display-4 text-success">
                            <?= number_format($retirementData['totalSavings'] ?? 0, 2); ?>
                        </strong>
                    </div>
                </div>
            </div>
        </div>

        <!-- Your Goal -->
        <div class="col-md-12 col-lg-4">
            <div class="card card-bordered">
                <div class="card-inner text-center">
                    <h6 class="title">Your Goal</h6>
                    <div class="mt-3">
                        <strong class="display-4 text-info">
                            <?= number_format($retirementData['goalSavings'] ?? 0, 2); ?>
                        </strong>
                    </div>
                </div>
            </div>
        </div>

        <!-- Readiness Score -->
        <div class="col-md-12 col-lg-4">
            <div class="card card-bordered">
                <div class="card-inner text-center">
                    <h6 class="title">Readiness Score</h6>
                    <div class="mt-3">
                        <strong class="display-4 <?= $retirementData['readinessScore'] >= 100 ? 'text-success' : 'text-warning'; ?>">
                            <?= $retirementData['readinessScore'] ?? 0; ?>                            
                            <span class="badge badge-<?= $retirementData['readinessScore'] >= 100 ? 'success' : 'warning'; ?>">
                                <?= $retirementData['readinessStatus'] ?? 'N/A'; ?>
                            </span>
                        </strong>
                    </div>
                </div>
            </div>
        </div>

        <!-- Message Section -->
        <!-- <div class="col-md-12 col-lg-4">
            <div class="card card-bordered">
                <div class="card-inner">
                    <p class="text-center">
                        <?= $retirementData['readinessMessage'] ?? 'No message available'; ?>
                    </p>
                    <div class="text-center mt-3">
                        <a href="<?= site_url('/Retirement/UpdateProfile'); ?>" class="btn btn-primary">Update your Retirement Profile</a>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- Disclaimer Section -->
        <!-- <div class="col-md-12 col-lg-12">
            <div class="card card-bordered">
                <div class="card-inner">
                    <p class="text-muted small">
                        Retirement Readiness shouldn't be the sole basis for retirement planning. Estimates are hypothetical, 
                        don't reflect actual investment results, and aren't guarantees of future results. Potential savings results vary 
                        with each use and over time. 
                        <a href="<?= site_url('/Retirement/ReadMore'); ?>">Read more</a>
                    </p>
                </div>
            </div>
        </div> -->
    </div>
</div>


<script <?= $nonce['script'] ?? '' ?>>
    document.getElementById('retirement-goals-form').addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(this);
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        fetch('<?= site_url('/Investments/saveRetirementPlan') ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                "X-CSRF-TOKEN": csrfToken, // Include the CSRF token in the headers
            },
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                alert('Retirement goals saved successfully!');
                location.reload();
            } else {
                alert('Failed to save goals: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error saving retirement goals:', error);
        });
    });
</script>
