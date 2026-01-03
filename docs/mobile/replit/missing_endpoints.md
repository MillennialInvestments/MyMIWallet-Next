# Missing Endpoints for Mobile MVP

The current CI4 API lacks token-based auth and watchlist/alerts CRUD required by the mobile app. Implement these before launching to users.

## Summary of gaps
- **Auth:** No `/API/Auth/login|register|refresh|logout` issuing bearer tokens. Budget endpoints rely on session cookies.
- **User profile:** No `/API/User/me` returning basic profile data.
- **Watchlist CRUD:** No endpoints to list/add/remove watchlist symbols per user.
- **Alerts feed:** No user-specific alerts/notifications feed (only email ingestion + news by ticker).

## Proposed stubs
Controller/route stubs live in `docs/mobile/replit/patches/mobile_endpoints.php.md` and cover:
1. `/API/Auth/login` — email/password → `{ accessToken, refreshToken, expiresIn }`.
2. `/API/Auth/register` — creates user, returns token pair.
3. `/API/Auth/refresh` — refresh token → new access token.
4. `/API/Auth/logout` — revokes refresh token.
5. `/API/User/me` — returns `{ id, email, name }` for the bearer token.
6. `/API/Watchlist` group — `GET list`, `POST add`, `DELETE remove/{symbol}` per user.
7. `/API/Alerts/feed` — returns recent alerts/news items for the authenticated user.

Use existing libraries/models where possible (`MyMIUser`, `MyMIAlerts`, `MyMIInvestments`). Avoid inventing business logic beyond wrapping current services.
