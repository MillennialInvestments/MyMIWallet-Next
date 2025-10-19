<!-- views/Marketing/BufferDashboard.php -->
<div class="container mt-4">
    <h3>🧠 Pending Content for Approval</h3>
    <div class="form-check mb-3">
        <div class="form-group mt-2">
            <label class="form-label">⏱ Interval</label>
            <select class="form-select form-select-sm schedule-interval" data-id="${item.id}">
                <option value="0">Manual</option>
                <option value="15">Every 15 mins</option>
                <option value="30">Every 30 mins</option>
                <option value="60">Every 1 hour</option>
                <option value="180">Every 3 hours</option>
                <option value="360">Every 6 hours</option>
            </select>
        </div>

    </div>
    <div id="bufferActionStatus" class="mt-2 small"></div>
    <div class="d-flex justify-content-between mb-3">
        <div>
            <a href="/API/Management/exportBufferPosts" class="btn btn-sm btn-outline-success">📤 Export CSV</a>
            <button class="btn btn-sm btn-outline-primary" onclick="loadBufferPage(currentPage)">🔄 Refresh</button>
        </div>
    </div>
    <table class="table table-striped" id="bufferTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Keyword</th>
                <th>Summary</th>
                <th>Score</th>
                <th>Tag Score</th>
                <th>Category</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="bufferTableBody">
            <!-- JavaScript will populate this section -->
        </tbody>
        <tfoot>
            <tr>
                <td colspan="8">
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <div id="paginationStatus">Loading...</div>
                        <div class="mt-2">
                            <a href="/API/Management/exportBufferPosts" class="btn btn-sm btn-outline-success">📤 Export</a>
                            <button class="btn btn-sm btn-outline-primary" onclick="loadBufferPage(currentPage)">🔄 Refresh</button>
                        </div>
                    </div>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
<!-- Schedule Post Modal -->
<div class="modal fade" id="schedulePostModal" tabindex="-1" aria-labelledby="schedulePostLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="schedulePostLabel">📅 Schedule Buffer Post</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="schedule-buffer-id">
        <label for="schedule-time">Select Time:</label>
        <input type="datetime-local" class="form-control" id="schedule-time">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-success" onclick="confirmSchedule()">✅ Schedule</button>
      </div>
    </div>
  </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
let currentPage = 1;
const platforms = (() => {
    try { return JSON.parse(item.platforms || '{}'); }
    catch (e) { return {}; }
})();

function loadBufferPage(page = 1) {
    const showOnlySuggested = document.getElementById('filterAutoSuggested').checked;

    fetch(`/API/Management/fetchBufferPaginated?page=${page}&limit=20&only_suggested=${showOnlySuggested ? 1 : 0}`)
        .then(res => res.json())
        .then(({ data, pagination }) => {
            const body = document.getElementById('bufferTableBody');
            body.innerHTML = "";

            data.forEach(item => {
                body.insertAdjacentHTML('beforeend', bufferRowTemplate(item)); // ✅ Use only this
            });

            document.getElementById("paginationStatus").textContent = 
              `Page ${pagination.page} of ${pagination.pages}`;

            bindPlatformToggles(); // ✅ Ensure toggles are re-bound after reload
        });
}

function approveBufferItem(id) {
    updateStatus(`⏳ Approving #${id}...`);
    fetch(`/API/Management/approveBufferItem/${id}`)
        .then(res => res.json())
        .then(data => {
            updateStatus(data.message || '✅ Approved.');
            loadBufferPage(currentPage);
        }).catch(err => {
            updateStatus(`❌ Error: ${err.message}`, true);
        });
}

