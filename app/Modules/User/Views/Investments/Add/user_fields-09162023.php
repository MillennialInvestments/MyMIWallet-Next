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
                'Bond'                  => 'Bond',
                'Commodity'             => 'Commodity',
                'Cryptocurrency'        => 'Cryptocurrency',
                'Crypto Asset'          => 'Crypto Asset',
                'ETF'                   => 'Exchange-Traded Fund (ETF)',
                'Foreign Stock'         => 'Foreign Stock',
                'Forex'                 => 'Forex',
                'International Bond'    => 'International Bond',
                'Options'               => 'Options',
                'Mutual Fund'           => 'Mutual Fund',
                'Precious Metal'        => 'Precious Metal',
                'Real Estate'           => 'Real Estate',
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

    // Function to update shares and exchange values
    function updateValues(shares, exchange) {
        phpVar.sharesValue = shares;
        // phpVar.exchangeValue = exchange;
    }

    // Function to update sharesValue and exchangeValue in phpVar
    function updatePhpVar() {
        phpVar.sharesValue = document.getElementById('shares').value;
        // phpVar.exchangeValue = document.getElementById('exchange').value;
    }

    // Function to calculate and update the cost
    function updateCost() {
        const sharesField = document.getElementById('shares');
        const priceField = document.getElementById('price');
        const costField = document.getElementById('cost');

        if (sharesField && priceField && costField) {
            const shares = parseFloat(sharesField.value) || 0;
            const price = parseFloat(priceField.value) || 0;
            const cost = shares * price;
            costField.value = cost.toFixed(2);
        }
    }

    // Attach event listeners to dynamically created input fields
    document.addEventListener('input', function(e) {
        if (e.target.id === 'shares' || e.target.id === 'price') {
            updateCost();
        }
    });

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
        if (phpVar.userInvestmentWallets && Array.isArray(phpVar.userInvestmentWallets)) {
            phpVar.userInvestmentWallets.forEach(wallet => {
                walletOptions += `<option value="${wallet.id}">${wallet.nickname}</option>`;
            });
        }
        return `
            <div class="form-group row mb-2">
                <label for="wallet" class="col-6 form-label">Wallet <a href="#">+Add New Wallet</a></label>
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


        populateSymbolPicker(selectedType);

        // // fields.push(addField('Cost', 'number', 'cost', 'Total Cost', 0));
        // fields.push(addField('Price', 'number', 'price', 'Enter Price', '', [], false, { step: '0.01' }));
        // fields.push(addField('Cost', 'number', 'cost', 'Total Cost', '', [], true, { step: '0.01' }));


        // Append the fields to the specificFields container
        specificFields.innerHTML = fields.join('');

        // Optionally, you can call lazyInitializeSelectPicker here if needed
        lazyInitializeSelectPicker();

        // Initialize the select picker
        $('.selectpicker').selectpicker();

        // Add new items dynamically
        $('.bs-searchbox input').on('keyup', function(e) {
            var newUserInput = $(this).val();
            
            // Check if the input value is already an option
            if ($('.selectpicker').find("option:contains('" + newUserInput + "')").length === 0) {
            
                // Add the new option
                $('.selectpicker').append($('<option>', {
                    value: newUserInput,
                    text: newUserInput
                }));
                
                // Refresh the selectpicker
                $('.selectpicker').selectpicker('refresh');
                
                // Select the new option
                $('.selectpicker').selectpicker('val', newUserInput);
            }
        });

        
        // Attach event listeners to input fields to update phpVar when they change
        document.getElementById('shares').addEventListener('input', updatePhpVar);
        // document.getElementById('exchange').addEventListener('input', updatePhpVar);
    });

    $(document).ready(function() {
        // Open the modal when a specific option is selected
        $('#wallet').change(function() {
            if ($(this).val() === 'AddNew') {
                $('#addWalletModal').modal('show');
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
    });


    // Function to populate the symbol picker
    async function populateSymbolPicker(selectedType) {
        try {
            const response = await fetch(`getSymbolsByTradeType/${selectedType}`);
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
                    $('.selectpicker').selectpicker('refresh');
                } else {
                    console.error('Symbol element not found');
                }
            } else {
                console.error('Data is not an array:', data);
            }
        } catch (error) {
            console.error('Error fetching stock symbols:', error);
        }
    }

    // Attach event listeners to input fields to update phpVar and cost when they change
    const sharesInput = document.getElementById('shares');
    const exchangeInput = document.getElementById('exchange');
    const priceInput = document.getElementById('price');

    function fetchLiveUpdates(selectedType, symbol) {
        let baseUrl = "<?php echo site_url('Investments/API/fetchRealTimeData/'); ?>";
        let apiURL = `${baseUrl}${selectedType}/${symbol}`;
        
        $.ajax({
            url: apiURL,
            type: 'GET',
            success: function(response) {
                document.getElementById('price').value = response.price;
                
                if (selectedType === 'Stock') {
                    document.getElementById('dividend_yield').value = response.dividend_yield;
                    document.getElementById('market_cap').value = response.market_cap;
                    document.getElementById('pe_ratio').value = response.pe_ratio;
                } else if (selectedType === 'Cryptocurrency' || selectedType === 'Crypto Asset') {
                    document.getElementById('wallet_address').value = response.wallet_address;
                    document.getElementById('transaction_hash').value = response.transaction_hash;
                    document.getElementById('network_fees').value = response.network_fees;
                }
                // ... (other types)
                
                updateCost();
            },
            error: function(error) {
                document.getElementById('error-message').innerText = 'Error fetching live updates';
            }
        });
    }

    $(document).ready(function() {
        document.getElementById('trade_type').addEventListener('change', function() {
            console.log('Trade type changed:', this.value); // Add this line for debugging
            const selectedType = this.value;
            const symbol = document.getElementById('symbol').value;
            fetchLiveUpdates(selectedType, symbol);
        });
    });
    
    document.addEventListener('DOMContentLoaded', (event) => {
        // Your code here
        document.getElementById('symbol').addEventListener('change', function() {
            const selectedType = document.getElementById('trade_type').value;
            const symbol = this.value;
            fetchLiveUpdates(selectedType, symbol);
        });
    });


    // // Add this function to your existing JavaScript code
    // function saveForm() {
    //     const formData = {
    //         tradeType: $('#trade_type').val(),
    //         tradeDate: $('#trade_date').val(),
    //         symbol: $('#symbol').val(),
    //         shares: $('#shares').val(),
    //         // ... (other fields)
    //     };

    //     // AJAX call to save the form data
    //     $.ajax({
    //         url: '/Save',  // Replace with your server-side save URL
    //         type: 'POST',
    //         data: formData,
    //         success: function(response) {
    //             console.log('Save successful:', response);
    //             alert('Data saved successfully');
    //         },
    //         error: function(error) {
    //             console.log('Save failed:', error);
    //             alert('Failed to save data');
    //         }
    //     });
    // }

    // // Add this line to your existing $(document).ready function
    // $('#saveForm').click(function() {
    //     saveForm();
    // });

    
    // // Function to auto-save form data
    // function autoSaveFormData() {
    //     const formData = new FormData(document.querySelector('form')); // Assuming your form has a 'form' tag
    //     fetch('<?=site_url("/Autosave")?>', {
    //         method: 'POST',
    //         body: formData
    //     })
    //     .then(response => response.json())
    //     .then(data => {
    //         if (data.status === 'success') {
    //             console.log('Auto-save successful');
    //         } else {
    //             console.log('Auto-save failed');
    //         }
    //     })
    //     .catch(error => {
    //         console.log('Error:', error);
    //     });
    // }

    
    // if (sharesInput && exchangeInput && priceInput) {
    //     sharesInput.addEventListener('input', function() {
    //         updateValues(this.value, phpVar.exchangeValue);
    //         updateCost();
    //     });
    //     exchangeInput.addEventListener('input', function() {
    //         updateValues(phpVar.sharesValue, this.value);
    //     });
    //     priceInput.addEventListener('input', updateCost);
    // }    

    // // AJAX call for real-time price update
    // function fetchLiveUpdates(selectedType, symbol) {
    //     let apiURL = `/API/${apiFunction}/${selectedType}/${symbol}`;
        
    //     $.ajax({
    //         url: apiURL,
    //         type: 'GET',
    //         success: function(response) {
    //             // Update the UI with the live data
    //             document.getElementById('price').value = response.price;
    //             // Update the cost
    //             updateCost();
    //         },
    //         error: function(error) {
    //             // Show error message on UI
    //             document.getElementById('error-message').innerText = 'Error fetching live updates';
    //         }
    //     });
    // }

    // // Auto-save function
    // function autoSave() {
    //     const formData = {
    //         tradeType: document.getElementById('trade_type') ? document.getElementById('trade_type').value : null,
    //         tradeDate: document.getElementById('trade_date') ? document.getElementById('trade_date').value : null,
    //         symbol: document.getElementById('symbol') ? document.getElementById('symbol').value : null,
    //         shares: document.getElementById('shares') ? document.getElementById('shares').value : null,
    //         exchange: document.getElementById('exchange') ? document.getElementById('exchange').value : null,
    //         price: document.getElementById('price') ? document.getElementById('price').value : null,
    //         cost: document.getElementById('cost') ? document.getElementById('trade_type').value : null,
    //         // Fields for Stocks
    //         stockSymbol: document.getElementById('stock_symbol') ? document.getElementById('stock_symbol').value : null,
    //         // Fields for Bonds
    //         bondName: document.getElementById('bond_name') ? document.getElementById('bond_name').value : null,
    //         bondType: document.getElementById('bond_type') ? document.getElementById('bond_type').value : null,
    //         // Fields for Forex
    //         currencyPair: document.getElementById('currency_pair') ? document.getElementById('currency_pair').value : null,
    //         // Fields for Options
    //         optionType: document.getElementById('option_type') ? document.getElementById('option_type').value : null,
    //         numberOfContracts: document.getElementById('number_of_contracts') ? document.getElementById('number_of_contracts').value : null,
    //         // Fields for Mutual Funds
    //         mutualFundName: document.getElementById('mutual_fund_name') ? document.getElementById('mutual_fund_name').value : null,
    //         fundType: document.getElementById('fund_type') ? document.getElementById('fund_type').value : null,
    //         // Fields for Cryptocurrency
    //         cryptoSymbol: document.getElementById('crypto_symbol') ? document.getElementById('crypto_symbol').value : null,
    //         // Fields for Real Estate
    //         propertyName: document.getElementById('property_name') ? document.getElementById('property_name').value : null,
    //         propertyType: document.getElementById('property_type') ? document.getElementById('property_type').value : null,
    //         // Fields for Commodities
    //         commodityName: document.getElementById('commodity_name') ? document.getElementById('commodity_name').value : null,
    //         commodityType: document.getElementById('commodity_type') ? document.getElementById('commodity_type').value : null,
    //         // Fields for ETFs (Exchange-Traded Funds)
    //         etfName: document.getElementById('etf_name') ? document.getElementById('etf_name').value : null,
    //         etfType: document.getElementById('etf_type') ? document.getElementById('etf_type').value : null,
    //         // Fields for Precious Metals
    //         metalName: document.getElementById('metal_name') ? document.getElementById('metal_name').value : null,
    //         metalType: document.getElementById('metal_type') ? document.getElementById('metal_type').value : null,
    //         // Fields for International Bonds
    //         internationalBondName: document.getElementById('international_bond_name') ? document.getElementById('international_bond_name').value : null,
    //         internationalBondType: document.getElementById('international_bond_type') ? document.getElementById('international_bond_type').value : null,
    //         // Fields for Foreign Stocks
    //         foreignStockSymbol: document.getElementById('foreign_stock_symbol') ? document.getElementById('foreign_stock_symbol').value : null,
    //     };


    //     $.ajax({
    //         url: 'Investments/Autosave',
    //         type: 'POST',
    //         data: formData,
    //         success: function(response) {
    //             console.log('Auto-save successful');
    //         },
    //         error: function(error) {
    //             console.log('Auto-save failed');
    //         }
    //     });
    // }

    // // Trigger auto-save every 5 minutes
    // setInterval(autoSave, 300000);
</script>