# CI4 Config/Service Audit (Bootstrap Safety, Caching, Security, Performance)

## 1) Recurring Config Errors

### Fixed in this patch
1. `app/Config/SiteSettings.php` constructor previously invoked DB override logic (`SiteSettingsOverride`) and loaded another config via `config('App')`. Both operations happened during config bootstrap and could recursively trigger config/service loading.
2. Namespace mismatches for `SiteSettings` imports were present in service/library code (`use Config\SiteSettings`) instead of `use App\Config\SiteSettings`.

### Remaining observations
- Multiple config constructors still compute runtime values (dates/times). These are lightweight, but should progressively move to runtime services if strict pure-config constraints are required.

## 2) Refactor Patches Applied

- **Config constructors fixed**
  - Removed DB-driven overrides from `SiteSettings` constructor.
  - Removed `config('App')` from `SiteSettings` constructor.
  - `baseURL` now resolves via `env('app.baseURL', '/')` in config-safe form.
- **Services centralized**
  - Added centralized executive summary caching in `DashboardService` (`120s` TTL, user-scoped cache key).
  - Added cache invalidation method on `DashboardService` and wired invalidation from `BudgetService` mutations (`save`, `update`).
  - Switched controllers to call `DashboardService` instead of pulling heavy summary directly from library.
- **Controllers simplified**
  - `BudgetController` and `DashboardController` now call the service boundary for executive summary.

## 3) Performance Map (Hot Spots)

| Hot Path | Current State | Risk | Recommendation |
|---|---|---|---|
| `MyMIDashboard::getExecutiveDashboardSummary` | Aggregates budget + investments + projects + alerts + news | High CPU + DB fanout per request | ✅ Added 120s user-scoped cache at service boundary |
| Budget writes (`BudgetService::save/update`) | Persistent write path | Stale dashboard snapshots | ✅ Added executive summary cache invalidation |
| `PrivacyController` export SQL | Uses dynamic `SELECT *` with interpolated table and where fragments | Security + unpredictable performance | Replace with query builder/strict whitelist and explicit selected columns |
| Search queries | Prepared query parameters used | Generally safe | Add query profiling and index validation on fulltext/indexed columns |

## 4) Security Findings

### High Priority
- Dynamic raw SQL string interpolation in `PrivacyController` (`SELECT * FROM {$t} WHERE {$w}`) can become injection-prone unless both fragments are fully trusted and strictly whitelisted.

### Medium Priority
- Ensure all controller GET/POST parameters are validated through CI4 Validation rules before downstream usage.
- Prefer explicit column lists over `SELECT *` in reporting/export routes.

### Existing positive patterns
- `SearchService` uses bound parameters in raw SQL paths.

## 5) Test Gap Report (Critical Services)

### Missing/insufficient target coverage
- `DashboardService` (cache hit/miss behavior, TTL boundary, cache invalidation).
- `BudgetService` (mutation-triggered dashboard cache invalidation).
- `InvestmentService` (aggregation determinism and error fallback behavior).

### Suggested minimum unit tests
1. `DashboardServiceTest`
   - returns cached executive summary when key exists.
   - computes and writes cache when key missing.
   - invalidates user-specific key.
2. `BudgetServiceTest`
   - `save` invalidates executive summary cache.
   - `update` invalidates executive summary cache only on success.
3. `InvestmentServiceTest`
   - stable output shape under empty and populated datasets.

## 6) Architecture & Responsibility Enforcement

- Controllers should orchestrate only; heavy aggregation now routed through `DashboardService`.
- Libraries remain utility/domain helpers; cache ownership moved to service boundary.
- Models remain data-access only.

## 7) Autoload Footprint Audit Notes

- `app/Config/Autoload.php` currently autoloads many helpers globally.
- Recommend reducing always-on helper list to only strict essentials (`url`, `form`, etc.) and loading feature helpers lazily in modules.

## 8) Deployment/Secrets/Environment Hygiene

- Keep all environment-specific values in `.env`/runtime env vars.
- Confirm production deployments enforce `CI_ENVIRONMENT=production`.
- Ensure `.env` stays excluded from repository and CI artifact bundles.

## 9) Error Handling & Logging

- Continue replacing ad-hoc debug output with structured `log_message` contexts.
- Ensure production error views do not expose stack traces.

