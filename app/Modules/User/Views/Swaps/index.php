<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-xl-7">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-primary text-white py-3">
                    <h5 class="card-title mb-0">Non-Custodial Swaps</h5>
                </div>
                <div class="card-body p-4">
                    <div class="alert alert-info d-flex align-items-center mb-4" role="alert">
                        <i class="bi bi-shield-check fs-4 me-3"></i>
                        <div>
                            <strong>Non-Custodial:</strong> MyMI never touches or holds your funds. Quotes are routed via decentralized liquidity aggregators (Jupiter on Solana, 0x on EVM). You sign all transactions directly in your self-custody wallet.
                        </div>
                    </div>

                    <?php if (empty($swapsExecute)): ?>
                        <div class="alert alert-warning py-2 mb-4" role="alert">
                            <i class="bi bi-info-circle me-1"></i>
                            <strong>Notice:</strong> Swap execution is disabled in this environment (testnet/staging quote-only mode).
                        </div>
                    <?php endif; ?>

                    <form id="swap-quote-form" action="/Swaps/Quote" method="post">
                        <?= csrf_field() ?>

                        <div class="mb-3">
                            <label for="swap-chain" class="form-label fw-bold">Network</label>
                            <select id="swap-chain" name="chain" class="form-select">
                                <option value="solana" selected>Solana (Jupiter Aggregator)</option>
                                <option value="ethereum">Ethereum (0x Aggregator)</option>
                                <option value="base">Base (0x Aggregator)</option>
                            </select>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label for="swap-input-token" class="form-label fw-bold">You Pay (Input Token)</label>
                                <input type="text" id="swap-input-token" name="input_token" class="form-control" placeholder="Mint or Contract Address" value="So11111111111111111111111111111111111111112" required>
                                <div class="form-text">e.g. Native SOL or ETH</div>
                            </div>
                            <div class="col-md-6">
                                <label for="swap-output-token" class="form-label fw-bold">You Receive (Output Token)</label>
                                <input type="text" id="swap-output-token" name="output_token" class="form-control" placeholder="Mint or Contract Address" value="EPjFWdd5AufqSSqeM2qN1xzybapC8G4wEGGkZwyTDt1v" required>
                                <div class="form-text">e.g. USDC</div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="swap-amount" class="form-label fw-bold">Amount (Smallest Units)</label>
                            <input type="text" id="swap-amount" name="amount" class="form-control" placeholder="e.g. 1000000000 (1 SOL in lamports)" value="1000000000" required>
                        </div>

                        <div class="mb-4">
                            <label for="swap-wallet-address" class="form-label fw-bold">Your Wallet Address (For Sanctions Screening)</label>
                            <input type="text" id="swap-wallet-address" name="wallet_address" class="form-control" placeholder="Optional for quote, required before execution">
                            <div class="form-text">Addresses are screened against compliance and OFAC SDN lists.</div>
                        </div>

                        <button type="submit" id="swap-quote-btn" class="btn btn-primary w-100 py-2 fw-bold">
                            Get Best Swap Quote
                        </button>
                    </form>

                    <div id="swap-quote-result" class="mt-4 d-none">
                        <hr>
                        <h6 class="fw-bold mb-3">Quote Details</h6>
                        <div class="table-responsive">
                            <table class="table table-bordered table-sm">
                                <tbody>
                                    <tr>
                                        <th class="w-50 bg-light">Aggregator Route</th>
                                        <td id="quote-route-summary">-</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Gross Output</th>
                                        <td id="quote-gross-output">-</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Platform Fee (50 bps)</th>
                                        <td id="quote-platform-fee">-</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Est. Network Fee</th>
                                        <td id="quote-network-fee">-</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light fw-bold text-success">Net Output</th>
                                        <td id="quote-net-output" class="fw-bold text-success">-</td>
                                    </tr>
                                    <tr>
                                        <th class="bg-light">Execution Status</th>
                                        <td id="quote-execution-status">-</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="swap-quote-error" class="alert alert-danger mt-3 d-none"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var form = document.getElementById('swap-quote-form');
    if (!form) return;

    form.addEventListener('submit', async function (ev) {
        ev.preventDefault();
        var resultDiv = document.getElementById('swap-quote-result');
        var errorDiv = document.getElementById('swap-quote-error');
        var btn = document.getElementById('swap-quote-btn');
        resultDiv.classList.add('d-none');
        errorDiv.classList.add('d-none');
        btn.disabled = true;

        try {
            var formData = new FormData(form);
            var res = await fetch('/Swaps/Quote', {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: formData
            });

            var data = await res.json();
            if (!data.ok) {
                errorDiv.textContent = data.message || data.error || 'Failed to fetch quote.';
                errorDiv.classList.remove('d-none');
                return;
            }

            document.getElementById('quote-route-summary').textContent = data.route_summary || data.provider;
            document.getElementById('quote-gross-output').textContent = data.gross_output_amount;
            document.getElementById('quote-platform-fee').textContent = data.platform_fee_amount + ' (' + (data.platform_fee_bps / 100) + '%)';
            document.getElementById('quote-network-fee').textContent = data.network_fee_est;
            document.getElementById('quote-net-output').textContent = data.net_output_amount;
            document.getElementById('quote-execution-status').textContent = data.execution_note;

            resultDiv.classList.remove('d-none');
        } catch (err) {
            errorDiv.textContent = 'Network error while fetching quote.';
            errorDiv.classList.remove('d-none');
        } finally {
            btn.disabled = false;
        }
    });
});
</script>
