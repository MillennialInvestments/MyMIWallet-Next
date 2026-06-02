# Solana Transaction Safety + Mainnet Guardrails Inspection

- Generated UTC: `2026-06-02T14:34:28.354114+00:00`
- Branch: `hardening/solana-transaction-safety-mainnet-guardrails-phase-01`
- Repo path: `/home/mymiteam/mymiwallet/site/current`

## Risk Summary

- `transaction_like` matches: `168`
- `broadcast_or_send` matches: `15`
- `private_key_terms` matches: `30`
- `guard_terms` matches: `213`
- `json_response` matches: `101`
- `rpc_provider` matches: `171`

## Transaction-Like / Sensitive Method Inventory

| File | Line | Method | Private Key Terms | Broadcast/Send | Guard Terms | JSON Response | RPC Terms |
|---|---:|---|---:|---:|---:|---:|---:|
| `app/Modules/Exchange/Controllers/SolanaController.php` | 392 | `public function createSolanaWallet()` | yes | no | yes | yes | yes |
| `app/Modules/Exchange/Controllers/SolanaController.php` | 432 | `public function createToken()` | no | no | yes | yes | yes |
| `app/Modules/Exchange/Controllers/SolanaController.php` | 502 | `public function executeSwap()` | yes | no | no | yes | yes |
| `app/Modules/Exchange/Controllers/SolanaController.php` | 787 | `public function importWallet()` | yes | no | yes | yes | yes |
| `app/Modules/Exchange/Controllers/SolanaController.php` | 897 | `public function mintTokens()` | yes | no | yes | yes | yes |
| `app/Modules/Exchange/Controllers/SolanaController.php` | 984 | `public function purchaseSolana()` | no | no | no | yes | no |
| `app/Modules/Exchange/Controllers/SolanaController.php` | 1066 | `public function sellSolana()` | no | no | no | yes | no |
| `app/Modules/Exchange/Controllers/SolanaController.php` | 1118 | `public function swapSolana()` | no | no | no | yes | no |
| `app/Modules/Exchange/Controllers/SolanaController.php` | 1256 | `public function doSwap()` | no | no | yes | yes | no |
| `app/Modules/Exchange/Controllers/SolanaController.php` | 1430 | `private function jsonEnvelope()` | no | no | yes | no | yes |
| `app/Modules/Exchange/Controllers/SolanaController.php` | 1455 | `private function sanitizeWalletPayload()` | yes | no | yes | no | no |
| `app/Modules/Exchange/Controllers/SolanaController.php` | 1490 | `private function privateKeySubmissionDisabledResponse()` | no | no | yes | yes | yes |
| `app/Modules/APIs/Controllers/SolanaAPIController.php` | 137 | `public function createSolanaWallet()` | yes | no | yes | yes | yes |
| `app/Modules/APIs/Controllers/SolanaAPIController.php` | 177 | `public function createToken()` | no | no | yes | yes | yes |
| `app/Modules/APIs/Controllers/SolanaAPIController.php` | 200 | `public function executeSwap()` | yes | no | no | yes | yes |
| `app/Modules/APIs/Controllers/SolanaAPIController.php` | 358 | `public function importWallet()` | yes | no | yes | yes | yes |
| `app/Modules/APIs/Controllers/SolanaAPIController.php` | 533 | `public function transfer()` | no | no | no | yes | no |
| `app/Modules/APIs/Controllers/SolanaAPIController.php` | 540 | `public function quote()` | no | no | no | yes | no |
| `app/Modules/APIs/Controllers/SolanaAPIController.php` | 547 | `public function swap()` | no | no | no | yes | no |
| `app/Modules/APIs/Controllers/SolanaAPIController.php` | 554 | `public function mint()` | no | no | no | yes | no |
| `app/Modules/APIs/Controllers/SolanaAPIController.php` | 561 | `private function jsonEnvelope()` | no | no | yes | no | yes |
| `app/Modules/APIs/Controllers/SolanaAPIController.php` | 586 | `private function sanitizeWalletPayload()` | yes | no | yes | no | no |
| `app/Modules/APIs/Controllers/SolanaAPIController.php` | 692 | `private function privateKeySubmissionDisabledResponse()` | no | no | yes | yes | yes |
| `app/Services/SolanaService.php` | 114 | `public function transfer()` | no | yes | yes | no | no |
| `app/Services/SolanaService.php` | 131 | `public function swap()` | no | yes | yes | no | no |
| `app/Services/SolanaService.php` | 151 | `public function createToken()` | no | no | yes | no | no |
| `app/Services/SolanaService.php` | 165 | `public function mintTo()` | no | yes | yes | no | no |
| `app/Services/SolanaService.php` | 508 | `public function generateNewKeypair()` | yes | no | no | no | no |
| `app/Libraries/MyMISolana.php` | 239 | `public function generateWallet()` | yes | no | no | no | no |
| `app/Libraries/MyMISolana.php` | 254 | `public function signTransaction()` | yes | no | yes | no | no |
| `app/Libraries/MyMISolana.php` | 266 | `public function createToken()` | no | no | no | no | yes |
| `app/Libraries/MyMISolana.php` | 293 | `public function sendAsset()` | yes | yes | yes | no | no |
| `app/Libraries/MyMISolana.php` | 940 | `public function createSPLToken()` | no | yes | yes | no | yes |
| `app/Libraries/MyMISolana.php` | 956 | `public function mintTokens()` | no | yes | yes | no | yes |
| `app/Libraries/MyMISolana.php` | 1092 | `public function transfer()` | no | yes | yes | no | no |
| `app/Libraries/MyMISolana.php` | 1107 | `public function swap()` | no | yes | yes | no | no |
| `app/Libraries/MyMISolana.php` | 1122 | `public function createToken()` | no | no | yes | no | yes |
| `app/Libraries/MyMIRaydium.php` | 46 | `public function swap()` | no | no | no | no | yes |
| `app/Libraries/MyMIPhantom.php` | 95 | `public function transfer()` | no | no | no | no | no |
| `app/Libraries/MyMIPhantom.php` | 100 | `public function swap()` | no | no | no | no | no |
| `app/Libraries/MyMIPhantom.php` | 115 | `public function createToken()` | no | no | no | no | no |
| `app/Libraries/MyMISolflare.php` | 90 | `public function transfer()` | no | no | no | no | no |
| `app/Libraries/MyMISolflare.php` | 95 | `public function swap()` | no | no | no | no | no |
| `app/Libraries/MyMISolflare.php` | 110 | `public function createToken()` | no | no | no | no | no |

