# MyMI Alert GTM Smoke Command
Create app/Commands/MyMI/AlertsGtmSmoke.php.
Command name: mymi:alerts:gtm-smoke.
Group: MyMI.
Output JSON.
Return EXIT_ERROR only when fail count is greater than zero.
Do not mutate data.
Do not fetch live emails.
Do not send Discord messages.
Do not call paid APIs.
Check DB connection.
Check tables: bf_investment_scraper, bf_investment_trade_alerts, bf_investment_tickers, bf_investment_alert_history, bf_trade_alert_scanner_meta, bf_aiops_alert_jobs, bf_marketing_temp_scraper, bf_marketing_generated_content, bf_marketing_distribution_targets, bf_marketing_publish_queue.
Check columns: scraper id/email_subject/email_body/email_date/status; trade alerts id/ticker/status/occurrences/price/created_on; tickers id/symbol; alert history id/ticker/price; marketing distribution id/channel/destination/idempotency_key/status.
Check counts for alert, queue, news, and marketing tables.
Check duplicate risk by grouping bf_investment_trade_alerts by ticker and status having count greater than 1.
Check commands: aiops:alerts-check, aiops:alerts-health, aiops:alerts-worker, aiops:sql:check, aiops:email-scan, alerts:fetch-raw-emails, marketing:news:scrape, marketing:news:generate, marketing:promotions:audit, marketing:promotions:generate, marketing:regression:smoke, news:audit, research:news:collect, research:intelligence:signals, scanning:run.
Validate with php -l app/Commands/MyMI/AlertsGtmSmoke.php, php spark list grep mymi:alerts:gtm-smoke, and php spark mymi:alerts:gtm-smoke.
