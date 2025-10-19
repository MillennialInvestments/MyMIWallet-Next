<?php 
$corporateEarnings = $corporateEarnings ?? []; // Retrieve the economic calendar data

// Get the current date and calculate the range for the next 7 days
$startDate = date('Y-m-d');
$endDate = date('Y-m-d', strtotime('+7 days'));

// Filter events for the next week and for earnings
$nextWeekEarnings = array_filter($corporateEarnings, function ($event) use ($startDate, $endDate) {
    return $event['event_type'] === 'Earnings' &&
           $event['date'] >= $startDate &&
           $event['date'] <= $endDate;
});

//log_message('info', 'public/corporateEarnings.php L15 - $nextWeekEarnings: ' . (print_r($nextWeekEarnings, true)));
// Extract unique symbols for the next week
$symbols = array_unique(array_column($nextWeekEarnings, 'symbol'));
//log_message('info', 'public/corporateEarnings.php L19 - $symbols: ' . (print_r($symbols, true)));
$nonce = $nonce ?? ['style' => '', 'script' => ''];
$subViewData = [
    'socialMediaLinks' => $socialMediaLinks ?? [],
    'contactEmail' => $contactEmail ?? '',
    'contactPhone' => $contactPhone ?? '',
    'newsletterSignup' => $newsletterSignup ?? false,   
    'nonce' => $nonce
];
?>

<style <?= $nonce['style'] ?? '' ?>>
    .intro-section {
        padding: 2rem 0;
    }

    .section-title {
        text-align: center;
        margin-bottom: 2rem;
    }

    .table-container {
        overflow-x: auto;
    }

    .promotion-card {
        background: #f9f9f9;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 20px;
        text-align: center;
    }
</style>

<div class="bg-light mt-3 pt-3 pt-xl-3 pb-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= site_url('/'); ?>">Home</a></li>
                    <li class="breadcrumb-item text-primary active" aria-current="page">Corporate Earnings</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="intro-section bg-light">
    <div class="container">
        <div class="section-title">
            <h1 class="title">Corporate Earnings</h1>
            <p>Track corporate earnings, including financial, fundamental, and technical analysis.</p>
        </div>
    </div>
</div>

<div class="container py-5">
    <?php /*
    <!-- Earnings Section -->
    <div class="row mb-5">
        <div class="col-12">
            <?php if (!empty($symbols)) : ?>
                <h2>Upcoming Earnings</h2>
                <div class="d-flex flex-wrap justify-content-center">
                    <?php foreach ($symbols as $symbol) : ?>
                        <?php 
                        $logoPath = "/assets/logos/{$symbol}.png"; 
                        if (!file_exists(FCPATH . $logoPath)) {
                            $logoPath = "/assets/logos/default.png"; // Fallback image
                        }
                        ?>
                        <div class="text-center mx-3">
                            <img src="<?= base_url($logoPath); ?>" alt="<?= $symbol; ?>" class="img-fluid" style="width: 100px;">
                            <p class="mt-2"><?= htmlspecialchars($symbol); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else : ?>
                <p>No earnings reports found for the next week.</p>
            <?php endif; ?>
        </div>
    </div>
    */ ?>

    <!-- Economic Calendar Table -->
    <div class="row mb-5">
        <div class="col-12 table-container">
            <h2>Upcoming Earnings</h2>
            <?php if (!empty($corporateEarnings)) : ?>
                <table id="earnings-calendar-table" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Event Type</th>
                            <th>Symbol</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php //log_message('info', 'Views/public/corporateEarnings.php L105: $corporateEarnings: ' . (print_r($corporateEarnings, true); ?>
                        <?php foreach ($corporateEarnings as $event) : ?>
                            <tr>
                                <td class="d-none"><?= date('Y-m-d H:i A', strtotime($event['date'] . ' ' . $event['event_time'])); ?></td>
                                <td><?= date('M d, Y', strtotime($event['date'])); ?></td>
                                <td><?= date('h:i A', strtotime($event['event_time'])); ?></td>
                                <td><?= htmlspecialchars($event['event_type']); ?></td>
                                <td><?= htmlspecialchars($event['symbol']); ?></td>
                                <td><?= htmlspecialchars($event['description'] ?? 'No details available.'); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <p>No upcoming events available at this time. Check back later for updates.</p>
            <?php endif; ?>
        </div>
    </div>
    <hr class="mb-3">
    <!-- Promotions Section -->
    <div class="row">
        <div class="col-md-6">
            <div class="promotion-card">
                <h3>Register for MyMI Wallet Today!</h3>
                <p>Gain access to comprehensive tools and insights to manage your finances effectively.</p>
                <a href="<?= site_url('/register'); ?>" class="btn btn-primary">Register Now</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="promotion-card">
                <h3>Special Promotions</h3>
                <p>Explore our latest offers to achieve your financial goals.</p>
                <a href="<?= site_url('/Promotions'); ?>" class="btn btn-success">Save More!</a>
            </div>
        </div>
    </div>
</div>

<?php echo view('Views/themes/public/resources/stayConnected', $subViewData); ?>
</div>
<script <?= $nonce['script'] ?? '' ?>>
    $(document).ready(function() {
        $('#earnings-calendar-table').DataTable({
            paging: true,
            searching: true,
            ordering: true,
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
            pageLength: 10,
            info: true,
            order: [[0, "asc"]],
            language: {
                emptyTable: "No economic events available"
            }
        });
    });
</script>
