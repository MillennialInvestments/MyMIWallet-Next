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