<?php
// app/Modules/User/Views/Wallets/types/wallets_block.php
/**
 * Expects: $walletCategory (financial|credit|debt|crypto|investment)
 *          $siteSettings, $cuID
 * Optional: $dom (string) unique DOM prefix; if omitted we derive from $walletCategory
 */
$walletCategory = $walletCategory ?? 'financial';
$dom = preg_replace('~[^a-z0-9_-]+~i', '', ($dom ?? $walletCategory ?? 'wallet'));

$csrfName = csrf_token();
$csrfHash = csrf_hash();

$mapTitle = [
  'financial'  => 'Bank Accounts',
  'credit'     => 'Credit Accounts',
  'debt'       => 'Debt Accounts',
  'crypto'     => 'Crypto Wallets',
  'investment' => 'Investment Accounts',
];
$mapText = [
  'financial'  => 'Connect a bank with Plaid or add manually.',
  'credit'     => 'Connect a credit account with Plaid or add manually.',
  'debt'       => 'Connect a loan/line with Plaid or add manually.',
  'crypto'     => 'Connect MetaMask/Phantom or add manually.',
  'investment' => 'Connect Robinhood or SnapTrade—or add a broker manually.',
];
$elementTitle = $mapTitle[$walletCategory] ?? 'Wallets';
$elementText  = $mapText[$walletCategory]  ?? 'Add or connect a wallet.';

$mapAddEndpoint = [
  'financial'  => 'Wallets/Banking/Add/Account',
  'credit'     => 'Wallets/Credit/Add/Account',
  'debt'       => 'Wallets/Debt/Add/Account',
  'crypto'     => 'Wallets/Crypto/Add/Wallet',
  'investment' => 'Wallets/Investments/Add/Account',
];
$btnID = $mapAddEndpoint[$walletCategory] ?? 'Wallets/Banking/Add/Account';

$mapAddToken = [
  'financial'  => 'addBankAccount',
  'credit'     => 'addCreditAccount',
  'debt'       => 'addDebtAccount',
  'crypto'     => 'addCryptoAccount',
  'investment' => 'addInvestAccount',
];
$btnEndpointToken = $mapAddToken[$walletCategory] ?? 'addBankAccount';

$mapDetailsBase = [
  'financial'  => 'Wallets/Banking/Details/',
  'credit'     => 'Wallets/Credit/Details/',
  'debt'       => 'Wallets/Debt/Details/',
  'crypto'     => 'Wallets/Crypto/Details/',
  'investment' => 'Wallets/Investments/Details/',
];
$mapEditBase = [
  'financial'  => 'Wallets/Banking/Edit/Account/',
  'credit'     => 'Wallets/Credit/Edit/Account/',
  'debt'       => 'Wallets/Debt/Edit/Account/',
  'crypto'     => 'Wallets/Crypto/Edit/Wallet/',
  'investment' => 'Wallets/Investments/Edit/Account/',
];

$mapDeleteType = [
  'financial'  => 'Bank',
  'credit'     => 'Credit',
  'debt'       => 'Debt',
  'crypto'     => 'Crypto',
  'investment' => 'Investments',
];
$deleteType = $mapDeleteType[$walletCategory] ?? 'Bank';
?>

