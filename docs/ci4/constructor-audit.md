# CI4 Controller Constructor Audit

## Scope & Review
- **Reviewed:**
  - `app/Controllers/**`
  - `app/Modules/**/Controllers/**`
- **Excluded (non-controller classes):** Libraries, services, and models such as `app/Modules/User/Models/*`, `app/Modules/User/Libraries/*`, and `app/Modules/Marketing_New/Libraries/*` that are not CI4 controllers.

## Constructors Removed / Migrated
- All controller `__construct()` methods in scope were removed or migrated to `initController()`.
- Any legacy `parent::__construct()` usage in controllers was eliminated in favor of `parent::initController()`.

## Initialization Logic Migrated
- Controller setup logic was preserved and moved into `initController()` implementations where needed.
- Empty constructors were removed entirely (no override) so the base lifecycle remains intact.

## Service Injection Updates
- `MyMIMarketing` usages were updated to use `service('MyMIMarketing')` where controller instantiation appeared.
- No `AlertsService` constructor calls were found in controllers.

## Exceptions / Notes
- Non-controller `__construct()` methods remain in models/libraries (e.g., `BudgetModuleModel`, `TaxReturnModel`, `DashboardLibrary`, `WebScraper`, `AIOpsGuardrailService`) because they are outside the controller lifecycle scope.
- Temporary lifecycle logging has been added in `BaseController::initController()` to confirm lifecycle flow; remove after verification.
