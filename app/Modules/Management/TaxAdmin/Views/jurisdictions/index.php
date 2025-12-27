<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Jurisdictions</h3>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#jurisdictionModal">Add Jurisdiction</button>
    </div>

    <table class="table table-striped" id="jurisdictionTable">
        <thead>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Parish</th>
                <th>State</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($jurisdictions as $jurisdiction): ?>
                <tr>
                    <td><?= esc($jurisdiction['code']); ?></td>
                    <td><?= esc($jurisdiction['name']); ?></td>
                    <td><?= esc($jurisdiction['parish']); ?></td>
                    <td><?= esc($jurisdiction['state']); ?></td>
                    <td><?= (int) $jurisdiction['active'] === 1 ? 'Active' : 'Inactive'; ?></td>
                    <td>
                        <button class="btn btn-sm btn-outline-secondary edit-jurisdiction"
                            data-id="<?= esc($jurisdiction['id']); ?>"
                            data-code="<?= esc($jurisdiction['code']); ?>"
                            data-name="<?= esc($jurisdiction['name']); ?>"
                            data-parish="<?= esc($jurisdiction['parish']); ?>"
                            data-state="<?= esc($jurisdiction['state']); ?>"
                            data-active="<?= esc($jurisdiction['active']); ?>"
                            data-bs-toggle="modal"
                            data-bs-target="#jurisdictionModal">
                            Edit
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="jurisdictionModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post">
                <div class="modal-header">
                    <h5 class="modal-title">Jurisdiction</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="jurisdiction_id">
                    <div class="mb-2">
                        <label class="form-label">Code</label>
                        <input type="text" name="code" id="jurisdiction_code" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" id="jurisdiction_name" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Parish</label>
                        <input type="text" name="parish" id="jurisdiction_parish" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">State</label>
                        <input type="text" name="state" id="jurisdiction_state" class="form-control" value="LA">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Active</label>
                        <select name="active" id="jurisdiction_active" class="form-select">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        if (window.$ && $.fn.DataTable) {
            $('#jurisdictionTable').DataTable();
        }

        document.querySelectorAll('.edit-jurisdiction').forEach(btn => {
            btn.addEventListener('click', () => {
                document.getElementById('jurisdiction_id').value = btn.dataset.id;
                document.getElementById('jurisdiction_code').value = btn.dataset.code;
                document.getElementById('jurisdiction_name').value = btn.dataset.name;
                document.getElementById('jurisdiction_parish').value = btn.dataset.parish;
                document.getElementById('jurisdiction_state').value = btn.dataset.state;
                document.getElementById('jurisdiction_active').value = btn.dataset.active;
            });
        });
    });
</script>
