<!-- app/Modules/Management/Views/Email/index.php -->
<?php
$subViewData = [
   
]; 
?>
`<div class="nk-block">
    <div class="nk-block-head">
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">Email Distribution Lists</h4>
            <div class="nk-block-des">
                <p>Manage your email lists, members, and assign campaigns.</p>
            </div>
        </div>
    </div>
    <!-- Management/Email/index.php -->

    <?php echo view('ManagementModule/Views/Email\resources\controlPanelBlock', $subViewData); ?>

    <div class="card card-bordered">
        <div class="card-inner">
            <div class="row g-4">
                <div class="col-md-8">
                    <h5 class="card-title">Active Lists</h5>
                </div>
                <div class="col-md-4 text-end">
                    <button class="btn btn-primary" onclick="dynamicModalLoader('Create New List', '<?= site_url('Management/Email/createList') ?>', 'modal-md')">
                        + Create New List
                    </button>
                </div>
            </div>

            <div class="table-responsive mt-4">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>List Name</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($lists)) : ?>
                            <?php foreach ($lists as $list) : ?>
                                <tr>
                                    <td><?= esc($list['name']) ?></td>
                                    <td><?= esc($list['description']) ?></td>
                                    <td>
                                        <button class="btn btn-sm btn-info" onclick="dynamicModalLoader('Add Member', '<?= site_url('Management/Email/addMember') ?>', 'modal-md')">
                                            + Add Member
                                        </button>
                                        <button class="btn btn-sm btn-warning" onclick="dynamicModalLoader('Send Campaign', '<?= site_url('Management/Email/sendCampaign') ?>', 'modal-md')">
                                            📧 Send Campaign
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="3" class="text-center">No lists created yet.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
