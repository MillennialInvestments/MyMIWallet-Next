<?php 
if (empty($category)) {
    $category = $uri->getSegment(6);
}
if (empty($generatedData)) {
    log_message('debug', 'Generated data is empty in the view.');
}
?>
<div class="nk-block">
    <div class="row gy-gs">
        <div class="col-lg-12 col-xl-12">
            <div class="nk-block">
                <div class="nk-block-head-xs">
                    <div class="nk-block-head-content">
                        <h1 class="nk-block-title title">Generated Content for <?php echo ucfirst($category); ?></h1>
                        <a href="<?php echo site_url('/Management'); ?>">Back to Management Dashboard</a>
                    </div>
                </div>
            </div>
            <div class="nk-block">
                <div class="row">
                    <?php if (!empty($generatedData)): ?>
                        <?php foreach ($generatedData as $data): ?>
                            <?php if (is_array($data) && isset($data['title'], $data['content'])): // Ensure $data is an array with the expected keys ?>
                                <div class="col-lg-12">
                                    <div class="card card-bordered">
                                        <div class="card-inner">
                                            <h5 class="card-title"><?php echo $data['title']; ?></h5>
                                            <p class="card-text"><?php echo $data['content']; ?></p>
                                            <?php if (!empty($data['url'])): ?>
                                                <a href="<?php echo $data['url']; ?>" target="_blank" class="btn btn-primary">Read More</a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php else: // Log unexpected data type ?>
                                <?php log_message('error', 'Unexpected data structure or missing keys: ' . print_r($data, true)); ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="col-lg-12">
                            <div class="alert alert-warning">
                                <strong>No content generated.</strong> Please check the scraping and generation process.
                            </div>
                            <?php log_message('debug', 'No content generated. Please check the scraping and generation process.'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>
</div>