function bindPlatformToggles() {
    document.querySelectorAll('.platform-toggle').forEach(input => {
        input.addEventListener('change', function () {
            const id = this.dataset.id;
            const platform = this.dataset.platform;
            const enabled = this.checked;

            fetch(`/API/Management/updatePlatformToggle/${id}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': '<?= csrf_hash() ?>'
                },
                body: JSON.stringify({ platform, enabled })
            }).then(res => res.json())
              .then(data => {
                  if (data.status !== 'success') {
                      alert('❌ Failed to update platform preference.');
                  }
              });
        });
    });
}

function bufferRowTemplate(item) {
    return `
    <tr>
        <td>${item.id}</td>
        <td>${item.keyword}</td>
        <td>${item.summary.slice(0, 100)}...</td>
        <td>${item.score}</td>
        <td>${item.tag_score}</td>
        <td>${item.category}</td>
        <td><span class="badge bg-warning">${item.status}</span></td>
        <td>
            <div class="form-check form-check-inline">
                <input class="form-check-input platform-toggle" type="checkbox"
                    data-id="${item.id}" data-platform="discord"
                    ${(function(p){try{p=JSON.parse(item.platforms);return p.discord;}catch(e){return false;}}()) ? 'checked' : ''}>
                <label class="form-check-label">🗨️</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input platform-toggle" type="checkbox"
                    data-id="${item.id}" data-platform="linkedin"
                    ${JSON.parse(item.platforms || '{}').linkedin ? 'checked' : ''}>
                <label class="form-check-label">💼</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input platform-toggle" type="checkbox"
                    data-id="${item.id}" data-platform="x"
                    ${JSON.parse(item.platforms || '{}').x ? 'checked' : ''}>
                <label class="form-check-label">🐦</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input platform-toggle" type="checkbox"
                    data-id="${item.id}" data-platform="email"
                    ${JSON.parse(item.platforms || '{}').email ? 'checked' : ''}>
                <label class="form-check-label">📩</label>
            </div>
            <div class="mt-2">
                <button class="btn btn-sm btn-success" onclick="approveBufferItem(${item.id})">✅</button>
                <button class="btn btn-sm btn-danger" onclick="rejectBufferItem(${item.id})">❌</button>
                <button class="btn btn-sm btn-primary" onclick="previewBufferItem(${item.id})">👁️</button>
            </div>
        </td>
    </tr>`;
}

async function confirmSchedule() {
    const id = document.getElementById('schedule-buffer-id').value;
    const datetime = document.getElementById('schedule-time').value;

    try {
        const response = await fetch(`/API/Management/scheduleApprovedPost/${id}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': '<?= csrf_hash() ?>'
            },
            body: JSON.stringify({ scheduled_at: datetime })
        });

        const result = await response.json();
        alert(result.message || '✅ Scheduled!');
        location.reload();
    } catch (e) {
        alert("❌ Scheduling failed.");
        console.error(e);
    }
}

function handleBufferResponse(data, id) {
    if (data.status === 'success') {
        updateStatus(`✅ ${data.message}`);
        document.querySelector(`#bufferTableBody tr td:first-child:contains(${id})`).parentElement.remove();
    } else {
        updateStatus(`❌ ${data.message}`, true);
    }
}

function openScheduleModal(id) {
    document.getElementById('schedule-buffer-id').value = id;
    document.getElementById('schedule-time').value = new Date().toISOString().slice(0,16);
    const modal = new bootstrap.Modal(document.getElementById('schedulePostModal'));
    modal.show();
}

function previewBufferItem(id) {
    dynamicModalLoader('Marketing', 'previewBufferItem', id);
}

function rejectBufferItem(id) {
    updateStatus(`⏳ Rejecting #${id}...`);
    fetch(`/API/Management/rejectBufferItem/${id}`)
        .then(res => res.json())
        .then(data => {
            updateStatus(data.message || '❌ Rejected.');
            loadBufferPage(currentPage);
        }).catch(err => {
            updateStatus(`❌ Error: ${err.message}`, true);
        });
}

function updateStatus(message, isError = false) {
    let el = document.getElementById('bufferActionStatus');
    if (!el) {
        el = document.createElement('div');
        el.id = 'bufferActionStatus';
        el.className = 'mt-2 small';
        document.querySelector('.container').prepend(el);
    }
    el.className = 'mt-2 small ' + (isError ? 'text-danger' : 'text-success');
    el.textContent = message;
}

document.addEventListener("DOMContentLoaded", () => {
    loadBufferPage(currentPage);
});

document.addEventListener("change", function(e) {
    if (e.target.classList.contains("schedule-interval")) {
        const id = e.target.dataset.id;
        const interval = parseInt(e.target.value);

        fetch(`/API/Marketing/updateBufferScheduleInterval/${id}`, {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-Requested-With": "XMLHttpRequest",
                "X-CSRF-TOKEN": "<?= csrf_hash() ?>"
            },
            body: JSON.stringify({ interval })
        }).then(res => res.json())
          .then(data => {
              if (data.status !== 'success') {
                  alert("❌ Failed to update schedule.");
              }
          });
    }
});

</script>
