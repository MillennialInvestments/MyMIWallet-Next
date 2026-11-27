<?php
/**
 * Licensed Crypto On-Ramp Hub View:
 * Monetized fiat-to-crypto gateway via MoonPay & Stripe Crypto Onramp.
 *
 * @var array<string,mixed> $config
 * @var list<array> $transactions
 * @var string $disclaimer
 */
$config ??= [];
$transactions ??= [];
$providers = $config['supported_providers'] ?? [];
$assets = $config['supported_assets'] ?? [];
?>
<?= view('App\\Modules\\Sports\\Views\\nfl\\_responsive') ?>
<section class="container-fluid py-4" id="sports-onramp-hub">
    <?= view('App\\Modules\\Sports\\Views\\_header', [
        'activeTab'    => 'onramp',
        'pageTitle'    => 'Licensed Crypto On-Ramp & Monetization Gateway',
        'pageSubtitle' => 'Purchase crypto directly into your self-custody wallet using Debit Card, Apple Pay, or Bank Transfer via licensed Money Services Businesses (MSBs).',
    ]) ?>

    <!-- Legal & Non-Custodial Architecture Banner -->
    <div class="alert alert-info border-0 shadow-sm mb-4 d-flex align-items-start gap-3">
        <div class="fs-3 text-primary"><i class="bi bi-shield-check"></i></div>
        <div>
            <h6 class="alert-heading fw-bold mb-1">Non-Custodial Architecture &amp; FinCEN Compliance</h6>
            <p class="small mb-0 text-muted">
                MyMI Wallet operates strictly as non-custodial software and does not custody funds or execute money transmission.
                All fiat-to-crypto exchanges and payment processing are fulfilled by licensed partner MSBs (<strong>MoonPay</strong> and <strong>Stripe</strong>).
                Purchased digital assets are transferred directly to your private self-custody wallet. All transactions are screened with sub-millisecond O(1) in-memory OFAC sanctions verification.
            </p>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <!-- On-Ramp Checkout Card -->
        <div class="col-lg-7">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-white py-3 border-bottom d-flex justify-content-between align-items-center">
                    <h5 class="card-title fw-bold mb-0">
                        <i class="bi bi-credit-card text-success me-2"></i>Instant Crypto Purchase
                    </h5>
                    <span class="badge bg-success-subtle text-success border border-success-subtle">
                        <i class="bi bi-check-circle-fill me-1"></i>OFAC Screened
                    </span>
                </div>
                <div class="card-body p-4">
                    <form id="onramp-checkout-form" method="post" action="<?= site_url('MyMISports/Onramp/Checkout') ?>">
                        <?= csrf_field() ?>

                        <!-- Provider Selection -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold small text-muted text-uppercase">1. Select Licensed Rail</label>
                            <div class="row g-2">
                                <div class="col-6">
                                    <input type="radio" class="btn-check" name="provider" id="provider-moonpay" value="moonpay" checked>
                                    <label class="btn btn-outline-primary w-100 p-3 text-start d-flex flex-column h-100" for="provider-moonpay">
                                        <div class="d-flex justify-content-between align-items-center w-100 mb-1">
                                            <strong class="fs-6">MoonPay</strong>
                                            <span class="badge bg-primary">Global</span>
                                        </div>
                                        <small class="text-muted">Debit, Credit, Apple Pay, Google Pay</small>
                                        <div class="mt-2 text-success small fw-semibold">1.0% Transparent Routing</div>
                                    </label>
                                </div>
                                <div class="col-6">
                                    <input type="radio" class="btn-check" name="provider" id="provider-stripe" value="stripe">
                                    <label class="btn btn-outline-primary w-100 p-3 text-start d-flex flex-column h-100" for="provider-stripe">
                                        <div class="d-flex justify-content-between align-items-center w-100 mb-1">
                                            <strong class="fs-6">Stripe Onramp</strong>
                                            <span class="badge bg-secondary">US Focus</span>
                                        </div>
                                        <small class="text-muted">US Debit, Instant Bank Wire, Apple Pay</small>
                                        <div class="mt-2 text-success small fw-semibold">1.0% Transparent Routing</div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Asset Selection -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold small text-muted text-uppercase">2. Choose Crypto Asset</label>
                            <select name="crypto_asset" id="crypto-asset-select" class="form-select form-select-lg">
                                <option value="USDC" selected>USDC (USD Coin) &mdash; Polygon, Solana, Base, Ethereum</option>
                                <option value="SOL">SOL (Solana Native)</option>
                                <option value="ETH">ETH (Ethereum / Base / Arbitrum)</option>
                                <option value="BTC">BTC (Bitcoin)</option>
                            </select>
                        </div>

                        <!-- Amount Selection -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold small text-muted text-uppercase">3. Purchase Amount (USD)</label>
                            <div class="input-group input-group-lg mb-2">
                                <span class="input-group-text bg-light fw-bold">$</span>
                                <input type="number" step="1" min="10" max="10000" class="form-control fw-bold" name="fiat_amount" id="fiat-amount-input" value="100" placeholder="100">
                                <span class="input-group-text bg-light text-muted">USD</span>
                            </div>
                            <div class="d-flex gap-2">
                                <button type="button" class="btn btn-sm btn-outline-secondary amount-preset-btn" data-amount="50">$50</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary amount-preset-btn" data-amount="100">$100</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary amount-preset-btn" data-amount="250">$250</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary amount-preset-btn" data-amount="500">$500</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary amount-preset-btn" data-amount="1000">$1,000</button>
                            </div>
                        </div>

                        <!-- Destination Wallet -->
                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <label class="form-label fw-semibold small text-muted text-uppercase mb-0">4. Destination Self-Custody Wallet</label>
                                <small class="text-muted"><i class="bi bi-shield-lock text-success me-1"></i>Must be your self-custody address</small>
                            </div>
                            <input type="text" class="form-control font-monospace" name="destination_wallet" id="destination-wallet-input" placeholder="0x... or Solana base58 address" required>
                            <div class="form-text small text-muted">
                                We verify this address against the OFAC Specially Designated Nationals (SDN) database prior to generating the payment token.
                            </div>
                        </div>

                        <!-- Fee & Summary Box -->
                        <div class="bg-light p-3 rounded-3 mb-4 border">
                            <div class="d-flex justify-content-between align-items-center mb-1 small">
                                <span class="text-muted">Subtotal Purchase:</span>
                                <strong id="summary-subtotal">$100.00 USD</strong>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-1 small">
                                <span class="text-muted">Platform Affiliate Fee (1.0%):</span>
                                <span class="text-success fw-bold" id="summary-fee">$1.00 USD</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-1 small">
                                <span class="text-muted">Estimated Settlement:</span>
                                <span class="badge bg-secondary-subtle text-secondary" id="summary-settlement">Direct to Self-Custody (~2-5 mins)</span>
                            </div>
                            <hr class="my-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold">Total Charged:</span>
                                <strong class="fs-5 text-primary" id="summary-total">$100.00 USD</strong>
                            </div>
                        </div>

                        <div id="onramp-error-msg" class="alert alert-danger d-none py-2 px-3 small mb-3"></div>

                        <button type="submit" id="onramp-submit-btn" class="btn btn-primary btn-lg w-100 fw-bold shadow-sm">
                            <i class="bi bi-box-arrow-up-right me-2"></i>Continue to Licensed Partner Checkout
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Information & Monetization Economics -->
        <div class="col-lg-5">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-white py-3 border-bottom">
                    <h5 class="card-title fw-bold mb-0">
                        <i class="bi bi-cash-stack text-primary me-2"></i>How It Works &amp; Economics
                    </h5>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-start gap-3 mb-3">
                        <div class="badge bg-primary rounded-circle p-2 fs-6">1</div>
                        <div>
                            <h6 class="fw-bold mb-1">Affiliate Rev-Share Structure</h6>
                            <p class="small text-muted mb-0">
                                MyMI earns a compliant 1.00% software referral fee on each fulfilled transaction. Fees are split at the gateway level by the licensed partner.
                            </p>
                        </div>
                    </div>
                    <div class="d-flex align-items-start gap-3 mb-3">
                        <div class="badge bg-primary rounded-circle p-2 fs-6">2</div>
                        <div>
                            <h6 class="fw-bold mb-1">Multi-Chain Delivery</h6>
                            <p class="small text-muted mb-0">
                                Supported across high-speed, low-cost rails: <strong>Polygon PoS</strong> (for Polymarket contracts), <strong>Solana</strong>, <strong>Base</strong>, and <strong>Ethereum L1</strong>.
                            </p>
                        </div>
                    </div>
                    <div class="d-flex align-items-start gap-3">
                        <div class="badge bg-primary rounded-circle p-2 fs-6">3</div>
                        <div>
                            <h6 class="fw-bold mb-1">OFAC &amp; FinCEN Adherence</h6>
                            <p class="small text-muted mb-0">
                                We screen destination addresses in real-time. Blocked or flagged addresses are rejected instantly prior to session initialization.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Regulatory Notice -->
            <div class="card shadow-sm border-0 bg-light">
                <div class="card-body p-4">
                    <h6 class="fw-bold text-dark mb-2">
                        <i class="bi bi-bank text-secondary me-2"></i>Regulatory Transparency
                    </h6>
                    <p class="small text-muted mb-2">
                        MyMI Wallet is not a registered Money Services Business (MSB) or financial institution and does not provide banking or custodial services.
                        Fiat payment rails and cryptocurrency sales are provided by <strong>MoonPay USA LLC</strong> (NMLS #2071245) or <strong>Stripe Payments Company</strong>.
                    </p>
                    <p class="small text-muted mb-0">
                        Crypto-asset transactions are non-refundable and irreversible. Ensure your destination address matches the selected asset and network.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- User On-Ramp Order History -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3 border-bottom d-flex justify-content-between align-items-center">
            <h5 class="card-title fw-bold mb-0">
                <i class="bi bi-clock-history text-secondary me-2"></i>Your On-Ramp Purchase History
            </h5>
            <span class="badge bg-secondary-subtle text-secondary"><?= count($transactions) ?> Total Orders</span>
        </div>
        <div class="card-body p-0">
            <?php if (empty($transactions)): ?>
                <div class="text-center py-5">
                    <i class="bi bi-receipt display-4 text-muted mb-3 d-block"></i>
                    <h6 class="fw-bold text-muted">No On-Ramp Transactions Yet</h6>
                    <p class="small text-muted mb-0">Initiate a purchase above to buy crypto directly into your self-custody wallet.</p>
                </div>
            <?php else: ?>
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light small text-uppercase text-muted">
                            <tr>
                                <th>Tx ID</th>
                                <th>Provider</th>
                                <th>Fiat In</th>
                                <th>Crypto Asset</th>
                                <th>Destination Wallet</th>
                                <th>Platform Fee</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($transactions as $tx): ?>
                                <tr>
                                    <td class="font-monospace small fw-bold">
                                        <?= esc($tx['external_tx_id'] ?? ('tx_' . $tx['id'])) ?>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark border">
                                            <?= esc(ucfirst((string)($tx['provider'] ?? 'moonpay'))) ?>
                                        </span>
                                    </td>
                                    <td class="fw-bold">
                                        $<?= number_format((float)($tx['fiat_amount'] ?? 0), 2) ?> USD
                                    </td>
                                    <td>
                                        <span class="badge bg-primary-subtle text-primary fw-bold">
                                            <?= esc($tx['crypto_asset'] ?? 'USDC') ?>
                                        </span>
                                    </td>
                                    <td class="font-monospace small text-truncate" style="max-width: 180px;" title="<?= esc($tx['destination_wallet'] ?? '') ?>">
                                        <?= esc($tx['destination_wallet'] ?? '') ?>
                                    </td>
                                    <td class="text-success small fw-semibold">
                                        $<?= number_format((float)($tx['platform_fee_earned'] ?? 0), 2) ?>
                                    </td>
                                    <td>
                                        <?php $st = strtolower((string)($tx['status'] ?? 'pending')); ?>
                                        <?php if ($st === 'completed'): ?>
                                            <span class="badge bg-success">Completed</span>
                                        <?php elseif ($st === 'failed'): ?>
                                            <span class="badge bg-danger">Failed</span>
                                        <?php else: ?>
                                            <span class="badge bg-warning text-dark">Pending</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="small text-muted">
                                        <?= esc(substr((string)($tx['created_at'] ?? ''), 0, 16)) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<script<?= script_nonce_attr() ?>>
document.addEventListener('DOMContentLoaded', function() {
    const amountInput = document.getElementById('fiat-amount-input');
    const subtotalText = document.getElementById('summary-subtotal');
    const feeText = document.getElementById('summary-fee');
    const totalText = document.getElementById('summary-total');
    const presetBtns = document.querySelectorAll('.amount-preset-btn');
    const onrampForm = document.getElementById('onramp-checkout-form');
    const errorBox = document.getElementById('onramp-error-msg');
    const submitBtn = document.getElementById('onramp-submit-btn');

    function updateBreakdown() {
        const val = parseFloat(amountInput.value) || 0;
        const fee = Math.round(val * 1.0) / 100.0;
        subtotalText.textContent = '$' + val.toFixed(2) + ' USD';
        feeText.textContent = '$' + fee.toFixed(2) + ' USD';
        totalText.textContent = '$' + val.toFixed(2) + ' USD';
    }

    if (amountInput) {
        amountInput.addEventListener('input', updateBreakdown);
    }

    presetBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            amountInput.value = this.getAttribute('data-amount');
            updateBreakdown();
        });
    });

    if (onrampForm) {
        onrampForm.addEventListener('submit', function(e) {
            e.preventDefault();
            errorBox.classList.add('d-none');
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Screening &amp; Initializing Checkout...';

            const formData = new FormData(onrampForm);

            fetch(onrampForm.action, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<i class="bi bi-box-arrow-up-right me-2"></i>Continue to Licensed Partner Checkout';

                if (!data.success) {
                    errorBox.textContent = data.message || 'On-ramp checkout failed.';
                    errorBox.classList.remove('d-none');
                    return;
                }

                if (data.checkout_url) {
                    // Open checkout session in new tab
                    window.open(data.checkout_url, '_blank', 'noopener,noreferrer');
                    // Refresh current page after short delay to show pending order
                    setTimeout(() => window.location.reload(), 1500);
                }
            })
            .catch(err => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = '<i class="bi bi-box-arrow-up-right me-2"></i>Continue to Licensed Partner Checkout';
                errorBox.textContent = 'Network or server error during on-ramp checkout initialization.';
                errorBox.classList.remove('d-none');
            });
        });
    }
});
</script>
