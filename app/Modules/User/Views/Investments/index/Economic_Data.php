<?php 
$economicData = [];
if (is_array($economicData) && !empty($economicData)): 
?>
    <!-- Selectpicker Dropdown for Economic Data -->
    <!-- <select id="economicDataSelect" class="selectpicker" data-live-search="true">
        <option value="GDP">Gross Domestic Product (GDP)</option>
        <option value="UNRATE">Unemployment Rate</option>
        <option value="CPIAUCSL">Consumer Price Index for All Urban Consumers</option>
        <option value="PCE">Personal Consumption Expenditures</option>
        <option value="PAYEMS">Total Nonfarm Payrolls</option>
        <option value="FEDFUNDS">Effective Federal Funds Rate</option>
        <option value="T10Y2Y">10-Year Treasury Constant Maturity Minus 2-Year Treasury Constant Maturity</option>
        <option value="HOUST">Housing Starts</option>
        <option value="DGS10">10-Year Treasury Constant Maturity Rate</option>
        <option value="M2">M2 Money Stock</option>
        <option value="INDPRO">Industrial Production Index</option>
        <option value="U6RATE">Total Unemployed, Plus All Marginally Attached Workers, Plus Total Employed Part Time for Economic Reasons</option>
        <option value="PPIACO">Producer Price Index for All Commodities</option>
        <option value="RRSFS">Advance Retail Sales: Retail Trade and Food Services</option>
        <option value="BUSLOANS">Commercial and Industrial Loans, All Commercial Banks</option>
    </select> -->


    <!-- Search Input -->
    <!-- <input type="text" id="searchInput" placeholder="Search for Releases..." class="form-control"/>
    <div id="searchResults"></div> -->
<!-- application/modules/User/views/Investments/index/Insights.php -->
<div class="nk-block nk-block-lg">
    <div class="row g-gs">
        <!-- Active Trades Section -->
        <div class="col-lg-6">
            <!-- Displaying Economic Data -->
            <div class="card card-bordered economic-data-block nk-block">
                <div class="card-inner-group">
                    <div class="card-inner card-inner-md">
                        <div class="card-title-group">
                            <div class="card-title">
                                <h6 class="title">Today's News</h6>
                            </div>
                            <div class="card-tools me-n1">
                                <div class="drodown">
                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <ul class="link-list-opt no-bdr">
                                            <li><a href="#"><em class="icon ni ni-setting"></em><span>Action Settings</span></a></li>
                                            <li><a href="#"><em class="icon ni ni-notify"></em><span>Push Notification</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- .card-inner -->
                    <div class="card-inner card-inner-md">
                        <div class="economic-data-content" id="economicDataContainer">
                            <?php foreach ($economicData['seriess'] as $dataItem): ?>
                                <?php 
                                    // $this->load->model('User/investments_model');
                                    // Insert data into database and get the inserted ID
                                    $investmentModel = new App\Models\InvestmentModel;
                                    $insertedId = $investmentModel->insertEconomicData($dataItem);
                                ?>
                                <div class="kanban-item">
                                    <div class="kanban-item-title">
                                        <h6 class="title"><?php echo isset($dataItem['title']) ? $dataItem['title'] : 'Title Not Available'; ?></h6>
                                    </div>
                                    <div class="kanban-item-text">
                                        <p>
                                            <?php
                                            if (isset($dataItem['notes'])) {
                                                $summarizedData = $this->mymimarketing->summarize_content($dataItem['notes'], 1000);
                                                $summary = !empty($summarizedData['summary']) ? $summarizedData['summary'] : $summarizedData;
                                                // Update the database record with the summary
                                                $this->investments_model->updateEconomicDataSummary($insertedId, $summary);
                                                echo $summary ?: $this->mymimarketing->convertUrlsToLinks($dataItem['notes']);
                                            } else {
                                                echo 'Click below to read more!';
                                            }
                                            ?>
                                        </p>
                                    </div>
                                    <div class="social-interactions">
                                        <?php if (isset($dataItem['id'])): ?>
                                            <button class="btn btn-primary-outline like-btn" data-id="<?php echo $dataItem['id']; ?>">Like</button>
                                            <button class="btn btn-primary-outline share-btn" data-id="<?php echo $dataItem['id']; ?>">Share</button>
                                            <!-- <button class="btn btn-primary-outline comment-btn" data-id="<?php echo $dataItem['id']; ?>">Comment</button>
                                            <a class="btn btn-primary-outline" href="Investments/News/<?php echo $dataItem['id']; ?>">Read Full Release</a> -->
                                        <?php endif; ?>
                                    </div>
                                    <?php if (isset($dataItem['id'])): ?>
                                        <div class="comment-section d-none" id="comment-section-<?php echo $dataItem['id']; ?>"></div>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php else: ?>
<div class="nk-block nk-block-lg">
    <div class="row g-gs">
        <!-- Active Trades Section -->
        <div class="col-lg-12">
            <!-- Displaying Economic Data -->
            <div class="card card-bordered economic-data-block nk-block">
                <div class="card-inner-group">
                    <div class="card-inner card-inner-md">
                        <div class="card-title-group">
                            <div class="card-title">
                                <h6 class="title">Today's News</h6>
                            </div>
                            <div class="card-tools me-n1">
                                <div class="drodown">
                                    <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <ul class="link-list-opt no-bdr">
                                            <li><a href="#"><em class="icon ni ni-setting"></em><span>Action Settings</span></a></li>
                                            <li><a href="#"><em class="icon ni ni-notify"></em><span>Push Notification</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- .card-inner -->
                    <div class="card-inner card-inner-md">
                        <div class="economic-data-content" id="economicDataContainer">
                            <p>No economic data available.</p>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<!-- Share Modal -->
