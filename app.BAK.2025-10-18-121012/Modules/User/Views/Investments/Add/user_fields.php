<?php /* /users/views/user_fields.php */
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
<div class="container mt-5">
    <h2 class="mb-4"><?= 'Add Investment/Trade'; ?></h2>
    <!-- <?php if ($formMode === 'Add'): ?>
        <h2 class="mb-4"><?= 'Add Investment/Trade'; ?></h2>
    <?php elseif ($formMode === 'Edit'): ?>
        <h2 class="mb-4"><?= 'Integrate ' . esc($accountName) . ' - ' . esc($accountType) . ' Account'; ?></h2>
    <?php endif; ?> -->

    <?= form_open('path/to/form/submit', ['class' => 'needs-validation', 'novalidate' => '']); ?>

    <?php if (session('cuUserType') === 'Beta'): ?>
        <input type="hidden" id="beta" name="beta" value="<?= old('beta', 'Yes'); ?>" />
    <?php else: ?>
        <input type="hidden" id="beta" name="beta" value="<?= old('beta', 'No'); ?>" />
    <?php endif; ?>

    <input type="hidden" class="form-control" name="form_mode" id="form_mode" value="<?= old('form_mode', $formMode); ?>">  
    <input type="hidden" class="form-control" name="user_id" id="user_id" value="<?= old('user_id', session('cuID')); ?>"> 
    <input type="hidden" class="form-control" name="user_email" id="user_email" value="<?= old('user_email', session('cuEmail')); ?>">  
    <input type="hidden" class="form-control" name="username" id="username" value="<?= old('username', session('cuUsername')); ?>">  

    <div class="form-group mb-2">
        <label for="trade_date" class="form-label">Open Date</label>
        <input type="date" class="form-control" name="trade_date" id="trade_date" placeholder="Enter Trade Date" value="<?= old('trade_date'); ?>">
    </div>
    <div class="form-group mb-2">
        <label for="trade_time" class="form-label">Open Time</label>
        <input type="time" class="form-control" name="trade_time" id="trade_time" placeholder="Enter Trade Time (Optional)" value="<?= old('trade_time'); ?>">
    </div>

    <div class="form-group mb-2">
        <label for="trade_type" class="form-label">Type of Investment</label>
        <select name="trade_type" class="form-control" id="trade_type" required style="height: 40px; padding: 10px;">
            <!-- <option value="N/A">Select-An-Option</option>
            <option value="Cryptocurrency">Cryptocurrency</option>
            <option value="Crypto Asset">Crypto Asset</option>
            <option value="Stock">Stock</option> -->
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
                $selected = old('trade_type') == $value ? ' selected="selected"' : "";
                echo '<option value="' . esc($value) . '"' . $selected . '>' . esc($display_text) . '</option>';
            } 
            ?>
        </select>
    </div>

    <!-- Additional Dynamic Fields Will Be Inserted Here -->
    <div id="specific_fields"></div>

    <!-- Error Handling Section -->
    <div id="error-message"></div>

    <!-- Modal Trigger -->
    <a href="#" data-bs-toggle="modal" data-bs-target="#addWalletModal">+ Add New Wallet</a>

    <?= form_close(); ?>
</div>

<!-- Add Wallet Modal -->
<div class="modal fade" id="addWalletModal" tabindex="-1" aria-labelledby="addWalletModalLabel" aria-hidden="true">
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

// Event listener for trade_type change
document.querySelector('#trade_type').addEventListener('change', function() {
    // Main logic for handling change in trade_type goes here
    generateFieldsForTradeType(this.value);
});

// Populate symbol picker based on selected trade type
function populateSymbolPicker(selectedType) {
    $.ajax({
        url: <?php echo site_url('/Investments/API/getSymbolsByTradeType/'); ?> + selectedType,
        success: function(data) {
            let options = '<option disabled selected>Choose Symbol</option>';
            data.forEach(function(symbol) {
                options += `<option value="${symbol.value}">${symbol.text}</option>`;
            });
            $('#symbol').html(options).selectpicker('refresh');
        }
    });
}

// Save the new wallet logic
$('#saveNewWallet').click(function() {
    saveNewWallet();
});

// Show modal on clicking add new wallet link
$("a[href='#addWalletModal']").click(function(e) {
    e.preventDefault();
    $('#addWalletModal').modal('show');
});

