# Marketing news services refactor (2026-04-09)

## summary
Added dedicated services for ingestion and generation while reusing existing MyMIMarketing and MarketingModel storage/generation pathways.

## files changed
- `app/Services/MarketingNewsScrapeService.php`
- `app/Services/MarketingNewsGenerateService.php`
- `app/Modules/APIs/Controllers/MarketingAPIController.php`
- `app/Config/Routes.php`
- `app/Config/Services.php`

## migrations added
- None.

## commands added
- `marketing:news-scrape`
- `marketing:news:generate`

## routes added
- `API/Marketing/runNewsScrape`
- `API/Marketing/runNewsGenerate`
- `API/Marketing/runNewsPipeline`

## manual test steps
1. Trigger wrappers directly via API endpoints.
2. Compare output counts with Spark command outputs.
3. Verify no regressions for existing cron methods.

## cron examples
- `*/10 * * * * php /home/mymiteam/mymiwallet/site/current/spark marketing:news-scrape --mailbox=tradealerts@mymiwallet.com >> /home/mymiteam/mymiwallet/site/current/writable/logs/marketing-news-scrape.log 2>&1`
- `*/15 * * * * php /home/mymiteam/mymiwallet/site/current/spark marketing:news:generate --limit=25 >> /home/mymiteam/mymiwallet/site/current/writable/logs/marketing-news-generate.log 2>&1`
- `0 */4 * * * php /home/mymiteam/mymiwallet/site/current/spark marketing:daily-audit >> /home/mymiteam/mymiwallet/site/current/writable/logs/marketing-daily-audit.log 2>&1`

## known follow-ups
- Add endpoint auth policy for wrapper routes in hardened environments.
