<?php 
$solanaPrice = isset($solanaPrice) ? $solanaPrice : 0.0; // Fallback to $0.0 if not set
$formattedPrice = is_numeric($solanaPrice) ? number_format($solanaPrice, 8) : 'N/A'; // Display up to 8 decimals
?>
<div class="modal-header">
    <h3 class="modal-title">View Your Solana Wallet</h3>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="nk-block">
        <div class="nk-block-head-content">
            <h4 class="title nk-block-title">Trade Solana (SOL)</h4>
            <p>Trade Solana using real-time market prices.</p>
        </div>
        <div class="card">
            <div class="card-inner">  
                <!-- Spinner and Price Display -->
                <div id="price-container">
                    <div class="loader d-none" id="price-loader"></div>
                    <p>Current Market Price: <span id="solanaPrice" class="solana-price">$<?= $formattedPrice; ?></span>
                        <em class="icon ni ni-reload ml-2" id="refreshPrice"></em>
                    </p>
                </div>              
                <div class="row border-top">
                    <!-- Buy Form -->
                    <div class="col border-right">
                        <form class="form-horizontal" id="buyForm" method="POST">
                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

                        <!-- <form class="form-horizontal" id="buyForm" action="/Exchange/Solana/Buy" method="POST"> -->
                            <input type="hidden" name="beta" id="beta" value="<?php echo $siteSettings->beta ?? 0; ?>" >
                            <input type="hidden" name="address" id="address" value="<?= esc($cryptoAccount['address'] ?? '') ?>" >
                            <div class="form-group">
                                <label for="buyAmount">Amount to Buy (SOL):</label>
                                <input type="number" class="form-control" id="buyAmount" name="buyAmount" step="0.00000001" required>
                            </div>
                            <div class="form-group">
                                <label for="buyPrice">Price per SOL ($):</label>
                                <input type="number" class="form-control solana-price" id="buyPrice" name="buyPrice" value="<?= $formattedPrice ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="buySubtotal">Subtotal ($):</label>
                                <input type="number" class="form-control" id="buySubtotal" name="buySubtotal" readonly disabled>
                            </div>
                            <button type="submit" class="btn btn-primary">Buy SOL</button>
                        </form>
                    </div>
                    <!-- Sell Form -->
                    <div class="col">
                        <form class="form-horizontal" id="sellForm" method="POST">
                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

                        <!-- <form class="form-horizontal" id="sellForm" action="/Exchange/Solana/Sell" method="POST"> -->
                            <input type="hidden" name="beta" id="beta" value="<?php echo $siteSettings->beta ?? 0; ?>" >
                            <input type="hidden" name="address" id="address" value="<?= esc($cryptoAccount['address'] ?? '') ?>" >
                            <div class="form-group">
                                <label for="sellAmount">Amount to Sell (SOL):</label>
                                <input type="number" class="form-control" id="sellAmount" name="sellAmount" step="0.00000001" required>
                            </div>
                            <div class="form-group">
                                <label for="sellPrice">Price per SOL ($):</label>
                                <input type="number" class="form-control solana-price" id="sellPrice" name="sellPrice" value="<?= $formattedPrice ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="sellSubtotal">Subtotal ($):</label>
                                <input type="number" class="form-control" id="sellSubtotal" name="sellSubtotal" readonly disabled>
                            </div>
                            <button type="submit" class="btn btn-primary">Sell SOL</button>
                        </form>
                    </div>
                </div>
                <?php if (validation_errors()) : ?>
                    <div class="alert alert-error">
                        <?= validation_errors(); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
function calculateSubtotal(amountId, priceId, subtotalId) {
    const amount = parseFloat(document.getElementById(amountId).value) || 0;
    const price = parseFloat(document.getElementById(priceId).value) || 0;
    const subtotal = amount * price;
    document.getElementById(subtotalId).value = truncateDecimals(subtotal, 8);
}

function truncateDecimals(number, decimals) {
    const factor = Math.pow(10, decimals);
    return Math.floor(number * factor) / factor;
}

// Event listeners for Buy and Sell forms
document.getElementById('buyAmount').addEventListener('input', function () {
    calculateSubtotal('buyAmount', 'buyPrice', 'buySubtotal');
});

document.getElementById('sellAmount').addEventListener('input', function () {
    calculateSubtotal('sellAmount', 'sellPrice', 'sellSubtotal');
});

// Refresh price functionality
document.getElementById('refreshPrice').addEventListener('click', function() {
    document.getElementById('price-loader').style.display = 'inline-block';

    fetch('/index.php/API/Solana/getMarketPrice')
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.price && !isNaN(data.price)) {
                const newPrice = parseFloat(data.price).toFixed(8);
                document.getElementById('solanaPrice').innerText = '$' + newPrice;
                document.getElementById('buyPrice').value = newPrice;
                document.getElementById('sellPrice').value = newPrice;

                // Recalculate subtotals with updated price
                calculateSubtotal('buyAmount', 'buyPrice', 'buySubtotal');
                calculateSubtotal('sellAmount', 'sellPrice', 'sellSubtotal');
            } else {
                console.error('Invalid price data:', data);
                alert('Failed to fetch the latest price.');
            }
        })
        .catch(error => {
            console.error('Error fetching the price:', error);
            alert('Error fetching the price. Please try again later.');
        })
        .finally(() => {
            document.getElementById('price-loader').style.display = 'none';
        });
});
// Add event listeners for form submissions
document.getElementById('buyForm').addEventListener('submit', function (event) {
    event.preventDefault();
    const formData = new FormData(this);
    formData.append('method', 'fiat'); // Set the method dynamically (crypto_swap, fiat, mymi_gold)

    fetch('/Exchange/Solana/Purchase', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': "<?= csrf_hash(); ?>" // Include CSRF token
        },
        body: formData,
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(data.message);
            window.location.href = data.redirect; // Redirect to confirmation page
        } else {
            alert('Error: ' + data.message);
        }
    })
    .catch(error => console.error('Error:', error));
}); /          

document.getElementById('sellForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent default form submission
    const formData = new FormData(this);

    fetch('/Exchange/Solana/Sell', { // Ensure the correct URL is used for processing the sell request
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': "<?= csrf_hash(); ?>" // Include CSRF token
        },
        body: formData,
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Sale Complete');
                // Optionally close the modal
                closeModal();
            } else {
                alert('Sale Failed: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error processing sale:', error);
            alert('An error occurred while processing your sale. Please try again.');
        });
});

// Optional utility to close the modal
function closeModal() {
    const modalElement = document.querySelector('.modal');
    if (modalElement) {
        modalElement.classList.remove('show');
        modalElement.setAttribute('aria-hidden', 'true');
        modalElement.style.display = 'none';
        document.body.classList.remove('modal-open');
        document.body.style.paddingRight = '';
        const modalBackdrop = document.querySelector('.modal-backdrop');
        if (modalBackdrop) {
            modalBackdrop.remove();
        }
    }
}

</script>
