<div class="card card-bordered h-100" id="active-assets-overview">
    <div class="card-inner-group">
        <div class="card-inner card-inner-md">
            <div class="card-title-group">
                <div class="card-title">
                    <h6 class="title">MyMI Gold - Active Goals Checklist</h6>
                </div>
                <div class="card-tools me-n1">
                    <div class="row">
                        <span class="col">
                            <a class="link py-3" href="<?php echo site_url('Management/Marketing/MyMI-Gold/Tasks/Add'); ?>"><i class="icon ni ni-plus-circle"></i> <span class="pl-0" style="padding-top:3px;">Add News Task</span></a>
                        </span>
                        <span class="col">
                            <div class="drodown">
                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger pt-3 full-width" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <ul class="link-list-opt no-bdr">
                                        <li><a href="#"><em class="icon ni ni-setting"></em><span>Action Settings</span></a></li>
                                        <li><a href="#"><em class="icon ni ni-notify"></em><span>Push Notification</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-inner">
            <div class="nk-block">
                <div class="row">
                    <div class="col">
                        <table class="table table-bordered table-striped" id="userGoalsOverview">
                            <thead>
                                <tr>
                                    <th class="d-none">ID</th>
                                    <th>Category</th>
                                    <th>Tasks</th>
                                    <th># of Tasks Completed</th>
                                    <th>Manage</th>
                                    <!-- 
                                    <th>URL</th>
                                    <th>Processed</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Data will be populated here by DataTables -->
                                <?php
                                // log_message('info', 'Marketing\Blog\Listing-Table L47 - getBlogPosts: ' . (print_r($getBlogPosts, true)));
                                if (empty($userGoals)) {
                                    echo '                                    
                                    <tr>
                                        <td class="d-none"></td>
                                        <td>N/A</td>
                                        <td>N/A</td>
                                        <td>N/A</td>
                                        <td><button class="btn btn-primary btn-badge" onclick="">Details</button></td>
                                    </tr>
                                    ';
                                } else { 
                                    foreach($userGoals as $goals) {
                                            echo '
                                        <tr>
                                            <td class="d-none">' . $goals['id'] . '</td>
                                            <td>' . $goals['category'] . '</td>
                                            <td>' . $goals['goal_description'] . '</td>
                                            <td>0 Goals</td>
                                            <td><button class="btn btn-primary btn-badge" onclick="">Details</button></td>
                                        </tr>
                                            ';
                                    } 
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
$(document).ready(function() {

    $('#userGoalsOverview').DataTable({
        order: [[3, "desc"], [0, "desc"]],
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]]
    });
});

function summarizeArticle(articleId) {
    $.ajax({
        url: '<?php echo site_url('/Management/Marketing/summarizeArticle/'); ?>' + articleId,
        type: 'GET',
        success: function(response) {
            // Handle the response containing the summarized content
            // Example: Display the response in a modal, redirect to an edit page, etc.
        },
        error: function(error) {
            // Handle errors
        }
    });
}

</script>