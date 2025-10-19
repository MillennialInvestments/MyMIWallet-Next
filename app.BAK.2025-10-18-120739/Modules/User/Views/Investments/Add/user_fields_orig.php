<?php /* /users/views/user_fields.php */
$date                           = date("F jS, Y");
$hostTime                       = date("g:i A");
$time                       = date("g:i A");




$registerClass                  = $currentMethod == 'register' ? ' required' : '';
$editSettings                   = $currentMethod == 'edit';
// Current User Information
$cuID 						    = $_SESSION['allSessionData']['userAccount']['cuID'];
$cuEmail					    = $_SESSION['allSessionData']['userAccount']['cuEmail'];
$cuUsername					    = $_SESSION['allSessionData']['userAccount']['cuUsername'];
$cuUserType					    = $_SESSION['allSessionData']['userAccount']['cuUserType'];
// print_r($this->session->allSessionData['userAccount']); 
if ($configMode === 'Add') {
    // $integrationTitle           = 'Integrate ' . $accountType . ' Account';
    // $formTitle                  = $accountType . ' - Account Information';
    // if ($accountType === 'Income') {
    //     $designatedDate             = 'Date of Month Received';
    // } elseif ($accountType === 'Expense') {
    //     $designatedDate             = 'Date of Month Due';
    // }
} elseif ($configMode === 'Edit') {
    // $integrationTitle           = 'Integrate ' . $accountName . ' - ' . $accountType . ' Account';
    // $formTitle                  = $accountName . ' - Account Information';
}
// Set Form Config
$formGroup				        = $siteSettings->formContainer;
$formLabel				        = $siteSettings->formLabel;
$formConCol				        = $siteSettings->formControlColumn;
$formControl			        = $siteSettings->formControl;
$formSelect				        = $siteSettings->formSelect;
$formSelectPicker               = $siteSettings->formSelectpicker;
$formText				        = $siteSettings->formText;
$formCustomText			        = $siteSettings->formCustomText;
$formMode                       = $configMode;
?>        
<?php
if ($cuUserType === 'Beta') {
    ?>
<input type="hidden" id="beta" name="beta" value="<?php echo set_value('beta', isset($user) ? $user->beta : 'Yes'); ?>" /> 
<?php
} else {
        ?>             
<input type="hidden" id="beta" name="beta" value="<?php echo set_value('beta', isset($user) ? $user->beta : 'No'); ?>" /> 
<?php
    }
?>
<input type="hidden" class="form-control" name="form_mode" id="form_mode" value="<?php echo set_value('form_mode', isset($user) ? $user->form_mode : $formMode); ?>">	
<input type="hidden" class="form-control" name="user_id" id="user_id" value="<?php echo set_value('user_id', isset($user) ? $user->user_id : $cuID); ?>">	
<input type="hidden" class="form-control" name="user_email" id="user_email" value="<?php echo set_value('user_email', isset($user) ? $user->user_email : $cuEmail); ?>">	
<input type="hidden" class="form-control" name="username" id="username" value="<?php echo set_value('username', isset($user) ? $user->username : $cuUsername); ?>">	

<div class="<?php echo $formGroup; ?> mb-2">
    <label class="col-6 form-label" for="default-01">Open Date</label>
    <div class="col-6">
        <input type="date" class="<?php echo $formControl; ?>" name="trade_date" id="trade_date" placeholder="Enter Trade Date" value="<?php echo set_value('trade_date', isset($user) ? $user->trade_date : ''); ?>">
    </div>
</div>
<div class="<?php echo $formGroup; ?> mb-2">
    <label class="col-6 form-label" for="default-01">Open Time</label>
    <div class="col-6">
        <input type="time" class="<?php echo $formControl; ?>" name="trade_time" id="trade_time" placeholder="Enter Trade Time (Optional)" value="<?php echo set_value('trade_time', isset($user) ? $user->trade_time : ''); ?>">
    </div>
</div>

