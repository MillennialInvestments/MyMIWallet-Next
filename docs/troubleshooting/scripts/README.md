# Troubleshooting Scripts Index

This page tracks ready-to-use diagnostic scripts and future scripts to generate. All scripts are safe, read-only, and no-sudo.

## Implemented now
- `scripts/check_cert_expiry.sh` — Inspect TLS expiry and warn when near/expired.
- `scripts/check_nginx_user_space.sh` — Validate user-space NGINX config test, PID, and listeners without restarting.
- `scripts/check_ci_routes.sh` — Compare `/Dashboard` vs `/index.php/Dashboard` responses.
- `scripts/tail_nginx_errors.sh` — Tail recent user-space NGINX errors with a controlled line count.
- `scripts/smoke_routes.sh` — Quick HTTP smoke checks (see [usage](01_smoke_routes_usage.md)).
- `scripts/lint_no_route_tokens.sh` — Route token lint (see [usage](02_lint_no_route_tokens_usage.md)).

## Future scripts to generate
- PHP-FPM status checker for user-space pools.
- Access log sampler that summarizes status-code distribution.
- CI4 cache warmer for frequently used dashboard endpoints.
- Cron watchdog that verifies scheduled tasks last-run timestamps.
- DB connectivity probe for MySQL with read-only SELECT.

Keep this list updated as new scripts are added.
