<?php
/** @var string $walletCategory */
/** expects: $siteSettings, $cuID, $btnSizing (optional) */
$walletCategory = $walletCategory ?? 'financial';
$btnSizing      = $btnSizing ?? 'pr-1 mr-0';

$csrfName = csrf_token();
$csrfHash = csrf_hash();

/**
 * Title / description shown on the dashed “Add” card
 */
$mapTitle = [
  'financial'  => 'Bank Accounts',
  'credit'     => 'Credit Accounts',
  'debt'       => 'Debt Accounts',
  'crypto'     => 'Crypto Wallets',
  'investment' => 'Investment Accounts',
];
$mapText = [
  'financial'  => 'Link a bank via Plaid or add a bank account manually.',
  'credit'     => 'Link a credit account via Plaid or add it manually.',
  'debt'       => 'Link a loan/line via Plaid or add it manually.',
  'crypto'     => 'Connect a crypto wallet (MetaMask/Phantom) or add manually.',
  'investment' => 'Connect Robinhood/SnapTrade or add a broker manually.',
];
$elementTitle = $mapTitle[$walletCategory] ?? 'Wallets';
$elementText  = $mapText[$walletCategory]  ?? 'Add or connect a wallet.';

/**
 * Endpoints for your dynamicModalLoader (existing UI)
 */
$mapAddEndpoint = [
  'financial'  => 'Wallets/Banking/Add/Account',
  'credit'     => 'Wallets/Credit/Add/Account',
  'debt'       => 'Wallets/Debt/Add/Account',
  'crypto'     => 'Wallets/Crypto/Add/Wallet',
  'investment' => 'Wallets/Investments/Add/Account',
];
$btnID = $mapAddEndpoint[$walletCategory] ?? 'Wallets/Banking/Add/Account';

/**
 * Details/Edit routes (existing UI)
 */
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

/**
 * Delete modal “type” label your openDeleteModal expects
 */
$mapDeleteType = [
  'financial'  => 'Bank',
  'credit'     => 'Credit',
  'debt'       => 'Debt',
  'crypto'     => 'Crypto',
  'investment' => 'Investments',
];
$deleteType = $mapDeleteType[$walletCategory] ?? 'Bank';
?>

<!-- ===== Add / Search Card (matches your legacy style) ===== -->
<div class="col-xxl-3 col-lg-4 col-sm-6 mt-3">
  <div class="card card-bordered dashed h-100">
    <div class="nk-wgw-add">
      <div class="nk-wgw-inner">
        <h6 class="title pt-4"><?= esc($elementTitle) ?></h6>
        <span class="sub-text"><?= esc($elementText) ?></span>
      </div>
      <div class="nk-wgw-actions">
        <ul class="vertical-divider">
          <?php if (in_array($walletCategory, ['financial','credit','debt'], true) && (int)($siteSettings->integrationOperations ?? 0) === 1): ?>
          <li class="<?= esc($btnSizing) ?>">
            <button class="btn" id="link-button">
              <i class="icon ni ni-search"></i>
              <span style="padding-top:2px;padding-left:5px;">Search</span>
            </button>
          </li>
          <?php endif; ?>
          <li class="<?= esc($btnSizing) ?>">
            <button class="btn dynamicModalLoader"
                    data-formtype="Add"
                    data-endpoint="<?= esc($btnID) ?>"
                    data-cuid="<?= esc($cuID) ?>">
              <i class="icon ni ni-plus"></i>
              <span style="padding-top:2px;padding-left:5px;">Manually Add</span>
            </button>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>

