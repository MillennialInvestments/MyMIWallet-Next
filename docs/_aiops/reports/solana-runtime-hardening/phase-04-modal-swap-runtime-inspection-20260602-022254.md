# Solana Runtime Hardening - Phase 04 Modal + Swap Runtime Inspection

- Generated UTC: Tue Jun  2 02:22:55 AM UTC 2026
- Branch: hardening/solana-exchange-runtime-phase-01
- HEAD: 211eea982

## Objective

Inspect Solana modal, swap, quote, token price, coin amount, wallet, and dynamicModalLoader runtime paths before applying endpoint hardening.

## Git State

```text
?? docs/_aiops/reports/solana-runtime-hardening/phase-04-modal-swap-runtime-inspection-20260602-022254.md
211eea982 Record Solana token normalizer validation pass
c99b19b9a Normalize Solana token payload contract
4c03d3b22 Inspect Solana token payload contract
041b8e540 Record authenticated Solana runtime contract pass
8e6a65201 Prepare authenticated Solana runtime contract testing
7b7699131 Inventory Solana Exchange runtime hardening targets
```

## Relevant Routes

```text
| GET     | API/Solana/health                                                           | »                                              | \App\Modules\APIs\Controllers\SolanaAPIController::health                                             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Discord/lookup/quote                                                    | »                                              | \App\Modules\APIs\Controllers\DiscordAPIController::quoteLookup                                       | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Broker/fetchRobinhoodQuotes/([^/]+)                                     | »                                              | \App\Modules\APIs\Controllers\BrokerAPIController::fetchRobinhoodQuotes/$1                            | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Broker/fetchRobinhoodQuotes                                             | »                                              | \App\Modules\APIs\Controllers\BrokerAPIController::fetchRobinhoodQuotes                               | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Broker/fetchRobinhoodCryptoQuotes/([^/]+)                               | »                                              | \App\Modules\APIs\Controllers\BrokerAPIController::fetchRobinhoodCryptoQuotes/$1                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Broker/fetchRobinhoodCryptoQuotes                                       | »                                              | \App\Modules\APIs\Controllers\BrokerAPIController::fetchRobinhoodCryptoQuotes                         | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Solana/getMarketPrice/([^/]+)                                           | »                                              | \App\Modules\APIs\Controllers\SolanaAPIController::get/$1                                             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Solana/getCoinAmount/([^/]+)                                            | »                                              | \App\Modules\APIs\Controllers\SolanaAPIController::getCoinAmount/$1                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Solana/getMarketPrice                                                   | »                                              | \App\Modules\APIs\Controllers\SolanaAPIController::getMarketPrice                                     | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Solana/getTokenPrice/([^/]+)                                            | »                                              | \App\Modules\APIs\Controllers\SolanaAPIController::getTokenPrice/$1                                   | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Solana/getExchangePrice/([^/]+)                                         | »                                              | \App\Modules\APIs\Controllers\SolanaAPIController::getExchangePrice/$1                                | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Solana/getAssetsData                                                    | »                                              | \App\Modules\APIs\Controllers\SolanaAPIController::getAssetsData                                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Solana/provisionDefaultWallet                                           | »                                              | \App\Modules\APIs\Controllers\SolanaAPIController::provisionDefaultWallet                             | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Solana/updatePrices                                                     | »                                              | \App\Modules\APIs\Controllers\SolanaAPIController::updateSolanaPrices                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Solana/updateTokens                                                     | »                                              | \App\Modules\APIs\Controllers\SolanaAPIController::updateSolanaTokens                                 | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Solana/wallet/([^/]+)/balance                                           | »                                              | \App\Modules\APIs\Controllers\SolanaAPIController::getBalance/$1                                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | API/Solana/wallet/([^/]+)/tokens                                            | »                                              | \App\Modules\APIs\Controllers\SolanaAPIController::getTokenAccounts/$1                                | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| GET     | Dashboard/Transaction-Modal/([^/]+)                                         | load-modal-1-segment                           | \App\Modules\User\Controllers\DashboardController::loadModalContent/$1                                | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login noStore           | noStore login cspoff sessionTracker requestLifecycle observability jsonException toolbar                   |
| GET     | Dashboard/Transaction-Modal/([^/]+)/([^/]+)                                 | load-modal-2-segment                           | \App\Modules\User\Controllers\DashboardController::loadModalContent/$1/$2                             | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login noStore           | noStore login cspoff sessionTracker requestLifecycle observability jsonException toolbar                   |
| GET     | Dashboard/Transaction-Modal/([^/]+)/([^/]+)/([^/]+)                         | load-modal-3-segment                           | \App\Modules\User\Controllers\DashboardController::loadModalContent/$1/$2/$3                          | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login noStore           | noStore login cspoff sessionTracker requestLifecycle observability jsonException toolbar                   |
| GET     | Dashboard/Transaction-Modal/([^/]+)/([^/]+)/([^/]+)/([^/]+)                 | load-modal-4-segment                           | \App\Modules\User\Controllers\DashboardController::loadModalContent/$1/$2/$3/$4                       | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login noStore           | noStore login cspoff sessionTracker requestLifecycle observability jsonException toolbar                   |
| GET     | Dashboard/Transaction-Modal/([^/]+)/([^/]+)/([^/]+)/([^/]+)/([^/]+)         | load-modal-5-segment                           | \App\Modules\User\Controllers\DashboardController::loadModalContent/$1/$2/$3/$4/$5                    | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login noStore           | noStore login cspoff sessionTracker requestLifecycle observability jsonException toolbar                   |
| GET     | Dashboard/Transaction-Modal/([^/]+)/([^/]+)/([^/]+)/([^/]+)/([^/]+)/([^/]+) | load-modal-6-segment                           | \App\Modules\User\Controllers\DashboardController::loadModalContent/$1/$2/$3/$4/$5/$6                 | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login noStore           | noStore login cspoff sessionTracker requestLifecycle observability jsonException toolbar                   |
| GET     | Exchange/Solana                                                             | »                                              | \App\Modules\Exchange\Controllers\SolanaController::index                                             | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| GET     | Exchange/Solana/Swap                                                        | »                                              | \App\Modules\Exchange\Controllers\SolanaController::coinSwap                                          | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| GET     | Exchange/Solana/Assets                                                      | »                                              | \App\Modules\Exchange\Controllers\SolanaController::assets                                            | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| GET     | Exchange/Solana/Create                                                      | »                                              | \App\Modules\Exchange\Controllers\SolanaController::create                                            | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| GET     | Exchange/Solana/Test-Page                                                   | mymi-solana-test-page                          | \App\Modules\Exchange\Controllers\SolanaController::testPage                                          | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| GET     | Exchange/Solana/Wallet/Disconnect/([^/]+)                                   | mymi-solana-create                             | \App\Modules\Exchange\Controllers\SolanaController::disconnectWallet/$1                               | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| GET     | Exchange/Solana/Import                                                      | mymi-solana-import                             | \App\Modules\Exchange\Controllers\SolanaController::import                                            | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| GET     | Exchange/Solana/Create/Wallet                                               | mymi-solana-create-wallet                      | \App\Modules\Exchange\Controllers\SolanaController::create                                            | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| GET     | Exchange/Solana/Import/Wallet                                               | mymi-solana-import-wallet                      | \App\Modules\Exchange\Controllers\SolanaController::importWallet                                      | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| GET     | Exchange/Solana/Wallet/Verify-Ownership                                     | mymi-solana-verify-wallet                      | \App\Modules\Exchange\Controllers\SolanaController::verifyWalletOwnership                             | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| GET     | Exchange/Solana/Wallet/Execute-Swap                                         | mymi-solana-execute-swap                       | \App\Modules\Exchange\Controllers\SolanaController::executeSwap                                       | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| GET     | Exchange/Solana/Wallet/ViewAssets                                           | mymi-solana-view-assets                        | \App\Modules\Exchange\Controllers\SolanaController::viewAssets                                        | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| GET     | Wallets/Coin-Swap                                                           | wallets.coin-swap                              | \App\Modules\User\Controllers\WalletsController::coinSwap                                             | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login noStore           | noStore login cspoff sessionTracker requestLifecycle observability jsonException toolbar                   |
| GET     | Wallets/Coin-Swap/([^/]+)                                                   | wallets.coin-swap.segment                      | \App\Modules\User\Controllers\WalletsController::coinSwap/$1                                          | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login noStore           | noStore login cspoff sessionTracker requestLifecycle observability jsonException toolbar                   |
| POST    | API/Management/Projects/TBI-Coins/Prepare-Solana-Mint/([0-9]+)              | »                                              | \App\Modules\APIs\Controllers\TbiProjectCoinsAPIController::prepareSolanaMint/$1                      | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked cronKey permission:admin.access                    | permission:admin.access cronKey cspoff sessionTracker requestLifecycle observability jsonException toolbar |
| POST    | API/Solana/transfer                                                         | »                                              | \App\Modules\APIs\Controllers\SolanaAPIController::transfer                                           | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Solana/swap/quote                                                       | »                                              | \App\Modules\APIs\Controllers\SolanaAPIController::quote                                              | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Solana/swap/execute                                                     | »                                              | \App\Modules\APIs\Controllers\SolanaAPIController::swap                                               | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Solana/token/create                                                     | »                                              | \App\Modules\APIs\Controllers\SolanaAPIController::createToken                                        | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | API/Solana/token/mint                                                       | »                                              | \App\Modules\APIs\Controllers\SolanaAPIController::mint                                               | botBlocker requestLifecycle observability ratelimit throttle sessionRevoked                                                    | cspoff sessionTracker requestLifecycle observability jsonException toolbar                                 |
| POST    | Exchange/Solana/Create/Wallet                                               | »                                              | \App\Modules\Exchange\Controllers\SolanaController::create                                            | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/Solana/createSolanaWallet                                          | »                                              | \App\Modules\Exchange\Controllers\SolanaController::createSolanaWallet                                | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/Solana/fetchFrontendData                                           | »                                              | \App\Modules\Exchange\Controllers\SolanaController::fetchFrontendData                                 | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | csrf login cspoff sessionTracker requestLifecycle observability jsonException toolbar                      |
| POST    | Exchange/Solana/provisionDefaultWallet                                      | »                                              | \App\Modules\Exchange\Controllers\SolanaController::provisionDefaultWallet                            | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | csrf login cspoff sessionTracker requestLifecycle observability jsonException toolbar                      |
| POST    | Exchange/Solana/Import/Wallet                                               | »                                              | \App\Modules\Exchange\Controllers\SolanaController::importWallet                                      | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/Solana/updatePrices                                                | »                                              | \App\Modules\Exchange\Controllers\SolanaController::updateSolanaPrices                                | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/Solana/updateTokens                                                | »                                              | \App\Modules\Exchange\Controllers\SolanaController::updateSolanaTokens                                | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/Solana/Wallet/Verify-Ownership                                     | »                                              | \App\Modules\Exchange\Controllers\SolanaController::verifyWalletOwnership                             | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/Solana/Wallet/Execute-Swap                                         | »                                              | \App\Modules\Exchange\Controllers\SolanaController::executeSwap                                       | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/Solana/Wallet/ViewAssets                                           | »                                              | \App\Modules\Exchange\Controllers\SolanaController::viewAssets                                        | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/Solana/Wallet/Connect                                              | mymi-solana-connect-wallet                     | \App\Modules\Exchange\Controllers\SolanaController::connectWallet                                     | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/Solana/Wallet/Disconnect                                           | mymi-solana-disconnect-wallet                  | \App\Modules\Exchange\Controllers\SolanaController::disconnectWallet                                  | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/Solana/Wallet/Refresh                                              | mymi-solana-refresh-wallet                     | \App\Modules\Exchange\Controllers\SolanaController::refreshWallet                                     | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/Wallet/Connect/MetaMask                                            | connect-wallet-metamask                        | \App\Modules\Exchange\Controllers\SolanaController::connectWallet                                     | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/Wallet/Disconnect/MetaMask                                         | disconnect-wallet-metamask                     | \App\Modules\Exchange\Controllers\SolanaController::disconnectWallet                                  | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/Wallet/Refresh/MetaMask                                            | refresh-wallet-metamask                        | \App\Modules\Exchange\Controllers\SolanaController::refreshWallet                                     | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/Wallet/Connect/Solflare                                            | connect-wallet-solflare                        | \App\Modules\Exchange\Controllers\SolanaController::connectWallet                                     | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/Wallet/Disconnect/Solflare                                         | disconnect-wallet-solflare                     | \App\Modules\Exchange\Controllers\SolanaController::disconnectWallet                                  | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/Wallet/Refresh/Solflare                                            | refresh-wallet-solflare                        | \App\Modules\Exchange\Controllers\SolanaController::refreshWallet                                     | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/Wallet/Connect/Phantom                                             | connect-wallet-phantom                         | \App\Modules\Exchange\Controllers\SolanaController::connectWallet                                     | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/Wallet/Disconnect/Phantom                                          | disconnect-wallet-phantom                      | \App\Modules\Exchange\Controllers\SolanaController::disconnectWallet                                  | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/Wallet/Refresh/Phantom                                             | refresh-wallet-phantom                         | \App\Modules\Exchange\Controllers\SolanaController::refreshWallet                                     | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/Wallet/Connect/TrustWallet                                         | connect-wallet-trustwallet                     | \App\Modules\Exchange\Controllers\SolanaController::connectWallet                                     | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/Wallet/Disconnect/TrustWallet                                      | disconnect-wallet-trustwallet                  | \App\Modules\Exchange\Controllers\SolanaController::disconnectWallet                                  | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Exchange/Wallet/Refresh/TrustWallet                                         | refresh-wallet-trustwallet                     | \App\Modules\Exchange\Controllers\SolanaController::refreshWallet                                     | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login                   | login cspoff sessionTracker requestLifecycle observability jsonException toolbar                           |
| POST    | Wallets/Coin-Swap                                                           | wallets.coin-swap                              | \App\Modules\User\Controllers\WalletsController::coinSwap                                             | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login noStore           | noStore login cspoff sessionTracker requestLifecycle observability jsonException toolbar                   |
| POST    | Wallets/Coin-Swap/([^/]+)                                                   | wallets.coin-swap.segment                      | \App\Modules\User\Controllers\WalletsController::coinSwap/$1                                          | maintenance botBlocker requestLifecycle observability ratelimit throttle sessionRevoked csrf authcheck login noStore           | noStore login cspoff sessionTracker requestLifecycle observability jsonException toolbar                   |
```

