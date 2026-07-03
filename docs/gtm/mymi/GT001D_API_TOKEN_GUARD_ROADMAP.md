# GT-001D API Token/Auth Policy Roadmap

## Purpose

Plan the API-token/auth-policy guard program after GT-001C closed the internal route guard track.

## Source Evidence

- `docs/gtm/mymi/evidence/gt001c/gt001d-api-token-handoff.md`
- `docs/gtm/mymi/evidence/gt001c/residual-api-token-missing-backlog.csv`
- `docs/gtm/mymi/evidence/gt001c/internal-guard-closeout-summary.md`

## Read-Only Discovery Baseline

- Total API-token/auth-policy backlog rows: `547`
- Residual internal backlog rows from GT-001C closeout: `0`
- Route edits in this roadmap slice: `0`
- Production mutation: `none`

## Method Counts

- `GET`: `368`
- `POST`: `168`
- `DELETE`: `10`
- `PUT`: `1`

## Domain Counts

- `Marketing`: `192`
- `Broker`: `81`
- `Alerts`: `78`
- `Budget`: `26`
- `Wallets`: `22`
- `Investments`: `21`
- `Solana`: `19`
- `Email`: `18`
- `Discord`: `17`
- `Predictions`: `14`
- `eSports`: `8`
- `AIOps`: `6`
- `ContentEngine`: `6`
- `Auctions`: `5`
- `Ops`: `4`
- `AiOps`: `4`
- `DripCampaign`: `4`
- `AI`: `3`
- `Docs`: `2`
- `Status`: `2`
- `Chat`: `2`
- `Support`: `2`
- `User`: `2`
- `Users`: `2`
- `mobile`: `2`
- `Bitcoin`: `2`
- `Health`: `1`
- `CoinVault`: `1`
- `Mdit`: `1`

## Atomic Golden Task Slices

| Golden Task | Domain | Count | Risk Bucket | Recommended Action |
|---|---:|---:|---|---|
| `GT-001D-A` | `Marketing` | `192` | `content_or_distribution_surface` | `separate_public_webhook_owner_review_from_api_token_routes` |
| `GT-001D-B` | `Broker` | `81` | `financial_or_account_surface` | `owner_review_then_user_auth_or_api_token_guard` |
| `GT-001D-C` | `Alerts` | `78` | `content_or_distribution_surface` | `separate_public_webhook_owner_review_from_api_token_routes` |
| `GT-001D-D` | `Budget` | `26` | `financial_or_account_surface` | `owner_review_then_user_auth_or_api_token_guard` |
| `GT-001D-E` | `Wallets` | `22` | `financial_or_account_surface` | `owner_review_then_user_auth_or_api_token_guard` |
| `GT-001D-F` | `Investments` | `21` | `financial_or_account_surface` | `owner_review_then_user_auth_or_api_token_guard` |
| `GT-001D-G` | `Solana` | `19` | `financial_or_account_surface` | `owner_review_then_user_auth_or_api_token_guard` |
| `GT-001D-H` | `Email` | `18` | `content_or_distribution_surface` | `separate_public_webhook_owner_review_from_api_token_routes` |
| `GT-001D-I` | `Discord` | `17` | `content_or_distribution_surface` | `separate_public_webhook_owner_review_from_api_token_routes` |
| `GT-001D-J` | `Predictions` | `14` | `financial_or_account_surface` | `owner_review_then_user_auth_or_api_token_guard` |
| `GT-001D-K` | `eSports` | `8` | `product_api_surface` | `owner_review_then_minimal_guard_slice` |
| `GT-001D-L` | `AIOps` | `6` | `operator_or_status_surface` | `owner_review_then_auth_policy_decision` |
| `GT-001D-M` | `ContentEngine` | `6` | `product_api_surface` | `owner_review_then_minimal_guard_slice` |
| `GT-001D-N` | `Ops` | `4` | `operator_or_status_surface` | `owner_review_then_auth_policy_decision` |
| `GT-001D-O` | `AiOps` | `4` | `operator_or_status_surface` | `owner_review_then_auth_policy_decision` |
| `GT-001D-P` | `DripCampaign` | `4` | `content_or_distribution_surface` | `separate_public_webhook_owner_review_from_api_token_routes` |
| `GT-001D-Q` | `AI` | `3` | `operator_or_status_surface` | `owner_review_then_auth_policy_decision` |
| `GT-001D-R` | `Docs` | `2` | `operator_or_status_surface` | `owner_review_then_auth_policy_decision` |
| `GT-001D-S` | `Status` | `2` | `operator_or_status_surface` | `owner_review_then_auth_policy_decision` |
| `GT-001D-T` | `Chat` | `2` | `product_api_surface` | `owner_review_then_minimal_guard_slice` |
| `GT-001D-U` | `Support` | `2` | `product_api_surface` | `owner_review_then_minimal_guard_slice` |
| `GT-001D-V` | `User` | `2` | `product_api_surface` | `owner_review_then_minimal_guard_slice` |
| `GT-001D-W` | `Users` | `2` | `product_api_surface` | `owner_review_then_minimal_guard_slice` |
| `GT-001D-X` | `mobile` | `2` | `product_api_surface` | `owner_review_then_minimal_guard_slice` |
| `GT-001D-Y` | `Bitcoin` | `2` | `financial_or_account_surface` | `owner_review_then_user_auth_or_api_token_guard` |
| `GT-001D-Z` | `Health` | `1` | `operator_or_status_surface` | `owner_review_then_auth_policy_decision` |
| `GT-001D-AA` | `CoinVault` | `1` | `product_api_surface` | `owner_review_then_minimal_guard_slice` |
| `GT-001D-AB` | `Mdit` | `1` | `product_api_surface` | `owner_review_then_minimal_guard_slice` |

## Safety Rules

- Do not apply blanket API token filters.
- Do not mix API-token, user-auth, webhook, public, stateful-public, and internal cron/operator routes.
- Each domain must begin with owner review and route classification.
- Each implementation slice must use a feature worktree, draft PR, validation, and production smoke after merge.
- Public, webhook, health/status, and owner-review routes require explicit policy decisions before guard changes.

## Recommended First Implementation Track

Start with `GT-001D-A Marketing` because it has the largest backlog. Split Marketing into sub-slices before editing routes:

1. Marketing read-only owner review and route classification.
2. Marketing public/webhook/owner-review exclusions.
3. Marketing API-token guard candidates.
4. Marketing user-auth/CSRF candidates moved to later tracks if not API-token appropriate.

## Rollback Notes

This roadmap is documentation-only. To revert before merge, revert the roadmap commit.
