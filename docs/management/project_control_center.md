# Project Control Center (Management Module)

## Purpose
Centralized dashboard for normalized project summaries (category, subcategory, component, status, notes) across ChatGPT-driven projects. Provides admin-only controls for ingesting CSV data, updating statuses/notes, exporting datasets, and drilling into item detail.

## UI
- Location: `/Management/Project-Control-Center` (admin only).
- NK UI layout with quick actions (import/add/export/refresh), filter row (project, status, category, search), DataTable (server-side), and dynamic modals for detail, upsert, and CSV import.
- Live mode toggle refreshes the DataTable every 30s.

## Endpoints
All endpoints return `{ status: "success" | "error", data?: ..., message?: ... }` and require admin access.

| Method | Route | Description |
| --- | --- | --- |
| GET | `/Management/Project-Control-Center` | Admin UI. |
| GET | `/API/Management/ProjectControl/list` | DataTables server-side list (filters: `status`, `category`, `project_name`, `search[value]`, `start`, `length`, `draw`). |
| POST | `/API/Management/ProjectControl/upsert` | Create/update item (fields: `id?`, `project_name*`, `component*`, `category`, `subcategory`, `description`, `status`, `primary_files`, `notes`, `tags_json`, `source_type`, `source_ref`). |
| GET | `/API/Management/ProjectControl/detail/{id}` | Fetch full detail for modal. |
| POST | `/API/Management/ProjectControl/updateStatus/{id}` | Update status (must be one of Active, Planned, Blocked, Deprecated, Completed). |
| POST | `/API/Management/ProjectControl/updateNotes/{id}` | Update notes text. |
| POST | `/API/Management/ProjectControl/importCsv` | Parse pasted CSV payload (see workflow below). |
| GET | `/API/Management/ProjectControl/exportCsv` | Download CSV using current filters. |
| GET | `/API/Management/ProjectControl/exportJson` | Download JSON using current filters. |

## Database Schema
Table: `bf_project_control_center_items`
- `id` (PK)
- `project_name` varchar(128) NOT NULL
- `category` varchar(64)
- `subcategory` varchar(64)
- `component` varchar(128) NOT NULL
- `description` text
- `status` varchar(16) NOT NULL DEFAULT 'Active' (Active | Planned | Blocked | Deprecated | Completed)
- `primary_files` varchar(255)
- `notes` text
- `tags_json` json NULL
- `source_type` varchar(32) NULL
- `source_ref` varchar(191) NULL
- `created_by` int NULL
- `updated_by` int NULL
- `created_at` datetime
- `updated_at` datetime

Indexes:
- UNIQUE (`project_name`, `category`, `component`)
- `idx_project_name`, `idx_status`, `idx_category`, `idx_updated_at`
- Optional FULLTEXT on (`component`, `description`, `notes`)

Optional imports ledger: `bf_project_control_center_imports` (stores CSV payloads + counts for observability).

See `docs/sql/project_control_center.sql.md` for exact CREATE statements.

## Import Workflow
- UI: “Import CSV” button opens modal with project name override, source type select, and textarea.
- Backend: `/API/Management/ProjectControl/importCsv`
  - Accepts headers: `Category,Subcategory,Component,Description,Status,Primary Files / Modules,Notes / Next Actions` (Project Name optional).
  - Tolerant to quoted commas; skips empty Component rows.
  - Status normalized case-insensitively to allowed values.
  - Upsert key: (`project_name`, `category`, `component`).
  - Logs inserted/updated/skipped counts and (optionally) stores raw CSV in `bf_project_control_center_imports` when the table exists.

## Export Workflow
- CSV/JSON exports respect current filters (project, status, category, search).
- CSV headers mirror table columns for round-trip into spreadsheets.

## Notes & Maintenance
- Access is admin-only; all write actions are logged via `log_message`.
- List endpoint uses DataTables server-side mode and short-lived cache (90s) keyed by filter hash to keep load low.
- When adding new status values, update `ProjectControlModel::STATUSES` and the dropdowns in the view/JS.
- If Redis is enabled, CI4’s cache abstraction will honor it automatically for the list endpoint.
