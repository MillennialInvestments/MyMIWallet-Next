# Chat Auth + SSO Flow

## JWT auto-login
- The chat server trusts MyMI Wallet as the identity provider.
- Middleware order: request logger → CORS guard → `jwtAuthMiddleware` → `basicAuthMiddleware` (only if JWT missing) → rate limiter.
- **SSO env (chat/.env):**
  - `SSO_ENABLED=true`
  - `SSO_JWT_ISSUER=https://mymiwallet.com`
  - `SSO_JWT_AUDIENCE=chat.mymiwallet.com`
  - `SSO_JWT_SECRET=CHANGE_ME` (HS256 or RS256 public key)
- Validation: `Authorization: Bearer <JWT>` must have a valid signature, issuer, audience, and `exp`. Unsigned/expired tokens return `401`.
- On success, `req.user` is populated with `{id, email, role, plan}` and cached in the request context. Tokens are **not** stored server-side.
- Basic Auth is only evaluated when no valid JWT is present; valid JWTs bypass the Basic challenge entirely.

## Per-user usage enforcement
- Node shared library: `tools/ai-cost-controls/index.js` (MySQL-backed, no localhost defaults).
- DB env expected: `DB_HOST/DB_PORT/DB_USER/DB_PASS/DB_NAME`.
- Table: `chat_usage` keyed by `(user_id, month)` with tokens, USD, and last plan/email.
- Plan caps (from `config/ai-cost-controls.json`): free $1, basic $5, pro $20, premium $50 per month.
- Flow: estimate request cost → check `chat_usage` for the SSO user → block with `{error:"Monthly AI limit reached for your plan"}` when projected usage exceeds the plan cap → global budget check runs afterward.
- Usage is persisted after each successful LLM call and included in the webhook payload for downstream monitoring.

## Global chat controls
- Runtime config: `chat/config.runtime.json` (enabled flag, provider/model, monthlyBudgetUsd, alertThresholdPercent, hardStopPercent).
- Admin API: `GET /api/admin/chat-usage` (permission: `admin.access`) returns global + per-user usage with plan/percent.
- UI: `/Management/Chat/Usage` exposes enable/disable, provider/model selection, alert/hard-stop thresholds, per-user reset, and an emergency kill switch.
- Dashboard card: Management landing page shows current month percent and links to the full controls.

## Disable / change models / reset budgets / alerts
- **Disable chat quickly:** hit the Kill Switch in `/Management/Chat/Usage` (sets `enabled=false`), or disable SSO by toggling `SSO_ENABLED=false` in chat env (forces Basic Auth).
- **Change models/providers:** update `provider` / `providerModel` in `/Management/Chat/Usage` or edit `chat/config.runtime.json`.
- **Reset budgets:** per-user reset form writes zeroed rows to `chat_usage`. Global budget is controlled by `monthlyBudgetUsd`.
- **Alerts:** when global spend crosses `alertThresholdPercent` (default 80%) an email is dispatched to `ALERT_EMAIL_TO`; the webhook also includes `{user}` context on each request.
