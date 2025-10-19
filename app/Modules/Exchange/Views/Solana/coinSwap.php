<?php
$solanaListing = []; 
?>
<div class="nk-block">
    <div class="row">
        <div class="col-md-12 my-sm-3">
            <div class="card card-bordered h-100">
                <div class="card-inner px-2 px-lg-4 pt-xl-3">
                    <div class="nk-order-ovwg">
                        <div class="row g-4">
                            <h1>Solana Coin Swap - MyMI Wallet</h1>
                            <p>Welcome to the Solana Coin Swap section of MyMI Wallet. Use the form below to perform a coin swap between two cryptocurrencies. Below the form, you can find a list of available tokens on the MyMI Solana Exchange for quick selection.</p>
                            
                            <?php if (session()->getFlashdata('success')) : ?>
                                <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
                            <?php endif; ?>
                            <?php if (session()->getFlashdata('error')) : ?>
                                <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
                            <?php endif; ?>

                            <!-- Coin Swap Form -->
                            <form id="solanaCoinSwapForm" action="<?= base_url('Exchange/SolanaController/executeSwap') ?>" method="post">                                
                                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">

                                <input id="beta" name="beta" value="<?php echo set_value('beta', $cuUserType === 'Beta' ? 'Yes' : 'No'); ?>" type="hidden">
                                <input id="form_mode" name="form_mode" value="<?php //echo $formMode; ?>" class="form-control" type="hidden">
                                <input id="user_id" name="user_id" value="<?php echo $cuID; ?>" class="form-control" type="hidden">
                                <input id="user_email" name="user_email" value="<?php echo $cuEmail; ?>" class="form-control" type="hidden">
                                <input id="username" name="username" value="<?php echo $cuUsername; ?>" class="form-control" type="hidden">
                                <input id="wallet_id" name="wallet_id" value="<?php echo $cuSolanaDW['id'] ?? ''; ?>" class="form-control" type="hidden">
                                <input id="address" name="address" value="<?= esc($cuSolanaDW['address'] ?? '') ?>" class="form-control" type="hidden">
                                <div class="row g-4">
                                    <div class="form-group d-none">
                                        <label for="from_token">From Token</label>
                                        <input type="hidden" name="from_token" id="from_token" class="form-control" value="<?= set_value('from_token') ?>" required>            
                                    </div>
                                    <div class="form-group">
                                        <label for="to_token">Your MyMI Solana Wallet</label>
                                        <input type="text" name="to_token" id="to_token" class="form-control" value="<?= set_value('to_token') ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="amount">Amount</label>
                                        <input type="text" name="amount" id="amount" class="form-control" value="<?= set_value('amount') ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="user_id">User ID</label>
                                        <input type="text" name="user_id" id="user_id" class="form-control" value="<?= set_value('user_id') ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="public_key">Public Key</label>
                                        <input type="text" name="public_key" id="public_key" class="form-control" value="<?= set_value('public_key') ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="private_key">Private Key</label>
                                        <input type="text" name="private_key" id="private_key" class="form-control" value="<?= set_value('private_key') ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="from_address">From Address</label>
                                        <input type="text" name="from_address" id="from_address" class="form-control" value="<?= set_value('from_address') ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="to_address">To Address</label>
                                        <input type="text" name="to_address" id="to_address" class="form-control" value="<?= set_value('to_address') ?>" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Execute Swap</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Exchange Coin Listing -->
    <div class="row">
        <div class="col-md-12 my-sm-3">
            <div class="card card-bordered h-100">
                <div class="card-inner px-2 px-lg-4 pt-xl-3">
                    <div class="nk-order-ovwg">
                        <div class="row g-4">
                            <h2>Listed Tokens - MyMI Solana Exchange</h2>
                            <p>Below is the list of tokens currently available on the MyMI Solana Exchange.</p>
                            
                            <table class="table table-bordered" id="solanaTokenListing">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Symbol</th>
                                        <th>Total Supply</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($solanaListing as $token) : ?>
                                        <!-- <tr>
                                            <td><?php // echo $token['id'] ?></td>
                                            <td><?php // echo $token['name'] ?></td>
                                            <td><?php // echo $token['symbol'] ?></td>
                                            <td><?php // echo $token['totalSupply'] ?></td>
                                        </tr> -->
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <script <?= $nonce['script'] ?? '' ?>>
                            $(document).ready(function() {
                                var table = $('#solanaTokenListing').DataTable({
                                    "order": [[ 0, "asc" ]],     
                                    "lengthMenu": [[25, 50, 100, 500, -1], [25, 50, 100, 500, "All"]],
                                    "columnDefs": [
                                        {
                                            "targets": [ 0 ], // Assuming column 1 is the hidden column for Account Type (Income/Expense)
                                            "visible": false,
                                        }
                                    ],
                                    "drawCallback": function(settings) {
                                        var api = this.api();
                                        var subtotal = 0;
                                    }
                                });
                            });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
