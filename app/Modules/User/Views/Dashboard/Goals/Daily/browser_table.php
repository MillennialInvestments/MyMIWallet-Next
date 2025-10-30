<?php 
$userGoals = $pendingGoals;
$userCompletions = $completedGoals;
?>
<div class="card card-bordered h-100">';
    <div class="card-inner px-2 px-lg-4 pt-xl-0">
        <div class="nk-order-ovwg">
            <div class="row g-4 align-end">
                <div class="col-12 mt-0">
                    <div class="tab-content">
                        <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="nk-content-body pt-0">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">MyMI Gold - Daily Checklist</h3>
                                            <div class="nk-block-des text-soft">
                                                <p>Earn <strong>FREE</strong> MyMI Gold to gain access to Premium Services & Tools.</p>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                        <!-- <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                                <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-bs-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                                <div class="toggle-expand-content" data-content="pageMenu">
                                                    <ul class="nk-block-tools g-3">
                                                        <li>
                                                            <div class="drodown">
                                                                <a href="#" class="dropdown-toggle btn btn-white btn-dim btn-outline-light" data-bs-toggle="dropdown"><em class="d-none d-sm-inline icon ni ni-filter-alt"></em><span>Filtered By</span><em class="dd-indc icon ni ni-chevron-right"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a href="#"><span>Open</span></a></li>
                                                                        <li><a href="#"><span>Closed</span></a></li>
                                                                        <li><a href="#"><span>Onhold</span></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        <li class="nk-block-tools-opt d-none d-sm-block">
                                                            <a href="#" class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Add Project</span></a>
                                                        </li>
                                                        <li class="nk-block-tools-opt d-block d-sm-none">
                                                            <a href="#" class="btn btn-icon btn-primary"><em class="icon ni ni-plus"></em></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div> --><!-- .toggle-wrap -->
                                        <!--</div> --><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="card card-bordered card-stretch">
                                        <div class="card-inner-group">
                                            <div class="card-inner p-0">
                                                <table class="nk-tb-list nk-tb-ulist">
                                                    <thead>
                                                        <tr class="nk-tb-item nk-tb-head">
                                                            <th class="nk-tb-col nk-tb-col-check">
                                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                                    <input type="checkbox" class="custom-control-input" id="pid-all">
                                                                    <label class="custom-control-label" for="pid-all"></label>
                                                                </div>
                                                            </th>
                                                            <th class="nk-tb-col tb-col-xxl"><span class="sub-text">Status</span></th>
                                                            <th class="nk-tb-col"><span class="sub-text">Gold Rewards</span></th>
                                                            <th class="nk-tb-col tb-col-xxl"><span class="sub-text">Category</span></th>
                                                            <!-- <th class="nk-tb-col tb-col-md"><span class="sub-text">Progress</span></th> -->
                                                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">Earn</span></th>
                                                            <!-- <th class="nk-tb-col nk-tb-col-tools text-end">
                                                                <div class="dropdown">
                                                                    <a href="#" class="btn btn-xs btn-trigger btn-icon dropdown-toggle me-n1" data-bs-toggle="dropdown" data-offset="0,5"><em class="icon ni ni-more-h"></em></a>
                                                                    <div class="dropdown-menu dropdown-menu-end">
                                                                        <ul class="link-list-opt no-bdr">
                                                                            <li><a href="#"><em class="icon ni ni-check-round-cut"></em><span>Mark As Done</span></a></li>
                                                                            <li><a href="#"><em class="icon ni ni-archive"></em><span>Mark As Archive</span></a></li>
                                                                            <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Projects</span></a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </th> -->
                                                        </tr><!-- .nk-tb-item -->
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        // Fetch completed goals from bf_users_goal_completions table
                                                        $completedGoals = array_column($userCompletions, 'goal_id');
                                                        $nextGoal = null;
                                                        
                                                        // Find the next goal that hasn't been completed
                                                        foreach ($userGoals as $goals) {
                                                            if (!in_array($goals['id'], $completedGoals)) {
                                                                $nextGoal = $goals;
                                                                break;
                                                            }
                                                        }
                                                        
                                                        if ($nextGoal) { ?>
                                                            <tr class="nk-tb-item">
                                                                <td class="nk-tb-col nk-tb-col-check">
                                                                    <div class="custom-control custom-control-sm custom-checkbox notext">
                                                                        <input type="checkbox" class="custom-control-input" id="pid-01">
                                                                        <label class="custom-control-label" for="pid-01"></label>
                                                                    </div>
                                                                </td>
                                                                <td class="nk-tb-col tb-col-xxl">
                                                                    <span>Not Started</span>
                                                                </td>
                                                                <td class="nk-tb-col tb-col-xxl">
                                                                    <a href="html/apps-kanban.html" class="project-title">
                                                                        <div class="user-avatar sq bg-blue"><span><?php echo number_format($nextGoal['gold_reward'],0); ?></span></div>
                                                                        <div class="project-info">
                                                                            <h6 class="title">MyMI Gold</h6>
                                                                        </div>
                                                                    </a>
                                                                </td>
                                                                <td class="nk-tb-col tb-col-xxl">
                                                                    <span><?php echo $nextGoal['category']; ?></span>
                                                                </td>                                                               
                                                                <!-- <td class="nk-tb-col tb-col-md">
                                                                    <div class="project-list-progress">
                                                                        <div class="progress progress-pill progress-md bg-light">
                                                                            <div class="progress-bar" data-progress="0"></div>
                                                                        </div>
                                                                        <div class="project-progress-percent">0%</div>
                                                                    </div>
                                                                </td> -->
                                                                <td class="nk-tb-col tb-col-mb">
                                                                    <a class="badge badge-dim bg-primary" data-bs-toggle="collapse" href="#collapseExample<?php echo $nextGoal['id']; ?>" aria-expanded="false" aria-controls="collapseExample"><em class="icon ni ni-clock"></em><span>Start</span></a>
                                                                </td>
                                                            </tr><!-- .nk-tb-item -->
                                                            <tr class="collapse" id="collapseExample<?php echo $nextGoal['id']; ?>">
                                                                <td colspan="7">
                                                                    <div class="card card-body">
                                                                        <h6>Goal Description: <small><?php echo $nextGoal['goal_description']; ?></small></h6> 
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>

                                                </table><!-- .nk-tb-list -->
                                            </div><!-- .card-inner -->
                                            <?php /*
                                            <div class="card-inner">
                                                <div class="nk-block-between-md g-3">
                                                    <div class="g">
                                                        <ul class="pagination justify-content-center justify-content-md-start">
                                                            <li class="page-item"><a class="page-link" href="#">Prev</a></li>
                                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                            <li class="page-item"><span class="page-link"><em class="icon ni ni-more-h"></em></span></li>
                                                            <li class="page-item"><a class="page-link" href="#">6</a></li>
                                                            <li class="page-item"><a class="page-link" href="#">7</a></li>
                                                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                                        </ul><!-- .pagination -->
                                                    </div>
                                                    <div class="g">
                                                        <div class="pagination-goto d-flex justify-content-center justify-content-md-start gx-3">
                                                            <div>Page</div>
                                                            <div>
                                                                <select class="form-select js-select2" data-search="on" data-dropdown="xs center">
                                                                    <option value="page-1">1</option>
                                                                    <option value="page-2">2</option>
                                                                    <option value="page-4">4</option>
                                                                    <option value="page-5">5</option>
                                                                    <option value="page-6">6</option>
                                                                    <option value="page-7">7</option>
                                                                    <option value="page-8">8</option>
                                                                    <option value="page-9">9</option>
                                                                    <option value="page-10">10</option>
                                                                    <option value="page-11">11</option>
                                                                    <option value="page-12">12</option>
                                                                    <option value="page-13">13</option>
                                                                    <option value="page-14">14</option>
                                                                    <option value="page-15">15</option>
                                                                    <option value="page-16">16</option>
                                                                    <option value="page-17">17</option>
                                                                    <option value="page-18">18</option>
                                                                    <option value="page-19">19</option>
                                                                    <option value="page-20">20</option>
                                                                </select>
                                                            </div>
                                                            <div>OF 102</div>
                                                        </div>
                                                    </div><!-- .pagination-goto -->
                                                </div><!-- .nk-block-between -->
                                            </div> --><!-- .card-inner -->
                                            */
                                            ?>
                                        </div><!-- .card-inner-group -->
                                    </div><!-- .card -->
                                </div><!-- .nk-block -->
                            </div>                            
                        </div>                                        
                        <div class="tab-pane" id="original" role="tabpanel" aria-labelledby="original-tab">                                        
                            <style <?= $nonce['style'] ?? '' ?>>
                                /* Custom scrollbar for table */
                                .table-responsive::-webkit-scrollbar {
                                height: 8px;
                                }

                                .table-responsive::-webkit-scrollbar-thumb {
                                background: #888;
                                border-radius: 4px;
                                }

                                .table-responsive::-webkit-scrollbar-thumb:hover {
                                background: #555;
                                }

                            </style>
                            <div>
                                <table class="table table-default budgeting-table default" id="userDailyGoalsDatatable">
                                    <thead>
                                        <tr>
                                            <th class="d-none"></th>
                                            <th></th>
                                            <th>Goal</th>
                                            <th>Description</th>
                                            <th>Progress</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // log_message('info', 'Dashboard\Goals\Daily\browser_table L82 - $userDashboard: ' . (print_r($userDashboard, true)));
                                        foreach ($pendingGoals as $goal) {
                                            ?>
                                            <tr>
                                                <td class="d-none"><?php echo $goal['id']; ?></td>
                                                <td><em class="icon ni ni-square"></em></td>
                                                <td><?php echo $goal['category']; ?></td>
                                                <td><?php echo $goal['goal_description']; ?></td>
                                                <td><?php echo $goal['start_date']; ?></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <script <?= $nonce['script'] ?? '' ?>>
                            $(document).ready(function() {
                                var table = $('#userDailyGoalsDatatable').DataTable({
                                    "order": [[ 0, "asc" ]],     
                                    "lengthMenu": [[25, 50, 100, 500, -1], [25, 50, 100, 500, "All"]],
                                    "columnDefs": [
                                        {
                                            "targets": [ 0 ], // Assuming column 1 is the hidden column for Account Type (Income/Expense)
                                            "visible": false,
                                        }
                                    ],
                                    "drawCallback": function(settings) {
                                        var api = this.api();
                                        var subtotal = 0;
                                    }
                                });
                            });
                            </script>
                        </div>
                        <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .nk-order-ovwg -->
    </div><!-- .card-inner -->
</div><!-- .card -->