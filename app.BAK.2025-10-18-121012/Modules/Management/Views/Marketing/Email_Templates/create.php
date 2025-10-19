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
                            <form action="/email-templates/store" method="post">
                                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" required>
                                <br>
                                <label for="subject">Subject</label>
                                <input type="text" name="subject" id="subject" required>
                                <br>
                                <label for="content">Content</label>
                                <textarea id="summernote" name="content"></textarea>
                                <br>
                                <button type="submit">Save Template</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>      
        </div>      
    </div>      
</div>      
<script <?= $nonce['script'] ?? '' ?>>
    $('#summernote').summernote({
        placeholder: 'Hello Email Content',
        tabsize: 2,
        height: 100
    });
</script>