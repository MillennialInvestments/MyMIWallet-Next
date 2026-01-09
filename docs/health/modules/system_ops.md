# System Ops Health Tests

✅ Health Test: `php spark system:health-core`
Priority: P0
Feature: Database + cache connectivity
Primary Entry Point(s):
- `app/Controllers/System/HealthController.php::databaseCheck()`
- `app/Controllers/System/HealthController.php::cacheCheck()`
Dependencies:
- DB: primary connection
- Cache: configured handler in `app/Config/Cache.php`
What it should verify (checklist):
- Step 1: Connect to DB and run `SELECT 1`.
- Step 2: Cache write/read round-trip.
What it should log: db status, cache status, duration.
Failure modes to detect: DB unreachable, cache errors.
Where to implement: `app/Commands/SystemCoreHealth.php` (new).
Suggested command name: `system:health-core`
Expected log file: `writable/logs/health_system.log`

✅ Health Test: `php spark system:health-logs`
Priority: P0
Feature: Error logger table insert test
Primary Entry Point(s):
- `app/Commands/LogHealthcheck.php::run()`
Dependencies:
- DB: `bf_error_logs`
- File logs: `writable/logs/`
What it should verify (checklist):
- Step 1: Emit log markers.
- Step 2: Verify file log growth.
- Step 3: Confirm `bf_error_logs` insert.
What it should log: marker id, file status, db rows.
Failure modes to detect: log handler misconfig, missing table, write failures.
Where to implement: `app/Commands/LogHealthcheck.php` (already exists).
Suggested command name: `logs:healthcheck`
Expected log file: `writable/logs/log-YYYY-MM-DD.php`

✅ Health Test: `php spark system:health-writable`
Priority: P1
Feature: Writable storage permissions
Primary Entry Point(s):
- `WRITEPATH` filesystem checks
Dependencies:
- Filesystem: `writable/`, `writable/logs/`, `writable/uploads/`
What it should verify (checklist):
- Step 1: Create/delete temp files.
- Step 2: Confirm health log overwrite.
What it should log: paths tested, write/delete status.
Failure modes to detect: permission denied, disk full.
Where to implement: `app/Commands/SystemWritableHealth.php` (new).
Suggested command name: `system:health-writable`
Expected log file: `writable/logs/health_system.log`

✅ Health Test: `php spark system:health-ops-queue`
Priority: P1
Feature: Ops queue processing
Primary Entry Point(s):
- `app/Commands/OpsWork.php::run()`
- `app/Libraries/Ops/OpsJobRegistry.php`
Dependencies:
- DB: `bf_ops_jobs`, `bf_ops_queue`, `bf_ops_runs`
What it should verify (checklist):
- Step 1: Enqueue a lightweight job.
- Step 2: Run `ops:work` with limit=1.
- Step 3: Confirm run status updates.
What it should log: job_key, queue_id, run status.
Failure modes to detect: unknown job key, run record failures.
Where to implement: `app/Commands/SystemOpsQueueHealth.php` (new).
Suggested command name: `system:health-ops-queue`
Expected log file: `writable/logs/health_system.log`

✅ Health Test: `php spark system:health-cron-endpoints`
Priority: P1
Feature: Cron endpoint access & auth
Primary Entry Point(s):
- `app/Modules/APIs/Controllers/AlertsController.php::processAlerts()`
- `app/Modules/APIs/Controllers/DiscordController.php::processQueue()`
- `app/Modules/APIs/Controllers/MarketingController.php::cronFetchInbox()`
Dependencies:
- Env: `CRON_SHARED_KEY`
- Filesystem: `writable/cron_locks/`
What it should verify (checklist):
- Step 1: Invoke cron endpoints with valid token.
- Step 2: Validate lock file handling.
- Step 3: Confirm JSON response status.
What it should log: endpoint name, auth status, lock state.
Failure modes to detect: missing cron token, lock file stuck, 403 responses.
Where to implement: `app/Commands/SystemCronHealth.php` (new).
Suggested command name: `system:health-cron-endpoints`
Expected log file: `writable/logs/health_system.log`
