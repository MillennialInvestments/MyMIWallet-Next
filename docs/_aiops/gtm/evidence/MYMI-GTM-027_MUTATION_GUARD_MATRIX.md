# MYMI-GTM-027 / 028: mutation guard matrix (2026-11-15)

## What is enforced now

`tests/app/Security/MutationRouteGuardMatrixTest.php` loads the runtime route
table (the same collectors `php spark routes` uses) and checks every POST,
PUT, PATCH and DELETE route:

- It passes if the route runs the `csrf` filter, or any guard filter
  (`permission:*`, `login`, `authcheck`, `apiToken`, `apiUser`, `apiAdmin`,
  `cronKey`, `internalToken`, ...).
- Otherwise it must be listed in `tests/baseline/mutation-guard-matrix.txt`
  with its caller and the policy that guards it inside the controller.
- An unlisted, unguarded mutation fails CI (unclassified mutation defaults to
  deny). A listed route that gains a filter must be removed from the list.

Snapshot at this commit: 42 mutation routes skip CSRF and have no guard
filter. All 42 are classified:

| Class | Count | Examples |
| --- | --- | --- |
| Webhook or machine caller (signature, secret, API key) | 14 | Discord interactions, Postmark bounce, Plaid, TradingView options |
| Signed-in user or admin, checked in the controller | 17 | Wallets create/update/unlink, AiOps run/toggle, forecast refresh |
| Handler missing, never reaches code (GTM-025/026) | 11 | `API/Status`, `API/Broker/linkPlaidAccount`, AIOps policy routes |

Session cookies are `SameSite=Lax`, so a cross-site POST carries no session.

## Fixed in this change

- **`API/Options/webhook` used a default secret written in the public
  source** (and shown on the Options dashboard). Anyone could post signals when
  `OPTIONS_WEBHOOK_SECRET` was unset. It now fails closed (503) without the
  env value, compares with `hash_equals`, and the dashboard no longer prints a
  secret. Test: `OptionsWebhookSecretTest`.
- **`API/Alerts/sign`** accepted a private key on GET or POST with no sign-in.
  It is now POST only behind the `login` filter.
- **`ops/health` and `API/Ops/health-score`** returned EnvDoctor findings and
  the report path to anyone. Both are now `permission:admin.access`, and the
  report path is no longer returned.

## Still open (agent work, next batches)

- Replace the 17 in-controller checks with route filters (`apiUser` /
  `permission:admin.access`) so the matrix shrinks.
- Remove or implement the 11 routes whose handlers are missing
  (`tests/baseline/route-handler-gaps.txt`, 188 entries in total).
- Add rate and audit policy columns (GTM-031).
