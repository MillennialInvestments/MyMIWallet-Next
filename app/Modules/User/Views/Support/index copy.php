<div class="nk-block">
    <div class="gy-gs row">
        <div class="col-md-12 my-0">
            <div class="nk-content nk-content-fluid pt-0">
                <div class="nk-content-inner">
                    <div class="nk-content-body pt-0">
                        <div class="content-page">
                            <?php echo view('Knowledgebase/includes/navigation'); ?>
                            <hr class="py-3">
                            <div class="row g-gs">
                                <div class="col-12 col-md-5 col-xxl-4">
                                    <?php  echo view('Support/Request'); ?>
                                </div>
                                <div class="col-12 col-md-7 col-xxl-8">
                                    <?php echo view('Support/FAQs'); ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row g-gs pt-5">
                                <div class="col-xl-12">
                                    <div class="nk-block-head nk-block-head-lg wide-md">
                                        <div class="nk-block-head-content">
                                            <div class="nk-block-head-sub"><span>Guides &amp; Tutorials</span></div>
                                            <h2 class="nk-block-title fw-normal">Suggested Tutorials</h2>
                                            <div class="nk-block-des">
                                                <p class="lead"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-inner p-0">
                                            <div class="nk-block-content">
                                                <?php echo view('Knowledgebase/Tutorials'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .content-page -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>