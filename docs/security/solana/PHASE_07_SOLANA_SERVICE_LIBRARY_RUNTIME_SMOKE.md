# Phase 07 Solana Service/Library Runtime Smoke

Generated UTC: 2026-06-02T21:53:09Z
Branch: hardening/solana-service-library-runtime-smoke-phase-07
Commit: 2d14c3680 Add Solana service library runtime smoke report

## Safety Scope
- CLI-safe service/library validation only.
- No real private keys used.
- No transaction broadcast requested.
- No mainnet minting enabled.
- No Solana RPC mutation or wallet signing was executed.

## Runtime Smoke Note
- Direct PHP bootstrap attempts were intentionally stopped after CI4 helper/bootstrap limitations produced framework bootstrap errors.
- Errors observed were framework bootstrap/helper-resolution errors, not transaction broadcast attempts.
- Phase 07 therefore records lint + static runtime guard evidence instead of unsafe or brittle production CLI bootstrapping.
- This report should be followed by a permanent first-class Spark smoke command in a later phase if runtime method execution evidence is required.

## PHP Lint
No syntax errors detected in app/Config/Solana.php
No syntax errors detected in app/Services/SolanaService.php
No syntax errors detected in app/Libraries/MyMISolana.php
No syntax errors detected in app/Libraries/MyMIRaydium.php
No syntax errors detected in app/Libraries/MyMIPhantom.php
No syntax errors detected in app/Libraries/MyMISolflare.php

## Guard Flag Evidence
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

## Service Guard Evidence
52:    public function currentNetwork(): string
65:    public function guardMainnetAction(string $action, ?string $network = null): array
74:        $envKey = $action === 'mint' ? 'SOLANA_ALLOW_MAINNET_MINTING' : 'SOLANA_ALLOW_MAINNET_BROADCAST';
114:    public function transfer(string $from, string $to, string $amount, array $opts = []): array
121:        return ['success' => true, 'from' => $from, 'to' => $to, 'amount' => $amount, 'network' => $guard['network'], 'broadcast' => false, 'message' => 'Prepared transfer only; no transaction broadcast was performed.'];
131:    public function swap(array $params): array
151:    public function createToken(array $spec): array
165:    public function mintTo(string $mint, string $dest, string $amount, ?string $network = null): array
172:        return ['success' => true, 'mint' => $mint, 'dest' => $dest, 'amount' => $amount, 'network' => $guard['network'], 'broadcast' => false, 'message' => 'Draft mint prepared only; no transaction broadcast was performed.'];

