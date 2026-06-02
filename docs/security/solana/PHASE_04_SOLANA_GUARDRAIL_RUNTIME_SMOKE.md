# Phase 04 Solana Guardrail Runtime Smoke

Generated UTC: 2026-06-02T15:35:25Z
Branch: hardening/solana-guardrail-runtime-smoke-phase-04
Commit: d1b4c470c Add Solana guardrail runtime smoke report
Base URL: https://www.mymiwallet.com

## Safety Scope
- No mainnet minting enabled.
- No transaction broadcast requested.
- Mutation tests use missing/invalid CSRF or dry-run payloads only.
- Expected safe failures include 302 login redirects, 403 CSRF/guard failures, 405 GET mutation blocks, or safe JSON envelopes.

## Environment Guard Flags

## PHP Lint
No syntax errors detected in app/Config/Solana.php
No syntax errors detected in app/Config/Routes.php
No syntax errors detected in app/Modules/Exchange/Controllers/SolanaController.php
No syntax errors detected in app/Modules/APIs/Controllers/SolanaAPIController.php

## GET Smoke Tests
- GET /Exchange/Solana => HTTP 302, bytes=0
  - Preview: 
- GET /Exchange/Solana/Swap => HTTP 302, bytes=0
  - Preview: 
- GET /Exchange/Solana/Assets => HTTP 302, bytes=0
  - Preview: 
- GET /API/Solana/health => HTTP 200, bytes=366
  - Preview: {"success":true,"message":"Solana health route is available.","data":{"route":"ok","service":"solana","network":"devnet","rpc_status":"checked","network_status":{"healthy":true,"slot":466666798,"version":"4.0.0-rc.0","st
- GET /API/Solana/getTokenPrice/SOL => HTTP 200, bytes=56
  - Preview: {"error":"Unable to fetch token price from all sources"}
- GET /API/Solana/getExchangePrice/SOL => HTTP 200, bytes=11
  - Preview: {"price":0}

## Mutation Guard Smoke Tests
- POST /API/Solana/transfer dry_run=1 => HTTP 303, bytes=0
  - Preview: 
- POST /API/Solana/swap/execute dry_run=1 => HTTP 303, bytes=0
  - Preview: 
- POST /API/Solana/token/mint dry_run=1 => HTTP 303, bytes=0
  - Preview: 
- POST /Exchange/Solana/Wallet/Execute-Swap dry_run=1 => HTTP 303, bytes=0
  - Preview: 

## GET Mutation Block Smoke Tests
- GET /Exchange/Solana/Wallet/Execute-Swap => HTTP 302, bytes=0
  - Preview: 
- GET /API/Solana/swap/execute => HTTP 404, bytes=386
  - Preview: <!doctype html> <html lang="en"> <head>     <meta charset="utf-8">     <meta name="viewport" content="width=device-width, initial-scale=1">     <title>Page Not Found</title> </head> <body>     <h1>Page Not Found</h1>     <p>We could not find: <code>/index.php/
- GET /API/Solana/token/mint => HTTP 404, bytes=384
  - Preview: <!doctype html> <html lang="en"> <head>     <meta charset="utf-8">     <meta name="viewport" content="width=device-width, initial-scale=1">     <title>Page Not Found</title> </head> <body>     <h1>Page Not Found</h1>     <p>We could not find: <code>/index.php/

## Route Guard Evidence
1226:        $routes->post('transfer', 'SolanaAPIController::transfer', ['filter' => 'csrf']);
1227:        $routes->post('swap/quote', 'SolanaAPIController::quote', ['filter' => 'csrf']);
1228:        $routes->post('swap/execute', 'SolanaAPIController::swap', ['filter' => 'csrf']);
1229:        $routes->post('token/create', 'SolanaAPIController::createToken', ['filter' => 'csrf']);
1230:        $routes->post('token/mint', 'SolanaAPIController::mint', ['filter' => 'csrf']);
1739:        $routes->post('createSolanaWallet', 'SolanaController::createSolanaWallet', ['filter' => 'csrf']);
1743:        $routes->post('Import/Wallet', 'SolanaController::importWallet', ['filter' => 'csrf']);
1749:        $routes->post('Wallet/Execute-Swap', 'SolanaController::executeSwap', ['filter' => 'csrf']);
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

## Result
- This smoke report is evidence-only.
- No private keys were printed.
- No transaction broadcast command was intentionally executed.
- No mainnet minting was enabled.
