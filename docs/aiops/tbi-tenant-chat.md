# MyMI AI chat on TBI AIOps (chat.mymiwallet.com)

MyMI Wallet is the first tenant of TBI AIOps. Members chat with the TBI
Ollama fleet at `https://chat.mymiwallet.com`. The chat page, the caps and the
AI calls live in the TBI app (`tbisolutions/timothyburks`,
`docs/aiops/mymi-tenant-chat.md`). This repository only signs members in.

It replaces the old Node chat (`chat/server.js`, `mymi-wallet-chat.service`,
port 8300). Since 2026-11-23 the public name `chat.mymiwallet.com` points at
gq-ai01 (170.75.250.237), so the Node chat no longer gets public traffic.

## How sign-in works

1. A signed-in member opens **AI Chat** in the dashboard sidebar
   (`GET /AI-Chat`, filters `login` and `noStore`).
2. `AIChatController::open` reads the member id from the session only
   (`$this->cuID`) and the tier from `PremiumEntitlementService`:
   an active paid or trial membership is `premium`, everyone else `public`.
3. `App\Libraries\TbiChat\TbiChatLink` signs a JWT (HS256) and redirects to
   `https://chat.mymiwallet.com/enter?token=...`:

   | Claim | Value |
   | --- | --- |
   | `iss` | `https://www.mymiwallet.com` |
   | `aud` | `chat.mymiwallet.com` |
   | `tenant` | `mymi` |
   | `sub` | the member's numeric id |
   | `tier` | `public` or `premium` |
   | `iat`, `exp` | now, now + 120 s |
   | `jti` | 128 random bits; the chat accepts each one once |

   The token carries no name, email or account data. The link is never
   logged; the redirect is sent with `Cache-Control: no-store` and
   `Referrer-Policy: no-referrer`.
4. The chat checks the token, starts its own 2-hour session and removes the
   token from the address bar.

What each tier gets, the hourly and daily caps and the engines are set on
the TBI side (`TENANT_MYMI_*`). Today both tiers get the TBI Fleet, and
premium also gets the whole fleet (Paint). ChainLinX with paid AIs stays off
until the owner sets the paid-AI list and a monthly dollar cap.

## Settings (production `.env`)

| Name | Value |
| --- | --- |
| `TBI_CHAT_ENABLED` | `on` to show the sidebar item and sign members in (default `off`) |
| `TBI_CHAT_SIGNING_KEY` | the same value as `TENANT_MYMI_SIGNING_KEY` in the TBI app's `shared/.env` (32+ bytes) |
| `TBI_CHAT_URL` | optional, default `https://chat.mymiwallet.com` (must be https) |
| `TBI_CHAT_ISSUER` | optional, default `https://www.mymiwallet.com` (must match the TBI tenant registry) |

While it is off, the sidebar item is hidden and `/AI-Chat` returns to the
dashboard with "The AI chat is not available yet".

## Owner steps (after merge)

1. Deploy through the normal release path (staging at the merge SHA, then
   `mymi-release.sh build main` and `activate`).
2. Copy the signing key from the TBI app into MyMI's production `.env`
   without printing it, and set `TBI_CHAT_ENABLED=on`.
3. Sign in to MyMI Wallet as a member, open **AI Chat** and send a message.
4. When members use it, stop the old Node chat:
   `sudo systemctl disable --now mymi-wallet-chat.service`. Keep
   `chat/` in the repository until a separate cleanup PR.

## Rollback

Set `TBI_CHAT_ENABLED=off` (the sidebar item disappears and no more links
are signed), or revert the PR. Sessions already open on the chat end within
two hours, or at once when the TBI side turns `TENANT_MYMI_ENABLED=off`.

## Next

- Usage reporting from the TBI ledger back to MyMI (per member, per day).
- Read-only finance tools (Phase 4) under a separate review.

## First name and usage report (2026-11-28)

- **First name.** `/AI-Chat` now adds the member's first name (`cuFirstName`)
  to the one-time link as the optional `name` claim, so the chat can greet
  them. Only a plain name is sent (letters in any language, marks, spaces,
  `'`, `.`, `-`, up to 40 characters); the chat applies the same rule. No
  email, last name or account data is sent. Turn it off with
  `TBI_CHAT_SEND_NAME=off`.
- **Usage report.** `php spark tbichat:usage` reads MyMI's AI chat usage back
  from TBI AIOps for one UTC day (`--date YYYYMMDD`, default today; `--days N`
  for the days before it, up to 45). It shows totals, one row per member
  (MyMI user id, tier, messages, failures, tokens) and one anonymous total.
  `--save` keeps each day as JSON in `writable/tbi-chat/` (mode 0600) and
  `--json` prints JSON. It signs a `scope: usage.read` token with the same
  `TBI_CHAT_SIGNING_KEY`; nothing new to configure. If this server cannot
  reach its own public address, set `TBI_CHAT_REPORT_RESOLVE` to the chat
  host's local IP; TLS is still checked against chat.mymiwallet.com.
  Needs TBI timothyburks PR #2085 deployed.
