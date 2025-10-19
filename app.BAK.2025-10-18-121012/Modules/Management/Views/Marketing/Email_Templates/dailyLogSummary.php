<div class="nk-block">
    <div class="row gy-gs">
        <div class="col-lg-12 col-xl-12">
            <div class="nk-block">
                <div class="nk-block-head-xs">
                    <div class="nk-block-head-content">
                        <h1 class="nk-block-title title">Daily Market Wrap-Up</h1>
                        <p>Your daily insights and updates from MyMI Wallet.</p>
                    </div>
                </div>
            </div>
            <div class="nk-block">
                <div class="row">
                    <?php if ($content['type'] === 'logs'): ?>
                        <!-- Loop through logs -->
                        <?php foreach ($content['data'] as $log): ?>
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"><?= esc($log['title']) ?></h4>
                                </div>
                                <div class="card-body">
                                    <p><?= esc(substr(strip_tags($log['content']), 0, 200)) ?>...</p>
                                    <?php if (!empty($log['url'])): ?>
                                        <a href="<?= esc($log['url']) ?>" class="btn btn-primary">Read More</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <!-- Fallback Content -->
                        <div class="col-12">
                            <h3>Automated Insights</h3>
                            <p>The following content was dynamically generated based on your recent activities:</p>
                            <?php foreach ($content['data'] as $generated): ?>
                                <?php
                                // Retrieve blog URL
                                $blog = $this->marketingModel->getBlogPostByTitle($generated['title']);
                                $generated['url'] = $blog ? base_url('Blog/Post/' . $blog->slug) : null;
                                ?>
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h4 class="card-title"><?= esc($generated['title']) ?></h4>
                                    </div>
                                    <div class="card-body">
                                        <p><?= esc(substr(strip_tags($generated['summary']), 0, 200)) ?>...</p>
                                        <?php if (!empty($generated['url'])): ?>
                                            <a href="<?= esc($generated['url']) ?>" class="btn btn-sm btn-primary">Learn More</a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
