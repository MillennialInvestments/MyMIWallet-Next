# Gap Audit Overview

This folder contains a recurring documentation-only audit that compares what the platform promises (docs) against what the CodeIgniter 4 codebase actually implements. Use it to spot launch blockers, track remediation work, and keep stakeholders aligned.

## How to Use This Audit
- Start with `gap_report.md` for the latest status, priority calls, and the “Top 25 Next Tasks.”
- Use `docs/gap_tracker/gap_tracker.csv` to plan and delegate fixes; each row maps a doc requirement to code evidence and a gap ID. The spark command `php spark gap:sync` keeps this sheet enriched and writes reports under `docs/gap_tracker/reports/`.
- Review `unresolved_questions.md` for items that need a product/engineering decision before implementation.

## Update Cadence
- **Monthly** during normal operations.
- **Weekly** during hardening, incident response, or pre-launch phases.
- Each update should refresh doc/code scans, rerun route inventories, and re-evaluate priorities.

## Definitions
- **Gap**: Requirement documented, but no code evidence exists.
- **Incomplete**: Code exists but is stubbed, unreachable, or missing critical behaviors.
- **Implemented**: Requirement is satisfied with clear route/method/view evidence.
- **Undocumented**: Code delivers a feature that has no corresponding documentation.

## Workflow to Refresh the Audit
1. Scan docs under `/docs/**/*.md` for new or changed requirements.
2. Inventory routes, controllers, libraries, models, commands, and views under `app/**` (auto-routing is disabled).
3. Map each requirement to concrete evidence (routes, methods, queries, views, commands).
4. File new rows in `gap_tracker.csv` with gap IDs and priorities.
5. Update `gap_report.md` summaries and the Top 25 task list.
6. Capture any ambiguities in `unresolved_questions.md`.
