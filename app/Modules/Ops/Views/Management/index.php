<div class="container-fluid mt-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Ops Management Dashboard</h3>
        <div>
            <button class="btn btn-outline-secondary" id="btn-import">Import XLSX</button>
            <a class="btn btn-outline-primary" href="<?= site_url('Ops/export/tasks.csv') ?>">Export CSV</a>
            <a class="btn btn-primary" href="<?= site_url('Ops/export/workbook.xlsx') ?>">Export XLSX</a>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-3"><div class="card"><div class="card-body"><strong>Projects</strong><div class="display-4"><?= (int) ($opsSummary['projects'] ?? 0) ?></div></div></div></div>
        <div class="col-md-3"><div class="card"><div class="card-body"><strong>Tasks</strong><div class="display-4"><?= (int) ($opsSummary['tasks'] ?? 0) ?></div></div></div></div>
        <div class="col-md-3"><div class="card"><div class="card-body"><strong>Blockers</strong><div class="display-4 text-danger"><?= (int) ($opsSummary['blockers'] ?? 0) ?></div></div></div></div>
        <div class="col-md-3"><div class="card"><div class="card-body"><strong>Readiness</strong><div class="display-4 text-success"><?= (int) ($opsSummary['readiness'] ?? 0) ?>%</div></div></div></div>
    </div>

    <div class="card mb-3">
        <div class="card-header">Create / Update Project & Subproject</div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 border-right">
                    <h6>Project</h6>
                    <form id="project-form" class="form-row">
                        <input type="hidden" name="id" id="project-id">
                        <div class="form-group col-3"><input class="form-control" name="code" placeholder="P-001"></div>
                        <div class="form-group col-4"><input class="form-control" name="name" placeholder="Project name" required></div>
                        <div class="form-group col-3"><input class="form-control" name="owner" placeholder="Owner"></div>
                        <div class="form-group col-2"><button class="btn btn-success btn-block" type="submit">Save</button></div>
                    </form>
                </div>
                <div class="col-md-6">
                    <h6>Subproject</h6>
                    <form id="subproject-form" class="form-row">
                        <input type="hidden" name="id" id="subproject-id">
                        <div class="form-group col-3"><input class="form-control" name="code" placeholder="SP-001"></div>
                        <div class="form-group col-4"><input class="form-control" name="name" placeholder="Subproject name"></div>
                        <div class="form-group col-3"><select class="form-control" name="project_id" id="subproject-project-id"></select></div>
                        <div class="form-group col-2"><button class="btn btn-success btn-block" type="submit">Save</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <table class="table table-sm table-bordered" id="ops-tasks-table">
        <thead>
        <tr>
            <th>TaskID</th><th>Project</th><th>Subproject</th><th>Title</th><th>Status</th><th>Priority</th><th>Owner</th><th>Due</th>
        </tr>
        </thead>
    </table>
</div>

<form id="xlsx-upload-form" class="d-none" enctype="multipart/form-data">
    <input type="file" name="workbook" id="workbook-input" accept=".xlsx,.xls" />
</form>

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap4.min.css">
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap4.min.js"></script>
<script>
$(function () {
    const projectSelect = $('#subproject-project-id');

    function loadProjects() {
        $.getJSON('<?= site_url('Ops/projects') ?>', function(resp) {
            const items = (resp && resp.data) ? resp.data : [];
            projectSelect.empty();
            projectSelect.append('<option value="">Project</option>');
            items.forEach(function (p) {
                projectSelect.append(`<option value="${p.id}">${p.code} - ${p.name}</option>`);
            });
        });
    }

    loadProjects();

    const table = initDataTableSafe($('#ops-tasks-table'),{
        ajax: '<?= site_url('Ops/tasks') ?>',
        columns: [
            {data: 'code'}, {data: 'project_code'}, {data: 'subproject_code'}, {data: 'title'},
            {data: 'status', render: (d, t, r) => `<select class="form-control form-control-sm inline-update" data-id="${r.id}" data-field="status"><option ${d==='open'?'selected':''}>open</option><option ${d==='in_progress'?'selected':''}>in_progress</option><option ${d==='blocked'?'selected':''}>blocked</option><option ${d==='done'?'selected':''}>done</option></select>`},
            {data: 'priority', render: (d, t, r) => `<select class="form-control form-control-sm inline-update" data-id="${r.id}" data-field="priority"><option ${d==='P0'?'selected':''}>P0</option><option ${d==='P1'?'selected':''}>P1</option><option ${d==='P2'?'selected':''}>P2</option><option ${d==='P3'?'selected':''}>P3</option></select>`},
            {data: 'owner'}, {data: 'due_date'}
        ]
    });

    $(document).on('change', '.inline-update', function() {
        const id = $(this).data('id');
        const field = $(this).data('field');
        $.post('<?= site_url('Ops/tasks/save') ?>', {id: id, [field]: $(this).val()}, function() { table.ajax.reload(null, false); });
    });

    $('#project-form').on('submit', function(e){
        e.preventDefault();
        $.post('<?= site_url('Ops/projects/save') ?>', $(this).serialize(), function(){
            loadProjects();
            location.reload();
        });
    });

    $('#subproject-form').on('submit', function(e){
        e.preventDefault();
        $.post('<?= site_url('Ops/subprojects/save') ?>', $(this).serialize(), function(){
            table.ajax.reload(null, false);
        });
    });

    $('#btn-import').on('click', function() {
        $('#workbook-input').click();
    });

    $('#workbook-input').on('change', function() {
        const fd = new FormData(document.getElementById('xlsx-upload-form'));
        $.ajax({
            url: '<?= site_url('Ops/import/xlsx') ?>',
            method: 'POST',
            data: fd,
            processData: false,
            contentType: false
        }).done(function() { table.ajax.reload(); location.reload(); });
    });
});
</script>
