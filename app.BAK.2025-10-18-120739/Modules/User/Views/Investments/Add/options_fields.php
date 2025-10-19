<!-- Options-specific form fields -->
<input type="hidden" class="form-control" id="trade_type" name="trade_type" value="Options">
<div class="form-group">
    <label for="symbol">Symbol</label>
    <input type="text" class="form-control" id="symbol" name="symbol" placeholder="Enter Symbol" required>
</div>

<div class="form-group">
    <label for="option_type">Option Type</label>
    <select class="form-control" id="option_type" name="option_type" required>
        <option value="">Select Option Type</option>
        <option value="Call">Call</option>
        <option value="Put">Put</option>
    </select>
</div>

<div class="form-group">
    <label for="number_of_contracts">Number of Contracts</label>
    <input type="number" class="form-control" id="number_of_contracts" name="number_of_contracts" placeholder="Enter Number of Contracts" step="1" required>
</div>

<div class="form-group">
    <label for="price">Price per Contract ($)</label>
    <input type="number" class="form-control" id="price" name="price" placeholder="Enter Price per Contract" step="0.01" required>
</div>

<div class="form-group">
    <label for="cost">Total Cost ($)</label>
    <input type="number" class="form-control" id="cost" name="cost" placeholder="Total Cost" step="0.01" readonly>
</div>

<div class="form-group">
    <label for="expiry_date">Expiry Date</label>
    <input type="date" class="form-control" id="expiry_date" name="expiry_date" required>
</div>

<div class="form-group">
    <label for="strike_price">Strike Price ($)</label>
    <input type="number" class="form-control" id="strike_price" name="strike_price" placeholder="Enter Strike Price" step="0.01" required>
</div>

<div class="form-group">
    <label for="option_style">Option Style</label>
    <select class="form-control" id="option_style" name="option_style" required>
        <option value="">Select Option Style</option>
        <option value="American">American</option>
        <option value="European">European</option>
    </select>
</div>

<script <?= $nonce['script'] ?? '' ?>>
    // Initialize phpVar object to hold PHP variables
    let phpVar = {
        // Form Configuration Variables
        formGroup: "<?= $formGroup ?? $siteSettings->formContainer ?>",
        formControl: "<?= $formControl ?? $siteSettings->formControl ?>",
        formSelectPicker: "<?= $formSelectPicker ?? $siteSettings->formSelectpicker ?>",
        
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
</script>