<div class="container-fluid py-4">
    <div class="row">
        <!-- Balances and Market Overview -->
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-dark text-white py-3">
                    <h5 class="card-title mb-0">Paper Portfolio Balances</h5>
                </div>
                <div class="card-body p-3">
                    <div class="alert alert-secondary py-2 small mb-3">
                        <i class="bi bi-info-circle me-1"></i> Simulated paper trading balances for risk-free strategy practice.
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm table-striped align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>Asset</th>
                                    <th class="text-end">Balance</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach (($balances ?? []) as $asset => $bal): ?>
                                    <tr>
                                        <td class="fw-bold"><?= esc($asset) ?></td>
                                        <td class="text-end font-monospace"><?= esc(number_format((float) $bal, $asset === 'USD' ? 2 : 6)) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm border-0">
                <div class="card-header bg-warning text-dark py-2">
                    <h6 class="card-title mb-0 fw-bold">Tradability Notice</h6>
                </div>
                <div class="card-body p-3 small">
                    <p class="mb-2"><strong>Closed-Loop Assets:</strong> MyMI Gold is an in-app utility credit and is <strong>not tradable</strong> on any exchange.</p>
                    <p class="mb-0"><strong>Accredited Offerings:</strong> MyMI Coin is issued exclusively under MDIT Reg D 506(c) private placements and is <strong>not listed</strong> for exchange trading.</p>
                </div>
            </div>
        </div>

        <!-- Order Form and History -->
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 mb-4">
                <div class="card-header bg-primary text-white py-3">
                    <h5 class="card-title mb-0">Place Paper Order</h5>
                </div>
                <div class="card-body p-4">
                    <form id="paper-order-form" action="/Exchange/Paper/Order" method="post">
                        <?= csrf_field() ?>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label for="order-symbol" class="form-label fw-bold">Market Symbol</label>
                                <select id="order-symbol" name="symbol" class="form-select">
                                    <option value="BTC/USD" selected>BTC / USD</option>
                                    <option value="ETH/USD">ETH / USD</option>
                                    <option value="SOL/USD">SOL / USD</option>
                                    <option value="XRP/USD">XRP / USD</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold d-block">Order Side</label>
                                <div class="btn-group w-100" role="group">
                                    <input type="radio" class="btn-check" name="side" id="side-buy" value="buy" checked>
                                    <label class="btn btn-outline-success fw-bold" for="side-buy">BUY</label>
                                    <input type="radio" class="btn-check" name="side" id="side-sell" value="sell">
                                    <label class="btn btn-outline-danger fw-bold" for="side-sell">SELL</label>
                                </div>
                            </div>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="order-quantity" class="form-label fw-bold">Quantity</label>
                                <input type="number" step="0.00000001" min="0.00000001" id="order-quantity" name="quantity" class="form-control" placeholder="0.05" required>
                            </div>
                            <div class="col-md-6">
                                <label for="order-type" class="form-label fw-bold">Order Type</label>
                                <select id="order-type" name="order_type" class="form-select">
                                    <option value="market" selected>Market Order (Instant Fill)</option>
                                </select>
                            </div>
                        </div>

                        <button type="submit" id="paper-order-submit" class="btn btn-primary w-100 py-2 fw-bold">
                            Execute Paper Order
                        </button>
                    </form>

                    <div id="order-alert" class="alert d-none mt-3" role="alert"></div>
                </div>
            </div>

            <!-- Order History Table -->
            <div class="card shadow-sm border-0">
                <div class="card-header bg-light py-3">
                    <h6 class="card-title mb-0 fw-bold">Recent Paper Orders</h6>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover table-sm mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Time</th>
                                    <th>Symbol</th>
                                    <th>Side</th>
                                    <th class="text-end">Qty</th>
                                    <th class="text-end">Price</th>
                                    <th class="text-end">Total USD</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($history)): ?>
                                    <tr>
                                        <td colspan="7" class="text-center text-muted py-3">No paper orders placed yet.</td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach ($history as $ord): ?>
                                        <tr>
                                            <td class="small"><?= esc($ord['created_at']) ?></td>
                                            <td class="fw-bold"><?= esc($ord['symbol']) ?></td>
                                            <td>
                                                <span class="badge bg-<?= $ord['side'] === 'buy' ? 'success' : 'danger' ?>">
                                                    <?= strtoupper(esc($ord['side'])) ?>
                                                </span>
                                            </td>
                                            <td class="text-end font-monospace"><?= esc($ord['quantity']) ?></td>
                                            <td class="text-end font-monospace">$<?= esc(number_format((float) $ord['price'], 2)) ?></td>
                                            <td class="text-end font-monospace">$<?= esc(number_format((float) $ord['total_cost'], 2)) ?></td>
                                            <td><span class="badge bg-secondary"><?= esc($ord['status']) ?></span></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script<?= script_nonce_attr() ?>>
document.addEventListener('DOMContentLoaded', function () {
    var form = document.getElementById('paper-order-form');
    if (!form) return;

    form.addEventListener('submit', async function (ev) {
        ev.preventDefault();
        var alertBox = document.getElementById('order-alert');
        var submitBtn = document.getElementById('paper-order-submit');
        alertBox.className = 'alert d-none mt-3';
        submitBtn.disabled = true;

        try {
            var formData = new FormData(form);
            var res = await fetch('/Exchange/Paper/Order', {
                method: 'POST',
                headers: { 'X-Requested-With': 'XMLHttpRequest' },
                body: formData
            });

            var data = await res.json();
            if (data.ok) {
                alertBox.className = 'alert alert-success mt-3';
                alertBox.textContent = 'Order executed successfully! Total: $' + Number(data.total_cost).toFixed(2);
                setTimeout(function () { window.location.reload(); }, 1200);
            } else {
                alertBox.className = 'alert alert-danger mt-3';
                alertBox.textContent = data.message || data.error || 'Order execution failed.';
            }
        } catch (err) {
            alertBox.className = 'alert alert-danger mt-3';
            alertBox.textContent = 'Network error while placing order.';
        } finally {
            submitBtn.disabled = false;
        }
    });
});
</script>
