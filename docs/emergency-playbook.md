# Emergency Playbook (AI Runtime)

## 1) Disable AI traffic immediately
- **Chat (chat.mymiwallet.com):**
  - Go to `/Management/Chat/Usage` and hit **Emergency Kill Switch** (sets `chat/config.runtime.json` `enabled=false`).
  - Alternatively, stop accepting JWTs by setting `SSO_ENABLED=false` in `chat/.env` (forces Basic Auth lockout).
- **AIOps (aiops.mymiwallet.com):**
  - Call `/API/AIOps/toggle` with `aiops_enabled=false` and/or `aiops_llm_enabled=false` (permission `admin.access`).
  - Existing policy checks will return `allowed:false` when disabled.

## 2) Change models/providers under pressure
- **Chat:** Update `provider`/`providerModel` in `/Management/Chat/Usage` or edit `chat/config.runtime.json`, then restart the chat service if required.
- **AIOps:** Adjust the model/provider in SiteSettings overrides used by the AIOps callers; workflow caps are USD-based and unaffected by model choice.

## 3) Reset or reclaim budget
- **Per user (chat):** Use the reset form in `/Management/Chat/Usage` to zero a specific `user_id` for a month (writes `chat_usage`).
- **Global chat budget:** Raise/lower `monthlyBudgetUsd`, `alertThresholdPercent`, or `hardStopPercent` in `/Management/Chat/Usage`.
- **Per workflow (AIOps):** Clear or adjust the row in `bf_aiops_workflow_usage` for the workflow/month you need to reopen. Event-level history stays in `bf_aiops_usage`.

## 4) Understand who gets alerted
- **Chat global:** When usage crosses `alertThresholdPercent` (default 80%) an email is sent to `ALERT_EMAIL_TO` by the chat server.
- **AIOps daily:** `AIOpsGuardrailService::maybeSend80PercentAlert` emails `aiops_alert_email` once the daily cap hits 80%.
- **Per-user/per-workflow:** Enforcement responds with an error (`Monthly AI limit reached for your plan` or `WORKFLOW_BUDGET`) before upstream calls are made; these are not auto-emailed but surface in API responses/logs.

## 5) Validate state
- **Usage API:** `GET /api/admin/chat-usage` (requires `admin.access`) returns the month, global totals, and per-user usage/plan percentages.
- **Dashboard:** Management landing page shows the current chat percent; click through to `/Management/Chat/Usage` for detailed controls and resets.
- **AIOps policy:** `/API/AIOps/policy/check` responses include `workflow_budget` with `projected_usd`, `percent`, and `limit` so the caller can halt workflows proactively.
