<?php
/**
 * app/Modules/Management/Views/Projects/control_center.php
 * Project Control Center dashboard view.
 *
 * Mirrors NK UI card layout used in Management/Marketing.
 */

$statusOptions = $statusOptions ?? ['Active', 'Planned', 'Blocked', 'Deprecated', 'Completed'];
$nonce = $nonce ?? ['script' => '', 'style' => ''];
?>

<div class="nk-block" id="projectControlCenterRoot"
     data-list-url="<?= site_url('/API/Management/ProjectControl/list'); ?>"
     data-upsert-url="<?= site_url('/API/Management/ProjectControl/upsert'); ?>"
     data-detail-url="<?= site_url('/API/Management/ProjectControl/detail'); ?>"
     data-update-status-url="<?= site_url('/API/Management/ProjectControl/updateStatus'); ?>"
     data-update-notes-url="<?= site_url('/API/Management/ProjectControl/updateNotes'); ?>"
     data-export-csv-url="<?= site_url('/API/Management/ProjectControl/exportCsv'); ?>"
     data-export-json-url="<?= site_url('/API/Management/ProjectControl/exportJson'); ?>"
     data-import-url="<?= site_url('/API/Management/ProjectControl/importCsv'); ?>">
    <div class="row gy-gs">
        <div class="col-12">
            <div class="nk-block-head-xs">
                <div class="nk-block-head-content">
                    <h1 class="title nk-block-title">Project Control Center</h1>
                    <p class="text-soft mb-0">Unified backlog, ops, and roadmap across all ChatGPT Projects.</p>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card card-bordered mb-3">
                <div class="card-inner d-flex flex-wrap justify-content-between align-items-center">
                    <div class="btn-group mb-2">
                        <button class="btn btn-outline-secondary" id="pccImportCsvBtn">Import CSV</button>
                        <button class="btn btn-primary" id="pccAddItemBtn">Add Item</button>
                        <button class="btn btn-outline-primary" id="pccExportCsvBtn">Export CSV</button>
                        <button class="btn btn-outline-primary" id="pccExportJsonBtn">Export JSON</button>
                        <button class="btn btn-light" id="pccRefreshBtn">Refresh</button>
                    </div>
                    <div class="form-check form-switch mb-2 d-flex align-items-center gap-2">
                        <input class="form-check-input" type="checkbox" id="pccLiveModeToggle">
                        <label class="form-check-label mb-0" for="pccLiveModeToggle">Live Mode (30s)</label>
                        <div class="form-check form-switch ms-3">
                            <input class="form-check-input" type="checkbox" id="pccBlockedToggle">
                            <label class="form-check-label mb-0" for="pccBlockedToggle">Show Blocked Only</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card card-bordered mb-3">
                <div class="card-inner">
                    <div class="row g-3 align-items-end">
                        <div class="col-md-3">
                            <label class="form-label" for="pccFilterProject">Project</label>
                            <input type="text" class="form-control" id="pccFilterProject" placeholder="Project name">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label" for="pccFilterStatus">Status</label>
                            <select class="form-select" id="pccFilterStatus">
                                <option value="">All</option>
                                <?php foreach ($statusOptions as $status): ?>
                                    <option value="<?= esc($status); ?>"><?= esc($status); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label" for="pccFilterCategory">Category</label>
                            <input type="text" class="form-control" id="pccFilterCategory" placeholder="Category">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label" for="pccFilterSearch">Search</label>
                            <input type="search" class="form-control" id="pccFilterSearch" placeholder="Search keywords">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12">
            <div class="card card-bordered">
                <div class="card-inner">
                    <div class="nk-tb-list is-separate">
                        <table class="table table-striped table-hover nowrap" id="projectControlTable" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Project</th>
                                    <th>Category</th>
                                    <th>Component</th>
                                    <th>Status</th>
                                    <th>Updated</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Detail Modal -->
<div class="modal fade" id="pccDetailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Project Detail</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="pccDetailBody">
                <div class="text-center py-4 text-soft">Loading...</div>
            </div>
        </div>
    </div>
</div>

<!-- Upsert Modal -->
<div class="modal fade" id="pccUpsertModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pccUpsertTitle">Add Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="pccUpsertForm" novalidate>
                    <input type="hidden" name="id" id="pccUpsertId">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label" for="pccProjectName">Project Name</label>
                            <input type="text" class="form-control" name="project_name" id="pccProjectName" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="pccComponent">Component</label>
                            <input type="text" class="form-control" name="component" id="pccComponent" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="pccCategory">Category</label>
                            <input type="text" class="form-control" name="category" id="pccCategory">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="pccSubcategory">Subcategory</label>
                            <input type="text" class="form-control" name="subcategory" id="pccSubcategory">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="pccStatus">Status</label>
                            <select class="form-select" name="status" id="pccStatus">
                                <?php foreach ($statusOptions as $status): ?>
                                    <option value="<?= esc($status); ?>"><?= esc($status); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="pccDescription">Description</label>
                            <textarea class="form-control" name="description" id="pccDescription" rows="3"></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="pccPrimaryFiles">Primary Files / Modules</label>
                            <input type="text" class="form-control" name="primary_files" id="pccPrimaryFiles" placeholder="Comma-separated paths">
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="pccNotes">Notes / Next Actions</label>
                            <textarea class="form-control" name="notes" id="pccNotes" rows="3"></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="pccTagsJson">Tags (JSON)</label>
                            <input type="text" class="form-control" name="tags_json" id="pccTagsJson" placeholder='["tag1","tag2"]'>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="pccSaveBtn">Save</button>
            </div>
        </div>
    </div>
</div>

<!-- Import Modal -->
<div class="modal fade" id="pccImportModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Import CSV</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label" for="pccImportProjectName">Project Name (applied if missing)</label>
                        <input type="text" class="form-control" id="pccImportProjectName" placeholder="Project name">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="pccImportSourceType">Source Type</label>
                        <select class="form-select" id="pccImportSourceType">
                            <option value="csv_import">CSV Import</option>
                            <option value="manual">Manual</option>
                            <option value="chatgpt_project">chatgpt_project</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label class="form-label" for="pccImportPayload">CSV Payload</label>
                        <textarea class="form-control" id="pccImportPayload" rows="8" placeholder="Category,Subcategory,Component,Description,Status,Primary Files / Modules,Notes / Next Actions"></textarea>
                        <div class="text-soft small mt-2">
                            First row should contain headers. Empty component rows are skipped automatically.
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="pccImportSubmitBtn">Import</button>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/js/management/project_control_center.js'); ?>" <?= $nonce['script'] ?? ''; ?>></script>
