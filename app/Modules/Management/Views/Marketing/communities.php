<div class="container-fluid">
    <div class="row mb-3">
        <div class="col">
            <h1 class="h3">Communities Hub</h1>
            <p class="text-muted mb-0">Manage platforms, communities, templates, and generated posts with safe-by-default drafts.</p>
        </div>
        <div class="col-auto">
            <button class="btn btn-primary" id="btn-generate-daily">Generate Posts From Today’s Top Summaries</button>
            <button class="btn btn-outline-secondary" id="btn-export-json">Export JSON</button>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-3">
                <div class="card-header">Platforms & Communities</div>
                <div class="card-body">
                    <div id="platform-list" class="mb-3 small text-muted">Loading platforms…</div>
                    <button class="btn btn-sm btn-outline-primary" id="btn-refresh-platforms">Refresh Platforms</button>
                    <div class="mt-3">
                        <h6>Funnel CTA Builder</h6>
                        <select id="cta-builder" class="form-control form-control-sm">
                            <option value="discord">Join Discord</option>
                            <option value="budget">Use Free Budget Tool</option>
                            <option value="membership">Upgrade Membership</option>
                            <option value="live">Watch Live Saturday</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card mb-3">
                <div class="card-header">Templates</div>
                <div class="card-body">
                    <div id="template-list" class="small text-muted">Select a platform to load templates.</div>
                    <button class="btn btn-sm btn-outline-success mt-2" id="btn-save-template">Save Template</button>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card mb-3">
                <div class="card-header">Generated Post Preview</div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="preview-tabs">
                        <li class="nav-item"><a class="nav-link active" data-platform="youtube" href="#">YouTube</a></li>
                        <li class="nav-item"><a class="nav-link" data-platform="tiktok" href="#">TikTok</a></li>
                        <li class="nav-item"><a class="nav-link" data-platform="twitch" href="#">Twitch</a></li>
                        <li class="nav-item"><a class="nav-link" data-platform="discord" href="#">Discord</a></li>
                        <li class="nav-item"><a class="nav-link" data-platform="facebook" href="#">Facebook</a></li>
                        <li class="nav-item"><a class="nav-link" data-platform="linkedin" href="#">LinkedIn</a></li>
                        <li class="nav-item"><a class="nav-link" data-platform="x" href="#">X</a></li>
                        <li class="nav-item"><a class="nav-link" data-platform="stocktwits" href="#">StockTwits</a></li>
                    </ul>
                    <div class="mt-3" id="preview-body">
                        <p class="text-muted">Run generation to view previews. Drafts remain stored server-side for approval.</p>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-sm btn-outline-primary">Copy</button>
                        <button class="btn btn-sm btn-outline-success">Mark Approved</button>
                        <button class="btn btn-sm btn-outline-warning">Send to Zapier</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">Actions</div>
                <div class="card-body">
                    <button class="btn btn-outline-primary mr-2" id="btn-generate-selected">Generate Posts From Selected Summary</button>
                    <button class="btn btn-outline-info mr-2" id="btn-mark-approved">Mark Approved</button>
                    <button class="btn btn-outline-secondary mr-2" id="btn-export">Export JSON</button>
                </div>
            </div>
        </div>
    </div>
</div>
