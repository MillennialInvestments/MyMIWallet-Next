<div class="container py-4">
    <div class="row">
        <div class="col-md-3 mb-3">
            <h5 class="mb-3">How It Works</h5>
            <?= view('App\Modules\Blog\Views\HowItWorks\partials\navigation', ['currentSlug' => $slug ?? null]) ?>
        </div>
        <div class="col-md-9">
            <h1 class="mb-4"><?= esc($title); ?></h1>
            <article class="how-it-works-content">
                <?= $contentHtml; ?>
            </article>
        </div>
    </div>
</div>
