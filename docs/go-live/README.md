# Go-Live Readiness Docs

This directory houses the production launch checklist, supporting test account notes, environment readiness checks, rollback procedures, and post-launch verification for MyMI Wallet. Use these files together as a single playbook for the DreamHost-hosted CI4 stack.

## How to Use the Checklist
1. Open [`go_live_checklist.md`](./go_live_checklist.md) and work through each category in order.
2. For every item, record ownership, completion date, evidence links (logs/screenshots), and defects found.
3. Use the severity tags ([P0] blocker, [P1] major, [P2] minor) to prioritize remediation before promotion.
4. Log staging/prod test data in [`qa_test_accounts.md`](./qa_test_accounts.md) so all testers reuse known-safe identities.
5. Cross-check environment keys and deployment constraints in [`env_production_readiness.md`](./env_production_readiness.md) before enabling traffic.
6. If a deployment must be reversed, follow [`rollback_plan.md`](./rollback_plan.md) immediately.
7. After release, complete [`post_launch_verification.md`](./post_launch_verification.md) within the 30-minute, 24-hour, and 7-day windows.

## Definition: “Go-Live Ready”
A release is considered Go-Live Ready when:
- All [P0] and [P1] checklist items are fully green with evidence, and [P2] items have either been completed or accepted as known risks.
- Authentication, dashboards, budget, investments, alerts, marketing, support, and wallet aggregation routes mapped in `app/Config/Routes.php` are testable and pass expected outcomes.
- Environment configuration matches the production values in `.env`, HTTPS is enforced, logging and monitoring are active, and rollback/maintenance plans are in place.
- No open CRITICAL/ERROR entries remain in `bf_error_logs` related to the release window.

## Recording Completion
Use markdown checkboxes and append metadata inline for traceability:
- `[x] [P1] Login works — Owner: Jane QA — Date: 2025-10-10 — Evidence: log link/screenshot`
- Track dates in ISO format (YYYY-MM-DD) and include links to dashboards, Kibana/DB log queries, or cron outputs.
- If an item fails, leave the box unchecked, add a short defect note, and open a ticket before proceeding.