<style <?= $nonce['style'] ?? '' ?>>
  /* .card-dashed { border: 2px dashed var(--bs-border-color); transition: all .15s; }
  .card-dashed:hover { border-color: var(--bs-primary); box-shadow: 0 .75rem 1.5rem rgba(0,0,0,.06); transform: translateY(-2px); } */
  .wallets-block .btn { white-space: nowrap; }
  .provider-chip { border-radius: 999px; padding: .35rem .75rem; display:inline-flex; align-items:center; gap:.5rem; }
  .wallet-pill { font-size: .75rem; padding:.25rem .5rem; border-radius:999px; }
  .skeleton { background: linear-gradient(90deg, #eee 25%, #f6f6f6 37%, #eee 63%); background-size: 400% 100%; animation: shimmer 1.2s infinite; border-radius:.5rem; }
  @keyframes shimmer { 0%{background-position:100% 0} 100%{background-position:-100% 0} }
  .card-dashed { border: 2px dashed #ced4da; }
</style>

<div id="walletSection-<?= esc($dom) ?>"><!-- wrapper used by JS scoping -->

  <!-- Header / toolbar -->
  <div class="d-flex flex-wrap align-items-center justify-content-between mb-3">
    <div class="me-2">
      <h5 class="mb-1"><?= esc($elementTitle) ?></h5>
      <div class="text-muted small"><?= esc($elementText) ?></div>
    </div>

    <div class="d-flex align-items-center gap-2 mt-2 mt-sm-0">
      <?php if (in_array($walletCategory, ['financial','credit','debt'], true) && (int)($siteSettings->integrationOperations ?? 0) === 1): ?>
        <button class="btn btn-outline-primary btn-sm js-plaid-link" id="link-button-<?= esc($dom) ?>" data-bs-toggle="tooltip" data-bs-title="Link via Plaid">
          <i class="icon ni ni-search me-1"></i> Search / Link
        </button>
      <?php endif; ?>

      <?php if ($walletCategory === 'investment'): ?>
        <button class="btn btn-outline-success btn-sm" id="btnConnectRobinhood-<?= esc($dom) ?>" data-bs-toggle="tooltip" data-bs-title="Connect Robinhood">
          <i class="icon ni ni-trend-up me-1"></i> Robinhood
        </button>
        <button class="btn btn-outline-info btn-sm" id="btnConnectSnapTrade-<?= esc($dom) ?>" data-bs-toggle="tooltip" data-bs-title="Connect via SnapTrade">
          <i class="icon ni ni-activity me-1"></i> SnapTrade
        </button>
      <?php elseif ($walletCategory === 'crypto'): ?>
        <button class="btn btn-outline-secondary btn-sm" id="btnConnectMetaMask-<?= esc($dom) ?>" data-bs-toggle="tooltip" data-bs-title="Connect MetaMask">
          <i class="icon ni ni-wallet-fill me-1"></i> MetaMask
        </button>
        <button class="btn btn-outline-secondary btn-sm" id="btnConnectPhantom-<?= esc($dom) ?>" data-bs-toggle="tooltip" data-bs-title="Connect Phantom">
          <i class="icon ni ni-wallet me-1"></i> Phantom
        </button>
      <?php endif; ?>

      <button
        class="btn btn-primary btn-sm dynamicModalLoader"
        data-formtype="Add"
        data-endpoint="<?= esc($btnEndpointToken) ?>"
        data-cuid="<?= esc($cuID) ?>">
        <i class="icon ni ni-plus me-1"></i> Add Manually
      </button>
    </div>
  </div>

  <!-- “Add / Search” helper + provider cards -->
  <div class="row g-3">
    <div class="col-xxl-3 col-lg-4 col-sm-6">
      <div class="card card-dashed h-100">
        <div class="card-body d-flex flex-column justify-content-between">
          <div class="mb-3">
            <div class="d-flex align-items-center mb-2">
              <div class="rounded-circle bg-light d-inline-flex align-items-center justify-content-center me-2" style="width:40px;height:40px;">
                <i class="icon ni ni-wallet"></i>
              </div>
              <h6 class="mb-0"><?= esc($elementTitle) ?></h6>
            </div>
            <p class="text-muted small mb-0"><?= esc($elementText) ?></p>
          </div>
          <div class="h-100 d-flex flex-wrap gap-2">
            <?php if (in_array($walletCategory, ['financial','credit','debt'], true) && (int)($siteSettings->integrationOperations ?? 0) === 1): ?>
              <button class="btn btn-outline-primary btn-sm js-plaid-link" id="link-button-card-<?= esc($dom) ?>">
                <i class="icon ni ni-search me-1"></i> Search / Link
              </button>
            <?php endif; ?>
            <button class="btn btn-outline-secondary btn-sm dynamicModalLoader"
                    data-formtype="Add"
                    data-endpoint="<?= esc($btnEndpointToken) ?>"
                    data-cuid="<?= esc($cuID) ?>">
              <i class="icon ni ni-plus me-1"></i> Add Manually
            </button>
          </div>
        </div>
      </div>
    </div>

    <?php if ($walletCategory === 'investment'): ?>
      <div class="col-xxl-3 col-lg-4 col-sm-6">
        <div class="card card-dashed h-100">
          <div class="card-body d-flex flex-column justify-content-between">
            <div class="mb-3">
              <span class="provider-chip bg-success-subtle text-success" data-bs-toggle="tooltip" data-bs-title="Broker">
                <i class="icon ni ni-trend-up"></i> Robinhood
              </span>
              <p class="text-muted small mt-2 mb-0">Connect your Robinhood brokerage as a managed wallet.</p>
            </div>
            <button class="btn btn-success btn-sm" id="btnConnectRobinhood-<?= esc($dom) ?>">
              <i class="icon ni ni-trend-up me-1"></i> Connect Robinhood
            </button>
          </div>
        </div>
      </div>
      <div class="col-xxl-3 col-lg-4 col-sm-6">
        <div class="card card-dashed h-100">
          <div class="card-body d-flex flex-column justify-content-between">
            <div class="mb-3">
              <span class="provider-chip bg-info-subtle text-info" data-bs-toggle="tooltip" data-bs-title="Aggregator">
                <i class="icon ni ni-activity"></i> SnapTrade
              </span>
              <p class="text-muted small mt-2 mb-0">Aggregate supported broker accounts via SnapTrade.</p>
            </div>
            <button class="btn btn-info btn-sm text-white" id="btnConnectSnapTrade-<?= esc($dom) ?>">
              <i class="icon ni ni-activity me-1"></i> Connect SnapTrade
            </button>
          </div>
        </div>
      </div>
    <?php endif; ?>

    <?php if ($walletCategory === 'crypto'): ?>
      <div class="col-xxl-3 col-lg-4 col-sm-6">
        <div class="card card-dashed h-100">
          <div class="card-body d-flex flex-column justify-content-between">
            <div class="mb-3">
              <span class="provider-chip bg-secondary-subtle text-secondary" data-bs-toggle="tooltip" data-bs-title="EVM Wallet">
                <i class="icon ni ni-wallet-fill"></i> MetaMask
              </span>
              <p class="text-muted small mt-2 mb-0">Connect MetaMask and manage your crypto wallet.</p>
            </div>
            <button class="btn btn-secondary btn-sm" id="btnConnectMetaMask-<?= esc($dom) ?>">
              <i class="icon ni ni-wallet-fill me-1"></i> Connect MetaMask
            </button>
          </div>
        </div>
      </div>
      <div class="col-xxl-3 col-lg-4 col-sm-6">
        <div class="card card-dashed h-100">
          <div class="card-body d-flex flex-column justify-content-between">
            <div class="mb-3">
              <span class="provider-chip bg-secondary-subtle text-secondary" data-bs-toggle="tooltip" data-bs-title="Solana Wallet">
                <i class="icon ni ni-wallet"></i> Phantom
              </span>
              <p class="text-muted small mt-2 mb-0">Connect Phantom wallet for Solana assets.</p>
            </div>
            <button class="btn btn-secondary btn-sm" id="btnConnectPhantom-<?= esc($dom) ?>">
              <i class="icon ni ni-wallet me-1"></i> Connect Phantom
            </button>
          </div>
        </div>
      </div>
    <?php endif; ?>
  </div>

  <!-- Wallets list -->
  <div id="walletsList-<?= esc($dom) ?>" class="row g-3 mt-1">
    <?php for ($i=0; $i<3; $i++): ?>
    <div class="col-xxl-3 col-lg-4 col-sm-6 wallet-skel">
      <div class="card card-bordered">
        <div class="card-body">
          <div class="d-flex align-items-center mb-2">
            <div class="skeleton me-2" style="width:40px;height:40px;"></div>
            <div class="flex-grow-1">
              <div class="skeleton mb-2" style="height:14px;width:70%;"></div>
              <div class="skeleton" style="height:10px;width:40%;"></div>
            </div>
          </div>
          <div class="skeleton" style="height:28px;width:55%;"></div>
        </div>
      </div>
    </div>
    <?php endfor; ?>
  </div>

  <!-- Modals (investment) -->
  <div class="modal fade" id="modalLinkRobinhood-<?= esc($dom) ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Link Robinhood</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="formRobinhoodLink-<?= esc($dom) ?>">
            <input type="hidden" name="<?= esc($csrfName) ?>" value="<?= esc($csrfHash) ?>">
            <input type="hidden" name="label" value="Robinhood" />
            <div class="mb-3">
              <label class="form-label">API Key</label>
              <input type="text" class="form-control" name="api_key" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Private Key (Base64)</label>
              <textarea class="form-control" name="private_key_b64" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100">
              <span class="spinner-border spinner-border-sm me-2 d-none" id="rhSpin-<?= esc($dom) ?>"></span>
              Link Account
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalLinkSnapTrade-<?= esc($dom) ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Link SnapTrade</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="formSnapTradeLink-<?= esc($dom) ?>">
            <input type="hidden" name="<?= esc($csrfName) ?>" value="<?= esc($csrfHash) ?>">
            <div class="mb-3">
              <label class="form-label">Label (optional)</label>
              <input type="text" class="form-control" name="label" placeholder="SnapTrade">
            </div>
            <div class="mb-3">
              <label class="form-label">SnapTrade User ID (optional)</label>
              <input type="text" class="form-control" name="snaptrade_user_id" placeholder="">
            </div>
            <div class="d-grid gap-2">
              <button type="submit" class="btn btn-primary">
                <span class="spinner-border spinner-border-sm me-2 d-none" id="stSpin1-<?= esc($dom) ?>"></span>
                Link / Create
              </button>
              <button type="button" class="btn btn-outline-primary" id="btnSnapTradeConnect-<?= esc($dom) ?>">
                <span class="spinner-border spinner-border-sm me-2 d-none" id="stSpin2-<?= esc($dom) ?>"></span>
                Get Connect URL
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Toasts -->
  <div class="position-fixed bottom-0 end-0 p-3" style="z-index:1080">
    <div id="walletToast-<?= esc($dom) ?>" class="toast align-items-center text-bg-dark border-0" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="d-flex">
        <div class="toast-body" id="walletToastBody-<?= esc($dom) ?>">Action completed.</div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
    </div>
  </div>

</div><!-- /#walletSection-<?= esc($dom) ?> -->
<script <?= $nonce['script'] ?? '' ?>>
window.addEventListener('load', function(){  // <-- wait until ALL scripts (Bootstrap, etc.) are ready
  // --- Bootstrap safety helpers ---
  function hasBS(){ return !!(window.bootstrap && bootstrap.Modal && bootstrap.Toast && bootstrap.Tooltip); }
  function safeTooltip(el){ try { return hasBS() ? new bootstrap.Tooltip(el) : null; } catch(_) { return null; } }
  function safeModal(el){ try { return hasBS() ? new bootstrap.Modal(el) : { show(){}, hide(){} }; } catch(_) { return { show(){}, hide(){} }; } }
  function safeToast(el, opts){ try { return hasBS() ? new bootstrap.Toast(el, opts) : { show(){}, hide(){} }; } catch(_) { return { show(){}, hide(){} }; } }

  const CATEGORY = "<?=esc($walletCategory)?>";
  const DOM      = "<?=esc($dom)?>";

  function byId(id){ return document.getElementById(id+'-'+DOM); }

  // Scope tooltips to this section only
  const section = document.getElementById('walletSection-'+DOM);
  if (section) {
    [].slice.call(section.querySelectorAll('[data-bs-toggle="tooltip"]')).forEach(el => safeTooltip(el));
  }

  // site_url helper that strips trailing slashes AND any /index.php that might still be present
  function siteUrl(path){
    const base = "<?=site_url()?>"
      .replace(/\/+$/,'')
      .replace(/\/index\.php$/i,'');                         // <-- remove index.php if present
    return base + '/' + String(path).replace(/^\/+/, '');
  }
  function getApiUrl(){
    return siteUrl('API/Wallets') + '?category=' + encodeURIComponent(CATEGORY);
  }

  function cardIcon(provider){
    const p = (provider || '').toLowerCase();
    if (p === 'plaid') return 'ni ni-globe';
    if (p === 'metamask') return 'ni ni-wallet-fill';
    if (p === 'phantom') return 'ni ni-wallet';
    if (p === 'robinhood') return 'ni ni-trend-up';
    if (p === 'snaptrade') return 'ni ni-activity';
    return 'ni ni-wallet';
  }
  function stripCommas(x){ return typeof x === 'string' ? x.replace(/,/g,'') : x; }
  function deriveAmount(credentials){
    try {
      const c = typeof credentials === 'string' ? JSON.parse(credentials) : (credentials || {});
      if (c.balance) return Number(c.balance);
      if (c.current) return Number(c.current);
      if (c.available) return Number(c.available);
      if (c.accounts && c.accounts[0]?.balances?.current) return Number(c.accounts[0].balances.current);
    } catch(e) {}
    return 0;
  }
  function getAmount(w){
    if (w.amount !== undefined && w.amount !== null && w.amount !== '') {
      const n = Number(stripCommas(w.amount));
      if (!isNaN(n)) return n;
    }
    if (w.balance !== undefined || w.current !== undefined || w.available !== undefined){
      const n = Number(stripCommas(w.balance ?? w.current ?? w.available));
      if (!isNaN(n)) return n;
    }
    return deriveAmount(w.credentials);
  }
  function detailsUrlFor(id){
    const map = {
      'financial'  : '<?=esc($mapDetailsBase['financial'])?>',
      'credit'     : '<?=esc($mapDetailsBase['credit'])?>',
      'debt'       : '<?=esc($mapDetailsBase['debt'])?>',
      'crypto'     : '<?=esc($mapDetailsBase['crypto'])?>',
      'investment' : '<?=esc($mapDetailsBase['investment'])?>',
    };
    return siteUrl((map[CATEGORY] || 'Wallets/Banking/Details/') + id);
  }
  function walletEndpointTokenForCategory(){
    const map = {
      financial:  'BankAccount',
      credit:     'CreditAccount',
      debt:       'DebtAccount',
      crypto:     'CryptoAccount',
      investment: 'InvestAccount',
    };
    return map[CATEGORY] || 'BankAccount';
  }
  function fmtUSD(n){
    if (n === null || n === undefined || isNaN(n)) n = 0;
    const neg = Number(n) < 0;
    const v   = Math.abs(Number(n)).toLocaleString(undefined,{ minimumFractionDigits:2, maximumFractionDigits:2 });
    return neg ? `-$${v}` : `$${v}`;
  }
  function toast(msg){
    const el = byId('walletToast');
    document.getElementById('walletToastBody-'+DOM).textContent = msg || 'Done';
    safeToast(el, { delay: 2000 }).show();
  }

  function renderWalletCard(w){
    const id = w.id;
    const displayNameRaw = w.nickname || w.label || w.account_name || w.name || w.provider || 'Wallet';
    const displayName = String(displayNameRaw).replace(/</g, '&lt;');
    const provider = (w.provider || '').toLowerCase();
    const isLiability = /credit|debt|loan|card/i.test(w.wallet_type || '');
    const amountRaw   = getAmount(w);
    const amount      = isLiability ? -Math.abs(amountRaw) : Math.abs(amountRaw);
    const amountClass = amount < 0 ? 'text-danger' : '';
    const iconCls  = cardIcon(provider);
    const details  = detailsUrlFor(id);
    const updated  = w.updated_on ? new Date(w.updated_on).toLocaleString() : '';

    return `
<div class="col-xxl-3 col-lg-4 col-sm-6" data-wallet-id="${id}">
  <div class="card card-bordered h-100">
    <div class="card-body d-flex flex-column">
      <div class="d-flex align-items-center mb-2">
        <div class="rounded-circle bg-light d-inline-flex align-items-center justify-content-center me-2" style="width:40px;height:40px;">
          <i class="icon ${iconCls}" style="width:40px; padding: 1em"></i>
        </div>
        <div class="flex-grow-1">
          <h6 class="mb-0">${displayName}</h6>
          <div class="text-muted small text-truncate">${provider ? provider.toUpperCase() : '—'} · <span class="text-nowrap">Updated: ${updated || '—'}</span></div>
        </div>
      </div>
      <div class="mt-1">
        <div class="d-flex align-items-end justify-content-between">
          <div>
            <div class="fs-5 fw-semibold ${amountClass}">${fmtUSD(amount)}</div>
            <div class="text-muted small">Estimated Balance</div>
          </div>
          <span class="wallet-pill bg-${w.status==='linked'?'success':'secondary'}-subtle text-${w.status==='linked'?'success':'secondary'}">${w.status ?? 'linked'}</span>
        </div>
        <div class="h-50 d-flex flex-wrap gap-2 mt-3">
          <a href="${details}" class="btn btn-outline-primary btn-sm"><i class="icon ni ni-list-index me-1"></i> Details</a>
          <button class="btn btn-outline-secondary btn-sm dynamicModalLoader" data-formtype="Edit" data-endpoint="edit${walletEndpointTokenForCategory()}" data-accountid="${id}">
            <i class="icon ni ni-pen me-1"></i> Edit
          </button>
          <a href="#" class="btn btn-outline-danger btn-sm delete-wallet-button" data-id="${id}" data-name="${displayName}" data-type="<?=esc($deleteType)?>">
            <i class="icon ni ni-minus me-1"></i> Delete
          </a>
        </div>
      </div>
    </div>
  </div>
</div>`;
  }

  async function loadWallets(){
    const apiUrl = getApiUrl();
    const res = await fetch(apiUrl, { credentials: 'same-origin', headers: { 'X-Requested-With': 'XMLHttpRequest' } });
    if (res.status === 401) {
      document.querySelector('#walletsList-'+DOM)?.querySelectorAll('.wallet-skel')?.forEach(el => el.remove());
      document.getElementById('walletsList-'+DOM).innerHTML = `
        <div class="col-12">
          <div class="alert alert-warning d-flex align-items-center" role="alert">
            <i class="icon ni ni-alert me-2"></i>
            <div>Your session expired. Please <a class="ms-1" href="<?=esc(site_url('login'))?>">sign in</a> to view wallets.</div>
          </div>
        </div>`;
      return;
    }
    const json = await res.json().catch(()=>({}));
    document.querySelectorAll('#walletsList-'+DOM+' .wallet-skel').forEach(el => el.remove());

    if (json.status === 'success') {
      const rows = json.data || [];
      if (!rows.length) {
        byId('walletsList').innerHTML = `
          <div class="col-12">
            <div class="alert alert-soft-info d-flex align-items-center" role="alert">
              <i class="icon ni ni-info me-2"></i>
              <div>No wallets linked yet. Use the buttons above to connect or add one.</div>
            </div>
          </div>`;
        return;
      }
      byId('walletsList').innerHTML = rows.map(renderWalletCard).join('');
    } else {
      byId('walletsList').innerHTML = `
        <div class="col-12">
          <div class="alert alert-danger d-flex align-items-center" role="alert">
            <i class="icon ni ni-alert me-2"></i>
            <div>Failed to load wallets.</div>
          </div>
        </div>`;
    }
  }

  async function refreshWalletCard(targetId){
    const wrap = document.getElementById('walletsList-'+DOM);
    if (!wrap) return;
    const res  = await fetch(getApiUrl(), { credentials: 'same-origin', headers: { 'X-Requested-With': 'XMLHttpRequest' } });
    const json = await res.json().catch(()=>({}));
    if (json?.status !== 'success') return;

    const rows = json.data || [];
    const row  = rows.find(r => Number(r.id) === Number(targetId));
    if (!row) return;

    const html = renderWalletCard(row);
    const existing = wrap.querySelector(`[data-wallet-id="${targetId}"]`);
    if (existing) existing.outerHTML = html; else wrap.insertAdjacentHTML('afterbegin', html);
    toast('Wallet updated.');
  }

  window.addEventListener('wallet:updated', (e)=>{ const id = Number(e.detail?.id); if (id) refreshWalletCard(id); });

  // --- Investment & SnapTrade forms (unchanged logic) ---
  byId('btnConnectRobinhood')?.addEventListener('click', ()=> safeModal(byId('modalLinkRobinhood')).show());
  byId('btnConnectSnapTrade')?.addEventListener('click', ()=> safeModal(byId('modalLinkSnapTrade')).show());

  byId('formRobinhoodLink')?.addEventListener('submit', async (e)=>{
    e.preventDefault();
    byId('rhSpin')?.classList.remove('d-none');
    const fd = new FormData(e.target);
    const res = await fetch(siteUrl('API/Wallets/Link-Robinhood'), {method:'POST', body:fd, credentials:'include'});
    const j = await res.json();
    byId('rhSpin')?.classList.add('d-none');
    if (j.status === 'success') {
      if (hasBS()) bootstrap.Modal.getInstance(byId('modalLinkRobinhood'))?.hide();
      toast('Robinhood linked.'); loadWallets();
    } else toast(j.message || 'Failed to link Robinhood');
  });

  byId('formSnapTradeLink')?.addEventListener('submit', async (e)=>{
    e.preventDefault();
    byId('stSpin1')?.classList.remove('d-none');
    const fd = new FormData(e.target);
    const res = await fetch(siteUrl('API/Wallets/Link-Snaptrade'), {method:'POST', body:fd, credentials:'include'});
    const j = await res.json();
    byId('stSpin1')?.classList.add('d-none');
    if (j.status === 'success') {
      if (hasBS()) bootstrap.Modal.getInstance(byId('modalLinkSnapTrade'))?.hide();
      toast('SnapTrade linked.'); loadWallets();
    } else toast(j.message || 'Failed to link SnapTrade');
  });

  byId('btnSnapTradeConnect')?.addEventListener('click', async ()=>{
    byId('stSpin2')?.classList.remove('d-none');
    const form = byId('formSnapTradeLink'); const fd = new FormData(form);
    const res = await fetch(siteUrl('API/Wallets/Snaptrade/Connect-URL'), {method:'POST', body:fd, credentials:'include'});
    const j = await res.json();
    byId('stSpin2')?.classList.add('d-none');
    if (j.status === 'success' && j.connect_url) window.location = j.connect_url;
    else toast(j.message || 'Failed to get connect URL');
  });

  // Crypto placeholders
  byId('btnConnectMetaMask')?.addEventListener('click', ()=> toast('Launch MetaMask connect then POST API/Wallets/Create.'));
  byId('btnConnectPhantom')?.addEventListener('click', ()=> toast('Launch Phantom connect then POST API/Wallets/Create.'));

  // ---- CSRF helpers (unchanged, but kept) ----
  const CSRF_FIELD = "<?= esc($csrfName) ?>";
  let   csrfValue  = "<?= esc($csrfHash) ?>";
  const FALLBACK_CSRF = "<?= esc($csrfHash) ?>";
  const CSRF_COOKIES = [CSRF_FIELD, "csrf_cookie_name", "XSRF-TOKEN"];

  function updateCsrfFromResponse(res, json){
    const hdr = res.headers.get('X-CSRF-TOKEN');
    if (hdr && hdr.length > 0) { csrfValue = hdr; }
    else if (json && json.csrf && json.csrf.hash) { csrfValue = json.csrf.hash; }
  }
  function readCookie(name){
    const m = document.cookie.match(new RegExp('(?:^|; )' + name.replace(/([$?*|{}\(\)\[\]\\\/\+^])/g,'\\$1') + '=([^;]*)'));
    return m ? decodeURIComponent(m[1]) : null;
  }
  function currentCsrfValue(){
    for (const c of CSRF_COOKIES) { const v = readCookie(c); if (v) return v; }
    return FALLBACK_CSRF;
  }
  function buildFormBody(obj){
    const p = new URLSearchParams();
    for (const k in obj) if (Object.hasOwn(obj,k)) p.append(k, obj[k]);
    return p.toString();
  }

  // Delete -> remove single card
  window.addEventListener('wallet:deleted', (e)=>{
    const id = Number(e.detail?.id);
    const wrap = document.getElementById('walletsList-<?=esc($dom)?>');
    if (!id || !wrap) return;
    const node = wrap.querySelector(`[data-wallet-id="${id}"]`);
    if (node) node.remove();
  });

  document.getElementById('walletsList-<?=esc($dom)?>')?.addEventListener('click', async (e) => {
    const btn = e.target.closest('.delete-wallet-button'); if (!btn) return;
    e.preventDefault();
    const id = btn.dataset.id, name = btn.dataset.name || 'this wallet', type = btn.dataset.type || 'Bank';
    if (!id) return;
    if (!window.confirm(`Delete ${name}? This will mark it deleted.`)) return;

    const url  = siteUrl("Wallets/Delete/" + encodeURIComponent(type) + "/" + encodeURIComponent(id));
    const body = buildFormBody({ [CSRF_FIELD]: currentCsrfValue() });

    try {
      const res = await fetch(url, {
        method: 'POST',
        credentials: 'same-origin',
        headers: {
          'X-Requested-With': 'XMLHttpRequest',
          'X-CSRF-TOKEN': csrfValue,
          'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
        },
        body
      });
      const j = await res.json().catch(()=>({}));
      updateCsrfFromResponse(res, j);

      if (res.ok && j.status === 'success') {
        window.dispatchEvent(new CustomEvent('wallet:deleted', { detail: { id: Number(id) } }));
        const t = byId('walletToast'); safeToast(t, { delay: 1500 }).show();
      } else {
        alert(j.message || 'Delete failed');
      }
    } catch {
      alert('Network error deleting wallet.');
    }
  });

  // ---- Plaid Link ----
  async function ensurePlaidLinkLoaded(){
    if (window.Plaid && window.Plaid.create) return true;
    await new Promise((resolve, reject) => {
      const s = document.createElement('script');
      s.src = 'https://cdn.plaid.com/link/v2/stable/link-initialize.js';
      s.async = true;
      s.onload = resolve; s.onerror = reject;
      document.head.appendChild(s);
    });
    return !!(window.Plaid && window.Plaid.create);
  }

  async function startPlaidLink(){
    const res = await fetch(siteUrl('API/Wallets/Plaid/Link-Token'), {
      method: 'GET', credentials: 'same-origin', headers: { 'X-Requested-With': 'XMLHttpRequest' }
    });
    const j = await res.json().catch(()=>({}));
    updateCsrfFromResponse(res, j);
    if (!res.ok || j.status !== 'success' || !j.link_token) { toast(j.message || 'Could not start Plaid.'); return; }

    const ok = await ensurePlaidLinkLoaded(); if (!ok) { toast('Plaid script failed to load.'); return; }

    const handler = Plaid.create({
      token: j.link_token,
      onSuccess: async (public_token, metadata) => {
        try {
          const body = new URLSearchParams();
          body.append(CSRF_FIELD, csrfValue);
          body.append('public_token', public_token);
          if (metadata) body.append('metadata', JSON.stringify(metadata));

          const res2 = await fetch(siteUrl('API/Wallets/Plaid/Exchange'), {
            method: 'POST',
            credentials: 'same-origin',
            headers: {
              'X-Requested-With': 'XMLHttpRequest',
              'X-CSRF-TOKEN': csrfValue,
              'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
            },
            body: body.toString()
          });
          const j2 = await res2.json().catch(()=>({}));
          if (res2.ok && j2.status === 'success') { toast('Accounts linked.'); loadWallets(); }
          else { toast(j2.message || 'Linking failed.'); }
        } catch { toast('Network error during linking.'); }
      },
      onExit: (err) => { if (err) toast(err.display_message || err.error_message || 'Plaid exited.'); }
    });
    handler.open();
  }

  if (section) {
    section.querySelectorAll(`#link-button-${DOM}, #link-button-card-${DOM}`)
      .forEach(btn => btn.addEventListener('click', (e) => { e.preventDefault(); startPlaidLink(); }));
  }

  // Initial load AFTER everything is ready
  loadWallets();
});
</script>
