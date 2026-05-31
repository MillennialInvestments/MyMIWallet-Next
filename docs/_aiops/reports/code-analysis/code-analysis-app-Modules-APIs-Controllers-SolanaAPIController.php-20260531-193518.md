# AIOps Code Analysis

- Generated: 2026-05-31T19:35:18+00:00
- Repo: current
- Files scanned: 1
- Findings: 33
- Risk score: 100 / 100
- Risk level: CRITICAL

## Executive Summary

Deterministic analysis found issues or review points that may affect security, UX, backend efficiency, or maintainability.

## Files

- `app/Modules/APIs/Controllers/SolanaAPIController.php`

## Findings

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/APIs/Controllers/SolanaAPIController.php`
- Line: 116
- Recommendation: Validate and authorize all request input before use.

```
$walletType = $this->request->getPost('wallet_type');
```

### CRITICAL — Possible wallet/private-key/seed material reference.

- Category: `secret-exposure`
- File: `app/Modules/APIs/Controllers/SolanaAPIController.php`
- Line: 145
- Recommendation: Never expose private keys, mnemonics, or seed phrases to views, JSON, logs, or browser scripts.

```
$privateKey = [REDACTED]'privateKey'];
```

### CRITICAL — Possible wallet/private-key/seed material reference.

- Category: `secret-exposure`
- File: `app/Modules/APIs/Controllers/SolanaAPIController.php`
- Line: 161
- Recommendation: Never expose private keys, mnemonics, or seed phrases to views, JSON, logs, or browser scripts.

```
'access_token' =[REDACTED] $this->encryptSolanaSecretForStorage($privateKey),
```

### HIGH — Possible token/access credential reference.

- Category: `token-exposure`
- File: `app/Modules/APIs/Controllers/SolanaAPIController.php`
- Line: 161
- Recommendation: Redact tokens and keep them server-side only.

```
'access_token' =[REDACTED] $this->encryptSolanaSecretForStorage($privateKey),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/APIs/Controllers/SolanaAPIController.php`
- Line: 182
- Recommendation: Validate and authorize all request input before use.

```
$tokenName = $this->request->getPost('token_name');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/APIs/Controllers/SolanaAPIController.php`
- Line: 183
- Recommendation: Validate and authorize all request input before use.

```
$tokenSymbol = $this->request->getPost('token_symbol');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/APIs/Controllers/SolanaAPIController.php`
- Line: 184
- Recommendation: Validate and authorize all request input before use.

```
$tokenSupply = $this->request->getPost('token_supply');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/APIs/Controllers/SolanaAPIController.php`
- Line: 207
- Recommendation: Validate and authorize all request input before use.

```
$fromToken = [REDACTED]'from_token');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/APIs/Controllers/SolanaAPIController.php`
- Line: 208
- Recommendation: Validate and authorize all request input before use.

```
$toToken = [REDACTED]'to_token');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/APIs/Controllers/SolanaAPIController.php`
- Line: 209
- Recommendation: Validate and authorize all request input before use.

```
$amount = $this->request->getPost('amount');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/APIs/Controllers/SolanaAPIController.php`
- Line: 210
- Recommendation: Validate and authorize all request input before use.

```
$userId = $this->request->getPost('user_id');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/APIs/Controllers/SolanaAPIController.php`
- Line: 211
- Recommendation: Validate and authorize all request input before use.

```
$publicKey = $this->request->getPost('public_key');
```

### CRITICAL — Possible wallet/private-key/seed material reference.

- Category: `secret-exposure`
- File: `app/Modules/APIs/Controllers/SolanaAPIController.php`
- Line: 212
- Recommendation: Never expose private keys, mnemonics, or seed phrases to views, JSON, logs, or browser scripts.

```
return $this->[REDACTED_LONG_VALUE]();
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/APIs/Controllers/SolanaAPIController.php`
- Line: 213
- Recommendation: Validate and authorize all request input before use.

```
$fromAddress = $this->request->getPost('from_address');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/APIs/Controllers/SolanaAPIController.php`
- Line: 214
- Recommendation: Validate and authorize all request input before use.

```
$toAddress = $this->request->getPost('to_address');
```

### CRITICAL — Possible wallet/private-key/seed material reference.

- Category: `secret-exposure`
- File: `app/Modules/APIs/Controllers/SolanaAPIController.php`
- Line: 229
- Recommendation: Never expose private keys, mnemonics, or seed phrases to views, JSON, logs, or browser scripts.

```
$transactionResult = $this->MyMISolana->sendAsset($privateKey, $fromAddress, $toAddress, $fromToken, $amount);
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/APIs/Controllers/SolanaAPIController.php`
- Line: 233
- Recommendation: Validate and authorize all request input before use.

```
$this->sendTransactionConfirmation($this->request->getPost('user_email'), $transactionResult);
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/APIs/Controllers/SolanaAPIController.php`
- Line: 248
- Recommendation: Validate and authorize all request input before use.

```
$draw = (int) ($request->getPost('draw') ?? 1);
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/APIs/Controllers/SolanaAPIController.php`
- Line: 249
- Recommendation: Validate and authorize all request input before use.

```
$start = max(0, (int) ($request->getPost('start') ?? 0));
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/APIs/Controllers/SolanaAPIController.php`
- Line: 250
- Recommendation: Validate and authorize all request input before use.

```
$length = max(1, min(100, (int) ($request->getPost('length') ?? 10)));
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/APIs/Controllers/SolanaAPIController.php`
- Line: 251
- Recommendation: Validate and authorize all request input before use.

```
$search = $request->getPost('search');
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/APIs/Controllers/SolanaAPIController.php`
- Line: 363
- Recommendation: Validate and authorize all request input before use.

```
$json = $this->request->getJSON();
```

### CRITICAL — Possible wallet/private-key/seed material reference.

- Category: `secret-exposure`
- File: `app/Modules/APIs/Controllers/SolanaAPIController.php`
- Line: 395
- Recommendation: Never expose private keys, mnemonics, or seed phrases to views, JSON, logs, or browser scripts.

```
'access_token' =[REDACTED] $this->encryptSolanaSecretForStorage($wallet['privateKey'] ?? null),
```

### HIGH — Possible token/access credential reference.

- Category: `token-exposure`
- File: `app/Modules/APIs/Controllers/SolanaAPIController.php`
- Line: 395
- Recommendation: Redact tokens and keep them server-side only.

```
'access_token' =[REDACTED] $this->encryptSolanaSecretForStorage($wallet['privateKey'] ?? null),
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/APIs/Controllers/SolanaAPIController.php`
- Line: 536
- Recommendation: Validate and authorize all request input before use.

```
$result = $service->transfer((string) $this->request->getPost('from'), (string) $this->request->getPost('to'), (string) $this->request->getPost('amount'), ['network' => (string) ($this->request->getPost('network') ?? $service->currentNetwork())]);
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/APIs/Controllers/SolanaAPIController.php`
- Line: 542
- Recommendation: Validate and authorize all request input before use.

```
$payload = (array) ($this->request->getJSON(true) ?? $this->request->getPost());
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/APIs/Controllers/SolanaAPIController.php`
- Line: 549
- Recommendation: Validate and authorize all request input before use.

```
$payload = (array) ($this->request->getJSON(true) ?? $this->request->getPost());
```

### MODERATE — Request input is used in this file.

- Category: `input-validation`
- File: `app/Modules/APIs/Controllers/SolanaAPIController.php`
- Line: 557
- Recommendation: Validate and authorize all request input before use.

```
$result = $service->mintTo((string) $this->request->getPost('mint'), (string) $this->request->getPost('dest'), (string) $this->request->getPost('amount'), (string) ($this->request->getPost('network') ?? $service->currentNetwork()));
```

### CRITICAL — Possible wallet/private-key/seed material reference.

- Category: `secret-exposure`
- File: `app/Modules/APIs/Controllers/SolanaAPIController.php`
- Line: 588
- Recommendation: Never expose private keys, mnemonics, or seed phrases to views, JSON, logs, or browser scripts.

```
$blocked = ['privateKey', 'private_key', 'access_token', 'secret', 'secret_key', 'secret_key_b64', 'seed', 'seed_b64', 'mnemonic'];
```

### HIGH — Possible token/access credential reference.

- Category: `token-exposure`
- File: `app/Modules/APIs/Controllers/SolanaAPIController.php`
- Line: 588
- Recommendation: Redact tokens and keep them server-side only.

```
$blocked = ['privateKey', 'private_key', 'access_token', 'secret', 'secret_key', 'secret_key_b64', 'seed', 'seed_b64', 'mnemonic'];
```

### CRITICAL — Possible wallet/private-key/seed material reference.

- Category: `secret-exposure`
- File: `app/Modules/APIs/Controllers/SolanaAPIController.php`
- Line: 692
- Recommendation: Never expose private keys, mnemonics, or seed phrases to views, JSON, logs, or browser scripts.

```
private function [REDACTED_LONG_VALUE]()
```

### CRITICAL — Possible wallet/private-key/seed material reference.

- Category: `secret-exposure`
- File: `app/Modules/APIs/Controllers/SolanaAPIController.php`
- Line: 694
- Recommendation: Never expose private keys, mnemonics, or seed phrases to views, JSON, logs, or browser scripts.

```
log_message('warning', 'Blocked browser-submitted Solana private_key payload for endpoint={uri}', [
```

### MODERATE — Controller reads request data but validation was not obvious.

- Category: `validation-gap`
- File: `app/Modules/APIs/Controllers/SolanaAPIController.php`
- Line: 0
- Recommendation: Use CI4 validation rules and authorization checks before processing request data.

## Suggested Next Tasks

- Fix any critical/high findings first.
- Convert repeated controller/model work into cached service methods.
- Remove production debug logs that expose tokens, CSRF hashes, request payloads, or internal model details.
- Add browser validation for affected routes and modal actions.
