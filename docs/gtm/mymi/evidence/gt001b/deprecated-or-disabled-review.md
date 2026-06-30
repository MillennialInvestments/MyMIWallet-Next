# DEPRECATED_OR_DISABLED Review Routes

- Total routes: 44

| Method | Route | Handler | Class | Status | Recommended GT-001C Action |
|---|---|---|---|---|---|
| GET | `Dev/BitcoinTest` | `\App\Controllers\App\Controllers\Dev\BitcoinTest::index` | DEPRECATED_OR_DISABLED | REVIEW_REQUIRED | owner_review_before_launch |
| GET | `Debug/whoami` | `\App\Controllers\Debug::whoami` | DEPRECATED_OR_DISABLED | REVIEW_REQUIRED | owner_review_before_launch |
| GET | `Debug/auth-audit-cache` | `\App\Controllers\Debug::authAuditCacheSelfTest` | DEPRECATED_OR_DISABLED | REVIEW_REQUIRED | owner_review_before_launch |
| GET | `debug/common-data/smoke` | `\App\Controllers\Debug\CommonDataController::smoke` | DEPRECATED_OR_DISABLED | REVIEW_REQUIRED | owner_review_before_launch |
| GET | `debug/register-success-probe` | `\App\Controllers\AuthController::registerSuccessProbe` | DEPRECATED_OR_DISABLED | REVIEW_REQUIRED | owner_review_before_launch |
| GET | `API/Management/error-heatmap` | `\App\Controllers\SystemDebugController::errorHeatmap` | DEPRECATED_OR_DISABLED | REVIEW_REQUIRED | owner_review_before_launch |
| GET | `Management/System-Debug` | `\App\Controllers\SystemDebugController::index` | DEPRECATED_OR_DISABLED | REVIEW_REQUIRED | owner_review_before_launch |
| GET | `test-create-user` | `\App\Controllers\AuthController::createTempUser` | DEPRECATED_OR_DISABLED | REVIEW_REQUIRED | owner_review_before_launch |
| GET | `API/Management/debugLogs` | `\App\Modules\APIs\Controllers\ManagementAPIController::debugLogs` | DEPRECATED_OR_DISABLED | REVIEW_REQUIRED | owner_review_before_launch |
| GET | `API/SMTP/test` | `\App\Modules\APIs\Controllers\SmtpTestController::probe` | DEPRECATED_OR_DISABLED | REVIEW_REQUIRED | owner_review_before_launch |
| GET | `API/Wallets/Plaid/Config-Debug` | `\App\Modules\APIs\Controllers\WalletsAPIController::plaidConfigDebug` | DEPRECATED_OR_DISABLED | REVIEW_REQUIRED | owner_review_before_launch |
| GET | `index.php/(.*)` | `$1` | DEPRECATED_OR_DISABLED | REVIEW_REQUIRED | owner_review_before_launch |
| GET | `index.php/images/(.*)` | `images/$1` | DEPRECATED_OR_DISABLED | REVIEW_REQUIRED | owner_review_before_launch |
| GET | `News` | `Blog/News-And-Updates` | DEPRECATED_OR_DISABLED | REVIEW_REQUIRED | owner_review_before_launch |
| GET | `How-To-Guides` | `Knowledgebase/Tutorials` | DEPRECATED_OR_DISABLED | REVIEW_REQUIRED | owner_review_before_launch |
| POST | `debug` | `(Closure)` | DEPRECATED_OR_DISABLED | REVIEW_REQUIRED | owner_review_before_launch |
| POST | `index.php/(.*)` | `$1` | DEPRECATED_OR_DISABLED | REVIEW_REQUIRED | owner_review_before_launch |
| POST | `index.php/images/(.*)` | `images/$1` | DEPRECATED_OR_DISABLED | REVIEW_REQUIRED | owner_review_before_launch |
| POST | `News` | `Blog/News-And-Updates` | DEPRECATED_OR_DISABLED | REVIEW_REQUIRED | owner_review_before_launch |
| POST | `How-To-Guides` | `Knowledgebase/Tutorials` | DEPRECATED_OR_DISABLED | REVIEW_REQUIRED | owner_review_before_launch |
| PATCH | `index.php/(.*)` | `$1` | DEPRECATED_OR_DISABLED | REVIEW_REQUIRED | owner_review_before_launch |
| PATCH | `index.php/images/(.*)` | `images/$1` | DEPRECATED_OR_DISABLED | REVIEW_REQUIRED | owner_review_before_launch |
| PATCH | `News` | `Blog/News-And-Updates` | DEPRECATED_OR_DISABLED | REVIEW_REQUIRED | owner_review_before_launch |
| PATCH | `How-To-Guides` | `Knowledgebase/Tutorials` | DEPRECATED_OR_DISABLED | REVIEW_REQUIRED | owner_review_before_launch |
| PUT | `index.php/(.*)` | `$1` | DEPRECATED_OR_DISABLED | REVIEW_REQUIRED | owner_review_before_launch |
| PUT | `index.php/images/(.*)` | `images/$1` | DEPRECATED_OR_DISABLED | REVIEW_REQUIRED | owner_review_before_launch |
| PUT | `News` | `Blog/News-And-Updates` | DEPRECATED_OR_DISABLED | REVIEW_REQUIRED | owner_review_before_launch |
| PUT | `How-To-Guides` | `Knowledgebase/Tutorials` | DEPRECATED_OR_DISABLED | REVIEW_REQUIRED | owner_review_before_launch |
| DELETE | `index.php/(.*)` | `$1` | DEPRECATED_OR_DISABLED | REVIEW_REQUIRED | owner_review_before_launch |
| DELETE | `index.php/images/(.*)` | `images/$1` | DEPRECATED_OR_DISABLED | REVIEW_REQUIRED | owner_review_before_launch |
| DELETE | `News` | `Blog/News-And-Updates` | DEPRECATED_OR_DISABLED | REVIEW_REQUIRED | owner_review_before_launch |
| DELETE | `How-To-Guides` | `Knowledgebase/Tutorials` | DEPRECATED_OR_DISABLED | REVIEW_REQUIRED | owner_review_before_launch |
| OPTIONS | `index.php/(.*)` | `$1` | DEPRECATED_OR_DISABLED | REVIEW_REQUIRED | owner_review_before_launch |
| OPTIONS | `index.php/images/(.*)` | `images/$1` | DEPRECATED_OR_DISABLED | REVIEW_REQUIRED | owner_review_before_launch |
| OPTIONS | `News` | `Blog/News-And-Updates` | DEPRECATED_OR_DISABLED | REVIEW_REQUIRED | owner_review_before_launch |
| OPTIONS | `How-To-Guides` | `Knowledgebase/Tutorials` | DEPRECATED_OR_DISABLED | REVIEW_REQUIRED | owner_review_before_launch |
| TRACE | `index.php/(.*)` | `$1` | DEPRECATED_OR_DISABLED | REVIEW_REQUIRED | owner_review_before_launch |
| TRACE | `index.php/images/(.*)` | `images/$1` | DEPRECATED_OR_DISABLED | REVIEW_REQUIRED | owner_review_before_launch |
| TRACE | `News` | `Blog/News-And-Updates` | DEPRECATED_OR_DISABLED | REVIEW_REQUIRED | owner_review_before_launch |
| TRACE | `How-To-Guides` | `Knowledgebase/Tutorials` | DEPRECATED_OR_DISABLED | REVIEW_REQUIRED | owner_review_before_launch |
| CONNECT | `index.php/(.*)` | `$1` | DEPRECATED_OR_DISABLED | REVIEW_REQUIRED | owner_review_before_launch |
| CONNECT | `index.php/images/(.*)` | `images/$1` | DEPRECATED_OR_DISABLED | REVIEW_REQUIRED | owner_review_before_launch |
| CONNECT | `News` | `Blog/News-And-Updates` | DEPRECATED_OR_DISABLED | REVIEW_REQUIRED | owner_review_before_launch |
| CONNECT | `How-To-Guides` | `Knowledgebase/Tutorials` | DEPRECATED_OR_DISABLED | REVIEW_REQUIRED | owner_review_before_launch |