## SolanaController Modal / Swap / Price Methods

```text
240:            } catch (\Throwable $e) {
241:                log_message('warning', 'SolanaController price lookup unavailable: {msg}', ['msg' => $e->getMessage()]);
254:            } catch (\Throwable $e) {
255:                log_message('warning', 'SolanaController network status unavailable: {msg}', ['msg' => $e->getMessage()]);
285:            return $this->response->setStatusCode(405)->setJSON(['ok'=>false,'msg'=>'AJAX only']);
288:        if ($cuID <= 0) return $this->response->setStatusCode(401)->setJSON(['ok'=>false,'msg'=>'Auth required']);
296:            return $this->response->setStatusCode(422)->setJSON(['ok'=>false,'msg'=>'Invalid Solana address']);
301:            return $this->response->setJSON(['ok'=>true,'id'=>$id,'address'=>$addr,'label'=>$label]);
302:        } catch (\Throwable $e) {
303:            log_message('error','addExternalWallet: '.$e->getMessage());
304:            return $this->response->setStatusCode(500)->setJSON(['ok'=>false,'msg'=>'Failed to add address']);
311:            return $this->response->setStatusCode(405)->setJSON(['ok'=>false,'msg'=>'AJAX only']);
314:        if ($cuID <= 0) return $this->response->setStatusCode(401)->setJSON(['ok'=>false,'msg'=>'Auth required']);
317:        if ($id <= 0) return $this->response->setStatusCode(422)->setJSON(['ok'=>false,'msg'=>'Missing id']);
327:            return $this->response->setJSON(['ok'=>$ok]);
328:        } catch (\Throwable $e) {
329:            log_message('error','setDefaultWallet: '.$e->getMessage());
330:            return $this->response->setStatusCode(500)->setJSON(['ok'=>false,'msg'=>'Failed to set default']);
336:        return $this->response->setJSON($tokens);
360:    public function coinSwap() {
365:    public function connectWallet() {
384:        return $this->response->setJSON($response);
425:                return $this->response->setJSON($this->jsonEnvelope(true, 'Wallet created safely.', ['publicKey' => $publicKey, 'walletAddress' => $publicKey]));
426:            } catch (\Exception $e) {
427:                return $this->response->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
447:            return $this->response->setJSON($this->jsonEnvelope(false, $guard['message'], $guard));
472:            return $this->response->setJSON(['status' => 'success', 'message' => 'Token created successfully.']);
474:            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to create token.']);
502:    public function executeSwap() {
520:                    throw new \Exception('Invalid input.');
527:                    throw new \Exception('Failed to fetch token prices.');
533:                    throw new \Exception('Insufficient balance.');
541:                    throw new \Exception('Insufficient balance to cover transaction and fees.');
547:                    throw new \Exception('Swap failed: ' . $swapResult['message']);
553:                    throw new \Exception('Asset transfer failed: ' . $transferResult['message']);
565:            } catch (\Exception $e) {
566:                log_message('error', 'Swap execution failed: ' . $e->getMessage());
577:            log_message('debug', 'SolanaController L400 - fetchFrontendData() Fetch Started!');
580:            return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid Request']);
585:            log_message('error', 'fetchFrontendData: missing user context; aborting.');
586:            return $this->response->setStatusCode(401)->setJSON([
617:        log_message(
649:        return $this->response->setJSON([
670:                throw new \Exception("No data received from WebSocket");
672:        } catch (\Exception $e) {
673:            log_message('error', 'Failed to fetch real-time data: ' . $e->getMessage());
680:            return $this->response->setStatusCode(405)->setJSON(['ok' => false, 'msg' => 'AJAX only']);
685:            return $this->response->setStatusCode(401)->setJSON(['ok' => false, 'msg' => 'Auth required']);
691:                return $this->response->setStatusCode(500)->setJSON(['ok' => false, 'msg' => 'Provision failed']);
693:            return $this->response->setJSON(['ok' => true, 'address' => $row['address']]);
694:        } catch (\Throwable $e) {
695:            log_message('error', 'provisionDefaultWallet: '.$e->getMessage());
696:            return $this->response->setStatusCode(500)->setJSON(['ok' => false, 'msg' => 'Error']);
704:            return $this->response->setStatusCode(422)->setJSON([
712:        } catch (\Throwable $e) {
713:            log_message('error', 'Solana airdrop failed: ' . $e->getMessage());
714:            return $this->response->setStatusCode(500)->setJSON([
721:            log_message('error', 'Solana airdrop non-zero exit: ' . $result['stderr']);
722:            return $this->response->setStatusCode(500)->setJSON([
728:        return $this->response->setJSON([
744:            return $this->response->setJSON(['status' => 'success', 'wallet' => $wallet]);
746:            return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to generate wallet']);
750:    public function getMarketPrice() {
753:            return $this->response->setJSON(['price' => $solanaMarketPrice]);
754:        } catch (\Exception $e) {
755:            return $this->response->setJSON(['error' => $e->getMessage()], 500);
764:        } catch (\Exception $e) {
765:            log_message('error', 'Failed to fetch metadata: ' . $e->getMessage());
770:    public function getTokenPrice($tokenAddress) {
775:            return $this->response->setJSON(['price' => $tokenPrice]);
776:        } catch (\Exception $e) {
777:            return $this->response->setJSON(['error' => $e->getMessage()], 500);
789:        log_message('debug', 'SolanaController L186 - Import Started!');
791:            log_message('debug', 'SolanaController L188 - Received POST request to import wallet.');
795:                log_message('debug', 'SolanaController L191 - Key received: ' . $key);
798:                    log_message('error', 'No key provided.');
799:                    throw new \Exception("No key provided.");
805:                    throw new \Exception($result['message']);
809:                log_message('debug', 'SolanaController L194 - Wallet imported successfully: ' . json_encode($wallet));
837:                        log_message('debug', $result['message']);
839:                    return $response->setJSON([
847:                        log_message('debug', $result['message']);
849:                    return $response->setJSON([
857:                        log_message('debug', $result['message']);
859:                    return $response->setJSON([
866:            } catch (\Exception $e) {
867:                log_message('error', 'Error importing wallet: ' . $e->getMessage());
868:                return $this->response->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
885:        return $this->response->setJSON(['status' => 'success', 'message' => 'Buyback completed successfully.']);
894:        return $this->response->setJSON($result);
904:            return $this->response->setJSON($this->jsonEnvelope(false, $guard['message'], $guard));
909:            return $this->response->setJSON($this->jsonEnvelope(true, $result['message'] ?? 'Mint draft prepared.', $result));
911:            return $this->response->setJSON($this->jsonEnvelope(false, $result['message'] ?? 'Mint request failed.', [], $result));
984:    public function purchaseSolana() {
992:            return $this->response->setJSON(['success' => false, 'message' => 'Invalid request parameters']);
1008:                    throw new \Exception('Invalid purchase method');
1012:                return $this->response->setJSON(['success' => true, 'message' => $result['message'], 'redirect' => $result['redirect']]);
1014:                throw new \Exception($result['message']);
1016:        } catch (\Exception $e) {
1017:            return $this->response->setJSON(['success' => false, 'message' => $e->getMessage()]);
1041:        return $this->response->setJSON(['status' => 'success', 'message' => 'Tokens redistributed successfully.']);
1044:    public function refreshWallet() {
1063:        return $this->response->setJSON($response);
1066:    public function sellSolana() {
1074:            return $this->response->setJSON(['success' => false, 'message' => 'Invalid request parameters']);
1090:                    throw new \Exception('Invalid sell method');
1094:                return $this->response->setJSON(['success' => true, 'message' => $result['message'], 'redirect' => $result['redirect']]);
1096:                throw new \Exception($result['message']);
1098:        } catch (\Exception $e) {
1099:            return $this->response->setJSON(['success' => false, 'message' => $e->getMessage()]);
1112:        return $this->response->setStatusCode(403)->setJSON([
1118:    public function swapSolana() {
1126:            return $this->response->setJSON(['success' => false, 'message' => 'Invalid request parameters']);
1133:                throw new \Exception('Insufficient balance for this swap.');
1145:                return $this->response->setJSON(['success' => true, 'message' => $result['message'], 'redirect' => $result['redirect']]);
1147:                throw new \Exception($result['message']);
1149:        } catch (\Exception $e) {
1150:            return $this->response->setJSON(['success' => false, 'message' => $e->getMessage()]);
1167:            log_message('debug', 'ExchangeController - $marketData array: ' . print_r($marketData, true));
1170:            return $this->response->setJSON(['status' => 'success']);
1171:        } catch (\Exception $e) {
1172:            log_message('error', 'Failed to fetch real-time data: ' . $e->getMessage());
1173:            return $this->response->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
1181:            return $this->response->setJSON(['status' => 'success', 'tokens' => $tokens]);
1182:        } catch (\Exception $e) {
1183:            return $this->response->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
1191:            return $this->response->setJSON(['status' => 'success']);
1192:        } catch (\Exception $e) {
1193:            return $this->response->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
1197:    public function viewAssets() {
1200:        return $this->response->setJSON(['status' => 'success', 'assets' => $assets]);
1203:    public function viewSolanaWallet()  // <-- use your actual action name/route
1208:            return $this->response->setStatusCode(401)->setBody('Authentication required.');
1233:    public function getQuote()
1236:            return $this->response->setStatusCode(405)->setJSON([
1249:        return $this->response->setJSON([
1256:    public function doSwap()
1259:            return $this->response->setStatusCode(405)->setJSON([
1267:        return $this->response->setJSON([
1284:    //         log_message('debug', 'SolanaController L517 - $marketData array: ' . (print_r($marketData, true))); 
1290:    //     } catch (Exception $e) {
1291:    //         log_message('error', 'Failed to fetch real-time data: ' . $e->getMessage());
1300:    //         log_message('debug', 'ExchangeController - $marketData array: ' . print_r($marketData, true));
1303:    //     } catch (\Exception $e) {
1304:    //         log_message('error', 'Failed to fetch real-time data: ' . $e->getMessage());
1317:    //         log_message('debug', 'SolanaController L400 - fetchFrontendData() Fetch Started!');
1321:    //         return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid Request']);
1327:    //         log_message('error', 'fetchFrontendData: missing user context; aborting.');
1328:    //         return $this->response->setStatusCode(401)->setJSON([
1342:    //         } catch (\Throwable $e) {
1343:    //             log_message('error', 'provisionDefaultPublicAddress failed: '.$e->getMessage());
1426:    //     return $this->response->setJSON($payload);
1438:        } catch (\Throwable $e) {
1481:        } catch (\Throwable $e) {
1482:            log_message('critical', 'Unable to encrypt Solana wallet secret before storage: {message}', [
1486:            throw new \RuntimeException('Unable to securely store Solana wallet secret.');
1492:        log_message('warning', 'Blocked browser-submitted Solana private_key payload for endpoint={uri}', [
1496:        return $this->response->setStatusCode(403)->setJSON([
```

