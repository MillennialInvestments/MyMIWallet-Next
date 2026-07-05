# GT-001E Broker Route Classification

This lane classifies MyMI `API/Broker/*` route definitions before any route guard implementation.

## Current Evidence

- Broker routes are registered in the Spark route registry.
- Broker route definitions point to `App\Modules\APIs\Controllers\BrokerAPIController`.
- `BrokerAPIController` ownership and file existence must be proven before guard implementation.
- Plaid and Robinhood implementation logic appears to exist under wallet APIs and related libraries.
- This lane must not call Plaid, Robinhood, SnapTrade, or any external API.
- This lane must not mutate production or database data.

## Command

```bash
php spark gtm:broker:route-classification
Optional route-registry input:

php spark routes > /tmp/mymi-gt001e-routes.txt 2>&1
php spark gtm:broker:route-classification /tmp/mymi-gt001e-routes.txt
Classification Buckets
user-auth-required-read
owner-approved-mutation-or-user-auth-post-only
api-token-or-internal-token-external-fetch-review
budget-user-auth-required-cross-controller-review
Guardrail

Do not add or change Broker guards until the command report is reviewed and owner-approved.
