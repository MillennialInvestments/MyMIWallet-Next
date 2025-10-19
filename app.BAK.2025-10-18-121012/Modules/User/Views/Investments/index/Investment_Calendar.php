<!-- User/views/Investments/index/Economic_Calendar_Table.php -->
<?php 
$economicCalendar = $investDashboard['economicCalendar'] ?? []; // Retrieve the economic calendar array

// log_message('debug', 'Investments\index\Economic_Calendar_Table - $economicCalendar: ' . (print_r($economicCalendar, true)));
?>
<div class="h-100 card card-bordered">
    <div class="card-inner-group">
        <div class="card-inner card-inner-md">
            <div class="card-title-group">
                <div class="card-title">
                    <h6 class="title">Economic Calendar</h6>
                </div>
            </div>
        </div>
        <div class="card-inner">
            <?php if (!empty($economicCalendar)) : ?>
                <table id="economic-calendar-table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Event Type</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($economicCalendar as $event) : ?>
                            <tr>
                                <td><?= htmlspecialchars($event['event_type']); ?></td>
                                <td><?= date('M d, Y', strtotime($event['date'])); ?></td>
                                <td><?= date('h:i A', strtotime($event['event_time'])); ?></td>
                                <td><?= !empty($event['description']) ? htmlspecialchars($event['description']) : 'No additional details available.'; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <p>No upcoming economic events to display.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
    $(document).ready(function() {
        // Initialize DataTables
        $('#economic-calendar-table').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            "info": true,
            "order": [[1, "asc"]], // Default sort by date
            "language": {
                "emptyTable": "No economic events available"
            }
        });
    });
</script>

