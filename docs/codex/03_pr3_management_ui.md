# PR3 — Management Ops Dashboard UI

## Objective
Build a Management Module UI that becomes Teddy’s single pane of glass.

## 1) Controller + Routes
Create:
- app/Modules/Management/Controllers/OpsController.php
Routes:
- GET /Management/Ops
- GET /Management/Ops/job/(:segment)
- AJAX endpoints:
  - GET /Management/Ops/ajaxStatus
  - POST /Management/Ops/ajaxDispatch

Security:
- admin only

## 2) View: app/Modules/Management/Views/Ops/index.php
UI blocks:
1) Platform Health
- aiops status (shows reachable/unreachable)
- chat status
- mymiwallet status
(These can be called via JS → CI4 API or direct fetch from browser if allowed)

2) Queue Tile
- pending/running/fail counts
- button: “Run Worker Once” (calls /API/Ops/dispatch job_key=ops.worker.kick or triggers spark via cron route if you have one)

3) Jobs table
- job_key
- enabled
- last run status/time
- button: “Run Now”
- button: “View Runs”

4) Recent Runs table
- last 20 bf_ops_job_runs
- filter by job_key

## 3) UX Requirements
- Live refresh toggle: every 30s refresh ajaxStatus
- Toast notifications on dispatch success/fail
- Show “worker running” indicator if running jobs > 0

## 4) Deliverables
- Controller + views + JS
- uses your theme/layout conventions
- uses DataTables if consistent with your existing UI
