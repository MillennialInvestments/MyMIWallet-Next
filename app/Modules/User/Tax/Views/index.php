<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h2>Tax Returns</h2>
            <p class="text-muted">Track monthly filings and prepare returns.</p>
        </div>
        <form action="/Tax/create" method="post" class="d-flex gap-2">
            <select name="template_id" class="form-select">
                <?php foreach ($templates as $template): ?>
                    <option value="<?= esc($template['id']); ?>"><?= esc($template['name']); ?></option>
                <?php endforeach; ?>
            </select>
            <input type="month" name="period_start" class="form-control" value="<?= date('Y-m'); ?>">
            <button class="btn btn-primary">Create Return</button>
        </form>
    </div>

    <table class="table table-striped" id="returnsTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Template</th>
                <th>Period</th>
                <th>Status</th>
                <th>Total Remitted</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($returns as $return): ?>
                <tr>
                    <td><?= esc($return['id']); ?></td>
                    <td><?= esc($return['template_id']); ?></td>
                    <td><?= esc($return['filing_period_start']); ?> → <?= esc($return['filing_period_end']); ?></td>
                    <td><span class="badge bg-secondary"><?= esc($return['status']); ?></span></td>
                    <td>$<?= number_format((float) $return['total_remitted'], 2); ?></td>
                    <td>
                        <a href="/Tax/edit/<?= esc($return['id']); ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                        <a href="/Tax/view/<?= esc($return['id']); ?>" class="btn btn-sm btn-outline-secondary">View</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        if (window.$ && $.fn.DataTable) {
            $('#returnsTable').DataTable();
        }
    });
</script>
