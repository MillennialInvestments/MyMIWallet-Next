# PR2 — Worker + Job Registry (ops:work)

## Objective
Implement a reliable queue worker that:
- locks work items
- retries safely
- tracks runs in bf_ops_job_runs
- logs memory peaks + durations
- dispatches job handlers from a registry

## 1) spark command
Create: app/Commands/OpsWork.php
Command: php spark ops:work --limit=25

Behavior:
- fetch N pending jobs where:
  status = 'pending' AND (locked_until IS NULL OR locked_until < NOW())
- lock row:
  set status='running', locked_until = NOW()+INTERVAL 2 MINUTE, attempts=attempts+1
- create run_uuid and bf_ops_job_runs record with status='running'
- execute handler:
  OpsJobs::run(job_key, payload)
- on success:
  set queue row status='success', locked_until NULL
  set run status='success'
- on failure:
  if attempts < max_attempts:
    set queue row status='pending', locked_until NULL, last_error
    set run status='fail'
  else:
    set queue row status='fail'
    set run status='fail'

Record:
- duration_ms
- memory_peak_mb
- result_summary (short)
- log_ref optional

## 2) Registry
Create: app/Libraries/Ops/OpsJobs.php

Structure:
- static run(string $jobKey, array $payload): array { summary, meta }
- switch/case or map:
  - ops.logs.summarize -> calls your existing log summarizer (or stub)
  - ops.docs.inventory_scan -> scans docs/ tree and outputs docs/ops/docs_inventory.md
  - ops.security.scorecard -> stub now; PR5 expands
  - marketing.* -> calls MyMIMarketing methods
  - alerts.* -> calls AlertsController service methods (or library)
  - ops.perf.scorecard -> stub now

Must be safe:
- catch exceptions and rethrow a controlled exception
- never output huge payloads into DB; truncate summary

## 3) Lock correctness
Use DB transaction for:
- selecting + locking row
- updating status

If MySQL: use SELECT ... FOR UPDATE when possible.

## 4) Logging
- log_message('info', ...) for each run start/end
- if you have DatabaseLoggerHandler wired -> it will write bf_error_logs

## 5) Smoke Test
- enqueue a job via /API/Ops/dispatch
- run php spark ops:work --limit=1
- confirm bf_ops_queue updated to success
- confirm bf_ops_job_runs has a success record
