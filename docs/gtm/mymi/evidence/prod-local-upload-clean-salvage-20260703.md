# Production Local Upload Clean Salvage

## Source

- Quarantine PR: #548
- Quarantine branch: `feature/mymi-prod-local-upload-reconcile-20260703`
- Clean salvage branch: `feature/mymi-prod-local-upload-clean-salvage-20260703`
- Base: `origin/main`

## Excluded From Clean Salvage

- Root-level stray files
- Runtime/writable/storage files
- Backup and before/bak artifacts
- Accidental mode-only changes
- `composer.phar`
- `package-lock.json`

## Included Candidate Files

- `app/Commands/Marketing/ApproveGeneratedContent.php`
- `app/Commands/Marketing/ApproveGenerated.php`
- `app/Commands/Marketing/AuditPlaceholderPrevention.php`
- `app/Config/Commands.php`
- `app/Config/Ops.php`
- `app/Libraries/GitHelper.php`
- `app/Models/MarketingModel.php`
- `app/Modules/Management/Views/Budgeting/index.php`
- `app/Modules/Management/Views/Budgets/index.php`
- `app/Modules/Management/Views/Users/Active_Table.php`
- `app/Modules/Management/Views/Users/Inactive_Table.php`
- `app/Modules/Management/Views/Wallets/Generate_Wallets.php`
- `app/Modules/Management/Views/Wallets/index.php`
- `app/Modules/Management/Views/Wallets/Listing-Table.php`
- `app/Modules/User/Models/UserModuleModel.php`
- `app/Services/MarketingDistributionService.php`
- `docs/01_Systematic_Standup/MyMIAlerts.md`
- `docs/_aiops/bin/aiops_ollama_run_instruction.sh`
- `docs/_aiops/mymi_marketing_hardening/PHASE_06A_BASELINE_DISCOVERY.json`
- `docs/_aiops/mymi_marketing_hardening/PHASE_06A_BASELINE_DISCOVERY.md`
- `docs/_aiops/mymi_marketing_hardening/PHASE_06B_PATCH_REQUEST.md`

## Safety

- No production mutation.
- No direct production pull/reset/stash.
- #548 remains quarantine evidence only.

## Cleanup After Model Limit Audit

`app/Services/MarketingDistributionService.php` was removed from this clean salvage PR because the Model Limit Audit flagged existing changed-file `findAll()` calls without explicit limits.

That service should be handled in a separate atomic PR if the production-local changes are still needed.