## SolanaAPIController Price / Quote / Swap Methods

```text
112:        return $this->response->setJSON($tokens);
134:        return $this->response->setJSON($response);
170:                return $this->response->setJSON($this->jsonEnvelope(true, 'Wallet created safely.', ['publicKey' => $publicKey, 'walletAddress' => $publicKey]));
171:            } catch (\Exception $e) {
172:                return $this->response->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
189:                    return $this->response->setJSON($this->jsonEnvelope(true, 'Draft token prepared successfully.', ['token' => $result['token'] ?? $result]));
191:                    return $this->response->setJSON($this->jsonEnvelope(false, $result['message'] ?? 'Token creation failed.', [], ['token' => $result]));
193:            } catch (\Exception $e) {
194:                return $this->response->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
217:                    throw new \Exception('Invalid input');
222:                    throw new \Exception('Insufficient balance');
236:            } catch (\Exception $e) {
293:            return $this->response->setJSON([
299:        } catch (\Throwable $e) {
300:            log_message('error', 'getAssetsData failed: ' . $e->getMessage());
301:            return $this->response->setJSON($emptyResponse($draw, 'Unable to load assets data.'));
305:    public function getCoinAmount($tokenAddress) {
309:                throw new \Exception("Token address not provided.");
317:                throw new \Exception("No token amount found for user: {$userId} and token address: {$tokenAddress}");
320:            return $this->response->setJSON(['amount' => $amount]);
321:        } catch (\Exception $e) {
323:            log_message('error', 'Error in getCoinAmount: ' . $e->getMessage());
324:            return $this->response->setJSON(['error' => $e->getMessage()], 500);
329:    public function getExchangePrice($tokenSymbol) {
333:            return $this->response->setJSON(['price' => $exchangePrice]);
334:        } catch (\Exception $e) {
335:            return $this->response->setJSON(['error' => $e->getMessage()], 500);
339:    public function getMarketPrice() {
342:            return $this->response->setJSON(['price' => $solanaMarketPrice]);
343:        } catch (\Exception $e) {
344:            return $this->response->setJSON(['error' => $e->getMessage()], 500);
348:    public function getTokenPrice($tokenAddress) {
351:            log_message('debug', 'API/SolanaController getTokenPrice - $tokenPrice: ' . $tokenPrice);
352:            return $this->response->setJSON(['price' => $tokenPrice]);
353:        } catch (\Exception $e) {
354:            return $this->response->setJSON(['error' => $e->getMessage()], 500);
359:        log_message('debug', 'SolanaController L186 - Import Started!');
361:            log_message('debug', 'SolanaController L188 - Received POST request to import wallet.');
365:                log_message('debug', 'SolanaController L191 - Key received: ' . $key);
368:                    log_message('error', 'No key provided.');
369:                    throw new \Exception("No key provided.");
375:                    throw new \Exception($result['message']);
379:                log_message('debug', 'SolanaController L194 - Wallet imported successfully: ' . json_encode($wallet));
407:                        log_message('debug', $result['message']);
409:                    return $response->setJSON([
417:                        log_message('debug', $result['message']);
419:                    return $response->setJSON([
427:                        log_message('debug', $result['message']);
429:                    return $response->setJSON([
436:            } catch (\Exception $e) {
437:                log_message('error', 'Error importing wallet: ' . $e->getMessage());
438:                return $this->response->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
446:            return $this->response->setJSON(['status' => 'success', 'tokens' => $tokens]);
447:        } catch (\Exception $e) {
448:            return $this->response->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
456:            return $this->response->setJSON(['status' => 'success']);
457:        } catch (\Exception $e) {
458:            log_message('debug', 'MyMIDexScreener L412: Logging updateSolanaPrices Not Completed.' . $e->getMessage()); 
459:            return $this->response->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
488:        } catch (\Throwable $e) {
492:            log_message('warning', 'Solana health check degraded: {message}', [
497:        return $this->response->setStatusCode(200)->setJSON([
513:    public function getBalance($address)
517:            return $this->response->setJSON($this->jsonEnvelope(true, 'Balance loaded.', ['address' => $address, 'lamports' => $lamports]));
518:        } catch (\Throwable $e) {
519:            return $this->response->setJSON($this->jsonEnvelope(false, 'Unable to load balance.', [], ['exception' => $e->getMessage()]));
523:    public function getTokenAccounts($address)
527:            return $this->response->setJSON($this->jsonEnvelope(true, 'Token accounts loaded.', ['address' => $address, 'tokens' => $tokens]));
528:        } catch (\Throwable $e) {
529:            return $this->response->setJSON($this->jsonEnvelope(false, 'Unable to load token accounts.', [], ['exception' => $e->getMessage()]));
533:    public function transfer()
537:        return $this->response->setJSON($this->jsonEnvelope((bool) ($result['success'] ?? false), (string) ($result['message'] ?? 'Transfer prepared.'), $result));
540:    public function quote()
544:        return $this->response->setJSON($this->jsonEnvelope(true, 'Quote loaded.', ['quote' => $result]));
547:    public function swap()
551:        return $this->response->setJSON($this->jsonEnvelope((bool) ($result['success'] ?? ! isset($result['allowed'])), (string) ($result['message'] ?? 'Swap request processed.'), $result));
558:        return $this->response->setJSON($this->jsonEnvelope((bool) ($result['success'] ?? false), (string) ($result['message'] ?? 'Mint request processed.'), $result));
569:        } catch (\Throwable $e) {
610:        if ($cuID <= 0) return $this->response->setJSON(['success'=>false,'message'=>'No user']);
620:            return $this->response->setJSON(['success'=>true,'wallet_id'=>$id,'address'=>$kp['address_base58']]);
621:        } catch (\Throwable $e) {
622:            log_message('error','ProvisionDefaultWallet failed: '.$e->getMessage());
623:            return $this->response->setJSON(['success'=>false,'message'=>'Failed: '.$e->getMessage()]);
661:        } catch (\Throwable $e) {
662:            log_message('warning', 'Unable to initialize SolanaService for health check: {message}', [
683:        } catch (\Throwable $e) {
684:            log_message('critical', 'Unable to encrypt Solana wallet secret before storage: {message}', [
688:            throw new \RuntimeException('Unable to securely store Solana wallet secret.');
694:        log_message('warning', 'Blocked browser-submitted Solana private_key payload for endpoint={uri}', [
698:        return $this->response->setStatusCode(403)->setJSON([
```