## MyMISolana Guard Evidence
78:    private function currentNetwork(): string
91:    private function guardMainnetAction(string $action, ?string $network = null): array
99:        $envKey = strtolower($action) === 'mint' ? 'SOLANA_ALLOW_MAINNET_MINTING' : 'SOLANA_ALLOW_MAINNET_BROADCAST';
244:            $secretKey = sodium_crypto_sign_secretkey($keypair);
246:                'privateKey' => bin2hex($secretKey),
254:    public function signTransaction($transaction, $privateKey)
256:        $transaction['signature'] = hash_hmac('sha256', json_encode($transaction), $privateKey);
293:    public function sendAsset($privateKey, $fromAddress, $toAddress, $assetId, $amount, ?string $network = null)
306:        $signedTransaction = $this->signTransaction($transactionData, $privateKey);
940:    public function createSPLToken($privateKey, $decimals = 9) {
951:            'broadcast' => false,
956:    public function mintTokens($privateKey, $mintAddress, $amount) {
968:            'broadcast' => false,
969:            'message' => 'Draft mint payload prepared only; no token mint or transaction broadcast was performed.',
1092:    public function transfer(string $from, string $to, string $amount, array $opts = []): array
1107:    public function swap(array $params): array

## Provider Library Guard Evidence
app/Libraries/MyMIRaydium.php:46:    public function swap(array $params): array
app/Libraries/MyMIRaydium.php:49:        return $this->solanaLibraryGuard('swap', $network, [
app/Libraries/MyMIRaydium.php:132:    private function solanaLibraryGuard(string $action, ?string $network = null, array $extra = []): array
app/Libraries/MyMIRaydium.php:147:                'broadcast' => false,
app/Libraries/MyMIRaydium.php:148:                'message' => 'Solana library transaction execution is disabled by configuration.',
app/Libraries/MyMIRaydium.php:149:                'requires_config' => 'SOLANA_ALLOW_TRANSACTION_EXECUTION=true',
app/Libraries/MyMIRaydium.php:160:                'broadcast' => false,
app/Libraries/MyMIRaydium.php:161:                'message' => 'Mainnet Solana library broadcast is disabled by configuration.',
app/Libraries/MyMIRaydium.php:162:                'requires_config' => 'SOLANA_ALLOW_MAINNET_BROADCAST=true',
app/Libraries/MyMIRaydium.php:173:                'broadcast' => false,
app/Libraries/MyMIRaydium.php:174:                'message' => 'Mainnet Solana library minting is disabled by configuration.',
app/Libraries/MyMIRaydium.php:175:                'requires_config' => 'SOLANA_ALLOW_MAINNET_MINT=true',
app/Libraries/MyMIRaydium.php:186:                'broadcast' => false,
app/Libraries/MyMIRaydium.php:187:                'message' => 'Solana library dry-run/preflight response prepared. No transaction was broadcast.',
app/Libraries/MyMIRaydium.php:197:            'broadcast' => false,
app/Libraries/MyMIPhantom.php:95:    public function transfer(string $from, string $to, string $amount, array $opts = []): array
app/Libraries/MyMIPhantom.php:98:        return $this->solanaLibraryGuard('transfer', $network, [
app/Libraries/MyMIPhantom.php:106:    public function swap(array $params): array
app/Libraries/MyMIPhantom.php:109:        return $this->solanaLibraryGuard('swap', $network, [
app/Libraries/MyMIPhantom.php:125:    public function createToken(array $spec): array
app/Libraries/MyMIPhantom.php:128:        return $this->solanaLibraryGuard('createToken', $network, [
app/Libraries/MyMIPhantom.php:139:    private function solanaLibraryGuard(string $action, ?string $network = null, array $extra = []): array
app/Libraries/MyMIPhantom.php:154:                'broadcast' => false,
app/Libraries/MyMIPhantom.php:155:                'message' => 'Solana library transaction execution is disabled by configuration.',
app/Libraries/MyMIPhantom.php:156:                'requires_config' => 'SOLANA_ALLOW_TRANSACTION_EXECUTION=true',
app/Libraries/MyMIPhantom.php:167:                'broadcast' => false,
app/Libraries/MyMIPhantom.php:168:                'message' => 'Mainnet Solana library broadcast is disabled by configuration.',
app/Libraries/MyMIPhantom.php:169:                'requires_config' => 'SOLANA_ALLOW_MAINNET_BROADCAST=true',
app/Libraries/MyMIPhantom.php:180:                'broadcast' => false,
app/Libraries/MyMIPhantom.php:181:                'message' => 'Mainnet Solana library minting is disabled by configuration.',
app/Libraries/MyMIPhantom.php:182:                'requires_config' => 'SOLANA_ALLOW_MAINNET_MINT=true',
app/Libraries/MyMIPhantom.php:193:                'broadcast' => false,
app/Libraries/MyMIPhantom.php:194:                'message' => 'Solana library dry-run/preflight response prepared. No transaction was broadcast.',
app/Libraries/MyMIPhantom.php:204:            'broadcast' => false,
app/Libraries/MyMISolflare.php:90:    public function transfer(string $from, string $to, string $amount, array $opts = []): array
app/Libraries/MyMISolflare.php:93:        return $this->solanaLibraryGuard('transfer', $network, [
app/Libraries/MyMISolflare.php:101:    public function swap(array $params): array
app/Libraries/MyMISolflare.php:104:        return $this->solanaLibraryGuard('swap', $network, [
app/Libraries/MyMISolflare.php:120:    public function createToken(array $spec): array
app/Libraries/MyMISolflare.php:123:        return $this->solanaLibraryGuard('createToken', $network, [
app/Libraries/MyMISolflare.php:134:    private function solanaLibraryGuard(string $action, ?string $network = null, array $extra = []): array
app/Libraries/MyMISolflare.php:149:                'broadcast' => false,
app/Libraries/MyMISolflare.php:150:                'message' => 'Solana library transaction execution is disabled by configuration.',
app/Libraries/MyMISolflare.php:151:                'requires_config' => 'SOLANA_ALLOW_TRANSACTION_EXECUTION=true',
app/Libraries/MyMISolflare.php:162:                'broadcast' => false,
app/Libraries/MyMISolflare.php:163:                'message' => 'Mainnet Solana library broadcast is disabled by configuration.',
app/Libraries/MyMISolflare.php:164:                'requires_config' => 'SOLANA_ALLOW_MAINNET_BROADCAST=true',
app/Libraries/MyMISolflare.php:175:                'broadcast' => false,
app/Libraries/MyMISolflare.php:176:                'message' => 'Mainnet Solana library minting is disabled by configuration.',
app/Libraries/MyMISolflare.php:177:                'requires_config' => 'SOLANA_ALLOW_MAINNET_MINT=true',
app/Libraries/MyMISolflare.php:188:                'broadcast' => false,
app/Libraries/MyMISolflare.php:189:                'message' => 'Solana library dry-run/preflight response prepared. No transaction was broadcast.',
app/Libraries/MyMISolflare.php:199:            'broadcast' => false,

## Sanitization Evidence
app/Libraries/MyMIRaydium.php:50:            'params' => array_diff_key($params, array_flip(['privateKey', 'secretKey', 'seedPhrase', 'mnemonic'])),
app/Libraries/MyMIPhantom.php:110:            'params' => array_diff_key($params, array_flip(['privateKey', 'secretKey', 'seedPhrase', 'mnemonic'])),
app/Libraries/MyMIPhantom.php:129:            'spec' => array_diff_key($spec, array_flip(['privateKey', 'secretKey', 'seedPhrase', 'mnemonic'])),
app/Libraries/MyMISolflare.php:105:            'params' => array_diff_key($params, array_flip(['privateKey', 'secretKey', 'seedPhrase', 'mnemonic'])),
app/Libraries/MyMISolflare.php:124:            'spec' => array_diff_key($spec, array_flip(['privateKey', 'secretKey', 'seedPhrase', 'mnemonic'])),

## Result
- PASS: Config flags fail closed by default.
- PASS: Provider libraries include solanaLibraryGuard fail-closed checks.
- PASS: Provider swap/transfer/createToken methods return guarded dry-run/preflight-style arrays.
- PASS: Sensitive key fields are excluded from provider returned payloads.
- PASS: PHP lint passed for Solana config, service, and libraries.
- PASS: No transaction broadcast command was intentionally executed.
- PASS: No mainnet minting was enabled.
