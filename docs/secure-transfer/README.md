# MyMI Secure Transfer (protocol MST1)

Wallet-to-wallet file sharing for MyMI Wallet. Files are encrypted on the sender's device and only the recipients' devices can open them. The server stores ciphertext and a signed manifest, never a key, a file name or the plain file.

The feature is **off by default**. With `SECURE_TRANSFER_ENABLED` unset, every route answers 404.

## How it works

1. **Link a device.** The user connects a Solana wallet (Phantom, Solflare). The browser makes an X25519 "transfer key" and keeps it in this browser's storage. The wallet signs a binding statement:

   ```text
   MyMI Secure Transfer key binding
   version: 1
   domain: mymiwallet.com
   wallet: <base58 address>
   transfer_key: <base64 X25519 public key>
   nonce: <server nonce, single use, 5 minutes>
   issued_at: <unix time>
   ```

   The server checks the Ed25519 signature against the wallet address before storing the key. A wallet stays tied to the first account that linked it.

   Without a browser wallet, the user types their address instead. The page then shows each statement (the binding, and later each manifest) for the user to sign in their own wallet app and paste back. It accepts base58, base64 or hex, and checks the signature against the address in the browser before using it, so a typed address alone never links a wallet.

2. **Send.** The sender's browser:
   - fetches each recipient's linked keys and checks every binding signature itself, so it does not rely on the server's word;
   - makes a random 32-byte file key and encrypts the file in 64 KiB chunks with XSalsa20-Poly1305 (`crypto_secretbox`), nonce = 16 random bytes followed by the chunk index;
   - seals the name, type and size under the same key;
   - wraps the file key for every verified device of each recipient with `crypto_box` from a fresh ephemeral key pair (one manifest entry per wallet and device key, so a laptop and a phone can both open it);
   - writes a manifest (canonical JSON, sorted keys) and has the wallet sign `MyMI Secure Transfer manifest v1\nsha256: <hex>`.

   The server checks the manifest shape, limits, sender binding, recipient keys, ciphertext hash and the signature, then stores it.

3. **Open.** The recipient's browser checks the sender signature, checks the ciphertext hash, unwraps the key with its device key and decrypts each chunk. Any mismatch stops with a reason code and nothing is shown.

PHP (`app/Libraries/SecureTransfer/TransferCrypto.php`, libsodium) and the browser (`public/assets/js/secure-transfer/mst1.js`, tweetnacl 1.0.3, self-hosted) produce the same bytes. `tests/unit/SecureTransfer/SecureTransferInteropTest.php` proves it both ways when Node is installed.

## What it protects and what it does not

- A server or database leak exposes ciphertext, wallet addresses, sizes and times. It does not expose files, names or keys.
- A compromised server cannot swap a recipient's key without the recipient's wallet signature, because senders check the bindings in the browser.
- It does not protect a device that is already compromised, and the page code is served by the site, so a compromised site could serve bad JavaScript. Use HTTPS, the CSP nonces already in place, and keep releases reviewed.
- Losing the browser's site data loses the device key. Files sent to that key can no longer be opened. The page says so.
- Nothing goes on-chain. The wallet is used only to sign statements.
- The sender's browser checks every binding signature, but it trusts the server's list of which keys are still active. A dishonest server could keep offering a key the recipient revoked. It still cannot invent a key.
- The binding is a plain wallet `signMessage`. A phishing page could ask a user to sign an attacker's binding statement and link that wallet to the attacker's account. Users should only sign a statement whose `domain:` line is `mymiwallet.com`; a Sign-In-With-Solana style prompt is a later improvement.
- Any signed-in user can see whether a wallet has linked devices (`/recipient/{wallet}`). That is needed to send to it.
- A file sent before a device was linked opens only on the devices linked at the time.
- Daily send limits are checked before the upload is saved, so several uploads started at the same moment can go slightly over them.

## Routes

Web (filters `login`, `noStore`, CSRF on POST), under `/SecureTransfer`:

| Method | Path | Purpose |
| --- | --- | --- |
| GET | `/` | Page |
| POST | `/challenge` | New binding nonce |
| POST, GET | `/keys` | Link a device key, list mine |
| POST | `/keys/revoke` | Unlink a device key |
| GET | `/recipient/{wallet}` | A wallet's linked keys with their signed statements |
| POST | `/send` | Upload manifest, signature, ciphertext |
| GET | `/inbox`, `/outbox` | Lists |
| GET | `/transfer/{id}?wallet=` | Manifest and signature (recipients only) |
| GET | `/blob/{id}?wallet=` | Ciphertext (recipients only) |
| POST | `/revoke` | Withdraw a sent file |

API (`apiToken`): `GET /API/v1/SecureTransfer/status` returns counts and limits only. The TBI AIOps MCP reads it.

The user id always comes from the session, never from the request.

## Settings (`.env`)

| Key | Default |
| --- | --- |
| `SECURE_TRANSFER_ENABLED` | `false` |
| `SECURE_TRANSFER_DOMAIN` | `mymiwallet.com` |
| `SECURE_TRANSFER_MAX_BYTES` | 25 MiB |
| `SECURE_TRANSFER_STORAGE` | `writable/secure_transfer` (dirs 0700, files 0600) |

Other limits are in `app/Config/SecureTransfer.php`: 10 recipients, 30 days, 5 keys per wallet, 50 transfers and 250 MiB per user per day.

## Activation (staging first)

Each step needs owner approval. Do not run plain `php spark migrate` in production.

1. Deploy the merged ref to staging with `scripts/ops/staging/mymi-staging.sh deploy <ref>`.
2. Run only this migration: `MIGRATE=2026-11-21-000100_CreateSecureTransferTables`, using the release's named-migration path.
3. Set `SECURE_TRANSFER_ENABLED=true` in staging `.env` and reload PHP-FPM.
4. Test with two wallets: link, send, open, withdraw.
5. Add the purge job to cron: `php spark securetransfer:purge --apply` daily. Without `--apply` it only counts.
6. Repeat for production after a separate approval.

## Rollback

Set `SECURE_TRANSFER_ENABLED=false` (every route goes back to 404). The tables can stay; the migration's `down()` is empty on purpose so no data is dropped by accident. Revert the PR to remove the code.
