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
                            <form action="/email-queue/store" method="post">
                                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" required>
                                <br>
                                <label for="template_id">Template</label>
                                <select name="template_id" id="template_id" required>
                                    <?php foreach ($templates as $template): ?>
                                        <option value="<?= $template['id'] ?>"><?= $template['title'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <br>
                                <button type="submit">Add to Queue</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>      
        </div>      
    </div>      
</div>      