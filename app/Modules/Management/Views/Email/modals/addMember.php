<!-- app/Modules/Management/Views/Email/modals/addMember.php -->
<div class="modal-header">
    <h5 class="modal-title">Add Member to List</h5>
</div>
<div class="modal-body">
    <form id="addMemberForm" method="post" action="<?= site_url('Management/Email/addMember') ?>">
        <?= csrf_field() ?>
        <div class="form-group">
            <label for="listId">Select List</label>
            <select name="list_id" id="listId" class="form-control" required>
                <?php foreach ($lists as $list): ?>
                    <option value="<?= esc($list['id']) ?>"><?= esc($list['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group mt-2">
            <label for="memberEmail">Email Address</label>
            <input type="email" name="email" id="memberEmail" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success mt-3">Add Member</button>
    </form>
</div>
