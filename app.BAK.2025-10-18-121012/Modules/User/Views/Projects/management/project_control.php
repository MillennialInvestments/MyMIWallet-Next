<?php
// log_message('debug', 'Management\Projects\project_control L2 - $project Array: ' . (print_r($project, true)));
?>

<div class="card card-bordered">
    <div class="card-inner">
        <h5 class="title">Manage Project: <?= $project['name']; ?></h5>
        <form action="<?= site_url('Management/Projects/UpdateStatus/' . $project['id']); ?>" method="post">
            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control">
                    <option value="active" <?= $project['status'] == 'active' ? 'selected' : ''; ?>>Active</option>
                    <option value="inactive" <?= $project['status'] == 'inactive' ? 'selected' : ''; ?>>Inactive</option>
                </select>
            </div>
            <div class="form-group">
                <label for="target_amount">Target Amount</label>
                <input type="number" name="target_amount" class="form-control" value="<?= $project['target_amount']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Save Changes</button>
        </form>
    </div>
</div>