<div class="modal fade" id="shareModal" tabindex="-1" role="dialog" aria-labelledby="shareModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="shareModalLabel">Share This Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Share this post on your social media networks.</p>
                <div class="social-share-buttons">
                    <!-- Buttons for different social media platforms -->
                    <button id="facebookShare" class="btn btn-social-icon btn-facebook">
                        <i class="fa fa-facebook"></i> Facebook
                    </button>
                    <button id="twitterShare" class="btn btn-social-icon btn-twitter">
                        <i class="fa fa-twitter"></i> Twitter
                    </button>
                    <button id="linkedinShare" class="btn btn-social-icon btn-linkedin">
                        <i class="fa fa-linkedin"></i> LinkedIn
                    </button>
                    <!-- Add more buttons as needed -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
$(document).ready(function() {

    $('#economicDataSelect').on('changed.bs.select', function() {
        var seriesId = $(this).val();
        $.ajax({
            url: "<?php echo site_url('investments/fetchEconomicData'); ?>",
            type: "GET",
            data: { seriesId: seriesId },
            success: function(data) {
                // Assuming a container with id 'economicDataContainer' exists to display the data
                var container = $('#economicDataContainer');
                container.empty(); // Clear existing data

                // Check if data contains results and is not an error
                if (data && !data.error) {
                    // Iterate through the data and append it to the container
                    data.forEach(function(item) {
                        // Assuming 'item' has properties like 'date' and 'value'
                        var dataHTML = '<div class="economic-data-item">' +
                                       '<span>Date: ' + item.date + '</span>' +
                                       '<span>Value: ' + item.value + '</span>' +
                                       '</div>';
                        container.append(dataHTML);
                    });
                } else if (data.error) {
                    // Display error message
                    container.html('<div class="error-message">Error: ' + data.error + '</div>');
                } else {
                    // No data available
                    container.html('<div class="no-data-message">No economic data available for this selection.</div>');
                }
            },
            error: function(error) {
                // Handle AJAX errors here
                $('#economicDataContainer').html('<div class="error-message">An error occurred while fetching the data.</div>');
            }
        });
    });

    // Handle input event for the search bar    
    $('#searchInput').on('input', function() {
        var searchText = $(this).val();
        $.ajax({
            url: "<?php echo site_url('investments/searchEconomicData'); ?>",
            type: "GET",
            data: { searchText: searchText },
            success: function(data) {
                // Clear previous results
                $('#searchResults').empty();

                // Check if data contains results and is not an error
                if (data && !data.error) {
                    // Iterate through the results and append them to the searchResults div
                    data.forEach(function(item) {
                        // Assuming 'item' has properties like 'title' and 'id'
                        var resultHTML = '<div class="search-result-item">' +
                                          '<a href="detailedInfo.php?seriesId=' + item.id + '">' + item.title + '</a>' +
                                          '</div>';
                        $('#searchResults').append(resultHTML);
                    });
                } else if (data.error) {
                    // Display error message
                    $('#searchResults').html('<div class="error-message">Error: ' + data.error + '</div>');
                } else {
                    // No results found
                    $('#searchResults').html('<div class="no-results-message">No results found.</div>');
                }
            },
            error: function(error) {
                // Handle AJAX errors here
                $('#searchResults').html('<div class="error-message">An error occurred during the search.</div>');
            }
        });
    });
    
    // Event delegation for Like button
    $('#economicDataContainer').on('click', '.like-btn', function() {
        var dataId = $(this).data('id'); // Get the data-id attribute of the clicked button

        // AJAX call to process Like action
        $.ajax({
            url: "<?php echo site_url('Investments/likeEconomicData'); ?>",
            type: 'POST',
            data: { id: dataId },
            success: function(response) {
                if (response.status === 'success') {
                    // Update UI to reflect the like
                    $('button[data-id="' + dataId + '"]').removeClass('btn-outline-primary').addClass('btn-primary');
                } else {
                    // Handle error
                    console.log('Error: ', response.error);
                }
            },
            error: function(error) {
                // Handle AJAX error
                console.log('AJAX error: ', error);
            }
        });
    });

    function openShareModal(dataId, shareUrl) {
        // Open the modal
        $('#shareModal').modal('show');

        // Facebook Share
        $('#facebookShare').on('click', function() {
            window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(shareUrl), '_blank');
        });

        // Twitter Share
        $('#twitterShare').on('click', function() {
            window.open('https://twitter.com/intent/tweet?url=' + encodeURIComponent(shareUrl), '_blank');
        });

        // LinkedIn Share
        $('#linkedinShare').on('click', function() {
            window.open('https://www.linkedin.com/sharing/share-offsite/?url=' + encodeURIComponent(shareUrl), '_blank');
        });

        // Add similar handlers for other social networks...
    }
});
</script>
