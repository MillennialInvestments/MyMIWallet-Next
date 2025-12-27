<div class="container py-4">
    <h2>Tax Configuration</h2>
    <p class="text-muted">Manage templates, jurisdictions, rates, and audit history.</p>

    <div class="row g-3">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="text-muted small">Templates</div>
                    <div class="display-6"><?= esc($templateCount); ?></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="text-muted small">Jurisdictions</div>
                    <div class="display-6"><?= esc($jurisdictionCount); ?></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="text-muted small">Rates</div>
                    <div class="display-6"><?= esc($rateCount); ?></div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <a href="/Admin/Tax/Templates" class="btn btn-primary me-2">Templates</a>
        <a href="/Admin/Tax/Jurisdictions" class="btn btn-secondary me-2">Jurisdictions</a>
        <a href="/Admin/Tax/Rates" class="btn btn-secondary">Rates</a>
    </div>
</div>
