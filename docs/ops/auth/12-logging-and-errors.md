# Phase 12 — Logging, Errors, Observability
- **Timestamp:** 2025-10-09 19:00 UTC
- **Environment:** DreamHost VPS (Nginx, PHP 8.2, MySQL)

## Existing Logging
- Vendor `myth/auth` controller logs key events (`log_message('info', 'Login attempt started')`, errors on validation and activation, etc.).
- Social callback path logs success/failure when linking provider accounts.
- Custom filters (`ObservabilityFilter`, `SessionTrackerFilter`) applied globally; review their implementations to confirm they emit structured telemetry.

## Email Failures
- Activation/resend flows rely on `service('activator')->send()`; on failure, controller returns with flash error but no explicit log entry. Recommend logging via `log_message('error', 'Activation email failed: ' . ($activator->error() ?? 'unknown'))` for support diagnostics.

## Rate Limits & Abuse
- Throttler responses return 429 with `lang('Auth.tooManyRequests')`. Add logging when throttle triggered to detect brute-force attempts.
- Consider integrating with existing Discord/Zapier alerting pipelines for repeated auth failures.

## Sensitive Data Handling
- Logs currently interpolate `$login` (username/email). Ensure log level is appropriate and sanitize if compliance requires.
- Avoid logging passwords or tokens; verify custom logging elsewhere abides by this.

## Follow-Up Actions
1. Centralize auth logs (success, failure, activation, reset) via `Monolog` handler or external SIEM.
2. Add metrics counters for login successes/failures exposed via Prometheus or internal dashboards.
3. Review DreamHost log retention to ensure ability to support incident investigations.
