# MYMI-XCHAIN-002 Owner Gates & Governance Ledger

All human gates, legal reviews, production deployments, and external infrastructure requirements are recorded here.

| Gate ID | Scope | Blocks | Required Action / Approver | Status |
| :--- | :--- | :--- | :--- | :--- |
| **G-PR-MERGE-002** | Governance | Merging `integration/mymi-xchain-002` into `main` | Owner review & squash merge via GitHub PR | **CLOSED** (PR #798 merged, commit `9944ab4e3`) |
| **G-PROD-DEPLOY-002** | Operations | Production release activation | Execute production deployment packet with named migrations | **CLOSED** (Release `20261126T131916Z-gtm-092426d5` live) |
| **G-RPC-EVM2** | Infra | Production Polygon, Arbitrum, Optimism, Avalanche, BSC checkouts | Add production keyed RPC endpoints to `/apps/TBI/www/mymiwallet/shared/.env` | OPEN (Default testnet/fallbacks active) |
| **G-TRON-GRID** | Infra | Production Tron USDT payment sweeps | Add production TronGrid API key to shared `.env` | OPEN (Default testnet/public fallbacks active) |
