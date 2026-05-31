# AIOps Code Analysis

- Generated: 2026-05-31T19:28:54+00:00
- Repo: current
- Files scanned: 50
- Findings: 303
- Risk score: 100 / 100
- Risk level: CRITICAL

## Executive Summary

Deterministic analysis found issues or review points that may affect security, UX, backend efficiency, or maintainability.

## Files

- `app/Modules/Exchange/Controllers/BlockchainController.php`
- `app/Modules/Exchange/Controllers/DigiByteController.php`
- `app/Modules/Exchange/Controllers/ExchangeController.php`
- `app/Modules/Exchange/Controllers/GeminiController.php`
- `app/Modules/Exchange/Controllers/MetaMaskController.php`
- `app/Modules/Exchange/Controllers/SolanaController.php`
- `app/Modules/Exchange/Controllers/UserController.php`
- `app/Modules/Exchange/Models/ExchangeOrderModel.php`
- `app/Modules/Exchange/Views/Account_Information.php`
- `app/Modules/Exchange/Views/Application_Manager.php`
- `app/Modules/Exchange/Views/Buy.php`
- `app/Modules/Exchange/Views/Buy/user_fields.php`
- `app/Modules/Exchange/Views/Coin_Listing_Asset_Information.php`
- `app/Modules/Exchange/Views/Coin_Listing_Asset_Information/create_fields.php`
- `app/Modules/Exchange/Views/Coin_Listing_Asset_Information/list_fields.php`
- `app/Modules/Exchange/Views/Coin_Listing_Asset_Information/new_fields.php`
- `app/Modules/Exchange/Views/Coin_Listing_Asset_Information_Modal.php`
- `app/Modules/Exchange/Views/Coin_Listing_Request.php`
- `app/Modules/Exchange/Views/Coin_Listing_Request/contact_fields.php`
- `app/Modules/Exchange/Views/Coin_Listing_Request_Complete.php`
- `app/Modules/Exchange/Views/Order_Buy_Manager.php`
- `app/Modules/Exchange/Views/Order_Event_Manager.php`
- `app/Modules/Exchange/Views/Order_Sell_Manager.php`
- `app/Modules/Exchange/Views/Overview.php`
- `app/Modules/Exchange/Views/Sell.php`
- `app/Modules/Exchange/Views/Sell/user_fields.php`
- `app/Modules/Exchange/Views/Solana/Disconnect/wallet.php`
- `app/Modules/Exchange/Views/Solana/assets.php`
- `app/Modules/Exchange/Views/Solana/coinSwap.php`
- `app/Modules/Exchange/Views/Solana/connectWallet.php`
- `app/Modules/Exchange/Views/Solana/create.php`
- `app/Modules/Exchange/Views/Solana/createToken.php`
- `app/Modules/Exchange/Views/Solana/createWallet.php`
- `app/Modules/Exchange/Views/Solana/executeSwap.php`
- `app/Modules/Exchange/Views/Solana/importWallet.php`
- `app/Modules/Exchange/Views/Solana/index.php`
- `app/Modules/Exchange/Views/Solana/index/Top-Performing-Tokens.php`
- `app/Modules/Exchange/Views/Solana/orders.php`
- `app/Modules/Exchange/Views/Solana/swap-working.php`
- `app/Modules/Exchange/Views/Solana/swap.php`
- `app/Modules/Exchange/Views/Solana/testPage.php`
- `app/Modules/Exchange/Views/Solana/token.php`
- `app/Modules/Exchange/Views/Solana/trade.php`
- `app/Modules/Exchange/Views/Solana/verifyWalletOwnership.php`
- `app/Modules/Exchange/Views/Solana/viewWallet.php`
- `app/Modules/Exchange/Views/includes/Order_Book.php`
- `app/Modules/Exchange/Views/includes/Recent_Orders.php`
- `app/Modules/Exchange/Views/includes/Stock_Chart.php`
- `app/Modules/Exchange/Views/includes/application-modal.php`
- `app/Modules/Exchange/Views/index.php`

## Findings

### MODERATE — Controller has no log_message() calls.

- Category: `observability`
- File: `app/Modules/Exchange/Controllers/BlockchainController.php`
- Line: 0
- Recommendation: Add targeted logging for failures and high-risk actions.

### LOW — No try/catch blocks found in controller.

- Category: `error-handling`
- File: `app/Modules/Exchange/Controllers/BlockchainController.php`
- Line: 0
- Recommendation: Add exception handling around external APIs, database writes, and render-sensitive flows.

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/DigiByteController.php`
- Line: 31
- Recommendation: Validate and authorize all request input before use.

```
$address = trim((string) $this->request->getPost('address'));
```

### MODERATE — Controller has no log_message() calls.

- Category: `observability`
- File: `app/Modules/Exchange/Controllers/DigiByteController.php`
- Line: 0
- Recommendation: Add targeted logging for failures and high-risk actions.

### MODERATE — Controller reads request data but validation was not obvious.

- Category: `validation-gap`
- File: `app/Modules/Exchange/Controllers/DigiByteController.php`
- Line: 0
- Recommendation: Use CI4 validation rules and authorization checks before processing request data.

### LOW — No try/catch blocks found in controller.

- Category: `error-handling`
- File: `app/Modules/Exchange/Controllers/DigiByteController.php`
- Line: 0
- Recommendation: Add exception handling around external APIs, database writes, and render-sensitive flows.

### LOW — AJAX/fetch usage detected.

- Category: `ajax-observability`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 280
- Recommendation: Ensure loading states, error messages, CSRF headers, and retry handling are present.

```
public function orderFetch()
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 283
- Recommendation: Validate and authorize all request input before use.

