# Core Flow Smoke Tests

## Register
- Route: `GET/POST /register` via `AuthController::register` and `AuthController::attemptRegister`.
- View: `app/Views/Auth/register_form.php`.
- Expected: validation errors render in-page; success redirects to register success/activation flow.

## Login
- Route: `GET/POST /login` via `AuthController::login` and `AuthController::attemptLogin`.
- View: `app/Views/Auth/login_form.php`.
- Expected: invalid credentials return user-safe message; success redirects dashboard.

## Budget add income/bill/account
- Routes: `/Budget/Add*`, `/Wallets/*Account*`, `/Budget/Account-Manager`.
- Controllers: `BudgetController::add`, `BudgetController::accountManager`, `WalletsController::*Account*`.
- Views: `app/Modules/User/Views/Budget/*`, `app/Modules/User/Views/Wallets/*`.

## Budget overview dashboards
- Routes: `/Budget`, `/Budget/Account-Overview`, supporting `/API/Budget/*` fetch endpoints.
- Expected fetch shape: `status` + payload key (`data` or `message`) and non-fatal UI handling.

## Watchlist search/add/remove
- Page route: `/Investments/Watchlist` (`InvestmentsController::watchlist`).
- APIs: watchlist and alerts endpoints under `/API/Investments/*` and `/API/Alerts/*`.

## Premium teaser Insights button
- Route: `/Budget/Insights` (`BudgetController::insights`).
- Requirement: no 500; may upsell modal safely.

## Result
- Static audit indicates controller/view wiring exists for all required GTM flows.
- Runtime smoke still required in staging for final GO.
