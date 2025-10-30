<?php
$nonce = $nonce ?? ['style'=>'','script'=>''];
$market = $market ?? [];
$opts   = $market['options'] ?? [];
?>
<style<?=$nonce['style']?? ''?>>
.odds-pill { font-weight:700; }
</style>

<div class="container py-4">
  <div class="d-flex justify-content-between align-items-start mb-3">
    <div>
      <h2 class="mb-1"><?=esc($market['title'] ?? 'Market')?></h2>
      <div class="text-muted small">Locks: <?=esc($market['lock_at'] ?? 'TBA')?> · Mode: <?=esc($market['currency_mode'] ?? 'GOLD_CENTRIC')?></div>
    </div>
    <a href="<?=site_url('Predictions/Markets')?>" class="btn btn-outline-secondary">Back</a>
  </div>

  <div class="row g-4">
    <div class="col-lg-7">
      <div class="card card-bordered">
        <div class="card-body">
          <h6>Description</h6>
          <p><?=nl2br(esc($market['description'] ?? ''))?></p>

          <h6 class="mt-4">Options</h6>
          <div class="row g-2">
            <?php foreach ($opts as $o): ?>
              <div class="col-6">
                <div class="p-3 border rounded d-flex justify-content-between align-items-center">
                  <div>
                    <div class="fw-bold"><?=esc($o['label'])?></div>
                    <div class="small text-muted">Liquidity: <?=number_format((float)$o['liquidity_gold'],2)?></div>
                  </div>
                  <div class="odds-pill"><?=number_format(((int)$o['odds_bips'])/100,2)?>%</div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-5">
      <div class="card card-bordered">
        <div class="card-body">
          <h6>Place Order</h6>
          <form id="placeOrderForm">
            <input type="hidden" name="market_id" value="<?= (int)($market['id'] ?? 0) ?>">
            <div class="mb-2">
              <label class="form-label">Option</label>
              <select class="form-select" name="option_id" required>
                <?php foreach ($opts as $o): ?>
                  <option value="<?=$o['id']?>"><?=esc($o['label'])?> (<?=number_format(((int)$o['odds_bips'])/100,2)?>%)</option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="mb-2">
              <label class="form-label">Stake Asset</label>
              <select class="form-select" name="stake_asset">
                <?php foreach (['MIMG','BTC','ETH','SOL','DGB'] as $a): ?>
                  <option value="<?=$a?>"><?=$a?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="mb-2">
              <label class="form-label">Stake Amount</label>
              <input class="form-control" type="number" step="0.00000001" name="stake_amount" placeholder="0.00" required>
            </div>
            <div class="mb-2">
              <label class="form-label">Min Odds (optional, %)</label>
              <input class="form-control" type="number" step="0.01" min="0.01" max="99.99" name="min_odds_percent" placeholder="e.g., 48.00">
              <div class="form-text">Protects you if odds worsen before fill.</div>
            </div>
            <button class="btn btn-primary w-100" type="submit">Buy</button>
          </form>
          <div id="orderResult" class="mt-3"></div>
        </div>
      </div>
    </div>
  </div>
</div>

<script<?=$nonce['script']?? ''?>>
document.getElementById('placeOrderForm')?.addEventListener('submit', async (e) => {
  e.preventDefault();
  const f = e.currentTarget;
  const data = Object.fromEntries(new FormData(f).entries());
  const odds = parseFloat(data.min_odds_percent||0);
  if (!isNaN(odds) && odds>0) data['odds_bips'] = Math.round(odds*100);

  data['idempotency_key'] = (crypto?.randomUUID?.() || String(Date.now()));

  const resEl = document.getElementById('orderResult');
  resEl.innerHTML = 'Placing order...';

  try {
    const rsp = await fetch('<?=site_url('API/Predictions/orders/place')?>', {
      method: 'POST', headers: { 'Content-Type':'application/json' },
      body: JSON.stringify(data)
    });
    const json = await rsp.json();
    if (json.status==='success') {
      resEl.innerHTML = '<div class="alert alert-success">Order placed. Expected payout: ' + (json.data.payout_expected) + '</div>';
    } else {
      resEl.innerHTML = '<div class="alert alert-danger">Failed: '+ (json.message||'Unknown error') +'</div>';
    }
  } catch (err) {
    resEl.innerHTML = '<div class="alert alert-danger">Network error.</div>';
  }
});
</script>