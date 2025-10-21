
<?php
$fieldData = array(
    'date'                          => $date,
    'time'                          => $time,
    'hostTime'                      => $hostTime,
    'accountType'                   => $accountType,
    'configMode'                    => $configMode,
    'controlClass'                  => $controlClass,
    'errorClass'                    => $errorClass,
    'userInvestments'               => $userInvestments,
    'userInvestmentWallets'         => $userInvestmentWallets,
);
?>
<div class="nk-block nk-block-lg">   
    <div class="card card-bordered pricing px-2 pb-4">
        <div class="pricing-head">
            <div class="pricing-title">
                <h4 class="card-title title">Investment Information</h4>
                <p class="sub-text">Please fill out information below!</p>
            </div>
        </div>
        <div class="pricing-body">                                
            <form class="form-horizontal" id="add_investment_record">
                <fieldset>
                    <input type="hidden" class="form-control" name="form_mode" id="form_mode" value="<?php echo set_value('form_mode', isset($user) ? $user->form_mode : $configMode); ?>">	
                    <input type="hidden" class="form-control" name="user_id" id="user_id" value="<?php echo set_value('user_id', isset($user) ? $user->user_id : $cuID); ?>">	
                    <input type="hidden" class="form-control" name="user_email" id="user_email" value="<?php echo set_value('user_email', isset($user) ? $user->user_email : $cuEmail); ?>">	
                    <input type="hidden" class="form-control" name="username" id="username" value="<?php echo set_value('username', isset($user) ? $user->username : $cuUsername); ?>">	
                    <input type="hidden" class="form-control" name="trade_type" id="trade_type" value="<?php echo set_value('trade_type', isset($user) ? $user->trade_type : $accountType); ?>">	
                    <div class="form-group">
                        <label for="symbol">Open Date</label>
                        <input type="date" class="form-control" id="trade_date" name="trade_date" placeholder="Enter Trade Date" required></input>
                    </div>
                    <div class="form-group">
                        <label for="trade_time">Open Time</label>
                        <input type="time" class="form-control" id="trade_date" name="trade_date" placeholder="Enter Trade Date" required></input>
                    </div>
                    <?php
                    
                    // echo view('User/Investments/' . $configMode . '/user_fields', $fieldData);
                    ?>
                    <?php if (isset($subViewFile) && !empty($subViewFile)): ?>
                        <?php echo view($subViewFile); ?>
                    <?php endif; ?>

                </fieldset>
            <?php echo form_close(); ?>	
            <?php if (validation_errors()) : ?>
            <div class="alert alert-error fade in">
                <?php echo validation_errors(); ?>
            </div>
            <?php endif; ?>
        </div>
    </div>      
</div> 

