<div class="card card-bordered">
    <div class="card-inner">
        <h5 class="title mb-3">🧠 Scraped Content Management</h5>
        <table class="table table-striped" id="scrapedDataTable">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Links</th>
                    <th>URL</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>

<!-- 🔍 Preview Modal -->
<div class="modal fade" id="scrapePreviewModal" tabindex="-1" aria-labelledby="scrapePreviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Raw Content Preview</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalContentBody" style="white-space: pre-wrap;"></div>
        </div>
    </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
$(document).ready(function () {
    const table = $('#scrapedDataTable').DataTable();

    function truncateText(text, maxLength = 60) {
        if (!text) return '—';
        return text.length > maxLength ? text.substring(0, maxLength) + '...' : text;
    }

    function formatLinks(links) {
        if (!Array.isArray(links) || links.length === 0) return '—';

        let html = `
            <div class="dropdown">
                <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    View Links
                </button>
                <ul class="dropdown-menu">`;
        links.forEach(link => {
            html += `<li><a class="dropdown-item" href="${link.href}" target="_blank">${link.text || 'Unnamed'}</a></li>`;
        });
        html += '</ul></div>';
        return html;
    }

    function formatActions(id) {
        return `
            <div class="btn-group">
                <button class="btn btn-sm btn-success" onclick="generatePost('${id}')">Generate</button>
                <button class="btn btn-sm btn-info" onclick="previewRaw('${id}')">Preview</button>
                <button class="btn btn-sm btn-danger" onclick="deleteScrape('${id}')">Delete</button>
            </div>`;
    }

    // Fetch latest scrapes
    fetch("<?= site_url('Management/Marketing/getRecentScrapes'); ?>")
        .then(res => res.json())
        .then(data => {
            if (data.success && data.scrapes) {
                data.scrapes.forEach(item => {
                    const links = JSON.parse(item.links || '[]');
                    table.row.add([
                        item.title || 'No title',
                        truncateText(item.content, 60),
                        formatLinks(links),
                        `<a href="${item.url}" target="_blank">Open</a>`,
                        item.status || 'pending',
                        new Date(item.created_at).toLocaleString(),
                        formatActions(item.id)
                    ]).draw();
                });
            }
        });

    // Attach preview function
    window.previewRaw = function(id) {
        fetch(`<?= site_url('Management/Marketing/getScrapeDetails') ?>/${id}`)
            .then(res => res.json())
            .then(data => {
                if (data?.content) {
                    document.getElementById('modalContentBody').textContent = data.content;
                } else {
                    document.getElementById('modalContentBody').textContent = '⚠️ No content available or fetch failed.';
                }
                new bootstrap.Modal(document.getElementById('scrapePreviewModal')).show();
            })
            .catch(error => {
                console.error('Preview error:', error);
                document.getElementById('modalContentBody').textContent = '❌ Failed to load preview content.';
                new bootstrap.Modal(document.getElementById('scrapePreviewModal')).show();
            });
    };

    // Stub for generate (replace with actual logic)
    window.generatePost = function(id) {
        fetch(`<?= site_url('API/Marketing/generatePostsFromSummary') ?>/${id}`)
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    alert('✅ Post generated successfully.');
                    setTimeout(() => location.reload(), 500);
                } else {
                    alert(data.message || '⚠️ Post generation failed.');
                }
            })
            .catch(err => {
                console.error('❌ Post generation error:', err);
                alert('❌ Failed to generate post.');
            });
    };

    // Stub for deletion
    window.deleteScrape = function(id) {
        if (confirm('Are you sure you want to delete this scraped record?')) {
            fetch(`<?= site_url('Management/Marketing/deleteScrape') ?>/${id}`, { method: 'DELETE' })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        alert('✅ Scrape deleted');
                        location.reload();
                    } else {
                        alert('❌ Failed to delete scrape');
                    }
                });
        }
    };
});
</script>
