# New Errors Today

# Error Summary

## Executive Summary
- Date: 2026-03-31
- Total errors found today: 106
- Total new errors today: 106

## New Errors Today
- [ci4] [Error]
- [ci4] 1 SYSTEMPATH/CodeIgniter.php(1001): CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(null)
- [ci4] 2 SYSTEMPATH/CodeIgniter.php(346): CodeIgniter\CodeIgniter->display404errors(Object(CodeIgniter\Exceptions\PageNotFoundException))
- [ci4] 5 FCPATH/index.php(114): CodeIgniter\Boot::bootWeb(Object(Config\Paths)) error=Database connection unavailable
- [ci4] 7 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths)) error=Database connection unavailable
- [ci4] 14 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths)) error=Database connection unavailable
- [ci4] 1 SYSTEMPATH/Filters/Filters.php(590): CodeIgniter\Filters\Exceptions\FilterException::forNoAlias('none')
- [ci4] 10 ROOTPATH/spark(99): CodeIgniter\Boot::bootSpark(Object(Config\Paths)) error=Database connection unavailable
- [ci4] {"timestamp":"+00:00","message":"BOOT FAILURE: The action you requested is not allowed.","context":{"trace":"#0 /home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/Security/Security.php(263): CodeIgniter\\Security\\Exceptions\\SecurityException::forDisallowedAction()\n#1 /hom
- [ci4] LEVEL: ERROR (NEW)
- [ci4] ERROR --> [ERROR_PAGE] event=error_404 status=404 message=Page not found.
- [ci4] LEVEL: ERROR
- [ci4] ERROR --> Registration failed: {"username":"The username field is not in the correct format.","email":"The email field must contain a unique value."}
- [ci4] LEVEL: CRITICAL
- [ci4] CRITICAL --> CodeIgniter\Exceptions\PageNotFoundException: Page Not Found
- [ci4] CRITICAL --> [EXCEPTION] Page Not Found File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/CodeIgniter.php Line=1001
- [ci4] CRITICAL --> Error: Class "App\Modules\APIs\Controllers\MditBaseController" not found
- [ci4] CRITICAL --> [EXCEPTION] Class "App\Modules\APIs\Controllers\MditBaseController" not found File=/home/mymiteam/mymiwallet/site/current/app/Modules/APIs/Controllers/MditInvestorAPIController.php Line=12
- [ci4] CRITICAL --> [EXCEPTION] Class "App\Modules\APIs\Controllers\MditBaseController" not found File=/home/mymiteam/mymiwallet/site/current/app/Modules/APIs/Controllers/MditInvestorAPIController.php Line=13
- [ci4] CRITICAL --> [EXCEPTION] Class "App\Modules\APIs\Controllers\MditBaseController" not found File=/home/mymiteam/mymiwallet/site/current/app/Modules/APIs/Controllers/MditAdminAPIController.php Line=13
- [ci4] CRITICAL --> CodeIgniter\Router\Exceptions\RouterException: The namespace delimiter is a backslash (\), not a slash (/). Route handler: "\App\Modules\APIs\Controllers\EmailAPIController:cloneCampaign/$1"
- [ci4] CRITICAL --> [EXCEPTION] The namespace delimiter is a backslash (\), not a slash (/). Route handler: "\App\Modules\APIs\Controllers\EmailAPIController:cloneCampaign/$1" File=/home/mymiteam/mymiwallet/site/current/vendor/codeigniter4/framework/system/Router/Router.php Line=523
- [ci4] CRITICAL --> ErrorException: Type of App\Modules\Management\Controllers\DevelopmentAdminController::$helpers must not be defined (as in class App\Controllers\BaseController)
- [ci4] CRITICAL --> [EXCEPTION] Type of App\Modules\Management\Controllers\DevelopmentAdminController::$helpers must not be defined (as in class App\Controllers\BaseController) File=/home/mymiteam/mymiwallet/site/current/app/Modules/Management/Controllers/DevelopmentAdminController.php Line=8
- [ci4] CRITICAL --> ErrorException: Type of App\Modules\Management\Controllers\DiscordAdminController::$walletService must be ?App\Services\WalletService (as in class App\Controllers\UserController)
- [ci4] CRITICAL --> [EXCEPTION] Type of App\Modules\Management\Controllers\DiscordAdminController::$walletService must be ?App\Services\WalletService (as in class App\Controllers\UserController) File=/home/mymiteam/mymiwallet/site/current/app/Modules/Management/Controllers/DiscordAdminController.php Line=2
- [ci4] CRITICAL --> ErrorException: Type of App\Modules\Management\Controllers\FinanceAdminController::$helpers must not be defined (as in class App\Controllers\BaseController)
- [ci4] CRITICAL --> [EXCEPTION] Type of App\Modules\Management\Controllers\FinanceAdminController::$helpers must not be defined (as in class App\Controllers\BaseController) File=/home/mymiteam/mymiwallet/site/current/app/Modules/Management/Controllers/FinanceAdminController.php Line=8
- [ci4] CRITICAL --> ErrorException: Type of App\Modules\Management\Controllers\HRAdminController::$helpers must not be defined (as in class App\Controllers\BaseController)
- [ci4] CRITICAL --> [EXCEPTION] Type of App\Modules\Management\Controllers\HRAdminController::$helpers must not be defined (as in class App\Controllers\BaseController) File=/home/mymiteam/mymiwallet/site/current/app/Modules/Management/Controllers/HRAdminController.php Line=8
- [ci4] CRITICAL --> ErrorException: Type of App\Modules\Management\Controllers\InvestmentsAdminController::$helpers must not be defined (as in class App\Controllers\BaseController)
- [ci4] CRITICAL --> [EXCEPTION] Type of App\Modules\Management\Controllers\InvestmentsAdminController::$helpers must not be defined (as in class App\Controllers\BaseController) File=/home/mymiteam/mymiwallet/site/current/app/Modules/Management/Controllers/InvestmentsAdminController.php Line=8
- [ci4] LEVEL: CRITICAL (NEW)
- [ci4] ERROR --> Registration failed: {"username":"The username field is not in the correct format."}
- [ci4] CRITICAL --> ErrorException: Cannot declare class App\Modules\Ops\Controllers\OpsManagementController, because the name is already in use
- [ci4] CRITICAL --> [EXCEPTION] Cannot declare class App\Modules\Ops\Controllers\OpsManagementController, because the name is already in use File=/home/mymiteam/mymiwallet/site/current/app/Modules/Ops/Controllers/OpsManagementController.php Line=14
- [ci4] ERROR --> DocsAutoSync failure: Call to a member function scan() on null
- [ci4] ERROR --> [ACTIVATION] Activation failed: user not found
- [ci4] CRITICAL --> [EXCEPTION] Cannot declare class App\Modules\Ops\Controllers\OpsManagementController, because the name is already in use File=/home/mymiteam/mymiwallet/site/current/app/Modules/Ops/Controllers/OpsManagementController.php Line=15
- [ci4] CRITICAL --> ErrorException: Cannot declare class App\Controllers\OpsHealth, because the name is already in use
- [ci4] CRITICAL --> [EXCEPTION] Cannot declare class App\Controllers\OpsHealth, because the name is already in use File=/home/mymiteam/mymiwallet/site/current/app/Controllers/OpsHealth.php Line=11
- [ci4] CRITICAL --> ErrorException: Cannot declare class App\Controllers\OpsHealthController, because the name is already in use
- [ci4] CRITICAL --> [EXCEPTION] Cannot declare class App\Controllers\OpsHealthController, because the name is already in use File=/home/mymiteam/mymiwallet/site/current/app/Controllers/OpsHealthController.php Line=12
- [ci4] ERROR --> HowItWorksController failure: Call to undefined method App\Modules\Blog\Controllers\HowItWorksController::respondWithRendered()
- [ci4] ERROR --> HowItWorksController failure: automated-financial-insights
- [ci4] ERROR --> HowItWorksController failure: overview
- [ci4] ERROR --> HowItWorksController failure: alerts
- [ci4] ERROR --> Registration failed: {"username":"The username field must contain a unique value.","email":"The email field must contain a unique value."}
- [ci4] ERROR --> HowItWorksController failure: investor-profile
- [ci4] ERROR --> DashboardController::index failed to load executive summary: Call to undefined method CodeIgniter\Cache\Handlers\FileHandler::set()
- [ci4] ERROR --> Unknown column 'score_total' in 'where clause'
- [ci4] ERROR --> BudgetController::index failed to build executive summary: Call to undefined method CodeIgniter\Cache\Handlers\FileHandler::set()
- [ci4] ERROR --> HowItWorksController failure: investments
- [ci4] CRITICAL --> [CSRF][EXCEPTION] The action you requested is not allowed.
- [ci4] DEBUG --> Auth attempt failed for identifier esp.inoz.a.s4.1.5@gmail.com. Error: Unable to log you in. Please check your password.
- [ci4] ERROR --> Email: Unable to send email using SMTP. Your server might not be configured to send mail using this method.
- [ci4] ERROR --> 220 pdx1-sub0-mail-a221.dreamhost.com ESMTP
- [ci4] ERROR --> Registration failed: Failed to send activation message to: m.ar.tins.h.ir.l.e.y.84@gmail.com
- [ci4] ERROR --> [REGISTRATION] Activation email failed to send
- [ci4] ERROR --> HowItWorksController failure: mymi-wallets
- [ci4] ERROR --> ❌ getFilteredAlerts - Model error: Class "App\Support\Http" not found
- [ci4] ERROR --> Invalid market data for ticker: ADAMM
- [ci4] ERROR --> Invalid market data for ticker: SCCC
- [ci4] ERROR --> Invalid market data for ticker: GLBS
- [ci4] ERROR --> Invalid market data for ticker: WPFHD
- [ci4] ERROR --> Invalid market data for ticker: TFSA
- [ci4] ERROR --> Invalid market data for ticker: CLBEY
- [ci4] ERROR --> Invalid market data for ticker: BRCB
- [ci4] ERROR --> Invalid market data for ticker: RHEPZ
- [ci4] ERROR --> Invalid market data for ticker: LSANF
- [ci4] ERROR --> Invalid market data for ticker: GDQMF
- [ci4] ERROR --> Invalid market data for ticker: AGNCZ
- [ci4] ERROR --> Invalid market data for ticker: AUROW
- [ci4] ERROR --> Invalid market data for ticker: PMMAF
- [ci4] ERROR --> Invalid market data for ticker: CLTFF
- [ci4] ERROR --> Invalid market data for ticker: ESOCF
- [ci4] ERROR --> Invalid market data for ticker: HRGN
- [ci4] ERROR --> Invalid market data for ticker: SBNYL
- [ci4] ERROR --> Invalid market data for ticker: FGIWW
- [ci4] ERROR --> Invalid market data for ticker: LGN
- [ci4] ERROR --> Invalid market data for ticker: ARKR
- [ci4] ERROR --> Invalid market data for ticker: SCIA
- [ci4] ERROR --> Invalid market data for ticker: BMXC
- [ci4] ERROR --> Invalid market data for ticker: MGMLD
- [ci4] ERROR --> Invalid market data for ticker: DIIBF
- [ci4] ERROR --> Invalid market data for ticker: CDBMF
- [ci4] ERROR --> Unknown column 'as_of_datetime' in 'order clause'
- [ci4] ERROR --> Unknown column 'deleted_at' in 'where clause'
- [ci4] ERROR --> ReferralController::commonData getUserReferralData failed: Unknown column 'deleted_at' in 'where clause'
- [ci4] ERROR --> ReferralController::commonData getReferralSuccess failed: Unknown column 'deleted_at' in 'where clause'
- [ci4] ERROR --> Duplicate entry 'michael.stogsdill.bricker@gmail.com-108.94.16.157' for key 'bf_user_ip_history.bf_user_ip_unique_email'
- [ci4] ERROR --> UserIpHistoryModel::record failed: Duplicate entry 'michael.stogsdill.bricker@gmail.com-108.94.16.157' for key 'bf_user_ip_history.bf_user_ip_unique_email'
- [ci4] CRITICAL --> Error: Class "App\Commands\SafeBaseCommand" not found
- [ci4] CRITICAL --> [EXCEPTION] Class "App\Commands\SafeBaseCommand" not found File=/home/mymiteam/mymiwallet/site/current/app/Commands/SafeBaseCommand.php Line=23
- [ci4] CRITICAL --> [EXCEPTION] Class "App\Commands\SafeBaseCommand" not found File=/home/mymiteam/mymiwallet/site/current/app/Commands/SafeBaseCommand.php Line=22
- [ci4] ERROR --> [ERROR_PAGE] event=error_500 status=500 message=Internal server error.
- [ci4] CRITICAL --> ErrorException: Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker
- [ci4] CRITICAL --> [EXCEPTION] Access level to App\Modules\User\Controllers\KnowledgebaseController::respondWithRendered() must be protected (as in class App\Controllers\BaseController) or weaker File=/home/mymiteam/mymiwallet/site/current/app/Modules/User/Controllers/KnowledgebaseController.php Line=535
- [ci4] ERROR --> HowItWorksController failure: marketing
- [ci4] ERROR --> HowItWorksController failure: earnings
- [ci4] ERROR --> HowItWorksController failure: account-settings
- [ci4] ERROR --> Registration failed: {"password":"Validation.strong_password"}
- [ci4] ERROR --> [404_ROUTE]
- [ci4] ERROR --> Table 'mymiwallet.bf_route_error_heatmap' doesn't exist
- [ci4] ERROR --> Duplicate entry 'tburks2392@gmail.com-76.234.126.68' for key 'bf_user_ip_history.bf_user_ip_unique_email'
- [ci4] ERROR --> UserIpHistoryModel::record failed: Duplicate entry 'tburks2392@gmail.com-76.234.126.68' for key 'bf_user_ip_history.bf_user_ip_unique_email'

## Recurring Errors Today
- None

## Errors By System
- ci4: 106

## Errors By App File
- unknown: 105
- app/Filters/CsrfDebugFilter.php: 1

## Recommended Repair Targets
- app/Modules/Blog/Controllers/HowItWorksController.php
- app/Filters/CsrfDebugFilter.php
- app/Controllers/BaseController.php
- app/Controllers/AuthController.php
