# OpsController

**File path:** `app/Modules/APIs/Controllers/OpsController.php`

## Purpose
Operational API for queue visibility, job dispatch, report ingestion/retrieval, and AIOps ingest-run metrics.

## Routes exposed
- `status()` - queue/job/runs summary, optional `queue_id` drill-down.
- `dispatch()` - enqueue a registered job.
- `ingestReport()` - persist markdown report and attach output text to run/queue references.
- `latestReport()` - fetch latest report content from `docs/ops/reports`.
- `ingestMetrics()` - list `bf_aiops_ingest_runs` records with pagination.

## Auth requirements
Requires `authorizeRequest()` for all public methods:
- Admin permission path (`admin.access`) OR
- Valid HMAC (`X-MyMI-Signature`, `X-MyMI-Timestamp`) generated from timestamp, request path, and body.

## Input validation
- Method gating on POST for `dispatch()` and `ingestReport()`.
- Required fields: `job_key` for dispatch/report ingest; non-empty `report_markdown` for report ingest.
- Pagination constraints in `ingestMetrics()` (`limit` clamped to 1..50, offset >= 0).
- HMAC validation checks header presence, numeric timestamp, ±300s skew, and signature equality.

## Side effects (DB, cache, queues)
- Reads/writes queue and run tables via `OpsQueueModel`, `OpsRunsModel`, `OpsJobsModel`.
- Creates queued jobs.
- Persists report markdown to filesystem through `OpsReportWriter`.
- Updates run output text by run ID or queue ID.
- Reads report files from `docs/ops/reports`.

## Related services/models
- `App\Libraries\Ops\OpsReportWriter`
- `App\Libraries\Ops\OpsJobRegistry`
- `App\Models\OpsJobsModel`
- `App\Models\OpsQueueModel`
- `App\Models\OpsRunsModel`
- `App\Models\AiOpsIngestRunModel`
