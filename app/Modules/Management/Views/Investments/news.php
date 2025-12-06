<div class="nk-block">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Investments News Feed</h5>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="investments-news-table" width="100%">
                <thead>
                    <tr>
                        <th>Provider</th>
                        <th>Ticker</th>
                        <th>Headline</th>
                        <th>Subject</th>
                        <th>Status</th>
                        <th>Received At</th>
                        <th class="text-end">Actions</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="newsModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newsModalLabel">News Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="newsModalBody"></div>
            <div class="modal-footer" id="newsModalFooter">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    (function ($) {
        const baseUrl = '<?= site_url("API/Investments/news"); ?>';

        function statusBadge(status) {
            const normalized = (status || '').toLowerCase();
            let color = 'secondary';

            if (normalized === 'new') {
                color = 'primary';
            } else if (normalized === 'read') {
                color = 'success';
            }

            return `<span class="badge bg-${color}">${status || 'n/a'}</span>`;
        }

        function escapeHtml(str) {
            return $('<div>').text(str || '').html();
        }

        function showModal(title, bodyHtml, footerButtons = '') {
            $('#newsModalLabel').text(title);
            $('#newsModalBody').html(bodyHtml);
            const defaultFooter = '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>';
            $('#newsModalFooter').html(footerButtons || defaultFooter);
            const modal = new bootstrap.Modal(document.getElementById('newsModal'));
            modal.show();
        }

        function loadNews(id) {
            return $.get(`${baseUrl}/${id}`);
        }

        const table = $('#investments-news-table').DataTable({
            ajax: {
                url: baseUrl,
                dataSrc: 'data'
            },
            order: [[5, 'desc']],
            columns: [
                { data: 'provider', defaultContent: '' },
                { data: 'ticker_symbol', defaultContent: '' },
                { data: 'headline', defaultContent: '' },
                { data: 'subject', defaultContent: '' },
                {
                    data: 'status',
                    render: function (data) {
                        return statusBadge(data);
                    }
                },
                { data: 'received_at', defaultContent: '' },
                {
                    data: 'id',
                    orderable: false,
                    className: 'text-end',
                    render: function (id) {
                        return `
                            <div class="btn-group btn-group-sm" role="group">
                                <button class="btn btn-outline-primary" data-id="${id}" data-action="view">View</button>
                                <button class="btn btn-outline-secondary" data-id="${id}" data-action="edit">Edit</button>
                                <button class="btn btn-outline-danger" data-id="${id}" data-action="delete">Delete</button>
                            </div>
                        `;
                    }
                }
            ]
        });

        function refreshTable() {
            table.ajax.reload(null, false);
        }

        $('#investments-news-table').on('click', 'button[data-action="view"]', function () {
            const id = $(this).data('id');
            loadNews(id).done(function (resp) {
                const item = resp.data || {};
                        const bodyHtml = `
                    <dl class="row">
                        <dt class="col-sm-3">Provider</dt><dd class="col-sm-9">${escapeHtml(item.provider)}</dd>
                        <dt class="col-sm-3">Ticker</dt><dd class="col-sm-9">${escapeHtml(item.ticker_symbol)}</dd>
                        <dt class="col-sm-3">Headline</dt><dd class="col-sm-9">${escapeHtml(item.headline)}</dd>
                        <dt class="col-sm-3">Subject</dt><dd class="col-sm-9">${escapeHtml(item.subject)}</dd>
                        <dt class="col-sm-3">Status</dt><dd class="col-sm-9">${statusBadge(item.status)}</dd>
                        <dt class="col-sm-3">Received</dt><dd class="col-sm-9">${escapeHtml(item.received_at)}</dd>
                    </dl>
                    <hr>
                    <pre class="mb-0">${escapeHtml(item.body)}</pre>
                `;
                showModal('Preview News Item', bodyHtml);
            });
        });

        $('#investments-news-table').on('click', 'button[data-action="edit"]', function () {
            const id = $(this).data('id');
            loadNews(id).done(function (resp) {
                const item = resp.data || {};
                        const formHtml = `
                    <form id="news-edit-form">
                        <div class="mb-3">
                            <label class="form-label">Provider</label>
                            <input type="text" class="form-control" name="provider" value="${escapeHtml(item.provider || '')}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ticker</label>
                            <input type="text" class="form-control" name="ticker_symbol" value="${escapeHtml(item.ticker_symbol || '')}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Headline</label>
                            <input type="text" class="form-control" name="headline" value="${escapeHtml(item.headline || '')}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Subject</label>
                            <input type="text" class="form-control" name="subject" value="${escapeHtml(item.subject || '')}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-select" name="status">
                                <option value="new" ${item.status === 'new' ? 'selected' : ''}>New</option>
                                <option value="read" ${item.status === 'read' ? 'selected' : ''}>Read</option>
                                <option value="archived" ${item.status === 'archived' ? 'selected' : ''}>Archived</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Body</label>
                            <textarea class="form-control" rows="6" name="body">${escapeHtml(item.body || '')}</textarea>
                        </div>
                    </form>
                `;

                const footerButtons = `
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="save-news-btn" data-id="${id}">Save Changes</button>
                `;

                showModal('Edit News Item', formHtml, footerButtons);
            });
        });

        $(document).on('click', '#save-news-btn', function () {
            const id = $(this).data('id');
            const formData = $('#news-edit-form').serialize();
            $.post(`${baseUrl}/${id}`, formData)
                .done(function () {
                    refreshTable();
                    const modalElement = document.getElementById('newsModal');
                    bootstrap.Modal.getInstance(modalElement)?.hide();
                });
        });

        $('#investments-news-table').on('click', 'button[data-action="delete"]', function () {
            const id = $(this).data('id');
            if (!confirm('Delete this news item?')) {
                return;
            }
            $.ajax({
                url: `${baseUrl}/${id}`,
                method: 'DELETE'
            }).done(function () {
                refreshTable();
            });
        });
    })(jQuery);
</script>
