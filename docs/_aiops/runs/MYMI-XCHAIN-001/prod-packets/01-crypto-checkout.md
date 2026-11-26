# Production Promotion Packet 01: Multi-Chain Crypto Checkout

**Feature Scope:** Multi-chain crypto checkout (USDC on Ethereum, Base, Solana; XRP on XRPL; BTC via dedicated pool addresses).

---

### 1. Prerequisites & Required Gates
- **G-RPC:** Add production keyed RPC endpoints for Ethereum and Base (Alchemy / Infura / QuickNode) to `/apps/TBI/www/mymiwallet/shared/.env`.
- **G-W3-SEPOLIA:** Pass owner verification on staging testnets (Sepolia / Devnet).
- **G-PR-MERGE:** Pull request merged into `main`.
- **G-PROD-DEPLOY:** Owner authorization for production release deployment.
- **G14:** Financial security sign-off for turning on crypto checkout in production.

---

### 2. Required Database Migrations
Run named migrations via `run-migrations.php`:
```bash
MIGRATE="CreateCryptoPayRequests,CreateBtcAddressPool"
```

---

### 3. Production Environment (.env) Configuration
Add the following to `/apps/TBI/www/mymiwallet/shared/.env`:
```bash
# Multi-Chain Crypto Checkout Configuration
CRYPTO_PAY_ENABLED=true
CRYPTO_PAY_ETHEREUM_NETWORK=mainnet
CRYPTO_PAY_BASE_NETWORK=base-mainnet
CRYPTO_PAY_BITCOIN_NETWORK=mainnet
CRYPTO_PAY_XRPL_NETWORK=mainnet

# Production Keyed RPCs (Replace with production API keys)
CRYPTO_PAY_ETHEREUM_RPC=https://eth-mainnet.g.alchemy.com/v2/YOUR_ALCHEMY_KEY,https://mainnet.infura.io/v3/YOUR_INFURA_KEY
CRYPTO_PAY_BASE_RPC=https://base-mainnet.g.alchemy.com/v2/YOUR_ALCHEMY_KEY
CRYPTO_PAY_BITCOIN_ESPLORA=https://blockstream.info/api
CRYPTO_PAY_XRPL_JSONRPC=https://xrplcluster.com,https://s1.ripple.com:51234
CRYPTO_PAY_USDC_ETHEREUM_CONTRACT=0xa0b86991c6218b36c1d19d4a2e9eb0ce3606eb48
CRYPTO_PAY_USDC_BASE_CONTRACT=0x833589fcd6edb6e08f4c7c32d4f71b54bda02913

# Compliance & OFAC Screening
FEATURE_SANCTIONS_SCREENING=true
```

---

### 4. Bitcoin Pool Offline Address Import
Before launching mainnet BTC checkouts, import pre-generated public addresses derived offline from the owner's cold xpub:
```bash
cd /apps/TBI/www/mymiwallet/current && \
sudo -u www-data php spark cryptopay:btc-pool-import /path/to/mainnet-pool-addresses.json
```

---

### 5. Automated Reconciliation Cron
Ensure the hourly reconciliation cron is active in production `/etc/cron.d/mymi-cryptopay`:
```cron
0 * * * * www-data cd /apps/TBI/www/mymiwallet/current && php spark cryptopay:reconcile >/dev/null 2>&1
0 3 * * * www-data cd /apps/TBI/www/mymiwallet/current && php spark compliance:update-sanctions >/dev/null 2>&1
```

---

### 6. Smoke Verification
1. Verify routes load: `curl -sI https://www.mymiwallet.com/Pay/Crypto`
2. Test admin support view: `GET /Admin/Crypto/Checkouts` (admin role session)
3. Check sanctions screening responds:
   ```bash
   sudo -u www-data php spark compliance:update-sanctions --offline-seed
   ```

---

### 7. Rollback Plan
To immediately disable crypto payments without downtime:
1. In `/apps/TBI/www/mymiwallet/shared/.env`, set `CRYPTO_PAY_ENABLED=false`.
2. Clear CodeIgniter cache:
   ```bash
   sudo rm -f /apps/TBI/www/mymiwallet/shared/writable/cache/FileLocatorCache
   ```
3. Checkout routes will immediately return `404 / disabled` status. Existing orders remain preserved in `bf_crypto_pay_requests`.
