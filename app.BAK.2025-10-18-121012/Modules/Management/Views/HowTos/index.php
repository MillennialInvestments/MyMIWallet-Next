<?php 
// Management Module Configurations
$actionItems = $siteSettings->managementActionItems; 
$currentDate = $siteSettings->date;
$currentMonth = $siteSettings->month;
$currentYear = $siteSettings->year;
$completedTasks = 5; // Placeholder for completed task count
$totalTasks = 10; // Placeholder for total tasks count
$averageCompletionTime = "4 hrs 15 mins"; // Example for average time

?>
<div class="nk-block">
    <div class="nk-content-body">
        <div class="row">
            <div class="col-lg-12 col-xl-12">
                <div class="nk-block">
                    <div class="nk-block-head-xs">
                        <div class="nk-block-head-content">
                            <h1 class="nk-block-title title">How-To Dashboard Management</h1>
                            <a href="<?php echo site_url('/Dashboard'); ?>">Back to Main Dashboard</a>
                        </div>
                    </div>
                </div>
                <div class="nk-block">
                    <div class="row">
                        <!-- Overview Card -->
                        <div class="col-lg-6">
                            <div class="card card-bordered h-100">
                                <div class="card-inner">
                                    <div class="card-title-group">
                                        <h6 class="title">Current Task Overview</h6>
                                        <p>Details and progress of ongoing tasks.</p>
                                    </div>
                                    <div class="row g-4 align-center">
                                        <div class="col-xxl-6">
                                            <div class="nk-order-ovwg-data">
                                                <div class="amount"><?php echo $completedTasks; ?> / <?php echo $totalTasks; ?></div>
                                                <div class="info">Tasks Completed</div>
                                                <div class="title"><em class="icon ni ni-check-round"></em> Completion Status</div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-6">
                                            <div class="nk-order-ovwg-data">
                                                <div class="amount"><?php echo $averageCompletionTime; ?></div>
                                                <div class="info">Average Completion Time</div>
                                                <div class="title"><em class="icon ni ni-clock"></em> Time Management</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Task Center Card -->
                        <div class="col-lg-6">
                            <div class="card card-bordered h-100">
                                <div class="card-inner-group">
                                    <div class="card-inner card-inner-md">
                                        <div class="card-title-group">
                                            <h6 class="title">Task Center</h6>
                                        </div>
                                    </div>
                                    <div class="card-inner">
                                        <div class="nk-wg-action">
                                            <div class="nk-wg-action-content">
                                                <em class="icon ni ni-task"></em>
                                                <div class="title">Manage Your Tasks</div>
                                                <p>Overview and management of active tasks in the system.</p>
                                            </div>
                                            <a href="<?php echo site_url('/Management/HowTo/Tasks'); ?>" class="btn btn-icon btn-trigger me-n2"><em class="icon ni ni-forward-ios"></em></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Task Analysis Card -->
                <div class="nk-block">
                    <div class="row">
                        <div class="<?php echo $actionItems; ?>">
                            <div class="card card-bordered h-100">
                                <div class="card-inner">
                                    <div class="project">
                                        <div class="project-head">
                                            <a href="<?php echo site_url('Management/How-Tos/Employees/Account-Setup'); ?>" class="project-title">
                                                <div class="user-avatar sq bg-warning"><span>TA</span></div>
                                                <div class="project-info">
                                                    <h6 class="title">Employee Account Setup</h6>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="project-details">
                                            <p>Get Access to all MyMI Wallet Employee Resources.</p>
                                            <a href="<?php echo site_url('Management/How-Tos/Employees/Account-Setup'); ?>" class="btn btn-primary btn-sm">View</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="<?php echo $actionItems; ?>">
                            <div class="card card-bordered h-100">
                                <div class="card-inner">
                                    <div class="project">
                                        <div class="project-head">
                                            <a href="<?php echo site_url('/Management/How-Tos/Employees/Email-Setup'); ?>" class="project-title">
                                                <div class="user-avatar sq bg-warning"><span>TA</span></div>
                                                <div class="project-info">
                                                    <h6 class="title">Employee Email Setup</h6>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="project-details">
                                            <p>Add your company email to your Mobile Phone Email Apps.</p>
                                            <a href="<?php echo site_url('/Management/How-Tos/Employees/Email-Setup'); ?>" class="btn btn-primary btn-sm">View</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="<?php echo $actionItems; ?>">
                            <div class="card card-bordered h-100">
                                <div class="card-inner">
                                    <div class="project">
                                        <div class="project-head">
                                            <a href="<?php echo site_url('Management/HowTo/Reports'); ?>" class="project-title">
                                                <div class="user-avatar sq bg-info"><span>HR</span></div>
                                                <div class="project-info">
                                                    <h6 class="title">How-To Reports</h6>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="project-details">
                                            <p>Generate and review comprehensive reports on current guides.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <script <?= $nonce['script'] ?? '' ?>>
    $(document).ready(function() {
        // Additional JavaScript for chart or table initializations
    });
</script> -->
