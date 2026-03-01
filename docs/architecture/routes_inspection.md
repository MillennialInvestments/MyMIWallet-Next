# Route Inspection Report

- generated_at_utc: `2026-03-01T22:03:29+00:00`
- phase_filter: `PhaseA`
- errors_only: `0`
- duplicates_only: `0`
- total_routes: 18

| Method | URI | Handler | Exists | Method Exists | Duplicate | Source |
|---|---|---|---|---|---|---|
| GET | /Login | `AuthController::login` | YES | YES | NO | app/Config/Routes/Auth.php |
| POST | /Login | `AuthController::attemptLogin` | YES | YES | NO | app/Config/Routes/Auth.php |
| GET | /Register | `AuthController::register` | YES | YES | NO | app/Config/Routes/Auth.php |
| POST | /Register | `AuthController::attemptRegister` | YES | YES | NO | app/Config/Routes/Auth.php |
| GET | /Logout | `AuthController::logout` | YES | YES | NO | app/Config/Routes/Auth.php |
| GET | /Forgot-Password | `AuthController::forgotPassword` | YES | YES | NO | app/Config/Routes/Auth.php |
| POST | /Forgot-Password | `AuthController::attemptForgot` | YES | YES | NO | app/Config/Routes/Auth.php |
| GET | /Reset-Password | `AuthController::resetPassword` | YES | YES | NO | app/Config/Routes/Auth.php |
| POST | /Reset-Password | `AuthController::attemptReset` | YES | YES | NO | app/Config/Routes/Auth.php |
| GET | /Privacy-Policy | `Home::privacyPolicy` | YES | YES | NO | app/Config/Routes/Legal.php |
| GET | /Terms-Of-Service | `Home::termsOfService` | YES | YES | NO | app/Config/Routes/Legal.php |
| GET | / | `Home::index` | YES | YES | NO | app/Config/Routes/PhaseA.php |
| GET | /Home | `Home::index` | YES | YES | NO | app/Config/Routes/PhaseA.php |
| GET | /Dashboard | `\\App\\Modules\\User\\Controllers\\DashboardController::index` | YES | YES | NO | app/Config/Routes/PhaseA.php |
| GET | /Budget | `\\App\\Modules\\User\\Controllers\\BudgetController::index` | YES | YES | NO | app/Config/Routes/PhaseA.php |
| GET | /Portfolio/Manual | `\\App\\Modules\\User\\Controllers\\InvestmentsController::tradeTracker` | YES | YES | NO | app/Config/Routes/PhaseA.php |
| GET | /Watchlist | `\\App\\Modules\\User\\Controllers\\InvestmentsController::index` | YES | YES | NO | app/Config/Routes/PhaseA.php |
| GET | /Insights | `\\App\\Modules\\User\\Controllers\\BudgetController::insights` | YES | YES | NO | app/Config/Routes/PhaseA.php |
