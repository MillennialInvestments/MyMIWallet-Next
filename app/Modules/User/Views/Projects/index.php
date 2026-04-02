<?php
/** @var array $projects */
$projects = is_array($projects ?? null) ? $projects : [];
?>

<div class="nk-block">
    <div class="card card-bordered">
        <div class="card-inner">
            <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
                <h4 class="card-title mb-0">Projects</h4>
                <div>
                    <label for="projectTypeFilter" class="form-label mb-0 me-2">Type</label>
                    <select id="projectTypeFilter" class="form-select form-select-sm d-inline-block" style="width: 200px;">
                        <option value="">All</option>
                        <option value="private_fund">Private Fund</option>
                    </select>
                </div>
            </div>

            <div class="table-responsive">
                <table id="projectsTable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Project</th>
                            <th>Type</th>
                            <th>NAV</th>
                            <th>Fund Value</th>
                            <th>Units</th>
                            <th>Holders</th>
                            <th>Exchange</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    if (window.__mymiProjectsTableInitialized) {
        return;
    }
    window.__mymiProjectsTableInitialized = true;

    const table = initDataTableSafe($('#projectsTable'),{
        data: <?= json_encode($projects, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>,
        columns: [
            {
                data: 'title',
                render: function (data, type, row) {
                    return `<a href="/Projects/View/${row.id}">${data || 'Untitled Project'}</a>`;
                }
            },
            { data: 'project_type' },
            {
                data: 'nav_per_unit',
                render: function (val) {
                    return '$' + parseFloat(val || 0).toFixed(2);
                }
            },
            {
                data: 'total_fund_value',
                render: function (val) {
                    return '$' + parseFloat(val || 0).toLocaleString();
                }
            },
            {
                data: 'total_units_issued',
                render: function (val) {
                    return parseFloat(val || 0).toLocaleString();
                }
            },
            { data: 'total_holders' },
            {
                data: null,
                render: function (_, __, row) {
                    if (parseInt(row.exchange_enabled || 0, 10) === 1 && row.ticker) {
                        return `<a class="badge bg-success text-white" href="/Exchange/Projects/${row.ticker}">Active</a>`;
                    }
                    return '<span class="badge bg-secondary text-white">Not Listed</span>';
                }
            }
        ],
        pageLength: 25,
        order: [[0, 'asc']]
    });

    const filter = document.getElementById('projectTypeFilter');
    filter.addEventListener('change', function () {
        if (this.value === 'private_fund') {
            table.column(1).search('private_fund').draw();
            return;
        }
        table.column(1).search(this.value).draw();
    });
});
</script>
