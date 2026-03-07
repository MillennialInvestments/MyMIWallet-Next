# Controller Duplication Report

## Duplicate Group #1
**Duplicate method:** `DailyFinancialNews()`
**Controllers:**
- `app/Modules/Blog/Controllers/EarningsController.php`
- `app/Modules/Blog/Controllers/HowItWorksController.php`
**Recommendation:** Extract shared `DailyFinancialNews()` flow into `App\Services\EarningsService` and keep controllers as request/response adapters.

## Duplicate Group #2
**Duplicate method:** `DetermineYourFinancialGoals()`
**Controllers:**
- `app/Modules/Blog/Controllers/HowItWorks.php`
- `app/Modules/Blog/Controllers/HowItWorksController.php`
**Recommendation:** Extract shared `DetermineYourFinancialGoals()` flow into `App\Services\HowItWorksService` and keep controllers as request/response adapters.

## Duplicate Group #3
**Duplicate method:** `IntegratingWithPlaid()`
**Controllers:**
- `app/Modules/Blog/Controllers/NewsAndUpdates.php`
- `app/Modules/Blog/Controllers/UpdatesController.php`
**Recommendation:** Extract shared `IntegratingWithPlaid()` flow into `App\Services\NewsAndUpdatesService` and keep controllers as request/response adapters.

## Duplicate Group #4
**Duplicate method:** `InvestmentPortfolioManagement()`
**Controllers:**
- `app/Modules/Blog/Controllers/EarningsController.php`
- `app/Modules/Blog/Controllers/HowItWorksController.php`
**Recommendation:** Extract shared `InvestmentPortfolioManagement()` flow into `App\Services\EarningsService` and keep controllers as request/response adapters.

## Duplicate Group #5
**Duplicate method:** `MyMIGold()`
**Controllers:**
- `app/Modules/Advertise/Controllers/FeaturesController.php`
- `app/Modules/Blog/Controllers/EarningsController.php`
- `app/Modules/Blog/Controllers/HowItWorks.php`
- `app/Modules/Blog/Controllers/HowItWorksController.php`
**Recommendation:** Extract shared `MyMIGold()` flow into `App\Services\EarningsService` and keep controllers as request/response adapters.

## Duplicate Group #6
**Duplicate method:** `PersonalBudgeting()`
**Controllers:**
- `app/Modules/Blog/Controllers/EarningsController.php`
- `app/Modules/Blog/Controllers/HowItWorks.php`
- `app/Modules/Blog/Controllers/HowItWorksController.php`
**Recommendation:** Extract shared `PersonalBudgeting()` flow into `App\Services\EarningsService` and keep controllers as request/response adapters.

## Duplicate Group #7
**Duplicate method:** `PurchaseMyMIGold()`
**Controllers:**
- `app/Modules/Blog/Controllers/EarningsController.php`
- `app/Modules/Blog/Controllers/HowItWorks.php`
- `app/Modules/Blog/Controllers/HowItWorksController.php`
**Recommendation:** Extract shared `PurchaseMyMIGold()` flow into `App\Services\EarningsService` and keep controllers as request/response adapters.

## Duplicate Group #8
**Duplicate method:** `RegisteringAnAccount()`
**Controllers:**
- `app/Modules/Blog/Controllers/EarningsController.php`
- `app/Modules/Blog/Controllers/HowItWorksController.php`
**Recommendation:** Extract shared `RegisteringAnAccount()` flow into `App\Services\EarningsService` and keep controllers as request/response adapters.

## Duplicate Group #9
**Duplicate method:** `TheRoadmapToTheFutureOfFinance()`
**Controllers:**
- `app/Modules/Blog/Controllers/NewsAndUpdates.php`
- `app/Modules/Blog/Controllers/PersonalBudgetingController.php`
- `app/Modules/Blog/Controllers/UpdatesController.php`
**Recommendation:** Extract shared `TheRoadmapToTheFutureOfFinance()` flow into `App\Services\NewsAndUpdatesService` and keep controllers as request/response adapters.