<div class="<?php echo $formGroup; ?> mb-2">
    <label for="trade_type" class="col-6 form-label">Type of Investment</label>
    <div class="col-6">
        <select name="trade_type" class="<?php echo $formControl; ?>" id="trade_type" required="required" style="height: 40px; padding: 10px;">
        <?php
            // U.S. National Investment Types
            $investment_types = array(
                'N/A'                   => 'Select-An-Option',
                // 'Bond'                  => 'Bond',
                // 'Commodity'             => 'Commodity',
                'Cryptocurrency'        => 'Cryptocurrency',
                'Crypto Asset'          => 'Crypto Asset',
                // 'ETF'                   => 'Exchange-Traded Fund (ETF)',
                // 'Foreign Stock'         => 'Foreign Stock',
                // 'Forex'                 => 'Forex',
                // 'International Bond'    => 'International Bond',
                // 'Options'               => 'Options',
                // 'Mutual Fund'           => 'Mutual Fund',
                // 'Precious Metal'        => 'Precious Metal',
                // 'Real Estate'           => 'Real Estate',
                'Stock'                 => 'Stock',
                // Add more international investment types as needed
            );
            // // U.S. National Investment Types
            // $us_national_investment_types = array(
            //     'N/A'                   => 'Select-An-Option',
            //     'Cryptocurrency'        => 'Cryptocurrency',
            //     'Crypto Asset'          => 'Crypto Asset',
            //     'Bond'                  => 'Bond',
            //     'Forex'                 => 'Forex',
            //     'Option'                => 'Option',
            //     'Stock'                 => 'Stock',
            // );

            // // International Investment Types
            // $international_investment_types = array(
            //     'Commodity'             => 'Commodity',
            //     'Real Estate'           => 'Real Estate',
            //     'Mutual Fund'           => 'Mutual Fund',
            //     'ETF'                   => 'Exchange-Traded Fund (ETF)',
            //     'Foreign Stock'         => 'Foreign Stock',
            //     'Precious Metal'        => 'Precious Metal',
            //     'International Bond'    => 'International Bond',
            //     'Cryptocurrency'        => 'Cryptocurrency',
            //     'Forex'                 => 'Forex',
            //     // Add more international investment types as needed
            // );

            // // Combine both U.S. national and international investment types
            // $all_investment_types = array_merge($us_national_investment_types, $international_investment_types);

            foreach ($investment_types as $value => $display_text) {
                $selected = ($value == $this->input->post('investment_type')) ? ' selected="selected"' : "";
                echo '<option value="'.$value.'" '.$selected.'>'.$display_text.'</option>';
            }
        ?>
        </select>
    </div>
</div>


<!-- Add more fields specific to each trade type as needed -->
<div id="specific_fields"></div>

<!-- Error Handling: Display errors if any -->
<div id="error-message"></div>

<!-- Add Wallet Modal -->
<div class="modal fade" id="addWalletModal" tabindex="-1" role="dialog" aria-labelledby="addWalletModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addWalletModalLabel">Add New Wallet</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="text" id="newWalletName" class="form-control" placeholder="Enter new wallet name">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="saveNewWallet" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>
<hr>

