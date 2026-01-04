# PR4 — Chat → CI4 Command Bridge (signed allowlist)

## Objective
Allow chat.mymiwallet.com to dispatch allowlisted commands into CI4 securely.

## 1) Signature scheme
Shared secret in:
- chat/.env: MYMI_COMMAND_SECRET
- CI4 .env: MYMI_COMMAND_SECRET

Request:
- POST /API/Ops/command
Headers:
- X-MyMI-Timestamp: unix seconds
- X-MyMI-Signature: hex(HMAC_SHA256(timestamp + "." + body, secret))

CI4 must reject:
- timestamp older than 120 seconds
- signature mismatch

## 2) CI4 Endpoint
Create in API module:
- POST /API/Ops/command

Body:
{
  "command": "run",
  "args": { "job_key": "alerts.process", "payload": {} }
}

Allowlist commands:
- status
- run (job_key must exist and enabled)
- docs.workorder.create (writes markdown file into /docs/codex/work_orders/)
- usage.report (returns ai usage summary)

Return:
{ status:"success", data: ... }

## 3) Chat server endpoint
In chat server.js:
- POST /api/command
- Validates request body
- Signs and forwards to CI4 /API/Ops/command
- Returns CI4 JSON back to client

## 4) UI on chat
Add quick buttons (optional):
- Status
- Run alerts.process
- Run marketing.generate_digest
- Run ops.logs.summarize

## 5) Smoke Test
- From VPS:
  - curl chat /api/command status
- Confirm CI4 receives and returns status
- Confirm bad signature is rejected
