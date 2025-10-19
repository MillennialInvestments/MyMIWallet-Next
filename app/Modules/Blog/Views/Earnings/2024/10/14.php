<!-- app/Modules/Blog/Views/Earnings/2024/10/14.php -->
<?php
$subViewData = [
]; 
?>
<style <?= $nonce['style'] ?? '' ?>>
    .intro-banner{
        background: url(<?php echo base_url('assets/images/MyMI-Walllet-Background.jpeg'); ?>) no-repeat center center fixed; 
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }
    .intro-banner .version {background-color: #3E61BC;}
    .intro-overview ul {justify-content:normal;}
    .list-checked > li {color: #364A63; font-size: 1.125rem;} 
    .list-blue-header {color: #3E61BC}    
    .fixed-size {
        width: 150px; /* Set a fixed width for the image container */
        height: 75px; /* Set a fixed height for the image container */
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 0.75rem !important;
    }

    .uniform-image {
        object-fit: contain; /* Ensures the image retains its aspect ratio and fits within the container */
        width: 100%; /* Scale image to 100% of the container's width */
        height: 100%; /* Scale image to 100% of the container's height */
    }
    /* Ensure a fixed size for content blocks */
    .intro-feature-item {
        height: 500px; /* Fixed height for each block */
        display: flex;
        flex-direction: column;
        justify-content: space-between; /* Evenly distribute content within */
        padding: 1rem;
        border: 1px solid #ddd; /* Optional for visibility */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Optional for style */
        margin-bottom: 1.5rem;
    }

    .intro-feature-info h4.title {
        font-size: 1.25rem;
        font-weight: bold;
    }

    /* Ensure that text content and buttons are aligned */
    .intro-feature-info p {
        margin-bottom: 0.75rem; /* Spacing between paragraphs */
        overflow: hidden;
        /* text-overflow: ellipsis; Add ellipsis for overflowed text */
        /* white-space: nowrap; Prevent text from wrapping */
    }

    /* Set fixed height for button row to ensure consistent alignment */
    .intro-feature-item .row:last-child {
        margin-top: auto; /* Push buttons to the bottom */
    }

    /* Optional: Add a hover effect */
    .intro-feature-item:hover {
        transform: scale(1.02);
        transition: 0.3s ease-in-out;
    }
    /* Intro feature item for sector summary - dynamic height */
    .sector-feature-item {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        padding: 1rem;
        border: 1px solid #ddd; /* Optional for visibility */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Optional for style */
        margin-bottom: 1.5rem;
    }

    /* Title styling */
    .sector-feature-info h4.title {
        font-size: 1.25rem;
        font-weight: bold;
        margin-bottom: 0.75rem;
    }

    /* Ensure that text content and lists are aligned */
    .sector-feature-info ul {
        padding-left: 1.25rem;
        margin-bottom: 1rem; /* Adjust as needed */
    }

    .sector-feature-info li {
        margin-bottom: 0.5rem;
    }

    /* Ensure images are responsive */
    .modal-body img {
        width: 100%;
        height: auto;
        max-width: 100%; /* Prevents overflow */
    }

    /* Make modal body scrollable if content overflows */
    .modal-body {
        max-height: 80vh; /* Set max height to 80% of the viewport height */
        overflow-y: auto; /* Enable vertical scrolling if content is too tall */
    }
    .modal-body p {
        color: dark; 
    }

</style>
<div class="intro-section intro-feature bg-white">
    <div class="container container-xl">
        <!-- Header Section -->
        <div class="row justify-content-center">
            <div class="col-lg-9 col-xl-7">
                <div class="intro-section-title text-center">
                    <span class="overline-title">Market Insights</span>
                    <h2 class="intro-heading-lead title">Earnings Week: Key Reports to Watch</h2>
                    <div class="intro-section-desc">
                        <p>
                            As we dive into Earnings Week, major companies from different sectors like tech, finance, and healthcare are set to release their reports. These updates provide key insights that can help shape investment strategies and guide market movements. Stay ahead by exploring these critical reports.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Combined Key Companies to Watch and Market Reactions Overview -->
        <div class="row justify-content-center mb-5">
            <div class="col-xl-12">
                <div class="row justify-content-center intro-feature-list">
                    <div class="col-lg-12">
                        <!-- Image block with dynamic sizing -->
                        <div class="intro-feature-media" class="w-100 h-auto">
                            <img class="img-responsive" src="<?php echo base_url('assets/images/Earnings/' . $earningsDate . '/Earnings.jpeg'); ?>" alt="Corporate Earnings Calendar <?= $earningsDate; ?>" class="object-fit-contain">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Combined Key Companies to Watch and Market Reactions Overview -->
        <div class="row justify-content-center mb-5">
            <div class="col-xl-12">
                <div class="row justify-content-center intro-feature-list">
                    <?php foreach ($companies as $index => $company): ?>
                        <div class="col-sm-6 col-lg-4">
                            <div class="intro-feature-item">
                                <div class="intro-feature-info">
                                    <div class="row">
                                        <div class="col">
                                            <h4 class="title">
                                                <?php echo $company['name']; ?> (<?php echo $company['symbol']; ?>)
                                                <?php if ($company['up_down'] == 'up'): ?>
                                                    <span class="text-success"><?php echo $company['percent_gain_loss']; ?>&#x25B2;</span> <!-- Up arrow -->
                                                <?php elseif ($company['up_down'] == 'down'): ?>
                                                    <span class="text-danger"><?php echo $company['percent_gain_loss']; ?>&#x25BC;</span> <!-- Down arrow -->
                                                <?php endif; ?>
                                            </h4>
                                            <p><?php echo htmlspecialchars($company['description'], ENT_QUOTES, 'UTF-8'); ?></p>
                                            <p><strong>Open Price:</strong> <?php echo $company['open_price']; ?></p>
                                            <p><strong>Close Price:</strong> <?php echo $company['close_price']; ?></p>                                            
                                            <?php if ($company['up_down'] == 'up'): ?>
                                                    <p><strong>Percent Change: <span class="text-success"><?php echo $company['percent_gain_loss']; ?>&#x25B2;</span></strong></p> <!-- Up arrow -->
                                                <?php elseif ($company['up_down'] == 'down'): ?>
                                                    <p><strong>Percent Change: <span class="text-danger"><?php echo $company['percent_gain_loss']; ?>&#x25BC;</span></strong></p> <!-- Down arrow -->
                                                <?php else:?>
                                                    <p><strong>Percent Change: <span>0%</span></strong></p> <!-- Down arrow -->
                                                <?php endif; ?>
                                            <p><strong>Earnings Date:</strong> <?php echo $company['earnings_date']; ?></p>

                                            <!-- Market Reaction, if available -->
                                            <?php if (!empty($company['market_reaction'])): ?>
                                                <div class="market-reaction mt-3">
                                                    <h5 class="text-primary">Market Reaction:</h5>
                                                    <p><?php echo $company['market_reaction']; ?></p>
                                                </div>
                                            <?php else: ?>
                                                <div class="market-reaction mt-3">
                                                    <h5 class="text-primary">Market Reaction:</h5>
                                                    <p>-- Information Not Available Yet --</p>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <!-- Button to trigger the modal for the chart -->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#chartModal<?php echo $index; ?>">
                                            View Chart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Structure for the Chart -->
                        <div class="modal fade" id="chartModal<?php echo $index; ?>" tabindex="-1" role="dialog" aria-labelledby="chartModalLabel<?php echo $index; ?>" aria-hidden="true">
                            <div class="modal-dialog modal-xl" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="chartModalLabel<?php echo $index; ?>"><?php echo $company['name']; ?> Chart</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <!-- Image block with dynamic sizing -->
                                                <div class="intro-feature-media" style="width: 25%; max-width: 100%; height: auto;">
                                                    <img class="img-fluid" src="<?php echo base_url('assets/images/Earnings/' . $earningsDate . '/' . $company['image']); ?>" alt="<?php echo $company['name']; ?>" class="w-100 h-auto">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <h1><?= $company['name'] . ' (' . $company['symbol'] . ')'; ?></h1>
                                                <h2>Market Overview & Insight</h2>
                                                <p class="text-dark"><?php echo htmlspecialchars($company['description'], ENT_QUOTES, 'UTF-8'); ?></p>

                                                <!-- Market reaction section -->
                                                <img id="chartImage<?php echo $index; ?>" class="img img-responsive" src="<?php echo base_url($company['chart_image']); ?>" alt="<?php echo $company['name']; ?> Chart" class="w-100 h-auto">

                                                <p><strong>Percent Change:</strong> <?php echo $company['percent_gain_loss']; ?>
                                                    <?php if ($company['up_down'] == 'up'): ?>
                                                        <span class="text-success">&#x25B2;</span> <!-- Up arrow -->
                                                    <?php elseif ($company['up_down'] == 'down'): ?>
                                                        <span class="text-danger">&#x25BC;</span> <!-- Down arrow -->
                                                    <?php endif; ?>
                                                </p>
                                                <p><strong>Open Price:</strong> <?php echo $company['open_price']; ?></p>
                                                <p><strong>Close Price:</strong> <?php echo $company['close_price']; ?></p>
                                                <p><strong>Earnings Date:</strong> <?php echo $company['earnings_date']; ?></p>

                                                <?php if (!empty($company['market_reaction'])): ?>
                                                    <div class="market-reaction mt-3">
                                                        <h5 class="text-primary">Market Reaction:</h5>
                                                        <p><?php echo $company['market_reaction']; ?></p>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <!-- Fullscreen Button -->
                                        <button type="button" class="btn btn-success" onclick="expandToFullScreen('chartImage<?php echo $index; ?>')">
                                            <em class="icon ni ni-maximize"></em>
                                        </button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <hr>
        <!-- Dynamic Sector Information -->
        <?php
        $sectors_summary = []; // Initialize empty array to store sector summaries

        // Loop through companies to generate sector data dynamically
        foreach ($companies as $company) {
            $sector = $company['sector'];
            
            // Group the companies under each sector and compile sector descriptions
            if (!isset($sectors_summary[$sector])) {
                $sectors_summary[$sector] = [
                    'title' => $sector,
                    'companies' => [],
                    'total_description_length' => 0, // Track total description length for sorting
                    'up_count' => 0, // Track the number of "up" companies
                    'down_count' => 0, // Track the number of "down" companies
                ];
            }

            // Count the number of up and down arrows for the sector
            if ($company['up_down'] == 'up') {
                $sectors_summary[$sector]['up_count']++;
            } elseif ($company['up_down'] == 'down') {
                $sectors_summary[$sector]['down_count']++;
            }

            $description_length = strlen($company['description']);
            
            // Add company to the sector's company list
            $sectors_summary[$sector]['companies'][] = [
                'name' => $company['name'],
                'description' => $company['description'],
                'symbol' => $company['symbol'],
                'description_length' => $description_length, // Track individual description length
            ];
            
            // Add the description length to the total for the sector
            $sectors_summary[$sector]['total_description_length'] += $description_length;
        }

        // Sort sectors by total description length in descending order
        usort($sectors_summary, function($a, $b) {
            return $b['total_description_length'] <=> $a['total_description_length'];
        });
        ?>

        <!-- Sector Information with Consensus Arrows -->
        <div class="row justify-content-center mt-5">
            <?php foreach ($sectors_summary as $sector): ?>
                <div class="col-sm-6 col-lg-4">
                    <div class="sector-feature-item">
                        <div class="sector-feature-info">
                            <h4 class="title">
                                <?php echo $sector['title']; ?>:
                                <?php
                                // Calculate overall sector trend
                                if ($sector['up_count'] > $sector['down_count']): ?>
                                    <span class="text-success">&#x25B2;</span> <!-- Up arrow -->
                                <?php elseif ($sector['down_count'] > $sector['up_count']): ?>
                                    <span class="text-danger">&#x25BC;</span> <!-- Down arrow -->
                                <?php else: ?>
                                    <span class="text-success">&#x25B2;</span> <!-- Both up and down arrows -->
                                    <span class="text-danger">&#x25BC;</span>
                                <?php endif; ?>
                            </h4>
                            <ul>
                                <?php foreach ($sector['companies'] as $sector_company): ?>
                                    <li><?php echo $sector_company['name'] . ' (' . $sector_company['symbol'] . '): ' . $sector_company['description']; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>


        <div class="row justify-content-center mt-5">
            <div class="container text-center py-2">
                <h2 class="title">Stay Informed on Earnings Week</h2>
                <p>Stay ahead of the market with our real-time updates and detailed analysis. Make informed investment decisions by tracking the latest earnings reports across industries.</p>
                <a href="<?php echo site_url('/Blog/subscribe'); ?>" class="btn btn-primary">Subscribe for Updates</a>
            </div>
        </div>
        <hr>
        <div class="row justify-content-center mt-5">
            <div class="col-lg-9 col-xl-7">
                <div class="intro-section-title text-center">
                    <h4 class="overline-title">Getting Started at MyMI Wallet!</h4>
                    <h2 class="intro-heading-lead title">Learn What You Earn At MyMI Wallet!</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="container text-center">
                <div class="row justify-content-center">
                    <div class="col-10 col-offset-1">
                        <?php echo view('themes/public/resources/ytPromoVideo', $subViewData); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <?php echo view('Views/themes/public/resources/stayConnected', $subViewData); ?>
</div>

<script <?= $nonce['script'] ?? '' ?>>
// Function to open the image in full screen
function expandToFullScreen(imageId) {
    var image = document.getElementById(imageId);
    if (image.requestFullscreen) {
        image.requestFullscreen();
    } else if (image.mozRequestFullScreen) { // Firefox
        image.mozRequestFullScreen();
    } else if (image.webkitRequestFullscreen) { // Chrome, Safari and Opera
        image.webkitRequestFullscreen();
    } else if (image.msRequestFullscreen) { // IE/Edge
        image.msRequestFullscreen();
    }
}
</script>
