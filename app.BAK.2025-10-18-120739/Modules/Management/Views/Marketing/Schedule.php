<?php 
use App\Models\MarketingModel; 
$marketingModel = new MarketingModel(); 
$platformIcons = [
    'Facebook' => '<em class="icon myfs-md text-primary ni ni-facebook-f"></em>',
    'Instagram' => '<em class="icon myfs-md text-primary ni ni-instagram"></em>',
    'Twitter' => '<em class="icon myfs-md text-primary ni ni-twitter"></em>',
    'LinkedIn' => '<em class="icon myfs-md text-primary ni ni-linkedin-in"></em>',
    'TikTok' => '<em class="icon myfs-md text-primary ni ni-tiktok"></em>',
    'YouTube' => '<em class="icon myfs-md text-primary ni ni-youtube"></em>',
];
?>
<div class="nk-block">
    <div class="nk-content-body">
        <div class="row">
            <div class="col-12">
                <div class="nk-block nk-block-lg">
                    <div class="card card-bordered pb-4 pricing px-2">
                        <div class="pricing-head">
                            <div class="pricing-title text-center">
                                <h4 class="card-title title"><?php echo ucfirst($uri->getSegment(4)); ?> Marketing Tasks</h4>
                                <p class="sub-text">Detailed tasks for <?php echo ucfirst($uri->getSegment(4)); ?> to optimize our marketing efforts</p>
                            </div>
                        </div>
                        <div class="pricing-body">
                            <div class="container-fluid mb-5 mt-3">
                                <div class="text-end mb-3">
                                    <!-- <a href="#" class="btn btn-primary text-white dynamicModalLoader" data-formtype="Marketing" data-endpoint="addSchedule" data-accountid="1" data-category="Schedule" data-platform="Default" data-bs-toggle="modal" data-bs-target="#dynamicModal">
                                        <em class="icon ni ni-plus-circle"></em><span>Add New Schedule</span>
                                    </a> -->
                                    <a class="btn btn-primary" href="<?= site_url('Management/Marketing/Add/Schedule'); ?>"><em class="icon myfs-md ni ni-plus"></em><span>Add New Schedule</span></a>
                                </div>
                                <ul class="list-group">
                                    <?php if($scheduleByDay === 'Yes'): ?>
                                        <?php foreach($marketingSchedule as $task): ?>
                                            <li class="list-group-item">
                                                <strong><?php echo $task['time']; ?>:</strong>
                                                <p><?php echo $task['activity']; ?></p>
                                                <?php if($task['link']): ?>
                                                    <div class="d-flex justify-content-center">
                                                        <a class="btn btn-primary mx-1" href="<?php echo $task['link']; ?>" target="_blank">Action Link</a>
                                                    </div>
                                                <?php endif; ?>
                                            </li>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <table class="table table-bordered" id="scheduleTable">
                                            <thead>
                                                <tr>
                                                    <th class="d-none">ID</th>
                                                    <th>Post Date</th>
                                                    <th>Platforms</th>
                                                    <th>Content Subjects</th>
                                                    <th>Content Descriptions</th>
                                                    <th>More Actions..</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($marketingSchedule as $post): ?>
                                                    <tr>
                                                        <td class="d-none"><?= $post['id'] ?></td>
                                                        <td><?php echo date('F j, Y', strtotime($post['post_date'])); ?></td>
                                                        <td>
                                                            <?php
                                                            $platforms = explode(', ', $post['platforms']); // Split the concatenated platforms
                                                            foreach ($platforms as $platform) {
                                                                $generatedContent = $marketingModel->getGeneratedContent($post['id']);
                                                                // log_message('debug', 'Schedule L62: $post[Type]: ' . $post['type']); 
                                                                // $postType = isset($post['type']) ? htmlspecialchars($post['type']) : 'Default'; // Use 'default' or any fallback if 'type' is not set
                                                                $postType = 'Default'; 
                                                                // log_message('debug', 'Schedule L64: $postType: ' . $postType); 

                                                                if ($generatedContent) {
                                                                    // echo '<a href="#" class="dynamicModalLoader" data-formtype="Marketing" data-endpoint="generateScheduleContent" data-accountid="' . $post['id'] . '" data-category="' . $postType . '" data-platform="' . htmlspecialchars($platform) . '" data-bs-toggle="modal" data-bs-target="#dynamicModal">' . (isset($platformIcons[$platform]) ? $platformIcons[$platform] : htmlspecialchars($platform)) . '</a>';
                                                                } else {
                                                                    echo '<a href="' . base_url('Management/Marketing/Generate/' . $platform . '/Content/' . $post['id']) . '">' . (isset($platformIcons[$platform]) ? $platformIcons[$platform] : htmlspecialchars($platform)) . '</a>';
                                                                }
                                                            }
                                                            ?>
                                                        </td>
                                                        <td><?php echo isset($post['subjects']) ? htmlspecialchars($post['subjects']) : ''; ?></td>
                                                        <td><?php echo isset($post['descriptions']) ? htmlspecialchars($post['descriptions']) : ''; ?></td>
                                                        <td>
                                                            <?php if ($post['completed'] === 1): ?>
                                                                <a href="#"><em class="icon myfs-md text-success ni ni-check"></em></a>
                                                            <?php else: ?>
                                                                <?php
                                                                $postType = isset($post['type']) ? htmlspecialchars($post['type']) : 'Default'; // Fallback to 'Default' if 'type' is not set
                                                                $platformIcon = isset($platformIcons[$platform]) ? $platformIcons[$platform] : htmlspecialchars($platform);

                                                                echo '<a href="#" class=" btn btn-primary btn-md dynamicModalLoader" data-formtype="Marketing" data-endpoint="generateScheduleContent" data-accountid="' . $post['id'] . '" data-category="Default" data-platform="' . htmlspecialchars($platform) . '" data-bs-toggle="modal" data-bs-target="#dynamicModal">View</a>';
                                                                ?>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
$(document).ready(function() {
    $("#scheduleTable").DataTable({
        order: [[0, "asc"]],
        lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]]
    });

    // Open modal with dynamic content
    $('.open-modal').on('click', function(e) {
        e.preventDefault();
        var content = $(this).data('content');
        var imageLink = $(this).data('images');
        var voiceScript = $(this).data('voice');
        
        $('#modalContent').text(content);
        $('#modalImageLink').text(imageLink).attr('href', imageLink);
        $('#modalVoiceScript').text(voiceScript);
        
        $('#dynamicModal').modal('show');
    });
});
</script>
