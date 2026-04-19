# Mobile Overlap App (Expo + CI4 API)

## Discovery Mapping (phase 1)
- Existing API surface discovered under `app/Config/Routes.php` and `app/Modules/APIs/Controllers/*`.
- Existing reusable business logic identified in:
  - `App\Services\BudgetService`
  - `App\Models\InvestmentModel`
  - `App\Models\AlertsModel`
- Existing auth is Myth/Auth-based web auth (`AuthController`) with no dedicated mobile bearer token flow.

## Mobile-first endpoints introduced
- `POST /API/mobile/auth/login`
- `POST /API/mobile/auth/register`
- `POST /API/mobile/auth/logout`
- `GET /API/mobile/me`
- `GET /API/mobile/dashboard`
- `GET /API/mobile/budget`
- `GET /API/mobile/investments`
- `GET /API/mobile/alerts`

All responses use:
```json
{
  "status": "success | error",
  "message": "string",
  "data": {}
}
```

## Screen to endpoint map
| Screen | Native status | Endpoint | Fallback route |
|---|---|---|---|
| Splash/bootstrap | Native | n/a | n/a |
| Login | Native | `POST /API/mobile/auth/login` | `/login` |
| Register | Native | `POST /API/mobile/auth/register` | `/register` |
| Forgot password | Native shell | (web flow currently) | `/forgot-password` |
| Dashboard | Native | `GET /API/mobile/dashboard` | `/Dashboard` |
| Budget | Native | `GET /API/mobile/budget` | `/Budget` |
| Investments watchlist | Native | `GET /API/mobile/investments` | `/Investments` |
| Trade alerts | Native | `GET /API/mobile/alerts` | `/Alerts` |
| Account/settings | Native | `GET /API/mobile/me` | `/Account/Settings` |
| Support/help | Native shell + WebView | n/a | `/Support` |

## Auth flow
1. App calls login/register endpoint.
2. Backend issues bearer token and stores only hash in `bf_mobile_auth_tokens`.
3. App stores raw token in Expo Secure Store.
4. `apiToken` filter validates bearer token and hydrates mobile auth context.
5. Protected mobile endpoints read user ID from auth context.
6. Logout revokes token.

## Local development
- Backend: run CI4 as usual.
- Mobile:
  - `cd mobile`
  - `cp .env.example .env`
  - `npm install`
  - `npm run start`

## Known limitations
- Forgot password remains web-backed for phase 1.
- WebView session bridging currently uses shared cookies + optional JS marker; full SSO handoff token can be added in phase 2.
- Mobile endpoint throttling currently uses existing `throttle` filter alias with route argument.

## Next conversion targets
1. Native transaction drilldown and account linking flows.
2. Native alert details, filtering, and push-notification subscriptions.
3. Mobile-specific refresh token endpoint and rotation policy.
4. Unified error telemetry from app to CI4 observability APIs.
