# GT-001E-B3 Broker Safest First Guard Patch

## Status

Implementation candidate. Adds apiToken route filters only to the 10 owner-approved legacy-read Broker routes.

## Approved Scope

- summary
- credit
- available
- repayment
- categories
- transactions
- goals
- insights
- savings-goals
- investment-accounts

## Out of Scope

- No Plaid route mutation.
- No Robinhood route mutation.
- No external-fetch route mutation.
- No link, unlink, refresh, or sync route mutation.
- No controller restoration.
- No database mutation.
- No external API calls.
- No production mutation.
