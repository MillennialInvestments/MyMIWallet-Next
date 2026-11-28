<?php
/**
 * Prediction Markets Hub View:
 * Non-custodial aggregation across Polymarket (Web3) and Kalshi (CFTC)
 * plus Virtual Paper Trading Simulation and Social Gamification.
 *
 * @var list<array> $markets
 * @var list<array> $userOrders
 * @var string $activeCategory
 * @var string $activeProvider
 * @var string $activeMode
 * @var float $paperBalance
 * @var string $disclaimer
 */
$markets ??= [];
$userOrders ??= [];
$activeCategory ??= 'all';
$activeProvider ??= 'all';
$activeMode ??= 'all';
$paperBalance ??= 1000.00;
?>
<?= view('App\\Modules\\Sports\\Views\\nfl\\_responsive') ?>
<section class="container-fluid py-4" id="sports-predictions-hub">
    <?= view('App\\Modules\\Sports\\Views\\_header', [
        'activeTab'    => 'predictions',
        'pageTitle'    => 'Non-Custodial Prediction Markets Hub',
        'pageSubtitle' => 'Trade real-world event contracts across Politics, Federal Reserve decisions, Macro, Crypto, and Sports. Settled on-chain directly to self-custody wallets or practiced in Paper Trading mode.',
    ]) ?>

    <!-- Mode Selector & Virtual Credits Bar -->
    <div class="card mb-4 bg-light border-0 shadow-sm">
        <div class="card-body py-3">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
                <div class="d-flex align-items-center gap-2">
                    <span class="small fw-bold text-muted text-uppercase">Execution Mode:</span>
                    <div class="btn-group btn-group-sm" role="group">
                        <button type="button" class="btn btn-outline-primary active" id="btn-mode-web3" onclick="setTradingMode('web3')">
                            <i class="bi bi-wallet2 me-1"></i> Web3 Self-Custody
                        </button>
                        <button type="button" class="btn btn-outline-success" id="btn-mode-paper" onclick="setTradingMode('paper')">
                            <i class="bi bi-controller me-1"></i> Paper Trading (Virtual)
                        </button>
                    </div>
                </div>

                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-white text-dark border px-3 py-2">
                        <i class="bi bi-coin text-warning me-1"></i>
                        Virtual Credits: <strong class="text-success font-monospace" id="display-paper-balance">$<?= number_format((float) $paperBalance, 2) ?></strong>
                    </span>
                    <button type="button" class="btn btn-sm btn-outline-secondary" onclick="resetVirtualCredits()" title="Reset Virtual Balance to $1,000">
                        <i class="bi bi-arrow-counterclockwise"></i> Reset
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Category Toolbar -->
    <div class="card mb-4 shadow-sm border-0">
        <div class="card-body">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
                <form method="get" action="<?= site_url('My-Predictions') ?>" class="d-flex flex-wrap align-items-center gap-2">
                    <label class="form-label mb-0 fw-semibold small text-muted">Category:</label>
                    <select name="category" class="form-select form-select-sm" style="width: auto;" onchange="this.form.submit()">
                        <option value="all" <?= $activeCategory === 'all' ? 'selected' : '' ?>>All Categories</option>
                        <option value="Finance & Macro" <?= $activeCategory === 'Finance & Macro' ? 'selected' : '' ?>>Finance &amp; Macro (Fed/CPI)</option>
                        <option value="Crypto" <?= $activeCategory === 'Crypto' ? 'selected' : '' ?>>Crypto Milestones</option>
                        <option value="Sports" <?= $activeCategory === 'Sports' ? 'selected' : '' ?>>Sports Championships</option>
                        <option value="Tech & AI" <?= $activeCategory === 'Tech & AI' ? 'selected' : '' ?>>Tech &amp; Frontier AI</option>
                    </select>

                    <select name="provider" class="form-select form-select-sm" style="width: auto;" onchange="this.form.submit()">
                        <option value="all" <?= $activeProvider === 'all' ? 'selected' : '' ?>>All Rails (Web3 + CFTC)</option>
                        <option value="polymarket" <?= $activeProvider === 'polymarket' ? 'selected' : '' ?>>Polymarket (Web3 Smart Contracts)</option>
                        <option value="kalshi" <?= $activeProvider === 'kalshi' ? 'selected' : '' ?>>Kalshi (CFTC-Regulated Event Contracts)</option>
                    </select>
                </form>

                <div class="d-flex align-items-center gap-2">
                    <span class="badge bg-light text-dark border">
                        <i class="bi bi-shield-lock-fill text-success me-1"></i> Non-Custodial Protocol
                    </span>
                    <span class="badge bg-success-subtle text-success border border-success-subtle">
                        0.50% Platform Routing Fee (0% Paper)
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Prediction Contracts Grid -->
    <div class="row g-4 mb-4">
        <?php if ($markets === []): ?>
            <div class="col-12 text-center py-5 text-muted">
                <i class="bi bi-graph-up fs-1 d-block mb-2 text-muted"></i>
                No prediction contracts found matching this category filter.
            </div>
        <?php else: ?>
            <?php foreach ($markets as $m): ?>
                <?php
                $yesPct = round((float) $m['yes_price'] * 100, 1);
                $noPct = round((float) $m['no_price'] * 100, 1);
                $providerBadge = $m['provider'] === 'kalshi'
                    ? '<span class="badge bg-dark">Kalshi CFTC</span>'
                    : '<span class="badge bg-purple text-white" style="background-color: #6f42c1;">Polymarket Web3</span>';
                ?>
                <div class="col-12 col-md-6 col-xl-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
                            <span class="badge bg-light text-secondary border small"><?= esc($m['category']) ?></span>
                            <?= $providerBadge ?>
                        </div>
                        <div class="card-body pt-0 d-flex flex-column justify-content-between">
                            <div>
                                <h3 class="h6 fw-bold mb-2"><?= esc($m['title']) ?></h3>
                                <p class="small text-muted mb-3"><?= esc($m['description'] ?? '') ?></p>
                            </div>

                            <div>
                                <!-- Price & Probability Bar -->
                                <div class="d-flex justify-content-between align-items-center mb-1 small fw-bold">
                                    <span class="text-success">YES: <?= $yesPct ?>% ($<?= number_format((float) $m['yes_price'], 2) ?>)</span>
                                    <span class="text-danger">NO: <?= $noPct ?>% ($<?= number_format((float) $m['no_price'], 2) ?>)</span>
                                </div>
                                <div class="progress mb-3" style="height: 8px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: <?= $yesPct ?>%" aria-valuenow="<?= $yesPct ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: <?= $noPct ?>%" aria-valuenow="<?= $noPct ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>

                                <div class="d-flex justify-content-between text-muted small mb-3">
                                    <span>24h Vol: $<?= number_format((float) $m['volume_usd_24h'] / 1000, 0) ?>k</span>
                                    <span>Liquidity: $<?= number_format((float) $m['total_liquidity_usd'] / 1000, 0) ?>k</span>
                                </div>

                                <div class="d-grid gap-2 d-flex">
                                    <button type="button" class="btn btn-outline-success btn-sm flex-fill fw-bold" onclick="openOrderModal(<?= (int) $m['id'] ?>, '<?= esc($m['title'], 'js') ?>', 'YES', <?= (float) $m['yes_price'] ?>)">
                                        Buy YES (<?= $yesPct ?>¢)
                                    </button>
                                    <button type="button" class="btn btn-outline-danger btn-sm flex-fill fw-bold" onclick="openOrderModal(<?= (int) $m['id'] ?>, '<?= esc($m['title'], 'js') ?>', 'NO', <?= (float) $m['no_price'] ?>)">
                                        Buy NO (<?= $noPct ?>¢)
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <!-- User Open Prediction Slips -->
    <?php if ($userOrders !== []): ?>
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-white py-3 border-0 d-flex flex-wrap justify-content-between align-items-center gap-2">
                <h2 class="h5 mb-0 fw-bold">My Active Prediction Contracts</h2>
                <div class="d-flex align-items-center gap-2">
                    <div class="btn-group btn-group-sm" role="group">
                        <a href="<?= site_url('My-Predictions?mode=all') ?>" class="btn btn-<?= $activeMode === 'all' ? 'secondary' : 'outline-secondary' ?>">All (<?= count($userOrders) ?>)</a>
                        <a href="<?= site_url('My-Predictions?mode=web3') ?>" class="btn btn-<?= $activeMode === 'web3' ? 'secondary' : 'outline-secondary' ?>">Web3 On-Chain</a>
                        <a href="<?= site_url('My-Predictions?mode=paper') ?>" class="btn btn-<?= $activeMode === 'paper' ? 'secondary' : 'outline-secondary' ?>">Paper Trades</a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light small text-uppercase text-muted">
                        <tr>
                            <th>Contract</th>
                            <th>Side</th>
                            <th class="text-center">Mode</th>
                            <th class="text-end">Shares</th>
                            <th class="text-end">Buy Price</th>
                            <th class="text-end">Invested</th>
                            <th class="text-end">Max Payout</th>
                            <th class="text-center">Status</th>
                            <th>Receipt / Sig</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($userOrders as $o): ?>
                            <?php $isPaper = ! empty($o['is_paper_trade']); ?>
                            <tr>
                                <td class="fw-bold"><?= esc($o['market_title'] ?? 'Market') ?></td>
                                <td>
                                    <span class="badge bg-<?= $o['outcome'] === 'YES' ? 'success' : 'danger' ?>"><?= esc($o['outcome']) ?></span>
                                </td>
                                <td class="text-center">
                                    <span class="badge bg-<?= $isPaper ? 'info' : 'primary' ?>-subtle text-<?= $isPaper ? 'info' : 'primary' ?> border">
                                        <?= $isPaper ? 'Paper Virtual' : 'Web3 USDC' ?>
                                    </span>
                                </td>
                                <td class="text-end font-monospace"><?= number_format((float) $o['shares_count'], 2) ?></td>
                                <td class="text-end font-monospace">$<?= number_format((float) $o['share_price'], 2) ?></td>
                                <td class="text-end font-monospace">$<?= number_format((float) $o['total_amount_usd'], 2) ?></td>
                                <td class="text-end font-monospace text-success fw-bold">$<?= number_format((float) ($o['shares_count'] * 1.00), 2) ?></td>
                                <td class="text-center">
                                    <span class="badge bg-<?= $o['status'] === 'confirmed' ? 'success' : 'warning' ?>-subtle text-dark border">
                                        <?= esc(ucfirst((string) $o['status'])) ?>
                                    </span>
                                </td>
                                <td class="small font-monospace">
                                    <?php if ($isPaper): ?>
                                        <span class="badge bg-light text-muted border font-monospace"><?= esc((string) $o['tx_signature']) ?></span>
                                    <?php elseif ($o['tx_signature']): ?>
                                        <span class="text-muted"><?= esc(substr((string) $o['tx_signature'], 0, 10)) ?>...</span>
                                    <?php else: ?>
                                        <span class="text-muted">Awaiting Broadcast</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif; ?>

    <!-- Modal: Prediction Order Router (Web3 + Paper Trading) -->
    <div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="form-prediction-order" onsubmit="submitPredictionOrder(event)">
                    <?= csrf_field() ?>
                    <input type="hidden" id="modal-market-id" name="market_id">
                    <input type="hidden" id="modal-outcome" name="outcome">
                    <input type="hidden" id="modal-price" name="price">

                    <div class="modal-header">
                        <h5 class="modal-title fw-bold" id="orderModalLabel">
                            <span id="modal-icon-container"><i class="bi bi-wallet2 text-primary me-2"></i></span>
                            <span id="modal-mode-title">Non-Custodial Order Router</span>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-info py-2 px-3 small mb-3" id="modal-instruction-alert">
                            <i class="bi bi-info-circle me-1"></i> Order is routed directly to smart contract. You will sign the transaction in your self-custody wallet (Phantom/MetaMask).
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-semibold text-muted">Contract</label>
                            <div class="fw-bold fs-6" id="modal-market-title">Market Title</div>
                        </div>

                        <div class="mb-3">
                            <label for="modal-amount" class="form-label fw-semibold" id="modal-amount-label">Amount to Invest (USDC)</label>
                            <input type="number" step="5" min="5" class="form-control font-monospace" id="modal-amount" name="amount_usd" value="100" required>
                        </div>

                        <div class="mb-3" id="modal-wallet-group">
                            <label for="modal-wallet" class="form-label fw-semibold">Self-Custody Wallet Address</label>
                            <input type="text" class="form-control font-monospace" id="modal-wallet" name="user_wallet" placeholder="0x... or Solana pubkey">
                            <div class="form-text small">Your public address receiving the outcome tokens. Never share private keys.</div>
                        </div>

                        <!-- Routing Breakdown -->
                        <div class="bg-light p-3 rounded small">
                            <div class="d-flex justify-content-between mb-1">
                                <span class="text-muted">Selection:</span>
                                <span class="fw-bold" id="breakdown-outcome">YES</span>
                            </div>
                            <div class="d-flex justify-content-between mb-1">
                                <span class="text-muted">Share Price:</span>
                                <span class="font-monospace fw-bold" id="breakdown-price">$0.50</span>
                            </div>
                            <div class="d-flex justify-content-between mb-1">
                                <span class="text-muted">Estimated Shares:</span>
                                <span class="font-monospace fw-bold" id="breakdown-shares">199.00</span>
                            </div>
                            <div class="d-flex justify-content-between mb-1" id="breakdown-fee-row">
                                <span class="text-muted">Platform Routing Fee:</span>
                                <span class="font-monospace text-muted" id="breakdown-fee">$0.50</span>
                            </div>
                            <div class="d-flex justify-content-between border-top pt-2 mt-2">
                                <span class="fw-bold">Max Payout if Outcome Wins:</span>
                                <span class="fw-bold text-success font-monospace fs-6" id="breakdown-payout">$199.00</span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-light">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary fw-bold" id="btn-submit-order">
                            <i class="bi bi-box-arrow-up-right me-1"></i> Construct Unsigned Transaction
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script<?= script_nonce_attr() ?>>
let currentTradingMode = 'web3';