<!-- JavaScript Section -->
<script <?= $nonce['script'] ?? '' ?>>
    // Initialize phpVar object to hold PHP variables
    let phpVar = {
        // Form Configuration Variables
        formGroup: "<?= $formGroup ?>",
        formControl: "<?= $formControl ?>",
        formSelectPicker: "<?= $formSelectPicker ?>",
        
        // Session Variables
        cuID: "<?= $cuID ?>",
        
        // Routing Variables
        currentMethod: "<?= $currentMethod ?>",
        
        // Date and Time Variables
        date: "<?= $date ?>",
        hostTime: "<?= $hostTime ?>",
        time: "<?= $time ?>",
        
        // Additional Variables
        symbolValue: "",
        sharesValue: 0,
        exchangeValue: 0
    };

    // Attach event listeners
    function attachEventListeners() {
        for (const [event, handler] of Object.entries(eventHandlerMapping)) {
            try {
            document.addEventListener(event, handler);
            } catch (error) {
            console.error(`Failed to attach event listener for ${event}: ${error}`);
            // Real-time alert for immediate issue resolution
            alert(`Failed to attach event listener for ${event}`);
            }
        }
    }

    // Function to update sharesValue and exchangeValue in phpVar
    function updatePhpVar() {
        phpVar.sharesValue = document.getElementById('shares').value;
        // phpVar.exchangeValue = document.getElementById('exchange').value;
    }

    // Event Handlers
    function handleInputEvent(e) {
        if (['shares', 'price'].includes(e.target.id)) {
            updateCost();
        }
    }

    // Function to calculate and update the cost
    function updateCost() {
        let sharesElement = document.getElementById("shares");
        let priceElement = document.getElementById("price");
        let costElement = document.getElementById("cost");

        if (sharesElement && priceElement && costElement) {
            let sharesValue = parseFloat(sharesElement.value) || 0;
            let priceValue = parseFloat(priceElement.value) || 0;

            // Debugging logs
            console.log("Shares Value: ", sharesValue);
            console.log("Price Value: ", priceValue);

            costElement.value = (sharesValue * priceValue).toFixed(2);
        } else {
            console.error("One of the elements is missing. Check your HTML IDs.");
        }
    }


    // Function to add a select picker with live search enabled
    function addSelectPicker(label, id, placeholder, value, options = []) {
        let optionHTML = options.map(opt => `<option value="${opt}">${opt}</option>`).join('');
        return `
            <div class="${phpVar.formGroup} mb-2">
                <label class="col-6 form-label" for="${id}">${label}</label>
                <div class="col-6">
                    <select class="selectpicker" data-live-search="true" data-tokens="new" name="${id}" id="${id}">
                        <option disabled selected>${placeholder}</option>
                        ${optionHTML}
                    </select>
                </div>
            </div>
        `;
    }

    function addWalletDropdown(phpVar) {
        let walletOptions = '<option value="N/A">Select-A-Wallet</option>'; // Added this line
        walletOptions += '<option value="AddNew">+ Add New Wallet</option>'; 
        if (phpVar.userInvestmentWallets && Array.isArray(phpVar.userInvestmentWallets)) {
            phpVar.userInvestmentWallets.forEach(wallet => {
                walletOptions += `<option value="${wallet.id}">${wallet.nickname}</option>`;
            });
        }
        return `
            <div class="form-group row mb-2">
                <label for="wallet" class="col-6 form-label">Wallet</label>
                <div class="col-6">
                    <select class="${phpVar.formControl}" id="wallet" name="wallet" required style="height:40px;padding:10px">
                        ${walletOptions}
                    </select>
                </div>
            </div>
        `;
    }
    
    // Function to add a field
    function addField(label, type, name, placeholder, value, options = [], readonly = false, extraAttributes = {}) {
        const readonlyAttribute = readonly ? ' readonly' : '';
        let extraAttrStr = '';
        
        // Convert extra attributes object to string
        for (let attr in extraAttributes) {
            extraAttrStr += ` ${attr}="${extraAttributes[attr]}"`;
        }

        if (type === 'select') {
            let optionTags = options.map(opt => `<option value="${opt}">${opt}</option>`).join('');
            return `
                <div class="${phpVar.formGroup} mb-2">
                    <label for="${name}" class="col-6 form-label">${label}</label>
                    <div class="col-6">
                        <select class="${phpVar.formControl}" name="${name}" id="${name}">
                            ${optionTags}
                        </select>
                    </div>
                </div>
            `;
        } else {
            return `
                <div class="${phpVar.formGroup} mb-2">
                    <label for="${name}" class="col-6 form-label">${label}</label>
                    <div class="col-6">
                        <input type="${type}" class="${phpVar.formControl}" name="${name}" id="${name}" placeholder="${placeholder}" value="${value}"${readonlyAttribute}${extraAttrStr}>
                    </div>
                </div>
            `;
        }
    }

    // Insert your new code snippet here
    // For input fields
    const inputField = addField('Label', 'text', 'name', 'Placeholder', 'Value');

    // For select fields with options
    const selectOptions = ['Option1', 'Option2', 'Option3'];
    const selectField = addField('Label', 'select', 'symbol', 'Placeholder', 'Value', selectOptions);
    
    // Debouncing function
    let debounceTimer;
    function updateCostDebounced() {
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(updateCost, 300);
    }

    // Lazy Initialization function
    let isSelectPickerInitialized = false;
    function lazyInitializeSelectPicker() {
        if (!isSelectPickerInitialized) {
            $('.selectpicker').selectpicker();
            isSelectPickerInitialized = true;
        }
    }

    document.querySelector('#trade_type').addEventListener('change', function() {
        const selectedType = this.value;
        const specificFields = document.querySelector('#specific_fields');
        specificFields.innerHTML = ''; // Clear previous fields

        // Define your fields here based on selectedType
        let fields = [];

        // // Add common fields for all types
        // fields.push(addField('Exchange', 'text', 'exchange', 'Enter Exchange', phpVar.exchangeValue));
        fields.push(addWalletDropdown(phpVar));  // Include the wallet dropdown here
        
        // Inside your JavaScript function that listens to trade_type change
        if (selectedType !== 'Options') {
            fields.push(addSelectPicker('Position Type', 'position_type', 'Select Position Type', '', ['Buy', 'Sell', 'N/A']));
        }
        // Inside your JavaScript function that listens to trade_type change
        if (selectedType === 'Cryptocurrency' || selectedType === 'Crypto Asset') {
            fields.push(addSelectPicker('Symbol', 'symbol', 'Select or Search Symbol', phpVar.symbolValue));
            fields.push(addField('Number of Coins', 'number', 'shares', 'Enter Number of Coins', '', [], false, { step: '0.01' }));
            fields.push(addField('Price', 'number', 'price', 'Enter Price', '', [], false, { step: '0.01' }));
            fields.push(addField('Cost', 'number', 'cost', 'Total Cost', '', [], true, { step: '0.01' }));
            fields.push(addField('Wallet Address', 'text', 'wallet_address', 'Enter Wallet Address', ''));
            fields.push(addField('Transaction Hash', 'text', 'transaction_hash', 'Enter Transaction Hash', ''));
            fields.push(addField('Network Fees', 'number', 'network_fees', 'Enter Network Fees', ''));
            // ... (other fields)
        } else if (selectedType === 'Stock') {
            fields.push(addSelectPicker('Symbol', 'symbol', 'Select or Search Symbol', phpVar.symbolValue));
            fields.push(addField('Number of Shares', 'number', 'shares', 'Enter Number of Shares', '', [], false, { step: '0.01' }));
            fields.push(addField('Price', 'number', 'price', 'Enter Price', '', [], false, { step: '0.01' }));
            fields.push(addField('Cost', 'number', 'cost', 'Total Cost', '', [], true, { step: '0.01' }));
            fields.push(addField('Dividend Yield', 'number', 'dividend_yield', 'Enter Dividend Yield', ''));
            fields.push(addField('Market Cap', 'number', 'market_cap', 'Enter Market Cap', ''));
            fields.push(addField('P/E Ratio', 'number', 'pe_ratio', 'Enter P/E Ratio', ''));
            // ... (other fields)
        } else if (selectedType === 'Bond') {
            fields.push(addSelectPicker('Symbol', 'symbol', 'Select or Search Symbol', phpVar.symbolValue));
            fields.push(addField('Number of Shares', 'number', 'shares', 'Enter Number of Shares', '', [], false, { step: '0.01' }));
            fields.push(addField('Price', 'number', 'price', 'Enter Price', '', [], false, { step: '0.01' }));
            fields.push(addField('Cost', 'number', 'cost', 'Total Cost', '', [], true, { step: '0.01' }));
            fields.push(addField('Bond Type', 'select', 'bond_type', 'Select Bond Type', phpVar.bondTypeValue));
            fields.push(addField('Maturity Date', 'date', 'maturity_date', 'Enter Maturity Date', ''));
            fields.push(addField('Coupon Rate', 'number', 'coupon_rate', 'Enter Coupon Rate', ''));
            fields.push(addField('Issuer', 'text', 'issuer', 'Enter Issuer', ''));
            // ... (other fields)
        } else if (selectedType === 'Forex') {
            fields.push(addSelectPicker('Symbol', 'symbol', 'Select or Search Symbol', phpVar.symbolValue));
            fields.push(addField('Number of Shares', 'number', 'shares', 'Enter Number of Shares', '', [], false, { step: '0.01' }));
            fields.push(addField('Price', 'number', 'price', 'Enter Price', '', [], false, { step: '0.01' }));
            fields.push(addField('Cost', 'number', 'cost', 'Total Cost', '', [], true, { step: '0.01' }));
            fields.push(addField('Leverage', 'number', 'leverage', 'Enter Leverage', ''));
            fields.push(addField('Lot Size', 'number', 'lot_size', 'Enter Lot Size', ''));
            fields.push(addField('Spread', 'number', 'spread', 'Enter Spread', ''));
            // ... (other fields)
        } else if (selectedType === 'Options') {
            fields.push(addSelectPicker('Symbol', 'symbol', 'Select or Search Symbol', phpVar.symbolValue));
            fields.push(addField('Option Type', 'select', 'option_type', 'Select Option Type', phpVar.optionTypeValue));
            fields.push(addField('Number of Contracts', 'number', 'number_of_contracts', 'Enter Number of Contracts', '', [], false, { step: '0.01' }));
            fields.push(addField('Price', 'number', 'price', 'Enter Price', '', [], false, { step: '0.01' }));
            fields.push(addField('Cost', 'number', 'cost', 'Total Cost', '', [], true, { step: '0.01' }));
            fields.push(addField('Expiry Date', 'date', 'expiry_date', 'Enter Expiry Date', ''));
            fields.push(addField('Strike Price', 'number', 'strike_price', 'Enter Strike Price', ''));
            fields.push(addField('Option Style', 'text', 'option_style', 'Enter Option Style (American, European)', ''));
            // ... (other fields)
        } else if (selectedType === 'Mutual Fund') {
            fields.push(addField('Mutual Fund Name', 'text', 'symbol', 'Enter Mutual Fund Name', phpVar.symbolValue));
            fields.push(addSelectPicker('Symbol', 'symbol', 'Select or Search Symbol', phpVar.symbolValue));
            fields.push(addField('Number of Shares', 'number', 'shares', 'Enter Number of Shares', '', [], false, { step: '0.01' }));
            fields.push(addField('Price', 'number', 'price', 'Enter Price', '', [], false, { step: '0.01' }));
            fields.push(addField('Cost', 'number', 'cost', 'Total Cost', '', [], true, { step: '0.01' }));
            fields.push(addField('Fund Type', 'select', 'fund_type', 'Select Fund Type', phpVar.fundTypeValue));
            fields.push(addField('NAV', 'number', 'nav', 'Enter Net Asset Value', ''));
            fields.push(addField('Expense Ratio', 'number', 'expense_ratio', 'Enter Expense Ratio', ''));
            fields.push(addField('Fund Manager', 'text', 'fund_manager', 'Enter Fund Manager', ''));
            // ... (other fields)
        } else if (selectedType === 'Exchange-Traded Fund (ETF)') {
            fields.push(addSelectPicker('Symbol', 'symbol', 'Select or Search Symbol', phpVar.symbolValue));
            fields.push(addField('Number of Shares', 'number', 'shares', 'Enter Number of Shares', '', [], false, { step: '0.01' }));
            fields.push(addField('Price', 'number', 'price', 'Enter Price', '', [], false, { step: '0.01' }));
            fields.push(addField('Cost', 'number', 'cost', 'Total Cost', '', [], true, { step: '0.01' }));
            fields.push(addField('Fund Type', 'select', 'fund_type', 'Select Fund Type', phpVar.fundTypeValue));
            fields.push(addField('Underlying Index', 'text', 'underlying_index', 'Enter Underlying Index', ''));
            fields.push(addField('Expense Ratio', 'number', 'etf_expense_ratio', 'Enter Expense Ratio', ''));
            fields.push(addField('Asset Class', 'text', 'asset_class', 'Enter Asset Class', ''));
            // ... (other fields)
        } else if (selectedType === 'Real Estate') {
            fields.push(addField('Property Name', 'text', 'symbol', 'Enter Property Name', phpVar.symbolValue));
            fields.push(addField('Number of Shares', 'number', 'shares', 'Enter Number of Shares', '', [], false, { step: '0.01' }));
            fields.push(addField('Price', 'number', 'price', 'Enter Price', '', [], false, { step: '0.01' }));
            fields.push(addField('Cost', 'number', 'cost', 'Total Cost', '', [], true, { step: '0.01' }));
            fields.push(addField('Property Location', 'text', 'property_location', 'Enter Property Location', ''));
            fields.push(addField('Property Type', 'text', 'property_type', 'Enter Property Type (Commercial, Residential)', ''));
            fields.push(addField('Rental Income', 'number', 'rental_income', 'Enter Rental Income', ''));
            // ... (other fields)
        } else if (selectedType === 'Commodity') {
            fields.push(addField('Commodity Name', 'text', 'symbol', 'Enter Commodity Name', phpVar.symbolValue));
            fields.push(addField('Number of Shares', 'number', 'shares', 'Enter Number of Shares', '', [], false, { step: '0.01' }));
            fields.push(addField('Price', 'number', 'price', 'Enter Price', '', [], false, { step: '0.01' }));
            fields.push(addField('Cost', 'number', 'cost', 'Total Cost', '', [], true, { step: '0.01' }));
            fields.push(addField('Commodity Type', 'select', 'commodity_type', 'Select Commodity Type', phpVar.commodityTypeValue));
            fields.push(addField('Unit of Measurement', 'text', 'unit_of_measurement', 'Enter Unit of Measurement', ''));
            fields.push(addField('Storage Costs', 'number', 'storage_costs', 'Enter Storage Costs', ''));
            // ... (other fields)
        } else if (selectedType === 'Foreign Stock') {
            fields.push(addSelectPicker('Symbol', 'symbol', 'Select or Search Symbol', phpVar.symbolValue));
            fields.push(addField('Number of Shares', 'number', 'shares', 'Enter Number of Shares', '', [], false, { step: '0.01' }));
            fields.push(addField('Price', 'number', 'price', 'Enter Price', '', [], false, { step: '0.01' }));
            fields.push(addField('Cost', 'number', 'cost', 'Total Cost', '', [], true, { step: '0.01' }));
            fields.push(addField('Country of Origin', 'text', 'country_of_origin', 'Enter Country of Origin', ''));
            fields.push(addField('Currency', 'text', 'currency', 'Enter Currency', ''));
            fields.push(addField('Local Exchange', 'text', 'local_exchange', 'Enter Local Exchange', ''));
            // ... (other fields)
        } else if (selectedType === 'Precious Metal') {
            fields.push(addSelectPicker('Symbol', 'symbol', 'Select or Search Symbol', phpVar.symbolValue));
            fields.push(addField('Quantity Purchased', 'number', 'shares', 'Enter Quantity Purchased', '', [], false, { step: '0.01' }));
            fields.push(addField('Price', 'number', 'price', 'Enter Price', '', [], false, { step: '0.01' }));
            fields.push(addField('Cost', 'number', 'cost', 'Total Cost', '', [], true, { step: '0.01' }));
            fields.push(addField('Purity', 'number', 'purity', 'Enter Purity', ''));
            fields.push(addField('Unit of Measurement', 'text', 'pm_unit_of_measurement', 'Enter Unit of Measurement', ''));
            fields.push(addField('Storage Costs', 'number', 'pm_storage_costs', 'Enter Storage Costs', ''));
            // ... (other fields)
        } else if (selectedType === 'International Bond') {
            fields.push(addField('Bond Type', 'select', 'bond_type', 'Select Bond Type', phpVar.bondTypeValue));
            fields.push(addSelectPicker('Symbol', 'symbol', 'Select or Search Symbol', phpVar.symbolValue));
            fields.push(addField('Number of Shares', 'number', 'shares', 'Enter Number of Shares', '', [], false, { step: '0.01' }));
            fields.push(addField('Price', 'number', 'price', 'Enter Price', '', [], false, { step: '0.01' }));
            fields.push(addField('Cost', 'number', 'cost', 'Total Cost', '', [], true, { step: '0.01' }));
            fields.push(addField('Country of Origin', 'text', 'ib_country_of_origin', 'Enter Country of Origin', ''));
            fields.push(addField('Currency', 'text', 'ib_currency', 'Enter Currency', ''));
            fields.push(addField('Local Exchange', 'text', 'ib_local_exchange', 'Enter Local Exchange', ''));
            // ... (other fields)
        }

        populateSymbolPicker(this.value);

        // Append the fields to the specificFields container
        specificFields.innerHTML = fields.join('');

        // Optionally, you can call lazyInitializeSelectPicker here if needed
        lazyInitializeSelectPicker();

        // Initialize the select picker
        $('.selectpicker').selectpicker();

        // Add new items dynamically
        $('.bs-searchbox input').on('keyup', function(e) {
            var newUserInput = $(this).val();
            
            // Find the closest parent .bootstrap-select and then find its .selectpicker
            var relatedSelectPicker = $(this).closest('.bootstrap-select').find('.selectpicker');
            
            // Check if the input value is already an option in the related selectpicker
            if (relatedSelectPicker.find("option:contains('" + newUserInput + "')").length === 0) {
                
                // Add the new option to the related selectpicker
                relatedSelectPicker.prepend($('<option>', {
                    value: newUserInput,
                    text: newUserInput
                }));
                
                // Refresh the related selectpicker
                relatedSelectPicker.selectpicker('refresh');
                
                // Select the new option in the related selectpicker
                relatedSelectPicker.selectpicker('val', newUserInput);
            }
        });

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

        // Re-attach event listeners
        const sharesElement = document.getElementById("shares");
        const priceElement = document.getElementById("price");

        if (sharesElement && priceElement) {
            sharesElement.addEventListener("input", handleInputEvent);
            priceElement.addEventListener("input", handleInputEvent);
        } else {
            console.error("Either shares or price element is missing.");
        }

        // Manually toggle the dropdown for the selectpicker button
        $('.bootstrap-select .dropdown-toggle').click(function() {
            $(this).parent().toggleClass('open').find('.dropdown-menu').toggleClass('show');
        });

        // Close the dropdown when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.bootstrap-select').length) {
                $('.bootstrap-select').removeClass('open').find('.dropdown-menu').removeClass('show');
            }
        });
    });
    
    // Function to populate the symbol picker
    async function populateSymbolPicker(selectedType) {
        try {
            const baseUrl = "<?php echo site_url('/Investments/API/getSymbolsByTradeType/'); ?>";
            const fullUrl = `${baseUrl}${selectedType}`;
            const response = await fetch(fullUrl);
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            const data = await response.json();
            console.log('Received data: ', data);
            if (Array.isArray(data.bestMatches)) {
                let options = '<option disabled selected>Enter or Search Symbol</option>';
                // Inside your populateSymbolPicker function
                data.bestMatches.forEach(match => {
                    const symbol = match["1. symbol"];
                    options += `<option value="${symbol}" data-tokens="${symbol}">${symbol}</option>`;
                });
                const symbolElement = document.getElementById('symbol');
                if (symbolElement) {
                    symbolElement.innerHTML = options;
                    $('#symbol').selectpicker('refresh');
                } else {
                    console.error('Symbol element not found');
                }
            } else {
                console.error('Data is not an array:', data);
            }
        } catch (error) {
            // console.error('Error fetching stock symbols:', error);
            console.log('Failed to fetch symbols: $(error)');
        }
    }

    // Attach event listeners to input fields to update phpVar and cost when they change
    const sharesInput = document.getElementById('shares');
    const exchangeInput = document.getElementById('exchange');
    const priceInput = document.getElementById('price');

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
</script>