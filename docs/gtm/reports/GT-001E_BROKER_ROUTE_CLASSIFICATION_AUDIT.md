# GT-001E Broker Route Classification Audit

Status: `FAIL`

## Scope

Read-only classification of MyMI `API/Broker/*` route definitions before any route guard implementation.

This audit does not remove routes, add guards, call Plaid, call Robinhood, call SnapTrade, mutate production, or mutate database data.

## Summary

- `routes_php_broker_routes`: `81`
- `spark_registered_broker_routes`: `81`
- `explicit_guarded_routes`: `0`
- `explicit_unguarded_routes`: `81`
- `missing_handler_files`: `77`
- `budget_cross_controller_routes`: `4`
- `external_fetch_review_routes`: `60`
- `mutation_review_routes`: `7`
- `user_auth_read_routes`: `10`
- `spark_routes_file`: `/apps/TBI/worktrees/mymi-gt001e-broker-api-token-classification/writable/gtm/gt001e-spark-routes-20260705-144644.txt`
- `spark_routes_exit_code`: `0`

## Evidence

- FAIL: Registered API/Broker routes reference missing handler files.
- WARN: Broker routes do not have explicit route-level auth/api/internal filters.
- WARN: Plaid/Robinhood external-fetch routes require API_TOKEN/internal-token classification before guard patching.
- WARN: Link/unlink/refresh routes require mutation-safe method and guard review.

## Route Classification

