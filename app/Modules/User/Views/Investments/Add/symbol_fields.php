<!-- Symbol Addition Form Fields -->
<!-- <div class="form-group">
    <label for="symbol_name">Symbol Name</label>
    <input type="text" class="form-control" id="symbol_name" name="symbol_name" placeholder="Enter Symbol Name" required>
</div>

<div class="form-group">
    <label for="asset_type">Asset Type</label>
    <select class="form-control" id="asset_type" name="asset_type" required>
        <option value="">Select Asset Type</option>
        <option value="Stock">Stock</option>
        <option value="Cryptocurrency">Cryptocurrency</option>
        <option value="Option">Option</option>
        !-- Add other asset types as necessary --
    </select>
</div>

<div class="form-group">
    <label for="market">Market</label>
    <input type="text" class="form-control" id="market" name="market" placeholder="Enter Market (e.g., NASDAQ, NYSE, Crypto)" required>
</div> -->
<?php if($enableFeatures === false) : ?>
<div class="form-group">
    <label for="symbol">Enter Symbol</label>
    <input type="text" class="form-control" id="symbol" name="symbol" onchange="updateCost();" placeholder="Manually Enter Symbol" step="0.01" required>
</div>
<?php endif; ?>
<div class="form-group">
    <button type="submit" class="btn btn-primary">Add</button>
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