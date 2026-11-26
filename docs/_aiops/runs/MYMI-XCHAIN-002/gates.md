# MYMI-XCHAIN-002 Owner Gates & Governance Ledger

All human gates, legal reviews, production deployments, and external infrastructure requirements are recorded here.

| Gate ID | Scope | Blocks | Required Action / Approver | Status |
| :--- | :--- | :--- | :--- | :--- |
| **G-RPC-EVM2** | Infra | Production Polygon, Arbitrum, Optimism, Avalanche, BSC checkouts | Add production keyed RPC endpoints to `/apps/TBI/www/mymiwallet/shared/.env` | OPEN |
| **G-TRON-GRID** | Infra | Production Tron USDT payment sweeps | Add production TronGrid API key to shared `.env` | OPEN |
| **G-PR-MERGE-002** | Governance | Merging `integration/mymi-xchain-002` into `main` | Owner review & squash merge via GitHub PR | OPEN |
| **G-PROD-DEPLOY-002** | Operations | Production release activation | Execute production deployment packet with named migrations | OPEN |
