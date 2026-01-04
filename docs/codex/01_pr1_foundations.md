# PR1 — Foundations: DB + Models + Minimal Ops API

## Objective
Create the foundational database tables and CI4 models + API endpoints needed to:
- define jobs
- enqueue work
- track runs
- store runtime config
- store AI usage telemetry

## 1) Migrations
Create CI4 migrations for:

### bf_ops_jobs
- id (BIGINT UNSIGNED PK AI)
- job_key (VARCHAR(120) UNIQUE)
- title (VARCHAR(255))
- description (TEXT NULL)
- enabled (TINYINT default 1)
- schedule_hint (VARCHAR(64) NULL)
- created_at (DATETIME)
- updated_at (DATETIME)

### bf_ops_job_runs
- id (BIGINT UNSIGNED PK AI)
- job_id (BIGINT UNSIGNED FK -> bf_ops_jobs.id)
- run_uuid (CHAR(36))
- status (ENUM queued|running|success|fail|skipped)
- started_at (DATETIME NULL)
- ended_at (DATETIME NULL)
- duration_ms (INT NULL)
- memory_peak_mb (INT NULL)
- result_summary (TEXT NULL)
- log_ref (VARCHAR(255) NULL)
- created_at (DATETIME)

### bf_ops_queue
- id (BIGINT UNSIGNED PK AI)
- job_key (VARCHAR(120) INDEX)
- payload_json (LONGTEXT)
- status (ENUM pending|running|success|fail)
- attempts (INT default 0)
- max_attempts (INT default 3)
- locked_until (DATETIME NULL)
- last_error (TEXT NULL)
- created_at (DATETIME)
- updated_at (DATETIME)

### bf_runtime_config
- id (BIGINT UNSIGNED PK AI)
- scope (VARCHAR(64) default 'global')
- config_key (VARCHAR(120) UNIQUE)
- config_value (LONGTEXT)  // JSON
- updated_by (BIGINT UNSIGNED NULL)
- updated_at (DATETIME)

### bf_ai_usage
- id (BIGINT UNSIGNED PK AI)
- source (ENUM chat|aiops|ci4)
- period_key (VARCHAR(20))  // YYYY-MM or YYYY-MM-DD
- tokens (BIGINT default 0)
- cost_usd (DECIMAL(12,6) default 0.000000)
- meta_json (LONGTEXT NULL)
- created_at (DATETIME)

## 2) Seeds
Create a seeder that inserts default jobs into bf_ops_jobs:
- ops.logs.summarize
- ops.security.scorecard
- ops.perf.scorecard
- ops.docs.inventory_scan
- marketing.fetch_emails_to_temp
- marketing.generate_digest
- marketing.generate_posts
- alerts.process
- alerts.update_market_data

## 3) Models
Create:
- app/Modules/Management/Models/OpsModel.php (or app/Models/OpsModel.php if preferred)
- app/Modules/Management/Models/RuntimeConfigModel.php
- app/Modules/Management/Models/AiUsageModel.php

### OpsModel must provide:
- getStatus(): queue counts, last run per job, running jobs count
- enqueueJob(jobKey, payloadArray): insert into bf_ops_queue
- getJobByKey(jobKey)
- recordRunStart(jobKey/runUuid)
- recordRunEnd(runUuid, status, summary, durationMs, memoryPeakMb)

### RuntimeConfigModel must provide:
- get(key, scope='global'): returns parsed JSON or primitive
- set(key, value, updatedBy, scope='global'): upsert
- getAll(scope='global')

## 4) API Endpoints (API module)
Add routes and controller:
- Controller: app/Modules/APIs/Controllers/OpsController.php
- Routes:
  - GET  /API/Ops/status
  - POST /API/Ops/dispatch

### GET /API/Ops/status
Returns JSON:
{
  status: "success",
  data: {
    queue: { pending, running, fail },
    jobs: [ { job_key, enabled, last_run_status, last_run_at } ],
    ai_usage: { daily_cost, monthly_cost } // placeholder ok PR1
  }
}

### POST /API/Ops/dispatch
Body:
{ job_key: "alerts.process", payload: { ... } }

Validations:
- job_key exists and enabled
- payload JSON-encodable
- log action

Writes bf_ops_queue row.

Return:
{ status:"success", data:{ queued_id } }

## 5) Security
For PR1:
- restrict endpoints to admin role (reuse your existing RBAC/permission system)
- add rate limiting if you have it; otherwise log and restrict by session

## 6) Deliverables
- migrations + seeds
- OpsModel + RuntimeConfigModel + AiUsageModel
- API controller + routes
- basic tests or smoke instructions in docs/ops/

## 7) Smoke Test
- php spark migrate
- php spark db:seed OpsJobsSeeder
- curl GET /API/Ops/status as admin
- curl POST /API/Ops/dispatch with a known job_key
- verify row inserted into bf_ops_queue
