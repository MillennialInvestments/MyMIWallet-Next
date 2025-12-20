(function () {
    const root = document.getElementById('projectControlCenterRoot');
    if (!root) return;

    const endpoints = {
        listUrl: root.dataset.listUrl,
        upsertUrl: root.dataset.upsertUrl,
        detailUrl: root.dataset.detailUrl,
        updateStatusUrl: root.dataset.updateStatusUrl,
        updateNotesUrl: root.dataset.updateNotesUrl,
        exportCsvUrl: root.dataset.exportCsvUrl,
        exportJsonUrl: root.dataset.exportJsonUrl,
        importUrl: root.dataset.importUrl,
    };

    const csrf = window.CSRF_TOKEN || {};
    const csrfHeaderName = csrf.name || 'X-CSRF-TOKEN';
    const csrfHeaderValue = csrf.hash || document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

    const filterProject = document.getElementById('pccFilterProject');
    const filterStatus = document.getElementById('pccFilterStatus');
    const filterCategory = document.getElementById('pccFilterCategory');
    const filterSearch = document.getElementById('pccFilterSearch');
    const blockedToggle = document.getElementById('pccBlockedToggle');
    const liveToggle = document.getElementById('pccLiveModeToggle');

    const upsertModalEl = document.getElementById('pccUpsertModal');
    const detailModalEl = document.getElementById('pccDetailModal');
    const importModalEl = document.getElementById('pccImportModal');

    const upsertModal = upsertModalEl ? new bootstrap.Modal(upsertModalEl) : null;
    const detailModal = detailModalEl ? new bootstrap.Modal(detailModalEl) : null;
    const importModal = importModalEl ? new bootstrap.Modal(importModalEl) : null;

    let liveInterval = null;

    const statusBadgeClass = (status) => {
        switch ((status || '').toLowerCase()) {
            case 'completed':
                return 'badge bg-success';
            case 'blocked':
                return 'badge bg-danger';
            case 'planned':
                return 'badge bg-info';
            case 'deprecated':
                return 'badge bg-secondary';
            default:
                return 'badge bg-primary';
        }
    };

    const escapeHtml = (str) => {
        const div = document.createElement('div');
        div.innerText = str ?? '';
        return div.innerHTML;
    };

    const buildQuery = () => {
        const params = new URLSearchParams();
        if (filterProject?.value) params.set('project_name', filterProject.value.trim());
        if (blockedToggle?.checked) {
            params.set('status', 'Blocked');
        } else if (filterStatus?.value) {
            params.set('status', filterStatus.value);
        }
        if (filterCategory?.value) params.set('category', filterCategory.value.trim());
        if (filterSearch?.value) params.set('search[value]', filterSearch.value.trim());
        return params;
    };

    const table = $('#projectControlTable').DataTable({
        processing: true,
        serverSide: true,
        searching: false,
        ajax: function (data, callback) {
            const params = buildQuery();
            params.set('draw', data.draw);
            params.set('start', data.start);
            params.set('length', data.length);
            params.set('search[value]', filterSearch?.value || '');

            fetch(`${endpoints.listUrl}?${params.toString()}`, {
                headers: { Accept: 'application/json' },
            })
                .then((res) => res.json())
                .then((json) => callback(json))
                .catch(() => callback({ data: [], recordsTotal: 0, recordsFiltered: 0 }));
        },
        columns: [
            { data: 'id' },
            { data: 'project_name', render: (data) => escapeHtml(data) },
            {
                data: 'category',
                render: (_, __, row) => {
                    const parts = [row.category, row.subcategory].filter(Boolean).map(escapeHtml);
                    return parts.join(' / ');
                },
            },
            { data: 'component', render: (data) => `<strong>${escapeHtml(data)}</strong>` },
            {
                data: 'status',
                render: (data) => `<span class="${statusBadgeClass(data)}">${escapeHtml(data)}</span>`,
                orderable: false,
            },
            {
                data: 'updated_at',
                render: (data) => (data ? new Date(data).toLocaleString() : ''),
            },
            {
                data: 'id',
                orderable: false,
                render: (data) => `
                    <div class="btn-group" role="group">
                        <button class="btn btn-sm btn-outline-primary pcc-view" data-id="${data}">View</button>
                        <button class="btn btn-sm btn-outline-secondary pcc-edit" data-id="${data}">Edit</button>
                        <button class="btn btn-sm btn-success pcc-status" data-status="Completed" data-id="${data}">Mark Completed</button>
                        <button class="btn btn-sm btn-danger pcc-status" data-status="Blocked" data-id="${data}">Mark Blocked</button>
                    </div>
                `,
            },
        ],
    });

    const reloadTable = () => table.ajax.reload(null, false);

    const startLive = () => {
        if (liveInterval) return;
        liveInterval = setInterval(reloadTable, 30000);
    };

    const stopLive = () => {
        if (liveInterval) {
            clearInterval(liveInterval);
            liveInterval = null;
        }
    };

    liveToggle?.addEventListener('change', (event) => {
        if (event.target.checked) {
            startLive();
        } else {
            stopLive();
        }
    });

    [filterProject, filterStatus, filterCategory, filterSearch, blockedToggle].forEach((el) => {
        el?.addEventListener('change', reloadTable);
        if (el?.tagName === 'INPUT') {
            el.addEventListener('keyup', (evt) => {
                if (evt.key === 'Enter') reloadTable();
            });
        }
    });

    document.getElementById('pccRefreshBtn')?.addEventListener('click', reloadTable);

    const openUpsertModal = (record) => {
        document.getElementById('pccUpsertTitle').innerText = record?.id ? 'Edit Item' : 'Add Item';
        document.getElementById('pccUpsertId').value = record?.id || '';
        document.getElementById('pccProjectName').value = record?.project_name || '';
        document.getElementById('pccComponent').value = record?.component || '';
        document.getElementById('pccCategory').value = record?.category || '';
        document.getElementById('pccSubcategory').value = record?.subcategory || '';
        document.getElementById('pccStatus').value = record?.status || 'Active';
        document.getElementById('pccDescription').value = record?.description || '';
        document.getElementById('pccPrimaryFiles').value = record?.primary_files || '';
        document.getElementById('pccNotes').value = record?.notes || '';
        document.getElementById('pccTagsJson').value = record?.tags_json || '';
        upsertModal?.show();
    };

    document.getElementById('pccAddItemBtn')?.addEventListener('click', () => openUpsertModal(null));

    document.getElementById('pccSaveBtn')?.addEventListener('click', () => {
        const form = document.getElementById('pccUpsertForm');
        const formData = new FormData(form);
        const payload = Object.fromEntries(formData.entries());

        if (!payload.project_name || !payload.component) {
            alert('Project name and component are required.');
            return;
        }

        fetch(endpoints.upsertUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                Accept: 'application/json',
                [csrfHeaderName]: csrfHeaderValue,
            },
            body: JSON.stringify(payload),
        })
            .then((res) => res.json())
            .then((json) => {
                if (json.status === 'success') {
                    upsertModal?.hide();
                    reloadTable();
                } else {
                    alert(json.message || 'Unable to save item.');
                }
            })
            .catch(() => alert('Unable to save item right now.'));
    });

    const renderDetail = (record) => {
        const body = document.getElementById('pccDetailBody');
        if (!body) return;

        body.innerHTML = `
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div>
                    <h4 class="mb-1">${escapeHtml(record.component)}</h4>
                    <div class="text-soft small">${escapeHtml(record.project_name)} • ${escapeHtml(record.category || '')}</div>
                </div>
                <span class="${statusBadgeClass(record.status)}">${escapeHtml(record.status)}</span>
            </div>
            <div class="mb-2"><strong>Subcategory:</strong> ${escapeHtml(record.subcategory || '')}</div>
            <div class="mb-2"><strong>Description:</strong><br>${escapeHtml(record.description || '')}</div>
            <div class="mb-2"><strong>Primary Files:</strong> ${escapeHtml(record.primary_files || '')} <button class="btn btn-xs btn-outline-secondary ms-2 pcc-copy" data-text="${escapeHtml(record.primary_files || '')}">Copy</button></div>
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select class="form-select" id="pccDetailStatus" data-id="${record.id}">
                    ${['Active','Planned','Blocked','Deprecated','Completed'].map((s) => `<option value="${s}" ${record.status === s ? 'selected' : ''}>${s}</option>`).join('')}
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Notes</label>
                <textarea class="form-control" rows="3" id="pccDetailNotes" data-id="${record.id}">${record.notes || ''}</textarea>
                <div class="d-flex justify-content-between mt-2">
                    <button class="btn btn-outline-secondary btn-sm pcc-copy" data-text="${escapeHtml(record.notes || '')}">Copy Notes</button>
                    <button class="btn btn-primary btn-sm" id="pccDetailSaveNotes">Save Notes</button>
                </div>
            </div>
            <div class="alert alert-soft mb-0">
                <div><strong>Source:</strong> ${escapeHtml(record.source_type || '')}</div>
                <div><strong>Updated:</strong> ${record.updated_at ? new Date(record.updated_at).toLocaleString() : ''}</div>
            </div>
        `;

        document.getElementById('pccDetailStatus')?.addEventListener('change', (event) => {
            const status = event.target.value;
            updateStatus(record.id, status, () => {
                const badge = document.querySelector('#pccDetailModal .badge');
                if (badge) {
                    badge.className = statusBadgeClass(status);
                    badge.textContent = status;
                }
            });
        });

        document.getElementById('pccDetailSaveNotes')?.addEventListener('click', () => {
            const notes = document.getElementById('pccDetailNotes').value;
            updateNotes(record.id, notes);
        });

        body.querySelectorAll('.pcc-copy').forEach((btn) => {
            btn.addEventListener('click', () => {
                const text = btn.getAttribute('data-text') || '';
                navigator.clipboard?.writeText(text.replace(/&amp;/g, '&'))?.then(() => {
                    btn.classList.add('btn-success');
                    setTimeout(() => btn.classList.remove('btn-success'), 800);
                });
            });
        });
    };

    const fetchDetail = (id) => {
        fetch(`${endpoints.detailUrl}/${id}`, { headers: { Accept: 'application/json' } })
            .then((res) => res.json())
            .then((json) => {
                if (json.status === 'success') {
                    renderDetail(json.data);
                    detailModal?.show();
                } else {
                    alert(json.message || 'Unable to load detail.');
                }
            })
            .catch(() => alert('Unable to load detail.'));
    };

    const updateStatus = (id, status, onSuccess) => {
        fetch(`${endpoints.updateStatusUrl}/${id}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                Accept: 'application/json',
                [csrfHeaderName]: csrfHeaderValue,
            },
            body: JSON.stringify({ status }),
        })
            .then((res) => res.json())
            .then((json) => {
                if (json.status === 'success') {
                    reloadTable();
                    onSuccess?.();
                } else {
                    alert(json.message || 'Status update failed.');
                }
            })
            .catch(() => alert('Status update failed.'));
    };

    const updateNotes = (id, notes) => {
        fetch(`${endpoints.updateNotesUrl}/${id}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                Accept: 'application/json',
                [csrfHeaderName]: csrfHeaderValue,
            },
            body: JSON.stringify({ notes }),
        })
            .then((res) => res.json())
            .then((json) => {
                if (json.status === 'success') {
                    reloadTable();
                    detailModal?.hide();
                } else {
                    alert(json.message || 'Unable to save notes.');
                }
            })
            .catch(() => alert('Unable to save notes.'));
    };

    document.querySelector('#projectControlTable tbody')?.addEventListener('click', (event) => {
        const target = event.target;
        if (target.classList.contains('pcc-view')) {
            fetchDetail(target.dataset.id);
        } else if (target.classList.contains('pcc-edit')) {
            fetch(`${endpoints.detailUrl}/${target.dataset.id}`, { headers: { Accept: 'application/json' } })
                .then((res) => res.json())
                .then((json) => {
                    if (json.status === 'success') {
                        openUpsertModal(json.data);
                    }
                });
        } else if (target.classList.contains('pcc-status')) {
            updateStatus(target.dataset.id, target.dataset.status);
        }
    });

    document.getElementById('pccImportCsvBtn')?.addEventListener('click', () => importModal?.show());

    document.getElementById('pccImportSubmitBtn')?.addEventListener('click', () => {
        const payload = {
            project_name: document.getElementById('pccImportProjectName').value,
            source_type: document.getElementById('pccImportSourceType').value,
            csv_payload: document.getElementById('pccImportPayload').value,
        };

        fetch(endpoints.importUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                Accept: 'application/json',
                [csrfHeaderName]: csrfHeaderValue,
            },
            body: JSON.stringify(payload),
        })
            .then((res) => res.json())
            .then((json) => {
                if (json.status === 'success') {
                    alert(`Import complete. Inserted: ${json.data.inserted}, Updated: ${json.data.updated}, Skipped: ${json.data.skipped}`);
                    importModal?.hide();
                    reloadTable();
                } else {
                    alert(json.message || 'Import failed.');
                }
            })
            .catch(() => alert('Unable to import right now.'));
    });

    document.getElementById('pccExportCsvBtn')?.addEventListener('click', () => {
        const params = buildQuery();
        window.open(`${endpoints.exportCsvUrl}?${params.toString()}`, '_blank');
    });

    document.getElementById('pccExportJsonBtn')?.addEventListener('click', () => {
        const params = buildQuery();
        window.open(`${endpoints.exportJsonUrl}?${params.toString()}`, '_blank');
    });
})();