## Duplicate Group #10
**Duplicate method:** `_remap()`
**Controllers:**
- `app/Modules/APIs/Controllers/AIAPIController.php`
- `app/Modules/APIs/Controllers/ManagementAPIController.php`
- `app/Modules/APIs/Controllers/MarketingAPIController.php`
**Recommendation:** Extract shared `_remap()` flow into `App\Services\AIService` and keep controllers as request/response adapters.

## Duplicate Group #11
**Duplicate method:** `accountManager()`
**Controllers:**
- `app/Modules/APIs/Controllers/DoorDashAPIController.php`
- `app/Modules/Management/Controllers/HowTosAdminController.php`
- `app/Modules/Management/Controllers/ManagementController.php`
- `app/Modules/User/Controllers/AccountController.php`
- `app/Modules/User/Controllers/BudgetController.php`
- `app/Modules/User/Controllers/InvestmentsController.php`
**Recommendation:** Extract shared `accountManager()` flow into `App\Services\AccountService` and keep controllers as request/response adapters.

## Duplicate Group #12
**Duplicate method:** `accountOverview()`
**Controllers:**
- `app/Modules/APIs/Controllers/DoorDashAPIController.php`
- `app/Modules/Management/Controllers/AdminController.php`
- `app/Modules/Management/Controllers/HowTosAdminController.php`
- `app/Modules/Management/Controllers/ManagementController.php`
- `app/Modules/User/Controllers/AccountController.php`
- `app/Modules/User/Controllers/BudgetController.php`
**Recommendation:** Extract shared `accountOverview()` flow into `App\Services\AccountService` and keep controllers as request/response adapters.

## Duplicate Group #13
**Duplicate method:** `account_manager()`
**Controllers:**
- `app/Modules/Blog/Controllers/BlogController.php`
- `app/Modules/Blog/Controllers/SubscribeController.php`
**Recommendation:** Extract shared `account_manager()` flow into `App\Services\BlogService` and keep controllers as request/response adapters.

## Duplicate Group #14
**Duplicate method:** `add()`
**Controllers:**
- `app/Modules/APIs/Controllers/DoorDashAPIController.php`
- `app/Modules/Management/Controllers/AdminController.php`
- `app/Modules/Management/Controllers/AlertsAdminController.php`
- `app/Modules/Management/Controllers/HowTosAdminController.php`
- `app/Modules/Management/Controllers/ManagementAdminController.php`
- `app/Modules/Management/Controllers/ManagementController.php`
- `app/Modules/Management/Controllers/MarketingAdminController.php`
- `app/Modules/Management/Controllers/ProjectsAdminController.php`
- `app/Modules/User/Controllers/AccountController.php`
- `app/Modules/User/Controllers/BudgetController.php`
- `app/Modules/User/Controllers/InvestmentsController.php`
- `app/Modules/User/Controllers/TradeTracker.php`
- `app/Modules/User/Controllers/WalletsController.php`
**Recommendation:** Extract shared `add()` flow into `App\Services\AccountService` and keep controllers as request/response adapters.

## Duplicate Group #15
**Duplicate method:** `addLiquidity()`
**Controllers:**
- `app/Modules/APIs/Controllers/PredictionsAPIController.php`
- `app/Modules/Predictions/Controllers/API/PredictionsApiController.php`
**Recommendation:** Extract shared `addLiquidity()` flow into `App\Services\PredictionsService` and keep controllers as request/response adapters.

## Duplicate Group #16
**Duplicate method:** `addTradeAlert()`
**Controllers:**
- `app/Modules/APIs/Controllers/AlertsAPIController.php`
- `app/Modules/Management/Controllers/AlertsAdminController.php`
**Recommendation:** Extract shared `addTradeAlert()` flow into `App\Services\AlertsService` and keep controllers as request/response adapters.

