<div class="nk-block">
        <div class="nk-content-body">
            <div class="row">
                <div class="col-12">
                    <div class="nk-block nk-block-lg">
                        <div class="card card-bordered pb-4 pricing px-2">
                            <div class="pricing-head">
                                <div class="pricing-title">
                                    <h4 class="card-title title"><?= $title ?></h4>
                                    <p class="sub-text"><?= $description ?></p>
                                </div>
                            </div>
                            <div class="pricing-body">
                                <a href="/email-templates/create">Create New Template</a>
                                <ul>
                                    <?php foreach ($templates as $template): ?>
                                        <li>
                                            <strong><?= $template['title'] ?></strong> - <?= $template['subject'] ?>
                                            <br>
                                            <?= $template['content'] ?>
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