## Solana Route Inventory

| File | Line | Verb | Mutation GET Risk | Definition |
|---|---:|---|---:|---|
| `app/Config/Routes.php` | 202 | `GET` | no | `'Wallet/(:num)', 'CoinVaultController::wallet/$1'` |
| `app/Config/Routes.php` | 262 | `GET` | yes | `'/Purchase/MyMIGold', static fn() => redirect()->to(site_url('Wallets/Purchase/MyMI-Gold'), 301)` |
| `app/Config/Routes.php` | 269 | `GET` | yes | `'/Wallets/Purchase/Memberships/Pro', static fn() => redirect()->to(site_url('Memberships/Pro'), 301)` |
| `app/Config/Routes.php` | 305 | `GET` | no | `'API/Solana/health', '\App\Modules\APIs\Controllers\SolanaAPIController::health'` |
| `app/Config/Routes.php` | 390 | `GET` | yes | `'/Accounts/createLinkToken', 'AccountController::createLinkToken', ['as' => 'create-link-token']` |
| `app/Config/Routes.php` | 396 | `GET` | no | `'/MyMI-Wallet', 'WalletsController::MyMIWallet', ['as' => 'mymi-wallet']` |
| `app/Config/Routes.php` | 439 | `POST` | no | `'auth/logout', 'MobileAuthController::logout', ['filter' => 'apiToken']` |
| `app/Config/Routes.php` | 440 | `GET` | no | `'me', 'MobileAuthController::me', ['filter' => 'apiToken']` |
| `app/Config/Routes.php` | 519 | `POST` | no | `'createLinkToken', 'DiscordAPIController::createLinkToken'` |
| `app/Config/Routes.php` | 533 | `POST` | no | `'issuance/mint', 'MditIssuanceAPIController::mint', ['filter' => 'permission:mdit.admin']` |
| `app/Config/Routes.php` | 638 | `POST` | no | `'TBI-Coins/Prepare-Solana-Mint/(:num)', 'TbiProjectCoinsAPIController::prepareSolanaMint/$1', ['filter' => 'permission:admin.access']` |
| `app/Config/Routes.php` | 767 | `GET` | no | `'fetchPlaidLinkToken/(:segment)', 'BrokerAPIController::fetchPlaidLinkToken/$1'` |
| `app/Config/Routes.php` | 768 | `GET` | no | `'fetchPlaidLinkToken', 'BrokerAPIController::fetchPlaidLinkToken'` |
| `app/Config/Routes.php` | 806 | `GET` | yes | `'fetchRobinhoodTransfers/(:segment)', 'BrokerAPIController::fetchRobinhoodTransfers/$1'` |
| `app/Config/Routes.php` | 807 | `GET` | yes | `'fetchRobinhoodTransfers', 'BrokerAPIController::fetchRobinhoodTransfers'` |
| `app/Config/Routes.php` | 1134 | `MATCH` | no | `['GET', 'POST'], 'MyMI-Gold/Tasks/Add', 'WalletsAPIController::addUserGoldTasks'` |
| `app/Config/Routes.php` | 1212 | `GET` | no | `'getMarketPrice/(:segment)', 'SolanaAPIController::get/$1'` |
| `app/Config/Routes.php` | 1213 | `GET` | no | `'getCoinAmount/(:segment)', 'SolanaAPIController::getCoinAmount/$1'` |
| `app/Config/Routes.php` | 1214 | `GET` | no | `'getMarketPrice', 'SolanaAPIController::getMarketPrice'` |
| `app/Config/Routes.php` | 1215 | `GET` | no | `'getTokenPrice/(:segment)', 'SolanaAPIController::getTokenPrice/$1'` |
| `app/Config/Routes.php` | 1216 | `GET` | no | `'getExchangePrice/(:segment)', 'SolanaAPIController::getExchangePrice/$1'` |
| `app/Config/Routes.php` | 1217 | `GET` | no | `'getAssetsData', 'SolanaAPIController::getAssetsData'` |
| `app/Config/Routes.php` | 1218 | `GET` | no | `'provisionDefaultWallet', 'SolanaAPIController::provisionDefaultWallet'` |
| `app/Config/Routes.php` | 1219 | `GET` | no | `'updatePrices', 'SolanaAPIController::updateSolanaPrices'` |
| `app/Config/Routes.php` | 1220 | `GET` | no | `'updateTokens', 'SolanaAPIController::updateSolanaTokens'` |
| `app/Config/Routes.php` | 1223 | `GET` | no | `'health', 'SolanaAPIController::health'` |
| `app/Config/Routes.php` | 1224 | `GET` | no | `'wallet/(:segment)/balance', 'SolanaAPIController::getBalance/$1'` |
| `app/Config/Routes.php` | 1225 | `GET` | no | `'wallet/(:segment)/tokens', 'SolanaAPIController::getTokenAccounts/$1'` |
| `app/Config/Routes.php` | 1226 | `POST` | no | `'transfer', 'SolanaAPIController::transfer'` |
| `app/Config/Routes.php` | 1227 | `POST` | no | `'swap/quote', 'SolanaAPIController::quote'` |
| `app/Config/Routes.php` | 1228 | `POST` | no | `'swap/execute', 'SolanaAPIController::swap'` |
| `app/Config/Routes.php` | 1229 | `POST` | no | `'token/create', 'SolanaAPIController::createToken'` |
| `app/Config/Routes.php` | 1230 | `POST` | no | `'token/mint', 'SolanaAPIController::mint'` |
| `app/Config/Routes.php` | 1242 | `GET` | no | `'/', 'WalletsAPIController::index'` |
| `app/Config/Routes.php` | 1243 | `GET` | no | `'summary', 'WalletsAPIController::summary'` |
| `app/Config/Routes.php` | 1246 | `GET` | no | `'providers', 'WalletsAPIController::providers'` |
| `app/Config/Routes.php` | 1249 | `POST` | no | `'Create', 'WalletsAPIController::create'` |
| `app/Config/Routes.php` | 1250 | `PUT` | no | `'Update/(:num)', 'WalletsAPIController::update/$1'` |
| `app/Config/Routes.php` | 1251 | `DELETE` | no | `'Unlink/(:num)', 'WalletsAPIController::unlink/$1'` |
| `app/Config/Routes.php` | 1254 | `POST` | no | `'Link-Robinhood', 'WalletsAPIController::linkRobinhood'` |
| `app/Config/Routes.php` | 1255 | `POST` | no | `'Link-Snaptrade', 'WalletsAPIController::linkSnapTrade'` |
| `app/Config/Routes.php` | 1256 | `POST` | no | `'Snaptrade/Connect-URL', 'WalletsAPIController::getSnapTradeConnectUrl'` |
| `app/Config/Routes.php` | 1259 | `POST` | no | `'Banking/Update/(:num)', 'WalletsAPIController::updateBank/$1'` |
| `app/Config/Routes.php` | 1260 | `POST` | no | `'Credit/Update/(:num)', 'WalletsAPIController::updateCredit/$1'` |
| `app/Config/Routes.php` | 1261 | `POST` | no | `'Debt/Update/(:num)', 'WalletsAPIController::updateDebt/$1'` |
| `app/Config/Routes.php` | 1262 | `POST` | no | `'Investments/Update/(:num)','WalletsAPIController::updateInvestment/$1'` |
| `app/Config/Routes.php` | 1263 | `POST` | no | `'Crypto/Update/(:num)', 'WalletsAPIController::updateCrypto/$1'` |
| `app/Config/Routes.php` | 1266 | `GET` | no | `'Plaid/Config-Debug', 'WalletsAPIController::plaidConfigDebug'` |
| `app/Config/Routes.php` | 1267 | `GET` | no | `'Plaid/Env', 'WalletsAPIController::plaidEnv'` |
| `app/Config/Routes.php` | 1268 | `GET` | no | `'Plaid/OAuth-Return', 'WalletsAPIController::plaidOAuthReturn'` |
| `app/Config/Routes.php` | 1269 | `GET` | no | `'Plaid/Webhook', 'WalletsAPIController::plaidWebhook'` |
| `app/Config/Routes.php` | 1270 | `GET` | no | `'Plaid/Link-Token', 'WalletsAPIController::plaidLinkToken'` |
| `app/Config/Routes.php` | 1271 | `POST` | no | `'Plaid/Exchange', 'WalletsAPIController::plaidExchange'` |
| `app/Config/Routes.php` | 1272 | `POST` | no | `'Plaid/Refresh/(:num)', 'WalletsAPIController::refreshPlaidWallet/$1'` |
| `app/Config/Routes.php` | 1273 | `POST` | no | `'Plaid/Sync-Transactions/(:num)', 'WalletsAPIController::syncPlaidTransactions/$1'` |
| `app/Config/Routes.php` | 1275 | `GET` | no | `'/(:segment)/(:segment)', 'WalletsAPIController::index/$1/$2'` |
| `app/Config/Routes.php` | 1527 | `MATCH` | no | `['GET', 'POST'], 'MyMI-Gold/Tasks/Add', 'WalletsAdminController::addUserGoldTasks'` |
| `app/Config/Routes.php` | 1592 | `GET` | no | `'/', 'WalletsController::index'` |
| `app/Config/Routes.php` | 1593 | `GET` | no | `'Reconcile', 'WalletsController::reconcile'` |
| `app/Config/Routes.php` | 1594 | `POST` | no | `'EmailUserAboutIssue/(:num)/(:num)', 'WalletsController::emailUserAboutIssue/$1/$2'` |
| `app/Config/Routes.php` | 1692 | `GET` | no | `'Exchange/Solana', '\App\Modules\Exchange\Controllers\SolanaController::index', ['filter' => 'login']` |
| `app/Config/Routes.php` | 1693 | `GET` | yes | `'Exchange/Solana/Swap', '\App\Modules\Exchange\Controllers\SolanaController::coinSwap', ['filter' => 'login']` |
| `app/Config/Routes.php` | 1694 | `GET` | no | `'Exchange/Solana/Assets', '\App\Modules\Exchange\Controllers\SolanaController::assets', ['filter' => 'login']` |
| `app/Config/Routes.php` | 1695 | `GET` | yes | `'Exchange/Solana/Create', '\App\Modules\Exchange\Controllers\SolanaController::create', ['filter' => 'login']` |
| `app/Config/Routes.php` | 1703 | `POST` | no | `'provisionDefaultWallet', 'DigiByteController::provisionDefaultWallet', ['filter' => 'csrf']` |
| `app/Config/Routes.php` | 1704 | `POST` | no | `'disconnectWallet', 'DigiByteController::disconnectWallet', ['filter' => 'csrf']` |
| `app/Config/Routes.php` | 1705 | `POST` | no | `'refreshWallet', 'DigiByteController::refreshWallet', ['filter' => 'csrf']` |
| `app/Config/Routes.php` | 1707 | `POST` | no | `'createWallet', 'DigiByteController::createWallet', ['filter' => 'csrf']` |
| `app/Config/Routes.php` | 1708 | `POST` | no | `'connectWallet', 'DigiByteController::connectWallet', ['filter' => 'csrf']` |
| `app/Config/Routes.php` | 1712 | `POST` | no | `'connectWallet', 'MetaMaskController::connectWallet'` |
| `app/Config/Routes.php` | 1713 | `POST` | no | `'disconnectWallet', 'MetaMaskController::disconnectWallet'` |
| `app/Config/Routes.php` | 1714 | `POST` | no | `'refreshWallet', 'MetaMaskController::refreshWallet'` |
| `app/Config/Routes.php` | 1716 | `POST` | no | `'generateWallet', 'MetaMaskController::generateWallet'` |
| `app/Config/Routes.php` | 1730 | `GET` | no | `'', 'SolanaController::index', ['as' => 'mymi-solana']` |
| `app/Config/Routes.php` | 1731 | `GET` | no | `'Test-Page', 'SolanaController::testPage', ['as' => 'mymi-solana-test-page']` |
| `app/Config/Routes.php` | 1732 | `GET` | no | `'Assets', 'SolanaController::assets', ['as' => 'mymi-solana-assets']` |
| `app/Config/Routes.php` | 1733 | `GET` | yes | `'Create', 'SolanaController::create', ['as' => 'mymi-solana-create']` |
| `app/Config/Routes.php` | 1734 | `GET` | yes | `'Wallet/Disconnect/(:segment)', 'SolanaController::disconnectWallet/$1', ['as' => 'mymi-solana-create']` |
| `app/Config/Routes.php` | 1735 | `GET` | yes | `'Import', 'SolanaController::import', ['as' => 'mymi-solana-import']` |
| `app/Config/Routes.php` | 1736 | `GET` | yes | `'Swap', 'SolanaController::coinSwap', ['as' => 'mymi-solana-coin-swap']` |
| `app/Config/Routes.php` | 1737 | `GET` | yes | `'Create/Wallet', 'SolanaController::create', ['as' => 'mymi-solana-create-wallet']` |
| `app/Config/Routes.php` | 1738 | `POST` | no | `'Create/Wallet', 'SolanaController::create'` |
| `app/Config/Routes.php` | 1739 | `POST` | no | `'createSolanaWallet', 'SolanaController::createSolanaWallet'` |
| `app/Config/Routes.php` | 1740 | `POST` | no | `'fetchFrontendData', 'SolanaController::fetchFrontendData', ['filter' => 'csrf']` |
| `app/Config/Routes.php` | 1741 | `POST` | no | `'provisionDefaultWallet', 'SolanaController::provisionDefaultWallet', ['filter' => 'csrf']` |
| `app/Config/Routes.php` | 1742 | `GET` | yes | `'Import/Wallet', 'SolanaController::importWallet', ['as' => 'mymi-solana-import-wallet']` |
| `app/Config/Routes.php` | 1743 | `POST` | no | `'Import/Wallet', 'SolanaController::importWallet'` |
| `app/Config/Routes.php` | 1744 | `POST` | no | `'updatePrices', 'SolanaController::updateSolanaPrices'` |
| `app/Config/Routes.php` | 1745 | `POST` | no | `'updateTokens', 'SolanaController::updateSolanaTokens'` |
| `app/Config/Routes.php` | 1746 | `GET` | no | `'Wallet/Verify-Ownership', 'SolanaController::verifyWalletOwnership', ['as' => 'mymi-solana-verify-wallet']` |
| `app/Config/Routes.php` | 1747 | `POST` | no | `'Wallet/Verify-Ownership', 'SolanaController::verifyWalletOwnership'` |
| `app/Config/Routes.php` | 1748 | `GET` | yes | `'Wallet/Execute-Swap', 'SolanaController::executeSwap', ['as' => 'mymi-solana-execute-swap']` |
| `app/Config/Routes.php` | 1749 | `POST` | no | `'Wallet/Execute-Swap', 'SolanaController::executeSwap'` |
| `app/Config/Routes.php` | 1750 | `GET` | no | `'Wallet/ViewAssets', 'SolanaController::viewAssets', ['as' => 'mymi-solana-view-assets']` |
| `app/Config/Routes.php` | 1751 | `POST` | no | `'Wallet/ViewAssets', 'SolanaController::viewAssets'` |
| `app/Config/Routes.php` | 1752 | `POST` | no | `'Wallet/Connect', 'SolanaController::connectWallet', ['as' => 'mymi-solana-connect-wallet']` |
| `app/Config/Routes.php` | 1753 | `POST` | no | `'Wallet/Disconnect', 'SolanaController::disconnectWallet', ['as' => 'mymi-solana-disconnect-wallet']` |
| `app/Config/Routes.php` | 1754 | `POST` | no | `'Wallet/Refresh', 'SolanaController::refreshWallet', ['as' => 'mymi-solana-refresh-wallet']` |
| `app/Config/Routes.php` | 1758 | `POST` | no | `'Connect/MetaMask', 'SolanaController::connectWallet', ['as' => 'connect-wallet-metamask']` |
| `app/Config/Routes.php` | 1759 | `POST` | no | `'Disconnect/MetaMask', 'SolanaController::disconnectWallet', ['as' => 'disconnect-wallet-metamask']` |
| `app/Config/Routes.php` | 1760 | `POST` | no | `'Refresh/MetaMask', 'SolanaController::refreshWallet', ['as' => 'refresh-wallet-metamask']` |
| `app/Config/Routes.php` | 1762 | `POST` | no | `'Connect/Solflare', 'SolanaController::connectWallet', ['as' => 'connect-wallet-solflare']` |
| `app/Config/Routes.php` | 1763 | `POST` | no | `'Disconnect/Solflare', 'SolanaController::disconnectWallet', ['as' => 'disconnect-wallet-solflare']` |
| `app/Config/Routes.php` | 1764 | `POST` | no | `'Refresh/Solflare', 'SolanaController::refreshWallet', ['as' => 'refresh-wallet-solflare']` |
| `app/Config/Routes.php` | 1766 | `POST` | no | `'Connect/Phantom', 'SolanaController::connectWallet', ['as' => 'connect-wallet-phantom']` |
| `app/Config/Routes.php` | 1767 | `POST` | no | `'Disconnect/Phantom', 'SolanaController::disconnectWallet', ['as' => 'disconnect-wallet-phantom']` |
| `app/Config/Routes.php` | 1768 | `POST` | no | `'Refresh/Phantom', 'SolanaController::refreshWallet', ['as' => 'refresh-wallet-phantom']` |
| `app/Config/Routes.php` | 1770 | `POST` | no | `'Connect/TrustWallet', 'SolanaController::connectWallet', ['as' => 'connect-wallet-trustwallet']` |
| `app/Config/Routes.php` | 1771 | `POST` | no | `'Disconnect/TrustWallet', 'SolanaController::disconnectWallet', ['as' => 'disconnect-wallet-trustwallet']` |
| `app/Config/Routes.php` | 1772 | `POST` | no | `'Refresh/TrustWallet', 'SolanaController::refreshWallet', ['as' => 'refresh-wallet-trustwallet']` |
| `app/Config/Routes.php` | 1944 | `GET` | no | `'/', 'WalletsController::index', ['as' => 'wallets.index']` |
| `app/Config/Routes.php` | 1945 | `MATCH` | no | `['GET', 'POST'], 'All', 'WalletsController::all', ['as' => 'wallets.all']` |
| `app/Config/Routes.php` | 1946 | `MATCH` | no | `['GET', 'POST'], 'Account-Manager', 'WalletsController::accountManager', ['as' => 'wallets.account-manager']` |
| `app/Config/Routes.php` | 1947 | `MATCH` | no | `['GET', 'POST'], 'Add', 'WalletsController::add', ['as' => 'wallets.add']` |
| `app/Config/Routes.php` | 1948 | `MATCH` | no | `['GET', 'POST'], 'Add/(:segment)', 'WalletsController::add/$1', ['as' => 'wallets.add.segment']` |
| `app/Config/Routes.php` | 1949 | `MATCH` | no | `['GET', 'POST'], 'Add/(:segment)/(:segment)', 'WalletsController::addFetch/$1/$2', ['as' => 'wallets.add.segment.segment']` |
| `app/Config/Routes.php` | 1950 | `MATCH` | no | `['GET', 'POST'], 'Add/Bank-Account', 'WalletsController::createBankeAccount', ['as' => 'wallets.add.bank-account']` |
| `app/Config/Routes.php` | 1951 | `MATCH` | no | `['GET', 'POST'], 'Attach-Account', 'WalletsController::attachAccount', ['as' => 'wallets.attach-account']` |
| `app/Config/Routes.php` | 1952 | `MATCH` | no | `['GET', 'POST'], 'Attach-Account/(:segment)/(:segment)/(:segment)', 'WalletsController::attachAccount/$1/$2/$3', ['as' => 'wallets.attach-account.segment.segment.segment']` |
| `app/Config/Routes.php` | 1953 | `MATCH` | no | `['GET', 'POST'], 'Bank', 'WalletsController::bank', ['as' => 'wallets.bank']` |
| `app/Config/Routes.php` | 1954 | `MATCH` | no | `['GET', 'POST'], 'Banking', 'WalletsController::banking', ['as' => 'wallets.banking']` |
| `app/Config/Routes.php` | 1955 | `MATCH` | no | `['GET', 'POST'], 'Banking/Add/Account/(:segment)', 'WalletsController::add', ['as' => 'wallets.banking.add.account.segment']` |
| `app/Config/Routes.php` | 1956 | `MATCH` | no | `['GET', 'POST'], 'Banking/(:segment)', 'WalletsController::addAccount', ['as' => 'wallets.banking.segment']` |
| `app/Config/Routes.php` | 1957 | `MATCH` | no | `['GET', 'POST'], 'Banking/Details/(:segment)', 'WalletsController::details/$1', ['as' => 'wallets.banking.details.segment']` |
| `app/Config/Routes.php` | 1958 | `MATCH` | no | `['GET', 'POST'], 'Credit/Details/(:segment)', 'WalletsController::details/$1', ['as' => 'wallets.credit.details.segment']` |
| `app/Config/Routes.php` | 1959 | `MATCH` | no | `['GET', 'POST'], 'Debt/Details/(:segment)', 'WalletsController::details/$1', ['as' => 'wallets.debt.details.segment']` |
| `app/Config/Routes.php` | 1960 | `MATCH` | no | `['GET', 'POST'], 'Investment/Details/(:segment)', 'WalletsController::details/$1', ['as' => 'wallets.investment.details.segment']` |
| `app/Config/Routes.php` | 1961 | `MATCH` | no | `['GET', 'POST'], 'Crypto/Details/(:segment)', 'WalletsController::details/$1', ['as' => 'wallets.crypto.details.segment']` |
| `app/Config/Routes.php` | 1962 | `MATCH` | no | `['GET', 'POST'], 'Delete/(:segment)/(:segment)', 'WalletsController::delete/$1/$2', [ 'as' => 'wallets.delete.type.id', ]` |
| `app/Config/Routes.php` | 1965 | `MATCH` | no | `['GET', 'POST'], 'Banking/Edit/Account/(:segment)', 'WalletsController::editBankAccount/$1', ['as' => 'wallets.banking.edit.account.segment']` |
| `app/Config/Routes.php` | 1966 | `MATCH` | no | `['GET', 'POST'], 'Checking', 'WalletsController::checking', ['as' => 'wallets.checking']` |
| `app/Config/Routes.php` | 1967 | `MATCH` | no | `['GET', 'POST'], 'Credit/Edit/Account/(:segment)', 'WalletsController::editCreditAccount/$1'` |
| `app/Config/Routes.php` | 1968 | `MATCH` | no | `['GET', 'POST'], 'Crypto', 'WalletsController::crypto', ['as' => 'wallets.crypto']` |
| `app/Config/Routes.php` | 1969 | `MATCH` | no | `['GET', 'POST'], 'Create', 'WalletsController::generateWallet', ['as' => 'wallets.create']` |
| `app/Config/Routes.php` | 1970 | `MATCH` | no | `['GET', 'POST'], 'Credit', 'WalletsController::index', ['as' => 'wallets.credit']` |
| `app/Config/Routes.php` | 1971 | `MATCH` | no | `['GET', 'POST'], 'Credit/Details/(:segment)', 'WalletsController::details/$1'` |
| `app/Config/Routes.php` | 1972 | `MATCH` | no | `['GET', 'POST'], 'Coin-Swap', 'WalletsController::coinSwap', ['as' => 'wallets.coin-swap']` |
| `app/Config/Routes.php` | 1973 | `MATCH` | no | `['GET', 'POST'], 'Coin-Swap/(:segment)', 'WalletsController::coinSwap/$1', ['as' => 'wallets.coin-swap.segment']` |
| `app/Config/Routes.php` | 1974 | `MATCH` | no | `['GET', 'POST'], 'Complete/Purchase', 'WalletsController::completePurchase', ['as' => 'wallets.complete.purchase']` |
| `app/Config/Routes.php` | 1975 | `MATCH` | no | `['GET', 'POST'], 'Confirm-Deposit', 'WalletsController::confirmDeposit', ['as' => 'wallets.confirm.deposit']` |
| `app/Config/Routes.php` | 1976 | `MATCH` | no | `['GET', 'POST'], 'Debt', 'WalletsController::debt', ['as' => 'wallets.debt']` |
| `app/Config/Routes.php` | 1977 | `MATCH` | no | `['GET', 'POST'], 'Debt/Details/(:segment)', 'WalletsController::details/$1', ['as' => 'wallets.debt.details.segment']` |
| `app/Config/Routes.php` | 1978 | `MATCH` | no | `['GET', 'POST'], 'Debt/Edit/Account/(:segment)', 'WalletsController::editDebtAccount/$1', ['as' => 'wallets.debt.edit.account.segment']` |
| `app/Config/Routes.php` | 1979 | `MATCH` | no | `['GET', 'POST'], 'Deposit', 'WalletsController::deposit', ['as' => 'wallets.deposit']` |
| `app/Config/Routes.php` | 1980 | `MATCH` | no | `['GET', 'POST'], 'Deposit/Fetch', 'WalletsController::addDepositFetch', ['as' => 'wallets.deposit.fetch']` |
| `app/Config/Routes.php` | 1981 | `MATCH` | no | `['GET', 'POST'], 'Deposit/Complete', 'WalletsController::depositComplete', ['as' => 'wallets.deposit.complete']` |
| `app/Config/Routes.php` | 1982 | `MATCH` | no | `['GET', 'POST'], 'Deposit/Complete/(:segment)', 'WalletsController::depositComplete/$1', ['as' => 'wallets.deposit.complete.segment']` |
| `app/Config/Routes.php` | 1983 | `MATCH` | no | `['GET', 'POST'], 'Deposit/(:segment)', 'WalletsController::deposit/$1', ['as' => 'wallets.deposit.segment']` |
| `app/Config/Routes.php` | 1984 | `MATCH` | no | `['GET', 'POST'], 'Deposit/Funds', 'WalletsController::deposit', ['as' => 'wallets.deposit.funds']` |
| `app/Config/Routes.php` | 1985 | `MATCH` | no | `['GET', 'POST'], 'Details', 'WalletsController::details', ['as' => 'wallets.details']` |
| `app/Config/Routes.php` | 1986 | `MATCH` | no | `['GET', 'POST'], 'Edit', 'WalletsController::edit', ['as' => 'wallets.edit']` |
| `app/Config/Routes.php` | 1987 | `MATCH` | no | `['GET', 'POST'], 'Edit/(:segment)', 'WalletsController::edit/$1', ['as' => 'wallets.edit.segment']` |
| `app/Config/Routes.php` | 1988 | `MATCH` | no | `['GET', 'POST'], 'Edit/(:segment)/(:segment)', 'WalletsController::edit/$1/$2', ['as' => 'wallets.edit.segment.segment']` |
| `app/Config/Routes.php` | 1989 | `MATCH` | no | `['GET', 'POST'], 'Feature-Manager', 'WalletsController::featureManager', ['as' => 'wallets.feature-manager']` |
| `app/Config/Routes.php` | 1990 | `MATCH` | no | `['GET', 'POST'], 'Generate-Wallet', 'WalletsController::generateWallet', ['as' => 'wallets.generate-wallet']` |
| `app/Config/Routes.php` | 1991 | `MATCH` | no | `['GET', 'POST'], 'Investments', 'WalletsController::investments', ['as' => 'wallets.investments']` |
| `app/Config/Routes.php` | 1992 | `MATCH` | no | `['GET', 'POST'], 'Investment/Details/(:segment)', 'WalletsController::details/$1', ['as' => 'wallets.investment.details']` |
| `app/Config/Routes.php` | 1993 | `MATCH` | no | `['GET', 'POST'], 'Investment/Edit/Account/(:segment)', 'WalletsController::editInvestAccount/$1', ['as' => 'wallets.investment.edit']` |
| `app/Config/Routes.php` | 1994 | `MATCH` | no | `['GET', 'POST'], 'Link-Account', 'WalletsController::linkAccount', ['as' => 'wallets.link-account']` |
| `app/Config/Routes.php` | 1995 | `MATCH` | no | `['GET', 'POST'], 'Link-Account/(:segment)', 'WalletsController::linkAccount/$1', ['as' => 'wallets.link-account.segment']` |
| `app/Config/Routes.php` | 1996 | `MATCH` | no | `['GET', 'POST'], 'Link-Account/(:segment)/(:segment)', 'WalletsController::linkAccount/$1', ['as' => 'wallets.link-account.segment.segment']` |
| `app/Config/Routes.php` | 1997 | `MATCH` | no | `['GET', 'POST'], 'Link-Account/Success', 'WalletsController::linkAccountSuccess', ['as' => 'wallets.link-account.success']` |
| `app/Config/Routes.php` | 1998 | `MATCH` | no | `['GET', 'POST'], 'Link-Account/Success/(:segment)', 'WalletsController::linkAccountSuccess/$1', ['as' => 'wallets.link-account.success.segment']` |
| `app/Config/Routes.php` | 1999 | `MATCH` | no | `['GET', 'POST'], 'Manager', 'WalletsController::walletManager', ['as' => 'wallets.manager']` |
| `app/Config/Routes.php` | 2000 | `MATCH` | no | `['GET', 'POST'], 'Wallets/MyMIGPayPalCallback', 'WalletsController::handleMyMIGPayPalCallback'` |
| `app/Config/Routes.php` | 2001 | `MATCH` | no | `['GET', 'POST'], 'Purchase', 'WalletsController::purchase'` |
| `app/Config/Routes.php` | 2002 | `MATCH` | no | `['GET', 'POST'], 'Purchase-Manager', 'WalletsController::purchaseManager'` |
| `app/Config/Routes.php` | 2003 | `MATCH` | no | `['GET', 'POST'], 'Purchase/(:segment)', 'WalletsController::purchase'` |
| `app/Config/Routes.php` | 2004 | `MATCH` | no | `['GET', 'POST'], 'Purchase/Memberships/Customize', 'WalletsController::customizeMembership'` |
| `app/Config/Routes.php` | 2005 | `MATCH` | no | `['GET', 'POST'], 'Purchase/Memberships/Success', 'WalletsController::purchaseMembershipSuccess'` |
| `app/Config/Routes.php` | 2006 | `MATCH` | no | `['GET', 'POST'], 'Purchase/Memberships/(:segment)', 'WalletsController::purchase'` |
| `app/Config/Routes.php` | 2007 | `MATCH` | no | `['GET', 'POST'], 'Purchase/Memberships/(:segment)/(:segment)', 'WalletsController::purchase'` |
| `app/Config/Routes.php` | 2008 | `MATCH` | no | `['GET', 'POST'], 'Purchase/MyMI-Gold', 'WalletsController::purchaseGold'` |
| `app/Config/Routes.php` | 2009 | `MATCH` | no | `['GET', 'POST'], 'Purchase/(:segment)/Complete', 'WalletsController::purchaseComplete'` |
| `app/Config/Routes.php` | 2010 | `MATCH` | no | `['GET', 'POST'], 'Purchase/Complete/(:segment)', 'WalletsController::purchaseComplete/$1'` |
| `app/Config/Routes.php` | 2011 | `MATCH` | no | `['GET', 'POST'], 'Purchase/Complete/(:segment)/(:segment)', 'WalletsController::purchaseComplete/$1/$2'` |
| `app/Config/Routes.php` | 2012 | `MATCH` | no | `['GET', 'POST'], 'Purchase/MyMI-Gold', 'WalletsController::purchaseMyMIGold'` |
| `app/Config/Routes.php` | 2013 | `MATCH` | no | `['GET', 'POST'], 'Purchase/Complete/MyMI-Gold', 'WalletsController::purchaseMyMIGold'` |
| `app/Config/Routes.php` | 2014 | `MATCH` | no | `['GET', 'POST'], 'Purchase/Complete/MyMI-Gold/(:segment)', 'WalletsController::purchaseMyMIGold'` |
| `app/Config/Routes.php` | 2015 | `MATCH` | no | `['GET', 'POST'], 'Purchase/MyMI-Gold/Complete/(:segment)', 'WalletsController::purchaseComplete/$1'` |
| `app/Config/Routes.php` | 2016 | `MATCH` | no | `['GET', 'POST'], 'Purchase/MyMIGold/Security/(:segment)', 'WalletsController::securityViolation'` |
| `app/Config/Routes.php` | 2017 | `MATCH` | no | `['GET', 'POST'], 'Transfer-Funds', 'WalletsController::transferFunds', ['as' => 'wallets.transfer-funds']` |
| `app/Config/Routes.php` | 2018 | `MATCH` | no | `['GET', 'POST'], 'Wallet-Generator', 'WalletsController::walletGenerator', ['as' => 'wallets.generator']` |
| `app/Config/Routes.php` | 2019 | `MATCH` | no | `['GET', 'POST'], 'Wallet-Selection', 'WalletsController::walletSelections', ['as' => 'wallets.selection']` |
| `app/Config/Routes.php` | 2020 | `MATCH` | no | `['GET', 'POST'], 'Wallet-Transactions', 'WalletsController::walletTransaction', ['as' => 'wallets.transactions']` |
| `app/Config/Routes.php` | 2021 | `MATCH` | no | `['GET', 'POST'], 'Wallet-Transaction/(:segment)', 'WalletsController::walletTransaction/$1', ['as' => 'wallets.transactions.segment']` |
| `app/Config/Routes.php` | 2022 | `MATCH` | no | `['GET', 'POST'], 'Withdraw', 'WalletsController::withdraw', ['as' => 'wallets.withdraw']` |
| `app/Config/Routes.php` | 2023 | `MATCH` | no | `['GET', 'POST'], 'Withdraw/(:segment)', 'WalletsController::withdraw/$1', ['as' => 'wallets.withdraw.segment']` |
| `app/Config/Routes.php` | 2024 | `MATCH` | no | `['GET', 'POST'], 'Withdraw/Fetch', 'WalletsController::addWithdrawFetch', ['as' => 'wallets.withdraw.fetch']` |
| `app/Config/Routes.php` | 2074 | `GET` | no | `'Integrating-Wallets', 'KnowledgebaseController::integratingWallets'` |
| `app/Config/Routes.php` | 2319 | `MATCH` | no | `['GET', 'POST'], 'MyMI-Gold/Tasks/Add', 'WalletsController::addUserGoldTasks'` |
| `app/Config/Routes.php` | 2338 | `MATCH` | no | `['GET', 'POST'], 'MyMI-Gold/Tasks/Add', 'WalletsController::addUserGoldTasks'` |
| `app/Config/Routes.php` | 2392 | `GET` | no | `'/', 'WalletsController::index'` |
| `app/Config/Routes.php` | 2542 | `GET` | no | `'Exchange/Solana', '\App\Modules\Exchange\Controllers\SolanaController::index'` |
| `app/Config/Routes.php` | 2543 | `GET` | yes | `'Exchange/Solana/Swap', '\App\Modules\Exchange\Controllers\SolanaController::coinSwap'` |
| `app/Config/Routes.php` | 2544 | `GET` | no | `'Exchange/Solana/Assets', '\App\Modules\Exchange\Controllers\SolanaController::assets'` |
| `app/Config/Routes.php` | 2545 | `GET` | yes | `'Exchange/Solana/Create', '\App\Modules\Exchange\Controllers\SolanaController::create'` |
| `app/Config/Routes.php` | 2546 | `GET` | no | `'API/Solana/health', '\App\Modules\APIs\Controllers\SolanaAPIController::health'` |

