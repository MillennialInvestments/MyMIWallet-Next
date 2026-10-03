---
name: revenue-discover
description: "Cheap deterministic discovery of the Revenue MVP candidate, then single-agent shortlist and selection. Writes README.md and FEATURE_MATRIX.md in docs/_aiops/gtm/revenue-mvp. Use when no MVP is selected or the selection must be re-verified."
allowed-tools: Read, Grep, Glob, Bash(rg:*), Bash(git:*), Bash(find:*), Bash(bash docs/_aiops/gtm/revenue-mvp/scripts/02-revenue-discover.sh:*)
---
# /revenue-discover
1. Run scripts/02-revenue-discover.sh (read-only) and read only its summary files.
2. Delegate shortlist to the `revenue-discovery` agent (max 3 candidates). Do not repeat its work.
3. Determine and write into README.md: REVENUE_MVP_SELECTED, CUSTOMER, PROBLEM, PAID_VALUE, RECURRING_VALUE, CURRENT_FEATURES, CURRENT_PRICING, CURRENT_PLANS, CURRENT_SIGNUP_PATH, CURRENT_PAYMENT_PATH, CURRENT_ENTITLEMENT_PATH, CURRENT_SUBSCRIBER_OUTPUT, MISSING_COMPONENTS. Update FEATURE_MATRIX.md (free / paid / deferred).
4. Do not invent pricing or features. Unknown means UNKNOWN. Pricing source is app/Config/SiteSettings.php; if sources disagree write PRICE_CONFLICT_FOUND with both locations.
5. If docs/ is not inside an authorized worktree, write to the proposal directory and say so.
