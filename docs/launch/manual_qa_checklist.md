# Manual QA Checklist (Phase A)

## Scope
Phase A end-user surfaces only:
- Auth (register/login/logout/reset)
- Budget (Account-Manager + core pages)
- Investments (holdings + trade tracker basic saves)
- Watchlist (add/remove)

## Preconditions
1. Set `.env` feature flags for launch target.
2. Confirm DB and queues are healthy.
3. `php spark routes` completes without target errors.

## 1) Auth Flows
### Register
- Action: Submit valid registration form.
- Expected: account created or verification flow starts; no 500.

### Login
- Action: Login with valid credentials.
- Expected: redirect to user dashboard or intended page.

### Logout
- Action: click logout.
- Expected: session terminated; protected routes redirect to login.

### Reset Password
- Action: submit reset/forgot password form with valid email.
- Expected: success notification; invalid payload returns validation status (422/400) not 200.

## 2) Budget Flow Validation
### Account Manager (AJAX)
- Action: submit income, bills, credit, debt entries from Budget Account Manager.
- Expected: valid submissions persist; invalid payload returns 422/400 JSON; no 500.

### Core Budget Pages
- Action: visit `/Budget`, `/Budget/Overview`, and forecast page if enabled.
- Expected: pages render, no PHP warnings in output.

### Forecast Refresh
- Action: trigger forecast refresh endpoint/UI.
- Expected: refresh success response or explicit error payload with non-200 on validation failure.

## 3) Investments Flow Validation
### Add Holding
- Action: submit holding/investment form.
- Expected: row saved and shown on investments page.

### Remove Holding
- Action: delete a holding from list.
- Expected: row removed, view reloads without errors.

### Trade Tracker Save
- Action: submit trade tracker save payload.
- Expected: success for valid payload; 422/400 for invalid payload; no 500.

## 4) Watchlist Flow Validation
### Add Symbol
- Action: submit watchlist add form with missing required field.
- Expected: HTTP 422 JSON validation error.

- Action: submit valid watchlist add form.
- Expected: success JSON and row appears in watchlist.

### Remove Symbol
- Action: remove an existing symbol from watchlist endpoint/UI.
- Expected: success response, symbol no longer present.

## 5) Premium Teaser Button
### Insights Teaser
- Action: click “Insights” teaser button from user-facing page.
- Expected: no exception/500; either page render or graceful unavailable response.

## Failure Triage
### Database error logs
- Check table: `bf_error_logs`.
- Query examples:
  - `SELECT * FROM bf_error_logs ORDER BY id DESC LIMIT 100;`
  - `SELECT * FROM bf_error_logs WHERE log_level IN ('error','critical') ORDER BY id DESC LIMIT 100;`

### Support notifications
- Verify support pipeline output locations:
  - outbound support mailbox notifications
  - Discord alert channel integration (if enabled)

### HTTP semantics (validation)
- Validation failures should return:
  - `422 Unprocessable Entity` for field validation errors.
  - `400 Bad Request` for malformed payload/JSON.
- Validation failures should **not** return HTTP 200.
