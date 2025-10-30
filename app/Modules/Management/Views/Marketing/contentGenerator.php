<?php
$today = date("m/d/Y");
$month = date("n");
$year = date("Y");
$getApprovedAssets = $reporting['getApprovedAssets'];
$totalApprovedAssets = $reporting['totalApprovedAssets'];
$getPendingAssets = $reporting['getPendingAssets'];
$totalPendingAssets = $reporting['totalPendingAssets'];
$viewFileData = [
    'getApprovedAssets' => $getApprovedAssets,
    'getTasksByDepartment' => [],
];
?>

<div class="nk-block">
    <div class="row gy-gs">
        <div class="col-lg-12 col-xl-12">
            <div class="nk-block">
                <div class="nk-block-head-xs">
                    <div class="nk-block-head-content">
                        <h1 class="nk-block-title title">MyMI Management - Content Generator</h1>
                        <p id="private_key"></p>
                        <p id="address"></p>
                        <a href="<?php echo site_url('/Management/Marketing'); ?>">Back to Marketing Dashboard</a>
                    </div>
                </div>
            </div>

            <div class="nk-block">
                <div class="row">
                    <div class="col-lg-4">
                        <?php echo view('ManagementModule\Views\Marketing\Tasks\action_center', $viewFileData); ?>
                    </div>
                    <div class="col-lg-8">
                        <div class="card card-bordered">
                            <div class="card-inner">
                                <div class="card-title-group">
                                    <div class="card-title">
                                        <h6 class="title">Generate Content</h6>                                    
                                    </div>
                                    <div class="card-tools me-n1">
                                        <ul class="card-tools-nav">
                                            <li>
                                                <a class="btn btn-success px-1 text-white" onclick="generateContent();" href="#">Generate</a>
                                            </li>                                                
                                            <li>                                                
                                                <div class="drodown">
                                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger full-width" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li><a href="#"><em class="icon ni ni-setting"></em><span>Action Settings</span></a></li>
                                                            <li><a href="#"><em class="icon ni ni-notify"></em><span>Push Notification</span></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card-inner">
                                <form action="<?php echo site_url('Management/Marketing/addContent'); ?>" method="post">
                                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

                                    <div class="form-group">
                                        <label for="contentType">Content Type</label>
                                        <select class="form-control" id="contentType" name="contentType">
                                            <option value="blogPost">Blog Post</option>
                                            <option value="socialMedia">Social Media Post</option>
                                            <option value="newsletter">Newsletter</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="contentTitle">Title</label>
                                        <input type="text" class="form-control" id="contentTitle" name="contentTitle" placeholder="Enter title">
                                    </div>
                                    <div class="form-group">
                                        <label for="contentBody">Content</label>
                                        <textarea class="form-control" id="contentBody" name="contentBody" rows="5" placeholder="Enter content"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Generate Content</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="nk-block">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-bordered">
                            <div class="card-inner">
                                <h5 class="card-title">Recent Generated Content</h5>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Type</th>
                                            <th>Summary</th>
                                            <th>Date Created</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php log_message('debug', 'Management\Views\Marketing\contentGenerator L104 - : ' . (print_r($recentContent, true))); ?>
                                    <?php foreach ($recentContent as $content): ?>
                                        <tr>
                                            <td><?php echo $content->title; ?></td>
                                            <td><?php echo ucfirst($content->type); ?></td>
                                            <td><?php echo $content->summary; ?></td>
                                            <td><?php echo date("m/d/Y", strtotime($content->created_on)); ?></td>
                                            <td>
                                                <a href="<?php echo site_url('Management/Marketing/editContent/' . $content->id); ?>" class="btn btn-sm btn-warning">Edit</a>
                                                <a href="<?php echo site_url('Management/Marketing/deleteContent/' . $content->id); ?>" class="btn btn-sm btn-danger">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="nk-block">
                <div class="row">
                    <div class="col-lg-12">
                        <?php //echo view('ManagementModule\Marketing\Tasks\Listing-Table', $viewFileData); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <script <?= $nonce['script'] ?? '' ?>>
    function showLoadingScreen() {
        var myModal = new bootstrap.Modal(document.getElementById('loadingModal'), {
            backdrop: 'static',
            keyboard: false
        });
        myModal.show();
    }

    function generateContent() {
        showLoadingScreen();
        setTimeout(function() {
            window.location.href = "<?php // echo site_url('Management/Marketing/generateContent'); ?>";
        }, 1000); // Adjust the delay as needed
    }

    // Call the function when needed
    $(document).ready(function() {
        // showLoadingScreen();
    });
</script>
 -->

<!-- Include the modal HTML -->
<div class="modal fade" id="loadingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <?= view('UserModule\Views\Dashboard\index\modal-loading-page') ?>
        </div>
    </div>
</div>