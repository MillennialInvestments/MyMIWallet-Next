---
name: revenue-certify
description: "Certify a Revenue MVP readiness state (NOT_READY, IMPLEMENTATION_READY, SANDBOX_REVENUE_READY, PRODUCTION_REVENUE_READY) from evidence, run the security and documentation reviewers, and finalize LAUNCH_COPY.md from certified features only."
disable-model-invocation: true
allowed-tools: Read, Grep, Glob, Bash(git:*), Bash(bash docs/_aiops/gtm/revenue-mvp/scripts/:*), Write, Edit
---
# /revenue-certify
States, in order, never skipped:
- IMPLEMENTATION_READY: all slice tests green in the current worktree and `git diff --check` clean.
- SANDBOX_REVENUE_READY: complete journey under sandbox/test providers: visitor, offer, registration, plan, test checkout, subscription row, entitlement, paid feature, subscriber output, account/cancel. Missing sandbox means BLOCKED_EXTERNAL_SANDBOX, not ready.
- PRODUCTION_REVENUE_READY: approved release, exact deployed SHA, post-deploy smoke evidence, provider config, legal links, support path. Requires human production approval.
Run `revenue-security-reviewer` on the MVP diff and `revenue-documentation-reviewer` on the docs. Open findings block certification. Update GTM_CHECKLIST.md with evidence links. Only after SANDBOX_REVENUE_READY may LAUNCH_COPY.md drop its DRAFT marker, and it may advertise only features with passing tests, verified plan/price from source, and a verified signup URL.
