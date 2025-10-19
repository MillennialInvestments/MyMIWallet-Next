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
<input type="hidden" class="form-control" id="trade_type" name="trade_type" value="Watchlist">
<div class="form-group">
    <label for="symbol">Enter Symbol</label>
    <input type="text" class="form-control" id="symbol" name="symbol" onchange="updateCost();" placeholder="Manually Enter Symbol" step="0.01" required>
</div>

<?php endif; ?>


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
    
    // document.addEventListener('DOMContentLoaded', () => {
    //     const addWatchlistBtn = document.getElementById('addNewWalletSubmit');

    //     if (addWatchlistBtn) {
    //         addWatchlistBtn.addEventListener('click', async (event) => {
    //             event.preventDefault();

    //             // Collect form data
    //             const symbolName = document.getElementById('symbol_name').value;
    //             const assetType = document.getElementById('asset_type').value;
    //             const market = document.getElementById('market').value;

    //             // Validate inputs
    //             if (!symbolName || !assetType || !market) {
    //                 alert('Please fill in all fields.');
    //                 return;
    //             }

    //             // Prepare data to send
    //             const formData = {
    //                 symbol_name: symbolName,
    //                 asset_type: assetType,
    //                 market: market,
    //                 user_id: "<?= $cuID ?>", // Pass user ID from PHP
    //             };

    //             try {
    //                 // Send POST request to the server
    //                 const response = await fetch("<?= site_url('Investments/API/AddWatchlist') ?>", {
    //                     method: 'POST',
    //                     headers: {
    //                         'Content-Type': 'application/json',
    //                         'X-CSRF-TOKEN': "<?= csrf_hash() ?>" // Include CSRF token
    //                     },
    //                     body: JSON.stringify(formData)
    //                 });

    //                 const result = await response.json();

    //                 // Handle server response
    //                 if (response.ok && result.status === 'success') {
    //                     alert('Watchlist updated successfully!');
    //                     // Optionally refresh the watchlist
    //                     refreshWatchlist();
    //                 } else {
    //                     console.error('Error adding to watchlist:', result.message);
    //                     alert('Failed to update watchlist.');
    //                 }
    //             } catch (error) {
    //                 console.error('Fetch error:', error);
    //                 alert('An error occurred while updating the watchlist.');
    //             }
    //         });
    //     }
    // });

    // Function to refresh the watchlist
    function refreshWatchlist() {
        fetch("<?= site_url('API/Investments/GetUserWatchlist/' . $cuID) ?>")
            .then(response => response.json())
            .then(data => {
                const watchlistTableBody = document.getElementById('watchlistTableBody');
                if (!watchlistTableBody) {
                    console.error("Watchlist table body not found.");
                    return;
                }

                // Clear existing rows
                watchlistTableBody.innerHTML = '';

                // Populate table with new data
                data.forEach(item => {
                    const row = `
                        <tr class="nk-tb-item">
                            <td class="nk-tb-col">${item.symbol_name}</td>
                            <td class="nk-tb-col">${item.current_value}</td>
                        </tr>`;
                    watchlistTableBody.innerHTML += row;
                });
            })
            .catch(error => console.error('Error refreshing watchlist:', error));
    }

</script>