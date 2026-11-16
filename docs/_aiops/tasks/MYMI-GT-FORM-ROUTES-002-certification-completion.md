# MYMI-GT-FORM-ROUTES-002: Form Certification Completion & Baseline Ratchet

Follows `MYMI-GT-FORM-ROUTES-001` (PR #713).

## Metrics & Inventory Delta

| Metric | PR #713 Baseline (c5bb395 / ab00d8a) | Current Completion Run |
|---|---|---|
| PASS | 253 | **293** (+40) |
| FAIL | 62 | **22** (-40) |
| BLOCKED | 182 | 182 |
| SKIPPED | 32 | 32 |
| Files scanned | 278 | 278 |
| Forms | 262 | 262 |
| JS requests | 267 | 267 |
| Gap baseline lines | 62 | **22** |

## Fixed Items Breakdown

### 1. Case Mismatches (10 items -> 0 remaining)
- `/investments/strategies` (GET, POST, PUT, DELETE) in `strategizer.php`: Added lowercase route aliases and implemented CRUD methods (`getStrategies`, `createStrategy`, `getStrategy`, `updateStrategy`, `deleteStrategy`) in `InvestmentsController`.
- `/investments/goals` (GET, POST, PUT, DELETE) in `strategizer.php`: Added lowercase route aliases and implemented CRUD methods (`getGoals`, `createGoal`, `getGoal`, `updateGoal`, `deleteGoal`) in `InvestmentsController`.
- `/dashboard/completeOnboardingStep/{php}` in `onboarding.php`: Added route alias for lowercase `dashboard/completeOnboardingStep/(:segment)` pointing to `DashboardController::completeOnboardingStep/$1`.

### 2. HTTP Verb Mismatches (4 items -> 0 remaining)
- `POST /Subscribe/Submit` in `content_banner.php`: Expanded `SubscribeController::submit` route from GET to `['GET', 'POST']` and ensured leading slash in view `fetch()`.
- `POST /Management/Marketing/submitDailyLog` in `standaloneDailyLogForm.php` (form + JS): Expanded `MarketingAdminController::submitDailyLog` route from GET to `['GET', 'POST']`.
- `POST /Support/Response` in `Knowledgebase/Response.php`: Added POST route alias in `Support` group routing to `SupportController::submitRequest`.

### 3. Placeholder Stubs (3 items -> 0 remaining)
- `/path/to/your/api/endpoint` in `Asset_Watchlist.php`: Replaced placeholder stub with live `/API/Investments/GetUserWatchlist/0` endpoint.
- `/add_new_wallet` in `Investments/Add/form.php` and `user_fields-new.php`: Implemented `addNewWallet()` in `WalletsController` and mapped `POST /add_new_wallet`.
- `/YourController/setUserTimezone` in `custom-jsb.php`: Normalized to leading slash and registered session timezone offset route.

### 4. Admin & User Mutation Endpoints
- `/add-to-watchlist` & `/remove-from-watchlist` in `watchlist.php`: Implemented `addToWatchlist()` and `removeFromWatchlist()` on `InvestmentsController`, added login-guarded routes.
- `/earnings/update` in `update_earnings_form.php`: Mapped route to `EarningsController::update`.
- `/Management/Wallets/NotifyUser` in `Reconcile_Report.php`: Mapped route to existing `WalletsAdminController::notifyUser`.
- `/email-queue/store` & `/email-queue/processQueue`: Mapped routes to `EmailQueueAdminController`.
- `/email-templates/store`: Mapped route to `EmailTemplateAdminController`.
- `/newsletter/store`: Implemented `store()` on `NewsletterController` with `role:admin,team` filter.
- `/marketing/sendNotification`, `/marketing/postToFacebook`, `/marketing/postToGroup`: Added handler methods in `MarketingAdminController` and mapped routes under `marketing/`.
- `/API/Alerts/sendDiscordAlertsBySymbol`: Added payload fallback for `$symbol` and allowed admin/session callers without token error.
- `/API/Email/fetchTagAnalytics`: Registered route in `API/Email` group pointing to `EmailAPIController::fetchTagAnalytics`.
- `/API/Management/getGeneratedPostsPaginated`, `/API/Management/sharePost/(:num)/(:segment)`, `/API/Management/fetchBufferPaginated`: Registered session-authenticated routes under `role:admin,team` to prevent `token_only_route` rejections from browser UI.
- `/Projects/Commit`, `/Projects/Create`, `/Projects/reportRevenue`: Registered routes in `ProjectsController` with feature and login guards, implemented `reportRevenue()`.

## Remaining Gaps (22 unreferenced legacy views)
The remaining 22 gap entries in `tests/baseline/form-action-gaps.txt` consist entirely of unreferenced legacy Bonfire/CI3 views:
1. `app/Modules/Management/Views/Marketing/Blog/Subscribe.php` (1)
2. `app/Modules/Management/Views/Web_Design/Content_Creator/...` (9)
3. `app/Modules/User/Views/Wallets/...` (12 legacy CI3 views e.g. `Add_Fiat_Wallet`, `Deposit_Funds`, `Withdraw_Funds`)
None of these views are linked or rendered by any CI4 controller or route.
