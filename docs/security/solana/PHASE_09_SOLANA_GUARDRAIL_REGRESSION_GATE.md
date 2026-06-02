# Phase 09 Solana Guardrail Regression Gate

Generated UTC: 2026-06-02T23:32:41Z
Branch: hardening/solana-guardrail-regression-gate-phase-09
Commit: e9bbe4e89 Merge pull request #500 from MillennialInvestments/hardening/solana-permanent-guardrail-smoke-phase-08

## Safety Scope
- Regression-gate evidence only.
- No private keys used.
- No transaction broadcast requested.
- No mainnet minting enabled.
- Uses permanent smoke mode: php spark solana:wallet-secrets:audit --guardrails-smoke

## PHP Lint
No syntax errors detected in app/Commands/SolanaWalletSecretsAudit.php
No syntax errors detected in app/Config/Solana.php
No syntax errors detected in app/Services/SolanaService.php
No syntax errors detected in app/Libraries/MyMISolana.php
No syntax errors detected in app/Libraries/MyMIRaydium.php
No syntax errors detected in app/Libraries/MyMIPhantom.php
No syntax errors detected in app/Libraries/MyMISolflare.php

## Permanent Smoke Output

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-02 23:32:41 UTC+00:00

============================================================
SOLANA GUARDRAILS SMOKE
============================================================
Safety: no private keys, no broadcasts, no mainnet minting.

## Config Defaults
PASS: SOLANA_ALLOW_TRANSACTION_EXECUTION default false
PASS: SOLANA_ALLOW_MAINNET_BROADCAST default false
PASS: SOLANA_ALLOW_MAINNET_MINT default false
PASS: SOLANA_ALLOW_PRIVATE_KEY_SUBMISSION default false
PASS: SOLANA_REQUIRE_WALLET_SIGNATURE default true
PASS: SOLANA_DEFAULT_DRY_RUN default true

## Provider Library Guard Responses
PASS: MyMIRaydium::swap returns array
PASS: MyMIRaydium::swap broadcast=false
PASS: MyMIRaydium::swap dry_run=true
PASS: MyMIRaydium::swap sanitized payload
PASS: MyMIRaydium::swap safe guard message
PASS: MyMIPhantom::transfer returns array
PASS: MyMIPhantom::transfer broadcast=false
PASS: MyMIPhantom::transfer dry_run=true
PASS: MyMIPhantom::transfer sanitized payload
PASS: MyMIPhantom::transfer safe guard message
PASS: MyMIPhantom::swap returns array
PASS: MyMIPhantom::swap broadcast=false
PASS: MyMIPhantom::swap dry_run=true
PASS: MyMIPhantom::swap sanitized payload
PASS: MyMIPhantom::swap safe guard message
PASS: MyMIPhantom::createToken returns array
PASS: MyMIPhantom::createToken broadcast=false
PASS: MyMIPhantom::createToken dry_run=true
PASS: MyMIPhantom::createToken sanitized payload
PASS: MyMIPhantom::createToken safe guard message
PASS: MyMISolflare::transfer returns array
PASS: MyMISolflare::transfer broadcast=false
PASS: MyMISolflare::transfer dry_run=true
PASS: MyMISolflare::transfer sanitized payload
PASS: MyMISolflare::transfer safe guard message
PASS: MyMISolflare::swap returns array
PASS: MyMISolflare::swap broadcast=false
PASS: MyMISolflare::swap dry_run=true
PASS: MyMISolflare::swap sanitized payload
PASS: MyMISolflare::swap safe guard message
PASS: MyMISolflare::createToken returns array
PASS: MyMISolflare::createToken broadcast=false
PASS: MyMISolflare::createToken dry_run=true
PASS: MyMISolflare::createToken sanitized payload
PASS: MyMISolflare::createToken safe guard message

============================================================
RESULT
============================================================
PASS count: 41
FAIL count: 0

## Regression Marker Checks
### Config fail-closed defaults
18:    public bool $allowTransactionExecution = false;
19:    public bool $allowMainnetBroadcast = false;
20:    public bool $allowMainnetMint = false;
21:    public bool $allowPrivateKeySubmission = false;
22:    public bool $requireWalletSignature = true;
23:    public bool $defaultDryRun = true;

