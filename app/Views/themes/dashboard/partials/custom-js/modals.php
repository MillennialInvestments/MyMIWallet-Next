<?php
$subViewData = is_array($subViewData ?? null) ? $subViewData : [];
?>
<script <?= $nonce['script'] ?? '' ?>>
// Dashboard modals are rendered inside .nk-wrap, which forms its own stacking
// context, so Bootstrap's backdrop (appended to <body>) covered them: users saw
// a dark overlay and no modal. Move each modal to <body> before it opens.
(function () {
    function lift(modal) {
        if (modal && modal.classList && modal.classList.contains('modal') && modal.parentElement !== document.body) {
            document.body.appendChild(modal);
        }
    }
    document.addEventListener('show.bs.modal', function (event) { lift(event.target); }, true);
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.nk-wrap .modal, .nk-app-root .modal').forEach(lift);
    });

    // Safety net: never leave the page under an overlay with no visible modal.
    function sweep() {
        var open = Array.prototype.some.call(document.querySelectorAll('.modal'), function (m) {
            return m.classList.contains('show') && getComputedStyle(m).opacity !== '0';
        });
        if (open) {
            return;
        }
        document.querySelectorAll('.modal').forEach(function (m) {
            if (m.style.display === 'block' && !m.classList.contains('show')) {
                m.style.display = 'none';
                m.setAttribute('aria-hidden', 'true');
            }
        });
        document.querySelectorAll('.modal-backdrop').forEach(function (b) { b.remove(); });
        document.body.classList.remove('modal-open');
        document.body.style.removeProperty('overflow');
        document.body.style.removeProperty('padding-right');
    }
    window.addEventListener('load', function () {
        setTimeout(sweep, 1500);
        setTimeout(sweep, 4000);
    });
    document.addEventListener('hidden.bs.modal', function () { setTimeout(sweep, 50); });
})();
</script>
<?php
// echo view('UserModule\Views\Dashboard\Investor_Profile\Security\Reset_Password');
echo view('ManagementModule\Views\Marketing\index\modals');
echo view('UserModule\Views\Dashboard\modals\onboarding', $subViewData);
echo view('UserModule\Views\Dashboard\modals\account_completion', $subViewData);
echo view('UserModule\Views\Dashboard\modals\today_news', $subViewData);
?>
<!-- Modal Structure -->
<div class="modal fade" id="connectWalletModal" aria-hidden="true" aria-labelledby="connectWalletModalLabel" tabindex="-1">
    <div class="modal-dialog modal-xl" id="connectWalletModalDialog">
        <div class="modal-content" id="connectWalletModalContainer">
            <div class="modal-header">
                <h5 class="modal-title" id="connectWalletModalLabel">Connect Wallet</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="connectSolanaModalBody">
                <!-- Modal body content here -->
                <ul class="link-check link-list-opt no-bdr">
                    <li><span>Choose A Wallet</span></li>
                    <li class="p-1"><a class="btn btn-success text-white" id="createSolanaWallet" href="#"><em class="icon ni ni-plus"></em> New Wallet</a></li>
                    <li class="p-1"><a class="btn btn-dark text-white importSolanaWallet" href="#"><em class="icon ni ni-upload"></em> Import Wallet with Private Key</a></li>
                    <li class="divider"></li>
                    <li class="p-1"><a class="btn btn-outline-default" href="<?= base_url('/Exchange/Solana/Wallet/MetaMask') ?>">MetaMask</a></li>
                    <li class="p-1"><a class="btn btn-outline-default" href="<?= base_url('/Exchange/Solana/Wallet/Phantom') ?>">Phantom</a></li>
                    <li class="p-1"><a class="btn btn-outline-default" href="<?= base_url('/Exchange/Solana/Wallet/Solflare') ?>">Solflare</a></li>
                    <li class="p-1"><a class="btn btn-outline-default" href="<?= base_url('/Exchange/Solana/Wallet/TrustWallet') ?>">Trust Wallet</a></li>
                </ul>
            </div>
            <div class="modal-footer">
                <a type="button" class="btn btn-primary" href="<?php echo site_url('/Exchange/Solana'); ?>">Close</a>
            </div>
        </div>
    </div>
</div>
<!-- Calculator Modal -->
<div class="modal fade" id="calculatorModal" tabindex="-1" aria-labelledby="calculatorModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="calculatorModalLabel">Simple Calculator</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php echo view('UserModule\Views\Calculator\form'); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