## Files Inspected

- `app/Modules/Exchange/Controllers/SolanaController.php`: found
- `app/Modules/APIs/Controllers/SolanaAPIController.php`: found
- `app/Services/SolanaService.php`: found
- `app/Libraries/MyMISolana.php`: found
- `app/Libraries/MyMIRaydium.php`: found
- `app/Libraries/MyMIPhantom.php`: found
- `app/Libraries/MyMISolflare.php`: found
- `app/Config/Solana.php`: found
- `app/Config/Routes.php`: found

## Required Next Checks

- Verify every swap/mint/transfer/create-wallet/import-wallet action has auth and CSRF where applicable.
- Verify every transaction-like action supports dry-run, quote, simulation, or preflight before any broadcast.
- Verify mainnet execution is disabled unless explicit config flags and environment gates allow it.
- Verify private keys, encrypted secrets, seed phrases, and wallet secrets are never logged or returned.
- Verify JSON errors use safe envelopes instead of raw exceptions or raw 500 output.
- Verify wallet signature requirements before any user-authorized transaction.
- Verify route methods do not expose transaction mutation over GET.

## Notes

- This report is inspection-only.
- It does not execute Solana RPC mutations.
- It does not print private key values or encrypted secret values.
- Follow-up hardening should patch guardrails only after this inventory is reviewed.