<script <?= $nonce['script'] ?? '' ?>>
    const addAccountForm = document.querySelector("#add_investment_record");
    const addAccountSubmit = {};

    if (addAccountForm) {
        addAccountForm.addEventListener("submit", async (e) => {
            e.preventDefault();
            const formData = new FormData();

            addAccountForm.querySelectorAll("input").forEach((inputField) => {
                formData.append(inputField.name, inputField.value);
                addAccountSubmit[inputField.name] = inputField.value;
            });

            addAccountForm.querySelectorAll("select").forEach((inputField) => {
                formData.append(inputField.name, inputField.value);
                addAccountSubmit[inputField.name] = inputField.value;
            });

            try {
                const result = await fetch("<?php echo site_url('Investments/Account-Manager'); ?>", {
                    method: "POST",
                    body: JSON.stringify(addAccountSubmit),
                    headers: { 
                        "Content-Type": "application/json",
                        "X-Requested-With": "XMLHttpRequest"  // This header makes the request identifiable as AJAX in CodeIgniter
                    },
                    credentials: "same-origin",
                });

                const responseData = await result;
                const accountID = responseData.accountID;
                console.log("Submission Complete. Redirect now.");
                // Use document.referrer to redirect to the previous page, or to a default page if referrer is not available
                window.location.href = document.referrer || "<?= site_url('/Investments'); ?>";
            } catch (err) {
                console.log(err);
            }
        });
    }

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
            const baseUrl = "<?php echo site_url('/Investments/API/getSymbolsByTradeType/'); ?>";
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

        // // Function to fetch live updates for the selected symbol
        // async function fetchLiveUpdates(selectedType, symbol) {
        //     if (!symbol) return; // Early exit if symbol is not provided
        //     let baseUrl = "<?php echo site_url('Investments/API/fetchRealTimeData/'); ?>";
        //     let apiURL = `${baseUrl}${selectedType}/${symbol}`;
        //     try {
        //         const response = await fetch(apiURL);
        //         if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);
        //         const data = await response.json();
        //         console.log('Data fetched successfully:', data);
        //         // Update the price input field with fetched data
        //         if (data.price) $('#price').val(data.price).trigger('input'); // Trigger input event to recalculate cost
        //     } catch (error) {
        //         console.error('Error fetching live updates:', error);
        //     }
        // }
        // Function to fetch live updates
        async function fetchLiveUpdates(selectedType, symbol) {
            try {
                let baseUrl = "<?php echo site_url('Investments/API/fetchRealTimeData/'); ?>";
                let apiURL = `${baseUrl}${selectedType}/${symbol}`;
                const response = await fetch(apiURL);

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const data = await response.json();
                console.log('fetchRealTimeData data: ', data);
                populateFields(tradeType, data); 
                document.getElementById('price').value = data.price;

                if (selectedType === 'Stock') {
                    document.getElementById('dividend_yield').value = response.dividend_yield;
                    document.getElementById('market_cap').value = response.market_cap;
                    document.getElementById('pe_ratio').value = response.pe_ratio;
                } else if (selectedType === 'Cryptocurrency' || selectedType === 'Crypto Asset') {
                    document.getElementById('wallet_address').value = response.wallet_address;
                    document.getElementById('transaction_hash').value = response.transaction_hash;
                    document.getElementById('network_fees').value = response.network_fees;
                } else if (selectedType === 'Bond') {
                    document.getElementById('bond_type').value = data.bond_type;
                    document.getElementById('maturity_date').value = data.maturity_date;
                    document.getElementById('coupon_rate').value = data.coupon_rate;
                    document.getElementById('issuer').value = data.issuer;
                } else if (selectedType === 'Forex') {
                    document.getElementById('leverage').value = data.leverage;
                    document.getElementById('lot_size').value = data.lot_size;
                    document.getElementById('spread').value = data.spread;
                } else if (selectedType === 'Options') {
                    document.getElementById('option_type').value = data.option_type;
                    document.getElementById('number_of_contracts').value = data.number_of_contracts;
                    document.getElementById('expiry_date').value = data.expiry_date;
                    document.getElementById('strike_price').value = data.strike_price;
                    document.getElementById('option_style').value = data.option_style;
                } else if (selectedType === 'Mutual Fund') {
                    document.getElementById('fund_type').value = data.fund_type;
                    document.getElementById('nav').value = data.nav;
                    document.getElementById('expense_ratio').value = data.expense_ratio;
                    document.getElementById('fund_manager').value = data.fund_manager;
                } else if (selectedType === 'Exchange-Traded Fund (ETF)') {
                    document.getElementById('fund_type').value = data.fund_type;
                    document.getElementById('underlying_index').value = data.underlying_index;
                    document.getElementById('etf_expense_ratio').value = data.etf_expense_ratio;
                    document.getElementById('asset_class').value = data.asset_class;
                } else if (selectedType === 'Real Estate') {
                    document.getElementById('property_location').value = data.property_location;
                    document.getElementById('property_type').value = data.property_type;
                    document.getElementById('rental_income').value = data.rental_income;
                } else if (selectedType === 'Commodity') {
                    document.getElementById('commodity_type').value = data.commodity_type;
                    document.getElementById('unit_of_measurement').value = data.unit_of_measurement;
                    document.getElementById('storage_costs').value = data.storage_costs;
                } else if (selectedType === 'Foreign Stock') {
                    document.getElementById('country_of_origin').value = data.country_of_origin;
                    document.getElementById('currency').value = data.currency;
                    document.getElementById('local_exchange').value = data.local_exchange;
                } else if (selectedType === 'Precious Metal') {
                    document.getElementById('purity').value = data.purity;
                    document.getElementById('pm_unit_of_measurement').value = data.pm_unit_of_measurement;
                    document.getElementById('pm_storage_costs').value = data.pm_storage_costs;
                } else if (selectedType === 'International Bond') {
                    document.getElementById('ib_country_of_origin').value = data.ib_country_of_origin;
                    document.getElementById('ib_currency').value = data.ib_currency;
                    document.getElementById('ib_local_exchange').value = data.ib_local_exchange;
                }
                // ... (other types)

                updateCost();
            } catch (error) {
                // document.getElementById('error-message').innerText = 'Error fetching live updates';
                console.error('Error fetching live updates:', error);
            }
        }

        // Save the new wallet
        $('#saveNewWallet').click(function() {
            const newWalletName = $('#newWalletName').val();
            if (newWalletName) {
                // AJAX fetch to submit the form without refreshing the page
                fetch('<?= site_url("/add_new_wallet") ?>', {
                    method: 'POST',
                    headers: {
                    'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ walletName: newWalletName }),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        $('#wallet').append(new Option(newWalletName, newWalletName, true, true));
                        $('#addWalletModal').modal('hide');
                        $('#wallet').selectpicker('refresh');
                    } else {
                        console.error('Error:', 'Failed To Add New Wallet');
                        alert('Failed to add new wallet');
                    }
                })
                .catch((error) => {
                    console.error('Error:', error);
                    alert('An error occurred while adding the new wallet');
                });
            }
        });
        
        // Add this line to show the modal when the hyperlink is clicked
        $("a[href='#addWalletModal']").click(function(e) {
            e.preventDefault();
            $('#addWalletModal').modal('show');
        });
    });
</script>