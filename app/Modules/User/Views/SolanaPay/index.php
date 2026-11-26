<?php
/**
 * Pay for MyMI products with crypto: USDC on Solana (Solana Pay), USDC on
 * Ethereum or Base, XRP or BTC. The page asks the server for a checkout,
 * shows its QR / wallet link, and polls until the payment is confirmed
 * on-chain. Nothing here touches keys.
 */
helper('csp');
$sp = $solanaPay ?? [];
$labels = [
    'mymigold'      => 'MyMI Gold',
    'membership'    => 'Membership',
    'auction_topup' => 'Auction balance',
    'fund_units'    => 'Project fund units',
];
$chainLabels = [
    'solana'   => 'Solana (USDC)',
    'ethereum' => 'Ethereum (USDC)',
    'base'     => 'Base (USDC)',
    'xrpl'     => 'XRP Ledger (XRP)',
    'bitcoin'  => 'Bitcoin (BTC)',
];
$chains = $sp['chains'] ?? [['chain' => 'solana', 'asset' => 'USDC']];
$testnet = ($sp['cryptoNetwork'] ?? '') === 'testnet';
$config = [
    'base'    => rtrim(site_url('Pay/Solana'), '/'),
    'cryptoBase' => rtrim(site_url('Pay/Crypto'), '/'),
    'goldUsd' => (float) ($sp['goldUsd'] ?? 1),
    'preset'  => $sp['preset'] ?? [],
];
$feeSol = rtrim(rtrim(number_format(((int) ($sp['fee'] ?? 0)) / 1e9, 9, '.', ''), '0'), '.');
?>
<div class="nk-block" id="solpay-app" data-config="<?= esc(json_encode($config), 'attr') ?>">
    <div class="nk-block-head">
        <h3 class="nk-block-title">Pay with crypto</h3>
        <p class="text-soft">Pay from your own wallet; MyMI never sees your keys.
            <span class="solpay-chain-note" data-for="solana">USDC on Solana (Phantom, Solflare, Backpack and others), one transaction.<?php if (($sp['fee'] ?? 0) > 0): ?> A <?= esc($feeSol) ?> SOL processing fee is part of the same transaction.<?php endif; ?>
            <?php if (($sp['cluster'] ?? '') === 'devnet'): ?><strong>Test network (devnet): use devnet USDC and SOL.</strong><?php endif; ?></span>
            <span class="solpay-chain-note d-none" data-for="crypto">The MyMI processing fee is part of the same payment and shown on its own line.
            <?php if ($testnet): ?><strong>Test networks (Sepolia, Base Sepolia, XRPL Testnet, Bitcoin Testnet4): use test coins only.</strong><?php endif; ?></span></p>
    </div>

    <?php if (($sp['purposes'] ?? []) === []): ?>
        <div class="alert alert-info">Nothing is available to buy with crypto right now.</div>
    <?php else: ?>
    <div class="card card-bordered"><div class="card-inner">
        <form id="solpay-form" class="row g-3">
            <div class="col-md-4">
                <label class="form-label" for="solpay-chain">Pay with</label>
                <select class="form-select" id="solpay-chain" name="chain">
                    <?php foreach ($chains as $c): ?>
                        <option value="<?= esc($c['chain'], 'attr') ?>"><?= esc($chainLabels[$c['chain']] ?? $c['chain']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-label" for="solpay-purpose">What are you buying?</label>
                <select class="form-select" id="solpay-purpose" name="purpose">
                    <?php foreach ($sp['purposes'] as $p): ?>
                        <option value="<?= esc($p, 'attr') ?>"><?= esc($labels[$p] ?? $p) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-4 solpay-field" data-for="mymigold">
                <label class="form-label" for="solpay-gold-usd">Amount (USD)</label>
                <input class="form-control" id="solpay-gold-usd" name="amount_usd" type="number" min="1" step="0.01" value="10">
            </div>
            <div class="col-md-4 solpay-field" data-for="membership">
                <label class="form-label" for="solpay-plan">Plan</label>
                <select class="form-select" id="solpay-plan" name="plan">
                    <?php foreach ($sp['plans'] ?? [] as $plan): ?>
                        <option value="<?= esc($plan['slug'], 'attr') ?>"><?= esc($plan['label']) ?> ($<?= esc(number_format($plan['price'], 2)) ?>)</option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-4 solpay-field" data-for="auction_topup">
                <label class="form-label" for="solpay-gold-cents">Amount (MyMI Gold cents)</label>
                <input class="form-control" id="solpay-gold-cents" name="gold_cents" type="number" min="100" step="100" value="1000">
                <input type="hidden" name="lot_id" id="solpay-lot">
            </div>
            <div class="col-md-4 solpay-field" data-for="fund_units">
                <label class="form-label" for="solpay-project">Project ID</label>
                <input class="form-control" id="solpay-project" name="project_id" type="number" min="1">
                <label class="form-label mt-2" for="solpay-invest">Investment (USD)</label>
                <input class="form-control" id="solpay-invest" name="investment_amount" type="number" min="10" step="0.01">
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit" id="solpay-go">Get payment details</button>
                <p class="small text-muted mt-2 mb-0">By paying, you agree to our <a href="<?= site_url('Terms-Of-Service'); ?>" target="_blank">Terms of Service</a> and acknowledge our <a href="<?= site_url('disclaimer'); ?>" target="_blank">risk disclosures</a>.</p>
            </div>
        </form>

        <div id="solpay-pay" class="mt-4 d-none">
            <div class="row g-4 align-items-center">
                <div class="col-md-5 text-center"><img id="solpay-qr" class="img-fluid" width="280" alt="Solana Pay QR code"></div>
                <div class="col-md-7">
                    <p class="lead mb-1">Send exactly <strong><span id="solpay-amount"></span> <span id="solpay-asset">USDC</span></strong><span id="solpay-fee"></span></p>
                    <p class="small text-soft mb-2" id="solpay-breakdown"></p>
                    <div id="solpay-dest" class="mb-2 d-none">
                        <div class="small text-soft">To this address</div>
                        <code id="solpay-address" class="d-block text-break"></code>
                        <div id="solpay-tag-box" class="alert alert-warning py-1 px-2 mt-2 mb-0 d-none">Destination tag <strong id="solpay-tag"></strong> is required, or the payment cannot be matched to your order.</div>
                    </div>
                    <p class="text-soft">Scan with your wallet app, or open it on this device:</p>
                    <a class="btn btn-outline-primary mb-3" id="solpay-open" href="#">Open in wallet</a>
                    <button class="btn btn-outline-primary mb-3 d-none" type="button" id="solpay-evm">Pay with browser wallet</button>
                    <p id="solpay-status" class="small text-muted" role="status" aria-live="polite">Waiting for payment…</p>
                </div>
            </div>
        </div>
        <div id="solpay-error" class="alert alert-danger mt-3 d-none" role="alert"></div>
    </div></div>
    <?php endif; ?>
</div>
<script<?= script_nonce_attr() ?> src="<?= base_url('assets/js/solana-pay/checkout.js') ?>?v=<?= is_file(FCPATH . 'assets/js/solana-pay/checkout.js') ? filemtime(FCPATH . 'assets/js/solana-pay/checkout.js') : '1' ?>"></script>
