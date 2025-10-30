<div class="card card-bordered card-preview">
    <div class="card-inner">
        <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
            <thead>
                <tr class="nk-tb-item nk-tb-head">
                    <th class="nk-tb-col"><span class="sub-text">Title</span></th>
                    <th class="nk-tb-col tb-col-md"><span class="sub-text">Author</span></th>
                    <th class="nk-tb-col tb-col-lg"><span class="sub-text">Date</span></th>
                    <th class="nk-tb-col tb-col-lg"><span class="sub-text">Actions</span></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($newsUpdates as $news): ?>
                <tr class="nk-tb-item">
                    <td class="nk-tb-col"><?php echo $news['title']; ?></td>
                    <td class="nk-tb-col tb-col-md"><?php echo $news['author']; ?></td>
                    <td class="nk-tb-col tb-col-lg"><?php echo $news['date']; ?></td>
                    <td class="nk-tb-col tb-col-lg">
                        <a href="<?php echo site_url('Marketing/News/Edit/' . $news['id']); ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="<?php echo site_url('Marketing/News/Delete/' . $news['id']); ?>" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
