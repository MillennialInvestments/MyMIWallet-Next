# HealthController

**File path:** `app/Modules/APIs/Controllers/HealthController.php`

## Purpose
Provides lightweight API health checks for application/database liveness and Spark audit status.

## Routes exposed
- `index()` - returns app/db health summary.
- `spark()` - returns Spark command audit status from `WRITEPATH/triage/spark-command-audit.json`.

## Auth requirements
No explicit auth checks in this controller.

## Input validation
- `index()` has no input.
- `spark()` reads a local JSON file and validates decoded payload is an array before using keys.

## Side effects (DB, cache, queues)
- Attempts DB reconnect in `index()`.
- Reads local filesystem JSON audit file in `spark()`.
- No cache writes or queue writes.

## Related services/models
- Uses `db_connect()` directly.