function setTradingMode(mode) {
    currentTradingMode = mode;
    const btnWeb3 = document.getElementById('btn-mode-web3');
    const btnPaper = document.getElementById('btn-mode-paper');

    if (mode === 'paper') {
        btnPaper.classList.add('active');
        btnWeb3.classList.remove('active');
    } else {
        btnWeb3.classList.add('active');
        btnPaper.classList.remove('active');
    }
}

function openOrderModal(id, title, outcome, price) {
    document.getElementById('modal-market-id').value = id;
    document.getElementById('modal-market-title').textContent = title;
    document.getElementById('modal-outcome').value = outcome;
    document.getElementById('modal-price').value = price;

    document.getElementById('breakdown-outcome').textContent = outcome;
    document.getElementById('breakdown-price').textContent = '$' + price.toFixed(2);

    const isPaper = currentTradingMode === 'paper';
    const alertBox = document.getElementById('modal-instruction-alert');
    const walletGroup = document.getElementById('modal-wallet-group');
    const amountLabel = document.getElementById('modal-amount-label');
    const submitBtn = document.getElementById('btn-submit-order');
    const modeTitle = document.getElementById('modal-mode-title');
    const feeRow = document.getElementById('breakdown-fee-row');

    if (isPaper) {
        modeTitle.textContent = 'Virtual Paper Trading Execution';
        alertBox.className = 'alert alert-success py-2 px-3 small mb-3';
        alertBox.innerHTML = '<i class="bi bi-check-circle me-1"></i> <strong>Paper Mode Active:</strong> Risk-free simulation using virtual credits. Orders confirm immediately and award 15 XP to your Gamification Leaderboard rank!';
        walletGroup.style.display = 'none';
        amountLabel.textContent = 'Virtual Credits to Allocate';
        submitBtn.className = 'btn btn-success fw-bold';
        submitBtn.innerHTML = '<i class="bi bi-check2-circle me-1"></i> Execute Virtual Trade (+15 XP)';
        feeRow.style.display = 'none';
    } else {
        modeTitle.textContent = 'Non-Custodial Order Router';
        alertBox.className = 'alert alert-info py-2 px-3 small mb-3';
        alertBox.innerHTML = '<i class="bi bi-info-circle me-1"></i> Order is routed directly to smart contract. You will sign the transaction in your self-custody wallet (Phantom/MetaMask).';
        walletGroup.style.display = 'block';
        amountLabel.textContent = 'Amount to Invest (USDC)';
        submitBtn.className = 'btn btn-primary fw-bold';
        submitBtn.innerHTML = '<i class="bi bi-box-arrow-up-right me-1"></i> Construct Unsigned Transaction';
        feeRow.style.display = 'flex';
    }

    updateOrderBreakdown();
    const modal = new bootstrap.Modal(document.getElementById('orderModal'));
    modal.show();
}

