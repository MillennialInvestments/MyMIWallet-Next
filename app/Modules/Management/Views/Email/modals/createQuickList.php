<!-- app/Modules/Management/Views/Email/modals/createQuickList.php -->
<div class="modal-header">
    <h5 class="modal-title">Create New Email List</h5>
</div>
<div class="modal-body">
    <form id="createListForm" method="post" action="<?= site_url('Management/Email/createList') ?>">
        <?= csrf_field() ?>
        <div class="form-group">
            <label for="listName">List Name</label>
            <input type="text" name="name" class="form-control" id="listName" required>
        </div>
        <div class="form-group mt-2">
            <label for="listDescription">Description</label>
            <textarea name="description" class="form-control" id="listDescription" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Create List</button>
    </form>
</div>

