# MYMI-XCHAIN-001 Owner & Governance Gate Ledger

This ledger records all owner, legal, partner, key, and package gates encountered during the execution of MYMI-XCHAIN-001. Per governance rules, gates are never bypassed autonomously by the agent.

| Gate ID | Area / Scope | Blocks | Required Action / Approver | Status |
| --- | --- | --- | --- | --- |
| G8 | Legal & Compliance | Gold terms, discounts, MyMI Coin offering, exchange launch, user-to-user transfers | Formal sign-off on terms & conditions by Teddy / Legal Counsel | OPEN (Recorded) |
| G-RPC | Crypto Infrastructure | Production crypto checkout on Ethereum / Base | Add production keyed RPC endpoints (Alchemy/Infura/QuickNode) to `/apps/TBI/www/mymiwallet/shared/.env` | OPEN (Recorded) |
| G-PARTNER | Custodial Exchange | Custodial exchange trading | Execution of licensed Crypto-as-a-Service partner agreement and provision of production/sandbox partner API keys | OPEN (Recorded) |
| G-REGCF | Retail Token Offering | Retail offering of MyMI Coin | SEC Form C filing / FINRA funding portal onboarding (if retail offering is pursued beyond Reg D 506(c)) | OPEN (Recorded) |
| G-PR-MERGE | Repository Governance | Merging wave feature branches to `main` | Owner code review and manual PR merge (agents create draft PRs only) | OPEN (Recorded) |
| G-PROD-DEPLOY | Operations | Production activation of any feature wave | Owner execution of `scripts/ops/deploy/mymi-release.sh activate <release>` with explicit named `MIGRATE=` parameter | OPEN (Recorded) |
| G14 | Financial Security | Enabling money switches in production | Owner approves and toggles specific feature flags in `app/Config/Features.php` / environment | OPEN (Recorded) |
| G-PKG | Dependencies | Any new external Composer / npm packages | Package approval by repository owner (no new external dependencies added in this run) | OPEN (Recorded) |
| G-W3-SEPOLIA | EVM Browser Checkout | Staging browser wallet validation | Owner verification of MetaMask/EIP-1193 click-to-pay transaction on staging connected to Sepolia | OPEN (Pending staging deployment) |