// Function to save new wallet
function saveNewWallet() {
    const newWalletName = $('#newWalletName').val();
    if (newWalletName) {
        $.ajax({
            url: 'path/to/save/wallet', // !! FIX THIS
            method: 'POST',
            data: { walletName: newWalletName },
            success: function(data) {
                if(data.success) {
                    $('#wallet').append(`<option value="${data.walletId}" selected>${newWalletName}</option>`).selectpicker('refresh');
                    $('#addWalletModal').modal('hide');
                } else {
                    alert('Failed to add new wallet');
                }
            },
            error: function() {
                alert('Error adding new wallet');
            }
        });
    }
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

// Initialization and event binding code here
$(document).ready(function() {
    $('#trade_type').change(function() {
        let selectedType = $(this).val();
        generateFieldsForTradeType(selectedType);
        populateSymbolPicker(selectedType);
    });

    // Ensure select pickers are initialized
    $('body').on('shown.bs.modal', function () {
        $('.selectpicker', this).selectpicker('refresh');
    });

    // If dynamically adding select pickers, ensure to initialize them
    // Function to generate fields based on selected trade type
    function generateFieldsForTradeType(selectedType) {
        let fieldsHtml = '';
        switch (selectedType) {
            // Cryptocurrency / Crypto Asset
            case 'Cryptocurrency':
            case 'Crypto Asset':
                fieldsHtml += addSelectPicker('Symbol', 'symbol', 'Select or Search Symbol', phpVar.symbolValue, []);
                fieldsHtml += addField('Number of Coins', 'number', 'shares', 'Enter Number of Coins', '', [], false, {step: '0.01'});
                fieldsHtml += addField('Price', 'number', 'price', 'Enter Price', '', [], false, {step: '0.01'});
                fieldsHtml += addField('Cost', 'number', 'cost', 'Total Cost', '', [], true, {step: '0.01'});
                fieldsHtml += addField('Wallet Address', 'text', 'wallet_address', 'Enter Wallet Address', '');
                fieldsHtml += addField('Transaction Hash', 'text', 'transaction_hash', 'Enter Transaction Hash', '');
                fieldsHtml += addField('Network Fees', 'number', 'network_fees', 'Enter Network Fees', '');
                break;
            // Stock
            case 'Stock':
                fieldsHtml += addSelectPicker('Symbol', 'symbol', 'Select or Search Symbol', phpVar.symbolValue, []);
                fieldsHtml += addField('Number of Shares', 'number', 'shares', 'Enter Number of Shares', '', [], false, {step: '1'});
                fieldsHtml += addField('Price', 'number', 'price', 'Enter Price', '', [], false, {step: '0.01'});
                fieldsHtml += addField('Cost', 'number', 'cost', 'Total Cost', '', [], true, {step: '0.01'});
                fieldsHtml += addField('Dividend Yield', 'number', 'dividend_yield', 'Enter Dividend Yield', '');
                fieldsHtml += addField('Market Cap', 'number', 'market_cap', 'Enter Market Cap', '');
                fieldsHtml += addField('P/E Ratio', 'number', 'pe_ratio', 'Enter P/E Ratio', '');
                break;
            // Bond
            case 'Bond':
                fieldsHtml += addSelectPicker('Symbol', 'symbol', 'Select or Search Symbol', phpVar.symbolValue, []);
                fieldsHtml += addField('Number of Bonds', 'number', 'shares', 'Enter Number of Bonds', '', [], false, {step: '1'});
                fieldsHtml += addField('Price', 'number', 'price', 'Enter Price', '', [], false, {step: '0.01'});
                fieldsHtml += addField('Cost', 'number', 'cost', 'Total Cost', '', [], true, {step: '0.01'});
                fieldsHtml += addField('Bond Type', 'select', 'bond_type', 'Select Bond Type', phpVar.bondTypeValue);
                fieldsHtml += addField('Maturity Date', 'date', 'maturity_date', 'Enter Maturity Date', '');
                fieldsHtml += addField('Coupon Rate', 'number', 'coupon_rate', 'Enter Coupon Rate', '', [], false, {step: '0.01'});
                fieldsHtml += addField('Issuer', 'text', 'issuer', 'Enter Issuer', '');
                break;
            // Forex
            case 'Forex':
                fieldsHtml += addSelectPicker('Currency Pair', 'currency_pair', 'Select Currency Pair', phpVar.currencyPairValue, []);
                fieldsHtml += addField('Amount', 'number', 'amount', 'Enter Amount', '', [], false, {step: '1000'});
                fieldsHtml += addField('Leverage', 'number', 'leverage', 'Enter Leverage', '', [], false, {step: '1'});
                fieldsHtml += addField('Price', 'number', 'price', 'Enter Price', '', [], false, {step: '0.0001'});
                fieldsHtml += addField('Cost', 'number', 'cost', 'Total Cost', '', [], true, {step: '0.01'});
                fieldsHtml += addField('Spread', 'number', 'spread', 'Enter Spread', '', [], false, {step: '0.0001'});
                break;
            // Options
            case 'Options':
                fieldsHtml += addSelectPicker('Symbol', 'symbol', 'Select or Search Symbol', phpVar.symbolValue, []);
                fieldsHtml += addField('Option Type', 'select', 'option_type', 'Select Option Type', phpVar.optionTypeValue);
                fieldsHtml += addField('Number of Contracts', 'number', 'number_of_contracts', 'Enter Number of Contracts', '', [], false, {step: '1'});
                fieldsHtml += addField('Price', 'number', 'price', 'Enter Price per Contract', '', [], false, {step: '0.01'});
                fieldsHtml += addField('Cost', 'number', 'cost', 'Total Cost', '', [], true, {step: '0.01'});
                fieldsHtml += addField('Expiry Date', 'date', 'expiry_date', 'Enter Expiry Date', '');
                fieldsHtml += addField('Strike Price', 'number', 'strike_price', 'Enter Strike Price', '', [], false, {step: '0.01'});
                fieldsHtml += addField('Option Style', 'select', 'option_style', 'Select Option Style', ['American', 'European']);
                break;
            // Mutual Fund
            case 'Mutual Fund':
                fieldsHtml += addField('Mutual Fund Name', 'text', 'fund_name', 'Enter Mutual Fund Name', phpVar.mutualFundName);
                fieldsHtml += addSelectPicker('Symbol', 'symbol', 'Select or Search Symbol', phpVar.symbolValue, []);
                fieldsHtml += addField('Number of Shares', 'number', 'shares', 'Enter Number of Shares', '', [], false, {step: '1'});
                fieldsHtml += addField('Price', 'number', 'price', 'Enter Purchase Price', '', [], false, {step: '0.01'});
                fieldsHtml += addField('NAV', 'number', 'nav', 'Enter Net Asset Value', '', [], false, {step: '0.01'});
                fieldsHtml += addField('Expense Ratio', 'number', 'expense_ratio', 'Enter Expense Ratio', '', [], false, {step: '0.01'});
                break;
                // Exchange-Traded Fund (ETF)
            case 'Exchange-Traded Fund (ETF)':
                fieldsHtml += addSelectPicker('Symbol', 'symbol', 'Select or Search Symbol', phpVar.symbolValue, []);
                fieldsHtml += addField('Number of Shares', 'number', 'shares', 'Enter Number of Shares', '', [], false, {step: '0.01'});
                fieldsHtml += addField('Price', 'number', 'price', 'Enter Price', '', [], false, {step: '0.01'});
                fieldsHtml += addField('Cost', 'number', 'cost', 'Total Cost', '', [], true, {step: '0.01'});
                fieldsHtml += addField('Fund Type', 'select', 'fund_type', 'Select Fund Type', phpVar.fundTypeValue);
                fieldsHtml += addField('Underlying Index', 'text', 'underlying_index', 'Enter Underlying Index', '');
                fieldsHtml += addField('Expense Ratio', 'number', 'etf_expense_ratio', 'Enter Expense Ratio', '', [], false, {step: '0.01'});
                fieldsHtml += addField('Asset Class', 'text', 'asset_class', 'Enter Asset Class', '');
                break;

            // Real Estate
            case 'Real Estate':
                fieldsHtml += addField('Property Name', 'text', 'property_name', 'Enter Property Name', phpVar.propertyName);
                fieldsHtml += addField('Number of Units', 'number', 'units', 'Enter Number of Units', '', [], false, {step: '1'});
                fieldsHtml += addField('Price', 'number', 'price', 'Enter Price', '', [], false, {step: '0.01'});
                fieldsHtml += addField('Cost', 'number', 'cost', 'Total Cost', '', [], true, {step: '0.01'});
                fieldsHtml += addField('Property Location', 'text', 'property_location', 'Enter Property Location', '');
                fieldsHtml += addField('Property Type', 'select', 'property_type', 'Select Property Type', ['Commercial', 'Residential']);
                fieldsHtml += addField('Rental Income', 'number', 'rental_income', 'Enter Rental Income', '', [], false, {step: '0.01'});
                break;

            // Commodity
            case 'Commodity':
                fieldsHtml += addField('Commodity Name', 'text', 'commodity_name', 'Enter Commodity Name', phpVar.commodityName);
                fieldsHtml += addField('Quantity', 'number', 'quantity', 'Enter Quantity', '', [], false, {step: '1'});
                fieldsHtml += addField('Price', 'number', 'price', 'Enter Price', '', [], false, {step: '0.01'});
                fieldsHtml += addField('Cost', 'number', 'cost', 'Total Cost', '', [], true, {step: '0.01'});
                fieldsHtml += addField('Commodity Type', 'select', 'commodity_type', 'Select Commodity Type', phpVar.commodityTypeValue);
                fieldsHtml += addField('Unit of Measurement', 'text', 'unit_of_measurement', 'Enter Unit of Measurement', '');
                fieldsHtml += addField('Storage Costs', 'number', 'storage_costs', 'Enter Storage Costs', '', [], false, {step: '0.01'});
                break;

            // Foreign Stock
            case 'Foreign Stock':
                fieldsHtml += addSelectPicker('Symbol', 'symbol', 'Select or Search Symbol', phpVar.symbolValue, []);
                fieldsHtml += addField('Number of Shares', 'number', 'shares', 'Enter Number of Shares', '', [], false, {step: '1'});
                fieldsHtml += addField('Price', 'number', 'price', 'Enter Price', '', [], false, {step: '0.01'});
                fieldsHtml += addField('Cost', 'number', 'cost', 'Total Cost', '', [], true, {step: '0.01'});
                fieldsHtml += addField('Country of Origin', 'text', 'country_of_origin', 'Enter Country of Origin', '');
                fieldsHtml += addField('Currency', 'text', 'currency', 'Enter Currency', '');
                fieldsHtml += addField('Local Exchange', 'text', 'local_exchange', 'Enter Local Exchange', '');
                break;

            // Precious Metal
            case 'Precious Metal':
                fieldsHtml += addSelectPicker('Metal', 'metal', 'Select Metal', phpVar.metalValue, []);
                fieldsHtml += addField('Quantity Purchased', 'number', 'quantity', 'Enter Quantity Purchased', '', [], false, {step: '0.01'});
                fieldsHtml += addField('Price', 'number', 'price', 'Enter Price', '', [], false, {step: '0.01'});
                fieldsHtml += addField('Cost', 'number', 'cost', 'Total Cost', '', [], true, {step: '0.01'});
                fieldsHtml += addField('Purity', 'text', 'purity', 'Enter Purity', '');
                fieldsHtml += addField('Unit of Measurement', 'text', 'unit_of_measurement', 'Enter Unit of Measurement', '');
                fieldsHtml += addField('Storage Costs', 'number', 'storage_costs', 'Enter Storage Costs', '', [], false, {step: '0.01'});
                break;

            // International Bond
            case 'International Bond':
                fieldsHtml += addField('Bond Type', 'select', 'bond_type', 'Select Bond Type', phpVar.bondTypeValue);
                fieldsHtml += addSelectPicker('Symbol', 'symbol', 'Select or Search Symbol', phpVar.symbolValue, []);
                fieldsHtml += addField('Number of Bonds', 'number', 'bonds', 'Enter Number of Bonds', '', [], false, {step: '1'});
                fieldsHtml += addField('Price', 'number', 'price', 'Enter Price', '', [], false, {step: '0.01'});
                fieldsHtml += addField('Cost', 'number', 'cost', 'Total Cost', '', [], true, {step: '0.01'});
                fieldsHtml += addField('Country of Origin', 'text', 'country_of_origin', 'Enter Country of Origin', '');
                fieldsHtml += addField('Currency', 'text', 'currency', 'Enter Currency', '');
                fieldsHtml += addField('Local Exchange', 'text', 'local_exchange', 'Enter Local Exchange', '');
                break;

            // Additional cases for Bond, Forex, Options, Mutual Fund, ETF, Real Estate, Commodity, Foreign Stock, Precious Metal, International Bond
        }

        $('#specific_fields').html(fieldsHtml);
        $('.selectpicker').selectpicker('refresh'); // Refresh selectpickers to apply changes
    }
});

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
