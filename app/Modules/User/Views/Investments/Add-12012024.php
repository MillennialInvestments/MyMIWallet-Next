<?php
// User Account Information
log_message('debug', 'Investments\Add L3 - $uri->getSegment(2): ' . $uri->getSegment(4));

$addModalTitle                          = $pageTitle;
$configMode                             = $uri->getSegment(2);
$accountType                            = $uri->getSegment(3);
$investType                             = $uri->getSegment(4);
$controlClass                           = empty($controlClass) ? 'span6' : $controlClass;
$errorClass                             = empty($errorClass) ? ' error' : $errorClass;
// print_r($_SESSION['allSessionData']['userWallets']);
// $userWallets                    = '';

// $this->mymilogger
//      ->user($cuID) //Set UserID, who created this  Action
//      ->beta($beta) //Set whether in Beta or nto
//      ->type('Investment - ' . $configMode) //Entry type like, Post, Page, Entry
//      ->controller($this->router->fetch_class())
//      ->method($this->router->fetch_method())
//      ->url($this->uri->uri_string())
//      ->full_url(current_url())
//      ->comment('Investment Asset Added') //Token identify Action
//      ->log(); //Add Database Entry
$fieldData = array(
    'date'                          => $date,
    'time'                          => $time,
    'hostTime'                      => $hostTime,
    'configMode'                    => $configMode,
    'accountType'                   => $accountType,
    'investType'                    => $investType,
    'controlClass'                  => $controlClass,
    'errorClass'                    => $errorClass,
    'userInvestmentWallets'         => $userInvestmentWallets,
    'subViewFile'                   => $subViewFile,
    'subViewTitle'                  => $subViewTitle,
    'cuID'                          => $cuID,
    'cuEmail'                       => $cuEmail,
    'cuUsername'                    => $cuUsername,
    'investDashboard'               => $investDashboard,
);  
// print_r($fieldData); 
?>
<div class="modal-header">
	<h3 class="modal-title" id="useCoinModalLabel"><?php echo $subViewTitle; ?></h3>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	  <span aria-hidden="true">&times;</span>
	</button>
</div> 
<div class="modal-body">
    <div class="nk-block">    
        <div class="nk-content-body">
            <div class="row">
                <div class="col-12">
                    <?php // log_message('debug', 'Investments\Add L65 - $subViewFile: ' . $subViewFile); ?>
                    <?php echo view($subViewFile, $fieldData); ?>   
                </div>
                <!-- <div class="col-12 col-md-6">
                    <?php // echo view('UserModule\Investments\index\Investment_Tools-sm', $fieldData); ?>
                </div> -->
            </div>        
        </div>
    </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
$(document).ready(function() {
    // Initialize selectpicker with live search enabled
    $('#symbol').selectpicker({
        liveSearch: true,
        title: 'Enter or Search Symbol'
    });

    // Function to update and refresh the selectpicker
    function updateSelectpicker(options, query) {
        $('#symbol').html(options).selectpicker('refresh');
        // Automatically select the newly added symbol if it's not just an open action without input
        if (query) $('#symbol').selectpicker('val', query);
    }

    // Populate symbols on initial load
    populateSymbolPicker('Stock', '');

    // Prepend new symbol or select existing symbol on Enter key
    $('.bs-searchbox input').on('keyup', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault(); // Prevent form submission
            let inputVal = $(this).val().trim();
            let optionExists = $("#symbol option[value='" + inputVal + "']").length;

            if (inputVal && !optionExists) {
                // Prepend the new option if it doesn't exist
                $('#symbol').prepend(new Option(inputVal, inputVal, true, true)).selectpicker('refresh').selectpicker('val', inputVal);
            } else {
                // Select the existing option
                $('#symbol').selectpicker('val', inputVal);
            }
        }
    });

    // Function to dynamically populate selectpicker based on user input
    function populateSymbolPicker(selectedType, query) {
        const baseUrl = "<?php echo site_url('/API/Investments/getSymbolsByTradeType'); ?>";
        $.ajax({
            url: `${baseUrl}${selectedType}`,
            type: 'GET',
            success: function(data) {
                let symbols = '<option value="">Select Symbol</option>';
                if (data && data.bestMatches) {
                    data.bestMatches.forEach(match => {
                        symbols += `<option value="${match["1. symbol"]}">${match["1. symbol"]} - ${match["2. name"]}</option>`;
                    });
                }
                // Include an option to add a new symbol if the query is not empty
                if (query) symbols += `<option value="${query}">${query} - Add New</option>`;
                updateSelectpicker(symbols, query);
            },
            error: function(error) {
                console.error('Error fetching symbols:', error);
            }
        });
    }

    // Update cost calculation
    $('#shares, #price').on('input', function() {
        let shares = parseFloat($('#shares').val()) || 0;
        let price = parseFloat($('#price').val()) || 0;
        let cost = shares * price;
        $('#cost').val(cost.toFixed(2));
    });

    // Function to fetch live updates for the selected symbol
    async function fetchLiveUpdates(selectedType, symbol) {
        if (!symbol) return; // Early exit if symbol is not provided
        let baseUrl = "<?php echo site_url('Investments/API/fetchRealTimeData/'); ?>";
        let apiURL = `${baseUrl}${selectedType}/${symbol}`;
        try {
            const response = await fetch(apiURL);
            if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
            const data = await response.json();
            console.log('Data fetched successfully:', data);
            // Update the price input field with fetched data
            if (data.price) $('#price').val(data.price).trigger('input'); // Trigger input event to recalculate cost
        } catch (error) {
            console.error('Error fetching live updates:', error);
        }
    }

    $('#saveNewWallet').click(function() {
        $('#addWalletModal').modal('hide');
        populateSymbolPicker('Stock', '');
    });
});
</script>
