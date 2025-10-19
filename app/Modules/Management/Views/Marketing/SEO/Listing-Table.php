<div class="card card-bordered card-preview">
    <div class="card-inner">
        <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
            <thead>
                <tr class="nk-tb-item nk-tb-head">
                    <th class="nk-tb-col"><span class="sub-text">Task Name</span></th>
                    <th class="nk-tb-col tb-col-md"><span class="sub-text">Assigned To</span></th>
                    <th class="nk-tb-col tb-col-lg"><span class="sub-text">Status</span></th>
                    <th class="nk-tb-col tb-col-lg"><span class="sub-text">Due Date</span></th>
                    <th class="nk-tb-col tb-col-lg"><span class="sub-text">Actions</span></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($totalPageSEOTasks as $task): ?>
                <tr class="nk-tb-item">
                    <td class="nk-tb-col"><?php echo $task['name']; ?></td>
                    <td class="nk-tb-col tb-col-md"><?php echo $task['assigned_to']; ?></td>
                    <td class="nk-tb-col tb-col-lg"><?php echo $task['status']; ?></td>
                    <td class="nk-tb-col tb-col-lg"><?php echo $task['due_date']; ?></td>
                    <td class="nk-tb-col tb-col-lg">
                        <a href="<?php echo site_url('Marketing/SEO/Edit/' . $task['id']); ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="<?php echo site_url('Marketing/SEO/Delete/' . $task['id']); ?>" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
