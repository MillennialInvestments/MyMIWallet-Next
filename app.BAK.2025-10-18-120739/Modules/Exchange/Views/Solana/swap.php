<!-- app/Modules/Exchange/Views/Solana/swap.php -->
<?php if($uri->getTotalSegments() >= 3){
    $current_url = $uri->getSegment(1).'/'.$uri->getSegment(2).'/'.$uri->getSegment(3).'/'.$uri->getSegment(4).'/'.$uri->getSegment(5);
} else {
    $current_url = NULL;
}
$cryptoTokens = $cryptoTokens ?? [];  // Default to an empty array if not set

$subViewData = ['solanaTokens' => $cryptoTokens];
log_message('debug', 'Solana\swap.php L7: ' . (print_r($cryptoTokens, true)));
?>

<div class="modal-header">
    <h3 class="modal-title" id="useCoinModalLabel">MyMI Solana Exchange</h3>
    <?php if($current_url !== 'Exchange/Solana/Swap'): ?>
    <button class="close" type="button" aria-label="Close" data-dismiss="modal"><span aria-hidden="true">×</span></button>
    <?php endif; ?>
</div>

<div class="modal-body">
    <div class="nk-block nk-block-lg">
        <div class="nk-block pb-0">
            <div class="nk-block-head-content">
                <h4 class="title nk-block-title">Swap Your SOL for Token</h4>
                <p>Swap your Solana tokens for other cryptocurrencies seamlessly.</p>
                <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                <?php endif; ?>
            </div>
        </div>

        <div class="card">
            <div class="card-inner pl-0">
                <div class="row g-gs">
                    <?php if($current_url === 'Exchange/Solana/Swap'): ?>
                    <div class="col-12 mt-0 col-md-4">
                        <div class="card card-full card-bordered is-dark">
                    <?php else: ?>
                    <div class="col-12 mt-0">
                        <div class="card card-full">
                    <?php endif; ?>
                        <div class="card-inner border-bottom">
                            <div class="card-title-group">
                                <h6 class="title">Top Performing Solana Assets</h6>
                                <p>View the Top Solana Assets.</p>
                            </div>
                        </div>
                        <div class="card-inner">
                            <form id="solanaCoinSwapForm" action="<?= base_url('Exchange/Solana/Wallet/Execute-Swap') ?>" class="form-horizontal gy-3" method="post">
                                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

                                <!-- Hidden Fields -->
                                <input name="user_id" type="hidden" value="<?= esc($cuID) ?>">
                                <input name="from_address" type="hidden" value="<?= esc($cryptoPT) ?>">
                                <input name="to_address" type="hidden" value="" id="to_address">
                                
                                <!-- From Token -->
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <label class="form-label" for="from_token">From:</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <select class="form-control selectpicker" data-live-search="true" id="from_token" name="from_token" required>
                                            <!-- Default option for Solana -->
                                            <option value="SOL" selected>SOL - Solana</option>
                                            
                                            <!-- Loop through available tokens -->
                                            <?php foreach ($cryptoTokens as $token): ?>
                                                <?php
                                                $coin_address = isset($token['coin_address']) && !empty($token['coin_address']) ? esc($token['coin_address']) : 'N/A';
                                                $symbol = isset($token['symbol']) ? esc($token['symbol']) : 'Unknown';
                                                $coin_name = isset($token['coin_name']) ? esc($token['coin_name']) : 'Unknown';
                                                ?>
                                                <option value="<?= $coin_address ?>" data-address="<?= $coin_address ?>" data-symbol="<?= $symbol ?>">
                                                    <?= $symbol ?> - <?= $coin_name ?>
                                                </option>
                                            <?php endforeach; ?>


                                        </select>

                                        <!-- Display Solana Price -->
                                        <div class="p-1">
                                            <strong>Price:</strong> <span id="exchangePrice"><?= esc($solanaPrice) ?></span>
                                        </div>
                                    </div>

                                </div>

                                <!-- Amount Input -->
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <label class="form-label" for="amount">Amount</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <input name="amount" type="number" value="" id="amount" class="form-control" placeholder="Enter amount" required step="any">
                                    </div>
                                </div>

                                <!-- To Token -->
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <label class="form-label" for="to_token">To:</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <select class="form-control selectpicker" data-live-search="true" id="to_token" name="to_token" required>
                                            <!-- Default option for Solana -->
                                            <option value="SOL" selected>SOL - Solana</option>
                                                                                        
                                            <!-- Loop through available tokens -->
                                            <?php foreach ($cryptoTokens as $token): ?>
                                                <?php
                                                $coin_address = isset($token['coin_address']) && !empty($token['coin_address']) ? esc($token['coin_address']) : 'N/A';
                                                $symbol = isset($token['symbol']) ? esc($token['symbol']) : 'Unknown';
                                                $coin_name = isset($token['coin_name']) ? esc($token['coin_name']) : 'Unknown';
                                                ?>
                                                <option value="<?= $coin_address ?>" data-address="<?= $coin_address ?>" data-symbol="<?= $symbol ?>">
                                                    <?= $symbol ?> - <?= $coin_name ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <!-- Transfee Fees -->
                                <div class="row g-3 align-center">
                                    <div class="col-lg-4">
                                        <label class="form-label" for="to_token">Transaction Fees:</label>
                                    </div>
                                    <div class="col-lg-8">
                                        <p>
                                            <strong>Platform Fee:</strong> <span id="platformFee">$0.00</span><br>
                                            <strong>Network Fee:</strong> <span id="networkFee">$0.00</span><br>
                                            <strong>Service Fee:</strong> <span id="serviceFee">$0.00</span>
                                        </p>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="row g-3">
                                    <div class="col-lg-6 offset-lg-5">
                                        <button class="btn btn-primary btn-lg" type="submit">Execute</button>
                                    </div>
                                </div>

                                <?php if(validation_errors()): ?>
                                <div class="fade alert alert-error in"><?= validation_errors() ?></div>
                                <?php endif; ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if ($cuKYC === 'No') : ?>