## Swap View Runtime JS

```text
65:                <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
68:                <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
91:                                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>">
106:                                            <option value="SOL" selected>SOL - Solana</option>
134:                                        <label class="form-label" for="amount">Amount</label>
137:                                        <input name="amount" type="number" value="" id="amount" class="form-control" placeholder="Enter amount" required step="any">
149:                                            <option value="SOL" selected>SOL - Solana</option>
183:                                        <button class="btn btn-primary btn-lg" type="submit">Execute</button>
187:                                <?php if(validation_errors()): ?>
188:                                <div class="fade alert alert-error in"><?= validation_errors() ?></div>
226:        const selectedFromToken = $(this).val();
228:        $(`#to_token option[value="${selectedFromToken}"]`).prop('disabled', true); // Disable selected token in 'to' dropdown
234:        const selectedToToken = $(this).val();
236:        $(`#from_token option[value="${selectedToToken}"]`).prop('disabled', true); // Disable selected token in 'from' dropdown
242:    $('#solanaCoinSwapForm').on('submit', function (event) {
255:        const selectedFromToken = $('#from_token').val();
256:        fetch(`https://www.mymiwallet.com/index.php/API/Solana/getExchangePrice/${selectedFromToken}`)
259:            .catch((error) => console.error('Error fetching exchange price:', error));
263:        const selectedToToken = $('#to_token').val();
264:        if (!selectedToToken) return;
265:        fetch(`https://www.mymiwallet.com/index.php/API/Solana/getTokenPrice/${selectedToToken}`)
268:            .catch((error) => console.error('Error fetching token price:', error));
272:    function fetchFromCoinAmount(selectedToken) {
273:        fetch(`<?= base_url('index.php/API/Solana/getCoinAmount') ?>/${selectedToken}`)
275:            .then((data) => $('#fromCoinAmount').text(data.amount || '0.00'))
276:            .catch((error) => console.error('Error fetching coin amount:', error));
280:    $('#amount').on('input', calculateSubtotal);
283:        const amount = parseFloat($('#amount').val()) || 0;
292:        const networkFees = networkFeeRate * amount;
293:        const platformFees = amount * fromPrice * platformTradingFeeRate;
294:        const serviceFees = amount * serviceFeeRate;
296:        const subtotal = (amount * fromPrice) - (platformFees + networkFees + serviceFees);
308:        if (amount > fromCoinAmount) {
316:    $('#swapTokens').on('click', function () {
317:        const selectedToken = $('#to_token').val();
318:        if (!selectedToken) {
319:            alert('Please select a token to swap to.');
343:        $('#amountSymbol').text(` ${fromSymbol}`);
368://     document.getElementById('solanaCoinSwapForm').addEventListener('submit', function(event) {
385://         let selectedFromToken = $('#from_token').val();
386://         fetch(`https://www.mymiwallet.com/index.php/API/Solana/getExchangePrice/${selectedFromToken}`)
391://             .catch(error => {
392://                 console.error("Error fetching exchange price: ", error);
397://         let selectedToken = $('#to_token').val();
398://         if (!selectedToken) return;
399://         fetch(`https://www.mymiwallet.com/index.php/API/Solana/getTokenPrice/${selectedToken}`)
404://             .catch(error => {
405://                 console.error("Error fetching token price: ", error);
413://         let selectedFromToken = $(this).val();
415://         $(`#to_token option[value="${selectedFromToken}"]`).prop('disabled', true); // Disable selected token in 'to' dropdown
421://         let selectedToToken = $(this).val();
423://         $(`#from_token option[value="${selectedToToken}"]`).prop('disabled', true); // Disable selected token in 'from' dropdown
429://     //     let selectedToken = $(this).val();
430://     //     let tokenSymbol = $(this).find('option:selected').data('symbol');
431://     //     let tokenAddress = $(this).find('option:selected').data('address');
435://     //     fetchFromCoinAmount(selectedToken);
439://     //     let selectedToken = $(this).val();
440://     //     let tokenSymbol = $(this).find('option:selected').data('symbol');
441://     //     let tokenAddress = $(this).find('option:selected').data('address');
447://     $('#amount').on('input', function() {
451://     $('#swapTokens').on('click', function() {
452://         let selectedToken = $('#to_token').val();
453://         if (!selectedToken) {
454://             alert('Please select a token to swap to.');
457://         swapTokens();
460://     function swapTokens() {
467://         let toTokenText = $('#to_token option:selected').text(); // Get the selected token text (symbol - name)
477://         $('#amountSymbol').text(` ${$('#exchangeSymbol').text()}`);
484://     function fetchFromCoinAmount(selectedToken) {
485://         fetch(`<?=base_url('index.php/API/Solana/getCoinAmount')?>/${selectedToken}`)
488://                 $('#fromCoinAmount').text(data.amount || '0.00');
490://             .catch(error => {
491://                 console.error("Error fetching coin amount: ", error);
496://         let amount = parseFloat($('#amount').val()) || 0;
509://         let networkFees = networkFeeRate * amount;
510://         let platformTradingFees = (amount * fromPrice) * platformTradingFeeRate;
511://         let serviceFees = serviceFeeRate * amount;
513://         let subtotal = (amount * fromPrice) - platformTradingFees - networkFees - serviceFees;
522://         if (amount > fromCoinAmount) {
529://     function calculateFees(amount, fromPrice) {
534://         let platformFees = (amount * fromPrice) * platformTradingFeeRate;
535://         let serviceFees = amount * serviceFeeRate;
536://         let networkFees = amount * networkFeeRate;
544://     //     let amount = parseFloat($('#amount').val()) || 0;
560://     //     let networkFees = networkFeeRate * amount;
561://     //     let platformTradingFees = (amount * fromPrice) * platformTradingFeeRate;
562://     //     let serviceFees = serviceFeeRate * amount;
565://     //     let subtotal = (amount * fromPrice) - platformTradingFees;
566://     //     let totalCoins = (amount * fromPrice) / toPrice;
572://     //     // Validation message for amount
574://     //     if (amount > fromCoinAmount) {
```

## Modal Loader References

```text
```

## Phase 04 Target

- Verify modal endpoints return safe HTML, not raw 500.
- Verify API endpoints return JSON envelopes, not fatal HTML.
- Verify frontend fetch calls safely handle failed price/amount responses.
- Replace alert-only or console-only failures with user-safe inline messages where practical.
- Avoid executing swaps unless token, amount, quote, wallet, and user context are valid.