```
'month' => $this->request->getPost('month'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 284
- Recommendation: Validate and authorize all request input before use.

```
'day' => $this->request->getPost('day'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 285
- Recommendation: Validate and authorize all request input before use.

```
'year' => $this->request->getPost('year'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 286
- Recommendation: Validate and authorize all request input before use.

```
'time' => $this->request->getPost('time'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 287
- Recommendation: Validate and authorize all request input before use.

```
'trade_type' => $this->request->getPost('trade_type'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 288
- Recommendation: Validate and authorize all request input before use.

```
'beta' => $this->request->getPost('beta'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 289
- Recommendation: Validate and authorize all request input before use.

```
'user_id' => $this->request->getPost('user_id'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 290
- Recommendation: Validate and authorize all request input before use.

```
'user_email' => $this->request->getPost('user_email'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 291
- Recommendation: Validate and authorize all request input before use.

```
'wallet_id' => $this->request->getPost('wallet_id'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 292
- Recommendation: Validate and authorize all request input before use.

```
'market_pair' => $this->request->getPost('market_pair'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 293
- Recommendation: Validate and authorize all request input before use.

```
'market' => $this->request->getPost('market'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 294
- Recommendation: Validate and authorize all request input before use.

```
'initial_value' => $this->request->getPost('initial_value'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 295
- Recommendation: Validate and authorize all request input before use.

```
'coin_value' => $this->request->getPost('coin_value'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 296
- Recommendation: Validate and authorize all request input before use.

```
'available_coins' => $this->request->getPost('available_coins'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 297
- Recommendation: Validate and authorize all request input before use.

```
'amount' => $this->request->getPost('buy_amount'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 298
- Recommendation: Validate and authorize all request input before use.

```
'minimum_purchase' => $this->request->getPost('minimum_purchase'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 299
- Recommendation: Validate and authorize all request input before use.

```
'total' => $this->request->getPost('buy_total'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 300
- Recommendation: Validate and authorize all request input before use.

```
'gas_fee' => $this->request->getPost('buy_user_gas_fee'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 301
- Recommendation: Validate and authorize all request input before use.

```
'fees' => $this->request->getPost('buy_fees'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 302
- Recommendation: Validate and authorize all request input before use.

```
'trans_percent' => $this->request->getPost('buy_trans_percent'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 303
- Recommendation: Validate and authorize all request input before use.

```
'trans_fee' => $this->request->getPost('buy_trans_fee'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 304
- Recommendation: Validate and authorize all request input before use.

```
'total_cost' => $this->request->getPost('buy_total_cost'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 305
- Recommendation: Validate and authorize all request input before use.

```
'current_value' => $this->request->getPost('initial_value') + $this->request->getPost('buy_amount'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 306
- Recommendation: Validate and authorize all request input before use.

```
'new_availability' => $this->request->getPost('available_coins') - $this->request->getPost('buy_total'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 307
- Recommendation: Validate and authorize all request input before use.

```
'new_coin_value' => ($this->request->getPost('initial_value') + $this->request->getPost('buy_amount')) / ($this->request->getPost('available_coins') - $this->request->getPost('buy_total'))
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 328
- Recommendation: Validate and authorize all request input before use.

```
'redirectURL' => $this->request->getPost('redirectURL'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 329
- Recommendation: Validate and authorize all request input before use.

```
'month' => $this->request->getPost('month'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 330
- Recommendation: Validate and authorize all request input before use.

```
'day' => $this->request->getPost('day'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 331
- Recommendation: Validate and authorize all request input before use.

```
'year' => $this->request->getPost('year'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 332
- Recommendation: Validate and authorize all request input before use.

```
'time' => $this->request->getPost('time'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 333
- Recommendation: Validate and authorize all request input before use.

```
'trade_type' => $this->request->getPost('trade_type'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 334
- Recommendation: Validate and authorize all request input before use.

```
'beta' => $this->request->getPost('beta'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 335
- Recommendation: Validate and authorize all request input before use.

```
'user_id' => $this->request->getPost('user_id'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 336
- Recommendation: Validate and authorize all request input before use.

```
'user_email' => $this->request->getPost('user_email'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 337
- Recommendation: Validate and authorize all request input before use.

```
'wallet_id' => $this->request->getPost('wallet_id'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 338
- Recommendation: Validate and authorize all request input before use.

```
'market_pair' => $this->request->getPost('market_pair'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 339
- Recommendation: Validate and authorize all request input before use.

```
'market' => $this->request->getPost('market'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 340
- Recommendation: Validate and authorize all request input before use.

```
'initial_value' => $this->request->getPost('initial_value'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 341
- Recommendation: Validate and authorize all request input before use.

```
'coin_value' => $this->request->getPost('coin_value'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 342
- Recommendation: Validate and authorize all request input before use.

```
'available_coins' => $this->request->getPost('available_coins'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 343
- Recommendation: Validate and authorize all request input before use.

```
'amount' => $this->request->getPost('buy_amount'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 344
- Recommendation: Validate and authorize all request input before use.

```
'minimum_purchase' => $this->request->getPost('minimum_purchase'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 345
- Recommendation: Validate and authorize all request input before use.

```
'total' => $this->request->getPost('buy_total'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 346
- Recommendation: Validate and authorize all request input before use.

```
'gas_fee' => $this->request->getPost('buy_user_gas_fee'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 347
- Recommendation: Validate and authorize all request input before use.

```
'fees' => $this->request->getPost('buy_fees'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 348
- Recommendation: Validate and authorize all request input before use.

```
'trans_percent' => $this->request->getPost('buy_trans_percent'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 349
- Recommendation: Validate and authorize all request input before use.

```
'trans_fee' => $this->request->getPost('buy_trans_fee'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 350
- Recommendation: Validate and authorize all request input before use.

```
'total_cost' => $this->request->getPost('buy_total_cost'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 351
- Recommendation: Validate and authorize all request input before use.

```
'current_value' => $this->request->getPost('initial_value') + $this->request->getPost('buy_amount'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 352
- Recommendation: Validate and authorize all request input before use.

```
'new_availability' => $this->request->getPost('available_coins') - $this->request->getPost('buy_total'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 353
- Recommendation: Validate and authorize all request input before use.

```
'new_coin_value' => ($this->request->getPost('initial_value') + $this->request->getPost('buy_amount')) / ($this->request->getPost('available_coins') - $this->request->getPost('buy_total'))
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 356
- Recommendation: Validate and authorize all request input before use.

```
$redirectURL = (string) ($this->request->getPost('redirectURL') ?? '');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 382
- Recommendation: Validate and authorize all request input before use.

```
'redirectURL' => $this->request->getPost('redirectURL'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 383
- Recommendation: Validate and authorize all request input before use.

```
'month' => $this->request->getPost('month'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 384
- Recommendation: Validate and authorize all request input before use.

```
'day' => $this->request->getPost('day'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 385
- Recommendation: Validate and authorize all request input before use.

```
'year' => $this->request->getPost('year'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 386
- Recommendation: Validate and authorize all request input before use.

```
'time' => $this->request->getPost('time'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 387
- Recommendation: Validate and authorize all request input before use.

```
'trade_type' => $this->request->getPost('trade_type'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 388
- Recommendation: Validate and authorize all request input before use.

```
'beta' => $this->request->getPost('beta'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 389
- Recommendation: Validate and authorize all request input before use.

```
'user_id' => $this->request->getPost('user_id'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 390
- Recommendation: Validate and authorize all request input before use.

```
'user_email' => $this->request->getPost('user_email'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 391
- Recommendation: Validate and authorize all request input before use.

```
'wallet_id' => $this->request->getPost('wallet_id'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 392
- Recommendation: Validate and authorize all request input before use.

```
'market_pair' => $this->request->getPost('market_pair'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 393
- Recommendation: Validate and authorize all request input before use.

```
'market' => $this->request->getPost('market'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 394
- Recommendation: Validate and authorize all request input before use.

```
'initial_value' => $this->request->getPost('initial_value'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 395
- Recommendation: Validate and authorize all request input before use.

```
'coin_value' => $this->request->getPost('coin_value'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 396
- Recommendation: Validate and authorize all request input before use.

```
'available_coins' => $this->request->getPost('available_coins'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 397
- Recommendation: Validate and authorize all request input before use.

```
'amount' => $this->request->getPost('sell_amount'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 398
- Recommendation: Validate and authorize all request input before use.

```
'minimum_purchase' => $this->request->getPost('minimum_purchase'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 399
- Recommendation: Validate and authorize all request input before use.

```
'total' => $this->request->getPost('sell_total'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 400
- Recommendation: Validate and authorize all request input before use.

```
'gas_fee' => $this->request->getPost('sell_user_gas_fee'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 401
- Recommendation: Validate and authorize all request input before use.

```
'fees' => $this->request->getPost('sell_fees'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 402
- Recommendation: Validate and authorize all request input before use.

```
'trans_percent' => $this->request->getPost('sell_trans_percent'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 403
- Recommendation: Validate and authorize all request input before use.

```
'trans_fee' => $this->request->getPost('sell_trans_fee'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 404
- Recommendation: Validate and authorize all request input before use.

```
'total_cost' => $this->request->getPost('sell_total_cost'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 405
- Recommendation: Validate and authorize all request input before use.

```
'current_value' => $this->request->getPost('initial_value') + $this->request->getPost('sell_amount'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 406
- Recommendation: Validate and authorize all request input before use.

```
'new_availability' => $this->request->getPost('available_coins') - $this->request->getPost('sell_total'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 407
- Recommendation: Validate and authorize all request input before use.

```
'new_coin_value' => ($this->request->getPost('initial_value') + $this->request->getPost('sell_amount')) / ($this->request->getPost('available_coins') - $this->request->getPost('sell_total'))
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 410
- Recommendation: Validate and authorize all request input before use.

```
$redirectURL = (string) ($this->request->getPost('redirectURL') ?? '');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 440
- Recommendation: Validate and authorize all request input before use.

```
'user_id' => $this->request->getPost('user_id'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 441
- Recommendation: Validate and authorize all request input before use.

```
'email' => $this->request->getPost('user_email'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 442
- Recommendation: Validate and authorize all request input before use.

```
'username' => $this->request->getPost('user_username'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 443
- Recommendation: Validate and authorize all request input before use.

```
'first_name' => $this->request->getPost('first_name'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 444
- Recommendation: Validate and authorize all request input before use.

```
'middle_name' => $this->request->getPost('middle_name'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 445
- Recommendation: Validate and authorize all request input before use.

```
'last_name' => $this->request->getPost('last_name'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 446
- Recommendation: Validate and authorize all request input before use.

```
'name_suffix' => $this->request->getPost('name_suffix'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 447
- Recommendation: Validate and authorize all request input before use.

```
'phone' => $this->request->getPost('phone'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 448
- Recommendation: Validate and authorize all request input before use.

```
'address' => $this->request->getPost('address'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 449
- Recommendation: Validate and authorize all request input before use.

```
'city' => $this->request->getPost('city'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 450
- Recommendation: Validate and authorize all request input before use.

```
'state' => $this->request->getPost('state'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 451
- Recommendation: Validate and authorize all request input before use.

```
'country' => $this->request->getPost('country'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 452
- Recommendation: Validate and authorize all request input before use.

```
'zipcode' => $this->request->getPost('zipcode'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 453
- Recommendation: Validate and authorize all request input before use.

```
'timezones' => $this->request->getPost('timezones'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 454
- Recommendation: Validate and authorize all request input before use.

```
'language' => $this->request->getPost('language'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 455
- Recommendation: Validate and authorize all request input before use.

```
'advertisement' => $this->request->getPost('advertisement')
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 504
- Recommendation: Validate and authorize all request input before use.

```
$id = $this->request->getPost('id');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 505
- Recommendation: Validate and authorize all request input before use.

```
$field = $this->request->getPost('field');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 506
- Recommendation: Validate and authorize all request input before use.

```
$value = $this->request->getPost('value');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 526
- Recommendation: Validate and authorize all request input before use.

```
//         'asset_name' => $this->request->getPost('asset_name'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 527
- Recommendation: Validate and authorize all request input before use.

```
//         'asset_description' => $this->request->getPost('asset_description'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 528
- Recommendation: Validate and authorize all request input before use.

```
//         'asset_price' => $this->request->getPost('asset_price')
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 533
- Recommendation: Validate and authorize all request input before use.

```
$data = $this->request->getPost();
```

### CRITICAL — Possible wallet/private-key/seed material reference.

- Category: `secret-exposure`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 556
- Recommendation: Never expose private keys, mnemonics, or seed phrases to views, JSON, logs, or browser scripts.

```
$privateKey = '[REDACTED]'; // Retrieve securely
```

### CRITICAL — Possible wallet/private-key/seed material reference.

- Category: `secret-exposure`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 557
- Recommendation: Never expose private keys, mnemonics, or seed phrases to views, JSON, logs, or browser scripts.

```
$createToken = [REDACTED], 9);
```

### CRITICAL — Possible wallet/private-key/seed material reference.

- Category: `secret-exposure`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 564
- Recommendation: Never expose private keys, mnemonics, or seed phrases to views, JSON, logs, or browser scripts.

```
$mintResult = $solana->mintTokens($privateKey, $mintAddress, $tokenSupply);
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 606
- Recommendation: Validate and authorize all request input before use.

```
'listing_type' => $this->request->getPost('listing_type'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 607
- Recommendation: Validate and authorize all request input before use.

```
'blockchain_id' => $this->request->getPost('blockchain_id'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 608
- Recommendation: Validate and authorize all request input before use.

```
'blockchain' => $this->request->getPost('blockchain'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 609
- Recommendation: Validate and authorize all request input before use.

```
'blockchain_name' => $this->request->getPost('blockchain_name'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 610
- Recommendation: Validate and authorize all request input before use.

```
'symbol' => $this->request->getPost('symbol'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 611
- Recommendation: Validate and authorize all request input before use.

```
'coin_name' => $this->request->getPost('coin_name'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 612
- Recommendation: Validate and authorize all request input before use.

```
'coin_quantity' => $this->request->getPost('coin_quantity'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 613
- Recommendation: Validate and authorize all request input before use.

```
'initial_value' => $this->request->getPost('initial_value'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 614
- Recommendation: Validate and authorize all request input before use.

```
'purpose' => $this->request->getPost('purpose'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 615
- Recommendation: Validate and authorize all request input before use.

```
'description' => $this->request->getPost('description'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 616
- Recommendation: Validate and authorize all request input before use.

```
'coin_file' => $this->request->getPost('coin_file'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 617
- Recommendation: Validate and authorize all request input before use.

```
'coin_logo' => $this->request->getPost('coin_logo')
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 629
- Recommendation: Validate and authorize all request input before use.

```
$asset_id = $this->request->getPost('asset_id');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 631
- Recommendation: Validate and authorize all request input before use.

```
'asset_name' => $this->request->getPost('asset_name'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 632
- Recommendation: Validate and authorize all request input before use.

```
'asset_description' => $this->request->getPost('asset_description'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 633
- Recommendation: Validate and authorize all request input before use.

```
'asset_price' => $this->request->getPost('asset_price')
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 640
- Recommendation: Validate and authorize all request input before use.

```
$asset_id = $this->request->getPost('asset_id');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 649
- Recommendation: Validate and authorize all request input before use.

```
'asset_id' => $this->request->getPost('asset_id'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 650
- Recommendation: Validate and authorize all request input before use.

```
'order_type' => $this->request->getPost('order_type'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 651
- Recommendation: Validate and authorize all request input before use.

```
'order_price' => $this->request->getPost('order_price'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 652
- Recommendation: Validate and authorize all request input before use.

```
'order_quantity' => $this->request->getPost('order_quantity')
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 659
- Recommendation: Validate and authorize all request input before use.

```
$order_id = $this->request->getPost('order_id');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 661
- Recommendation: Validate and authorize all request input before use.

```
'order_type' => $this->request->getPost('order_type'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 662
- Recommendation: Validate and authorize all request input before use.

```
'order_price' => $this->request->getPost('order_price'),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 663
- Recommendation: Validate and authorize all request input before use.

```
'order_quantity' => $this->request->getPost('order_quantity')
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 670
- Recommendation: Validate and authorize all request input before use.

```
$order_id = $this->request->getPost('order_id');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/ExchangeController.php`
- Line: 677
- Recommendation: Validate and authorize all request input before use.

```
$order_id = $this->request->getPost('order_id');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/GeminiController.php`
- Line: 22
- Recommendation: Validate and authorize all request input before use.

```
$symbol = $this->request->getPost('symbol');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/GeminiController.php`
- Line: 23
- Recommendation: Validate and authorize all request input before use.

```
$amount = $this->request->getPost('amount');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/GeminiController.php`
- Line: 24
- Recommendation: Validate and authorize all request input before use.

```
$price = $this->request->getPost('price');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/GeminiController.php`
- Line: 25
- Recommendation: Validate and authorize all request input before use.

```
$side = $this->request->getPost('side');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/GeminiController.php`
- Line: 42
- Recommendation: Validate and authorize all request input before use.

```
$symbols = $this->request->getPost('symbols');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/GeminiController.php`
- Line: 48
- Recommendation: Validate and authorize all request input before use.

```
$currency = $this->request->getPost('currency');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/GeminiController.php`
- Line: 49
- Recommendation: Validate and authorize all request input before use.

```
$address = $this->request->getPost('address');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/GeminiController.php`
- Line: 50
- Recommendation: Validate and authorize all request input before use.

```
$amount = $this->request->getPost('amount');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/GeminiController.php`
- Line: 57
- Recommendation: Validate and authorize all request input before use.

```
$currency = $this->request->getPost('currency');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/GeminiController.php`
- Line: 64
- Recommendation: Validate and authorize all request input before use.

```
$orderId = $this->request->getPost('order_id');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/GeminiController.php`
- Line: 71
- Recommendation: Validate and authorize all request input before use.

```
$orderId = $this->request->getPost('order_id');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/GeminiController.php`
- Line: 78
- Recommendation: Validate and authorize all request input before use.

```
$symbol = $this->request->getPost('symbol');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/GeminiController.php`
- Line: 79
- Recommendation: Validate and authorize all request input before use.

```
$since = $this->request->getPost('since');
```

### MODERATE — Controller has no log_message() calls.

- Category: `observability`
- File: `app/Modules/Exchange/Controllers/GeminiController.php`
- Line: 0
- Recommendation: Add targeted logging for failures and high-risk actions.

### MODERATE — Controller reads request data but validation was not obvious.

- Category: `validation-gap`
- File: `app/Modules/Exchange/Controllers/GeminiController.php`
- Line: 0
- Recommendation: Use CI4 validation rules and authorization checks before processing request data.

### LOW — No try/catch blocks found in controller.

- Category: `error-handling`
- File: `app/Modules/Exchange/Controllers/GeminiController.php`
- Line: 0
- Recommendation: Add exception handling around external APIs, database writes, and render-sensitive flows.

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/MetaMaskController.php`
- Line: 38
- Recommendation: Validate and authorize all request input before use.

```
$publicKey = $this->request->getPost('publicKey');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/MetaMaskController.php`
- Line: 51
- Recommendation: Validate and authorize all request input before use.

```
$transaction = $this->request->getPost('transaction');
```

### CRITICAL — Possible wallet/private-key/seed material reference.

- Category: `secret-exposure`
- File: `app/Modules/Exchange/Controllers/MetaMaskController.php`
- Line: 52
- Recommendation: Never expose private keys, mnemonics, or seed phrases to views, JSON, logs, or browser scripts.

```
$privateKey = [REDACTED]'privateKey');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/MetaMaskController.php`
- Line: 52
- Recommendation: Validate and authorize all request input before use.

```
$privateKey = [REDACTED]'privateKey');
```

### CRITICAL — Possible wallet/private-key/seed material reference.

- Category: `secret-exposure`
- File: `app/Modules/Exchange/Controllers/MetaMaskController.php`
- Line: 53
- Recommendation: Never expose private keys, mnemonics, or seed phrases to views, JSON, logs, or browser scripts.

```
$response = $this->metaMask->signTransaction($transaction, $privateKey);
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/MetaMaskController.php`
- Line: 59
- Recommendation: Validate and authorize all request input before use.

```
$transaction = $this->request->getPost('transaction');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/MetaMaskController.php`
- Line: 60
- Recommendation: Validate and authorize all request input before use.

```
$signature = $this->request->getPost('signature');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/MetaMaskController.php`
- Line: 61
- Recommendation: Validate and authorize all request input before use.

```
$publicKey = $this->request->getPost('publicKey');
```

### CRITICAL — Possible wallet/private-key/seed material reference.

- Category: `secret-exposure`
- File: `app/Modules/Exchange/Controllers/MetaMaskController.php`
- Line: 68
- Recommendation: Never expose private keys, mnemonics, or seed phrases to views, JSON, logs, or browser scripts.

```
$privateKey = [REDACTED]'privateKey');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/MetaMaskController.php`
- Line: 68
- Recommendation: Validate and authorize all request input before use.

```
$privateKey = [REDACTED]'privateKey');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/MetaMaskController.php`
- Line: 69
- Recommendation: Validate and authorize all request input before use.

```
$fromAddress = $this->request->getPost('fromAddress');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/MetaMaskController.php`
- Line: 70
- Recommendation: Validate and authorize all request input before use.

```
$toAddress = $this->request->getPost('toAddress');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/MetaMaskController.php`
- Line: 71
- Recommendation: Validate and authorize all request input before use.

```
$assetId = $this->request->getPost('assetId');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/MetaMaskController.php`
- Line: 72
- Recommendation: Validate and authorize all request input before use.

```
$amount = $this->request->getPost('amount');
```

### CRITICAL — Possible wallet/private-key/seed material reference.

- Category: `secret-exposure`
- File: `app/Modules/Exchange/Controllers/MetaMaskController.php`
- Line: 73
- Recommendation: Never expose private keys, mnemonics, or seed phrases to views, JSON, logs, or browser scripts.

```
$response = $this->metaMask->sendAsset($privateKey, $fromAddress, $toAddress, $assetId, $amount);
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/MetaMaskController.php`
- Line: 79
- Recommendation: Validate and authorize all request input before use.

```
$transactionId = $this->request->getPost('transactionId');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/MetaMaskController.php`
- Line: 86
- Recommendation: Validate and authorize all request input before use.

```
$address = $this->request->getPost('address');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/MetaMaskController.php`
- Line: 93
- Recommendation: Validate and authorize all request input before use.

```
$address = $this->request->getPost('address');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/MetaMaskController.php`
- Line: 118
- Recommendation: Validate and authorize all request input before use.

```
$contractCode = $this->request->getPost('contractCode');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/MetaMaskController.php`
- Line: 119
- Recommendation: Validate and authorize all request input before use.

```
$constructorParameters = $this->request->getPost('constructorParameters');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/MetaMaskController.php`
- Line: 126
- Recommendation: Validate and authorize all request input before use.

```
$contractAddress = $this->request->getPost('contractAddress');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/MetaMaskController.php`
- Line: 127
- Recommendation: Validate and authorize all request input before use.

```
$functionName = $this->request->getPost('functionName');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/MetaMaskController.php`
- Line: 128
- Recommendation: Validate and authorize all request input before use.

```
$parameters = $this->request->getPost('parameters');
```

### MODERATE — Controller has no log_message() calls.

- Category: `observability`
- File: `app/Modules/Exchange/Controllers/MetaMaskController.php`
- Line: 0
- Recommendation: Add targeted logging for failures and high-risk actions.

### MODERATE — Controller reads request data but validation was not obvious.

- Category: `validation-gap`
- File: `app/Modules/Exchange/Controllers/MetaMaskController.php`
- Line: 0
- Recommendation: Use CI4 validation rules and authorization checks before processing request data.

### LOW — No try/catch blocks found in controller.

- Category: `error-handling`
- File: `app/Modules/Exchange/Controllers/MetaMaskController.php`
- Line: 0
- Recommendation: Add exception handling around external APIs, database writes, and render-sensitive flows.

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 184
- Recommendation: Validate and authorize all request input before use.

```
$addr  = trim((string)$this->request->getPost('address'));
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 185
- Recommendation: Validate and authorize all request input before use.

```
$label = trim((string)$this->request->getPost('label'));
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 210
- Recommendation: Validate and authorize all request input before use.

```
$id = (int)$this->request->getPost('id');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 262
- Recommendation: Validate and authorize all request input before use.

```
$walletType = $this->request->getPost('wallet_type');
```

### CRITICAL — Possible wallet/private-key/seed material reference.

- Category: `secret-exposure`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 297
- Recommendation: Never expose private keys, mnemonics, or seed phrases to views, JSON, logs, or browser scripts.

```
$privateKey = [REDACTED]'privateKey'];
```

### CRITICAL — Possible wallet/private-key/seed material reference.

- Category: `secret-exposure`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 313
- Recommendation: Never expose private keys, mnemonics, or seed phrases to views, JSON, logs, or browser scripts.

```
'access_token' =[REDACTED] $privateKey,
```

### HIGH — Possible token/access credential reference.

- Category: `token-exposure`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 313
- Recommendation: Redact tokens and keep them server-side only.

```
'access_token' =[REDACTED] $privateKey,
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 330
- Recommendation: Validate and authorize all request input before use.

```
$name = $this->request->getPost('token_name');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 331
- Recommendation: Validate and authorize all request input before use.

```
$symbol = $this->request->getPost('token_symbol');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 332
- Recommendation: Validate and authorize all request input before use.

```
$supply = $this->request->getPost('token_supply');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 333
- Recommendation: Validate and authorize all request input before use.

```
$blockchain = $this->request->getPost('blockchain');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 334
- Recommendation: Validate and authorize all request input before use.

```
$adminWallet = $this->request->getPost('admin_wallet');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 335
- Recommendation: Validate and authorize all request input before use.

```
$description = $this->request->getPost('description');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 337
- Recommendation: Validate and authorize all request input before use.

```
$logoUrl = $this->request->getPost('logo_url');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 338
- Recommendation: Validate and authorize all request input before use.

```
$attributes = $this->request->getPost('attributes');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 342
- Recommendation: Validate and authorize all request input before use.

```
$guard = service('solanaService')->guardMainnetAction('mint', (string) ($this->request->getPost('network') ?? 'devnet'));
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 407
- Recommendation: Validate and authorize all request input before use.

```
$amount = floatval($this->request->getPost('amount'));
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 408
- Recommendation: Validate and authorize all request input before use.

```
$fromToken = [REDACTED]'from_token'));
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 409
- Recommendation: Validate and authorize all request input before use.

```
$toToken = [REDACTED]'to_token'));
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 410
- Recommendation: Validate and authorize all request input before use.

```
$userId = esc($this->request->getPost('user_id'));
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 411
- Recommendation: Validate and authorize all request input before use.

```
$publicKey = esc($this->request->getPost('public_key'));
```

### CRITICAL — Possible wallet/private-key/seed material reference.

- Category: `secret-exposure`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 412
- Recommendation: Never expose private keys, mnemonics, or seed phrases to views, JSON, logs, or browser scripts.

```
$privateKey = [REDACTED]'private_key'));
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 412
- Recommendation: Validate and authorize all request input before use.

```
$privateKey = [REDACTED]'private_key'));
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 413
- Recommendation: Validate and authorize all request input before use.

```
$fromAddress = esc($this->request->getPost('from_address'));
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 414
- Recommendation: Validate and authorize all request input before use.

```
$toAddress = esc($this->request->getPost('to_address'));
```

### CRITICAL — Possible wallet/private-key/seed material reference.

- Category: `secret-exposure`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 448
- Recommendation: Never expose private keys, mnemonics, or seed phrases to views, JSON, logs, or browser scripts.

```
$transferResult = $this->MyMISolana->sendAsset($privateKey, $fromAddress, $toAddress, $fromToken, $amount);
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 459
- Recommendation: Validate and authorize all request input before use.

```
$this->sendTransactionConfirmation($this->request->getPost('user_email'), $transferResult);
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 494
- Recommendation: Validate and authorize all request input before use.

```
$address = $this->request->getVar('address')
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 599
- Recommendation: Validate and authorize all request input before use.

```
$publicKey = trim((string) $this->request->getPost('public_key'));
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 690
- Recommendation: Validate and authorize all request input before use.

```
$json = $this->request->getJSON();
```

### CRITICAL — Possible wallet/private-key/seed material reference.

- Category: `secret-exposure`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 722
- Recommendation: Never expose private keys, mnemonics, or seed phrases to views, JSON, logs, or browser scripts.

```
'access_token' =[REDACTED] $wallet['privateKey'],
```

### HIGH — Possible token/access credential reference.

- Category: `token-exposure`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 722
- Recommendation: Redact tokens and keep them server-side only.

```
'access_token' =[REDACTED] $wallet['privateKey'],
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 786
- Recommendation: Validate and authorize all request input before use.

```
$user = $this->request->getPost('user');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 787
- Recommendation: Validate and authorize all request input before use.

```
$amount = $this->request->getPost('amount');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 788
- Recommendation: Validate and authorize all request input before use.

```
$txId = $this->request->getPost('tx_id');
```

### CRITICAL — Possible wallet/private-key/seed material reference.

- Category: `secret-exposure`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 795
- Recommendation: Never expose private keys, mnemonics, or seed phrases to views, JSON, logs, or browser scripts.

```
$privateKey = [REDACTED]'private_key');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 795
- Recommendation: Validate and authorize all request input before use.

```
$privateKey = [REDACTED]'private_key');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 796
- Recommendation: Validate and authorize all request input before use.

```
$mintAddress = $this->request->getPost('mint_address');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 797
- Recommendation: Validate and authorize all request input before use.

```
$amount = $this->request->getPost('amount');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 799
- Recommendation: Validate and authorize all request input before use.

```
$guard = service('solanaService')->guardMainnetAction('mint', (string) ($this->request->getPost('network') ?? 'devnet'));
```

### CRITICAL — Possible wallet/private-key/seed material reference.

- Category: `secret-exposure`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 804
- Recommendation: Never expose private keys, mnemonics, or seed phrases to views, JSON, logs, or browser scripts.

```
$result = $this->MyMISolana->mintTokens($privateKey, $mintAddress, $amount);
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 882
- Recommendation: Validate and authorize all request input before use.

```
$method = $this->request->getPost('method'); // Determines purchase method (crypto, fiat, gold)
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 883
- Recommendation: Validate and authorize all request input before use.

```
$amount = $this->request->getPost('amount');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 884
- Recommendation: Validate and authorize all request input before use.

```
$price = $this->request->getPost('price');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 923
- Recommendation: Validate and authorize all request input before use.

```
$tokenId = $this->request->getPost('token_id');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 924
- Recommendation: Validate and authorize all request input before use.

```
$newAmount = $this->request->getPost('new_amount');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 942
- Recommendation: Validate and authorize all request input before use.

```
$walletType = $this->request->getPost('wallet_type');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 964
- Recommendation: Validate and authorize all request input before use.

```
$method = $this->request->getPost('method'); // Determines sell method (fiat, mymi_gold, crypto)
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 965
- Recommendation: Validate and authorize all request input before use.

```
$amount = $this->request->getPost('amount');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 966
- Recommendation: Validate and authorize all request input before use.

```
$price = $this->request->getPost('price');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 1016
- Recommendation: Validate and authorize all request input before use.

```
$fromToken = [REDACTED]'from_token'); // Token to swap from (e.g., SOL)
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 1017
- Recommendation: Validate and authorize all request input before use.

```
$toToken = [REDACTED]'to_token');     // Token to swap to
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 1018
- Recommendation: Validate and authorize all request input before use.

```
$amount = $this->request->getPost('amount');        // Amount to swap
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 1095
- Recommendation: Validate and authorize all request input before use.

```
$publicKey = $this->request->getPost('public_key');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 1139
- Recommendation: Validate and authorize all request input before use.

```
$p = $this->request->getPost();
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 1162
- Recommendation: Validate and authorize all request input before use.

```
$payload = $this->request->getJSON(true) ?? $this->request->getPost();
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 1260
- Recommendation: Validate and authorize all request input before use.

```
//     $addrReq = $this->request->getVar('address')
```

### CRITICAL — Possible wallet/private-key/seed material reference.

- Category: `secret-exposure`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 1354
- Recommendation: Never expose private keys, mnemonics, or seed phrases to views, JSON, logs, or browser scripts.

```
$blocked = ['privateKey', 'private_key', 'access_token', 'secret', 'secret_key', 'secret_key_b64', 'seed', 'seed_b64', 'mnemonic'];
```

### HIGH — Possible token/access credential reference.

- Category: `token-exposure`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 1354
- Recommendation: Redact tokens and keep them server-side only.

```
$blocked = ['privateKey', 'private_key', 'access_token', 'secret', 'secret_key', 'secret_key_b64', 'seed', 'seed_b64', 'mnemonic'];
```

### MODERATE — Controller reads request data but validation was not obvious.

- Category: `validation-gap`
- File: `app/Modules/Exchange/Controllers/SolanaController.php`
- Line: 0
- Recommendation: Use CI4 validation rules and authorization checks before processing request data.

### LOW — No try/catch blocks found in controller.

- Category: `error-handling`
- File: `app/Modules/Exchange/Controllers/UserController.php`
- Line: 0
- Recommendation: Add exception handling around external APIs, database writes, and render-sensitive flows.

### LOW — Console logging detected.

- Category: `production-console`
- File: `app/Modules/Exchange/Views/Buy.php`
- Line: 64
- Recommendation: Remove production console logs or guard behind a development flag.

```
console.log(buySubmit);
```

### LOW — Console logging detected.

- Category: `production-console`
- File: `app/Modules/Exchange/Views/Buy.php`
- Line: 65
- Recommendation: Remove production console logs or guard behind a development flag.

```
console.log(JSON.stringify(buySubmit));
```

### LOW — Console logging detected.

- Category: `production-console`
- File: `app/Modules/Exchange/Views/Buy.php`
- Line: 66
- Recommendation: Remove production console logs or guard behind a development flag.

```
console.log(...formData);
```

### LOW — AJAX/fetch usage detected.

- Category: `ajax-observability`
- File: `app/Modules/Exchange/Views/Buy.php`
- Line: 69
- Recommendation: Ensure loading states, error messages, CSRF headers, and retry handling are present.

```
const result = await fetch("<?= site_url('Exchange/Order_Buy_Manager'); ?>", {
```

### LOW — Console logging detected.

- Category: `production-console`
- File: `app/Modules/Exchange/Views/Buy.php`
- Line: 78
- Recommendation: Remove production console logs or guard behind a development flag.

```
console.log(data);
```

### LOW — Console logging detected.

- Category: `production-console`
- File: `app/Modules/Exchange/Views/Buy.php`
- Line: 81
- Recommendation: Remove production console logs or guard behind a development flag.

```
console.log(err);
```

### LOW — Console logging detected.

- Category: `production-console`
- File: `app/Modules/Exchange/Views/Coin_Listing_Asset_Information.php`
- Line: 239
- Recommendation: Remove production console logs or guard behind a development flag.

```
console.log(coinApplicationSubmit);
```

### LOW — Console logging detected.

- Category: `production-console`
- File: `app/Modules/Exchange/Views/Coin_Listing_Asset_Information.php`
- Line: 240
- Recommendation: Remove production console logs or guard behind a development flag.

```
console.log(JSON.stringify(coinApplicationSubmit));
```

### LOW — Console logging detected.

- Category: `production-console`
- File: `app/Modules/Exchange/Views/Coin_Listing_Asset_Information.php`
- Line: 241
- Recommendation: Remove production console logs or guard behind a development flag.

```
console.log(...formData);
```

### LOW — AJAX/fetch usage detected.

- Category: `ajax-observability`
- File: `app/Modules/Exchange/Views/Coin_Listing_Asset_Information.php`
- Line: 244
- Recommendation: Ensure loading states, error messages, CSRF headers, and retry handling are present.

```
const result = await fetch("<?= site_url('Exchange/Application-Manager/' . $cuID); ?>", {
```

### LOW — Console logging detected.

- Category: `production-console`
- File: `app/Modules/Exchange/Views/Coin_Listing_Asset_Information.php`
- Line: 254
- Recommendation: Remove production console logs or guard behind a development flag.

```
console.log(data);
```

### LOW — Console logging detected.

- Category: `production-console`
- File: `app/Modules/Exchange/Views/Coin_Listing_Asset_Information.php`
- Line: 257
- Recommendation: Remove production console logs or guard behind a development flag.

```
console.log(err);
```

### LOW — Console logging detected.

- Category: `production-console`
- File: `app/Modules/Exchange/Views/Coin_Listing_Asset_Information_Modal.php`
- Line: 138
- Recommendation: Remove production console logs or guard behind a development flag.

```
// console.log(coinApplicationSubmit);
```

### LOW — Console logging detected.

- Category: `production-console`
- File: `app/Modules/Exchange/Views/Coin_Listing_Asset_Information_Modal.php`
- Line: 139
- Recommendation: Remove production console logs or guard behind a development flag.

```
// console.log(JSON.stringify(coinApplicationSubmit));
```

### LOW — Console logging detected.

- Category: `production-console`
- File: `app/Modules/Exchange/Views/Coin_Listing_Asset_Information_Modal.php`
- Line: 140
- Recommendation: Remove production console logs or guard behind a development flag.

```
// console.log(...formData);
```

### LOW — AJAX/fetch usage detected.

- Category: `ajax-observability`
- File: `app/Modules/Exchange/Views/Coin_Listing_Asset_Information_Modal.php`
- Line: 143
- Recommendation: Ensure loading states, error messages, CSRF headers, and retry handling are present.

```
const result = await fetch("<?= site_url('Exchange/Application-Manager/' . $cuID); ?>", {
```

### LOW — Console logging detected.

- Category: `production-console`
- File: `app/Modules/Exchange/Views/Coin_Listing_Asset_Information_Modal.php`
- Line: 153
- Recommendation: Remove production console logs or guard behind a development flag.

```
console.log(data);
```

### LOW — Console logging detected.

- Category: `production-console`
- File: `app/Modules/Exchange/Views/Coin_Listing_Asset_Information_Modal.php`
- Line: 156
- Recommendation: Remove production console logs or guard behind a development flag.

```
console.log(err);
```

### LOW — Console logging detected.

- Category: `production-console`
- File: `app/Modules/Exchange/Views/Coin_Listing_Request.php`
- Line: 73
- Recommendation: Remove production console logs or guard behind a development flag.

```
// console.log(coinApplicationSubmit);
```

### LOW — Console logging detected.

- Category: `production-console`
- File: `app/Modules/Exchange/Views/Coin_Listing_Request.php`
- Line: 74
- Recommendation: Remove production console logs or guard behind a development flag.

```
// console.log(JSON.stringify(coinApplicationSubmit));
```

### LOW — Console logging detected.

- Category: `production-console`
- File: `app/Modules/Exchange/Views/Coin_Listing_Request.php`
- Line: 75
- Recommendation: Remove production console logs or guard behind a development flag.

```
// console.log(...formData);
```

### LOW — AJAX/fetch usage detected.

- Category: `ajax-observability`
- File: `app/Modules/Exchange/Views/Coin_Listing_Request.php`
- Line: 78
- Recommendation: Ensure loading states, error messages, CSRF headers, and retry handling are present.

```
const result = await fetch("<?= site_url('Exchange/Application-Manager/' . $cuID); ?>", {
```

### LOW — Console logging detected.

- Category: `production-console`
- File: `app/Modules/Exchange/Views/Coin_Listing_Request.php`
- Line: 88
- Recommendation: Remove production console logs or guard behind a development flag.

```
console.log(data);
```

### LOW — Console logging detected.

- Category: `production-console`
- File: `app/Modules/Exchange/Views/Coin_Listing_Request.php`
- Line: 91
- Recommendation: Remove production console logs or guard behind a development flag.

```
console.log(err);
```

### LOW — Console logging detected.

- Category: `production-console`
- File: `app/Modules/Exchange/Views/Sell.php`
- Line: 64
- Recommendation: Remove production console logs or guard behind a development flag.

```
console.log(sellSubmit);
```

### LOW — Console logging detected.

- Category: `production-console`
- File: `app/Modules/Exchange/Views/Sell.php`
- Line: 65
- Recommendation: Remove production console logs or guard behind a development flag.

```
console.log(JSON.stringify(sellSubmit));
```

### LOW — Console logging detected.

- Category: `production-console`
- File: `app/Modules/Exchange/Views/Sell.php`
- Line: 66
- Recommendation: Remove production console logs or guard behind a development flag.

```
console.log(...formData);
```

### LOW — AJAX/fetch usage detected.

- Category: `ajax-observability`
- File: `app/Modules/Exchange/Views/Sell.php`
- Line: 69
- Recommendation: Ensure loading states, error messages, CSRF headers, and retry handling are present.

```
const result = await fetch("<?= site_url('Exchange/Order_Sell_Manager'); ?>", {
```

### LOW — Console logging detected.

- Category: `production-console`
- File: `app/Modules/Exchange/Views/Sell.php`
- Line: 78
- Recommendation: Remove production console logs or guard behind a development flag.

```
console.log(data);
```

### LOW — Console logging detected.

- Category: `production-console`
- File: `app/Modules/Exchange/Views/Sell.php`
- Line: 81
- Recommendation: Remove production console logs or guard behind a development flag.

```
console.log(err);
```

### CRITICAL — Possible wallet/private-key/seed material reference.

- Category: `secret-exposure`
- File: `app/Modules/Exchange/Views/Solana/coinSwap.php`
- Line: 54
- Recommendation: Never expose private keys, mnemonics, or seed phrases to views, JSON, logs, or browser scripts.

```
<label for="private_key">Private Key</label>
```

### CRITICAL — Possible wallet/private-key/seed material reference.

- Category: `secret-exposure`
- File: `app/Modules/Exchange/Views/Solana/coinSwap.php`
- Line: 55
- Recommendation: Never expose private keys, mnemonics, or seed phrases to views, JSON, logs, or browser scripts.

```
<input type="text" name="private_key" id="private_key" class="form-control" value="<?= set_value('private_key') ?>" required>
```

### CRITICAL — Possible wallet/private-key/seed material reference.

- Category: `secret-exposure`
- File: `app/Modules/Exchange/Views/Solana/create.php`
- Line: 59
- Recommendation: Never expose private keys, mnemonics, or seed phrases to views, JSON, logs, or browser scripts.

```
'cuPrivateKey' =[REDACTED] $cuPrivateKey,
```

### LOW — AJAX/fetch usage detected.

- Category: `ajax-observability`
- File: `app/Modules/Exchange/Views/Solana/index.php`
- Line: 390
- Recommendation: Ensure loading states, error messages, CSRF headers, and retry handling are present.

```
$.ajax({
```

### LOW — Console logging detected.

- Category: `production-console`
- File: `app/Modules/Exchange/Views/Solana/index.php`
- Line: 564
- Recommendation: Remove production console logs or guard behind a development flag.

```
//     console.log("WebSocket initialized in index.php");
```

### LOW — Console logging detected.

- Category: `production-console`
- File: `app/Modules/Exchange/Views/Solana/index.php`
- Line: 572
- Recommendation: Remove production console logs or guard behind a development flag.

```
console.log("WebSocket connection established");
```

### HIGH — Potential unsafe browser-side DOM/script behavior.

- Category: `xss-risk`
- File: `app/Modules/Exchange/Views/Solana/index.php`
- Line: 587
- Recommendation: Use textContent, safe templating, and avoid eval/document.write.

```
assetsList.innerHTML = ''; // Clear the current list
```

### HIGH — Potential unsafe browser-side DOM/script behavior.

- Category: `xss-risk`
- File: `app/Modules/Exchange/Views/Solana/index.php`
- Line: 607
- Recommendation: Use textContent, safe templating, and avoid eval/document.write.

```
notificationsList.innerHTML = ''; // Clear current notifications
```

### HIGH — Potential unsafe browser-side DOM/script behavior.

- Category: `xss-risk`
- File: `app/Modules/Exchange/Views/Solana/index.php`
- Line: 669
- Recommendation: Use textContent, safe templating, and avoid eval/document.write.

```
tableBody.innerHTML = ''; // Clear current rows
```

### CRITICAL — Possible wallet/private-key/seed material reference.

- Category: `secret-exposure`
- File: `app/Modules/Exchange/Views/Solana/swap-working.php`
- Line: 243
- Recommendation: Never expose private keys, mnemonics, or seed phrases to views, JSON, logs, or browser scripts.

```
<label for="walletPrivateKey" class="form-label">Private Key</label>
```

### CRITICAL — Possible wallet/private-key/seed material reference.

- Category: `secret-exposure`
- File: `app/Modules/Exchange/Views/Solana/swap-working.php`
- Line: 244
- Recommendation: Never expose private keys, mnemonics, or seed phrases to views, JSON, logs, or browser scripts.

```
<input type="password" class="form-control" id="walletPrivateKey" name="walletPrivateKey" required>
```

### LOW — AJAX/fetch usage detected.

- Category: `ajax-observability`
- File: `app/Modules/Exchange/Views/Solana/swap-working.php`
- Line: 273
- Recommendation: Ensure loading states, error messages, CSRF headers, and retry handling are present.

```
fetch(`<?= base_url('API/Solana/getExchangePrice') ?>/SOL`)
```

### LOW — Console logging detected.

- Category: `production-console`
- File: `app/Modules/Exchange/Views/Solana/swap-working.php`
- Line: 276
- Recommendation: Remove production console logs or guard behind a development flag.

```
console.log("Exchange Price Response Data: ", data);
```

### LOW — AJAX/fetch usage detected.

- Category: `ajax-observability`
- File: `app/Modules/Exchange/Views/Solana/swap-working.php`
- Line: 288
- Recommendation: Ensure loading states, error messages, CSRF headers, and retry handling are present.

```
fetch(`<?= base_url('API/Solana/getTokenPrice') ?>/${selectedToken}`)
```

### LOW — Console logging detected.

- Category: `production-console`
- File: `app/Modules/Exchange/Views/Solana/swap-working.php`
- Line: 291
- Recommendation: Remove production console logs or guard behind a development flag.

```
console.log("Token Price Response Data: ", data);
```

### LOW — AJAX/fetch usage detected.

- Category: `ajax-observability`
- File: `app/Modules/Exchange/Views/Solana/swap.php`
- Line: 218
- Recommendation: Ensure loading states, error messages, CSRF headers, and retry handling are present.

```
fetch(`https://www.mymiwallet.com/index.[REDACTED_LONG_VALUE]${selectedFromToken}`)
```

### LOW — AJAX/fetch usage detected.

- Category: `ajax-observability`
- File: `app/Modules/Exchange/Views/Solana/swap.php`
- Line: 227
- Recommendation: Ensure loading states, error messages, CSRF headers, and retry handling are present.

```
fetch(`https://www.mymiwallet.com/index.php/API/Solana/getTokenPrice/${selectedToToken}`)
```

### LOW — AJAX/fetch usage detected.

- Category: `ajax-observability`
- File: `app/Modules/Exchange/Views/Solana/swap.php`
- Line: 235
- Recommendation: Ensure loading states, error messages, CSRF headers, and retry handling are present.

```
fetch(`<?= base_url('index.php/API/Solana/getCoinAmount') ?>/${selectedToken}`)
```

### LOW — AJAX/fetch usage detected.

- Category: `ajax-observability`
- File: `app/Modules/Exchange/Views/Solana/swap.php`
- Line: 348
- Recommendation: Ensure loading states, error messages, CSRF headers, and retry handling are present.

```
//         fetch(`https://www.mymiwallet.com/index.[REDACTED_LONG_VALUE]${selectedFromToken}`)
```

### LOW — AJAX/fetch usage detected.

- Category: `ajax-observability`
- File: `app/Modules/Exchange/Views/Solana/swap.php`
- Line: 361
- Recommendation: Ensure loading states, error messages, CSRF headers, and retry handling are present.

```
//         fetch(`https://www.mymiwallet.com/index.php/API/Solana/getTokenPrice/${selectedToken}`)
```

### LOW — AJAX/fetch usage detected.

- Category: `ajax-observability`
- File: `app/Modules/Exchange/Views/Solana/swap.php`
- Line: 447
- Recommendation: Ensure loading states, error messages, CSRF headers, and retry handling are present.

```
//         fetch(`<?=base_url('index.php/API/Solana/getCoinAmount')?>/${selectedToken}`)
```

### LOW — AJAX/fetch usage detected.

- Category: `ajax-observability`
- File: `app/Modules/Exchange/Views/Solana/trade.php`
- Line: 110
- Recommendation: Ensure loading states, error messages, CSRF headers, and retry handling are present.

```
fetch('index.php/API/Solana/getMarketPrice')
```

### LOW — AJAX/fetch usage detected.

- Category: `ajax-observability`
- File: `app/Modules/Exchange/Views/Solana/trade.php`
- Line: 146
- Recommendation: Ensure loading states, error messages, CSRF headers, and retry handling are present.

```
fetch('Exchange/Solana/Purchase', {
```

### LOW — AJAX/fetch usage detected.

- Category: `ajax-observability`
- File: `app/Modules/Exchange/Views/Solana/trade.php`
- Line: 170
- Recommendation: Ensure loading states, error messages, CSRF headers, and retry handling are present.

```
fetch('Exchange/Solana/Sell', { // Ensure the correct URL is used for processing the sell request
```

### LOW — AJAX/fetch usage detected.

- Category: `ajax-observability`
- File: `app/Modules/Exchange/Views/Solana/viewWallet.php`
- Line: 193
- Recommendation: Ensure loading states, error messages, CSRF headers, and retry handling are present.

```
fetch("<?= site_url('Exchange/Solana/Edit-Wallet') ?>", {
```

### LOW — AJAX/fetch usage detected.

- Category: `ajax-observability`
- File: `app/Modules/Exchange/Views/includes/application-modal.php`
- Line: 20
- Recommendation: Ensure loading states, error messages, CSRF headers, and retry handling are present.

```
$.ajax({
```

### LOW — AJAX/fetch usage detected.

- Category: `ajax-observability`
- File: `app/Modules/Exchange/Views/includes/application-modal.php`
- Line: 43
- Recommendation: Ensure loading states, error messages, CSRF headers, and retry handling are present.

```
$.ajax({
```

### LOW — AJAX/fetch usage detected.

- Category: `ajax-observability`
- File: `app/Modules/Exchange/Views/includes/application-modal.php`
- Line: 66
- Recommendation: Ensure loading states, error messages, CSRF headers, and retry handling are present.

```
$.ajax({
```

### LOW — AJAX/fetch usage detected.

- Category: `ajax-observability`
- File: `app/Modules/Exchange/Views/includes/application-modal.php`
- Line: 89
- Recommendation: Ensure loading states, error messages, CSRF headers, and retry handling are present.

```
$.ajax({
```

### LOW — AJAX/fetch usage detected.

- Category: `ajax-observability`
- File: `app/Modules/Exchange/Views/includes/application-modal.php`
- Line: 112
- Recommendation: Ensure loading states, error messages, CSRF headers, and retry handling are present.

```
$.ajax({
```

### LOW — AJAX/fetch usage detected.

- Category: `ajax-observability`
- File: `app/Modules/Exchange/Views/includes/application-modal.php`
- Line: 135
- Recommendation: Ensure loading states, error messages, CSRF headers, and retry handling are present.

```
$.ajax({
```

## Suggested Next Tasks

- Fix any critical/high findings first.
- Convert repeated controller/model work into cached service methods.
- Remove production debug logs that expose tokens, CSRF hashes, request payloads, or internal model details.
- Add browser validation for affected routes and modal actions.
