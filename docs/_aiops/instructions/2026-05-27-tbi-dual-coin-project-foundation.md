# TBI Dual Coin Project Foundation for MyMI Wallet

## Mission

Build the MyMI Projects infrastructure for two TBI Solutions coins inside the MyMI Wallet / MyMI Exchange platform:

1. **TBI Investment Coin**
   - Intended for project/fund participation tracking.
   - Must integrate with the existing Projects module, fund ledger, exchange bridge, compliance flags, project ticker, exchange symbol, auction/private allocation, quarterly distribution, payout, and NAV lock infrastructure.
   - Must not imply public securities trading or unrestricted exchange availability.
   - Must default to compliance-required, primary issuance enabled, secondary trading disabled unless explicitly approved.

2. **TBI Utility / In-App Coin**
   - Intended for operational contribution credits and in-app usage.
   - Must support $1 contributed = 1 coin credited for approved operational contributions.
   - Must support contributor work, infrastructure costs, hosting, marketing, customer acquisition, management, development, and other approved operational cost categories.
   - Must be usable for MyMI/TBI services, subscriptions, hosting, marketing, software access, project fees, and internal exchange fees.
   - Must not be represented as ownership, profit-sharing, guaranteed return, or passive investment.

## Current Discovery Findings

The repo already contains relevant infrastructure:

- `app/Config/Routes.php`
  - Coin Vault API routes around lines 130-144:
    - submit contribution
    - approve contribution
    - reject contribution
    - request payout
    - approve payout
    - reject payout
  - API Projects routes around lines 551-563:
    - fetchInbox
    - parseInbox
    - promoteLead
    - updateProject
    - openCommitments
    - checkThreshold
    - launchPrivateAuction
    - settlePrivateAuction
    - markFunded
    - createQuarterlyDistribution
    - runPayouts
    - processMonthlyWithdrawals
  - API Solana routes around lines 1135-1154:
    - health
    - wallet balance
    - token accounts
    - transfer
    - swap quote
    - swap execute
    - token/create
    - token/mint
  - Admin Projects routes around lines 1481-1498:
    - ProjectsController index/approve/edit/reject
    - ProjectsAdminController::reconcileFundExchange
    - ProjectsAdminController::registerFundExchangeAsset
  - User Project routes around lines 1757-1766:
    - project index/view/commit/withdraw
    - monthly withdrawal
    - private allocation
    - fund
    - purchaseFundUnits
  - Exchange routes around lines 1615-1618:
    - ExchangeController::index
    - ExchangeController::project

Existing migrations include:

- `2026-03-26-000100_AddFundMetadataToProjects.php`
- `2026-03-26-000110_CreateProjectFundLedgerTables.php`
- `2026-03-26-000120_AddFundComplianceAndOpsTables.php`
- `2026-03-26-000130_AddFundTransactionIdempotencyAndNavLock.php`
- `2026-03-26-000140_AddProjectExchangeBridgeFlags.php`
- `2026-03-30-000400_AddTickerToProjects.php`
- `2026-04-03-000100_AddExchangeSymbolToProjects.php`

Known local issues:

- `vendor/` has been restored using local `composer.phar`.
- `php spark` currently boots but triggers database connection refusal through the logger/database config.
- Do not require live DB access for the first implementation pass.
- Do not modify these unrelated untracked files:
  - `app/Commands/Marketing/TBIMarketingTest.php`
  - `app/Libraries/TBIMarketingClient.php`

## Implementation Scope

Create a first-pass foundation that is safe, reviewable, and does not require live blockchain minting in the default path.

### Required Deliverables

1. Add database migration for TBI dual coin/project metadata.

Suggested migration:

`app/Database/Migrations/2026-05-27-000100_CreateTbiProjectCoinTables.php`

Tables to create:

#### `bf_tbi_project_coins`

Fields:

- `id`
- `project_id`
- `coin_key`
  - Examples:
    - `tbi_investment`
    - `tbi_utility`
- `coin_name`
  - `TBI Investment Coin`
  - `TBI Utility Coin`
- `symbol`
  - `TBIINV`
  - `TBIUSD` or `TBIC`
- `coin_type`
  - `investment`
  - `utility`
- `unit_value_usd`
  - decimal 18,6 default 1.000000 for utility coin
- `solana_mint_address`
  - nullable
- `exchange_asset_id`
  - nullable
- `project_exchange_symbol`
  - nullable
- `primary_issuance_enabled`
- `secondary_trading_enabled`
- `compliance_required`
- `status`
  - draft
  - active
  - paused
  - retired
- `metadata_json`
- `created_at`
- `updated_at`
- `deleted_at`

Indexes:

- unique `coin_key`
- index `project_id`
- index `symbol`
- index `coin_type`
- index `status`

#### `bf_tbi_coin_contribution_categories`

Fields:

