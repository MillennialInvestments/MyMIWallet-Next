# Controller Consolidation Progress

## Completed
- `app/Modules/APIs/Controllers/AIOpsAPIController.php` (migrated to `BaseAPIController`, shared internal guard hook)
- `app/Modules/APIs/Controllers/AiOpsAPIController.php` (migrated to `BaseAPIController`, shared internal guard hook)
- `app/Modules/APIs/Controllers/DocsAPIController.php` (migrated to `BaseAPIController`, standardized JSON success helper)
- `app/Modules/APIs/Controllers/AlertsAPIController.php` (migrated to `BaseAPIController`; commentary/social generation moved behind `AlertService`)
- `app/Modules/User/Controllers/AlertsController.php` (migrated to `BaseUserController`)
- `app/Modules/Management/Controllers/ManagementAdminController.php` (migrated to `BaseAdminController`)
- `app/Modules/Management/Controllers/AlertsAdminController.php` (migrated to `BaseAdminController`; alert model resolution via `AlertService`)

## In Progress
- Alerts consolidation group:
  - `app/Modules/User/Controllers/AlertsController.php`
  - `app/Modules/APIs/Controllers/AlertsAPIController.php`
  - `app/Modules/Management/Controllers/AlertsAdminController.php`
  - Shared service extraction: `app/Services/AlertService.php`

## Pending
- Investments consolidation group:
  - `app/Modules/User/Controllers/InvestmentsController.php`
  - `app/Modules/APIs/Controllers/InvestmentsAPIController.php`
  - `app/Modules/Management/Controllers/InvestmentsAdminController.php`
- Support consolidation group:
  - `app/Modules/Support/Controllers/SupportController.php`
  - `app/Modules/User/Controllers/SupportController.php`
  - `app/Modules/APIs/Controllers/SupportAPIController.php`
- Remaining controller base migrations listed in `docs/refactor/controller_migration_map.md`

## Deprecated Candidates
- None moved in this iteration (no controller met safe-to-remove criteria with route/reference verification).


## Latest Pass
- Phase 3: moved legacy `Support.php` out of active controller tree to `app/Deprecated/Controllers/LegacySupportController.php`; active count reduced by 1 (183 active).
- See: `docs/refactor/controller_consolidation_phase3.md`

- Phase 4: moved legacy `app/Modules/User/Controllers/SupportController.php` to `app/Deprecated/Controllers/LegacyUserSupportController.php`; active count reduced to 182.
- See: `docs/refactor/controller_consolidation_phase4.md`

- Phase 5: moved legacy `app/Controllers/HowItWorksController.php` to `app/Deprecated/Controllers/LegacyHowItWorksController.php`; active count reduced to 181.
- See: `docs/refactor/controller_consolidation_phase5.md`

- Phase 6: moved legacy `app/Modules/Template/Controllers/TemplateController.php` to `app/Deprecated/Controllers/LegacyTemplateController.php`; active count reduced to 180.
- See: `docs/refactor/controller_consolidation_phase6.md`

- Phase 7: normalized inheritance across APIs/User/Management controllers to BaseAPI/BaseUser/BaseAdmin; active count currently 180.
- See: `docs/refactor/controller_consolidation_phase7.md`
