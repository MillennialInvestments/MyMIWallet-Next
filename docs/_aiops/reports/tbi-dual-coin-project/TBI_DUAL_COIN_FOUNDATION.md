# TBI Dual Coin Foundation (First Pass)

## Architecture Summary
- Added first-pass schema, model, service, and API controller to support TBI Investment Coin and TBI Utility Coin within MyMI Projects.
- Default behavior intentionally avoids live minting and keeps secondary/public trading disabled.

## Database Tables
- `bf_tbi_project_coins`
- `bf_tbi_coin_contribution_categories`
- `bf_tbi_coin_contribution_ledger`

## Route Map
- `POST API/Projects/TBI-Coins/Create-Defaults/{projectId}` (admin)
- `GET API/Projects/TBI-Coins/{projectId}`
- `POST API/Projects/TBI-Coins/Record-Contribution` (login)
- `POST API/Projects/TBI-Coins/Approve-Contribution/{ledgerId}` (admin)
- `POST API/Projects/TBI-Coins/Reject-Contribution/{ledgerId}` (admin)
- `POST API/Projects/TBI-Coins/Prepare-Solana-Mint/{coinId}` (admin)
- `POST API/Projects/TBI-Coins/Prepare-Exchange-Asset/{coinId}` (admin)

## Compliance Guardrails
- Investment coin defaults to compliance required and secondary trading disabled.
- Utility coin is explicitly utility-only and not ownership/profit-sharing.
- Solana minting is payload-prep only, no live mint execution.

## Operational Contribution Examples
- Cash contribution: $1.00 = 1.00 utility coin.
- Development work: approved work value converted to utility coins at configured unit value.
- Infrastructure/hosting/marketing categories map to utility contribution ledger categories.

## Next-Step Checklist
1. Review compliance/legal wording before enabling any public-facing investment features.
2. Wire approved ledger entries to audited settlement/mint pipeline.
3. Add admin review UI for contribution approvals/rejections.
4. Integrate exchange asset registration with approval checkpoints.
5. Add integration tests with local CI test database.
