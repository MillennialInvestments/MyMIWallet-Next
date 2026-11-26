# MYMI-XCHAIN-002 Staging Deployment Packet

**Mission ID:** `MYMI-XCHAIN-002`  
**Target:** `https://staging.mymiwallet.com` on `gq-ai01`  
**Branch:** `integration/mymi-xchain-002`  

---

## One-Block Staging Deployment Command

Copy and paste this single batched block on `gq-ai01`:

```bash
# 1. Fetch latest integration branch and deploy staging
cd /apps/TBI/repos/mymiwallet-next && git fetch origin integration/mymi-xchain-002 && \
INT_SHA=$(git rev-parse origin/integration/mymi-xchain-002) && \
echo "Deploying integration commit $INT_SHA to staging..." && \
sudo bash scripts/ops/staging/mymi-staging.sh deploy "$INT_SHA" && \

# 2. Flush FileLocatorCache and apply UTXO multi-pool migration
sudo rm -f /apps/TBI/www/mymiwallet-staging/shared/writable/cache/FileLocatorCache && \
cd /apps/TBI/www/mymiwallet-staging/current && \
sudo -u www-data php scripts/ops/db/run-migrations.php 2026-11-26-000100_CreateUtxoAddressPool && \

# 3. Run XCHAIN-002 smoke verification
sudo -u www-data bash scripts/ops/staging/mymi-xchain-002-smoke.sh
```
