# Phase 05 Solana Service/Library Guardrail Inspection

Generated UTC: 2026-06-02T15:41:48Z
Branch: hardening/solana-service-library-guardrails-phase-05
Commit: 6342c8088 Merge pull request #496 from MillennialInvestments/hardening/solana-guardrail-runtime-smoke-phase-04

## Safety Goal
- Harden service/library transaction-like methods below the controller layer.
- Do not enable mainnet minting.
- Do not broadcast transactions.
- Do not print private keys, seed phrases, encrypted secrets, or wallet secrets.

## Solana Config Flags
18:    public bool $allowTransactionExecution = false;
19:    public bool $allowMainnetBroadcast = false;
20:    public bool $allowMainnetMint = false;
21:    public bool $allowPrivateKeySubmission = false;
22:    public bool $requireWalletSignature = true;
23:    public bool $defaultDryRun = true;
34:        $this->allowTransactionExecution = filter_var(env('SOLANA_ALLOW_TRANSACTION_EXECUTION', false), FILTER_VALIDATE_BOOL);
35:        $this->allowMainnetBroadcast     = filter_var(env('SOLANA_ALLOW_MAINNET_BROADCAST', false), FILTER_VALIDATE_BOOL);
36:        $this->allowMainnetMint          = filter_var(env('SOLANA_ALLOW_MAINNET_MINT', false), FILTER_VALIDATE_BOOL);
37:        $this->allowPrivateKeySubmission = filter_var(env('SOLANA_ALLOW_PRIVATE_KEY_SUBMISSION', false), FILTER_VALIDATE_BOOL);
38:        $this->requireWalletSignature    = filter_var(env('SOLANA_REQUIRE_WALLET_SIGNATURE', true), FILTER_VALIDATE_BOOL);
39:        $this->defaultDryRun             = filter_var(env('SOLANA_DEFAULT_DRY_RUN', true), FILTER_VALIDATE_BOOL);

## SolanaService Guard/Broadcast Evidence
52:    public function currentNetwork(): string
65:    public function guardMainnetAction(string $action, ?string $network = null): array
114:    public function transfer(string $from, string $to, string $amount, array $opts = []): array
116:        $guard = $this->guardMainnetAction('broadcast', (string) ($opts['network'] ?? $this->currentNetwork()));
121:        return ['success' => true, 'from' => $from, 'to' => $to, 'amount' => $amount, 'network' => $guard['network'], 'broadcast' => false, 'message' => 'Prepared transfer only; no transaction broadcast was performed.'];
124:    public function getQuote(array $params): array
131:    public function swap(array $params): array
133:        $guard = $this->guardMainnetAction('broadcast', (string) ($params['network'] ?? $this->currentNetwork()));
151:    public function createToken(array $spec): array
165:    public function mintTo(string $mint, string $dest, string $amount, ?string $network = null): array
172:        return ['success' => true, 'mint' => $mint, 'dest' => $dest, 'amount' => $amount, 'network' => $guard['network'], 'broadcast' => false, 'message' => 'Draft mint prepared only; no transaction broadcast was performed.'];

## MyMISolana Guard/Broadcast Evidence
78:    private function currentNetwork(): string
91:    private function guardMainnetAction(string $action, ?string $network = null): array
239:    public function generateWallet()
244:            $secretKey = sodium_crypto_sign_secretkey($keypair);
246:                'privateKey' => bin2hex($secretKey),
254:    public function signTransaction($transaction, $privateKey)
256:        $transaction['signature'] = hash_hmac('sha256', json_encode($transaction), $privateKey);
266:    // public function createToken($name, $symbol, $supply) {
293:    public function sendAsset($privateKey, $fromAddress, $toAddress, $assetId, $amount, ?string $network = null)
295:        $guard = $this->guardMainnetAction('broadcast', $network);
306:        $signedTransaction = $this->signTransaction($transactionData, $privateKey);
940:    public function createSPLToken($privateKey, $decimals = 9) {
951:            'broadcast' => false,
956:    public function mintTokens($privateKey, $mintAddress, $amount) {
968:            'broadcast' => false,
969:            'message' => 'Draft mint payload prepared only; no token mint or transaction broadcast was performed.',
1092:    public function transfer(string $from, string $to, string $amount, array $opts = []): array
1094:        $guard = $this->guardMainnetAction('broadcast', (string) ($opts['network'] ?? $this->currentNetwork()));
1107:    public function swap(array $params): array
1109:        $guard = $this->guardMainnetAction('broadcast', (string) ($params['network'] ?? $this->currentNetwork()));
1122:    public function createToken(array $spec): array

## Raydium / Phantom / Solflare Guard Evidence
app/Libraries/MyMIRaydium.php:46:    public function swap(array $params): array
app/Libraries/MyMIRaydium.php:95:            log_message('error', 'MyMIRaydium::topTokens error: ' . $e->getMessage());
app/Libraries/MyMIRaydium.php:124:            log_message('error', 'MyMIRaydium::tokenDetails error: ' . $e->getMessage());
app/Libraries/MyMIPhantom.php:7: * Phantom wallet adapter for Solana. Provides local signature challenges
app/Libraries/MyMIPhantom.php:55:            'message' => 'Sign nonce to verify ownership.',
app/Libraries/MyMIPhantom.php:60:    public function verify(string $address, string $signature): array
app/Libraries/MyMIPhantom.php:71:        $sigB   = $this->b58decode($signature);
app/Libraries/MyMIPhantom.php:95:    public function transfer(string $from, string $to, string $amount, array $opts = []): array
app/Libraries/MyMIPhantom.php:100:    public function swap(array $params): array
app/Libraries/MyMIPhantom.php:115:    public function createToken(array $spec): array
app/Libraries/MyMISolflare.php:50:            'message' => 'Sign nonce to verify ownership.',
app/Libraries/MyMISolflare.php:55:    public function verify(string $address, string $signature): array
app/Libraries/MyMISolflare.php:66:        $sigB   = $this->b58decode($signature);
app/Libraries/MyMISolflare.php:90:    public function transfer(string $from, string $to, string $amount, array $opts = []): array
app/Libraries/MyMISolflare.php:95:    public function swap(array $params): array
app/Libraries/MyMISolflare.php:110:    public function createToken(array $spec): array

## PHP Lint
No syntax errors detected in app/Config/Solana.php
No syntax errors detected in app/Services/SolanaService.php
No syntax errors detected in app/Libraries/MyMISolana.php
No syntax errors detected in app/Libraries/MyMIRaydium.php
No syntax errors detected in app/Libraries/MyMIPhantom.php
No syntax errors detected in app/Libraries/MyMISolflare.php

## Initial Result
- Inspection only.
- No runtime blockchain action executed.
- Next patch should add or standardize fail-closed helper behavior inside service/library transaction methods.
