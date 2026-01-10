# Health Runner Framework Design

## Goal
Provide health coverage for **every API endpoint and critical service/integration function** without a 1-command-per-endpoint explosion. A single Spark command should run many checks based on a registry.

## Registry Options

### Option A (DB-backed registry) — **recommended**
**Table: `bf_health_registry`**

| Field | Type | Notes |
| --- | --- | --- |
| id | int | PK |
| domain | varchar | auth/budget/invest/alerts/marketing/integrations/system |
| name | varchar | human-readable label |
| type | varchar | route \| service \| integration |
| target | varchar | `GET:/API/Alerts/getAlerts` or `App\Libraries\MyMIAlerts::updateAlerts` |
| auth_mode | varchar | none \| session \| token |
| payload_json | json | query/body payloads |
| expected_json_schema | json | minimal schema check |
| expected_status | int | e.g., 200/302 |
| dry_run_supported | tinyint | boolean |
| timeout_ms | int | default 5000-15000 |
| enabled | tinyint | boolean |
| priority | varchar | P0/P1/P2 |

### Option B (Config file)
**File: `app/Config/Health.php`**

- Array entries with the same fields as above.
- Faster to bootstrap; DB adds runtime toggling.

## Spark Command

### `php spark health:run`

Examples:

- `php spark health:run --all --priority=P0 --dry-run`
- `php spark health:run --domain=alerts --dry-run`
- `php spark health:run --target='GET:/API/Alerts/processAlerts'`

### Output

- **Overwrite**: `writable/logs/health_run_latest.log`
- **Archive** (optional): `writable/logs/health/health_run_YYYY-MM-DD_HHMMSS.log`
- **Optional DB**: `bf_health_runs`, `bf_health_run_results`

## Execution Strategy

1. Load registry entries (DB or config).
2. Filter by `--domain`, `--priority`, and `--target`.
3. Execute checks with a shared runner:
   - **Route checks**: use CI4 test client or HTTP client.
   - **Service checks**: call public methods directly.
   - **Integration checks**: call ping endpoints or minimal API requests.
4. Record results, timings, and assertion outcomes.

## Health Check Patterns

### Pattern A: Route Smoke Test
- Minimal params, no side effects.
- Assertions: status != 500, JSON contains `status` and `data`/`message`.

### Pattern B: DB Contract Test
- Read-only endpoints.
- Assertions: keys exist, counts >= 0.

### Pattern C: Write + Cleanup
- Create test row, verify insert, cleanup.
- Requires `--dry-run` or safe sandbox env.

## Recommended Tables (Optional)

### `bf_health_runs`
- run_id, started_at, finished_at, status, filters_json

### `bf_health_run_results`
- run_id, registry_id, status, latency_ms, error_message, output_json

## Next Steps
1. Add registry table or config file.
2. Add `health:run` command.
3. Implement health runner services (`HealthLogger`, `HealthAssert`, `HealthEnv`).
