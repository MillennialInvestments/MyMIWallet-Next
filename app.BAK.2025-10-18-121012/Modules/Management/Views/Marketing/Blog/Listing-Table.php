<div class="card card-bordered card-preview">
    <div class="card-inner">
        <table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
            <thead>
                <tr class="nk-tb-item nk-tb-head">
                    <th class="nk-tb-col"><span class="sub-text">Blog Title</span></th>
                    <th class="nk-tb-col tb-col-md"><span class="sub-text">Author</span></th>
                    <th class="nk-tb-col tb-col-lg"><span class="sub-text">Date</span></th>
                    <th class="nk-tb-col tb-col-lg"><span class="sub-text">Actions</span></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($getBlogPosts as $blog): ?>
                <tr class="nk-tb-item">
                    <td class="nk-tb-col"><?php echo $blog['title']; ?></td>
                    <td class="nk-tb-col tb-col-md"><?php echo $blog['author']; ?></td>
                    <td class="nk-tb-col tb-col-lg"><?php echo $blog['date']; ?></td>
                    <td class="nk-tb-col tb-col-lg">
                        <a href="<?php echo site_url('Marketing/Blog/Edit/' . $blog['id']); ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="<?php echo site_url('Marketing/Blog/Delete/' . $blog['id']); ?>" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
