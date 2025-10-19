<div class="nk-block">
    <div class="nk-content-body">
        <div class="row">
            <div class="col-12">
                <div class="nk-block nk-block-lg">
                    <div class="card card-bordered pb-4 pricing px-2">
                        <div class="pricing-head">
                            <div class="pricing-title">
                                <h4 class="card-title title">Complete Your Onboarding</h4>
                                <p class="sub-text">You're almost set! Complete the steps below to fully activate your account.</p>
                            </div>
                        </div>
                        <div class="pricing-body">
                            <ul class="list-group">
                                <?php foreach ($incompleteSteps as $step): ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <?= ucfirst(str_replace('_', ' ', $step)) ?>
                                        <button class="btn btn-primary dynamicModalLoader"
                                                data-formtype="Onboarding"
                                                data-endpoint="completeStep"
                                                data-accountid="<?= $step ?>"
                                                data-category="">
                                            Complete Step
                                        </button>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>      
        </div>      
    </div>      
</div>      