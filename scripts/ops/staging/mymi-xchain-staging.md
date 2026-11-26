# MYMI-XCHAIN-001 Staging Deployment & Activation Packet

**Target Host:** `gq-ai01`  
**Target Environment:** Staging (`https://staging.mymiwallet.com`)  
**Integration Branch:** `integration/mymi-xchain-001`  
**Safety Mandate:** Sandboxes, testnets, and devnets only. Zero real keys or production money funds.

---

### One-Block Staging Deployment (Copy & Paste to iPad / Terminal)

```bash
# 1. Fetch latest integration ref and deploy to staging
cd /apps/TBI/repos/mymiwallet-next && git fetch origin integration/mymi-xchain-001 && \
sudo bash /apps/TBI/repos/mymiwallet-next/scripts/ops/staging/mymi-staging.sh deploy integration/mymi-xchain-001 && \

# 2. Append staging feature switches and testnet configuration
sudo bash -c 'cat << "EOF" >> /apps/TBI/www/mymiwallet-staging/shared/.env

# --- MYMI-XCHAIN-001 Staging Configuration (Testnets & Devnets Only) ---
CRYPTO_PAY_ENABLED=true
FEATURE_MYMIGOLD_PURCHASES=true
FEATURE_SANCTIONS_SCREENING=true
FEATURE_SWAPS=true
FEATURE_EXCHANGE_PAPER=true
FEATURE_MYMICOIN_OFFERING=true
SWAPS_EXECUTE=false
MYMIGOLD_DAILY_CAP_USD=2000
MYMIGOLD_DISCOUNT_BPS=1000
CRYPTO_PAY_ETHEREUM_NETWORK=sepolia
CRYPTO_PAY_BASE_NETWORK=base-sepolia
CRYPTO_PAY_BITCOIN_NETWORK=testnet
CRYPTO_PAY_XRPL_NETWORK=testnet
EOF' && \

# 3. Run named migrations safely
cd /apps/TBI/www/mymiwallet-staging/current && \
sudo -u www-data php scripts/ops/db/run-migrations.php 2026-11-25-000100_CreateCryptoPayRequests 2026-11-25-000200_CreateGoldLedger 2026-11-25-000300_CreateBtcAddressPool 2026-11-25-000400_CreatePaperExchangeTables 2026-11-25-000500_CreateMyMICoinInterestTable && \

# 4. Clear CodeIgniter FileLocator cache
sudo rm -f /apps/TBI/www/mymiwallet-staging/shared/writable/cache/FileLocatorCache && \

# 5. Populate initial sanctions seed
sudo -u www-data php spark compliance:update-sanctions --offline-seed && \

# 6. Run staging smoke verification
bash scripts/ops/staging/mymi-xchain-smoke.sh /apps/TBI/www/mymiwallet-staging/current
```

---

### Cron Configuration (Staging Automated Maintenance)

To activate automatic payment reconciliation and sanctions refreshes on staging, add the following to `/etc/cron.d/mymi-xchain-staging`:

```cron
# Sweep open testnet crypto pay checkouts hourly
0 * * * * www-data cd /apps/TBI/www/mymiwallet-staging/current && php spark cryptopay:reconcile >/dev/null 2>&1

# Refresh OFAC sanctions list daily at 03:00 UTC
0 3 * * * www-data cd /apps/TBI/www/mymiwallet-staging/current && php spark compliance:update-sanctions >/dev/null 2>&1
```

---

### Rollback Procedure

If any issue occurs on staging:
1. Revert staging `.env` by removing the `MYMI-XCHAIN-001` block.
2. Roll back staging to previous release:
   ```bash
   sudo bash /apps/TBI/repos/mymiwallet-next/scripts/ops/staging/mymi-staging.sh deploy main
   ```
