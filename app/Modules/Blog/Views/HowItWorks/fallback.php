<section class="section section-lg">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h1 class="mb-3"><?= esc($title ?? 'How It Works') ?></h1>
                <p class="lead text-muted">
                    We are updating this page right now. Please check back soon.
                </p>
                <p class="text-muted mb-4">
                    Requested topic: <strong><?= esc($slug ?? 'overview') ?></strong>
                </p>
                <a class="btn btn-primary" href="<?= site_url('How-It-Works') ?>">Back to How It Works</a>
            </div>
        </div>
    </div>
</section>
