<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Return Templates</h3>
        <a href="/Admin/Tax/Templates/edit/0" class="btn btn-primary">Add Template</a>
    </div>

    <table class="table table-striped" id="templateTable">
        <thead>
            <tr>
                <th>Name</th>
                <th>Authority</th>
                <th>Frequency</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($templates as $template): ?>
                <tr>
                    <td><?= esc($template['name']); ?></td>
                    <td><?= esc($template['authority']); ?></td>
                    <td><?= esc($template['frequency']); ?></td>
                    <td><?= (int) $template['active'] === 1 ? 'Active' : 'Inactive'; ?></td>
                    <td><a href="/Admin/Tax/Templates/edit/<?= esc($template['id']); ?>" class="btn btn-sm btn-outline-primary">Edit</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        if (window.$ && $.fn.DataTable) {
            $('#templateTable').DataTable();
        }
    });
</script>
