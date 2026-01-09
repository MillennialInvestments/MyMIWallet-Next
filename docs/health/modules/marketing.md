# Marketing System Health Tests

✅ Health Test: `php spark marketing:health-inbox`
Priority: P0
Feature: Email scrape → `bf_marketing_temp_scraper`
Primary Entry Point(s):
- `app/Modules/APIs/Controllers/MarketingController.php::cronFetchInbox()`
- `app/Modules/APIs/Controllers/MarketingController.php::cronFetchMarketingEmails()`
- `app/Libraries/MyMIMarketing.php::fetchAndStoreEmails()`
Dependencies:
- DB: `bf_marketing_temp_scraper`
What it should verify (checklist):
- Step 1: Fetch inbox messages.
- Step 2: Insert into temp scraper table.
What it should log: inbox source, inserted count.
Failure modes to detect: mailbox auth failure, insert failures.
Where to implement: `app/Commands/MarketingInboxHealth.php` (new).
Suggested command name: `marketing:health-inbox`
Expected log file: `writable/logs/health_marketing.log`

✅ Health Test: `php spark marketing:health-summarize`
Priority: P1
Feature: Summarize temp → final scraper
Primary Entry Point(s):
- `app/Libraries/MyMIMarketing.php::generateFromTempScraper()`
- `app/Models/MarketingModel.php::insertFinalScraper()`
Dependencies:
- DB: `bf_marketing_temp_scraper`, `bf_marketing_scraper`
What it should verify (checklist):
- Step 1: Process temp scraper record.
- Step 2: Insert summarized record into final table.
What it should log: temp_id, final_id, summary length.
Failure modes to detect: empty summaries, duplicate insert failures.
Where to implement: `app/Commands/MarketingSummarizeHealth.php` (new).
Suggested command name: `marketing:health-summarize`
Expected log file: `writable/logs/health_marketing.log`

✅ Health Test: `php spark marketing:health-tfidf`
Priority: P1
Feature: Keyword extraction TF-IDF pipeline
Primary Entry Point(s):
- `app/Modules/APIs/Controllers/ManagementController.php::testTfIdfPipeline()`
- `app/Libraries/MyMIMarketing.php::summarizeText()`
Dependencies:
- TF-IDF transformer (PHP-ML)
What it should verify (checklist):
- Step 1: Run TF-IDF pipeline against sample inputs.
- Step 2: Validate keyword extraction.
What it should log: sample index, keyword count.
Failure modes to detect: TF-IDF exceptions, invalid input handling.
Where to implement: `app/Commands/MarketingTfIdfHealth.php` (new).
Suggested command name: `marketing:health-tfidf`
Expected log file: `writable/logs/health_marketing.log`

✅ Health Test: `php spark marketing:health-post-gen`
Priority: P1
Feature: Post generation from summary
Primary Entry Point(s):
- `app/Modules/APIs/Controllers/ManagementController.php::generatePostsFromSummary()`
- `app/Libraries/MyMIMarketing.php::generateSocialPosts()`
Dependencies:
- DB: `bf_marketing_scraper`
What it should verify (checklist):
- Step 1: Load summary record.
- Step 2: Generate platform posts.
- Step 3: Update summary record with posts JSON.
What it should log: summary_id, platforms generated.
Failure modes to detect: empty posts, invalid JSON.
Where to implement: `app/Commands/MarketingPostGenHealth.php` (new).
Suggested command name: `marketing:health-post-gen`
Expected log file: `writable/logs/health_marketing.log`

✅ Health Test: `php spark marketing:health-zapier`
Priority: P1
Feature: Zapier share (dry-run)
Primary Entry Point(s):
- `app/Services/ZapierService.php::sendApprovedPostsToZapier()`
Dependencies:
- Env: `ZAPIER_APPROVED_WEBHOOK`, `OPENAI_API_KEY`
- DB: `bf_marketing_scraper`
What it should verify (checklist):
- Step 1: Load approved posts.
- Step 2: Validate webhook URL.
- Step 3: Send payload (dry-run/test endpoint).
What it should log: record id, webhook response code.
Failure modes to detect: missing webhook URL, 4xx responses.
Where to implement: `app/Commands/MarketingZapierHealth.php` (new).
Suggested command name: `marketing:health-zapier`
Expected log file: `writable/logs/health_marketing.log`
