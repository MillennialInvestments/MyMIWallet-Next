# Operational Usage: Go-Live Tracking and Control

This guide turns the `/docs/go-live` assets into an operational system that keeps Excel, the database, and the Management Module UI in sync while making blockers impossible to miss.

## Phase 1 — Excel Automation & Visual Signalization
- **File:** `go_live_checklist_tracker.xlsx` (materialize from `go_live_checklist_tracker.xlsx.b64`; mirrors `go_live_checklist_tracker.csv`).
- **Status dropdown (column I):** `Not Started`, `In Progress`, `Blocked`, `Verified`, `Deferred` (Excel list validation on I2:I31 in the seeded tracker; extend as rows grow).
- **Conditional formatting (columns G & I):**
  - **Red fill:** `Severity=P0` **and** `Status != "Verified"`.
  - **Yellow fill:** `Severity=P1` **and** `Status != "Verified"`.
  - **Green fill:** `Status="Verified"`.
  - **Gray fill:** `Status="Deferred"`.
- **Embedded formulas (right-side summary cells):**
  - Launch Blocker Counter: `=COUNTIFS(G:G,"P0",I:I,"<>Verified")`
  - Completion Percentage: `=COUNTIF(I:I,"Verified") / COUNTA(I:I)`
  - Module Completion % (Budget example): `=COUNTIFS(B:B,"Budget",I:I,"Verified") / COUNTIF(B:B,"Budget")`
- **Filters / saved views (use Excel filters on A1:L{end}):**
  - 🔥 **P0 Blockers:** Severity = `P0` and Status ≠ `Verified`.
  - ⚠️ **In Progress:** Status = `In Progress`.
  - ✅ **Verified:** Status = `Verified`.
  - 📦 **Deferred:** Status = `Deferred`.
- **Usage tips:** Keep the CSV as the interchange format; use the XLSX for daily standups so blockers visually dominate attention.

## Phase 2 — Management Module Dashboard (Admin-only)
- **Database table (1:1 with CSV):**

```sql
CREATE TABLE bf_go_live_checklist (
  id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  category VARCHAR(120) NOT NULL,
  module VARCHAR(120) NOT NULL,
  step_id VARCHAR(64) NOT NULL UNIQUE,
  description TEXT NOT NULL,
  route VARCHAR(190) NOT NULL,
  expected_outcome TEXT NOT NULL,
  severity ENUM('P0','P1','P2') NOT NULL,
  owner VARCHAR(120) NULL,
  status ENUM('Not Started','In Progress','Blocked','Verified','Deferred') NOT NULL DEFAULT 'Not Started',
  issue_reference VARCHAR(120) NULL,
  date_verified DATE NULL,
  notes TEXT NULL,
  updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```

- **API (CI4, under `/API/Management/GoLive`):**
  - `GET /checklist` — Admin-only; returns DataTables-ready JSON (`data`, `recordsTotal`, `recordsFiltered`).
  - `POST /update-step` — Body `{ step_id, status, owner?, issue_reference?, notes?, date_verified? }`; validates status list and logs actor + IP.
  - `POST /import-csv` — Accepts uploaded CSV with exact headers; validates all rows, rejects malformed rows, matches on `step_id`, wraps changes in a transaction, and logs import summary.
  - `GET /summary` — Returns counts by severity/status plus completion percentages for each module.
  - **All endpoints:** enforce admin auth middleware and write to audit log table on change.

- **Admin UI (Management Module → Go-Live Dashboard):**
  - DataTable with filters for Category, Module, Severity, and Status.
  - Inline Status dropdown (same five options as Excel) with immediate API update.
  - Banner for 🔴 P0 blockers (count + links to rows) floated above the table.
  - Progress bar for overall completion (`verified / total`).
  - Buttons: **Export CSV** (from DB) and **Import CSV** (with confirmation modal).
  - “Last Updated” timestamp from the most recent `updated_at`.
  - Optional collapsible section for 🟢 Verified rows to reduce noise.

## Phase 3 — CSV ⇄ Database ⇄ UI Sync Rules
- **Source of truth:** Database after initial import; CSV/XLSX are portable snapshots.
- **Export CSV:** Always preserve header order and step ordering from `go_live_checklist.md`.
- **Import CSV:**
  - Match rows on `step_id`; ignore unknown IDs unless explicitly allowed via a feature flag.
  - Reject missing headers or invalid status/severity values.
  - Log every changed field (old → new) with actor metadata.
  - Require user confirmation modal summarizing planned changes before commit.
- **UI updates:** Inline edits write directly to DB; export pulls directly from DB to keep parity.

## Phase 4 — Operational Usage Rules
- **When to use Excel:** Daily triage, quick mass updates offline, and sharing with partners who prefer spreadsheets.
- **When to use the UI:** Real-time status changes, auditability, and dashboarding for leadership.
- **P0 policy:** If any P0 is not `Verified` → **NO GO**. Escalate immediately.
- **P1 policy:** Allowed with documented mitigation and sign-off from launch lead.
- **P2 policy:** Track for post-launch; do not block.
- **Daily cadence:**
  - Morning: import any offline CSV edits, review 🔴 banner, and confirm blockers.
  - Midday: re-run `summary` endpoint to confirm progress bar accuracy.
  - Evening: export CSV snapshot to archive the day.
- **Incident linking:** Use `issue_reference` for GitHub issues/PRs/incidents; mirror the ID in the audit log entry for traceability.

## Phase 5 — Next Enhancements
- Slack/Discord alerts on any P0 status change.
- Auto-create GitHub issues for blockers.
- Read-only executive dashboard with trend lines.
- Multi-release support (v1.0, v1.1, etc.).
- Historical launch comparisons to show readiness velocity.
