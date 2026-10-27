---
task_id: MYMI-GTM-070-OPTIONS-MOMENTUM-SCANNER
repo_key: mymiwallet
repo_name: MillennialInvestments/MyMIWallet-Next
source_agent: Antigravity
target_agent: TBI AIOps
source_branch: feature/mymi-options-momentum-scanner
source_pr: null
base_branch: main
risk_level: medium
priority: P1
status: certified
model_preference: TBI Ollama
requires_human_approval: true
---

# MyMI Options Opportunity Scanner & Trade Momentum Manager

## Objective
Establish a dedicated weekly two-sided options momentum strategy engine ($0.95 call + $0.95 put $\to$ +$200 net profit target), integrated with TradingView Pine v6 webhook alerts and the MyMI Wallet user dashboard.

## Background
Teddy and Brent outlined a two-sided weekly options momentum strategy combining:
1. Identifying stocks with unusually large, repeatable price displacement relative to option premium cost.
2. Detecting volume and price momentum acceleration supporting moves beyond normal 14-day ATR / 5-day range.
3. Tracking both contract legs after entry, generating actionable profit-taking, reversal, and exit warnings before momentum deteriorates.
4. Integrating TradingView Pine v6 alerts with structured JSON payloads, idempotency deduplication, and position-level data models.

## Current State
1. **Database Schema & Migration**: Added `app/Database/Migrations/2026-10-26-000100_CreateOptionsMomentumTables.php` establishing `bf_options_scan_candidates`, `bf_options_positions`, `bf_options_position_legs`, `bf_options_position_history`, `bf_options_signal_events`, and `bf_options_exit_alerts`.
2. **Models**: Created models in `app/Models/Options/` (`OptionsScanCandidateModel`, `OptionsPositionModel`, `OptionsPositionLegModel`, `OptionsPositionHistoryModel`, `OptionsSignalEventModel`, `OptionsExitAlertModel`).
3. **Core Services**: Built `app/Services/Options/OptionsScannerEngine.php` (reachability score, price displacement efficiency, volume acceleration, IV/RV penalty) and `app/Services/Options/OptionsMomentumManager.php` (two-sided valuation, profit target reached, peak trailing stop, theta cutoff warnings).
4. **TradingView Integration**: Built `app/Services/Options/TradingViewWebhookService.php` with SHA-256 idempotency deduplication, and authored `docs/tradingview/MyMI_Options_Momentum_Tracker_v6.pine`.
5. **Spark Commands**: Implemented `options:scan`, `options:monitor`, and `options:simulate-straddle` under `app/Commands/Options/` and registered them in `app/Config/Console.php`.
6. **Routes & API**: Registered `API/Options/webhook`, `API/Options/candidates`, `API/Options/positions`, and `Investments/Options` in `app/Config/Routes.php` with `OptionsWebhookController` and `OptionsController`.
7. **Test Suite**: Added `tests/unit/Options/OptionsMomentumTest.php` with 5 tests and 49 passing assertions.

## What Needs To Change
1. Run database migration in target environments under governed AIOps / staging database gates (`php spark migrate`).
2. Verify live broker feed / Alpha Vantage quotes for live option chains if live execution is authorized by Teddy.
3. Review and tune research universe defaults (`NVDA, TSLA, AMD, COIN, SPY, QQQ, IWM`).
4. Reconcile GTM readiness checklist and update tasks inventory in `docs/_aiops/gtm/tasks.csv`.

## Files To Inspect
- `app/Database/Migrations/2026-10-26-000100_CreateOptionsMomentumTables.php`
- `app/Models/Options/*.php`
- `app/Services/Options/*.php`
- `app/Commands/Options/*.php`
- `app/Modules/APIs/Controllers/OptionsWebhookController.php`
- `app/Modules/User/Controllers/OptionsController.php`
- `app/Modules/User/Views/Investments/Options_Momentum_Dashboard.php`
- `docs/tradingview/MyMI_Options_Momentum_Tracker_v6.pine`
- `tests/unit/Options/OptionsMomentumTest.php`

## Files To Avoid
- Production configuration files, secrets, `.env`, credentials, `writable/` history, and unrelated modules.

## Commands To Run
- `php spark options:scan --dry-run`
- `php spark options:simulate-straddle NVDA`
- `php spark options:monitor --dry-run`
- `./vendor/bin/phpunit --bootstrap tests/_support/bootstrap.php tests/unit/Options/OptionsMomentumTest.php`
- `git diff --check`

## Acceptance Criteria
- Scanner computes price displacement efficiency, volume acceleration, and profit reachability without runtime exceptions.
- Straddle calculations conform strictly to the $1.90 debit / $3.90 exit target / +$200 net profit model.
- TradingView webhook idempotently deduplicates repeated payloads using SHA-256 hashing.
- PHPUnit test suite passes completely.
- No secrets committed; safe rollback possible via atomic branch revert.

## Risks
- Options prices fluctuate rapidly before expiration; live fills may deviate from modeled debits due to spread slippage.
- TradingView webhook latency under severe network load; mitigated by idempotency logging.

## Rollback Notes
All changes are isolated on branch `feature/mymi-options-momentum-scanner`. Reverting this feature branch returns the repository cleanly to `main` without touching existing modules.

## Final Report Requirements
Include test execution output, Spark command verification, diff summary, and owner review checkpoints.