function updateOrderBreakdown() {
    const amount = parseFloat(document.getElementById('modal-amount').value) || 100;
    const price = parseFloat(document.getElementById('modal-price').value) || 0.50;
    const isPaper = currentTradingMode === 'paper';

    const fee = isPaper ? 0.0 : (amount * 0.005);
    const net = amount - fee;
    const shares = net / price;
    const payout = shares * 1.00;

    document.getElementById('breakdown-shares').textContent = shares.toFixed(2);
    document.getElementById('breakdown-fee').textContent = '$' + fee.toFixed(2);
    document.getElementById('breakdown-payout').textContent = '$' + payout.toFixed(2) + (isPaper ? ' Credits' : ' USDC');
}

document.getElementById('modal-amount').addEventListener('input', updateOrderBreakdown);

function submitPredictionOrder(e) {
    e.preventDefault();
    const isPaper = currentTradingMode === 'paper';
    const marketId = document.getElementById('modal-market-id').value;
    const outcome = document.getElementById('modal-outcome').value;
    const amount = parseFloat(document.getElementById('modal-amount').value) || 10;
    const wallet = document.getElementById('modal-wallet').value;
    const submitBtn = document.getElementById('btn-submit-order');

    submitBtn.disabled = true;

    if (isPaper) {
        fetch('<?= site_url('My-Predictions/Paper-Trade') ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': '<?= csrf_hash() ?>'
            },
            body: JSON.stringify({
                market_id: parseInt(marketId, 10),
                outcome: outcome,
                amount_credits: amount
            })
        })
        .then(r => r.json())
        .then(data => {
            submitBtn.disabled = false;
            if (data.success) {
                document.getElementById('display-paper-balance').textContent = '$' + parseFloat(data.new_balance).toFixed(2);
                alert('Paper trade executed successfully! +15 Gamification XP awarded.');
                window.location.reload();
            } else {
                alert('Trade error: ' + (data.message || 'Unknown error'));
            }
        })
        .catch(err => {
            console.error(err);
            submitBtn.disabled = false;
            alert('Failed to execute paper trade.');
        });
    } else {
        fetch('<?= site_url('My-Predictions/Order') ?>', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': '<?= csrf_hash() ?>'
            },
            body: JSON.stringify({
                market_id: parseInt(marketId, 10),
                outcome: outcome,
                stake_usdc: amount,
                user_wallet: wallet
            })
        })
        .then(r => r.json())
        .then(data => {
            submitBtn.disabled = false;
            if (data.success) {
                alert('Unsigned payload prepared. Sign via self-custody wallet.');
                window.location.reload();
            } else {
                alert('Order error: ' + (data.message || 'Unknown error'));
            }
        })
        .catch(err => {
            console.error(err);
            submitBtn.disabled = false;
            alert('Failed to route prediction order.');
        });
    }
}

function resetVirtualCredits() {
    if (!confirm('Reset your virtual paper trading balance back to 1,000.00 credits?')) {
        return;
    }

    fetch('<?= site_url('My-Predictions/Reset-Balance') ?>', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': '<?= csrf_hash() ?>'
        }
    })
    .then(r => r.json())
    .then(data => {
        if (data.success) {
            document.getElementById('display-paper-balance').textContent = '$' + parseFloat(data.balance).toFixed(2);
            alert('Virtual balance reset to 1,000 credits.');
        }
    })
    .catch(console.error);
}
</script>
