# Phase 06G — Non-Discord Pending Distribution Review

Result: added deeper distribution audit visibility and a dry-run/apply repair command for approved generated content stuck in pending_generation while non-Discord marketing targets already existed.

Production data action completed:
- Dry-run matched: 139
- Dry-run updated: 0
- Apply matched: 139
- Apply updated: 139
- Changed generated content distribution_status from pending_generation to pending.
- No marketing distribution/send command was run.
- Pending blog/in_app/email targets remain pending for controlled distribution.

Confirmed validation:
- marketing:audit:distribution RC=0
- Optional Discord community pending: 0
- Pending marketing targets now point to approved/pending generated content.
- marketing:daily-audit RC=0
- approved_ready: 139
- news:audit RC=0
- news:audit PASS 100% valid pipeline

Next phase: controlled dry-run-first distribution by explicit generated_content_id or small limit; do not run blanket marketing:distribute until reviewed.
