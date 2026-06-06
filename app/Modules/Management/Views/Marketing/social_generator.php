<div class="container-fluid py-4">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title">Social Content Generator</h3>
            <p class="text-muted">Generate draft-only native content packs for all community platforms.</p>
        </div>
    </div>

    <div class="alert alert-info">
        All generated content is saved as draft-only. Nothing is posted externally.
    </div>

    <div class="card card-bordered mb-4">
        <div class="card-inner">
            <div class="form-group mb-3">
                <label>Topic</label>
                <textarea id="social-topic" class="form-control" rows="3">Build better financial habits with MyMI Wallet free tools</textarea>
            </div>

            <div class="row">
                <div class="col-md-4 mb-3">
                    <label>Audience</label>
                    <select id="social-audience" class="form-control">
                        <option value="beginner">Beginner</option>
                        <option value="advanced">Advanced</option>
                        <option value="business">Business</option>
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label>CTA</label>
                    <select id="social-cta" class="form-control">
                        <option value="join_discord">Join Discord</option>
                        <option value="free_tools">Free Tools</option>
                        <option value="membership">Membership</option>
                        <option value="website">Website</option>
                    </select>
                </div>

                <div class="col-md-4 mb-3 d-flex align-items-end">
                    <button class="btn btn-primary me-2" onclick="generateSocialPack(false)">Preview</button>
                    <button class="btn btn-success" onclick="generateSocialPack(true)">Generate + Save Drafts</button>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-bordered mb-4">
        <div class="card-inner">
            <h5>Generated Preview</h5>
            <pre id="social-generation-preview" class="bg-light p-3" style="max-height:420px; overflow:auto;">No preview yet.</pre>
        </div>
    </div>

    <div class="card card-bordered">
        <div class="card-inner">
            <h5>Latest Generated Posts</h5>
            <button class="btn btn-outline-primary mb-2" onclick="loadGeneratedPosts()">Refresh</button>
            <pre id="social-generated-posts" class="bg-light p-3" style="max-height:420px; overflow:auto;">Loading...</pre>
        </div>
    </div>
</div>

<script>
async function socialJson(url) {
    const res = await fetch(url);
    return await res.json();
}

async function generateSocialPack(save) {
    const topic = encodeURIComponent(document.getElementById('social-topic').value);
    const audience = encodeURIComponent(document.getElementById('social-audience').value);
    const cta = encodeURIComponent(document.getElementById('social-cta').value);

    const data = await socialJson('<?= site_url('API/Management/generateSocialContentPack') ?>?topic=' + topic + '&audience=' + audience + '&cta_type=' + cta + '&save=' + (save ? '1' : '0'));
    document.getElementById('social-generation-preview').textContent = JSON.stringify(data, null, 2);

    if (save) {
        loadGeneratedPosts();
    }
}

async function loadGeneratedPosts() {
    const data = await socialJson('<?= site_url('API/Management/getGeneratedSocialPosts') ?>');
    document.getElementById('social-generated-posts').textContent = JSON.stringify(data, null, 2);
}

document.addEventListener('DOMContentLoaded', loadGeneratedPosts);
</script>
