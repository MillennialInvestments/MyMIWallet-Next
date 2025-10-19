<!-- views/Marketing/GeneratedPostsDashboard.php -->
<div class="container mt-4">
    <h3>📢 Generated Posts Dashboard</h3>

    <div id="postActionStatus" class="mt-2 small"></div>

    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Platform</th>
                <th>Scheduled</th>
                <th>Status</th>
                <th>Preview</th>
                <th>Score</th>
                <th>Insights</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="generatedPostsBody">
            <!-- JS Populated -->
        </tbody>
    </table>

    <div class="d-flex justify-content-between align-items-center mt-3">
        <div id="postPaginationStatus">Loading...</div>
        <div>
            <button class="btn btn-sm btn-outline-primary" onclick="loadGeneratedPosts(currentPostPage - 1)">⬅️ Prev</button>
            <button class="btn btn-sm btn-outline-primary" onclick="loadGeneratedPosts(currentPostPage + 1)">Next ➡️</button>
        </div>
    </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
let currentPostPage = 1;

function loadGeneratedPosts(page = 1) {
    fetch(`/API/Management/getGeneratedPostsPaginated?page=${page}&limit=20`)
        .then(res => res.json())
        .then(({ data, pagination }) => {
            const body = document.getElementById('generatedPostsBody');
            body.innerHTML = "";

            data.forEach(post => {
                body.insertAdjacentHTML('beforeend', `
                    <tr>
                        <td>${post.id}</td>
                        <td>${post.platform}</td>
                        <td>${post.scheduled_at || '-'}</td>
                        <td><span class="badge bg-${getStatusColor(post.status)}">${post.status}</span></td>
                        <td>${post.preview_headline || '—'}</td>
                        <td>${post.score || '0.0'}</td>
                        <td>${post.insight_tags ? post.insight_tags.split(',').slice(0, 3).join(', ') : '—'}</td>
                        <td>
                            <button class="btn btn-sm btn-outline-primary" onclick="sharePost(${post.id}, '${post.platform}')">🚀 Share</button>
                            <button class="btn btn-sm btn-outline-secondary" onclick="schedulePost(${post.id})">📅 Schedule</button>
                        </td>
                    </tr>
                `);
            });

            document.getElementById("postPaginationStatus").textContent =
                `Page ${pagination.page} of ${pagination.pages}`;
        });
}

function getStatusColor(status) {
    return {
        'pending': 'warning',
        'scheduled': 'info',
        'posted': 'success'
    }[status] || 'secondary';
}

function sharePost(id, platform) {
    fetch(`/API/Management/sharePost/${id}/${platform}`)
        .then(res => res.json())
        .then(data => {
            alert(data.message || "✅ Shared!");
            loadGeneratedPosts(currentPostPage);
        });
}

function schedulePost(id) {
    const datetime = prompt("Enter schedule time (YYYY-MM-DD HH:MM:SS):");
    if (!datetime) return;

    fetch(`/API/Management/updatePostSchedule/${id}`, {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-TOKEN": "<?= csrf_hash() ?>"
        },
        body: JSON.stringify({ scheduled_at: datetime })
    }).then(res => res.json())
      .then(data => {
          alert(data.message || '✅ Scheduled');
          loadGeneratedPosts(currentPostPage);
      });
}

document.addEventListener("DOMContentLoaded", () => {
    loadGeneratedPosts();
});
</script>
