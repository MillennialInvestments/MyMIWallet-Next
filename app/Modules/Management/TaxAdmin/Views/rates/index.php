<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Rates</h3>
        <a class="btn btn-primary" href="/Admin/Tax/Rates/create">Add Rate</a>
    </div>

    <table class="table table-striped" id="ratesTable">
        <thead>
            <tr>
                <th>Jurisdiction</th>
                <th>Rate</th>
                <th>Effective Start</th>
                <th>Effective End</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rates as $rate): ?>
                <tr>
                    <td><?= esc($rate['jurisdiction_code']); ?> - <?= esc($rate['jurisdiction_name']); ?></td>
                    <td><?= esc($rate['rate_total']); ?>%</td>
                    <td><?= esc($rate['effective_start']); ?></td>
                    <td><?= esc($rate['effective_end'] ?? ''); ?></td>
                    <td><a href="/Admin/Tax/Rates/edit/<?= esc($rate['id']); ?>" class="btn btn-sm btn-outline-secondary">Edit</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        if (window.$ && $.fn.DataTable) {
            $('#ratesTable').DataTable();
        }
    });
</script>
