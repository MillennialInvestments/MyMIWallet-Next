# AIOps Code Analysis

- Generated: 2026-05-31T19:26:12+00:00
- Repo: current
- Files scanned: 1
- Findings: 60
- Risk score: 100 / 100
- Risk level: CRITICAL

## Executive Summary

Deterministic analysis found issues or review points that may affect security, UX, backend efficiency, or maintainability.

## Files

- `app/Modules/Exchange/Controllers/SolanaController.php`

## Findings

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

## Suggested Next Tasks

- Fix any critical/high findings first.
- Convert repeated controller/model work into cached service methods.
- Remove production debug logs that expose tokens, CSRF hashes, request payloads, or internal model details.
- Add browser validation for affected routes and modal actions.
