(function () {
  const root = document.getElementById('propfirms-dashboard');
  if (!root) return;

  const refreshButton = document.getElementById('reload-prop-notifications');
  const list = document.getElementById('prop-notification-list');

  const bindReadButtons = () => {
    document.querySelectorAll('.prop-mark-read').forEach((button) => {
      button.addEventListener('click', async () => {
        const id = button.getAttribute('data-id');
        if (!id) return;

        await fetch(`/PropFirms/Notifications/${id}/read`, { method: 'POST', headers: { 'X-Requested-With': 'XMLHttpRequest' } });
        const wrapper = button.closest('[data-note-id]');
        if (wrapper) wrapper.classList.remove('prop-note-unread');
        button.remove();
      });
    });
  };

  const refreshNotifications = async () => {
    if (!list) return;
    const response = await fetch('/PropFirms/Notifications', { headers: { 'Accept': 'application/json' } });
    const payload = await response.json();
    const rows = Array.isArray(payload.data) ? payload.data : [];

    list.innerHTML = rows.length
      ? rows.map((row) => `
        <div class="border rounded p-2 mb-2 ${row.read_at ? '' : 'prop-note-unread'}" data-note-id="${row.id}">
          <div class="d-flex justify-content-between align-items-start">
            <div>
              <div><strong>${row.subject ?? 'Notification'}</strong></div>
              <div class="small text-muted">${row.body ?? ''}</div>
            </div>
            ${row.read_at ? '' : `<button class="btn btn-sm btn-link prop-mark-read" data-id="${row.id}">Mark read</button>`}
          </div>
        </div>`).join('')
      : '<p class="text-muted mb-0">No notifications available.</p>';

    bindReadButtons();
  };

  if (refreshButton) {
    refreshButton.addEventListener('click', refreshNotifications);
  }

  bindReadButtons();
})();