<div class="fade modal show" aria-hidden="true" aria-labelledby="kycApprovalModalLabel" id="kycApprovalModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="kycApprovalModal">KYC Verification / AML Requirements</h5>
                <button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>
<?php endif; ?>


<script <?= $nonce['script'] ?? '' ?>>
$(document).ready(function () {
    // Initialize SelectPickers
    $('#from_token, #to_token').selectpicker({
        liveSearch: true,
        title: "Enter or Search Symbol",
    });

    $('.selectpicker').selectpicker('refresh');

    // Handle token selection interactivity
    $('#from_token').on('changed.bs.select', function () {
        const selectedFromToken = $(this).val();
        $('#to_token option').prop('disabled', false); // Re-enable all options
        $(`#to_token option[value="${selectedFromToken}"]`).prop('disabled', true); // Disable selected token in 'to' dropdown
        $('#to_token').selectpicker('refresh');
        fetchExchangePrice();
    });

    $('#to_token').on('changed.bs.select', function () {
        const selectedToToken = $(this).val();
        $('#from_token option').prop('disabled', false); // Re-enable all options
        $(`#from_token option[value="${selectedToToken}"]`).prop('disabled', true); // Disable selected token in 'from' dropdown
        $('#from_token').selectpicker('refresh');
        fetchTokenPrice();
    });

    // Form submission handler
    $('#solanaCoinSwapForm').on('submit', function (event) {
        const subtotalCosts = parseFloat($('#subtotalCosts').text().replace('$', '').replace(',', ''));
        const cuKYC = <?= json_encode($cuKYC) ?>;
        const transactionLimit = 500; // Transaction limit in USD

        if (!cuKYC && subtotalCosts > transactionLimit) {
            event.preventDefault();
            $('#kycModal').modal('show');
        }
    });

    // Fetch Prices
    function fetchExchangePrice() {
        const selectedFromToken = $('#from_token').val();
        fetch(`https://www.mymiwallet.com/index.php/API/Solana/getExchangePrice/${selectedFromToken}`)
            .then((response) => response.json())
            .then((data) => $('#exchangePrice').text(data.price || '0.00'))
            .catch((error) => console.error('Error fetching exchange price:', error));
    }

    function fetchTokenPrice() {
        const selectedToToken = $('#to_token').val();
        if (!selectedToToken) return;
        fetch(`https://www.mymiwallet.com/index.php/API/Solana/getTokenPrice/${selectedToToken}`)
            .then((response) => response.json())
            .then((data) => $('#tokenPrice').text(data.price || '0.00'))
            .catch((error) => console.error('Error fetching token price:', error));
    }

    // Fetch User Balance
    function fetchFromCoinAmount(selectedToken) {
        fetch(`<?= base_url('index.php/API/Solana/getCoinAmount') ?>/${selectedToken}`)
            .then((response) => response.json())
            .then((data) => $('#fromCoinAmount').text(data.amount || '0.00'))
            .catch((error) => console.error('Error fetching coin amount:', error));
    }

    // Calculate Subtotal and Fees
    $('#amount').on('input', calculateSubtotal);

    function calculateSubtotal() {
        const amount = parseFloat($('#amount').val()) || 0;
        const fromPrice = parseFloat($('#exchangePrice').text()) || 0;
        const toPrice = parseFloat($('#tokenPrice').text()) || 0;

        const networkFeeRate = <?= $siteSettings->gasFee ?>;
        const platformTradingFeeRate = <?= $siteSettings->transFee ?>;
        const serviceFeeRate = <?= $siteSettings->transPercent ?>;

        // Calculate fees
        const networkFees = networkFeeRate * amount;
        const platformFees = amount * fromPrice * platformTradingFeeRate;
        const serviceFees = amount * serviceFeeRate;

        const subtotal = (amount * fromPrice) - (platformFees + networkFees + serviceFees);
        const totalCoins = subtotal / toPrice;

        // Update UI
        $('#platformFee').text(`$${platformFees.toFixed(2)}`);
        $('#networkFee').text(`$${networkFees.toFixed(8)}`);
        $('#serviceFee').text(`$${serviceFees.toFixed(2)}`);
        $('#subtotalCosts').text(`$${subtotal.toFixed(2)}`);
        $('#totalCoins').text(totalCoins.toFixed(8));

        // Validate if user has sufficient balance
        const fromCoinAmount = parseFloat($('#fromCoinAmount').text()) || 0;
        if (amount > fromCoinAmount) {
            $('#validationMessage').show();
        } else {
            $('#validationMessage').hide();
        }
    }

    // Swap Tokens
    $('#swapTokens').on('click', function () {
        const selectedToken = $('#to_token').val();
        if (!selectedToken) {
            alert('Please select a token to swap to.');
            return;
        }
        performTokenSwap();
    });

    function performTokenSwap() {
        const fromToken = $('#from_token').val();
        const toToken = $('#to_token').val();
        const fromSymbol = $('#exchangeSymbol').text();
        const toSymbol = $('#tokenSymbol').text();
        const fromPrice = $('#exchangePrice').text();
        const toPrice = $('#tokenPrice').text();

        // Swap the tokens in the UI
        $('#from_token').selectpicker('val', toToken);
        $('#to_token').selectpicker('val', fromToken);
        $('#exchangeSymbol').text(toSymbol);
        $('#tokenSymbol').text(fromSymbol);
        $('#exchangePrice').text(toPrice.toFixed(2));
        $('#tokenPrice').text(fromPrice.toFixed(2));

        // Update related fields
        $('#fromCoinSymbol').text(` ${toSymbol}`);
        $('#amountSymbol').text(` ${fromSymbol}`);
        $('#totalCoinsSymbol').text(` ${toSymbol}`);

        // Recalculate with swapped tokens
        calculateSubtotal();
    }

    // Refresh Prices on Demand
    $('#refreshExchangePrice, #refreshTokenPrice').on('click', fetchPrices);

    // Initialize
    fetchPrices();
    fetchFromCoinAmount('SOL');
});

