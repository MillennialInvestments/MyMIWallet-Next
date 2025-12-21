# Prompt Templates (Codex Control Plane)

Use these drafts as a starting point when asking Codex for help. Keep the tone concise, operational, and security-minded. Always prepend the **Global Header** to give Codex the right context.

## Global Header Fields
```
Project: MyMI Wallet (CI4, PHP 8.2, DreamHost)
Role: Ops Admin (admin-only scope)
Environment: <local|staging|prod>
Auth: Bearer token in headers (no secrets in logs)
Mailbox: commands@mymiwallet.com
Cron Token: ${MYMI_CRON_TOKEN}
Allowed Senders: ${MYMI_OPS_ALLOWED_SENDERS}
Constraints: no sudo; phone-safe; idempotent; no auto-deploy without approval
```

## Daily Triage Prompt
```
[Daily Triage]
Context: Review overnight ops inbox + cron outputs.
Inputs: inbox status counts, top errors (no secrets), cron summaries.
Ask: Identify top 3 issues, confidence, suggested next steps, and scripts to run.
Output: bullet summary + JSON plan (tasks, owner, priority, risk, scripts).
```

## Feature / Change Prompt
```
[Feature Delivery]
Goal: Implement <feature/change>.
Inputs: requirements, constraints, CI4 module, routes, DB tables, test expectations.
Ask: propose plan, edge cases, db migrations, UI impact, rollback.
Output: ordered plan + risk callouts + test checklist.
```

## Ops Scripts Prompt
```
[Ops Script]
Goal: run <script> via SSH from phone.
Inputs: env, target host, tokens, expected outputs.
Ask: confirm idempotency, safety checks, dry-run steps, rollback.
Output: step list + JSON command payload (script, args, env vars, validation).
```

## Marketing Prompt
```
[Marketing]
Goal: generate campaign assets.
Inputs: audience, channel, CTA, compliance notes.
Ask: create short/long copy, hashtags, schedule slots, approval checklist.
Output: channel-ready snippets + JSON schedule.
```

## User Audit Prompt
```
[User Audit]
Goal: investigate user/account issue.
Inputs: user id/email, symptoms, logs (redacted), time window.
Ask: hypotheses, data to pull, SQL/CI4 endpoints, remediation steps.
Output: investigation plan + SQL/CLI snippets (no PII in logs).
```

## Deploy Plan Prompt
```
[Deploy Plan]
Goal: prepare deployment for <change set>.
Inputs: git branch, migrations, cron touches, feature flags.
Ask: pre-checks, deploy steps (no sudo), smoke tests, rollback.
Output: checklist + JSON steps keyed by phase (pre, deploy, post, rollback).
```

## Docs Enforcement Prompt
```
[Docs Enforcement]
Goal: confirm docs/cron database and control-plane docs are up to date.
Inputs: list of new/changed cron jobs, new commands, routes.
Ask: verify runbooks and index.csv entries; flag missing items.
Output: status table + actions to add runbooks/entries.
```
