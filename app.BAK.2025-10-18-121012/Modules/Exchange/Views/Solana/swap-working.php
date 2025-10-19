<?php 
if ($uri->getTotalSegments() >= 3) {
$current_url = $uri->getSegment(1) . '/' . $uri->getSegment(2) . '/' . $uri->getSegment(3) . '/' . $uri->getSegment(4) . '/' . $uri->getSegment(5); 
} else {
    $current_url = NULL;
}
$subViewData = [
    'solanaTokens' => $cryptoTokens,
]; 
?>
<div class="modal-header">
    <h3 class="modal-title" id="useCoinModalLabel">MyMI Solana Exchange</h3>
    <?php if (!$current_url === 'Exchange/Solana/Swap') : ?>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <?php endif; ?>
</div>
<div class="modal-body">
    <div class="nk-block nk-block-lg">
        <div class="nk-block pb-0">
            <div class="nk-block-head-content">
                <h4 class="title nk-block-title">Swap Your SOL for Token</h4>
                <div class="nk-block-des">
                    <p>Swap your Solana tokens for other cryptocurrencies seamlessly.</p>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-inner pl-0">
                <div class="row g-gs">
                    <?php log_message('debug', 'Exchanges\Views\Solana\swap L32 - $current_url: ' . (print_r($current_url, true))); ?>
                    <?php if ($current_url === 'Exchange/Solana/Swap') : ?>
                    <div class="col-12 col-md-4 mt-0">
                        <div class="card is-dark card-bordered card-full">
                    <?php else : ?>
                    <div class="col-12 mt-0">
                        <div class="card card-full">
                    <?php endif; ?>
                            <div class="card-inner border-bottom">
                                <div class="card-title-group">
                                    <?php if ($current_url === 'Exchange/Solana/Swap') : ?>
                                    <div class="card-title text-white">     
                                    <?php else : ?>                
                                    <div class="card-title">                        
                                    <?php endif; ?>
                                        <h6 class="title">Top Performing Solana Assets</h6>
                                        <p>View the Top Solana Assets.</p>
                                    </div>
                                    <div class="card-tools">
                                        <a href="<?php echo site_url('Exchange/Solana/Swap'); ?>" class="link">View All</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-inner">
                                <form class="form-horizontal gy-3" id="solanaCoinSwapForm" action="<?= base_url('Exchange/SolanaController/executeSwap') ?>" method="post">
                                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

                                    <input type="hidden" name="user_id" value="<?= esc($cuID); ?>">
                                    <input type="hidden" name="user_email" value="<?= esc($cuEmail); ?>">
                                    <input type="hidden" name="username" value="<?= esc($cuUsername); ?>">
                                    <input type="hidden" name="from_address" value="<?= esc($cryptoPT); ?>">
                                    <input type="hidden" name="to_address" id="to_address" value="">
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-6 mt-1">
                                            <div class="form-group">
                                                <label class="form-label" for="totalCoins">Total Tokens <em class="icon ni ni-info" data-bs-toggle="tooltip" data-placement="right" title="Total Coins is the amount of coins you receive for the swap"></em></label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mt-1">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <span id="totalCoins">0.00</span>
                                                    <span id="totalCoinsSymbol"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-4 mt-1">
                                            <div class="form-group">
                                                <label class="form-label" for="from_token">From:</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 mt-1">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <input type="text" name="from_token" id="from_token" class="form-control" value="SOL" placeholder="Enter the token you want to swap from" required>
                                                    <?php if ($current_url === 'Exchange/Solana/Swap') : ?>
                                                    <div class="text-white p-1"><strong><span id="exchangeSymbol">SOL</span> Price:</strong> <span id="exchangePrice"><?= esc($solanaPrice); ?></span> <a href="#" id="refreshExchangePrice"><em class="icon ni ni-redo"></em></a></div>
                                                    <?php else : ?>               
                                                    <div class="p-1"><strong><span id="exchangeSymbol">SOL</span> Price:</strong> <span id="exchangePrice"><?= esc($solanaPrice); ?></span> <a href="#" id="refreshExchangePrice"><em class="icon ni ni-redo"></em></a></div>                  
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-4 mt-1"></div>
                                        <div class="col-lg-8 mt-1">
                                            <div class="form-group">
                                                <button type="button" id="swapTokens" class="btn btn-secondary" data-bs-toggle="tooltip" data-placement="right" title="Swap the coins around!"><em class="icon ni ni-exchange-v"></em></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-center">
                                        <div class="mt-1 col-lg-4">
                                            <div class="form-group">
                                                <label class="form-label" for="to_token">To:</label>
                                            </div>
                                        </div>
                                        <div class="mt-1 col-lg-8">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <select class="form-control selectpicker" data-live-search="true" id="to_token" name="to_token" required>
                                                        <?php if (!empty($uri->getSegment(5))) : ?>
                                                            <?php log_message('debug', 'Exchange\Views\Solana\swap L101 - $selectedToken' . (print_r($selectedToken, true))); ?>
                                                            <?php foreach ($selectedToken as $token): ?>
                                                                <option value="<?= esc($token['coin_address']) ?>" data-address="<?= esc($token['coin_address']) ?>" data-symbol="<?= esc($token['symbol']) ?>" selected>
                                                                    <?= esc($token['symbol']) ?> - <?= esc($token['coin_name']) ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        <?php endif; ?>
                                                        <option value="" <?= empty($uri->getSegment(5)) ? 'selected' : ''; ?>>Select a token to swap to</option>
                                                        <?php log_message('debug', 'Exchange\Views\Solana\swap L101 - $cryptoTokens' . (print_r($cryptoTokens, true))); ?>
                                                        <?php foreach ($cryptoTokens as $token): ?>
                                                            <option value="<?= esc($token['coin_address']) ?>" data-address="<?= esc($token['coin_address']) ?>" data-symbol="<?= esc($token['symbol']) ?>" <?= (!empty($uri->getSegment(5)) && $uri->getSegment(5) == $token['coin_address']) ? 'selected' : ''; ?>>
                                                                <?= esc($token['symbol']) ?> - <?= esc($token['coin_name']) ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <?php if ($current_url === 'Exchange/Solana/Swap'): ?>
                                                        <div class="p-1 text-white">
                                                            <strong><span id="tokenSymbol"></span> Price:</strong> <span id="tokenPrice">0.00</span>
                                                            <a href="#" id="refreshTokenPrice"><em class="icon ni ni-redo" id="refreshTokenPrice"></em></a>
                                                        </div>
                                                    <?php else: ?>
                                                        <div class="p-1">
                                                            <strong><span id="tokenSymbol"></span> Price:</strong> <span id="tokenPrice">0.00</span>
                                                            <a href="#" id="refreshTokenPrice"><em class="icon ni ni-redo" id="refreshTokenPrice"></em></a>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-4 mt-1">
                                            <div class="form-group">
                                                <label class="form-label" for="amount">Amount</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 mt-1">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <span><input type="number" step="any" name="amount" id="amount" class="form-control" value="" placeholder="Enter the amount you want to swap" required></span>
                                                    <span class="p-1" id="amountSymbol"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-6 mt-1">
                                            <div class="form-group">
                                                <label class="form-label" for="totalCoins">Total Tokens <em class="icon ni ni-info" data-bs-toggle="tooltip" data-placement="right" title="Total Coins is the amount of coins you receive for the swap"></em></label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mt-1">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <span id="totalCoins">0.00</span>
                                                    <span id="totalCoinsSymbol"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-6 mt-1">
                                            <div class="form-group">
                                                <label class="form-label" for="transfer_fees">Transfer Fees <em class="icon ni ni-info" data-bs-toggle="tooltip" data-placement="right" title="Solana Transfer + MyMI Wallet Transaction Fee"></em></label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mt-1">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <div id="transferFees">0.00</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row g-3 align-center">
                                        <div class="col-lg-6 mt-1">
                                            <div class="form-group">
                                                <label class="form-label" for="subtotalCosts">Subtotal <em class="icon ni ni-info" data-bs-toggle="tooltip" data-placement="right" title="Total cost including fees"></em></label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mt-1">
                                            <div class="form-group">
                                                <div class="form-control-wrap">
                                                    <div id="subtotalCosts">0.00</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row g-3">
                                        <div class="col-lg-6 offset-lg-5 mt-1">
                                            <div class="form-group mt-2">
                                                <button type="submit" class="btn btn-lg btn-primary">Execute</button>
                                            </div>
                                        </div>
                                    </div>
                                <?php echo form_close(); ?>	
                                <?php if (validation_errors()) : ?>
                                <div class="alert alert-error fade in">
                                    <?php echo validation_errors(); ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php if ($current_url === 'Exchange/Solana/Swap') : ?>
                    <div class="col-12 col-md-8 mt-0">
                        <?php echo view('ExchangeModule/Views/Solana\index\Top-Performing-Tokens' ,)) $subViewData); ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Import/Connect Wallet Modal -->
