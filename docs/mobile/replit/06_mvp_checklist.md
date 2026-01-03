# MVP Acceptance Checklist (Mobile)

Use this as a QA runbook for the first mobile milestone.

## Environment
- [ ] `EXPO_PUBLIC_MYMI_API_BASE_URL` set to dev/stage host.
- [ ] CORS allows Replit domain + Authorization header.
- [ ] Health endpoint reachable from mobile (`/API/Health`).

## Auth
- [ ] Login with valid credentials returns access + refresh tokens.
- [ ] Invalid credentials show inline error (no crash).
- [ ] Logout clears tokens and redirects to Login.
- [ ] Session expiry triggers refresh flow once, then re-login if it fails.

## Dashboard
- [ ] Budget summary card loads (shows loading state, then data or empty state).
- [ ] Available cash/credit cards render numbers formatted via SDK formatters.
- [ ] Error banner appears on network failure with retry button.

## Budget Overview
- [ ] Summary range selector (`from`/`to`) updates data.
- [ ] Credit breakdown list populates.
- [ ] Repayment strategy toggle (avalanche/snowball) updates schedule.
- [ ] Empty state shown when no data.

## Watchlist
- [ ] Search tickers debounces and shows results from `/API/Investments/searchTickers`.
- [ ] Add/remove watchlist item calls planned endpoints (stubbed) and updates list locally.
- [ ] Error toast on failed add/remove.

## Alerts Feed
- [ ] Fetch news for a symbol renders list with timestamps.
- [ ] Date filter updates client-side list.
- [ ] Error state + retry shown when API unavailable.

## Marketing Summaries
- [ ] Latest summaries load from `/API/Marketing/fetchGeneratedSummariesJson`.
- [ ] Detail modal shows summary + CTA link.
- [ ] Loading and empty states visible.

## Settings/Profile
- [ ] Profile shell shows email/name from `/API/User/me` (stub until implemented).
- [ ] Logout works.
- [ ] API Health check shows status `ok` and DB status.

## Regression/Technical
- [ ] No API calls fire without a token on protected routes.
- [ ] Network errors include `requestId` for support.
- [ ] Lint/typecheck pass (`npm run typecheck --workspace mobile`).