| Line | Method | URI | Handler | Filter | Handler File Exists | Classification |
|---:|---|---|---|---|---|---|
| 751 | GET | `API/Broker/summary` | `App\Modules\APIs\Controllers\BrokerAPIController::summary` | `NONE` | `NO` | `user-auth-required-read` |
| 752 | GET | `API/Broker/credit` | `App\Modules\APIs\Controllers\BrokerAPIController::credit` | `NONE` | `NO` | `user-auth-required-read` |
| 753 | GET | `API/Broker/available` | `App\Modules\APIs\Controllers\BrokerAPIController::available` | `NONE` | `NO` | `user-auth-required-read` |
| 754 | GET | `API/Broker/repayment` | `App\Modules\APIs\Controllers\BrokerAPIController::repayment` | `NONE` | `NO` | `user-auth-required-read` |
| 755 | GET | `API/Broker/categories` | `App\Modules\APIs\Controllers\BrokerAPIController::categories` | `NONE` | `NO` | `user-auth-required-read` |
| 756 | GET | `API/Broker/transactions` | `App\Modules\APIs\Controllers\BrokerAPIController::transactions` | `NONE` | `NO` | `user-auth-required-read` |
| 757 | GET | `API/Broker/goals` | `App\Modules\APIs\Controllers\BrokerAPIController::goals` | `NONE` | `NO` | `user-auth-required-read` |
| 758 | GET | `API/Broker/insights` | `App\Modules\APIs\Controllers\BrokerAPIController::insights` | `NONE` | `NO` | `user-auth-required-read` |
| 759 | GET | `API/Broker/trends` | `App\Modules\APIs\Controllers\BudgetController::trends` | `NONE` | `YES` | `budget-user-auth-required-cross-controller-review` |
| 760 | GET | `API/Broker/net-worth` | `App\Modules\APIs\Controllers\BudgetController::netWorth` | `NONE` | `YES` | `budget-user-auth-required-cross-controller-review` |
| 761 | GET | `API/Broker/cash-flow` | `App\Modules\APIs\Controllers\BudgetController::cashFlow` | `NONE` | `YES` | `budget-user-auth-required-cross-controller-review` |
| 762 | GET | `API/Broker/budgets` | `App\Modules\APIs\Controllers\BudgetController::budgets` | `NONE` | `YES` | `budget-user-auth-required-cross-controller-review` |
| 763 | GET | `API/Broker/savings-goals` | `App\Modules\APIs\Controllers\BrokerAPIController::savingsGoals` | `NONE` | `NO` | `user-auth-required-read` |
| 764 | GET | `API/Broker/investment-accounts` | `App\Modules\APIs\Controllers\BrokerAPIController::investmentAccounts` | `NONE` | `NO` | `user-auth-required-read` |
| 765 | GET | `API/Broker/linked-accounts` | `App\Modules\APIs\Controllers\BrokerAPIController::linkedAccounts` | `NONE` | `NO` | `owner-approved-mutation-or-user-auth-post-only` |
| 766 | GET | `API/Broker/add-linked-account` | `App\Modules\APIs\Controllers\BrokerAPIController::addLinkedAccount` | `NONE` | `NO` | `owner-approved-mutation-or-user-auth-post-only` |
| 767 | GET | `API/Broker/remove-linked-account/(:segment)` | `App\Modules\APIs\Controllers\BrokerAPIController::removeLinkedAccount` | `NONE` | `NO` | `owner-approved-mutation-or-user-auth-post-only` |
| 768 | GET | `API/Broker/refresh-linked-account/(:segment)` | `App\Modules\APIs\Controllers\BrokerAPIController::refreshLinkedAccount` | `NONE` | `NO` | `owner-approved-mutation-or-user-auth-post-only` |
| 770 | GET | `API/Broker/fetchPlaidLinkToken/(:segment)` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchPlaidLinkToken` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 771 | GET | `API/Broker/fetchPlaidLinkToken` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchPlaidLinkToken` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 772 | POST | `API/Broker/linkPlaidAccount` | `App\Modules\APIs\Controllers\BrokerAPIController::linkPlaidAccount` | `NONE` | `NO` | `owner-approved-mutation-or-user-auth-post-only` |
| 773 | GET | `API/Broker/unlinkPlaidAccount/(:segment)` | `App\Modules\APIs\Controllers\BrokerAPIController::unlinkPlaidAccount` | `NONE` | `NO` | `owner-approved-mutation-or-user-auth-post-only` |
| 774 | GET | `API/Broker/refreshPlaidAccount/(:segment)` | `App\Modules\APIs\Controllers\BrokerAPIController::refreshPlaidAccount` | `NONE` | `NO` | `owner-approved-mutation-or-user-auth-post-only` |
| 775 | GET | `API/Broker/fetchPlaidAccounts/(:segment)` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchPlaidAccounts` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 776 | GET | `API/Broker/fetchPlaidAccounts` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchPlaidAccounts` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 777 | GET | `API/Broker/fetchPlaidTransactions/(:segment)` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchPlaidTransactions` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 778 | GET | `API/Broker/fetchPlaidTransactions` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchPlaidTransactions` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 779 | GET | `API/Broker/fetchPlaidBalances/(:segment)` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchPlaidBalances` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 780 | GET | `API/Broker/fetchPlaidBalances` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchPlaidBalances` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 781 | GET | `API/Broker/fetchPlaidIncome/(:segment)` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchPlaidIncome` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 782 | GET | `API/Broker/fetchPlaidIncome` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchPlaidIncome` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 783 | GET | `API/Broker/fetchPlaidLiabilities/(:segment)` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchPlaidLiabilities` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 784 | GET | `API/Broker/fetchPlaidLiabilities` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchPlaidLiabilities` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 785 | GET | `API/Broker/fetchPlaidIdentity/(:segment)` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchPlaidIdentity` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 786 | GET | `API/Broker/fetchPlaidIdentity` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchPlaidIdentity` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 787 | GET | `API/Broker/fetchPlaidInvestments/(:segment)` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchPlaidInvestments` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 788 | GET | `API/Broker/fetchPlaidInvestments` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchPlaidInvestments` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 789 | GET | `API/Broker/fetchPlaidHoldings/(:segment)` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchPlaidHoldings` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 790 | GET | `API/Broker/fetchPlaidHoldings` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchPlaidHoldings` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 791 | GET | `API/Broker/fetchRobinhoodAccounts` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchRobinhoodAccounts` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 792 | GET | `API/Broker/fetchRobinhoodAccountDetails/(:segment)` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchRobinhoodAccountDetails` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 793 | GET | `API/Broker/fetchRobinhoodPositions/(:segment)` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchRobinhoodPositions` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 794 | GET | `API/Broker/fetchRobinhoodPositions` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchRobinhoodPositions` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 795 | GET | `API/Broker/fetchRobinhoodPortfolio/(:segment)` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchRobinhoodPortfolio` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 796 | GET | `API/Broker/fetchRobinhoodPortfolio` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchRobinhoodPortfolio` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 797 | GET | `API/Broker/fetchRobinhoodWatchlists/(:segment)` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchRobinhoodWatchlists` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 798 | GET | `API/Broker/fetchRobinhoodWatchlists` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchRobinhoodWatchlists` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 799 | GET | `API/Broker/fetchRobinhoodOrders/(:segment)` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchRobinhoodOrders` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 800 | GET | `API/Broker/fetchRobinhoodOrders` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchRobinhoodOrders` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 801 | GET | `API/Broker/fetchRobinhoodOrderDetails/(:segment)` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchRobinhoodOrderDetails` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 802 | GET | `API/Broker/fetchRobinhoodOrderDetails` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchRobinhoodOrderDetails` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 803 | GET | `API/Broker/fetchRobinhoodInstruments/(:segment)` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchRobinhoodInstruments` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 804 | GET | `API/Broker/fetchRobinhoodInstruments` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchRobinhoodInstruments` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 805 | GET | `API/Broker/fetchRobinhoodQuotes/(:segment)` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchRobinhoodQuotes` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 806 | GET | `API/Broker/fetchRobinhoodQuotes` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchRobinhoodQuotes` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 807 | GET | `API/Broker/fetchRobinhoodDividends/(:segment)` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchRobinhoodDividends` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 808 | GET | `API/Broker/fetchRobinhoodDividends` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchRobinhoodDividends` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 809 | GET | `API/Broker/fetchRobinhoodTransfers/(:segment)` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchRobinhoodTransfers` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 810 | GET | `API/Broker/fetchRobinhoodTransfers` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchRobinhoodTransfers` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 811 | GET | `API/Broker/fetchRobinhoodWatchlistItems/(:segment)` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchRobinhoodWatchlistItems` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 812 | GET | `API/Broker/fetchRobinhoodWatchlistItems` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchRobinhoodWatchlistItems` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 813 | GET | `API/Broker/fetchRobinhoodTransactionHistory/(:segment)` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchRobinhoodTransactionHistory` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 814 | GET | `API/Broker/fetchRobinhoodTransactionHistory` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchRobinhoodTransactionHistory` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 815 | GET | `API/Broker/fetchRobinhoodNotifications/(:segment)` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchRobinhoodNotifications` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 816 | GET | `API/Broker/fetchRobinhoodNotifications` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchRobinhoodNotifications` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 817 | GET | `API/Broker/fetchRobinhoodACHRelationships/(:segment)` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchRobinhoodACHRelationships` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 818 | GET | `API/Broker/fetchRobinhoodACHRelationships` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchRobinhoodACHRelationships` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 819 | GET | `API/Broker/fetchRobinhoodCryptoAccounts/(:segment)` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchRobinhoodCryptoAccounts` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 820 | GET | `API/Broker/fetchRobinhoodCryptoAccounts` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchRobinhoodCryptoAccounts` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 821 | GET | `API/Broker/fetchRobinhoodCryptoPositions/(:segment)` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchRobinhoodCryptoPositions` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 822 | GET | `API/Broker/fetchRobinhoodCryptoPositions` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchRobinhoodCryptoPositions` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 823 | GET | `API/Broker/fetchRobinhoodCryptoPortfolio/(:segment)` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchRobinhoodCryptoPortfolio` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 824 | GET | `API/Broker/fetchRobinhoodCryptoPortfolio` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchRobinhoodCryptoPortfolio` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 825 | GET | `API/Broker/fetchRobinhoodCryptoOrders/(:segment)` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchRobinhoodCryptoOrders` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 826 | GET | `API/Broker/fetchRobinhoodCryptoOrders` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchRobinhoodCryptoOrders` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 827 | GET | `API/Broker/fetchRobinhoodCryptoOrderDetails/(:segment)` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchRobinhoodCryptoOrderDetails` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 828 | GET | `API/Broker/fetchRobinhoodCryptoOrderDetails` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchRobinhoodCryptoOrderDetails` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 829 | GET | `API/Broker/fetchRobinhoodCryptoTransactions/(:segment)` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchRobinhoodCryptoTransactions` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 830 | GET | `API/Broker/fetchRobinhoodCryptoTransactions` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchRobinhoodCryptoTransactions` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 831 | GET | `API/Broker/fetchRobinhoodCryptoQuotes/(:segment)` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchRobinhoodCryptoQuotes` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |
| 832 | GET | `API/Broker/fetchRobinhoodCryptoQuotes` | `App\Modules\APIs\Controllers\BrokerAPIController::fetchRobinhoodCryptoQuotes` | `NONE` | `NO` | `api-token-or-internal-token-external-fetch-review` |

## Recommended Next Step

Do not add route guards until handler ownership and liveness are confirmed. If `BrokerAPIController` remains missing while `API/Broker/*` routes are registered, create a follow-up implementation lane to either restore the controller safely or deprecate/guard the registered routes behind an explicit owner-approved plan.
