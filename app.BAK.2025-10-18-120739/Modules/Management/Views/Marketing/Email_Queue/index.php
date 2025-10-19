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
                            <a href="/email-queue/create">Add Email to Queue</a>
                            <ul>
                                <?php foreach ($emails as $email): ?>
                                    <li>
                                        <strong><?= $email['email'] ?></strong> - <?= $email['subject'] ?>
                                        <br>
                                        <?= $email['content'] ?>
                                        <br>
                                        Status: <?= $email['status'] ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                            <form action="/email-queue/processQueue" method="post">
                                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

                                <button type="submit">Process Queue</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>      
        </div>      
    </div>      
</div>      