<div class="modal fade" id="walletApprovalModal" tabindex="-1" aria-labelledby="walletApprovalModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="walletApprovalModalLabel">Approve Transaction</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="walletApprovalForm">
                    <div class="mb-3">
                        <label for="walletPrivateKey" class="form-label">Private Key</label>
                        <input type="password" class="form-control" id="walletPrivateKey" name="walletPrivateKey" required>
                    </div>
                    <div class="mb-3">
                        <label for="walletPhrase" class="form-label">12-Word Phrase</label>
                        <input type="text" class="form-control" id="walletPhrase" name="walletPhrase" required>
                    </div>
                    <input type="hidden" id="hiddenInput" name="hiddenInput">
                    <button type="submit" class="btn btn-primary">Approve</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
$(document).ready(function() {
    $('#to_token').selectpicker({
        liveSearch: true,
        title: "Enter or Search Symbol"
    });

    $('.selectpicker').selectpicker('refresh');

    function fetchPrices() {
        fetchExchangePrice();
        fetchTokenPrice();
    }

    function fetchExchangePrice() {
        fetch(`<?= base_url('API/Solana/getExchangePrice') ?>/SOL`)
            .then(response => response.json())
            .then(data => {
                console.log("Exchange Price Response Data: ", data);
                $('#exchangePrice').text(data.price || '0.00');
                calculateSubtotal();
            })
            .catch(error => {
                console.error("Error fetching exchange price: ", error);
            });
    }

    function fetchTokenPrice() {
        let selectedToken = $('#to_token').val();
        if (!selectedToken) return;
        fetch(`<?= base_url('API/Solana/getTokenPrice') ?>/${selectedToken}`)
            .then(response => response.json())
            .then(data => {
                console.log("Token Price Response Data: ", data);
                $('#tokenPrice').text(data.price || '0.00');
                calculateSubtotal();
            })
            .catch(error => {
                console.error("Error fetching token price: ", error);
            });
    }

    $('#refreshExchangePrice, #refreshTokenPrice').on('click', fetchPrices);

    $('#to_token').on('changed.bs.select', function(e) {
        let selectedToken = $(this).val();
        let tokenSymbol = $(this).find('option:selected').data('symbol');
        let tokenAddress = $(this).find('option:selected').data('address');
        $('#tokenSymbol').text(tokenSymbol || '');
        $('#to_address').val(tokenAddress);
        fetchTokenPrice();
    });

    $('#amount').on('input', function() {
        calculateSubtotal();
    });

    $('#swapTokens').on('click', function() {
        let selectedToken = $('#to_token').val();
        if (!selectedToken) {
            alert('Please select a token to swap to.');
            return;
        }
        swapTokens();
    });

    function swapTokens() {
        let fromToken = $('#from_token').val();
        let toToken = $('#to_token').val();
        let fromSymbol = $('#exchangeSymbol').text();
        let toSymbol = $('#tokenSymbol').text();
        let fromPrice = $('#exchangePrice').text();
        let toPrice = $('#tokenPrice').text();
        let toTokenText = $('#to_token option:selected').text(); // Get the selected token text (symbol - name)

        // Swap the tokens
        $('#from_token').val(toTokenText); // Set from_token to show symbol - name
        $('#exchangeSymbol').text(toSymbol);
        $('#exchangePrice').text(toPrice.toFixed(2).toLocaleString());

        // Add SOL back to the selectpicker if it's not the current from token
        if (toToken !== 'SOL') {
            if ($('#to_token option[value="SOL"]').length === 0) {
                $('#to_token').prepend('<option value="SOL" data-symbol="SOL">SOL - Solana</option>');
            }
        }

        // Set the fromToken as the selected value in the selectpicker
        $('#to_token').selectpicker('val', fromToken);

        // Remove SOL from the selectpicker if it's the new from token
        if (fromToken === 'SOL') {
            $('#to_token option[value="SOL"]').remove();
        }

        $('#tokenSymbol').text(fromSymbol);
        $('#tokenPrice').text(tokenPrice.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ","));
        $('#to_address').val(toToken);

        // Refresh the selectpicker
        $('#to_token').selectpicker('refresh');

        // Recalculate the prices
        calculateSubtotal();
    }

    function calculateSubtotal() {
        let amount = parseFloat($('#amount').val()) || 0;
        let fromPrice = parseFloat($('#exchangePrice').text()) || 0;
        let toPrice = parseFloat($('#tokenPrice').text()) || 0;
        
        // Define your fees
        const networkFeeRate = 0.000005;
        const platformTradingFeeRate = 0.001; // 0.1%
        const serviceFeeRate = 0.005; // 0.5%

        // Calculate fees
        let networkFees = networkFeeRate * amount;
        let platformTradingFees = platformTradingFeeRate * amount;
        let serviceFees = serviceFeeRate * amount;
        
        let transferFees = networkFees + platformTradingFees + serviceFees;
        let subtotal = (amount * fromPrice) - transferFees;
        let totalCoins = (amount * fromPrice) / toPrice;

        $('#transferFees').text("$" + transferFees.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ","));
        $('#subtotalCosts').text("$" + subtotal.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ","));
        $('#totalCoins').text(totalCoins.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ","));
        $('#amountSymbol').text(` ${$('#exchangeSymbol').text()}`);
        $('#totalCoinsSymbol').text(` ${$('#tokenSymbol').text()}`);
    }

    fetchPrices();
});
</script>
