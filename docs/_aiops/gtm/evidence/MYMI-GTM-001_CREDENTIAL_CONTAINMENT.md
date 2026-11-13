# MYMI-GTM-001 — Credential Containment Register

## Governing task

- Task: MYMI-GTM-001
- Priority: P0
- Scope: containment and redacted evidence only
- Tracked exposure: chat/.env
- Secret values recorded in this document: 0
- Last updated: 2026-11-13 (rotation log below)
- Replacement credentials committed to Git: 0

## Required external rotations

| Credential category | Owner | Status | Required action | Required redacted evidence |
|---|---|---|---|---|
| OpenAI-style API credential | MyMI OpenAI account/project owner | EVIDENCE PENDING | Revoke the exposed credential, create a replacement, and install it only through the approved private runtime secret store. | Provider/account category, responsible owner, revocation or rotation timestamp, ticket/reference, completion timestamp, optional safely redacted identifier, verification status. |
| Database credentials | MyMI database/infrastructure owner | VERIFIED | Rotate every exposed database credential and update only the approved private runtime secret store. | Provider/account category, responsible owner, rotation timestamp, ticket/reference, completion timestamp, optional safely redacted identifier, verification status. |
| Basic-auth credentials | MyMI service/infrastructure owner | VERIFIED | Rotate every exposed basic-auth username/password credential at the owning service and update only the approved private runtime secret store. | Service category, responsible owner, rotation timestamp, ticket/reference, completion timestamp, optional safely redacted identifier, verification status. |
| Webhook credentials | MyMI integration owner | ROTATED / REVOKED | Revoke or rotate every exposed webhook secret/token at the owning provider and update only the approved private runtime secret store. | Provider/category, responsible owner, revocation or rotation timestamp, ticket/reference, completion timestamp, optional safely redacted identifier, verification status. |
| Health/service credentials | MyMI infrastructure/service owner | EVIDENCE PENDING | Rotate every exposed health/service credential and update only the approved private runtime secret store. | Service category, responsible owner, rotation timestamp, ticket/reference, completion timestamp, optional safely redacted identifier, verification status. |

## Rotation log (2026-11-13, owner-run on production host)

Performed by the owner (Tim) in a terminal on the production chat host, following
`runbooks/mymi-chat-env-rotation.md` (project files) with Claude guidance. Values were
entered through hidden prompts or generated in-shell; no value was printed, pasted,
stored in this repository, or shared. Times are UTC.

| Credential (key in live chat env) | Action | Time | Verification | State |
|---|---|---|---|---|
| OpenAI API key (`OPENAI_API_KEY`) | Replacement key created and installed; chat service restarted | 17:53 | New key returns 200 from the provider (18:49, 22:04). Old key still returned 200 at 22:02: revocation in the provider dashboard is pending owner confirmation. No other live file on the host uses the old key (searched 20:30). | EVIDENCE PENDING |
| Basic-auth password (`BASIC_AUTH_PASS`) | New random value; chat restarted | 17:53 | New value 200, old value 401 on the management route (18:49) | VERIFIED |
| Usage webhook secret (`MYMI_USAGE_WEBHOOK_SECRET`) | New random value; chat restarted | 18:03 | Not verifiable end to end: the configured receiver route `/API/Management/ingestChatUsage` does not exist in the app, so nothing checks the header. Gap noted for follow-up. | ROTATED / REVOKED |
| Database password (`DB_PASS`, shared with the web app's `database.default.password`) | MySQL `ALTER USER` for both host entries of the app user; chat env and web app env updated together; PHP-FPM reloaded; chat restarted | 21:53 | New password connects, old password refused; website and login page 200; chat health ok | VERIFIED |
| Registration-health account password (`REG_HEALTH_PASSWORD`) | New value written to chat env | 21:57 | Pending owner confirmation that the account's password was reset on the site | EVIDENCE PENDING |
| SSO JWT secret (`SSO_JWT_SECRET`) | Not set in the live file; nothing to rotate | 21:57 | n/a | n/a |

Also done: the live chat env file was made unreadable to other users (mode 640), and all
local pre-rotation backup copies were shredded (22:02).

Residual risk: about 45 stale copies of the old database password remain in old release
and backup directories on the host. Those values no longer work. Their removal is a
separate owner decision.

## Status contract

Allowed states are NOT STARTED, OWNER ACTION REQUIRED, ROTATED / REVOKED, EVIDENCE PENDING, and VERIFIED.

MYMI-GTM-001 is not complete until every exposed credential has reached VERIFIED with redacted provider-side evidence and no secret value appears in any report.

## Current scanner gap

The current security:secrets-audit implementation checks the root .env and root .env.example targets and does not directly inspect nested chat/.env. Nested secret-scanning enforcement belongs to MYMI-GTM-003.

## Scope boundaries

- Do not expose, copy, print, serialize, or commit credential values.
- Do not modify chat/.env in MYMI-GTM-001.
- Safe tracked runtime-config replacement belongs to MYMI-GTM-002.
- Nested secret-scanning enforcement belongs to MYMI-GTM-003.
- No production mutation, deployment, database mutation, or Git-history rewrite is authorized by this task.