### Provider library guards
app/Libraries/MyMIRaydium.php:49:        return $this->solanaLibraryGuard('swap', $network, [
app/Libraries/MyMIRaydium.php:132:    private function solanaLibraryGuard(string $action, ?string $network = null, array $extra = []): array
app/Libraries/MyMIRaydium.php:146:                'dry_run' => true,
app/Libraries/MyMIRaydium.php:147:                'broadcast' => false,
app/Libraries/MyMIRaydium.php:148:                'message' => 'Solana library transaction execution is disabled by configuration.',
app/Libraries/MyMIRaydium.php:149:                'requires_config' => 'SOLANA_ALLOW_TRANSACTION_EXECUTION=true',
app/Libraries/MyMIRaydium.php:159:                'dry_run' => true,
app/Libraries/MyMIRaydium.php:160:                'broadcast' => false,
app/Libraries/MyMIRaydium.php:161:                'message' => 'Mainnet Solana library broadcast is disabled by configuration.',
app/Libraries/MyMIRaydium.php:162:                'requires_config' => 'SOLANA_ALLOW_MAINNET_BROADCAST=true',
app/Libraries/MyMIRaydium.php:172:                'dry_run' => true,
app/Libraries/MyMIRaydium.php:173:                'broadcast' => false,
app/Libraries/MyMIRaydium.php:174:                'message' => 'Mainnet Solana library minting is disabled by configuration.',
app/Libraries/MyMIRaydium.php:175:                'requires_config' => 'SOLANA_ALLOW_MAINNET_MINT=true',
app/Libraries/MyMIRaydium.php:185:                'dry_run' => true,
app/Libraries/MyMIRaydium.php:186:                'broadcast' => false,
app/Libraries/MyMIRaydium.php:187:                'message' => 'Solana library dry-run/preflight response prepared. No transaction was broadcast.',
app/Libraries/MyMIRaydium.php:197:            'broadcast' => false,
app/Libraries/MyMIPhantom.php:98:        return $this->solanaLibraryGuard('transfer', $network, [
app/Libraries/MyMIPhantom.php:109:        return $this->solanaLibraryGuard('swap', $network, [
app/Libraries/MyMIPhantom.php:128:        return $this->solanaLibraryGuard('createToken', $network, [
app/Libraries/MyMIPhantom.php:139:    private function solanaLibraryGuard(string $action, ?string $network = null, array $extra = []): array
app/Libraries/MyMIPhantom.php:153:                'dry_run' => true,
app/Libraries/MyMIPhantom.php:154:                'broadcast' => false,
app/Libraries/MyMIPhantom.php:155:                'message' => 'Solana library transaction execution is disabled by configuration.',
app/Libraries/MyMIPhantom.php:156:                'requires_config' => 'SOLANA_ALLOW_TRANSACTION_EXECUTION=true',
app/Libraries/MyMIPhantom.php:166:                'dry_run' => true,
app/Libraries/MyMIPhantom.php:167:                'broadcast' => false,
app/Libraries/MyMIPhantom.php:168:                'message' => 'Mainnet Solana library broadcast is disabled by configuration.',
app/Libraries/MyMIPhantom.php:169:                'requires_config' => 'SOLANA_ALLOW_MAINNET_BROADCAST=true',
app/Libraries/MyMIPhantom.php:179:                'dry_run' => true,
app/Libraries/MyMIPhantom.php:180:                'broadcast' => false,
app/Libraries/MyMIPhantom.php:181:                'message' => 'Mainnet Solana library minting is disabled by configuration.',
app/Libraries/MyMIPhantom.php:182:                'requires_config' => 'SOLANA_ALLOW_MAINNET_MINT=true',
app/Libraries/MyMIPhantom.php:192:                'dry_run' => true,
app/Libraries/MyMIPhantom.php:193:                'broadcast' => false,
app/Libraries/MyMIPhantom.php:194:                'message' => 'Solana library dry-run/preflight response prepared. No transaction was broadcast.',
app/Libraries/MyMIPhantom.php:204:            'broadcast' => false,
app/Libraries/MyMISolflare.php:93:        return $this->solanaLibraryGuard('transfer', $network, [
app/Libraries/MyMISolflare.php:104:        return $this->solanaLibraryGuard('swap', $network, [
app/Libraries/MyMISolflare.php:123:        return $this->solanaLibraryGuard('createToken', $network, [
app/Libraries/MyMISolflare.php:134:    private function solanaLibraryGuard(string $action, ?string $network = null, array $extra = []): array
app/Libraries/MyMISolflare.php:148:                'dry_run' => true,
app/Libraries/MyMISolflare.php:149:                'broadcast' => false,
app/Libraries/MyMISolflare.php:150:                'message' => 'Solana library transaction execution is disabled by configuration.',
app/Libraries/MyMISolflare.php:151:                'requires_config' => 'SOLANA_ALLOW_TRANSACTION_EXECUTION=true',
app/Libraries/MyMISolflare.php:161:                'dry_run' => true,
app/Libraries/MyMISolflare.php:162:                'broadcast' => false,
app/Libraries/MyMISolflare.php:163:                'message' => 'Mainnet Solana library broadcast is disabled by configuration.',
app/Libraries/MyMISolflare.php:164:                'requires_config' => 'SOLANA_ALLOW_MAINNET_BROADCAST=true',
app/Libraries/MyMISolflare.php:174:                'dry_run' => true,
app/Libraries/MyMISolflare.php:175:                'broadcast' => false,
app/Libraries/MyMISolflare.php:176:                'message' => 'Mainnet Solana library minting is disabled by configuration.',
app/Libraries/MyMISolflare.php:177:                'requires_config' => 'SOLANA_ALLOW_MAINNET_MINT=true',
app/Libraries/MyMISolflare.php:187:                'dry_run' => true,
app/Libraries/MyMISolflare.php:188:                'broadcast' => false,
app/Libraries/MyMISolflare.php:189:                'message' => 'Solana library dry-run/preflight response prepared. No transaction was broadcast.',
app/Libraries/MyMISolflare.php:199:            'broadcast' => false,

### Sensitive-key sanitization
app/Libraries/MyMIRaydium.php:50:            'params' => array_diff_key($params, array_flip(['privateKey', 'secretKey', 'seedPhrase', 'mnemonic'])),
app/Libraries/MyMIPhantom.php:110:            'params' => array_diff_key($params, array_flip(['privateKey', 'secretKey', 'seedPhrase', 'mnemonic'])),
app/Libraries/MyMIPhantom.php:129:            'spec' => array_diff_key($spec, array_flip(['privateKey', 'secretKey', 'seedPhrase', 'mnemonic'])),
app/Libraries/MyMISolflare.php:105:            'params' => array_diff_key($params, array_flip(['privateKey', 'secretKey', 'seedPhrase', 'mnemonic'])),
app/Libraries/MyMISolflare.php:124:            'spec' => array_diff_key($spec, array_flip(['privateKey', 'secretKey', 'seedPhrase', 'mnemonic'])),

### Guardrail smoke mode
16:    protected $usage       = 'solana:wallet-secrets:audit [--apply] [--limit=500] [--include-all-crypto] [--guardrails-smoke]';
21:        '--guardrails-smoke'  => 'Run Solana transaction guardrail smoke validation without private keys, broadcasts, or mainnet minting.',
31:        if (array_key_exists('guardrails-smoke', $options) || CLI::getOption('guardrails-smoke') !== null) {
32:            return $this->runGuardrailsSmoke();
338:    private function runGuardrailsSmoke(): int
363:        $this->guardrailCheckProviderResult('MyMIRaydium::swap', function () {
375:        $this->guardrailCheckProviderResult('MyMIPhantom::transfer', function () use ($phantom) {
379:        $this->guardrailCheckProviderResult('MyMIPhantom::swap', function () use ($phantom) {
389:        $this->guardrailCheckProviderResult('MyMIPhantom::createToken', function () use ($phantom) {
400:        $this->guardrailCheckProviderResult('MyMISolflare::transfer', function () use ($solflare) {
404:        $this->guardrailCheckProviderResult('MyMISolflare::swap', function () use ($solflare) {
414:        $this->guardrailCheckProviderResult('MyMISolflare::createToken', function () use ($solflare) {
428:        CLI::write('FAIL count: ' . $fail);
433:    private function guardrailCheckProviderResult(string $label, callable $callback, int &$pass, int &$fail): void

## Result
- PASS: Permanent smoke returned FAIL count: 0.
- PASS: Config fail-closed markers present.
- PASS: Provider guard markers present.
- PASS: Sensitive-key sanitization markers present.
- PASS: Guardrail smoke mode remains available.
- PASS: No transaction broadcast command was intentionally executed.
- PASS: No mainnet minting was enabled.