<?php if ($walletCategory === 'investment'): ?>
  <!-- Robinhood Add Card -->
  <div class="col-xxl-3 col-lg-4 col-sm-6 mt-3">
    <div class="card card-bordered dashed h-100">
      <div class="nk-wgw-add">
        <div class="nk-wgw-inner">
          <h6 class="title pt-4">Robinhood</h6>
          <span class="sub-text">Connect your Robinhood brokerage as a managed wallet.</span>
        </div>
        <div class="nk-wgw-actions">
          <ul class="vertical-divider">
            <li class="<?= esc($btnSizing) ?>">
              <button class="btn" id="btnConnectRobinhood">
                <i class="icon ni ni-trend-up"></i>
                <span style="padding-top:2px;padding-left:5px;">Connect Robinhood</span>
              </button>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- SnapTrade Add Card -->
  <div class="col-xxl-3 col-lg-4 col-sm-6 mt-3">
    <div class="card card-bordered dashed h-100">
      <div class="nk-wgw-add">
        <div class="nk-wgw-inner">
          <h6 class="title pt-4">SnapTrade</h6>
          <span class="sub-text">Aggregate supported broker accounts via SnapTrade.</span>
        </div>
        <div class="nk-wgw-actions">
          <ul class="vertical-divider">
            <li class="<?= esc($btnSizing) ?>">
              <button class="btn" id="btnConnectSnapTrade">
                <i class="icon ni ni-activity"></i>
                <span style="padding-top:2px;padding-left:5px;">Connect SnapTrade</span>
              </button>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>

<?php if ($walletCategory === 'crypto'): ?>
  <!-- MetaMask Add Card -->
  <div class="col-xxl-3 col-lg-4 col-sm-6 mt-3">
    <div class="card card-bordered dashed h-100">
      <div class="nk-wgw-add">
        <div class="nk-wgw-inner">
          <h6 class="title pt-4">MetaMask</h6>
          <span class="sub-text">Connect MetaMask and manage your crypto wallet.</span>
        </div>
        <div class="nk-wgw-actions">
          <ul class="vertical-divider">
            <li class="<?= esc($btnSizing) ?>">
              <button class="btn" id="btnConnectMetaMask">
                <i class="icon ni ni-wallet-fill"></i>
                <span style="padding-top:2px;padding-left:5px;">Connect MetaMask</span>
              </button>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- Phantom Add Card -->
  <div class="col-xxl-3 col-lg-4 col-sm-6 mt-3">
    <div class="card card-bordered dashed h-100">
      <div class="nk-wgw-add">
        <div class="nk-wgw-inner">
          <h6 class="title pt-4">Phantom</h6>
          <span class="sub-text">Connect Phantom wallet for Solana-based assets.</span>
        </div>
        <div class="nk-wgw-actions">
          <ul class="vertical-divider">
            <li class="<?= esc($btnSizing) ?>">
              <button class="btn" id="btnConnectPhantom">
                <i class="icon ni ni-wallet"></i>
                <span style="padding-top:2px;padding-left:5px;">Connect Phantom</span>
              </button>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
<?php endif; ?>

<!-- ===== Wallet Listing (JS will populate) ===== -->
<div id="walletsList" class="row"></div>

<!-- ===== Modals for investment providers ===== -->
<div class="modal fade" id="modalLinkRobinhood" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header"><h5 class="modal-title">Link Robinhood</h5></div>
      <div class="modal-body">
        <form id="formRobinhoodLink">
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
          <button type="submit" class="btn btn-primary w-100">Link Account</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalLinkSnapTrade" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header"><h5 class="modal-title">Link SnapTrade</h5></div>
      <div class="modal-body">
        <form id="formSnapTradeLink">
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
            <button type="submit" class="btn btn-primary">Link or Create</button>
            <button type="button" class="btn btn-outline-primary" id="btnSnapTradeConnect">Get Connect URL</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script <?= $nonce['script'] ?? '' ?>>
