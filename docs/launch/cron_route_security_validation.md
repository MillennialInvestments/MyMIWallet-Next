# Cron Route Security Validation

- Generated: 2026-02-28 17:58:44 UTC
- Command: `php spark gtm:cron:validate-security`
- Base URL: `http://www.mymiwallet.com/index.php`
- Routes checked: 41

| Method | Route | No Token Status | Invalid Token Status | Pass |
|---|---|---:|---:|---|
| GET | `/API/DripCampaign/TestCron` | 403 | 403 | YES |
| GET | `/API/Management/Run-CRON-Tasks` | 403 | 403 | YES |
| GET | `/API/Management/runCronManually` | 403 | 403 | YES |
| GET | `/API/Marketing/cronAnalyzeContent` | 403 | 403 | YES |
| GET | `/API/Marketing/cronAutoPublishGroupedDigest` | 403 | 403 | YES |
| GET | `/API/Marketing/cronFetchAndGenerateNews` | 403 | 403 | YES |
| GET | `/API/Marketing/cronFetchInbox` | 403 | 403 | YES |
| GET | `/API/Marketing/cronFetchMarketingEmails` | 403 | 403 | YES |
| GET | `/API/Marketing/cronProcessSMSMarketingIdeas` | 403 | 403 | YES |
| GET | `/API/Predictions/Cron/Distribute-Fees` | 403 | 403 | YES |
| GET | `/API/Predictions/Cron/Expire-Markets` | 403 | 403 | YES |
| GET | `/API/Predictions/Cron/Fetch-Market-Data` | 403 | 403 | YES |
| GET | `/API/Predictions/Cron/Fetch-User-Data` | 403 | 403 | YES |
| GET | `/API/Predictions/Cron/Lock` | 403 | 403 | YES |
| GET | `/API/Predictions/Cron/Process-Expired-Markets` | 403 | 403 | YES |
| GET | `/API/Predictions/Cron/Process-Settled-Markets` | 403 | 403 | YES |
| GET | `/API/Predictions/Cron/Process-User-Fees` | 403 | 403 | YES |
| GET | `/API/Predictions/Cron/Process-User-Leaderboard` | 403 | 403 | YES |
| GET | `/API/Predictions/Cron/Process-User-Notifications` | 403 | 403 | YES |
| GET | `/API/Predictions/Cron/Process-User-Orders` | 403 | 403 | YES |
| GET | `/API/Predictions/Cron/Process-User-PnL` | 403 | 403 | YES |
| GET | `/API/Predictions/Cron/Process-User-Positions` | 403 | 403 | YES |
| GET | `/API/Predictions/Cron/Process-User-Rankings` | 403 | 403 | YES |
| GET | `/API/Predictions/Cron/Process-User-Settlements` | 403 | 403 | YES |
| GET | `/API/Predictions/Cron/Process-User-Stakes` | 403 | 403 | YES |
| GET | `/API/Predictions/Cron/Process-User-Stats` | 403 | 403 | YES |
| GET | `/API/Predictions/Cron/Rebalance` | 403 | 403 | YES |
| GET | `/API/Predictions/Cron/Settle-Markets` | 403 | 403 | YES |
| GET | `/API/Predictions/Cron/Unlock` | 403 | 403 | YES |
| GET | `/API/Predictions/Cron/Update-Market-Prices` | 403 | 403 | YES |
| GET | `/API/Predictions/Cron/Update-Market-States` | 403 | 403 | YES |
| GET | `/API/Predictions/Cron/Update-User-Fees` | 403 | 403 | YES |
| GET | `/API/Predictions/Cron/Update-User-Leaderboard` | 403 | 403 | YES |
| GET | `/API/Predictions/Cron/Update-User-Notifications` | 403 | 403 | YES |
| GET | `/API/Predictions/Cron/Update-User-PnL` | 403 | 403 | YES |
| GET | `/API/Predictions/Cron/Update-User-Positions` | 403 | 403 | YES |
| GET | `/API/Predictions/Cron/Update-User-Rankings` | 403 | 403 | YES |
| GET | `/API/Predictions/Cron/Update-User-Stakes` | 403 | 403 | YES |
| GET | `/API/Predictions/Cron/Update-User-Stats` | 403 | 403 | YES |
| POST | `/API/Management/runCronManually` | 403 | 403 | YES |
| POST | `/API/eSports/cronProcessJobs` | 403 | 403 | YES |

- Pass count: 41
- Fail count: 0

## Result
- No HTTP 200 exposure found for missing/invalid token checks.