## Duplicate Group #17
**Duplicate method:** `apiGetTokens()`
**Controllers:**
- `app/Modules/APIs/Controllers/SolanaAPIController.php`
- `app/Modules/Exchange/Controllers/SolanaController.php`
**Recommendation:** Extract shared `apiGetTokens()` flow into `App\Services\SolanaService` and keep controllers as request/response adapters.

## Duplicate Group #18
**Duplicate method:** `applicationDetails()`
**Controllers:**
- `app/Modules/Management/Controllers/AssetsAdminController.php`
- `app/Modules/Management/Controllers/BudgetsAdminController.php`
**Recommendation:** Extract shared `applicationDetails()` flow into `App\Services\AssetsService` and keep controllers as request/response adapters.

## Duplicate Group #19
**Duplicate method:** `applications()`
**Controllers:**
- `app/Modules/Management/Controllers/AssetsAdminController.php`
- `app/Modules/Management/Controllers/BudgetsAdminController.php`
**Recommendation:** Extract shared `applications()` flow into `App\Services\AssetsService` and keep controllers as request/response adapters.

## Duplicate Group #20
**Duplicate method:** `approval()`
**Controllers:**
- `app/Modules/Management/Controllers/AssetsAdminController.php`
- `app/Modules/Management/Controllers/BudgetsAdminController.php`
**Recommendation:** Extract shared `approval()` flow into `App\Services\AssetsService` and keep controllers as request/response adapters.

## Duplicate Group #21
**Duplicate method:** `approveBufferItem()`
**Controllers:**
- `app/Modules/APIs/Controllers/MarketingAPIController.php`
- `app/Modules/Management/Controllers/MarketingAdminController.php`
**Recommendation:** Extract shared `approveBufferItem()` flow into `App\Services\MarketingService` and keep controllers as request/response adapters.

## Duplicate Group #22
**Duplicate method:** `approveProject()`
**Controllers:**
- `app/Modules/Management/Controllers/ManagementAdminController.php`
- `app/Modules/Management/Controllers/ProjectsAdminController.php`
**Recommendation:** Extract shared `approveProject()` flow into `App\Services\ManagementService` and keep controllers as request/response adapters.

## Duplicate Group #23
**Duplicate method:** `approveRecurringSchedule()`
**Controllers:**
- `app/Modules/APIs/Controllers/DoorDashAPIController.php`
- `app/Modules/Management/Controllers/HowTosAdminController.php`
- `app/Modules/Management/Controllers/ManagementController.php`
- `app/Modules/User/Controllers/AccountController.php`
- `app/Modules/User/Controllers/BudgetController.php`
**Recommendation:** Extract shared `approveRecurringSchedule()` flow into `App\Services\AccountService` and keep controllers as request/response adapters.

## Duplicate Group #24
**Duplicate method:** `assets()`
**Controllers:**
- `app/Modules/Exchange/Controllers/SolanaController.php`
- `app/Modules/Management/Controllers/ExchangeAdminController.php`
- `app/Modules/Management/Controllers/UsersAdminController.php`
- `app/Modules/User/Controllers/KnowledgebaseController.php`
**Recommendation:** Extract shared `assets()` flow into `App\Services\ExchangeService` and keep controllers as request/response adapters.

## Duplicate Group #25
**Duplicate method:** `basicUI()`
**Controllers:**
- `app/Modules/Management/Controllers/SupportAdminController.php`
- `app/Modules/Management/Controllers/WebDesignAdminController.php`
**Recommendation:** Extract shared `basicUI()` flow into `App\Services\SupportService` and keep controllers as request/response adapters.

## High-Confidence Overlap: AI Ops Controllers
- `AIOpsAPIController` and `AiOpsAPIController` both manage AI Ops policy/feature toggles and internal endpoint authorization.
- Shared security gate logic should be centralized in one service and consumed by both controllers.
- Consolidation action in this patch: introduced `InternalEndpointGuardService` and routed both controllers through the same guard method.