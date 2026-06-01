# Solana Exchange Performance Hygiene

## Objective

Improve MyMI Exchange Solana page and modal performance after completing Solana route, frontend, modal, API health, analyzer, and wallet-secret security work.

## Confirmed Completed

- Solana web routes exposed.
- API/Solana/health returns success.
- Frontend runtime issues patched.
- Transaction modal fallbacks added.
- aiops:analyze:code added.
- New Solana wallet secrets are encrypted before storage.
- Existing plaintext Solana wallet secrets were backfilled/encrypted.
- Final wallet-secret audit shows plaintext found = 0.

## Current Performance Concerns

The Solana page and modal load process appears to pull broad dashboard/budget data that is not always needed for Solana-only pages.

Focus on reducing:

1. Repeated BudgetService::setUserId calls.
2. Repeated BudgetModel queries during Solana page loads.
3. Full dashboard payload loading on Solana-only routes.
4. Heavy modal payload preparation before the modal is opened.
5. Production DEBUG log noise around CSRF, MODEL_WHERE, and service traces.
6. Duplicate Solana wallet/token/asset lookups.

## Files To Inspect

- app/Modules/Exchange/Controllers/SolanaController.php
- app/Modules/User/Controllers/DashboardController.php
- app/Services/BudgetService.php
- app/Models/BudgetModel.php
- app/Models/SolanaModel.php
- app/Libraries/MyMISolana.php
- app/Services/SolanaService.php
- app/Modules/Exchange/Views/Solana/
- public/assets/js/

## Required Work

1. Identify what data SolanaController::index, assets, swap, and create actually need.
2. Avoid loading unrelated budget/dashboard data on Solana-only pages.
3. Add lightweight Solana-specific payload builders.
4. Add safe per-request caching for repeated wallet/profile/summary calls.
5. Ensure modal payloads load only when modal is requested.
6. Reduce debug logging in production while preserving warning/error logs.
7. Do not remove auth, CSRF, route protections, wallet-secret hardening, or modal fallbacks.
8. Do not enable mainnet minting or private-key browser submission.
9. Document before/after findings.

## Validation

Run:

```bash
php -l app/Modules/Exchange/Controllers/SolanaController.php
php -l app/Modules/User/Controllers/DashboardController.php
php -l app/Services/BudgetService.php
php -l app/Models/BudgetModel.php
php -l app/Models/SolanaModel.php

php spark aiops:analyze:code --file app/Modules/Exchange/Controllers/SolanaController.php --no-ai
php spark aiops:analyze:code --file app/Modules/User/Controllers/DashboardController.php --no-ai
php spark aiops:analyze:code --file app/Services/BudgetService.php --no-ai
php spark aiops:analyze:code --path app/Modules/Exchange --ext php,js --max-files 50 --no-ai

Write validation to:

docs/_aiops/reports/solana-performance/solana-exchange-performance-hygiene-validation.md
