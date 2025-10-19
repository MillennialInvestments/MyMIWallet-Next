<?php
$cuID = $userAccount['cuID'];
$cuEmail = $userAccount['cuEmail'];
$cuUsername = $userAccount['cuUsername'];
$cuWalletID = $userAccount['cuWalletID'];
?>

<div class="modal-header">
    <h3 class="modal-title" id="createTokenModalLabel">Create New Token</h3>
    <button class="close" type="button" aria-label="Close" data-dismiss="modal">
        <span aria-hidden="true">×</span>
    </button>
</div>
<div class="modal-body">
    <div class="nk-block nk-block-lg">
        <div class="nk-block pb-0">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title title">Create Your Own Cryptocurrency Token</h4>
                <div class="nk-block-des">
                    <p>Fill out the form below to create a new token on your selected blockchain.</p>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-inner">
                <form action="<?= base_url('Exchange/SolanaController/createToken') ?>" class="form-horizontal gy-3" id="createTokenForm" method="post">
                    <!-- Hidden Inputs -->
                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

                    <input name="user_id" value="<?= $cuID ?>" type="hidden">
                    <input name="user_email" value="<?= $cuEmail ?>" type="hidden">
                    <input name="username" value="<?= $cuUsername ?>" type="hidden">
                    <input name="wallet_id" value="<?= $cuWalletID ?>" type="hidden">

                    <!-- Token Name -->
                    <div class="g-3 row align-center">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label" for="token_name">Token Name</label>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <input name="token_name" id="token_name" class="form-control" placeholder="Enter the token name" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Token Symbol -->
                    <div class="g-3 row align-center">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label" for="token_symbol">Token Symbol</label>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <input name="token_symbol" id="token_symbol" class="form-control" placeholder="Enter the token symbol" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Total Supply -->
                    <div class="g-3 row align-center">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label" for="token_supply">Total Supply</label>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <input name="token_supply" id="token_supply" class="form-control" placeholder="Enter the total supply" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Blockchain Selection -->
                    <div class="g-3 row align-center">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label" for="blockchain">Select Blockchain</label>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <select name="blockchain" id="blockchain" class="form-control" required>
                                        <option value="solana">Solana</option>
                                        <option value="ethereum">Ethereum (Coming Soon)</option>
                                        <option value="bsc">Binance Smart Chain (Coming Soon)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Admin Wallet Address -->
                    <div class="g-3 row align-center">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label" for="admin_wallet">Admin Wallet Address</label>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group">
                                <div class="form-control-wrap">
                                    <input name="admin_wallet" id="admin_wallet" class="form-control" placeholder="Enter the wallet address for initial token distribution" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="g-3 row">
                        <div class="col-lg-8 offset-lg-5">
                            <div class="form-group mt-2">
                                <button class="btn btn-lg btn-primary" type="submit">Create Token</button>
                            </div>
                        </div>
                    </div>
                </form>

                <!-- Validation Errors -->
                <?php if (validation_errors()): ?>
                    <div class="alert alert-error fade in">
                        <?= validation_errors(); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