// $(document).ready(function() {
//     $('#from_token, #to_token').selectpicker({
//         liveSearch: true,
//         title: "Enter or Search Symbol"
//     });

//     $('.selectpicker').selectpicker('refresh');

// });
// $(document).ready(function() {
//     document.getElementById('solanaCoinSwapForm').addEventListener('submit', function(event) {
//         const subtotalCosts = parseFloat(document.getElementById('subtotalCosts').innerText.replace('$', '').replace(',', ''));
//         const cuKYC = <?= json_encode($cuKYC) ?>;
//         const transactionLimit = 500; // Set your transaction limit in USD here

//         if (!cuKYC && subtotalCosts > transactionLimit) {
//             event.preventDefault();
//             $('#kycModal').modal('show');
//         }
//     });

//     function fetchPrices() {
//         fetchExchangePrice();
//         fetchTokenPrice();
//     }

//     function fetchExchangePrice() {
//         let selectedFromToken = $('#from_token').val();
//         fetch(`https://www.mymiwallet.com/index.php/API/Solana/getExchangePrice/${selectedFromToken}`)
//             .then(response => response.json())
//             .then(data => {
//                 $('#exchangePrice').text(data.price || '0.00');
//             })
//             .catch(error => {
//                 console.error("Error fetching exchange price: ", error);
//             });
//     }

