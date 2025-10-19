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

        // Add common fields for all types
        fields.push(addWalletDropdown(phpVar));  // Include the wallet dropdown here

        if (selectedType !== 'Options') {
            fields.push(addSelectPicker('Position Type', 'position_type', 'Select Position Type', '', ['Buy', 'Sell', 'N/A']));
        }

        // Helper function to generate fields based on configurations
        const generateFieldsForType = (fieldConfigs) => {
            fieldConfigs.forEach(config => {
                fields.push(addField(config));
            });
        };

        // Fields based on selectedType
        if (selectedType === 'Cryptocurrency' || selectedType === 'Crypto Asset') {
            const cryptoFields = [
                { label: 'Symbol', type: 'select', name: 'symbol', placeholder: 'Select or Search Symbol', value: phpVar.symbolValue },
                { label: 'Number of Coins', type: 'number', name: 'shares', placeholder: 'Enter Number of Coins', extraAttributes: { step: '0.01' } },
                { label: 'Purchase Price', type: 'number', name: 'purchase_price', placeholder: 'Enter Purchase Price', extraAttributes: { step: '0.01' } },
                { label: 'Purchase Date', type: 'date', name: 'purchase_date', placeholder: 'Enter Purchase Date' },
                { label: 'Wallet', type: 'select', name: 'wallet', placeholder: 'Select Wallet', options: ['Coinbase', 'Binance', 'Kraken'] }
            ];
            generateFieldsForType(cryptoFields);
        } else if (selectedType === 'Stock') {
            const stockFields = [
                { label: 'Symbol', type: 'select', name: 'symbol', placeholder: 'Select or Search Symbol', value: phpVar.symbolValue },
                { label: 'Number of Shares', type: 'number', name: 'shares', placeholder: 'Enter Number of Shares', extraAttributes: { step: '0.01' } },
                { label: 'Purchase Price', type: 'number', name: 'purchase_price', placeholder: 'Enter Purchase Price', extraAttributes: { step: '0.01' } },
                { label: 'Purchase Date', type: 'date', name: 'purchase_date', placeholder: 'Enter Purchase Date' },
                { label: 'Broker', type: 'select', name: 'broker', placeholder: 'Select Broker', options: ['E-Trade', 'Robinhood', 'Fidelity'] },
                { label: 'Dividend Yield', type: 'number', name: 'dividend_yield', placeholder: 'Enter Dividend Yield', extraAttributes: { step: '0.01' } },
                { label: 'Sector', type: 'select', name: 'sector', placeholder: 'Select Sector', options: ['Technology', 'Healthcare', 'Finance'] },
                { label: 'Notes', type: 'textarea', name: 'notes', placeholder: 'Enter any additional notes' }
            ];
            generateFieldsForType(stockFields);
        } else if (selectedType === 'Bond') {
            const bondFields = [
                { label: 'Symbol', type: 'select', name: 'symbol', placeholder: 'Select or Search Symbol', value: phpVar.symbolValue },
                { label: 'Number of Shares', type: 'number', name: 'shares', placeholder: 'Enter Number of Shares', extraAttributes: { step: '0.01' } },
                { label: 'Purchase Price', type: 'number', name: 'purchase_price', placeholder: 'Enter Purchase Price', extraAttributes: { step: '0.01' } },
                { label: 'Maturity Date', type: 'date', name: 'maturity_date', placeholder: 'Enter Maturity Date' },
                { label: 'Coupon Rate', type: 'number', name: 'coupon_rate', placeholder: 'Enter Coupon Rate', extraAttributes: { step: '0.01' } },
                { label: 'Issuer', type: 'text', name: 'issuer', placeholder: 'Enter Issuer' }
            ];
            generateFieldsForType(bondFields);
        } // ... (continued)
        else if (selectedType === 'Forex') {
            const forexFields = [
                { label: 'Currency Pair', type: 'select', name: 'currency_pair', placeholder: 'Select Currency Pair', options: ['EUR/USD', 'GBP/USD', 'USD/JPY'] },
                { label: 'Lot Size', type: 'number', name: 'lot_size', placeholder: 'Enter Lot Size', extraAttributes: { step: '0.01' } },
                { label: 'Leverage', type: 'number', name: 'leverage', placeholder: 'Enter Leverage', extraAttributes: { step: '0.01' } },
                { label: 'Trade Date', type: 'date', name: 'trade_date', placeholder: 'Enter Trade Date' }
            ];
            generateFieldsForType(forexFields);
        } else if (selectedType === 'Options') {
            const optionsFields = [
                { label: 'Option Type', type: 'select', name: 'option_type', placeholder: 'Select Option Type', options: ['Call', 'Put'] },
                { label: 'Strike Price', type: 'number', name: 'strike_price', placeholder: 'Enter Strike Price', extraAttributes: { step: '0.01' } },
                { label: 'Expiration Date', type: 'date', name: 'expiration_date', placeholder: 'Enter Expiration Date' },
                { label: 'Premium', type: 'number', name: 'premium', placeholder: 'Enter Premium', extraAttributes: { step: '0.01' } }
            ];
            generateFieldsForType(optionsFields);
        } else if (selectedType === 'Mutual Fund') {
            const mutualFundFields = [
                { label: 'Fund Name', type: 'text', name: 'fund_name', placeholder: 'Enter Fund Name' },
                { label: 'NAV', type: 'number', name: 'nav', placeholder: 'Enter NAV', extraAttributes: { step: '0.01' } },
                { label: 'Units', type: 'number', name: 'units', placeholder: 'Enter Units', extraAttributes: { step: '0.01' } }
            ];
            generateFieldsForType(mutualFundFields);
        } else if (selectedType === 'Exchange-Traded Fund (ETF)') {
            const etfFields = [
                { label: 'ETF Name', type: 'text', name: 'etf_name', placeholder: 'Enter ETF Name' },
                { label: 'Sector', type: 'select', name: 'sector', placeholder: 'Select Sector', options: ['Technology', 'Healthcare', 'Finance'] },
                { label: 'Expense Ratio', type: 'number', name: 'expense_ratio', placeholder: 'Enter Expense Ratio', extraAttributes: { step: '0.01' } }
            ];
            generateFieldsForType(etfFields);
        } else if (selectedType === 'Real Estate') {
            const realEstateFields = [
                { label: 'Property Name', type: 'text', name: 'property_name', placeholder: 'Enter Property Name' },
                { label: 'Location', type: 'text', name: 'location', placeholder: 'Enter Location' },
                { label: 'Property Value', type: 'number', name: 'property_value', placeholder: 'Enter Property Value', extraAttributes: { step: '0.01' } },
                { label: 'Rent', type: 'number', name: 'rent', placeholder: 'Enter Rent', extraAttributes: { step: '0.01' } }
            ];
            generateFieldsForType(realEstateFields);
        } else if (selectedType === 'Commodity') {
            const commodityFields = [
                { label: 'Commodity Type', type: 'select', name: 'commodity_type', placeholder: 'Select Commodity Type', options: ['Oil', 'Gold', 'Silver'] },
                { label: 'Quantity', type: 'number', name: 'quantity', placeholder: 'Enter Quantity', extraAttributes: { step: '0.01' } },
                { label: 'Unit Price', type: 'number', name: 'unit_price', placeholder: 'Enter Unit Price', extraAttributes: { step: '0.01' } }
            ];
            generateFieldsForType(commodityFields);
        } else if (selectedType === 'Foreign Stock') {
            const foreignStockFields = [
                { label: 'Country', type: 'select', name: 'country', placeholder: 'Select Country', options: ['Japan', 'Germany', 'UK'] },
                { label: 'Exchange Rate', type: 'number', name: 'exchange_rate', placeholder: 'Enter Exchange Rate', extraAttributes: { step: '0.01' } }
            ];
            generateFieldsForType(foreignStockFields);
        } else if (selectedType === 'Precious Metal') {
            const preciousMetalFields = [
                { label: 'Metal Type', type: 'select', name: 'metal_type', placeholder: 'Select Metal Type', options: ['Gold', 'Silver', 'Platinum'] },
                { label: 'Weight (grams)', type: 'number', name: 'weight', placeholder: 'Enter Weight', extraAttributes: { step: '0.01' } },
                { label: 'Purity (%)', type: 'number', name: 'purity', placeholder: 'Enter Purity', extraAttributes: { step: '0.01' } }
            ];
            generateFieldsForType(preciousMetalFields);
        } else if (selectedType === 'International Bond') {
            const internationalBondFields = [
                { label: 'Country', type: 'select', name: 'country', placeholder: 'Select Country', options: ['Japan', 'Germany', 'UK'] },
                { label: 'Coupon Rate (%)', type: 'number', name: 'coupon_rate', placeholder: 'Enter Coupon Rate', extraAttributes: { step: '0.01' } },
                { label: 'Maturity Date', type: 'date', name: 'maturity_date', placeholder: 'Enter Maturity Date' }
            ];
            generateFieldsForType(internationalBondFields);
        }

        // Append the fields to the specificFields container
        specificFields.innerHTML = fields.map(field => field.outerHTML).join('');

        // Initialize the select picker and other functionalities
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
    
        document.addEventListener('DOMContentLoaded', (event) => {
            // Your code here
            document.addEventListener("DOMContentLoaded", function() {
                // Your existing code here

            const tradeTypeElement = document.getElementById('trade_type');
                if (tradeTypeElement) {
                    tradeTypeElement.addEventListener('change', function() {
                        const selectedType = this.value;
                        const symbol = document.getElementById('symbol').value;
                        fetchLiveUpdates(selectedType, symbol);
                        // Attach event listeners to input fields to update phpVar when they change
                        const sharesInput = document.getElementById('shares');
                        if (sharesInput) {
                            sharesInput.addEventListener('input', updatePhpVar);
                        } else {
                            console.error("Element with ID 'shares' not found.");
                        }
                    });
                } else {
                    console.error("Element with ID 'trade_type' not found.");
                }
            });

            document.getElementById('trade_type').addEventListener('change', function() {
            });
            document.getElementById('symbol').addEventListener('change', function() {
                const selectedType = document.getElementById('trade_type').value;
                const symbol = this.value;
                fetchLiveUpdates(selectedType, symbol);
            });
        });
        
        document.addEventListener('input', function(e) {
            if (e.target.id === 'shares') {
                updatePhpVar();
            }
        });
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

    const exchangeInput = document.getElementById('exchange');
    const priceInput = document.getElementById('price');

    async function fetchLiveUpdates(selectedType, symbol) {        
        let apiURL = `/fetchRealTimeData/${selectedType}/${symbol}`;
        
        $.ajax({
            url: apiURL,
            type: 'GET',
            success: function(response) {
                document.getElementById('price').value = response.price;

                // Attach event listeners to input fields to update phpVar and cost when they change
                const sharesElement = document.getElementById('shares');
                if (sharesElement) {
                    sharesElement.addEventListener('input', updatePhpVar);
                } else {
                    console.error("Element with ID 'shares' not found.");
                }
                
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

    // function fetchLiveUpdates(selectedType, symbol) {
    //     let apiURL = `/fetchRealTimeData/${selectedType}/${symbol}`;
        
    //     $.ajax({
    //         url: apiURL,
    //         type: 'GET',
    //         success: function(response) {
    //             document.getElementById('price').value = response.price;
                
    //             if (selectedType === 'Stock') {
    //                 document.getElementById('dividend_yield').value = response.dividend_yield;
    //                 document.getElementById('market_cap').value = response.market_cap;
    //                 document.getElementById('pe_ratio').value = response.pe_ratio;
    //             } else if (selectedType === 'Cryptocurrency' || selectedType === 'Crypto Asset') {
    //                 document.getElementById('wallet_address').value = response.wallet_address;
    //                 document.getElementById('transaction_hash').value = response.transaction_hash;
    //                 document.getElementById('network_fees').value = response.network_fees;
    //             }
    //             // ... (other types)
                
    //             updateCost();
    //         },
    //         error: function(error) {
    //             document.getElementById('error-message').innerText = 'Error fetching live updates';
    //         }
    //     });
    // }


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