(function(){
  const CATEGORY   = "<?= esc($walletCategory) ?>";
  const CSRF_NAME  = "<?= esc($csrfName) ?>";
  const CSRF_HASH  = "<?= esc($csrfHash) ?>";
  const listWrap   = document.getElementById('walletsList');

  function siteUrl(path){ return "<?= site_url() ?>".replace(/\/+$/,'') + '/' + String(path).replace(/^\/+/,''); }

  function fmtUSD(n){
    if (n === null || n === undefined || isNaN(n)) n = 0;
    const v = Number(n);
    return '$' + v.toLocaleString(undefined, {minimumFractionDigits:2, maximumFractionDigits:2});
  }

  function deriveAmount(credentials){
    // Try common shapes from Plaid or custom JSON
    try {
      const c = typeof credentials === 'string' ? JSON.parse(credentials) : (credentials || {});
      if (c.balance) return Number(c.balance);
      if (c.current) return Number(c.current);
      if (c.available) return Number(c.available);
      if (c.accounts && c.accounts[0] && c.accounts[0].balances && c.accounts[0].balances.current) {
        return Number(c.accounts[0].balances.current);
      }
    } catch(e) {}
    return 0;
  }

  function detailsUrlFor(id){
    const map = {
      'financial'  : '<?= esc($mapDetailsBase['financial']) ?>',
      'credit'     : '<?= esc($mapDetailsBase['credit']) ?>',
      'debt'       : '<?= esc($mapDetailsBase['debt']) ?>',
      'crypto'     : '<?= esc($mapDetailsBase['crypto']) ?>',
      'investment' : '<?= esc($mapDetailsBase['investment']) ?>',
    };
    return siteUrl((map[CATEGORY] || 'Wallets/Banking/Details/') + id);
  }

  function editEndpointFor(id){
    const map = {
      'financial'  : '<?= esc($mapEditBase['financial']) ?>',
      'credit'     : '<?= esc($mapEditBase['credit']) ?>',
      'debt'       : '<?= esc($mapEditBase['debt']) ?>',
      'crypto'     : '<?= esc($mapEditBase['crypto']) ?>',
      'investment' : '<?= esc($mapEditBase['investment']) ?>',
    };
    return (map[CATEGORY] || 'Wallets/Banking/Edit/Account/') + id;
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

  function renderWalletCard(w){
    const id       = w.id;
    const label    = (w.label || w.provider || 'Wallet').replace(/</g,'&lt;');
    const provider = (w.provider || '').toLowerCase();
    const amount   = deriveAmount(w.credentials);
    const iconCls  = cardIcon(provider);
    const details  = detailsUrlFor(id);
    const editPath = editEndpointFor(id);

    return `
<div class="col-xxl-3 col-lg-4 col-sm-6 mt-3">
  <div class="card card-bordered">
    <div class="nk-wgw">
      <div class="nk-wgw-inner">
        <a class="nk-wgw-name" href="${details}">
          <div class="nk-wgw-icon is-default"><i class="icon ${iconCls}"></i></div>
          <h5 class="nk-wgw-title title">${label}</h5>
        </a>
        <div class="nk-wgw-balance">
          <div class="amount">${fmtUSD(amount)}<span class="currency currency-usd">USD</span></div>
          <div class="amount-sm"><span class="currency currency-usd">USD</span></div>
        </div>
      </div>
      <div class="nk-wgw-actions">
        <ul class="vertical-divider">
          <li class="<?= esc($btnSizing) ?>">
            <a href="${details}"><i class="icon ni ni-list-index mr-1"></i> <span>Details</span></a>
          </li>
          <li class="<?= esc($btnSizing) ?>">
            <button class="btn dynamicModalLoader" data-formtype="Edit" data-endpoint="${editPath}" data-accountid="${id}">
              <i class="icon ni ni-pen"></i> <span style="padding-top:2px;padding-left:5px;">Edit</span>
            </button>
          </li>
          <li class="<?= esc($btnSizing) ?>">
            <a href="#" class="delete-wallet-button"
               data-id="${id}"
               data-name="${label}"
               data-type="<?= esc($deleteType) ?>"
               data-bs-toggle="modal" data-bs-target="#deleteWalletModal"
               onclick="openDeleteModal(event)">
               <i class="icon ni ni-minus mr-1"></i> <span>Delete</span>
            </a>
          </li>
        </ul>
      </div>
      <div class="nk-wgw-more dropdown">
        <a href="#" class="btn btn-icon btn-trigger" data-bs-toggle="dropdown">
          <i class="icon ni ni-more-h full-width"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-xs dropdown-menu-right">
          <ul class="link-list-plain sm">
            <li><a href="${details}">Details</a></li>
            <li><a href="#" class="dynamicModalLoader" data-formtype="Edit" data-endpoint="${editPath}" data-accountid="${id}">Edit</a></li>
            <li><a href="#" class="delete-wallet-button"
                   data-id="${id}" data-name="${label}" data-type="<?= esc($deleteType) ?>"
                   data-bs-toggle="modal" data-bs-target="#deleteWalletModal"
                   onclick="openDeleteModal(event)">Delete</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>`;
  }

  async function loadWallets(){
    listWrap.innerHTML = '';
    const res = await fetch(siteUrl('API/Wallets'), {credentials:'include'});
    const json = await res.json();
    if (json.status === 'success') {
      const rows = (json.data || []).filter(w => (w.category || '').toLowerCase() === CATEGORY);
      if (!rows.length) {
        listWrap.innerHTML = '<div class="col-12 mt-3"><div class="alert alert-soft-info">No wallets linked yet.</div></div>';
        return;
      }
      listWrap.innerHTML = rows.map(renderWalletCard).join('');
    } else {
      listWrap.innerHTML = '<div class="col-12 mt-3"><div class="alert alert-danger">Failed to load wallets.</div></div>';
    }
  }

  // ===== Investment modals wiring
  function showModal(id){ const m = new bootstrap.Modal(document.getElementById(id)); m.show(); }
  document.getElementById('btnConnectRobinhood')?.addEventListener('click', ()=> showModal('modalLinkRobinhood'));
  document.getElementById('btnConnectSnapTrade')?.addEventListener('click', ()=> showModal('modalLinkSnapTrade'));

  document.getElementById('formRobinhoodLink')?.addEventListener('submit', async (e)=>{
    e.preventDefault();
    const fd = new FormData(e.target);
    const res = await fetch(siteUrl('API/Wallets/Link-Robinhood'), {method:'POST', body:fd, credentials:'include'});
    const j = await res.json();
    if (j.status === 'success') {
      bootstrap.Modal.getInstance(document.getElementById('modalLinkRobinhood')).hide();
      loadWallets();
    } else alert(j.message || 'Failed to link Robinhood');
  });

  document.getElementById('formSnapTradeLink')?.addEventListener('submit', async (e)=>{
    e.preventDefault();
    const fd = new FormData(e.target);
    const res = await fetch(siteUrl('API/Wallets/Link-Snaptrade'), {method:'POST', body:fd, credentials:'include'});
    const j = await res.json();
    if (j.status === 'success') {
      bootstrap.Modal.getInstance(document.getElementById('modalLinkSnapTrade')).hide();
      loadWallets();
    } else alert(j.message || 'Failed to link SnapTrade');
  });

  document.getElementById('btnSnapTradeConnect')?.addEventListener('click', async ()=>{
    const form = document.getElementById('formSnapTradeLink');
    const fd = new FormData(form);
    const res = await fetch(siteUrl('API/Wallets/Snaptrade/Connect-URL'), {method:'POST', body:fd, credentials:'include'});
    const j = await res.json();
    if (j.status === 'success' && j.connect_url) window.location = j.connect_url;
    else alert(j.message || 'Failed to get connect URL');
  });

  // ===== Crypto buttons (hooks only; wire to your existing flows)
  document.getElementById('btnConnectMetaMask')?.addEventListener('click', ()=>{
    // TODO: your MetaMask connect → then POST API/Wallets/Create with provider=metamask, category=crypto
    alert('Launch MetaMask connect (then call API/Wallets/Create).');
  });
  document.getElementById('btnConnectPhantom')?.addEventListener('click', ()=>{
    // TODO: your Phantom connect → then POST API/Wallets/Create with provider=phantom, category=crypto
    alert('Launch Phantom connect (then call API/Wallets/Create).');
  });

  // Initial load
  loadWallets();
})();
</script>
