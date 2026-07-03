# ADMIN_AUTH Routes

- Total routes: 59

| Method | Route | Handler | Class | Status | Recommended GT-001C Action |
|---|---|---|---|---|---|
| GET | `API/Ops/filesystem-status` | `\App\Controllers\Api\OpsFilesystemStatusController::index` | ADMIN_AUTH | OK | none |
| GET | `API/docs` | `\App\Controllers\Api\SwaggerDocsController::index` | ADMIN_AUTH | OK | none |
| GET | `admin/ops/health` | `\App\Controllers\OpsHealthController::index` | ADMIN_AUTH | OK | none |
| GET | `Admin/CoinVault` | `\App\Modules\CoinVault\Controllers\CoinVaultController::index` | ADMIN_AUTH | OK | none |
| GET | `Admin/CoinVault/Projects` | `\App\Modules\CoinVault\Controllers\CoinVaultController::projects` | ADMIN_AUTH | OK | none |
| GET | `Admin/CoinVault/Project/([0-9]+)` | `\App\Modules\CoinVault\Controllers\CoinVaultController::project/$1` | ADMIN_AUTH | OK | none |
| GET | `Admin/CoinVault/Contributions` | `\App\Modules\CoinVault\Controllers\CoinVaultController::contributions` | ADMIN_AUTH | OK | none |
| GET | `Admin/CoinVault/Payouts` | `\App\Modules\CoinVault\Controllers\CoinVaultController::payouts` | ADMIN_AUTH | OK | none |
| GET | `Admin/CoinVault/Wallet/([0-9]+)` | `\App\Modules\CoinVault\Controllers\CoinVaultController::wallet/$1` | ADMIN_AUTH | OK | none |
| GET | `api/admin/chat-usage` | `\App\Controllers\Api\AdminChatUsageController::index` | ADMIN_AUTH | OK | none |
| GET | `API/Management/getAutoloadHealth` | `\App\Modules\APIs\Controllers\ManagementAPIController::getAutoloadHealth` | ADMIN_AUTH | OK | none |
| GET | `API/Management/subsystems/status` | `\App\Modules\APIs\Controllers\ManagementAPIController::subsystemsStatus` | ADMIN_AUTH | OK | none |
| GET | `API/Mdit/admin/redemptions/pending` | `\App\Modules\APIs\Controllers\MditAdminAPIController::pendingRedemptions` | ADMIN_AUTH | OK | none |
| GET | `API/Mdit/admin/deposits/pending` | `\App\Modules\APIs\Controllers\MditAdminAPIController::pendingDeposits` | ADMIN_AUTH | OK | none |
| GET | `API/Management/Chat/Usage` | `\App\Modules\Management\Controllers\ChatUsageController::index` | ADMIN_AUTH | OK | none |
| GET | `API/Management/Ops` | `\App\Modules\Management\Controllers\OpsController::index` | ADMIN_AUTH | OK | none |
| GET | `API/Management/Ops/ajaxStatus` | `\App\Modules\Management\Controllers\OpsController::ajaxStatus` | ADMIN_AUTH | OK | none |
| GET | `Management/AiOps` | `\App\Modules\Management\Controllers\AiOpsManagementAdminController::index` | ADMIN_AUTH | OK | none |
| GET | `Management/Ops` | `\App\Modules\Management\Controllers\OpsAdminController::index` | ADMIN_AUTH | OK | none |
| GET | `Management/Ops/ajaxStatus` | `\App\Modules\Management\Controllers\OpsAdminController::ajaxStatus` | ADMIN_AUTH | OK | none |
| GET | `Management/AccountRescue` | `\App\Modules\Management\Controllers\AccountRescueAdminController::index` | ADMIN_AUTH | OK | none |
| GET | `Management/Admin/Chat` | `\App\Modules\Management\Controllers\ChatAdminController::index` | ADMIN_AUTH | OK | none |
| GET | `Management/Admin/Chat/history` | `\App\Modules\Management\Controllers\ChatAdminController::history` | ADMIN_AUTH | OK | none |
| GET | `Management/API` | `\App\Modules\Management\Controllers\APIAdminController::index` | ADMIN_AUTH | OK | none |
| GET | `Management/API/([^/]+)` | `\App\Modules\Management\Controllers\APIAdminController::index` | ADMIN_AUTH | OK | none |
| GET | `Management/Docs` | `\App\Modules\Management\Controllers\DocsAdminController::index` | ADMIN_AUTH | OK | none |
| GET | `Management/Docs/(.*)` | `\App\Modules\Management\Controllers\DocsAdminController::browse/$1` | ADMIN_AUTH | OK | none |
| GET | `Management/OpsInbox` | `\App\Controllers\App\Modules\Management\Controllers\OpsInboxController::index` | ADMIN_AUTH | OK | none |
| GET | `Management/OpsInbox/view/([0-9]+)` | `\App\Controllers\App\Modules\Management\Controllers\OpsInboxController::view/$1` | ADMIN_AUTH | OK | none |
| POST | `admin/ops/health/run` | `\App\Controllers\OpsHealthController::run` | ADMIN_AUTH | OK | none |
| POST | `API/CoinVault/approveContribution/([0-9]+)` | `\App\Modules\CoinVault\Controllers\Api\CoinVaultApiController::approveContribution/$1` | ADMIN_AUTH | OK | none |
| POST | `API/CoinVault/rejectContribution/([0-9]+)` | `\App\Modules\CoinVault\Controllers\Api\CoinVaultApiController::rejectContribution/$1` | ADMIN_AUTH | OK | none |
| POST | `API/CoinVault/approvePayout/([0-9]+)` | `\App\Modules\CoinVault\Controllers\Api\CoinVaultApiController::approvePayout/$1` | ADMIN_AUTH | OK | none |
| POST | `API/CoinVault/rejectPayout/([0-9]+)` | `\App\Modules\CoinVault\Controllers\Api\CoinVaultApiController::rejectPayout/$1` | ADMIN_AUTH | OK | none |
| POST | `api/aiops/manual-run` | `\App\Controllers\Api\AiOpsManualRunController::run` | ADMIN_AUTH | OK | none |
| POST | `API/AIOps/toggle` | `\App\Modules\APIs\Controllers\AiOpsAPIController::toggle` | ADMIN_AUTH | OK | none |
| POST | `API/Management/subsystems/action` | `\App\Modules\APIs\Controllers\ManagementAPIController::subsystemsAction` | ADMIN_AUTH | OK | none |
| POST | `API/Mdit/issuance/mint` | `\App\Modules\APIs\Controllers\MditIssuanceAPIController::mint` | ADMIN_AUTH | OK | none |
| POST | `API/Mdit/admin/redemptions/approve` | `\App\Modules\APIs\Controllers\MditAdminAPIController::approveRedemption` | ADMIN_AUTH | OK | none |
| POST | `API/Mdit/admin/nav/compute_today` | `\App\Modules\APIs\Controllers\MditAdminAPIController::computeNavToday` | ADMIN_AUTH | OK | none |
| POST | `API/Management/Projects/TBI-Coins/Create-Defaults/([0-9]+)` | `\App\Modules\APIs\Controllers\TbiProjectCoinsAPIController::createDefaults/$1` | ADMIN_AUTH | OK | none |
| POST | `API/Management/Projects/TBI-Coins/Approve-Contribution/([0-9]+)` | `\App\Modules\APIs\Controllers\TbiProjectCoinsAPIController::approveContribution/$1` | ADMIN_AUTH | OK | none |
| POST | `API/Management/Projects/TBI-Coins/Reject-Contribution/([0-9]+)` | `\App\Modules\APIs\Controllers\TbiProjectCoinsAPIController::rejectContribution/$1` | ADMIN_AUTH | OK | none |
| POST | `API/Management/Projects/TBI-Coins/Prepare-Solana-Mint/([0-9]+)` | `\App\Modules\APIs\Controllers\TbiProjectCoinsAPIController::prepareSolanaMint/$1` | ADMIN_AUTH | OK | none |
| POST | `API/Management/Projects/TBI-Coins/Prepare-Exchange-Asset/([0-9]+)` | `\App\Modules\APIs\Controllers\TbiProjectCoinsAPIController::prepareExchangeAsset/$1` | ADMIN_AUTH | OK | none |
| POST | `API/Management/Chat/Settings` | `\App\Modules\Management\Controllers\ChatUsageController::saveSettings` | ADMIN_AUTH | OK | none |
| POST | `API/Management/Chat/ResetUser` | `\App\Modules\Management\Controllers\ChatUsageController::resetUser` | ADMIN_AUTH | OK | none |
| POST | `API/Management/Ops/ajaxDispatch` | `\App\Modules\Management\Controllers\OpsController::ajaxDispatch` | ADMIN_AUTH | OK | none |
| POST | `Management/Ops/ajaxDispatch` | `\App\Modules\Management\Controllers\OpsAdminController::ajaxDispatch` | ADMIN_AUTH | OK | none |
| POST | `Management/AccountRescue/lookup` | `\App\Modules\Management\Controllers\AccountRescueAdminController::lookup` | ADMIN_AUTH | OK | none |
| POST | `Management/AccountRescue/resend-activation` | `\App\Modules\Management\Controllers\AccountRescueAdminController::resendActivation` | ADMIN_AUTH | OK | none |
| POST | `Management/AccountRescue/manual-activate` | `\App\Modules\Management\Controllers\AccountRescueAdminController::manualActivate` | ADMIN_AUTH | OK | none |
| POST | `Management/AccountRescue/force-password-reset` | `\App\Modules\Management\Controllers\AccountRescueAdminController::forcePasswordReset` | ADMIN_AUTH | OK | none |
| POST | `Management/AccountRescue/unlock-account` | `\App\Modules\Management\Controllers\AccountRescueAdminController::unlockAccount` | ADMIN_AUTH | OK | none |
| POST | `Management/Admin/Chat/submit` | `\App\Modules\Management\Controllers\ChatAdminController::submit` | ADMIN_AUTH | OK | none |
| POST | `Management/OpsInbox/create-task-file/([0-9]+)` | `\App\Controllers\App\Modules\Management\Controllers\OpsInboxController::createTaskFile/$1` | ADMIN_AUTH | OK | none |
| POST | `Management/OpsInbox/create-task-registry/([0-9]+)` | `\App\Controllers\App\Modules\Management\Controllers\OpsInboxController::createTaskRegistry/$1` | ADMIN_AUTH | OK | none |
| POST | `Management/OpsInbox/approve/([0-9]+)` | `\App\Controllers\App\Modules\Management\Controllers\OpsInboxController::markApproved/$1` | ADMIN_AUTH | OK | none |
| POST | `Management/OpsInbox/reject/([0-9]+)` | `\App\Controllers\App\Modules\Management\Controllers\OpsInboxController::reject/$1` | ADMIN_AUTH | OK | none |
