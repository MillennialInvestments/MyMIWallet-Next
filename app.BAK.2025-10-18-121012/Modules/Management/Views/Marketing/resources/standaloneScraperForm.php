<!-- Scraper Form + Modal + Actions -->
<form class="form-horizontal" id="standaloneScraperForm">
    <div class="form-group row">
        <div class="col-7">
            <input class="form-control" id="url" name="url" value="" placeholder="Enter A Link" required>
        </div>
        <div class="col-3">
            <input class="btn btn-success btn-md" id="addCampaignSubmit" name="submit" value="Add" type="submit">
        </div>
        <div class="col-2">
            <a href="<?= site_url('/Marketing/Campaigns/Add'); ?>" class="btn btn-primary btn-md">
                <em class="icon ni ni-setting"></em>
                <span>Manage</span>
            </a>
        </div>
    </div>
</form>

<!-- 🧪 Preview Modal -->
<div class="modal fade" id="scrapePreviewModal" tabindex="-1" aria-labelledby="scrapePreviewLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="scrapePreviewLabel">Preview Scraped Content</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="modalContentBody" style="white-space: pre-wrap;"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('standaloneScraperForm');
    const csrfName = '<?= csrf_token() ?>';
    const csrfHash = '<?= csrf_hash() ?>';

    if (!form) return;

    form.addEventListener('submit', function (event) {
        event.preventDefault();

        const url = document.getElementById('url')?.value;
        if (!url) return alert('Please enter a valid URL.');

        const csrfName = '<?= csrf_token() ?>';
        const csrfHash = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

        const submitBtn = document.getElementById('addCampaignSubmit');
        submitBtn.disabled = true;
        submitBtn.value = 'Scraping...';

        fetch('<?= site_url('Management/Marketing/Scrape-Link') ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                url: url,
                [csrfName]: csrfHash
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('✅ Scraped and stored successfully!');

                // ✅ Refresh CSRF token in <meta> tag (if new one was sent)
                if (data.csrfHash) {
                    document.querySelector('meta[name="csrf-token"]').setAttribute('content', data.csrfHash);
                }

                setTimeout(() => location.reload(), 800);
            } else {
                alert(data.message || '⚠️ Scraping failed.');

                // Optional: refresh CSRF hash on failure too
                if (data.csrfHash) {
                    document.querySelector('meta[name="csrf-token"]').setAttribute('content', data.csrfHash);
                }

                submitBtn.disabled = false;
                submitBtn.value = 'Add';
            }
        })
        .catch(error => {
            console.error('❌ Scrape Error:', error);
            alert('Something went wrong.');
            submitBtn.disabled = false;
            submitBtn.value = 'Add';
        });
    }, { once: true });

});

function generatePost(id) {
    fetch(`<?= site_url('Management/Marketing/generatePostsFromSummary') ?>/${id}`)
        .then(res => res.json())
        .then(data => {
            alert(data.message || '✅ Content generated.');
            setTimeout(() => location.reload(), 500);
        })
        .catch(err => alert('❌ Failed to generate post.'));
}

function previewRaw(id) {
    fetch(`<?= site_url('Management/Marketing/getScrapeDetails') ?>/${id}`)
        .then(res => res.json())
        .then(data => {
            document.getElementById('modalContentBody').textContent = data.content || 'No content found.';
            new bootstrap.Modal(document.getElementById('scrapePreviewModal')).show();
        });
}

function deleteScrape(id) {
    if (!confirm('Are you sure you want to delete this scrape?')) return;
    fetch(`<?= site_url('Management/Marketing/deleteScrape') ?>/${id}`, {
        method: 'DELETE'
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            alert('🗑️ Scrape deleted.');
            setTimeout(() => location.reload(), 500);
        } else {
            alert('❌ Could not delete scrape.');
        }
    });
}
</script>
