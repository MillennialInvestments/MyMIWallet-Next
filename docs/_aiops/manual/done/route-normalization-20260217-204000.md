# Route Normalization Report

- Scope: `app/Config/Routes.php`
- Audit baseline: `docs/_support/api-audit/20260217-200919/summary.md`
- Controller inventory roots reviewed:
  - `app/Modules/APIs/Controllers/`
  - `app/Controllers/Api/`
  - `app/Modules/Predictions/Controllers/API/`

## Summary
- API route entries (verb+path) before: **665**
- API route entries (verb+path) after: **705**
- Duplicate API route definitions after: **0**

## Changes applied

### Missing mappings added
- Added POST support for:
  - `/API/Management/ajaxGetActiveUsers`
  - `/API/Management/ajaxGetInactiveUsers`
  - `/API/Management/checkForSpamUsers`
  - `/API/Management/processQueuedEmails`
  - `/API/Management/processTempEmailsToScraper`
  - `/API/Management/resendActivationEmailsBatch`
  - `/API/Management/resendActivationEmailsBatchQueued`
  - `/API/Management/sendTestActivationEmail`
  - `/API/Management/saveSuggestion`
- Added GET+POST support for:
  - `/API/Management/generateTodaysStory`
  - `/API/Management/Marketing/*` aliases from audit (`cronAnalyzeContent`, `cronFetchAndGenerateNews`, `generateContent`, `cronFetchInbox`, `cronFetchMarketingEmails`, `generateContentDigestFromStored`, `generateContentFromScraper`, `generateDailyContentDigest`, `massResendActivationEmails`)
- Added CLI support for:
  - `/API/Management/Run-CRON-Tasks` via `cli()` route
- Added plural alias surface:
  - `/API/Users/Comments/Add` mapped to `UserController::addComment`

### Verb/case/duplicate cleanup
- Preserved existing `AiOps` and `AIOps` surfaces (both currently in active use).
- No duplicate API path+verb definitions remain.
- No dead UNKNOWN routes were explicitly removed in this pass.

## Intentionally untouched
- `/API/Alerts/createTradeAlert/(:segment)` remains represented by CI4 regex output (`/API/Alerts/createTradeAlert/([^/]+)`) in `spark routes`; this is semantically mapped and not missing.
- Existing filters (`cronKey`, `internalToken`, `permission:*`, etc.) were preserved.
