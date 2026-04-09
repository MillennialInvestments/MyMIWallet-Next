# marketing:news:generate command (2026-04-09)

## summary
Implemented CLI generation command and service to process pending temp alerts into clustered stories with summaries, keywords, timeline JSON, and generated payload records.

## files changed
- `app/Commands/Marketing/NewsGenerate.php`
- `app/Services/MarketingNewsGenerateService.php`
- `app/Config/Services.php`

## migrations added
- None.

## commands added
- `php spark marketing:news:generate`

## routes added
- `API/Marketing/runNewsGenerate`
- `API/Marketing/runNewsPipeline`

## manual test steps
1. Seed pending records in `bf_marketing_temp_scraper`.
2. Run `php spark marketing:news:generate --limit=25`.
3. Verify inserts in `bf_marketing_scraper` and `bf_marketing_generated_content`.
4. Verify temp records become processed.

## manual validation checklist
- Run `marketing:news-scrape` against a mailbox with known Thinkorswim alert emails.
- Verify normalized rows land in `bf_marketing_temp_scraper`.
- Run `marketing:news-scrape --ocr=/mnt/data/image.png`.
- Verify screenshot OCR produces usable title/provider/alert type.
- Run `marketing:news:generate`.
- Verify summarized content lands in `bf_marketing_scraper`.
- Verify grouped story clustering across related ticker/topic alerts.
- Verify `marketing:daily-audit` does not crash when optional tables are missing.
- Verify foreign key creation succeeds for distribution log.
- Verify dashboard views show generated stories and review queue.

## known follow-ups
- Add persisted similarity scores for explainable clustering in UI.
