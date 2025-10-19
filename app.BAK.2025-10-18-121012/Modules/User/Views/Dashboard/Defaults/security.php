<div class="nk-block">
    <div class="row gy-gs justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card card-bordered card-shadow h-100 border-danger">
                <div class="card-inner text-center">
                    <div class="alert alert-danger d-flex align-items-center mb-3" role="alert">
                        <em class="icon ni ni-alert-circle fs-2 text-danger me-2"></em>
                        <div>
                            <h5 class="title text-danger">Security Alert!</h5>
                            <p class="mt-2">
                                <?php if (isset($message) && !empty($message)): ?>
                                    <?= esc($message) ?>
                                <?php else: ?>
                                    Unauthorized access attempt detected. Please contact support if this is an error.
                                <?php endif; ?>
                            </p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="<?php echo site_url('/Support'); ?>" class="btn btn-danger">
                            <em class="icon ni ni-help-circle"></em> Contact Support
                        </a>
                        <a href="<?php echo site_url('/Dashboard'); ?>" class="btn btn-outline-secondary">
                            <em class="icon ni ni-home"></em> Back to Dashboard
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
