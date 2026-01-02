# GAP-AI-001 — Automated Codex Code Reviews

## Goal
Automate a daily/weekly repo review that produces actionable findings and suggested patches for MyMI Wallet.

## Definition of Done
- A documented workflow exists under docs/aiops/codex_review.md
- A spark command or cron entry exists (even if stubbed) to trigger it
- Output is written to docs/reviews/YYYY-MM-DD_codex_review.md
- Includes: top findings, file paths, patch suggestions, and risk/priority tags (P0–P3)

## Inputs
- Repository codebase
- /writable/logs/summary-YYYY-MM-DD.log
- docs/gap_tracker/gap_tracker.csv

## Output Format
- Top 10 findings (P0–P3)
- Proposed patch blocks with file paths
- Any SQL changes written to docs/sql/mysql.md (no migrations)

## Notes
Start minimal: a doc workflow first, then a spark command later.