// function fetchTokenPrice() {
//         let selectedToken = $('#to_token').val();
//         if (!selectedToken) return;
//         fetch(`https://www.mymiwallet.com/index.php/API/Solana/getTokenPrice/${selectedToken}`)
//             .then(response => response.json())
//             .then(data => {
//                 $('#tokenPrice').text(data.price || '0.00');
//             })
//             .catch(error => {
//                 console.error("Error fetching token price: ", error);
//             });
//     }


//     $('#refreshExchangePrice, #refreshTokenPrice').on('click', fetchPrices);

//     $('#from_token').on('changed.bs.select', function() {
//         let selectedFromToken = $(this).val();
//         $('#to_token option').prop('disabled', false); // Re-enable all options
//         $(`#to_token option[value="${selectedFromToken}"]`).prop('disabled', true); // Disable selected token in 'to' dropdown
//         $('#to_token').selectpicker('refresh');
//         fetchExchangePrice();
//     });

//     $('#to_token').on('changed.bs.select', function() {
//         let selectedToToken = $(this).val();
//         $('#from_token option').prop('disabled', false); // Re-enable all options
//         $(`#from_token option[value="${selectedToToken}"]`).prop('disabled', true); // Disable selected token in 'from' dropdown
//         $('#from_token').selectpicker('refresh');
//         fetchTokenPrice();
//     });

//     // $('#from_token').on('changed.bs.select', function(e) {
//     //     let selectedToken = $(this).val();
//     //     let tokenSymbol = $(this).find('option:selected').data('symbol');
//     //     let tokenAddress = $(this).find('option:selected').data('address');
//     //     $('#exchangeSymbol').text(tokenSymbol || '');
//     //     $('#cryptoPT').val(tokenAddress);
//     //     fetchExchangePrice();
//     //     fetchFromCoinAmount(selectedToken);
//     // });

//     // $('#to_token').on('changed.bs.select', function(e) {
//     //     let selectedToken = $(this).val();
//     //     let tokenSymbol = $(this).find('option:selected').data('symbol');
//     //     let tokenAddress = $(this).find('option:selected').data('address');
//     //     $('#tokenSymbol').text(tokenSymbol || '');
//     //     $('#to_address').val(tokenAddress);
//     //     fetchTokenPrice();
//     // });

//     $('#amount').on('input', function() {
//         calculateSubtotal();
//     });

//     $('#swapTokens').on('click', function() {
//         let selectedToken = $('#to_token').val();
//         if (!selectedToken) {
//             alert('Please select a token to swap to.');
//             return;
//         }
//         swapTokens();
//     });

//     function swapTokens() {
//         let fromToken = $('#from_token').val();
//         let toToken = $('#to_token').val();
//         let fromSymbol = $('#exchangeSymbol').text();
//         let toSymbol = $('#tokenSymbol').text();
//         let fromPrice = $('#exchangePrice').text();
//         let toPrice = $('#tokenPrice').text();
//         let toTokenText = $('#to_token option:selected').text(); // Get the selected token text (symbol - name)

//         // Swap the tokens
//         $('#from_token').selectpicker('val', toToken);
//         $('#to_token').selectpicker('val', fromToken);
//         $('#exchangeSymbol').text(toSymbol);
//         $('#tokenSymbol').text(fromSymbol);
//         $('#exchangePrice').text(toPrice.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ","));
//         $('#tokenPrice').text(fromPrice.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ","));
//         $('#fromCoinSymbol').text(` ${toSymbol}`);
//         $('#amountSymbol').text(` ${$('#exchangeSymbol').text()}`);
//         $('#totalCoinsSymbol').text(` ${$('#tokenSymbol').text()}`);

//         // Recalculate the prices
//         calculateSubtotal();
//     }

//     function fetchFromCoinAmount(selectedToken) {
//         fetch(`<?=base_url('index.php/API/Solana/getCoinAmount')?>/${selectedToken}`)
//             .then(response => response.json())
//             .then(data => {
//                 $('#fromCoinAmount').text(data.amount || '0.00');
//             })
//             .catch(error => {
//                 console.error("Error fetching coin amount: ", error);
//             });
//     }

