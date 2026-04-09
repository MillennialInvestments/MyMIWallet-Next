# marketing:news-scrape command (2026-04-09)

## summary
Implemented CLI ingestion command and service for mailbox alerts, OCR screenshots, and raw text files into `bf_marketing_temp_scraper` with duplicate protection via content hash.

## files changed
- `app/Commands/Marketing/NewsScrape.php`
- `app/Services/MarketingNewsScrapeService.php`
- `app/Config/Services.php`

## migrations added
- None.

## commands added
- `php spark marketing:news-scrape`

## routes added
- `API/Marketing/runNewsScrape` (controller wrapper)

## manual test steps
1. Run `php spark marketing:news-scrape --mailbox=alerts@mymiwallet.com --limit=10`.
2. Run `php spark marketing:news-scrape --ocr=/mnt/data/image.png`.
3. Run `php spark marketing:news-scrape --file=/mnt/data/Pasted\ text.txt`.
4. Verify rows inserted as `status=pending`.

## known follow-ups
- Improve provider/ticker extraction with provider-specific parser maps.
