<?php
// app/Modules/User/Views/Investments/Add.php
// User Account Information
// log_message('debug', 'Investments\Add L3 - $uri->getSegment(2): ' . $uri->getSegment(4));

// Define the variable based on your application logic
$enableFeatures                         = false; // Set to false if you want to disable features

$addModalTitle                          = $pageTitle;
$configMode                             = $uri->getSegment(2);
$accountType                            = $uri->getSegment(3);
$investType                             = $uri->getSegment(4);
if ($investType === 'addWatchlist') {
    $formType = 'Watchlist';
} else {
    $formType = 'General'; 
}
$controlClass                           = empty($controlClass) ? 'span6' : $controlClass;
$errorClass                             = empty($errorClass) ? ' error' : $errorClass;
// echo '$configMode: ' . $configMode . ' | $accountType: ' . $accountType . ' | $investType: ' . $investType;  
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
    'enableFeatures'                => $enableFeatures,
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
                <form class="form-horizontal" id="addInvestmentForm" method="POST">
                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

                    <?php // log_message('debug', 'Investments\Add L65 - $subViewFile: ' . $subViewFile); ?>
                    <fieldset>
                        
                        <input type="hidden" class="form-control" id="user_id" name="user_id" value="<?= $cuID; ?>">
                        <input type="hidden" class="form-control" id="form_type" name="form_type" value="<?= $investType; ?>">
                        <?php if($includeDateTime === 1) : ?>
                        <div class="form-group">
                            <label for="open_date">Open Date</label>
                            <input type="date" id="open_date" name="open_date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="open_time">Open Time</label>
                            <input type="time" id="open_time" name="open_time" class="form-control" required>
                        </div>
                        <?php endif; ?>
                        
                        <?php if($includeWallets === 1) : ?>
                        <div class="form-group">
                            <label for="asset_type">Investment Account</label>
                            <select class="form-control selectpicker" data-live-search="true" id="trading_account" name="trading_account" required>
                                <option value="">Select-A-Wallet</option>
                                <?php 
                                if ($investType === 'addCryptoTrade') { 
                                    log_message('debug', 'Investments\Add L88 - $cuWallets Array: ' . (print_r($cuWallets, true)));
                                    if (!empty($cuCryptoWallets)) { 
                                        foreach ($cuCryptoWallets as $wallet) {
                                            $displayValue = !empty($wallet['nickname']) ? $wallet['broker'] . ' - ' . $wallet['nickname'] : $wallet['broker'];
                                            echo '<option value="' . $wallet['id'] . '">' . htmlspecialchars($displayValue) . '</option>';
                                        }
                                    } else {
                                        foreach ($cuWallets as $wallet) {
                                            if ($wallet['default_wallet'] === 'Yes') {
                                                $displayValue = !empty($wallet['nickname']) ? 'MyMI Wallet - ' . $wallet['nickname'] : $wallet['broker'];
                                                echo '<option value="' . $wallet['id'] . '">' . htmlspecialchars($displayValue) . '</option>';
                                            }
                                        }
                                    }
                                } else {
                                    //log_message('debug', 'Investments\Add\stock_fields L7 - $cuWallets Array: ' . (print_r($cuWallets, true)));
                                    foreach ($cuInvestWallets as $wallet) {
                                        $displayValue = !empty($wallet['nickname']) ? $wallet['broker'] . ' - ' . $wallet['nickname'] : $wallet['broker'];
                                        echo '<option value="' . $wallet['id'] . '">' . htmlspecialchars($displayValue) . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <?php endif; ?>
                        <!-- MUST BE LAST -->
                        <?php if($enableFeatures === true) : ?>
                        <div class="form-group">
                            <label for="symbol_search">Search Symbol</label>
                            <select class="form-control selectpicker" id="symbol_search" name="symbol_search" data-live-search="true" title="Search Symbol" required></select>
                        </div>
                        <div class="form-group">
                            <label>-- OR MANUALLY ENTER BELOW --</label>
                        </div>
                        <?php endif; ?>
                        <?php echo view($subViewFile, $fieldData); ?>
                        <div class="form-group pt-3">
                            <div class="col-md-4"></div>
                            <div class="col-12 col-md-8">
                                <div class="row">
                                    <div class="col-6 px-1">
                                        <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Cancel</button>
                                    </div>
                                    <div class="col-6 px-1">
                                        <button type="submit" class="btn btn-primary btn-block" id="addNewWalletSubmit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>                       
                </div>
                <!-- <div class="col-12 col-md-6">
                    <?php // echo view('UserModule/Investments/index/Investment_Tools-sm', $fieldData); ?>
                </div> -->
            </div>        
        </div>
    </div>
</div>
<script <?= $nonce['script'] ?? '' ?>>
$(document).ready(function () {
    $('#trading_account').selectpicker('refresh');
    const enableFeatures = <?php echo json_encode($enableFeatures ?? true); ?>;
    const investmentsUrl = "<?php echo site_url('/Investments'); ?>";
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    if (enableFeatures) {
        async function populateSymbolSearch(selectedType) {
            const baseUrl = "<?php echo site_url('/API/Investments/getSymbolsByTradeType'); ?>";
            $.ajax({
                url: `${baseUrl}/${selectedType}`,
                type: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    "X-CSRF-TOKEN": csrfToken, // Include the CSRF token in the headers
                },
                success: function (data) {
                    let options = '<option value="">Search Symbol</option>';
                    if (data && data.bestMatches) {
                        data.bestMatches.forEach(match => {
                            options += `<option value="${match["1. symbol"]}" 
                                        data-price="${match["price"]}" 
                                        data-market-cap="${match["market_cap"]}">
                                        ${match["1. symbol"]} - ${match["2. name"]}
                                        </option>`;
                        });
                    }
                    $('#symbol_search').html(options).selectpicker('refresh');
                },
                error: function (error) {
                    console.error('Error fetching symbols:', error);
                }
            });
        }

        populateSymbolSearch('Stock');

        $('#symbol_search').on('changed.bs.select', function () {
            const selectedSymbol = $(this).val();
            const selectedOption = $(this).find(`option[value="${selectedSymbol}"]`);
            const price = selectedOption.data('price') || '';
            const marketCap = selectedOption.data('market-cap') || '';

            $('#symbol').val(selectedSymbol);
            if (price) $('#price').val(price);
            if (marketCap) $('#market_cap').val(marketCap);
            $('#price').trigger('input');
        });

        $('#symbol').on('input', function () {
            const manualSymbol = $(this).val().trim();
            if (manualSymbol) {
                $('#symbol_search').selectpicker('val', '');
            }
        });
    }

    window.updateCost = function () {
        let shares = parseFloat($('#shares').val()) || 0;
        let price = parseFloat($('#price').val()) || 0;
        let cost = shares * price;
        $('#cost').val(cost.toFixed(2));
    };

    $('#shares, #price').on('input', window.updateCost);

    async function fetchLiveUpdates(selectedType, symbol) {
        if (!symbol) return;
        let baseUrl = "<?php echo site_url('Investments/API/fetchRealTimeData/'); ?>";
        let apiURL = `${baseUrl}/${selectedType}/${symbol}`;
        try {
            const response = await fetch(apiURL);
            if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
            const data = await response.json();
            console.log('Data fetched successfully:', data);
            if (data.price) {
                $('#price').val(data.price).trigger('input');
            }
        } catch (error) {
            console.error('Error fetching live updates:', error);
        }
    }

    $('#symbol_search').on('changed.bs.select', function () {
        const selectedSymbol = $(this).val();
        fetchLiveUpdates('Stock', selectedSymbol);
    });

    $('#saveNewWallet').click(function () {
        $('#addWalletModal').modal('hide');
        if (enableFeatures) {
            populateSymbolSearch('Stock');
        }
    });

    // AJAX form submission with redirect
    $('#addInvestmentForm').on('submit', function (e) {
        console.log("Loading Add to Watchlist");
        e.preventDefault();

        const formType = '<?= $formType; ?>'; // Get form type from PHP
        console.log("Form Type:", formType);

        const formData = {
            user_id: $('#user_id').val(),
            trade_type: $('#trade_type').val() || '', // Make sure #trade_type exists in the form
            symbol: $('#symbol').val(),
            shares: $('#shares').val(),
            price: $('#price').val(),
            open_date: $('#open_date').val(),
            open_time: $('#open_time').val(),
            order_status: 'OPENING',
            form_mode: formType
        };
        console.log("formData to be submitted:", formData);

        fetch('<?= site_url('/Investments/Account-Manager'); ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify(formData)
        })
            .then(async response => {
                if (!response.ok) {
                    const errorData = await response.json();
                    console.error('Error response:', errorData);
                    throw new Error('Failed to save the investment. Please try again.');
                }
                return response.json();
            })
            .then(data => {
                if (data.status === 'success') {
                    if (formType === 'Watchlist') {
                        alert(`${formData.symbol} added to Watchlist!`);
                    } else {
                        alert(`Investment for ${formData.symbol} added successfully!`);
                    }
                    window.location.href = investmentsUrl; // Redirect to Investments page
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => console.error('Error:', error));
    });
});
</script>