//     function calculateSubtotal() {
//         let amount = parseFloat($('#amount').val()) || 0;
//         let fromPrice = parseFloat($('#exchangePrice').text()) || 0;
//         let toPrice = parseFloat($('#tokenPrice').text()) || 0;

//         // Fetch the latest rates before calculation
//         fetchExchangePrice();
//         fetchTokenPrice();

//         const networkFeeRate = <?= $siteSettings->gasFee; ?>;
//         const platformTradingFeeRate = <?= $siteSettings->transFee; ?>;
//         const serviceFeeRate = <?= $siteSettings->transPercent; ?>;

//         // Calculate fees
//         let networkFees = networkFeeRate * amount;
//         let platformTradingFees = (amount * fromPrice) * platformTradingFeeRate;
//         let serviceFees = serviceFeeRate * amount;

//         let subtotal = (amount * fromPrice) - platformTradingFees - networkFees - serviceFees;
//         let totalCoins = subtotal / toPrice;

//         $('#transferFees').text("$" + platformTradingFees.toFixed(2) + " | Network Fees: $" + networkFees.toFixed(8));
//         $('#subtotalCosts').text("$" + subtotal.toFixed(2));
//         $('#totalCoins').text(totalCoins.toFixed(8));

//         // Validation message for insufficient balance
//         let fromCoinAmount = parseFloat($('#fromCoinAmount').text()) || 0;
//         if (amount > fromCoinAmount) {
//             $('#validationMessage').show();
//         } else {
//             $('#validationMessage').hide();
//         }
//     }

//     function calculateFees(amount, fromPrice) {
//         const platformTradingFeeRate = <?= $siteSettings->transFee; ?>;
//         const serviceFeeRate = <?= $siteSettings->transPercent; ?>;
//         const networkFeeRate = <?= $siteSettings->gasFee; ?>;

//         let platformFees = (amount * fromPrice) * platformTradingFeeRate;
//         let serviceFees = amount * serviceFeeRate;
//         let networkFees = amount * networkFeeRate;

//         $('#platformFee').text("$" + platformFees.toFixed(2));
//         $('#serviceFee').text("$" + serviceFees.toFixed(2));
//         $('#networkFee').text("$" + networkFees.toFixed(8));
//     }

//     // function calculateSubtotal() {
//     //     let amount = parseFloat($('#amount').val()) || 0;
//     //     let fromSymbol = $('#exchangeSymbol').text();
//     //     let fromPrice = parseFloat($('#exchangePrice').text()) || 0;
//     //     let toPrice = parseFloat($('#tokenPrice').text()) || 0;
        
//     //     // Define your fees
//     //     // const networkFeeRate = 0.000005;
//     //     // // const platformTradingFeeRate = 0.39; // 3.9%
//     //     // const platformTradingFeeRate = 0.01; // 3.9%
//     //     // const serviceFeeRate = 0.005; // 0.5%
//     //     const networkFeeRate = <?= $siteSettings->gasFee; ?>;
//     //     // const platformTradingFeeRate = 0.39; // 3.9%
//     //     const platformTradingFeeRate = <?= $siteSettings->transFee; ?>; // 3.9%
//     //     const serviceFeeRate = <?= $siteSettings->transPercent; ?>; // 0.5%

//     //     // Calculate fees
//     //     let networkFees = networkFeeRate * amount;
//     //     let platformTradingFees = (amount * fromPrice) * platformTradingFeeRate;
//     //     let serviceFees = serviceFeeRate * amount;
        
//     //     let transferCoins = networkFees + serviceFees;
//     //     let subtotal = (amount * fromPrice) - platformTradingFees;
//     //     let totalCoins = (amount * fromPrice) / toPrice;

//     //     $('#transferFees').text("$" + platformTradingFees.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",") + " + Total Coins: " + transferCoins.toFixed(8) + " " + fromSymbol);
//     //     $('#subtotalCosts').text("$" + subtotal.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ","));
//     //     $('#totalCoins').text(totalCoins.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ","));

//     //     // Validation message for amount
//     //     let fromCoinAmount = parseFloat($('#fromCoinAmount').text()) || 0;
//     //     if (amount > fromCoinAmount) {
//     //         $('#validationMessage').show();
//     //     } else {
//     //         $('#validationMessage').hide();
//     //     }
//     // }

//     fetchPrices();
//     fetchFromCoinAmount('SOL');
// });
</script>
