<!-- app/Modules/Management/Views/Marketing/resources/controlPanelBlock.php -->
<div class="card card-bordered mb-4">
    <div class="card-inner">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h5 class="title mb-0">🛠️ Control Panel</h5>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="liveToggle">
                <label class="form-check-label" for="liveToggle">Live Mode</label>
            </div>
        </div>

        <div class="d-flex flex-wrap gap-2 justify-content-end mt-3">
            <button class="btn btn-success" id="generatePostBtn">📝 Generate New Post</button>
            <button class="btn btn-primary" onclick="generateTodaysStory()">📢 Generate Today’s Story</button>
            <button class="btn btn-outline-secondary" onclick="refreshDashboard()">🔄 Refresh Dashboard</button>
            <button class="btn btn-info" onclick="loadPendingSummaries()">🧪 Preview Summaries</button>
            <button class="btn btn-warning" onclick="triggerReprocessIncompleteEmails()">🛠️ Reprocess Emails</button>
            <a class="btn btn-warning" href="<?= site_url('API/Management/triggerBackfill'); ?>">
                🔁 Run Backfill for Incomplete Posts
            </a>
            <a href="<?= site_url('Management/Marketing/View-Grouped-Summaries') ?>" class="btn btn-outline-info">
                🧠 View Grouped Summaries
            </a>
            <a href="<?= site_url('API/Marketing/publishGroupedContentDraft') ?>" 
            class="btn btn-success"
            onclick="return confirm('Are you sure you want to publish today’s grouped digest now?');">
                    🚀 Publish Grouped Digest
            </a>
            <button class="btn btn-outline-dark" onclick="runKeywordBackfillBatch()">
                🔍 Retry Skipped Posts (Keyword Match)
            </button>
        </div>

        <div id="generate-post-status" class="mt-2 text-success small"></div>
        <div id="todays-story-status" class="mt-2 text-success small"></div>
    </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
