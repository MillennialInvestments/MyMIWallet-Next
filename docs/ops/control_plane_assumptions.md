# Control Plane Assumptions

This document captures the current locations and behaviors discovered while prepping the Control Plane work.

## Modules and routing
- **Management module path:** `app/Modules/Management` with module routes defined in `app/Modules/Management/Config/Routes.php` (uses `auth` filter today). Other general routes also live in `app/Config/Routes.php`.
- **Route filters available:** Myth/Auth `login`, `role`, and `permission` filters are registered in `app/Config/Filters.php`. We will gate Control Plane pages with `role:admin`.
- **Dynamic modal helper:** Existing Management pages rely on `dynamicModalLoader` in various views; we may reuse that for detail previews.

## Auth and roles
- **Role filter:** Implemented in `app/Filters/RoleFilter.php` with group checks using Myth/Auth. Admin-only routes can use `role:admin`.
- **Permission filter:** Implemented in `app/Filters/PermissionFilter.php`; not currently wired to Management routes by default.

## Logging
- **Database logger:** `app/Log/Handlers/DatabaseLoggerHandler.php` writes to `bf_error_logs` when `ENVIRONMENT === 'production'`.
- **Libraries using bf_error_logs:** `App\Libraries\MyMILogger` and multiple services write structured errors into `bf_error_logs`. Keep secrets out of logs.

## Cron endpoints (existing)
- `/Management/runCronManually` is routed via `app/Config/Routes.php` to `ManagementController::runCronManually` without a token today.
- Other marketing/alerts cron-like endpoints live under `/API/Management` and `/API/DripCampaign`, also presently without a unified Bearer token check. We will add a shared cron token layer.

## Mailbox assumption
- Control Plane ops mailbox will default to `commands@mymiwallet.com` unless overridden via env vars.

## Pending decisions / assumptions
- No dedicated Ops Inbox UI exists yet; new admin-only views will be added under `Management`.
- No prior task registry tables exist; we will create models and SQL docs for `project_task_registry` and `bf_ops_command_inbox`.
- OpenAI usage should follow the existing curl-based pattern used in `App\Services\ZapierService` and must respect secret handling.
