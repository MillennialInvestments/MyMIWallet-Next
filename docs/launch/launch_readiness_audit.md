# Launch Readiness Audit (Phase A)

## run_meta
- timestamp_utc: `2026-03-02T00:43:31+00:00`
- git_commit: `8811eb33e`
- env: `development`
- command: `php spark gtm:launch:audit`

## route scan summary
- total routes discovered: 1037
- Phase A routes included: 29
- Excluded routes: 1008

### Included user-facing routes (Phase A)
- `GET /login` => `AuthController::login`
- `POST /login` => `AuthController::attemptLogin`
- `GET /logout` => `AuthController::logout`
- `POST /logout` => `AuthController::logout`
- `GET /register` => `AuthController::register`
- `POST /register` => `AuthController::attemptRegister`
- `GET /register/success` => `AuthController::registerSuccess`
- `POST /register/resend-activation` => `AuthController::resendRegistrationActivation`
- `GET /register/(:segment)` => `AuthController::register/$1`
- `GET /(:any)/register` => `AuthController::register`
- `GET /(:any)/register/(:segment)` => `AuthController::register/$2`
- `POST /(:any)/register` => `AuthController::attemptRegister`
- `POST /(:any)/register/(:segment)` => `AuthController::attemptRegister`
- `GET /forgot-password` => `AuthController::forgotPassword`
- `GET /reset-password` => `AuthController::resetPassword`
- `POST /forgot` => `AuthController::attemptForgot`
- `POST /reset-password` => `AuthController::attemptReset`
- `GET /Investments/getForecastDetails/(:segment)` => `InvestmentsAPIController::getForecastDetails/$1`
- `GET /Investments/getConfidenceHeatmap` => `InvestmentsAPIController::getConfidenceHeatmap`
- `GET /Investments/getTopConfidenceBySector` => `InvestmentsAPIController::getTopConfidenceBySector`
- `GET /Investments/getConfidenceDistribution` => `InvestmentsAPIController::getConfidenceDistribution`
- `GET /Investments/getForecastAccuracySummary` => `InvestmentsAPIController::getForecastAccuracySummary`
- `POST /ResetUser` => `ChatUsageController::resetUser`
- `GET /budgets` => `BudgetController::budgets`
- `GET /budgets` => `BudgetAPIController::budgets`
- `POST /Investments/Update/(:num)` => `WalletsAPIController::updateInvestment/$1`
- `POST /onboarding/budget-income` => `OnboardingWalkthroughController::saveBudgetIncome`
- `POST /onboarding/watchlist` => `OnboardingWalkthroughController::saveWatchlist`
- `GET /budgeting` => `HowItWorksController::budgeting`

### Excluded route samples
- `GET /` => `Home::index`
- `GET /healthz` => `System\HealthController::healthz`
- `GET /test/crash` => `Test::crash`
- `GET /ops/health` => `OpsController::health`
- `GET /Maintenance` => `MaintenanceController::index`
- `GET /API/Ops/health-score` => `OpsHealth::score`
- `GET /API/Ops/filesystem-status` => `Api\OpsFilesystemStatusController::index`
- `GET /API/docs` => `Api\SwaggerDocsController::index`
- `GET /health` => `OpsHealth::index`
- `POST /health/run` => `OpsHealth::run`
- `GET /index` => `DocsController::index`
- `GET /view` => `DocsController::view`
- `GET /Stock/(:segment)/(:segment)` => `StockController::show/$1/$2`
- `GET /blog` => `Blog::index`
- `GET /blog/category/(:segment)` => `Blog::category/$1`
- `GET /blog/(:segment)` => `Blog::post/$1`
- `GET /sw.js` => `ServiceWorker::index`
- `GET /Apex/Referral` => `Home::apexReferral`
- `GET /Apex/Referral/(:segment)` => `Home::apexReferral/$1`
- `GET /Corporate-Earnings` => `Home::corporateEarnings`
- `GET /Corporate-Earnings/(:segment)` => `Home::corporateEarnings/$1`
- `GET /Economic-Calendar` => `Home::economicCalendar`
- `GET /Economic-Calendar/(:segment)` => `Home::economicCalendarContent/$1`
- `GET /Getting-Started/(:segment)/(:segment)` => `Home::gettingStarted`
- `GET /Getting-Started/(:segment)` => `Home::gettingStarted`
- `GET /Getting-Started` => `Home::gettingStarted`
- `GET /Memberships` => `Home::memberships`
- `GET /Memberships/(:segment)` => `Home::memberships`
- `GET /Learn/(:segment)` => `App\Modules\Public\Controllers\PublicPagesController::show/$1`
- `GET /Alerts/Preview/(:segment)` => `AlertsController::preview/$1`
- `GET /Preview/Alert/(:segment)` => `AlertsController::preview/$1`
- `GET /Privacy-Policy` => `Home::privacyPolicy`
- `GET /Legal/Privacy-Policy` => `Home::privacyPolicy`
- `GET /Legal/Terms-And-Conditions` => `Home::terms`
- `GET /Customer-Support` => `App\Modules\Support\Controllers\SupportController::index`
- `GET /Profile` => `App\Modules\User\Controllers\DashboardController::profile`
- `POST /auth/resend-activation` => `AuthController::resendActivationCode`
- `GET /Sector/(:segment)` => `Home::sector/$1`
- `GET /Terms-Of-Service` => `Home::termsOfService`
- `GET /resend-activation` => `AuthController::resendActivation`

## route->controller integrity scan
- scanned: 1037
- missing targets: 0
- no missing controller/method targets found in parsed routes.

## feature toggles state summary
- FEATURE_BUDGET: `enabled`
- FEATURE_INVESTMENTS: `enabled`
- FEATURE_WATCHLIST: `enabled`
- FEATURE_TRADE_ALERTS: `disabled`
- FEATURE_WALLETS: `disabled`
- FEATURE_PREDICTIONS: `disabled`
- FEATURE_MARKETING_AUTOMATION: `disabled`

## ExternalApiPolicy caps summary
- alphavantage: `120`
- marketaux: `120`
- plaid: `80`
- robinhood: `80`
- discord: `200`
- llm: `100`
- enableBackoff: `true`
- microSleepBackoffUs: `50000`

## logger handler summary
- `CodeIgniter\Log\Handlers\FileHandler` handles `debug,info,notice,warning,error,critical,alert,emergency`
- `App\Log\Handlers\MyMIDBLoggerHandler` handles `warning,error,critical,alert,emergency`
- `App\Log\Handlers\DatabaseLoggerHandler` handles ``
- `App\Log\Handlers\UnifiedLoggerHandler` handles ``

## CRON command existence check
- gtm:health:snapshot: `present`
- gtm:cron:validate-security: `present`
- gtm:launch:audit: `present`
- gtm:launch:smoke: `present`

## blockers list
- none

## decision
- **PASS**