function refreshDashboard() {
    location.reload();
}
</script>
<script <?= $nonce['script'] ?? '' ?>>
document.addEventListener("DOMContentLoaded", () => {
    const csrfToken = "<?= csrf_hash(); ?>";

    // ✅ Generate Today's Story
    const generateTodaysStory = async () => {
        const statusEl = document.getElementById('todays-story-status');
        statusEl.textContent = '⏳ Generating...';
        statusEl.classList.remove('text-danger', 'text-success');

        try {
            const response = await fetch("<?= site_url('API/Marketing/generateDailyContentDigest') ?>");
            const data = await response.json();

            if (data.status === 'success') {
                statusEl.textContent = '✅ ' + data.message;
                setTimeout(() => location.reload(), 1000);
            } else {
                statusEl.classList.add('text-danger');
                statusEl.textContent = '❌ ' + data.message;
            }
        } catch (error) {
            statusEl.classList.add('text-danger');
            statusEl.textContent = '❌ Error: ' + error.message;
        }
    };

    // ✅ Generate Marketing Post
    const generatePostBtn = document.getElementById("generatePostBtn");
    if (generatePostBtn) {
        generatePostBtn.addEventListener("click", async () => {
            const status = document.getElementById("generate-post-status");
            status.textContent = "⏳ Generating post...";
            status.classList.remove("text-danger", "text-success");

            try {
                const response = await fetch("<?= site_url('API/Marketing/generateContentFromScraper') ?>");
                const data = await response.json();

                if (data.status === "success") {
                    status.textContent = "✅ Post generated successfully!";
                    setTimeout(() => location.reload(), 1000);
                } else {
                    status.classList.add("text-danger");
                    status.textContent = "❌ " + data.message;
                }
            } catch (err) {
                console.error("❌ Error:", err);
                status.classList.add("text-danger");
                status.textContent = "❌ An error occurred.";
            }
        });
    }

    // ✅ Mass Resend Activation Emails
    window.massResendActivationEmails = async () => {
        const statusEl = document.getElementById("resend-status");
        statusEl.textContent = "⏳ Processing...";
        statusEl.classList.remove("text-danger", "text-success");

        try {
            const response = await fetch("<?= site_url('API/Marketing/massResendActivationEmails') ?>", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-TOKEN": csrfToken,
                },
                body: JSON.stringify({})
            });
            const data = await response.json();

            if (data.status === "success") {
                statusEl.classList.add("text-success");
                statusEl.textContent = "✅ " + data.message;
            } else {
                statusEl.classList.add("text-danger");
                statusEl.textContent = "❌ " + data.message;
            }
        } catch (err) {
            console.error(err);
            statusEl.classList.add("text-danger");
            statusEl.textContent = "❌ An error occurred.";
        }
    };

    // ✅ Reprocess Incomplete Emails
    window.triggerReprocessIncompleteEmails = async () => {
        if (!confirm("Reprocess up to 20 incomplete emails?")) return;

        try {
            const response = await fetch("<?= site_url('API/Marketing/reprocessIncompleteEmails') ?>");
            const data = await response.json();
            alert(data.message || "✅ Reprocessed successfully.");
        } catch (err) {
            alert("❌ Error: " + (err?.message || "Failed to reprocess."));
        }
    };

    // ✅ Expose global handler for 'Generate Today's Story'
    window.generateTodaysStory = generateTodaysStory;

    async function approveBufferItem(id) {
        updateStatus(`⏳ Approving #${id}...`);
        try {
            const response = await fetch(`<?= site_url('API/Management/approveBufferItem/') ?>${id}`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    'X-Requested-With': 'XMLHttpRequest',
                    "X-CSRF-TOKEN": csrfToken
                }
            });
            const data = await response.json();
            handleBufferResponse(data, id);
        } catch (err) {
            updateStatus(`❌ Error: ${err.message}`, true);
        }
    }

    window.runKeywordBackfillBatch = async () => {
        if (!confirm("Retry up to 10 skipped records using keyword match logic?")) return;

        const statusEl = document.getElementById("generate-post-status");
        statusEl.textContent = "⏳ Running keyword retry batch...";
        statusEl.classList.remove("text-danger", "text-success");

        try {
            const response = await fetch("<?= site_url('API/Management/runKeywordBackfillBatch') ?>");
            const data = await response.json();

            if (data.status === "success") {
                statusEl.classList.add("text-success");
                statusEl.textContent = `✅ ${data.results.success} regenerated, ${data.results.skipped} skipped, ${data.results.errors} errors.`;
                setTimeout(() => location.reload(), 2000);
            } else {
                statusEl.classList.add("text-danger");
                statusEl.textContent = "❌ " + (data.message || "Batch failed.");
            }
        } catch (err) {
            console.error("❌ Error running keyword retry:", err);
            statusEl.classList.add("text-danger");
            statusEl.textContent = "❌ " + (err?.message || "Unknown error");
        }
    };

    function exportBufferCSV() {
        window.open("<?= site_url('API/Management/exportBufferPosts') ?>", '_blank');
    }

    async function loadPendingSummaries() {
        const container = document.getElementById('pending-summaries-preview');
        container.innerHTML = '⏳ Loading...';

        try {
            const res = await fetch("<?= site_url('API/Marketing/previewPendingSummaries') ?>");
            const html = await res.text();
            container.innerHTML = html;
        } catch (err) {
            container.innerHTML = '❌ Failed to load previews.';
            console.error(err);
        }
    }

    async function rejectBufferItem(id) {
        updateStatus(`⏳ Rejecting #${id}...`);
        try {
            const response = await fetch(`<?= site_url('API/Management/rejectBufferItem/') ?>${id}`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    'X-Requested-With': 'XMLHttpRequest',
                    "X-CSRF-TOKEN": csrfToken
                }
            });
            const data = await response.json();
            handleBufferResponse(data, id);
        } catch (err) {
            updateStatus(`❌ Error: ${err.message}`, true);
        }
    }

    function updateStatus(message, isError = false) {
        const el = document.getElementById('bufferActionStatus');
        el.classList.remove('text-success', 'text-danger');
        el.classList.add(isError ? 'text-danger' : 'text-success');
        el.textContent = message;
    }

    function handleBufferResponse(data, id) {
        if (data.status === 'success') {
            updateStatus(`✅ ${data.message}`);
            document.querySelector(`#bufferTableBody tr td:first-child:contains(${id})`).parentElement.remove();
        } else {
            updateStatus(`❌ ${data.message}`, true);
        }
    }

    function refreshBufferTable() {
        location.reload(); // Optional: You can switch this to a fetch if desired
    }
});
</script>