- `id`
- `category_key`
- `category_name`
- `description`
- `default_coin_key`
- `is_operational_expense`
- `is_work_contribution`
- `is_active`
- `created_at`
- `updated_at`

Seed/default categories:

- `cash_contribution`
- `development_work`
- `marketing`
- `customer_acquisition`
- `infrastructure_costs`
- `management`
- `hosting`
- `software_access`
- `exchange_fees`
- `support_operations`

#### `bf_tbi_coin_contribution_ledger`

Fields:

- `id`
- `project_id`
- `coin_id`
- `user_id`
- `category_id`
- `contribution_type`
  - cash
  - work
  - expense
  - service
  - adjustment
- `description`
- `external_reference`
- `usd_value`
- `coin_quantity`
- `unit_value_usd`
- `status`
  - pending
  - approved
  - rejected
  - reversed
- `reviewed_by`
- `reviewed_at`
- `idempotency_key`
- `metadata_json`
- `created_at`
- `updated_at`
- `deleted_at`

Rules:

- For utility coin: `coin_quantity = usd_value / unit_value_usd`
- Default utility rate must support `$1 = 1 coin`.
- Add idempotency support to prevent duplicate approvals.

2. Add model:

`app/Models/TbiProjectCoinModel.php`

Methods:

- `getCoinByKey(string $coinKey): ?array`
- `getCoinsForProject(int $projectId): array`
- `createDefaultCoinsForProject(int $projectId): array`
- `getContributionCategories(): array`
- `recordContribution(array $data): int`
- `approveContribution(int $ledgerId, int $reviewedBy): bool`
- `rejectContribution(int $ledgerId, int $reviewedBy, string $reason = ''): bool`
- `calculateCoinQuantity(float $usdValue, float $unitValueUsd = 1.0): float`

3. Add service:

`app/Services/TbiProjectCoinService.php`

Responsibilities:

- Create/attach default TBI coins to a project.
- Record contributor operational contributions.
- Approve contribution and issue ledger credit.
- Prepare Solana mint payload but do not mint by default.
- Prepare Exchange asset registration payload but do not enable secondary trading by default.
- Enforce the difference between investment coin and utility coin.
- For investment coin:
  - compliance_required = 1
  - secondary_trading_enabled = 0 by default
  - include disclaimers in metadata
- For utility coin:
  - unit_value_usd = 1
  - contribution ledger allowed
  - no ownership/profit-sharing wording

4. Add API controller:

`app/Modules/APIs/Controllers/TbiProjectCoinsAPIController.php`

Routes to add under API group:

- `POST API/Projects/TBI-Coins/Create-Defaults/(:num)`
- `GET API/Projects/TBI-Coins/(:num)`
- `POST API/Projects/TBI-Coins/Record-Contribution`
- `POST API/Projects/TBI-Coins/Approve-Contribution/(:num)`
- `POST API/Projects/TBI-Coins/Reject-Contribution/(:num)`
- `POST API/Projects/TBI-Coins/Prepare-Solana-Mint/(:num)`
- `POST API/Projects/TBI-Coins/Prepare-Exchange-Asset/(:num)`

Security:

- Creation, approval, rejection, mint prep, and exchange prep require admin permission.
- Contribution record requires login.
- All POST endpoints should validate request data.
- Use JSON responses:
  - `status`
  - `message`
  - `data`
  - `errors`

5. Add admin/user documentation:

`docs/_aiops/reports/tbi-dual-coin-project/TBI_DUAL_COIN_FOUNDATION.md`

Include:

- architecture summary
- database tables
- route map
- compliance guardrails
- operational contribution examples
- next-step checklist for Solana minting and MyMI Exchange registration

6. Add tests or static validation if full tests cannot run.

At minimum, include:

`docs/_aiops/reports/tbi-dual-coin-project/VALIDATION.md`

Must document:

- files created/modified
- syntax check commands
- route lines added
- migration safety notes
- DB not required for initial review
- no live blockchain minting performed
- unrelated TBI Marketing files untouched

## Guardrails

- Do not modify unrelated marketing files.
- Do not enable public/secondary trading by default.
- Do not call live Solana minting APIs by default.
- Do not represent utility coin as an investment.
- Do not represent investment coin as legally approved public security.
- Use idempotency keys for contribution ledger inserts where possible.
- Use CI4 conventions compatible with PHP 8.2.
- Keep implementation modular and reviewable.

## Suggested Branch

`feature/tbi-dual-coin-project-foundation`

## Acceptance Criteria

- Migration adds the required schema safely with table existence checks.
- Model and service can create default coin records for a project.
- Service can calculate `$1 = 1 utility coin`.
- Service separates investment and utility coin logic.
- API controller provides JSON responses and validation.
- Routes are registered.
- No live Solana token mint occurs by default.
- No public trading is enabled by default.
- Documentation explains current architecture and next steps.
