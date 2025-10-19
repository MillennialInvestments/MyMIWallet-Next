<?php helper(['url','form']); ?>
<?php if (! isset($item) || empty($item['lot_id'])): ?>
    <div class="container py-5">
        <div class="alert alert-warning">This auction lot is not available.</div>
    </div>
    <?php return; ?>
<?php endif; ?>

<?php
    $config = config('MyMIAuction');
    $defaultIncrement = $config ? $config->defaultMinIncrementCents : 100;
    $fmv = (int) ($item['fmv_amount_cents'] ?? 0);
    $currentBid = (int) ($item['top_bid']['amount_cents'] ?? 0);
    $minIncrement = (int) ($item['min_increment'] ?? $defaultIncrement);
    $reserve = (int) ($item['reserve_cents'] ?? 0);
    $lotId = (int) $item['lot_id'];
?>

<div class="container py-4" data-lot-id="<?= $lotId ?>">
    <div class="row g-4">
        <div class="col-lg-6">
            <?php if (! empty($item['images'])): ?>
                <div id="auction-carousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php foreach ($item['images'] as $idx => $img): ?>
                            <div class="carousel-item <?= $idx === 0 ? 'active' : '' ?>">
                                <img src="<?= esc($img) ?>" class="d-block w-100 rounded" alt="<?= esc($item['title']) ?>">
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <?php if (count($item['images']) > 1): ?>
                        <button class="carousel-control-prev" type="button" data-bs-target="#auction-carousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#auction-carousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    <?php endif; ?>
                </div>
            <?php else: ?>
                <div class="bg-light border rounded d-flex align-items-center justify-content-center" style="min-height: 240px;">
                    <span class="text-muted">No images provided</span>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-lg-6">
            <h1 class="h3 mb-2"><?= esc($item['title']) ?></h1>
            <p class="text-muted mb-3">Condition: <strong><?= esc(ucwords(str_replace('-', ' ', $item['condition_grade'] ?? 'used-good'); ?></strong></p>
            <div class="mb-3">
                <span class="badge bg-info text-dark">FMV: <?= number_format($fmv / 100, 2) ?> MYMIGold</span>
                <?php if ($fmv === 0): ?>
                    <small class="d-block text-muted">Insufficient market data. Bidders set the price.</small>
                <?php endif; ?>
            </div>
            <?php if ($reserve > 0): ?>
                <p class="mb-3">Reserve price: <strong><?= number_format($reserve / 100, 2) ?> MYMIGold</strong></p>
            <?php endif; ?>
            <p class="mb-1">Current leading bid:</p>
            <div class="d-flex align-items-baseline gap-2 mb-3">
                <strong class="display-6" id="current-bid"><?= number_format(max($currentBid, $reserve) / 100, 2) ?></strong>
                <span class="text-muted">MYMIGold</span>
            </div>
            <p class="text-muted">Minimum increment: <?= number_format($minIncrement / 100, 2) ?> MYMIGold</p>
            <p class="text-muted">Auction ends <span id="ends-at" data-ends-at="<?= esc($item['ends_at']) ?>"><?= esc(date('M j, Y g:i A', strtotime($item['ends_at']); ?></span></p>
            <div class="alert alert-info py-2 small">Anti-sniping: bids in the final minutes will automatically extend the end time.</div>

            <form id="bid-form" class="mb-3" action="<?= site_url('Auctions/Bid/' . $lotId) ?>" method="post">
                <?= csrf_field() ?>
                <div class="input-group input-group-lg mb-2">
                    <span class="input-group-text">MYMIGold</span>
                    <input type="number" class="form-control" name="amount_cents" id="bid-amount" min="<?= max($currentBid, $reserve) + $minIncrement ?>" step="<?= $minIncrement ?>" value="<?= max($currentBid, $reserve) + $minIncrement ?>">
                </div>
                <small class="text-muted d-block mb-2">Enter amount in cents (1 MYMIGold = 100 cents).</small>
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary flex-grow-1">Place Bid</button>
                    <button type="button" class="btn btn-outline-secondary" id="top-up-btn">Top Up</button>
                </div>
            </form>
            <div id="bid-status" class="small"></div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-lg-7">
            <h2 class="h5">Description</h2>
            <p><?= nl2br(esc($item['description'] ?? 'No description provided.')) ?></p>
        </div>
        <div class="col-lg-5">
            <h2 class="h5">Recent Bids</h2>
            <div id="recent-bids" class="list-group small border rounded overflow-auto" style="max-height: 240px;">
                <?php if (! empty($item['recent_bids'])): ?>
                    <?php foreach ($item['recent_bids'] as $bid): ?>
                        <div class="list-group-item d-flex justify-content-between">
                            <span>Bidder #<?= esc($bid['bidder_id']) ?></span>
                            <span><?= number_format($bid['amount_cents'] / 100, 2) ?> MYMIGold</span>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="list-group-item text-muted">No bids yet.</div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="modal fade" id="topUpModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Top Up MyMIGold</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Select a funding method to add MyMIGold to your auction balance.</p>
                    <form id="topup-form">
                        <?= csrf_field() ?>
                        <div class="mb-3">
                            <label for="topup-amount" class="form-label">Amount (MyMIGold cents)</label>
                            <input type="number" class="form-control" id="topup-amount" name="amount_cents" min="100" step="100" value="1000">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Method</label>
                            <select class="form-select" name="method">
                                <option value="MYMIGOLD">MyMIGold Wallet</option>
                                <option value="BTC">BTC → MyMIGold</option>
                                <option value="ETH">ETH → MyMIGold</option>
                                <option value="CARD">Card Payment</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Top Up</button>
                    </form>
                    <div id="topup-status" class="small mt-2"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
(function() {
    const lotId = <?= $lotId ?>;
    const pollUrl = '<?= site_url('Auctions/Poll/' . $lotId) ?>';
    const bidForm = document.getElementById('bid-form');
    const bidAmountInput = document.getElementById('bid-amount');
    const bidStatus = document.getElementById('bid-status');
    const currentBidEl = document.getElementById('current-bid');
    const endsAtEl = document.getElementById('ends-at');
    const recentBidsEl = document.getElementById('recent-bids');
    const topUpBtn = document.getElementById('top-up-btn');
    const topUpModal = document.getElementById('topUpModal');
    const topUpForm = document.getElementById('topup-form');
    const topUpStatus = document.getElementById('topup-status');

    if (!bidForm || !bidAmountInput) {
        return;
    }

    let pollTimer = null;

    function refreshState(state) {
        if (! state) return;
        if (state.top_bid) {
            currentBidEl.textContent = (state.top_bid.amount_cents / 100).toFixed(2);
            const minIncrement = <?= $minIncrement ?>;
            const nextMin = state.top_bid.amount_cents + minIncrement;
            bidAmountInput.min = nextMin;
            bidAmountInput.step = minIncrement;
            bidAmountInput.value = nextMin;
        }
        if (state.ends_at) {
            endsAtEl.dataset.endsAt = state.ends_at;
            const iso = state.ends_at.replace(' ', 'T');
            endsAtEl.textContent = new Date(iso).toLocaleString();
        }
        if (Array.isArray(state.recent_bids)) {
            recentBidsEl.innerHTML = '';
            if (state.recent_bids.length === 0) {
                recentBidsEl.innerHTML = '<div class="list-group-item text-muted">No bids yet.</div>';
            } else {
                state.recent_bids.forEach(bid => {
                    const row = document.createElement('div');
                    row.className = 'list-group-item d-flex justify-content-between';
                    row.innerHTML = `<span>Bidder #${bid.bidder_id}</span><span>${(bid.amount_cents / 100).toFixed(2)} MYMIGold</span>`;
                    recentBidsEl.appendChild(row);
                });
            }
        }
    }

    async function poll() {
        try {
            const response = await fetch(pollUrl);
            if (! response.ok) return;
            const payload = await response.json();
            if (payload.status === 'success') {
                refreshState(payload.state);
            }
        } catch (error) {
            console.warn('Auction poll failed', error);
        }
    }

    pollTimer = setInterval(poll, 3000);
    poll();

    bidForm.addEventListener('submit', async function (event) {
        event.preventDefault();
        bidStatus.className = 'small';
        bidStatus.textContent = '';
        bidForm.querySelector('button[type="submit"]').disabled = true;

        try {
            const formData = new FormData(bidForm);
            const response = await fetch(bidForm.action, {
                method: 'POST',
                body: formData,
            });
            const payload = await response.json();
            if (payload.status === 'success') {
                bidStatus.className = 'small text-success';
                bidStatus.textContent = 'Bid placed successfully!';
                poll();
            } else {
                bidStatus.className = 'small text-danger';
                bidStatus.textContent = payload.message || 'Bid rejected';
            }
        } catch (error) {
            bidStatus.className = 'small text-danger';
            bidStatus.textContent = 'Unable to submit bid.';
        } finally {
            bidForm.querySelector('button[type="submit"]').disabled = false;
        }
    });

    const bootstrapModal = window.bootstrap ? window.bootstrap.Modal : null;
    if (topUpBtn && topUpModal && bootstrapModal) {
        topUpBtn.addEventListener('click', () => {
            topUpStatus.textContent = '';
            const modal = bootstrapModal.getOrCreateInstance(topUpModal);
            modal.show();
        });

        topUpForm.addEventListener('submit', async (event) => {
            event.preventDefault();
            topUpStatus.className = 'small text-muted';
            topUpStatus.textContent = 'Processing...';
            const formData = new FormData(topUpForm);
            formData.append('user_id', '<?= (int) ($currentUserId ?? 0) ?>');
            formData.append('lot_id', lotId);

            try {
                const response = await fetch('<?= site_url('API/Auctions/topup') ?>', {
                    method: 'POST',
                    body: formData,
                });
                const payload = await response.json();
                if (payload.status === 'success') {
                    topUpStatus.className = 'small text-success';
                    topUpStatus.textContent = 'Top up complete.';
                } else {
                    topUpStatus.className = 'small text-danger';
                    topUpStatus.textContent = payload.message || 'Top up failed.';
                }
            } catch (error) {
                topUpStatus.className = 'small text-danger';
                topUpStatus.textContent = 'Unable to process top up.';
            }
        });
    } else if (topUpBtn) {
        topUpBtn.classList.add('disabled');
        topUpBtn.setAttribute('disabled', 'disabled');
    }
})();
</script>
