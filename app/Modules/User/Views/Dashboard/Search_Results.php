
<div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title page-title">Search Results</h3>
            <div class="nk-block-des text-soft">
                <p>Showing results for: <?= htmlentities($search_query); ?></p>
            </div>
        </div>
    </div>
</div><!-- .nk-block-head -->

<div class="nk-block">
    <div class="card card-bordered">
        <div class="card-inner-group">
            <?php if (!empty($results)): ?>
                <div class="card-inner p-0">
                    <div class="nk-tb-list nk-tb-ulist">
                        <div class="nk-tb-item nk-tb-head">
                            <div class="nk-tb-col"><span>Item</span></div>
                            <div class="nk-tb-col tb-col-md"><span>Description</span></div>
                            <div class="nk-tb-col tb-col-lg"><span>Date</span></div>
                            <div class="nk-tb-col tb-col-lg"><span>Category</span></div>
                        </div>
                        <?php foreach ($results as $item): ?>
                            <div class="nk-tb-item">
                                <div class="nk-tb-col">
                                    <span class="tb-lead"><a href="<?= site_url('details/' . $item['id']); ?>"><?= $item['title']; ?></a></span>
                                </div>
                                <div class="nk-tb-col tb-col-md">
                                    <span class="tb-sub"><?= $item['description']; ?></span>
                                </div>
                                <div class="nk-tb-col tb-col-lg">
                                    <span class="tb-sub"><?= date('F d, Y', strtotime($item['date'])); ?></span>
                                </div>
                                <div class="nk-tb-col tb-col-lg">
                                    <span class="tb-sub"><?= $item['category']; ?></span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php else: ?>
                <div class="card-inner text-center">
                    <em class="icon ni ni-alert-circle text-primary ni-3x"></em>
                    <p class="mt-3">No results found for your query.</p>
                </div>
            <?php endif; ?>
        </div><!-- .card-inner-group -->
    </div><!-- .card -->
</div><!-- .nk-block -->