# Config Drift Report

## Objective
Ensure configuration lives in `.env` + `Config/*` and not deep inside domain libraries.

## Drift identified
- Upstream source still contains direct `env()/getenv()` access inside non-config classes.
- Mixed environment key naming remains in legacy integrations (e.g., `ALPHA_VANTAGE_*` variants).

## Centralized target
- `.env.template`
- `Config/Features.php`
- `Config/Integrations.php`
- `Config/Infrastructure.php`
- `Config/Cache.php`
- `Config/Logger.php`

## Refactor pattern
- Replace direct env access in libraries with injected config objects.
- Keep runtime secrets access in one service (`Services/Secrets.php`) or config bootstrap only.
