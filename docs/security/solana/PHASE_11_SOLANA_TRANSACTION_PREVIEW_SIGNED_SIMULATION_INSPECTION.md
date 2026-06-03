# Phase 11 Solana Transaction Preview UX + Signed Wallet Simulation Inspection

Generated UTC: 2026-06-03T07:39:23Z
Branch: feature/solana-transaction-preview-signed-simulation-phase-11
Commit: eeb6691f6 Add Solana guardrail release checklist (#502)

## Safety Scope
- Inspection/report-only phase.
- No transaction execution enabled.
- No transaction broadcast requested.
- No mainnet minting enabled.
- No private keys used, printed, logged, or returned.
- Keeps existing guardrail command as baseline validation.

## Guardrail Baseline

CodeIgniter v4.7.0 Command Line Tool - Server Time: 2026-06-03 07:39:23 UTC+00:00

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

## Phase 11 Goal
- Identify the safest place to add transaction preview UX.
- Identify quote/preflight/simulation-only API contracts.
- Identify wallet-signature handoff requirements.
- Identify frontend modal/view work for user-facing transaction previews.
- Preserve fail-closed behavior from Phases 01-10.

## Controller/API Methods Requiring Preview/Simulation Review
app/Modules/Exchange/Controllers/SolanaController.php:392:    public function createSolanaWallet() {
app/Modules/Exchange/Controllers/SolanaController.php:437:    public function createToken() {
app/Modules/Exchange/Controllers/SolanaController.php:512:    public function executeSwap() {
app/Modules/Exchange/Controllers/SolanaController.php:802:    public function importWallet()
app/Modules/Exchange/Controllers/SolanaController.php:917:    public function mintTokens() {
app/Modules/Exchange/Controllers/SolanaController.php:1009:    public function purchaseSolana() {
app/Modules/Exchange/Controllers/SolanaController.php:1096:    public function sellSolana() {
app/Modules/Exchange/Controllers/SolanaController.php:1153:    public function swapSolana() {
app/Modules/Exchange/Controllers/SolanaController.php:1296:    public function doSwap()
app/Modules/Exchange/Controllers/SolanaController.php:1475:    private function solanaTransactionGuard(string $action)
app/Modules/Exchange/Controllers/SolanaController.php:1613:    private function jsonEnvelope(bool $success, string $message, array $data = [], array $errors = []): array
app/Modules/APIs/Controllers/SolanaAPIController.php:137:    public function createSolanaWallet() {
app/Modules/APIs/Controllers/SolanaAPIController.php:182:    public function createToken() {
app/Modules/APIs/Controllers/SolanaAPIController.php:210:    public function executeSwap() {
app/Modules/APIs/Controllers/SolanaAPIController.php:373:    public function importWallet() {
app/Modules/APIs/Controllers/SolanaAPIController.php:553:    public function transfer()
app/Modules/APIs/Controllers/SolanaAPIController.php:565:    public function quote()
app/Modules/APIs/Controllers/SolanaAPIController.php:577:    public function swap()
app/Modules/APIs/Controllers/SolanaAPIController.php:589:    public function mint()
app/Modules/APIs/Controllers/SolanaAPIController.php:601:    private function solanaTransactionGuard(string $action)
app/Modules/APIs/Controllers/SolanaAPIController.php:739:    private function jsonEnvelope(bool $success, string $message, array $data = [], array $errors = []): array

## Service/Library Quote/Simulation/Broadcast Review
app/Services/SolanaService.php:52:    public function currentNetwork(): string
app/Services/SolanaService.php:65:    public function guardMainnetAction(string $action, ?string $network = null): array
app/Services/SolanaService.php:114:    public function transfer(string $from, string $to, string $amount, array $opts = []): array
app/Services/SolanaService.php:116:        $guard = $this->guardMainnetAction('broadcast', (string) ($opts['network'] ?? $this->currentNetwork()));
app/Services/SolanaService.php:121:        return ['success' => true, 'from' => $from, 'to' => $to, 'amount' => $amount, 'network' => $guard['network'], 'broadcast' => false, 'message' => 'Prepared transfer only; no transaction broadcast was performed.'];
app/Services/SolanaService.php:124:    public function getQuote(array $params): array
app/Services/SolanaService.php:131:    public function swap(array $params): array
app/Services/SolanaService.php:133:        $guard = $this->guardMainnetAction('broadcast', (string) ($params['network'] ?? $this->currentNetwork()));
app/Services/SolanaService.php:151:    public function createToken(array $spec): array
app/Services/SolanaService.php:165:    public function mintTo(string $mint, string $dest, string $amount, ?string $network = null): array
app/Services/SolanaService.php:172:        return ['success' => true, 'mint' => $mint, 'dest' => $dest, 'amount' => $amount, 'network' => $guard['network'], 'broadcast' => false, 'message' => 'Draft mint prepared only; no transaction broadcast was performed.'];
app/Libraries/MyMISolana.php:78:    private function currentNetwork(): string
app/Libraries/MyMISolana.php:91:    private function guardMainnetAction(string $action, ?string $network = null): array
app/Libraries/MyMISolana.php:266:    // public function createToken($name, $symbol, $supply) {
app/Libraries/MyMISolana.php:295:        $guard = $this->guardMainnetAction('broadcast', $network);
app/Libraries/MyMISolana.php:951:            'broadcast' => false,
app/Libraries/MyMISolana.php:956:    public function mintTokens($privateKey, $mintAddress, $amount) {
app/Libraries/MyMISolana.php:968:            'broadcast' => false,
app/Libraries/MyMISolana.php:969:            'message' => 'Draft mint payload prepared only; no token mint or transaction broadcast was performed.',
app/Libraries/MyMISolana.php:1092:    public function transfer(string $from, string $to, string $amount, array $opts = []): array
app/Libraries/MyMISolana.php:1094:        $guard = $this->guardMainnetAction('broadcast', (string) ($opts['network'] ?? $this->currentNetwork()));
app/Libraries/MyMISolana.php:1102:    public function getQuote(array $params): array
app/Libraries/MyMISolana.php:1107:    public function swap(array $params): array
app/Libraries/MyMISolana.php:1109:        $guard = $this->guardMainnetAction('broadcast', (string) ($params['network'] ?? $this->currentNetwork()));
app/Libraries/MyMISolana.php:1122:    public function createToken(array $spec): array
app/Libraries/MyMISolana.php:1128:    public function mintTo(string $mint, string $dest, string $amount): array
app/Libraries/MyMIRaydium.php:35:    public function getQuote(array $params): array
app/Libraries/MyMIRaydium.php:46:    public function swap(array $params): array
app/Libraries/MyMIRaydium.php:146:                'dry_run' => true,
app/Libraries/MyMIRaydium.php:147:                'broadcast' => false,
app/Libraries/MyMIRaydium.php:159:                'dry_run' => true,
app/Libraries/MyMIRaydium.php:160:                'broadcast' => false,
app/Libraries/MyMIRaydium.php:161:                'message' => 'Mainnet Solana library broadcast is disabled by configuration.',
app/Libraries/MyMIRaydium.php:172:                'dry_run' => true,
app/Libraries/MyMIRaydium.php:173:                'broadcast' => false,
app/Libraries/MyMIRaydium.php:185:                'dry_run' => true,
app/Libraries/MyMIRaydium.php:186:                'broadcast' => false,
app/Libraries/MyMIRaydium.php:187:                'message' => 'Solana library dry-run/preflight response prepared. No transaction was broadcast.',
app/Libraries/MyMIRaydium.php:196:            'dry_run' => false,
app/Libraries/MyMIRaydium.php:197:            'broadcast' => false,
app/Libraries/MyMIRaydium.php:198:            'message' => 'Solana library guard passed, but this adapter does not broadcast transactions directly.',
app/Libraries/MyMIPhantom.php:95:    public function transfer(string $from, string $to, string $amount, array $opts = []): array
app/Libraries/MyMIPhantom.php:106:    public function swap(array $params): array
app/Libraries/MyMIPhantom.php:115:    public function getQuote(array $params): array
app/Libraries/MyMIPhantom.php:125:    public function createToken(array $spec): array
app/Libraries/MyMIPhantom.php:134:    public function mintTo(string $mint, string $dest, string $amount): array
app/Libraries/MyMIPhantom.php:153:                'dry_run' => true,
app/Libraries/MyMIPhantom.php:154:                'broadcast' => false,
app/Libraries/MyMIPhantom.php:166:                'dry_run' => true,
app/Libraries/MyMIPhantom.php:167:                'broadcast' => false,
app/Libraries/MyMIPhantom.php:168:                'message' => 'Mainnet Solana library broadcast is disabled by configuration.',
app/Libraries/MyMIPhantom.php:179:                'dry_run' => true,
app/Libraries/MyMIPhantom.php:180:                'broadcast' => false,
app/Libraries/MyMIPhantom.php:192:                'dry_run' => true,
app/Libraries/MyMIPhantom.php:193:                'broadcast' => false,
app/Libraries/MyMIPhantom.php:194:                'message' => 'Solana library dry-run/preflight response prepared. No transaction was broadcast.',
app/Libraries/MyMIPhantom.php:203:            'dry_run' => false,
app/Libraries/MyMIPhantom.php:204:            'broadcast' => false,
app/Libraries/MyMIPhantom.php:205:            'message' => 'Solana library guard passed, but this adapter does not broadcast transactions directly.',
app/Libraries/MyMISolflare.php:90:    public function transfer(string $from, string $to, string $amount, array $opts = []): array
app/Libraries/MyMISolflare.php:101:    public function swap(array $params): array
app/Libraries/MyMISolflare.php:110:    public function getQuote(array $params): array
app/Libraries/MyMISolflare.php:120:    public function createToken(array $spec): array
app/Libraries/MyMISolflare.php:129:    public function mintTo(string $mint, string $dest, string $amount): array
app/Libraries/MyMISolflare.php:148:                'dry_run' => true,
app/Libraries/MyMISolflare.php:149:                'broadcast' => false,
app/Libraries/MyMISolflare.php:161:                'dry_run' => true,
app/Libraries/MyMISolflare.php:162:                'broadcast' => false,
app/Libraries/MyMISolflare.php:163:                'message' => 'Mainnet Solana library broadcast is disabled by configuration.',
app/Libraries/MyMISolflare.php:174:                'dry_run' => true,
app/Libraries/MyMISolflare.php:175:                'broadcast' => false,
app/Libraries/MyMISolflare.php:187:                'dry_run' => true,
app/Libraries/MyMISolflare.php:188:                'broadcast' => false,
app/Libraries/MyMISolflare.php:189:                'message' => 'Solana library dry-run/preflight response prepared. No transaction was broadcast.',
app/Libraries/MyMISolflare.php:198:            'dry_run' => false,
app/Libraries/MyMISolflare.php:199:            'broadcast' => false,
app/Libraries/MyMISolflare.php:200:            'message' => 'Solana library guard passed, but this adapter does not broadcast transactions directly.',

## Route Review For Preview/Quote/Mutation Paths
304:// Explicit Solana API smoke-test route for production case-sensitive URLs.
305:$routes->get('API/Solana/health', '\App\Modules\APIs\Controllers\SolanaAPIController::health');
517:        $routes->get('lookup/quote', 'DiscordAPIController::quoteLookup');
533:        $routes->post('issuance/mint', 'MditIssuanceAPIController::mint', ['filter' => 'permission:mdit.admin']);
638:            $routes->post('TBI-Coins/Prepare-Solana-Mint/(:num)', 'TbiProjectCoinsAPIController::prepareSolanaMint/$1', ['filter' => 'permission:admin.access']);
1211:    $routes->group('Solana', function($routes) {
1212:        $routes->get('getMarketPrice/(:segment)', 'SolanaAPIController::get/$1');
1213:        $routes->get('getCoinAmount/(:segment)', 'SolanaAPIController::getCoinAmount/$1');
1214:        $routes->get('getMarketPrice', 'SolanaAPIController::getMarketPrice');
1215:        $routes->get('getTokenPrice/(:segment)', 'SolanaAPIController::getTokenPrice/$1');
1216:        $routes->get('getExchangePrice/(:segment)', 'SolanaAPIController::getExchangePrice/$1');
1217:        $routes->get('getAssetsData', 'SolanaAPIController::getAssetsData');
1218:        $routes->get('provisionDefaultWallet', 'SolanaAPIController::provisionDefaultWallet');
1219:        $routes->get('updatePrices', 'SolanaAPIController::updateSolanaPrices');
1220:        $routes->get('updateTokens', 'SolanaAPIController::updateSolanaTokens');
1223:        $routes->get('health', 'SolanaAPIController::health');
1224:        $routes->get('wallet/(:segment)/balance', 'SolanaAPIController::getBalance/$1');
1225:        $routes->get('wallet/(:segment)/tokens', 'SolanaAPIController::getTokenAccounts/$1');
1226:        $routes->post('transfer', 'SolanaAPIController::transfer', ['filter' => 'csrf']);
1227:        $routes->post('swap/quote', 'SolanaAPIController::quote', ['filter' => 'csrf']);
1228:        $routes->post('swap/execute', 'SolanaAPIController::swap', ['filter' => 'csrf']);
1229:        $routes->post('token/create', 'SolanaAPIController::createToken', ['filter' => 'csrf']);
1230:        $routes->post('token/mint', 'SolanaAPIController::mint', ['filter' => 'csrf']);
1691:// Explicit Solana Exchange smoke-test routes for production case-sensitive URLs.
1692:$routes->get('Exchange/Solana', '\App\Modules\Exchange\Controllers\SolanaController::index', ['filter' => 'login']);
1693:$routes->get('Exchange/Solana/Swap', '\App\Modules\Exchange\Controllers\SolanaController::coinSwap', ['filter' => 'login']);
1694:$routes->get('Exchange/Solana/Assets', '\App\Modules\Exchange\Controllers\SolanaController::assets', ['filter' => 'login']);
1695:$routes->get('Exchange/Solana/Create', '\App\Modules\Exchange\Controllers\SolanaController::create', ['filter' => 'login']);
1729:    $routes->group('Solana', function($routes) {
1730:        $routes->get('', 'SolanaController::index', ['as' => 'mymi-solana']);
1731:        $routes->get('Test-Page', 'SolanaController::testPage', ['as' => 'mymi-solana-test-page']);
1732:        $routes->get('Assets', 'SolanaController::assets', ['as' => 'mymi-solana-assets']);
1733:        $routes->get('Create', 'SolanaController::create', ['as' => 'mymi-solana-create']);
1734:        $routes->get('Wallet/Disconnect/(:segment)', 'SolanaController::disconnectWallet/$1', ['as' => 'mymi-solana-create']);
1735:        $routes->get('Import', 'SolanaController::import', ['as' => 'mymi-solana-import']);
1736:        $routes->get('Swap', 'SolanaController::coinSwap', ['as' => 'mymi-solana-coin-swap']);
1737:        $routes->get('Create/Wallet', 'SolanaController::create', ['as' => 'mymi-solana-create-wallet']);
1738:        $routes->post('Create/Wallet', 'SolanaController::create', ['filter' => 'csrf']);
1739:        $routes->post('createSolanaWallet', 'SolanaController::createSolanaWallet', ['filter' => 'csrf']);
1740:        $routes->post('fetchFrontendData', 'SolanaController::fetchFrontendData', ['filter' => 'csrf']);
1741:        $routes->post('provisionDefaultWallet', 'SolanaController::provisionDefaultWallet', ['filter' => 'csrf']);
1742:        $routes->get('Import/Wallet', 'SolanaController::importWallet', ['as' => 'mymi-solana-import-wallet']);
1743:        $routes->post('Import/Wallet', 'SolanaController::importWallet', ['filter' => 'csrf']);
1744:        $routes->post('updatePrices', 'SolanaController::updateSolanaPrices', ['filter' => 'csrf']);
1745:        $routes->post('updateTokens', 'SolanaController::updateSolanaTokens', ['filter' => 'csrf']);
1746:        $routes->get('Wallet/Verify-Ownership', 'SolanaController::verifyWalletOwnership', ['as' => 'mymi-solana-verify-wallet']);
1747:        $routes->post('Wallet/Verify-Ownership', 'SolanaController::verifyWalletOwnership', ['filter' => 'csrf']);
1748:        $routes->get('Wallet/Execute-Swap', 'SolanaController::executeSwap', ['as' => 'mymi-solana-execute-swap']);
1749:        $routes->post('Wallet/Execute-Swap', 'SolanaController::executeSwap', ['filter' => 'csrf']);
1750:        $routes->get('Wallet/ViewAssets', 'SolanaController::viewAssets', ['as' => 'mymi-solana-view-assets']);
1751:        $routes->post('Wallet/ViewAssets', 'SolanaController::viewAssets', ['filter' => 'csrf']);
1752:        $routes->post('Wallet/Connect', 'SolanaController::connectWallet', ['as' => 'mymi-solana-connect-wallet', 'filter' => 'csrf']);
1753:        $routes->post('Wallet/Disconnect', 'SolanaController::disconnectWallet', ['as' => 'mymi-solana-disconnect-wallet', 'filter' => 'csrf']);
1754:        $routes->post('Wallet/Refresh', 'SolanaController::refreshWallet', ['as' => 'mymi-solana-refresh-wallet', 'filter' => 'csrf']);
1758:        $routes->post('Connect/MetaMask', 'SolanaController::connectWallet', ['as' => 'connect-wallet-metamask', 'filter' => 'csrf']);
1759:        $routes->post('Disconnect/MetaMask', 'SolanaController::disconnectWallet', ['as' => 'disconnect-wallet-metamask', 'filter' => 'csrf']);
1760:        $routes->post('Refresh/MetaMask', 'SolanaController::refreshWallet', ['as' => 'refresh-wallet-metamask', 'filter' => 'csrf']);
1762:        $routes->post('Connect/Solflare', 'SolanaController::connectWallet', ['as' => 'connect-wallet-solflare', 'filter' => 'csrf']);
1763:        $routes->post('Disconnect/Solflare', 'SolanaController::disconnectWallet', ['as' => 'disconnect-wallet-solflare', 'filter' => 'csrf']);
1764:        $routes->post('Refresh/Solflare', 'SolanaController::refreshWallet', ['as' => 'refresh-wallet-solflare', 'filter' => 'csrf']);
1766:        $routes->post('Connect/Phantom', 'SolanaController::connectWallet', ['as' => 'connect-wallet-phantom', 'filter' => 'csrf']);
1767:        $routes->post('Disconnect/Phantom', 'SolanaController::disconnectWallet', ['as' => 'disconnect-wallet-phantom', 'filter' => 'csrf']);
1768:        $routes->post('Refresh/Phantom', 'SolanaController::refreshWallet', ['as' => 'refresh-wallet-phantom', 'filter' => 'csrf']);
1770:        $routes->post('Connect/TrustWallet', 'SolanaController::connectWallet', ['as' => 'connect-wallet-trustwallet', 'filter' => 'csrf']);
1771:        $routes->post('Disconnect/TrustWallet', 'SolanaController::disconnectWallet', ['as' => 'disconnect-wallet-trustwallet', 'filter' => 'csrf']);
1772:        $routes->post('Refresh/TrustWallet', 'SolanaController::refreshWallet', ['as' => 'refresh-wallet-trustwallet', 'filter' => 'csrf']);
1972:    $routes->match(['GET', 'POST'], 'Coin-Swap', 'WalletsController::coinSwap', ['as' => 'wallets.coin-swap']);
1973:    $routes->match(['GET', 'POST'], 'Coin-Swap/(:segment)', 'WalletsController::coinSwap/$1', ['as' => 'wallets.coin-swap.segment']);
2017:    $routes->match(['GET', 'POST'], 'Transfer-Funds', 'WalletsController::transferFunds', ['as' => 'wallets.transfer-funds']);
2539:// BEGIN MyMI Solana public web route exposure
2540:// Explicit public aliases for Solana Exchange smoke-tested URLs.
2541:// These aliases preserve existing controller methods and do not enable minting/broadcasting.
2542:$routes->get('Exchange/Solana', '\App\Modules\Exchange\Controllers\SolanaController::index');
2543:$routes->get('Exchange/Solana/Swap', '\App\Modules\Exchange\Controllers\SolanaController::coinSwap');
2544:$routes->get('Exchange/Solana/Assets', '\App\Modules\Exchange\Controllers\SolanaController::assets');
2545:$routes->get('Exchange/Solana/Create', '\App\Modules\Exchange\Controllers\SolanaController::create');
2546:$routes->get('API/Solana/health', '\App\Modules\APIs\Controllers\SolanaAPIController::health');
2547:// END MyMI Solana public web route exposure

## View/Frontend Candidate Files
app/Commands/Ops/DiffWallet.php
app/Commands/Ops/WalletIntegrity.php
app/Commands/SolanaDigest.php
app/Commands/SolanaHealthcheck.php
app/Commands/SolanaTransactionAudit.php
app/Commands/SolanaWalletSecretsAudit.php
app/Commands/WalletsWarmSummaryCache.php
app/Config/Solana copy.bak
app/Config/Solana.php
app/Config/WalletConnect.php
app/Database/Migrations/2025-09-09-000040_CreatePredictionsTrades.php
app/Database/Migrations/2026-03-20-000120_CreateTradeAlertScannerMeta.php
app/Database/Migrations/2026-06-15-000100_AddScannerSourceToTradeAlerts.php
app/DTO/SwapQuoteDTO.php
app/DTO/WalletDTO.php
app/Helpers/asset_helper.php
app/Libraries/MyMIAssets.php
app/Libraries/MyMISnapTrader.php
app/Libraries/MyMISolana.php
app/Libraries/MyMITrustWallet.php
app/Libraries/MyMIWalletConnect.php
app/Libraries/MyMIWallet.php
app/Libraries/MyMIWallets.php
app/Libraries/TradeAlertMailboxFetcher.php
app/Libraries/Trades/TradeEnhancements.php
app/Models/AssetsModel.php
app/Models/Fin/TradeModel.php
app/Models/Marketing/MarketingVideoAssetModel.php
app/Models/MDIT/MditWalletModel.php
app/Models/Predictions/TradesModel.php
app/Models/SolanaModel.php
app/Models/TradeAlertScannerMetaModel.php
app/Models/WalletModel.php
app/Modules/APIs/Controllers/SolanaAPIController.php
app/Modules/APIs/Controllers/WalletsAPIController.php
app/Modules/CoinVault/Models/CoinWalletModel.php
app/Modules/CoinVault/Views/wallet.php
app/Modules/Exchange/Controllers/SolanaController.php
app/Modules/Exchange/Controllers/SolanaController.php.tmp
app/Modules/Exchange/Views/Coin_Listing_Asset_Information_Modal.php
app/Modules/Exchange/Views/Coin_Listing_Asset_Information.php
app/Modules/Exchange/Views/Solana/assets.php
app/Modules/Exchange/Views/Solana/coinSwap.php
app/Modules/Exchange/Views/Solana/connectWallet.php
app/Modules/Exchange/Views/Solana/createWallet.php
app/Modules/Exchange/Views/Solana/Disconnect/wallet.php
app/Modules/Exchange/Views/Solana/executeSwap.php
app/Modules/Exchange/Views/Solana/importWallet.php
app/Modules/Exchange/Views/Solana/swap.php
app/Modules/Exchange/Views/Solana/swap-working.php
app/Modules/Exchange/Views/Solana/trade.php
app/Modules/Exchange/Views/Solana/verifyWalletOwnership.php
app/Modules/Exchange/Views/Solana/viewWallet.php
app/Modules/Management/Controllers/AssetsAdminController.php
app/Modules/Management/Controllers/WalletsAdminController.php
app/Modules/Management/Views/Alerts/emails/trade_alerts.php
app/Modules/Management/Views/Alerts/form_fields/trade_alert_fields.php
app/Modules/Management/Views/Alerts/modals/addTrade.php
app/Modules/Management/Views/Alerts/modals/createTradeAlert.php
app/Modules/Management/Views/Alerts/modals/manageTradeAlert.php
app/Modules/Management/Views/Alerts/modals/viewTradeChart.php
app/Modules/Management/Views/Alerts/tradeAnalysis.php
app/Modules/Management/Views/Alerts/tradeDetails.php
app/Modules/Management/Views/Alerts/Trades.php
app/Modules/Management/Views/Assets/Applications/Details/Asset_Information.php
app/Modules/Management/Views/Marketing/Tools/Exchange/Solana.php
app/Modules/Management/Views/Partners/Active_Assets.php
app/Modules/Management/Views/Users/Assets.php
app/Modules/Management/Views/Wallets/Generate_Wallets.php
app/Modules/Management/Views/Web_Design/Content_Creator/Management/Wallets/Generate_Wallet.php
app/Modules/Management/Views/Web_Design/Test_Page/trade_tracker.php
app/Modules/PropFirms/Models/PropTradeJournalModel.php
app/Modules/User/Controllers/TradeTracker.php
app/Modules/User/Controllers/WalletsController.php
app/Modules/User/Views/Alerts/trades.php
app/Modules/User/Views/Investments/Add/Bond/trade.php
app/Modules/User/Views/Investments/Add/trade.php
app/Modules/User/Views/Investments/index/Asset_Watchlist.php
app/Modules/User/Views/Investments/index/Recent_Trades.php
app/Modules/User/Views/Investments/index/Top_Trades.php
app/Modules/User/Views/Investments/resources/manage_trade.php
app/Modules/User/Views/Investments/resources/share_trade.php
app/Modules/User/Views/Investments/tradeTracker copy 2.php
app/Modules/User/Views/Investments/tradeTracker copy.php
app/Modules/User/Views/Investments/tradeTracker-full-functionality.php
app/Modules/User/Views/Investments/tradeTracker.php
app/Modules/User/Views/Investments/tradeTracker-working-12082024.php
app/Modules/User/Views/Knowledgebase/Assets.php
app/Modules/User/Views/Knowledgebase/includes/Assets/asset_creator.php
app/Modules/User/Views/Knowledgebase/includes/Assets/asset_distribution.php
app/Modules/User/Views/Knowledgebase/includes/Assets/what_are_mymi_assets.php
app/Modules/User/Views/Knowledgebase/Integrating_Wallets.php
app/Modules/User/Views/Knowledgebase/Trade_Tracker.php
app/Modules/User/Views/Knowledgebase/Tutorials/Categories/Assets.php
app/Modules/User/Views/Knowledgebase/Tutorials/Categories/Wallets/Edit_Wallet.php
app/Modules/User/Views/Wallets/Add_Fiat_Wallet.php
app/Modules/User/Views/Wallets/Add/wallet-transaction-modal.php
app/Modules/User/Views/Wallets/Coin_Swap.php
app/Modules/User/Views/Wallets/Details/wallets.php
app/Modules/User/Views/Wallets/Edit/wallet-transaction-modal.php
app/Modules/User/Views/Wallets/Generate_Wallet.php
app/Modules/User/Views/Wallets/index/credit_wallets/MyMIWallet.php
app/Modules/User/Views/Wallets/index/credit_wallets.php
app/Modules/User/Views/Wallets/index/credit_wallets/Purchase_Wallet.php
app/Modules/User/Views/Wallets/index/credit_wallets/Wallet_Listing.php
app/Modules/User/Views/Wallets/index/crypto_wallets.php
app/Modules/User/Views/Wallets/index/crypto_wallets/Purchase_Wallet.php
app/Modules/User/Views/Wallets/index/crypto_wallets/Wallet_Listing.php
app/Modules/User/Views/Wallets/index/debt_wallets/MyMIWallet.php
app/Modules/User/Views/Wallets/index/debt_wallets.php
app/Modules/User/Views/Wallets/index/debt_wallets/Purchase_Wallet.php
app/Modules/User/Views/Wallets/index/debt_wallets/Wallet_Listing.php
app/Modules/User/Views/Wallets/index/fiat_wallets/MyMIWallet.php
app/Modules/User/Views/Wallets/index/fiat_wallets.php
app/Modules/User/Views/Wallets/index/fiat_wallets/Purchase_Wallet.php
app/Modules/User/Views/Wallets/index/fiat_wallets/Wallet_Listing-02242024.php
app/Modules/User/Views/Wallets/index/fiat_wallets/Wallet_Listing.php
app/Modules/User/Views/Wallets/index/financial_wallets/MyMIWallet.php
app/Modules/User/Views/Wallets/index/financial_wallets.php
app/Modules/User/Views/Wallets/index/financial_wallets/Purchase_Wallet.php
app/Modules/User/Views/Wallets/index/financial_wallets/Wallet_Listing.php
app/Modules/User/Views/Wallets/index/investment_wallets/MyMIWallet.php
app/Modules/User/Views/Wallets/index/investment_wallets.php
app/Modules/User/Views/Wallets/index/investment_wallets/Purchase_Wallet.php
app/Modules/User/Views/Wallets/index/investment_wallets/Wallet_Listing.php
app/Modules/User/Views/Wallets/index-orig/crypto_wallets.php
app/Modules/User/Views/Wallets/index-orig/crypto_wallets/Purchase_Wallet.php
app/Modules/User/Views/Wallets/index-orig/crypto_wallets/Wallet_Listing.php
app/Modules/User/Views/Wallets/index-orig/fiat_wallets/MyMIWallet.php
app/Modules/User/Views/Wallets/index-orig/fiat_wallets/Purchase_Wallet.php
app/Modules/User/Views/Wallets/index-orig/fiat_wallets/Wallet_Listing.php
app/Modules/User/Views/Wallets/index-orig/financial_wallets/MyMIWallet.php
app/Modules/User/Views/Wallets/index-orig/financial_wallets/Purchase_Wallet.php
app/Modules/User/Views/Wallets/index-orig/financial_wallets/Wallet_Listing.php
app/Modules/User/Views/Wallets/index-orig/plaid/crypto_wallets.php
app/Modules/User/Views/Wallets/index-orig/plaid/crypto_wallets/Purchase_Wallet.php
app/Modules/User/Views/Wallets/index-orig/plaid/fiat_wallets.php
app/Modules/User/Views/Wallets/index-orig/plaid/fiat_wallets/Purchase_Wallet.php
app/Modules/User/Views/Wallets/index-orig/plaid/financial_wallets.php
app/Modules/User/Views/Wallets/index/plaid/crypto_wallets.php
app/Modules/User/Views/Wallets/index/plaid/crypto_wallets/Purchase_Wallet.php
app/Modules/User/Views/Wallets/index/plaid/fiat_wallets.php
app/Modules/User/Views/Wallets/index/plaid/fiat_wallets/Purchase_Wallet.php
app/Modules/User/Views/Wallets/index/plaid/financial_wallets.php
app/Modules/User/Views/Wallets/index/Purchase_Wallet.php
app/Modules/User/Views/Wallets/Link_Account/Import-Trades.php
app/Modules/User/Views/Wallets/Link_Account (Original)/Import-Trades.php
app/Modules/User/Views/Wallets/Link_Account (Original)/TD-Ameritrade.php
app/Modules/User/Views/Wallets/Link_Account (Original)/Trade-Import-Success.php
app/Modules/User/Views/Wallets/Link_Account (Original)/Upload-Trades.php
app/Modules/User/Views/Wallets/Link_Account/TD-Ameritrade-07202022.php
app/Modules/User/Views/Wallets/Link_Account/TD-Ameritrade-B.php
app/Modules/User/Views/Wallets/Link_Account/TD-Ameritrade.php
app/Modules/User/Views/Wallets/Link_Account/Trade-Import-Success.php
app/Modules/User/Views/Wallets/Link_Account/Upload-Trades.php
app/Modules/User/Views/Wallets/MyMI_Wallet.php
app/Modules/User/Views/Wallets/types/credit_wallets.php
app/Modules/User/Views/Wallets/types/crypto_wallets.php
app/Modules/User/Views/Wallets/types/debt_wallets.php
app/Modules/User/Views/Wallets/types/financial_wallets.php
app/Modules/User/Views/Wallets/types/investment_wallets.php
app/Modules/User/Views/Wallets/types/wallets_block copy.php
app/Modules/User/Views/Wallets/types/wallets_block.php
app/Modules/User/Views/Wallets/Wallet_Generator.php
app/Modules/User/Views/Wallets/Wallet_Manager.php
app/Modules/User/Views/Wallets/Wallet_Selection.php
app/Services/SolanaService.php
app/Services/TradeAlertsIngest.php
app/Services/WalletService.php
app/Services/WalletSummaryCalculator.php
app/Services/WalletSummaryService.php
app/Views/Auth/register/Solana.php
public/assets/css/mymiwallet.mobile.css
public/assets/css/wallet-transactions.css
public/assets/documents/Exports/bf_exchanges_assets.csv
public/assets/documents/Exports/bf_users_trades.csv
public/assets/documents/Exports/bf_users_wallet.csv
public/assets/documents/Marketing/MyMI-Wallet-Marketing-Content-Generator.pdf
public/assets/images/Brokerages/TD-Ameritrade.png
public/assets/images/Company/MyMI-Wallet-Black.png
public/assets/images/Company/MyMI-Wallet-Company-Logo.png
public/assets/images/Company/MyMI-Wallet-Mobile-White.png
public/assets/images/Company/MyMI Wallet - The Future of Finance.png
public/assets/images/Company/MyMI-Wallet-The-Future-Of-Finance-SQ.png
public/assets/images/Company/MyMI-Wallet-White-213x70.png
public/assets/images/Company/MyMI-Wallet-White-LG.png
public/assets/images/Company/MyMI-Wallet-White.png
public/assets/images/Exchanges/Icons/mymiwallet-icon.png
public/assets/images/Marketing/Services/MyMIWallet-Customize-Your-Membership-Landing.png
public/assets/images/MyMI-Wallet-Logo-1024x1024.png
public/assets/images/MyMI-Wallet-Logo-Black.png
public/assets/images/MyMI-Wallet-Logo-White copy.png
public/assets/images/MyMI-Wallet-Logo-White.png
public/assets/images/MyMI-Wallet-Logo-White.svg
public/assets/images/MyMI-Wallet.png

## Frontend AJAX / Fetch Candidate Lines
app/Controllers/Home.php:287:    public function previewAlert(?string $symbol = null, ?string $exchangeSlug = null)
app/Controllers/Home.php:318:                log_message('error', 'Home::previewAlert metaService error: {msg}', ['msg' => $e->getMessage()]);
app/Controllers/Home.php:337:                log_message('error', 'Home::previewAlert alertsModel error: {msg}', ['msg' => $e->getMessage()]);
app/Controllers/Home.php:388:        return $this->renderTheme('themes/public/previewAlert', $data);
app/Database/Migrations/2026-06-21-000100_CreateApiGovernanceTables.php:24:            $this->forge->addUniqueKey(['uri', 'http_methods', 'controller', 'action'], 'uq_endpoint_signature');
app/Helpers/content_helper.php:25:if (!function_exists('format_summary_preview')) {
app/Helpers/content_helper.php:26:    function format_summary_preview(string $rawText, int $maxLength = 300): string
app/Helpers/content_helper.php:36:        $preview = mb_strlen($cleaned) > $maxLength
app/Helpers/content_helper.php:40:        return '<p>' . esc($preview) . '</p>';
app/Helpers/news_helper.php:3:if (! function_exists('miw_news_preview')) {
app/Helpers/news_helper.php:5:     * Generate a short, cleaned news preview for dashboard cards.
app/Helpers/news_helper.php:8:     * @param int         $maxChars Maximum length for preview (including ellipsis).
app/Helpers/news_helper.php:10:    function miw_news_preview(?string $text, int $maxChars = 240): string
app/Libraries/Traits/TextProcessor.php:763:    public static function previewFirstSentences(string $text, int $limit = 5): array
app/Libraries/Traits/TextProcessor.php:766:        $preview = array_slice($sentences, 0, $limit);
app/Libraries/Traits/TextProcessor.php:767:        log_message('debug', '✅ previewFirstSentences() - First sentences: ' . print_r($preview, true));
app/Libraries/Traits/TextProcessor.php:768:        return $preview;
app/Libraries/Webhooks/WebhookDispatcher.php:25:            'signature'       => $sig,
app/Libraries/CryptoCurrencyInterface.php:6:    // public function verifySignature($transaction, $signature, $publicKey);
app/Libraries/GitHelper.php:52:    public function previewDiff($repoKey)
app/Libraries/MyMIDigibyte.php:97:        $signature = $keyPair->sign($transaction);
app/Libraries/MyMIDigibyte.php:98:        return $signature->toDER('hex');
app/Libraries/MyMIDigibyte.php:101:    public function verifySignature($transaction, $signature, $publicKey) {
app/Libraries/MyMIDigibyte.php:103:        return $keyPair->verify($transaction, $signature);
app/Libraries/MyMIDigibyte.php:115:        $signature = $this->signTransaction($transactionJson, $privateKey);
app/Libraries/MyMIDigibyte.php:116:        $transaction['signature'] = $signature;
app/Libraries/MyMIEsportsStartGG.php:14:            ?? $headers['x-startgg-signature']
app/Libraries/MyMIEsportsStartGG.php:16:            ?? $headers['x-hub-signature-256']
app/Libraries/MyMIFractalAnalyzer.php:103:        // Placeholder array to simulate market data
app/Libraries/MyMIGemini.php:63:        $signature = hash_hmac('sha384', $payload, $this->apiSecret);
app/Libraries/MyMIGemini.php:70:            'X-GEMINI-SIGNATURE: ' . $signature,
app/Libraries/MyMIRaydium.php:146:                'dry_run' => true,
app/Libraries/MyMIRaydium.php:159:                'dry_run' => true,
app/Libraries/MyMIRaydium.php:172:                'dry_run' => true,
app/Libraries/MyMIRaydium.php:185:                'dry_run' => true,
app/Libraries/MyMIRaydium.php:187:                'message' => 'Solana library dry-run/preflight response prepared. No transaction was broadcast.',
app/Libraries/MyMIRaydium.php:196:            'dry_run' => false,
app/Libraries/MyMIMetaMask.php:106:    public function verifySignature($transaction, $signature, $publicKey)
app/Libraries/MyMIMetaMask.php:109:        $isValid = $eth->personal()->ecRecover($transaction, $signature) === $publicKey;
app/Libraries/MyMIMetaMask.php:202:    /** Verify EIP-191 signature and persist checksum address */
app/Libraries/MyMIMetaMask.php:203:    public function verify(string $address, string $signature): array
app/Libraries/MyMIMetaMask.php:214:            $recovered = Utils::personalEcRecover($msg, $signature);
app/Libraries/test.txt:329:                    } elseif ($pageURID === 'previewGeneratedPost') {
app/Libraries/test.txt:344:                            $viewPath                       = 'ManagementModule\Views\Marketing\modals\previewGeneratedPost';
app/Libraries/test.txt:347:                            return "Generated Post could not be previewed.";
app/Libraries/test.txt:1338:            return $this->fail('Summary too short to generate previews.');
app/Libraries/test.txt:1346:            return $this->failServerError('Failed to generate preview.');
app/Libraries/test.txt:2273:        // 📦 All recent summaries (used for buffer/preview blocks)
app/Libraries/test.txt:2871:            // Example: Fetch logo or simulate fetching process
app/Libraries/test.txt:3300:    public function previewBufferItem($id)
app/Libraries/test.txt:3307:    public function previewGeneratedPost($postId)
app/Libraries/test.txt:3341:        return $this->renderTheme('ManagementModule\Views\Marketing\modals\previewGeneratedPost', $this->data);
app/Libraries/test.txt:3344:    public function previewPendingSummaries()
app/Libraries/test.txt:3348:            return $this->renderTheme('App\Modules\Management\Views\Marketing\partials\previewPendingSummaries', [
app/Libraries/test.txt:3352:            log_message('error', '❌ previewPendingSummaries failed: ' . $e->getMessage());
app/Libraries/test.txt:3357:    public function previewVideoScript($id)
app/Libraries/test.txt:3365:        return $this->renderTheme('MarketingModule\Views\Marketing\modals\video_preview_modal', [
app/Libraries/test.txt:9286:            <em>Loading preview...</em>
app/Libraries/test.txt:9297:    fetch('<?= site_url("/API/Management/updateInsight") ?>', {
app/Libraries/test.txt:9322:    fetch('<?= site_url('/API/Marketing/generateLivePreview') ?>', {
app/Libraries/test.txt:9330:            const previewContainer = document.querySelector('.bg-light');
app/Libraries/test.txt:9331:            previewContainer.innerHTML = '';
app/Libraries/test.txt:9333:                previewContainer.innerHTML += `
app/Libraries/test.txt:9341:    .catch(err => console.error('Live preview failed', err));
app/Libraries/test.txt:9350:    fetch(`/index.php/API/Marketing/getTopKeywordChart/<?= esc($summary['id']) ?>`)
app/Libraries/test.txt:9384:    fetch(`/index.php/API/Marketing/generateThreadFromSummary/<?= esc($summary['id']) ?>`)
app/Libraries/test.txt:9498:    fetch(`/index.php/API/Marketing/PreviewGeneratedPost/${summaryId}`)
app/Libraries/test.txt:9519:        fetch(`/index.php/API/Marketing/getTopKeywordChart/${summaryId}`)
app/Libraries/test.txt:9568:                        <button class="btn btn-primary btn-sm" onclick='dynamicModalLoader("📋 Preview Generated Post", "<?= site_url('Management/Marketing/previewGeneratedPost/' . $post->id) ?>", "modal-lg")'>📋 Preview</button>
app/Libraries/test.txt:9634:                            <a href="javascript:void(0);" onclick="dynamicModalLoader('<?= site_url('/Management/Marketing/previewGeneratedPost/' . $id) ?>')" class="btn btn-primary btn-sm mt-auto">🔍 Preview Post</a>
app/Libraries/test.txt:9639:                                data-endpoint="previewGeneratedPost" 
app/Libraries/test.txt:9668:<div class="modal fade" id="previewPostModal" tabindex="-1" aria-labelledby="previewPostModalLabel" aria-hidden="true">
app/Libraries/test.txt:9672:        <h5 class="modal-title" id="previewPostModalLabel">🔍 Post Preview</h5>
app/Libraries/test.txt:9675:      <div class="modal-body" id="previewPostContent">
app/Libraries/test.txt:9690:    fetch('<?= site_url("API/Marketing/getTopKeywordChart/SUMMARY_ID_HERE") ?>')
app/Libraries/test.txt:9727:    const modal = new bootstrap.Modal(document.getElementById('previewPostModal'));
app/Libraries/test.txt:9728:    const content = document.getElementById('previewPostContent');
app/Libraries/test.txt:9741:    fetch(url)
app/Libraries/test.txt:9747:                content.innerHTML = `<div class="alert alert-danger">❌ Failed to load preview. Please try again.</div>`;
app/Libraries/test.txt:9751:            content.innerHTML = `<div class="alert alert-danger">❌ Error loading preview. Please try again.</div>`;
app/Libraries/test.txt:9752:            console.error('Error loading preview:', err);
app/Libraries/test.txt:9782:        const response = await fetch('<?=site_url('/API/Marketing/fetchGeneratedSummariesJson')?>');
app/Libraries/test.txt:9856:    const previewBtn = document.createElement('a');
app/Libraries/test.txt:9857:    previewBtn.className = 'btn btn-primary btn-sm mt-auto';
app/Libraries/test.txt:9858:    previewBtn.href = 'javascript:void(0);';
app/Libraries/test.txt:9859:    previewBtn.innerHTML = '🔍 Preview Post';
app/Libraries/test.txt:9860:    previewBtn.onclick = () => dynamicModalLoader('<?php echo site_url('/Management/Marketing/previewGeneratedPost'); ?>' + summary.id);
app/Libraries/test.txt:9862:    cardBody.append(title, date, summaryText, hashtagsBlock, ctaBlock, previewBtn);
app/Libraries/test.txt:10059:        fetch("<?= site_url('Marketing/fetchGeneratedSummariesBlock') ?>", {
app/Libraries/test.txt:10126:            const response = await fetch("<?= site_url('API/Marketing/generateDailyContentDigest') ?>");
app/Libraries/test.txt:10151:                const response = await fetch("<?= site_url('API/Marketing/generateContentFromScraper') ?>");
app/Libraries/test.txt:10176:            const response = await fetch("<?= site_url('API/Marketing/massResendActivationEmails') ?>", {
app/Libraries/test.txt:10206:            const response = await fetch("<?= site_url('API/Marketing/reprocessIncompleteEmails') ?>");
app/Libraries/test.txt:10220:            const response = await fetch(`<?= site_url('API/Management/approveBufferItem/') ?>${id}`, {
app/Libraries/test.txt:10240:        const container = document.getElementById('pending-summaries-preview');
app/Libraries/test.txt:10244:            const res = await fetch("<?= site_url('API/Marketing/previewPendingSummaries') ?>");
app/Libraries/test.txt:10248:            container.innerHTML = '❌ Failed to load previews.';
app/Libraries/test.txt:10256:            const response = await fetch(`<?= site_url('API/Management/rejectBufferItem/') ?>${id}`, {
app/Libraries/MyMIPhantom.php:7: * Phantom wallet adapter for Solana. Provides local signature challenges
app/Libraries/MyMIPhantom.php:60:    public function verify(string $address, string $signature): array
app/Libraries/MyMIPhantom.php:71:        $sigB   = $this->b58decode($signature);
app/Libraries/MyMIPhantom.php:153:                'dry_run' => true,
app/Libraries/MyMIPhantom.php:166:                'dry_run' => true,
app/Libraries/MyMIPhantom.php:179:                'dry_run' => true,
app/Libraries/MyMIPhantom.php:192:                'dry_run' => true,
app/Libraries/MyMIPhantom.php:194:                'message' => 'Solana library dry-run/preflight response prepared. No transaction was broadcast.',
app/Libraries/MyMIPhantom.php:203:            'dry_run' => false,
app/Libraries/MyMIInvestments.php:1296:                $impact = $this->simulateMarketScenario($symbol, $scenario);
app/Libraries/MyMIInvestments.php:2059:    public function simulateMarketScenario($symbol, $scenario)
app/Libraries/MyMIRobinhood.php:11: *  - Auth headers (x-api-key, x-timestamp, x-signature)
app/Libraries/MyMIRobinhood.php:118:    public function headers(string $apiKey, string $timestamp, string $signatureB64): array
app/Libraries/MyMIRobinhood.php:123:            'x-signature' => $signatureB64,
app/Libraries/MyMISecurity.php:382:    public function verifyDigitalSignature($data, $signature, $publicKey)
app/Libraries/MyMISecurity.php:384:        openssl_public_decrypt($signature, $decrypted, $publicKey);
app/Libraries/MyMISimulator.php:26:    public function simulateInvestmentScenarios($userId, $preferences)
app/Libraries/MyMISimulator.php:246:                $impact = $this->simulateMarketScenario($investment['symbol'], $scenario);
app/Libraries/MyMISimulator.php:258:    private function simulateMarketScenario($symbol, $scenario)
app/Libraries/MyMISimulator.php:282:                $impact = $this->simulateStressScenario($investment['symbol'], $scenario);
app/Libraries/MyMISimulator.php:294:    private function simulateStressScenario($symbol, $scenario)
app/Libraries/MyMISolflare.php:55:    public function verify(string $address, string $signature): array
app/Libraries/MyMISolflare.php:66:        $sigB   = $this->b58decode($signature);
app/Libraries/MyMISolflare.php:148:                'dry_run' => true,
app/Libraries/MyMISolflare.php:161:                'dry_run' => true,
app/Libraries/MyMISolflare.php:174:                'dry_run' => true,
app/Libraries/MyMISolflare.php:187:                'dry_run' => true,
app/Libraries/MyMISolflare.php:189:                'message' => 'Solana library dry-run/preflight response prepared. No transaction was broadcast.',
app/Libraries/MyMISolflare.php:198:            'dry_run' => false,
app/Libraries/MyMITrustWallet.php:57:    public function verify(string $chain, string $address, string $signature): array
app/Libraries/MyMITrustWallet.php:73:                $rec = Utils::personalEcRecover($msg, $signature);
app/Libraries/MyMITrustWallet.php:89:            $sigB  = $this->b58decode($signature);
app/Libraries/MyMIEsports.php:136:                ?? $headers['x-nexusarena-signature']
app/Libraries/MyMIEsports.php:138:                ?? $headers['x-esports-signature']
app/Libraries/MyMIEsports.php:155:        $provided = $headers['X-Esports-Signature'] ?? $headers['x-esports-signature'] ?? null;
app/Libraries/MyMIAlerts.php:776:        if (str_contains($lower, 'paper') || str_contains($lower, 'papermoney') || str_contains($lower, 'simulated')) {
app/Libraries/AlertSources/ManualEntrySource.php:14:    public function fetch(): array
app/Libraries/AlertSources/MarketAuxNewsSource.php:14:    public function fetch(): array
app/Libraries/AlertSources/ThinkOrSwimEmailSource.php:14:    public function fetch(): array
app/Libraries/AlertSourceInterface.php:11:    public function fetch(): array;
app/Libraries/MyMIDiscord.php:104:                'response_json' => ['dry_run' => true, 'channel_key' => $channelKey, 'payload' => $payload],
app/Libraries/MyMIMarketing.php:274:            ['role' => 'system', 'content' => 'Write concise marketing email drafts (headline, preview, body, CTA link). Return JSON array of drafts.'],
app/Libraries/MyMIMarketing.php:5509:            'score' => rand(75, 100), // For now, simulate score
app/Libraries/MyMISolana.php:256:        $transaction['signature'] = hash_hmac('sha256', json_encode($transaction), $privateKey);
app/Libraries/MyMISolana.php:260:    public function verifySignature($transaction, $signature, $publicKey)
app/Libraries/MyMISolana.php:263:        return hash_equals($validSignature, $signature);
app/Libraries/MyMISolana.php:770:            $existingTransaction = $this->solanaModel->getTransactionBySignature($transaction['signature']);
app/Libraries/MyMISolana.php:786:                    'wallet_id' => $transaction['signature'],
app/Libraries/ApiResearch/ApiUrlTester.php:41:                'body_preview'  => mb_substr($bodyText, 0, 2500),
app/Libraries/ApiResearch/ApiUrlTester.php:52:                'body_preview'  => '',
app/Libraries/ApiResearch/ApiDocsSummarizer.php:107:            $notes[] = 'Add a webhook controller endpoint plus signature verification and event logging.';
app/Libraries/ApiResearch/ApiExampleExtractor.php:35:            if (stripos($text, 'fetch(') !== false || stripos($text, 'axios.') !== false) {
app/Libraries/ApiResearch/ApiTaskGenerator.php:31:            $tasks[] = 'Create webhook endpoint controller and signature validation for ' . $providerSlug;
app/Libraries/AiOps/ChatGptClient.php:87:        $signature = json_encode([
app/Libraries/AiOps/ChatGptClient.php:93:        return sanitizeCacheKey('ai:' . $subsystem . ':' . sha1($signature));
app/Libraries/AiOps/CodexClient.php:85:        $signature = json_encode([
app/Libraries/AiOps/CodexClient.php:91:        return sanitizeCacheKey('ai:' . $subsystem . ':' . sha1($signature));
app/Libraries/Ops/Analyzers/ConfigLintAnalyzer.php:57:                    'Update Config/Services.php to match CI4 signatures.',
app/Libraries/Brokers/ThinkorSwimParser.php:187:        if (str_contains($lower, 'paper') || str_contains($lower, 'papermoney') || str_contains($lower, 'simulated')) {
app/Libraries/TradeAlertMailboxFetcher.php:20:    public function fetch(array $options = []): array
app/Libraries/TradeAlertMailboxFetcher.php:44:        $dryRun = (bool) ($options['dry_run'] ?? false);
app/Libraries/TradeAlertMailboxFetcher.php:51:        $canMoveToTarget = ! $dryRun;
app/Libraries/TradeAlertMailboxFetcher.php:59:            if (! $dryRun) {
app/Libraries/TradeAlertMailboxFetcher.php:84:                if ($dryRun) {
app/Libraries/TradeAlertMailboxFetcher.php:115:            if (! $dryRun && $summary['moved_to_target'] > 0) {
app/Models/InboundWebhookModel.php:10:    protected $allowedFields = ['source','idempotency_key','signature','payload_body','received_at','processed_at','status','notes'];
app/Models/MarketingModel.php:1488:            ->select('id, preview_headline, score')
app/Models/ProjectDistributionsModel.php:30:        return $this; // Not user-specific but keep signature for consistency.
app/Models/SolanaModel.php:229:    public function executeSwap($fromToken, $toToken, $amount, $privateKey, $fromAddress, $toAddress)
app/Models/SolanaModel.php:351:    public function getTransactionBySignature($signature)
app/Models/SolanaModel.php:354:        $builder->where('wallet_id', $signature)->limit(20)->get()->getResultArray();
app/Models/SolanaModel.php:359:     * Fetch recent signatures for a Solana address.
app/Models/SolanaModel.php:615:    public function verifySignature($publicKey, $signature, $message)
app/Models/WebhookOutboxModel.php:10:    protected $allowedFields = ['target_url','headers_json','body_json','signature','status','attempts','last_error','next_attempt_at','created_at','sent_at'];
app/Models/AIOpsInstructionModel.php:25:    'dry_run',
app/Views/themes/dashboard/layouts/custom-js copy.php:31:  $.ajaxSetup({ headers: { 'X-Requested-With': 'XMLHttpRequest' } });
app/Views/themes/dashboard/layouts/custom-js copy.php:261:    fetch('<?= base_url('/Exchange/Solana/createSolanaWallet') ?>', {
app/Views/themes/dashboard/layouts/custom-js copy.php:320:    fetch('<?= base_url('/Exchange/Solana/Import/Wallet') ?>', {
app/Views/themes/dashboard/layouts/custom-js copy.php:390:    $.ajax({
app/Views/themes/public/layouts/custom-jsb.php:53:        $.ajax({
app/Views/themes/public/previewAlert.orig.php:1:<?php // app/Views/themes/public/previewAlert.php ?>
app/Views/themes/public/previewAlert.orig.php:453:        const response = await fetch(url, requestOptions);
app/Views/themes/public/previewAlert.orig.php:454:        const preview = async () => {
app/Views/themes/public/previewAlert.orig.php:461:            const snippet = await preview();
app/Views/themes/public/previewAlert.orig.php:470:            const snippet = await preview();
app/Views/themes/public/exchange.php:330:$.ajaxSetup({
app/Views/themes/public/exchange.php:340:    $.ajax({
app/Views/themes/public/how_it_works/alerts.php:14:    'subtitle'  => $sectionTitles['stepsSubtitle'] ?? 'Build signal rules, preview triggers, and keep noise under control.',
app/Views/themes/public/previewAlert.php:1067:        const response = await fetch(url, requestOptions);
app/Views/themes/public/previewAlert.php:1068:        const preview = async () => {
app/Views/themes/public/previewAlert.php:1075:            const snippet = await preview();
app/Views/themes/public/previewAlert.php:1084:            const snippet = await preview();
app/Views/Auth/2fa_qrcode.php:41:            const response = await fetch(url, requestOptions);
app/Views/Auth/2fa_qrcode.php:42:            const preview = async () => {
app/Views/Auth/2fa_qrcode.php:49:                const snippet = await preview();
app/Views/Auth/2fa_qrcode.php:58:                const snippet = await preview();
app/Views/Auth/2fa_verify.php:41:            const response = await fetch(url, requestOptions);
app/Views/Auth/2fa_verify.php:42:            const preview = async () => {
app/Views/Auth/2fa_verify.php:49:                const snippet = await preview();
app/Views/Auth/2fa_verify.php:58:                const snippet = await preview();
app/Views/admin/health/index.php:75:            const response = await fetch('<?= esc(site_url('api/aiops/manual-run')) ?>', {
app/Modules/APIs/Controllers/MditWebhookAPIController.php:27:            return $this->failUnauthorized('Invalid webhook signature.');
app/Modules/APIs/Controllers/MditWebhookAPIController.php:89:        $signature = $this->request->getHeaderLine('X-Webhook-Signature');
app/Modules/APIs/Controllers/MditWebhookAPIController.php:90:        if ($signature === '') {
app/Modules/APIs/Controllers/MditWebhookAPIController.php:95:        $normalized = str_replace('sha256=', '', $signature);
app/Modules/APIs/Controllers/DiscordAPIController.php:249:            return $this->failForbidden('Invalid Discord signature.');
app/Modules/APIs/Controllers/DiscordAPIController.php:943:            log_message('warning', 'Discord signature verification failed: '.$e->getMessage());
app/Modules/APIs/Controllers/Webhooks/TradingViewAPIController.php:31:            'signature'       => $sig,
app/Modules/APIs/Controllers/Webhooks/TradingViewAPIController.php:38:            return $this->response->setStatusCode(401)->setJSON(['status'=>'error','message'=>'Invalid signature']);
app/Modules/APIs/Controllers/Webhooks/ZapierAPIController.php:29:            'source'=>'zapier','idempotency_key'=>$idk,'signature'=>$sig,
app/Modules/APIs/Controllers/Webhooks/ZapierAPIController.php:34:            return $this->response->setStatusCode(401)->setJSON(['status'=>'error','message'=>'Invalid signature']);
app/Modules/APIs/Controllers/SolanaAPIController.php:210:    public function executeSwap() {
app/Modules/APIs/Controllers/SolanaAPIController.php:211:        $guard = $this->solanaTransactionGuard('executeSwap');
app/Modules/APIs/Controllers/SolanaAPIController.php:243:                $swapResult = $this->MyMIRaydium->executeSwap($fromToken, $toToken, $amount);
app/Modules/APIs/Controllers/SolanaAPIController.php:637:        $dryRunRaw = $this->request->getPost('dry_run')
app/Modules/APIs/Controllers/SolanaAPIController.php:638:            ?? $this->request->getPost('dryRun')
app/Modules/APIs/Controllers/SolanaAPIController.php:639:            ?? $this->request->getGet('dry_run')
app/Modules/APIs/Controllers/SolanaAPIController.php:640:            ?? $this->request->getGet('dryRun')
app/Modules/APIs/Controllers/SolanaAPIController.php:643:        $dryRun = filter_var($dryRunRaw, FILTER_VALIDATE_BOOL, FILTER_NULL_ON_FAILURE);
app/Modules/APIs/Controllers/SolanaAPIController.php:644:        $dryRun = $dryRun === null ? true : $dryRun;
app/Modules/APIs/Controllers/SolanaAPIController.php:646:        $signature = trim((string) (
app/Modules/APIs/Controllers/SolanaAPIController.php:647:            $this->request->getPost('wallet_signature')
app/Modules/APIs/Controllers/SolanaAPIController.php:648:            ?? $this->request->getPost('signature')
app/Modules/APIs/Controllers/SolanaAPIController.php:661:                    'dry_run' => true,
app/Modules/APIs/Controllers/SolanaAPIController.php:671:                    'dry_run' => true,
app/Modules/APIs/Controllers/SolanaAPIController.php:683:                    'dry_run' => true,
app/Modules/APIs/Controllers/SolanaAPIController.php:695:                    'dry_run' => true,
app/Modules/APIs/Controllers/SolanaAPIController.php:707:                    'dry_run' => true,
app/Modules/APIs/Controllers/SolanaAPIController.php:713:        if (($config->requireWalletSignature ?? true) && $signature === '' && !$dryRun) {
app/Modules/APIs/Controllers/SolanaAPIController.php:716:                ->setJSON($this->jsonEnvelope(false, 'Wallet signature is required before Solana transaction execution.', [
app/Modules/APIs/Controllers/SolanaAPIController.php:719:                    'dry_run' => true,
app/Modules/APIs/Controllers/SolanaAPIController.php:721:                    'requires_field' => 'wallet_signature',
app/Modules/APIs/Controllers/SolanaAPIController.php:725:        if ($dryRun) {
app/Modules/APIs/Controllers/SolanaAPIController.php:728:                ->setJSON($this->jsonEnvelope(true, 'Solana transaction dry-run/preflight accepted. No transaction was broadcast.', [
app/Modules/APIs/Controllers/SolanaAPIController.php:731:                    'dry_run' => true,
app/Modules/APIs/Controllers/SolanaAPIController.php:881:                'reason' => 'wallet_signature_required',
app/Modules/APIs/Controllers/MarketingAPIController.php:1080:            return $this->fail('Summary too short to generate previews.');
app/Modules/APIs/Controllers/MarketingAPIController.php:1088:            return $this->failServerError('Failed to generate preview.');
app/Modules/APIs/Controllers/EsportsAPIController.php:28:    protected bool $dryRun;
app/Modules/APIs/Controllers/EsportsAPIController.php:45:        $this->dryRun          = (bool) env('ESPORTS_DRY_RUN', true);
app/Modules/APIs/Controllers/EsportsAPIController.php:243:            'status'        => $this->dryRun ? 'pending' : 'paid',
app/Modules/APIs/Controllers/EsportsAPIController.php:264:        if (! $this->dryRun) {
app/Modules/APIs/Controllers/EsportsAPIController.php:334:        if (! $this->dryRun) {
app/Modules/APIs/Controllers/EsportsAPIController.php:409:            log_message('error', 'Esports::receiveResultWebhook signature verification failed.');
app/Modules/APIs/Controllers/EsportsAPIController.php:410:            return $this->respond(['status' => 'error', 'message' => 'Invalid signature'], ResponseInterface::HTTP_UNAUTHORIZED);
app/Modules/APIs/Controllers/EsportsAPIController.php:421:                    'signature_valid'   => $isValid ? 1 : 0,
app/Modules/APIs/Controllers/EsportsAPIController.php:432:            log_message('warning', 'Esports::receiveResultWebhook signature invalid but accepted due to relaxed mode', ['webhook_id' => $webhookId]);
app/Modules/APIs/Controllers/EsportsAPIController.php:643:            'dry_run'  => $this->dryRun ? 1 : 0,
app/Modules/APIs/Controllers/EsportsAPIController.php:698:        if (! $this->dryRun) {
app/Modules/APIs/Controllers/EsportsAPIController.php:803:                        'notes'        => $this->dryRun ? 'DRY_RUN' : $record['notes'],
app/Modules/APIs/Controllers/EsportsAPIController.php:808:                    'status' => $this->dryRun ? 'pending' : 'processing',
app/Modules/APIs/Controllers/EsportsAPIController.php:809:                    'notes'  => $this->dryRun ? 'DRY_RUN' : null,
app/Modules/APIs/Controllers/EsportsAPIController.php:815:            if (! $this->dryRun && $markComplete) {
app/Modules/APIs/Controllers/EsportsAPIController.php:829:        if (! $this->dryRun && $markComplete) {
app/Modules/APIs/Controllers/EsportsAPIController.php:834:            'message' => $this->dryRun ? 'Payouts recorded in dry-run mode' : 'Payouts settlement initiated',
app/Modules/APIs/Controllers/AiOpsAPIController.php:129:        $signature  = $this->request->getHeaderLine('X-MyMI-Signature');
app/Modules/APIs/Controllers/AiOpsAPIController.php:132:        if ($userId === null && ! $this->isValidSignature($rawBody, $signature)) {
app/Modules/APIs/Controllers/AiOpsAPIController.php:182:        $signature = $this->request->getHeaderLine('X-MyMI-Signature');
app/Modules/APIs/Controllers/AiOpsAPIController.php:184:        if (! $this->isValidSignature($rawBody, $signature)) {
app/Modules/APIs/Controllers/AiOpsAPIController.php:185:            return $this->fail('Invalid signature', 401);
app/Modules/APIs/Controllers/AlertsAPIController.php:1917:    public function previewAdvisorVoiceover($userId)
app/Modules/APIs/Controllers/AlertsAPIController.php:1922:            return $this->renderTheme('advisor/voiceover_preview', [

## Required Phase 12 Patch Direction
- Add preview-first API behavior for swap/transfer/mint-like actions.
- Add signed-wallet simulation UX before any non-dry-run action.
- Return structured JSON preview envelopes with action, network, dry_run=true, broadcast=false, estimated fees, route/quote data if available, and signature_required=true.
- Add user-facing modal/section showing: token pair, amount, route, estimated output, slippage, fees, network, dry-run status, and wallet signature requirement.
- Do not enable mainnet broadcast.
- Do not enable mainnet minting.
- Do not accept private key submission.
- Keep existing CSRF/auth/wallet guards intact.

## PHP Lint
No syntax errors detected in app/Config/Solana.php
No syntax errors detected in app/Config/Routes.php
No syntax errors detected in app/Commands/SolanaWalletSecretsAudit.php
No syntax errors detected in app/Modules/Exchange/Controllers/SolanaController.php
No syntax errors detected in app/Modules/APIs/Controllers/SolanaAPIController.php
No syntax errors detected in app/Services/SolanaService.php
No syntax errors detected in app/Libraries/MyMISolana.php
No syntax errors detected in app/Libraries/MyMIRaydium.php
No syntax errors detected in app/Libraries/MyMIPhantom.php
No syntax errors detected in app/Libraries/MyMISolflare.php

## Result
- PASS: Phase 11 inspection generated.
- PASS: Guardrail baseline returned FAIL count: 0.
- PASS: No transaction broadcast command was intentionally executed.
- PASS: No mainnet minting was enabled.
